<?php

class UserApiToken
{
    private const TABLE_NAME = 'user_api_tokens';
    private const TOKEN_PREFIX = 'iks_';

    public static function generateForUser(int $user_id, string $name = 'Chrome URL Saver'): array
    {
        global $database;

        $token = self::TOKEN_PREFIX . bin2hex(random_bytes(32));
        $token_hash = self::hashToken($token);
        $token_prefix = substr($token, 0, 12);
        $name = self::truncate(trim($name), 100);

        if ($name === '') {
            $name = 'Chrome URL Saver';
        }

        $sql = "INSERT INTO " . self::TABLE_NAME . " ";
        $sql .= "(user_id, name, token_hash, token_prefix, abilities, created_at, updated_at) ";
        $sql .= "VALUES (?, ?, ?, ?, ?, NOW(), NOW())";

        $database->execute_prepared($sql, [
            $user_id,
            $name,
            $token_hash,
            $token_prefix,
            'saved-links:*',
        ], "issss");

        $id = (int)$database->insert_id();

        return [
            'token' => $token,
            'record' => self::findForUserById($user_id, $id),
        ];
    }

    public static function authenticateBearerToken(string $required_ability = 'saved-links:create')
    {
        global $database;

        $token = self::extractBearerToken();
        if ($token === '') {
            return false;
        }

        $token_hash = self::hashToken($token);
        $sql = "SELECT * FROM " . self::TABLE_NAME . " ";
        $sql .= "WHERE token_hash = ? ";
        $sql .= "AND revoked_at IS NULL ";
        $sql .= "AND (expires_at IS NULL OR expires_at > NOW()) ";
        $sql .= "LIMIT 1";

        $result = $database->query_prepared($sql, [$token_hash], "s");
        $row = $database->fetch_array($result);
        $database->free_result($result);

        if (!$row || !self::hasAbility((string)$row['abilities'], $required_ability)) {
            return false;
        }

        $user = User::find_by_id((int)$row['user_id']);
        if (!$user || (isset($user->block_user) && (int)$user->block_user === 1)) {
            return false;
        }

        self::markUsed((int)$row['id']);

        return [
            'user' => $user,
            'token' => $row,
        ];
    }

    public static function tokensForUser(int $user_id): array
    {
        global $database;

        $sql = "SELECT id, name, token_prefix, abilities, last_used_at, expires_at, revoked_at, created_at, updated_at ";
        $sql .= "FROM " . self::TABLE_NAME . " WHERE user_id = ? ORDER BY created_at DESC, id DESC";
        $result = $database->query_prepared($sql, [$user_id], "i");

        $rows = [];
        while ($row = $database->fetch_array($result)) {
            $rows[] = $row;
        }
        $database->free_result($result);

        return $rows;
    }

    public static function findForUserById(int $user_id, int $id)
    {
        global $database;

        $sql = "SELECT id, name, token_prefix, abilities, last_used_at, expires_at, revoked_at, created_at, updated_at ";
        $sql .= "FROM " . self::TABLE_NAME . " WHERE user_id = ? AND id = ? LIMIT 1";
        $result = $database->query_prepared($sql, [$user_id, $id], "ii");
        $row = $database->fetch_array($result);
        $database->free_result($result);

        return $row ?: false;
    }

    public static function revokeForUser(int $user_id, int $id): bool
    {
        global $database;

        $sql = "UPDATE " . self::TABLE_NAME . " SET revoked_at = NOW(), updated_at = NOW() ";
        $sql .= "WHERE user_id = ? AND id = ? AND revoked_at IS NULL";
        $database->execute_prepared($sql, [$user_id, $id], "ii");

        return $database->affected_rows() === 1;
    }

    private static function extractBearerToken(): string
    {
        $header = $_SERVER['HTTP_AUTHORIZATION'] ?? ($_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? '');

        if ($header === '' && function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
            foreach ($headers as $name => $value) {
                if (strtolower((string)$name) === 'authorization') {
                    $header = (string)$value;
                    break;
                }
            }
        }

        if (!preg_match('/\ABearer\s+(.+)\z/i', trim((string)$header), $matches)) {
            return '';
        }

        $token = trim($matches[1]);

        return str_starts_with($token, self::TOKEN_PREFIX) ? $token : '';
    }

    private static function hashToken(string $token): string
    {
        return hash('sha256', $token);
    }

    private static function hasAbility(string $abilities, string $required_ability): bool
    {
        $parts = array_filter(array_map('trim', explode(',', $abilities)));

        foreach ($parts as $ability) {
            if ($ability === '*' || $ability === $required_ability) {
                return true;
            }

            if (str_ends_with($ability, ':*')) {
                $prefix = substr($ability, 0, -1);
                if (str_starts_with($required_ability, $prefix)) {
                    return true;
                }
            }
        }

        return false;
    }

    private static function markUsed(int $id): void
    {
        global $database;

        $sql = "UPDATE " . self::TABLE_NAME . " SET last_used_at = NOW(), updated_at = NOW() WHERE id = ?";
        $database->execute_prepared($sql, [$id], "i");
    }

    private static function truncate(string $value, int $length): string
    {
        if (function_exists('mb_substr')) {
            return mb_substr($value, 0, $length, 'UTF-8');
        }

        return substr($value, 0, $length);
    }
}

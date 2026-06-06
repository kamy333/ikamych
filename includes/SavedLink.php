<?php

class SavedLink
{
    private const TABLE_NAME = 'saved_links';
    private const STATUSES = ['inbox', 'kept', 'archived'];

    public static function statusOptions(): array
    {
        return self::STATUSES;
    }

    public static function normalizeUrl($url): string
    {
        $url = trim((string)$url);

        if ($url === '' || strlen($url) > 2048) {
            throw new InvalidArgumentException('A valid URL is required.');
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('A valid URL is required.');
        }

        $scheme = strtolower((string)parse_url($url, PHP_URL_SCHEME));
        if (!in_array($scheme, ['http', 'https'], true)) {
            throw new InvalidArgumentException('Only http and https URLs can be saved.');
        }

        return $url;
    }

    public static function saveFromApi(int $user_id, array $data): array
    {
        global $database;

        $url = self::normalizeUrl($data['url'] ?? '');
        $url_hash = hash('sha256', $url);
        $title = self::truncate(trim((string)($data['title'] ?? '')), 500);
        $note = self::truncate(trim((string)($data['note'] ?? '')), 4000);
        $status = self::cleanStatus($data['status'] ?? 'inbox');
        $source = self::truncate(trim((string)($data['source'] ?? 'chrome')), 40);

        if ($title === '') {
            $host = parse_url($url, PHP_URL_HOST);
            $title = $host ? (string)$host : $url;
        }

        $sql = "INSERT INTO " . self::TABLE_NAME . " ";
        $sql .= "(user_id, url, url_hash, title, note, status, source, saved_at, created_at, updated_at) ";
        $sql .= "VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), NOW()) ";
        $sql .= "ON DUPLICATE KEY UPDATE ";
        $sql .= "title = IF(VALUES(title) <> '', VALUES(title), title), ";
        $sql .= "note = IF(VALUES(note) <> '', VALUES(note), note), ";
        $sql .= "status = VALUES(status), ";
        $sql .= "source = VALUES(source), ";
        $sql .= "saved_at = NOW(), ";
        $sql .= "updated_at = NOW(), ";
        $sql .= "id = LAST_INSERT_ID(id)";

        $database->execute_prepared($sql, [
            $user_id,
            $url,
            $url_hash,
            $title,
            $note,
            $status,
            $source,
        ], "issssss");

        $id = (int)$database->insert_id();
        $row = self::findForUserById($user_id, $id);

        if (!$row) {
            throw new RuntimeException('The saved link could not be loaded after saving.');
        }

        return $row;
    }

    public static function findForUserById(int $user_id, int $id)
    {
        global $database;

        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE user_id = ? AND id = ? LIMIT 1";
        $result = $database->query_prepared($sql, [$user_id, $id], "ii");
        $row = $database->fetch_array($result);
        $database->free_result($result);

        return $row ?: false;
    }

    public static function allForUser(int $user_id, array $filters = []): array
    {
        global $database;

        $where = ["user_id = ?"];
        $params = [$user_id];
        $types = "i";

        $status = trim((string)($filters['status'] ?? ''));
        if ($status !== '' && in_array($status, self::STATUSES, true)) {
            $where[] = "status = ?";
            $params[] = $status;
            $types .= "s";
        }

        $search = trim((string)($filters['search'] ?? ''));
        if ($search !== '') {
            $where[] = "(title LIKE ? OR url LIKE ? OR note LIKE ?)";
            $like = '%' . $search . '%';
            $params[] = $like;
            $params[] = $like;
            $params[] = $like;
            $types .= "sss";
        }

        $limit = (int)($filters['limit'] ?? 100);
        if ($limit < 1) {
            $limit = 100;
        }
        if ($limit > 500) {
            $limit = 500;
        }

        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE " . implode(" AND ", $where);
        $sql .= " ORDER BY saved_at DESC, id DESC LIMIT " . $limit;

        $result = $database->query_prepared($sql, $params, $types);
        $rows = [];
        while ($row = $database->fetch_array($result)) {
            $rows[] = $row;
        }
        $database->free_result($result);

        return $rows;
    }

    public static function countsForUser(int $user_id): array
    {
        global $database;

        $counts = [
            'all' => 0,
            'inbox' => 0,
            'kept' => 0,
            'archived' => 0,
        ];

        $sql = "SELECT status, COUNT(*) AS total FROM " . self::TABLE_NAME . " WHERE user_id = ? GROUP BY status";
        $result = $database->query_prepared($sql, [$user_id], "i");

        while ($row = $database->fetch_array($result)) {
            $status = (string)$row['status'];
            $total = (int)$row['total'];

            if (array_key_exists($status, $counts)) {
                $counts[$status] = $total;
                $counts['all'] += $total;
            }
        }

        $database->free_result($result);

        return $counts;
    }

    public static function updateForUser(int $user_id, int $id, array $data): bool
    {
        global $database;

        $title = self::truncate(trim((string)($data['title'] ?? '')), 500);
        $note = self::truncate(trim((string)($data['note'] ?? '')), 4000);
        $status = self::cleanStatus($data['status'] ?? 'inbox');

        if ($title === '') {
            throw new InvalidArgumentException('Title is required.');
        }

        $sql = "UPDATE " . self::TABLE_NAME . " SET title = ?, note = ?, status = ?, updated_at = NOW() ";
        $sql .= "WHERE user_id = ? AND id = ?";

        $database->execute_prepared($sql, [$title, $note, $status, $user_id, $id], "sssii");

        return $database->affected_rows() >= 0;
    }

    public static function setStatusForUser(int $user_id, int $id, string $status): bool
    {
        global $database;

        $status = self::cleanStatus($status);
        $sql = "UPDATE " . self::TABLE_NAME . " SET status = ?, updated_at = NOW() WHERE user_id = ? AND id = ?";
        $database->execute_prepared($sql, [$status, $user_id, $id], "sii");

        return $database->affected_rows() >= 0;
    }

    public static function deleteForUser(int $user_id, int $id): bool
    {
        global $database;

        $sql = "DELETE FROM " . self::TABLE_NAME . " WHERE user_id = ? AND id = ?";
        $database->execute_prepared($sql, [$user_id, $id], "ii");

        return $database->affected_rows() === 1;
    }

    public static function publicArray(array $row): array
    {
        return [
            'id' => (int)$row['id'],
            'url' => (string)$row['url'],
            'title' => (string)$row['title'],
            'note' => (string)($row['note'] ?? ''),
            'status' => (string)$row['status'],
            'source' => (string)$row['source'],
            'saved_at' => (string)$row['saved_at'],
            'created_at' => (string)$row['created_at'],
            'updated_at' => (string)$row['updated_at'],
        ];
    }

    private static function cleanStatus($status): string
    {
        $status = trim((string)$status);

        return in_array($status, self::STATUSES, true) ? $status : 'inbox';
    }

    private static function truncate(string $value, int $length): string
    {
        if (function_exists('mb_substr')) {
            return mb_substr($value, 0, $length, 'UTF-8');
        }

        return substr($value, 0, $length);
    }
}

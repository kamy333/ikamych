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
        $sql .= "note = IF((note IS NULL OR note = '') AND VALUES(note) <> '', VALUES(note), note), ";
        if (array_key_exists('status', $data)) {
            $sql .= "status = VALUES(status), ";
        }
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
        if (!empty($data['image_url'])) {
            self::updateThumbnailForUser($user_id, $id, $data['image_url']);
        }
        $row = self::findForUserById($user_id, $id);

        if (!$row) {
            throw new RuntimeException('The saved link could not be loaded after saving.');
        }

        $saved_note = trim((string)($row['note'] ?? ''));
        $saved_prefix = preg_replace('/(?:…|\.\.\.)(?:\s*See more)?\s*$/u', '', $saved_note);
        if ($note !== '' && is_string($saved_prefix) && $saved_prefix !== $saved_note && $saved_prefix !== ''
            && strlen($note) > strlen($saved_note) && strncmp($note, $saved_prefix, strlen($saved_prefix)) === 0) {
            $database->execute_prepared(
                "UPDATE " . self::TABLE_NAME . " SET note = ?, updated_at = NOW() WHERE user_id = ? AND id = ?",
                [$note, $user_id, $id],
                "sii"
            );
            $row['note'] = $note;
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

    public static function updateThumbnailForUser(int $user_id, int $id, $image_url): string
    {
        global $database;

        $existing = self::findForUserById($user_id, $id);
        if (!$existing) {
            return '';
        }
        $thumbnail_url = self::prepareThumbnail($user_id, $id, $image_url);
        if ($thumbnail_url !== '') {
            $database->execute_prepared(
                "UPDATE " . self::TABLE_NAME . " SET thumbnail_url = ?, updated_at = NOW() WHERE user_id = ? AND id = ?",
                [$thumbnail_url, $user_id, $id],
                'sii'
            );
            if ((string)($existing['thumbnail_url'] ?? '') !== $thumbnail_url) {
                self::deleteLocalThumbnail((string)($existing['thumbnail_url'] ?? ''));
            }
        }
        return $thumbnail_url;
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

        $row = self::findForUserById($user_id, $id);
        $sql = "DELETE FROM " . self::TABLE_NAME . " WHERE user_id = ? AND id = ?";
        $database->execute_prepared($sql, [$user_id, $id], "ii");

        $deleted = $database->affected_rows() === 1;
        if ($deleted && $row) {
            self::deleteLocalThumbnail((string)($row['thumbnail_url'] ?? ''));
        }

        return $deleted;
    }

    public static function publicArray(array $row): array
    {
        return [
            'id' => (int)$row['id'],
            'url' => (string)$row['url'],
            'title' => (string)$row['title'],
            'note' => (string)($row['note'] ?? ''),
            'thumbnail_url' => (string)($row['thumbnail_url'] ?? ''),
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

    private static function prepareThumbnail(int $user_id, int $id, $image_url): string
    {
        $image_url = self::normalizeImageUrl($image_url);
        if ($image_url === '') {
            return '';
        }

        $host = strtolower((string)parse_url($image_url, PHP_URL_HOST));
        if ($host === 'fbcdn.net' || substr($host, -10) === '.fbcdn.net') {
            return self::cacheFacebookThumbnail($user_id, $id, $image_url);
        }

        return $image_url;
    }

    private static function normalizeImageUrl($value): string
    {
        if (!is_string($value)) {
            return '';
        }
        $value = trim($value);
        if ($value === '' || strlen($value) > 2048 || !filter_var($value, FILTER_VALIDATE_URL)) {
            return '';
        }

        $parts = parse_url($value);
        if (!is_array($parts) || strtolower((string)($parts['scheme'] ?? '')) !== 'https'
            || !empty($parts['user']) || !empty($parts['pass'])
            || (isset($parts['port']) && (int)$parts['port'] !== 443)) {
            return '';
        }

        $host = strtolower((string)($parts['host'] ?? ''));
        if ($host === '' || strpos($host, '.') === false || filter_var($host, FILTER_VALIDATE_IP)
            || substr($host, -6) === '.local' || substr($host, -9) === '.internal') {
            return '';
        }

        return $value;
    }

    private static function cacheFacebookThumbnail(int $user_id, int $id, string $url): string
    {
        if (!function_exists('curl_init') || !function_exists('imagecreatefromstring')) {
            return '';
        }

        $body = '';
        $limit = 3 * 1024 * 1024;
        $request = curl_init($url);
        curl_setopt_array($request, [
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_CONNECTTIMEOUT => 4,
            CURLOPT_TIMEOUT => 12,
            CURLOPT_USERAGENT => 'Mozilla/5.0',
            CURLOPT_HTTPHEADER => ['Accept: image/jpeg,image/png,image/webp'],
            CURLOPT_WRITEFUNCTION => function ($handle, $chunk) use (&$body, $limit) {
                if (strlen($body) + strlen($chunk) > $limit) {
                    return 0;
                }
                $body .= $chunk;
                return strlen($chunk);
            },
        ]);
        $success = curl_exec($request);
        $status = (int)curl_getinfo($request, CURLINFO_HTTP_CODE);
        $content_type = (string)curl_getinfo($request, CURLINFO_CONTENT_TYPE);
        curl_close($request);
        if ($success === false || $status !== 200 || strpos($content_type, 'image/') !== 0 || $body === '') {
            return '';
        }

        $dimensions = @getimagesizefromstring($body);
        if (!$dimensions || $dimensions[0] < 120 || $dimensions[1] < 120
            || $dimensions[0] > 5000 || $dimensions[1] > 5000
            || $dimensions[0] * $dimensions[1] > 16000000) {
            return '';
        }
        $source = @imagecreatefromstring($body);
        if (!$source) {
            return '';
        }

        $scale = min(1, 900 / max($dimensions[0], $dimensions[1]));
        $width = max(1, (int)round($dimensions[0] * $scale));
        $height = max(1, (int)round($dimensions[1] * $scale));
        $thumb = imagecreatetruecolor($width, $height);
        imagefill($thumb, 0, 0, imagecolorallocate($thumb, 255, 255, 255));
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $width, $height, $dimensions[0], $dimensions[1]);
        imagedestroy($source);

        $directory = SITE_ROOT . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'saved-link-thumbnails';
        if (!is_dir($directory) && !@mkdir($directory, 0755, true)) {
            imagedestroy($thumb);
            return '';
        }
        $filename = $user_id . '-' . $id . '.jpg';
        $saved = @imagejpeg($thumb, $directory . DIRECTORY_SEPARATOR . $filename, 82);
        imagedestroy($thumb);

        return $saved ? '/public/img/saved-link-thumbnails/' . $filename : '';
    }

    private static function deleteLocalThumbnail(string $thumbnail): void
    {
        if (!preg_match('~^/public/img/saved-link-thumbnails/(?:[0-9]+-[0-9]+|import-[a-f0-9]{64})\.jpg$~', $thumbnail)) {
            return;
        }
        $file = SITE_ROOT . str_replace('/', DIRECTORY_SEPARATOR, $thumbnail);
        if (is_file($file)) {
            @unlink($file);
        }
    }

    private static function truncate(string $value, int $length): string
    {
        if (function_exists('mb_substr')) {
            return mb_substr($value, 0, $length, 'UTF-8');
        }

        return substr($value, 0, $length);
    }
}

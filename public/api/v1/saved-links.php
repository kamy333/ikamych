<?php

saved_links_api_cors_headers();

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once('../../../includes/initialize.php');

saved_links_api_json_header();

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$required_ability = $method === 'GET' ? 'saved-links:read' : 'saved-links:create';
$auth = UserApiToken::authenticateBearerToken($required_ability);

if (!$auth) {
    saved_links_api_response(['error' => 'Unauthorized.'], 401);
}

$user_id = (int)$auth['user']->id;

try {
    if ($method === 'POST') {
        $payload = saved_links_api_payload();
        $payload['source'] = 'chrome-extension';
        $link = SavedLink::saveFromApi($user_id, $payload);

        saved_links_api_response([
            'saved' => true,
            'link' => SavedLink::publicArray($link),
        ]);
    }

    if ($method === 'GET') {
        $links = SavedLink::allForUser($user_id, [
            'status' => $_GET['status'] ?? '',
            'search' => $_GET['search'] ?? '',
            'limit' => $_GET['limit'] ?? 100,
        ]);

        saved_links_api_response([
            'links' => array_map([SavedLink::class, 'publicArray'], $links),
            'counts' => SavedLink::countsForUser($user_id),
        ]);
    }

    saved_links_api_response(['error' => 'Method not allowed.'], 405);
} catch (InvalidArgumentException $exception) {
    saved_links_api_response(['error' => $exception->getMessage()], 422);
} catch (Throwable $exception) {
    saved_links_api_response(['error' => 'The link could not be saved.'], 500);
}

function saved_links_api_payload(): array
{
    $raw = file_get_contents('php://input');
    $payload = json_decode((string)$raw, true);

    if (!is_array($payload)) {
        saved_links_api_response(['error' => 'A JSON body is required.'], 400);
    }

    return $payload;
}

function saved_links_api_response(array $payload, int $status = 200): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

function saved_links_api_json_header(): void
{
    header('Content-Type: application/json; charset=utf-8');
}

function saved_links_api_cors_headers(): void
{
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Authorization, Content-Type');
    header('Access-Control-Max-Age: 86400');
}

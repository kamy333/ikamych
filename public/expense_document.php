<?php
require_once __DIR__ . '/../includes/initialize.php';

$session->confirmation_protected_page();

if (!User::is_admin()) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Access denied.';
    exit;
}

if (!ExpenseDocumentVault::isUnlocked()) {
    redirect_to(ExpenseDocumentVault::accessUrl(current_request_uri()));
}

$document = ExpenseDocumentVault::resolveDocument(
    $_GET['source'] ?? '',
    $_GET['id'] ?? 0,
    $_GET['file'] ?? ''
);

if ($document === false) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Document not found.';
    exit;
}

$asciiFilename = 'expense-document.' . $document['extension'];
$encodedFilename = rawurlencode($document['filename']);

header('Content-Type: ' . $document['mime_type']);
header('Content-Length: ' . filesize($document['path']));
header("Content-Disposition: inline; filename=\"{$asciiFilename}\"; filename*=UTF-8''{$encodedFilename}");
header('Cache-Control: private, no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');
header('Cross-Origin-Resource-Policy: same-origin');
header("Content-Security-Policy: default-src 'none'; frame-ancestors 'self'");

session_write_close();

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'HEAD') {
    exit;
}

readfile($document['path']);
exit;

<?php
http_response_code(410);
header('Content-Type: application/json');

echo json_encode([
    'error' => 'transmed_disabled',
    'message' => 'The Transmed data endpoint is no longer available.',
]);

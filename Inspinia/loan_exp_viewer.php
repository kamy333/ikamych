<?php
require_once __DIR__ . '/../includes/initialize.php';

$session->confirmation_protected_page();

if (!User::is_admin()) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Access denied.';
    exit;
}

// The legacy viewer accepted an arbitrary URL and embedded it directly in the
// page. Document links now use the password-protected vault instead.
$session->message('The legacy document viewer was disabled. Unlock documents from the expense page.');
redirect_to('/Inspinia/loan_exp.php?show_hide_doc=show_doc');

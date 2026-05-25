<?php

require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();
if (User::is_visitor()) {
    redirect_to('../../index.php');
}
//MyClasses::redirect_disable_class();

//
if (!is_ajax_request()) {
    http_response_code(400);
    echo "Not Ajax request";

    exit;
}



// get the q parameter from URL
$q = trim(e($_REQUEST["q"] ?? ""));

http_response_code(410);
header('Content-Type: text/plain; charset=UTF-8');
echo "transport autocomplete disabled";
?>

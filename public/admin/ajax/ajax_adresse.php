<?php


require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();
if (User::is_visitor()) {
    redirect_to('../../index.php');
}
//MyClasses::redirect_disable_class();

//
if (!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit;
}


// get the q parameter from URL
$q = rtrim(e($_REQUEST["q"] ?? ""));

http_response_code(410);
echo "transport autocomplete disabled";
?>

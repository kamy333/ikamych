<?php
require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();
if(User::is_employee() || User::is_visitor()){ redirect_to('index.php');}
MyClasses::redirect_disable_class();


if(!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit; }

$result = call_user_func(array($_GET['class_name'], 'Create_form'));

echo $result;


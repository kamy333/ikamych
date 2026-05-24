<?php
require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);


if(!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '';
    echo "<p>Not Ajax request</p>";

    exit; }

$result = call_user_func([$class_name, 'Create_form']);

echo $result;


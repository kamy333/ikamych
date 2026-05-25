<?php
require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);


if(!is_ajax_request()) {
    http_response_code(400);
    echo "Not Ajax request";

    exit; }

header('Content-Type: text/html; charset=UTF-8');

$result = call_user_func([$class_name, 'Create_form']);

echo $result;


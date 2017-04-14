<?php
require_once('../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
MyClasses::redirect_disable_class();


if (!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit;
}


echo call_user_func_array(array($_GET['class_name'], $_GET['action']), [true]);
//echo 'wowww go it '. $_GET['class_name'].' '.$_GET['id']
//echo ToDoList::quickupdate(true);



<?php require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
}
$class_name = MyClasses::redirect_disable_class();
call_user_func_array(array($class_name, 'change_to_unique_data'), ['transport']);

if (method_exists($class_name, 'update_everywhere')) {
    call_user_func_array(array($class_name, 'update_everywhere'), ['FormsCourseLinksForId', null]);
}


?>
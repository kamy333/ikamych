
<?php require_once('../includes/initialize_transmed.php');
    $session->confirmation_protected_page();
    if (User::is_employee() || User::is_visitor()) {redirect_to('index.php');
    }
$class_name = MyClasses::redirect_disable_class();
call_user_func_array(array($class_name, 'change_to_unique_data'), ['transport']);

if( isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=="reverse_visible" ) {
    $id = (int)$_GET['id'];
    call_user_func_array([$class_name, "reverse_visible"], [$id]);

//                echo  call_user_func_array([$class_name, "main_display"], []);
    redirect_to("transport.php?class_name={$class_name}");

}
?>
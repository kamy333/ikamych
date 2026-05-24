<?php require_once('../../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php
//if (User::is_employee() || User::is_visitor()) {
//    redirect_to('index.php');
//}

if(User::is_caroline_only()){
    if (isset($_GET['class_name'])) {
        $class_name = $_GET['class_name'];
        if ($class_name != "MyExpenseCaroline") {
            redirect_to('../../index.php');
        }
    }
} elseif (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('../../index.php');
}
?>

<?php

$class_name = MyClasses::allowed_class_from_request();
call_user_func_array([$class_name, 'change_to_unique_data'], ['data']);
?>
<?php
if (!isset($_GET["id"])) {
    $id = "";
    redirect_to($class_name::$page_manage);
} else {

    $id = $_GET["id"];
    $class_found = $class_name::find_by_id($id);

    if (!$class_found) {
        $session->message("Record ID (" . h($id) . ") was not found.");
        redirect_to($class_name::$page_manage);
    }

    if ($class_found->delete()) {
        $session->message($class_found->pseudo . " successfully deleted");
        $session->ok(true);
        redirect_to($class_name::$page_manage);
    } else {
        $session->message($class_found->pseudo . " deletion failed ");
        redirect_to($class_name::$page_manage);
    }

//}


}


?>


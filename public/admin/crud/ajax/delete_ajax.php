<?php require_once('../../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php

//if (User::is_employee() || User::is_visitor()) {
//    redirect_to('index.php');
//}
?>

<?php

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);
call_user_func_array([$class_name, 'change_to_unique_data'], ['ajax']);
?>
<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    $session->message('Sorry, a valid record ID is required for deletion.');
    redirect_to($class_name::$page_manage);
} else {

    $class_found = $class_name::find_by_id($id);

    if (!$class_found) {
        $session->message("Record ID (" . h($id) . ") was not found.");
        redirect_to($class_name::$page_manage);
    }

//if($class_found->username=="Admin" &&$class_name=="User"){
//    $session->message($class_found->username." cannot be deleted  ") ;
//    redirect_to($class_name::$page_manage);
//
//    if($class_found->id===$_SESSION["user_id"]){
//        $session->message($class_found->username." you cannot delete the active user logged in !(yourself)  ") ;
//        redirect_to($class_name::$page_manage);
//    }
//
//} else {

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


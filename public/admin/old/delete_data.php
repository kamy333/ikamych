<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>

<?php

MyClasses::redirect_disable_class();
if (isset($_GET['class_name'])) {
    $class_name = $_GET['class_name'];
    call_user_func_array(array($class_name, 'change_to_unique_data'), ['data']);

} else {
$class_name="ToDoList";

    if ($Nav->folder_immediate != "admin") {
        $class_name::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name::$page_manage;
        $class_name::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name::$page_new;
        $class_name::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name::$page_edit;
        $class_name::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name::$page_delete;
    }
}
?>
<?php
if (!isset($_GET["id"])) {
    $id="";
    redirect_to($class_name::$page_manage);
} else {

    $id=$_GET["id"];
    $class_found=$class_name::find_by_id($id);

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


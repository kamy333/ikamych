<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee() || User::is_visitor()){ redirect_to('index.php');}?>

<?php $class_name="User" ?>


<?php
if (!isset($_GET["id"])) {
    $id="";
    redirect_to($class_name::$page_manage);
} else {

    $id=$_GET["id"];
    $class_found=$class_name::find_by_id($id);

if($class_found->username=="Admin" &&$class_name=="User"){
    $session->message($class_found->username." cannot be deleted  ") ;
    redirect_to($class_name::$page_manage);

    if($class_found->id===$_SESSION["user_id"]){
        $session->message($class_found->username." you cannot delete the active user logged in !(yourself)  ") ;
        redirect_to($class_name::$page_manage);
    }

} else {
    if($class_found->delete()){
//        $session->message($class_found->username." successfully deleted") ;
        $session->message($class_found->message_form("successfully deleted!")) ;
        $session->ok(true);
        redirect_to($class_name::$page_manage);
    } else {
//        $session->message($class_found->username." deletion failed ") ;
        $session->message($class_found->message_form("deletion failed!")) ;
        redirect_to($class_name::$page_manage);
    }
}



}





?>


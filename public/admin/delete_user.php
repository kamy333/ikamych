<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee() || User::is_visitor()){ redirect_to('index.php');}?>

<?php $class_name = "User";

if ($Nav->folder_immediate != "admin") {
    $class_name::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name::$page_manage;
    $class_name::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name::$page_new;
    $class_name::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name::$page_edit;
    $class_name::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name::$page_delete;
} ?>

// ajax doesn't work with no password update

<?php
$class_name::$page_manage = "/public/admin/manage_user.php";
$class_name::$page_new = "/public/admin/new_user.php";
$class_name::$page_edit = "/public/admin/edit_user.php";
$class_name:: $page_delete = "/public/admin/delete_user.php";
?>

<?php
if (!isset($_GET["id"])) {
    $id = "";
    redirect_to($class_name::$page_manage);
} else {

    $id = $_GET["id"];
    $class_found = $class_name::find_by_id($id);

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
        $session->message($class_found->message_form("successfully deleted!"));
        $session->ok(true);

        $new_file = $class_found->user_img_directory . DS . $class_found->username . ".jpg";
        if (file_exists($new_file)) {
            unlink($new_file);
        }

        redirect_to($class_name::$page_manage);
    } else {
//        $session->message($class_found->username." deletion failed ") ;
        $session->message($class_found->message_form("deletion failed!")) ;
        redirect_to($class_name::$page_manage);
    }
}



}





?>


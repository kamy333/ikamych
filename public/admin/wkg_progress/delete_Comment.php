<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>


<?php $class_name = "Comment";

if ($Nav->folder_immediate != "admin") {
    $page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name::$page_manage;
    $page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name::$page_new;
    $page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name::$page_edit;
    $page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name::$page_delete;

} else {
    $page_manage = "manage_Comment.php";

} ?>


<?php
if(empty($_GET['id']) && !isset($_GET['id'])){
    redirect_to($page_manage);
}



$id=urldecode($_GET['id']);
$comment=Comment::find_by_id($id);
$comment->delete();
redirect_to($page_manage);

//if($photo && file_exists($photo->full_path_directory.DS.$photo->filename)){
//    $user->delete();
//    redirect("users.php");
//} else {
//    redirect("users.php");
//}






?>
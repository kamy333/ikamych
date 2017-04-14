<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee() || User::is_visitor()){ redirect_to('index.php');}?>


<?php
if(empty($_GET['id']) && !isset($_GET['id'])){
    redirect_to("manage_Comment.php");
}

$id=urldecode($_GET['id']);
$comment=Comment::find_by_id($id);
$comment->delete();
redirect_to("manage_Comment.php");

//if($photo && file_exists($photo->full_path_directory.DS.$photo->filename)){
//    $user->delete();
//    redirect("users.php");
//} else {
//    redirect("users.php");
//}






?>
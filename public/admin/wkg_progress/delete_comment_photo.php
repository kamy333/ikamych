<?php
include("includes/init.php");


if(!$session->is_signed_in()){redirect('login.php');}

if(empty($_GET['id']) && !isset($_GET['id'])){
    redirect("comments.php");
}

$id=urldecode($_GET['id']);
$comment=Comment::find_by_id($id);

if($comment){


$comment->delete();
$session->message("the comment with {$comment->id} has been deleted");
redirect("comments_photo.php?id=".$comment->photo_id);
} else {
    redirect("comments_photo.php?id=".$comment->photo_id);

}






?>
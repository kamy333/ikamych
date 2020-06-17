<?php
include("includes/init.php");


if(!$session->is_signed_in()){redirect('login.php');}

if(empty($_GET['id']) && !isset($_GET['id'])){
    redirect("photos.php");
}

$id=urldecode($_GET['id']);
$photo=Photo::find_by_id($id);

if($photo && file_exists($photo->full_path_directory.DS.$photo->filename)){
    $photo->delete_picture();
    redirect("photos.php");
} else {
    redirect("photos.php");
}






?>
<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee()){ redirect_to('index.php');}
if(User::is_visitor() ){ redirect_to('../index.php');}
?>
//old
<?php //$class_name="Category2" ?>

<?php if(isset($_GET["class_name"])){$class_name= urldecode($_GET["class_name"]) ;} else {$class_name="User";}  ?>

<?php $page_manage = "class_manage.php?" . $class_name ?>

<?php
if (!isset($_GET["id"])) {
    $id="";
//    redirect_to($class_name::$page_manage);
    redirect_to($page_manage);
} else {

    $id=$_GET["id"];
    $class_found=$class_name::find_by_id($id);


    if($class_found->delete()){
        $session->message("ID ".$class_found->id." succesfully deleted") ;
        $session->ok(true);
//        redirect_to($class_name::$page_manage);
        redirect_to($page_manage);
    } else {
        $session->message("ID ".$class_found->id." deletion failed ") ;
        redirect_to($page_manage);
    }




}





?>


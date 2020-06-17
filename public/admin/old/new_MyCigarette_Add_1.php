<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_employee() || !User::is_kamy()) {
    redirect_to('index.php');
} ?>

<?php $class_name = "MyCigarette";
$class_name1 = "MyCigaretteDay";
if ($Nav->folder_immediate != "admin") {
    $class_name::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name::$page_manage;
    $class_name::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name::$page_new;
    $class_name::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name::$page_edit;
    $class_name::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name::$page_delete;

    $class_name1::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name1::$page_manage;
    $class_name1::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name1::$page_new;
    $class_name1::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name1::$page_edit;
    $class_name1::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name1::$page_delete;

}

$new_item= new MyCigarette();
$new_item->number_cig=1;
$myDate = strftime("%Y-%m-%d",time());
$new_item->cig_date=$myDate;
$myDate = strftime("%Y-%m-%d %H:%M:%S",time());
$new_item->cig_date_time=$myDate;
$new_item->comment="Added automatically!";


$new_item->save();
$session->message("Added 1 cig");
$session->ok(true);
redirect_to($class_name1::$page_manage);
 ?>

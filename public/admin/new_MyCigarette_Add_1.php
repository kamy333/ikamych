<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee() || !User::is_kamy()){ redirect_to('index.php');}?>

<?php $class_name="MyCigarette" ;
$class_name1="MyCigaretteDay" ;


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

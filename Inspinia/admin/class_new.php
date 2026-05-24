<?php require_once('../../includes/initialize.php');
$session->confirmation_protected_page();
?>
<?php 
if(User::is_employee()){ redirect_to('index.php');}
if(User::is_visitor() ){ redirect_to('../index.php');}
?>

<?php $class_name = MyClasses::allowed_class_from_request('User'); ?>



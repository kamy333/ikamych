<?php require_once('../../../includes/initialize.php'); ?>
<?php require_once('../../../includes/transport/ViewTransportModelByChauffeur.php'); ?>

<?php if (isset($session)) {
    $session->confirmation_protected_page();
} ?>

<?php if (User::is_employee()) {
    redirect_to('index.php');

}
$class_name = MyClasses::redirect_disable_class();
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = false; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>


<?php


$class_name="ViewTransportModelByChauffeur";
echo call_user_func_array([$class_name, 'main_display'], []) ?>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
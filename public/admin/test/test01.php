<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>

<?php if (!User::is_admin()) {
    redirect_to('index.php');
} ?>


<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo $message; ?>

<?php

$user = new User();
$user->username = "Dumy";
$user->password = "Dumy";
$user->email = "Dumy@dumy.com";
$user->first_name = "Dumy";
$user->last_name = "Dumy";
$user->nom = "Dumy Dumy";
$user->block_user = 1;
$user->user_type_id = 5;
$user->create();


$current_page = 1;
$per_page = 20;
Article::count_all();
echo $a = Article::count_all();
$paginator = new Pagination($current_page, $per_page, $a);


//echo $a

?>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
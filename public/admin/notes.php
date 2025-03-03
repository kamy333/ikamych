<?php require_once('../../includes/initialize.php'); ?>
<?php if (isset($session)) {
    $session->confirmation_protected_page();
} ?>

<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php
Note::quickupdate();
?>

<?php $layout_context = "notes"; ?>
<?php $active_menu = "notes"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>




        <div class="col-lg-3">
        <?php echo Note::smallNotelist(); ?>
        </div>
        <div class="col-lg-7">
            <?php echo Note::noteList(); ?>
        </div>







<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
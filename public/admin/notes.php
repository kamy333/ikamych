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

<div class="container-fluid ikamy-notes-page">
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
    <?php if (isset($message)) {
        echo $message;
    } ?>

    <header class="ikamy-notes-page__header">
        <div>
            <h1>Quick notes</h1>
            <p>Tick an open note to mark it done; it leaves this list immediately.</p>
        </div>
        <a class="ikamy-notes-page__add" href="<?php echo h(SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=Note'); ?>"
           data-ikamy-modal-target="#ikamy-note-modal">
            <i class="fa fa-plus" aria-hidden="true"></i> Add note
        </a>
    </header>

    <div class="ikamy-notes-page__quick">
        <?php echo Note::smallNotelist(); ?>
    </div>
</div>







<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

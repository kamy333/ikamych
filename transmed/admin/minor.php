<?php require_once('../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary() || User::is_chauffeur()) {
    redirect_to('index.php');
}
if (User::is_visitor()) {
    redirect_to('../index.php');
}


?>

<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1></h1>
                    <small>Written in minor.html file.</small>
                </div>
            </div>
        </div>


    </div>


<?php include(FOOTER) ?>
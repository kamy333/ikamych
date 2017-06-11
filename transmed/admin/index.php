<?php require_once('../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || !User::is_admin() || User::is_secretary()) {
    redirect_to('../index.php');
}
//if(User::is_visitor() ){ redirect_to('../index.php');}

?>



<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo isset($valid) ? $valid->form_warnings() : "" ?>


<?php if (!empty($message)) {
    echo $message;
} ?>

<!--    <div class="wrapper wrapper-content animated fadeInRight">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <div class="text-center m-t-lg">-->
<!--                    <h1>-->
<!--                        Welcome in --><?php //echo $logo?>
<!--                    </h1>-->
<!--                    <small>-->
<!--                        My World is now in web development and design!-->
<!--                    </small>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<!--<div id="page-wrapper">-->
<?php echo admin_button(); ?>

<?php include("admin_content.php") ?>

<?php if (User::is_kamy()) { ?>

    <div class="row">



    <!--    </div>-->


<?php } ?>


</div>


<?php include(FOOTER) ?>



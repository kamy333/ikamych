<?php require_once('../includes/initialize_transmed.php'); ?>
<?php if (!User::is_admin()) {
    redirect_to("index.php");
}


?>

<?php //$active_menu="minor"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12  white-bg">
            <div class="text-center m-t-lg">
                <h1>Welcome to <?php echo LOGO; ?> </h1>

                <?php
                //                echo "<pre>";
                //                log_action('DatabaseObjectAccess','find_difference_xml_web_tables');
                //                TransportClient::update_db_records_tables();

                echo DatabaseObjectAccess::find_difference_xml_web_tables();
                //                echo "</pre>";

                ?>


            </div>

        </div>
    </div>
</div>


<?php include(FOOTER) ?>

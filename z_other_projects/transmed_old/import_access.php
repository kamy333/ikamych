<?php require_once('../includes/initialize_transmed.php'); ?>
<?php if (!User::is_admin()) {
    redirect_to("index.php");
}
if (isset($_GET['class_name']) && isset($_GET['action'])) {
    echo "<a href='test.php'>reload</a><hr>";
    $class_name = $_GET['class_name'];
    echo $action = $_GET['action'];
    echo call_user_func_array([$class_name, $action], []);

    unset($_GET['action']);
    redirect_to("admin/manage_ajax.php?class_name=$class_name");

    $offset = "";

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


                echo DatabaseObjectAccess::links();


                if (isset($_GET['class_name'])) {
                    $class_name = $_GET['class_name'];
//                    redirect_to("test.php?class_name=$class_name");
                }


                ?>


            </div>

        </div>
    </div>
</div>


<?php include(FOOTER) ?>

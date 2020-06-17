<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Photos</a></mark>
</h4>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">


    <a href="../manage_user.php">&laquo; Back</a><br/>
    <br/>
<?php


//$username= $_GET['username'];
//if(file_exists("../img/{$username}.JPG")){
//    echo "<span><img class='img-responsive'  src='../img/{$username}.JPG' alt='{$username}'</span>";
//}
?>

</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

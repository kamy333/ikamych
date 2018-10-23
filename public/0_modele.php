<?php require_once('../includes/initialize.php'); ?>

<?php $layout_context = "public"; ?>
<?php $active_menu="admin"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php //include_layout_template('nav.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>


<?php

?>


<h4 class="text-center"><mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">my modele</a> </mark></h4>

<h5>Client</h5>


<?php

echo Links::get_search_category();

?>



<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

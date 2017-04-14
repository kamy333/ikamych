
<?php require_once('../includes/initialize.php'); ?>

<?php $class_name="Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu="links"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php //include_layout_template('nav.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>


<div class="row">
    <?php echo $session->message(); ?>
    <?php  echo isset($valid)? $valid->form_errors():"" ?>
</div>



    <div class="row">
        <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-5">
            <?php echo Links::get_search_category(false,true); ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-3 col-lg-offset-1">
            <?php //echo get_search_category(); ?>

            <?php echo Links::output_links(null,false,true); ?>
        </div>

        <div class="col-lg-3 col-lg-offset-1">
            <?php //echo get_search_category(); ?>

            <?php echo Links::output_links('PHP'); ?>
        </div>


        </div>


    
    
    






<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>



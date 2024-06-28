<?php
require_once('../includes/initialize.php');

$layout_context = "public"; ?>
<?php $active_menu="about"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<div class="container"><!--close default container-->

<!--  <div class="container-fluid about_us">-->

    <?php
    $date=date_create(datetime_sql());
    $dtTime = $date->format('l d.m-Y H:i')."<br>";
    $txt= " <b>Geneva ". $dtTime."</b>";
    ?>

<!--    <h4 class="text-center"><a href="--><?php //echo $_SERVER["PHP_SELF"] ?><!--">Appointments Calendar</a></h4>-->
    <h2 class="text-center"><a href="https://www.ikamy.ch/public/admin/crud/ajax/manage_ajax.php?class_name=Course">Course<?php echo $txt;?> </a></h2>


<div class="col-lg-12">
    <?php


    $msg= Course::get_message();
    echo $msg;

    //Calendar::send_email($msg);
    ?>



</div>

</div>

<div class="row">





        <?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>




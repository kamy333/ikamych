<?php
require_once('../includes/initialize.php');

$layout_context = "public"; ?>
<?php $active_menu = "about"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<div class="container"><!--close default container-->

    <!--  <div class="container-fluid about_us">-->

    <?php


    //    echo "yppppppp<br>";
    //    echo date("Y-m-d H:i:s", substr("1704398353250", 0, 10));


    $date = date_create(datetime_sql());
    $dtTime = $date->format('l d.m.Y H:i') . "<br>";
    $txt = " <b>Geneva " . $dtTime . "</b>";
    ?>

    <!--    <h4 class="text-center"><a href="-->
    <?php
    $btn="";
    $nbsp=str_repeat("&nbsp;", 5);
    $btnOasis="{$nbsp}<a  class='btn-beige' href='https://www.ikamy.ch//public/_f/kamy/foyer_oasis.php'>Add Foyer Oasis</a>";

    if (User::is_admin()){
        $btn="<br>     
        <a href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=Calendar'><button class='btn-primary'>Add Date</button></a>";
    }

    ?>

    <h2 class="text-center"><a  href="https://www.ikamy.ch/public/admin/crud/ajax/manage_ajax.php?class_name=Calendar">Appointments
            Calendar <?php echo $txt; ?> </a> <?php echo $btn.$btnOasis; ?></h2>






    <div class="col-lg-12">
        <?php


        $msg = Calendar::get_message();
        echo $msg;

        //Calendar::send_email($msg);
        ?>


    </div>

</div>

<div class="row">


    <?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>




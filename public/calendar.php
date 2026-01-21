<?php
require_once('../includes/initialize.php');


//echo $_SERVER['SERVER_NAME'];

Note::quickupdate();

$code = "65B0LXcRnSLqPLumdVjf";

if (isset($_GET["code"]) && $_GET["code"] == CODE_CALENDAR) {

} else {

    if (isset($session)) {
        $session->confirmation_protected_page();
    }
    if (!User::is_admin()) {
        sendErrorEmail();
    }

}


$layout_context = "public"; ?>
<?php $active_menu = "calendar"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<div class="container-fluid"><!--close default container-->

    <!--  <div class="container-fluid about_us">-->

    <?php


    //    echo "yppppppp<br>";
    //    echo date("Y-m-d H:i:s", substr("1704398353250", 0, 10));


    $date = date_create(datetime_sql());
    $dtTime = $date->format('l d.m.Y H:i') . "<br>";
    $txt = " <b>Geneva " . $dtTime . "</b>";
    if (isset($_GET["type"]) && $_GET["type"] == "Past") {
        $txt = " <b>before Geneva " . $dtTime . "</b>";
    }

    ?>

    <!--    <h4 class="text-center"><a href="-->
    <?php


    $btn = "";
    $btnPrevious = "";
    $nbsp = str_repeat("&nbsp;", 5);
    $btnRecur = "{$nbsp}<a style='padding:0.1em'  class='btn-beige' href='https://www.ikamy.ch//public/_f/kamy/recurring_appointment.php'>Add Recurring Calendar</a>";

    $btnCert = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='padding:0.1em'  class='btn-info' href='https://www.ikamy.ch//public/_f/kamy/recurring_appointment_email.php?code=" . u(CODE_CALENDAR) . "'>Certificat Medical Email</a>";


    if (isCalendarPast()) {
        $btnPrevious = "{$nbsp}<a  style='padding:0.1em'  class='btn-info' href='https://www.ikamy.ch/public/calendar.php'>Future</a>";
    } else {
        $btnPrevious = "{$nbsp}<a  style='padding:0.1em'  class='btn-info' href='https://www.ikamy.ch/public/calendar.php?type=Past'>Past</a>";
    }




    $btnNote = " <a style='padding: 0.1em' href='https://www.ikamy.ch/public/admin/notes.php'><button class='btn-warning'>Note</button></a>";
    $classeNewNote = "<span ><i class='fa fa-plus-square' ></i></span> Note";
    $btnNoteAdd = " <a style='padding: 0.1em' href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=Note''><button class='btn-warning'>$classeNewNote</button></a>";

//    echo '<br><br>';

    $btnGenPsalm = " <a style='padding: 0.1em' href='https://ikamy.ch/Inspinia/papa/email/daily_psalm.php''><button class='btn-warning'>Generate Psalm</button></a>";





    if (User::is_admin()) {

        $btn = "<br>     
        <a style='padding: 0.1em' href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=Calendar'><button class='btn-primary'>Add Date</button></a>";
    }


    ?>

    <?php
    if (isCalendarPast()) { ?>
        <h2 class="text-center"><a
                    href="https://www.ikamy.ch/public/admin/crud/ajax/manage_ajax.php?class_name=Calendar">
                <span style="color: red"><b>PAST Appointments Calendar</b> <?php echo $txt; ?></span>
            </a> <?php echo $btn . $btnRecur . $btnCert . $btnPrevious . $btnNote.$btnGenPsalm; ?></h2>
    <?php } else { ?>
        <h2 class="text-center"><a
                    href="https://www.ikamy.ch/public/admin/crud/ajax/manage_ajax.php?class_name=Calendar">Appointments
                Calendar <?php echo $txt; ?> </a> <?php echo $btn . $btnRecur . $btnCert . $btnPrevious . $btnNote . $btnNoteAdd.$btnGenPsalm; ?>
        </h2>
    <?php } ?>


    <div class="row">

        <div class="col-lg-3" style="background-color:lightyellow;margin-top: 90px ">
            <?php
            echo Note::smallNotelist();
            //            Note::SendsmallNotelist();
            ?>
        </div>


        <div class="col-lg-8">
            <?php
            $msg = Calendar::get_message();
            echo $msg;

            //Calendar::send_email($msg);
            ?>
        </div>

    </div>

</div>

<!--<div class="row">-->


<?php
//redirect_to('public/_f/kamy/recurring_appointment_email.php?code=' . urlencode($code));
//?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>




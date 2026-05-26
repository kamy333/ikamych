<?php
require_once('../includes/initialize.php');


//echo $_SERVER['SERVER_NAME'];

Note::quickupdate();

$hasValidCalendarCode = isset($_GET["code"]) && hash_equals((string)CODE_CALENDAR, (string)$_GET["code"]);

if ($hasValidCalendarCode) {

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

<div class="container-fluid ikamy-calendar-page"><!--close default container-->

    <!--  <div class="container-fluid about_us">-->

    <?php


    //    echo "yppppppp<br>";
    //    echo date("Y-m-d H:i:s", substr("1704398353250", 0, 10));


    $date = date_create(datetime_sql());
    $dtTime = $date->format('l d.m.Y H:i') . "<br>";
    $txt = " <b>Geneva " . $dtTime . "</b>";
    if (isCalendarPast()) {
        $txt = " <b>before Geneva " . $dtTime . "</b>";
    }

    ?>

    <!--    <h4 class="text-center"><a href="-->
    <?php


    $btn = "";
    $btnPrevious = "";
    $nbsp = str_repeat("&nbsp;", 5);

    $btnRecur = "";
    $btnCert = "";


    if (isCalendarPast()) {
        $btnPrevious = "<a class='ikamy-calendar-page__action ikamy-calendar-page__action--secondary' href='" . h(SITE_URL . "/public/calendar.php") . "'><i class='fa fa-calendar-check-o' aria-hidden='true'></i> Future</a>";
    } else {
        $btnPrevious = "<a class='ikamy-calendar-page__action ikamy-calendar-page__action--secondary' href='" . h(SITE_URL . "/public/calendar.php?type=Past") . "'><i class='fa fa-history' aria-hidden='true'></i> Past</a>";
    }




//    echo '<br><br>';

    $btnGenPsalm = "";





    if (User::is_admin()) {

        $btnRecur = "<a class='ikamy-calendar-page__action ikamy-calendar-page__action--neutral' href='" . h(SITE_URL . "/public/_f/kamy/recurring_appointment.php") . "'><i class='fa fa-repeat' aria-hidden='true'></i> Recurring</a>";
        $btnCert = "<a class='ikamy-calendar-page__action ikamy-calendar-page__action--secondary' href='" . h(SITE_URL . "/public/email_script/appointment.php") . "'><i class='fa fa-envelope-o' aria-hidden='true'></i> Medical email</a>";
        $btn = "<a class='ikamy-calendar-page__action ikamy-calendar-page__action--primary' href='" . h(SITE_URL . "/public/admin/crud/ajax/new_ajax.php?class_name=Calendar") . "' data-ikamy-modal-target='#ikamy-calendar-modal'><i class='fa fa-calendar-plus-o' aria-hidden='true'></i> Add date</a>";
    }


    ?>

    <?php
    if (isCalendarPast()) { ?>
        <header class="ikamy-calendar-page__header ikamy-calendar-page__header--past">
            <h1><a href="<?php echo h(SITE_URL . '/public/admin/crud/ajax/manage_ajax.php?class_name=Calendar'); ?>">Past appointments calendar</a></h1>
            <p><?php echo $txt; ?></p>
            <nav class="ikamy-calendar-page__actions" aria-label="Calendar actions">
                <?php echo $btn . $btnRecur . $btnCert . $btnPrevious . $btnGenPsalm; ?>
            </nav>
        </header>
    <?php } else { ?>
        <header class="ikamy-calendar-page__header">
            <h1><a href="<?php echo h(SITE_URL . '/public/admin/crud/ajax/manage_ajax.php?class_name=Calendar'); ?>">Appointments Calendar</a></h1>
            <p><?php echo $txt; ?></p>
            <nav class="ikamy-calendar-page__actions" aria-label="Calendar actions">
                <?php echo $btn . $btnRecur . $btnCert . $btnPrevious . $btnGenPsalm; ?>
            </nav>
        </header>
    <?php } ?>


    <div class="row ikamy-calendar-page__grid">

        <div class="col-lg-10 col-lg-offset-1 ikamy-calendar-page__planning">
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
//redirect_to('public/email_script/appointment.php');
//?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>




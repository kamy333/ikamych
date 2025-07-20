<?php require_once('../../../includes/initialize.php'); ?>
<?php if (isset($session)) {
    $session->confirmation_protected_page();
} ?>
<?php
if (!User::is_admin()) {
    redirect_to('../index.php');
}
?>
<?php
function Actual_Next_WeekDay(int $DayOfWeek = 5)
{
    $currentDate = new DateTime();

    $today = date("Y-m-d");

// Get the day of the week (0 for Sunday, 6 for Saturday)
    $currentDayOfWeek = $currentDate->format('w');

// Calculate the number of days until the next Friday
    $daysUntilWeekOfDay = $DayOfWeek - $currentDayOfWeek;
    if ($daysUntilWeekOfDay < 0) {
        $daysUntilWeekOfDay += 7; // If today is Friday or later, add 7 days to get next Friday
    }

// Add the calculated days to the current date
    $currentDate->modify("+$daysUntilWeekOfDay days");

    return $currentDate;
}

function ArrayDaysOfWeek(string $DayOfWeek = '1', int $TimesRepeat = 9)
{
    // Get the current date
    $today = new DateTime();

// Array to store the next 5 Fridays
    $nextWeekDay = []; // array();

// If today is Friday, include it in the list
    if ($today->format('w') === $DayOfWeek) {
        $nextWeekDay[] = $today->format('Y-m-d');
    }

// Loop to find the next 5 Fridays
    while (count($nextWeekDay) < $TimesRepeat) {
        $today->modify('+1 day'); // Move to the next day
        if ($today->format('w') === $DayOfWeek) { // If it's Friday
            $nextWeekDay[] = $today->format('Y-m-d'); // Add it to the list
        }
    }

    return $nextWeekDay;
}

function generateLinks($nextDays, $name, $title = "Physio Fantine", $color = "primary")
{
    $output = "";
    foreach ($nextDays as $day) {
        $date = new DateTime($day);
        $dayName = $date->format('D');
        $output .= "<a class='btn btn-$color' href='" . $_SERVER['PHP_SELF'] . "?date=$day&name=$name'>$dayName $title $day</a>&nbsp;&nbsp;&nbsp; ";
    }
    $output .= "<br><br><br>";
    return $output;
}


function createCalendar($date, $title, $heure, $comment = '', $person = "0", $is_birthday = "0")
{
    global $session;

    $cal = new Calendar();
    $cal->title = $title;
    $cal->start_date = $date;
    $cal->start_time = $heure;
    $cal->comment = $comment;
    $cal->person = $person;
    $cal->input_date = date("Y-m-d");
    $cal->is_birthday = $is_birthday;
//    $cal->save();

    if ($cal->person == "0") {
        $person1 = "Kamy";
    } else {    // if ($cal->person == "0")
        $person1 = "Mum";
    }

    $msg = "          {$person1} {$cal->title}
                    {$cal->start_date} at {$cal->start_time}
                    {$cal->comment}";

    if ($cal->save()) {
        $session->message(" 
                    We have booked the following in Calendar:
                    $msg");
        $session->ok(true);
    } else {   // if ($cal->save())

        $session->message(" We have failed to book the following in Calendar:
                        $msg ");
        $session->ok(false);
    }
    redirect_to($_SERVER['PHP_SELF']);

    //return $cal;    // return the calendar object
}

if (isset($_GET["date"]) && isset($_GET["name"])) {
    $dt = $_GET["date"];
    $name = $_GET["name"];
    if (isset($_GET["heure"])) {
        $heure = $_GET["heure"];
    } else {
        $heure = "";

    }

    $heure = urldecode($_GET["heure"]);

    if ($name == "Physio_Fantine") {
        if ($heure == "") {
            $heure = "14:30";
        }

        $cal = createCalendar(date: $dt, title: "Physio Fantine", heure: $heure);
    }

    if ($name == "Physio_Resp_Amandine") {

        if ($heure == "") {
            $heure = "16:30";
        }
        $cal = createCalendar(date: $dt, title: "Physio Resp Amandine", heure: '16:30');
    }


}


?>





<?php $layout_context = "public"; ?>
<?php $active_menu = "kamy"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php $me = $_SERVER['PHP_SELF'] ?>
<h1 class="text-center"><a href="<?= $me ?>">Recurring Appointmement</a></h1>


<?php

$output = "";

$outputResult = "";

$today = date("Y-m-d");


$outputNextFriday = "";
$outputNextMonday = "";
$outputNextTuesday = "";

$currentDateFriday = Actual_Next_WeekDay(5);
$currentDateMonday = Actual_Next_WeekDay(1);
$currentDateTuesday = Actual_Next_WeekDay(2);

$nextFridays = ArrayDaysOfWeek("5", 5);
$nextMondays = ArrayDaysOfWeek("1", 3);
$nextTuesdays = ArrayDaysOfWeek("2", 3);

$dtFr = $currentDateFriday->format('Y-m-d');
$dtMon = $currentDateMonday->format('Y-m-d');
$dtTue = $currentDateTuesday->format('Y-m-d');


$output .= "<div class='row'>";
$output .= "<div class='col-lg-9   col-lg-offset-2'>";
$output .= $session->message();
//$output .= "<div class='row bg-danger'>";
//$output .= $message;
//$output .= "</div>";
//$output .= "<br><br>";
$output .= generateLinks($nextMondays, "Physio_Fantine", "Physio Fantine", "primary");
$output .= generateLinks($nextTuesdays, "Physio_Resp_Amandine", "Physio Resp Amandine", "info");

$nbsp = str_repeat('&nbsp;', 3);

$output .= "
    <form class='form-inline' action='" . $_SERVER['PHP_SELF'] . "' method='get' name='physio_fantine'>
    Date: <input type='date' value='{$dtMon}' class='input-small' name='date' placeholder='date'>$nbsp 
    Heure: <input type='time' value='14:30' class='input-small' name='heure' placeholder='heure'>$nbsp
    Name: <input type='text' value='Physio_Fantine' class='input-small' name='name' placeholder='date'>
    <input type='submit' class='btn'>
    </form>
";

$output .= "<br>";

$output .= "
    <form class='form-inline' action='" . $_SERVER['PHP_SELF'] . "' method='get' name='physio_amandine'>
    Date: <input type='date' value='{$dtTue}' class='input-small' name='date' placeholder='date'>$nbsp
    Heure: <input type='time' value='16:30' class='input-small' name='time' placeholder='time'>$nbsp
    Name: <input type='text' value='Physio_Resp_Amandine' class='input-small' name='name' placeholder='date'>
    <input type='submit' class='btn'>
    </form>
";

$output .= "<br>";

$output .= "</div>";
$output .= "</div>";


echo $output;
//echo $outputResult;


?>




<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>






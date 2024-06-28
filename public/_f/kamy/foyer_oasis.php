<?php require_once('../../../includes/initialize.php'); ?>
<?php if (isset($session)) {
    $session->confirmation_protected_page();
} ?>
<?php

function Actual_Next_WeekDay(int $DayOfWeek=5)
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
function ArrayDaysOfWeek(string $DayOfWeek='5',int $TimesRepeat=9)
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
        if ($today->format('w') === '5') { // If it's Friday
            $nextWeekDay[] = $today->format('Y-m-d'); // Add it to the list
        }
    }

    return $nextWeekDay;
}

?>


<?php
if (!User::is_admin()){
    redirect_to('../index.php');
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

<h1 class="text-center">Foyer Oasis</h1>


<div class="row">
    <?php if (isset($session)) {
        echo $session->message();
    } ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>



<?php

$output = "";
$outputResult = "";
$outputNextFriday="";
$today = date("Y-m-d");


$currentDate=Actual_Next_WeekDay(5);
$nextFridays=ArrayDaysOfWeek("5",6);

foreach ($nextFridays as $friday) {
    $outputNextFriday.= "<a href='". $_SERVER['PHP_SELF']."?date=$friday'>Fri $friday</a>&nbsp;&nbsp;&nbsp; ";
}


if (isset($_GET["date"])) {
    $dt = $_GET["date"];
    $cal = new Calendar();
    $cal->title = "Foyer Oasis Mum";
    $cal->start_date = $dt;
    $cal->start_time = "11:45";
    $cal->comment = "Foyer Oasis rdv midi retour 16h00";
    $cal->person="1";
    $cal->input_date=$today;
    $cal->is_birthday="0";
    $cal->save();

    $outputResult .= "<div class='row'>";
    $outputResult .= "<div class='col-lg-6   col-lg-offset-3' style='margin-top: 2em;background-color: lightgrey' >";

    $outputResult .= "<br><hr><b>";
    $outputResult.="We have booked the following in Calendar<br>";
    $outputResult .= "<br>{$cal->person} {$cal->title}";
    $outputResult .= "<br>{$cal->start_date} at ";
    $outputResult .= "{$cal->start_time}<br>";
    $outputResult .= "{$cal->comment}<br>";
    $outputResult .= "</b><hr>";

    $outputResult .= "</div>";
    $outputResult .= "</div>";

} else {

    $dt = $currentDate->format('Y-m-d');
}



$output .= "<div class='row'>";
$output .= "<div class='col-lg-6   col-lg-offset-3'>";

$output .= $outputNextFriday;
$output .= "<br>";
$output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form class='form-inline' action='" . $_SERVER['PHP_SELF'] . "' method='get' name='amount'>
Date: <input type='date' value='{$dt}' class='input-small' name='date' placeholder='amount'>
<input type='submit' class='btn'>
</form>";

$output .= "</div>";
$output .= "</div>";


echo $output;
echo $outputResult;




?>




<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>








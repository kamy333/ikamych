<?php require_once('../../../includes/initialize.php'); ?>

<?php

//if (isset($_GET["code"])) {
//    isset($session) ? $session->confirmation_protected_page() : redirect_to("/public/admin/login.php");
//}

if (isset($session)) {
    $session->confirmation_protected_page();
}


if (isset($session)) {
    /** @noinspection PhpMultipleClassDeclarationsInspection */
    if (!User::is_admin()) {
        $session->message("You are not authorized to access this page");
        redirect_to('/public/admin/index.php');
    }
}


//$dayOfMonthNumberCertifMedicalGlobal=15;
//isCurrentDateBetweenTwoDates();

//$today =date('Y-m-d H:i:s');
//$today=new DateTime($today);
//$today->setTimezone(new DateTimeZone('Europe/Zurich'));
//$todayDay=(int) $today->format('j');

//function isCurrentDateBetweenTwoDates(){
//    global $dayOfMonthNumberCertifMedicalGlobal;
//
//    $hourStart = 12;
//
//    $today =date('Y-m-d H:i:s');
//    $today=new DateTime($today);
//    $today->setTimezone(new DateTimeZone('Europe/Zurich'));
//
//    $m=$today->format('m');
//    $d=$today->format('d');
//    $y=$today->format('Y');
//    $dint=(int) $today->format('j');
//
//    if ($dint == $dayOfMonthNumberCertifMedicalGlobal){
//
//        $date1=new DateTime("$y-$m-$d $hourStart:00:00");
//        $date1->setTimezone(new DateTimeZone('Europe/Zurich'));
//        $date1->modify("+3 day");
//
//        $date2=clone $date1;
//        $date2->modify("+1 hour 30 minutes");
//
//        if ($today>=$date1 && $today<=$date2){
////            return true;
//            send_email_certificat_Medical(true);
//        }
//    }
//    return false;
//}

function recurring_self_url(): string
{
    return $_SERVER['PHP_SELF'];
}

function recurring_day_number(): int
{
    $source = request_is_post() ? INPUT_POST : INPUT_GET;
    $dayNumber = filter_input($source, 'dayNumber', FILTER_VALIDATE_INT, ['options' => ['default' => 18, 'min_range' => 1, 'max_range' => 31]]);

    return $dayNumber === false || $dayNumber === null ? 18 : (int)$dayNumber;
}

function recurring_time_value($value, string $default): string
{
    $time = trim((string)$value);
    if ($time === '') {
        return $default;
    }

    if (preg_match('/^\d{2}:\d{2}$/', $time) === 1) {
        return $time;
    }

    if (preg_match('/^\d{1,2}h\d{2}$/', $time) === 1) {
        return str_replace('h', ':', $time);
    }

    return $default;
}

function recurring_date_value($value): ?string
{
    $date = DateTime::createFromFormat('Y-m-d', (string)$value);
    if (!$date || $date->format('Y-m-d') !== (string)$value) {
        return null;
    }

    return $date->format('Y-m-d');
}

function recurring_appointment_options(): array
{
    return [
        "Physio_Fantine" => [["title" => "Physio Fantine", "heure" => "14:30", "person" => "0"]],
        "Physio_Resp_Amandine" => [["title" => "Physio Resp Amandine", "heure" => "16:30", "person" => "0"]],
        "Ergo_Margot_Mum" => [["title" => "Ergo Margot Mum", "heure" => "11:30", "person" => "2"]],
        "Foyer_Oasis_Mum" => [
            ["title" => "Foyer Oasis Mum", "heure" => "11:40", "person" => "2"],
            ["title" => "Retour Foyer Oasis Mum", "heure" => "15:50", "person" => "2"],
        ],
        "Retour_Foyer_Oasis_Mum" => [["title" => "Retour Foyer Oasis Mum", "heure" => "15:50", "person" => "2"]],
        "Certificat_Medical_Mimouni" => [["title" => "Certificat Medical Mimouni", "heure" => "11:00", "person" => "0"]],
    ];
}

function getMonthDateFromdate(): string
{
    $dayNumber = recurring_day_number();
//    $date = new DateTime($date);
//    $dayNumber = (int) 17;
    return (new DateTime())->setDate((new DateTime())->format('Y'), (new DateTime())->format('m'), $dayNumber)->format('Y-m-d');

}


function send_email_certificat_Medical($is_redirect = false): void
{
    try {
        global $session;
        $mail = new MyPHPMailer();
//        $mail->CharSet = 'UTF-8';

        // PHPMailer want to use french locale

        setlocale(LC_TIME, 'fr_CH');
        date_default_timezone_set('Europe/Zurich');
        $currentDate = getMonthDateFromdate();
        $currentDate = new DateTime($currentDate);

        $nextMonth = clone $currentDate;
        $nextMonth->modify("+1 month")->modify("-1 day");

        //current date Month english eg. December
        $currentDateMonth = $currentDate->format('F');


        $lastDayCert = getMonthDateFromdate();
        $lastDayCert = new DateTime($lastDayCert);
        $lastDayCert = $lastDayCert->modify("-1 day")->format('d.m.Y');

        $dateFrom = $currentDate->format('d.m.Y');
        $dateTo = $nextMonth->format('d.m.Y');
    } catch (Exception $e) {
        $session->message("Date Malformed String Exception: " . h($e->getMessage()));
        if ($is_redirect) {
            redirect_to(recurring_self_url());
        } else {
            redirect_to("/public/calendar.php");
        }

    }


    //number of days from to
    $diff = $currentDate->diff($nextMonth)->format("%a");


    $subject = "Renouvellement du certificat médical longue durée";
//    $to = 'nafisspour@bluewin.ch';

    $nbsp = str_repeat("&nbsp;", 5);
    $message = "";
    $message .= "
    <div lang='fr' style='background-color: white; margin: 10px; border-radius: 5px;'>
        <p>Cher Dr Mimouni </p>
        <p>Je vous prie de bien vouloir établir le renouvellement du certificat médical longue durée:</p>
        <p>La date d'échéance du dernier certificat au {$lastDayCert} arrive à sa fin. Pouvez-vous s'il vous plait établir le renouvellement du certificat médical :</p>
        <p style='color: blue'>$nbsp du $nbsp $dateFrom $nbsp jusqu'au $nbsp $dateTo   $nbsp $diff jours $nbsp   100%.</p>
        <p style='color: blue'>$nbsp Maladie</p>
        <p>Je vous remercie d'avance </p>
        <p>Meilleures salutations</p>
        <p>Kamran Nafisspour<br>rue des Vollandes 68<br>1207 Genève<br>Tél: (079) 350 2132</p>";
    $message .= "</div>";

//    $message .= "
//        <p>Cher Dr Mimouni </p>
//        <p>Je vous prie de bien vouloir établir le renouvellement du certificat médical longue durée:</p>
//        <p>La date d'échéance du dernier certificat au {$lastDayCert} arrive à sa fin. Pouvez-vous s'il vous plait établir le renouvellement du certificat médical :</p>
//                        <p style='color: blue'>du $dateFrom jusqu'au $dateTo     $diff jours   100%.</p>
//                        <p style='color: blue'>Maladie</p>
//                        <p>Je vous remercie d'avance </p>
//                        <p>Meilleures salutations</p>
//                        <p>Kamran Nafisspour<br>rue des Vollandes 68<br>1207 Genève<br>Tél: (079) 350 2132</p>";
//


    //Send HTML or Plain Text email
    $mail->addAddress('nafisspour@bluewin.ch');
    $mail->isHTML();
    $mail->Subject = $subject;

    $mail->Body = $message;
    //   $mail->AltBody = "This is the plain text version of the email content";

    try {
        if (!$mail->send()) {
            $session->message("Mailer Error: " . $mail->ErrorInfo);
            redirect_to(recurring_self_url());
        } else {
            $session->message("Message certificat medical Dr. Mimouni has been sent successfully");
            $session->ok(true);
        }
    } catch (phpmailerException $e) {

    }

    redirect_to(recurring_self_url());

}


function getNextMonthsDates($date, $ocurrences = 5, $includeCurrent = true)
{
    // This function generates an array of dates for the next specified number of months from a given start date.
    // The start date is included in the result.

    $result = [];
    $currentDate = new DateTime($date);

    if ($includeCurrent) {
        $result[] = $currentDate->format('Y-m-d');
    }

    for ($i = 1; $i <= $ocurrences; $i++) {
        $nextMonth = clone $currentDate;
        $nextMonth->modify("+$i month");
        $result[] = $nextMonth->format('Y-m-d');
    }

    return $result;
}


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

function generateLinks($nextDays, $name, $title = "Physio Fantine", $color = "primary", $otherLinks = "")
{
    $output = "";
    $output .= "<div class='container-fluid'>";
    $output .= "<div class='row'>";
    $output .= "<div class='col-lg-12'>";
    $nbsp = str_repeat('&nbsp;', 3);
    foreach ($nextDays as $day) {
        $date = new DateTime($day);
        $dayName = $date->format('D');
        $formatedDate = $date->format('d.m.Y');
        $output .= "<form method='post' action='" . h(recurring_self_url()) . "' style='display:inline'>" . csrf_token_tag();
        $output .= "<input type='hidden' name='date' value='" . h($day) . "'>";
        $output .= "<input type='hidden' name='name' value='" . h($name) . "'>";
        $output .= "<button type='submit' class='btn btn-" . h($color) . "'>" . h("$dayName $title $formatedDate") . "</button>";
        $output .= "</form>$nbsp ";
    }
    $output .= "<br><br><br>";
    $output .= "</div>";
    $output .= "</div>";
    $output .= "</div>";
    return $output;
}


function generateLinksMonthly($name = "Certificat_Medical_Mimouni", $title = "Certificat_Medical_Mimouni", $color = "primary", $occurrences = 3)
{
//    $dayNumber = (int) 17;
//    $day17ThisMonth = (new DateTime())->setDate((new DateTime())->format('Y'), (new DateTime())->format('m'), $dayNumber)->format('Y-m-d');

    $date = getMonthDateFromdate(); // $day17ThisMonth; // '2024-12-04';
    $nextMonths = getNextMonthsDates($date, ocurrences: $occurrences);

    $output = "";
    $output .= generateLinks($nextMonths, $name, $title, $color);
    return $output;

}

//Ergo_Margot_Mum


function createCalendar($date, $title, $heure, $comment = '', $person = "0", $is_birthday = "0", $redirect = true)
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
    $cal->person = $person1;

    $msg = "         {$person1} {$cal->title}
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
    if ($redirect) {
        redirect_to(recurring_self_url());
    }

    //return $cal;    // return the calendar object
}

if (request_is_post() && request_is_same_domain()) {
    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $session->message("Sorry, request was not valid.");
        redirect_to(recurring_self_url());
    }

    if (isset($_POST["sendEmailCertifMedical"])) {
        send_email_certificat_Medical();
    }

    $dt = recurring_date_value($_POST["date"] ?? "");
    $name = trim((string)($_POST["name"] ?? ""));
    $options = recurring_appointment_options();

    if ($dt !== null && isset($options[$name])) {
        $requestedHour = $_POST["heure"] ?? ($_POST["time"] ?? "");
        $appointmentCount = count($options[$name]);
        foreach ($options[$name] as $appointment) {
            $heure = recurring_time_value($appointmentCount === 1 ? $requestedHour : "", $appointment["heure"]);
            createCalendar(date: $dt, title: $appointment["title"], heure: $heure, person: $appointment["person"], redirect: false);
        }
        redirect_to(recurring_self_url());
    }

    if ($dt !== null || $name !== '') {
        $session->message("The requested appointment was not valid.");
        redirect_to(recurring_self_url());
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

<?php $me = recurring_self_url() ?>
<h1 class="text-center"><a href="<?php echo h($me); ?>">Recurring Appointmement</a></h1>


<?php

$output = "";

$outputResult = "";

$today = date("Y-m-d");


$outputNextFriday = "";
$outputNextMonday = "";
$outputNextTuesday = "";
$outputNextThuesday = "";

$currentDateFriday = Actual_Next_WeekDay(5);
$currentDateMonday = Actual_Next_WeekDay(1);
$currentDateTuesday = Actual_Next_WeekDay(2);
$currentDateThursday = Actual_Next_WeekDay(4);

$nextFridays = ArrayDaysOfWeek("5", 3);
$nextMondays = ArrayDaysOfWeek("1", 3);
$nextTuesdays = ArrayDaysOfWeek("2", 4);
$nextThursdays = ArrayDaysOfWeek("4", 4);

$dtFr = $currentDateFriday->format('Y-m-d');
$dtMon = $currentDateMonday->format('Y-m-d');
$dtTue = $currentDateTuesday->format('Y-m-d');
$dtThu = $currentDateThursday->format('Y-m-d');


$dayNamefri = $currentDateFriday->format('D');
$dayNameMon = $currentDateMonday->format('D');
$dayNameTue = $currentDateTuesday->format('D');
$dayNameThu = $currentDateThursday->format('D');


$output .= "<div class='row'>";
$output .= "<div class='col-lg-9   col-lg-offset-2'>";
$output .= "<br><br>";
$output .= $session->message();

$output .= generateLinks($nextMondays, "Physio_Fantine", "Physio Fantine", "primary");
$output .= generateLinks($nextThursdays, "Physio_Fantine", "Physio Fantine", "success");
$output .= generateLinks($nextTuesdays, "Physio_Resp_Amandine", "Physio Amandine", "info");
$output .= generateLinks($nextTuesdays, "Ergo_Margot_Mum", "Ergo Margot Mum", "danger");
$output .= generateLinks($nextFridays, "Foyer_Oasis_Mum", "Foyer Oasis Mum ", "warning");
$output .= generateLinks($nextFridays, "Retour_Foyer_Oasis_Mum", "Retour Oasis Mum", "yellow");
$output .= generateLinksMonthly("Certificat_Medical_Mimouni", "Certif Medical", "taupe");

$nbsp = str_repeat('&nbsp;', 3);

$output .= "
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='post' name='physio_fantine'>
    " . csrf_token_tag() . "
    Date $dayNameMon: <input type='date' value='{$dtMon}' class='input-small' name='date' placeholder='date'>$nbsp 
    Heure: <input type='time' value='14:30' class='input-small' name='heure' placeholder='heure'>$nbsp
    Name: <input type='text' value='Physio_Fantine' class='input-small' name='name' placeholder='date'>
    <input type='submit' class='btn btn-primary'>
    </form>
";

$output .= "<br>";

$output .= "
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='post' name='physio_fantine'>
    " . csrf_token_tag() . "
    Date $dayNameThu: <input type='date' value='{$dtThu}' class='input-small' name='date' placeholder='date'>$nbsp 
    Heure: <input type='time' value='14:30' class='input-small' name='heure' placeholder='heure'>$nbsp
    Name: <input type='text' value='Physio_Fantine' class='input-small' name='name' placeholder='date'>
    <input type='submit' class='btn btn-success'>
    </form>
";

$output .= "<br>";

$output .= "
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='post' name='physio_amandine'>
    " . csrf_token_tag() . "
    Date $dayNameTue: <input type='date' value='{$dtTue}' class='input-small' name='date' placeholder='date'>$nbsp
    Heure: <input type='time' value='16:30' class='input-small' name='time' placeholder='time'>$nbsp
    Name: <input type='text' value='Physio_Resp_Amandine' class='input-small' name='name' placeholder='date'>
    <input type='submit' class='btn btn-info'>
    </form>
";

$output .= "<br>";
$output .= "
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='post' name='Ergo_Margot_Mum'>
    " . csrf_token_tag() . "
    Date $dayNameTue: <input type='date' value='{$dtTue}' class='input-small' name='date' placeholder='date'>$nbsp
    Heure: <input type='time' value='11:30' class='input-small' name='time' placeholder='time'>$nbsp
    Name: <input type='text' value='Ergo_Margot_Mum' class='input-small' name='name' placeholder='date'>
    <input type='submit' class='btn btn-danger'>
    </form>
";

$output .= "<br>";
$output .= "
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='post' name='Foyer_Oasis_Mum'>
    " . csrf_token_tag() . "
    Date $dayNamefri: <input type='date' value='{$dtFr}' class='input-small' name='date' placeholder='date'>$nbsp &nbsp;
    Heure: <input type='time' value='11:40' class='input-small' name='time' placeholder='time'>$nbsp
    Name: <input type='text' value='Foyer_Oasis_Mum' class='input-small' name='name' placeholder='date'>
    <input type='submit' class='btn btn-warning'>
    </form>
";
$output .= "<br>";
$output .= "
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='post' name='Retour_Foyer_Oasis_Mum'>
    " . csrf_token_tag() . "
    Date $dayNamefri: <input type='date' value='{$dtFr}' class='input-small' name='date' placeholder='date'>$nbsp &nbsp;
    Heure: <input type='time' value='15:50' class='input-small' name='time' placeholder='time'>$nbsp
    Name: <input type='text' value='Retour_Foyer_Oasis_Mum' class='input-small' name='name' placeholder='date'>

<input type='submit' value='Retour' class='btn btn-yellow'>   
    </form>
";


$output .= "<br>";
$dtMthCertifMedical = getMonthDateFromdate();
$dayNumberCertifMedicalFormat = (new DateTime($dtMthCertifMedical))->format('d.m.Y');
$dayNumberCertifMedical = (int)(new DateTime($dtMthCertifMedical))->format('d');
$dayNameMonthCertifMedical = (new DateTime($dtMthCertifMedical))->format('D');

$nbsp2 = str_repeat('&nbsp;', 20);


// provide me a form with select input with options each day number of a month
$output .= "
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='get' name='day_number_form'>
    <label for='dayNumber'>Day of  Certif Medical:</label>
    <select name='dayNumber' id='dayNumber' class='input-small'>
";
for ($i = 1; $i <= 31; $i++) {
    $selected = ($i == $dayNumberCertifMedical) ? "selected" : "";
    $output .= "<option $selected value='$i' >$i</option>";
}


$output .= "
    </select>$nbsp 
    
    <input type='submit' name='submit' class='btn btn-taupe' value='Submit'>
        $nbsp
       </form> 
       <form method='post' action='" . h(recurring_self_url()) . "' style='display:inline'>" . csrf_token_tag() . "
       <input type='hidden' name='dayNumber' value='" . h($dayNumberCertifMedical) . "'>
       <button type='submit' name='sendEmailCertifMedical' value='true' class='btn btn-purple'>Email Certif Med " . h("$dayNameMonthCertifMedical $dayNumberCertifMedicalFormat") . "</button>
       </form>
    ";

$output .= "";
$output .= "<br>";

$output .= "       
    <form class='form-inline' action='" . h(recurring_self_url()) . "' method='post' name='Certificat_Medical_Mimouni'>
    " . csrf_token_tag() . "
    Date $dayNameMonthCertifMedical: <input type='date' value='{$dtMthCertifMedical}' class='input-small' name='date' placeholder='date'>$nbsp
    Heure: <input type='time' value='11:00' class='input-small' name='time' placeholder='time'>$nbsp
    Name: <input type='text' value='Certificat_Medical_Mimouni' class='input-small' name='name' placeholder='Name'>
    <input type='submit' class='btn secondary'>
    </form>
";


$output .= "<br>";

$output .= "</div>";
$output .= "</div>";


echo $output;
//echo $outputResult;


?>




<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>






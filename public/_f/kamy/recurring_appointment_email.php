<?php $IS_PRODUCTION = true; ?>
<?php require_once('../../../includes/initialize.php'); ?>
<?php
$msg = "<ul class='no-bullets'>";

$nbsp = str_repeat("&nbsp;", 10);


if ($IS_PRODUCTION) {
    if (isset($_GET["code"]) && $_GET["code"] == CODE_CALENDAR) {
        $msg .= "<li style='color: #0a6aa1' >You have the right code</li>";
    } else {
        if (isset($session)) {
            $session->confirmation_protected_page();
        }
        if (!User::is_admin()) {
            sendErrorEmail('Trying to access the page without the right code or permission recurring_appointment_email.php');
        } else {
            $msg .= "<li style='color: #0a6aa1'>You entered as an admin</li>";
        }
    }
}


function isCurrentDateBetweenTwoDates()
{
//    echo "<br>"."isCurrentDateBetweenTwoDates is called"."<br>";

    global $dayNumber;

    global $hourStart;
    global $nbsp;
    global $msg;

    $today = date('Y-m-d H:i:s');
    $today = new DateTime($today);
    $today->setTimezone(new DateTimeZone('Europe/Zurich'));

    $m = $today->format('m');
    $d = $today->format('d');
    $y = $today->format('Y');
    $dint = (int)$today->format('j');

//    echo "<br>"."$d $m $y is ok before if  $dayNumber -> $dint"."<br>";

    if ($dint == $dayNumber) {
//        echo "<br>"."$d $m $y is ok"."<br>";

        $date1 = new DateTime("$y-$m-$d $hourStart:00:00");
        $date1->setTimezone(new DateTimeZone('Europe/Zurich'));
        //$date1->modify("+3 day");

        $date2 = clone $date1;
        $date2->modify("+2 hour 30 minutes");
//        $date2->modify("+1 hour 30 minutes");

//        $today = $today->format('Y-m-d H:i:s');
//        $date1 = $date1->format('Y-m-d H:i:s');
//        $date2 = $date2->format('Y-m-d H:i:s');

        $todayDay = $today->format('d.m.Y');
        $todayTime = $today->format('H:i');
        $date1Day = $date1->format('d.m.Y');

        $hour1 = $date1->format('H:i');
        $hour2 = $date2->format('H:i');

        if ($today >= $date1 && $today <= $date2) {

            send_email_certificat_Medical(true);
            echo "<br>" . $nbsp . "<a href='recurring_appointment_email.php' class='btn btn-secondary'>Send Email Again</a>";

        } else {

            if ($todayDay == $date1Day) {
                $msg .= "<li style='color: #cd13c1'>No Email  because of following:
            <br>today $todayDay is the correct day number of the $dayNumber for reporting
            <br> but timing must between $hour1 to $hour2 and is now is $todayTime</li>";
                echo "<br>" . $nbsp . "<a href='recurring_appointment_email.php' class='btn btn-secondary'>Send Email Again</a>";

            } else {
                $msg .= "<li style='color: #cd13c1'>No Email because of following:
            <br>today must be date: $todayDay and day number must be = $dayNumber of this month <br>
            and timing must between $hour1 to $hour2 and is now is $todayTime</li>";
            }

        }
    } else {
        $today = new DateTime();
        $todayDay = $today->format('d.m.Y');
        $todayDayNumber = $today->format('j');
        $msg .= "<li style='color: darkorange' xmlns=\"http://www.w3.org/1999/html\">No Email because of following:
            <br>today date: $todayDay is day number = $todayDayNumber but must be = $dayNumber of this month</li>";
//        <br>and timing must between $hour1 to $hour2 and is now is $todayTime</p>";
    }
    return false;
}

function getMonthDateFromdate(): string
{

    global $dayNumber;
    global $dayReport;
//    echo "<br>"."getMonthDateFromdate is called"."   $dayNumber<br>";
//    $dayNumberNew = $_GET['dayNumber'] ?? ($dayNumber + 3);
    $dayReportNew = $_GET['dayReport'] ?? ($dayReport);
    return (new DateTime())->setDate((new DateTime())->format('Y'), (new DateTime())->format('m'), $dayReportNew)->format('Y-m-d');
}

function send_email_certificat_Medical($is_redirect = False): void
{
    try {
        global $msg;
//        global $session;
        $mail = new MyPHPMailer();


        setlocale(LC_TIME, 'fr_CH');
        date_default_timezone_set('Europe/Zurich');
        $currentDate = getMonthDateFromdate();
        $currentDate = new DateTime($currentDate);

        $nextMonth = clone $currentDate;
        $nextMonth->modify("+1 month")->modify("-1 day");


        /** @noinspection PhpSuspiciousNameCombinationInspection */
        $lastDayOfCert = getMonthDateFromdate();
        $lastDayOfCert = new DateTime($lastDayOfCert);
        $lastDayOfCert = $lastDayOfCert->modify("-1 day")->format('d.m.Y');

        $dateFrom = $currentDate->format('d.m.Y');
        $dateTo = $nextMonth->format('d.m.Y');

    } catch (Exception $e) {
        sendErrorEmail();
        die("Date Malformed String Exception: " . $e->getMessage());

    }

    //number of days from to
    $diff = $currentDate->diff($nextMonth)->format("%a");

    $subject = "Demande de renouvellement du certificat médical";

    $nbsp = str_repeat("&nbsp;", 5);


    $message .= "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Demande de renouvellement du certificat médical</title>
    </head>
    <body>

    <div lang='fr' style='background-color: white; margin: 10px; border-radius: 5px;'>
     
     <p><strong>Objet :</strong> Demande de renouvellement du certificat médical</p>
    
    <p>Cher Dr Mimouni,</p>
    
    <p>
        Je vous serais reconnaissant d’établir le renouvellement du certificat médical de longue durée.
    </p>
    
    <p>
        Le dernier certificat, valable jusqu’au <strong>{$lastDayOfCert}</strong>, arrive à échéance. 
        Serait-il possible de renouveler celui-ci pour la période suivante :
    </p>
    
    <ul>
        <li style='color: blue'><strong>Du $dateFrom au $dateTo</strong> ($diff jours, incapacité à 100 %, pour maladie).</li>
    </ul>
    
    <p>
        Je vous remercie par avance pour votre aide et reste à votre disposition.
    </p>
    
    <p>
        Avec mes meilleures salutations,<br>
    </p>    
    <p>Kamran Nafisspour<br>rue des Vollandes 68<br>1207 Genève<br>Tél: (079) 350 2132</p>
   
    </div>
    </body>
</html>

";

//    echo '<br>'.$message.'<br>';

    //Send HTML or Plain Text email
    $mail->addAddress('nafisspour@bluewin.ch');
    $mail->addAddress("kamy333@hotmail.com");
    $mail->addAddress("kamran.nafisspour@gmail.com");
    $mail->isHTML();
    $mail->Subject = $subject;
    $mail->Body = $message;
    //   $mail->AltBody = "This is the plain text version of the email content";

//    echo "<br>" . $message . "<br>";

    try {
        if (!$mail->send()) {
            sendErrorEmail();
            die("Date Malformed String Exception: " . $e->getMessage());
        } else {
            $msg .= "<li style='color: #0aa66e;' >Email sent</li>";
        }

    } catch (phpmailerException $e) {

        sendErrorEmail("Date Malformed String Exception: " . $e->getMessage());


    }


}

$dayNumber = $_GET['dayNumber'] ?? 15;
$dayReport = $_GET['dayReport'] ?? $dayNumber + 3;
$getHourStart = $_GET['hourStart'];
if (isset($getHourStart)) {
    $hourStart = explode(":", $getHourStart)[0];
} else {
    $hourStart = 13;
}

//$hourStart = explode(":", $_GET['hourStart'])[0] ?? 13;

$today = new DateTime();
$todayDay = $today->format('d.m.Y');
$todayTime = $today->format('H:i');
$todayDateDay = $today->format('d');
$todayDateDayInt = $today->format('j');
$todayDateMonth = $today->format('m');

$msg .= "<li style='color: darkgoldenrod'>" . "Calling for: (day number $dayNumber) (hour start $hourStart:00 ) now is $todayDay at $todayTime</li>";

//return;
isCurrentDateBetweenTwoDates();

$layout_context = "public"; ?>
<?php $active_menu = "calendar"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<style>
    .no-bullets {
        list-style: none; /* Removes bullets */
        padding: 0; /* Removes padding */
        margin: 0; /* Removes margin */
    }
</style>


<div class="container" style="margin-top: 10em"><!--close default container-->

    <h2 class="text-center"><a href="<?= $_SERVER['PHP_SELF'] ?>">Demande Certificat Email</a>
        <a href='recurring_appointment.php' class='btn btn-secondary'>Go to recurring appointment </a>
    </h2>
    <?php
    $msg .= "</ul>";
    if (isset($msg)) {
        echo "<div class='alert alert-transparent text-center' >";
        echo $msg;
        echo "</div>";
    }


    ?>

    <div class="row">

        <div class="col-md-12 text-center">

            <?php

            $output = "
<form class='form-inline' action='" . $_SERVER['PHP_SELF'] . "' method='get' name='day_number_form'>
    <!-- Select Day of Month Running -->
    <label for='dayNumber' class='control-label'>Day Running:</label>
    <select name='dayNumber' id='dayNumber' class='input-small'>
";

            for ($i = 1; $i <= 31; $i++) {
                $selected = ($i == (int)$todayDateDayInt) ? "selected" : "";
                $output .= "<option $selected value='$i'>$i</option>";
            }

            $output .= "
    </select>&nbsp;

    <!-- Select Day of Month Reporting -->
    <label for='dayReport' class='control-label'>Day Reporting:</label>
    <select name='dayReport' id='dayReport' class='input-small'>
";

            for ($i = 1; $i <= 31; $i++) {
                $selected = ($i == $dayReport) ? "selected" : "";
                $output .= "<option $selected value='$i'>$i</option>";
            }

            $output .= "
    </select>&nbsp;

    <!-- Time Input -->
    <label for='hourStart' class='control-label'>Heure:</label>
    <input type='time' value='$todayTime' class='input-small' id='hourStart' name='hourStart' placeholder='hourStart'>&nbsp;

    <!-- Submit Button -->
    <div class='form-actions' style='margin-top: 20px;'>
        <input type='submit' name='submit' class='btn btn-warning btn-large' value='Send Email'>
    </div>
</form>
";
            echo $output;


            ?>
        </div>
    </div>


    <?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>







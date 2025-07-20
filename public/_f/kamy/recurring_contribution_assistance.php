<?php $IS_PRODUCTION = true; ?>
<?php require_once('../../../includes/initialize.php'); ?>

<?php

if ($IS_PRODUCTION) {
    $secure_password = "myContrAssist2023";

// Security Check
    if (!isset($_GET['password']) || $_GET['password'] !== $secure_password) {
        http_response_code(403);
        die("Forbidden: Invalid Password.");
    }
}


$today = new DateTime();

if ($IS_PRODUCTION) {
//    $nextMonth = (new DateTime('third day of next month'));

    // Get the third day of next month
    $nextMonth = (new DateTime('first day of next month'))->modify('+2 days');
//    echo $thirdDayNextMonth->format('Y-m-d');

//    $today = new DateTime();

//    $alert_date = new DateTime();
//    $alert_date->setDate((int)$alert_date->format('Y'), (int)$alert_date->format('m'), 3);
//    echo $alert_date->format('Y-m-d H:i:s');

    $alert_date = (new DateTime())->setDate((int)$today->format('Y'), (int)$today->format('m'), 3);


    if ($today < $alert_date) {
        $targetDate = $alert_date;
    } else {
        $targetDate = (new DateTime('first day of next month'))->modify('+2 days');
    }


} else {
//    $nextMonth = new DateTime();
    $alert_date = new DateTime();
//    $alert_date_fmt = $alert_date->format('F Y');//format('Y-m');
}


$from_name = "CONTRIBUTION D'ASSISTANCE <ikamy.ch>";
$subject = "Compléter le rapport d'assistance et heures présence";

//get the last day of the previous month

$lastDayOfCert = (new DateTime('last day of previous month'))->format('d.m.Y');
$dateFrom = (new DateTime('first day of previous month'))->format('d.m.Y');
$dateTo = (new DateTime('last day of previous month'))->format('d.m.Y');
$diff = (int)(new DateTime('last day of previous month'))->format('d') - (new DateTime('first day of previous month'))->format('d');
$diff = $diff + 1;

//$report_month_fmt = (new DateTime('third day of previous month'))->format('F Y');

$lastMonth = (new DateTime('last day of previous month'))->format('F Y');


$message = "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Contribution d'assistance $lastMonth</title>
    </head>
    <body>

    <div lang='fr' style='background-color: white; margin: 10px; border-radius: 5px;'>
     
     <p><strong>Objet :</strong> Compléter le formulaire contribution assistance $lastMonth</p>
    
    <p>Kamran,</p>
    
    <p>
    Complète le formulaire de contribution d'assistance pour le mois de $lastMonth.<br>
    Le nombre d'heures d'heures par mois approuvé est 160 heures.'
    <br>
    Ne pas oublier de cocher la 2e page du formulaire avec les heures de nuits par des amis soit <b>$diff</b> jours pour le mois.
    </p>
    
    <p>
    Geovani et Wessley fiche de précence en utilisant le programme Python. et leurs faire signer et les mettre en pièce jointe.
    </p>
   
       
    <p>
    Formulaire de contribution d'assistance: <a href='https://ai-remboursement.ocas.ch/connexion?_gl=1*id6kmi*_ga*MzMyNzkwMTE4LjE3MzQxNzY3MzM.*_ga_48788903HS*MTczNzcwNzYxOC4yMC4wLjE3Mzc3MDc2MzcuMC4wLjA.'>Remboursement OCAS Contr. Assistance</a>
    </p>
    
    <p>
       Office AI Fransisco Roma contribution assistance gerant <br>
         +41 22 327 25 86
    </p>    
    
  
    
    <p>Kamran Nafisspour<br>rue des Vollandes 68<br>1207 Genève<br>Tél: (079) 350 2132</p>
   
    </div>
    </body>
</html>

";


// Check if today is the correct date to send
if ($today->format('Y-m-d') === $alert_date->format('Y-m-d')) {
    $mail = new MyPHPMailer();
    try {
// Server settings
        $mail->SMTPDebug = 0; // Enables verbose debug output

// Recipients
        $mail->setFrom($from_email, $from_name);
        $mail->addAddress('nafisspour@bluewin.ch');
        $mail->addAddress('kamran.nafisspour@gmail.com');

// Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "<p style='color: #0aa66e;'><b>Email sent successfully.</b></p> ";
//        echo $report_date->format('Y-m-d');
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Today: ' . $today->format('Y-m-d');
    echo '<br>';
    echo "No email to send today. Next scheduled send date is: " . $targetDate->format('Y-m-d');
}

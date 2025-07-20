<?php $IS_PRODUCTION = true; ?>
<?php require_once('../../../includes/initialize.php'); ?>

<?php

if ($IS_PRODUCTION) {
    $secure_password = "myDoctoriswaiting";

// Security Check
    if (!isset($_GET['password']) || $_GET['password'] !== $secure_password) {
        http_response_code(403);
        die("Forbidden: Invalid Password.");
    }
}


$today = new DateTime();

if ($IS_PRODUCTION) {
    $nextMonth = (new DateTime('first day of next month'))->modify('-3 days');

// Adjust for weekend
    if (in_array($nextMonth->format('N'), ['6', '7'])) { // 6 = Saturday, 7 = Sunday
        $nextMonth->modify('previous friday');
    }
} else {
    $nextMonth = new DateTime();
}


$from_name = "MEDICAL CERTIFICATE REMINDER <ikamy.ch>";
$subject = "Demande de renouvellement du certificat médical";


$lastDayOfCert = (new DateTime('last day of this month'))->format('d.m.Y');
$dateFrom = (new DateTime('first day of next month'))->format('d.m.Y');
$dateTo = (new DateTime('last day of next month'))->format('d.m.Y');
$diff = (int)(new DateTime('last day of next month'))->format('d') - (new DateTime('first day of next month'))->format('d');
$diff = $diff + 1;


$message = "
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


// Check if today is the correct date to send
if ($today->format('Y-m-d') === $nextMonth->format('Y-m-d')) {
//    echo 5555;
    $mail = new MyPHPMailer();
//    echo 6666;
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
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "No email to send today. Next scheduled send date is: " . $nextMonth->format('Y-m-d');
}

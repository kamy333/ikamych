<?php
// Original location: public/_f/kamy/recurring_contribution_assistance.php
$IS_PRODUCTION = true;
?>
<?php require_once(__DIR__ . '/../../includes/initialize.php'); ?>

<?php

if ($IS_PRODUCTION) {
    require_configured_get_token('CONTRIBUTION_ASSISTANCE_REMINDER_TOKEN');
}


$today = new DateTime();

if ($IS_PRODUCTION) {

    // Get the third day of next month
    $nextMonth = (new DateTime('first day of next month'))->modify('+2 days');


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

$approvedHours = 167.52;
$nightHoursPerDay = 3.48;
$nightHoursForMonth = $diff * $nightHoursPerDay;
$totalAvailableHours = $approvedHours + $nightHoursForMonth;
$hoursPerEmployee = $totalAvailableHours / 2;

$approvedHoursFmt = number_format($approvedHours, 2, ',', "'");
$nightHoursPerDayFmt = number_format($nightHoursPerDay, 2, ',', "'");
$nightHoursForMonthFmt = number_format($nightHoursForMonth, 2, ',', "'");
$totalAvailableHoursFmt = number_format($totalAvailableHours, 2, ',', "'");
$hoursPerEmployeeFmt = number_format($hoursPerEmployee, 2, ',', "'");


$message = "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Contribution d'assistance $lastMonth</title>
    </head>
    <body style='margin: 0; padding: 0; background-color: #ffffff; font-family: Arial, Helvetica, sans-serif; color: #1f2933; line-height: 1.5;'>

    <div lang='fr' style='max-width: 720px; margin: 20px auto; padding: 24px; background-color: #ffffff;'>

        <h1 style='margin: 0 0 16px; font-size: 22px; color: #1d4ed8;'>Contribution d'assistance - $lastMonth</h1>

        <p style='margin: 0 0 16px;'>
            Bonjour Kamran,
        </p>

        <p style='margin: 0 0 20px;'>
            Merci de compléter le formulaire de contribution d'assistance pour le mois de <strong>$lastMonth</strong>.
        </p>

        <h2 style='margin: 24px 0 10px; padding-bottom: 4px; border-bottom: 1px solid #bfdbfe; font-size: 16px; color: #1d4ed8; font-weight: bold;'>Calcul des heures</h2>
        <ul style='margin: 0 0 20px; padding-left: 20px;'>
            <li>Nombre de jours dans le mois : <strong>$diff jours</strong>.</li>
            <li>Nombre d'heures approuvé par mois : <strong>$approvedHoursFmt heures</strong>.</li>
            <li>Heures de nuit converties en heures de jour : <strong>$nightHoursPerDayFmt heures par jour</strong>.</li>
            <li>Total des heures de nuit pour le mois : <strong>$nightHoursForMonthFmt heures</strong> ($diff jours x $nightHoursPerDayFmt h).</li>
            <li>Total des heures disponibles pour le mois : <strong>$totalAvailableHoursFmt heures</strong> ($approvedHoursFmt h + $nightHoursForMonthFmt h).</li>
            <li>Total à répartir par employé, si répartition égale entre 2 employés : <strong>$hoursPerEmployeeFmt heures</strong>.</li>
        </ul>

        <p style='margin: 0 0 20px;'>
            <strong>Attention :</strong> le nombre d'heures peut varier selon le nombre de jours dans le mois.
        </p>

        <h2 style='margin: 24px 0 10px; padding-bottom: 4px; border-bottom: 1px solid #bfdbfe; font-size: 16px; color: #1d4ed8; font-weight: bold;'>Marche à suivre - prioritaire</h2>
        <ol style='margin: 0 0 20px; padding-left: 20px;'>
            <li>Calculer les horaires selon le tableau.</li>
            <li>Après exportation, déclarer les horaires des employés pour chaque service sur <a href='https://www.chequeservice.ch/fr' style='color: #1d4ed8; font-weight: bold;'>Chèque Service</a>.</li>
            <li>S'assurer que les fonds sont suffisants.</li>
            <li>Exporter les bulletins de salaire.</li>
            <li>Imprimer les heures de présence.</li>
            <li>Faire signer les heures de présence par les employés.</li>
            <li>Faire signer à chaque employé la quittance confirmant qu'il a bien reçu son salaire.</li>
            <li>Compléter le formulaire OCAS de contribution d'assistance.</li>
        </ol>

        <h2 style='margin: 24px 0 10px; padding-bottom: 4px; border-bottom: 1px solid #bfdbfe; font-size: 16px; color: #1d4ed8; font-weight: bold;'>Chèque Service</h2>
        <ul style='margin: 0 0 20px; padding-left: 20px;'>
            <li>Entrer les horaires des employés pour chaque service.</li>
            <li>Vérifier que les fonds disponibles sont suffisants.</li>
            <li>Exporter le bulletin de salaire de chaque service.</li>
            <li>Faire signer la quittance de salaire par chaque employé.</li>
        </ul>

        <h2 style='margin: 24px 0 10px; padding-bottom: 4px; border-bottom: 1px solid #bfdbfe; font-size: 16px; color: #1d4ed8; font-weight: bold;'>OCAS - contribution d'assistance</h2>
        <ul style='margin: 0 0 20px; padding-left: 20px;'>
            <li>Préparer les fiches de présence de Geovani et Wessley avec le programme Python.</li>
            <li>Entrer les données demandées : mois, année et numéro de contribution d'assistance.</li>
            <li>Déclarer le nombre d'heures.</li>
            <li>Remplir les cases de la contribution d'assistance.</li>
            <li>Cocher, sur la 2e page du formulaire, les heures de nuit effectuées par des amis : <strong>$diff jours</strong> pour ce mois.</li>
            <li>Remettre à l'OCAS le bulletin de salaire de chaque service.</li>
            <li>Ajouter les fiches de présence signées en pièces jointes.</li>
        </ul>

        <h2 style='margin: 24px 0 10px; padding-bottom: 4px; border-bottom: 1px solid #bfdbfe; font-size: 16px; color: #1d4ed8; font-weight: bold;'>Lien utile</h2>
        <p style='margin: 0 0 20px;'>
            <a href='https://ai-remboursement.ocas.ch/connexion?_gl=1*id6kmi*_ga*MzMyNzkwMTE4LjE3MzQxNzY3MzM.*_ga_48788903HS*MTczNzcwNzYxOC4yMC4wLjE3Mzc3MDc2MzcuMC4wLjA.' style='color: #1d4ed8; font-weight: bold;'>Accéder au formulaire de remboursement OCAS</a>
        </p>

        <h2 style='margin: 24px 0 10px; padding-bottom: 4px; border-bottom: 1px solid #bfdbfe; font-size: 16px; color: #1d4ed8; font-weight: bold;'>Contact OCAS</h2>
        <p style='margin: 0 0 24px;'>
            Office AI - Francisco Roma<br>
            Contribution d'assistance, gérant<br>
            +41 22 327 25 86
        </p>

        <p style='margin: 0;'>
            Kamran Nafisspour<br>
            Rue des Vollandes 68<br>
            1207 Genève<br>
            Tél. : (079) 350 2132
        </p>

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

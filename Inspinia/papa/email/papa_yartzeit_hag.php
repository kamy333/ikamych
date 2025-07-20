<?php $IS_PRODUCTION = true; ?>
<?php require_once('../../../includes/initialize.php'); ?>

<?php

if ($IS_PRODUCTION) {
    $secure_password = "yiskor_papa";

// Security Check
    if (!isset($_GET['password']) || $_GET['password'] !== $secure_password) {
        http_response_code(403);
        die("Forbidden: Invalid Password.");
    }
}


$eventDates = [
    // 2025
    "2025-02-22" => "Yahrzeit",
    "2025-04-20" => "Pesach VIII",
    "2025-06-03" => "Shavuot II",
    "2025-10-02" => "Yom Kippur",
    "2025-10-14" => "Shmini Atzeret",

    // 2026

    "2026-02-11" => "Yahrzeit",

    "2026-04-09" => "Pesach VIII",
    "2026-05-23" => "Shavuot II",
    "2026-09-21" => "Yom Kippur",
    "2026-10-03" => "Shmini Atzeret",

    // 2027
    "2027-02-01" => "Yahrzeit",
    "2027-04-29" => "Pesach VIII",
    "2027-06-12" => "Shavuot II",
    "2027-10-11" => "Yom Kippur",
    "2027-10-23" => "Shmini Atzeret",

    // 2028
    "2028-02-21" => "Yahrzeit",
    "2028-04-18" => "Pesach VIII",
    "2028-06-01" => "Shavuot II",
    "2028-09-30" => "Yom Kippur",
    "2028-10-12" => "Shmini Atzeret",

    // 2029
    "2029-02-09" => "Yahrzeit",
    "2029-04-07" => "Pesach VIII",
    "2029-05-21" => "Shavuot II",
    "2029-09-19" => "Yom Kippur",
    "2029-10-01" => "Shmini Atzeret",

    // 2030
    "2030-01-28" => "Yahrzeit",
    "2030-04-25" => "Pesach VIII",
    "2030-06-08" => "Shavuot II",
    "2030-10-07" => "Yom Kippur",
    "2030-10-19" => "Shmini Atzeret",

    // 2031
    "2031-02-17" => "Yahrzeit",
    "2031-04-15" => "Pesach VIII",
    "2031-05-29" => "Shavuot II",
    "2031-09-27" => "Yom Kippur",
    "2031-10-09" => "Shmini Atzeret",

    // 2032
    "2032-02-06" => "Yahrzeit",
    "2032-04-03" => "Pesach VIII",
    "2032-05-17" => "Shavuot II",
    "2032-09-15" => "Yom Kippur",
    "2032-09-27" => "Shmini Atzeret",

    // 2033
    "2033-01-24" => "Yahrzeit",
    "2033-04-21" => "Pesach VIII",
    "2033-06-04" => "Shavuot II",
    "2033-10-03" => "Yom Kippur",
    "2033-10-15" => "Shmini Atzeret",

    // 2034
    "2034-02-13" => "Yahrzeit",
    "2034-04-11" => "Pesach VIII",
    "2034-05-25" => "Shavuot II",
    "2034-09-23" => "Yom Kippur",
    "2034-10-05" => "Shmini Atzeret",

    // 2035
    "2035-02-03" => "Yahrzeit",
    "2035-05-01" => "Pesach VIII",
    "2035-06-14" => "Shavuot II",
    "2035-10-13" => "Yom Kippur",
    "2035-10-25" => "Shmini Atzeret",

    // 2036
    "2036-02-22" => "Yahrzeit",
    "2036-04-19" => "Pesach VIII",
    "2036-06-02" => "Shavuot II",
    "2036-10-01" => "Yom Kippur",
    "2036-10-13" => "Shmini Atzeret",

    // 2037
    "2037-02-09" => "Yahrzeit",
    "2037-04-07" => "Pesach VIII",
    "2037-05-21" => "Shavuot II",
    "2037-09-19" => "Yom Kippur",
    "2037-10-01" => "Shmini Atzeret",

    // 2038
    "2038-01-30" => "Yahrzeit",
    "2038-04-27" => "Pesach VIII",
    "2038-06-10" => "Shavuot II",
    "2038-10-09" => "Yom Kippur",
    "2038-10-21" => "Shmini Atzeret",

    // 2039
    "2039-02-18" => "Yahrzeit",
    "2039-04-16" => "Pesach VIII",
    "2039-05-30" => "Shavuot II",
    "2039-09-28" => "Yom Kippur",
    "2039-10-10" => "Shmini Atzeret",

    // 2040
    "2040-02-08" => "Yahrzeit",
    "2040-04-05" => "Pesach VIII",
    "2040-05-19" => "Shavuot II",
    "2040-09-17" => "Yom Kippur",
    "2040-09-29" => "Shmini Atzeret",

    // 2041
    "2041-01-26" => "Yahrzeit",
    "2041-04-23" => "Pesach VIII",
    "2041-06-06" => "Shavuot II",
    "2041-10-05" => "Yom Kippur",
    "2041-10-17" => "Shmini Atzeret",

    // 2042
    "2042-02-14" => "Yahrzeit",
    "2042-04-12" => "Pesach VIII",
    "2042-05-26" => "Shavuot II",
    "2042-09-24" => "Yom Kippur",
    "2042-10-06" => "Shmini Atzeret",

    // 2043
    "2043-02-04" => "Yahrzeit",
    "2043-05-02" => "Pesach VIII",
    "2043-06-15" => "Shavuot II",
    "2043-10-14" => "Yom Kippur",
    "2043-10-26" => "Shmini Atzeret",

    // 2044
    "2044-02-22" => "Yahrzeit",
    "2044-04-19" => "Pesach VIII",
    "2044-06-02" => "Shavuot II",
    "2044-10-01" => "Yom Kippur",
    "2044-10-13" => "Shmini Atzeret",

    // 2045
    "2045-02-11" => "Yahrzeit",
    "2045-04-09" => "Pesach VIII",
    "2045-05-23" => "Shavuot II",
    "2045-09-21" => "Yom Kippur",
    "2045-10-03" => "Shmini Atzeret",

    // 2046
    "2046-01-31" => "Yahrzeit",
    "2046-04-28" => "Pesach VIII",
    "2046-06-11" => "Shavuot II",
    "2046-10-10" => "Yom Kippur",
    "2046-10-22" => "Shmini Atzeret",

    // 2047
    "2047-02-20" => "Yahrzeit",
    "2047-04-18" => "Pesach VIII",
    "2047-06-01" => "Shavuot II",
    "2047-09-30" => "Yom Kippur",
    "2047-10-12" => "Shmini Atzeret",

    // 2048
    "2048-02-08" => "Yahrzeit",
    "2048-04-05" => "Pesach VIII",
    "2048-05-19" => "Shavuot II",
    "2048-09-17" => "Yom Kippur",
    "2048-09-29" => "Shmini Atzeret",

    // 2049
    "2049-01-27" => "Yahrzeit",
    "2049-04-24" => "Pesach VIII",
    "2049-06-07" => "Shavuot II",
    "2049-10-06" => "Yom Kippur",
    "2049-10-18" => "Shmini Atzeret",

    // 2050
    "2050-02-16" => "Yahrzeit",
    "2050-04-14" => "Pesach VIII",
    "2050-05-28" => "Shavuot II",
    "2050-09-26" => "Yom Kippur",
    "2050-10-08" => "Shmini Atzeret",

    // 2051
    "2051-02-06" => "Yahrzeit",
    "2051-04-04" => "Pesach VIII",
    "2051-05-18" => "Shavuot II",
    "2051-09-16" => "Yom Kippur",
    "2051-09-28" => "Shmini Atzeret",

    // 2052
    "2052-01-25" => "Yahrzeit",
    "2052-04-21" => "Pesach VIII",
    "2052-06-04" => "Shavuot II",
    "2052-10-03" => "Yom Kippur",
    "2052-10-15" => "Shmini Atzeret",

    // 2053
    "2053-02-12" => "Yahrzeit",
    "2053-04-10" => "Pesach VIII",
    "2053-05-24" => "Shavuot II",
    "2053-09-22" => "Yom Kippur",
    "2053-10-04" => "Shmini Atzeret",

    // 2054
    "2054-02-02" => "Yahrzeit",
];


if(!$IS_PRODUCTION){
    $eventDates = [
        '2025-03-30' => 'Yahrzeit',
        '2025-04-02' => 'On est entrain de tester',
    ];
}


$dateAnniv = "date anniversaire";

for ($i = 2026; $i < 2055; $i++) {
    $eventDates["$i-02-22"] = $dateAnniv;
}

//"" =>
//"" => ,
$eventDates['2026-01-17'] = "Fin 11 mois";
$eventDates['2026-02-15'] = "Fin du Kaddish 28 Chevat 5786 Drach Azguir-Azkara-Yahrzeit";


//sort evendates by date
ksort($eventDates);


// Get today's date as DateTime object
$today = new DateTime();
$today->setTime(0, 0); // ignore time part


foreach ($eventDates as $dateStr => $eventName) {

    $eventDate = new DateTime($dateStr);
    $eventDate_lng = $eventDate->format('D, d M Y');
    $interval = $today->diff($eventDate);
    // eventdate previous day
    $eventPriorDay = new DateTime($dateStr);
    $eventPriorDay->modify('-1 day');
    $eventPriorDay_lng = $eventPriorDay->format('D, d M Y');
    $eventPriorDay = $eventPriorDay->format('Y-m-d');


    $daysDiff = (int)$interval->format('%r%a'); // signed difference in days


    // Check if the event is within the next 7 days (inclusive)
    if ($daysDiff >= 0 && $daysDiff <= 7) {

        $subject_en = "Upcoming Event Reminder: $eventName";
        $subject_fr = "Rappel d'événement à venir : $eventName";
        $subject = "Papa Said Nafisspour - " . $subject_en . " - " . $subject_fr;

        $text_en = "Reminder: $eventName is coming on $eventDate_lng";
        $text_fr = "Rappel d'événement à venir : $eventName arrive $eventDate_lng.";

        $textObj_en="<strong>Object :</strong> $subject_en <strong>$eventDate_lng</strong> in <strong>$daysDiff</strong> days(jours) from today";
        $textObj_fr="<strong>Objet :</strong> $subject_fr <strong>$eventDate_lng</strong> dans <strong>$daysDiff</strong> days(jours) à partir de aujourd'hui";


        if ($eventName == "Yahrzeit") {
            $title = "Death anniversary papa - " . $dateStr;

            $text_en = "Reminder: $eventName  is coming on $eventDate_lng  in $daysDiff days.";
            $text_en .= "The date before the event is on $eventPriorDay_lng  (23 Shevat) light a candle";
            $text_en .= "<br>correspond to hebraic date of death of Dad 24 Shevat (February 22nd 2025 which was 24 Shevat 5785).";

            $text_fr = "Rappel d'événement à venir : $eventName arrive $eventDate_lng dans $daysDiff jours.";
            $text_fr .= "La jour précedent l'événement le $eventPriorDay ( (23 Shevat) allumer une bougie.";
            $text_fr .= "<br>représente la date hébraique du déces de Papa 24 Shevat (22 février 2025 = 24 Shevat 5785).";

//            $text_en2="The date before the event is of $dateStr the $eventPriorDay light a candle";
//            $text_fr2="The date before the event is of $dateStr the $eventPriorDay light a candle";

            $text_en2 = "Light a candle on day prior $eventPriorDay_lng (23 Shevat).  ";
            $text_fr2 = "Allumer une bougie 24h le $eventPriorDay_lng (23 Shevat).";


        } else {
            $title = $eventName;
        }

        if ($eventName == $dateAnniv) {
            $isSendGermaine = true;
        } else {
            $isSendGermaine = false;

        }

        if ($dateStr = '2025-01-17' || $dateStr = '2026-02-15') {
//            $title = '';
        }

        $date_today = $today->format('D, d M Y');



        $message = "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$title</title>
    </head>
    <body>

    <div lang='fr' style='background-color: white; margin: 10px; border-radius: 5px; text-align: left'>
    
    <p><b>AUTOMATIC EMAIL</b>  $date_today</p>
     
     <div style='color:blue'>
     <p>$textObj_en</p>
     <p>$text_en</p>
      <p>$text_en2</p>
    </div>
    
    
    <p style='text-align: center'>------------------------------------------------------------------------------</p>
    
    <div style='color: blueviolet'>
     <p>$textObj_fr</p>
     <p>$text_fr</p>
     <p>$text_fr2</p>
    </div>
    <p>Kamran,</p>
    

    </div>
    </body>
</html>

";


//        $message .= "Reminder: $eventName is coming on $dateStr (" . $eventDate->format('l') . ").";

        if (!$IS_PRODUCTION) {
            echo "Subject: " . $subject;
//            echo "<br>";
//            echo "Date: $dateStr";
//            echo "<br>";
            echo $message;
//            return;
        }

        $mail = new MyPHPMailer();


        try {
//            $from_name = "ikamy.ch";
            $from_name = "PAPA SAID EVENT REMINDER <nafisspour@bluewin.ch>\r\n";;

            $from_email = "kamy@ikamy.ch";
            // Server settings
            $mail->SMTPDebug = 0; // Enables verbose debug output

// Recipients
            $mail->setFrom($from_email, $from_name);
            $mail->addAddress('nafisspour@bluewin.ch');
            $mail->addAddress('kamran.nafisspour@gmail.com');

            if ($IS_PRODUCTION) {
                $mail->addAddress('carolinerashtian@gmail.com');
                $mail->addAddress('michaelrashtian@gmail.com');
                $mail->addAddress('fsoofer@roadrunner.com');
                $mail->addAddress('desireeabdian@gmail.com');
                $mail->addAddress('');


                if ($isSendGermaine) {
                    $mail->addAddress('germaine.chatenet@gmail.com');
                }
            }

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            echo "<p style='color: #0aa66e;'><b>Email sent successfully.</b></p> ";

        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    } else {
        echo 'Today: ' . $today->format('Y-m-d');
        echo '<br>';
        echo "No email to send today.";

    }
}


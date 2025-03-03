<?php

function isCalendarPast():bool{
    if (isset($_GET["type"]) && $_GET["type"] == "Past") {
        return true;
    } else {
        return false;
    }
}

function set_json_data($data, $filename = "data.json"): void
{
    //give me as input an array and I will save it in a json file
//    $data['date'] = date('Y-m-d H:i:s');
    $json = json_encode($data, JSON_PRETTY_PRINT);
//    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
    file_put_contents($filename, $json);
}

function get_json_data($filename = "data.json"): array
{
    $json = file_get_contents($filename);
    if ($json === false) {
        die('Error reading the JSON file');
    }

    $json = mb_convert_encoding($json, 'UTF-8', 'UTF-8');

    $data = json_decode($json, true);
    if ($data === null) {
        die('Error decoding JSON: ' . json_last_error_msg());
    }

    return $data;
}

function sendErrorEmail($msg="Error: send email missing code please check with the administrator")
{

//    global $session;
    $mail = new MyPHPMailer();
    $mail->addAddress('nafisspour@bluewin.ch');
    $mail->addAddress('kamy333@hotmail.com');
    $message = "<p style='color: red'> &nbsp;&nbsp;$msg</p>";
    $mail->isHTML();
    $mail->Subject = "$msg";
    $mail->Body = $message;
    $mail->send();
//    $session->message("Error: send email missing code please check with the administrator");

}
<?php
$username="kamy";
$password="shalom";

$postRequest = ["username"=>$username,"password"=>$password];
$post=json_encode($postRequest);

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => "https://ikamy.ch/api/login.php",
    CURLOPT_CUSTOMREQUEST=>"POST",
    CURLOPT_POSTFIELDS =>$post]);  //Method GET,PUT or PATCH,POST,DELETE

$apiResponse = curl_exec($ch);
curl_close($ch);

$jsonArrayResponse = json_decode($apiResponse,true);
$token= $jsonArrayResponse["access_token"];


$ch = curl_init();
$headers = [
    "Authorization: Bearer $token"
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => "https://www.ikamy.ch/api/tasks",
    CURLOPT_CUSTOMREQUEST=>"GET"]);  //Method GET,PUT or PATCH,POST,DELETE

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

//echo $status_code, "\n";
//echo $status_type,"\n\n";
//echo $status_length,"\n";

//print_r($response_headers);

echo $response, "\n";










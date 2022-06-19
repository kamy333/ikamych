<?php

//$response= file_get_contents("https://randomuser.me/api");
//$data=json_decode($response,true);
//var_dump($data);

$ch = curl_init();
$headers = [
    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCIwIjoiYWxnPT5IUzI1NiJ9.eyJzdWIiOjEsIm5hbWUiOiJLYW1yYW4iLCJ1c2VyX3R5cGVfaWQiOjF9.NBHmfr3_GRs-6PgW_C5qANuy59UlK1GnxNMRZ-BQ6pI"
];
$response_headers = [];
//$header_callback = function ($ch, $header) use (&$response_headers) {
//    $len = strlen($header);
//    $parts=explode(":", $header,2);
//    if (count($parts) < 2) {
//        return $len;
//    }
//    $response_headers[$parts[0]]=trim($parts[1]);
//    return $len;
//};

//curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//curl_setopt($ch, CURLOPT_HEADER,true); // get header
//curl_setopt($ch, CURLOPT_HEADERFUNCTION, $header_callback); // get header


curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => "https://www.ikamy.ch/api/tasks",
    CURLOPT_CUSTOMREQUEST=>"GET"]);  //Method GET,PUT or PATCH,POST,DELETE

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//$status_type=curl_getinfo($ch,CURLINFO_CONTENT_TYPE);
//$status_length=curl_getinfo($ch,CURLINFO_CONTENT_LENGTH_DOWNLOAD);



curl_close($ch);

echo $status_code, "\n";
//echo $status_type,"\n\n";
//echo $status_length,"\n";

print_r($response_headers);

echo $response, "\n";
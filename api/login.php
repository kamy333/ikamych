<?php

declare(strict_types=1);
require __DIR__ . "/bootstrap.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    header("Allow: POST");
    exit();
}

$data = (array)json_decode(file_get_contents("php://input"), true);


if (!array_key_exists("username", $data) || !array_key_exists("password", $data)) {
    http_response_code(400);
    echo json_encode(["message" => "missing login credentials"]);
    exit();
} else {
    $username = trim($data["username"]);
    $password = trim($data["password"]);
}

$database = new Database(DB_SERVER, DB_NAME_API, DB_USER, DB_PASS);
$user_gateway = new UserGateway($database);
$user = $user_gateway->authenticate($username, $password);

if ($user === false) {
    http_response_code(401);
    echo json_encode(["message" => "invalid authentication."]);
    exit();
}

$payload = [
    "sub" => $user["id"], // as jwt id becomes sub
    "name" => $user["name"],
    "user_type_id" => $user["user_type_id"]];
//$access_token = base64_encode(json_encode($payload));

$codec = new JWTCodec(SECRET_KEY);
$access_token = $codec->encode($payload);

echo json_encode(["access_token" => $access_token]);
//echo json_encode("successful authentication");
//echo base64_decode("eyJpZCI6OCwibmFtZSI6InBhYmxvIn0=");
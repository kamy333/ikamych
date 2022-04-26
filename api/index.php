<?php
declare(strict_types=1);

require "init.php";
set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

$path=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
$parts=explode("/", $path);
//print_r($parts);

$resource=$parts[2];
$id=$parts[3] ?? null;


if($resource !="tasks"){
    http_response_code(404);
    exit;
}

//echo DB_SERVER, DB_NAME, DB_USER, DB_PASS;

$database= new Database(DB_SERVER, DB_NAME_API, DB_USER, DB_PASS);
//$database->getConnection();

header("Content-type: application/json;charset=UTF-8");

$task_gateway=new TaskGateway($database);
$controller=new TaskController($task_gateway);
$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
<?php
declare(strict_types=1);
require dirname(__DIR__)."/bootstrap.php";
$database = new Database(DB_SERVER, DB_NAME_API, DB_USER, DB_PASS);
$user_id=1;

$user=new UserGateway($database);
$data=$user->getAll();

//
//$task_gateway=new TaskGateway($database);
//$data=$task_gateway->getAll();

var_dump($data);




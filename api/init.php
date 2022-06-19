<?php
ob_start(); // output buffering is turned on
spl_autoload_register(function ($class){
    if(file_exists(dirname(__DIR__).'/api_class/' . $class . '.php')){
        include dirname(__DIR__).'/api_class/' . $class . '.php';
    }
    if(file_exists(dirname(__DIR__).'/includes/' . $class . '.php')){
        include dirname(__DIR__).'/includes/' . $class . '.php';
    }

});
require_once dirname(__DIR__)."/includes/config.php";
require_once dirname(__DIR__)."/api_function/functions.php";
require_once dirname(__DIR__)."/api_function/validation_functions.php";

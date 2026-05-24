<?php

// Copy this file to transmed/lib/config/config.php on each environment.
// Never commit real credentials in transmed/lib/config/config.php.

$server_name = $_SERVER['SERVER_NAME'] ?? 'localhost';
$server_local_names = array('localhost', '127.0.0.1', '::1', 'ikamy.local');
$server_phpstorm = 'PhpStorm';

defined('LOCALHOST_FOLDER') ? null : define('LOCALHOST_FOLDER', 'ikamych');

if (in_array($server_name, $server_local_names, true) || $server_name === $server_phpstorm) {
    defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
    defined('DB_USER') ? null : define('DB_USER', 'root');
    defined('DB_PASS') ? null : define('DB_PASS', 'change-me');
    $prefix = '';
} else {
    defined('DB_SERVER') ? null : define('DB_SERVER', 'production-db-host');
    defined('DB_USER') ? null : define('DB_USER', 'production-db-user');
    defined('DB_PASS') ? null : define('DB_PASS', 'production-db-password');
    $prefix = '';
}

defined('DB_NAME') ? null : define('DB_NAME', $prefix . 'transmed_database_name');
defined('DB_NAME_API') ? null : define('DB_NAME_API', $prefix . 'api_database_name');

defined('EMAIL_USERNAME') ? null : define('EMAIL_USERNAME', 'user@example.com');
defined('EMAIL_PASSWORD') ? null : define('EMAIL_PASSWORD', 'email-password');
defined('MY_HOST') ? null : define('MY_HOST', 'mail.example.com');

defined('SECRET_KEY') ? null : define('SECRET_KEY', 'replace-with-random-secret');

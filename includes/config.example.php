<?php

// Optional fallback config file.
// Copy this file to includes/config.php only when the server cannot provide
// IKAMY_* environment variables. Never commit real credentials.

$server_name = $_SERVER['SERVER_NAME'] ?? 'localhost';
$server_local_names = ['localhost', '127.0.0.1', '::1', 'ikamy.local'];
$server_phpstorm = 'PhpStorm';

defined('LOCALHOST_FOLDER') ? null : define('LOCALHOST_FOLDER', 'ikamych');

if (in_array($server_name, $server_local_names, true) || $server_name === $server_phpstorm) {
    defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
    defined('DB_USER') ? null : define('DB_USER', 'root');
    defined('DB_PASS') ? null : define('DB_PASS', 'change-me');
    ini_set('display_errors', 'On');
} else {
    defined('DB_SERVER') ? null : define('DB_SERVER', 'production-db-host');
    defined('DB_USER') ? null : define('DB_USER', 'production-db-user');
    defined('DB_PASS') ? null : define('DB_PASS', 'production-db-password');
    ini_set('display_errors', 'Off');
}

$prefix = '';
defined('DB_NAME') ? null : define('DB_NAME', $prefix . 'database_name');
defined('DB_NAME_API') ? null : define('DB_NAME_API', $prefix . 'api_database_name');

defined('EMAIL_USERNAME') ? null : define('EMAIL_USERNAME', 'user@example.com');
defined('EMAIL_PASSWORD') ? null : define('EMAIL_PASSWORD', 'email-password');
defined('MY_HOST') ? null : define('MY_HOST', 'mail.example.com');
defined('MY_PORT') ? null : define('MY_PORT', 587);

defined('SECRET_KEY') ? null : define('SECRET_KEY', 'replace-with-random-secret');
defined('CODE_CALENDAR') ? null : define('CODE_CALENDAR', 'replace-with-calendar-code');
defined('BOOKING_MYEXPENSE_TOKEN') ? null : define('BOOKING_MYEXPENSE_TOKEN', 'replace-with-random-booking-token');
defined('MEDICAL_CERTIFICATE_REMINDER_TOKEN') ? null : define('MEDICAL_CERTIFICATE_REMINDER_TOKEN', 'replace-with-random-medical-certificate-token');
defined('CONTRIBUTION_ASSISTANCE_REMINDER_TOKEN') ? null : define('CONTRIBUTION_ASSISTANCE_REMINDER_TOKEN', 'replace-with-random-contribution-assistance-token');
defined('PAPA_EVENT_REMINDER_TOKEN') ? null : define('PAPA_EVENT_REMINDER_TOKEN', 'replace-with-random-papa-event-token');
defined('DAILY_PSALM_TOKEN') ? null : define('DAILY_PSALM_TOKEN', 'replace-with-random-daily-psalm-token');

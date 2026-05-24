<?php

$ikamy_config_dir = defined('LIB_PATH') ? LIB_PATH : __DIR__;
$ikamy_config_path = $ikamy_config_dir . DIRECTORY_SEPARATOR . 'config.php';

function ikamy_env_value($key)
{
    $value = getenv($key);
    if ($value !== false && $value !== '') {
        return $value;
    }

    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }

    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
        return $_SERVER[$key];
    }

    return null;
}

function ikamy_define_config($constant, $env_key, $required = true, $default = null)
{
    if (defined($constant)) {
        return;
    }

    $value = ikamy_env_value($env_key);
    if ($value === null) {
        $value = $default;
    }

    if ($required && ($value === null || $value === '')) {
        throw new RuntimeException("Missing required configuration value: {$env_key}");
    }

    define($constant, $value);
}

$ikamy_env_keys = [
    'IKAMY_DB_SERVER',
    'IKAMY_DB_USER',
    'IKAMY_DB_PASS',
    'IKAMY_DB_NAME',
    'IKAMY_DB_NAME_API',
    'IKAMY_EMAIL_USERNAME',
    'IKAMY_EMAIL_PASSWORD',
    'IKAMY_MAIL_HOST',
    'IKAMY_MAIL_PORT',
    'IKAMY_SECRET_KEY',
    'IKAMY_CODE_CALENDAR',
    'IKAMY_BOOKING_MYEXPENSE_TOKEN',
    'IKAMY_MEDICAL_CERTIFICATE_REMINDER_TOKEN',
    'IKAMY_CONTRIBUTION_ASSISTANCE_REMINDER_TOKEN',
    'IKAMY_PAPA_EVENT_REMINDER_TOKEN',
    'IKAMY_DAILY_PSALM_TOKEN',
];

$ikamy_use_env_config = false;
foreach ($ikamy_env_keys as $ikamy_env_key) {
    if (ikamy_env_value($ikamy_env_key) !== null) {
        $ikamy_use_env_config = true;
        break;
    }
}

if ($ikamy_use_env_config) {
    $server_name = $_SERVER['SERVER_NAME'] ?? 'localhost';
    $server_local_names = ['localhost', '127.0.0.1', '::1', 'ikamy.local'];
    $server_phpstorm = 'PhpStorm';
    $is_local = in_array($server_name, $server_local_names, true) || $server_name === $server_phpstorm;

    defined('LOCALHOST_FOLDER') ? null : define('LOCALHOST_FOLDER', ikamy_env_value('IKAMY_LOCALHOST_FOLDER') ?: 'ikamych');

    ikamy_define_config('DB_SERVER', 'IKAMY_DB_SERVER');
    ikamy_define_config('DB_USER', 'IKAMY_DB_USER');
    ikamy_define_config('DB_PASS', 'IKAMY_DB_PASS');
    ikamy_define_config('DB_NAME', 'IKAMY_DB_NAME');
    ikamy_define_config('DB_NAME_API', 'IKAMY_DB_NAME_API');

    ikamy_define_config('EMAIL_USERNAME', 'IKAMY_EMAIL_USERNAME');
    ikamy_define_config('EMAIL_PASSWORD', 'IKAMY_EMAIL_PASSWORD');
    ikamy_define_config('MY_HOST', 'IKAMY_MAIL_HOST');
    ikamy_define_config('MY_PORT', 'IKAMY_MAIL_PORT', false, 587);

    ikamy_define_config('SECRET_KEY', 'IKAMY_SECRET_KEY');
    ikamy_define_config('CODE_CALENDAR', 'IKAMY_CODE_CALENDAR');
    ikamy_define_config('BOOKING_MYEXPENSE_TOKEN', 'IKAMY_BOOKING_MYEXPENSE_TOKEN', false, null);
    ikamy_define_config('MEDICAL_CERTIFICATE_REMINDER_TOKEN', 'IKAMY_MEDICAL_CERTIFICATE_REMINDER_TOKEN', false, null);
    ikamy_define_config('CONTRIBUTION_ASSISTANCE_REMINDER_TOKEN', 'IKAMY_CONTRIBUTION_ASSISTANCE_REMINDER_TOKEN', false, null);
    ikamy_define_config('PAPA_EVENT_REMINDER_TOKEN', 'IKAMY_PAPA_EVENT_REMINDER_TOKEN', false, null);
    ikamy_define_config('DAILY_PSALM_TOKEN', 'IKAMY_DAILY_PSALM_TOKEN', false, null);

    $display_errors = ikamy_env_value('IKAMY_DISPLAY_ERRORS');
    if ($display_errors === null) {
        $display_errors = $is_local ? 'On' : 'Off';
    }
    ini_set('display_errors', $display_errors);
} elseif (is_file($ikamy_config_path)) {
    require_once($ikamy_config_path);
} else {
    throw new RuntimeException('Missing application configuration. Create includes/config.php or set IKAMY_* environment variables.');
}

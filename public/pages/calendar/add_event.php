<?php
// add_event.php

// Simulating a database for events storage
session_start();
if (!isset($_SESSION['events'])) {
    $_SESSION['events'] = [];
}
$events = &$_SESSION['events'];

// Sanitize and trim input data
function sanitize_input($data, $max_length = 255) {
    if (is_array($data)) {
        return '';
    }

    return htmlspecialchars(substr(trim((string)$data), 0, $max_length), ENT_QUOTES, 'UTF-8');
}

function request_id($source) {
    if (!isset($source['id'])) {
        return null;
    }

    $id = filter_var($source['id'], FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1],
    ]);

    return $id === false ? null : $id;
}

function json_response(array $payload, int $status_code = 200) {
    http_response_code($status_code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload);
    exit();
}

// Validate input data
function validate_input($data) {
    $errors = [];

    if (empty($data['title'])) {
        $errors[] = "Title is required.";
    }

    if (empty($data['person'])) {
        $errors[] = "Person is required.";
    }

    if (empty($data['start_date'])) {
        $errors[] = "Start date is required.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data['start_date'])) {
        $errors[] = "Invalid date format.";
    } else {
        [$year, $month, $day] = array_map('intval', explode('-', $data['start_date']));
        if (!checkdate($month, $day, $year)) {
            $errors[] = "Invalid date.";
        }
    }

    if (!empty($data['start_time']) && !valid_time($data['start_time'])) {
        $errors[] = "Invalid time format.";
    }

    if (!empty($data['end_time']) && !valid_time($data['end_time'])) {
        $errors[] = "Invalid time format.";
    }

    return $errors;
}

function valid_time($time) {
    if (!preg_match('/^\d{2}:\d{2}$/', $time)) {
        return false;
    }

    [$hour, $minute] = array_map('intval', explode(':', $time));
    return $hour >= 0 && $hour <= 23 && $minute >= 0 && $minute <= 59;
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = request_id($_POST);
    $person = isset($_POST['person']) ? sanitize_input($_POST['person']) : null;
    $title = isset($_POST['title']) ? sanitize_input($_POST['title']) : null;
    $start_date = isset($_POST['start_date']) ? sanitize_input($_POST['start_date']) : null;
    $start_time = isset($_POST['start_time']) ? sanitize_input($_POST['start_time']) : null;
    $end_time = isset($_POST['end_time']) ? sanitize_input($_POST['end_time']) : null;
    $comment = isset($_POST['comment']) ? sanitize_input($_POST['comment']) : null;
    $input_date = isset($_POST['input_date']) ? sanitize_input($_POST['input_date']) : date('Y-m-d');
    $action = isset($_POST['action']) ? sanitize_input($_POST['action'], 20) : 'add';

    $input_data = [
        'id' => $id,
        'person' => $person,
        'title' => $title,
        'start_date' => $start_date,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'comment' => $comment,
        'input_date' => $input_date
    ];

    $errors = validate_input($input_data);

    if (!empty($errors)) {
        json_response(['errors' => $errors], 422);
    }

    $start_datetime = $start_date . ' ' . $start_time;

    if ($action !== '') {
        if ($action === 'edit' && $id !== null) {
            // Edit existing event
            foreach ($events as &$event) {
                if ((int)$event['id'] === (int)$id) {
                    $event['person'] = $person;
                    $event['title'] = $title;
                    $event['start_date'] = $start_date;
                    $event['start_time'] = $start_time;
                    $event['start_datetime'] = $start_datetime;
                    $event['end_time'] = $end_time;
                    $event['comment'] = $comment;
                    $event['input_date'] = $input_date;
                    break;
                }
            }
        } elseif ($action === 'copy') {
            // Copy existing event
            $new_event = [
                'id' => count($events) + 1,
                'person' => $person,
                'title' => $title,
                'start_date' => $start_date,
                'start_time' => $start_time,
                'start_datetime' => $start_datetime,
                'end_time' => $end_time,
                'comment' => $comment,
                'input_date' => $input_date
            ];
            $events[] = $new_event;
        } elseif ($action === 'delete' && $id !== null) {
            // Delete existing event
            foreach ($events as $key => $event) {
                if ((int)$event['id'] === (int)$id) {
                    unset($events[$key]);
                    $events = array_values($events); // Re-index array
                    break;
                }
            }
        } else {
            // Add new event
            $new_event = [
                'id' => count($events) + 1,
                'person' => $person,
                'title' => $title,
                'start_date' => $start_date,
                'start_time' => $start_time,
                'start_datetime' => $start_datetime,
                'end_time' => $end_time,
                'comment' => $comment,
                'input_date' => $input_date
            ];
            $events[] = $new_event;
        }
    }

    header('Location: calendar.php');
    exit();
}

// Handle GET request for editing
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = request_id($_GET);
    if ($id === null) {
        json_response(['error' => 'A valid event ID is required.'], 400);
    }

    $event_to_edit = null;
    foreach ($events as $event) {
        if ((int)$event['id'] === (int)$id) {
            $event_to_edit = $event;
            break;
        }
    }

    if ($event_to_edit) {
        json_response($event_to_edit);
    } else {
        json_response(['error' => 'Event not found.'], 404);
    }
}

// Default response for unsupported requests
json_response(['error' => 'Unsupported request method.'], 405);

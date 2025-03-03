<?php
// add_event.php

// Simulating a database for events storage
session_start();
if (!isset($_SESSION['events'])) {
    $_SESSION['events'] = [];
}
$events = &$_SESSION['events'];

// Sanitize and trim input data
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
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
    }

    if (!empty($data['start_time']) && !preg_match('/^\d{2}:\d{2}$/', $data['start_time'])) {
        $errors[] = "Invalid time format.";
    }

    if (!empty($data['end_time']) && !preg_match('/^\d{2}:\d{2}$/', $data['end_time'])) {
        $errors[] = "Invalid time format.";
    }

    return $errors;
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? sanitize_input($_POST['id']) : null;
    $person = isset($_POST['person']) ? sanitize_input($_POST['person']) : null;
    $title = isset($_POST['title']) ? sanitize_input($_POST['title']) : null;
    $start_date = isset($_POST['start_date']) ? sanitize_input($_POST['start_date']) : null;
    $start_time = isset($_POST['start_time']) ? sanitize_input($_POST['start_time']) : null;
    $end_time = isset($_POST['end_time']) ? sanitize_input($_POST['end_time']) : null;
    $comment = isset($_POST['comment']) ? sanitize_input($_POST['comment']) : null;
    $input_date = isset($_POST['input_date']) ? sanitize_input($_POST['input_date']) : date('Y-m-d');

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
        echo json_encode(['errors' => $errors]);
        exit();
    }

    $start_datetime = $start_date . ' ' . $start_time;

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'edit' && $id !== null) {
            // Edit existing event
            foreach ($events as &$event) {
                if ($event['id'] == $id) {
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
        } elseif ($_POST['action'] === 'copy') {
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
        } elseif ($_POST['action'] === 'delete' && $id !== null) {
            // Delete existing event
            foreach ($events as $key => $event) {
                if ($event['id'] == $id) {
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
    $id = sanitize_input($_GET['id']);
    $event_to_edit = null;
    foreach ($events as $event) {
        if ($event['id'] == $id) {
            $event_to_edit = $event;
            break;
        }
    }

    if ($event_to_edit) {
        echo json_encode($event_to_edit);
        exit();
    } else {
        echo json_encode(['error' => 'Event not found.']);
        exit();
    }
}

// Default response for unsupported requests
echo json_encode(['error' => 'Unsupported request method.']);
exit();

<?php
require_once('../../includes/initialize.php');

header('Content-Type: application/json');

$response = [
    'status' => 'error',
    'message' => 'An unknown error occurred.'
];

try {
    if (!defined('BOOKING_MYEXPENSE_TOKEN') || BOOKING_MYEXPENSE_TOKEN === '') {
        http_response_code(503);
        throw new Exception("Booking endpoint is not configured.");
    }

    $provided_token = isset($_GET['token']) ? (string) $_GET['token'] : '';
    if ($provided_token === '' || !hash_equals((string) BOOKING_MYEXPENSE_TOKEN, $provided_token)) {
        http_response_code(401);
        throw new Exception("Unauthorized");
    }

    $amount = isset($_GET['amount']) ? (float) $_GET['amount'] : 0;
    $is_cash = isset($_GET['iscash']) ? (int) $_GET['iscash'] : 0;
    $comment = trim((string) ($_GET['comment'] ?? ''));
    $document = trim((string) ($_GET['document'] ?? ''));
    $person_name = trim((string) ($_GET['personName'] ?? ''));
    $expense_type_name = trim((string) ($_GET['expensetype'] ?? ''));
    $ccy_name = strtoupper(trim((string) ($_GET['ccy'] ?? 'CHF')));
    $rate = isset($_GET['rate']) ? (float) $_GET['rate'] : 1;

    if ($person_name === '' || $expense_type_name === '' || $amount <= 0) {
        throw new Exception("Missing or invalid required parameters (personName, expensetype, amount).");
    }
    if (!in_array($is_cash, [0, 1], true)) {
        throw new Exception("Invalid iscash value.");
    }
    if ($rate <= 0) {
        throw new Exception("Invalid rate value.");
    }
    if (strlen($comment) > 500 || strlen($document) > 255 || strlen($person_name) > 100 || strlen($expense_type_name) > 100 || strlen($ccy_name) !== 3) {
        throw new Exception("One or more parameters are too long.");
    }

    $person = MyExpensePerson::find_by_name($person_name);
    if (!$person) {
        throw new Exception("Person '{$person_name}' not found.");
    }
    $person_id = $person->id;

    $expense_type = MyExpenseType::find_by_name($expense_type_name);
    if (!$expense_type) {
        throw new Exception("Expense type '{$expense_type_name}' not found.");
    }
    $expense_type_id = $expense_type->id;

    $currency = Currency::find_by_name($ccy_name);
    if (!$currency) {
        throw new Exception("Currency '{$ccy_name}' not found.");
    }
    $ccy_id = $currency->id;

    $expense = new MyExpense();
    $expense->amount = $amount;
    $expense->cash = $is_cash;
    $expense->comment = $comment;
    $expense->document = $document;
    $expense->person_id = $person_id;
    $expense->expense_type_id = $expense_type_id;
    $expense->ccy_id = $ccy_id;
    $expense->rate = $rate;
    $expense->expense_date = date('Y-m-d H:i:s');
    $expense->modification_time = date('Y-m-d H:i:s');

    if ($expense->save()) {
        http_response_code(200);
        $response['status'] = 'success';
        $response['message'] = 'Booking created successfully.';
        $response['data'] = ['id' => $expense->id];
    } else {
        throw new Exception("Failed to save the data to the database.");
    }

} catch (Exception $e) {
    if (http_response_code() < 400) {
        http_response_code(400);
    }
    $response['status'] = 'error';
    $response['message'] = $e->getMessage();
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

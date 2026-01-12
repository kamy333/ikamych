<?php
require_once('../../includes/initialize.php');

// TODO: Replace 'YOUR_SECRET_TOKEN' with your actual secret token.
// You should also consider a more secure way to pass the token than a GET parameter.
$secret_token = 'YOUR_SECRET_TOKEN_IS_KAMY';
$provided_token = isset($_GET['token']) ? $_GET['token'] : null;

if ($provided_token !== $secret_token) {
    header("HTTP/1.1 401 Unauthorized");
    die("Unauthorized");
}

$amount = isset($_GET['amount']) ? (float)$_GET['amount'] : 0;
$is_cash = isset($_GET['iscash']) ? (int)$_GET['iscash'] : 0;
$comment = isset($_GET['comment']) ? urldecode($_GET['comment']) : '';
$document = isset($_GET['document']) ? urldecode($_GET['document']) : '';
$person_name = isset($_GET['personName']) ? urldecode($_GET['personName']) : '';
$expense_type_name = isset($_GET['expensetype']) ? urldecode($_GET['expensetype']) : '';
$ccy_name = isset($_GET['ccy']) ? urldecode($_GET['ccy']) : 'CHF';
$rate = isset($_GET['rate']) ? (float)$_GET['rate'] : 1;


if (empty($person_name) || empty($expense_type_name) || $amount == 0) {
    header("HTTP/1.1 400 Bad Request");
    die("Error: Missing required parameters (personName, expensetype, amount).");
}

$person = MyExpensePerson::find_by_name($person_name);
if (!$person) {
    header("HTTP/1.1 400 Bad Request");
    die("Error: Person '{$person_name}' not found.");
}
$person_id = $person->id;

$expense_type = MyExpenseType::find_by_name($expense_type_name);
if (!$expense_type) {
    header("HTTP/1.1 400 Bad Request");
    die("Error: Expense type '{$expense_type_name}' not found.");
}
$expense_type_id = $expense_type->id;

//$currency = Currency::find_by_name($ccy_name);
$currency = Currency::find_by_name($ccy_name);
if (!$currency) {
    header("HTTP/1.1 400 Bad Request");
    die("Error: Currency '{$ccy_name}' not found.");
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
    echo "Successfully booked new expense with ID: " . $expense->id;
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo "Error booking expense.";
}

?>

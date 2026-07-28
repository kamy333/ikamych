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
    // MODIFICATION : accepte l'ancien paramètre "ccy" ainsi que le paramètre
    // "currency" envoyé par l'application Kamy Utility.
    $ccy_name = strtoupper(trim((string) (
        $_GET['ccy'] ?? $_GET['currency'] ?? 'CHF'
    )));
    $rate = isset($_GET['rate']) ? (float) $_GET['rate'] : 1;

    // MODIFICATION : lit et valide le toggle Kamy/MAM envoyé par l'application.
    // 0 dirige vers MyExpense (Kamy) ; 1 vers MyExpenseMumPost (MAM).
    $is_mum_kamy = filter_var(
        $_GET['isMumKamy'] ?? null,
        FILTER_VALIDATE_INT
    );

    if (
        $is_mum_kamy === false ||
        !in_array($is_mum_kamy, [0, 1], true)
    ) {
        throw new Exception("Invalid isMumKamy value.");
    }

    // MODIFICATION : utilise la date choisie dans Kamy Utility au lieu de la
    // remplacer silencieusement par la date actuelle du serveur.
    $expense_date_raw = trim((string) ($_GET['expense_date'] ?? ''));
    $expense_date = DateTimeImmutable::createFromFormat(
        '!Y-m-d',
        $expense_date_raw
    );

    if (
        $expense_date === false ||
        $expense_date->format('Y-m-d') !== $expense_date_raw
    ) {
        throw new Exception(
            "Invalid expense_date; expected YYYY-MM-DD."
        );
    }
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

    // MODIFICATION : choisit le modèle de base de données selon le toggle.
    // MyExpense écrit dans "myexpense" ; MyExpenseMumPost écrit dans
    // "myexpensemumpost".
    if ($is_mum_kamy === 1) {
        $expense = new MyExpenseMumPost();
        $target_account = 'mum_post';
    } else {
        $expense = new MyExpense();
        $target_account = 'kamy';
    }
    $expense->amount = $amount;
    $expense->cash = $is_cash;
    $expense->comment = $comment;
    $expense->document = $document;
    $expense->person_id = $person_id;
    $expense->expense_type_id = $expense_type_id;
    $expense->ccy_id = $ccy_id;
    $expense->rate = $rate;
    // MODIFICATION : enregistre la date validée choisie dans l'application.
    // Le "!" du format initialise l'heure à 00:00:00.
    $expense->expense_date = $expense_date->format('Y-m-d H:i:s');
    $expense->modification_time = date('Y-m-d H:i:s');

    if ($expense->save()) {
        http_response_code(200);
        $response['status'] = 'success';
        $response['message'] = 'Booking created successfully.';
        // MODIFICATION : renvoie le compte et la date utilisés afin de
        // faciliter leur vérification depuis Kamy Utility.
        $response['data'] = [
            'id' => $expense->id,
            'account' => $target_account,
            'expense_date' => $expense->expense_date
        ];
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

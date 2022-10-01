<?php require_once('../../../includes/initialize.php'); ?>
<?php if (isset($session)) {
    $session->confirmation_protected_page();
} ?>

<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>


<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>


<?php

Function BookMyExpense($amount,$comment){

}

$amount=1000;
$comment="test comment";
$document="test document";
$person_id=2;
$expense_type_id=1;

/** @noinspection PhpObjectFieldsAreOnlyWrittenInspection */
$expense= new MyExpense();
$expense->amount=$amount;
$expense->is_cash=1;
$expense->comment=$comment;
$expense->document=$document;
$expense->person_id=$person_id;
$expense->expense_type_id=$expense_type_id;
//$expense->create();


?>

<?php

$query = explode('&', $_SERVER['QUERY_STRING']);
$params = array();
foreach ($query as $param) {
    list($name, $value) = explode('=', $param, 2);
    $params[urldecode($name)][] = urldecode($value);

}

?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
<?php require_once('../../../includes/initialize.php'); ?>
<?php if (isset($session)) {
    $session->confirmation_protected_page();
} ?>

<?php //if (User::is_employee()) {
//    redirect_to('index.php');
//} ?>

<?php

if (isset($_GET["amount1"])) {
    $amount1 = $_GET["amount1"];
} else {
    $amount1 = 0;
}

if (isset($_GET["amount2"])) {
    $amount2 = $_GET["amount2"];
} else {
    $amount2 = 0;
}


?>

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

//echo "helloooo";

if (1 == 2) {
    $myexp = MyExpense::find_by_id(126);
    echo $myexp->send_email_testing();
}


$output = "";

$output .= "<form class='form-inline' action='" . $_SERVER['PHP_SELF'] . "' method='get' name='amount'>
Amount Geovani: <input type='number' value='{$amount1}' class='input-small' name='amount1' placeholder='amount'>
Amount Alex: <input type='number' value='{$amount2}' class='input-small' name='amount2' placeholder='amount'>
<input type='submit' class='btn'>
</form>";

$output .= "<br><br><p>Bonjour Nico,<br>
J’espère que tu vas bien.<br><br>
Je vais t’envoyer de l’argent sur ton compte :<br><br>
";
$output .= "";

//$output .= "<form name='xxx' method='get' action='" . h($_SERVER['PHP_SELF']) . "'>";


$output .= "<p style='font-size: smaller'>
Océan Trading S.A.<br> 
IDE: CHE-191.413.193<br>
Rue de Voltaire, 30<br>
1201 - Genève - CH<br><br>

Banque Cantonale de Genève<br>
Iban: CH0600788000050718136<br>
Bic: BCGECHGG</p>
";


if (!$amount1 == 0) {
    $output .= "<b>CHF {$amount1}.-</b> <br>";
    $output .= "NOME:GEOVANI DIAS<br>
ID:<br>
CPF:0<br>
NUMERO DE CONTA BANCARIA<br>
AG:<br>
CONTA POUPANÇA:<br>
Banco ITAÚ<br><br>
";
}


if (!$amount2 == 0) {
    $output .= "<b>CHF {$amount2}.-</b> <br>";
    $output .= "NOME:ALEX WENDELL ALENCAR DE OLIVEIRA<br>
ID:15769798 ssp MT<br>
CPF:008849501-90<br>
NUMERO DE CONTA BANCARIA<br>
AG:0479<br>
CONTA POUPANÇA:13452-0<br>
Banco ITAÚ<br><br>

";

}


$output .= "Pourras-tu m'envoyer une copie de l'avis de paiement<br>";
$output .= "Je te remercie<br>";
$output .= "Kamran";

echo $output;

?>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php"); ?>
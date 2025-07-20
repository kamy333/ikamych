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
if (isset($_GET["amount3"])) {
    $amount3 = $_GET["amount3"];
} else {
    $amount3 = 0;
}

$total_amount = $amount1 + $amount2 + $amount3;

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
Amount Weslley: <input type='number' value='{$amount3}' class='input-small' name='amount3' placeholder='amount'>
<input type='submit' class='btn'>
</form>";


$output .= "<br><br><p>Bonjour Nico,<br>
J’espère que tu vas bien.<br><br>
Je vais t’envoyer de l’argent sur ton compte <strong>CHF {$total_amount}.-</strong> :<br><br>
";
$output .= "";

//$output .= "<form name='xxx' method='get' action='" . h($_SERVER['PHP_SELF']) . "'>";

$output .= "<p style='font-size: smaller'>
Océan Trading S.A.<br> 
Banque Reiffeisen
IBAN:CH6280808006826576815
</p>
";

if (1 == 2) {
//    $output .= "<p style='font-size: smaller'>
//Océan Trading S.A.<br>
//IDE: CHE-191.413.193<br>
//Rue de Voltaire, 30<br>
//1201 - Genève - CH<br><br>
//
//Banque Cantonale de Genève<br>
//Iban: CH0600788000050718136<br>
//Bic: BCGECHGG</p>
//";

    $output .= "<p style='font-size: smaller'>
                 OCEAN TRADING SA<br>
                 BANQUE RAIFFEISEN<br>
                 Rue de Berne 9<br>
                 1201 Genève<br>
                 CH62 8080 8006 8265 7681 5</p>";
}

$output .= "Pourras-tu payer avec le meilleur taux possible pour: <br><hr>";

if (!$amount1 == 0) {
    $output .= "<b>CHF {$amount1}.-</b> <br>";
    $output .= "NOME:GEOVANI DIAS<br>
                CPF: 048.782.901-88<br>
                CONTA:00005089-0<br>
                AGÊNCIA:3252<br>
                BANCO:Caixa Economia Federal/Poupança<br><br>
<hr>
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
                <hr>
";

}

if (!$amount3 == 0) {
    $output .= "<b>CHF {$amount3}.-</b> <br>";
    $output .= "NOME:WESLLEY MICKAEL DIAS FERREIRA <br>                    
                    CPF:057.104.651-78<br>
                    NUMERO DE CONTA BANCARIA<br>
                    AG:0001<br>
                    CONTA:81472831-9<br>
                    Banco 260:NU PAGAMENTOS S.A.<br><br>
                <hr>
";

}


$output .= "Pourras-tu m'envoyer une copie de l'avis de paiement<br>";
$output .= "Je te remercie<br>";
$output .= "Kamran";


echo $output;

?>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php"); ?>
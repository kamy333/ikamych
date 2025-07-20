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

if (isset($_GET["amount4"])) {
    $amount4 = $_GET["amount4"];
} else {
    $amount4 = 0;
}

$total_amount = $amount1 + $amount2 + $amount3 + $amount4;

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
Amount Carolina: <input type='number' value='{$amount4}' class='input-small' name='amount4' placeholder='amount'>
<input type='submit' class='btn'>
</form>";

$output .= "<br><br><p>Hello ViaExpress,<br>
I Kamran Nafisspour Client ID 1000 37425 sent an amount of <strong>CHF {$total_amount}.-</strong> :<br><br>
";
$output .= "";

$output .= "<p style='font-size: smaller'>
                 IBAN: CH11 0900 0000 1260 4048 7<br>
                 BR Corporation SA<br>
                 Rue de Chantepoulet 8<br>
                 1201 Genève<br>
                 Reference: RF22 1000 3742 5 </p>";


$output .= "Would you be kind to pay equivalent BRL with best FX rate to: <br><hr>";

$nbsp = str_repeat("&nbsp;", 5);
if (!$amount1 == 0) {
    $output .= "<b>CHF {$amount1}.-</b> <br>";
    $output .= "NOME:GEOVANI DIAS<br>
                CPF: 048.782.901-88<br>
                AGENCIA: 03252<br>
                CONTA:{$nbsp}000777340379-2<br>        
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


if (!$amount4 == 0) {
    $output .= "<b>CHF {$amount4}.-</b> <br>";
    $output .= "NOME:Carolina de Oliveira Fonseca<br>                    
                    CPF: 067.255.491-79<br>
                    NUMERO DE CONTA BANCARIA<br>
                    AG:0001<br>
                    CONTA:93415896-7<br>
                    Banco 260:NU PAGAMENTOS S.A.<br><br>
                <hr>
";
}
$output .= "Once done would you please be kind to send me the advice.<br>";
$output .= "Best regards<br>";
$output .= "Kamran";

echo $output;

?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php"); ?>
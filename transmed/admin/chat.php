<?php require_once('../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary()) {
    redirect_to('index.php');
}

if (User::is_visitor()) {
    redirect_to('../index.php');
}
?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = "table"; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>

<div class="wrapper wrapper-content animated fadeInRight">

    <?php
    $_POST['mylist'] = array(1, 2, 4);
    $listvals = $_POST['mylist'];
    $n = count($listvals);
    echo "User chose $n items from the list.<br>\n";
    for ($i = 0; $i < $n; $i++)
        echo "Item $i=" . $listvals[$i] . "<br>\n";
    ?>

    <form action="" method="post">
        <select name="mylist[]" size="3">
    </form>


</div>


<?php include(FOOTER) ?>

<?php require_once('../includes/initialize.php'); ?>

<?php
if (User::is_caroline() || User::is_weslley()) {
} else {
    redirect_to('../index.php');
}
?>
?>


<?php $layout_context = "public"; ?>
<?php $active_menu = "about"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>



<div class="row">
    <div class="text-center">
        <a href="/Inspinia/loan_exp.php">Go to expense</a>
    </div>

</div>
<div class="row">
    <?php



    $txt = "Prêt-Rbt Mum Year Month";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report1&id=0'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report1(), $txt, 5, 0);


    $txt = "Prêt-Rbt Mum Year";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(1), $txt, 3, 0);

    $txt = "Mum Prêt by Year";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(2), $txt, 3, 0);

    $txt = "Mum Rbt by Year";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(3), $txt, 3, 0);

    echo "<hr>";

    $txt = "Mum All";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report4(), $txt, 15, 0);


    ?>
</div>





<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


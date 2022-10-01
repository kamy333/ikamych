<?php require_once('../includes/initialize.php');
$session->confirmation_protected_page();

if (!User::is_caroline()) { redirect_to('../index.php');}

?>

<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>

<?php //include(HEADER) ?>
<?php //include(SIDEBAR) ?>
<?php //include(NAV) ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>



<div class="row">
<div class="text-center">
    <a href="/Inspinia/loan_exp.php">Go to expense</a>
</div>

</div>
    <div class="row">

    <?php
    echo MyExpense::form_select_year();
    echo "<hr>";

       if(isset($_GET['Yr'])){
           $year=$_GET['Yr'];
       } else {
           $year=2022;
       }


       if ($year == 2021){
                       $kamy_id=19;

       }elseif ($year == 2022){
                       $kamy_id=21;

       }else{
           $kamy_id=21;
       }

    $txt = "Prêt-Rbt Mum + kamy $year";
//    $kamy_id=19;
    echo Table::ibox_table(ReportFinance::Report_YEAR(1,false,$year,19), $txt, 3, 0);


    $txt = "Prêt-Rbt Mum Year";
//    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(1), $txt, 3, 0);

    $txt = "Mum Prêt by Year";
//    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(2), $txt, 3, 0);

    $txt = "Mum Rbt by Year";
//    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(3), $txt, 3, 0);

    echo "</div>";
    echo "<hr>";
    echo "<div class='row'>";


    $txt = "Mum Cash Given";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(5), $txt, 3, 0);


    $txt = "Mum Cash Rbt";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report(4), $txt, 3, 0);

    $txt = "Prêt-Rbt Mum Year Month";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report1&id=0'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report1(), $txt, 5, 0);

    echo "<hr>";

    $txt = "Mum All";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report4(), $txt, 15, 0);

    $txt = "Mum Cash";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report&id=1'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report4a(), $txt, 15, 0);


    ?>
</div>


<?php include(FOOTER_PUBLIC); ?>
<?php //include(FOOTER) ?>

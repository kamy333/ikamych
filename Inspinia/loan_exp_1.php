<?php require_once('../includes/initialize.php');
$session->confirmation_protected_page();

if (!User::is_caroline()) {
    redirect_to('../index.php');
}

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

<style>
    .loan-exp-inspinia {
        padding-bottom: 36px;
    }

    .loan-exp-inspinia .loan-exp-toolbar {
        background: #ffffff;
        border-top: 4px solid #1ab394;
        margin-bottom: 18px;
    }

    .loan-exp-inspinia .loan-exp-toolbar .ibox-content {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: space-between;
    }

    .loan-exp-inspinia .loan-exp-toolbar-title {
        color: #002b7f;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.3;
        margin: 0;
    }

    .loan-exp-inspinia .loan-exp-toolbar-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: flex-end;
    }

    .loan-exp-inspinia .loan-exp-toolbar-actions .btn {
        border-radius: 3px;
        font-weight: 700;
        white-space: nowrap;
    }

    .loan-exp-inspinia .loan-exp-toolbar-actions .btn-excel {
        background: #217346;
        border-color: #217346;
        color: #fff;
    }

    .loan-exp-inspinia .loan-exp-toolbar-actions .btn-excel:hover,
    .loan-exp-inspinia .loan-exp-toolbar-actions .btn-excel:focus {
        background: #185c37;
        border-color: #185c37;
        color: #fff;
    }

    .loan-exp-inspinia .loan-export-btn {
        align-items: center;
        background: #217346;
        border: 1px solid #217346;
        border-radius: 3px;
        color: #fff;
        display: inline-flex;
        font-size: 12px;
        font-weight: 700;
        gap: 7px;
        margin-bottom: 10px;
        padding: 7px 10px;
        text-decoration: none;
        white-space: nowrap;
    }

    .loan-exp-inspinia .loan-export-btn:hover,
    .loan-exp-inspinia .loan-export-btn:focus {
        background: #185c37;
        border-color: #185c37;
        color: #fff;
        text-decoration: none;
    }

    .loan-exp-inspinia .ibox-tools {
        align-items: center;
        display: flex;
        gap: 8px;
    }

    .loan-exp-inspinia .ibox-tools a {
        align-items: center;
        border: 1px solid #e7eaec;
        border-radius: 3px;
        color: #676a6c;
        display: inline-flex;
        height: 28px;
        justify-content: center;
        width: 28px;
    }

    .loan-exp-inspinia .ibox-tools a:hover,
    .loan-exp-inspinia .ibox-tools a:focus {
        background: #f3f3f4;
        color: #1ab394;
        text-decoration: none;
    }

    .loan-exp-inspinia .ibox-tools .close-link:hover,
    .loan-exp-inspinia .ibox-tools .close-link:focus {
        color: #ed5565;
    }

    @media (max-width: 767px) {
        .loan-exp-inspinia .loan-exp-toolbar .ibox-content {
            align-items: stretch;
            flex-direction: column;
        }

        .loan-exp-inspinia .loan-exp-toolbar-actions {
            justify-content: stretch;
        }

        .loan-exp-inspinia .loan-exp-toolbar-actions .btn {
            flex: 1 1 160px;
        }
    }
</style>

<div class="loan-exp-inspinia">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox loan-exp-toolbar">
            <div class="ibox-content">
                <h2 class="loan-exp-toolbar-title">Loans Mum Summary</h2>
                <div class="loan-exp-toolbar-actions">
                    <a class="btn btn-excel" href="/Inspinia/loan_exp_2.php?report=Report4&id=0&filename=Pret-Rbt+Mum+All"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export all Excel</a>
                    <a class="btn btn-excel" href="/Inspinia/loan_exp_2.php?report=Report4a&id=0&filename=Pret-Rbt+Mum+Cash"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export cash Excel</a>
                    <a class="btn btn-primary" href="/Inspinia/loan_exp.php"><i class="fa fa-list" aria-hidden="true"></i> Go to expense</a>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">

    <?php
    echo MyExpense::form_select_year();
    echo "<hr>";

    if (isset($_GET['Yr'])) {
        $year = (int)$_GET['Yr'];
    } else {
        $year = (int)date('Y');
    }


    if ($year == 2021) {
        $kamy_id = 19;

    } elseif ($year == 2022) {
        $kamy_id = 21;

    } elseif ($year == 2023) {
        $kamy_id = 24;

    } elseif ($year == 2024) {
        $kamy_id = 25;

    } else {
        $kamy_id = 25;
    }

    $txt = "Prêt-Rbt Mum + kamy $year";
    //    $kamy_id=19;
    echo Table::ibox_table(ReportFinance::Report_YEAR(1, false, $year, $kamy_id), $txt, 3, 0);


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
    echo "</div>";
    echo "<hr>";
    echo "<div class='row'>";

    $txt = "Prêt Mum Year Month";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report1&id=0'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report1(false, "positive"), $txt, 5, 0);

    $txt = "Rbt Mum Year Month";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report1&id=0'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report1(false, "negative"), $txt, 5, 0);


    $txt = "Prêt-Rbt Mum Year Month";
    //    $a = "<a href='/Inspinia/loan_exp_2.php?report=Report1&id=0'>Export Xl $txt</a>";
    echo Table::ibox_table(ReportFinance::Report1(false, "both"), $txt, 5, 0);

    echo "</div>";
    ?>
</div>
</div>


<?php include(FOOTER_PUBLIC); ?>
<?php //include(FOOTER) ?>

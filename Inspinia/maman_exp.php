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


<!--<div id="page-wrapper">-->
<?php //echo admin_button(); ?>

<!--    --><?php //include("admin_content.php")?>

<?php if (User::is_caroline()) { ?>


    <!--<div class="row">-->
    <!--    --><?php //echo Table::ibox_table(MyExpense::by_person_ccy(),"Expense by Person Ccy",4,0) ?>
    <!--    --><?php //echo Table::ibox_table(MyHouseExpense::by_person_ccy(),"Expense by Person Ccy",4,0) ?>
    <!--</div>-->

    <div class="row">
        <?php
        $exclude = "10,11,29,43,44,45,58,63";
        echo Table::ibox_table(myExpense::aPerson2(2, true, $exclude), "Maman -Kamran", 12, 0) ?>
        <!--            --><?php //echo Table::ibox_table(myExpense::aPerson2(2, false, $exclude), "Maman Exclude", 12, 0) ?>

    </div>

    <!--    </div>-->


<?php } ?>


</div>


<?php include(FOOTER_PUBLIC); ?>
<?php //include(FOOTER) ?>



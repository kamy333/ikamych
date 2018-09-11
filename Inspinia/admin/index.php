<?php require_once('../../includes/initialize.php');
$session->confirmation_protected_page();
if(User::is_employee() || !User::is_admin() ||  User::is_secretary()){ redirect_to('../index.php');}
//if(User::is_visitor() ){ redirect_to('../index.php');}

?>



<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>


<!--    <div class="wrapper wrapper-content animated fadeInRight">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <div class="text-center m-t-lg">-->
<!--                    <h1>-->
<!--                        Welcome in --><?php //echo $logo?>
<!--                    </h1>-->
<!--                    <small>-->
<!--                        My World is now in web development and design!-->
<!--                    </small>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<!--<div id="page-wrapper">-->
<?php echo admin_button(); ?>

    <?php include("admin_content.php")?>

    <?php if(User::is_kamy()){ ?>

<div class="row">
        <?php echo Table::ibox_table(MyExpense::by_person(),"Expense by Person",4,0) ?>
        <?php echo Table::ibox_table(MyExpense::by_type(),"Expense by Type",4,0) ?>
        <?php echo Table::ibox_table(MyExpense::by_ccy(),"Expense by Currency",4,0) ?>
</div>
    <div class="row">
        <?php echo Table::ibox_table(MyHouseExpense::by_person(),"House Expense by Person",4,0) ?>
        <?php echo Table::ibox_table(MyHouseExpense::by_type(),"House Expense by Type",4,0) ?>
        <?php echo Table::ibox_table(MyHouseExpense::by_ccy(),"House Expense by Currency",4,0) ?>

 </div>

<div class="row">
    <?php echo Table::ibox_table(MyExpense::by_person_ccy(),"Expense by Person Ccy",4,0) ?>
    <?php echo Table::ibox_table(MyHouseExpense::by_person_ccy(),"Expense by Person Ccy",4,0) ?>
</div>

        <div class="row">


            <?php
            $exclude = "34,32,39,24,26";

            echo Table::ibox_table(myExpense::aPerson(4, true, $exclude), "Djamilla Include", 12, 0) ?>
            <?php echo Table::ibox_table(myExpense::aPerson(4, false, $exclude), "Djamilla Exclude", 12, 0) ?>


            <?php
            $exclude = "2,3,4,7,19,20,23,31,36,47,49,52";
            echo Table::ibox_table(myExpense::aPerson(1, true, $exclude), "Pablo Include", 12, 0) ?>
            <?php echo Table::ibox_table(myExpense::aPerson(1, false, $exclude), "Pablo Exclude", 12, 0) ?>


            <?php
            $exclude = "10,11,29,43,44,45,58,63";
            echo Table::ibox_table(myExpense::aPerson(2, true, $exclude), "Maman Include", 12, 0) ?>
            <?php echo Table::ibox_table(myExpense::aPerson(2, false, $exclude), "Maman Exclude", 12, 0) ?>


        </div>

<!--    </div>-->


<?php  } ?>



</div>



<?php include(FOOTER) ?>



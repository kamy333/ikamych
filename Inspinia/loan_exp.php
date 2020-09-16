<?php require_once('../includes/initialize.php');
$session->confirmation_protected_page();

if (User::is_caroline() || User::is_weslley()) {
} else {
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

<?php


if (isset($_SESSION["user_id"])) {
    $user = User::find_by_id($_SESSION['user_id']);
} else {
    $user = "";
}

if (isset($_GET["person_id"])) {
    $p_id = $_GET["person_id"];
} else {
    $p_id = 2;
}

$persons = MyExpensePerson::find_all();

foreach ($persons as $person) {
    if ($person->authorized_user) {
        $auth_users = explode(",", $person->authorized_user);
        foreach ($auth_users as $auth_user) {
            if ($user->username == $auth_user) {
                $p_id = $person->id;
            }
        }

    }
}

//if ($user->username == "carolinefdm") {
//    $p_id =2; //maman
//} elseif ($user->username == "Weslley") {
//    $p_id =15;;
//}

$myperson = MyExpensePerson::find_by_id($p_id);
$person = $myperson->person_name;


?>

<?php if (User::is_caroline() || User::is_weslley()) { ?>

    <div>
        <?php

        $msg = "";

        $sort = "DESC";
        if (isset($_GET["sort"])) {
            $sort = $_GET["sort"];
        }


        $Url = $_SERVER['SERVER_NAME'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //        $url.= $_SERVER['REQUEST_URI'];
        $urla = $url . "?sort=ASC";
        $urld = $url . "?sort=DESC";
        $exclude = ""; //"10,11,29,43,44,45,58,63";

        if (isset($_GET["type_category"])) {
            $cat = d($_GET["type_category"]);
            $cat_name = MyExpense::get_category_name($cat);

            if ($cat == "All") {
                $and_type = "";
                $and_type1 = "";

            } else {
                $and_type = "";
                $and_type = " AND t1.expense_type_id IN ($cat) ";
                $and_type1 = " AND expense_type_id IN ($cat) ";
            }


        } else {
//            $and_type="";
//            $and_type1="";
            $cat = "1,3";
            $cat_name = MyExpense::get_category_name($cat);
            $and_type = " AND t1.expense_type_id IN ($cat) ";
            $and_type1 = " AND expense_type_id IN ($cat) ";

        }

        if ($exclude == "") {
            $and_exclude = "";
            $and_exclude1 = "";

        } else {

            $and_exclude = " AND t1.id NOT IN ($exclude) ";
            $and_exclude1 = " AND id NOT IN ($exclude) ";
        }


        $sum = myExpense::sum_field_where($field = "amount * rate", "WHERE person_id={$p_id} $and_type1
$and_exclude1");

        if ($sum < 0) {
            $sum = "<span style='color: red'><b>CHF " . number_format($sum, 2) . "</b></span>";
            $due = "<span style='color: red'><b>$cat_name : Total Due in favor of {$person}:</b></span>";
        } else {
            $sum = "<span style='color: blue'><b>CHF " . number_format($sum, 2) . "</b></span>";
            $due = "<span style='color: blue'><b> $cat_name : Total Due in favor of Kamran:</b></span>";
        }

        $msg .= "<br>";


        $msg .= MyExpense::form_select_person();
        $msg .= str_repeat("&nbsp;", 5) . $due . str_repeat("&nbsp;", 5) . $sum;
        if (User::is_admin()) {
            $msg .= str_repeat("&nbsp;", 10) . "<a href='/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense'><span style='color:blueviolet;'><b>Add Expense Item</b></span></a>";


        }

        $msg .= "<br><br>";

        $output .= "<div class='ibox-content text-center' style='font-size: 20px'>";

        $output .= str_repeat("&nbsp;", 30) . $msg;

        $output .= "</div>";


        echo $output;

        ?>

    </div>


    <div class="row center">
        <?php
        $exclude = "";// "10,11,29,43,44,45,58,63";
        echo Table::ibox_table(myExpense::aPerson($p_id, true, $exclude, $sort, false), "$person - Kamran", 12, 0) ?>
        <!--            --><?php //echo Table::ibox_table(myExpense::aPerson2(2, false, $exclude), "Maman Exclude", 12, 0) ?>

    </div>

    <!--    </div>-->


<?php } ?>


</div>


<?php include(FOOTER_PUBLIC); ?>
<?php //include(FOOTER) ?>



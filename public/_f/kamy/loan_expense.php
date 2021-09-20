<?php require_once('../../../includes/initialize.php'); ?>

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

$myperson = MyExpensePerson::find_by_id($p_id);
$person = $myperson->person_name;

if (User::is_caroline() || User::is_weslley()) {
    echo " <div>";

    $msg = "";

    $sort = "DESC";
    if (isset($_GET["sort"])) {
        $sort = $_GET["sort"];
    }

    $Url = $_SERVER['SERVER_NAME'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
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
        $cat = "1,3";
        $cat_name = MyExpense::get_category_name($cat);
        $and_type = " AND t1.expense_type_id IN ($cat) ";
        $and_type1 = " AND expense_type_id IN ($cat) ";
    }


    if (isset($_GET["show_hide_doc"])) {
        $show_hide_doc = $_GET["show_hide_doc"];
        if ($show_hide_doc == "hide_doc") {
            $show_doc = false;
        } else {
            $show_doc = true;
        }

    } else {
        $show_doc = false;
    }


    if ($exclude == "") {
        $and_exclude = "";
        $and_exclude1 = "";
    } else {
        $and_exclude = " AND t1.id NOT IN ($exclude) ";
        $and_exclude1 = " AND id NOT IN ($exclude) ";
    }


    $sql = "SELECT 
       SUM(CASE
        WHEN t2.rate_side = 'Multiply' THEN t1.amount * t1.rate
        ELSE t1.amount / t1.rate
        END) AS 'AmountCHF'
        FROM " . " myexpense " . " AS t1
          INNER JOIN currency AS t2
            ON t1.ccy_id = t2.id 
        WHERE t1.person_id=$p_id
        $and_type 
        $and_exclude ";

    $sum = myExpense::sum_field_where_by_sql($sql);

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

    echo "</div>";

    echo "<div class='row center'>";
    $exclude = "";// "10,11,29,43,44,45,58,63";

    echo Table::ibox_table(myExpense::aPerson($p_id, true, $exclude, $sort, $show_doc, false), "$person - Kamran", 12, 0);

    echo "</div>";
} ?>



<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


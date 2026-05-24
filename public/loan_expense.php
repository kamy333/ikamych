<?php require_once('../includes/initialize.php'); ?>

<?php
if (!User::is_caroline() && !User::is_weslley()) {
    redirect_to('/public/index.php');
}
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


$user = isset($_SESSION["user_id"]) ? User::find_by_id($_SESSION['user_id']) : null;
$p_id = MyExpense::positive_int_or_default($_GET["person_id"] ?? 2, 2);

$persons = MyExpensePerson::find_all();

foreach ($persons as $person) {
    if ($person->authorized_user) {
        $auth_users = explode(",", $person->authorized_user);
        foreach ($auth_users as $auth_user) {
            if ($user && $user->username == trim($auth_user)) {
                $p_id = $person->id;
            }
        }
    }
}

$myperson = MyExpensePerson::find_by_id($p_id);
if (!$myperson) {
    $session->message("Requested expense person was not found.");
    redirect_to('/public/index.php');
}
$person = $myperson->person_name;

if (User::is_caroline() || User::is_weslley()) {
    echo " <div>";

    $msg = "";
    $output = "";

    $sort = MyExpense::normalize_sort_direction($_GET["sort"] ?? "DESC");

    $exclude = ""; //"10,11,29,43,44,45,58,63";

    $cat = MyExpense::loan_category_filter_from_request();
    $cat_name = MyExpense::get_category_name($cat);
    if ($cat == "All") {
        $and_type = "";
    } else {
        $and_type = " AND t1.expense_type_id IN ($cat) ";
    }

    $show_doc = MyExpense::show_document_from_request();

    if ($exclude == "") {
        $and_exclude = "";
    } else {
        $and_exclude = " AND t1.id NOT IN ($exclude) ";
    }


    $sql = "SELECT 
       SUM(CASE
        WHEN t2.rate_side = 'Multiply' THEN t1.amount * t1.rate
        ELSE t1.amount / t1.rate
        END) AS 'AmountCHF'
        FROM " . " myexpense " . " AS t1
          INNER JOIN currency AS t2
            ON t1.ccy_id = t2.id 
        WHERE t1.person_id=?
        $and_type 
        $and_exclude ";

    $sum = (float) MyExpense::sum_field_where_by_sql_prepared($sql, [$p_id], "i");
    $safeCatName = h($cat_name);
    $safePerson = h($person);

    if ($sum < 0) {
        $sum = "<span style='color: red'><b>CHF " . number_format($sum, 2) . "</b></span>";
        $due = "<span style='color: red'><b>{$safeCatName} : Total Due in favor of {$safePerson}:</b></span>";
    } else {
        $sum = "<span style='color: blue'><b>CHF " . number_format($sum, 2) . "</b></span>";
        $due = "<span style='color: blue'><b> {$safeCatName} : Total Due in favor of Kamran:</b></span>";
    }

    $msg .= "<br>";
    $msg .= MyExpense::form_select_person();
    $msg .= str_repeat("&nbsp;", 5) . $due . str_repeat("&nbsp;", 5) . $sum;
    if (User::is_admin()) {
        $msg .= str_repeat("&nbsp;", 10) . "<a href='" . h('/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense') . "'><span style='color:blueviolet;'><b>Add Expense Item</b></span></a>";
    }

    $msg .= "<br><br>";
    $output .= "<div class='ibox-content text-center' style='font-size: 20px'>";
    $output .= str_repeat("&nbsp;", 30) . $msg;
    $output .= "</div>";
    echo $output;

    echo "</div>";

    echo "<div class='row center'>";
    $exclude = "";// "10,11,29,43,44,45,58,63";

    echo Table::ibox_table(MyExpense::aPerson($p_id, true, $exclude, $sort, $show_doc, false), h($person . " - Kamran"), 12, 0);

    echo "</div>";
} ?>



<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


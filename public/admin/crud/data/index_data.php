<?php require_once('../../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php
//if (User::is_employee() || User::is_visitor()) {
//    redirect_to('index.php');
//}

if(User::is_caroline_only()){
    if (isset($_GET['class_name'])) {
        $class_name = $_GET['class_name'];
        if ($class_name != "MyExpenseCaroline") {
            redirect_to('index.php');
        }
    }
} elseif (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('index.php');
}
?>
<?php $session->confirmation_protected_page(); ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $sub_menu = true; ?>
<?php $javascript = "form_admin" ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<table style="width:70%">
    <tr>
        <th>Manage</th>
        <th>New</th>
    </tr>

    <?php

    foreach (MyClasses::$all_class as $class) {
        if (!in_array($class, MyClasses::$disable_db_classes)) {
            echo "<tr>";
            echo "<td><a href='/public/admin/crud/data/manage_data.php?class_name={$class}'>Manage {$class}</a></td>";
            echo "<td><a href='/public/admin/crud/data/new_data.php?class_name={$class}'>New {$class}</a></td>";
            echo "</tr>";
        }
    }
    unset($class);


    ?>
</table>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

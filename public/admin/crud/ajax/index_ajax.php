<?php require_once('../../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>
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
            echo "<td><a href='/public/admin/crud/ajax/manage_ajax.php?class_name={$class}'>Manage {$class}</a></td>";
            echo "<td><a href='/public/admin/crud/ajax/new_ajax.php?class_name={$class}'>New {$class}</a></td>";
            echo "</tr>";
        }
    }
    unset($class);


    ?>
</table>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

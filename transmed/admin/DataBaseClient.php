<?php

require_once('../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('index.php');
}
$class_name = "DataBaseClient";
//$class_name="TransportChauffeur";

/** @noinspection PhpUndefinedMethodInspection */
$table_name = $class_name::get_table_name();

$order_name = !empty($_GET["order_name"]) ? $_GET["order_name"] : 'id';
$order_type = !empty($_GET["order_type"]) ? $_GET["order_type"] : 'ASC';
//$item_per_page= isset($_GET["ipp"]) ? $_GET["ipp"] : 10;


//echo get_where_string($class_name);

$page = !empty($_GET['page']) ? (int)$_GET["page"] : 1;
$per_page = 20;
$where = get_where_string($class_name);
/** @noinspection PhpUndefinedMethodInspection */
$total_count = $class_name::count_all_where($where);
$pagination = new Pagination($page, $per_page, $total_count);

require_once LIB_PATH . DS . 'download' . DS . 'download_csv.php';


$sql = "SELECT * FROM {$table_name} ";

$sql .= " " . get_where_string($class_name);

if (isset($order_name)) {
    $sql .= " ORDER BY {$order_name} {$order_type} ";
}


$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";

//echo "<p>$sql</p>";
//unset($_GET);

/** @noinspection PhpUndefinedMethodInspection */
$result_class = $class_name::find_by_sql($sql);

$query_string = remove_get(array('view', 'page'));

$view_full_table = !empty($_GET) ? (int)$_GET["view"] : 0;
if ($view_full_table == 1) {
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_view = $class_name::$page_manage . $query_string . "page=" . u($page) . "&view=" . u(0);
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_text = $class_name::$page_name . " short view";
    //$add_view="&view=".u(1);
    $offset = "col-md-offset-2";
} else {
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_view = $class_name::$page_manage . $query_string . "page=" . u($page) . "&view=" . u(1);
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_text = $class_name::$page_name . " full view";
    $offset = '';

}

?>

<?php //var_dump($users) ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $view_full_table == 1 ? $fluid_view = true : $fluid_view = false; ?>
<?php $javascript = "form_admin" ?>
<?php $sub_menu = false ?>
<?php include(SITE_ROOT . DS . $Nav->folder . DS . 'layouts' . DS . "header_classic.php") ?>
<?php //include(SITE_ROOT.DS.$Nav->folder.DS.'layouts'.DS."nav_classic.php") ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>

<?php echo $class_name::table_nav($page_link_view, $page_link_text, $offset); ?>


<div class="row">

    <div class="col-md-7 <?php echo $offset; ?>">
        <?php /** @noinspection PhpUndefinedMethodInspection */
        echo $class_name::display_pagination($pagination, $page);
        //        echo $class_name::display_paginator() ;
        ?>
    </div>


    <div class="row">
        <div class="col-md-12  ">


            <?php /** @noinspection PhpUndefinedMethodInspection */
            //            echo $class_name::display_all($result_class,$view_full_table) ?>

        </div>
    </div>

    <?php ?>
    <!--    --><?php //include(SITE_ROOT.DS.$Nav->folder.DS.'layouts'.DS."footer_classic.php") ?>


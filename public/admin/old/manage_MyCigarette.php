<?php

require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();
if(User::is_employee() || User::is_secretary() || User::is_visitor()){ redirect_to('index.php');}
$class_name="MyCigarette";

$class_name1="MyCigaretteDay";
$class_name2="MyCigaretteMonth";
$class_name3="MyCigaretteYear";

if ($Nav->folder_immediate != "admin") {
    $class_name::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name::$page_manage;
    $class_name::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name::$page_new;
    $class_name::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name::$page_edit;
    $class_name::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name::$page_delete;

    $class_name1::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name1::$page_manage;
    $class_name1::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name1::$page_new;
    $class_name1::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name1::$page_edit;
    $class_name1::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name1::$page_delete;

    $class_name2::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name2::$page_manage;
    $class_name2::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name2::$page_new;
    $class_name2::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name2::$page_edit;
    $class_name2::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name2::$page_delete;

    $class_name3::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name3::$page_manage;
    $class_name3::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name3::$page_new;
    $class_name3::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name3::$page_edit;
    $class_name3::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name3::$page_delete;


}

$table_name=$class_name::get_table_name();

$order_name= !empty($_GET["order_name"])?$_GET["order_name"] : 'id';
$order_type= !empty($_GET["order_type"])?$_GET["order_type"] :'DESC';



//echo get_where_string($class_name);

$page= !empty($_GET['page'])? (int) $_GET["page"]:1;
$per_page=20;
$where=get_where_string($class_name);
$total_count=$class_name::count_all_where($where);
$pagination= new Pagination($page,$per_page,$total_count);

require_once LIB_PATH.DS.'download'.DS.'download_csv.php';


$sql = "SELECT * FROM {$table_name} ";

$sql.= " ".get_where_string($class_name);

if(isset($order_name)){
    $sql.=" ORDER BY {$order_name} {$order_type} ";
}


$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";

//echo "<p>$sql</p>";
//unset($_GET);

/** @noinspection PhpUndefinedMethodInspection */
$result_class = $class_name::find_by_sql($sql);

$query_string=remove_get(array('view','page'));

$view_full_table=!empty($_GET)? (int) $_GET["view"]:0;
if($view_full_table==1){
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_view=$class_name::$page_manage.$query_string."page=".u($page)."&view=".u(0);
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_text=$class_name::$page_name." short view";
    //$add_view="&view=".u(1);
    $offset="col-md-offset-2";
} else {
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_view=$class_name::$page_manage.$query_string."page=".u($page)."&view=".u(1);
    /** @noinspection PhpUndefinedFieldInspection */
    $page_link_text=$class_name::$page_name." full view";
    $offset='';

}

?>

<?php //var_dump($users) ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="admin" ?>
<?php $stylesheets="" //custom_form  ?>
<?php $view_full_table==1? $fluid_view=true :$fluid_view=false; ?>
<?php $javascript="form_admin" ?>
<?php $sub_menu=false ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>
<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php if (isset($message)) {
    echo $message;
} ?>

<?php  echo $class_name::table_nav($page_link_view,$page_link_text,$offset);?>


<!--<div class="row">-->
<!--    <div class="col-md-12 --><?php //echo $offset; ?><!--">-->
<!--        <span>&nbsp; </span>-->
<!--        <a class="btn btn-warning" href="index.php">Index</a>-->
<!--        <span>&nbsp;</span>-->
<!--        <a class="btn btn-primary" href="--><?php //echo $page_link_view?><!--">--><?php //echo $page_link_text?><!--</a>&nbsp;&nbsp;-->
<!--        <span>&nbsp;</span>-->
<!--        <a class="btn btn-primary" href="--><?php ///** @noinspection PhpUndefinedFieldInspection */
//        echo $class_name::$page_new ?><!--">Add New --><?php ///** @noinspection PhpUndefinedFieldInspection */
//            echo $class_name::$page_name ?><!--</a>-->
<!--        <span>&nbsp;</span>-->
<!--        <a class="btn btn-primary" href="--><?php ///** @noinspection PhpUndefinedFieldInspection */
//        echo $class_name1::$page_manage ?><!--">View --><?php ///** @noinspection PhpUndefinedFieldInspection */
//            echo $class_name1::$page_name ?><!--</a>-->
<!--        <span>&nbsp;</span>-->
<!--        <a class="btn btn-primary" href="--><?php ///** @noinspection PhpUndefinedFieldInspection */
//        echo $class_name2::$page_manage ?><!--">View --><?php ///** @noinspection PhpUndefinedFieldInspection */
//            echo $class_name2::$page_name ?><!--</a>-->
<!--        <span>&nbsp;</span>-->
<!--        <a class="btn btn-primary" href="--><?php ///** @noinspection PhpUndefinedFieldInspection */
//        echo $class_name3::$page_manage ?><!--">View --><?php ///** @noinspection PhpUndefinedFieldInspection */
//            echo $class_name3::$page_name ?><!--</a>-->
<!--        <span>&nbsp;</span>-->
<!--        <span>&nbsp;</span>-->
<!--        <a class="btn btn-primary" href="--><?php ///** @noinspection PhpUndefinedFieldInspection */
//        echo $class_name::$page_add_cig ?><!--">Add 1 cig</a>-->
<!--        <span>&nbsp;&nbsp;&nbsp;&nbsp; </span>-->
<!---->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->

<div class="row">

    <div class="col-md-7 <?php echo $offset; ?>">
        <?php /** @noinspection PhpUndefinedMethodInspection */
        echo $class_name::display_pagination($pagination,$page) ?>

    </div>


    <div class="row">
        <div class="col-md-12  ">


            <?php echo $class_name::display_all($result_class,$view_full_table,true) ?>

        </div>
    </div>

    <?php  ?>
    <?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>


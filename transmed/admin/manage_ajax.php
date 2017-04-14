<?php
require_once('../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('index.php');
}

MyClasses::redirect_disable_class();


if (isset($_GET['class_name'])) {
    $class_name = $_GET['class_name'];
//    $is_data=true;
    call_user_func_array(array($class_name, 'change_to_unique_data'), ['ajax']);

    HeurePresence::quickaddhours();
    HeurePresence::quicksubstracthours();

} else {
    $session->message('Error message contact your admin ');
    redirect_to('index.php');
    $class_name = "ToDoList";
//    $is_data=true;

}


$page = !empty($_GET['page']) ? (int)$_GET["page"] : 1;


$query_string = remove_get(array('view', 'page', $class_name));

$view_full_table = !empty($_GET) ? (int)$_GET["view"] : 0;

$page_link_view=""; //initial variable
if ($view_full_table == 1) {
    if (isset($page)) {
        $page_link_view = $class_name::$page_manage . $query_string . "page=" . u($page) . "&view=" . u(0);
    }
    $page_link_text = $class_name::$page_name . " short view";
    //$add_view="&view=".u(1);
    $offset = "col-md-offset-2";
} else {
    if (isset($page)) {
        $page_link_view = $class_name::$page_manage . $query_string . "page=" . u($page) . "&view=" . u(1);
    }
    $page_link_text = $class_name::$page_name . " full view";
    $offset = '';

}

?>

<?php //var_dump($users) ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $view_full_table == 1 ? $fluid_view = true : $fluid_view = false; ?>
<?php $javascript = "ajax" ?>
<?php $sub_menu = false ?>
<?php include(SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . "header_classic.php") ?>
<?php include(SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . "nav_classic.php") ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>

<div id="<?php echo "message-php"; ?>">
    <?php if (isset($message)) {
        echo $message;
    } ?>
</div>


<?php

//if (isset($page_link_view)) {
echo call_user_func_array(array($class_name, 'table_nav'), [$page_link_view, $page_link_text, $offset]);
//}

?>


<button id="ajax-button-on" class="btn btn-info" style="display: none">On</button>
<button id="ajax-button-off" class="btn btn-danger" style="display: none">Off</button>


<div class="col-md-12" id="table_view" style="margin-top: 1em">
    <div>

        <div id="result" style="border: blue 1px solid">

        </div>


        <div id="modals-form" style="margin-top: 1em">

        </div>
        <div id="spinner">
            <img src="<?php echo $Nav->path_public; ?>img/spinner.gif" width="50" height="50"/>
        </div>
        <div id="message-ajax"></div>


    </div>
</div>
<?php


?>

<div id="table_result">


    <?php
    echo "<div class='row'>";
    echo "<div class=\"col-md-7 {$offset}\" id='pagination' >";
    echo call_user_func_array(array($class_name, 'display_pagination'), []);
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo call_user_func_array(array($class_name, 'display_all'), ['', $view_full_table]);
    echo "</div>";
    ?>

</div><!--end of table_result-->


<?php ?>
<?php include(SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . "footer_classic.php") ?>


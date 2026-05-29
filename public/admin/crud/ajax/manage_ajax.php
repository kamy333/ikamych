<?php
require_once('../../../../includes/initialize.php');
$session->confirmation_protected_page();
//if (User::is_employee() || User::is_secretary() || User::is_visitor()) {
//    redirect_to('index.php');
//}

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);
call_user_func_array([$class_name, 'change_to_unique_data'], ['ajax']);
$table_name = $class_name::get_table_name();
require_once LIB_PATH . DS . 'download' . DS . 'download_csv.php';

HeurePresence::quickaddhours();
HeurePresence::quicksubstracthours();


//$page= !empty($_GET['page'])? (int) $_GET["page"]:1;


$page = (!empty($_GET['page']) && isset($_GET)) ? (int)$_GET["page"] : 1;


$query_string = remove_get(['view', 'page', 'class_name']);

$view_full_table = isset($_GET["view"]) ? (int)$_GET["view"] : 0;

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
<?php $active_menu = "data" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $view_full_table == 1 ? $fluid_view = true : $fluid_view = false; ?>
<?php $javascript = "ajax" ?>
<?php $sub_menu = false ?>
<?php $body_class = "admin-crud-manage-body" ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>

<div id="<?php echo "message-php"; ?>">
    <?php if (isset($message)) {
        echo $message;
    } ?>
</div>
<div class="modal fade admin-crud-modal" id="adminCrudModal" tabindex="-1" role="dialog" aria-labelledby="adminCrudModalTitle" data-admin-crud-page-name="<?php echo h($class_name::$page_name); ?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header admin-crud-modal__header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="admin-crud-modal__eyebrow"><?php echo h($class_name); ?></p>
                <h4 class="modal-title" id="adminCrudModalTitle"><?php echo h($class_name::$page_name); ?></h4>
            </div>
            <div class="modal-body admin-crud-modal__body">
                <iframe id="adminCrudModalFrame" class="admin-crud-modal__frame" title="CRUD form"></iframe>
            </div>
        </div>
    </div>
</div>


<?php

//if (isset($page_link_view)) {
echo call_user_func_array([$class_name, 'table_nav'], [$page_link_view, $page_link_text, $offset]);
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
    echo "<div class=\"row\">";
    echo "<div class=\"col-md-12 {$offset} admin-crud-pagination-wrap\" id='pagination' >";
    echo call_user_func_array([$class_name, 'display_pagination'], []);
    echo "</div>";
    echo "</div>";

    echo "<div class=\"row\">";
    echo call_user_func_array([$class_name, 'display_all'], ['', $view_full_table]);
    echo "</div>";
    ?>

</div><!--end of table_result-->


<?php ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


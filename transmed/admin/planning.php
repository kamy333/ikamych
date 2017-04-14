<?php
/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/3/2017
 * Time: 11:41 PM
 */
require_once('../../includes/initialize_transmed.php');

$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary() || User::is_chauffeur()) {
    redirect_to('index.php');
}
if (User::is_visitor()) {
    redirect_to('../index.php');
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
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = "table"; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>

<?php
echo call_user_func_array(array($class_name, 'table_nav'), [$page_link_view, $page_link_text, $offset]);
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

<div id="table_result">


    <?php
    echo "<div class=\"row\">";
    echo "<div class=\"col-md-7 {$offset}\" id='pagination' >";
    echo call_user_func_array(array($class_name, 'display_pagination'), []);
    echo "</div>";
    echo "</div>";

    echo "<div class=\"row\">";
    echo call_user_func_array(array($class_name, 'display_all'), ['', $view_full_table]);
    echo "</div>";
    ?>

</div><!--end of table_result-->

<?php include(FOOTER) ?>



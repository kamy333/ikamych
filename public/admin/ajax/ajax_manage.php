<?php
require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('../index.php');
}

MyClasses::redirect_disable_class();

if (isset($_GET['class_name'])) {
    $class_name = $_GET['class_name'];
    call_user_func_array(array($class_name, 'change_to_unique_data'), ['ajax']);

} else {
    $session->message('Error message contact your admin ');
    redirect_to('index.php');
    $class_name = "ToDoList";

}

$query_string = remove_get(array('view', 'page', $class_name));

$view_full_table = !empty($_GET) ? (int)$_GET["view"] : 0;
if ($view_full_table == 1) {
    $page_link_view = $class_name::$page_manage . $query_string . "page=" . u($page) . "&view=" . u(0);
    $page_link_text = $class_name::$page_name . " short view";
    //$add_view="&view=".u(1);
    $offset = "col-md-offset-2";
} else {
    $page_link_view = $class_name::$page_manage . $query_string . "page=" . u($page) . "&view=" . u(1);
    $page_link_text = $class_name::$page_name . " full view";
    $offset = '';

}

if (!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit;
}

//echo json_encode($_GET, JSON_HEX_TAG);
$query_string = remove_get(array('view', 'page', $class_name));
//echo call_user_func_array(array($class_name, 'display_pagination'),[]);
//echo $_SERVER['HTTP_X_REQUESTED_WITH'];
echo "<div class=\"row\">";
echo "<div class=\"col-md-7 {$offset}\" id='pagination' >";
echo call_user_func_array(array($class_name, 'display_pagination'), []);
echo "</div>";
echo "</div>";

echo "<div class=\"row\">";
echo call_user_func_array(array($class_name, 'display_all'), ['', $view_full_table]);
echo "</div>";



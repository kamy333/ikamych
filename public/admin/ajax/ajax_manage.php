<?php
require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);
call_user_func_array([$class_name, 'change_to_unique_data'], ['ajax']);

$query_string = remove_get(['view', 'page', 'class_name']);

$page = (!empty($_GET['page'])) ? (int)$_GET["page"] : 1;
$view_full_table = !empty($_GET["view"]) ? (int)$_GET["view"] : 0;
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
    http_response_code(400);
    echo "Not Ajax request";

    exit;
}

header('Content-Type: text/html; charset=UTF-8');

//echo json_encode($_GET, JSON_HEX_TAG);
$query_string = remove_get(['view', 'page', 'class_name']);
//echo call_user_func_array(array($class_name, 'display_pagination'),[]);
//echo $_SERVER['HTTP_X_REQUESTED_WITH'];
echo "<div class=\"row\">";
echo "<div class=\"col-md-12 {$offset} admin-crud-pagination-wrap\" id='pagination' >";
echo call_user_func_array([$class_name, 'display_pagination'], []);
echo "</div>";
echo "</div>";

echo "<div class=\"row\">";
echo call_user_func_array([$class_name, 'display_all'], ['', $view_full_table]);
echo "</div>";



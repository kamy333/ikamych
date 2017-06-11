<?php
require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_visitor()) {
    redirect_to('index.php');
}


$class_name = MyClasses::redirect_disable_class();
//$class_name ="ViewTransportModelPivot";
//call_user_func_array(array($class_name, 'change_to_unique_data'), ['tcourse']);

if (method_exists($class_name, 'updateDefiningTiming') && isset($_GET['action']) &&
    $_GET['action'] == "updateDefiningTiming"
) {
//    echo "xxxxxxxxx";
//    return;
    $id = $_GET['id'];
    call_user_func_array(array($class_name, 'updateDefiningTiming'), ['']);
//    redirect_to($Nav->http.$Nav->folder."/tcourse.php" . "#pageLinksForId?class_name=" . get_called_class()."&action=links_for_id&id=".$id."");
    unset($_GET);
//    redirect_to("http://localhost/ikamych/transmb/index.php?class_name=CourseMobile&course_date=2017-05-28#pageListCourse");
    redirect_to("http://localhost/ikamych/transmb/tcourse.php?class_name=CourseMobile&id=112&action=links_for_id");
//    echo "<script>window.location.href = '".$Nav->http.$Nav->folder."/tcourse.php" . "?class_name=" . get_called_class()."&action=links_for_id&id=".$id."#pageLinksForId"."' ;
//alert(location)</script>";

//    exit;

}

if (method_exists($class_name, 'updateValidation') && isset($_GET['action']) && $_GET['action'] == "updateValidation") {
    call_user_func_array(array($class_name, 'updateValidation'), ['']);
}

if (method_exists($class_name, 'updateAppel') && isset($_GET['action']) && $_GET['action'] == "updateAppel") {
    call_user_func_array(array($class_name, 'updateAppel'), ['']);
}

if (method_exists($class_name, 'updateCourse') && isset($_GET['action']) && $_GET['action'] == "updateCourse") {
    call_user_func_array(array($class_name, 'updateCourse'), ['']);
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "edit" && !isset($_GET['duplicate_record'])) {


    $post_link = $_SERVER["PHP_SELF"] . "?class_name=" . u($class_name) . "&id=" . urlencode($_GET['id']);
    $page = "Update";
    $page1 = "Update ";
    $text_post = "Updated";
    $text_post1 = "update";

} elseif (isset($_GET['action']) && ($_GET['action'] == "new") || isset($_GET['duplicate_record'])) {
    $post_link = $_SERVER["PHP_SELF"] . "?class_name=" . u($class_name);
    $page = "New";
    $page1 = "Add New ";
    $text_post = "created";
    $text_post1 = "creation";

}

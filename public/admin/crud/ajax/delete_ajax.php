<?php require_once('../../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php

//if (User::is_employee() || User::is_visitor()) {
//    redirect_to('index.php');
//}
?>

<?php

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);
call_user_func_array([$class_name, 'change_to_unique_data'], ['ajax']);

function delete_return_url($fallback)
{
    $return_to = $_GET['return_to'] ?? '';

    if (is_safe_local_redirect($return_to)) {
        return $return_to;
    }

    $referer = $_SERVER['HTTP_REFERER'] ?? '';
    $referer_parts = parse_url($referer);

    if (is_array($referer_parts) && isset($referer_parts['host']) && isset($_SERVER['HTTP_HOST']) && $referer_parts['host'] === $_SERVER['HTTP_HOST']) {
        $referer_path = $referer_parts['path'] ?? '/';
        $referer_query = isset($referer_parts['query']) ? '?' . $referer_parts['query'] : '';
        $referer_url = $referer_path . $referer_query;

        if (is_safe_local_redirect($referer_url)) {
            return $referer_url;
        }
    }

    return $fallback;
}

$delete_return_to = delete_return_url($class_name::$page_manage);

function delete_ajax_response($ok, $message, $id, $return_to, $status = 200)
{
    if (!is_ajax_request()) {
        return false;
    }

    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'ok' => (bool)$ok,
        'message' => $message,
        'id' => $id,
        'return_to' => $return_to,
    ]);
    exit;
}
?>
<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    $message = 'Sorry, a valid record ID is required for deletion.';
    $session->message($message);
    delete_ajax_response(false, $message, null, $delete_return_to, 400);
    redirect_to($delete_return_to);
} else {

    $class_found = $class_name::find_by_id($id);

    if (!$class_found) {
        $message = "Record ID (" . h($id) . ") was not found.";
        $session->message($message);
        delete_ajax_response(false, $message, $id, $delete_return_to, 404);
        redirect_to($delete_return_to);
    }

//if($class_found->username=="Admin" &&$class_name=="User"){
//    $session->message($class_found->username." cannot be deleted  ") ;
//    redirect_to($class_name::$page_manage);
//
//    if($class_found->id===$_SESSION["user_id"]){
//        $session->message($class_found->username." you cannot delete the active user logged in !(yourself)  ") ;
//        redirect_to($class_name::$page_manage);
//    }
//
//} else {

    if ($class_found->delete()) {
        $deleted_label = isset($class_found->pseudo) ? $class_found->pseudo : $class_name . " ID (" . h($id) . ")";
        $message = $deleted_label . " successfully deleted";
        $session->message($message);
        $session->ok(true);
        delete_ajax_response(true, $message, $id, $delete_return_to);
        redirect_to($delete_return_to);
    } else {
        $deleted_label = isset($class_found->pseudo) ? $class_found->pseudo : $class_name . " ID (" . h($id) . ")";
        $message = $deleted_label . " deletion failed ";
        $session->message($message);
        delete_ajax_response(false, $message, $id, $delete_return_to, 500);
        redirect_to($delete_return_to);
    }

//}


}


?>


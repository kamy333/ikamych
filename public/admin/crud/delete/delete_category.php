<?php require_once('../../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>

<?php $class_name = "Category";
MyClasses::require_class_access($class_name);
if ($Nav->folder_immediate != "admin") {
    $class_name::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name::$page_manage;
    $class_name::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name::$page_new;
    $class_name::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name::$page_edit;
    $class_name::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name::$page_delete;

}

?>

<?php
if (!isset($_GET["id"])) {
    redirect_to($class_name::$page_manage);
} else {

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1],
    ]);
    if ($id === false || $id === null) {
        $session->message("Sorry, a valid record ID is required.");
        redirect_to($class_name::$page_manage);
    }

    $class_found = $class_name::find_by_id($id);
    if (!$class_found) {
        $session->message("Sorry, the requested record was not found.");
        redirect_to($class_name::$page_manage);
    }


    if ($class_found->delete()) {
        $session->message($class_found->pseudo . " successfully deleted");
        $session->ok(true);
        redirect_to($class_name::$page_manage);
    } else {
        $session->message($class_found->pseudo . " deletion failed ");
        redirect_to($class_name::$page_manage);
    }


}


?>


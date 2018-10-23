<?php require_once('../../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>

<?php
MyClasses::redirect_disable_class();


if (isset($_GET['class_name'])) {
    $class_name = $_GET['class_name'];
//    $class_name::change_to_unique_data;
    call_user_func_array(array($class_name, 'change_to_unique_data'), ['data']);
} else {
    $class_name = "ToDoList";
}

//if ($Nav->folder_immediate != "admin") {
//    $class_name::$page_manage = $Nav->path_admin . $Nav->folder_prev . '/manage/' . $class_name::$page_manage;
//    $class_name::$page_new = $Nav->path_admin . $Nav->folder_prev . '/new/' . $class_name::$page_new;
//    $class_name::$page_edit = $Nav->path_admin . $Nav->folder_prev . '/edit/' . $class_name::$page_edit;
//    $class_name::$page_delete = $Nav->path_admin . $Nav->folder_prev . '/delete/' . $class_name::$page_delete;
//}

if (isset($_GET['id'])) {
    $post_link = $_SERVER["PHP_SELF"] . "?id=" . urldecode($_GET['id'] & "class_name=" . $class_name);
    $page = "Update";
    $page1 = "Update ";
    $text_post = "Updated";
    $text_post1 = "update";

} else {
    $post_link = $_SERVER["PHP_SELF"];
    $page = "New";
    $page1 = "Add New ";
    $text_post = "created";
    $text_post1 = "creation";

}


if (request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {

        $new_item = new $class_name();
        $expected_fields = $class_name::get_table_field();
        foreach ($expected_fields as $field) {
            if (isset($_POST[$field])) {
                $new_item->$field = trim($_POST{$field});
            }

        }

        //todo complete valid like pseudo

        $valid = $new_item->form_validation();

        if (empty($valid->errors)) {
            if ($new_item->save()) {
                $session->message($class_name . $new_item->pseudo . " " . "has been $text_post with ID (" . $new_item->id . ")");
                $session->ok(true);
                redirect_to($class_name::$page_manage);
            } else {
                $message = ($class_name . $new_item->pseudo . " " . "$text_post1 failed");

            }


        }


    }
} else {
    if (request_is_get()) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $get_item = $class_name::find_by_id($id);
        }


    }

}


?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "newdata"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = $class_name; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo isset($valid) ? $valid->form_warnings() : "" ?>


<?php if (!empty($message)) {
    echo $message;
} ?>

<?php checking(false); ?>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">


    <?php echo call_user_func_array(array($class_name, 'get_form_new_href'), array($class_name::$form_class_dependency)); ?>
    <!--    <h4 class="text-center"><a href="--><?php //echo $_SERVER["PHP_SELF"] ?><!--">-->
    <?php //echo $page ." " .$class_name::$page_name ?><!--</a> </h4>-->

    <?php echo call_user_func(array($class_name, 'Create_form')); ?>


</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

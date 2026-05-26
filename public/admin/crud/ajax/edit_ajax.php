<?php

require_once('../../../../includes/initialize.php');
$session->confirmation_protected_page();
//if (User::is_employee() || User::is_visitor()) {
//    redirect_to('index.php');
//}

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);
call_user_func_array([$class_name, 'change_to_unique_data'], ['ajax']);
$is_data = true;

$requested_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($requested_id === false || $requested_id === null) {
    $session->message('Sorry, no record ID was provided for editing.');
    redirect_to($class_name::$page_manage);
}

$url = clean_query_string('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . "?" . "class_name=" . u($class_name) . "&id=" . u($requested_id) . "&test=1");


if (isset($_GET['id'])) {
    $post_link = $_SERVER["PHP_SELF"] . "?class_name=" . u($class_name) . "&id=" . u($requested_id);
    $page = "Update";
    $page1 = "Update ";
    $text_post = "Updated";
    $text_post1 = "update";

} else {
    $post_link = $_SERVER["PHP_SELF"] . "?class_name=" . u($class_name);
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
        $new_item->assign_posted_fields($_POST, $expected_fields);

        //todo complete valid like pseudo

        if ($class_name == "User") {
            if (!isset($_POST['password']) || empty($_POST['password'])) {

                $required_field = $class_name::$required_fields_no_password;
                $kamy = "not isset no password ";
            } else {
                $required_field = $class_name::$required_fields;
                $kamy = "isset password";
            }
        }

        $valid = $new_item->form_validation();

        if (empty($valid->errors)) {


            if ($new_item->save()) {
                $session->message($class_name . $new_item->pseudo . " " . "has been $text_post with ID (" . $new_item->id . ")");
                $session->ok(true);
                $redirect_after_save = modal_form_return_url($class_name::$page_manage, $class_name, 'updated', $new_item->id);
                unset($_POST);
                redirect_to($redirect_after_save);
            } else {
                $session->message($class_name . $new_item->pseudo . " " . "$text_post1 failed or maybe nothing changed");
//                redirect_to($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
                $redirect_after_failure = modal_form_return_url($url, $class_name, 'error', $new_item->id ?? $requested_id);
                unset($_POST);
                redirect_to($redirect_after_failure);
//                echo '<script type="text/javascript">location.reload(true);</script>';
//                 echo '<script type="text/javascript">alert("hi");</script>';
//
//                $secondsWait = 1;
//                echo date('Y-m-d H:i:s');
//                echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';

            }


        }


    }
} else {
    if (request_is_get()) {
        if (isset($_GET['id'])) {
            $get_item = $class_name::find_by_id($requested_id);
            if (!$get_item) {
                $session->message('Sorry, the requested record was not found.');
                redirect_to($class_name::$page_manage);
            }
        }


    }

}


?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo isset($valid) ? $valid->form_warnings() : "" ?>

<?php if (isset($message)) {
    echo $message;
} ?>


<?php ?>

<?php checking(false); ?>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">

    <?php echo call_user_func_array([$class_name, 'get_form_new_href'], [$class_name::$form_class_dependency]); ?>

    <?php echo call_user_func([$class_name, 'Create_form']); ?>


</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

<?php //ob_end_flush(); ?>

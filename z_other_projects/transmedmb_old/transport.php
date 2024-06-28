<?php require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>


<?php

$class_name = MyClasses::redirect_disable_class();
//$class_name ="ViewTransportModelPivot";
call_user_func_array(array($class_name, 'change_to_unique_data'), ['transport']);

if (method_exists($class_name, 'updateDefiningTiming') && isset($_GET['action']) && $_GET['action'] == "updateDefiningTiming") {
    call_user_func_array(array($class_name, 'updateDefiningTiming'), ['']);
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


        $valid = $new_item->form_validation();

        if (empty($valid->errors)) {
            if ($new_item->save()) {
                $session->message($class_name . $new_item->pseudo . " " . "has been $text_post with ID (" . $new_item->id . ")");
                $session->ok(true);
                unset($_POST);
                redirect_to($class_name::$page_manage);

            } else {
                $session->message($class_name . $new_item->pseudo . " " . "$text_post1 failed or maybe nothing changed");
//                redirect_to($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
                unset($_POST);
                redirect_to($_SERVER['PHP_SELF'] . "?class_name={$class_name}");

            }


        }


    }
} else {
    if (request_is_get()) {
        if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "reverse_visible") {
            $id = (int)$_GET['id'];
            call_user_func_array([$class_name, "reverse_visible"], [$id]);
            redirect_to("transport.php?class_name={$class_name}");

            unset($_GET);
            redirect_to('index.php');

        }
        if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "delete_record") {

            $id = (int)$_GET['id'];
            call_user_func_array([$class_name, "delete_record"], [$id]);
            redirect_to("transport.php?class_name={$class_name}");

        }
    }

}
?>




<?php include "layouts/header.php" ?>


<div id="home-page" data-role="page">
    <!-- main content -->
    <div data-role="content">

        <!-- header logo -->
        <!--/header logo-->

        <!-- slider -->
        <!-- slider -->

        <div class="shadow1box">
            <img src="assets/images/shadow1.png" class="shadow1" alt="shadow">
        </div>

        <div class="content-padd">

            <?php
            $class_name = MyClasses::redirect_disable_class();

            call_user_func_array(array($class_name, 'change_to_unique_data'), ['transport']);

            echo isset($valid) ? $valid->form_errors() : "";
            echo isset($valid) ? $valid->form_warnings() : "";
            echo isset($message) ? $message : "";


            if (isset($_GET['action']) && ($_GET['action'] == "new" || ($_GET['action'] == "edit" && $_GET['id'])
                )
            ) {


                echo "<div class='col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2 white-bg'>";
                echo "<div class='col-md-3 col-md-offset-2'>";

                echo call_user_func_array(array($class_name, 'get_form_new_href'), array($class_name::$form_class_dependency));
                echo "</div>";
                $content = call_user_func_array([$class_name, "Create_form"], []);
                echo ibox($content, 12, '');

                echo "</div>";

            } elseif (isset($_GET['action']) && $_GET['action'] == "links_for_id" && isset($_GET['id'])) {

                echo call_user_func_array([$class_name, "links_for_id"], []);


            } else {
                echo call_user_func_array([$class_name, "main_display"], []);
            }


            ?>


        </div><!-- /content padd -->
    </div><!-- /content -->


    <!-- footer -->
    <?php include "layouts/footer_fixed.php" ?>
    <!-- /footer -->


</div><!-- /page -->
</body>
</html>

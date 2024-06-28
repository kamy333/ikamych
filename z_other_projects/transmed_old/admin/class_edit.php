<?php require_once('../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary()) {
    redirect_to('index.php');
}
if (User::is_visitor()) {
    redirect_to('../index.php');
}

?>

<?php if (isset($_GET["class_name"])) {
    $class_name = urldecode($_GET["class_name"]);
} else {
    $class_name = "User";
} ?>

<?php
if (isset($_GET['id'])) {
    $post_link = $_SERVER["PHP_SELF"] . "?id=" . urldecode($_GET['id']);
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
//                $session->message($class_name.$new_item->pseudo." "."has been $text_post with ID (".$new_item->id .")");
                $session->message($class_name . $new_item->id . " " . "has been $text_post with ID (" . $new_item->id . ")");

                $session->ok(true);
                redirect_to($class_name::$page_manage);
            } else {
                $session->message($class_name . $new_item->id . " " . "$text_post1 failed");

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

<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = "forms"; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo isset($valid) ? $valid->form_warnings() : "" ?>
<?php echo isset($message) ? output_message($message) : ""; ?>
<?php checking(false); ?>


<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="text-center m-t-lg">
                <h1>Form Edit for <?php echo $class_name; ?></h1>
                <small></small>
                <div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">
                    <a href="index.php">Index</a> &nbsp;&nbsp;
                    <a href="<?php echo $class_name::$page_manage ?>">Manage <?php echo $class_name ?></a>

                    <div class="background_light_blue">




                            <?php
                            echo call_user_func(array($class_name, 'Create_form'));
                            ?>






                            <div class="text-right ">
                                <a href="<?php echo $class_name::$page_manage; ?>" class="btn btn-info " role="button">Cancel</a>
                            </div>


                    </div>
                </div>

            </div>
        </div>
    </div>


</div>


<?php include(FOOTER) ?>


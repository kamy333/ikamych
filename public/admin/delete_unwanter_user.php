<?php require_once('../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>
<?php if (!User::is_kamy()) {
    redirect_to('index.php');
} ?>


<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php
if (request_is_post() && request_is_same_domain()) {
    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Request was not valid";
    } else {
        $id_min = trim($_POST['id_username']);

        $sql = "Delete from users where id >= $id_min ";

        if (User::delete_unwanted_users_after_ids($id_min)) {
            $message1 = "Users with ID above ids $id_min have been successfully deleted";
//            $message="<div class='col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4'>$message</div>";

            $session->message($message1);
            $session->ok(true);
            unset($_POST);
            unset($id_min);

//            redirect_to("manage_user.php");
            header('Location: ' . $_SERVER['PHP_SELF']);

        } else {

            $message1 = "Errors processing deleting Ids above $id_min maybe because there is no affected rows.";
//            $message="<div class='col-md-12  col-lg-12 '>$message</div>";
            $session->message($message1);
            unset($_POST);
            unset($id_min);
            header('Location: ' . $_SERVER['PHP_SELF']);


        }

    }


}


?>

<div id="<?php echo "message-php"; ?>">
    <div class="col-md-11 col-md-offset-1  col-lg-11 col-lg-offset-1 "">
    <?php if (isset($message)) {
        echo $message;
    } ?>

</div>


<div class="row">

    <div class="col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4 "">
    <button>
        <a href="manage_user.php">Manage User</a>
    </button>
</div>


<div class="row">

    <div class="col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4 ">
        <form id="delete_users_unwanted" class="form-signin " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
              onsubmit="onFormSubmit();">
            <?php echo csrf_token_tag(); ?>
            <h2 class="form-signin-heading text-center">Delete Unwanted User</h2>


            <label for="id_username" class="sr-only">username</label>
            <input type="number" name="id_username" id="id_username" class="form-control" placeholder="id Number"
                   required
                   value="815">
            <br>


            <button class="btn btn-lg btn-danger btn-block" id="submit" type="submit" name="submit" value="submit">
                Delete users
            </button>


        </form>

    </div>

</div>

<script>
    function onFormSubmit() {
        // event.preventDefault();

        // your Javascript code here
    }
</script>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

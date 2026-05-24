<?php require_once('../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>

<?php if (User::is_employee()) {
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
<?php if (isset($message)) {
    echo $message;
} ?>

<?php if (isset($_SESSION["user_id"])) {
    $user = User::find_by_id($_SESSION['user_id']);
} else {
    $user = "";
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1],
]);

if ($id === false || $id === null) {
    $session->message("The photo was not selected");
    redirect_to("index.php");
}

$the_user = User::find_by_id($id);
if (!$the_user) {
    $session->message("The user photo was not found");
    redirect_to("index.php");
}

?>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h1><?php echo h($the_user->fullname()); ?></h1>
            <img class="img-responsive" src="<?php echo h($the_user->user_path_and_placeholder()); ?>" alt="">
        </div>
    </div>
    <!-- /.row -->

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

<?php

require_once('../includes/initialize.php');
$session->confirmation_protected_page();
?>

<?php if (isset($_SESSION["user_id"])) {
    $user = User::find_by_id($_SESSION['user_id']);
} else {
    $user = "";
}

if (request_is_get()) {
    log_debug("yes");
} else {
    log_debug("no");
}


if (empty($_GET['id']) || !isset($_GET['id'])) {
    $session->message("The photo was not found");
    redirect_to("index.php");

}
$id = $_GET['id'] ?? '1';
$id = h($id);
$the_user = User::find_by_id($_GET['id']);

?>
<?php //var_dump($users) ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php //$view_full_table == 1 ? $fluid_view = true : $fluid_view = false; ?>
<?php $javascript = "" ?>
<?php $sub_menu = false ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>

<?php
//$the_user=new User();
?>

<div class="row">
    <div class="col-lg-12 col-md-12  text-center">
        <h2 class="text-center"><?php echo "<b>Name:   </b> " . $the_user->full_name(); ?></h2>
        <h2 class="text-center"><?php echo "<b>Username:   </b>" . $the_user->username; ?></h2>
        <br><br>
        <div class="col-lg-9 col-lg-offset-3 text-center">
            <img class="img-responsive" src="<?php echo $the_user->user_path_and_placeholder(); ?>" alt="">
        </div>
    </div>
</div>


<?php ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


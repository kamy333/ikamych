<?php require_once('../../includes/initialize_transmed.php'); ?>
<?php
if (isset($session->user_id)) {
    $found_user = User::find_by_id($session->user_id);

    log_action('Logout', "{$found_user->username} logged out.");
}
$session->logout();
if (User::is_visitor()) {
    redirect_to('/Inspinia/index.php');
}
redirect_to("login.php");
?>

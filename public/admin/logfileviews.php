<?php require_once("../../includes/initialize.php"); ?>
<?php $session->confirmation_protected_page(); ?>

<?php
if (!User::is_admin()) {
    redirect_to("index.php");
}

$logfile = SITE_ROOT . DS . 'logs' . DS . 'views.txt';
$user = User::find_by_id($session->user_id);

if (request_is_post() && request_is_same_domain() && ($_POST['clear_log'] ?? '') === 'true') {
    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $session->message("Request was not valid");
        redirect_to('logfileviews.php');
    }
    file_put_contents($logfile, '');
    // Add the first log entry
    log_action('Logs Views Cleared', "by Username {$user->username} with ID {$session->user_id}");
    redirect_to('logfileviews.php');
}
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<a href="index.php">&laquo; Back</a><br/>
<br/>

<h2>Log File Views</h2>

<form action="logfileviews.php" method="POST">
    <?php echo csrf_token_tag(); ?>
    <input type="hidden" name="clear_log" value="true">
    <button type="submit" class="btn btn-danger">Clear log View file</button>
</form>
<br>

    <?php

    if (!file_exists($logfile)) {
        $handle1 = fopen($logfile, "w");
        fclose($handle1);
    }

    if (file_exists($logfile) && is_readable($logfile) &&
        $handle = fopen($logfile, 'r')) {  // read
        echo "<ul class=\"log-entries\">";
        while (!feof($handle)) {
            $entry = fgets($handle);


            if (trim($entry) != "") {
                $search = "UserId:";
                $pos = strrpos($entry, $search);
                $lenentry = strlen($entry);
                $lensearch = strlen($search);
                $userId = (int)substr($entry, $pos + $lensearch);
                If ($userId) {
                    $user = User::find_by_id($userId);
                    $u = $user ? $user->username . " " . $user->first_name . " " . $user->last_name : "Unknown user.";
                } else {

                    $u = "Not logged in.";
                }

                if (!$userId) {
                    echo "<li>" . h($entry) . " |  " . h($u) . "</li>";
                } else {
                    echo "<li style='background-color: yellow'>" . h($entry) . " |  " . h($u) . "</li>";
                }

            }
        }
        echo "</ul>";
        fclose($handle);
    } else {
        echo "Could not read from " . h($logfile) . ".";
    }

    ?>

    <?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

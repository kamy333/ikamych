<?php require_once("../../includes/initialize.php"); ?>
<?php $session->confirmation_protected_page(); ?>

<?php
if (!User::is_admin()) {
    redirect_to("index.php");
}

$logfile = SITE_ROOT . DS . 'logs' . DS . 'queries.txt';
$user = User::find_by_id($session->user_id);

if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    file_put_contents($logfile, '');
    // Add the first log entry
    log_action('Logs Queries Cleared', "by Username {$user->username} with ID {$session->user_id}");
    // redirect to this same page so that the URL won't 
    // have "clear=true" anymore
    redirect_to('logfilequeries.php');
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

<h2>Log File Queries</h2>

<p><a href="logfilequeries.php?clear=<?php echo u('true'); ?>">Clear log Queries file</a><p>

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
                    $u = $user->username . " " . $user->first_name . " " . $user->last_name;
                } else {

                    $u = "Not logged in.";
                }

                if (!$userId) {
                    echo "<li>{$entry} |  $u</li>";
                } else {
                    echo "<li style='background-color: yellow'>{$entry} |  $u</li>";
                }

            }
        }
        echo "</ul>";
        fclose($handle);
    } else {
        echo "Could not read from {$logfile}.";
    }

    ?>

    <?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

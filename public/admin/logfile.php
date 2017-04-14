<?php require_once("../../includes/initialize.php"); ?>
<?php  $session->confirmation_protected_page(); ?>

<?php

  $logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
  $user=User::find_by_id($session->user_id);

  if( isset($_GET['clear'])&& $_GET['clear'] == 'true') {
		file_put_contents($logfile, '');
	  // Add the first log entry
	  log_action('Logs Cleared', "by Username {$user->username} with ID {$session->user_id}");
    // redirect to this same page so that the URL won't 
    // have "clear=true" anymore
    redirect_to('logfile.php');
  }
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="admin"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<a href="index.php">&laquo; Back</a><br />
<br />

<h2>Log File</h2>

<p><a href="logfile.php?clear=<?php echo u('true');?>">Clear log file</a><p>

<?php

if(!file_exists($logfile)){
     $handle1= fopen($logfile, "w");
    fclose($handle1);
}

  if( file_exists($logfile) && is_readable($logfile) && 
			$handle = fopen($logfile, 'r')) {  // read
    echo "<ul class=\"log-entries\">";
		while(!feof($handle)) {
			$entry = fgets($handle);
			if(trim($entry) != "") {
				echo "<li>{$entry}</li>";
			}
		}
		echo "</ul>";
    fclose($handle);
  } else {
    echo "Could not read from {$logfile}.";
  }

?>

<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

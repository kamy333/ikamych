<?php require_once('../../../includes/initialize.php'); ?>
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

<?php

$exp = MyExpense::find_by_id(136);
echo $exp->document;
echo "<br><br>";
$folder = "/public/img/maman_document/";
$file = $exp->document;
//$file="2020-06-28-Avis BGG  Maman  Office poursuite CSS Assurance 259.90.pdf";

//$full_path=u($folder.$file);
$full_path = $folder . $file;
$lnk = "<a href='$full_path'>$file</a>";
echo $lnk;

echo "<br><br>";

$file = "Wincasa Golchan Loyer comptabilite retard.pdf";
$full_path = $folder . $file;
$lnk = "<a href='$full_path'>$file</a>";
echo $lnk;
echo "<br><br>";
$pi = pathinfo($full_path);
$txt = $pi['filename'];
$ext = $pi['extension'];

echo $txt;
echo "<br><br>";
echo $ext;

?>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
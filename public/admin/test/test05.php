<?php require_once('../../../includes/initialize.php'); ?>
<?php if (isset($session)) { $session->confirmation_protected_page();} ?>

<?php if (User::is_employee()) {    redirect_to('index.php');} ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) { echo $message;} ?>

<?php
//$var=new SetUp();
//$var->create_xml2();
//
//echo "<br><hr>";
//
//$var->read_xml();

echo "<a target='_blank' href='https://www.sitepoint.com/php-dom-working-with-xml/'>Sitepoint</a><br>";

$xmlPath="";
$lib=new Library($xmlPath);

echo $lib->read_xml2();

echo "<br><hr>";
$genre="Horror";
//echo $lib->findBooksByGenre($genre);

 $lib->Tutorialspoint();

?>



<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
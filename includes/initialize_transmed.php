<?php


setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_URL') ? null : define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);
defined('SITE_ROOT') ? null : define('SITE_ROOT', realpath(dirname(__FILE__).DS."..".DS));
defined('MY_URL_PUBLIC') ? null : define('MY_URL_PUBLIC', SITE_URL . '/ikamych/transmed/');
defined('MY_URL_ADMIN') ? null : define('MY_URL_ADMIN', MY_URL_PUBLIC . 'admin/');


$server_name = $_SERVER['SERVER_NAME'];
$server_local = "localhost";
$server_phpstorm = "PhpStorm 2017.1";

if ($server_name === $server_local || $server_name === $server_phpstorm) {

    defined('SESSION_PATH')? null : define('SESSION_PATH', 'C:' . DS . 'xampp' . DS . 'tmp' . DS . 'session_rajah');

} else {
    defined('SESSION_PATH') ? null : define('SESSION_PATH', DS . 'home' . DS . 'client' . DS . 'deb3c60f593dc39b840d3285ba2d7b42' . DS . 'tmp');

}

//----------------------------------------DELETE----------------------------------

defined('BR') ? null : define('BR', '<br>');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

defined('PATH_UPLOAD') ? null : define('PATH_UPLOAD', SITE_ROOT.DS.'uploads');


defined('CONFIG_HEADER') ? null : define('CONFIG_HEADER', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'config_header.php');
defined('HEADER') ? null : define('HEADER', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'header.php');
defined('HEADER_PUBLIC') ? null : define('HEADER_PUBLIC', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'header_public.php');
defined('HEADER_CANVAS') ? null : define('HEADER_CANVAS', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'header_canvas.php');

defined('FOOTER') ? null : define('FOOTER', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'footer.php');
defined('FOOTER_PUBLIC') ? null : define('FOOTER_PUBLIC', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'footer_public.php');

defined('NAV') ? null : define('NAV', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'nav.php');
defined('NAV_PUBLIC') ? null : define('NAV_PUBLIC', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'nav_public.php');
defined('NAV_CANVAS') ? null : define('NAV_CANVAS', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'nav_canvas.php');

defined('SIDEBAR') ? null : define('SIDEBAR', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'sidebar.php');
defined('SIDEBAR_CANVAS') ? null : define('SIDEBAR_CANVAS', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'sidebar_canvas.php');
defined('TABLE_MANAGE') ? null : define('TABLE_MANAGE', SITE_ROOT . DS . 'transmed' . DS . 'layouts' . DS . 'table_manage.php');


$logo = "<span style='color: #0016b0'><b>T</b></span>";
$logo .= "<span style='color: green'><b>r</b></span>";
$logo.="<span style='color: red'><b>a</b></span>";
$logo.="<span style='color: darkorchid'><b>n</b></span>";
$logo .= "<span style='color: royalblue'><b>s</b></span>";
$logo .= "<span style='color:red'><b>m</b></span>";
$logo.="<span style='color: palevioletred'><b>e</b></span>";
$logo .= "<span style='color: darkcyan'><b>d</b></span>";
//$logo.="<b>".$logo."</b>";
defined('LOGO')   ? null : define("LOGO", $logo);


// load config file first
//require_once(LIB_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions'.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'session.php');
//require_once(LIB_PATH.DS.'functions_security.php');

//put functions
require_once(LIB_PATH.DS . 'functions'.DS."security_csrf_token_functions.php");
require_once(LIB_PATH.DS . 'functions'.DS."security_request_forgery_functions.php");
require_once(LIB_PATH.DS . 'functions'.DS."security_mcrypt_functions.php");
require_once(LIB_PATH.DS . 'functions'.DS."security_allowed_get.php");
require_once(LIB_PATH.DS . 'functions'.DS."reset_token_functions.php");

//require_once(LIB_PATH.DS . "function_links.php"); //todo clean up and move to function


require_once(LIB_PATH . DS . 'config.php');

$use_database_mysqli=false;

require_once(LIB_PATH . DS . 'MyClasses.php');

if($use_database_mysqli){
    require_once(LIB_PATH.DS.'database_mysqli.php');
}else {
    require_once(LIB_PATH.DS.'database.php');}

require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'pagination.php');
require_once(LIB_PATH.DS.'Form.php');
require_once(LIB_PATH.DS.'FormValidation.php');
require_once(LIB_PATH.DS.'Table.php');
require_once(LIB_PATH . DS . 'Modal.php');

require_once(LIB_PATH.DS.'phpmailer'.DS.'class.phpmailer.php');
require_once(LIB_PATH.DS.'phpmailer'.DS.'class.smtp.php');
require_once(LIB_PATH.DS.'phpmailer'.DS.'language'.DS.'phpmailer.lang-am.php');
require_once(LIB_PATH.DS.'MyPHPMailer.php');

require_once(LIB_PATH.DS.'Nav.php');

// load database-related classes
require_once(LIB_PATH.DS.'user.php');
require_once(LIB_PATH.DS.'UserType.php');
require_once(LIB_PATH.DS.'FailedLogin.php');
require_once(LIB_PATH.DS.'BlacklistIp.php');
require_once(LIB_PATH.DS."BrowserDetect.php");
require_once(LIB_PATH.DS.'Client.php');
require_once(LIB_PATH.DS.'Project.php');

require_once(LIB_PATH.DS.'Category1.php');
require_once(LIB_PATH.DS.'Category2.php');
require_once(LIB_PATH.DS.'Category.php');

require_once(LIB_PATH.DS.'InvoiceActual.php');
require_once(LIB_PATH.DS.'InvoiceSend.php');
require_once(LIB_PATH.DS.'InvoiceEstimate.php');
require_once(LIB_PATH.DS.'Links.php');
require_once(LIB_PATH.DS.'LinksCategory.php');
require_once(LIB_PATH . DS . 'HeurePresence.php');

require_once(LIB_PATH.DS.'MyCigarette.php');
require_once(LIB_PATH.DS.'MyCigaretteByPeriod.php');
require_once(LIB_PATH.DS.'Currency.php');
require_once(LIB_PATH.DS.'MyExpensePerson.php');
require_once(LIB_PATH.DS.'ToDoList.php');
require_once(LIB_PATH . DS . 'Note.php');

require_once(LIB_PATH.DS.'MyExpenseType.php');
require_once(LIB_PATH.DS.'MyHouseExpenseType.php');
require_once(LIB_PATH.DS.'MyExpense.php');
require_once(LIB_PATH.DS.'MyHouseExpense.php');
require_once(LIB_PATH.DS.'Chat.php');
require_once(LIB_PATH.DS.'ChatFriend.php');

require_once(LIB_PATH.DS.'Notification.php');

require_once(LIB_PATH.DS.'Photo.php');
require_once(LIB_PATH.DS.'Comment.php');

require_once(LIB_PATH.DS.'transport'.DS.'TransportChauffeur.php');
require_once(LIB_PATH.DS.'transport'.DS.'TransportClient.php');
require_once(LIB_PATH.DS.'transport'.DS.'TransportType.php');
require_once(LIB_PATH.DS.'transport'.DS.'TransportProgramming.php');
require_once(LIB_PATH.DS.'transport'.DS.'TransportProgrammingModel.php');


require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportModel.php');
require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportModelVisibleNo.php');
require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportModelVisibleYes.php');

require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportModelPivot.php');

require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportModelPivotNo.php');
require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportModelPivotYes.php');
require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportSummaryCourseDateProgram.php');
require_once(LIB_PATH . DS . 'transport' . DS . 'ViewTransportModelByChauffeur.php');


//require_once(LIB_PATH.DS.'photograph.php');
//require_once(LIB_PATH.DS.'comment.php');
//require_once(LIB_PATH.DS.'links.php');


?>
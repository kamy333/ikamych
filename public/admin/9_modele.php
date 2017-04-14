<?php require_once('../../includes/initialize.php');?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee() || User::is_secretary()){ redirect_to('index.php');}?>

<?php
//if(isset($_GET['class_name'])){
//    $class_name=urldecode($_GET['class_name']);
//} else{
//    $class_name=false;
//    $session->message('No class name defined');
//    redirect_to('index.php');
//}


$class_name="Client";

$table_name=$class_name::get_table_name();


// server user password server
//$db=new mysqli('localhost','oophp','lynda','oophp');
unset($database);

$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$db->set_charset('utf-8');

if ($db->connect_error) {
$error = $db->connect_error;
} else {
$sql = 'SELECT * FROM' . ' '.$table_name ;
$sql.= " ".get_where_string($class_name);



$result = $db->query($sql);
if ($db->error) {
$error = $db->error;
}
}

function getRow($result) {
return $result->fetch_assoc();
}

require_once LIB_PATH.DS.'src'.DS.'Foundationphp'.DS.'Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', LIB_PATH.DS.'src'.DS.'Foundationphp');

use Foundationphp\Exporter\Csv;

//require_once 'includes/cars_mysqli.php';
if (isset($_POST['download'])) {
    try {
        $options['suppress'] = 'transmission';
//        $options['delimiter'] = "\t";
        new Csv($result, $table_name.'.csv', $options);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="admin" ?>
<?php $stylesheets="" //custom_form  ?>
<?php $view_full_table==1? $fluid_view=true :$fluid_view=false; ?>
<?php $javascript="form_admin" ?>
<?php $sub_menu=false ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>
<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php echo $message; ?>


<!--<form name="form_client"  class="form-horizontal" method="post" action="<?php /*echo $_SERVER["PHP_SELF"];*/?>">

    <fieldset id="login" title="Client">
        <legend class="text-center" style="color: #0000ff"><?php /*echo $page1 . $class_name::$page_name */?></legend>


    </fieldset>



    <div class="col-sm-offset-3 col-sm-7 col-xs-3">
        <button type="submit" name="submit" class="btn btn-primary"><?php /*echo 'download csv'; */?></button>
    </div>

    <div class="text-right " >
        <a href="<?php /*echo 'index.php'; */?>" class="btn btn-info " role="button">Cancel</a>
    </div>



</form>-->




<?php //include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

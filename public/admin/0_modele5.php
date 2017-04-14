<?php


require_once('../../includes/initialize.php');
$session->confirmation_protected_page();
if(User::is_employee() || User::is_secretary()){ redirect_to('index.php');}



require_once LIB_PATH.DS.'src'.DS.'Foundationphp'.DS.'Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', LIB_PATH.DS.'src'.DS.'Foundationphp');

use Foundationphp\Exporter\Csv;

//$class_name="Client";

if (isset($_POST['download'])) {


    if(isset($_POST['class_name'])){
        $class_name=urldecode($_POST['class_name']);
    } else{
        $class_name=false;
        $session->message('No class name defined');
        redirect_to('index.php');
    }
    $table_name=$class_name::get_table_name();

    $db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $db->set_charset('utf-8');

    if ($db->connect_error) {
        $error = $db->connect_error;
    } else {
        $sql = 'SELECT * FROM' . ' '.$table_name ;
//$sql.= " ".get_where_string($class_name);

        $result = $db->query($sql);
        if ($db->error) {
            $error = $db->error;
        }

    }





    try {
//        $options['suppress'] = 'transmission';
//        $options['delimiter'] = "\t";
        $options="";
        new Csv($result, $table_name.'.csv', $options);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="download" ?>
<?php $stylesheets="" //custom_form  ?>
<?php $view_full_table==1? $fluid_view=true :$fluid_view=false; ?>
<?php $javascript="form_admin" ?>
<?php $sub_menu=false ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>
<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php echo $message; ?>




<h4 class="text-center"><a href="<?php echo $_SERVER["PHP_SELF"] ?>"><?php echo 'Download CSV' ?></a> </h4>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">
    <a href="index.php">Index</a> &nbsp;&nbsp;

    <div class ="background_light_blue">

        <form name="form_client"  class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

            <fieldset id="login" title="Client">
                <legend class="text-center" style="color: #0000ff"><?php echo 'Download CSV'?></legend>


            </fieldset>

            <?php $all_class=array('User','Client','Category','BlacklistIp','Links','LinksCategory','Project','Category1','Category2','InvoiceActual','FailedLogin','user_type') ?>

            <div class='form-group'>
                <label  class='col-sm-3 control-label' for="xxxx" >Choose</label>
                <div class='col-sm-9'>
                    <select  class='form-control' id="xxxx" name='class_name'>
                        <?php foreach($all_class as $cl) {      ?>
                            <option value="<?php echo $cl ?>" ><?php echo $cl ?></option>

                        <?php } ?>

                    </select>

                </div>
            </div>

            <div class="col-sm-offset-3 col-sm-7 col-xs-3">
                <button type="submit" name="download" class="btn btn-primary"><?php echo 'download csv'; ?></button>
            </div>

            <div class="text-right " >
                <a href="<?php echo 'index.php'; ?>" class="btn btn-info " role="button">Cancel</a>
            </div>



        </form>
    </div>
</div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>




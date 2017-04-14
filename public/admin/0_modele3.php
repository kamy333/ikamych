<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee()){ redirect_to('index.php');}?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="admin"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<a href="manage_user.php">user</a>
<br>
<?php


$page_link= $_SERVER["PHP_SELF"]."?page=".u(1)."&view=".u("shalom")."&home=".u("salut joe")."&order_name=".u("pseudo");
echo $page_link."<br>";

$query_string= urldecode($_SERVER['QUERY_STRING']);

echo "qry url decode:   ". $query_string."<br>";
//checking(true);

$query_string= $_SERVER['QUERY_STRING']."<br>";
echo "qry url opss:   ". $query_string;


parse_str($_SERVER['QUERY_STRING']);

echo $page."<br>";
echo $view."<br>";
echo $home."<br>";


$array=array();
foreach($_GET as $key=>$val){
    if($key=='page'){

    } else {
        $url_decode=urldecode($val);
        $array[$key] =$url_decode  ;

    }
}
echo "<pre>";
print_r($array);
echo "</pre>";

$new= http_build_query($array);

echo "http_build_query: ".$new."<br>";
echo  "<hr>";

$a=remove_get(array('page'));

echo $a;


?>


<h4 class="text-center"><mark><a href="<?php echo $page_link ?>">my modele</a> </mark></h4>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">


    <div class ="background_light_blue">





    </div>
</div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>




<?php

$active_menu=basename($_SERVER["PHP_SELF"]) ;
$active_menu_clean = str_replace(".php", "", $active_menu);

//change this if the folder name of project changes
$folder_project_name="Inspinia";


if (basename(dirname($_SERVER['SCRIPT_FILENAME']))=="admin"){
    $path_admin="";
    $path_public="../";
    $path="../";
    $layout_context="admin";
    $active_admin="active";
    $active_public="";

} else {
    $path_admin="admin/";
    $path_public=""  ;
    $path="";
    $layout_context="public";
    $active_admin="";
    $active_public="active";
} ?>



<?php if (basename(dirname($_SERVER['SCRIPT_FILENAME']))=="admin"){ ?>
    <script>
        var $layout_context="admin";
        var $path_admin="";
        var  $path_public="../";
        var $path="../";
    </script>

<?php  } else {?>
    <script>
        var $layout_context="public";
        var $path_admin="admin/";
        var $path_public=""  ;
        var $path="";
    </script>

<?php  } ?>


<?php if(isset($_SESSION["user_id"])) {$user=User::find_by_id($_SESSION['user_id']);} else {$user="";} ?>
<?php if(isset($_SESSION["user_id"])) {$user->set_user_type();} ?>
    <?php
//isset($_GET['menu_canvas'])? $menu_canvas= true : $menu_canvas= false; //select the view?>
<?php //$menu_canvas= false; //test?>


<?php

$class_array_admin=array('User','Client','Project','InvoiceActual','InvoiceEstimate','InvoiceSend','Chat','Notification');
$class_array_setup_admin=array('Currency','Category','Category1','Category2','UserType');

$class_array_kamy=array('Links','MyExpense','MyCigarette','MyCigaretteDay','MyCigaretteMonth','MyCigaretteYear');
$class_array_setup_kamy=array('MyExpensePerson','MyExpenseType');
$class_array_setup_transport=array('TransportChauffeur','TransportClient','TransportType',
    'TransportProgramming','TransportProgrammingModel');

if (!isset($class_name)) {
    $class_name = "";

}


if(in_array($class_name,$class_array_setup_transport)){
    $class_transport_active=" active";
    $class_transport_collapse="";
} else {
    $class_transport_active="";
    $class_transport_collapse=" collapse";
}

if(in_array($class_name,$class_array_admin)){
    $class_admin_active=" active";
    $class_admin_collapse="";
} else {
    $class_admin_active="";
    $class_admin_collapse=" collapse";
}


if(in_array($class_name,$class_array_setup_admin)){
    $class_setup_admin_active=" active";
    $class_setup_admin_collapse="";
} else {
    $class_setup_admin_active="";
    $class_setup_admin_collapse=" collapse";
}


if(in_array($class_name,$class_array_kamy)){
    $class_kamy_active=" active";
    $class_kamy_collapse="";
} else {
    $class_kamy_active="";
    $class_kamy_collapse=" collapse";
}

if(in_array($class_name,$class_array_setup_kamy)){
    $class_setup_kamy_active="active";
    $class_setup_kamy_collapse="";
} else {
    $class_setup_kamy_active="";
    $class_setup_kamy_collapse="collapse";
}

?>
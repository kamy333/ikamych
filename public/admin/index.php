<?php
require_once('../../includes/initialize.php');?>
<?php  $session->confirmation_protected_page(); ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="admin" ?>
<?php $stylesheets="" //custom_form  ?>
<?php $sub_menu=true; ?>
<?php $javascript="form_admin" ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<span><a href="../index.php">&laquo; Public</a></span>
<h2>Menu</h2>

	<?php
if (isset($message)) {
    echo $message;
}
    ?>

<?php

if(User::is_visitor() ){ redirect_to('../../Inspinia/index.php');}

?>

<div class="row">


<?php
echo DatabaseObject::form_structure();

if(isset($_GET['class_name'])){
    $class_name = $_GET['class_name'];

    echo "<div class='row'>";

    echo $class_name::class_structure();

    echo $class_name::find_column_name();
    echo "</div>";
//    echo "";
}


?>
</div>

<hr>

<div class='row'>
    <div class='col-md-12'>

        <p>Admin en construction link button not working</p>

        <?php echo button_color('success', "<i class='fa fa-maxcdn'>&nbsp;User</i>", '/public/admin/manage_user.php', '','','',2) ; ?>

        <?php echo button_color('primary', "<i class='fa fa-automobile'>&nbsp;My Expense</i>", '/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense', '','','',2); ?>

        <?php echo button_color('primary', "<i class='fa fa-male'>&nbsp;Clients</i>", 'transport.php?cl=tClient', ''); ?>
        <?php echo button_color('danger', "<i class='fa fa-user'>&nbsp;Chauffeur</i>", 'transport.php?cl=Chauffeur', ''); ?>
        <?php echo button_color('warning', "<i class='fa fa-cab'>&nbsp;Transport Type</i>", 'transport.php?cl=TransportType', ''); ?>


    </div>
</div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
		

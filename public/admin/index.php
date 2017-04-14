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

<!---->
<?php

if(User::is_visitor() ){ redirect_to('../../Inspinia/index.php');}

?>

<div class="row">

   
    
<?php
echo DatabaseObject::form_structure();

if(isset($_GET['class_name'])){
    $class_name=$_GET['class_name'];
    echo $class_name::class_structure();
}



//
//echo Category::class_structure();
//echo Category1::class_structure();
//echo Category2::class_structure();
//
//echo User::class_structure();
//echo Chat::class_structure();
////echo ChatFriend::class_structure();
//
//echo Client::class_structure();
//echo Comment::class_structure();
//echo Currency::class_structure();
//
//echo FailedLogin::class_structure();
//echo InvoiceActual::class_structure();
//echo InvoiceEstimate::class_structure();
//echo InvoiceSend::class_structure();
//
//echo Links::class_structure();
//echo LinksCategory::class_structure();
//echo MyCigarette::class_structure();
//echo MyExpense::class_structure();


?>
</div>

<hr>

<div class="row">
    <div class="col-md-12">


<ul>
    <li>    <li><a href="../../Inspinia/">Bralia click </a></li>

</ul>



<ul>
    <li><a href="manage_custom_form.php">custom</a></li>
    <li><a href="../../smartAdmin/">SmartAdmin</a></li>
    <li><a href="../../SmartAdmin_Full_Version_html/">SmartAdmin Full Version</a></li>
    <li><a href="../../Inspinia/">Inspinia</a></li>
    <li><a href="../../Inspinia_Full_Version/">Inspinia Full Version</a></li>
</ul>

	<ul>
		<li><a href="logfile.php">View Log file</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="logout.php">Logout</a></li>


    </ul>

<ul>
        <li><a href="manage_user.php">Manage User</a></li>
        <li><a href="new_user.php">New User</a></li>
        <li><a href="#">Edit User</a></li>
        <li><a href="#">Delete User</a></li>
</ul>

<ul>
        <li><a href="#">Manage Project</a></li>
        <li><a href="#">New Project</a></li>
        <li><a href="#">Edit Project</a></li>
        <li><a href="#">Delete Project</a></li>
</ul>
<ul>
        <li><a href="#">Manage Invoice Estimate</a></li>
        <li><a href="#">New Invoice Estimate</a></li>
        <li><a href="#">Edit Invoice Estimate</a></li>
        <li><a href="#">Delete Invoice Estimate</a></li>
</ul>

<ul>
        <li><a href="#">Manage Invoice Actual</a></li>
        <li><a href="#">New Invoice Actual</a></li>
        <li><a href="#">Edit Invoice Actual</a></li>
        <li><a href="#">Delete Invoice Actual</a></li>
</ul>

<ul>
        <li><a href="">Manage Invoice</a></li>
        <li><a href="">New Invoice</a</li>
        <li><a href="">Edit Invoice</a></li>
        <li><a href="">Delete Invoice</a></li>

    </ul>

    </div>
</div>

<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>
		

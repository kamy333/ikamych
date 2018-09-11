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
    //    class Foo {
    //        public static $staticProperty = 'foobar';
    //
    //        public $property = 'barfoo';
    //        protected $privateProperty = 'foofoo';
    //    }
    //
    //    $reflectionClass = new ReflectionClass('DatabaseObject');
    //
    //    var_dump($reflectionClass->getProperty('staticProperty')->getValue());
    //    var_dump($reflectionClass->getProperty('property')->getValue(new DatabaseObject));
    //
    //    $reflectionProperty = $reflectionClass->getProperty('privateProperty');
    //    $reflectionProperty->setAccessible(true);
    //    var_dump($reflectionProperty->getValue(new DatabaseObject));
    //    ?>



    
<?php
echo DatabaseObject::form_structure();

if(isset($_GET['class_name'])){
    $class_name=$_GET['class_name'];
    echo $class_name::class_structure();
}

    //    $reflectionClass = new ReflectionClass('User');
    //
    //    var_dump($reflectionClass->getProperty('staticProperty')->getValue());
    //    var_dump($reflectionClass->getProperty('property')->getValue(new User));
    //
    //    $reflectionProperty = $reflectionClass->getProperty('privateProperty');
    //    $reflectionProperty->setAccessible(true);
    //    var_dump($reflectionProperty->getValue(new User));
    //




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
		

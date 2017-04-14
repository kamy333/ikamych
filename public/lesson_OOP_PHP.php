<?php require_once('../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if(User::is_employee()){ redirect_to('index.php');}?>

<?php $layout_context = "public"; ?>
<?php $active_menu="lesson"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php //include_layout_template('nav.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>



<h4 class="text-center"><mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">OOP PHP</a> </mark></h4>

<div id="myheader">
<ul>
<li><a href="#variable_variable">Variable Variable</a></li>
    <li><a href="#arrays">arrays</a></li>
    <li><a href="#static-variable">Static Variable</a></li>
    <li><a href="#Object-Class">Object Class</a></li>
<!--    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>-->

</ul>
</div>

<div class="row">
    <div class="col-md-5 box"  >

        <span><a href="#myheader">&laquo;back</a></span><br>
        <h4 id="variable_variable"><strong>Variable Variable</strong></h4>
to convert the result of a Variable to variable $$.
 <?php
 echo '<br>$a=hello - $hello = hello everyone  then $$a ->hello everyone ';

 ?>

    </div>
</div>

<div class="row">
    <div class="col-md-5 box"  >

        <span><a href="#myheader">&laquo;back</a></span><br>
        <h4 id="arrays"><strong>Function Arrays</strong></h4>
        <?php
        echo 'array_shift pull out 1st element of array';
        echo '<br> array_unshift push to 1st element of array';
        echo '<br> array_pop pull out last element of array';
        echo '<br> array_push push to last element of array';

        ?>

    </div>
</div>


<div class="row">
    <div class="col-md-5 box"  >

        <span><a href="#myheader">&laquo;back</a></span><br>
        <h4 id="static-variable"><strong>Static Variable</strong></h4>
        <?php
        echo 'inside a function static $a will keep the value if call multiple time';
        echo '<br> function test1(){ ';
        echo '<br> static $a;';
        echo '<br> $a++; }';
        echo '<br> each time function is called $a will increment by 1';

        ?>

    </div>
</div>




<div class="row">
    <div class="col-md-5 box"  >

        <span><a href="#myheader">&laquo;back</a></span><br>
        <h4 id="Object-Class"><strong>Object Class</strong></h4>
        <?php
        echo 'Define class start with class + Name (camel case)';
        echo '<br> to get all classes <b>get_declared_classes()</b>  result is array and we can do foreach';
        echo '<br> to see if class exists <b>class_exists("ClassName")</b>  return true false';
        echo '<br> method is function inside class ';
        echo '<br> to get methods <b>get_class_methods(\"ClassName\")</b>  return array';
        echo '<br> bool method_exist("ClassName",("methodname")) ';
        echo '<hr>';
        echo '<br> instatiate a class';
        echo '<br> <b>$var= new ClassName()</b> we could pass some args inside ';
        echo '<br> if we want to know a $var instance of a class is get_class($var)and will return class name';
        echo '<br> or bool  <b>is_a($var,ClassName)</b>  ';
        echo '<br>so to call a function of a class instance <b>$var->function</b> ';
        echo '<br> to reference inside class we use <b>$this</b> ';
        echo '<br> properties are variables that are inside a class ';
        echo '<br> inside class if we declare properties we need <b>var</b> in front unless we put public,  private, protected called "access modifiers"';
        echo '<br> the same apply access modifiers apply to methods  ';
        echo '<br> <b>public</b> can be accessed from outside a class ';
        echo '<br> <b>protected</b> available within class or inherited class';
        echo '<br> <b>private</b> only available within class and not even on inherited class';
        echo '<br> if we want to get property value through instance <b>$var->property</b> without $ in front of property () is for function';
        echo '<br> to get class variable or properties <b>get_class_vars("ClassName")</b> associative array name of properties and values ';
        echo '<br> bool <b>propery_exists("ClassName","property_name")</b> no $ sign';
        echo '<br> <hr> ';
        echo '<br> Inheritance';
        echo '<br> will inherit the properties and methods of his parents';
        echo '<br> when a child <b>class ClassName extends ParentClass</b> ';
        echo '<br> We can override the parent properties and methods in the child by using the same name';
        echo '<br> to get parent class of child <b>get_parent_class("ChildClass")</b> blank if false';
        echo '<br> bool <b>is_subclass_of("ChildClass","ParentClass")</b> or vice-versa to see true of false';
        echo '<br> <hr>';
        echo 'Static ';
        echo '<br> We can declare a property or method as static and it is usable even if there is no instance of that class';
        echo '<br> eg property <b>static $var</b> or <b>static function name</b>';
        echo '<br> to call from outside or assign <b>Classname::$property</b> with $ sign or  <b>Classname::static_function()</b>';
        echo '<br> to call or assign within the class we use <b>self::</b> or <b>static::</b>  for late binding';
        echo '<br>Note:static variable are share within the inheritance tree so where a value to one it will be the same for all ';
        echo '<br> if we want to refer to parent properties or method we use <b>parent::</b>';
        echo '<br> <b>parent::</b>  could be used with instance methods too but not attributes or properties ';
        echo '<hr> ';
        echo '<br> Contruct - Destruct ';
        echo '<br> <b>function__construct()</b> will initialize or perform things in class when there is instance for ex eg prepare connection';
        echo '<br> <b>function __destruct()</b> when';
        echo '<br> Cloning';
        echo '<br> Normally if we assign a instance $var2=$var it will make a reference like putting $var2 =&$var but if we want a copy or clone <b>$var2 =clone $var1</b>';
        echo '<br> So when we clone it does not go to construct method but instead we can use a clone method <b>function __clone()</b> so when clone a instance instantanly it will perform the clone method';
        echo '<br> to compare 2 object == or stricter ===';
        echo '<br> you can compare 2 instance clone or reference to true or false $var==(=)$var1';
        echo '<br> with stricter only reference is true, non strict unless property change it is true';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
//        echo '<br> ';
        ?>

    </div>
</div>









<div class="row">
    <div class="col-md-5 box"  >

        <span><a href="#myheader">&laquo;back</a></span><br>
        <h4 id=""><strong></strong></h4>
        <?php
        echo '';
        echo '<br> ';
        echo '<br> ';
        echo '<br> ';

        ?>

    </div>
</div>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

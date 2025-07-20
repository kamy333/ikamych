<?php require_once('../../../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "lesson"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php //include_layout_template('nav.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">PHP OOP Object Orientation Programming</a></mark>
</h4>

<div class="row">
    <div class="col-lg-4 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php
        //    $text = "<div><a  class='btn btn-primary' role='button' href='/uploads/PHP+Objects_Patterns_and_Practice_5thEdition.pdf'>PHP <br>Objects Patterns and Practice<br> 5th Edition .pdf</a>&nbsp; ";

        $text = "<div><a  class='btn btn-primary' role='button' href='/public/img/books/PHP+Objects_Patterns_and_Practice_5thEdition.pdf'>PHP <br>Objects Patterns and Practice<br> 5th Edition .pdf</a>&nbsp; ";


        $text .= "<br>    <a class='btn btn-default' role='button' target='_blank' href='https://github.com/Apress/php-objects-patterns-practice-16/blob/master/source/test/ch03/Batch01Test.php'>Source Code</a>";


        //    echo "" . $text . "";

        if (User::is_kamy() || User::is_admin()) {
            $text .= "<a class='btn btn-default' role='button' href=\"https://drive.google.com/file/d/0B71yHaesAeDTT2hzck95TEtrems/view?usp=sharing\">GoogleDrive</a>";

            echo "" . $text . "";
        }
        echo "</div>";
        ?>

    </div>

    <div class="col-lg-4 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php
        $text = "<a class='btn btn-primary' role='button' target='_blank'  href='https://www.udemy.com/object-orientation/learn/v4/overview'>Udemy <br>OOP Object Orientation Programming <br> Lawrence Turton </a>&nbsp;&nbsp;&nbsp;";

        echo "" . $text . "";
        ?>

        <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
           aria-controls="collapseExample">
            ?
        </a>


        <div class="collapse" id="collapseExample">
            <div class="well">
                <p> Learning object oriented programming may seem like a chaw but in reality once learnt it's not
                    difficult. However many programmers learn object orientation programming instead of the whole object
                    orientation process, for example what do we mean by object orientation? What does the APIE acronym
                    stand for and do we understand all concepts of this acronym? Those who may even have a general
                    knowledge of object orientation programming may want to take this course because it'll give a higher
                    definition of object orientation and all concepts that surround it. To truly understand how to
                    program in an object oriented manner then we must first understand all there is to know about the
                    concepts, ideologies and fundamental understanding not just the syntax of any one language.</p>

                <p> If you just know how to program object oriented then that will not cut it. What happens when you
                    need to map out an application are you using UML and are you using it correctly? Everything we do in
                    the programming world is for real world use so understanding the syntax only or understanding object
                    orientation in a general way will not cut in large scale projects. So those programmers who may have
                    been exposed to object orientation syntax may find this course of some use and don't for object
                    oriented analyse and design don't refer to any programming language. Also new comers will definitely
                    learn a boat load from this course in the simplest manner possible right from the start even if you
                    don't want to do the programming part.</p>

                <p> This course includes lectures that break subjects down like abstraction, polymorphism, inheritance
                    and encapsulation in a simplified spoon fed manner for anyone to understand from beginner or even an
                    experienced programmer who wants to know more about the object oriented fundamentals.</p>
                <p>
                    What are the requirements?
                    <br>
                    Have general knowledge of the PHP language but not required for OOA or OOD
                    What am I going to get from this course?
                </p>
                <p> APIE (Abstraction, Polymorphism, Inheritance & Encapsulation) <br>
                    Object oriented analysis, design & programming <br>
                    UML or Unified Modelling Language <br>
                    Sequence diagrams <br>
                    Class syntax of PHP <br>
                    What is the target audience? <br>
                </p>
                <p> Have a full understanding of the concepts behind OO not just programming <br>
                    People who want to learn the full process of OO <br>
                    Want further understanding of certain aspects of OO <br>
                    Learn OO PHP syntax that can be generalised to other programming languages as well <br>
                </p></div>
        </div>

    </div>
    <div class="col-lg-4 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php
        $text = "<a class='btn btn-primary' role='button' target='_blank'  href='https://www.udemy.com/oop-object-oriented-programming-in-php-7/learn/v4/overview'>Udemy<br> OOP Object Orientation Programming in php-7<br>  Saira Sadiq</a>&nbsp;&nbsp;&nbsp;";

        echo "" . $text . "";
        ?>


        <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false"
           aria-controls="collapseExample1">
            ?
        </a>
        <div class="collapse" id="collapseExample1">
            <div class="well">
                <p> 1st section of the course starts with an introduction to object oriented programming. What is OOP?
                    and why we need it ? and what was before OOP?. A little detail about procedural language.We will
                    also learn how to add OOPness in our programming. Then the advantages of object oriented
                    programming.</p>

                <p>In 2nd section we will discuss the basics of OOP with real life example and then how to map it in
                    objects, classes, properties and method.</p>

                <p>Then how to create objects and classes in php? How to add properties and methods? How to use them?
                    And at the end of this section we will learn about parameters and return values of a method.</p>

                <p>3rd section describes the visibility and its three levels. Then why we need to define public, private
                    or protected visibility of properties and methods in a class.</p>

                <p>4th section describes the concept of constants in classes.</p>

                <p>5th section describes about data encapsulation. Why we need it? And how to implement it and then the
                    benefits of encapsulation.</p>

                <p>In 6th section we will discuss about inheritance with real life example. Then how to translate it in
                    classes, properties and methods in php code. What is ISA and HASA relationship and where to use ISA
                    and where to use HASA in classes and objects.</p>

                <p>7th section describes the problem when a child class needs its own version of parent class method
                    then how overriding of method solves this problem. Then how you can preserve parent class method’s
                    functionality while overriding.</p>

                <p>8th section describes how you can block inheritance and method overriding using final keyword.</p>

                <p>9th section describes what is the meaning of abstract in real world, then what is the meaning of
                    abstract classes, why we need i? What are the abstract methods and why we need it? Then we will also
                    discuss how to create abstract classes and methods in php.</p>

                <p>At the end what are the key points for abstract classes and methods.</p>

                <p> In 10th section we will discuss what happens when two classes from completely different class
                    hierarchies need some similar behaviour and how interface solve this problem.</p>

                <p> In 11th section we will discuss what happens when an object is born and when it dies. How we can
                    handle things in both situations using constructor and destructor. How to define and use constructor
                    and destructor using magic methods __construct() and __destruct().</p>

                <p>12th section describes a situation where we need only one copy of properties and methods for all
                    objects of a class. Static keyword can solve this problem. So we will see how we can create and use
                    static properties and methods without creating an object of a class.</p>

                <p>In 13th section describes that there are 15 magic methods in php. So we will discuss these magic
                    methods one by one in detail.</p>


                <p>14th section is the biggest one in this course. In this we will discuss about errors and
                    exceptions.</p>

                <p>What supposed to be an error in php? How they happen? What are the different types of errors? .how
                    you can trigger errors by yourself? And what are the logical error? Then we will see how we can
                    report errors when they happen and how you can change error reporting settings in php.ini. We will
                    also learn the 4 ways to deal with errors. Then how to use an error handler and at last how you can
                    log error messages.</p>

                <p>After errors we will discuss about what may be the risky behavior of your code and how we can use
                    exceptions to handle that risky behaviour. We will see how we can try some risky behaviour then how
                    we can throw an exception if anything wrong happens and how we can catch that exception. Then the
                    detail discussion on exception class in php and the stack trace for the exception. Then how you can
                    make your own custom exceptions by extending php’s built in exception class. Why we need to use try
                    with multiple catches and how to re-throw an exception. What happens when there is an uncaught
                    exception in your code.what is an exception handler.</p>

                <p>Then at the end of this section we will discuss the changes in errors and exceptions in php7.</p>

                <p>15th section describe how you can autoload classes in your code without using include and require
                    statements. Then the use of autoloader function for this purpose. Then we will discuss to autoload
                    namespace classes in your code using Psr-0 and Psr-4 autoloading standards but before that we will
                    discuss what are the namespaces in php.</p>

                <p>16th section is about object serialization. Why we need to serialize an object. Then when and how to
                    unserialize it. We will also learn how to do task that are prior to serializing an object using
                    __sleep() magic method.Then how to do task right away after unserializing an object using __wakeup()
                    magic method.</p>

                <p>17th section is about cloning of an object in which we will discuss two types of cloning that are
                    shallow copy and deep copy. In deep copy cloning we will also discuss about __clone() magic method.
                    Then we will see recursive cloning and then double linking problem in cloning. At the end we will
                    discuss Deep copy cloning using serialization.</p>

                <p>18th section is about Type hinting. In this we will see how we can use non scalar and scalar data
                    types for type hinting. We will also discuss about strict scalar data types and TypeError exception
                    thats been introduced in php7.</p>

                <p> In 19th section we will learn two ways of comparing objects. First one is using Comparison operator
                    (==) and 2nd one is using Identity operator (===).</p>

                <p> 20th section is about overloading an object. we will learn How to do property overloading Using
                    __get(), __set(), __isset() and __unset() magic methods. Then how to do method overloading Using
                    __call(), __callStatic() magic methods.</p>

                <p> 21st section describes about traits. First we will discuss deadly diamond of death problem in
                    multiple inheritance. Then single inheritance and its limitations. Then how traits provide multiple
                    inheritance thing in php. Then what will be the precedence order if a parent class and a trait have
                    same method and then what will be the precedence order if a trait and current class have the same
                    method. We will also discuss to use multiple traits and then how to compose a trait from other
                    traits.</p>

                <p>At the end we will discuss abstract and static trait members and trait properties.</p>

                <p> 22nd section describes late static binding. For this first we will discuss some basic concepts of
                    binding like what is binding, early binding and late binding?</p>

                <p> Then what is the problem with early binding of self keyword and at the end its solution which is
                    late static binding.</p>

                <p> 23rd section describes object iteration. First we will get some idea about some basic concepts like
                    traverse, iterate and iterate using loops. Then what is object iteration and how you can iterate an
                    object using Iterator Interface and IteratorAggregate Interface .</p>

                What are the requirements?<br>

                Little knowledge of basic PHP.<br>
                What am I going to get from this course?<br>

                Almost all topics of object oriented programming given in PHP manual. <br>
                Apply Advanced OOP concepts in your applications.<br>
                Covers almost all topics of OOP in any PHP certification.<br>
                Add OOP skill in your CV.<br>
                What is the target audience?<br>

                If you are a newborn in php and have a very basic knowledge of php.<br>
                If you are an intermediate php developer.<br>
                If you need complete php7 object oriented knowledge.<br>
                If you want to learn Object Oriented Programming using real life examples.<br>
                If you want to learn each concepts of OOP in complete detail.<br>
                If you want to prepare for a php job interview.<br>
                If you wanted to add object oriented programming skill in your CV.<br>
                If you wanted to add some serious OOPness in your programming.<br>
                If you need prompt response from your instructor.<br>
            </div>
        </div>

    </div>

</div>

<div class="row">


</div>
<?php echo str_repeat("<br>", 5) ?>

<div class="container">


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
        <div class="col-md-5 box">

            <span><a href="#myheader">&laquo;back</a></span><br>
            <h4 id="variable_variable"><strong>Variable Variable</strong></h4>
            to convert the result of a Variable to variable $$.
            <?php
            echo '<br>$a=hello - $hello = hello everyone  then $$a ->hello everyone ';

            ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-5 box">

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
        <div class="col-md-5 box">

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
        <div class="col-md-5 box">

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
        <div class="col-md-5 box">

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

</div>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

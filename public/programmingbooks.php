<?php require_once('../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "books"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Programming books</a></mark>
</h4>


<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
    <h4>
        <a href="https://www.apress.com/fr#" class="">Apress</a>
    </h4>

    <?php

    $link = "<a  class='btn btn-primary' role='button' href='/public/img/books/ZendEnterprisePHPPatterns.pdf'>Zend Enterprise PHP Patterns</a>&nbsp; ";
    $source = "";
    $text = "<p>Zend Enterprise PHP Patterns is the culmination of years of experience in the development of web-based applications designed to help enterprises big and small overcome the challenges of the web-based application world and achieve harmony in not only the architecture of their application, but also the entire process under which that application is created and maintained. Taken directly from real-life experiences in PHP application development, Zend Enterprise PHP Patterns will help you</p>

<p>Utilize open source technologies such as PHP and Zend Framework to build robust and easy-to-maintain development infrastructures.</p>
<p>Understand Zend Framework and its philosophical approach to building complex yet easy-to-maintain libraries of functionality for your application that can scale with your needs.
Benefit through an in-depth discussion of tools and techniques that can significantly enhance your ability to develop code faster, fix bugs, and increase performance.</p>";
    //          echo "" . $text . "<hr>";


    echo ebook($link, $text, 1, $source);

    ?>


</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
    <?php
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/Programming+Excel+with+VBA.pdf'>Programming Excel with VBA</a>";

    $source = "<p><a  href=\"https://github.com/apress/programming-excel-w-vba\">Source Code </a>source</p>";

    $text = $link . "
<p>A brand new guide to Excel VBA using comprehensive step-by-step guides and engaging example applications</p>
<p>Written by 30-times published author and professional VBA programmer Flavio Morgado
Includes guidance on how to extend Excel using the Windows API</p>";

    $text .= "<p>Learn to harness the power of Visual Basic for Applications (VBA) in Microsoft Excel to develop interesting, useful, and interactive Excel applications. This book will show you how to manipulate Excel with code, allowing you to unlock extra features, accuracy, and efficiency in working with your data. Programming Excel 2016 with VBA is a complete guide to Excel application development, using step-by-step guidance, example applications, and screenshots in Excel 2016.
In this book, you will learn:</p>

<p>How to interact with key Excel objects, such as the application object, workbook object, and range object</p>
<p>Methods for working with ranges in detail using code</p>
<p>Usage of Excel as a database repository</p>
<p>How to exchange data between Excel applications</p>
<p>How to use the Windows API to expand the capabilities of Excel</p>
<p>A step-by-step method for producing your own custom Excel ribbon</p>
<p>Who This Book Is For:Developers and intermediate-to-advanced Excel users who want to dive deeper into the capabilities of Excel 2016 using code.</p>";
    //          echo "" . $text . "<hr>";
    ?>

    <?php echo ebook($link, $text, 2, $source) ?>

</div>

<div class="col-lg-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


    <?php
    $link = "<a class='btn btn-primary' role='button'  href='/public/img/books/PHP+Arrays.pdf'>PHP+Arrays</a>";
    $source = "<p></p><a href=\"https://github.com/apress/php-arrays\">Source</a></p>";
    $text = $link . "<p>Gain an in-depth understanding of PHP 7 arrays. After a quick overview of PHP 7, each chapter concentrates on single, multi-dimensional, associative, and object arrays. PHP Arrays is a first of its kind book using PHP 7 that demonstrates inserting, appending, updating, and deleting array data.</p>

<p>This book also covers validation methods to insure that the data provided by a user is good before the data is entered into an array. You’ll see how PHP 7 try/catch modules are used to capture exceptions and errors that may be caused by invalid data.

<p>The code examples demonstrate common real-world scenarios. Moreover, examples of every PHP 7 array function (over 75) are demonstrated. The appendix provides a two-dimensional array case study on the logical design of a checkers game.

<p>PHP Arrays answers the following questions:
<ul>
<li></li> Why do we need arrays? When do we need to use arrays?</li>
<li>Are arrays efficient? Can arrays reduce coding time?</li>
<li>When do you use multi-dimensional and associative arrays?</li>
<li>What is an object array? </li>
</ul>";
    //                          echo "" . $text . "<hr>";
    echo ebook($link, $text, 3, $source);
    ?>
</div>

<div class="col-lg-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


    <?php
    $link = "<a class='btn btn-primary' role='button'  href='/public/img/books/PHP+Persistence.pdf'>PHP+Persistence</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/php-persistence \">Source</a>";
    $text = $link . "<p>Take the pain out of dealing with relational databases in an object-oriented programming world. With this short book, you can save time and money by simply coding less while accomplishing more with the Doctrine persistence framework, a leading persistence solution for PHP programmers and web developers. PHP Persistence teaches you about PHP persistence and how to use it effectively for your database-driven applications.</p>

<p>Bestselling author Michael Romer leverages his own vast experience to show you what you need to know about Doctrine 2 and how to use it in your own projects. Along the way you’ll learn about powerful persistence techniques, such as object-relational mapping (ORM) in PHP.</p>

<ul>
<li> What You'll Learn</li>
<li>Define entities and references between entities</li>
<li>Manage entities</li>
<li>Master the Doctrine Query Language</li>
<li>Use appropriate command-line tools for PHP persistence</li>
<li>Program for caching</li> </ul>";
    echo ebook($link, $text, 4, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


    <?php
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/PHP+CLI.pdf'>PHP CLI</a>";
    $source = "";
    $text = $link . "<p>This concise book shows you how to create PHP command line interface (CLI) scripts, including user interaction and scripts to automate and assist your workflow. Learn to quickly create useful and effective command line software and scripts using the world's most popular web scripting language, PHP. Enjoy the benefits of writing CLI scripts in PHP: save money by redeploying existing skills, not learning new ones. Save time and increase productivity by using a high-level language. Make money by providing your clients with a full-stack service.</p>

<ul>
<li>What You'll Learn</li>
<li>Learn about the PHP CLI SAPI</li>
<li>Find out how to use it to run PHP scripts off-line</li>
<li>Easily deal with user input and console output</li>
<li>Work with helper libraries and software</li>
<li>Find out the differences between programming for the web and for the CLI</li>
</ul>
";
    //    echo "" . $text . "<hr>";
    echo "" . ebook($link, $text, 5) . "<hr>";
    ?>
</div>

<div class="col-lg-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


    <?php
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/Dashboards+for+Excel.pdf'>Dashboards+for+Excel</a>";
    //    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/dashboards-for-excel \"></a>";
    $text = $link . "<p>This book takes a hands-on approach to developing dashboards, from instructing users on advanced Excel techniques to addressing dashboard pitfalls common in the real world. Dashboards for Excel is your key to creating informative, actionable, and interactive dashboards and decision support systems. Throughout the book, the reader is challenged to think about Excel and data analytics differently—that is, to think outside the cell. This book shows you how to create dashboards in Excel quickly and effectively.</p>

<p>In this book, you learn how to:</p>
<ul>
<li>Apply data visualization principles for more effective dashboards</li>
<li>Employ dynamic charts and tables to create dashboards that are constantly up-to-date and providing fresh information</li>
<li>Use understated yet powerful formulas for Excel development</li>
<li>Apply advanced Excel techniques mixing formulas and Visual Basic for Applications (VBA) to create <li>interactive dashboards</li>
<li>Create dynamic systems for decision support in your organization</li>
<li>Avoid common problems in Excel development and dashboard creation</li>
<li>Get started with the Excel data model, PowerPivot, and Power Query
</li></ul>
";
    echo "" . ebook($link, $text, 6, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php

    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/PHP+Solutions.pdf'>PHP+Solutions.</a>";
    //$img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/php-solutions-14\">Source</a>";
    $text = $link . "<p> This is the third edition of David Powers' highly-respected PHP Solutions: Dynamic Web Design Made Easy. This new edition has been updated by David to incorporate changes to PHP since the second edition and to offer the latest techniques—a classic guide modernized for 21st century PHP techniques, innovations, and best practices.</p>

<p>You want to make your websites more dynamic by adding a feedback form, creating a private area where members can upload images that are automatically resized, or perhaps storing all your content in a database. The problem is, you're not a programmer and the thought of writing code sends a chill up your spine. Or maybe you've dabbled a bit in PHP and MySQL, but you can't get past baby steps. If this describes you, then you've just found the right book. PHP and the MySQL database are deservedly the most popular combination for creating dynamic websites. They're free, easy to use, and provided by many web hosting companies in their standard packages.</p>

<p> Unfortunately, most PHP books either expect you to be an expert already or force you to go through endless exercises of little practical value. In contrast, this book gives you real value right away through a series of practical examples that you can incorporate directly into your sites, optimizing performance and adding functionality such as file uploading, email feedback forms, image galleries, content management systems, and much more. Each solution is created with not only functionality in mind, but also visual design.</p>

<p>But this book doesn't just provide a collection of ready-made scripts: each PHP Solution builds on what's gone before, teaching you the basics of PHP and database design quickly and painlessly. By the end of the book, you'll have the confidence to start writing your own scripts or—if you prefer to leave that task to others—to adapt existing scripts to your own requirements. Right from the start, you're shown how easy it is to protect your sites by adopting secure coding practices.</p>";
    echo "" . ebook($link, $text, 7, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/Pro+Functional+PHP+Programming.pdf'>Pro Functional PHP Programming</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/pro-functional-php-programming \">Source</a>";
    $text = $link . "<p>Bring the power of functional programming to your PHP applications. From performance optimizations to concurrency, improved testability to code brevity, functional programming has a host of benefits when compared to traditional imperative programming. 
Part one of Pro Functional PHP Programming takes you through the basics of functional programming, outlining the key concepts and how they translate into standard PHP functions and code. Part two takes this theory and shows you the strategies for implementing it to solve real problems in your new or existing PHP applications. </p>
<p> Functional programming is popular in languages such as Lisp, Scheme and Clojure, but PHP also contains all you need to write functional code. This book will show you how to take advantage of functional programming in your own projects, utilizing the PHP programming language that you already know.</p>
<p>What You'll Learn</p>
<ul>
<li>Discover functional programming in PHP</li>
<li>Work with functional programming functions</li>
<li>Design strategies for high-performance applications</li>
<li>Manage business logic with functions</li>
<li>Use functional programming in object-oriented and procedural applications</li>
<li>Employ helper libraries in your application</li>
<li>Process big data with functional PHP</li>
<p>Who This Book Is For</p>
</ul>
<p>Programmers and web developers with experience of PHP who are looking to get more out of their PHP coding and be able to do more with PHP.</p>  ";
    echo "" . ebook($link, $text, 8, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Design+Patterns+in+PHP+and+Laravel.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = ""; // "<a  class=\"btn btn - info\" role=\"button\"  href=\"#\">Source</a>";
    $text = $link . "<p>Learn each of the original gang of four design patterns, and how they are relevant to modern PHP and Laravel development. Written by a working developer who uses these patterns every day, you will easily be able to implement each pattern into your workflow and improve your development. Each pattern is covered with full examples of how it can be used. 
Too often design patterns are explained using tricky concepts, when in fact they are easy to use and can enrich your everyday development. Design Patterns in PHP and Laravel aims to break down tricky concepts into humorous and easy-to-recall details, so that you can begin using design patterns easily in your everyday work with PHP and Laravel.</p> 
<p>This book teaches you design patterns in PHP and Laravel using real-world examples and plenty of humor.
</p>
<p>What You Will Learn </p>
<ul>
<li>Use the original gang of four design patterns in your PHP and Laravel development 
<li>How each pattern should be used </li>
<li>Solve problems when using the patterns</li>
<li>Remember each pattern using mnemonics</li>
</ul>";
    echo "" . ebook($link, $text, 9) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "PHP+Beyond+the+Web.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    //    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/php-beyond-the-web\">Source</a>";
    $text = $link . "Use your existing web-based PHP skills to write all types of software: CLI scripts, desktop software, network servers, and more. This book gives you the tools, techniques, and background necessary to write just about any type of software you can think of, using the PHP you know.

PHP Beyond the Web shows you how to take your knowledge of PHP development for the web and utilise it with a much wider range of software systems. Enjoy the benefits of PHP after reading this book: save money by redeploying existing skills, not learning new ones; save time and increase productivity by using a high-level language; and make money by providing your clients a full-stack service (not just websites).

PHP is no longer just a great scripting language for websites, it's now a powerful general-purpose programming language. Expand your use of PHP into your back-end systems, server software, data processing services, desktop interfaces, and more. 

What You'll Learn
Write interactive shell scripts
Work with system daemons
Write desktop software
Build network servers
Interface with electronics using PHP and the Raspberry Pi
Manage performance, deployment, licensing, and system interaction
Discover the software tools for development and get other great sources of technical information and help

Who This Book Is For
Experienced PHP programmers or experienced programmers interested in leveraging PHP outside the web development context.";
    echo "" . ebook($link, $text, 10) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Securing+PHP+Apps.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/securing-php-apps\">Source</a>";
    $text = $link . "<p>Secure your PHP-based web applications with this compact handbook. You'll get clear, practical and actionable details on how to secure various parts of your PHP web application. You'll also find scenarios to handle and improve existing legacy issues.</p>

<p>Is your PHP app truly secure? Let's make sure you get home on time and sleep well at night. Learn the security basics that a senior developer usually acquires over years of experience, all condensed down into one quick and easy handbook. Do you ever wonder how vulnerable you are to being hacked? Do you feel confident about storing your users' sensitive information? Imagine feeling confident in the integrity of your software when you store your users' sensitive data. No more fighting fires with lost data, no more late nights, your application is secure.</p>

<p>Well, this short book will answer your questions and give you confidence in being able to secure your and other PHP web apps.</p>

<p>What You'll Learn</p>
<ul>
<li>Never trust your users - escape all input</li>
<li>HTTPS/SSL/BCA/JWH/SHA and other random letters: some of them actually matter</li>
<li>How to handle password encryption and storage for everyone</li>
<li>What are authentication, access control, and safe file handing and how to implement them</li>
<li>What are safe defaults, cross site scripting and other popular hacks </li>
<li>Who This Book Is For</li>
</ul>
<p>Experienced PHP coders, programmers, developers.</p>";
    echo "" . ebook($link, $text, 11, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "PHP+Development+Tool+Essentials.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = ""; // "<a  class=\"btn btn - info\" role=\"button\"  href=\"#\">Source</a>";
    $text = $link . "<p> Learn PHP development best practices, such as version control, development environment virtualization, and coding standards. You'll also discover the most useful PHP web frameworks, including the new Laravel, symfony2, and micro-frameworks. As you do so, you'll learn how to use them to write the most productive PHP code possible.</p>

<p>PHP Development Tool Essentials complements Jason Gilmore's best-selling Beginning PHP and MySQL. This book will further expose you to the many different methodologies, tools, and concepts that professional web developers are using more and more each day.</p>

<p>What You'll Learn</p>
<ul>
<li> Use version control with PHP</li>
<li> Set up virtualized development environments</li>
<li> Maintain PHP coding standards</li>
<li> Manage dependencies</li>
<li> Leverage the best PHP frameworks</li>
<p>Who This Book Is For</p>
<p>Intermediate to advanced PHP developers looking to advance their skills with new tools, concepts, and approaches.</p>
</ul>";
    echo "" . ebook($link, $text, 12, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "PHP+and+MySQL+Recipes.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/php-mysql-recipes\">Source</a>";
    $text = $link . "<p>Gain instant solutions, including countless pieces of useful code that you can copy and paste into your own applications, giving you answers fast and saving you hours of coding time. You can also use this book as a reference to the most important aspects of the latest PHP scripting language, including the vital functions you know and love from previous versions of PHP, as well as the functions introduced in PHP 7.</p>

<p>PHP and MySQL Recipes: A Problem-Solution Approach supplies you with complete code for all of the common coding problems you are likely to face when using PHP and MySQL together in your day-to-day web application development. This invaluable guide includes over 200 recipes and covers numerous topics. What you hold in your hands is the answer to all your PHP 7 needs.</p>

<p>Furthermore, this book explains the PHP functionality in detail, including the vastly improved object-oriented capabilities and the new MySQL database extension. PHP and MySQL Recipes will be a useful and welcome companion throughout your career as a web developer, keeping you on the cutting edge of PHP development, ahead of the competition, and giving you all the answers you need, when you need them.</p>

<p>What You'll Learn</p>
<ul>
<li>Work with arrays, dates and times, strings, files and directories, and dynamic imaging</li>
Write regular expressions in PHP</li>
Use the variables and functions found in PHP</li>
Who This Book Is For
<p>Experienced PHP and MySQL programmers and web developers who have at least some PHP and MySQL programming experience.</p>
</ul>";
    echo "" . ebook($link, $text, 13, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Pro+PHP+and+jQuery.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/pro-php-jquery-16\">Source</a>";
    $text = $link . "Take advantage of the improved performance and reduced memory requirements of PHP version 7, and learn to utilize the new built-in PHP functions and features such as typed variable enforcement with declare(strict_types=1) and the new available data types, scalar type declarations for function arguments and return statements, constant arrays using define(), argument unpacking with the ... operator, integer division with intdiv(), the null coalesce operator, the spaceship operator, new exception types, and improvements to existing features.

Pro PHP and jQuery, Second Edition is for intermediate level programmers interested in building web applications using jQuery and PHP. Updated for PHP version 7 and the latest version of jQuery, this book teaches some advanced PHP techniques and it shows you how to take your dynamic applications to the next level by adding a JavaScript layer using the jQuery framework and APIs.

After reading and using this book, you'll come away having built a fully functional PHP and jQuery web application that you can reapply as a template for your own particular web application. 

Pro PHP and jQuery, Second Edition is for intermediate level programmers interested in building web applications using jQuery and PHP. Updated for PHP version 7 and the latest version of jQuery, this book teaches some advanced PHP techniques and it shows you how to take your dynamic applications to the next level by adding a JavaScript layer using the jQuery framework and APIs, considered the most popular JavaScript libraries.

After reading and using this book, you'll come away understanding a fully functional PHP using jQuery web application case study that you can reapply as a template for your own particular web application.

Moreover, from PHP 7, you'll get uniform variable syntax, the AST-based compilation process, the added Closure::call(), bitwise shift consistency across platforms, the (null coalesce) operator, Unicode codepoint escape syntax, return type declarations, and new and easier extensions development with support for redis, MongoDB and much more. ";
    echo "" . ebook($link, $text, 14, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Pro+Access+2007.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/pro-access-2007\">Source</a>";
    $text = $link . "Pro Access 2007 covers the features of Microsoft Access 2007, including working with SharePoint Office Server and customizing Ribbons. The book is aimed at professional developers and power users who are new to Access 2007. Among other topics, youll learn about the new Access menu structure, including customization, as well as new SharePoint features.

This book provides good, short, solid information with as little waffle as possible. And the book includes solid examples that thoroughly explain new features. Author Martin Reid is also a working Access developer who is respected by his peers and knows what working developers face, especially at the time of a new release.";
    echo "" . ebook($link, $text, 15, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Pro+SQL+Server+Internals.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/pro-sql-server-internals-2ed\">Source</a>";
    $text = $link . "<p>Improve your ability to develop, manage, and troubleshoot SQL Server solutions by learning how different components work “under the hood,” and how they communicate with each other. The detailed knowledge helps in implementing and maintaining high-throughput databases critical to your business and its customers. You’ll learn how to identify the root cause of each problem and understand how different design and implementation decisions affect performance of your systems.</p>

<p>New in this second edition is coverage of SQL Server 2016 Internals, including In-Memory OLTP, columnstore enhancements, Operational Analytics support, Query Store, JSON, temporal tables, stretch databases, security features, and other improvements in the new SQL Server version. The knowledge also can be applied to Microsoft Azure SQL Databases that share the same code with SQL Server 2016.</p>

<p>Pro SQL Server Internals is a book for developers and database administrators, and it covers multiple SQL Server versions starting with SQL Server 2005 and going all the way up to the recently released SQL Server 2016. The book provides a solid road map for understanding the depth and power of the SQL Server database server and teaches how to get the most from the platform and keep your databases running at the level needed to support your business. The book:</p>
<ul>


<li>Provides detailed knowledge of new SQL Server 2016 features and enhancements</li>
 <li>Includes revamped coverage of columnstore indexes and In-Memory OLTP </li>
 <li>Covers indexing and transaction strategies</li>
 <li>Shows how various database objects and technologies are implemented internally, and when they <li>should or should not be used</li>
 <li>Demonstrates how SQL Server executes queries and works with data and transaction log</li>
</ul>
 
<ul>

<li>What You Will Learn</li>
<li>Design and develop database solutions with SQL Server.</li>
<li>Troubleshoot design, concurrency, and performance issues.</li>
<li>Choose the right database objects and technologies for the job.</li>
<li>Reduce costs and improve availability and manageability.</li>
<li>Design disaster recovery and high-availability strategies.</li>
<li>Improve performance of OLTP and data warehouse systems through in-memory OLTP and Columnstore indexes.</li>
</ul>

<p>Who This Book Is For</p>

<p>Developers and database administrators who want to design, develop, and maintain systems in a way that gets the most from SQL Server. This book is an excellent choice for people who prefer to understand and fix the root cause of a problem rather than applying a 'band aid' to it.</p>

";
    echo "" . ebook($link, $text, 16, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Beginning+SQL+Queries.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/beg-sql-queries\">Source</a>";
    $text = $link . "Get started on mastering the one language binding the entire database industry. That language is SQL, and how it works is must-have knowledge for anyone involved with relational databases, and surprisingly also for anyone involved with NoSQL databases. SQL is universally used in querying and reporting on large data sets in order to generate knowledge to drive business decisions.

Good knowledge of SQL is crucial to anyone working with databases, because it is with SQL that you retrieve data, manipulate data, and generate business results. Every relational database supports SQL for its expressiveness in writing queries underlying reports and business intelligence dashboards. Knowing how to write good queries is the foundation for all work done in SQL, and it is a foundation that Clare Churcher's book, Beginning SQL Queries, 2nd Edition, lays well.


What You Will Learn
Write simple queries to extract data from a single table
Combine data from many tables into one business result using set operations
Translate natural language questions into database queries providing meaningful information to the business
Avoid errors associated with duplicated and null values
Summarize data with amazing ease using the newly-added feature of window functions
Tackle tricky queries with confidence that you are generating correct results
Investigate and understand the effects of indexes on the efficiency of queries
Who This Book Is For

Beginning SQL Queries, 2nd Edition is aimed at intelligent laypeople who need to extract information from a database, and at developers and other IT professionals who are new to SQL. The book is especially useful for business intelligence analysts who must ask more complex questions of their database than their GUI–based reporting software supports. Such people might be business owners wanting to target specific customers, scientists and students needing to extract subsets of their research data, or end users wanting to make the best use of databases for their clubs and societies.
";
    echo "" . ebook($link, $text, 17, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Pro+Sql+Azure.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\https://github.com/apress/pro-sql-azure\">Source</a>";
    $text = $link . "SQL Azure represents Microsoft’s cloud-based delivery of its enterprise-caliber, SQL Server database management system (formerly under the code name \"Oslo\"). Pro SQL Azure introduces you to this new platform, showing you how to program and administer it in a variety of cloud computing scenarios. You’ll learn to program SQL Azure from Silverlight, ASP.NET, WinForms, and from SQL Reporting Services. You’ll also understand how to manage the platform by planning for scalability, troubleshooting performance issues, and implementing strong security.

Shows how to use SQL Azure from Silverlight, ASP.NET, and more
Covers management, scalability, and troubleshooting
Addresses the all-important issue of securing your data";
    echo "" . ebook($link, $text, 18, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "XML+and+JSON+Recipes+for+SQL+Server.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/xml-and-json-recipes-for-sql-server\">Source</a>";
    $text = $link . "Quickly find solutions to dozens of common problems encountered while using XML and JSON features that are built into SQL Server. Content is presented in the popular problem-solution format. Look up the problem that you want to solve. Read the solution. Apply the solution directly in your own code. Problem solved!
This book shows how to take advantage of XML and JSON to share data and automate tasks. JSON is commonly used to move data back and forth between the database and front-end applications, often running in a browser. This book shows all you need to know about transforming query results into JSON format, and back again. Also covered are the processes and techniques for moving data into and out of XML format for business intelligence and other purposes, such as when transferring data from a reporting system into a data warehouse, or between different database brands such as between SQL Server and Oracle.
Microsoft intensively implements XML in SQL Server, and in many related products. Execution plans are generated in XML format, and this book shows you how to parse those plans and automate the detection of performance problems. The relatively new Extended Events feature writes tracing data into XML files, and the recipes in this book help in parsing those files. 
XML is also used in SQL Server's BI tool set, including in SSIS, SSR, and SSAS. XML is used in many configuration files, and is even behind the construction of DDL triggers. In reading this book you’ll dive deeply into the features that allow you to build and parse XML, and also JSON, which is a specific format of XML used to transmit objects in a web-friendly format between a database and its front-end applications.
What You Will Learn

Build XML and JSON objects in support of automation and data transfer
Import and parse XML and JSON from operating system files
Build appropriate indexes on XML objects to improve query performance
Move data from query result sets into JSON format, and back again
Automate the detection of database performance problems by querying and parsing the database’s own execution plans
Replace external and manual JSON processes with SQL Server's internal, JSON functionality
Who This Book Is For
Database administrators, .NET developers, business intelligence developers, and other professionals who want a deep and detailed skill set around working with XML and JSON in a SQL Server database environment. Web developers will particularly find the book useful for its coverage of transforming database result sets into JSON text that can be transmitted to front-end web applications. ";
    echo "" . ebook($link, $text, 19, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "PHP+7+Zend+Certification+Study+Guide.pdf";
    $link = ""; // "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    //    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"#\">Source</a>";
    $text = $link . "Improve your programming knowledge and become Zend Certified. This book closely follows the ZCE2017-PHP exam syllabus and adds important details that help candidates to prepare for the test. 
Zend Certification is an industry recognized standard for PHP engineers.  It is very difficult to pass the examination without extensive preparation.  Unlike other books on PHP, this book is very focused on reaching industry standards.The Zend examination syllabus is comprised of three focus areas and a number of additional topics. This book explains the structure of the examination and then addresses each of the topics for PHP 7.
A short quiz follows each chapter to help identify gaps in your knowledge. PHP 7 Zend Certification Study Guide also contains a practice test containing 70 questions from the entire syllabus to use when reviewing for your exams. The book provides original code examples throughout and every php featured is explained clearly with examples and uses an efficient way to describe the most important details of the particular feature. 

What You'll Learn

Brush up your knowledge of PHP programming
Explore new features of the PHP v7.1
Build a secure configuration of your server
Review strategies and tips to get Zend Certified
Who this Book Is For

Intermediate PHP programmers with two or three years of experience who are appearing for the Zend certification exams and programmers who are proficient in other languages, but want a quick reference book to dive into PHP.";
    echo "" . ebook($link, $text, 20, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Pro+PHP+MVC.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/pro-php-mvc\">Source</a>";
    $text = $link . "Model View Controller (MVC) is becoming the definitive architecture of website development frameworks due to the stability, extensibility and predictability it lends to development. It is not just the primary separation of database, business logic and interface components, but includes a wide range of considerations for building high-performing, scalable and secure applications.

Deciding which MVC framework best suits the project you are about to begin is one of the biggest challenges you'll face as a developer. If you are part of a team, this decision has probably already been made for you; but in any event, you'll need to know how (and why) the framework authors made it work the way it does.

Pro PHP MVC looks at the building blocks that make any good MVC framework, and how they apply to PHP. It exposes all considerations that many developers take for granted when using a popular framework, and teaches you how to make the framework your own. 

Over the course of reading this book, you will learn the theoretical implications of the choices you would make when writing your own MVC framework, and how to put the pieces together in a cohesive package. We take a look at the highly modular Zend Framework—how to use its collection of loosely coupled classes to build a unified system. We also look at CakePHP, learning from its automated build system (Bakery) and highly intuitive approach to rapid development. This book will lay bare all the secret parts of MVC for you.";
    echo "" . ebook($link, $text, 20, $source) . "<hr>";
    ?>
</div>


<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Essential+Excel+2016.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\"https://github.com/apress/programming-excel-w-vba\" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/programming-excel-w-vba\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 21, $source) . "<hr>";
    ?>
</div>


<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Programming+Excel+with+VBA.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/def-guide-to-excel-vba\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 22, $source) . "<hr>";
    ?>
</div>


<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Advanced+Excel+Essentials.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\"\" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/adv-excel-esntls\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 23, $source) . "<hr>";
    ?>
</div>


<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Microsoft+Office+Programming+Guide+fo.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\"\" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/msft-office-programming\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 24, $source) . "<hr>";
    ?>
</div>


<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Microsoft+Word+Secrets.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/msft-word-secrets\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 24, $source) . "<hr>";
    ?>

</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "The+Basics+of+Financial+Modeling.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\"\" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/basics-of-financial-modeling\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 24, $source) . "<hr>";
    ?>
</div>


<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "Introducing+Ethereum+and+Solidity.pdf";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\"\" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"https://github.com/apress/introducing-ethereum-solidity \">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 24, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 24, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 24, $source) . "<hr>";
    ?>
</div>

<div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $link = "";
    $link = "<a  class='btn btn-primary' role='button'  href='/public/img/books/{$link}'>{$link}</a>";
    $img = " <img src=\" \" alt=\" \">";
    $source = "<a  class=\"btn btn - info\" role=\"button\"  href=\"\">Source</a>";
    $text = $link . "";
    echo "" . ebook($link, $text, 24, $source) . "<hr>";
    ?>
</div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


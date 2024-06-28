<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a href="<?php echo $path_public; ?>index.php" style="background-color: honeydew"
               class="navbar-brand"><?php echo LOGO; ?></a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="">
                    <a aria-expanded="false" role="button" href="<?php echo $path_admin; ?>index.php">Admin </a>
                </li>


                <li>
                    <a aria-expanded="false" role="button"
                       href="<?php echo $path_public; ?>myLinks.php?category=Others">Links</a>
                </li>


                <?php if (User::is_admin()) { ?>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Public <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <?php echo $Nav->menu_item('', 'Full version Inspinia', 'http://www.ikamy.ch/Inspinia_Full_Version/', 'none', true);
                            echo $Nav->menu_item('', 'Inspinia Full2', '../Inspinia_Full_Version_2/index.php', 'public', true);
                            ?>
                            <li><a href="<?php echo $path_public; ?>import_access.php">Import</a></li>
                            <li><a href="<?php echo $path_public; ?>comparatif.php">comparatif</a></li>

                            <li><a href="<?php echo $path; ?>index_old.php">Old public Layout</a></li>
                            <li><a href="<?php echo $path_public; ?>test.php">Test</a></li>
                            <li><a href="<?php echo $path_public; ?>minor.php">Minor</a></li>
                            <li><a href="<?php echo $path_public; ?>landing.php">Landing Page</a></li>
                            <li><a href="<?php echo $path_public; ?>off_canvas_menu.php">Canvas view</a></li>
                            <li><a href="<?php echo $path_public; ?>player.php">players</a></li>
                            <?php echo $Nav->menu_item('', 'SmartAdmin', 'http://www.ikamy.ch/smartAdmin/', 'none', true) ?>
                            <?php echo $Nav->menu_item('', 'SmartAdmin full version', 'http://www.ikamy.ch/SmartAdmin_Full_Version_html/', 'none', true) ?>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Transport <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">

                            <?php echo $Nav->menu_item('CourseCalendar', 'CourseCalendar', 'calendar.php', 'public') ?>
                            <?php echo $Nav->menu_item('Course', 'Course', 'transport.php', 'public') ?>
                            <?php echo $Nav->menu_item('Model', 'Model', 'transport.php', 'public') ?>
                            <?php echo $Nav->menu_item('', 'Clients', 'transport.php?cl=tClient', 'none', false) ?>


                            <?php echo $Nav->menu_item('', 'Chauffeur', 'transport.php?cl=Chauffeur', 'none', false) ?>
                            <?php echo $Nav->menu_item('', 'Transport Type', 'transport.php?cl=TransportType', 'none', false) ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>

                            <?php echo $Nav->menu_item('', 'View Model', 'transport.php?cl=ViewModel', 'none', false) ?>
                            <?php echo $Nav->menu_item('', 'View VisibleNo', 'transport.php?cl=ViewVisibleNo', 'none', false) ?>
                            <?php echo $Nav->menu_item('', 'View VisibleYes', 'transport.php?cl=ViewVisibleYes', 'none', false) ?>

                            <?php echo $Nav->menu_item('', 'View Pivot all', 'transport.php?cl=ViewPivot', 'none', false) ?>
                            <?php echo $Nav->menu_item('', 'View PivotNo', 'transport.php?cl=ViewPivotNo', 'none', false) ?>
                            <?php echo $Nav->menu_item('', 'View PivotYes', 'transport.php?cl=ViewPivotYes', 'none', false) ?>
                            <?php echo $Nav->menu_item('', 'View Summary', 'transport.php?cl=ViewSummary', 'none', false) ?>


                        </ul>
                    </li>

                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Classes <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">


                            <?php foreach (MyClasses::$class_access as $class) {
                                if (!in_array($class, MyClasses::$disable_db_classes)) {
//                            echo $Nav->menu_item($class, 'New ' . $class, 'new_data.php', 'admin');
                                    echo $Nav->menu_item($class, '' . $class, 'manage_ajax.php', 'admin');
                                }
                            }
                            unset($class);

                            foreach (MyClasses::$transmed_class as $class) {
                                if (!in_array($class, MyClasses::$disable_db_classes)) {
//                            echo $Nav->menu_item($class, 'New ' . $class, 'new_data.php', 'admin');
                                    echo $Nav->menu_item($class, '' . $class, 'manage_ajax.php', 'admin');
                                }
                            }
                            unset($class);


                            ?>
                        </ul>
                    </li>

                <?php } ?>



                <?php


                ?>


            </ul>
            <ul class="nav navbar-top-links navbar-right">

                <?php
                echo "<li>Bienvenue sur $logo2</li>";
                if (isset($_SESSION["user_id"])) {
                    echo Message::get_chat();
                    echo Notification::get_notification();

//                echo "<li><a href='{$path_admin}logout.php'><i class=\"fa fa-sign-out\"></i> $user->username</a></li>";
                    ?>


                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if (isset($user)) {
                                echo $user->username;
                            }


                            ?>
                            <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <?php

                            echo $Nav->menu_item('', "<span style='margin-right: 20%'><i class='fa fa-user'></i></span>Profile", 'profile.php', 'public');
                            echo $Nav->menu_item('', '<span style=\'margin-right: 20%\'><i class=\'fa fa-sign-out\'></i></span>logout', 'logout.php', 'admin');

                            ?>
                        </ul>
                    </li>


                    <?php
                    echo "<span> <img class='img-circle'  src='{$user->user_path_and_placeholder()}' alt='{$user->username}' style='width:3em; height:3em;' > </span>";


                } else {
                    echo "<li><a href='{$path_admin}register.php'><i class=\"fa fa-r\"></i>Register</a></li>";
                    echo "<li><a href='{$path_admin}login.php'><i class=\"fa fa-sign-in\"></i> Log in</a></li>";

                    $img_path = SITE_ROOT . DS . $folder_project_name . DS . 'img' . DS;
                    if (file_exists($img_path . 'no_user.jpg')) {
                        echo "<span><img class='img-circle' src='{$path}img/no_user.jpg' alt='image' style='width:2em;height:2em;'></span>";
                    }

                }


                ?>

            </ul>
        </div>
    </nav>
</div>


<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a href="<?php echo $Nav->path_admin; ?>index.php" style="background-color: honeydew"
               class="navbar-brand"><?php echo LOGO; ?></a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="">
                    <a aria-expanded="false" role="button" href="<?php echo $Nav->path_admin; ?>index.php">Admin </a>
                </li>


                <li>
                    <a aria-expanded="false" role="button"
                       href="<?php echo $Nav->path_admin; ?>myLinks.php?category=Others">Links</a>
                </li>


                <?php if (User::is_admin()) { ?>


                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Public <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">

                            <li><a href="<?php echo $Nav->http . "transmed/"; ?>index.php"><i class="fa fa-taxi"></i>
                                    <span class="nav-label">Transport</span></a></li>
                            <?php echo $Nav->menu_item('', 'Full version Inspinia', 'https://www.ikamy.ch/Inspinia_Full_Version/', '', true) ?>
                            <?php
                            echo $Nav->menu_item('', 'Inspinia Full2', '../Inspinia_Full_Version_2/index.php', 'public', true);

                            ?>

                            <li><a href="<?php echo $path; ?>index_old.php">Old public Layout</a></li>
                            <li><a href="<?php echo $Nav->path_admin; ?>minor.php">Minor</a></li>
                            <li><a href="<?php echo $Nav->path_admin; ?>landing.php">Landing Page</a></li>
                            <li><a href="<?php echo $Nav->path_admin; ?>off_canvas_menu.php">Canvas view</a></li>
                            <li><a href="<?php echo $Nav->path_admin; ?>player.php">players</a></li>

                            <?php echo $Nav->menu_item('', 'SmartAdmin', 'https://www.ikamy.ch/smartAdmin/', 'none', true) ?>
                            <?php echo $Nav->menu_item('', 'SmartAdmin full version', 'https://www.ikamy.ch/SmartAdmin_Full_Version_html/', 'none', true) ?>
                        </ul>
                    </li>
                <?php } ?>


                <?php
                echo $Nav->public_menu("public_gallery");

//                if (User::is_djamila()) {
//                    echo $Nav->menu_item('', 'Djamila', 'index_gallery12.php', 'public');
//                }

                ?>

                <?php if (User::is_bralia() || User::is_djamila()) { ?>

                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Friend <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <?php

                        if (User::is_bralia()) {
                            echo $Nav->menu_item('', 'Bralia', 'index_gallery6.php', 'public');
                            echo $Nav->menu_item('', 'Chat Bralia', 'chat.php', 'public');
                        }

                        if (User::is_djamila()) {
                            echo $Nav->menu_item('', 'Djamila', 'index_gallery12.php', 'public');
                            echo $Nav->menu_item('', 'Chat Djam', 'chat_djamila.php', 'public');
                        }

                        ?>

                    </ul>
                </li>
                <?php } ?>

                <?php
                if (User::is_caroline() || User::is_weslley()) {
                    ?>

                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Loan <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <?php
                            if (User::is_caroline() || User::is_weslley()) {
                                echo $Nav->menu_item('', 'Loan', 'loan_exp.php', 'public');
                            }

                            if (User::is_caroline()) {
                                echo $Nav->menu_item('', 'Mum', 'loan_exp_1.php', 'public');
                            }

                            ?>

                        </ul>
                    </li>
                <?php } ?>



                <?php if (User::is_manager()) { ?>
                    <li><a href="<?php echo $Nav->http . "transmed/"; ?>index.php"><i class="fa fa-taxi"></i> <span
                                    class="nav-label">Transport</span></a></li>
                <?php } ?>
                <!--
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php /*echo $path;*/ ?>">Menu item</a></li>
                        <li><a href="<?php /*echo $path;*/ ?>">Menu item</a></li>
                        <li><a href="<?php /*echo $path;*/ ?>">Menu item</a></li>
                        <li><a href="<?php /*echo $path;*/ ?>">Menu item</a></li>
                    </ul>
                </li>-->

            </ul>
            <ul class="nav navbar-top-links navbar-right">

                <?php
                echo "<li>Welcome to $logo</li>";
                if (isset($_SESSION["user_id"])) {
                    echo Chat::get_chat();
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
                    echo "<li><a href='{$Nav->path_admin}register.php'><i class=\"fa fa-r\"></i>Register</a></li>";
                    echo "<li><a href='{$Nav->path_admin}login.php'><i class=\"fa fa-sign-in\"></i> Log in</a></li>";

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


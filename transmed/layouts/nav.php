<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>


                <form role="search" class="navbar-form-custom" action="<?php echo $path_admin; ?>search_results.php">
                    <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search"
                               id="top-search">
                    </div>
                </form>


            </div>
            <ul class="nav navbar-top-links navbar-right">
                <?php
                //                echo $Nav->menu_item("",'planning','planning.php','admin') ;
                echo "<li class=''><a href='{$path_admin}planning.php?class_name=ToDoList'><i class=''></i>Planning</a></li>";
                ?>
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $logo; ?>.</span>
                </li>


                <?php if ($session->is_logged_in()) { ?>
                    <?php echo Message::get_chat(); ?>


                <?php } // end of message chat when $session->is_logged_in() ?>

                <?php echo Notification::get_notification(); ?>


                <?php
                if ($session->is_logged_in()) {
                    echo "<li><a href='{$path_public}index.php'><i class=\"fa fa-home\"></i> Home</a></li>";

                    echo "<li><a href='{$path_admin}logout.php'><i class=\"fa fa-sign-out\"></i> Log out</a></li>";

                } else {
                    echo "<li><a href='{$path_public}index.php'><i class=\"fa fa-home\"></i> Home </a></li>";

                    if ($active_menu_clean !== 'login') {
                        echo "<li><a href='{$path_admin}login.php'><i class=\"fa fa-sign-in\"></i> Log in</a></li>";
                    }

                }
                ?>


                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
    </div>



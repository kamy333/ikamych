<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <a class="close-canvas-menu"><i class="fa fa-times"></i></a>
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <?php
                        $img_path=SITE_ROOT.DS.$folder_project_name.DS.'img'.DS;

                    $user->user_path_and_placeholder();



                        $username=$user->username;
                        echo "<span> <img class='img-circle'  src='{$user->user_path_and_placeholder()}' alt='{$user->username}' style='width:3em; height:3em;' > </span>";


                         ?>


                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> 
                                    <strong class="font-bold">
                    <?php if (isset($_SESSION["user_id"])){echo $user->full_name();} else {
                        echo "No User";
                    } ?>

                                    </strong>
                             </span> <span class="text-muted text-xs block">
        <?php if (isset($_SESSION["user_id"])) {
            echo $user->user_type;
        } else {
            echo "Log in";
        } ?>

                                    <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">

                        <?php
                        if (isset($path_public)) {
                            echo "<li><a href='{$path_public}chat.php'>Chat</a></li>";
                        }
                        if (isset($path_admin)) {
                            echo "<li><a href='{$path_admin}mailbox.php'>Mailbox</a></li>";
                        }
                        echo "<li><a href='{$path_admin}contacts.php'>Contacts</a></li>";
                        echo $Nav->menu_item('', "<span style='margin-right: 20%'><i class='fa fa-user'></i></span>Profile", 'profile.php', 'public');


                        echo "<li class='divider'></li>";

                        if (isset($_SESSION["user_id"])) {
//                            echo "<li><a href='{$path_admin}logout.php'>Logout</a></li>";
                            echo $Nav->menu_item('', '<span style=\'margin-right: 20%\'>
                            <i class=\'fa fa-sign-out\'></i></span>logout','logout.php','admin');

                        } else {
                            echo "<li><a href='{$path_admin}login.php'>Login</a></li>";

                        }

                        ?>


                    </ul>
                </div>
                <div class="logo-element">
                    <?php echo 'KN+'; ?>
                </div>
            </li>

            <?php if($session->is_logged_in()) { ?>

                <li>
                    <a href="<?php echo $path_public; ?>index.php"><i class="fa fa-home"></i> <span class="nav-label">Public</span></a>
                </li>


                <li>
                    <a href="<?php echo $path_public; ?>loan_exp.php"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Loan</span></a>
                </li>

                <li>
                    <a href="<?php echo $path_admin; ?>index.php"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Dashboard</span></a>
                </li>

                <li class="<?php if (isset($class_admin_active)) {
                    echo $class_admin_active;
                } ?>">

                    <a href="<?php echo $path_admin; ?>index.php"><i class="fa fa-database"></i> <span
                                class="nav-label">Admin</span> <span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level <?php if (isset($class_admin_collapse)) {
                        echo $class_admin_collapse;
                    } ?>">

                        <?php echo $Nav->menu_item('User', 'Users', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('Client', 'Clients', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('Project', 'Projects', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('InvoiceActual', 'Invoice Actual', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('InvoiceSend', 'Invoice Send', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('Chat', 'Chat', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('Notification', 'Notifications', 'class_manage.php') ?>

                    </ul>
                </li>


                <li class="<?php if (isset($class_kamy_active)) {
                    echo $class_kamy_active;
                } ?>">
                    <a href="<?php echo $path_admin; ?>index.php"><i class="fa fa-user"></i> <span class="nav-label">Kamy</span>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level <?php if (isset($class_kamy_collapse)) {
                        echo $class_kamy_collapse;
                    } ?>">

                        <?php echo $Nav->menu_item('Links', 'Links', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyExpense', 'Expense', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('ToDoList', 'ToDoList', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyHouseExpense', 'HouseExpense', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigarette', 'Cigarette', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigaretteDay', 'Cigarette Day', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigaretteMonth', 'Cigarette Month', 'class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigaretteYear', 'Cigarette Year', 'class_manage.php') ?>


                </ul>
            </li>


            <?php } // end of is logged in?>


            <li class="">
                <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Public area</span> <span
                            class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
                    <li>
                        <!--                        <a href="#">Public<span class="fa arrow"></span></a>-->
                        <a href="#"><i class="fa fa-folder-o"></i> <span class="nav-label">Others</span> <span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">

                            <?php
                            echo $Nav->menu_item('', 'Home public', 'index.php', 'public');
                            echo $Nav->menu_item('', 'Loan', 'loan_exp.php', 'public');

                            if (User::is_admin()) {
                                echo $Nav->menu_item('', 'Minor', 'minor.php', 'public');
                            }


?>
                            </ul>
                    </li>
                </ul>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Galleries</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">

                            <?php echo $Nav->menu_item('','Home public','index.php','public') ?>
                            <?php echo $Nav->menu_item('','Desiree Wedding','index_gallery.php','public') ?>
                            <?php echo $Nav->menu_item('','Familly','index_gallery2.php','public') ?>
                            <?php echo $Nav->menu_item('','Friends','index_gallery3.php','public') ?>
                            <?php echo $Nav->menu_item('','My page','index_gallery4.php','public') ?>
                            <?php echo $Nav->menu_item('','Lycée Français de Jérusalem','index_gallery5.php','public') ?>
                            <?php echo $Nav->menu_item('','Bralia','index_gallery6.php','public') ?>
                            <?php echo $Nav->menu_item('','Maman Bozorgue','index_gallery7.php','public') ?>

                        </ul>
                    </li>
                </ul>

            </li>


            <?php if($session->is_logged_in()) { ?>


            <li>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Manage<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">

                            <?php echo $Nav->menu_item('User','Users','class_manage.php') ?>
                            <?php echo $Nav->menu_item('Client','Clients','class_manage.php') ?>
                            <?php echo $Nav->menu_item('Project','Projects','class_manage.php') ?>
                            <?php echo $Nav->menu_item('InvoiceActual','Invoice Actual','class_manage.php') ?>
                            <?php echo $Nav->menu_item('InvoiceSend','Invoice Send','class_manage.php') ?>
                            <?php echo $Nav->menu_item('Chat','Chat','class_manage.php') ?>
                            <?php echo $Nav->menu_item('Notification','Notifications','class_manage.php') ?>



                        </ul>
                    </li>




                    <li>
                        <a href="#">Set Up Admin<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level <?php echo $class_setup_admin_collapse; ?>">


                            <?php echo $Nav->menu_item('Currency','Currency','class_manage.php') ?>
                            <?php echo $Nav->menu_item('Category','Category','class_manage.php') ?>
                            <?php echo $Nav->menu_item('Category1','Category1','class_manage.php') ?>
                            <?php echo $Nav->menu_item('Category2','Category2','class_manage.php') ?>
                            <?php echo $Nav->menu_item('UserType','User Type','class_manage.php') ?>
                             <span class="label label-primary pull-right">FULL</span>
                         </ul>

                    </li>
<!--                    <li>-->
<!--                        <a href="#">Second Level Item</a></li>-->

                </ul>
            </li>





            <li class="">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Kamy</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="#">Manage Kamy<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">


                        <?php echo $Nav->menu_item('Links','Links','class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyExpense','Expense','class_manage.php') ?>
                        <?php echo $Nav->menu_item('ToDoList','ToDoList','class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyHouseExpense','HouseExpense','class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigarette','Cigarette','class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigaretteDay','Cigarette Day','class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigaretteMonth','Cigarette Month','class_manage.php') ?>
                        <?php echo $Nav->menu_item('MyCigaretteYear','Cigarette Year','class_manage.php') ?>



                        </ul>
                    </li>

                    <li>
                        <a href="#">Set Up Kamy<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                    <?php echo $Nav->menu_item('MyExpensePerson','Expense Person','class_manage.php') ?>
                    <?php echo $Nav->menu_item('MyExpenseType','Expense Type','class_manage.php') ?>
                    <?php echo $Nav->menu_item('MyHouseExpenseType','House Expense Type','class_manage.php') ?>
                        </ul>
                    </li>
                </ul>
            </li>

            <?php } ?>


            <li class="landing_link">
                <a target="_blank" rel="noopener noreferrer" href="<?php echo $path_public; ?>landing.php"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
            </li>






        </ul>

    </div>
</nav>

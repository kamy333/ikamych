<?php //It seems that class Session is not working on a sub include file?>
<?php if (isset($_SESSION["user_id"])) {
    $user = User::find_by_id($_SESSION['user_id']);
} else {
    $user = "";
} ?>

<?php
//$layout_context=basename(__DIR__);


//if (isset($subfolder) && !empty($subfolder)) {
//    $path_admin = "admin/" . $subfolder;
//    $path_public = $subfolder."/";
//    echo "pppppppppppppp";
//}else{
//    $path_admin="";
//    $path_public="../../";
//}

if ($layout_context == "public") {

//    https://www.ikamy.ch/public/myLinks.php?category=Others
    //   https://www.ikamy.ch/ikamych/public/myLinks.php?category=Others

//    $path_admin="admin/";
//    $path_public=""  ;

    $path_admin = MY_URL_ADMIN;
    $path_public = MY_URL_PUBLIC;

} else {


//    $path_admin="";
//    $path_public="../";

    $path_admin = MY_URL_ADMIN;
    $path_public = MY_URL_PUBLIC;


} ?>



<?php if ($layout_context == "public") { ?>
    <script>
        var $layout_context = "public";
        var $path_admin = "admin/";
        var $path_public = "";
        var $path = "";
        // var $path=$Nav->relative_path_top();

    </script>
<?php } else { ?>
    <script>
        var $layout_context = "admin";
        var $path_admin = "";
        var $path_public = "../";
        var $path = "../";
        // var $path= "".$Nav->relative_path_top()."\"";
    </script>

<?php } ?>

<?php
//echo isset($session->user_id) ? "true" : "false";
?>


<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top " role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand active" href="https://www.ikamy.ch/public/index.php"><?php echo LOGO ?><span
                        style="color: blue"> <?php if (isset($layout_context) && $layout_context == "admin") {
                        echo " Admin";
                    } ?></span></a>

        </div>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav">

                <li <?php if (isset($active_menu) && $active_menu == "home") {
                    echo "class=\"active\"";
                } ?>>
                    <?php if ($layout_context == "public") { ?>
                        <a href="<?php echo $path_admin; ?>index.php">Home</a>
                    <?php } ?>

                </li>

                <?php echo $Nav->menu_item('', 'Galleries', $Nav->http . 'Inspinia/index.php', ''); ?>


                <li
                    <?php if (isset($active_menu) && $active_menu == "about") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">About us<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php echo $Nav->menu_item('', 'About us1', 'about_us.php', 'public'); ?>
                        <?php echo $Nav->menu_item('', 'About us 2', 'about_us_2.php', 'public'); ?>
                        <?php echo $Nav->menu_item('', 'About Us 3', 'angular.php', 'public'); ?>
                        <?php
                        if (User::is_admin()) {
                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'AngularJS Login', 'angular2.php', 'public');
                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'Inspinia', '../inspinia/index.php', 'public');
                            echo $Nav->menu_item('', 'Inspinia Full2', '../Inspinia_Full_Version_2/index.php', 'public', true);
                            echo $Nav->menu_item('', 'Inspinia Full', '../inspinia_Full_Version/index.php', 'public', true);
                            echo "<li class=\"divider\"></li>";

                            echo $Nav->menu_item('', 'SmartAdmin', '../smartAdmin/index.php', 'public');
                            echo $Nav->menu_item('', 'SmartAdmin Full', '../SmartAdmin_Full_Version/index.php', 'public');


                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'Minton', '../minton/index.php', 'public');
                            echo $Nav->menu_item('', 'Minton Full', '../Minton_Full_Version/index.php', 'public');

                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'Your info', 'some_data.php', 'public');

                        }
                        ?>

                    </ul>
                </li>


                <li
                    <?php if (isset($active_menu) && $active_menu == "links") {
                        echo "class=\"active\"";
                    } ?>
                ><a href="<?php echo $path_public; ?>myLinks.php?category=Others">Links</a></li>


                <li
                    <?php if (isset($active_menu) && $active_menu == "Others") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">Other<span class="caret"></span></a>

                    <ul class="dropdown-menu">


                        <li><a href="<?php echo $path_public; ?>_f/_transmed/transmed_form.php">Transmed_form</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/_transmed/transmed_form2.php">Transmed_form2</a></li>


                        <li class="divider"></li>
                        <li><a href="<?php echo $path_public; ?>_f/_bralia/braliacuba.php">Voyage Bralia Cuba
                                Mexique</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/_bralia/braliajordanie.php">Voyage Bralia
                                Jordanie</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/_bralia/braliajordanie2.php">Voyage Bralia
                                Jordanie2</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/_bralia/bralialoirezoo.php">Voyage Bralia Loire
                                Zoo</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/_bralia/braliabudapest.php">Voyage Bralia
                                Budapest</a></li>

                        <li class="divider"></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/jokes_quotes.php">Jokes Quotes</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/judaisme.php">Judaisme</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/juif_iran.php">Juifs d'Iran</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/antisemitism_1.php">Antisemitism</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/antisionism.php">Antisionism 1</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/shoah.php">Shoah</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/juif_arabe1.php">Juifs Arabe</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/bhl.php">BHL</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/article/psychologie.php">Psychologie</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/programmingbooks2.php">Programming books2</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/programmingbooks.php">Programming books</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/lesson_git.php">Git</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/lesson_OOP_PHP.php">OOP PHP</a></li>

                        <?php if (User::is_kamy()) { ?>
                            <li class="divider"></li>
                            <li><a href="<?php echo $path_public; ?>_f/private/facebook_injure.php">Propos amis</a></li>
                            <li><a href="<?php echo $path_public; ?>_f/private/kamy_memories.php">Kamy memoire</a></li>

                        <?php } ?>


                    </ul>
                </li>


                <li
                    <?php if (isset($active_menu) && $active_menu == "contact") {
                        echo "class=\"active\"";
                    } ?>
                ><a href="<?php echo $path_public; ?>contact.php">Contact</a></li>


                <?php if (isset($_SESSION["user_id"]) && ($user->is_employee())) { ?>

                    <li
                        <?php if (isset($active_menu) && $active_menu == "admin") {
                            echo " class=\"dropdown active\"";
                        } else {
                            echo " class=\" dropdown\"";
                        } ?>
                    ><a href="#" data-toggle="dropdown">Mon Menu<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="#">Menu1</a></li>
                            <li><a href="#">Menu2</a></li>
                        </ul>
                    </li>


                <?php } ?>



                <?php

                if (isset($_SESSION["user_id"]) && ($user->is_manager() || $user->is_admin() || $user->is_secretary())) { ?>


                    <li
                        <?php if (isset($active_menu) && $active_menu == "admin") {
                            echo " class=\"dropdown active\"";
                        } else {
                            echo " class=\" dropdown\"";
                        } ?>
                    ><a href="#" data-toggle="dropdown">Administration<span class="caret"></span></a>

                        <ul class="dropdown-menu">

                            <?php if (User::is_admin()) {
                                echo $Nav->menu_item('', 'Index ajax', 'index_ajax.php', 'admin/crud/ajax');
                                echo $Nav->menu_item('', 'Index data', 'index_data.php', 'admin/crud/data');
                            } ?>
                            <li class="divider"></li>
                            <?php echo $Nav->menu_item('Article', 'Article', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('ToDoList', 'To Do List', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('Chat', 'Chat', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('ChatFriend', 'Chat Friend', 'manage_ajax.php', 'admin/crud/ajax'); ?>

                            <!--                --><?php //echo $Nav->menu_item('','To Do List','manage_ToDoList.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Chat','manage_chat.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Chat Friend','manage_ChatFriend.php','admin'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                            <?php echo $Nav->menu_item('MyHouseExpense', 'House Expense', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyExpense', 'Expense', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyExpensePerson', 'Expense Person', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyExpenseType', 'Expense Type', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyHouseExpenseType', 'House Expense Type', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('Currency', 'Currency', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','House Expense','manage_MyHouseExpense.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Expense','manage_MyExpense.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Expense Person','manage_MyExpensePerson.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Expense Type','manage_MyExpenseType.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','House Expense Type','manage_MyHouseExpenseType.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Currency','manage_currency.php','admin'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                            <!--                --><?php //echo $Nav->menu_item('','Clients','manage_clients.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Projects','manage_projects.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Category','manage_category.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Category 1','manage_category_1.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Category 2','manage_category_2.php','admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Invoice Actual','manage_invoice_actual.php','admin'); ?>
                            <!--                --><?php //echo "<li class=\"divider\"></li>"; ?>
                            <?php echo $Nav->menu_item('User', 'User', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Users','manage_user.php','admin'); ?>
                            <?php echo "<li class=\"divider\">Links</li>"; ?>
                            <?php echo $Nav->menu_item('Links', 'Links', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('LinksCategory', 'Links Category', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                            <!--                --><?php //echo $Nav->menu_item('', 'Links', 'manage_links.php', 'admin'); ?>
                            <!--                --><?php //echo $Nav->menu_item('','Links Category','manage_links_category.php','admin'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                            <!--                --><?php //echo $Nav->menu_item('','Invoice Send','manage_invoice_send.php','admin'); ?>


                            <?php if (isset($session->user_id) and $user->is_admin()) { ?>
                                <?php echo $Nav->menu_item('', 'Log File', 'logfile.php', 'admin'); ?>
                                <?php echo $Nav->menu_item('', 'Log Views File', 'logfileviews.php', 'admin'); ?>
                                <?php echo $Nav->menu_item('', 'Log Debug File', 'logfileDebug.php', 'admin'); ?>

                            <?php } ?>


                        </ul>
                    </li>


                    <li
                        <?php if (isset($active_menu) && $active_menu == "adminNew") {
                            echo " class='dropdown active'";
                        } else {
                            echo " class=' dropdown'";
                        } ?>
                    ><a href="#" data-toggle="dropdown">New<span class="caret"></span></a>

                        <ul class="dropdown-menu">

                            <?php echo $Nav->menu_item('Article', 'Article', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('ToDoList', 'To Do List', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('Chat', 'Chat', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('ChatFriend', 'Chat Friend', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                            <?php echo $Nav->menu_item('MyHouseExpense', 'House Expense', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyExpense', 'Expense', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyExpensePerson', 'Expense Person', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyExpenseType', 'Expense Type', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('MyHouseExpenseType', 'House Expense Type', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('Currency', 'Currency', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                            <?php echo $Nav->menu_item('User', 'User', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo "<li class=\"divider\">Links</li>"; ?>
                            <?php echo $Nav->menu_item('Links', 'Links', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo $Nav->menu_item('LinksCategory', 'Links Category', 'new_ajax.php', 'admin/crud/ajax'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>


                        </ul>
                    </li>


                    <li
                        <?php if (isset($active_menu) && $active_menu == "transport") {
                            echo "class=\"active\"";
                        } ?>
                    ><a href="<?php echo $Nav->http . "transmed/"; ?>index.php">Transmed </a></li>


                    <?php if (User::is_kamy()) { ?>

                        <li
                            <?php if (isset($active_menu) && $active_menu == "photo_gallery") {
                                echo " class=\"dropdown active\"";
                            } else {
                                echo " class=\" dropdown\"";
                            } ?>
                        ><a href="#" data-toggle="dropdown">Photo Gallery<span class="caret"></span></a>

                            <ul class="dropdown-menu">


                                <?php echo $Nav->menu_item('', 'Photos', 'manage_photos.php') ?>
                                <?php echo $Nav->menu_item('', 'Comments', 'manage_comments.php') ?>
                                <?php echo $Nav->menu_item('', 'Comment Photo', 'manage_comments_photo.php') ?>

                                <?php echo "<li class=\"divider\"></li>"; ?>

                                <?php echo $Nav->menu_item('', 'New Comment old', 'new_Comment_old.php') ?>
                                <?php echo $Nav->menu_item('', 'New Photo', 'new_photo.php') ?>

                                <?php echo "<li class=\"divider\"></li>"; ?>
                                <?php echo $Nav->menu_item('', 'Public Photo', 'photo.php', "public") ?>
                                <?php echo $Nav->menu_item('', 'Public Photo Gallery', 'photo_gallery.php', "public") ?>


                                <?php echo "<li class=\"divider\"></li>"; ?>
                                <?php echo $Nav->menu_item('', 'Photos Old', 'Manage_Photo.php') ?>
                                <?php echo $Nav->menu_item('', 'Comments del?', 'manage_Comment.php') ?>
                                <?php echo $Nav->menu_item('', 'Comment Old ', 'manage_Comment_old.php') ?>
                                <?php echo $Nav->menu_item('', 'New Photo_old', 'new_photo_old.php') ?>


                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset($_SESSION["user_id"]) and $user->is_admin()) { ?>
                        <li
                            <?php if (isset($active_menu) && $active_menu == "download") {
                                echo " class=\"dropdown active\"";
                            } else {
                                echo " class=\" dropdown\"";
                            } ?>
                        ><a href="#" data-toggle="dropdown">Download<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $path_admin; ?>download.php">download</a></li>


                            </ul>
                        </li>
                    <?php } ?>


                    <?php // } ?>
                <?php } ?>


            </ul>


            <?php

            ?>


            <ul class="nav navbar-nav navbar-right">
                <?php
                list ($date_fr, $date_fr_short, $date_fr_long, $date_fr_hr, $date_fr_short_hr, $date_fr_long_hr, $date_fr_full_hr) = date_fr(); ?>

                <!--                <p class="navbar-text " style="">-->
                <?php //echo now()//echo h($date_fr_long_hr); ?><!--</p>-->
                <!---->
                <?php if (isset($_SESSION["user_id"])) { ?>

                    <li class="active"><a href="<?php echo $path_admin; ?>logout.php"
                                          data-toggle="dropdown"><?php echo "&nbsp;&nbsp;" ?>
                            <small><strong><?php echo $user->username . "&nbsp;&nbsp;"; ?></strong></small>


                            <?php
                            $username = $user->username;
                            if (file_exists($path_public . "img/{$username}.JPG")) {
                                echo "<span><img class='img-thumbnail img-responsive img-circle'  src='{$path_public}img/{$username}.JPG' alt='{$username}'style='width:2em;height:2em;'</span>";
                            }
                            ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php if (isset($_SESSION["user_id"]) and $user->is_admin()) { ?>
                                <li><a href="<?php echo $path_admin; ?>profile.php">Profile</a></li>
                                <li><a href="<?php echo $path_admin; ?>upload.php">Upload file photo</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $path_admin; ?>manage_blacklist_ip.php">Manage Blacklist_ip</a>
                                </li>
                                <li><a href="<?php echo $path_admin; ?>manage_failed_logins.php">Manage Failed
                                        logins</a></li>
                                <li><a href="<?php echo $path_admin; ?>manage_user_type.php">Manage User Type</a></li>
                                <li><a href="<?php echo $path_admin; ?>logfile.php">Log File</a></li>
                                <?php echo $Nav->menu_item('', 'Log Views File', 'logfileviews.php', 'admin'); ?>
                                <?php echo $Nav->menu_item('', 'Log Debug File', 'logfileDebug.php', 'admin'); ?>

                                <li class="divider"></li>
                                <li><a href="<?php echo $path_admin; ?>rajah_project.php">Rajah Project</a></li>
                                <li class="divider"></li>
                            <?php } ?>
                            <li><a href="<?php echo $path_admin; ?>manage_admins_my_page.php">My Page</a></li>
                            <li><a href="<?php echo $path_admin; ?>edit_admin_individual.php">Edit Info</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $path_admin; ?>logout.php">Logout</a></li>

                        </ul>


                    </li>

                <?php } else { ?>





                <li<?php if (isset($active_menu) && $active_menu == "login") {
                    echo " class=\"active \"";
                } ?>
                ><a href="<?php echo $path_admin; ?>login.php"><span class='glyphicon glyphicon-user'
                                                                     aria-hidden='true'></span><?php echo "&nbsp;&nbsp;" ?>
                        Login<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?></a></li><?php } ?>


            </ul>


        </div>
    </nav>


</div>

<?php //  echo "<p class='text-left'><small>".$complete_date."</small></p>";?>




<?php if (isset($_SESSION["user_id"]) && ($user->is_manager() || $user->is_admin() || $user->is_employee())) { ?>

    <?php if (isset($layout_context) && $layout_context == "admin") { ?>

        <?php if (isset($sub_menu)) { ?>


            <ol class="breadcrumb">

                <?php if ($user->is_admin() && $user->is_kamy()) { ?>
                    &nbsp;&nbsp;

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Test</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="<?php echo $path_admin; ?>0_test_validation.php">0_test_validation</a></li>
                            <li><a href="<?php echo $path_admin; ?>0_modele.php?cl=ViewModelByChauffeur">0_modele</a>
                            </li>
                            <li><a href="<?php echo $path_admin; ?>0_forms.php">0_forms</a></li>
                            <li><a href="<?php echo $path_admin; ?>0_forms_from_class.php">0_forms_from_class</a></li>
                            <li><a href="<?php echo $path_admin; ?>0_modele4.php">0_modele4</a></li>
                            <li><a href="<?php echo $path_admin; ?>login.php">login</a></li>

                            <li class="divider"></li>

                        </ul>
                    </div>

                <?php } ?>
            </ol>

        <?php } ?>

    <?php } // end $sub_menu ?>
<?php } ?>



<?php if (isset($incl_message_error) && ($incl_message_error)) { ?>


<?php } ?>



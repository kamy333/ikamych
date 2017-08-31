
<?php //It seems that class Session is not working on a sub include file?>
<?php if(isset($_SESSION["user_id"])) {$user=User::find_by_id($_SESSION['user_id']);} else {$user="";} ?>

<?php
//$layout_context=basename(__DIR__);

if ($layout_context=="public"){
    $path_admin="admin/";
    $path_public=""  ;

} else {
    $path_admin="";
    $path_public="../";

} ?>

<?php if ($layout_context=="public"){ ?>
    <script>
        var $layout_context="public";
        var $path_admin="admin/";
        var $path_public=""  ;
        var $path="";
    </script>
<?php  } else {?>
    <script>
      var $layout_context="admin";
      var $path_admin="";
      var  $path_public="../";
      var $path="../";
    </script>

<?php  } ?>

<?php
//echo isset($session->user_id) ? "true" : "false";
?>


<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top " role="navigation" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand active" href="http://www.ikamy.ch/public/index.php"><?php echo LOGO ?><span style="color: blue"> <?php if (isset($layout_context) && $layout_context == "admin") { echo " Admin"; } ?></span></a>

        </div>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav">

                <li <?php if ( isset($active_menu) && $active_menu=="home") {echo "class=\"active\"";} ?>>
                    <?php if ($layout_context=="public"){  ?>
                    <a href="<?php echo $path_admin;?>index.php">Home</a>
                    <?php } ?>

                </li>

                <?php echo $Nav->menu_item('','Galleries',$Nav->http.'Inspinia/index.php' ,''); ?>


                <li
                    <?php if ( isset($active_menu) && $active_menu=="about"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                    ><a href="#" data-toggle="dropdown">About us<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <?php echo $Nav->menu_item('','About us1','about_us.php','public'); ?>
                        <?php echo $Nav->menu_item('','About us 2','about_us_2.php','public'); ?>
                        <?php echo $Nav->menu_item('','About Us 3','angular.php','public'); ?>
                        <?php echo $Nav->menu_item('','AngularJS Login','angular2.php','public'); ?>
                        <?php
                        if(User::is_admin()){
                            echo $Nav->menu_item('','Inspinia','../inspinia/index.php','public');
                            echo $Nav->menu_item('','SmartAdmin','../smartAdmin/index.php','public');
                            echo $Nav->menu_item('','Minton','../minton/index.php','public');
                            echo $Nav->menu_item('', 'Inspinia Full', '../inspinia_Full_Version/index.php', 'public', true);
                            echo $Nav->menu_item('', 'Inspinia Full2', '../Inspinia_Full_Version_2/index.php', 'public', true);

                            echo $Nav->menu_item('','SmartAdmin Full','../SmartAdmin_Full_Version/index.php','public');
                            echo $Nav->menu_item('','Minton Full','../Minton_Full_Version/index.php','public');



                            echo $Nav->menu_item('','Your info','some_data.php','public');

                        }
                         ?>

                        </ul>
                </li>


                <?php if(User::is_admin()|| User::is_manager() || User::is_secretary()){ ?>
                <li
                    <?php if ( isset($active_menu) && $active_menu=="data"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                ><a href="#" data-toggle="dropdown">Data<span class="caret"></span></a>
                    <ul class="dropdown-menu">

                    <?php foreach (MyClasses::$all_class as $class) {
                        if(!in_array($class, MyClasses::$disable_db_classes)){
//                            echo $Nav->menu_item($class,'Manage '.$class,'manage_data.php','admin');
                            echo $Nav->menu_item($class,'Manage Ajax '.$class,'manage_ajax.php','admin');

                        }
                    }
                    unset($class);


                    ?>
                    </ul>


                <li
                    <?php if ( isset($active_menu) && $active_menu=="newdata"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                ><a href="#" data-toggle="dropdown">New Data<span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <?php foreach (MyClasses::$all_class as $class) {
                            if(!in_array($class, MyClasses::$disable_db_classes)){
//                            echo $Nav->menu_item($class, 'New ' . $class, 'new_data.php', 'admin');
                             echo $Nav->menu_item($class, 'New ajax' . $class, 'new_ajax.php', 'admin');
                        }
                        }
                        unset($class);


                        ?>
                    </ul>


                    <?php } ?>


                
                <li
                    <?php if ( isset($active_menu) && $active_menu=="links") {echo "class=\"active\"";} ?>
                ><a href="<?php echo $path_public;?>myLinks.php?category=Others">Links</a></li>


                <li
                    <?php if ( isset($active_menu) && $active_menu=="lesson"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                    ><a href="#" data-toggle="dropdown">Other<span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $path_public;?>judaisme.php">Judaisme</a></li>
                        <li><a href="<?php echo $path_public;?>antisemitism_1.php">Antisemitism 1</a></li>
                        <li><a href="<?php echo $path_public;?>shoah.php">Shoah</a></li>
                        <li><a href="<?php echo $path_public;?>jokes_quotes.php">Jokes Quotes</a></li>
                        <li><a href="<?php echo $path_public;?>juif_arabe1.php">Juif Arabe</a></li>
                        <li><a href="<?php echo $path_public;?>bhl.php">BHL</a></li>
                        <li><a href="<?php echo $path_public;?>lesson_git.php">Git</a></li>
                        <li><a href="<?php echo $path_public;?>lesson_OOP_PHP.php">OOP PHP</a></li>


                    </ul>
                </li>



                <li
                    <?php if ( isset($active_menu) && $active_menu=="contact") {echo "class=\"active\"";} ?>
                    ><a href="<?php echo $path_public;?>contact.php">Contact</a></li>



                <?php  if (isset($_SESSION["user_id"]) &&($user->is_employee())) { ?>

                    <li
                        <?php if ( isset($active_menu) && $active_menu=="admin"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                        ><a href="#" data-toggle="dropdown">Mon Menu<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="#">Menu1</a></li>
                            <li><a href="#">Menu2</a></li>
                        </ul>
                    </li>


                <?php } ?>



                <?php

                if (isset($_SESSION["user_id"]) && ($user->is_manager() || $user->is_admin() || $user->is_secretary() ) ) { ?>


                    <li
                        <?php if ( isset($active_menu) && $active_menu=="admin"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                        ><a href="#" data-toggle="dropdown">Administration<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                <?php echo $Nav->menu_item('','To Do List','manage_ToDoList.php','admin'); ?>
                <?php echo $Nav->menu_item('','Chat','manage_chat.php','admin'); ?>
                <?php echo $Nav->menu_item('','Chat Friend','manage_ChatFriend.php','admin'); ?>
                <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('','House Expense','manage_MyHouseExpense.php','admin'); ?>
                <?php echo $Nav->menu_item('','Expense','manage_MyExpense.php','admin'); ?>
                <?php echo $Nav->menu_item('','Expense Person','manage_MyExpensePerson.php','admin'); ?>
                <?php echo $Nav->menu_item('','Expense Type','manage_MyExpenseType.php','admin'); ?>
                <?php echo $Nav->menu_item('','House Expense Type','manage_MyHouseExpenseType.php','admin'); ?>
                <?php echo $Nav->menu_item('','Cigarette','manage_MyCigarette.php','admin'); ?>
                <?php echo $Nav->menu_item('','Currency','manage_currency.php','admin'); ?>
                <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('','Clients','manage_clients.php','admin'); ?>
                <?php echo $Nav->menu_item('','Projects','manage_projects.php','admin'); ?>
                <?php echo $Nav->menu_item('','Category','manage_category.php','admin'); ?>
                <?php echo $Nav->menu_item('','Category 1','manage_category_1.php','admin'); ?>
                <?php echo $Nav->menu_item('','Category 2','manage_category_2.php','admin'); ?>
                <?php echo $Nav->menu_item('','Invoice Actual','manage_invoice_actual.php','admin'); ?>
                <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('','Users','manage_user.php','admin'); ?>
                <?php echo "<li class=\"divider\">Links</li>"; ?>
                <?php echo $Nav->menu_item('', 'Links', 'DataBaseClient.php', 'admin'); ?>
                <?php echo $Nav->menu_item('','Links Category','manage_links_category.php','admin'); ?>
                <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('','Invoice Send','manage_invoice_send.php','admin'); ?>


                            <?php if(isset($session->user_id) and $user->is_admin() ) { ?>
                                <?php echo $Nav->menu_item('','Log File','logfile.php','admin'); ?>
                    <?php echo $Nav->menu_item('', 'Log Debug File', 'logfileDebug.php', 'admin'); ?>

                <?php } ?>


                        </ul>
                    </li>



                    <li
                        <?php if ( isset($active_menu) && $active_menu=="adminNew"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                        ><a href="#" data-toggle="dropdown">New<span class="caret"></span></a>

                        <ul class="dropdown-menu">
<!--                <li><a href="--><?php //echo $path_admin;?><!--"></a></li>-->
                <?php echo $Nav->menu_item('','Add 1 cig','new_MyCigarette_Add_1.php','admin'); ?>
                <?php echo $Nav->menu_item('ToDoList','To Do List','new_ToDoList.php','admin'); ?>
                <?php echo $Nav->menu_item('Chat','Chat','new_chat.php','admin'); ?>
                <?php echo $Nav->menu_item('ChatFriend','Chat Friend','new_ChatFriend.php','admin'); ?>
                <?php echo $Nav->menu_item('MyHouseExpense','New House Expense','new_MyHouseExpense.php','admin'); ?>
                <?php echo $Nav->menu_item('MyExpense','New Expense','new_MyExpense.php','admin'); ?>
                <?php echo $Nav->menu_item('','New Expense Person','new_MyExpensePerson.php','admin'); ?>
                <?php echo $Nav->menu_item('MyExpenseType','New Expense Type','new_MyExpenseType.php','admin'); ?>
                 <?php echo $Nav->menu_item('MyHouseExpenseType','New house Expense Type','new_MyHouseExpenseType.php','admin'); ?>
                <?php echo $Nav->menu_item('MyCigarette','New Cigarette','new_MyCigarette.php','admin'); ?>
                <?php echo $Nav->menu_item('Currency','New Currency','new_currency.php','admin'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('Client','New Client','new_client.php','admin'); ?>
                <?php echo $Nav->menu_item('Project','New Project','new_project.php','admin'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('User','New User','new_user.php','admin'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('Category','New Category','new_category.php','admin'); ?>
                <?php echo $Nav->menu_item('Category1','New Category 1','new_category_1.php','admin'); ?>
                <?php echo $Nav->menu_item('Category2','New Category2','new_category_2.php','admin'); ?>
                <?php echo $Nav->menu_item('InvoiceActual','New Invoice Actual','new_invoice_actual.php','admin'); ?>
                            <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('Links','New link','new_link.php','admin'); ?>
                <?php echo $Nav->menu_item('LinksCategory','New links Category','new_link_category.php','admin'); ?>
                <?php echo "<li class=\"divider\"></li>"; ?>
                <?php echo $Nav->menu_item('','New Invoice Actual Row','new_invoice_actual_row.php','admin'); ?>
                <?php echo $Nav->menu_item('InvoiceSend','New Invoice Send','new_invoice_send.php','admin'); ?>


                        </ul>
                    </li>


                    <li
                        <?php if (isset($active_menu) && $active_menu == "transport") {
                            echo "class=\"active\"";
                        } ?>
                    ><a href="<?php echo $Nav->http . "transmed/"; ?>index.php">Transmed </a></li>


                    <?php if (User::is_kamy()) { ?>

                    <li
                        <?php if ( isset($active_menu) && $active_menu=="photo_gallery"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                    ><a href="#" data-toggle="dropdown">Photo Gallery<span class="caret"></span></a>

                        <ul class="dropdown-menu">


                 <?php echo $Nav->menu_item('','Photos','manage_photos.php') ?>
                 <?php echo $Nav->menu_item('','Comments','manage_comments.php') ?>
                 <?php echo $Nav->menu_item('','Comment Photo','manage_comments_photo.php') ?>

                 <?php echo "<li class=\"divider\"></li>"; ?>

                 <?php echo $Nav->menu_item('','New Comment old','new_Comment_old.php') ?>
                 <?php echo $Nav->menu_item('','New Photo','new_photo.php') ?>

                 <?php echo "<li class=\"divider\"></li>"; ?>
                 <?php echo $Nav->menu_item('','Public Photo','photo.php',"public") ?>
                 <?php echo $Nav->menu_item('','Public Photo Gallery','photo_gallery.php',"public") ?>



                 <?php echo "<li class=\"divider\"></li>"; ?>
                 <?php echo $Nav->menu_item('','Photos Old','Manage_Photo.php') ?>
                 <?php echo $Nav->menu_item('','Comments del?','manage_Comment.php') ?>
                 <?php echo $Nav->menu_item('','Comment Old ','manage_Comment_old.php') ?>
                 <?php echo $Nav->menu_item('','New Photo_old','new_photo_old.php') ?>


                        </ul>
                    </li>
                    <?php } ?>

                <?php if(isset($_SESSION["user_id"]) and $user->is_admin() ) { ?>
                    <li
                        <?php if ( isset($active_menu) && $active_menu=="download"){echo " class=\"dropdown active\"";} else {echo " class=\" dropdown\"";}?>
                        ><a href="#" data-toggle="dropdown">Download<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $path_admin;?>download.php">download</a></li>


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
                list ($date_fr,$date_fr_short,$date_fr_long,$date_fr_hr,$date_fr_short_hr,$date_fr_long_hr,$date_fr_full_hr)=date_fr();?>

<!--                <p class="navbar-text " style="">--><?php //echo now()//echo h($date_fr_long_hr); ?><!--</p>-->
<!---->
                <?php  if (isset($_SESSION["user_id"])){ ?>

                    <li class="active"><a href="<?php echo $path_admin;?>logout.php" data-toggle="dropdown"><?php  echo "&nbsp;&nbsp;" ?><small><strong><?php echo $user->username."&nbsp;&nbsp;"; ?></strong></small>


                            <?php
                            $username=$user->username;
                            if(file_exists($path_public."img/{$username}.JPG")){
                                echo "<span><img class='img-thumbnail img-responsive img-circle'  src='{$path_public}img/{$username}.JPG' alt='{$username}'style='width:2em;height:2em;'</span>";
                            }
                            ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php if(isset($_SESSION["user_id"]) and $user->is_admin() ) { ?>
                                <li><a href="<?php echo $path_admin; ?>profile.php">Profile</a></li>

                                <li><a href="<?php echo $path_admin; ?>upload.php">Upload file photo</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $path_admin; ?>manage_blacklist_ip.php">Manage Blacklist_ip</a>
                                </li>
                                <li><a href="<?php echo $path_admin; ?>manage_failed_logins.php">Manage Failed
                                        logins</a></li>
                                <li><a href="<?php echo $path_admin; ?>manage_user_type.php">Manage User Type</a></li>
                                <li><a href="<?php echo $path_admin; ?>logfile.php">Log File</a></li>
                                <?php echo $Nav->menu_item('', 'Log Debug File', 'logfileDebug.php', 'admin'); ?>

                                <li class="divider"></li>
                                <li><a href="<?php echo $path_admin;?>rajah_project.php">Rajah Project</a></li>
                                <li class="divider"></li>
                            <?php } ?>
                            <li><a href="<?php echo $path_admin; ?>manage_admins_my_page.php">My Page</a></li>
                            <li><a href="<?php echo $path_admin; ?>edit_admin_individual.php">Edit Info</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $path_admin; ?>logout.php">Logout</a></li>

                        </ul>



                    </li>

                <?php } else {   ?>





                <li<?php if ( isset($active_menu) && $active_menu=="login") {echo " class=\"active \"";} ?>
                    ><a href="<?php echo $path_admin;?>login.php"><span class='glyphicon glyphicon-user' aria-hidden='true'></span><?php  echo "&nbsp;&nbsp;" ?>Login<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?></a></li><?php } ?>






            </ul>




        </div>
    </nav>





</div>

<?php  //  echo "<p class='text-left'><small>".$complete_date."</small></p>";?>




<?php  if (isset($_SESSION["user_id"]) && ($user->is_manager() || $user->is_admin()|| $user->is_employee() ) ) { ?>

    <?php if (isset($layout_context) && $layout_context == "admin") { ?>

        <?php if (isset($sub_menu)) { ?>


        <ol class="breadcrumb">

            <?php if($user->is_admin()&& $user->is_kamy()) { ?>
                &nbsp;&nbsp;

                <div class="btn-group">
                    <button type="button" class="btn btn-default">Test</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">

                    <li><a href="<?php echo $path_admin;?>0_test_validation.php">0_test_validation</a></li>
                        <li><a href="<?php echo $path_admin; ?>0_modele.php?cl=ViewModelByChauffeur">0_modele</a></li>
                    <li><a href="<?php echo $path_admin;?>0_forms.php">0_forms</a></li>
                    <li><a href="<?php echo $path_admin;?>0_forms_from_class.php">0_forms_from_class</a></li>
                        <li><a href="<?php echo $path_admin;?>0_modele4.php">0_modele4</a></li>
                    <li><a href="<?php echo $path_admin;?>login.php">login</a></li>

                    <li class="divider"></li>

                    </ul>
                </div>
                <span>&nbsp;&nbsp; |&nbsp;&nbsp; </span>
                <li><a href="<?php echo $path_admin;?>new_MyCigarette_Add_1.php">Add 1 cig</a></li>
                <span>&nbsp;&nbsp; |&nbsp;&nbsp; </span>

            <?php } ?>
        </ol>

    <?php } ?>

    <?php } // end $sub_menu ?>
<?php } ?>



<?php if(isset($incl_message_error) &&($incl_message_error)) {?>

    <!--    <div class="row">-->
    <!--        --><?php //echo message(); ?>
    <!--        --><?php //if(isset($errors)) echo form_errors($errors); ?>
    <!--        --><?php //if(isset($warnings)) echo form_warnings($warnings); ?>
    <!---->
    <!--    </div>-->


<?php } ?>



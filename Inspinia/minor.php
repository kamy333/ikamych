<?php require_once('../includes/initialize.php'); ?>
<?php if(!User::is_admin()){redirect_to("index.php");} ?>

<?php //$active_menu="minor"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>



<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="row">
                <?php
                $content=UpdateUserProfile::form_change_password();
                echo Table::ibox_table($content,'Change your password',4,3);
                unset($content);

                $content=UpdateUserProfile::form_additional_info();
                echo Table::ibox_table($content,'Change your personal info',6,3);



                ?>
            <?php

            $user=User::find_by_id($session->user_id);
//            $user=new User();
//            $array_header(i)
            $output = "";
            $output .= $user->id;
            $output.=$user->username;
            $output .= $user->first_name;
            $output .= $user->last_name;


            echo Table::ibox_table($output,'User information',3);

            ?>
        </div>
                <div class="row">

                    <div class="col-lg-4">
                        <div class="contact-box">
                            <a href="profile.html">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo $user->user_path_and_placeholder();?>">
                                        <div class="m-t-xs font-bold"><?php echo $user->user_type; ?></div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h3><strong><?php echo $user->full_name(); ?></strong></h3>
                                    <p><i class="fa fa-user"></i> <?php echo $user->username; ?></p>
                                    <p><i class="fa fa-envelope"></i> <?php echo $user->email; ?></p>
                                    <p><i class="fa fa-home"></i> <?php echo $user->email; ?></p>

                                    <address>
                                        <strong><?php echo $user->email;?></strong><br>


                                        <?php if(!empty($user->address)){ ?>
                                            <?php echo $user->address; ?><br>
                                        <?php } ?>

                                        <?php if(!empty($user->city)){ ?>
                                            <?php echo $user->city.", "; ?><br>
                                        <?php } ?>

                                        <?php if(!empty($user->cp)){ ?>
                                            <?php echo $user->cp.", "; ?>
                                        <?php } ?>

                                        <?php if(!empty($user->country)){ ?>
                                            <?php echo $user->country.", "; ?>
                                        <?php } ?>


                                        <?php if(!empty($user->phone)){ ?>
                                        <abbr title="Phone">P:</abbr> <?php echo $user->phone; ?>
                                        <?php } ?>

                                        <?php if(!empty($user->mobile)){ ?>
                                            <abbr title="Mobile">P:</abbr> <?php echo $user->mobile; ?>

                                        <?php } ?>

                                        <button class="btn btn-primary btn-xs" style="width: 50px" >Modify</button>
<!--                                        <abbr title="Member">P:</abbr> --><?php //echo $user->input; ?>


                                    </address>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                    </div>

            </div>

            

            <div class="col-lg-12  white-bg">
                <div class="text-center m-t-lg">


                    <h1>Welcome to <?php  echo LOGO;?> </h1>







                    <p>

                            <?php echo "Basename ".$active_menu.'<br>';
                            echo $_SERVER['HTTP_REFERER']."<br>";
                            echo "<b>__DIR__</b> ".__DIR__.'<br>';
                            echo "<b>Dirname</b>  ".basename(dirname($_SERVER['SCRIPT_FILENAME'])).'<br>';
                            echo "<b>SERVER_NAME</b>  ".$_SERVER['SERVER_NAME'].'<br>';
                            echo "<b>SITE_ROOT</b>  ".SITE_ROOT.'<br>';
                            echo  "<b>MY_URL_PUBLIC</b>  ".MY_URL_PUBLIC.'<br>';
                            echo  "<b>MY_URL_ADMIN</b>  ".MY_URL_ADMIN.'<br>';
                            echo $_SERVER["PHP_SELF"].'<br>';
                            echo  $Nav->public_menu("public_gallery").'<br>';
                            echo  $Nav->public_menu("Admin_class").'<br>';
                            echo $Nav;
                            echo $_SERVER['QUERY_STRING'];

                            echo "<hr>";
                            echo $Nav->folder."<br>";

                        ?>


                    </p>
<!--                    <small>Written in minor.html file.</small>-->
                        </div>

            </div>
        </div>
    </div>



<?php include(FOOTER) ?>

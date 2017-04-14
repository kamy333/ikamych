<?php require_once('../includes/initialize.php'); ?>

<!---->

<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>


<?php include_once(HEADER) ?>
<?php include_once(SIDEBAR) ?>
<?php include_once(NAV) ?>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Welcome in public page <?php echo $logo?>
                    </h1>
                    <small>
                        My World is now in web development and design!
                        <?php echo $user->full_name();
                        echo $user->user_type; //var_dump($user);?>

                        yo!
                        
                        <span><img alt="image" class=""  style='width:2em;height:2em;' src="<?php echo $path;?>img/admin.jpg" /></span>
                    </small>
                </div>
            </div>
        </div>
    </div>



<?php include_once(FOOTER) ?>
<?php //include(SITE_ROOT.DS.'Inspinia'.DS.'layouts'.DS."footer.php") ?>



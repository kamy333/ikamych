<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>

<?php if(User::is_employee()){ redirect_to('index.php');}?>


<?php $layout_context = "admin"; ?>
<?php $active_menu="admin"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>


<?php




?>


<h4 class="text-center"><mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Form modele using class</a> </mark></h4>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">


    <div class ="background_light_blue">


        <form name="form_client"  class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

            <fieldset id="login" title="Client">
                <legend class="text-center" style="color: #0000ff">Client</legend>



                <?php


            $class_name="Client";

                $class_name::get_form('liste_rank');
                $class_name::get_form('pseudo','kamy');
                $class_name::get_form('img');


                ?>

                <input type="file" name="img">

            </fieldset>



            <div class="col-sm-offset-3 col-sm-7 col-xs-3">
                <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
            </div>

            <div class="text-right " >
                <a href="manage_client.php" class="btn btn-info " role="button">Cancel</a>
            </div>



        </form>
    </div>
</div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

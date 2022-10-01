<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>



<?php

?>
<p id="side-menu"></p>

<div class="wrapper wrapper-content">
    <div class="row">
        <?php echo gallery_button();?>

        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <h2>Family<span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span> </h2>
                    <p>

                        <?php echo blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery("Famille/Famille 1","Kamy Bar Mitzvah",$folder_project_name)); ?>
                        <?php echo blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery("Famille/MichaelBarMitzvah","Michael Bar Mitzvah",$folder_project_name)); ?>
                        <?php echo blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery("Famille/Famille 2","Familly",$folder_project_name)); ?>
                        <?php echo blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery("Famille/Maman Bozorgue","Maman Bozorgue",$folder_project_name)); ?>


                    <?php echo blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery("FamillyCaroline","Familly Caroline",$folder_project_name)); ?>




                </div>
                </div>

           




                
                <div class="row">

                <div class="ibox-content">




                </div>

            </div>
        </div>

    </div>
</div>

<?php include(FOOTER_PUBLIC) ;?>
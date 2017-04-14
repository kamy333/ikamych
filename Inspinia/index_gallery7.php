<?php require_once('../includes/initialize.php'); ?>
<?php //$bralia=User::find_by_id(28); ?>

<?php //if( $bralia->id===28 || User::is_kamy()){} else { redirect_to('admin/login.php');} ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>
    <!--<p id="side-menu"></p>-->
<?php echo gallery_button();?>
    <div class="wrapper wrapper-content">

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="ibox float-e-margins" ">
                    <div class="ibox-content">
                        <p class="text-justify"><?php// echo str_repeat("&nbsp;", 15); ?>
                         Beloved Mamam Bozorgue </p>
                        <iframe src="https://drive.google.com/file/d/0B71yHaesAeDTSlZndjRCdWxIQ1U/preview" width="640" height="480"></iframe>
                    </div>
                </div>
            </div>
<!--        </div>-->

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="ibox float-e-margins" ">
                <div class="ibox-content">
                    <p class="text-justify"><?php// echo str_repeat("&nbsp;", 15); ?>
                        Commemoration Maman Bozorgue </p>
                    <iframe src="https://drive.google.com/file/d/0B71yHaesAeDTNUltdUtwUGJXM0U/preview" width="640" height="480"></iframe>
                </div>
            </div>
        </div>

            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>Maman Bozorgue<span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span> </h2>
                        <blockquote>I had so much love for Maman Bozorgue. She didn't have an inch of evil in her. She was a saint and when I seek comfort I think of her and my heart is filled with warmth.</blockquote>


                            <?php
                            $h2="Maman";
                            $fol="Famille/Maman Bozorgue";
                            echo blueimp_wrapper($h2,blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,$h2,$folder_project_name))); ?>








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
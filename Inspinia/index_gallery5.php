<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>
    <!--<p id="side-menu"></p>-->
<?php echo gallery_button();?>
    <div class="wrapper wrapper-content">
        <div class="row">


            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>Friends<span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span> </h2>
                        <blockquote>En souvenir de Dan z''l décédé dans un accident durant son service militaire dans Tzahal. Il a donné sa vie pour son amour pour Israel et Arielle z''l suite à un accident de la route.</blockquote>


                            <?php
                            $h2="Lycee français de Jerusalem";
                            $fol="LyceeJerusalem";
                            echo blueimp_wrapper($h2,blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,$h2,$folder_project_name))); ?>

<!--                            --><?php
//                            $h2="Adrian Federica Liam Birth";
//                            $fol="Friends/Adrian_connor";
//                            echo blueimp_wrapper($h2,blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,$h2,$folder_project_name)));
//                            ?>
<!---->
<!--                            --><?php
//                            $h2="Xavier and Open";
//                            $fol="Friends/Xavier Open";
//                            echo  blueimp_wrapper($h2, blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,$h2,$folder_project_name)));
                            ?>

<!--                            --><?php
//                            $h2="Friends";
//                            $fol="Friends";
//                            echo blueimp_wrapper($h2, blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,"Others",$folder_project_name)));
//                            ?>





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
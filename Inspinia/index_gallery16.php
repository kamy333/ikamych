<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>
    <p id="side-menu"></p>

    <div class="wrapper wrapper-content">
        <div class="row">
            <?php echo gallery_button();

            ?>


            <div class="row">

                <div class="col-lg-7 col-lg-offset-3 ">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                            <div class="carousel slide" id="carousel3">
                                <div class="carousel-inner">

                                    <div class="item active">
                                        <img alt="image" class="img-responsive"
                                             src="img/DesireeBabyShower/2018-11-18_20-51-47-0000.png">
                                    </div>


                                    <?php echo get_picture_folder_bootstrap_gallery("DesireeBabyShower", "Desiree Baby Shower", $folder_project_name, true) ?>

                                </div>
                                <a data-slide="prev" href="#carousel3" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel3" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>Desiree Baby Shower<span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span>
                        </h2>
                        <p>

                            <?php

                            echo blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery("DesireeBabyShower", "Desiree Baby Shower $a", $folder_project_name)); ?>

                    </div>
                </div>


            </div>

        </div>
    </div>

<?php include(FOOTER_PUBLIC); ?>
<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php echo gallery_button();?>
    <div class="row">



        <div class="pull-right">
            <p>Music here!</p>
            <audio controls>
                <!--                <source src="horse.ogg" type="audio/ogg">-->
                <source src="img/audio/SomewhereOvertheRainbow.mp3" type="audio/mpeg">
                <source src="img/audio/ArmikLagrimasDeGuitarra.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <audio controls >
                <!--                <source src="horse.ogg" type="audio/ogg">-->
                <source src="img/audio/ArmikLagrimasDeGuitarra.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>



    <div class="wrapper wrapper-content">
        <div class="container">





            <div class="row">
                <div class="col-lg-12 ">
                    <div class="ibox float-e-margins" ">
                    <div class="ibox-content">

                        <div class="col-md-4">

                        <div class="fb-video"
                             data-href="https://www.facebook.com/albert.tabibian/videos/vb.1270734952/10206162000150236/?type=2&amp;theater" data-width="500" data-show-text="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/albert.tabibian/videos/10206162000150236/"><a href="https://www.facebook.com/albert.tabibian/videos/10206162000150236/">Captured by Albert Tabibian</a><p></p>Posted by <a href="#" role="button">Albert Tabibian</a> on Tuesday, April 19, 2016</blockquote></div></div>
                    </div>


                    </div>
                </div>
            </div>
        </div>




    <div class="row">


        <div class="col-lg-4 ">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="carousel slide" id="carousel1">
                        <div class="carousel-inner">

                            <div class="item active">
                                <img alt="image"  class="img-responsive" src="img/DesireeWedding/Chupah1.jpg">
                            </div>



                            <?php echo get_picture_folder_bootstrap_gallery("DesireeWedding","Engagement",$folder_project_name) ?>


                            <div class="item">
                                <img alt="image" class="img-responsive" src="img/kamy.jpg">
                            </div>

                            <div class="item">
                                <img alt="image"  class="img-responsive" src="img/admin.jpg">
                            </div>

                        </div>
                        <a data-slide="prev" href="#carousel1" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel1" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <!--                <div class="row">-->
        <div class="col-lg-4 ">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="carousel slide" id="carousel2">
                        <div class="carousel-inner">

                            <div class="item active">
                                <img alt="image"  class="img-responsive" src="img/Famille/EngagementMamanPapa.jpg">
                            </div>


                            <?php echo get_picture_folder_bootstrap_gallery("Famille","Famille",$folder_project_name,true) ?>

                        </div>
                        <a data-slide="prev" href="#carousel2" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel2" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </div>

    </div>


<?php include(FOOTER_PUBLIC) ;?>
<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>
<?php echo gallery_button();?>
    <div class="row">

        <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">


            <?php
            //          $text = "<a href='#'></a>";
            $text .= "<p>Je t'aime dans le temps. Je t'aimerai jusqu'au bout du temps. Et quand le temps sera écoulé, alors, je t'aurai aimée. Et rien de cet amour, comme rien de ce qui a été, ne pourra jamais être effacé.<p>
	<div class='pull-right'><p>Jean d'Ormesson <small>(16 juin 1925 - 5 décembre 2017)</small></p>
		<small><i>-Un jour je m'en irai sans avoir tout dit.</i></small></div>";
            echo "" . $text . "<hr>";
            ?>
        </div>

        <div class="pull-right">
            <p class="text-center">Music here!</p>
            <audio controls>
                <source src="img/audio/SomewhereOvertheRainbow.mp3" type="audio/mpeg">
                <source src="img/audio/ArmikLagrimasDeGuitarra.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <audio controls >
                <source src="img/audio/ArmikLagrimasDeGuitarra.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>



    <div class="wrapper wrapper-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-1">
                    <div class="ibox float-e-margins" ">
                    <div class="ibox-content">
                        <div class="col-md-5">
                            <p class="text-justify">
                                Full Wedding Part1</p>
                            <iframe src="https://drive.google.com/file/d/0B71yHaesAeDTend4empIc0VIQXc/preview" width="320" height="240"></iframe>
                        </div>


                            <div class="col-md-5">
                                <p class="text-justify">
                                    Full Wedding Part2</p>
                                <iframe src="https://drive.google.com/file/d/0B71yHaesAeDTSmJxbGluTktGUHc/preview" width="320" height="240"></iframe>
                            </div>

                        </div>


                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col-lg-12 ">
                    <div class="ibox float-e-margins" ">
                    <div class="ibox-content">
                        <p class="text-justify">
                            Summary Wedding</p>
                        <div class="fb-video" data-href="https://www.facebook.com/albert.tabibian/videos/vb.1270734952/10206162000150236/?type=2&amp;theater" data-width="5000" data-show-text="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/albert.tabibian/videos/10206162000150236/"><a href="https://www.facebook.com/albert.tabibian/videos/10206162000150236/">Captured by Albert Tabibian</a><p></p>Posted by <a href="#" role="button">Albert Tabibian</a> on Tuesday, April 19, 2016</blockquote></div></div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12  ">
                <div class="ibox float-e-margins" ">
                <div class="ibox-content">

                    <!--                    <div class="fb-video" data-href="https://www.facebook.com/TheFeverEvent/videos/220888771587991/?pnref=story" data-width="500" data-show-text="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/TheFeverEvent/videos/220888771587991/"><a href="https://www.facebook.com/TheFeverEvent/videos/220888771587991/"></a><p>Tom Browne - Funkin&#039; For Jamaica (1980)</p>Posted by <a href="https://www.facebook.com/TheFeverEvent/">The Fever</a> on Friday, February 12, 2016</blockquote></div></div>-->

                    <div class="fb-video col-md-offset-1" data-href="https://www.facebook.com/TheFeverEvent/videos/219946731682195/?pnref=story" data-width="500" data-show-text="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/TheFeverEvent/videos/219946731682195/?pnref=story"><a href="https://www.facebook.com/TheFeverEvent/videos/219946731682195/?pnref=story"></a><p>Alex Green</p>Posted by <a href="https://www.facebook.com/TheFeverEvent/">The Fever</a> on Friday, October 28, 2016</blockquote></div></div>



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
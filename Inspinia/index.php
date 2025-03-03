<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>
<?php echo gallery_button(); ?>
    <div class="pull-right">
        <p class="text-center" style="font-size:1em">Music here!</p>
        <audio controls>
            <source src="img/audio/SomewhereOvertheRainbow.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <audio controls>
            <source src="img/audio/ArmikLagrimasDeGuitarra.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <audio controls>
            <source src="img/Xavier/Rise Up - Andra Day (Cover).mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

    <div class="row">
    <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">
            <h1 class="text-center"><a href="papa/francais_discours.php">Hommage à Papa</a></h1>
    </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">
            <?php
            $text = "";
            $text .= "<p>Je t'aime dans le temps. Je t'aimerai jusqu'au bout du temps. Et quand le temps sera écoulé,     alors, je t'aurai aimée. Et rien de cet amour, comme rien de ce qui a été, ne pourra jamais être effacé.<p>
	<div class='pull-right'><p><strong>Jean d'Ormesson</strong> <small>(16 juin 1925 - 5 décembre 2017)</small></p>
		<small><i>-Un jour je m'en irai sans avoir tout dit.</i></small></div>";
            echo "" . $text;
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">
            <?php
            //          $text = "<a href='#'></a>";
            $text = "<br><p> <br>
        Ce n’est qu’un moment..<br>
        
        Je t'en prie mon amour ne pleure pas<br>
        Ce n'est qu'un moment<br>
        Plus jamais je ne pourrais te dire bonne nuit<br>
        Parce que je suis sur le point d'aller vers la lumière éternelle<br>
        Ce n’est qu’un moment chéri juste un moment.<br>
        Tes peines s'estomperont dans le sentiment des étoiles<br>
        Soit serein chéri ce n'est qu'un moment<br>
        Mais après éternellement tu ressentiras l'amour<br>
        Et en m’attendant tu souriras au soleil pour transformer mes larmes en sourire et en bonheur</p>
            <div class='pull-right'><p><strong>Franseca Barzaghi Bassi</strong></p></div>";
            echo "" . $text;

            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">
            <?php
            //          $text = "<a href='#'></a>";
            $text = "<p>
J’imagine qu’une des raisons pour lesquelles les gens s’accrochent à leurs haines avec tellement d’obstination, est qu’ils sentent qu’une fois la haine partie, ils devront affronter leurs souffrances.<p>
	<div class='pull-right'><p><strong>James Baldwin</strong></p>
	</div>";
            echo "" . $text;

            ?>
        </div>
    </div>

<?php


if (User::is_kamy()) {
    $text1 .= "<div class='row text-center'>";
    $text1 .= "<div class='col-lg-8 col-lg-offset-2' style='margin-top: 2em;padding: 2em;background-color: white'>";
    $text1 .= "<p>in fonding memory</p>";
    $text1 .= "<p>Maman Bozorgue z'l 17.04.2011 | Xavier Raisin Dadre 01.01.2023 | Katy Samak | Farad Lavi | Maggy Herzet | Dahidjan Ezatollah 10.10.2020 | Dahidjan Ramatollah | Baba Bozorgue | Maman Bozorgue Motaram | Mr. Mme Manaz Sadigh 23.6.2020 | khaleh Aghdass | Dahidjan 3 | Amouh Aziz </p>";
    echo "" . $text1;// . "<hr>";
    $text1 .= "</div>";
    $text1 .= "</div>";
}

?>


    <div class="wrapper wrapper-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-1">
                    <div class="ibox float-e-margins"
                    ">
                    <div class="ibox-content">
                        <div class="col-md-5">
                            <p class="text-justify">
                                Full Wedding Part1</p>
                            <iframe src="https://drive.google.com/file/d/0B71yHaesAeDTend4empIc0VIQXc/preview"
                                    width="320" height="240"></iframe>
                        </div>




                        <div class="col-md-5">
                            <p class="text-justify">
                                Full Wedding Part2</p>
                            <iframe src="https://drive.google.com/file/d/0B71yHaesAeDTSmJxbGluTktGUHc/preview"
                                    width="320" height="240"></iframe>
                        </div>

                    </div>


                </div>
            </div>


        </div>

        <!--        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FDailyViralStories%2Fvideos%2F1688674661198638%2F&show_text=1&width=476" width="476" height="593" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>-->
        <!--        -->


        <div class="row">
            <div class="col-lg-12 ">
                <div class="ibox float-e-margins"
                ">
                <div class="ibox-content">
                    <p class="text-justify">
                        Summary Wedding</p>
                    <div class="fb-video"
                         data-href="https://www.facebook.com/albert.tabibian/videos/vb.1270734952/10206162000150236/?type=2&amp;theater"
                         data-width="5000" data-show-text="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/albert.tabibian/videos/10206162000150236/"><a
                                        href="https://www.facebook.com/albert.tabibian/videos/10206162000150236/">Captured
                                    by Albert Tabibian</a>
                                <p></p>Posted by <a href="#" role="button">Albert Tabibian</a> on Tuesday, April 19,
                                2016
                            </blockquote>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12  ">
            <div class="ibox float-e-margins"
            ">
            <div class="ibox-content">


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
                                <img alt="image" class="img-responsive" src="img/DesireeWedding/Chupah1.jpg">
                            </div>


                            <?php echo get_picture_folder_bootstrap_gallery("DesireeWedding", "Engagement", $folder_project_name) ?>


                            <div class="item">
                                <img alt="image" class="img-responsive" src="img/kamy.jpg">
                            </div>

                            <div class="item">
                                <img alt="image" class="img-responsive" src="img/admin.jpg">
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
                                <img alt="image" class="img-responsive" src="img/Famille/EngagementMamanPapa.jpg">
                            </div>


                            <?php echo get_picture_folder_bootstrap_gallery("Famille", "Famille", $folder_project_name, true) ?>

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


        <div class="col-lg-4 ">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="carousel slide" id="carousel3">
                        <div class="carousel-inner">

                            <div class="item active">
                                <img alt="image" class="img-responsive" src="img/Famille/EngagementMamanPapa.jpg">
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


    <!--    </div>-->
    <!---->
    <!--    </div>-->


<?php include(FOOTER_PUBLIC); ?>
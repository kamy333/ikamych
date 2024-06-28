<?php require_once('../includes/initialize.php'); ?>
<?php //$bralia=User::find_by_id($session->user_id); ?>

<?php //if( User::is_bralia()){} else { redirect_to('admin/login.php');} ?>

<?php
function getfiles($path, $filename_no_ext, $alt, $txt = "")
{
    $doc = $path . $filename_no_ext . ".pdf";
    $jpg = $path . $filename_no_ext . ".jpg";
    $output = "<div class=\"col-lg-2\">";
    $output .= "<h5 CLASS='text-center p-md'><a target='_blank' href=\"$doc\">$txt</a></h5>";
    $output .= "<div class=\"col-lg-2\  text-center p-md\">";
    $output .= "<a  target='_blank' href=\"$doc\"><img alt=\"$alt\" src=\" $jpg\"
                                   style='width: 10em;height: 10em'></a>";
    $output .= "</div>";
    $output .= "</div>";
    return $output;

}

function getAudios($filename = "", $title = "")
{

//    $filename="img/Xavier/mp3/1.mp3";
//    $title="xxxx";

    $output = "";
    $output .= "";

    $audio = "
    <audio controls>
    <source src='$filename' type='audio/mpeg'>
        Your browser does not support the audio element.
     </audio>";

    $output .= "<div class='col-md-3'>
                    <h4 style='color: lightgreen'>$title</h4>
                    $audio
              </div>";

    return $output;
}

function iframe_google($src, $title)
{

    $output =
        "<div class='col-md-3'>
                            <p class='text-justify'>$title</p>
                            <iframe src='$src/preview' width='300' height='240'></iframe>
                          </div>";

    return $output;
}

?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <?php echo gallery_button(); ?>
            <div class="ibox-content text-center p-md">

                <div class=" text-center p-md">
                    <div class="col-lg-4">
                        <a target='_blank' href="https://www.ikamy.ch/Inspinia/img/Xavier/0002_xavier.jpg"><img
                                    alt="xavier Xavier" src='https://www.ikamy.ch/Inspinia/img/Xavier/0002_xavier.jpg'
                                    style='width: 25em;height: 30em'></a>
                    </div>

                    <div class="col-lg-4">
                        <h1>
                            <button class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa-heart"></i>
                            </button>

                            <div>
                                Notre très cher ami Xavier<br>
                                On ne t'oubliera jamais
                            </div>

                            <br>
                            <?php
                            $filename = "img/Xavier/mp3/Rise Up - Andra Day (Cover).mp3";
                            $title = "Rise Up";
                            echo getAudios($filename, $title)

                            ?>


                        </h1>
                    </div>
                </div>

                <div class="row" style="margin-top: 2em">
                    <a target='_blank' href="https://www.ikamy.ch/Inspinia/img/Xavier/0001_xavier.jpg"><img
                                alt="xavier Xavier" src='https://www.ikamy.ch/Inspinia/img/Xavier/0001_xavier.jpg'
                                style='width: 30em;height: 30em'></a>
                </div>


                <div class="row" style="margin-top: 2.2em">


                    <?php
                    $filename = "img/Xavier/mp3/1.mp3";
                    $title = "OM MANI PADME HUM";
                    echo getAudios($filename, $title);

                    $filename = "img/Xavier/mp3/2.mp3";
                    $title = "OM AMIDEVA HRI";
                    echo getAudios($filename, $title);

                    $filename = "img/Xavier/mp3/3.mp3";
                    $title = "AMAZING GRACE";
                    echo getAudios($filename, $title);

                    $filename = "img/Xavier/mp3/4.mp3";
                    $title = "CORNEMUSE";
                    echo getAudios($filename, $title);

                    ?>
                </div>
            </div>


            <div class="row" style="margin-top: 5em">
                <div class="col-lg-12">
                    <?php
                    $path = "https://www.ikamy.ch/Inspinia/img/Xavier/doc/";
                    $filename_no_ext = "004_Temoignage de Didier lu lors de la ceremonie du 03.01.2023";
                    $alt = "Temoignage de Didier";
                    $txt = $alt;
                    echo getfiles($path, $filename_no_ext, $alt, $txt);

                    $filename_no_ext = "001_detail_ceremonie _en_memoire_de_Xavier_ 03.01.2023";
                    $alt = "Detail ceremonie en memoire de Xavier 03.01.2023.";
                    $txt = " Texte Cérémonie";
                    echo getfiles($path, $filename_no_ext, $alt, $txt);

                    $filename_no_ext = "002_le_voilier";
                    $alt = "Le Volier (William Blake)";
                    $txt = "Le Volier (William Blake)";
                    echo getfiles($path, $filename_no_ext, $alt, $txt);

                    $filename_no_ext = "003_pour_Xavier_texte_de_Patrick";
                    $alt = "Texte de Patrick pour Xavier";
                    $txt = $alt;
                    echo getfiles($path, $filename_no_ext, $alt, $txt);

                    $filename_no_ext = "005_Katia_mot_fb";
                    $alt = "Texte de Katia";
                    $txt = $alt;
                    echo getfiles($path, $filename_no_ext, $alt, $txt);

                    $filename_no_ext = "006_texte_alex_fb";
                    $alt = "Texte d'Alex FB";
                    $txt = $alt;
                    echo getfiles($path, $filename_no_ext, $alt, $txt);

                    ?>


                </div>
            </div>

            <div class="row" style="margin-top: 5em">
                <div class="col-lg-12">
                    <?php
                    $h2 = "Xavier";
                    $fol = "Xavier";
                    echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name))); ?>
                </div>
            </div>

            <div class="row" style="margin-top: 5em">
                <div class="col-lg-12">
                    <div class="ibox collapsed">
                        <div class="ibox-title">
                            <h5> Lyrics Rise Up</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row" style="margin-top: 2em">

                                <div class="col-lg-12" style="alignment: center">
                                    <iframe width="560" height="315"
                                            src="https://www.youtube.com/embed/lwgr_IMeEgA?start=40"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 2em">
                                <div class="col-lg-3">
                                                        <pre>
    Lyrics
    You're broken down and tired
    Of living life on a merry go round
    And you can't find the fighter
    But I see it in you so we gonna walk it out
    And move mountains
    We gonna walk it out
    And move mountains
    And I'll rise up
    I'll rise like the day
    I'll rise up
    I'll rise unafraid
    I'll rise up
    And I'll do it a thousand times again
    And I'll rise up

                                </pre>
                                </div>
                                <div class="col-lg-3">
                                 <pre>
    High like the waves
    I'll rise up
    In spite of the ache
    I'll rise up
    And I'll do it a thousand times again
    For you
    For you
    For you
    For you
    When the silence isn't quiet
    And it feels like it's getting hard to breathe
    And I know you feel like dying
    But I promise we'll take the world to its feet
    And move mountains
    Bring it to its feet
    And move mountains
    And I'll rise up
                                </pre>
                                </div>
                                <div class="col-lg-3">
                                                        <pre>
    I'll rise like the day
    I'll rise up
    I'll rise unafraid
    I'll rise up
    And I'll do it a thousand times again
    For you
    For you
    For you
    For you
    All we need, all we need is hope
    And for that we have each other
    And for that we have each other
    And we will rise
    We will rise
    We'll rise, oh, oh
    We'll rise

                                </pre>
                                </div>
                                <div class="col-lg-3">
                                                        <pre>
    I'll rise up
    Rise like the day
    I'll rise up
    In spite of the ache
    I will rise a thousand times again
    And we'll rise up
    High like the waves
    We'll rise up
    In spite of the ache
    We'll rise up
    And we'll do it a thousand times again
    For you
    For you
    For you
    For you
    Ah, ah, ah, ah

                                </pre>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 2em;margin-left: 2em">
                <div class="col-lg-12">
                    <?php
                    $src = "https://drive.google.com/file/d/18FPR6Bfh1lQY6nav3SUtnzMUbvYpyIU4";
                    $title = "Xavier Alex Kamy Kunga";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/129aFaj7RIdiLT-CPKbIvSiaS7CMQyNcp";
                    $title = "Xavier Alex Kamy Kunga";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/1dtMS1BMI81Mn3w7rzC2LJxmdU56Zz4tP";
                    $title = "";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/1IVexjKEcSy8H3guvG__TCa7WSaHr6oii";
                    $title = "";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/1cAtYudwFYBJCrfRoTrgcFx_EZP6_gdbn";
                    $title = "";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/1y4ISD1cnFF9w7FTyn9T7gK2k8XfrONkJ";
                    $title = "";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/1qnS4xJT9BiQQ9DaR4jVxF-tlbsq8VJkM";
                    $title = "";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/1Pq_P282ERBf8aZmLZ37-gDDiEkhaSr_B";
                    $title = "";
                    echo iframe_google($src, $title);

                    $src = "https://drive.google.com/file/d/1FqugXehiUaAmO-8rJAM7mqq7oAsoY4Aq";
                    $title = "";
                    echo iframe_google($src, $title);
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!--</div>-->


<?php include(FOOTER_PUBLIC); ?>

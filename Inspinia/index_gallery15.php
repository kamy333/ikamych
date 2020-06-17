<?php require_once('../includes/initialize.php'); ?>
<?php //$bralia=User::find_by_id($session->user_id); ?>

<?php if (User::is_djamila()) {
} else {
    redirect_to('admin/login.php');
} ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>

<?php echo gallery_button(); ?>

    <h1>Helicopter</h1>

    <div class="wrapper wrapper-content">

        <div class="row">

            <a href="http://passeportpourlemploi.com/entreprendre/Vid0807-faire-naitre-son-idee" class="">passeportpourlemploi.com/entreprendre/Vid0807-faire-naitre-son-idee</a>

        </div>

        <div class="row">


            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">
                        <?php $h2 = "Djamila Hélico 21-03-2019";
                        $fol = "Djamila/2019_03_21";

                        echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name))); ?>
                    </div>

                    <div class="ibox-content">
                        <?php $h2 = "Djamila bébé";
                        $fol = "Djamila/baby";

                        echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name))); ?>
                    </div>

                    <div class="ibox-content">

                        <h2>
                            With Djamila :)<span class="pull-right"> <a href="index.php"
                                                                        class="btn btn-primary">back Home</a></span>
                        </h2>
                        <blockquote></blockquote>


                        <?php
                        $h2 = "Anniversaire Djamila 2-2-2018";
                        $fol = "Djamila/2018_02_02";
                        echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name))); ?>

                    </div>

                </div>
                <div class="ibox-content">
                    <?php $h2 = "Djamila Kamran 23-02-2018";
                    $fol = "Djamila/2018_02_23";

                    echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name))); ?>
                </div>

                <div class="ibox-content">
                    <?php $h2 = "Djamila saut parachute 24-04-2018";
                    $fol = "Djamila/2018_04_24";

                    echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name))); ?>
                </div>

                <div class="ibox-content">
                    <?php $h2 = "Djamila Chaussure 17-06-2018";
                    $fol = "Djamila/2018_06_17";

                    echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name)));
                    $h2 = ""; ?>
                </div>

                <div class="ibox-content">
                    <?php $h2 = "Djamila Hélico 09-10-2018";
                    $fol = "Djamila/2018_10_09";

                    echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name)));
                    $h2 = ""; ?>
                </div>


                <?php


                function DjamilaComment($comments_array = array(), $img_folder = 'public')
                {

                    $picture = get_picture_array($img_folder);

                    $array_cut = array(0, 8);
                    $output = "";
//    $output="<div class='row'>";
//    $output.="    <div class=\"ibox-content\">";

                    $i = 0;
                    $j = 0;
                    foreach ($comments_array as $comment) {
                        $i++;

                        if (in_array($j, $array_cut)) {

                            $output .= "<div class='row'>";
                        }

                        $caption = $picture[$j]['img_name'];
                        $caption = trim(substr($caption, 3, 100));
                        $caption = str_replace("_", " ", $caption);
                        $caption = ucfirst($caption);

                        $exp_comment = substr($comment, 0, 25) . "...";

                        $footer = "Photos ($i) " . $picture[$j]['img_file'];

                        $output .= "<div class=\"col-sm-6 col-md-3\">";
                        $output .= "<div class='thumbnail'>";
                        $output .= $picture[$j]['img_tag'];
                        $output .= "<div class=\"caption\">";
                        $output .= "<h3>" . $caption . "</h3>";
                        $output .= "<blockquote><b>Bralia:</b> $exp_comment</blockquote> <small>$footer</small> ";


                        $output .= "                    </div>
                        </div>
                    </div>
                ";

                        if (in_array($j, $array_cut)) {
                            $output .= "</div>";
                        }


                        $j++;

                    }
//    $output.="</div>";
//    $output.="</div>";
//    $output.="</div>";
                    return $output;

                }


                function ThumbnailModal($comments_array = array(), $img_folder = 'public')
                {
                    $picture = get_picture_array($img_folder);


                    $output = "<div class=\"row\">";
                    $output .= "<ul>";
                    $i = 0;
                    $j = 0;
                    foreach ($comments_array as $comment) {
                        $i++;
                        $caption = $picture[$j]['img_name'];
                        $caption = trim(substr($caption, 3, 100));
                        $caption = str_replace("_", " ", $caption);
                        $caption = ucfirst($caption);


                        $exp_comment = substr($comment, 0, 40) . "...";


                        $output .= "<li class=\"thumbnail col-sm-3 col-xs-6 \">";
                        $output .= "<a href=\"#";
                        $output .= $picture[$j]['img_name'];
                        $output .= "\" ";
                        $output .= "data-toggle=\"modal\">";
                        $output .= "";
                        $output .= $picture[$j]['img_tag'];
                        $output .= "</a>";
                        $output .= "<div class=\"caption\">";
                        $output .= "<h3>$caption</h3>";
                        $output .= "<p>$exp_comment</p>";
                        $output .= "<p><a href=\"#";
                        $output .= $picture[$j]['img_name'];
                        $output .= "\" ";
                        $output .= "data-toggle=\"modal\" class=\"btn btn-primary btn-outline btn-rounded  btn-xs\" role=\"button\">";
                        $output .= "Lire plus";
                        $output .= "</a>";
                        $output .= "</p>";
                        $output .= "</div>";
                        $output .= "</li>";
//        $output.="<br>";

                        $j++;
                    }
                    $output .= "</ul>";
                    $output .= "</div>";

//    modal part
                    $i = 0;
                    $j = 0;
                    foreach ($comments_array as $comment) {
                        $i++;
                        $caption = $picture[$j]['img_name'];
                        $caption = trim(substr($caption, 3, 100));
                        $caption = str_replace("_", " ", $caption);
                        $caption = ucfirst($caption);

//        $exp_comment=substr($comment,0,25)."...";

                        $output .= "<div ";
                        $output .= "id=\"";
                        $output .= $picture[$j]['img_name'];
                        $output .= "\" ";
                        $output .= " class=\"modal fade\" tabindex=\"-1\">";
                        $output .= "<div class=\"modal-dialog\">";
                        $output .= "<div class=\"modal-content\">";
                        $output .= "<div class=\"modal-header\">";
                        $output .= "<button type=\"button\" class=\"close glyphicon glyphicon-remove\" data-dismiss=\"modal\"></button>";

                        $output .= "<h3 class=\"modal-title\">";
                        $output .= $caption;
                        $output .= "</h3>";
                        $output .= "</div>";
                        $output .= "<div class=\"modal-body\">";
                        $output .= "<p>";
                        $output .= $picture[$j]['img_src'];
                        $output .= $comment;
                        $output .= "</p>";
                        $output .= "</div>";
                        $output .= "<div class='modal-footer'>";
                        $output .= "<button class='btn btn-primary' data-dismiss='modal'>Close</button>";
                        $output .= "</div>";
                        $output .= "</div>";
                        $output .= "</div>";
                        $output .= "</div>";
//        $output.="<br>";
                        $output .= "";
                        $output .= "";
                        $output .= "";
                        $output .= "";
                        $output .= "";
                        $output .= "";
                        $output .= "";

                        $j++;
                    }


                    return $output;

                }


                echo "<h2>$h2</h2>";
                $comments = array();

                echo ThumbnailModal($comments, $fol);


                ?>

            </div>

        </div>
    </div>

<?php include(FOOTER_PUBLIC); ?>
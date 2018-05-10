<?php require_once('../includes/initialize.php'); ?>
<?php //$bralia=User::find_by_id($session->user_id); ?>


<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>

<?php echo gallery_button(); ?>
    <div class="wrapper wrapper-content">
    <div class="row">


        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <h2>
                        <!--                            <button class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa-heart"></i></button>-->
                        With Marco :)<span class="pull-right"> <a href="index.php"
                                                                  class="btn btn-primary">back Home</a></span></h2>
                    <blockquote></blockquote>


                    <?php
                    $h2 = "Marco Kamy";
                    $fol = "Marco";
                    echo blueimp_wrapper($h2, blueimp_lightBoxGallery(get_picture_folder_blueimp_gallery($fol, $h2, $folder_project_name))); ?>

                </div>
            </div>
            <div class="ibox-content">


                <?php


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


                //                echo "<h2>$h2</h2>";
                $comments = array();

                echo ThumbnailModal($comments, $fol);


                ?>

            </div>

        </div>
    </div>

<?php include(FOOTER_PUBLIC); ?>
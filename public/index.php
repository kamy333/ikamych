<?php require_once('../includes/initialize.php'); ?>
<?php
if (User::is_visitor()) {
    redirect_to('/Inspinia/index.php');
}

?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "home"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php

class Helper
{

    static function getImgSize($image, $case)
    {
        if (is_file($image)) {
            $size = getimagesize($image);
            return $size[$case];
        }

    }
}

$img_folder = "DesireeWedding";
$dir = SITE_ROOT . DS . 'public' . DS . "/img/" . $img_folder;
$image = $dir . '/Desiree_entry.jpg';

$w = 720;
$h = 460;

$width = Helper::getImgSize($image, 0);
$width = $width > $w ? $w : $width;


$height = Helper::getImgSize($image, 1);
$height = $height > $h ? $h : $height;

$pic_size = " width = '$width' height = '$height' ";

//
//$img_folder = "DesireeWedding";
//$dir = SITE_ROOT . DS . 'public' . DS . "/img/" . $img_folder;
//$filename=$dir.'/Desiree_entry.jpg';
////$filename=$dir.'/cousins_picture.jpg';
//
//list($width, $height, $type, $attr) = getimagesize($filename);
////echo "<img src='$filename' $attr alt=\"getimagesize() example\" />";
//echo '<pre>';
//print_r(getimagesize($filename));
//echo '</pre>';


$folders = array(
    "img/DesireeWedding/",
    "img/Kamy/",
    "img/DesireeWedding/Before/",
);

$photos = array(
    $folders[0] => "CarolineFeredoun.jpg",
    $folders[0] => "Chupah1.jpg",
);

$count = 0;

$img_folder = "DesireeWedding";
$dir = SITE_ROOT . DS . 'public' . DS . "/img/" . $img_folder;
$output = "";
if (is_dir($dir)) {
    $dir_array = scandir($dir);
    shuffle($dir_array);
    foreach ($dir_array as $file) {
        if (stripos($file, '.') > 0) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
                list($width, $height, $type, $attr) = getimagesize($file);
//                if ($width)
                $count++;
                $output .= " <div class='item '>";
                $output .= "<img $pic_size src='img/$img_folder/{$file}' alt='{$file}'  >";
                $output .= "<div class=\"carousel-caption\"></div>";
                $output .= "</div>";
            }
        }
    }
}


$img_folder = "Kamy";
$dir = SITE_ROOT . DS . 'public' . DS . "/img/" . $img_folder;
if (is_dir($dir)) {
    $dir_array = scandir($dir);
    shuffle($dir_array);
    foreach ($dir_array as $file) {
        if (stripos($file, '.') > 0) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
                list($width, $height, $type, $attr) = getimagesize($file);

                $count++;
                $output .= " <div class='item '>";
//                $output .= "<img src='img/$img_folder/{$file}' alt='{$file}' style='width: 100%;height: 100%' >";
                $output .= "<img $pic_size src='img/$img_folder/{$file}' alt='{$file}'  >";
                $output .= "<div class=\"carousel-caption\"></div>";
                $output .= "</div>";
            }
        }
    }
}


?>


<h1 class="text-center">Welcome to <?php echo $logo ?></h1>

<?php

?>

<div class="col-md-6 col-md-offset-3">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <!--        <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->

            <?php
            for ($i = 1; $i <= +$count; $i++) {

                $c = $i;
                echo "<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$c}\"></li>";
            }


            ?>


        </ol>

        <!-- Wrapper for slides -->

        <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em">


            <?php
            //          $text = "<a href='#'></a>";
            $text .= "<p>Je t'aime dans le temps. Je t'aimerai jusqu'au bout du temps. Et quand le temps sera écoulé, alors, je t'aurai aimée. Et rien de cet amour, comme rien de ce qui a été, ne pourra jamais être effacé.<p>
	<div class='pull-right'><p>Jean d'Ormesson <small>(16 juin 1925 - 5 décembre 2017)</small></p>
		<small><i>-Un jour je m'en irai sans avoir tout dit.</i></small></div>";
            echo "" . $text . "<hr>";
            ?>
        </div>


        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <img src="img/DesireeWedding/Chupah1.jpg" <?php echo $pic_size; ?> alt="tr1">
                <div class="carousel-caption">
                </div>
            </div>

            <?php

            echo $output;


            for ($i = 1; $i <= 11; $i++) {

                $output .= "<img $pic_size src='img/$img_folder/{$file}' alt='{$file}'  >";
//            <img src=\"img/Kamy/{$img}\" alt=\"tr1\" style=\"width: 100%;height: 100%\">


                $c = 1556 + $i;
                $img = "EngDesiree_{$c}.JPG";

                echo "        <div class=\"item\">
            <img $pic_size src=\"img/Kamy/{$img}\" alt=\"tr1\" >

            <div class='carousel-caption'>
                Fiançaille de desirée
            </div>
        </div>";

            }


            ?>


        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<hr>
<?php


//$size = getimagesize($filename);
//print_r($size);
//print_r($filename);
//
//$fp = fopen($filename, "rb");
//if ($size && $fp) {
//    header("Content-type: {$size['mime']}");
//    fpassthru($fp);
//    exit;
//} else {
//    // error
//}
?>




<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

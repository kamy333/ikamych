<?php require_once('../includes/initialize.php'); ?>
<?php
if (User::is_visitor() && !User::is_caroline_only()) {
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





<div class="row" >
    <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">
<!--        <h1 class="text-center"><a href="../Inspinia/papa/francais_discours.php">Hommage à mon père</a></h1>-->
        <h1 class="text-center"><a href="../Inspinia/papa/francais_discours.php">Hommage à mon père <br>Shmouel ben Galine-Acher 1932-2025</a></h1>

        <div class="text-center">
            <a href="../Inspinia/papa/francais_discours.php">
                <img class="thumb text-center" src="../Inspinia/papa/assets/img/photos/Photo_2025-03-01_144725.jpg" alt="Papa" style="width:10%;height:10%">
            </a>
            <a href="https://www.instagram.com/reehttps://www.instagram.com/reel/DR2CycnjJwp/?igsh=YzAyMDM1MGJkZA%3D%3Dl/DR2CycnjJwp/?igsh=YzAyMDM1MGJkZA%3D%3D">Music</a>

        </div>
    </div>
</div>

<?php

//class Helper
//{
//
//    static function getImgSize($image, $case)
//    {
//        if (is_file($image)) {
//            $size = getimagesize($image);
//            return $size[$case];
//        }
//
//    }
//}

$img_folder = "DesireeWedding";
$dir = SITE_ROOT . DS . 'public' . DS . "/img/" . $img_folder;
$image = $dir . '/Desiree_entry.jpg';



//$width = Helper::getImgSize($image, 0);
//$width = $width > $w ? $w : $width;


//$height = Helper::getImgSize($image, 1);
//$height = $height > $h ? $h : $height;

$w = 720;
$h = 460;
$width = $w;
$height = $h;
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
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
//                list($width, $height, $type, $attr) = getimagesize($file);
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
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
//                list($width, $height, $type, $attr) = getimagesize($file);

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
            $text = "<p>En tant de crise, les intelligents cherchent des solutions, les imbéciles cherchent des coupables.<p>
	<div class='pull-right'><p><small>- Anonyme</small></p>
		<small><i></i></small></div>";
            echo "" . $text . "<br><hr>";
            ?>

            <?php
            $text = "<p>Je t'aime dans le temps. Je t'aimerai jusqu'au bout du temps. Et quand le temps sera écoulé, alors, je t'aurai aimée. Et rien de cet amour, comme rien de ce qui a été, ne pourra jamais être effacé.<p>
	<div class='pull-right'><p>Jean d'Ormesson <small>(16 juin 1925 - 5 décembre 2017)</small></p>
		<small><i>-Un jour je m'en irai sans avoir tout dit.</i></small></div>";
            echo "" . $text . "<hr>";
            ?>


        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">
                <?php
                //          $text = "<a href='#'></a>";
                $text = "<p>
        <i>Ce n’est qu’un moment..</i><br> <br> 
        
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
	<div class='pull-right'><p>James Baldwin</p>
	</div>";
                echo "" . $text;

                ?>
            </div>
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

<?php require_once('../includes/initialize.php'); ?>
<?php
if(User::is_visitor() ){ redirect_to('/Inspinia/index.php');}

?>

<?php  $layout_context = "public"; ?>
<?php $active_menu="home"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<?php

$folders=array(
   "img/DesireeWedding/",
   "img/Kamy/",
   "img/DesireeWedding/Before/",
);

$photos=array(
    $folders[0]=>"CarolineFeredoun.jpg",
    $folders[0]=>"Chupah1.jpg",


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
                $count++;
                $output .= " <div class='item '>";
                $output .= "<img src='img/$img_folder/{$file}' alt='{$file}' style='width: 100%;height: 100%' >";
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
                $count++;
                $output .= " <div class='item '>";
                $output .= "<img src='img/$img_folder/{$file}' alt='{$file}' style='width: 100%;height: 100%' >";
                $output .= "<div class=\"carousel-caption\"></div>";
                $output .= "</div>";
            }
        }
    }
}



?>




<!--<div id="animate" style='position: relative; top: 100px;'>-->
<!--</div>-->
<h1 class="text-center">Welcome to <?php echo $logo?></h1>

<!--<h1 class="text-center">Sorry this site is under construction</h1>-->

<!--    <h6 class="text-center" style="position:relative; color:blue;"><a  target="_blank" href="https://www.lumosity.com/app/v4/dashboard">Exercice my brain in Lumonisity-->
<!--        </a></h6>-->
<!--    <h6><a href="../Inspinia/index.php">Inspinia</a></h6>-->

<?php //echo basename(__DIR__);

?>

<!--    <div id="scrollcontainerTop" style="position:relative; overflow:hidden; width:100%;">-->
<!--  <span id="scrolltextTop" style="position:absolute; white-space:nowrap">-->
<!---->
<!--  </span>-->
<!--    </div>-->





<div class="col-md-6 col-md-offset-3">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<!--        <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="3"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="4"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="5"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="6"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="7"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="8"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="9"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="10"></li>-->
        <!--<li data-target="#carousel-example-generic" data-slide-to="11"></li>
        <li data-target="#carousel-example-generic" data-slide-to="12"></li>
        <li data-target="#carousel-example-generic" data-slide-to="13"></li>
-->



<?php
for ($i = 1; $i <= +$count; $i++) {

    $c=$i;
    echo "<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$c}\"></li>";
}

//
//for ($i = 1; $i <= 11; $i++) {
//
//    $c=10+$i;
//    echo "<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$c}\"></li>";
//}
//
//for ($i = 1; $i <= 18; $i++) {
//
//    $c=22+$i;
//    echo "<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$c}\"></li>";
//}

?>


        <?php


        //    $carrousels=['Familly%20m%20bozargue%20mum%20dad.jpg','jalleh_maman.JPG','desiree.JPG','CaroMichael.jpg','leiana_kamy.JPG','admin.JPG','Shire_Denisa.JPG','open-01.JPG','Kamran_March2015.jpg'];
        //    shuffle($carrousels);
        //    foreach ($carrousels as $carrousel) {
        //     if(file_exists(SITE_ROOT."/img/$img_folder/".$carrousel))  {
        //         $output .= " <div class='item '>";
        //         $output.= "<img src='img/$img_folder/{$carrousel}' alt='{$carrousel}' style='width: 100%;height: 100%' >";
        //         $output .= "<div class=\"carousel-caption\"></div>";
        //         $output .= "</div>";
        //     }
        //
        //   }

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
            <img src="img/DesireeWedding/Chupah1.jpg" alt="tr1" style="width: 100%;height: 100%">
            <div class="carousel-caption">
            </div>
        </div>

        <?php

        echo $output;


        for ($i = 1; $i <= 11; $i++) {

            $c=1556+$i;
            $img="EngDesiree_{$c}.JPG";

            echo "        <div class=\"item\">
            <img src=\"img/Kamy/{$img}\" alt=\"tr1\" style=\"width: 100%;height: 100%\">
            <div class=\"carousel-caption\">
                Fiancaille de desirée
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


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

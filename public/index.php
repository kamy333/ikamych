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

<style>
    body {
        background-color: #f4f7fb;
    }

    @media (max-width: 767px) {
        body {
            padding-top: 52px;
        }
    }

    .ikamy-home {
        color: #18233a;
        margin: 0 auto;
        overflow-x: hidden;
    }

    .ikamy-home a {
        color: inherit;
    }

    .ikamy-home__section {
        padding: 46px 18px;
    }

    .ikamy-home__section--hero {
        background: linear-gradient(135deg, #eef8ff 0%, #ffffff 58%, #f8fbff 100%);
        border-bottom: 1px solid #dbe8f4;
        padding-top: 34px;
    }

    .ikamy-home__inner {
        margin: 0 auto;
        max-width: 1080px;
    }

    .ikamy-home__hero-grid {
        align-items: center;
        display: grid;
        gap: 36px;
        grid-template-columns: minmax(260px, 390px) minmax(0, 1fr);
    }

    .ikamy-home__portrait-link {
        display: block;
        justify-self: center;
        max-width: 390px;
        width: 100%;
    }

    .ikamy-home__portrait {
        aspect-ratio: 4 / 5;
        border: 10px solid #fff;
        box-shadow: 0 22px 55px rgba(24, 35, 58, 0.18);
        display: block;
        height: auto;
        object-fit: cover;
        object-position: center 18%;
        width: 100%;
    }

    .ikamy-home__eyebrow {
        color: #08796f;
        font-size: 15px;
        font-weight: 800;
        letter-spacing: 0;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .ikamy-home__title {
        color: #092f55;
        font-size: 46px;
        font-weight: 800;
        line-height: 1.08;
        margin: 0 0 14px;
    }

    .ikamy-home__subtitle {
        color: #51627a;
        font-size: 20px;
        line-height: 1.55;
        margin: 0 0 26px;
        max-width: 620px;
    }

    .ikamy-home__button {
        background-color: #0b8fcb;
        border-radius: 6px;
        box-shadow: 0 12px 28px rgba(11, 143, 203, 0.24);
        color: #fff !important;
        display: inline-flex;
        font-size: 17px;
        font-weight: 800;
        line-height: 1;
        padding: 15px 22px;
        text-decoration: none !important;
    }

    .ikamy-home__button:hover,
    .ikamy-home__button:focus {
        background-color: #077fb6;
        color: #fff;
    }

    .ikamy-home__section-title {
        color: #075b86;
        font-size: 34px;
        font-weight: 700;
        line-height: 1.2;
        margin: 0 0 28px;
        text-align: center;
    }

    .ikamy-home__welcome-logo {
        display: inline-block;
        height: 36px;
        margin-left: 6px;
        max-width: 150px;
        object-fit: contain;
        vertical-align: -6px;
        width: auto;
    }

    .ikamy-home__quotes {
        display: grid;
        gap: 18px;
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .ikamy-home__quote {
        background: #fff;
        border: 1px solid #dce7f0;
        border-radius: 8px;
        box-shadow: 0 16px 34px rgba(24, 35, 58, 0.08);
        display: flex;
        flex-direction: column;
        font-size: 18px;
        line-height: 1.55;
        min-height: 230px;
        padding: 24px;
    }

    .ikamy-home__quote p {
        margin: 0;
    }

    .ikamy-home__quote footer {
        color: #596a80;
        font-size: 15px;
        margin-top: auto;
        padding-top: 18px;
        text-align: right;
    }

    .ikamy-home__quote--wide {
        grid-column: 1 / -1;
        min-height: 0;
    }

    .ikamy-home__quote em {
        color: #3d516d;
    }

    .ikamy-home__gallery {
        background: #fff;
        border-top: 1px solid #dbe8f4;
    }

    #carousel-example-generic {
        margin: 0 auto;
        max-width: 860px;
    }

    #carousel-example-generic .carousel-inner {
        aspect-ratio: 72 / 46;
        background-color: #eef3f8;
        border-radius: 8px;
        box-shadow: 0 22px 55px rgba(24, 35, 58, 0.15);
        overflow: hidden;
        width: 100%;
    }

    #carousel-example-generic .carousel-photo-frame {
        position: relative;
    }

    #carousel-example-generic .carousel-inner > .item {
        height: 100%;
    }

    #carousel-example-generic .carousel-inner > .item > img {
        height: 100%;
        object-fit: contain;
        width: 100%;
    }

    #carousel-example-generic .carousel-caption {
        pointer-events: none;
    }

    #carousel-example-generic .carousel-control {
        align-items: center;
        background-image: none;
        display: flex;
        justify-content: center;
        opacity: 1;
        text-shadow: none;
        width: 12%;
    }

    #carousel-example-generic .carousel-control .glyphicon {
        background-color: rgba(0, 0, 0, 0.45);
        border-radius: 50%;
        color: #fff;
        font-size: 22px;
        height: 44px;
        line-height: 44px;
        margin: 0;
        position: static;
        width: 44px;
    }

    #carousel-example-generic .carousel-control:hover .glyphicon,
    #carousel-example-generic .carousel-control:focus .glyphicon {
        background-color: rgba(0, 0, 0, 0.65);
    }

    #carousel-example-generic .carousel-indicators {
        bottom: 12px;
        margin-bottom: 0;
    }

    @media (max-width: 991px) {
        .ikamy-home__hero-grid,
        .ikamy-home__quotes {
            grid-template-columns: 1fr;
        }

        .ikamy-home__title {
            font-size: 38px;
        }

        .ikamy-home__hero-copy {
            text-align: center;
        }

        .ikamy-home__subtitle {
            margin-left: auto;
            margin-right: auto;
        }
    }

    @media (max-width: 560px) {
        .ikamy-home__section {
            padding: 30px 14px;
        }

        .ikamy-home__title {
            font-size: 31px;
        }

        .ikamy-home__subtitle,
        .ikamy-home__quote {
            font-size: 17px;
        }

        .ikamy-home__section-title {
            font-size: 28px;
        }

        .ikamy-home__portrait-link {
            max-width: 300px;
        }
    }
</style>

<main class="ikamy-home">
    <section class="ikamy-home__section ikamy-home__section--hero">
        <div class="ikamy-home__inner ikamy-home__hero-grid">
            <a class="ikamy-home__portrait-link" href="../Inspinia/papa/francais_discours.php">
                <img class="ikamy-home__portrait" src="../Inspinia/papa/assets/img/photos/Photo_2025-03-01_144725.jpg" alt="Papa">
            </a>

            <div class="ikamy-home__hero-copy">
                <div class="ikamy-home__eyebrow">Hommage</div>
                <h1 class="ikamy-home__title">Hommage à mon père<br>Shmouel ben Galine-Acher</h1>
                <p class="ikamy-home__subtitle">1932-2025. Un espace pour garder les mots, les souvenirs et la lumière de sa présence.</p>
                <a class="ikamy-home__button" href="../Inspinia/papa/francais_discours.php">Lire l'hommage</a>
            </div>
        </div>
    </section>

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


$folders = [
    "img/DesireeWedding/",
    "img/Kamy/",
    "img/DesireeWedding/Before/",
];

$photos = [
    $folders[0] => "CarolineFeredoun.jpg",
    $folders[0] => "Chupah1.jpg",
];

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

    <section class="ikamy-home__section">
        <div class="ikamy-home__inner">
            <h2 class="ikamy-home__section-title">
                Welcome to
                <img class="ikamy-home__welcome-logo" src="<?php echo IKAMY_LOGO_NAV_URL; ?>" alt="iKamy">
            </h2>

            <div class="ikamy-home__quotes">
                <article class="ikamy-home__quote">
                    <p>En tant de crise, les intelligents cherchent des solutions, les imbéciles cherchent des coupables.</p>
                    <footer>- Anonyme</footer>
                </article>

                <article class="ikamy-home__quote">
                    <p>Je t'aime dans le temps. Je t'aimerai jusqu'au bout du temps. Et quand le temps sera écoulé, alors, je t'aurai aimée. Et rien de cet amour, comme rien de ce qui a été, ne pourra jamais être effacé.</p>
                    <footer>Jean d'Ormesson<br><em>Un jour je m'en irai sans avoir tout dit.</em></footer>
                </article>

                <article class="ikamy-home__quote">
                    <p>J’imagine qu’une des raisons pour lesquelles les gens s’accrochent à leurs haines avec tellement d’obstination, est qu’ils sentent qu’une fois la haine partie, ils devront affronter leurs souffrances.</p>
                    <footer>James Baldwin</footer>
                </article>

                <article class="ikamy-home__quote ikamy-home__quote--wide">
                    <p>
                        <em>Ce n’est qu’un moment..</em><br><br>
                        Je t'en prie mon amour ne pleure pas<br>
                        Ce n'est qu'un moment<br>
                        Plus jamais je ne pourrais te dire bonne nuit<br>
                        Parce que je suis sur le point d'aller vers la lumière éternelle<br>
                        Ce n’est qu’un moment chéri juste un moment.<br>
                        Tes peines s'estomperont dans le sentiment des étoiles<br>
                        Soit serein chéri ce n'est qu'un moment<br>
                        Mais après éternellement tu ressentiras l'amour<br>
                        Et en m’attendant tu souriras au soleil pour transformer mes larmes en sourire et en bonheur
                    </p>
                    <footer><strong>Franseca Barzaghi Bassi</strong></footer>
                </article>
            </div>
        </div>
    </section>

    <section class="ikamy-home__section ikamy-home__gallery">
        <div class="ikamy-home__inner">
            <h2 class="ikamy-home__section-title">Moments en images</h2>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <?php
                    $extra_engagement_photos = 11;
                    for ($i = 1; $i <= $count + $extra_engagement_photos; $i++) {
                        $c = $i;
                        echo "<li data-target=\"#carousel-example-generic\" data-slide-to=\"{$c}\"></li>";
                    }
                    ?>
                </ol>

                <div class="carousel-photo-frame">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="img/DesireeWedding/Chupah1.jpg" <?php echo $pic_size; ?> alt="tr1">
                            <div class="carousel-caption"></div>
                        </div>

                        <?php
                        echo $output;

                        for ($i = 1; $i <= 11; $i++) {
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
        </div>
    </section>
</main>
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

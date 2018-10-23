<?php require_once('../../../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "books"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Les aventures de Bralia</a></mark>
</h4>

<?php
$width = 500;
$height = 500;
$imgpath = "/public/img/Bralia/jordanie/001_bralia.jpg";
$img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='Mont Nebot Pascal'>";
$link = "<span><a href='$imgpath'>$img</a></span>";

$text = "$link";
?>

<h3 class="text-center">Viens kAMI, je t'enmène en Jordanie :) <?php echo $text; ?></h3>


<div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">

    <?php
    echo $ebooks = get_picture_folder_blueimp_gallery("Bralia/jordanie");
    ?>

</div>

<div class="col-lg-9 col-lg-offset-1" style="background-color: white;margin-top: 2em;padding: 2em">


    <?php
    $width = 100;
    $height = 100;
    $imgpath = "/public/img/Bralia/jordanie/001_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='Mont Nebot Pascal'>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $text = "<p>Viens kAMI, je t'enmène en Jordanie :) $link</p> ";

    $imgpath = "/public/img/Bralia/jordanie/02_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='Mont Nebot Pascal'>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $text .= " <p>Pascal était très fier car son nom de famille est NEBOT. $link Et il n'a pas arrêté de le dire à tous ceux qu'il rencontrait </p> ";

    $imgpath = "/public/img/Bralia/jordanie/03_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $text .= "<p>Le mont Nebo est situé en face de Jericho .$link C’ est de là que Moise aurait aperçu la terre promise dont Dieu lui avait interdit l’accès et où il mourut</p>";

    $imgpath = "/public/img/Bralia/jordanie/04_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";


    $text .= "<p>$link Ensuite direction Madaba réputée pour ses céramiques les plus belles au monde entre le 4 e au 7 e siècle. Dans cette église figure au sol la plus ancienne carte au monde de la terre sainte ....</p>";

    $imgpath = "/public/img/Bralia/jordanie/05_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $imgpath2 = "/public/img/Bralia/jordanie/06_bralia.jpg";
    $img2 = " <img src='$imgpath2' width='{$width}em' height='{$height}em' alt=''>";
    $link2 = "<span><a href='$imgpath2'>$img2</a></span>";

    $text .= "<p>À l'est il y a quelques \"châteaux \" en plein désert . En voici un d'extérieur  ( à l'intérieur les mosaïques murales sont splendides et très bien conservées )$link &nbsp;&nbsp; $link2 </p>";


    $imgpath = "/public/img/Bralia/jordanie/07_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";


    $text .= "<p>Et nous voici arrivés à Petra dont on rêvait depuis si longtemps ! 
Petra à été construit par les nabatéens au 1er siècle av JC . 
Ces derniers étaient de bons commerçants mais mauvais guerriers Ils ont été dominés par les romains en L'an 106 ap JC . Un tremblement de terre a détruit la région au 4 e siècle et ce n'est qu' en 1812 qu'un suisse ( et oui ) redécouvrit la région . 
Les roches de Petra sont composées de sable et de sel cristallisé ( il y a très longtemps , il y avait la mer à cet endroit ) la roche est donc très tendre ( raison  pour laquelle les nabatéens ont choisi cet endroit pour creuser cette nécropole )  . La couleur plus ou moins rougeâtre vient de l'oxydation plus ou moins importante du fer $link</p>
";
    $imgpath = "/public/img/Bralia/jordanie/08_bralia.PNG";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";


    $text .= "<p>Nous nous sommes ensuite dirigés vers le désert de wadi Rum tellement cher à Lawrence d' Arabie . 
On trouve de nombreuses inscriptions en nabatéens sur les rochers ( les nabatéens avaient leur propre alphabet ) et la couleur du sable est spendide avec des dégradés de rose ..... 
Et le sable est si fin et doux !! $link </p>
";
    $imgpath = "/public/img/Bralia/jordanie/oups.png";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $text .= "<p> $link Le côté moins sympa ce sont mes mains qui ont brûlé au soleil malgré jà crème Solaire ( j'avais oublié mes gants blancs ) </p>";

    $imgpath = "/public/img/Bralia/jordanie/10_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $text .= "<p> $link Thé à la sauge préparé sur la braise dans une tente bédouine Ils ont coutume de prendre le thé à la sauge en hiver et du thé à la menthe en été </p>";

    $imgpath = "/public/img/Bralia/jordanie/11_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $text .= "<p>Pont naturel dans le désert de Wadi Moussa  $link </p>";

    $width = 600;
    $height = 700;
    $imgpath = "/public/img/Bralia/jordanie/12_bralia.jpg";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";
    $text .= "<p>Pour finir nous sous sommes dirigés vers la mer rouge à Aqaba ( juste en face de Eilat ) pour voir voir les poissons et passer le réveillon du nouvel an</p>";


    $text .= "<p class='text-center'>$link </p>";


    $text .= "<p>J'espère t'avoir offert un peu d'évasion :) De mon côté j'espère revivre cette nuit ces beaux paysages dans mes rêves Je te fais un gros bisou et te souhaite une bonne nuit ,,,,,,,,,,,,,</p>";
    $width = 300;
    $height = 350;
    $imgpath2 = "/public/img/Bralia/jordanie/thankyou.png";
    $imgpath = "/public/img/Bralia/jordanie/thatallfolks";

    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt=''>";
    $link = "<span><a href='$imgpath'>$img</a></span>";

    $img2 = " <img src='$imgpath2' width='{$width}em' height='{$height}em' alt=''>";
    $link2 = "<span><a href='$imgpath2'>$img2</a></span>";

    $text .= "<p class='text-center'>$link &nbsp; &nbsp; &nbsp; &nbsp; $link2</p>";

    $text .= "";
    $text .= "";
    $text .= "";


    echo "" . $text . "<hr>";
    ?>
</div>


<?php echo str_repeat("<p style='color:white'>i</p>", 20); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


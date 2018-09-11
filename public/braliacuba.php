<?php require_once('../includes/initialize.php'); ?>
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
$imgpath = "/public/img/Bralia/cuba/";
$img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='Cuba'>";
$link = "<span><a href='$imgpath'>$img</a></span>";

$text = "$link";
?>

<h3 class="text-center"> <?php echo $text; ?></h3>


<div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">

    <?php
    echo $ebooks = get_picture_folder_blueimp_gallery("Bralia/cuba");
    ?>

</div>

<div class="col-lg-9 col-lg-offset-1" style="background-color: white;margin-top: 2em;padding: 2em">


    <!--    <div>-->
    <!---->
    <!--    --><?php
    //
    //
    //    $width = 300;
    //    $height = 300;
    //    $imgpath = "/public/img/Bralia/cuba/imageCuba.png";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='Mont Nebot Pascal'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_01_LagonVerdatre.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_01_LagonVerdatre'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_02_Maya.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_02_Maya'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_03_iguane.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_03_iguane'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_05MogotesfermeVinales.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_05MogotesfermeVinales'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_06MogotesfermeVinales.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_06MogotesfermeVinales'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_07SantiagoCuba.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_07SantiagoCuba'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_08SantiagoCuba.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_08SantiagoCuba'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_09SantiagoCuba.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_09SantiagoCuba'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //    echo $text;
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_10_CayoJutias.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_10_CayoJutias'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_11_reserve_naturelle.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_11_reserve_naturelle'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //
    //    $imgpath = "/public/img/Bralia/cuba/photo_12_Algue.JPG";
    //    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_12_Algue'>";
    //    $link = "<span><a href='$imgpath'>$img</a></span>";
    //    $text = "<p> $link</p> ";
    //
    //
    //    echo "" . $text . "<hr>";
    //    ?>
    <!--    </div>-->
    <?php

    $width = 100;
    $height = 100;


    $text = "Chabbat chalom Kamran . J'espère que tu vas bien . Je profite de la bonne wifi pour t'envoyer quelques photos de Cuba Pour commencer un exemple des palais richement décorés dans la ville de Cienfuegos qui est une ville créées au 19 e siècle par des émigrants français qui sont venus faire fortune avec le café et la canne à sucre en faisant travailler les esclaves originaires de Cuba ou de Haïti . <br>";


    $imgpath = "/public/img/Bralia/cuba/photo_10_CayoJutias.JPG";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_10_CayoJutias'>";
    $link = "<a href='#'>$img</a>";
    $text = $link . "";
    $text .= "Et maintenant la plus belle plage que j'ai vu dans ma vie : Cayo Jutias Il faut traverser la mangrove avant d'y accéder.....<br>";


    $text .= "Voici maintenant Viñales,  la campagne près de la Havane . <br>
J'ai appris que Cuba est la conséquence d'une énorme météorite tombée dans la mer ayant eu pour effet de faire immerger les \"mogotes \" ( roches calcaires formant des collines recouvertes  maintenant de végétation ) <br><br>

Les paysans habitent des fermes aux toits de palme   <br>
À part les fruits et légumes , ils cultivent surtout le tabac . 90 % est produit pour l'état et 10%pour leur  consommation  personnelle ou la vente .<br> 
Les cigares sont roulés à la main et sont les pus réputés du monde. . <br>
Ils utilisent encore les charrues tirées par des bœufs ...<br>
Le samedi soir les jeunes improvisent sur la place centrale des stands pour fabriquer des koktails à des prix abordables et la municipalité installe des grandes enceintes pour la musique . <br>
Cela  créée une ambiance très bon enfant dans un cadre totalement en plein air bien différent des discothèques Le seul bémol , la police municipale qui surveille l'absence de dérapage<br>
 :()
Les photos suivent ....";


    $text .= "Le Mexique ne me laisse pas d'impressions aussi marquées que Cuba ou l'Amérique Latine .<br> 
Si ce n'est que j'adore quand ils sourient avec leur visage bien joufflu. <br>
Nous y sommes venu pour revoir des amis de France qui ont créé un lodge en pleine jungle et aussi visiter les sites maya ( à 1 h 30 d'avion depuis Cuba ) Prêt pour changer de pays ? <br>
💪😍 allons y ! <br>";


    $imgpath = "/public/img/Bralia/cuba/photo_13_Temaczcal.JPG";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_13_Temaczcal'>";
    $link = "<a href='#'>$img</a>";
    $text .= $link . "";
    $text .= "Le Temaczcal est une sorte d'igloo transformé en hammam rempli de vapeurs aromatiques générées par de l'eau très chaude versée sur des pierres volcaniques dans le trou rond creusé au sol que tu vois devant . 
On va tester. Demain :) <br>
À bientôt . Je te fais plein de bisous. Bralia ";


    ?>

    <div class="col-lg-7 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $link = "<a href='#'></a>";
        $img = " <img src=\" \" alt=\" \">";
        //                              $text =$link . "";
        $text .= "chez les MAYA, la tête nouveau né déformée pour devenir ovale c.-à-d. en forme serpent qui symbolise sagesse et vie ( pour cela ils attachaient la nuque et le front du nourrisson à une planche . Cette coutume a été interdite par la suite par les conquistadors ;) <br>          
                                  Les ruines de Chichen Itza La ruine maya la plus célèbre au Mexique  <br>";
        echo "" . $text . "<hr>";

        ?>
    </div>

    <hr>

    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $width = 100;
        $height = 100;
        $imgpath = "/public/img/Bralia/cuba/photo_01_LagonVerdatre.JPG";
        $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_01_LagonVerdatre'>";
        $link = "<a href='#'>$img</a>";
        $text = $link . "";
        $text .= "Un lieu extraordinaire . <br>
Tu remarqueras au fond à gauche la mer bleue et à droite le lagon verdâtre ( où baignent les crocodiles ) et au milieu la jungle ....<br>
";
        echo "" . $text . "<hr>";

        ?>
    </div>


    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php

        $width = 100;
        $height = 100;
        $imgpath = "/public/img/Bralia/cuba/photo_11_reserve_naturelle.JPG";
        $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_11_reserve_naturelle'>";
        $link = "<a href='#'>$img</a>";
        $text = $link . "";
        $text .= "Les cénotes sont des réserves naturelles d'eau où il fait bon se rafraîchir . Il sont toujours très profonds , en plein air ou sous terre avec de jolies stalagtites . Selon la topographie l'eau est d'une couleur bleue ou verte très vive . ";
        echo "" . $text . "<hr>";


        ?>
    </div>


    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $width = 100;
        $height = 100;
        $imgpath = "/public/img/Bralia/cuba/photo_12_Algue.JPG";
        $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='photo_12_Algue'>";
        $link = "<a href='#'>$img</a>";
        $text = $link . "";
        $text = "$link Tu vois les tas d'algues en bordure? Ici la mer est envahie par les algues en raison du réchauffement climatique et la pollution ( merci  Trump!!) Cela n'empêche pas les tortues de continuer à pondre sur cette plage . 
Car les tortues pondent instinctivement sur le lieu où elles sont nées ....<br>";
        echo "" . $text . "<hr>";

        ?>
    </div>

</div>


<?php echo str_repeat("<p style='color:white'>i</p>", 20); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


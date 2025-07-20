<?php require_once('../../../includes/initialize.php'); ?>

<?php

function modal($id, $img, $img1)
{

    $output = "
<a class='' style='width:1em;' href='#' data-toggle='modal' data-target='#myLinkprogram{$id}'><span class='' style='color: #0000ff;' aria-hidden='true'></span>$img</a>

<div class='modal fade' id='myLinkprogram{$id}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
           <div class='modal-content'> 
                      <div class='modal-header'>
                                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
                <h5 class='modal-title' id='myModalLabel'>David Solère</h5>
            </div>

            <div class='modal-body'>

                <div class='container-fluid text-center'>
                    $img1

                </div>
            </div>

            <div class='modal-footer'>
                    <p class='btn' data-dismiss='modal'>
                        <a class=' btn btn-info btn-xm' style='width: 6em;'>close</a>
                    </p> 
            </div></div></div></div></div>
";

    return $output;
}

?>


<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "links"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Shoah</h1>
<br>

<div class="row">
    <?php if (isset($session)) {
        echo $session->message();
    } ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">
    <div class="col-lg-4  col-lg-offset-1">
        <p>19 January 1902 | A Jewish artist David Olère was born in Warsaw. In 1918, he emigrated to France. In March
            1943 he was deported to Auschwitz where he was forced to work in Sonderkommando. After the war, he showed
            the horrifying world of gas chambers in drawings & paintings.<br>
            ---
            David Olère was born on 19 January 1902 in Warsaw. He studied at the Academy of Fine Arts in Warsaw. In
            1918, he went to Berlin, and then later to Paris where he settled permanently. He belonged to the so-called
            School of Paris. He worked for various film studios (he created set designs, costumes and advertising
            posters), among others Paramount Pictures, Fox and Gaumont.<br>
            On 20 February 1943, because of his Jewish origin, he was arrested by the French police and placed in the
            Drancy camp. On 2 March, he was deported from here to the German Nazi concentration and extermination camp
            Auschwitz, where he was registered with the number 106 144. Throughout his entire stay at the camp, he
            worked in the Sonderkommando, a special work unit forced by the Germans to assist in the operation of the
            crematoriums and gas chambers.<br>
            On 19 January 1945, David Olère was evacuated from Auschwitz deep into the Third Reich. At first, he was
            sent to the Mauthausen camp and then to Melk, where he worked, among others, in the underground adit. On 7
            April, he was transferred to Ebensee where he was liberated by the American army on 6 May 1945.<br>
            Shortly after the war a series of about 70 drawings was created, which in later years served as an
            inspiration for David Olère to produce shocking oil paintings. The very detailed record of subsequent stages
            of the extermination and scenes from the camp prisoners’ life is of exceptional documentary value. It
            contains plans of the crematoriums and gas chambers, as well as drawings depicting scenes taking place in
            these buildings.<br>
            ---
            Learn about art connected with Auschwitz: </p>


    </div>
    <div class="col-lg-4 col-lg-offset-1 ">
        <p>David Olère
            <br><br>
            une illustration sous licence libre serait bienvenue<br>
            David Olère, né Oler1 est un artiste français du xxe siècle, né à Varsovie, le 19 janvier 1902, et mort à
            Noisy-le-Grand, le 21 août 1985.<br><br>

            Ayant quitté sa Pologne natale pour devenir peintre et sculpteur en France, il est naturalisé français en
            1937 et réalise notamment plusieurs affiches de cinéma. La Seconde Guerre Mondiale fait cependant irruption
            dans l’existence de ce Juif polonais qui est déporté au camp d’Auschwitz-Birkenau de 1943 à 1945. Employé
            dans une équipe de Sonderkommando chargée de traiter les cadavres des chambres à gaz, il parvient à échapper
            aux purges effectuées pour ne pas laisser de témoin, car ses dessins sont fort appréciés de ses gardiens SS.
            Il devient donc, après la guerre, un témoin visuel de premier plan de l’expérience concentrationnaire et du
            procédé d’extermination, qu’il ne cesse de représenter par le dessin et la peinture.<br><br>
            <a href="https://fr.wikipedia.org/wiki/David_Ol%C3%A8re">Voir Wikipedia</a>
        </p>
    </div>
</div>

<br>
<hr>
<br>
<?php
$w = 300;
$h = 200;
$width = $w;
$height = $h;
$pic_size = " width = '$width' height = '$height' ";
$img_folder = "shoah" . DS . "david_olere";
$dir = SITE_ROOT . DS . 'public' . DS . "/img/" . $img_folder;
$output = "";


if (is_dir($dir)) {
    $dir_array = scandir($dir);
//    shuffle($dir_array);
//    $output="<div class='col-lg-7   col-lg-offset-3'>";
    $count = 0;
    foreach ($dir_array as $file) {
        if (stripos($file, '.') > 0) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
                list($width, $height, $type, $attr) = getimagesize($file);

                $count++;
                $w = 300;
                $h = 200;
                $width = $w;
                $height = $h;
                $pic_size = " width = '$width' height = '$height' ";
                $img = "<img $pic_size src='/public/img/$img_folder/{$file}' alt='{$file}'  >";
                $w = 600;
                $h = 400;
                $width = $w;
                $height = $h;
                $pic_size = " width = '$width' height = '$height' ";
                $img1 = "<img $pic_size src='/public/img/$img_folder/{$file}' alt='{$file}'  >";
                $output .= modal($count, $img, $img1);
            }
        }
    }
}

//echo "<div class='row'>";
//echo  "<div class='col-lg-6 col-lg-offset-3 '>";
echo $output;
//echo "</div>";
//echo "</div>";

//$img="<img $pic_size src="/public/img/$img_folder/download_002.jpg' alt='bbb'  >";
//
//$w = 600;$h = 400;$width = $w;$height = $h;$pic_size = " width = '$width' height = '$height' ";
//$img1="<img $pic_size src='/public/img/$img_folder/download_002.jpg' alt='bbb'  >";


?>

<br><br>

<?php
//echo modal(1, $img, $img1);

?>


<br><br>


<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>



<?php require_once('../includes/initialize.php'); ?>
<?php //$bralia=User::find_by_id($session->user_id); ?>

<?php if( User::is_bralia()){} else { redirect_to('admin/login.php');} ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>
    <!--<p id="side-menu"></p>-->
<?php echo gallery_button();?>
    <div class="wrapper wrapper-content">
        <div class="row">


            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>
                            <button class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa-heart"></i></button>
                            Mon adorable amie Bralia :)<span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span> </h2>
                        <blockquote>Tes photos sont superbes, tu es trop chou. J'adore la photo tendre avec ton grand-père et la famille. Tu es aussi très jolie et un magnifique sourire. </blockquote>
                        <blockquote>La classe en avocate. J'ai du mal à les articles. As-tu gagné?</blockquote>
                        <blockquote>Peux-tu m'envoyer moi plus de photos stp, c'est pas assez!</blockquote>


                            <?php
                            $h2="Bralia";
                            $fol="Bralia";
                            echo blueimp_wrapper($h2,blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,$h2,$folder_project_name)));?>

                            </div>
                </div>
<!---->
                <div class="ibox-content">
<!--                    --><?php
                    $h2="Bralia 18/2/2016";
//                    $fol="Bralia/Bralia2";
//                    echo blueimp_wrapper($h2,blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,$h2,$folder_project_name))); ?>
<!--                </div>-->

<?php



function BraliaComment($comments_array=array(),$img_folder='public'){

  $picture=  get_picture_array($img_folder);

    $array_cut=array(0,8);
$output="";
//    $output="<div class='row'>";
//    $output.="    <div class=\"ibox-content\">";

    $i=0;
    $j=0;
    foreach ($comments_array as $comment){
        $i++;

        if(in_array($j,$array_cut)){

            $output.="<div class='row'>";
        }

        $caption=$picture[$j]['img_name'];
        $caption=trim(substr($caption,3,100));
        $caption = str_replace("_", " ", $caption);
        $caption = ucfirst($caption);

        $exp_comment=substr($comment,0,25)."...";

        $footer="Photos ($i) ".$picture[$j]['img_file'];

        $output.="<div class=\"col-sm-6 col-md-3\">";
        $output.="<div class='thumbnail'>";
        $output.=$picture[$j]['img_tag'];
        $output.="<div class=\"caption\">";
        $output.="<h3>".$caption."</h3>";
        $output.="<blockquote><b>Bralia:</b> $exp_comment</blockquote> <small>$footer</small> ";



//        $output.="<p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Button</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Button</a></p>";
        $output.="                    </div>
                        </div>
                    </div>
                ";

        if(in_array($j,$array_cut)){
            $output.="</div>";
        }



        $j++;

    }
//    $output.="</div>";
//    $output.="</div>";
//    $output.="</div>";
    return $output;
    
}



function ThumbnailModal ($comments_array=array(),$img_folder='public'){
    $picture=  get_picture_array($img_folder);


    $output="<div class=\"row\">";
    $output.="<ul>";
    $i=0;
    $j=0;
    foreach ($comments_array as $comment) {
        $i++;
        $caption=$picture[$j]['img_name'];
        $caption=trim(substr($caption,3,100));
        $caption = str_replace("_", " ", $caption);
        $caption = ucfirst($caption);


        $exp_comment=substr($comment,0,40)."...";


        $output .= "<li class=\"thumbnail col-sm-3 col-xs-6 \">";
        $output .= "<a href=\"#";
        $output.=$picture[$j]['img_name'];
        $output .= "\" ";
        $output .= "data-toggle=\"modal\">";
        $output .= "";
        $output.=$picture[$j]['img_tag'];
        $output .= "</a>";
        $output .= "<div class=\"caption\">";
        $output .= "<h3>$caption</h3>";
        $output .= "<p>$exp_comment</p>";
        $output .= "<p><a href=\"#";
        $output.=$picture[$j]['img_name'];
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
    $output.="</ul>";
    $output.="</div>";

//    modal part
    $i=0;
    $j=0;
    foreach ($comments_array as $comment) {
        $i++;
        $caption=$picture[$j]['img_name'];
        $caption=trim(substr($caption,3,100));
        $caption = str_replace("_", " ", $caption);
        $caption = ucfirst($caption);

//        $exp_comment=substr($comment,0,25)."...";

        $output.="<div ";
        $output.="id=\"";
        $output.=$picture[$j]['img_name'];
        $output.="\" ";
        $output.=" class=\"modal fade\" tabindex=\"-1\">";
        $output.="<div class=\"modal-dialog\">";
        $output.="<div class=\"modal-content\">";
        $output.="<div class=\"modal-header\">";
        $output.="<button type=\"button\" class=\"close glyphicon glyphicon-remove\" data-dismiss=\"modal\"></button>";

        $output.="<h3 class=\"modal-title\">";
        $output.=$caption;
        $output.="</h3>";
        $output.="</div>";
        $output.="<div class=\"modal-body\">";
        $output.="<p>";
        $output.=$picture[$j]['img_src'];
        $output.=$comment;
        $output.="</p>";
        $output.="</div>";
        $output.="<div class='modal-footer'>";
        $output.="<button class='btn btn-primary' data-dismiss='modal'>Close</button>";
        $output.="</div>";
        $output.="</div>";
        $output.="</div>";
        $output.="</div>";
//        $output.="<br>";
        $output.="";
        $output.="";
        $output.="";
        $output.="";
        $output.="";
        $output.="";
        $output.="";

        $j++;
    }





        return $output;

}


echo "<h2>$h2</h2>";
$comments=array(
    "Un shabbat à la maison avec mes parents il y a environ 3 ou 4 ans ",
    "Une photo de Halloween passé chez nous avec Gaëlle et Caroline ( les enfants de Suzanne) et leurs petits amis .Pas  mal non ? ",
    "Je te présente Doris , une cousine éloignée qui habite à San Diego . 
On ne se voit pas souvent mais quand on se retrouve on a l'impression d'avoir toujours été ensemble . Elle est un peu ma sœur 
",
    "Je te présente Farnaz ( la sœur de Fardis et Farzad ) . On arrive à discuter de tout ensemble et on se comprends bien . Un rien nous fait rire ou pleurer quand on est ensemble . Son mari et ses enfants sont TRÈS sympa aussi ",

    "J'en profite pour te montrer mon déguisement de péruvienne pourim dernier ;)",
    "Voici mon cousin Farzad ( le petit frère de Fardis) . Il a un cœur d'or.
Nos emplois du temps respectifs nous empêchent de nous voir souvent ( il a 4 enfants jeunes et est très pratiquant )  On communique surtout par SMS . Il est très émouvant et sensible aux autres .
Cette photo à été prise lors du dernier pourim chez maman . C'est pourquoi il a ce chapeau de \"Haji firouzeh \"sur la tête .
",
    "Voici Fardis. , le fils ainé de ma tante Mahchid . Lui et sa femme Delphine sont des vrais bonbons ",
    "Voici une photo datant de 30 ans , Gaëlle est la fille aînée de Ma sœur Suzanne . Elle était très souvent à la maison . Elle était comme ma petite sœur . Il y a toujours eu une grande affection entre nous mais ... ",
    "Voici Helena et Mikael , les jumeaux de ma sœur Soheyla . C'est une photos récente que j'ai prise d'eux au parc Robinson Crusoe. ",
    "Voici ma belle mère Jocelyne (décédée) et mon beau frère Francis No comment car ce serait un long poème ! :()",
    "Voici mes deux sœurs 
L'aînée à droite : Suzanne
La 2 e à côté de moi : Soheyla - (Brigitte est son prénom français)
",
    "Voici ma mère et Elsa .
Ma mère m'a beaucoup aidé à la naissance d'Elsa . Je préparais à l'époque l'anniversaire de Laetitia et les guirlandes sur le mur intriguaient beaucoup Elsa :) 
",
    "Voici mon père et moi, heureux au mariage de ma sœur Soheyla ",
    "Voici mes grands parents et mon oncle et ma tante qui habitent en France.
Tu te souviendras sans doute de Mahchid ( elle est à droite de la photo avec son mari ) à l'époque elle n'était pas mariée et prenait le temps de vous donner des cours de français et de piano à toi et Caro ( je t'avouerai que c'est ma tante préférée de loin . Elle est très subtile) L'enfant que tu vois à gauche est Laetitia . Moi je suis ( bien sur ) à côté de mon grand père ....;)
",
    "voici mes deux parents ",






);
$fol="Bralia/Bralia2";
//echo BraliaComment($comments,$fol);
echo ThumbnailModal($comments,$fol);


?>





            </div>

        </div>
    </div>

<?php include(FOOTER_PUBLIC) ;?>
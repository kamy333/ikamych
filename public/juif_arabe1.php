<?php require_once('../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "links"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="col-lg-10 col-lg-offset-2" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <h4> <a href="http://frblogs.timesofisrael.com/comment-le-monde-arabe-a-perdu-ses-juifs/">Comment le monde arabe a perdu ses Juifs</a></h4>
        <?php
        
        $text = "Nathan Weinstock est un avocat, criminologue et historien belge né à Anvers en 1939. Après une scolarité juive orthodoxe il se tourne vers le trotskisme, devient en 1967 antisioniste et pro-palestinien, et se répand en harangues devant des auditoires nourris aux émissions de Radio-Le Caire, « savourant avec délices l’annonce que les vaillantes armées arabes sont sur le point de jeter les Juifs à la mer ». D’une violence verbale extrême, Weinstock appelle au démantèlement d’Israël en posant qu’on ne peut être à la fois sioniste et socialiste.<br><br>

Recevez gratuitement notre édition quotidienne par mail pour ne rien manquer du meilleur de l'info   INSCRIPTION GRATUITE!<br><br>

Vers les années 1990 il change de cap en prenant conscience du fait que la cause palestinienne n’est qu’un avatar de l’antisémitisme, et qu’elle est nourrie par la haine des Juifs plutôt que par une vision politique. Weinstock fait alors un virage à cent quatre-vingt degrés et se met à soutenir Israël en déconstruisant avec lucidité et courage son parcours d’intellectuel fourvoyé dans le dédale du marxisme, considérant ses écrits antérieurs comme « bourrés de conclusions simplistes et abusives ».
<br><br>
Weinstock  publie en 2008 un essai [1] sur la disparition des communautés juives du monde arabe. Ce gros ouvrage parait maintenant en hébreu, à l’occasion de quoi le quotidien israélien de gauche « Haaretz » consacre un article dans son supplément de fin de semaine. Ce qui suit n’en est  pas une traduction littérale, mais reprend l’essentiel du propos, à savoir l’évocation par Weinstock du statut de « Dhimmi » dans le monde arabe.<br><br>

Le statut de « Dhimmi » constituait en principe une forme de protection des non-musulmans monothéistes, mais au prix de règles infamantes telles que l’interdiction de posséder des armes, de témoigner au tribunal,  de monter à cheval, de l’obligation de porter des signes distinctifs, d’être assujettis à une taxe spéciale et de veiller à ce que les habitations soient plus basses que celles des musulmans. Au Yémen les « Dhimmi » juifs avaient pour tâche de vider les fosses d’aisance et de dégager les cadavres d’animaux encombrant les routes.<br><br>

Au fil du temps ces usages ont diminué ou ont disparus, mais les esprits continuent à en porter l’empreinte. Que les règles concernant les « Dhimmi » soient appliquées ou pas, elles subsistent de manière symbolique dans de larges franges de l’inconscient collectif arabe et y pérennisent une image de soumission au pouvoir musulman.<br><br>

L’histoire des Juifs du monde arabe est une tragédie. Des communautés entières installées depuis des temps immémoriaux ont été traquées, chassées ou éliminées dans l’indifférence la plus totale de la Communauté Internationale, auprès de laquelle les Juifs en déshérence n’ont jamais obtenu le statut de réfugiés, contrairement aux palestiniens, chez lesquels ce statut se transmet de génération en génération.<br><br>

En 1945 il y avait dans le monde arabe près d’un million de Juifs. Il en reste quelques milliers, essentiellement au Maroc. La manière dont ils ont été délogés diffère d’une région à l’autre, mais le dénominateur commun en est un antisémitisme remontant à l’époque du Prophète, qui avait voulu dans un premier temps rallier les Juifs à l’Islam, mais qui s’est retourné contre eux quand il a pris conscience qu’il n’y parviendrait pas.<br><br>

L’idée  que les Juifs sont partis du monde arabe parce qu’ils étaient sionistes est un mythe. La majorité ne l’était pas, et ne s’est expatriée que contrainte et forcée, abandonnant tout pour recommencer une vie nouvelle ailleurs. Ils étaient pourtant attachés à la culture arabe, à laquelle ils avaient largement contribué. La présence des  Juifs datait d’ailleurs souvent d’avant celle des arabes eux-mêmes.<br><br>

C’est en considérant les rapports entre la minorité juive et la majorité musulmane que l’on comprend le séisme qu’a constitué l’avènement de l’Etat d’Israël dans la psyché des masses arabes. Celles-ci portent en elles de manière plus ou moins marquée la mémoire de cette période où les Juifs pouvaient être humiliés et spoliés en toute légalité, ce qui explique leur regard incrédule sur l’Israël d’aujourd’hui, qui leur échappe et dont ils souhaitent la disparition, tâche à laquelle ils sont disposés à consentir des efforts qui ne débouchent sur rien d’autre que leur propre affaiblissement.
<br><br>
Quand les puissances coloniales ont voulu mettre un terme à la dhimmitude cela fut ressenti comme une atteinte à la dignité arabe et comme une violation de l’ordre divin. D’une manière générale la notion occidentale de droits de l’homme fut considérée comme incompatible avec les valeurs de l’Islam, ce qui est d’ailleurs encore le cas dans une grande partie du monde arabo-musulman.
<br><br>
Quand à l’aube du vingtième siècle les Juifs se sont mis à pratiquer l’agriculture intensive en Palestine ils décidèrent de remplacer les gardiens arabes par des Juifs. Ce changement fut vécu par beaucoup d’arabes comme un insoutenable  retournement de situation. Alors que dans leur esprit les Juifs n’avaient pas vocation à être paysans ni à porter des armes, ce nouvel ordre – celui de la modernité – s’édifiait sous leurs yeux en lieu et place de l’ordre ottoman en perte de vitesse. Cet avènement d’un « Juif Nouveau » dépassait l’entendement de l’opinion publique arabe, pour laquelle la soumission des Juifs allait de soi et découlait en quelque sorte d’une loi de la Nature.
<br><br>
L’impasse du conflit israélo-palestinien perdure – au moins en partie – parce que du point de vue arabe la création d’Israël est perçue comme une vengeance des Juifs eu égard à leur servitude passée, alors qu’en réalité le sionisme n’est qu’un mouvement de libération nationale. C’est l’inaptitude ontologique  à admettre que le mouvement sioniste a mis fin à la dhimmitude  en Palestine qui est la cause profonde du refus arabe de se conformer à la Résolution de l’ONU de 1947 recommandant de la partager en deux Etats, l’un juif et l’autre arabe.
<br><br>
[1] Une si longue présence : Comment le monde arabe a perdu ses Juifs, 1947-1967, (Editions Plon)";
        echo "" . $text . "<hr>";
        ?>
    </div>


</div>


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



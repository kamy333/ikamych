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

<h1 class="text-center">Antisemitisme</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


    <?php

    $text = "L’antisionisme est une aubaine car il nous donne la permission, et même le droit, et même le devoir d’être antisémites au nom de la démocratie. L’antisionisme est l’antisémitisme justifié, mis enfin à la portée de tous. Il est la permission d’être démocratiquement antisémite. Et si les juifs étaient eux-mêmes des nazis ? Ce serait merveilleux. (Vladimir Jankélévitch, 1986)";
    echo "" . $text . "<hr>";
    ?>
</div>

<div class="row">
<div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
    <?php
    $text = "<a href='#'></a>";
    $text .= "Edouard Brainis J'ai peut-être la solution au dilemme de ceux qui ne savent pas se positionner sur le sionisme. Voici le commentaire que j'ai fait sur mon mur suite au dernier article de Joel Kotek dans Regard. 

\"Si je peux me permettre une critique, je regrette qu'il laisse - prudence intellectuelle sûrement - de l'espace à un antisionisme qui ne serait pas antisémite. Je n'ai jamais rencontré cet antisionisme-là hors de la sphère juive (où il est ultra-minoritaire). De la même façon que seuls les juifs peuvent être sionistes, seuls les juifs peuvent être (éventuellement) antisionistes. La question du sionisme porte sur le regard du peuple juif sur sa propre destinée. Je considère que l’antisionisme non juif est toujours un racisme. Que quiconque se déclare par principe anti-Belgique - tout en étant pro-France, pro-Pays Bas, pro-Luxembourg, pro-Allemagne, etc. - et voit d'un bon œil le démantèlement de la Belgique au détriment des Belges et contre leur volonté, il serait qualifié sans ambages de haineux et de raciste anti-Belges ... voire de psychopathe. Dans le cas d'Israël, certains continuent à prétendre qu'il s'agit d'une opinion intellectuellement tenable.\"

Un ami ne comprenant pas bien pourquoi je dis que le débat sionisme/antisionisme est réservé aux juifs, j'ai précisé ceci.

\"C'est effectivement un point à méditer. Je ne dénie évidement pas aux non juifs le droit de soutenir et aimer Israël (ou à l'inverse de ne pas l'aimer). Chaque soutien me fait chaud au cœur et je ne remercierai jamais assez tous ceux qui soutiennent Israël, qu'ils soient juifs ou non. Je dis par contre que le sionisme est un choix national juif : le choix de vivre en peuple libre sur sa propre terre et non de manière dispersée au milieu des autres nations. Cette question appartient aux Juifs et personne n'a le droit de s'en emparer. Le droit à l’indépendance nationale est un droit pour tous les peuples. On ne peut pas se dire indépendantiste catalan, kurde ou flamand si l'on n'est pas catalan, kurde ou flamand. Pour le sionisme, c'est pareil.

D'ailleurs, soit dit en passant, les Etats arabes qui refusent l'indépendance au peuple juif refusent aussi l'indépendance au peuple kurde :<a href=\"http://www.haaretz.com/middle-east-news/iraq/1.812853\">Haaretz</a>
'We won't allow the creation of a second Israel,' Iraq warns ahead of Kurdistan…
HAARETZ.COM
";
    echo "" . $text . "<hr>";
    ?>
</div>

    <div class="col-lg-4  col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php
        $text = "<a href='http://www.palim-psao.fr/article-le-sionisme-l-antisemitisme-et-la-gauche-entretien-avec-moishe-postone-125085388.html'>Le sionisme, l’antisémitisme et la gauche</a>";
        $text .= "Entretien avec Moishe Postone

L'entretien qui suit a été publié dans le journal britannique Solidarity en 2010. Cette traduction réalisée par Stéphane Besson est inédite (annule et remplace la précédente traduction parue sur ce même site). Moishe Postone est notamment l'auteur de Critique du fétiche-capital. Le capitalisme, l'antisémitisme et la gauche (PUF, 2013) et de Temps, travail et domination sociale. Une réinterprétation de la théorie critique de Marx (Mille et une nuits, 2009).";
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




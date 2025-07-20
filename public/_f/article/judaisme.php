<?php require_once('../../../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "links"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Judaisme</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $text = "<strong>\"JUIF ? » par Alain Finkelkraut</strong>
Pour Alain Finkelkraut, \"c'est quand on n'est pas pratiquant que l'identité juive vous colle à la peau\". J'aime ce texte qui définit la condition de nombreux Juifs d'Europe, laïcs, intellectuels, humanistes, artistes, démocrates, libres penseurs, etc., mais profondément attachés à leur culture et à leur mémoire. Être juif sans pratiquer n'est une contradiction que pour ceux qui n'ont pas conscience de la dimension d'une identité qui ne se limite pas à une appartenance religieuse.
« Je crois que c’est quand on n’est pas pratiquant que l’identité juive vous colle à la peau parce que, pour un pratiquant, c’est Dieu qui colle : le pratiquant est celui dont l’existence se tient toute entière, se déroule devant Dieu. Mon existence avance comme elle le peut, Dieu n’est pas son témoin et, en même temps, je me sens juif, parce que je ne suis pas un juif pratiquant, je suis un juif identitaire. Qu’est-ce que ça veut dire? Non que la judéité soit une propriété, une manière d’être, qu’elle constitue mon caractère, si c’est vrai je n’en sais rien. Être juif, pour moi, c’est me sentir impliqué, concerné, compromis parfois, par ce que font les autres juifs. C’est un sentiment d’appartenance, d’affiliation et dans cette affiliation, il y a, par exemple, le lien torturé à Israël. Il y a un fait de sollicitude, d’inquiétude, d’admiration et parfois, d’impatience critique. Et puis aussi, si mon existence ne se tient pas devant Dieu, elle se tient, peut-être, devant les grands-parents que je n’ai jamais eus. Raymond Aaron disait : « Si, par extraordinaire, je devais apparaître devant mon grand-père qui vivait à Rambervillers, encore fidèle à la tradition, je voudrais, devant lui, ne pas avoir honte. Je voudrais lui donner le sentiment que, n’étant plus juif comme il l’était, je suis resté d’une certaine manière fidèle. » Je n’ai pas connu mes grands-parents, mais je pense à eux. Si je devais apparaître devant eux, eux qui étaient, en effet, encore fidèle à la tradition – l’un d’entre eux aimait les textes sacrés –, je souhaiterais qu’ils pensent, que je suis, à ma façon, dans la culture, et en France, resté fidèle. » 
Alain Finkelkraut";
        echo "" . $text;
        ?>
    </div>
    <div class="col-lg-6" style="background-color: #f1ffff;margin-top: 2em;margin-right: 2em;padding: 2em">

        <?php

        $text = "<strong> DE SCHLOMO Cet écrit de Leon Tolstoi date de 1891!!</strong><br>
Qu’est-ce qu’un Juif?<br>
Cette question n’est pas aussi étrange que cela puisse paraître à première vue.<br>
Examinons cette créature libre qui a été isolée et opprimée, foulée aux pieds et poursuivie, brûlée et noyée par tous les dirigeants et les nations, mais qui n’en est pas moins vivante et prospère en dépit de tout le monde.<br>
Qu’est-ce qu’un Juif qui n’a pas succombé à toutes les tentations mondaines offertes par ses oppresseurs et persécuteurs de sorte qu’il aurait renoncé à sa religion et qu’il aurait abandonné la foi de ses pères ?<br>
Un Juif est un être sacré qui s’est procuré un feu éternel du ciel et, avec lui il éclaire la terre et ceux qui y vivent.
Il est le printemps et la source d’où le reste des nations ont puisé leurs religions et leurs croyances.<br>
Un Juif est un pionnier de la culture. Depuis des temps immémoriaux, l’ignorance était impossible en Terre Sainte, de même que de nos jours dans l’Europe civilisée. En outre, au moment où la vie et la mort d’un être humain ne valaient rien, Rabbi Akiva s’est prononcé contre la peine de mort qui est maintenant considérée comme une peine acceptable dans la
plupart des pays civilisés.<br>
Un Juif est un pionnier de la liberté. Retour dans les temps primitifs, quand la nation a été divisée en deux classes, les maîtres et les esclaves, l’enseignement de Moïse interdit la tenue d’une personne comme esclave pendant plus de six ans
Un Juif est un symbole de la tolérance civile et religieuse,<br>
«donc montrez votre amour pour l’étranger, car vous avez été étrangers dans le pays d’Égypte.” Ces paroles ont été prononcées au cours de lointains, et barbares temps où il était communément acceptable entre les nations d’asservir les autres.<br>
En termes de tolérance, la religion juive est loin de recruter des adhérents. Bien au contraire, le Talmud stipule que si un non-Juif veut se convertir à la foi juive, il faut lui expliquer combien il est difficile d’être Juif et que les justes des autres religions aussi héritent le royaume céleste.<br>
Un Juif est un symbole de l’éternité.<br>
La nation qui n’abat, ni ne torture pourrait exterminer, la nation que ni le feu ni l’épée des civilisations ont été en mesure d’effacer de la surface de la terre, la nation qui la première annonce la Parole de Dieu, la nation qui a préservé la prophétie depuis si longtemps et qui l’a passé au reste de l’humanité, une telle nation ne peut pas disparaître.
Un Juif est éternel, il est une incarnation de l’éternité.
1891";
        echo "" . $text;
        ?>
    </div>

</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

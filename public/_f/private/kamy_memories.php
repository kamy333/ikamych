<?php require_once('../../../includes/initialize.php'); ?>
<?php if (!$session->is_logged_in()) {
    redirect_to("login.php");
} ?>
<?php if (!User::is_kamy()) {
    redirect_to('index.php');
} ?>
<?php $layout_context = "public"; ?>
<?php $active_menu = "memories"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $lang = "fr"; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<!--suppress SpellCheckingInspection -->
<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Memories Thought</a></mark>
</h4>

<div class="row">
    <div class="col-lg-7 col-lg-offset-1 " style="background-color:#f1ffff;margin-top: 2em;padding: 2em">

        <p>Mon parcours s’est heurté à de l’antisémitisme. Heureusement bien chanceux il n’a jamais touché mon intégrité
            physique et
            pas vraiment de manière psychologique non plus de telle sorte d'en avoir peur ou à ce qu’il m’obsède.</p>
        <p>La première fois je devais avoir 14 ans dans une école à Genève ou mes « camarades de classe » m’ont fait un
            procès. Ma faute être Juif. Je me souviens même plus des détails et des accusations et des
            interrogatoires.</p>
        <p>Puis je passa des années en Israël et aux USA sans y être confronté. Puis ce fut au travail alors que la
            secrétaire de l’ancien Directeur Général (juif) me sort violemment toute la diatribe antisémite des années
            30
            mais moi aussi je suis juif lui retorquais-je mais pour elle j’étais différent bien sûr.</p>
        <p>Ou une autre collègue qui soutient que les juifs ne vont aider que les autres juifs mais bien que je la pense
            pas
            antisémite elle en garda bien les clichés.</p>
        <p>Une autre fois c’est l’ami d’un ami qui m’explique calmement sans haine apparente l’argumentation et soutient
            des
            Soral et Dieudonné « l’utilisation des juifs et la shoah, ils l’utilisent, .. »</p>
        <p>Puis mon dernier boulot ou la plupart des collègues sont des fan de Dieudonné, ou on m’envoie en forme de
            boutade
            tous les clichés « argent , pouvoir, média, domination, peuple élu » ou du genre « combien de palestiniens
            vous
            avez tué aujourd’hui ». Alors bien sûr ce sont des boutades et je réponds aussi de façon légère car je ne
            veux
            pas avoir une approche victimaire car on s’entend même bien avec les collègues.</p>
        <p>A chacun de ces incidents j’ai pris les coups abasourdis sans jamais de réactions de ma part encaissant les
            coups, anesthésié. Finalement que répondre à tant de bêtises, que peux-ton avancer comme argument sur les
            préjugés ? pourtant ceux qui les profèrent savent pourtant que ces préjugés ont généré comme horreur. Mais
            il y
            a cette recrudescence de cet antisémitisme et depuis quelques années ils tuent des juifs parce-que juif
            simplement juif.Une absurdité si l'on pense bien et pourtant pas un seul de mes amis non-juifs ne se sentent
            touchés sauf une peut être. On est finalement bien seul.</p>
        <p>Je me demande les filles et fils et descendants de la shoah qui eux ont à subir cet antisémitisme, le voir se
            manifester partout, qu’il tue encore, que ressentent-ils ?

        </p>
        <p>28 janv 2018 vendredi dernier discussion vive avec mon physio défenseur à demi-mot de Dieudoné et me rétorque
            que DD s'est retourné vers Soral car personne à part ce dernier était prêt àle protéger contre les
            extrèmistes juifs(Bétar,) Qu'il serait a sa place il aurait plus la haine. Je m'emporte mais admet qu'il ne
            comprend pas ses fréquentations et qu'il s'interesse pas à ce sujet depuis un moment. Je lui parle de
            Faurisson, des survivants mais il pense toujours pas que DD est antisémite</p>

    </div>


    <div class="col-md-2 col-md-offset-1" style="background-color:#03A9F4;margin-top: 2em;padding: 2em">

        <p><span style="color:white;"> Ma chère Sandyne</span>,<br>
            Au vu des évènements et de la recrudescence des actes antisémites et de voir que l’on tue des juifs juste
            pour ce qu’ils sont c-a-d juif, je me disais que aucun de mes amis non-juifs hormis facebookien n’avait
            dénoncé ces actes antisémites ou montrer de l’empathie.
            Je me disais qu’on était bien seul comme on l’a si souvent été et puis encore une fois on l’aura bien
            cherché (ironie) et dans son histoire moderne car le conflit Israélo-palestinien est devenu sa raison, son
            excuse même si il tue en France.
            Mais dans mes pensées noires je t’avais oublié , toi qui m’a manifesté ta solidarité, ta tristesse. Alors je
            te dois ma gratitude et mon respect . Je t’embrasse.
        </p>

    </div>


</div>
<div class="row">
    <div class="col-lg-4 col-lg-offset-1" style="background-color: yellow;margin-top: 2em;padding: 2em">
        <?php
        $text = "<h5 class='text-center' style='color: blue'><b>Une pensée</b></h5>  <p>Je sais pas pourquoi ceux favorable à la réedition de Céline me font penser à des djihadistes s'emerveillant sur les atrocités commises par d'autres. Et plus c'est atroce plus ils sont content. D'une certaine manière ils  considèrent de donner la mort dans la plus grande des souffrances et de façon spectaculaire et en plus grand nombre comme un art.<br>
        Céline eu l'art de tuer avec les mots et qu'on considère je ne sais ... littérature?
        Je  sais pas si ce que je dis à du sens mais </p>";
        echo "" . $text . "<hr>";
        ?>
    </div>
</div>


<div class="row">

    <div class="col-md-8 col-md-offset-1" style="background-color:#0a568c;color:white;margin-top: 2em;padding: 2em">

        <h5 class="text-center">Des questions</h5>

        <ul style="list-style-type: none;">
            <li>Sommes-nous un peuple chouineur?
                <p style="background-color: #00ccff;">Non on se bat. Regarde Israel un miracle sur ce pays et une
                    société dynamique</p>
            </li>
            <li>Utilisons-nous des escuses à nos "exactions" ?</li>
            <li>Trouvons-nous des escuses à ce qu'il se passe en Israel?</li>
            <li>Pourquoi cherchons-nous constamment l'approbation des autres?</li>
            <li>Pourquoi sommes-nous tant detesté</li>
            <li>Pourquoi suis-je si insensible au désarroi Palestinien</li>
            <li>Pourquoi je ne crois plus à la paix</li>
            <li>Pourquoi je m'éloigne de la gauche?</li>
            <li>Pourquoi j'arrive de moins en moins accepté les différences</li>
            <li>Suis-je raciste ou antiraciste ? (sincérité)</li>
            <li>Suis-je de droite ou de gauche?</li>
            <li>Puis-je croire aux Palestiniens modérés désireux de 2 états?</li>

        </ul>


    </div>
</div>


<div class="" style="margin-top: 40em;">
    <p><a href="https://www.letemps.ch/suisse/2015/12/13/coup-chance-permis-arrestation-deux-terroristes-presumes">Article</a>
    </p>

    <img src="/public/img/facebook/2018-01-11_Giorgio_1.png" alt="">
    <img src="/public/img/facebook/2018-01-11_Giorgio_2.png" alt="">
    <img src="/public/img/facebook/2018-01-11_Giorgio_3.png" alt="">
    <img src="/public/img/facebook/2018-01-11_Giorgio_4.png" alt="">

</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


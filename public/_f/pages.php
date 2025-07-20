<?php require_once('../../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "Others"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Voyages de Bralia
        </a></mark>
</h4>


<h3 class="text-center"> <?php echo $text; ?></h3>

<div class="row">

    <div class="col-lg-2 col-lg-offset-1 " style="background-color: white;margin-top: 2em;padding: 2em">

        <a href="https://ikamy.ch/public/_f/_bralia/braliacuba.php">
            <img class="img-responsive" width='100em' height='200em'
                 src="https://ikamy.ch/public/img/Bralia/cuba/photo_09SantiagoCuba.JPG" alt="Voyage de Bralia a Cuba">Cuba
            Mexique</a>
    </div>

    <div class="col-lg-2 " style="background-color: white;margin-top: 2em;padding: 2em">

        <a href="https://ikamy.ch/public/_f/_bralia/braliajordanie.php">
            <img class="img-responsive" width='100em' height='200em'
                 src="https://ikamy.ch/public/img/Bralia/jordanie/001_bralia.jpg" alt="Voyage de Bralia Jordanie">Jordanie</a>

    </div>

    <div class="col-lg-2 " style="background-color: white;margin-top: 2em;padding: 2em">

        <a href="https://ikamy.ch/public/_f/_bralia/braliajordanie2.php">
            <img class="img-responsive" width='100em' height='200em'
                 src="https://ikamy.ch/public/img/Bralia/jordanie/03_bralia.jpg" alt="Voyage de Bralia Jordanie2">Jordanie
            2</a>

    </div>

    <div class="col-lg-2 " style="background-color: white;margin-top: 2em;padding: 2em">

        <a href="https://ikamy.ch/public/_f/_bralia/bralialoirezoo.php">
            <img class="img-responsive" width='100em' height='200em'
                 src="https://ikamy.ch/public/img/Bralia/loire_zoo/IMG_9315.JPG" alt="Zoo Aloire">Zoo Aloire</a>

    </div>

    <div class="col-lg-2  " style="background-color: white;margin-top: 2em;padding: 2em">


        <a href="https://ikamy.ch/public/_f/_bralia/braliabudapest.php">
            <img class="img-responsive" width='100em' height='200em'
                 src="https://ikamy.ch/public/img/Bralia/budapest/photo04.PNG" alt="Budapest">Budapest</a>

    </div>

</div>

<hr>

<div class="row">

    <div class="col-lg-2  col-lg-offset-4 " style="background-color: white;margin-top: 2em;padding: 2em">
        <?php if (User::is_kamy()) { ?>
            <a href="https://www.ikamy.ch/public/_f/article/judaisme.php">Judaisme</a><br>
            <a href="https://www.ikamy.ch/public/_f/article/juif_iran.php">Juif Iran</a><br>
            <a href="https://www.ikamy.ch/public/_f/article/antisemitism_1.php">Antisemitism</a><br>
            <a href="https://www.ikamy.ch/public/_f/article/antisionism.php">Antisionism</a><br>
            <a href="https://www.ikamy.ch/public/_f/article/shoah_1.php">Shoah Paint</a><br>
            <a href="https://www.ikamy.ch/public/_f/article/shoah.php">Shoah Drancy</a><br>
            <a href="https://www.ikamy.ch/public/_f/article/juif_arabe1.php">Juif Arabe</a><br>
            <a href="https://www.ikamy.ch/public/_f/article/bhl.php">BHL</a><br>
            <a href="https://www.ikamy.ch/public/_f/private/facebook_injure.php">Facebook injure</a><br>
            <a href="https://www.ikamy.ch/public/_f/private/kamy_memories.php"> Kamy memories</a>

        <?php } ?>


    </div>
</div>

<div class="col-lg-6 col-lg-offset-2" style="background-color: white;margin-top: 2em;padding: 2em">
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/private/facebook_injure.php">Propos amis</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/private/kamy_memories.php">Kamy memoire</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/IT/programmingbooks2.php">Programming books2</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/IT/programmingbooks.php">Programming books</a></li>-->

    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/_bralia/braliacuba.php">Voyage Bralia Cuba-->
    <!--            Mexique</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/_bralia/braliajordanie.php">Voyage Bralia-->
    <!--            Jordanie</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/_bralia/braliajordanie2.php">Voyage Bralia-->
    <!--            Jordanie2</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/_bralia/bralialoirezoo.php">Voyage Bralia Loire-->
    <!--            Zoo</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/_bralia/braliabudapest.php">Voyage Bralia-->
    <!--            Budapest</a></li>-->
    <!---->
    <!--    <li class="divider"></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/music.php">Music</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/articles.php">Articles</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/jokes_quotes.php">Jokes Quotes</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/judaisme.php">Judaisme</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/juif_iran.php">Juifs d'Iran</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/antisemitism_1.php">Antisemitism</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/antisionism.php">Antisionism 1</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/shoah_1.php">Shoah paint</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/shoah.php">Shoah</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/juif_arabe1.php">Juifs Arabe</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/bhl.php">BHL</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/handicap.php">Handicap</a></li>-->
    <!--    <li><a href="--><?php //echo $path_public; ?><!--_f/article/psychologie.php">Psychologie</a></li>-->


</div>


<?php echo str_repeat("<p style='color:white'>i</p>", 20); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>



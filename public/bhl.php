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

<h1 class="text-center">BHL</h1>

<div class="row">
    <div class="col-lg-12" style="padding: 2em">

<p class="text-center">Pourquoi une page dédié à BHL? car les attaques contre lui sont d'une haine antisémite. Et puis je suis généralement en accord avec ses idées, sur ses combats dont je sais combien elle est contesté aussi parmi les juifs. </p>
    </div>
</div>


<div class="row">



    <div class="col-lg-2  col-lg-offset-2 col-md-2  col-md-offset-2" style="background-color: #d9eeff;margin: 2em;;padding: 2em;height: 15em">
        <h4> le Monde Diplomatique</h4>
        <p>L’imposture<strong>Bernard Henri-Lévy</strong><br>
            On voit bien dans ce numéro la haine et l'acharnement envers BHL

            <a href="http://www.monde-diplomatique.fr/dossier/BHL"
               class="h"> Read more at monde-diplomatique.fr ... </a></p>
    </div>


    <div class="col-lg-2  col-lg-offset-2 col-md-2  col-md-offset-2" style="background-color: #d9eeff;margin: 2em;;padding: 2em;height: 15em">
        <h4> La Règle Du Jeu</h4>
        <p>Misère et déshonneur du Monde diplomatique de <strong>Bernard Henri-Lévy</strong><br>
            Réponse de BHL suite au numéro du <a href="http://www.monde-diplomatique.fr/dossier/BHL"
                                                 class="h"> monde-diplomatique.fr</a><br><br>
            <a href="http://laregledujeu.org/2017/07/24/32008/misere-et-deshonneur-du-monde-diplomatique/"
               class="h"> Read more response at laregledujeu.org ... </a></p>
    </div>


    <div class="col-lg-2  col-lg-offset-2 col-md-2  col-md-offset-2" style="background-color: #d9eeff;margin: 2em;;padding: 2em;height: 15em">
        <h4>Atlantico</h4>
        <p>Quand le Monde Diplomatique allume un bûcher pour brûler <strong>Bernard Henri-Lévy</strong><br>

            <a href="http://www.atlantico.fr/decryptage/quand-monde-diplomatique-allume-bucher-pour-bruler-bernard-henri-levy-3116439.html#YOyvAE6orMzwbY12.01"
               class="h"> Read more at atlantico.fr ... </a></p>
    </div>



    <div class="col-lg-2 col-md-2" style="background-color: #d9eeff;margin: 2em;padding: 2em;height: 15em">
        <h4>L'Express</h4>
        <p>De quoi la haine de <strong>Bernard-Henri Lévy</strong> est-elle le nom?<br>
            <a href="http://www.lexpress.fr/actualite/societe/de-quoi-la-haine-de-bernard-henry-levy-est-elle-le-nom_1929884.html#DOwv3FUJKYRqSD21.01"
               class="h"> Read more at lexpress.fr ... </a></p>

    </div>

</div>


<div class="row">


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



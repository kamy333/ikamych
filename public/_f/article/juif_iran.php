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

<h1 class="text-center">Juifs d'Iran</h1>


<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $text = "<h6><a href='http://www.akadem.org/sommaire/themes/histoire/diasporas/les-juifs-d-iran/a-la-rencontre-des-juifs-d-iran-11-07-2017-93099_73.php'>Juif d'Iran Akadem</a></h6>";
        $text .= "L'histoire de la plus ancienne diaspora juive<br>
A la rencontre des Juifs d'Iran  (29 min)<br>
Simon Fleury-Schindler - Professeur de Physique-Chimie et enseignant de Talmud Torah";
        echo "" . $text . "<hr>";

        ?>
    </div>


</div>
<?php echo str_repeat("<br>", 20); ?>

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



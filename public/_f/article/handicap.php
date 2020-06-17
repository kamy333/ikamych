<?php require_once('../../../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "handicap"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Handicap</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="row">


        <div class="col-lg-11 col-lg-offset-1 text-center"
             style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <a target="_blank" href="https://www.abilia.com/en/our-products/environmental-control">Abilia
                environmental-control Marco Pelagatti</a>
            <a target="_blank" href="https://www.meditec.ch/">Meditec 022 887 02 10</a>
        </div>
    </div>

    <div class="col-lg-11 col-lg-offset-1 text-center" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <a class="img-responsive home-page-photo " target="_blank"
           href="https://www.youtube.com/watch?v=gleCXu6Ez0U">
            <!--            <img height="50" width="50"  src="" alt="Click">-->
            Video ClickToPhone</a>

        <a class="img-responsive home-page-photo " target="_blank"
           href="https://www.youtube.com/watch?v=7YZ56omiS4c">
            <!--            <img height="50" width="50"  src="" alt="Click">-->
            Video Kèo</a>

        <a target="_blank" href="/public/img/handicap/fichier_lang_doc_267_1.pdf">Kéo instruction</a>

    </div>


    <!--<div id="fb-root"></div>-->
    <!--<script>(function (d, s, id) {-->
    <!--        var js, fjs = d.getElementsByTagName(s)[0];-->
    <!--        if (d.getElementById(id)) return;-->
    <!--        js = d.createElement(s);-->
    <!--        js.id = id;-->
    <!--        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";-->
    <!--        fjs.parentNode.insertBefore(js, fjs);-->
    <!--    }(document, 'script', 'facebook-jssdk'));</script>-->


    <?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>



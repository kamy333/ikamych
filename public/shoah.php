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
    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <a href="http://www.dailymail.co.uk/news/article-3205754/Blood-oozed-soil-grave-sites-pits-alive-secrets-Ukraine-s-shameful-Holocaust-Bullets-killing-centre-1-6million-Jews-executed.html">Holaucaust in Ukraine</a>
        <?php

        $text = "";
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


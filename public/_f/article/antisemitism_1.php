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

<h1 class="text-center">Antisemitisme</h1>
<?php
echo article_by_sql(2);
?>


<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">
    <div class="col-lg-6 col-lg-offset-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F151446978204%2Fvideos%2F10156026457398205%2F&show_text=0&width=560"
                width="560" height="409" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                allowTransparency="true" allowFullScreen="true"></iframe>
    </div>
</div>


<div class="row">
    <div class="col-lg-6   col-lg-offset-3">
        <p>Discours Emmanuel Macron du Vel d'Hiv 17 juillet 2017</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/hB2j5zhXKmg" frameborder="0"
                allowfullscreen></iframe>
    </div>
</div>

<div class="row">

    <div class="col-lg-6  col-lg-offset-3">
        <p>Alexandre Dujardin</p>

        <div class="fb-video" data-href="https://www.facebook.com/julcoh/videos/10152434170565251/"
             data-width="3000" data-show-text="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/julcoh/videos/10152434170565251/"><a
                            href="https://www.facebook.com/julcoh/videos/10152434170565251/">Captured by Julien
                        Cohen</a>
                    <p></p>Interview <a href="#" role="button">Alexandre Dujardin</a></blockquote>
            </div>
        </div>
    </div>


</div>


<br><br>
<div class="row">
    <div class="col-lg-6  col-lg-offset-3" style="background-color: #ffffd4">

        <p>Rabbi Sacks’ brilliant speech
            <a href="http://www.israelvideonetwork.com/rabbi-sacks-brilliant-speech-on-antisemitism-silenced-the-eu/"
               class="h"> speech </a>on Antisemitism silenced the EU</p>

    </div>

</div>
<br><br>

<div class="row">
    <div class="col-lg-6  col-lg-offset-3" style="background-color: #ffffd4">
        <p>Histoire du peuple juif en
            <a href="http://www.odyeda.com/fr/" class="h"> 1 page </a>.</p>
    </div>
</div>

<br><br>


<div class="row">
    <div class="col-lg-6  col-lg-offset-3">
        <p>Left antisemitism in Britain</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/te684rBHzOA" frameborder="0"
                allowfullscreen></iframe>
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



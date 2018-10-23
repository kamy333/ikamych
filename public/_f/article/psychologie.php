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

<h1 class="text-center">Psychology</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


            <p>Thought process</p>
            <div class="fb-video" data-href="https://www.facebook.com/yitzgo/videos/1690269407933525/?hc_ref=ARTzcVQS5UdKB_ORqEKmwJv8qtAmRwVUl951lQAWGaDayz97-j5AB7QJksf26zcWq0k&pnref=story"
                 data-width="3000" data-show-text="true">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/julcoh/videos/10152434170565251/"><a
                            href="https://www.facebook.com/julcoh/videos/10152434170565251/">I truly believe these 8:54 minutes could change your life!
                            please 👉 TAG A FRIEND to spread this important mind shift.
                            LIKE Yitz Goldberg for more..</a>
                        <p></p>Interview <a href="#" role="button"></a></blockquote>
                </div>
            </div>



        <?php

        $text = "<div class=\"row\">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : \"\" ?>
</div>";
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


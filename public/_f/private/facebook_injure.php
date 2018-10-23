<?php require_once('../../../includes/initialize.php'); ?>
<?php if (!User::is_kamy()) {
    redirect_to('index.php');
} ?>
<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "links"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<h1 class="text-center">Propos d'amis que j'aime ou pas</h1>


<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="col-lg-5 col-lg-offset-1"
         style="background-color: #f1ffff;margin-top: 2em;padding: 2em;border-color: #0a2b1d;border-style: solid">

        <p><?php echo str_repeat("&nbsp;", 50); ?>grrr!Patrick Madar</p>

        <div class="fb-video col-md-offset-1"
             data-href="https://www.facebook.com/1802450983375972/videos/1982731948681207/?hc_ref=ARTAh1yq1y0DXkO8WOfgm3MK3ZNHkhnwc0UfttrAY9hrVzEdTLfCAlZjsT-6ilF_-zs&fref=gs&dti=892388097454614&hc_location=group"
             data-width="500" data-show-text="false">
            <div class="fb-xfbml-parse-ignore">
                <blockquote
                        cite="https://www.facebook.com/1802450983375972/videos/1982731948681207/?hc_ref=ARTAh1yq1y0DXkO8WOfgm3MK3ZNHkhnwc0UfttrAY9hrVzEdTLfCAlZjsT-6ilF_-zs&fref=gs&dti=892388097454614&hc_location=group">
                    <a href="https://www.facebook.com/1802450983375972/videos/1982731948681207/?hc_ref=ARTAh1yq1y0DXkO8WOfgm3MK3ZNHkhnwc0UfttrAY9hrVzEdTLfCAlZjsT-6ilF_-zs&fref=gs&dti=892388097454614&hc_location=group"></a>
                    <p>Daniel Cohn-Bendit</p>Posted by <a href="https://www.facebook.com/TheFeverEvent/">The Fever</a>2011
                </blockquote>
            </div>
        </div>
        <br><?php echo str_repeat("&nbsp;", 13); ?>
        <img src="/public/img/facebook/madar.jpg" height="134" width="600" alt="">

    </div>

    <img src="/public/img/facebook/2017-12-22_4-19-45%20philipprMoine.png" height="600" width="600" alt="">

</div>

<div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <img src="/public/img/facebook/2017-12-23_11-43-55Bellaiche.png" height="600" width="600" alt="">

    <?php
    $text = "<a href='#'></a>";
    $text .= "";
    echo "" . $text . "<hr>";
    ?>
</div>


<!--<script>-->
<!---->
<!--    (function($) {-->
<!--        $.strRemove = function(theTarget, theString) {-->
<!--            return $("<div/>").append(-->
<!--                $(theTarget, theString).remove().end()-->
<!--            ).html();-->
<!--        };-->
<!--    })(jQuery);-->
<!---->
<!---->
<!--        var theString = ";";-->
<!--    var theResult = $.strRemove("pre", theString);-->
<!---->
<!--    // Returns: '<p>A string </p>'-->
<!---->
<!---->
<!--</script>-->

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



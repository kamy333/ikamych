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

<h1 class="text-center">Music</h1>


<div class="row">
    <?php if (isset($session)) {
        echo $session->message();
    } ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">
    <div class="col-lg-3" >
        <p style="margin-left: 30px"><br>Lyrics<br>
            When I wake up in the morning, love<br>
            And the sunlight hurts my eyes<br>
            And something without warning, love<br>
            Bears heavy on my mind<br>
            Then I look at you<br>
            And the world's alright with me<br>
            Just one look at you<br>
            And I know it's gonna be<br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+1X <br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+1X <br>
            When the day that lies ahead of me<br>
            Seems impossible to face<br>
            When someone else instead of me<br>
            Always seems to know the way<br>
            Then I look at you<br>
            And the world's alright with me<br>
            Just one look at you<br>
            And I know it's gonna be<br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)<br>

        </p>
    </div>

    <div class="col-lg-6">
        <br><br>
        <iframe width="735" height="415" src="https://www.youtube.com/embed/J4n_jDe0JsQ" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>

    <div class="col-lg-3">
        <p><br>A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+1X <br>
            When the day that lies ahead of me<br>
            Seems impossible to face<br>
            And when someone else instead of me<br>
            Always seems to know the way<br>
            Then I look at you<br>
            And the world's alright with me<br>
            Just one look at you<br>
            And I know it's gonna be<br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day) +1X  <br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+3X <br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+1X  <br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+1X  <br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+1X  <br>
            A lovely day<br>
            (Lovely day, lovely day, lovely day, lovely day)+2X</p>
    </div>
</div>

<hr>
<div class="col-lg-12   col-lg-offset-1">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/KT8phNJ4i2I?start=69" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/sYi7uEvEEmk" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/9dEVHuVuDSc" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/pok8H_KF1FA" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/IFgcS3zn8ic" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/oG08ukJPtR8" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/o3U4kxuBfIo?start=100" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/cSMB63GMfWM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/IChJ6eO3k48?start=90" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</div>
</div>


<br><br>


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



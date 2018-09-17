<?php require_once('../includes/initialize.php'); ?>
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
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Les aventures de Bralia</a></mark>
</h4>


<h3 class="text-center">Zoo de La Flèche ( pays de Loire )</h3>
<div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">
    <p>kAMI , Je te propose cette fois un tour au zoo de La Flèche ( pays de Loire ) .
        Je t'envoie quelques vidéo de l'ours blanc avec qui nous avons passé le week end et la prochaine fois sur les
        autres animaux du zoo.
        Bises
    </p>
</div>
<div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">

    <?php
    echo $ebooks = get_picture_folder_blueimp_gallery("Bralia/loire_zoo");
    ?>

</div>


<div class="row">
    <div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">

        <iframe src="https://drive.google.com/file/d/1uvhJ7rKTVs9fkjQ16y-hu-p4Op4CYm0C/preview" width="640"
                height="480"></iframe>
    </div>

    <div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">
        <iframe src="https://drive.google.com/file/d/1cIgcuSjsfGyEJ2Fp4VFz9C7c6vr6brny/preview" width="640"
                height="480"></iframe>
    </div>

    <div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">
        <iframe src="https://drive.google.com/file/d/1vADwDIwd33G7c9xCuRjGNJfXbR6ahumh/preview" width="640"
                height="480"></iframe>
    </div>

    <div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">
        <iframe src="https://drive.google.com/file/d/1qQmbq1X9hhu0f7o_Y0eBPoIGqlzdxlNb/preview" width="640"
                height="480"></iframe>
    </div>
</div>


<div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">


</div>


<?php echo str_repeat("<p style='color:white'>i</p>", 20); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


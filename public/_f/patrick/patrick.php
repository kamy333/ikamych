<?php require_once('../../../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "Patrick"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<h1 class="text-center">Nearscreen</a></h1>


<div class="row">
    <?php if (isset($session)) {
        echo $session->message();
    } ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">


    <div class="col-lg-6   col-lg-offset-3">

        <p>
            <a href="/public/_f/patrick/doc/Nearscreen Admin - creation of product and creation of users - example MEDI.pdf">Nearscreen
                Admin - creation of product and creation of users - example MEDI.pdf</a></p>
        <hr>

        <p><a href="/public/_f/patrick/doc/Nearscreen%20MEDI%20-%20mode%20d'emploi.pdf">Nearscreen Mode d'emploi</a></p>
        <hr>

        <?php $v = mb_convert_encoding('Nearscreen Video presentation', 'UTF-8'); ?>
        <!--        --><?php //$v=utf8_encode('Nearscreen Vidéo présentation'); ?>
        <p><a href="https://www.youtube.com/watch?v=lgbEJWhcFkA"><?php echo $v; ?></a></p>
        <hr>

    </div>
</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>




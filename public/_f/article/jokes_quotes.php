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

<h1 class="text-center">Jokes and Quotes</h1>


<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="container-fluid">

    <?php
    echo article_by_sql(1);

    ?>


    <div class="row">

        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item"><strong><u>cinema israelien</u></strong></li>
                <li class="list-group-item"> Hatoufim Les prisonniers de guerre</li>
                <li class="list-group-item"> Les citronniers</li>
                <li class="list-group-item">Tu n'aimeras point</li>
                <li class="list-group-item">Jaffa</li>
                <li class="list-group-item">Valse avec Bachir</li>
                <li class="list-group-item">La visite de la fanfare</li>
                <li class="list-group-item">Zaytoune</li>
                <li class="list-group-item">Une vie précieuse</li>
                <li class="list-group-item">Va, vis et deviens !</li>
                <li class="list-group-item">Le procès de Viviane Amsalem</li>
                <li class="list-group-item">5 caméras brisées</li>

            </ul>

        </div>
    </div>


</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

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


<h3 class="text-center">Contribution Assistance</a></h3>


<div class="row">
    <?php if (isset($session)) {
        echo $session->message();
    } ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="col-lg-6   col-lg-offset-3">

        <div class="text-center">
        <h4 class="text-center">OCAS</h4>
        <br>
        <p><a href="https://www.ocas.ch/sites/default/files/2024-01/cda_releve_horaire_assistant.pdf"><span lang="fr">Releve horaire assistant</span></a>
        </p>

        <p><a href="https://www.ahv-iv.ch/p/318.536.f">Facture cda 2025</a></p>

        <p><a href="https://www.ocas.ch/demarches-et-formulaires/facture-pour-la-contribution-dassistance-2"><span
                        lang="fr">Facture pour la contribution d'assistance (2) | Ocas</span></a></p>
        <p><a href="https://www.ocas.ch/ai/particuliers/contribution-dassistance"><span lang="fr">Contribution d'assistance | Ocas</span></a>
        </p>

        <h4 class="text-center">Cheque Service</h4>
        <p><a href="https://www.chequeservice.ch/fr"><span lang="fr">Cheque Service</span></a></p>
        <p><a href=""><span lang="fr"></span></a></p>
        <p><a href=""><span lang="fr"></span></a></p>
        <hr>
        </div>

    </div>
</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>




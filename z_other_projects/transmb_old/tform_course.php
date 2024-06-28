<?php require_once('../includes/initialize_transmed.php'); ?>


<?php include_once('assets/contact/assets/config.php'); ?>
<?php include_once('assets/contact/assets/language.php'); ?>
<?php include "layouts/header/header.php" ?>


<div data-role="page">

    <!-- header -->
    <div data-role="header" class="page-header" data-add-back-btn="true">
        <a href="index.php" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back">Back</a>
        <div class="logoXX"></div>
        <a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" rel="external"
           class="ui-btn-right">Home</a>
    </div>
    <!--/header -->

    <!-- main content -->
    <div data-role="content">

        <!-- banner & title -->

        <h2 class="pageTitle"><span>Nouvelle Course</span></h2>
        <!--        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>-->
        <!-- /banner & title -->

        <div class="content-padd">


            <p>Remplir la Course!</p>


            <div id="errors" class="hide ui-corner-all"></div>
            <p align="right">* <?php echo $language->field_required ?></p>

            <form name="form1" id="form1">


                <?php
                $sql = "SELECT * FROM transport_clients ORDER BY web_view ASC";
                $clients = TransportClient::find_by_sql($sql);
                ?>
                <div data-role="fieldcontain">
                    <label for="client_id">Client pseudo</label>
                    <select id="client_id" name="client_id">
                        <?php
                        foreach ($clients as $client => $cl) {
                            echo "<option value='{$cl->id}'>$cl->web_view</option>";
                        } ?>
                    </select>
                </div>


                <?php
                $sql = "SELECT * FROM transport_chauffeurs";
                $chauffeurs = TransportChauffeur::find_by_sql($sql);
                ?>
                <div data-role="fieldcontain">
                    <label for="chauffeur_id">Client pseudo</label>
                    <select id="chauffeur_id" name="chauffeur_id">
                        <?php
                        foreach ($chauffeurs as $chauffeur => $ch) {
                            echo "<option value='{$ch->id}'>$ch->chauffeur_name</option>";
                        } ?>
                    </select>
                </div>

                <div data-role="fieldcontain">
                    <label for="heure">Heure*</label>
                    <input type="text" name="heure" id="heure"/>
                </div>

                <div data-role="fieldcontain">
                    <label for="depart">Départ</label>
                    <input type="text" name="depart" id="depart"/>
                </div>

                <div data-role="fieldcontain">
                    <label for="arrivee">Arrivée*</label>
                    <input type="text" name="arrivee" id="arrivee"/>
                </div>


                <div data-role="fieldcontain">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" id="address"/>
                </div>


                <div data-role="fieldcontain">
                    <label for="remarque"><?php echo $language->message ?> *</label>
                    <textarea name="remarque" id="remarque" rows="8" cols="25"></textarea>
                </div>


                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="horizontal">
                        <legend>aller_retour</legend>
                        <input type="radio" name="aller_retour" id="aller_retour-1" value="1" checked="checked"/>
                        <label for="aller_retour-1">Aller Retour</label>
                        <input type="radio" name="aller_retour" id="aller_retour-0" value="0"/>
                        <label for="aller_retour-0">Aller_Simple</label>
                    </fieldset>
                </div>


                <fieldset class="ui-grid-a">
                    <div class="ui-block-a">
                        <button type="reset"><?php echo $language->cancel ?></button>
                    </div>
                    <div class="ui-block-b">
                        <button type="submit" id="sbm"><?php echo $language->submit ?></button>
                    </div>
                </fieldset>
            </form>

        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <!-- /footer -->

</div>


<!-- after submit -->
<div data-role="page" id="done">

    <!-- header -->
    <div data-role="header" class="page-header" data-add-back-btn="true">
        <a data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back" rel="external" href="#">Back</a>
        <div class="logo"></div>
        <a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" rel="external"
           class="ui-btn-right">Home</a>
    </div>
    <!--/header -->


    <div data-role="content">

        <!-- title -->
        <h2 class="pageTitle"><span>Success!</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /title -->

        <div class="content-padd">

            <h4>Your email has been sent successfully!</h4>
            <p>We will be in touch soon.</p>

        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <!--    --><?php //include "layouts/footer_fixed.php"?>
    <!-- /footer -->


</div>
<!-- /after submit -->


<?php include "layouts/footer/footer.php" ?>

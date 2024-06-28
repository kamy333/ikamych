<?php require_once('../includes/initialize_transmed.php'); ?>
<?php include_once('assets/contact/assets/config.php'); ?>
<?php include_once('assets/contact/assets/language.php'); ?>
<?php include "layouts/header.php" ?>


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

        <h2 class="pageTitle"><span>Nouveau Client</span></h2>
        <!--        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>-->
        <!-- /banner & title -->

        <div class="content-padd">


            <p>En cas de nouveau client!</p>


            <div id="errors" class="hide ui-corner-all"></div>
            <p align="right">* <?php echo $language->field_required ?></p>
            <form name="form1" id="form1">


                <div data-role="fieldcontain">
                    <label for="pseudo">Pseudo (unique) *</label>
                    <input type="text" name="pseudo" id="pseudo"/>
                </div>

                <div data-role="fieldcontain">
                    <label for="last_name"><?php echo $language->last_name ?> *</label>
                    <input type="text" name="last_name" id="last_name"/>
                </div>

                <div data-role="fieldcontain">
                    <label for="first_name"><?php echo $language->first_name ?> *</label>
                    <input type="text" name="first_name" id="first_name"/>
                </div>


                <div data-role="fieldcontain">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" id="address"/>
                </div>


                <div data-role="fieldcontain">
                    <label for="remarque"><?php echo $language->message ?> *</label>
                    <textarea name="remarque" id="remarque" rows="8" cols="25"></textarea>
                </div>

                <?php if ($list_restrictive) : ?>
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <legend><?php echo $language->list_restrictive ?></legend>
                            <input type="radio" name="list_restrictive" id="list_restrictive-1" value="1"
                                   checked="checked"/>
                            <label for="list_restrictive-1"><?php echo $language->oui ?></label>
                            <input type="radio" name="list_restrictive" id="list_restrictive-0" value="0"/>
                            <label for="list_restrictive-0"><?php echo $language->non ?></label>
                        </fieldset>
                    </div>
                <?php endif ?>


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
    <?php include "layouts/footer.php" ?>
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
    <?php include "layouts/footer_fixed.php" ?>
    <!-- /footer -->


</div>
<!-- /after submit -->


</body>
</html>
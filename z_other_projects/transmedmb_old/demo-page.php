<?php include "layouts/header.php" ?>


<div data-role="page">

    <!-- header -->
    <div data-role="header" class="page-header" data-add-back-btn="true">
        <a href="index.php" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back">Back</a>
        <div class="logo"></div>
        <a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" rel="external"
           class="ui-btn-right">Home</a>
    </div>
    <!--/header -->


    <!-- main content -->
    <div data-role="content">

        <!-- banner & title -->
        <div class="bannerContainer">
            <img src="assets/images/headers/1.jpg" class="banner">
        </div>
        <h2 class="pageTitle"><span>Demo Page</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <h4>This is a demo page used for linking.</h4>


            <fieldset>
                <div><a data-icon="arrow-l" href="page-styles.php" data-role="button" data-direction="reverse"
                        rel="external" data-rel="back">Back</a></div>

            </fieldset>


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <?php include "layouts/footer.php" ?>
    <!-- /footer -->


</div><!-- /page -->


</body>
</html>
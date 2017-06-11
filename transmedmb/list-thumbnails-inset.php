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
        <h2 class="pageTitle"><span>Thumbnail List Inset</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <p>Perfect for a menu, real estate listings, staff members, a list of products, or a blog landing page!</p>


            <!-- list begins -->
            <div class="padd">
                <div class="thumbnail-list">

                    <ul data-filter-placeholder="Search..." data-inset="true" data-filter="true" data-role="listview"
                        data-filter-theme="d">

                        <li class="ui-btn-icon-right">
                            <div class="ui-btn-inner ui-li">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <img class="ui-li-thumb" src="assets/images/demo/thumbs/thumb1.jpg">
                                        <h3 class="ui-li-heading">Logos</h3>
                                        <p class="ui-li-desc">Custom design</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <img class="ui-li-thumb" src="assets/images/demo/thumbs/thumb2.jpg">
                                        <h3 class="ui-li-heading">Business Cards</h3>
                                        <p class="ui-li-desc">The first impression</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <img class="ui-li-thumb" src="assets/images/demo/thumbs/thumb3.jpg">
                                        <h3 class="ui-li-heading">Brochures</h3>
                                        <p class="ui-li-desc">Spread the word</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <img class="ui-li-thumb" src="assets/images/demo/thumbs/thumb4.jpg">
                                        <h3 class="ui-li-heading">Branding</h3>
                                        <p class="ui-li-desc">Make your brand known</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                    </ul>


                </div>
            </div>
            <!-- list ends -->


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="footprints" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="phone" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="camera" data-icon="custom" data-theme="b"
                       data-ajax="false">Portfolio</a></li>
                <li><a href="twitter.php" id="twitter" data-icon="custom" data-theme="b" data-ajax="false">Tweets</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /footer -->


</div><!-- /page -->


</body>
</html>
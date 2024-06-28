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
        <h2 class="pageTitle"><span>Page Styles</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <p>Included with your Mobilize download are over 20 different HTML5 page styles, giving you tons of
                customization options.</p>

            <h3>Included with download:</h3>


            <ul data-role="listview" data-inset="true">
                <li data-role="list-divider" role="heading">Homepage Slider has 24 Effects!</li>
                <li><a href="index.php" data-ajax="false">Demo: Pie Loader, No Nav</a></li>
                <li><a href="index2.php" data-ajax="false">Demo: Bar Loader, With Nav</a></li>


                <li data-role="list-divider" role="heading">Searchable Lists <em>(search is optional)</em></li>
                <li><a href="searchable-list.php">Regular List</a></li>
                <li><a href="searchable-list-inset.php">Regular List Inset</a></li>
                <li><a href="searchable-list-ol.php">Numbered List</a></li>
                <li><a href="searchable-list-ol-inset.php">Numbered List Inset</a></li>
                <li><a href="list-thumbnails.php">Thumbnail List</a></li>
                <li><a href="list-thumbnails-inset.php">Thumbnail List Inset</a></li>
                <li><a href="events.php">Events Style List</a></li>
                <li><a href="events-inset.php">Events Style List Inset</a></li>

                <li data-role="list-divider" role="heading">Extras</li>
                <li><a href="panels.php" data-ajax="false">Panels</a></li>
                <li><a href="twitter.php" data-ajax="false">Twitter Feed</a></li>
                <li><a href="contact.php" data-ajax="false">Contact Form</a></li>
                <li><a href="portfolio.php" data-ajax="false">Portfolio</a></li>
                <li><a href="typography.php">Typography</a></li>
                <li><a href="icons.php">Nav Icons</a></li>
                <li><a href="pop.php" data-rel="dialog" data-transition="pop">Modal Window</a></li>
                <li><a href="pop2.php" data-rel="dialog" data-transition="slidedown">'Slide Down' Modal Window</a></li>
                <li><a href="page-transitions.php">Page Transitions</a></li>
                <li><a href="sticky-footer.php">Sticky Footer</a></li>

                <li data-role="list-divider" role="heading">Page Layouts</li>
                <li><a href="1-column-page.php" data-transition="slideup">One Column</a></li>
                <li><a href="2-column-page.php" data-transition="slideup">Two Columns</a></li>
                <li><a href="3-column-page.php" data-transition="slideup">Three Columns</a></li>
                <li><a href="no-banner-page.php" data-transition="slideup">No Banner</a></li>
            </ul>


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="map" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="cell3" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="brush" data-icon="custom" data-theme="b" data-ajax="false">Portfolio</a>
                </li>
                <li><a href="twitter.php" id="twitter" data-icon="custom" data-theme="b">Tweets</a></li>
            </ul>
        </div>

    </div>
    <!-- /footer -->


</div><!-- /page -->


</body>
</html>
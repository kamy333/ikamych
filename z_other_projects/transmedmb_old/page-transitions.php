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
        <h2 class="pageTitle"><span>Page Transitions</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <h4>9 different page (or modal/dialog) transitions.</h4>
            <p>Try the links below on your mobile device to see the optional page transitions. Different browsers have
                different support for these transitions, the "fade" transition is used as a fallback for browsers with
                weaker support.</p>


            <ul data-role="listview" data-inset="true">
                <li><a href="demo-page.php" data-transition="fade">Fade</a></li>
                <li><a href="demo-page.php" data-transition="pop">Pop</a></li>
                <li><a href="demo-page.php" data-transition="flip">Flip</a></li>
                <li><a href="demo-page.php" data-transition="turn">Turn</a></li>
                <li><a href="demo-page.php" data-transition="flow">Flow</a></li>
                <li><a href="demo-page.php" data-transition="slidefade">Slide Fade</a></li>
                <li><a href="demo-page.php" data-transition="slide">Slide</a></li>
                <li><a href="demo-page.php" data-transition="slideup">Slide Up</a></li>
                <li><a href="demo-page.php" data-transition="slidedown">Slide Down</a></li>
            </ul>


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="closed" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="cell" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="eye" data-icon="custom" data-theme="b" data-ajax="false">Portfolio</a>
                </li>
                <li><a href="twitter.php" id="twitter" data-icon="custom" data-theme="b" data-ajax="false">Tweets</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /footer -->


</div><!-- /page -->


</body>
</html>
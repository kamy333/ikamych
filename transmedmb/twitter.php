<?php include "layouts/header.php" ?>


<body>

<div data-role="page">
    <script>
        jQuery(function () {
            JQTWEET.loadTweets();
        });
    </script>


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
        <h2 class="pageTitle"><span>Our Feed</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <!-- twitter follow button -->
            <div class="followButton">
                <a href="https://twitter.com/BeantownDesign" class="twitter-follow-button" data-show-count="false"
                   data-size="large">Follow @BeantownDesign</a>
                <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");</script>
            </div>
            <!-- /twitter follow button -->

            <!-- twitter feed -->
            <div id="jstwitter"></div>
            <!-- /twitter feed -->


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="footprint" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="cell2" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="photos" data-icon="custom" data-theme="b"
                       data-ajax="false">Portfolio</a></li>
                <li><a href="twitter.php" id="twitter" data-icon="custom" data-theme="b">Tweets</a></li>
            </ul>
        </div>

    </div>
    <!-- /footer -->


</div><!-- /page -->


</body>
</html>
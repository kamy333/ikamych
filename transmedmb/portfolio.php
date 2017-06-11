<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>Mobilize</title>
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png"/>
    <script>
        if (window.screen.height == 568) { // iPhone 4"
            document.querySelector("meta[name=viewport]").content = "width=320.1";
        }
    </script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- scripts -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
    <script src="assets/js/screen.js"></script>
    <script src="assets/portfolio/lib/klass.min.js"></script>
    <script src="assets/portfolio/code.photoswipe.jquery-3.0.5.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css"/>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/portfolio/photoswipe.css">

    <script type="text/javascript">
        (function (window, $, PhotoSwipe) {
            $(document).ready(function () {
                $('div.gallery-page')
                    .live('pageshow', function (e) {
                        var
                            currentPage = $(e.target),
                            options = {},
                            photoSwipeInstance = $("ul.gallery a", e.target).photoSwipe(options, currentPage.attr('id'));
                        return true;
                    })

                    .live('pagehide', function (e) {

                        var
                            currentPage = $(e.target),
                            photoSwipeInstance = PhotoSwipe.getInstance(currentPage.attr('id'));

                        if (typeof photoSwipeInstance != "undefined" && photoSwipeInstance != null) {
                            PhotoSwipe.detatch(photoSwipeInstance);
                        }
                        return true;
                    });
            });
        }(window, window.jQuery, window.Code.PhotoSwipe));
    </script>

</head>

<body>

<div data-role="page">


    <!-- header -->
    <div data-role="header" class="page-header">
        <a href="index.php" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back"
           rel="external">Back</a>
        <div class="logo"></div>
        <a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" rel="external"
           class="ui-btn-right">Home</a>
    </div>
    <!--/header -->


    <div data-role="content">

        <!-- banner & title -->
        <div class="bannerContainer">
            <img src="assets/images/headers/1.jpg" class="banner">
        </div>
        <h2 class="pageTitle"><span>Portfolio</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">

            <h3>View our latest work below!</h3>
            <p>For the best experience view these galleries on your mobile device, <em>(where you can use your finger to
                    swipe to the next/previous photo)</em>.</p>


            <ul data-role="listview" data-inset="false" class="mt15 mb15">
                <li><a href="#Gallery1">First Gallery</a></li>
                <li><a href="#Gallery2">Second Gallery</a></li>
            </ul>


            <p>This integrated gallery is a great way to show off photos, print work, real estate listings, or anything
                else... <em>on the go!</em></p>

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

</div>


<!-- gallery 1 -->
<div data-role="page" data-add-back-btn="true" id="Gallery1" class="gallery-page page-header" style="background:#111">

    <div data-role="header" class="page-header">
        <a href="index.php" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back"
           rel="external">Back</a>
        <h1>First Gallery</h1>
    </div>


    <div data-role="content" style="background:#111">

        <div class="content-padd">

            <ul class="gallery">

                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
            </ul>

            <p class="gal-description">Click an image to enlarge.</p>

        </div><!-- /content padd -->
    </div><!-- /content -->

</div>
<!-- /gallery 1 -->


<!-- gallery 2 -->
<div data-role="page" data-add-back-btn="true" id="Gallery2" class="gallery-page page-header" style="background:#111">

    <div data-role="header" class="page-header">
        <a href="index.php" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back"
           rel="external">Back</a>
        <h1>Second Gallery</h1>
    </div>

    <div data-role="content" style="background:#111">

        <div class="content-padd">

            <ul class="gallery">

                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
                <li><a href="assets/portfolio/images/2L.jpg" rel="external"><img src="assets/portfolio/images/2s.jpg"
                                                                                 alt="Image Title Here"/></a></li>
                <li><a href="assets/portfolio/images/1L.jpg" rel="external"><img src="assets/portfolio/images/1s.jpg"
                                                                                 alt="An Amazing Image!"/></a></li>
            </ul>

            <p class="gal-description">Click an image to enlarge.</p>

        </div><!-- /content padd -->
    </div><!-- /content -->

</div>
<!-- /gallery 2 -->


</body>
</html>

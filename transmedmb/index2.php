<?php include "layouts/header.php" ?>


<div id="home-page" data-role="page">

    <!-- slider -->
    <script>
        jQuery(function () {
            jQuery('#camera_wrap').camera({

                loader: 'bar',
                navigation: true,
                navigationHover: false,

            });
        });
    </script>
    <!-- /slider -->

    <!-- header -->
    <div data-role="header" class="page-header">
        <div class="logo"></div>
    </div>
    <!--/header -->


    <!-- main content -->
    <div data-role="content">

        <!-- slider -->
        <div class="slider-outer">
            <div class="slider-container">
                <div id="camera_wrap">

                    <div data-src="assets/images/demo/slides/1.jpg">
                        <div class="camera_caption fadeFromBottom">
                            Touch Optimized Responsive Slider!
                        </div>
                    </div>

                    <div data-src="assets/images/demo/slides/2.jpg">
                        <div class="camera_caption fadeFromBottom">
                            24 Effects, Optional Captions!
                        </div>
                    </div>

                    <div data-src="assets/images/demo/slides/3.jpg">
                        <div class="camera_caption fadeFromBottom">
                            &laquo; Swipe With Your Finger &raquo;
                        </div>
                    </div>

                    <div data-src="assets/images/demo/slides/4.jpg">
                    </div>

                </div>
            </div>
            <br class="clear"/>
        </div><!-- /slider -->

        <div class="shadow1box">
            <img src="assets/images/shadow1.png" class="shadow1" alt="shadow">
        </div>

        <div class="content-padd">

            <hr class="ornamental"/>
            <h3 class="home-title">Welcome to Mobilize!</h3>
            <hr class="ornamental"/>

            <!-- navigation -->
            <ul data-role="listview" data-inset="true" id="listview" style="margin-bottom:0px">

                <li><a href="about.php" data-prefetch>About</a></li>
                <li><a href="page-styles.php" data-prefetch>Page Styles</a></li>
                <li><a href="icons.php" data-transition="flip" data-prefetch>Nav Icons</a></li>
                <li><a href="contact.php" data-prefetch data-ajax="false">Contact Form</a></li>
            </ul>

            <div class="shadow2box"><img src="assets/images/shadow2.png" class="shadow2" alt="shadow"></div>
            <!-- /navigation -->


            <p>With 20+ page styles and over 60 HD navigation icons creating a mobile website for your business has
                never been easier!</p>

            <p>Clients can get directions or call you with one click, check your Twitter feed on the move, even view
                your recent projects in a touch optimized gallery!</p>

            <!-- social -->
            <div class="social">
                <a href="http://on.fb.me/x0BFYB"><img src="assets/images/social/fb-b.png" alt="facebook"></a>
                <a href="http://twitter.com/beantowndesign"><img src="assets/images/social/twitter2-b.png"
                                                                 alt="twitter"></a>
                <a href="#"><img src="assets/images/social/linkedin-b.png" alt="linkedin"></a>
                <a href="#"><img src="assets/images/social/dribble-b.png" alt="dribble"></a>
                <a href="#"><img src="assets/images/social/wordpress-b.png" alt="wordpress"></a>
            </div>
            <!-- /social -->


        </div><!-- /content padd -->
    </div><!-- /content -->


    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons" data-grid="c">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="sign" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="cell" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="brush" data-icon="custom" data-theme="b" data-ajax="false">Portfolio</a>
                </li>
                <li><a href="twitter.php" id="twitter" data-icon="custom" data-theme="b">Tweets</a></li>
            </ul>
        </div>

    </div>
    <!-- /footer -->

</div><!-- /page -->


<!-- add to homepage bubble on iphone, ipad  -->
<script type="text/javascript">
    if ('standalone' in navigator && !navigator.standalone && (/iphone|ipod|ipad/gi).test(navigator.platform) && (/Safari/i).test(navigator.appVersion)) {
        document.write('<link rel="stylesheet" href="assets\/add-bubble\/style\/add2home.css">');
        document.write('<script type="application\/javascript" src="assets\/add-bubble\/src\/add2home.js" charset="utf-8"><\/s' + 'cript>');
    }
</script>
<!-- /add to homepage bubble on iphone, ipad  -->

</body>
</html>
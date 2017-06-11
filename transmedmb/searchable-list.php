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
        <h2 class="pageTitle"><span>Searchable List</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">

            <p>Let the users of your site find the content that <strong>really matters</strong>!</p>


            <!-- list begins -->
            <div class="padd">

                <ul class="ui-listview" data-filter-theme="d" data-filter-placeholder="Search..." data-filter="true"
                    data-role="listview">

                    <li data-role="list-divider" role="heading">Appetizers</li>
                    <li><a href="demo-page.php" data-transition="flip">Onion Rings</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Spinach Dip</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Fries</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Chicken Wings</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Sliders</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Mozzarella Sticks</a></li>

                    <li data-role="list-divider" role="heading">Sandwiches</li>
                    <li><a href="demo-page.php" data-transition="flip">Reuben</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Fajita Rollup</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Meatball</a></li>
                    <li><a href="demo-page.php" data-transition="flip">BBQ Chicken</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Cheesburger</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Clubhouse Special</a></li>

                    <li data-role="list-divider" role="heading">Entrees</li>
                    <li><a href="demo-page.php" data-transition="flip">Steak</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Chicken Penne</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Fettuccine Carbonara</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Cheese Ravioli</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Cadillac</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Fish &amp; Chips</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Baked Haddock</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Tilapia</a></li>

                    <li data-role="list-divider" role="heading">Drinks</li>
                    <li><a href="demo-page.php" data-transition="flip">Margarita</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Strawberry Daquiri</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Hurricane</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Mojito</a></li>
                    <li><a href="demo-page.php" data-transition="flip">Bahama Mama</a></li>
                </ul>

            </div>
            <!-- list ends -->


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="sign" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="cell" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="photos2" data-icon="custom" data-theme="b"
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
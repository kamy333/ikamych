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
        <h2 class="pageTitle"><span>Numbered List</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <p>Let the users of your site find the content that <strong>really matters</strong>!</p>


            <!-- list begins -->
            <div class="padd">

                <ol class="ui-listview" data-filter-theme="d" data-filter-placeholder="Search..." data-filter="true"
                    data-role="listview">

                    <li data-role="list-divider" role="heading">Accesories</li>
                    <li><a href="demo-page.php" data-transition="slidedown">Watches</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Wallets</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Rings</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Hats</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Sunglasses</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Belts</a></li>

                    <li data-role="list-divider" role="heading">Tops</li>
                    <li><a href="demo-page.php" data-transition="slidedown">Basic Tees</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Blazers</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Kardigans</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Knit Tops</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Jackets</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Hoodies</a></li>

                    <li data-role="list-divider" role="heading">Pants</li>
                    <li><a href="demo-page.php" data-transition="slidedown">Jeans</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Slacks</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Cargo</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Golf</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Capris</a></li>

                    <li data-role="list-divider" role="heading">Shoes</li>
                    <li><a href="demo-page.php" data-transition="slidedown">Casual</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Running Sneakers</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Skateboard Shoes</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Dress Shoes</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Basketball</a></li>
                    <li><a href="demo-page.php" data-transition="slidedown">Tuxedo</a></li>
                </ol>

            </div>
            <!-- list ends -->


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="footprints" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="chat" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="paint-brush" data-icon="custom" data-theme="b" data-ajax="false">Portfolio</a>
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
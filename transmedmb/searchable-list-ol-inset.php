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
                    data-role="listview" data-inset="true">

                    <li data-role="list-divider" role="heading">Accesories</li>
                    <li><a href="demo-page.php">Watches</a></li>
                    <li><a href="demo-page.php">Wallets</a></li>
                    <li><a href="demo-page.php">Rings</a></li>
                    <li><a href="demo-page.php">Hats</a></li>
                    <li><a href="demo-page.php">Sunglasses</a></li>
                    <li><a href="demo-page.php">Belts</a></li>

                    <li data-role="list-divider" role="heading">Tops</li>
                    <li><a href="demo-page.php">Basic Tees</a></li>
                    <li><a href="demo-page.php">Blazers</a></li>
                    <li><a href="demo-page.php">Kardigans</a></li>
                    <li><a href="demo-page.php">Knit Tops</a></li>
                    <li><a href="demo-page.php">Jackets</a></li>
                    <li><a href="demo-page.php">Hoodies</a></li>

                    <li data-role="list-divider" role="heading">Pants</li>
                    <li><a href="demo-page.php">Jeans</a></li>
                    <li><a href="demo-page.php">Slacks</a></li>
                    <li><a href="demo-page.php">Cargo</a></li>
                    <li><a href="demo-page.php">Golf</a></li>
                    <li><a href="demo-page.php">Capris</a></li>

                    <li data-role="list-divider" role="heading">Shoes</li>
                    <li><a href="demo-page.php">Casual</a></li>
                    <li><a href="demo-page.php">Running Sneakers</a></li>
                    <li><a href="demo-page.php">Skateboard Shoes</a></li>
                    <li><a href="demo-page.php">Dress Shoes</a></li>
                    <li><a href="demo-page.php">Basketball</a></li>
                    <li><a href="demo-page.php">Tuxedo</a></li>
                </ol>

            </div>
            <!-- list ends -->


        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <div data-role="footer">
        <div data-role="navbar" class="custom-icons">
            <ul>
                <li><a href="http://bit.ly/yx2mXZ" id="run" data-icon="custom" data-theme="b">Directions</a></li>
                <li><a href="tel:18005551234" id="phone" data-icon="custom" data-theme="b">Call Us</a></li>
                <li><a href="portfolio.php" id="music" data-icon="custom" data-theme="b" data-ajax="false">Portfolio</a>
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
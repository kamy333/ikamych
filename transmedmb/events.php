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
        <h2 class="pageTitle"><span>Events Style List</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <p>Now your clients can easily search for a future event, or quickly find out the details of an event the're
                already at!</p>


            <!-- list begins -->
            <div class="padd">
                <div class="events-list">


                    <ul class="ui-listview" data-filter-theme="d" data-filter-placeholder="Search events..."
                        data-filter="true" data-role="listview">

                        <li data-role="list-divider">
                            Monday, August 4, 2012
                            <span class="ui-li-count">2</span>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>2:00</strong>
                                            PM </p>
                                        <h3 class="ui-li-heading">jQuery Meetup</h3>
                                        <p class="ui-li-desc">
                                            <strong>First of many events taking place in Boston, MA</strong></p>
                                        <p class="ui-li-desc">Mark your calendar, this is going to be great!</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>10:30</strong>
                                            AM </p>
                                        <h3 class="ui-li-heading">WordPress Brunch</h3>
                                        <p class="ui-li-desc">
                                            <strong>Come meet local WordPress enthusiasts.</strong></p>
                                        <p class="ui-li-desc">Currently looking for guest speakers.</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>


                        <li data-role="list-divider">
                            Wednesday, October 16, 2012
                            <span class="ui-li-count">4</span>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>5:30</strong>
                                            PM </p>
                                        <h3 class="ui-li-heading">Dinner at Rex</h3>
                                        <p class="ui-li-desc">
                                            <strong>Burgers for everyone.</strong></p>
                                        <p class="ui-li-desc">Come join local burger enthusiasts.</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>2:00</strong>
                                            PM </p>
                                        <h3 class="ui-li-heading">Interior Decorating 101</h3>
                                        <p class="ui-li-desc">
                                            <strong>A new event with some top talent.</strong></p>
                                        <p class="ui-li-desc">Curtains, rugs, and pillows galore.</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>11:30</strong>
                                            AM </p>
                                        <h3 class="ui-li-heading">Photoshop Convention</h3>
                                        <p class="ui-li-desc">
                                            <strong>Shop &amp; Chop</strong></p>
                                        <p class="ui-li-desc">Learn from top Photoshop experts.</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>9:00</strong>
                                            AM </p>
                                        <h3 class="ui-li-heading">Web Design for Smarties</h3>
                                        <p class="ui-li-desc">
                                            <strong>Do you have what it takes?</strong></p>
                                        <p class="ui-li-desc">Come show off your design chops.</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li data-role="list-divider">
                            Sunday, December 20, 2012
                            <span class="ui-li-count">2</span>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>11:30</strong>
                                            AM </p>
                                        <h3 class="ui-li-heading">CSS3 Tricks</h3>
                                        <p class="ui-li-desc">
                                            <strong>Tables are gone, gradients are here.</strong></p>
                                        <p class="ui-li-desc">Great talks planned, be here!</p>
                                    </a></div>
                                <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div>
                        </li>

                        <li class="ui-btn-icon-right ui-li-has-arrow">
                            <div class="ui-btn-inner ui-li" aria-hidden="true">
                                <div class="ui-btn-text">
                                    <a class="ui-link-inherit" href="demo-page.php">
                                        <p class="ui-li-aside ui-li-desc">
                                            <strong>7:00</strong>
                                            AM </p>
                                        <h3 class="ui-li-heading">Snow Day</h3>
                                        <p class="ui-li-desc">
                                            <strong>Group trip to the mountains.</strong></p>
                                        <p class="ui-li-desc">Save the date..we're going snowboarding!</p>
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
    <?php include "layouts/footer.php" ?>
    <!-- /footer -->


</div><!-- /page -->


</body>
</html>
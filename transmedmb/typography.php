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
        <h2 class="pageTitle"><span>Typography</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">

            <h1>Header Level 1</h1>

            <p><strong>This is bold text</strong>, here is regular text. Vestibulum tortor quam, feugiat vitae,
                ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean
                    ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien
                ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>here is code</code>, ornare sit amet,
                wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus
                enim ac dui. <a href="#">this is a link</a> in turpis pulvinar facilisis. Ut felis.</p>

            <h2>Header Level 2</h2>

            <ol>
                <li>Ordered List.</li>
                <li>Lorem ipsum dolor.</li>
                <li>Aliquam tincidunt.</li>
            </ol>


            <h3>Header Level 3</h3>

            <ul>
                <li>Unordered List.</li>
                <li><a href="tel:18005551234">This link calls a phone number (pushed on a phone).</a></li>
                <li><a href="mailto:joe@example.com">This is a basic email link.</a></li>
                <li>
                    <a href="mailto:joe@example.com?cc=sally@example.com&bcc=eddy@example.com&subject=Important%20Message&body=You%20should%20checkout%20the%20Mobilize%20mobile%20theme%20on%20Theme%20Forest!">This
                        link opens your email program wih a filled out email ready to go.</a></li>
            </ul>


            <h3>Hey look, an accordion!</h3>


            <!-- accordion -->
            <div data-role="collapsible-set">

                <div data-role="collapsible" data-collapsed="false">
                    <h3>Open Me!</h3>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                </div>

                <div data-role="collapsible">
                    <h3 style="background:#000">Open Me Too!</h3>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                </div>

                <div data-role="collapsible">
                    <h3>Or Me!</h3>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                </div>

                <div data-role="collapsible">
                    <h3>Last!</h3>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                </div>

            </div>
            <!-- /accordion -->


            <!-- 2 col -->
            <h3>2 Column Grid</h3>

            <div class="ui-grid-a">
                <div class="ui-block-a">
                    <div class="grid-box">
                        <strong>Column 1</strong><br/>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est.
                    </div>
                </div>

                <div class="ui-block-b">
                    <div class="grid-box">
                        <strong>Column 2</strong><br/>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est.
                    </div>
                </div>
            </div>
            <!-- /2 col -->


            <!-- 3 col -->
            <h3>3 Column Grid</h3>

            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <div class="grid-box">
                        <strong>Block A</strong><br/>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est.
                    </div>
                </div>

                <div class="ui-block-b">
                    <div class="grid-box">
                        <strong>Block B</strong><br/>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est.
                    </div>
                </div>

                <div class="ui-block-c">
                    <div class="grid-box">
                        <strong>Block C</strong><br/>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit amet quam egestas semper. Aenean ultricies mi vitae est.
                    </div>
                </div>
            </div>
            <!-- /3 col -->


            <div class="ui-bar ui-bar-c mt15">
                <p>Here is a "callout" box which can easily be wrapped around a section to grab some extra
                    attention.</p>
                <p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
            </div>


            <h3>Button Examples</h3>


            <fieldset class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-role="button">A Button!</a></div>
                <div class="ui-block-b"><a href="#" data-role="button">Another!</a></div>
            </fieldset>

            <a href="#" data-role="button">Full Size Button!</a>


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
                <li><a href="twitter.php" id="twitter" data-icon="custom" data-theme="b" data-ajax="false">Tweets</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /footer -->


</div><!-- /page -->


</body>
</html>
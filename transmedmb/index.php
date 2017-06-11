<?php require_once('../includes/initialize_transmed.php'); ?>
<?php include "layouts/header.php" ?>


<div id="home-page" data-role="page">

    <!-- main content -->
    <div data-role="content">

        <!-- header logo -->
        <!--/header logo-->

        <!-- slider -->
        <!-- slider -->

        <div class="shadow1box">
            <img src="assets/images/shadow1.png" class="shadow1" alt="shadow">
        </div>

        <div class="content-padd">

            <!--  	<hr class="ornamental"/>-->
            <h3 class="home-title">Transmed</h3>
            <!--	<hr class="ornamental"/>-->
            <!--        http://localhost/ikamych/transmed/index.php-->
            <!-- navigation -->
            <ul data-role="listview" data-inset="true" id="listview" style="margin-bottom:0px">
                <li><a href="<?php echo $Nav->http ?>transmed/index.php" rel="external">Desktop</a></li>
                <li><a href="<?php echo $Nav->http ?>transmb/index.php" rel="external">Transmed Mobile</a></li>

                <li><a href="transport.php?class_name=Course" data-prefetch>Course</a></li>
                <li><a href="transport.php?class_name=Model" data-prefetch>Model</a></li>
                <li><a href="transport.php?class_name=TransportClient" data-prefetch>Client</a></li>
                <li><a href="transport.php?class_name=TransportChauffeur" data-prefetch>Chauffeur</a></li>
                <li><a href="transport.php?class_name=TransportType" data-prefetch>TransportType</a></li>

                <li><a href="about.php" data-prefetch>About</a></li>
                <li><a href="page-styles.php" data-prefetch>Page Styles</a></li>
                <li><a href="icons.php" data-transition="flip" data-prefetch>Nav Icons</a></li>
                <li><a href="contact.php" data-prefetch data-ajax="false">Contact Form</a></li>
                <li><a href="tform_client.php" data-prefetch data-ajax="false">Nouveau Client Form</a></li>

                <li><a href="tpseudo.php" data-prefetch data-ajax="false">Pseudo</a></li>
                <li><a href="tform_course.php" data-prefetch data-ajax="false">Nouvelle Course Form</a></li>
                <li><a href="tform_model.php" data-prefetch data-ajax="false">Nouveau Model Form</a></li>

                <li><a href="tcourse.php" data-prefetch data-ajax="false">Course</a></li>
                <li><a href="tmodel.php" data-prefetch data-ajax="false">Course</a></li>


            </ul>


            <ul data-role="listview" data-inset="true" id="listview" style="margin-bottom:0px">

                <li><a style="background-color: red;color: white" href="about.php" data-prefetch>7:30 - NAFISSPOUR -
                        PABLO ARZA</a></li>
                <li><a style="background-color: green;color: white;" href="page-styles.php" data-prefetch>Page
                        Styles</a></li>
                <li><a style="background-color: #fdff05;color: black" href="icons.php" data-transition="flip"
                       data-prefetch>Nav Icons</a></li>
                <li><a href="contact.php" data-prefetch data-ajax="false">Contact Form</a></li>
            </ul>

            <div class="shadow2box"><img src="assets/images/shadow2.png" class="shadow2" alt="shadow"></div>
            <!-- /navigation -->


            <p>With 20+ page styles and over 60 HD navigation icons creating a mobile website for your business has
                never been easier!</p>

            <p>Clients can get directions or call you with one click, check your Twitter feed on the move, even view
                your recent projects in a touch optimized gallery!</p>


        </div><!-- /content padd -->
    </div><!-- /content -->


    <!-- footer -->
    <?php include "layouts/footer_fixed.php" ?>
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
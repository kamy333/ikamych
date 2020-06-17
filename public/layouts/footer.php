<?php echo str_repeat("<br>", 4); ?>
<footer class="row nav navbar-fixed-bottom my_footer">
    <div class="row">
        <div class="socialmediaicons pull-right" style="margin-right: 5em;">

        </div>
        <div class="text-center">
            <p class="text-center">
                <small>&#xA9;&nbsp;2014 - <?php echo date("Y"); ?>,<?php echo " " . $logo; ?> </small>
            </p>
        </div>
    </div>
</footer>

</div>   <!--Div class container-->


<script src="//code.jquery.com/jquery-latest.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="<?php echo $Nav->path_public; ?>myjs/socialmedia.js"></script>


<?php

if ($Nav->current_page == "transmed_form2") {
    ?>
    <script>

        function ttd(data) {
            return "<td>" + data + "</td>";
        }

        var myHttp = '<?php echo $http;  ?>';

        $.getJSON(myHttp, function (data) {
            var d = data.feed.entry;

            var myFirst;
            var myLast;
            var myEmail;
            var myApproved;
            var myAge;
            var mytd;

            jQuery.each(d, function () {
                myFirst = ttd(this['gsx$first']['$t']);
                myLast = ttd(this['gsx$last']['$t']);
                myEmail = ttd(this['gsx$email']['$t']);
                myApproved = ttd(this['gsx$approved']['$t']);
                myAge = ttd(this['gsx$age']['$t']);
                myTd = myFirst + myLast + myEmail + myApproved + myAge;
//                console.log(myFirst);
                $('#myTable').find('tr:last').after('<tr>' + myTd + '</tr>');
            });

            console.log(d);
        });


    </script>


<?php } ?>


<?php
if ($Nav->current_page == "transmed_form3") {
    ?>
    <script>


        function ttd(data) {
            return "<td>" + data + "</td>";
        }

        //var myHttp = '<?php //echo $http;  ?>//';
        var myHttp = 'https://spreadsheets.google.com/feeds/list/1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g/1/public/values?alt=json';

        $.getJSON(myHttp, function (data) {
            var d = data.feed.entry;
            console.log(d);


            var timestamp;
            var datedelacourse;
            var heurecourse;
            var nomclient;
            var typetransport;
            var adressededepart;
            var adressedarrivee;
            var allersimpleouallerretour;
            var heureretour;
            var dateretour;
            var emailaddress;
            var chauffeur;
            var myTd;

            jQuery.each(d, function () {
                timestamp = ttd(this['gsx$timestamp']['$t']);
                datedelacourse = ttd(this['gsx$datedelacourse']['$t']);
                heurecourse = ttd(this['gsx$heurecourse']['$t']);
                nomclient = ttd(this['gsx$nomclient']['$t']);
                typetransport = ttd(this['gsx$typetransport']['$t']);
                adressededepart = ttd(this['gsx$adressededepart']['$t']);
                adressedarrivee = ttd(this['gsx$adressedarrivee']['$t']);
                allersimpleouallerretour = ttd(this['gsx$allersimpleouallerretour']['$t']);
                heureretour = ttd(this['gsx$heureretour']['$t']);
                dateretour = ttd(this['gsx$dateretour']['$t']);
                emailaddress = ttd(this['gsx$emailaddress']['$t']);
                chauffeur = ttd(this['gsx$chauffeur']['$t']);

                myTd = timestamp + datedelacourse + heurecourse + nomclient + typetransport + adressededepart + adressedarrivee + allersimpleouallerretour
                    + heureretour + dateretour + emailaddress + chauffeur;
//                console.log(myFirst);
                $('#myTableCourses').find('tr:last').after('<tr>' + myTd + '</tr>');
            });

            console.log(d);
        });

    </script>
<?php } ?>




<?php
if ($Nav->current_page == "transmed_form4") {
    ?>
    <script>


        function ttd(data) {
            return "<td>" + data + "</td>";
        }

        //var myHttp = '<?php //echo $http;  ?>//';
        var myHttp = 'https://spreadsheets.google.com/feeds/list/1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g/2/public/values?alt=json';

        $.getJSON(myHttp, function (data) {
            var d = data.feed.entry;
            console.log(d);


            var timestamp;
            var nomchauffeur;
            var date;
            var heurededebut;
            var heuredefin;
            var commentaire;
            var myTd;


            jQuery.each(d, function () {
                timestamp = ttd(this['gsx$timestamp']['$t']);
                nomchauffeur = ttd(this['gsx$nomchauffeur']['$t']);
                date = ttd(this['gsx$date']['$t']);
                heurededebut = ttd(this['gsx$heurededebut']['$t']);
                heuredefin = ttd(this['gsx$heuredefin']['$t']);
                commentaire = ttd(this['gsx$commentaire']['$t']);

                myTd = timestamp + nomchauffeur + date + heurededebut + heuredefin + commentaire


//                console.log(myFirst);
                $('#myTableHoraires').find('tr:last').after('<tr>' + myTd + '</tr>');
            });

            console.log(d);
        });

    </script>
<?php } ?>




<?php if ($stylesheets == "fade_php") { ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/public/_js/examples/javascripts/jquery.easing.1.3.js"></script>
    <script src="/public/_js/examples/javascripts/jquery.animate-enhanced.min.js"></script>
    <script src="/public/_js/dist/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $('#slides').superslides({
            animation: 'fade'
        });
    </script>


<?php } ?>

<?php
if (substr($Nav->current_page, 0, 7) == "manage_" ||
    substr($Nav->current_page, 0, 4) == "new_" ||
    substr($Nav->current_page, 0, 5) == "edit_"
    || $Nav->current_page == 'profile'
) { ?>

    <script src="<?php echo $Nav->path_public; ?>js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo $Nav->path_public; ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/chosen/chosen.jquery.js"></script>

    <!-- JSKnob -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Data picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- NouSlider -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- Switchery -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Typehead -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/typehead/bootstrap3-typeahead.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script src="<?php echo $Nav->path_public . "myjs/formKamy.js"; ?>"></script>

    <!--    <script>  $('.clockpicker').clockpicker();</script>-->

<?php } ?>




<?php if (isset($javascript) && $javascript == "some_data") { ?>
    <script src="<?php echo $Nav->path_public . "myjs/some_data"; ?>"></script>
<?php } ?>


<?php if (isset($javascript) && $javascript == "InvoiceActual") { ?>
    <script src="<?php echo $Nav->path_public; ?>myjs/InvoiceActual.js"></script>
<?php } ?>


<?php if (isset($javascript) && $javascript == "InvoiceActual_Row") { ?>
    <script src="<?php echo $Nav->path_public; ?>myjs/InvoiceActual_Row.js"></script>
<?php } ?>

<?php if (isset($javascript) && $javascript == "ajax") { ?>
    <script src="<?php echo $Nav->path_public; ?>myjs/ajax_db.js"></script>
<?php } ?>


<script src="<?php echo $Nav->path_public; ?>js/test_tooltips.js"></script>

<?php echo str_repeat("<br>", 50) ?>

</body>


</html>
<?php if (isset($database)) {
    $database->close_connection();
} ?>

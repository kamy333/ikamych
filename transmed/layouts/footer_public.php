<div class="row nav navbar-fixed-bottom">
    <div class="pull-right">

    </div>
    <div class="text-center">
        <strong></strong><?php echo $logo; ?> &copy; 2014-<?php echo date("Y"); ?>

    </div>
</div>

</div>
</div>


<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>


<!-- Flot -->
<!--<script src="js/plugins/flot/jquery.flot.js"></script>-->
<!--<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>-->
<!--<script src="js/plugins/flot/jquery.flot.resize.js"></script>-->

<!-- ChartJS-->
<!--<script src="js/plugins/chartJs/Chart.min.js"></script>-->

<!-- Peity -->
<!--<script src="js/plugins/peity/jquery.peity.min.js"></script>-->
<!-- Peity demo -->
<!--<script src="js/demo/peity-demo.js"></script>-->

<?php //--------------------------------------------------------------------------------- ?>
<?php $pages = array('index_gallery', 'index_video', 'index_gallery2', 'index_gallery3', 'index_gallery4', 'index_gallery5', 'index_gallery6', 'index_gallery7') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>
    <!-- blueimp gallery -->
    <?php include(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "js_php" . DS . 'blueimpVideo.php'); ?>
    <script>
        $(".hover_img").mouseover(function () {
            $(this).css("width", "5em");
            $(this).css("height", "5em");

        }).mouseout(function () {
            $(this).css("width", "3em");
            $(this).css("height", "3em");
        });

    </script>
<?php }
unset($pages) ?>


<?php //--------------------------------------------------------------------------------- ?>
<?php $pages = array('index', 'index_gallery4') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>
    <script>$('.carousel').carousel({interval: 3000})</script>

    <!-- Toastr -->
    <script src="<?php echo $path; ?>js/plugins/toastr/toastr.min.js"></script>
    <?php include(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "js_php" . DS . 'toastr.php'); ?>
    <?php include(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "js_php" . DS . 'blueimpVideo.php'); ?>


<?php }
unset($pages) ?>
<?php //--------------------------------------------------------------------------------- ?>

<?php $pages = array('profile') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>
    <script src="<?php echo $path; ?>myjs/profile.js"></script>
    <script src="<?php echo $path; ?>myjs/profile2.js"></script>

<?php }
unset($pages) ?>


<?php $pages = array('chat') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>

    <!--    --><?php //include (SITE_ROOT.DS.$folder_project_name.DS.'layouts_addon'.DS."js_php".DS.'chat.php');?>
    <script src="js/plugins/summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.summernote').summernote();

        });
        var edit = function () {
            $('.click2edit').summernote({focus: true});
        };
        var save = function () {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script>
<?php }
unset($pages) ?>




<?php if ($Nav->current_page == 'transport') { ?>

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

    <!-- Select2 -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script src="<?php echo $Nav->path_public . "myjs/formKamy.js"; ?>"></script>
    <script src="<?php echo $Nav->path_public . "myjs/transport.js"; ?>"></script>

    <!--    <script>  $('.clockpicker').clockpicker();</script>-->

<?php } ?>



<?php //--------------------------------------------------------------------------------- ?>


</body>

</html>
<?php if (isset($database)) {
    $database->close_connection();
} ?>

</div><!-- end of id="wrapper" -->


<div class="row nav navbar-fixed-bottom">
    <div class="pull-right">

    </div>
    <div class="text-center">
        <span> <small>&#xA9;&nbsp;2014 - <?php echo date("Y") . ', ' . $logo; ?></small></span>
    </div>
</div>

</div>


<!-- Mainly scripts -->

<?php //$normal_pages=array('index','chat','class_manage','class_contacts','expense_loan','forgot_password_email',
//    'login','logout','mail_compose','mail_detail','mailbox','minor','register') ?>


<?php $pages = array('class_edit', 'class_new') // if not pages ?>
<?php if (!in_array($active_menu_clean, $pages)) { ?>
    <script src="<?php echo $path; ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo $path; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $path; ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $path; ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<?php }
unset($pages) ?>

<?php if ($javascript == "class_manage") { ?>
    <script src="<?php echo $path; ?>js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="<?php echo $path; ?>js/plugins/dataTables/datatables.min.js"></script>
<?php } ?>


<!-- Flot -->
<!--<script src="--><?php //echo $path;?><!--js/plugins/flot/jquery.flot.js"></script>-->
<!--<script src="--><?php //echo $path;?><!--js/plugins/flot/jquery.flot.tooltip.min.js"></script>-->
<!--<script src="--><?php //echo $path;?><!--js/plugins/flot/jquery.flot.spline.js"></script>-->
<!--<script src="--><?php //echo $path;?><!--js/plugins/flot/jquery.flot.resize.js"></script>-->
<!--<script src="--><?php //echo $path;?><!--js/plugins/flot/jquery.flot.pie.js"></script>-->

<!-- Peity -->
<!--<script src="--><?php //echo $path;?><!--js/plugins/peity/jquery.peity.min.js"></script>-->
<!--<script src="--><?php //echo $path;?><!--js/demo/peity-demo.js"></script>-->

<!-- Custom and plugin javascript -->
<?php $pages = array('class_edit', 'class_new') // if not pages ?>
<?php if (!in_array($active_menu_clean, $pages)) { ?>
    <script src="<?php echo $path; ?>js/inspinia.js"></script>
    <script src="<?php echo $path; ?>js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo $path; ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>
<?php }
unset($pages) ?>


<?php $pages = array('index') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>
    <!-- Toastr -->
    <script src="<?php echo $path; ?>js/plugins/toastr/toastr.min.js"></script>
    <?php include(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "js_php" . DS . 'toastr.php'); ?>
<?php }
unset($pages) ?>



<?php $pages = array('class_manage') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>
    <?php include(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "js_php" . DS . 'DataTable.php'); ?>
<?php }
unset($pages) ?>


<?php $pages = array('mailbox') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>
    <?php include(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "js_php" . DS . 'mailbox.php'); ?>
<?php }
unset($pages) ?>


<?php $pages = array('class_edit', 'class_new') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>
    <?php include(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "js_php" . DS . 'forms_input.php'); ?>
<?php }
unset($pages) ?>

<?php $pages = array('profile') ?>
<?php if (in_array($active_menu_clean, $pages)) { ?>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>


    <script src="<?php echo $path; ?>myjs/profile.js"></script>
    <script src="<?php echo $path; ?>myjs/profile2.js"></script>

    <script>
        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>


<?php }
unset($pages) ?>


<?php if (substr($Nav->current_page, 0, 7) == "manage_"
    || substr($Nav->current_page, 0, 4) == "new_"
    || substr($Nav->current_page, 0, 5) == "edit_"
    || $Nav->current_page == 'class_manage'
    || $Nav->current_page == 'class_edit'
    || $Nav->current_page == 'class_new'

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

    <!-- Select2 -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/select2/select2.full.min.js"></script>

    <!-- Typehead -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/typehead/bootstrap3-typeahead.min.js"></script>


    <!-- TouchSpin -->
    <script src="<?php echo $Nav->path_public; ?>js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script src="<?php echo $Nav->path_public . "myjs/formKamy.js"; ?>"></script>

    <!--    <script>  $('.clockpicker').clockpicker();</script>-->

    <script>
        $(".glyphicon-triangle-bottom,.glyphicon-triangle-top").css("color", "black");
        //        $("th").css("background-color",'#1ab394').css("color","white");
    </script>

<?php } ?>


</body>

</html>
<?php if (isset($database)) {
    $database->close_connection();
} ?>

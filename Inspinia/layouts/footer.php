
</div><!-- end of id="wrapper" -->

<style>
    body {
        padding-bottom: 24px;
    }

    .ikamy-inspinia-footer {
        min-height: 22px;
        height: 22px;
        margin: 0;
        padding: 2px 12px;
        background: rgba(248, 250, 252, 0.96);
        border-top: 1px solid #d8e0ea;
        color: #64748b;
        font-size: 11px;
        line-height: 18px;
        z-index: 500;
    }

    .ikamy-inspinia-footer img {
        max-height: 18px;
        width: auto;
        vertical-align: middle;
    }

    @media (max-width: 767px) {
        body {
            padding-bottom: 0;
        }

        .ikamy-inspinia-footer {
            display: none !important;
        }
    }
</style>

<div class="row nav navbar-fixed-bottom ikamy-inspinia-footer">
    <div class="pull-right">

    </div>
    <div class="text-center">
        <span> <small>&#xA9;&nbsp;2014 - <?php echo date("Y").', '.$logo; ?></small></span>
    </div>
</div>

</div>




<!-- Mainly scripts -->

<?php //$normal_pages=array('index','chat','class_manage','class_contacts','expense_loan','forgot_password_email',
//    'login','logout','mail_compose','mail_detail','mailbox','minor','register') ?>


<?php $pages=['class_edit','class_new'] // if not pages ?>
<?php if(!in_array($active_menu_clean,$pages) ) { ?>
<script src="<?php echo $path;?>js/jquery-2.1.1.js"></script>
<script src="<?php echo $path;?>js/bootstrap.min.js"></script>
<script src="<?php echo $path;?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo $path;?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<?php } unset($pages) ?>

<?php if($javascript=="class_manage"){ ?>
<script src="<?php echo $path;?>js/plugins/jeditable/jquery.jeditable.js"></script>
<script src="<?php echo $path;?>js/plugins/dataTables/datatables.min.js"></script>
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
<?php $pages=['class_edit','class_new'] // if not pages ?>
<?php if(!in_array($active_menu_clean,$pages) ) { ?>
<script src="<?php echo $path;?>js/inspinia.js"></script>
<script src="<?php echo $path;?>js/plugins/pace/pace.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo $path;?>js/plugins/jquery-ui/jquery-ui.min.js"></script>
<?php } unset($pages) ?>


<?php $pages=['index'] ?>
<?php if(in_array($active_menu_clean,$pages) ) { ?>
    <!-- Toastr -->
    <script src="<?php echo $path;?>js/plugins/toastr/toastr.min.js"></script>
    <?php include (SITE_ROOT.DS.$folder_project_name.DS.'layouts_addon'.DS."js_php".DS.'toastr.php');?>
<?php } unset($pages) ?>



<?php $pages=['class_manage'] ?>
<?php if(in_array($active_menu_clean,$pages) ) { ?>
    <?php include (SITE_ROOT.DS.$folder_project_name.DS.'layouts_addon'.DS."js_php".DS.'DataTable.php');?>
<?php } unset($pages) ?>


<?php $pages=['mailbox'] ?>
<?php if(in_array($active_menu_clean,$pages) ) { ?>
    <?php include (SITE_ROOT.DS.$folder_project_name.DS.'layouts_addon'.DS."js_php".DS.'mailbox.php');?>
<?php } unset($pages) ?>


<?php $pages=['class_edit','class_new'] ?>
<?php if(in_array($active_menu_clean,$pages) ) { ?>
    <?php include (SITE_ROOT.DS.$folder_project_name.DS.'layouts_addon'.DS."js_php".DS.'forms_input.php');?>
<?php } unset($pages) ?>

<?php $pages=['profile'] ?>
<?php if(in_array($active_menu_clean,$pages) ) { ?>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>


    <script src="<?php echo $path;?>myjs/profile.js"></script>
    <script src="<?php echo $path; ?>myjs/profile2.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2-dropdown-special').select2({
                tags: false,
                allowClear: true
            });



        });
    </script>

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


<?php } unset($pages) ?>


</body>

</html>
<?php if(isset($database)) { $database->close_connection(); } ?>

<!--        -->

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <div class="row">
                     <div class="col-md-2 col-xs-4">
        <span><a class="btn btn-primary btn-xm" style="width: 7em;" href="class_new.php?class_name=
<?php if (isset($class_name)) {
                echo $class_name ;
            } ?>">New <?php if (isset($class_name)) {
                    echo $class_name::$page_name;
                } ?></a></span>
                </div>
            <div class="col-md-6 col-xs-4">
                <h2 class="text-center  ">
                    <span class="hidden-sm hidden-xs">
                    Manage <?php echo $class_name::$page_name; ?>
                     <?php echo str_repeat("&nbsp;", 3); ?>
                    </span>
                     <span>
                    <?php echo $class_name::get_modal_search() ?>
            </span>
                </h2>

            </div>
                <div class=" pull-right  col-xs-4 text-right">
        <span><a class="btn btn-primary btn-xm" style="width: 7em;" href="<?php echo $page_link_view; ?>"><?php echo $page_link_text; ?></a></span><?php// echo str_repeat("&nbsp;", 7); ?>
                </div>
    </div>


        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="fullscreen-link">
                <i class="fa fa-expand"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">

        <div class="table-responsive">
            <table id="<?php echo "table".$class_name?>" class="table table-striped table-bordered table-hover dataTables-example" >
<!--            <table id="--><?php //echo "table".$class_name?><!--" class="display" cellspacing="0" width="100%" >-->
                <thead>
                <tr>

                    <?php echo $class_name::display_table_head_new($view_full_table); ?>
                    
                    
                </tr>
                </thead>
                <tbody>

                <?php echo $class_name::display_all_new($view_full_table); ?>

                </tbody>
                <tfoot>
                <tr>
<!--                    --><?php //echo $class_name::display_table_head_new(); ?>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <span><a class="btn btn-primary btn-xm" style="width: 7em;" href="class_new.php?class_name=<?php echo $class_name ; ?>">New <?php echo $class_name::$page_name; ?></a></span>
            </div>

            <div class=" col-md-6 col-xs-6 text-right">
                <span><a class="btn btn-primary btn-xm" style="width: 7em;" href="<?php echo $page_link_view; ?>"><?php echo $page_link_text; ?></a></span><?php echo str_repeat("&nbsp;", 7); ?>
            </div>
        </div>


    </div>
</div>
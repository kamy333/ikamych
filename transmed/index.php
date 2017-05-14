<?php require_once('../includes/initialize_transmed.php'); ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>

<?php


?>
<?php //   echo __DIR__;  ?>
    <div class="wrapper wrapper-content">

        <div class="container">
            <div class="jumbotron" style="background: white">
                <h1>Bienvenue sur Transmed Service</h1>
                <p>Tel +41 79 321 0893</p>
                <!--                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
                <div class="row bg-white">
                    <p class="text-center">Model</p>
                    <?php echo button_color('primary', 'View Model', 'transport.php?cl=ViewModel', ''); ?>
                    <?php echo button_color('primary', 'View VisibleNo', 'transport.php?cl=ViewVisibleNo', ''); ?>
                    <?php echo button_color('success', 'View VisibleYes', 'transport.php?cl=ViewVisibleYes', ''); ?>
                    <?php echo button_color('primary', 'View Pivot all', 'transport.php?cl=ViewPivot', ''); ?>

                    <?php echo button_color('primary', 'View PivotNo', 'transport.php?cl=ViewPivotNo', ''); ?>
                    <?php echo button_color('danger', 'View PivotYes', 'transport.php?cl=ViewPivotYes', ''); ?>
                    <?php echo button_color('warning', 'View Summary', 'transport.php?cl=ViewSummary', ''); ?>

                </div>
                <div class="hr-line-dashed"></div>
                <div class="row bg-white">
                    <p class="text-center">Transport</p>
                    <?php echo button_color('success', 'Model', 'transport.php?cl=Model', ''); ?>
                    <?php echo button_color('primary', 'Courses', 'transport.php?class_name=Course', ''); ?>
                    <?php echo button_color('primary', 'Clients', 'transport.php?cl=tClient', ''); ?>
                    <?php echo button_color('danger', 'Chauffeur', 'transport.php?cl=Chauffeur', ''); ?>
                    <?php echo button_color('warning', 'Transport Type', 'transport.php?cl=TransportType', ''); ?>

                </div>
                <div class="hr-line-dashed"></div>

                <div class="row bg-white">
                    <p class="text-center">Transport</p>
                    <?php echo button_color('primary', 'Courses', 'manage_ajax.php?class_name=TransportProgramming', 'admin'); ?>
                    <?php echo button_color('success', h('Modéle'), 'manage_ajax.php?class_name=TransportProgrammingModel', 'admin'); ?>
                    <?php echo button_color('primary', 'Clients', 'manage_ajax.php?class_name=TransportClient', 'admin'); ?>
                    <?php echo button_color('danger', 'Chauffeur', 'manage_ajax.php?class_name=TransportChauffeur', 'admin'); ?>
                    <?php echo button_color('warning', 'Transport Type', 'manage_ajax.php?class_name=TransportType', 'admin'); ?>
                </div>
                <div class="hr-line-dashed"></div>


                <div class="row bg-white">
                    <p class="text-center"><?php echo h('Dépenses'); ?></p>
                    <?php echo button_color('primary', 'Frais', '', 'admin'); ?>
                    <?php echo button_color('info', 'Essence', '', 'admin'); ?>
                    <hr>
                </div>

                <div class="row bg-white">
                    <p class="text-center">Autres</p>
                    <?php echo button_color('primary', 'Profile', 'profile.php?', ''); ?>
                    <?php echo button_color('primary', 'Profile', 'profile.php?', ''); ?>

                    <?php echo button_color('success', 'Messages', 'manage_ajax.php?class_nane=Message ', 'admin'); ?>
                    <?php echo button_color('info', 'Notifications', 'manage_ajax.php?class_name=Notification', 'admin'); ?>
                    <?php echo button_color('danger', 'To Dos', 'manage_ajax.php?class_name=ToDoList', 'admin'); ?>
                    <?php echo button_color('warning', 'Heure presences', 'manage_ajax.php?class_name=HeurePresence', 'admin'); ?>


                </div>
                <div class="hr-line-dashed"></div>


            </div>
        </div>


    </div>

    <!--    </div>-->


<?php include(FOOTER_PUBLIC); ?>
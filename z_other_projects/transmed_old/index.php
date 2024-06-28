<?php require_once('../includes/initialize_transmed.php'); ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>


<?php //echo "http://localhost/ikamych/transmed/index.php";
//echo "<hr>";
//      echo "http://localhost/ikamych/transmed/index.php";
////http://localhost/ikamych/transmed/index.php
//?>


<?php //   echo __DIR__;  ?>
    <div class="wrapper wrapper-content">

        <div class="container">
            <div class="jumbotron" style="background: white">
                <h1>Bienvenue sur Transmed Service</h1>
                <p>Tel +41 79 321 0893</p>
                <!--                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
                <div class="row bg-white">
                    <p class="text-center">Transport</p>

                    <div class="text-center">
                        <?php echo button_color('success', "<i class='fa fa-home'>&nbsp;Mobile transmedmb</i>", '../transmedmb/index.php', ''); ?>

                        <?php echo button_color('info', "<i class='fa fa-home'>&nbsp;Mobile transmb</i>", '../transmb/index.php', ''); ?>

                        <?php echo button_color('info', "<i class='fa fa-calendar'>&nbsp;Calendar</i>", 'calendar.php', ''); ?>


                        <?php echo button_color('danger', "<i class='fa fa-home'>&nbsp;mobilizer</i>", '../mobilizer/html/index.html', ''); ?>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <?php echo button_color('success', "<i class='fa fa-maxcdn'>&nbsp;Model</i>", 'transport.php?class_name=Model', ''); ?>

                    <?php echo button_color('primary', "<i class='fa fa-automobile'>&nbsp;Course</i>", 'transport.php?class_name=Course', ''); ?>


                    <?php echo button_color('primary', "<i class='fa fa-male'>&nbsp;Clients</i>", 'transport.php?cl=tClient', ''); ?>
                    <?php echo button_color('danger', "<i class='fa fa-user'>&nbsp;Chauffeur</i>", 'transport.php?cl=Chauffeur', ''); ?>
                    <?php echo button_color('warning', "<i class='fa fa-cab'>&nbsp;Transport Type</i>", 'transport.php?cl=TransportType', ''); ?>

                </div>
                <div class="hr-line-dashed"></div>

                <div class="row bg-white">
                    <p class="text-center">Model</p>

                    <?php echo button_color('primary', 'View Model', 'transport.php?class_name=Model', ''); ?>
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
                    <p class="text-center">Autres Ajax</p>
                    <?php echo button_color('primary', 'Profile', 'profile.php?', ''); ?>
                    <?php echo button_color('success', "<i class='fa fa-user-md'>&nbsp;User</i>", 'manage_ajax.php?class_name=User ', 'admin'); ?>
                    <?php echo button_color('success', "<i class='fa fa-user-md'>&nbsp;User Type</i>", 'manage_ajax.php?class_name=UserType ', 'admin'); ?>

                    <?php echo button_color('success', 'Messages', 'manage_ajax.php?class_name=Message ', 'admin'); ?>
                    <?php echo button_color('info', 'Notifications', 'manage_ajax.php?class_name=Notification', 'admin'); ?>
                    <?php echo button_color('danger', 'To Dos', 'manage_ajax.php?class_name=ToDoList', 'admin'); ?>


                </div>
                <div class="hr-line-dashed"></div>


            </div>
        </div>


    </div>

    <!--    </div>-->


<?php include(FOOTER_PUBLIC); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Dashboard</small>
            </h1>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

<?php
function admin_panel($class_name, $panel_color = "primary", $symbol = 'users', $text1 = "", $text2 = "")
{
    $output = "";
    $output .= "<div class=\"col-lg-3 col-md-6\">
        <div class=\"panel panel-{$panel_color}\">
            <div class=\"panel-heading\">
                <div class=\"row\">
                    <div class=\"col-xs-3\">
                        <i class=\"fa fa-{$symbol} fa-5x\"></i>
                    </div>
                    <div class=\"col-xs-9 text-right\">
                        <div class=\"huge\">" . $class_name::count_all() . " </div>
                        <div>{$text1}</div>
                    </div>
                </div>
            </div>
            <a href=\"#\">
                <div class=\"panel-footer\">
                    <span class=\"pull-left\"><a href=\"class_manage.php?class_name={$class_name}\">{$text2}</span>
                    <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>
                    <div class=\"clearfix\"></div>
                </div>
            </a>
        </div>
    </div>";

    return $output;
}


?>


<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $session->count; ?></div>
                        <div>New Views</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <?php echo admin_panel("TransportProgramming", "blue", "adn", "Transport Programming", "Total Transport Programming"); ?>
        <?php echo admin_panel("TransportProgrammingModel", "darkblue", "adn", "Transport Programming Model", "Total Transport Programming Model"); ?>
        <?php echo admin_panel("TransportChauffeur", "primary", "adn", "Chauffeurs", "Total Chauffeurs"); ?>
        <?php echo admin_panel("TransportClient", "darkgray", "adn", "Transport Clients", "Total Transport Clients"); ?>
        <?php echo admin_panel("TransportType", "palevioletred", "adn", "Transport Type", "Total Transport Type"); ?>
    </div> <!--First Row-->
    <hr>

    <?php

    $panel_color1 = ["darkgray", "green", "yellow", "red", "purple", "primary", "palevioletred", "black"
        , "darkblue", "darkred", "darkgray", "darkgreen", "danger", "warning", "purple", "primary", "blue", "darkgrey", "red", "purple", "darkgray", "darkgray", "green", "yellow", "red", "purple", "primary", "palevioletred", "black"
        , "darkblue", "darkred", "darkgray", "darkgreen", "danger", "warning", "purple", "primary", "blue", "darkgrey", "red", "purple", "darkgray",];
    $symbol1 = ["paypal", "envelope", "user", "bell", "adn", "adn", "adn", "adn", "link", "stop", "adn", "user-times", "dollar", "users", "columns", "adn", "adn", "sort-amount-desc", "adn", "adn", "adn", "paypal", "envelope", "user", "bell", "adn", "adn", "adn", "adn", "link", "stop", "adn", "user-times", "dollar", "users", "columns", "adn", "adn", "sort-amount-desc", "adn", "adn", "adn",];
    $text1 = [];
    $i = 0;
    foreach (MyClasses::$class_access as $class) {
        if (!in_array($class, MyClasses::$disable_db_classes)) {

//            echo $class. $panel_color1[$i++]. $symbol1[$i++]. " $class". "Total $class<hr>";
            echo admin_panel($class, $panel_color1[$i++], $symbol1[$i++], " $class", "Total $class");

        }
    }
    unset($class);
    unset($i);

    $i = 0;
    foreach (MyClasses::$class_transmed as $class) {
        if (!in_array($class, MyClasses::$disable_db_classes)) {

            echo admin_panel($class, $panel_color1[$i++], $symbol1[$i++], " $class", "Total $class");

        }
    }
    unset($class);
    unset($i);


    ?>

    <hr>

    <?php ?>
    <?php echo admin_panel("Message", "green", "envelope", "Messages", "Total Messages"); ?>
    <?php echo admin_panel("Chat", "green", "envelope", "Chats", "Total Chats"); ?>
    <?php echo admin_panel("User", "yellow", "user", "Users", "Total Users"); ?>
    <?php echo admin_panel("Notification", "red", "bell", "Notifications", "Total Notifications"); ?>
    <?php echo admin_panel("Links", "darkblue", "link", "Links", "Total Links"); ?>
    <?php echo admin_panel("BlacklistIp", "darkgray", "adn", "Blacklist", "Total Blacklist"); ?>
    <?php echo admin_panel("FailedLogin", "darkgreen", "user-times", "FailedLogin", "Total FailedLogin"); ?>
    <?php echo admin_panel("Currency", "danger", "dollar", "Currencies", "Total Currencies"); ?>
    <?php echo admin_panel("LinksCategory", "purple", "adn", "Links Category", "Total Links Category"); ?>

</div>


<div class="row">

    <div id="piechart" style="width: 900px; height: 500px;"></div>

</div>
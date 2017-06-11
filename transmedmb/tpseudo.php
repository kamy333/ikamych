<?php require_once('../includes/initialize_transmed.php'); ?>
<?php $title = ""; ?>


<?php //include "layouts2/header1.php"?>
<?php include "layouts/header.php" ?>

    <div data-role="page" id="demo-page" data-url="demo-page">

        <div data-role="header">
            <h1>Client Pseudo</h1>
            <a href="#"
               class="jqm-search-link ui-shadow ui-btn ui-btn-icon-notext ui-corner-all ui-icon-search ui-nodisc-icon ui-alt-icon ui-btn-right">Search</a>
        </div><!-- /header -->

        <div role="main" class="ui-content">

            <div id="sorter">
                <ul data-role="listview">
                    <?php
                    $sorters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
                    foreach ($sorters as $sorter) {
                        echo "<li><span>$sorter</span></li>";
                    }
                    ?>
                </ul>
            </div><!-- /sorter -->


            <ul data-role="listview" data-autodividers="true" id="sortedList">
                <?php
                $sql = "SELECT * FROM transport_clients ORDER BY web_view ASC";
                $clients = TransportClient::find_by_sql($sql);
                foreach ($clients as $client => $cl) {
                    echo "<li><a href=\"index.php?pseudo=$cl->pseudo\">   rel=\"external\" " . "&nbsp;&nbsp;" . $cl->web_view . " pseudo(" . $cl->pseudo . ")</a></li>";
                } ?>

            </ul><!-- /listview -->


        </div>


        <div data-role="footer">
            <h4>Footer</h4>
        </div><!-- /footer -->

    </div><!-- /page -->
<?php include "layouts2/footer1.php" ?>
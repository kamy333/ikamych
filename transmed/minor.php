<?php require_once('../includes/initialize_transmed.php'); ?>
<?php if (!User::is_admin()) {
    redirect_to("index.php");
} ?>

<?php //$active_menu="minor"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">


        <div class="col-lg-12  white-bg">
            <div class="text-center m-t-lg">


                <h1>Welcome to <?php echo LOGO; ?> </h1>


                <?php


                ?>


                <?php
                //setlocale(LC_TIME, "fr_FR");
                //echo strftime(" in French %d.%M.%Y and");


                //setlocale (LC_TIME, 'fr_FR.utf8','fra');
                // setlocale(LC_TIME, 'fr_FR.UTF8');
                // setlocale(LC_TIME, 'fr_FR');
                // setlocale(LC_TIME, 'fr');
                // setlocale(LC_TIME, 'fra_fra');
                # Examples using current time


                echo strftime('%Y-%m-%d %H:%M:%S');  // 2015-03-02 17:58:50
                echo "<br>";
                echo strftime('%A %d %B %Y, %H:%M'); // lundi 02 mars 2015, 17:58
                echo "<br>";
                echo strftime('%d %B %Y');           // 02 mars 2015
                echo "<br>";
                echo strftime('%d/%m/%y');           // 02/03/15
                echo "<br>";
                # Example with given timestamp
                $timestamp = time(); // Any timestamp will do
                echo strftime("%d %B %Y", $timestamp);  // 02 mars 2015
                echo "<br>";

                $str = strtotime("december 5th 2017");
                $a = strftime("%d %B %Y", $str);  // 02 mars 2015
                echo $a;
                echo h($a);

                echo "<br>";
                $str = strtotime("february 5th 2017");
                echo strftime("%d %B %Y", $str);  // 02 mars 2015

                echo "<br>";
                echo h('février');
                echo "<br>";

                # --------------------
                # METHOD 2
                # --------------------
                # using arrays without setting the locale ( not recommanded )
                $day = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                $month = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
                // Now
                $date = explode('|', date("w|d|n|Y"));
                // Given time
                $timestamp = time();
                $date = explode('|', date("w|d|n|Y", $timestamp));
                echo $day[$date[0]] . ' ' . $date[1] . ' ' . $month[$date[2] - 1] . ' ' . $date[3]; // Lundi 02 mars 2015
                echo "<br>";

                ?>

                <p>

                    <?php echo "Basename " . $active_menu . '<br>';
                    echo $_SERVER['HTTP_REFERER'] . "<br>";
                    echo "<b>__DIR__</b> " . __DIR__ . '<br>';
                    echo "<b>Dirname</b>  " . basename(dirname($_SERVER['SCRIPT_FILENAME'])) . '<br>';
                    echo "<b>SERVER_NAME</b>  " . $_SERVER['SERVER_NAME'] . '<br>';
                    echo "<b>SITE_ROOT</b>  " . SITE_ROOT . '<br>';
                    echo "<b>MY_URL_PUBLIC</b>  " . MY_URL_PUBLIC . '<br>';
                    echo "<b>MY_URL_ADMIN</b>  " . MY_URL_ADMIN . '<br>';
                    echo $_SERVER["PHP_SELF"] . '<br>';
                    echo $Nav->public_menu("public_gallery") . '<br>';
                    echo $Nav->public_menu("Admin_class") . '<br>';
                    echo $Nav;
                    echo $_SERVER['QUERY_STRING'];

                    echo "<hr>";
                    echo $Nav->folder . "<br>";

                    ?>


                </p>
                <!--                    <small>Written in minor.html file.</small>-->
            </div>

        </div>
    </div>
</div>


<?php include(FOOTER) ?>

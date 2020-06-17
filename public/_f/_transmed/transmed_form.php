<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_visitor()) {
    redirect_to('index.php');
} ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "admin"; ?>
<?php $subfolder = "transmed"; ?>
<?php $active_menu = "Others"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = false; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Transmed Form</h1>


<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<?php


?>


<div class="row">
    <div class="col-lg-3 ">

        <form class="form-inline" action="transmed_form.php" method="get" name="pseudo-search">
            <div class="form-group">
                <label for="exampleInputName2">Nom</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Nom">
            </div>

            <button type="submit" name="submit" class="btn btn-default">Send</button>
        </form>
    </div>
</div>
<!---->
<!---->


<div class="row">
    <div class="col-lg-7 col-lg-offset-0" style="background-color: #fff9fb;margin-top: 2em;padding: 2em">
        <?php

        $chauffeurs = ["Mohamed", "Pablo", "Yohan", "David"];


        if (isset($_GET) && $_GET["WithDate"] == 1) {
            $WithDate = true;
            $link = "<a href='" . $_SERVER["PHP_SELF"] . "?WithDate=0'>Sans date et heure</a>";
        } else {
            $WithDate = false;
            $link = "<a href='" . $_SERVER["PHP_SELF"] . "?WithDate=1'>Avec date et heure</a>";
        }

        if (!isset($_GET['WithDate'])) {
            $WithDate = true;
            $link = "<a href='" . $_SERVER["PHP_SELF"] . "?WithDate=0'>Sans date et Heure</a>";
        }

        if (isset($_GET) && $_GET["pseudo"]) {
            $pseudo = $_GET["pseudo"];
            $WithPseudo = true;
        } else {
            $pseudo = "";
            $WithPseudo = false;
        }



        $clients= Client::find_all();

            ?>
        <!--       <div class="row">-->
        <div class="col-lg-3 " style="background-color: #fff9fb;margin-top: 2em;padding: 2em">
            <h5 class="text-center">Clients</h5>
            <?php

        echo "<hr>";
        echo "<ul  class=\"list-group\">";
        foreach ($clients as $client) {
            echo "<li><a href='" . $_SERVER["PHP_SELF"] . "?WithDate=1&pseudo={$client->pseudo}'>$client->pseudo</a></li>";
        }
        echo "</ul>";
        echo "<hr>";
?>
        </div>

        <div class="col-lg-7 col-lg-offset-2" style="background-color: #fff9fb;">

            <?php


            $date = date_sql();

            $yesterday = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
            $yesterday = date_sql($yesterday);

            $tomorrow = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
            $tomorrow = date_sql($tomorrow);


            $hour = date('H', time()) . ":00";
            echo $link . "<hr>";
            $list = "<ul  class=\"list-group\">";

            $href = "https://docs.google.com/spreadsheets/d/1cTpAv1pIqrtHpmdk4XyxAHfh8A6I8NzbhoE8uTZIX4I/edit#gid=892760617";
            $text = "<a href='$href' target='_blank'>SpreadSheet Autres</a>";
            $list .= "<li>" . $text . "</li>";


            $href = "https://docs.google.com/forms/d/e/1FAIpQLSeDPQvngqOwYvPbKf7tjFsLlvfxMcaBDyhV0eJmDarjgxMQPQ/viewform?usp=pp_url&entry.708077165={$yesterday}&entry.905875499=13:45&entry.1839681793=NAFISSPOUR&entry.1751608937=Domicile&entry.195472942=Travail&entry.79727234=Pf&entry.601673837=Autres";

            $text = "<a href='$href' target='_blank'>Yesterday KAMY Domicile-Travail {$yesterday} 13h45</a>";
            $list .= "<li>" . $text . "</li>";

            $href = "https://docs.google.com/forms/d/e/1FAIpQLSeDPQvngqOwYvPbKf7tjFsLlvfxMcaBDyhV0eJmDarjgxMQPQ/viewform?usp=pp_url&entry.708077165={$yesterday}&entry.905875499=18:00&entry.1839681793=NAFISSPOUR&entry.1751608937=Travail&entry.195472942=Domicile&entry.79727234=Pf&entry.601673837=Autres";

            $text = "<a href='$href' target='_blank'>Yesterday KAMY Travail-Domicile {$yesterday} 18h00 </a>";
            $list .= "<li>" . $text . "</li><hr>";


            $href = "https://docs.google.com/forms/d/e/1FAIpQLSeDPQvngqOwYvPbKf7tjFsLlvfxMcaBDyhV0eJmDarjgxMQPQ/viewform?usp=pp_url&entry.708077165={$date}&entry.905875499=13:45&entry.1839681793=NAFISSPOUR&entry.1751608937=Domicile&entry.195472942=Travail&entry.79727234=Pf&entry.601673837=Autres";

            $text = "<a href='$href' target='_blank'>Today KAMY Domicile-Travail {$date} 13h45</a>";
            $list .= "<li>" . $text . "</li>";

            $href = "https://docs.google.com/forms/d/e/1FAIpQLSeDPQvngqOwYvPbKf7tjFsLlvfxMcaBDyhV0eJmDarjgxMQPQ/viewform?usp=pp_url&entry.708077165={$date}&entry.905875499=18:00&entry.1839681793=NAFISSPOUR&entry.1751608937=Travail&entry.195472942=Domicile&entry.79727234=Pf&entry.601673837=Autres";

            $text = "<a href='$href' target='_blank'>Today KAMY Travail-Domicile {$date} 18h00 </a>";
            $list .= "<li>" . $text . "</li><hr>";


            $href = "https://docs.google.com/forms/d/e/1FAIpQLSeDPQvngqOwYvPbKf7tjFsLlvfxMcaBDyhV0eJmDarjgxMQPQ/viewform?usp=pp_url&entry.708077165={$tomorrow}&entry.905875499=13:45&entry.1839681793=NAFISSPOUR&entry.1751608937=Domicile&entry.195472942=Travail&entry.79727234=Pf&entry.601673837=Autres";

            $text = "<a href='$href' target='_blank'>Tomorrow KAMY Domicile-Travail {$tomorrow} 13h45</a>";
            $list .= "<li>" . $text . "</li>";

            $href = "https://docs.google.com/forms/d/e/1FAIpQLSeDPQvngqOwYvPbKf7tjFsLlvfxMcaBDyhV0eJmDarjgxMQPQ/viewform?usp=pp_url&entry.708077165={$tomorrow}&entry.905875499=18:00&entry.1839681793=NAFISSPOUR&entry.1751608937=Travail&entry.195472942=Domicile&entry.79727234=Pf&entry.601673837=Autres";

            $text = "<a href='$href' target='_blank'>Tomorrow KAMY Travail-Domicile {$tomorrow} 18h00 </a>";
            $list .= "<li>" . $text . "</li><hr>";


            foreach ($chauffeurs as $chauffeur) {

                if ($WithDate) {

                    $href = "https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1046506626={$chauffeur}&entry.1208039262={$date}&entry.101774349={$hour}&entry.2142128057={$pseudo}&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433";

                    $href_frame = $href . "&embedded=true#start=embed";

                    $text = "<a href='$href'>$chauffeur  |    " . strftime("%B %d, %Y", time()) . " @ " . date('H', time()) . "h00" . "&nbsp;&nbsp;&nbsp;$pseudo</a>";

                    $list .= "<li>" . $text . "</li>";
                } else {

                $href="https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1208039262&entry.101774349&entry.2142128057&entry.1046506626={$chauffeur}&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433";
                $href_frame=$href."&embedded=true#start=embed";

                    $text = "<a target='_blank'  href='$href'>$chauffeur&nbsp;&nbsp;&nbsp;$pseudo</a>";
                    $list .= "<li>" . $text . "</li>";

            }

        }

        $list.="</ul>";

        echo $list;


        $list="<ul  class=\"list-group\">";
        foreach ($chauffeurs as $chauffeur) {
            $href=$_SERVER["PHP_SELF"]."?chauffeur=$chauffeur";
            isset($_GET['pseudo'])? $href.="&pseudo=$pseudo" : "";
            $text = "<a href='$href'>$chauffeur      ". strftime("%B %d, %Y", time()) ." @ ".date('H', time())."h00"."&nbsp;&nbsp;&nbsp;$pseudo</a>";
            $list.= "<li>" . $text . "</li>";
        }
        $list.="</ul>";
        echo $list;

        $list="<ul  class=\"list-group\">";


        $href="https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1208039262&entry.101774349&entry.2142128057&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433";
        $href_frame=$href."&embedded=true#start=embed";

            $text = "<a href='$href' target='_blank'>Transmed Google Form</a>";
            $text .= "";
        $list.= "<li>" . $text . "</li>";


                $list.="</ul>";

        echo $list;
        ?>

        </div>

        <?php if (isset($_GET) && isset($_GET['chauffeur'])) {
            $chauffeur = $_GET['chauffeur'];
            $frame = "https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1046506626={$chauffeur}&entry.1208039262={$date}&entry.101774349={$hour}&entry.2142128057={$pseudo}&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433&embedded=true#start=embed";
        } else {
            $frame = "https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?embedded=true#start=embed";
        }


        //       $frame2="https://docs.google.com/forms/d/e/1FAIpQLSeDPQvngqOwYvPbKf7tjFsLlvfxMcaBDyhV0eJmDarjgxMQPQ/viewform?usp=sf_link";


        ?>


    </div>
</div>

<div class="row">
    <div class="col-lg-5 col-lg-offset-0" style="margin-top: 2em;">
        <iframe src="<?php echo $frame; ?>" width="600" height="1500" frameborder="0" marginheight="0" marginwidth="0">
            Loading...
        </iframe>

    </div>
</div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>



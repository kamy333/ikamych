<?php require_once('../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "links"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Transmed Form</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>



<div class="row">
    <div class="col-lg-5 col-lg-offset-1" style="background-color: #fff9fb;margin-top: 2em;padding: 2em">
        <?php


       $chauffeurs=["Djamila","Pablo","Pierre-Alain","Diego","Vincent"];

       if(isset($_GET)&& $_GET["WithDate"]==1){
           $WithDate=true;
           $link="<a href='".$_SERVER["PHP_SELF"]."?WithDate=0'>Sans date</a>";
       } else {
           $WithDate=false;
           $link="<a href='".$_SERVER["PHP_SELF"]."?WithDate=1'>Avec date</a>";
       }

        if(isset($_GET)&& $_GET["pseudo"]){
            $pseudo=$_GET["pseudo"];
            $WithPseudo=true;
        } else {
            $pseudo="";
            $WithPseudo=false;
        }



        $clients= Client::find_all();
////         echo DataBaseClient::display_all($result_class,$view_full_table) ;
//        echo "<pre>";
////        var_dump($clients);
//        echo "</pre>";
            ?>
       <div class="row">
    <div class="col-lg-3 " style="background-color: #fff9fb;margin-top: 2em;padding: 2em">
        <h5 class="text-center">Clients</h5>
        <?php

        echo "<hr>";
        echo "<ul  class=\"list-group\">";
        foreach ($clients as $client) {
            echo "<li><a href='".$_SERVER["PHP_SELF"]                      ."?WithDate=1&pseudo={$client->pseudo}'>$client->pseudo</a></li>";
        }
        echo "</ul>";
        echo "<hr>";
?>
       </div>


               <div class="col-lg-8 col-lg-offset-1" style="background-color: #fff9fb;margin-top: 2em;padding: 2em">
                   <h5 class="text-center">Forms</h5>

        <?php



        $date=  date_sql();

        $hour=date('H', time()).":00";
        echo $link."<hr>";
        $list="<ul  class=\"list-group\">";

        foreach ($chauffeurs as $chauffeur) {

            if($WithDate){
//                $text = "<a href='https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1046506626={$chauffeur}&entry.1208039262={$date}&entry.101774349={$hour}&entry.2142128057&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433'>$chauffeur  \t     ". strftime("%B %d, %Y", time()) ." @ ".date('H', time())."h00"."</a>";


                $href="https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1046506626={$chauffeur}&entry.1208039262={$date}&entry.101774349={$hour}&entry.2142128057={$pseudo}&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433";
                $href_frame=$href."&embedded=true#start=embed";

                $text="<a href='$href'>$chauffeur      ". strftime("%B %d, %Y", time()) ." @ ".date('H', time())."h00"."&nbsp;&nbsp;&nbsp;$pseudo</a>";



                $list.= "<li>" . $text . "</li>";
            } else {

                $href="https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1208039262&entry.101774349&entry.2142128057&entry.1046506626={$chauffeur}&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433";
                $href_frame=$href."&embedded=true#start=embed";

                $text = "<a  target='_blank' href='$href'>$chauffeur&nbsp;&nbsp;&nbsp;$pseudo</a>";
                $list.= "<li>" . $text . "</li>";

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

        $text = "<a href='$href'>Transmed Google Form</a>";
        $text .= "";
        $list.= "<li>" . $text . "</li>";


                $list.="</ul>";

        echo $list;
        ?>

    </div>
       </div>

        <?php





        ?>


<!--    <div class="col-lg-4 col-lg-offset-4" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?embedded=true#start=embed" width="760" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

    </div>-->

        <?php if (isset($_GET ) && isset($_GET['chauffeur'])){
            $chauffeur=$_GET['chauffeur'];
            $frame="https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?usp=pp_url&entry.1046506626={$chauffeur}&entry.1208039262={$date}&entry.101774349={$hour}&entry.2142128057={$pseudo}&entry.1089038865&entry.1030479151&entry.1375757547=Standard&entry.1263918545=Aller+Simple&entry.1502494065&entry.539108433&embedded=true#start=embed";

        } else {
            $frame="https://docs.google.com/forms/d/e/1FAIpQLSceb4LdbfQ3JGhtwQXUk300LMnuvVxVBtSjCqj3J1k0WhMUxw/viewform?embedded=true#start=embed";

        }


            ?>

        <div class="col-lg-4 col-lg-offset-4" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <iframe src="<?php echo $frame; ?>" width="760" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

        </div>
    </div>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>



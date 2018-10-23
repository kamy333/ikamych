<?php require_once('../../../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "admin"; ?>
<?php $subfolder = "transmed"; ?>
<?php $active_menu = "Others"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Transmed Form</h1>


<?php
echo $site = getenv("HTTP_HOST") . '';
?>

<?php echo $Nav->url . BR ?>
<?php echo $Nav->path_folders . BR ?>
<?php echo $Nav->folder_prev . BR ?>
<?php echo $Nav->folder_immediate . BR ?>
<?php echo Category::$page_manage . BR; ?>
<?php echo Category::$page_edit . BR; ?>
<?php echo Category::$page_delete . BR; ?>
<?php echo Category::$page_new . BR; ?>


<?php

if (User::is_kamy()) {

    echo '<hr>';
    echo MY_URL_ADMIN;
    echo '<br>';
    echo MY_URL_PUBLIC;
    echo '<br>';
    echo '<hr>';
    echo BR . BR . BR;
    echo $Nav;
    echo '<hr>';
    echo BR . BR . BR;

    $a = str_replace(SITE_ROOT, "", __DIR__);
    echo $a . BR;
    echo basename(dirname($_SERVER['SCRIPT_FILENAME']));
    echo BR;

    echo BR;
    $url = str_replace(SITE_ROOT, "", __DIR__);
    $array = explode('/', $url);
    print_r($array);
    echo BR;
    $count = count($array);
    echo $count;
    echo BR;
    echo $array[1];

    echo BR . BR;

    echo $full_url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : $_SERVER['REQUEST_URI'];
    echo BR . BR;
    $url = str_replace(SITE_URL, "", $full_url);
    echo $url . BR;
    $foldername = basename($full_url);
    echo $foldername;
    $array = explode('/', $url);
    print_r($array);
    echo BR;
    $count = count($array);
    echo $count;
    echo BR;
    for ($x = 0; $x < $count; $x++) {
        echo "The number is: $x " . $array[$x] . "<br>";
    }

}


?>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>

<div class="row">
    <a href="/public/testinput.php">testinput.php</a>
</div>

<div class="row">
    <form class="form-inline" action="transmed_form.php" method="get" name="pseudo-search">
        <div class="form-group">
            <label for="exampleInputName2">Name</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Jane Doe">
        </div>

        <button type="submit" name="submit" class="btn btn-default">Send</button>
    </form>
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



<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_visitor()) {
    redirect_to('index.php');
} ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $subfolder = "transmed"; ?>
<?php $active_menu = "Others"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = "transmed_google_script.js"; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Transmed Form 3</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<?php

//  https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml

$links_hour = "";


// Json
$key = "1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g";
$href = "https://spreadsheets.google.com/feeds/list/" . $key . "/1/public/values?alt=json";
$lnk = "<a href='{$href}'>Json Hour |</a>";
$links_hour .= $lnk;


//Google form
$href = "https://docs.google.com/forms/d/e/1FAIpQLScnCjOQirx5g_HAJW9s7KbD185Men49ETC8NC8I9Px52Y1K6w/viewform?usp=sf_link";
$lnk = "<a href='{$href}'>Form Hour |</a>";
$links_hour .= $lnk;

$href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml";
$lnk = "<a href='{$href}'>Web All Hour |</a>";
$links_hour .= $lnk;

// Web
$href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=2063113920&single=true";
$href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=2063113920&single=true";

$lnk = "<a href='{$href}'>Web Hour |</a>";
$links_hour .= $lnk;

//excel
$href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pub?output=xlsx";
$lnk = "<a href='{$href}'>Excel Hour |</a>";
$links_hour .= $lnk;

//csv
$href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pub?gid=2063113920&single=true&output=csv";
$lnk = "<a href='{$href}'>csv Hour |</a>";
$links_hour .= $lnk;


$frame = "<iframe src='https://docs.google.com/forms/d/e/1FAIpQLScnCjOQirx5g_HAJW9s7KbD185Men49ETC8NC8I9Px52Y1K6w/viewform?embedded=true width='641' height='1191' frameborder='0' marginheight='0' marginwidth='0'>Loading...</iframe>'";

$frame_entry = "https://docs.google.com/forms/d/e/1FAIpQLScnCjOQirx5g_HAJW9s7KbD185Men49ETC8NC8I9Px52Y1K6w/viewform?usp=pp_url&entry.747981081=Mohamed&entry.919339702=2019-01-20&entry.1420030965=08:20";

echo $links_hour;
?>


<div class="row">

    <div class="col-lg-11 col-lg-offset-0" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        //1tP5RJcnRz8Xq5WjNarTymBLGsTiDvX5vGVzoYedljzI
        //1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g

        /*
        https://spreadsheets.google.com/feeds/list/1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g/od6/public/values?alt=json
        https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=1741392766&single=true

        */

        $excel = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pub?output=xlsx";
        echo "<a href='{$excel}' target='_blank'>Dwnld Excel |</a>&nbsp;&nbsp;";


        $web = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=1741392766&single=true";

        echo "<a href='{$web}' target='_blank'>Published in web |</a>&nbsp;&nbsp;";

        //$published="https://script.google.com/macros/s/AKfycbwdriN5JO06KwkQRCi69KqwRPLi-EPRZvkOFDJYWH1yxzbyn8E/exec";
        $published = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=1741392766&single=true";
        $publishedlnk = "<a href='$published'>Google published |</a>";

        $key = "1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g";
        //$key="";
        //        $http="https://spreadsheets.google.com/feeds/list/".$key."/od6/public/values?alt=json";


        $http = "https://spreadsheets.google.com/feeds/list/" . $key . "/1/public/values?alt=json";
        $link = "<a href='$http' target='_blank'>Google JSON |</a>";
        echo $link . " " . $publishedlnk;
        ?>


        <iframe width="1700" height="300"
                src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=1741392766&amp;single=true&amp;widget=true&amp;headers=false"></iframe>


    </div>
</div>
<br>

<div class="row">

    <div class="col-lg-8 col-lg-offset-2" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <table class="table table-striped" id="myTableCourses">
            <tr>
                <th>Timestamp</th>
                <th>datedelacourse</th>
                <th>Heure course</th>
                <th>Nom Client</th>
                <th>Type transport</th>
                <th>Adresse de Départ</th>
                <th>Adresse d'Arrivée</th>
                <th>Aller Simple ou Aller Retour</th>
                <th>Heure Retour</th>
                <th>Date Retour</th>
                <th>Email Address</th>
                <th>Chauffeur</th>
            </tr>

        </table>
    </div>
</div>
<!--    <script>
        var myHttp=<?php /*echo $http;  */ ?>
            alert(myHttp);
    $.getJSON(myHttp,function (data) {
        console.log(data);
    });

    </script>-->

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


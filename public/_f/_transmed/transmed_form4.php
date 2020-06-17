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

<h1 class="text-center">Transmed Form 4</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">
    <div class="col-lg-8 col-lg-offset-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

        <?php

        $links_hour = "";

        // Json
        $key = "1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g";
        $href = "https://spreadsheets.google.com/feeds/list/" . $key . "/1/public/values?alt=json";
        $lnk = "&nbsp;&nbsp;<a href='{$href}' target='_blank'>JSON HOUR</a>&nbsp;&nbsp; |";
        $links_hour .= $lnk;


        //Google form
        $href = "https://docs.google.com/forms/d/e/1FAIpQLScnCjOQirx5g_HAJW9s7KbD185Men49ETC8NC8I9Px52Y1K6w/viewform?usp=sf_link";
        $lnk = "&nbsp;&nbsp;<a href='{$href}' target='_blank'>FORM HOUR</a>&nbsp;&nbsp; |";
        $links_hour .= $lnk;

        $href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml";
        $lnk = "&nbsp;&nbsp;<a href='{$href}' target='_blank'>WEB ALL HOUR</a>&nbsp;&nbsp; |";
        $links_hour .= $lnk;

        // Web
        $href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=2063113920&single=true";
        $href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=2063113920&single=true";

        $lnk = "&nbsp;&nbsp;<a href='{$href}' target='_blank'>WEB HOUR</a>&nbsp;&nbsp; |";
        $links_hour .= $lnk;

        //excel
        $href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pub?output=xlsx";
        $lnk = "&nbsp;&nbsp;<a href='{$href}' target='_blank'>EXCEL HOUR</a>&nbsp;&nbsp; |";
        $links_hour .= $lnk;

        //csv
        $href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pub?gid=2063113920&single=true&output=csv";
        $lnk = "&nbsp;&nbsp;<a href='{$href}' target='_blank'>CSV HOUR</a>&nbsp;&nbsp; |";
        $links_hour .= $lnk;


        $frame = "<iframe src='https://docs.google.com/forms/d/e/1FAIpQLScnCjOQirx5g_HAJW9s7KbD185Men49ETC8NC8I9Px52Y1K6w/viewform?embedded=true width='641' height='1191' frameborder='0' marginheight='0' marginwidth='0'>Loading...</iframe>'";

        $frame_entry = "https://docs.google.com/forms/d/e/1FAIpQLScnCjOQirx5g_HAJW9s7KbD185Men49ETC8NC8I9Px52Y1K6w/viewform?usp=pp_url&entry.747981081=Mohamed&entry.919339702=2019-01-20&entry.1420030965=08:20";

        echo $links_hour;
        ?>

    </div>
</div>


<div class="row">

    <div class="col-lg-8 col-lg-offset-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php

        $excel = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pub?output=xlsx";
        echo "&nbsp;&nbsp;<a href='{$excel}' target='_blank'>EXCEL</a>&nbsp;&nbsp;";


        $web = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=2063113920&single=true";

        echo "&nbsp;&nbsp;<a href='{$web}' target='_blank'>WEB</a>&nbsp;&nbsp;|";

        //$published="https://script.google.com/macros/s/AKfycbwdriN5JO06KwkQRCi69KqwRPLi-EPRZvkOFDJYWH1yxzbyn8E/exec";
        $published = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRmDX4Cgf_OLOzAOLIGhm1unLzS7Sl83Ayr9alKLVBBNXXpXyw6oKl2MZUR_QwiUDjkfIdSV5uyR4tq/pubhtml?gid=2063113920&single=true";
        $publishedlnk = "&nbsp;&nbsp;<a href='$published' target='_blank'>GOOGLE PUBLISHED</a>&nbsp;&nbsp; |";

        $key = "1uFQMPEsnH0EeC7XQ-sbAe_7ga1ozpjNvJhJSId0mC4g";

        $http = "https://spreadsheets.google.com/feeds/list/" . $key . "/1/public/values?alt=json";
        $link = "&nbsp;&nbsp;<a href='$http' target='_blank'>GOOGLE JSON</a>&nbsp;&nbsp; |";
        echo $link . " " . $publishedlnk;
        ?>

    </div>
</div>
<br>

<div class="row">

    <div class="col-lg-8 col-lg-offset-2" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <table class="table table-striped" id="myTableHoraires">
            <tr>

                <th>Timestamp</th>
                <th>Chauffeur</th>
                <th>Date</th>
                <th>Heure Debut</th>
                <th>Heure Fin</th>
                <th>Commentaire</th>

            </tr>

        </table>
    </div>
</div>


<div class="row">
    <div class="col-lg-8 col-lg-offset-3" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php

        $txt = "";
        $txt .= "Formulaire Web form Mohamed<br><br>";


        // Json
        $key = "1xiMIkTKgSbv7Hj5KDuM-kwTOtivCM0jjlLhV7V5w4Zc";
        $href = "https://spreadsheets.google.com/feeds/list/" . $key . "/1/public/values?alt=json";
        $txt .= "&nbsp;&nbsp;<a href='{$href}' target='_blank'>JSON</a>&nbsp;&nbsp; |";

        $href = "https://docs.google.com/spreadsheets/d/1xiMIkTKgSbv7Hj5KDuM-kwTOtivCM0jjlLhV7V5w4Zc/edit#gid=1731121603";
        $txt .= "&nbsp;&nbsp;<a href='{$href}' target='_blank'>GOOGLE SHEET</a>&nbsp;&nbsp; |";


        $href = "https://docs.google.com/forms/d/e/1FAIpQLSeLutrDjC7miholPSq3AaPVqGBonG8GWxg0gSmitjjzmN6rhQ/viewform?usp=pp_url&entry.601673837=Mohamed+Ettahery";
        $txt .= "&nbsp;&nbsp;<a href='{$href}' target='_blank'>FORMULAIRE</a>&nbsp;&nbsp; |";

        $href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vTBsGU9IKixDeiW8AZ7gfhnSg2QF47RM_K1dQU0Vl5k7c7pn2pxFsBrS89uTDajYuiGqlKfnC1_xTvJ/pubhtml";
        $txt .= "&nbsp;&nbsp;<a href='{$href}' target='_blank'>WEB VIEW</a>&nbsp;&nbsp; |";


        $href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vTBsGU9IKixDeiW8AZ7gfhnSg2QF47RM_K1dQU0Vl5k7c7pn2pxFsBrS89uTDajYuiGqlKfnC1_xTvJ/pub?output=";
        $txt .= "
&nbsp;&nbsp;<a href='{$href}xlsx' target='_blank'>EXCEL</a>&nbsp;&nbsp; |
&nbsp;&nbsp;<a href='{$href}csv' target='_blank'>CSV</a>&nbsp;&nbsp; |
&nbsp;&nbsp;<a href='{$href}pdf' target='_blank'>PDF</a>&nbsp;&nbsp; |
&nbsp;&nbsp;<a href='{$href}ods' target='_blank'>OPENDOCUMENT ODS</a>&nbsp;&nbsp;
<br><br>";

        echo $txt;
        ?>
    </div>
</div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


<?php require_once('../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "Others"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">Transmed Form 2</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<?php
//1tP5RJcnRz8Xq5WjNarTymBLGsTiDvX5vGVzoYedljzI
$published="https://script.google.com/macros/s/AKfycbwdriN5JO06KwkQRCi69KqwRPLi-EPRZvkOFDJYWH1yxzbyn8E/exec";
$publishedlnk="<a href='$published'>Google published</a>";
$key="1tP5RJcnRz8Xq5WjNarTymBLGsTiDvX5vGVzoYedljzI";
$http="https://spreadsheets.google.com/feeds/list/".$key."/od6/public/values?alt=json";
$link="<a href='$http'>Google JSON</a>";
echo $link." ".$publishedlnk;
?>

<div class="row">

    <div class="col-lg-8 col-lg-offset-2" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
<table class="table table-striped" id="myTable">
<tr>
    <th>First</th>
    <th>Last</th>
    <th>Email</th>
    <th>Approved</th>
    <th>Age</th>
</tr>


</table>
    </div>
</div>
<!--    <script>
        var myHttp=<?php /*echo $http;  */?>
            alert(myHttp);
    $.getJSON(myHttp,function (data) {
        console.log(data);
    });

    </script>-->

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


<?php if (!isset($layout_context)) {
    $layout_context = "public";
} ?>
<?php // if (isset($_SESSION["nom"])) {$nom=$_SESSION["nom"]; } else { $nom=false;}?>
<?php // if (isset($_SESSION["username"])) {$username=$_SESSION["username"]; } else { $username=false;}?>

<?php
//echo isset($session->user_id) ? "true" : "false";
?>
<?php $page_name = $_SERVER['PHP_SELF']; ?>


<!-- TODO stylesheet footer  header below layout context -->
<?php if (!isset($layout_header)) {
    $layout_header = "normal";
} ?>

<!doctype html>
<html lang="en">
<head>
    <!--    <meta charset="utf-8">-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    ;
    <title>ikamy.ch <?php if ($layout_context == "admin") {
            echo "Admin";
        } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="<?php echo $Nav->path_public; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $Nav->path_public; ?>css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $Nav->path_public; ?>css/styles.css">


    <?php if ($Nav->current_page == 'profile') { ?>

        <link href="<?php echo $Nav->path_public; ?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <?php } ?>




    <?php if (substr($Nav->current_page, 0, 7) == "manage_" ||
        substr($Nav->current_page, 0, 4) == "new_" ||
        substr($Nav->current_page, 0, 5) == "edit_"
//                    ||  $Nav->current_page=='profile'
    ) { ?>

        <link href="<?php echo $Nav->path_public; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/style_chosen.css" rel="stylesheet">

        <link href="<?php echo $Nav->path_public; ?>css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/chosen/chosen.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/colorpicker/bootstrap-colorpicker.min.css"
              rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/cropper/cropper.min.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/switchery/switchery.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css"
              rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css"
              rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/daterangepicker/daterangepicker-bs3.css"
              rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/select2/select2.min.css" rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/plugins/touchspin/jquery.bootstrap-touchspin.min.css"
              rel="stylesheet">
        <link href="<?php echo $Nav->path_public; ?>css/animate.css" rel="stylesheet">

    <?php } ?>


</head>

<body>


<?php if (isset($fluid_view) && ($fluid_view)){ ?>
<!--<div class="container-fluid">  full page wide-->
<div id='container-view' class="container-fluid">
    <?php } else {
    ?>
    <div id='container-view' class="container">
        <?php } ?>




<?php require_once(CONFIG_HEADER); ?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transmed</title>

    <link href="<?php echo $path; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $path; ?>font-awesome/css/font-awesome.css" rel="stylesheet">


    <?php $pages = array('index') ?>
    <?php if (in_array($active_menu_clean, $pages)) { ?>
        <!-- Toastr style -->
        <link href="<?php echo $path; ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <?php }
    unset($pages) ?>


    <!-- Gritter -->
    <link href="<?php echo $path; ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <?php $pages = array('mailbox') ?>
    <?php if (in_array($active_menu_clean, $pages)) { ?>
        <!-- iCheck style -->
        <link href="<?php echo $path; ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <?php }
    unset($pages) ?>

    <link href="<?php echo $path; ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/style_personal.css" rel="stylesheet">


    <?php $pages = array('class_manage') ?>
    <?php if (in_array($active_menu_clean, $pages)) { ?>
        <!--        <link href="--><?php //echo $path;?><!--css/plugins/dataTables/datatables.min.css" rel="stylesheet">-->
    <?php }
    unset($pages) ?>


    <?php $pages = array('class_edit', 'class_new') ?>
    <?php if (in_array($active_menu_clean, $pages)) { ?>
        <?php include_once(SITE_ROOT . DS . $folder_project_name . DS . 'layouts_addon' . DS . "css_php" . DS . 'forms_input.php'); ?>
    <?php }
    unset($pages) ?>

    <?php $pages = array('login_forgot_password_email') ?>
    <?php if (in_array($active_menu_clean, $pages)) {
        $body = "class=\"gray-bg\"";
    } else {
        $body = "";
    }
    ?>
    <?php unset($pages) ?>

    <?php $pages = array('profile') ?>
    <?php if (in_array($active_menu_clean, $pages)) { ?>
        <link href="<?php echo $Nav->path_public; ?>css/plugins/chosen/chosen.css" rel="stylesheet">
    <?php }
    unset($pages) ?>

    <?php if (substr($Nav->current_page, 0, 7) == "manage_" ||
        substr($Nav->current_page, 0, 4) == "new_" ||
        substr($Nav->current_page, 0, 5) == "edit_"
//                    ||  $Nav->current_page=='profile'

        || $Nav->current_page == 'class_manage'
        || $Nav->current_page == 'class_edit'
        || $Nav->current_page == 'class_new'
    ) { ?>

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
<?php
if (!isset($menu_canvas)) {
    $menu_canvas = "";
}
?>


<?php if ($menu_canvas) {
    echo "<body class=\"canvas-menu\">";

} else {
    echo "<body $body>";

} ?>


<div id="wrapper">
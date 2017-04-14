<?php require_once (CONFIG_HEADER);?>


<!DOCTYPE html>
<html>

<?php $body_onload=""; ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ikamy public</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style_personal.css" rel="stylesheet">

    
    <?php $pages=array('chat','chat2') ?>
    <?php if(in_array($active_menu_clean,$pages) ) { ?>
        <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
        <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
        <link href="<?php echo $path;?>css/style_chat.css" rel="stylesheet">
        <?php include_once (SITE_ROOT.DS.$folder_project_name.DS.'layouts_addon'.DS."js_php".DS.'chat.php');?>

        <?php $body_onload=" onload=\"ajax()\" " ?>

    <?php } unset($pages) ?>


    <?php $pages=array('index') ?>
    <?php if(in_array($active_menu_clean,$pages) ) { ?>
        <!-- Toastr style -->
        <link href="<?php echo $path;?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <?php } unset($pages) ?>





    <?php $pages=array('index','index_gallery','index_gallery2','index_gallery3','index_gallery5','index_gallery6',
        'index_gallery7') ?>
    <?php if(in_array($active_menu_clean,$pages) ) { ?>
   <?php include (SITE_ROOT.DS.$folder_project_name.DS.'layouts_addon'.DS."css_php".DS.'blueimpVideo.php');?>
    <?php } unset($pages) ?>

<!--    --><?php //$pages=array('chat') ?>
<!--    --><?php //if(in_array($active_menu_clean,$pages) ) { ?>
<!---->
<!--    --><?php //} unset($pages) ?>



</head>

<body class="top-navigation" <?php echo $body_onload;?> >


<?php $pages=array('index','index_gallery','index_gallery4') ?>
<?php if(in_array($active_menu_clean,$pages) ) { ?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

<?php } unset($pages) ?>







<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        
<!--        <body class="top-navigation">-->
<!---->
<!--        <div id="wrapper">-->
<!--            <div id="page-wrapper" class="gray-bg">-->


<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Include jQuery Mobile stylesheets -->
    <link rel="stylesheet" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

    <?php if (isset($header_css)) {
        foreach ($header_css as $css) {
            echo $css;
        }
    } ?>

    <!--    <link rel="stylesheet" href="assets/css/autodividers-linkbar.css">-->


    <!-- Include the jQuery library -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Include the jQuery Mobile library -->
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <!--    <script src="assets/js/autodividers-linkbar.js"></script>-->

    <?php if (isset($header_script)) {
        foreach ($header_script as $script) {
            echo $script;
        }
    } ?>

</head>
<body>

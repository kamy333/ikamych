<?php require_once('../../includes/initialize.php'); ?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="UTF-8">
    <title>About us 3</title>
    <script src="lib/angular/angular.min.js"></script>
    <script src="lib/angular/angular-route.min.js"></script>
    <script src="lib/angular/angular-animate.min.js"></script>

    <script src="js/app.js"></script>
    <script src="js/controllers.js"></script>

    <!--    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/style.css">

</head>


<?php echo str_repeat("&blank;", 4); ?>

<body>
<div style="margin-left: 10%">
    <span style="background: white;"><b><?php echo $logo ?></b></span>
    <?php echo str_repeat("&nbsp;", 4); ?>
    <a href="../../public/index.php" style="color: white">Home</a>
    <?php echo str_repeat("&nbsp;", 4); ?>
    <a href="../../public/admin/index.php" style="color: white">Admin Home</a>
    <?php echo str_repeat("&nbsp;", 4); ?>
    <a href="angularregistration/index.php" style="color: white">Registration AngularJS </a>

    <?php echo str_repeat("&nbsp;", 150); ?>

    <?php if (isset($_SESSION["user_id"])) { ?>
        <span style="text-align: right">
        <a href="../../public/admin/logout.php" style="color: white;margin-right: 10%;text-align: right">Logout</a>
    </span>
    <?php } else { ?>
        <a href="../../public/admin/login.php" style="color: white;margin-right: 10%;text-align: right">Login</a>

    <?php } ?>
</div>


<div class="main" ng-view>


</div>


</body>
</html>
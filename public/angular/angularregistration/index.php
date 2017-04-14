<?php require_once('../../../includes/initialize.php'); ?>

<!doctype html>
<html lang="en" ng-app="MyApp">
<head>
  <meta charset="UTF-8">
  <title>Angular Registration</title>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/lib/angular/angular.min.js" type="text/javascript"></script>
  <script src="js/lib/angular/angular-route.min.js" type="text/javascript"></script>
  <script src="js/lib/angular/angular-animate.min.js" type="text/javascript"></script>

    <!-- Firebase -->
    <script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>
    <!-- AngularFire -->
    <script src="https://cdn.firebase.com/libs/angularfire/1.1.3/angularfire.min.js"></script>

  <script src="js/App.js" type="text/javascript"></script>
    <script src="js/services/authentication.js" type="text/javascript"></script>

    <script src="js/controller/registration.js" type="text/javascript"></script>
   <script src="js/controller/success.js" type="text/javascript"></script>

</head>
<body>
<header>
    <nav class="cf" ng-include="'views/nav.php'"></nav>
</header>
<div class="page">
    <div class="userinfo" ng-show="currentUser" ng-controller="RegistrationController">
<span class="userinfo">Hi {{currentUser.firstname}}</span>
<a ng-href="#/login" ng-click="logout()";>Logout</a>
    </div>

  <main class="cf" ng-view>

  </main>
</div>
</body>
</html>

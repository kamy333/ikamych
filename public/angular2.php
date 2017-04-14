<?php require_once('../includes/initialize.php'); ?>
<?php redirect_to("angular/angularregistration/index.php") ?>

<?php $layout_context = "public"; ?>
<?php $active_menu="about"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php $angular=true; ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<!--<div >-->
<!--<!--<div ng-app="myApp">-->-->
<!--<p>Input something in the input box:</p>-->
<!--<p>Name: <input type="text" ng-model="name"></p>-->
<!--<p ng-bind="name"></p>-->
<!-- <p >Welcome {{name}}</p>-->
<!---->
<!--</div>-->
<!---->
<!---->
<!--<div ng-controller ="MyController">-->
<!--<h1>{{author.name}}</h1>-->
<!-- <p>{{author.title + ' ' + author.company}}</p>-->
<!---->
<!--</div>-->

<div class="main" ng-view>


</div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>


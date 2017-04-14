<?php require_once('../../../../includes/initialize.php'); ?>

<div class="branding"><a href="../../index.php"><?php echo $logo; ?></a></div>
  <ul>

      <li><a ng-hide="currentUser" ng-href="#/login">Login</a></li>
    <li><a ng-hide="currentUser" ng-href="#/register">Register</a></li>

      <li><a href="../index.php">Search</a></li>
      <li><a href="../../admin/index.php">Admin</a></li>

  </ul>

<?php require_once('../../includes/initialize.php'); ?>
<?php // if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php // $session->confirmation_protected_page(); ?>



<?php
$username = null;
$server_name=$_SERVER['PHP_SELF'];
$new_password=null;
?>




  <?php

  if(request_is_post()&& request_is_same_domain()){

      if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
          $message = "Sorry, request was not valid.";
      } else {

          $username=trim($_POST['email']);
          $valid=new FormValidation();
          $valid->validate_presences('email') ;
          $valid->validate_email('email') ;

          if(empty($valid->errors)){
              $user=User::find_by_email($username);

              if ($user){

                  $user->delete_reset_token();
                  $user->create_reset_token();
                  $user->send_email();


              }else {
                  // Username was not found; don't do anything
              }

              // Message returned is the same whether the user
              // was found or not, so that we don't reveal which
              // usernames exist and which do not.
              $message = "A link to reset your password has been sent to the email address on file.";

          } else {
              $message = "Please enter your email.";



          }


      }


  }




?>



<?php $layout_context = "admin"; ?>
<?php $active_menu="admin" ?>
<?php $fluid_view=true; ?>
<?php $stylesheets="" //custom_form  ?>
<?php $javascript="form_admin" ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>


<div class="row">
    <?php  echo isset($valid)? $valid->form_errors():"" ?>
    <?php echo output_message($message,'o'); ?>
</div>

<div class="row">
<div class="col-md-5 col-md-offset-2  col-lg-5 col-md-offset-2">

    <div class ="background_light_blue">

  <form id="" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
 <!-- <li>
     <a href="index.php">&laquo; Public area</a><br />
    </li>-->
  <fieldset id="login" title="Get a new password">
    <legend class="text-center" style="color: #005fbf">Lost login & password</legend>


      <?php echo csrf_token_tag(); ?>



<p class="help-block col-lg-offset-2 col-md-offset-2"><a style="color:blue-decoration: underline" href="login.php">back to login</a></p>



      <div class="help-block col-lg-offset-2 col-md-offset-2">
          <h6><a href="login_forgot_password_user.php">Prefer username?</a></h6>
          <p>Please enter your email address</p>
      </div>
<div class="form-group">

<label class="col-sm-2 control-label" for="email">Email</label>
<div class="col-sm-10">
<input type="email"  class="form-control" name="email" id="email"  />
</div></div>



<div class="col-sm-offset-2 col-sm-7 col-xs-2">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>




      </fieldset>
  </form>


</div>
</div>




</div>

<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

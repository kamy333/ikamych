<?php
require_once("../../includes/initialize.php");

?>
<?php
$username = null;
$server_name=$_SERVER['PHP_SELF'];
$new_password=null;


if(request_is_post()&& request_is_same_domain()){

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {

        $username=trim($_POST['username']);
        $valid=new FormValidation();
        $valid->validate_presences('username') ;

        if(empty($valid->errors)){
            $user=User::find_by_username($username);

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
            $message = "Please enter a username.";



        }


    }


}


?>

<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>

<?php include(HEADER); ?>
<?php include(NAV); ?>

<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php echo isset($message)? output_message($message):"" ; ?>

<!--<body class="gray-bg">-->

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Forgot password</h2>

                    <p>
                        Enter your user name and your password will be reset and emailed to you.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">

                            <form class="m-t" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                                </div>
                                <?php echo csrf_token_tag(); ?>

                                <button type="submit"  name="submit_username" class="btn btn-primary block full-width m-b">Send new password</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
<?php include(FOOTER); ?>

<?php  ?>
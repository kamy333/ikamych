<?php require_once('../../includes/initialize_transmed.php'); ?>
<?php

// Rather than require setting up a real database, 
// we can fake one instead.


$message = "";
$token = $_GET['token'];

// Confirm that the token sent is valid
$user = User::find_by_reset_token($token);
if (!isset($user) || !$user) {
    // Token wasn't sent or didn't match a user.
    $session->message("Did not find you try again");
    redirect_to('login_forgot_password_username.php');
}


if (request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        // CSRF tests passed--form was created by us recently.

        // retrieve the values submitted via the form
        $password = trim($_POST['password']);
        $password_confirm = trim($_POST['password_confirm']);

        $valid = new FormValidation();
        $valid->validate_presences(array('password', 'password_confirm'));
        if ($password !== $password_confirm) {
            $valid->errors['password_confirmation'] = "Password confirmation does not match password.";
        }

        if (empty ($valid->errors)) {
            $user->password = $password;
            $user->save();
            $user->delete_reset_token();

            redirect_to('login.php');

        }

//
//		if(!has_presence($password) || !has_presence($password_confirm)) {
//			$message = "Password and Confirm Password are required fields.";
//		} elseif(!has_length($password, ['min' => 8])) {
//			$message = "Password must be at least 8 characters long.";
//		} elseif(!has_format_matching($password, '/[^A-Za-z0-9]/')) {
//			$message = "Password must contain at least one character which is not a letter or a number.";
//		} elseif($password !== $password_confirm) {
//			$message = "Password confirmation does not match password.";
//		} else {
//			// password and password_confirm are valid
//			// Hash the password and save it to the fake database
//			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
//			$user['hashed_password'] = $hashed_password;
//			update_record_in_fake_db('users', 'username', $user);
//			delete_reset_token($user['username']);
//			redirect_to('login.php');
//		}

    }
} else {


    if (isset($_SESSION)) {
        $session->end_session();
        $session = new Session();
    }


}
?>

<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>

<?php include(HEADER); ?>
<?php include(NAV); ?>

<?php
//echo "token:".$token."<br>";
//echo "<pre>".
//    print_r($_POST);
//print_r($_GET);
//echo "</pre>"
?>


<?php $url = "?token=" . u($token); ?>
<!--<div class="col-md-6 col-md-offset-2  col-lg-6 col-md-offset-2">-->
<!---->
<!--    <div class ="background_light_blue">-->


<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">Reset password</h2>

                <p>
                    Enter your new password and confirm.
                </p>

                <div class="row">
                    <div class="col-md-12">
                        <!--        <form id="" class="form-horizontal" action="-->
                        <?php //echo $_SERVER['PHP_SELF'].$url;?><!--" method="POST">-->
                        <form class="m-t" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


                            <?php echo csrf_token_tag(); ?>

                            <p class="help-block col-lg-offset-2 col-md-offset-2"><a
                                        style="color:blue-decoration: underline" href="login.php">back to login</a></p>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="New Password"
                                       required="">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password_confirm" class="form-control"
                                       placeholder="Confirm new password" required="">
                            </div>


                            <button type="submit" name="submit_new_password"
                                    class="btn btn-primary block full-width m-b">Reset password
                            </button>


                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include(FOOTER); ?>

<?php
require_once("../../includes/initialize.php");
$blacklist_ip=new BlacklistIp();
$blacklist_ip->block_blacklisted_ips();

if($session->is_logged_in()) {
    redirect_to("index.php");
}

$username="";
$password="";
// Remember to give your form's submit tag a name="submit" attribute!



if(request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        // CSRF tests passed--form was created by us recently.

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $valid=new FormValidation();

        $valid->validate_presences('username','password');

        $failed_login=new FailedLogin();
        if(empty($valid->errors)) {



            $throttle_delay=$failed_login->throttle_failed_logins($username);
            if($throttle_delay>0){
                $message="Too many attempted login. ";
                $message .= "You must wait {$throttle_delay} minutes before you can attempt another login or ask to reset your password.";


            } else {

                // Check database to see if username/password exist.
                $found_user = User::authenticate($username, $password);

                if ($found_user) {
                    $failed_login->clear_failed_logins($username);
                    $session->login($found_user);
                    log_action('Login', "{$found_user->username} logged in.");
                    if(User::is_visitor() ){ redirect_to('/Inspinia/index.php');}
                    redirect_to("index.php");
                } else {
                    log_action('Login failed', "{$username} logged in failed.");
                    $failed_login->record_failed_login($username);
                    $blacklist_ip->add_ip_to_blacklist();
                    $message = "Username/password combination incorrect.";

                    //Uncomment if need to reinitialize to 0 blacklist and ip as argument
                    //$blacklist_ip->clear_blacklist_ip($_SERVER['REMOTE_ADDR']);


                }
            }
        } //end throddle

        else {
            //   $message = "Username/password combination incorrect.";
        }

    }


} //end request is post

?>


<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>

<?php include(HEADER); ?>
<?php include(NAV); ?>

<?php  if(isset($message)){echo output_message($message);} ?>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

<!--                <h1 class="logo-name">KA+</h1>-->

            </div>
            <h2>Welcome to <?php echo $logo; ?></h2>
       
            <p>Login in to access to admin area</p>
            <form class="m-t" role="form"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <?php echo csrf_token_tag(); ?>

                <div class="form-group">
                    <label for="username" class="sr-only">username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus <?php echo 'value="'.htmlentities($username, ENT_COMPAT, 'utf-8') . '"';?>>
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password"  id="username"  name="password"  class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a  href="<?php echo $path_admin;?>login_forgot_password_email.php"><small>Forgot password?</small></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a  href="<?php echo $path_admin;?>login_forgot_password_username.php"><small>Forgot user name?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo $path_admin;?>register.php">Create an account</a>
            </form>
<!--            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>-->
        </div>
    </div>

    <?php include(FOOTER); ?>

<?php
require_once("../../includes/initialize.php");
$blacklist_ip = new BlacklistIp();
$blacklist_ip->block_blacklisted_ips();

if ($session->is_logged_in()) {
    redirect_to("index.php");
}

$username = "";
$password = "";
// Remember to give your form's submit tag a name="submit" attribute!


if (request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        // CSRF tests passed--form was created by us recently.

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $valid = new FormValidation();

        $valid->validate_presences(['username', 'password']);

        $failed_login = new FailedLogin();
        if (empty($valid->errors)) {


            $throttle_delay = $failed_login->throttle_failed_logins($username);
            if ($throttle_delay > 0) {
                $message = "Too many attempted login. ";
                $message .= "You must wait {$throttle_delay} minutes before you can attempt another login or ask to reset your password.";


            } else {

                // Check database to see if username/password exist.
                $found_user = User::authenticate($username, $password);

                if ($found_user) {

                    if ($found_user->block_user == 0) {
                        $failed_login->clear_failed_logins($username);
                        $session->login($found_user);
                        log_action('Login', "{$found_user->username} logged in from public.");
                        redirect_to("index.php");
                    } else {
                        log_action('Login failed', "{$username} logged in failed because is blocked. (Public)");
                        $message = "Dear {$found_user->nom}, You are blocked until your registration is reviewed. Thank you for your understanding. ";
                        $found_user->blocked_email('Blocked User tried to login. (Public)');

                    }


                } else {
                    log_action('Login failed', "{$username} logged in failed.(Public)");
                    $failed_login->record_failed_login($username);
                    $blacklist_ip->add_ip_to_blacklist();

                    log_action('Login failed', "{$username} logged in failed.(Public)");
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
<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $javascript = "form_admin" ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<?php echo output_message($message); ?>


<div class="row">

    <div class="col-md-4 col-md-offset-4  col-lg-4 col-lg-offset-4 ">
        <form id="myform-signin" class="form-signin " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <?php echo csrf_token_tag(); ?>
            <h2 class="form-signin-heading text-center">Please sign into <br><?php echo $logo; ?> Admin area <small>ikamy.ch</small>
            </h2>
            <h6><a href="login_forgot_password_user.php">Forgot login?</a></h6>

            <label for="username" class="sr-only">username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required
                   autofocus <?php echo 'value="' . htmlentities($username, ENT_COMPAT, 'utf-8') . '"'; ?>>

            <br>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" id="submit" type="submit" name="submit" value="submit">Sign
                in
            </button>
        </form>

    </div>

</div>


<?php //include_layout_template('admin_footer.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

<?php
require_once("../../includes/initialize.php");
$blacklist_ip = new BlacklistIp();
$blacklist_ip->block_blacklisted_ips();

if ($session->is_logged_in()) {
    redirect_to(login_redirect_url("index.php"));
}

$username = "";
$password = "";
$message = "";
$return_to = login_return_to();
// Remember to give your form's submit tag a name="submit" attribute!


if (request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        // CSRF tests passed--form was created by us recently.

        $username = trim((string)($_POST['username'] ?? ''));
        $password = trim((string)($_POST['password'] ?? ''));

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
                        redirect_to(login_redirect_url("index.php"));
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
<?php $active_menu = "login" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $javascript = "form_admin" ?>
<?php $fluid_view = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<style>
    body {
        padding-top: 0;
        background: #111827;
    }

    body > br,
    #container-view > br {
        display: none;
    }

    body > #container-view {
        min-height: 100vh;
        padding-right: 0;
        padding-left: 0;
    }

    .navbar-fixed-top {
        background: rgba(255, 255, 255, 0.92);
        border: 0;
        box-shadow: 0 10px 30px rgba(17, 24, 39, 0.12);
    }

    .my_footer {
        display: none;
    }

    .login-world {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        box-sizing: border-box;
        padding: 96px 20px 48px;
        color: #f8fafc;
        background:
            linear-gradient(rgba(17, 24, 39, 0.78), rgba(17, 24, 39, 0.82)),
            url("<?php echo h(SITE_URL); ?>/public/css/patterns/shattered.png") center center / auto repeat;
    }

    .login-world__shell {
        width: min(520px, 100%);
        margin: 0 auto;
    }

    .login-panel {
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 24px 70px rgba(0, 0, 0, 0.32);
        backdrop-filter: blur(12px);
    }

    .login-panel {
        width: 100%;
        padding: 40px;
        background: rgba(255, 255, 255, 0.96);
        color: #111827;
    }

    .login-panel__kicker {
        color: #047857;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .login-panel__title {
        margin: 10px 0 8px;
        color: #111827;
        font-size: 34px;
        font-weight: 800;
        line-height: 1.18;
    }

    .login-panel__title img {
        display: block;
        width: 120px;
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .login-panel__title span {
        display: block;
    }

    .login-panel__subtitle {
        margin-bottom: 26px;
        color: #475569;
        font-size: 16px;
        line-height: 1.55;
    }

    .login-panel .alert {
        margin: 0 0 18px;
    }

    .login-panel .input-group {
        margin-bottom: 16px;
    }

    .login-panel .input-group-addon {
        min-width: 52px;
        color: #334155;
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .login-panel .form-control {
        height: 52px;
        font-size: 16px;
        border-color: #cbd5e1;
        box-shadow: none;
    }

    .login-panel .form-control:focus {
        border-color: #0f766e;
        box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.14);
    }

    .login-panel__meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin: 4px 0 20px;
        color: #64748b;
        font-size: 14px;
    }

    .login-panel__meta a {
        color: #0f766e;
        font-weight: 700;
    }

    .login-panel__button {
        height: 54px;
        border: 0;
        background: #111827;
        color: #ffffff;
        font-size: 18px;
        font-weight: 800;
        box-shadow: 0 14px 30px rgba(17, 24, 39, 0.24);
    }

    .login-panel__button:hover,
    .login-panel__button:focus {
        background: #0f766e;
        color: #ffffff;
    }

    .login-panel__public {
        display: block;
        margin-top: 18px;
        color: #64748b;
        text-align: center;
    }

    .login-panel__public:hover,
    .login-panel__public:focus {
        color: #0f766e;
    }

    @media (max-width: 640px) {
        .login-world {
            align-items: flex-start;
            padding: 82px 12px 30px;
        }

        .login-panel__meta {
            display: block;
        }

        .login-panel {
            padding: 24px 18px;
        }

        .login-panel__title {
            font-size: 30px;
        }

        .login-panel__title img {
            width: 110px;
        }
    }
</style>

<main class="login-world">
    <div class="login-world__shell">
        <section class="login-panel" aria-label="Admin login">
            <div class="login-panel__kicker">Admin access</div>
            <h2 class="login-panel__title">
                <img src="<?php echo h(IKAMY_LOGO_LOGIN_URL); ?>" alt="ikamy.ch">
                <span>Admin</span>
            </h2>
            <p class="login-panel__subtitle">A quiet place to continue from where you left off.</p>

            <?php echo output_message($message); ?>

            <form id="myform-signin" class="form-horizontal" action="<?php echo h($_SERVER['PHP_SELF'] ?? 'login.php'); ?>" method="POST">
                <?php echo csrf_token_tag(); ?>
                <?php if ($return_to !== "") { ?>
                    <input type="hidden" name="return_to" value="<?php echo h($return_to); ?>">
                <?php } ?>

                <label for="username" class="sr-only">Username</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus value="<?php echo htmlentities($username, ENT_COMPAT, 'utf-8'); ?>">
                </div>

                <label for="password" class="sr-only">Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="login-panel__meta">
                    <span>Private session</span>
                    <a href="login_forgot_password_user.php">Forgot login?</a>
                </div>

                <button class="btn btn-lg btn-block login-panel__button" id="submit" type="submit" name="submit" value="submit">
                    Sign in
                </button>
            </form>

            <a class="login-panel__public" href="<?php echo h(SITE_URL); ?>/public/index.php">Back to public site</a>
        </section>
    </div>
</main>


<?php //include_layout_template('admin_footer.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

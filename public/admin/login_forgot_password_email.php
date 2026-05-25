<?php require_once('../../includes/initialize.php'); ?>
<?php // if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php // $session->confirmation_protected_page(); ?>

<?php
$email = "";
$server_name = $_SERVER['PHP_SELF'];
$new_password = null;
$message = "";

if (request_is_post() && request_is_same_domain()) {
    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        $email = trim((string)($_POST['email'] ?? ''));
        $valid = new FormValidation();
        $valid->validate_presences(['email']);
        $valid->validate_email('email');

        if (empty($valid->errors)) {
            $user = User::find_by_email($email);

            if ($user) {
                $user->delete_reset_token();
                $user->create_reset_token();
                $user->send_email();
            } else {
                // Email was not found; don't do anything.
            }

            // Keep the response identical so we do not reveal which accounts exist.
            $message = "A link to reset your password has been sent to the email address on file.";
        } else {
            $message = "Please enter your email.";
        }
    }
}
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $fluid_view = true; ?>
<?php $stylesheets = ""; ?>
<?php $javascript = "form_admin"; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<style>
    .password-reset-page {
        align-items: center;
        background: #f6f8fb;
        display: flex;
        min-height: calc(100vh - 150px);
        padding: 3em 1em 5em;
    }

    .password-reset-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        margin: 0 auto;
        max-width: 520px;
        padding: 2.25em;
        width: 100%;
    }

    .password-reset-card h1 {
        color: #1f2937;
        font-size: 28px;
        margin: 0 0 0.35em;
    }

    .password-reset-card .reset-intro {
        color: #667085;
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 1.5em;
    }

    .password-reset-card .form-control {
        border-color: #cbd5e1;
        box-shadow: none;
        height: 44px;
    }

    .password-reset-card .form-control:focus {
        border-color: #337ab7;
        box-shadow: 0 0 0 3px rgba(51, 122, 183, 0.12);
    }

    .password-reset-card .input-group-addon {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #64748b;
    }

    .password-reset-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75em;
        justify-content: space-between;
        margin-top: 1.25em;
    }

    .password-reset-actions a {
        color: #337ab7;
    }

    .password-reset-submit {
        margin-top: 1.5em;
    }

    .password-reset-submit .btn {
        font-size: 16px;
        padding: 0.75em 1em;
    }

    @media (max-width: 767px) {
        .password-reset-page {
            align-items: flex-start;
            padding-top: 2em;
        }

        .password-reset-card {
            padding: 1.5em;
        }
    }
</style>

<main class="password-reset-page">
    <section class="password-reset-card" aria-labelledby="password-reset-title">
        <h1 id="password-reset-title" class="text-center">Reset your password</h1>
        <p class="reset-intro text-center">
            Enter your email address and we will send a password reset link if it matches your account.
        </p>

        <?php echo isset($valid) ? $valid->form_errors() : ""; ?>
        <?php echo output_message($message, 'o'); ?>

        <form action="<?php echo h($_SERVER['PHP_SELF']); ?>" method="POST">
            <?php echo csrf_token_tag(); ?>

            <div class="form-group">
                <label for="email">Email address</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    </span>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        autocomplete="email"
                        required
                        autofocus
                        value="<?php echo h($email); ?>"
                    >
                </div>
            </div>

            <div class="password-reset-submit">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Send reset link</button>
            </div>

            <div class="password-reset-actions">
                <a href="login.php">Back to login</a>
                <a href="login_forgot_password_user.php">Use username instead</a>
            </div>
        </form>
    </section>
</main>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

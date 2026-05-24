<?php require_once('../includes/initialize.php'); ?>
<?php
$errName = null;
$errEmail = null;
$errMessage = null;
$errHuman = null;
$errSecurity = null;
$result = null;
$name = "";
$email = "";
$message = "";
$csrf_token_id = 'contact';

function contact_recent_mail_attempts(int $window_seconds): array
{
    $now = time();
    $attempts = $_SESSION['contact_mail_attempts'] ?? [];

    if (!is_array($attempts)) {
        return [];
    }

    return array_values(array_filter($attempts, function ($attempt_time) use ($now, $window_seconds) {
        return is_int($attempt_time) && $attempt_time >= ($now - $window_seconds);
    }));
}

function contact_mail_rate_limit_exceeded(int $max_attempts = 3, int $window_seconds = 600): bool
{
    $_SESSION['contact_mail_attempts'] = contact_recent_mail_attempts($window_seconds);

    return count($_SESSION['contact_mail_attempts']) >= $max_attempts;
}

function record_contact_mail_attempt(int $window_seconds = 600): void
{
    $_SESSION['contact_mail_attempts'] = contact_recent_mail_attempts($window_seconds);
    $_SESSION['contact_mail_attempts'][] = time();
}

function generate_contact_challenge(): void
{
    $previous_question = $_SESSION['contact_challenge_question'] ?? null;
    $question = null;

    for ($attempt = 0; $attempt < 5; $attempt++) {
        $left = random_int(1, 9);
        $right = random_int(1, 9);
        $question = "{$left} + {$right} = ?";

        if ($question !== $previous_question) {
            break;
        }
    }

    $_SESSION['contact_challenge_question'] = $question;
    $_SESSION['contact_challenge_answer'] = $left + $right;
}

$is_post = isset($_POST["submit"]);

if (!$is_post || !isset($_SESSION['contact_challenge_answer'], $_SESSION['contact_challenge_question'])) {
    generate_contact_challenge();
}

if ($is_post) {
    $name = trim((string)($_POST['name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $message = trim((string)($_POST['message'] ?? ''));
    $human = trim((string)($_POST['human'] ?? ''));
    $website = trim((string)($_POST['website'] ?? ''));
    $expected_human = $_SESSION['contact_challenge_answer'] ?? null;
    $to = 'nafisspour@bluewin.ch';
    $subject = 'Message from ikamy.ch contact form';

    $body ="From: $name\n E-Mail: $email\n Message:\n $message";

    if (!csrf_token_is_valid($csrf_token_id) || !csrf_token_is_recent($csrf_token_id)) {
        $errSecurity = 'Please refresh the page and try again.';
    }

    if ($website !== '') {
        $errSecurity = 'Sorry, your message could not be sent. Please try again later.';
    }

    // Check if name has been entered
    if ($name === '') {
        $errName = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if ($message === '') {
        $errMessage = 'Please enter your message';
    }
    //Check if simple anti-bot test is correct
    if ($expected_human === null || $human === '' || !ctype_digit($human) || (int)$human !== (int)$expected_human) {
        $errHuman = 'Your anti-spam is incorrect';
    }

    if (!$errName && !$errEmail && !$errMessage && !$errHuman && !$errSecurity && contact_mail_rate_limit_exceeded()) {
        $errSecurity = 'Too many messages were sent recently. Please try again later.';
    }

// If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errHuman && !$errSecurity) {
        record_contact_mail_attempt();
        $safe_email = str_replace(["\r", "\n"], '', $email);
        $safe_name = str_replace(["\r", "\n"], ' ', $name);
        $mail = new MyPHPMailer(true);
        $sent = false;

        try {
            $mail->clearAddresses();
            $mail->clearReplyTos();
            $mail->addAddress($to);
            $mail->addReplyTo($safe_email, $safe_name);
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $sent = $mail->send();
        } catch (Throwable $e) {
            error_log('Contact form mail error: ' . $e->getMessage());
            $sent = false;
        }

        if ($sent) {
            $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
            $name = "";
            $email = "";
            $message = "";
        } else {
            $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
        }
    }

    generate_contact_challenge();
}
?>
<!---->
<?php $layout_context = "public"; ?>
<?php $active_menu="contact"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<div class="row">

    <div class="col-md-6 col-md-offset-3">
        <div class ="background_light_blue">

            <h2 class="page-header text-center" style="color: #0000ff">Contact</h2>
            <form class="form-horizontal" role="form" method="post" action="<?php echo h($_SERVER['PHP_SELF']); ?>">
                <?php echo csrf_token_tag($csrf_token_id); ?>
                <div class="form-group" style="position: absolute; left: -10000px;" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo h($name); ?>" required>
                        <?php echo "<p class='text-danger'>$errName</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo h($email); ?>" required>
                        <?php echo "<p class='text-danger'>$errEmail</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">Message</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="4" id="message" name="message" required><?php echo h($message); ?></textarea>
                        <?php echo "<p class='text-danger'>$errMessage</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="human" class="col-sm-3 control-label"><?php echo h($_SESSION['contact_challenge_question']); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer" required>
                        <?php echo "<p class='text-danger'>$errHuman</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <?php echo $errSecurity ? "<p class='text-danger'>$errSecurity</p>" : ""; ?>
                        <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <?php echo $result; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo str_repeat("<br>", 20) ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

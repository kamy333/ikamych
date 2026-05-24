<?php require_once('../includes/initialize.php'); ?>
<?php
$errName = null;
$errEmail = null;
$errMessage = null;
$errHuman = null;
$result = null;
$name = "";
$email = "";
$message = "";

if (isset($_POST["submit"])) {
    $name = trim((string)($_POST['name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $message = trim((string)($_POST['message'] ?? ''));
    $human = (int)($_POST['human'] ?? 0);
    $to = 'nafisspour@bluewin.ch';
    $subject = 'Message from ikamy.ch contact form';

    $body ="From: $name\n E-Mail: $email\n Message:\n $message";

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
    if ($human !== 5) {
        $errHuman = 'Your anti-spam is incorrect';
    }

// If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
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
        } else {
            $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
        }
    }
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
                    <label for="human" class="col-sm-3 control-label">2 + 3 = ?</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer" required>
                        <?php echo "<p class='text-danger'>$errHuman</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
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

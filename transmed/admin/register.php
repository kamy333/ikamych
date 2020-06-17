<?php require_once('../../includes/initialize_transmed.php'); ?>
<?php require_once('../layouts/config_header.php'); ?>
<?php
$class_name = "User";

?>
<?php

$username = "";
$first_name = "";
$last_name = "";
$email = "";
$password = "";

if (request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {

        if (isset($_POST['submit'])) { // Form has been submitted.

            log_action('Registration started ', " as of post submit");

            //  echo "<pre>".print_r($_POST)."</pre>";

            $user = new RegisterUser();

            $_POST['user_type_id'] = 5;


            $username = trim($_POST['username']);
            $first_name = trim($_POST['first_name']);
            $last_name = trim($_POST['last_name']);
            $email = trim($_POST['email']);


            $user->username = trim($_POST['username']);
            $user->password = trim($_POST['password']);
//            $user->first_name= trim($_POST['first_name']);
//            $user->last_name = trim($_POST['last_name']);

            $user->email = trim($_POST['email']);
            $user->user_type_id = 5;
            $user->block_user = 1;
            $user->unread_message = 0;
            $user->unread_notification = 0;


            if (isset($_POST['first_name'])) {
                $user->first_name = trim($_POST['first_name']);
            }
            if (isset($_POST['last_name'])) {
                $user->last_name = trim($_POST['last_name']);
            }

            $_POST['nom'] = $user->full_name();
            $user->nom = $user->full_name();

            if (isset($_POST['id'])) {
                $user->id = (int)$_POST['id'];
            }

            if (isset($_POST['id'])) {
                if (!isset($_POST['password']) || empty($_POST['password'])) {
                    $user->password = null;

                } else {
                    $user->password = trim($_POST['password']);
                    unset($password);
                }
            }

            if (!isset($_POST['password']) || empty($_POST['password'])) {

                $required_field = User::$required_fields;
                $kamy = "isset password";
            } else {
                $required_field = User::$required_fields;
                $kamy = "isset password";
            }


            $valid = new formValidation();
            //    echo get_class_vars('User');

            $valid->validate_presences($required_field);
            $valid->validate_email('email');

            $user->set_files($_FILES['user_image']);
            $user->upload_photo();
            // to validation

            if (empty($valid->errors)) {
                if (!$user->save()) {
                    log_action('Registration success for ', $user->username . " created");

                    $session->message("User: " . $user->username . " " . " has been created for ID (" . $user->id . ")");
                    $session->ok(true);
                    $user->login_visitor_email('Registration sucessfull');
                    $user->visitor_email('Registration sucessfull');

                    redirect_to("index.php");
                } else {
                    log_action('Registration unsuccessfull ', " ");
                    $user->login_visitor_email('Registration Unsucessfull');;
                    $session->message("User: " . $user->username . " " . "edit failed");

                }


            }


        }
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $get_item = $class_name::find_by_id($id);
    //   $_GET['user_type_id']=$get_item->user_type_id;
//   var_dump($get_item);

} else {


    if (isset($_GET['id'])) {
        $post_link = $_SERVER["PHP_SELF"] . "?id=" . urldecode($_GET['id']);
    } else {
        $post_link = $_SERVER["PHP_SELF"];
    }

}

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ikamy.ch | Register</title>

    <link href="<?php echo $path; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $path; ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $path; ?>css/style.css" rel="stylesheet">

</head>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo isset($valid) ? $valid->form_warnings() : "" ?>
<?php if (isset($message)) {
    echo output_message($message);
} ?>
<?php
echo "<div style='background-color: palegoldenrod'>";
echo $username;
echo $first_name;
echo $last_name;
echo $email;
echo "</div>";
?>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>

            <!--                <h1 class="logo-name">-->
            <?php //echo "<small style='font-size: 0.3em'>". $logo."</small>";?><!--</h1>-->

        </div>
        <h3>Register to <?php echo $logo; ?></h3>
        <p>Create account to see it in action.</p>
        <form autocomplete="off" class="m-t" role="form" id="register_form" method="post"
              action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username"
                       required <?php echo 'value="' . htmlentities($username, ENT_COMPAT, 'utf-8') . '"'; ?>>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name"
                       required <?php echo 'value="' . htmlentities($first_name, ENT_COMPAT, 'utf-8') . '"'; ?>>
            </div>

            <!--                <input type="email" style="display: none">-->
            <!--                <input type="password" style="display: none">-->

            <div class="form-group">
                <input autocomplete="off" type="text" class="form-control" name="last_name" placeholder="Last Name"
                       required="" <?php echo 'value="' . htmlentities($last_name, ENT_COMPAT, 'utf-8') . '"'; ?>>
            </div>
            <div class="form-group">
                <input autocomplete="off" type="email" name="email" class="form-control" placeholder="Email"
                       required"<?php echo 'value="' . htmlentities($email, ENT_COMPAT, 'utf-8') . '"'; ?>>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required
                       autocomplete="new-password">
            </div>
            <p class="text-muted text-center">
                <small>If you wish upload your picture?</small>
            </p>
            <div class="form-group">
                <input type="file" name="user_image" class="form-control">
            </div>

            <?php
            echo Form::form_id();
            echo csrf_token_tag();
            ?>

            <!--                <div class="form-group">-->
            <!--                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>-->
            <!--                </div>-->
            <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Register</button>

            <p class="text-muted text-center">
                <small>Already have an account?</small>
            </p>
            <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
        </form>
        <p class="m-t">
            <small>&#xA9;&nbsp;2014 - <?php echo date("Y") . '- ' . $logo; ?></small>
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo $path; ?>js/jquery-2.1.1.js"></script>
<script src="<?php echo $path; ?>js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $path; ?>js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
//            document.getElementById("register_form").reset();
    });
</script>

</body>

</html>

<?php require_once('../includes/initialize.php');
$session->confirmation_protected_page();

if (User::is_caroline() || User::is_weslley()) {
} else {
    redirect_to('../index.php');
}

?>



<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>

<?php //include(HEADER) ?>
<?php //include(SIDEBAR) ?>
<?php //include(NAV) ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>


<?php


if (isset($_SESSION["user_id"])) {
    $user = User::find_by_id($_SESSION['user_id']);
} else {
    $user = "";
}

if (isset($_GET["person_id"])) {
    $p_id = $_GET["person_id"];
} else {
    $p_id = 2;
}

$persons = MyExpensePerson::find_all();

foreach ($persons as $person) {
    if ($person->authorized_user) {
        $auth_users = explode(",", $person->authorized_user);
        foreach ($auth_users as $auth_user) {
            if ($user->username == $auth_user) {
                $p_id = $person->id;
            }
        }
    }
}


$myperson = MyExpensePerson::find_by_id($p_id);
$person = $myperson->person_name;


?>

<?php if (User::is_caroline() || User::is_weslley()) { ?>
    <?php
    if (isset($_GET['url'])) {
        $href = d($_GET['url']);
    }
    ?>


    <div class="row">
        <div class="col-lg-12 col-md-12  text-center">
            <div class="col-lg-9 col-lg-offset-3 text-center">
                <img class="img-responsive" src="<?php echo $href; ?>" alt="">
            </div>
        </div>
    </div>

    <div class="row center">


    </div>

    <!--    </div>-->


<?php } ?>


</div>


<?php include(FOOTER_PUBLIC); ?>
<?php //include(FOOTER) ?>



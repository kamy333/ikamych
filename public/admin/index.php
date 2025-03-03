<?php
require_once('../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php
if (User::is_visitor()) {
    redirect_to('../../Inspinia/index.php');
}
?>

<?php
$show_testing = false;
$php_self = $_SERVER['PHP_SELF'];
$nbspace = str_repeat("&nbsp;", 15);
if (isset($_GET['test']) && $_GET['test'] == 1) {
    $show_testing = true;
    $view = "<a href='$php_self'>Hide</a>$nbspace";
} else {
    $show_testing = false;
    $view = "<a href='$php_self?test=1'>Show</a> ";
}
?>
<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $sub_menu = true; ?>
<?php $javascript = "form_admin" ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<style>
    .btn-custom {
        font-size: larger;
        width: 25rem;
        height: 6.5rem;
        margin-right: 5rem;
    }

    @media (max-width: 768px) {
        .btn-custom {
            font-size: small;
            width: 17rem;
            height: 4rem;
            margin-right: 2rem;
        }
    }

    .margin-button {
        margin-bottom: 3rem;
        margin-top: 2rem;

    }


</style>

<div class="row">

    <div class="col-md-1 text-center">
        <?php if (User::is_kamy()) { ?>
            <p><?= $view ?> </p>
        <?php } ?>
    </div>

    <div class="col-md-4 text-left">
        <p><a href="../index.php">&laquo; Public</a></p>
    </div>

    <div class="col-md-7 text-left">
        <h2>Menu</h2>
    </div>
</div>

<?php
if (isset($message)) {
    echo $message;
}
?>

<div>
    <div class="row">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="margin-top: 2em;padding: 2em;background-color: white">
                <h1 class="text-center"><a href="../../Inspinia/papa/francais_discours.php">Hommage  Papa</a></h1>
            </div>
        </div>
</div>

<div class='row'>
    <div class='col-md-12 text-center'>

        <!--        <p>Admin en construction link button not working</p>-->

        <?php if (User::is_kamy()) { ?>

        <div class="row margin-button">
            <a class="btn-custom" href="https://www.ikamy.ch/public/calendar.php">
                <button class="btn btn-info btn-custom ">
                    <i class="fa fa-calendar">&nbsp;Calendar.php</i>
                </button>
            </a>

            <a class="btn-custom" href="https://www.ikamy.ch/public/admin/notes.php">
                <button class="btn btn-warning btn-custom ">
                    <i class="fa fa-edit">&nbsp;Notes.php</i>
                </button>
            </a>

        </div>


        <div class="row margin-button">
            <a href="https://www.ikamy.ch/public/admin/crud/ajax/manage_ajax.php?class_name=Calendar">
                <button class="btn btn-primary btn-custom">
                    <i class="fa fa-calendar-o">&nbsp;&nbsp;Manage Calendar</i>
                </button>
            </a>

            <a href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=Calendar'>
                <button class="btn btn-danger btn-custom">
                    <i class="fa fa-plus-square">&nbsp;New Calendar Date</i>
                </button>
            </a>
        </div>

        <div class="row margin-button">
            <a href="https://www.ikamy.ch/public/admin/manage_user.php">
                <button class="btn btn-success btn-custom">
                    <i class="fa fa-user">&nbsp;Manage User</i>
                </button>
            </a>
        </div>


        <div class="row margin-button">


            <a href="https://www.ikamy.ch/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense">
                <button class="btn btn-primary btn-custom">
                    <i class="fa fa-dollar">&nbsp;Manage MyExpense</i>
                </button>
            </a>


            <a href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense'>
                <button class="btn btn-danger btn-custom">
                    <i class="fa fa-money">&nbsp;New MyExpense</i>
                </button>
            </a>
        </div>

        <div class="row margin-button">

            <a href='https://www.ikamy.ch/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpenseMumPost'>
                <button class="btn btn-primary btn-custom">
                    <i class="fa fa-dollar">&nbsp;Manage My Mum Post</i>
                </button>
            </a>

            <a href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=MyExpenseMumPost'>
                <button class="btn btn-danger btn-custom">
                    <i class="fa fa-plus-square">&nbsp;New My Mum Post</i>
                </button>
            </a>
        </div>


    </div>


    <!--            https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense     -->
    <?php } ?>

    <br><br>
    <hr>

    <?php

    if (User::is_kamy()) {
        echo "<div class='col-md-12 text-center'>";
        echo DatabaseObject::form_structure();

        if (isset($_GET['class_name'])) {

            echo '<br><br>';
            $class_name = $_GET['class_name'];
            $countrecords = $class_name::count_all();
            echo "Number of records in db: <b>$countrecords</b> ";
            echo "<br><br>";
            echo $class_name::class_structure();

            echo $class_name::find_column_name();
            echo "</div>";
//    echo "";
        }
    }


    ?>


</div>
</div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
		

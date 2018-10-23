<?php require_once('../../../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "books"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h3 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Programming books</a></mark>
</h3>


<div class="col-lg-5 col-lg-offset-2 " style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
    <h4>
        <a href="https://www.apress.com/fr#" class="">Apress</a>
    </h4>
    <?php
    $ebooks = get_ebooks("books/");
    foreach ($ebooks as $ebook) {
        echo "<br>" . $ebook["href"];
    }

    ?>
</div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


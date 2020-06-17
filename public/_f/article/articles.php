<?php require_once('../../../includes/initialize.php'); ?>
<?php //$session->confirmation_protected_page(); ?>
    <!---->
<?php //if (User::is_employee()) {
//    redirect_to('index.php');
//} ?>


<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo $message; ?>


<?php
if (User::is_admin()) {
    echo book_category();
}

echo article_subject();


if (isset($_GET['submitBookCategory'])) {
    echo book_by_sql($_GET['BookCategory']);
}

if (isset($_GET['submitArticleSubject'])) {
    echo article_by_sql($_GET['ArticleSubject']);
} else {
    if (!isset($_GET['submitBookCategory'])) {
        echo article_by_sql(1);
    }
}

?>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
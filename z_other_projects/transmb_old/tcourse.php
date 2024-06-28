<?php require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();
?>
<?php
//$header_css=["<link rel=\"stylesheet\" href=\"assets/css/autodividers-linkbar.css\">"];
//$header_script=["<script src=\"assets/js/autodividers-linkbar.js\"></script>"];
$header_script = ["></script>"];

?>
<?php include "layouts/header/header.php" ?>


<div data-role='page' id='pageLinksForId'>

    <div id="message-ajax"></div>


    <!-- header -->
    <div data-role='header' class='page-header' data-add-back-btn='true'>
        <a href='index.php' data-icon='arrow-l' data-iconpos='notext' data-direction='reverse' data-rel='back'>Back</a>
        <div class='logo'></div>

        <a href='index.php' data-icon='home' data-iconpos='notext' data-direction='reverse' rel='external'
           class='ui-btn-right'>Home</a>
    </div>
    <!--/header -->

    <div id="CourseMobile">
        <?php echo CourseMobile::links_for_id(); ?>
    </div>
</div>


<?php include "layouts/footer/footer.php" ?>


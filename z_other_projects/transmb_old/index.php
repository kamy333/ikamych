<?php require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();
?>
<?php
//$header_css=["<link rel=\"stylesheet\" href=\"assets/css/autodividers-linkbar.css\">"];
//$header_script=["<script src=\"assets/js/autodividers-linkbar.js\"></script>"];
?>
<?php include "layouts/header/header.php" ?>


<div data-role="page" id="pageone" data-theme="b">
    <div data-role="header">
        <h1>Bienvenue sur transmb</h1>
    </div>

    <div data-role="main" class="ui-content">
        <p>Welcome!</p>


        <ul data-role="listview" data-autodividers="false" id="sortedList">
            <li><a href="<?php echo $Nav->http ?>transmed/index.php" rel="external">Desktop</a></li>
            <li><a href="<?php echo $Nav->http ?>transmedmb/index.php" rel="external">Transmed Mobile</a></li>
            <li><a href="tpseudo.php" rel="external">Pseudo</a></li>
            <li><a href="#pageListCourse">List Course</a></li>
            <li><a href="tform_course.php" rel="external">Form Course</a></li>
            <li><a href="test_input.php" rel="external">Test Input pseudo</a></li>

        </ul><!-- /listview -->


    </div>

    <div data-role="footer">
        <h1>Footer Text</h1>
    </div>
</div>

<div data-role="page" id="pageListCourse">

    <div id="message-ajax"></div>

    <?php echo CourseMobile::main_display(); ?>

</div>


<div data-role="page" id="pageFormCourse">
    <div data-role="main" class="ui-content">
        <p>Welcome!</p>

    </div>
</div>

<?php include "layouts/footer/footer.php" ?>




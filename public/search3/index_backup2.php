<?php require_once('../../includes/initialize.php'); ?>

<?php
if (User::is_caroline() || User::is_weslley()) {
} else {
    redirect_to('../index.php');
}
?>


<?php $layout_context = "admin"; ?>
<?php $active_menu = "Search"; ?>
<?php $stylesheets = "search_text"; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS .'search'.DS.'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<div class="ui-widget">
    <label for="combobox">Your preferred programming language: </label>
    <select id="combobox">
        <option value="">Select one...</option>
        <option value="ActionScript">ActionScript</option>
        <option value="AppleScript">AppleScript</option>
        <option value="Asp">Asp</option>
        <option value="BASIC">BASIC</option>
        <option value="C">C</option>
        <option value="C++">C++</option>
        <option value="Clojure">Clojure</option>
        <option value="COBOL">COBOL</option>
        <option value="ColdFusion">ColdFusion</option>
        <option value="Erlang">Erlang</option>
        <option value="Fortran">Fortran</option>
        <option value="Groovy">Groovy</option>
        <option value="Haskell">Haskell</option>
        <option value="Java">Java</option>
        <option value="JavaScript">JavaScript</option>
        <option value="Lisp">Lisp</option>
        <option value="Perl">Perl</option>
        <option value="PHP">PHP</option>
        <option value="Python">Python</option>
        <option value="Ruby">Ruby</option>
        <option value="Scala">Scala</option>
        <option value="Scheme">Scheme</option>
    </select>
</div>
<!--<button id="toggle">Show underlying select</button>-->




<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

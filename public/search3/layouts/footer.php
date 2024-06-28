<?php echo str_repeat("<br>", 4); ?>
<footer class="row nav navbar-fixed-bottom my_footer">
    <div class="row">
        <div class="socialmediaicons pull-right" style="margin-right: 5em;">

        </div>
        <div class="text-center">
            <p class="text-center">
                <small>&#xA9;&nbsp;2014 - <?php echo date("Y"); ?>,<?php echo " " . $logo; ?> </small>
            </p>
        </div>
    </div>
</footer>

</div>   <!--Div class container-->


<!--<script src="//code.jquery.com/jquery-latest.min.js"></script>-->
<!---->
<!---->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"-->
<!--        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"-->
<!--        crossorigin="anonymous"></script>-->
<script src="<?php echo $Nav->path_public; ?>myjs/socialmedia.js"></script>




<?php echo str_repeat("<br>", 50) ?>

</body>


</html>
<?php if (isset($database)) {
    $database->close_connection();
} ?>

<?php require_once('../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "Others"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Les aventures de Bralia à Budapest </a></mark>
</h4>



<h3 class="text-center"> <?php echo $text; ?></h3>


<div class="col-lg-6 col-lg-offset-3 " style="background-color: white;margin-top: 2em;padding: 2em">

    <?php
    echo $ebooks = get_picture_folder_blueimp_gallery("Bralia/budapest");
    ?>

</div>

<div class="col-lg-6 col-lg-offset-2" style="background-color: white;margin-top: 2em;padding: 2em">

    <?php

    $width = 400;
    $height = 400;
    $imgpath = "/public/img/Bralia/budapest/photo04.PNG";
    $img = " <img src='$imgpath' width='{$width}em' height='{$height}em' alt='Synaguogue Budapest' style='float: left' align='right' >";
    $link = "<span><a href='$imgpath'>$img</a></span>";
    //
    $text = "$link<p style='margin-right: 5em;'>La conception de la syna est particulière . Le rabbin a d'abord fait un speech en hongrois haut perché ( sur un genre de préchoire comme dans les églises) puis est descendu faire la prière devant la torah comme d'habitude . Il avait de l'orgue et un cœur et le rabbin avait une très belle voix  . Un vrai plaisir :) </p>  ";

    //    $text .="Well, the HTML method is perfectly reliable, but we mention the CSS method because it's more versatile for style-related formatting on your webpage. For example, let's say you have a website where you publish a lot of articles with images, so you use text wrapping a lot. What if you decide you want to change the style of the text wrap, like adding or removing a border around the image, changing its position within the article, or other design considerations? If you've used the HTML version, you'll need to go through every article and change each  tag individually. If you've used the CSS method, all you need to do is change the CSS code, and all the text wrapping will change simultaneously. So you may want to consider becoming familiar with CSS if this sounds useful to you.";

    echo "" . $text . "<hr>";


    ?>



</div>


<?php echo str_repeat("<p style='color:white'>i</p>", 20); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


<?php require_once('../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>


<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>

<?php

function google_drive_video($title = "", $src = "", $width = 640, $height = 480, $col = null)
{
    $output = "";

    if ($col) {
        $output .= "<div class='col-lg-{$col} text-center' >";
    }

    $output .= "<div class=\"ibox float-e-margins\" \">";
    $output .= "<div class=\"ibox-content\">";
    $output .= "<p class=\"text-justify\">";
    $output .= $title;
    $output .= "</p>";
    $output .= "<iframe src='";
    $output .= $src;
    $output .= "' ";
    $output .= "width=\"{$width}\" height=\"{$height}\"></iframe>";
    $output .= " </div>";
    $output .= "</div>";

    if ($col) {
        $output .= "</div>";
    }
    return $output;
}

?>
    <!--<p id="side-menu"></p>-->
<?php echo gallery_button(); ?>

    <div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <h1 class="text-center">FILM</h1>


                    </div>
                </div>
            </div>
        </div>

        <?php // https://www.youtube.com/watch?v=scXfKLWisGU how to embed video?>

        <div class="row">
            <div class="col-lg-12">
                <?php
                $title = "Mar Adentro.avi";
                //                    $src="https://drive.google.com/file/d/1TMaxqr4E5km7QMxN5kyeSode2uZw0bBP/view?usp=sharing";
                $src = "https://drive.google.com/file/d/1TMaxqr4E5km7QMxN5kyeSode2uZw0bBP/preview";
                $width = 240;
                $height = 180;
                $col = 3;
                echo google_drive_video($title, $src, $width, $height, $col);

                //                    echo "<hr>";

                $title = " Comme un juif en France Episode 1";
                $src = "https://drive.google.com/file/d/0B71yHaesAeDTTGVaRVBXUXRoNmM/preview";
                $width = 240;
                $height = 180;
                $col = 3;
                echo google_drive_video($title, $src, $width, $height, $col);


                $title = " Comme un juif en France Episode 2";
                $src = "https://drive.google.com/file/d/0B71yHaesAeDTaDFvdFBpZ1ROdVE/preview";
                $width = 240;
                $height = 180;
                $col = 3;
                echo google_drive_video($title, $src, $width, $height, $col);


                ?>


            </div>

        </div>


    </div>

<?php include(FOOTER_PUBLIC); ?>
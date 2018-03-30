<?php require_once('../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>


<?php //$bralia=User::find_by_id(28); ?>

<?php //if( $bralia->id===28 || User::is_kamy()){} else { redirect_to('admin/login.php');} ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php

function google_drive_video($title="",$src="",$width=640,$height=480,$col=null){
    $output = "";

    if($col){
        $output .= "<div class='col-lg-{$col} text-center' >";
    }

    $output .= "<div class=\"ibox float-e-margins\" \">";
    $output .= "<div class=\"ibox-content\">";
    $output .= "<p class=\"text-justify\">";
    $output.=$title;
    $output.="</p>";
    $output .= "<iframe src='";
    $output.=$src;
    $output .= "' ";
    $output .= "width=\"{$width}\" height=\"{$height}\"></iframe>";
    $output .= " </div>";
    $output .= "</div>";

    if($col){
        $output .= "</div>";
    }
    return $output;
}

?>
    <!--<p id="side-menu"></p>-->

<?php // https://www.youtube.com/watch?v=scXfKLWisGU how to embed video?>

<?php echo gallery_button();?>

    <div class="wrapper wrapper-content">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-content">

<h1 class="text-center">Making a murderer</h1>
        <p class="text-justify">The ten-part documentary, written and directed by Laura Ricciardi and Moira Demos, explores the story of Steven Avery, a man from Manitowoc County, Wisconsin, who served 18 years in prison for the sexual assault and attempted murder of Penny Beerntsen, before being exonerated in 2003. In 2005, he was arrested in connection with the murder of Teresa Halbach, a local photographer, and convicted in 2007. The series also covers the arrest, prosecution, and conviction of Avery's nephew, Brendan Dassey, who was also charged in the murder...
            <a target="_blank" href="https://en.wikipedia.org/wiki/Making_a_Murderer">wiki</a> </p>
        <blockquote>Extraordinary story, the one that shakes your convictions!</blockquote>
        </div>
        </div>
    </div>
    </div>


            <div class="row">
                <div class="col-lg-12" >
                    <?php
                    $title="Episode 1 \"Eighteen Years Lost\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTeGxTTnZmVXBGcVE/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);


                $title="Episode 2 \"Turning the Tables\"";
                $src="https://drive.google.com/file/d/0B71yHaesAeDTTG5IRnNkV29wYjg/preview";
                $width=240;
                $height=180;
                $col=3;
                 echo google_drive_video($title,$src,$width,$height,$col);




                    $title="Episode 3 	\"Plight of the Accused\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTY0UtalppenNYcjQ/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);

                    $title="Episode 4 \"Indefensible\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTSU9PdzdtRW4wM28/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);

                    $title="Episode 5 \"The Last Person to See Teresa Alive\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTelpvQXhYUk42S1E/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);

                    $title="Episode 6 \"Testing the Evidence\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTNWV3WE55Y0RJVVE/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);

                    $title="Episode 7 \"Framing Defense\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTaXV0VDJSSUZJQjA/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);


                    $title="Episode 8 \"The Great Burden\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTM1dqcWE2cGlvUVU/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);

                    $title="Episode 9 \"Lack of Humility\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTalIxUkdVS3lUMVU/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);


                    $title="Episode 10 \"Fighting for Their Lives\"";
                    $src="https://drive.google.com/file/d/0B71yHaesAeDTRXExSVB1dmRpWk0/preview";
                    $width=240;
                    $height=180;
                    $col=3;
                    echo google_drive_video($title,$src,$width,$height,$col);

                    ?>


            </div>

        </div>





    </div>

<?php include(FOOTER_PUBLIC) ;?>
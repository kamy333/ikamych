<?php require_once('../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page();

if (!User::is_admin()) {
    redirect_to($Nav->path_admin . 'index.php');
}

?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>
<?php echo gallery_button(); ?>
    <div class="row">

        <div class="pull-right">
            <p class="text-center">Music here!</p>

        </div>
    </div>


    <div class="wrapper wrapper-content">
        <div class="container">

            <h1 class="text-center">Enregistrement </h1>


            <?php

            $directories = ['A', 'B', 'C', 'D'];

            foreach ($directories as $directory) {
                $h2 = $directory;
                $fol = "VOICE/$directory";
                echo get_mp3($fol, $h2, $folder_project_name);
                echo "<hr>";
            }

            //


            ?>


        </div>


    </div>


    <!--    </div>-->
    <!---->
    <!--    </div>-->


<?php include(FOOTER_PUBLIC); ?>
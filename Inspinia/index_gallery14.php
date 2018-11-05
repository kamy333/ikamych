<?php require_once('../includes/initialize.php'); ?>
<?php //$bralia=User::find_by_id($session->user_id); ?>

<?php if (User::is_djamila()) {
} else {
    redirect_to('admin/login.php');
} ?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>

<?php echo gallery_button(); ?>

    <h1>Objectif Djamila</h1>


    <div class="wrapper wrapper-content">

        <div class="row">


        </div>

        <div class="row">


            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2><span class="pull-right"> <a href="index.php"
                                                         class="btn btn-primary">back Home</a></span></h2>

                        <blockquote></blockquote>
                        <p><a href="http://passeportpourlemploi.com/entreprendre/Vid0807-faire-naitre-son-idee"
                              class="">passeportpourlemploi.com/entreprendre/Vid0807-faire-naitre-son-idee</a></p>

                        <a href="http://cefa-aero.ch/fr/programme-carriere/" class="">Helico Pilotage H</a>


                        <ol>
                            <li>“You can never solve a problem on the level on which it was created.”</li>


                            <li>“There are only two ways to live your life. One is as though nothing is a miracle. The
                                other is as though everything is a miracle.”
                            </li>

                            <li>“Imagination is more important than knowledge. For knowledge is limited, whereas
                                imagination embraces the entire world, stimulating progress, giving birth to evolution.”
                            </li>

                            <li>“Logic will get you from A to Z; imagination will get you everywhere.”</li>

                            <li>“Life is like riding a bicycle. To keep your balance, you must keep moving.”</li>

                            <li>“Anyone who has never made a mistake has never tried anything new.”</li>

                            <li>“I have no special talents. I am only passionately curious.”</li>

                            <li>“Be a loner. That gives you time to wonder, to search for the truth. Have holy
                                curiosity. Make your life worth living.”
                            </li>

                            <li>“Try not to become a man of success. Rather become a man of value.”</li>

                            <li>“Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will
                                live its whole life believing that it is stupid.”
                            </li>
                        </ol>


                    </div>
                </div>


            </div>

        </div>
    </div>

<?php include(FOOTER_PUBLIC); ?>
<?php require_once('../includes/initialize.php'); ?>
<?php //$bralia=User::find_by_id($session->user_id); ?>

<?php //if( User::is_bralia()){} else { redirect_to('admin/login.php');} ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>
    <!--<p id="side-menu"></p>-->
<?php echo gallery_button();?>
    <div class="wrapper wrapper-content">

        <div class="pull-right">
            <p class="text-center" style="font-size:1em">Rise Up song</p>
            <audio controls>
                <source src="img/Xavier/Rise Up - Andra Day (Cover).mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

        </div>
        <div class="row">


            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>
                            <button class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa-heart"></i></button>
                            Pour toi mon cher ami Xavier <span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span> </h2>
                        <blockquote>Je t'aime et je ne t'oublierai jamais</blockquote>


                            <?php
                            $h2="Xavier";
                            $fol="Xavier";
                            echo blueimp_wrapper($h2,blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery($fol,$h2,$folder_project_name)));?>

                            </div>
                </div>


<iframe width="560" height="315" src="https://www.youtube.com/embed/lwgr_IMeEgA?start=40" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>



                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Drag&amp;Drop</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                Lyrics Rise Up
                            </h2>
                            <pre>
Lyrics
You're broken down and tired
Of living life on a merry go round
And you can't find the fighter
But I see it in you so we gonna walk it out
And move mountains
We gonna walk it out
And move mountains
And I'll rise up
I'll rise like the day
I'll rise up
I'll rise unafraid
I'll rise up
And I'll do it a thousand times again
And I'll rise up
High like the waves
I'll rise up
In spite of the ache
I'll rise up
And I'll do it a thousand times again
For you
For you
For you
For you
When the silence isn't quiet
And it feels like it's getting hard to breathe
And I know you feel like dying
But I promise we'll take the world to its feet
And move mountains
Bring it to its feet
And move mountains
And I'll rise up
I'll rise like the day
I'll rise up
I'll rise unafraid
I'll rise up
And I'll do it a thousand times again
For you
For you
For you
For you
All we need, all we need is hope
And for that we have each other
And for that we have each other
And we will rise
We will rise
We'll rise, oh, oh
We'll rise
I'll rise up
Rise like the day
I'll rise up
In spite of the ache
I will rise a thousand times again
And we'll rise up
High like the waves
We'll rise up
In spite of the ache
We'll rise up
And we'll do it a thousand times again
For you
For you
For you
For you
Ah, ah, ah, ah
                            </pre>
                        </div>
                    </div>





        </div>
    </div>
    </div>

<?php include(FOOTER_PUBLIC) ;?>
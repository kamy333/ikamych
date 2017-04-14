<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php

?>
<!--<p id="side-menu"></p>-->
<?php echo gallery_button();?>
<div class="wrapper wrapper-content">
    <div class="row">


        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <h2>Desiree and Peddy Wedding gallery<span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span> </h2>
                    <p>
                        <strong>Desiree and Peddy Wedding</strong> was held in Los Angeles on March 27, 2016 at
                        <a target="_blank" href="http://www.ritzcarlton.com/en/hotels/california/marina-del-rey/weddings">Ritz Carlton Marina Del Ray</a>
                    </p>
                 <blockquote><span class="pull-left" style="width: 5em"><img src="img/michael.jpg" id="" style='width:3em; height:3em;' class="img-circle hover_img"></span><p> &quot; So much love for my sister and Peddy! I wish you both the best on your journey together and a lifetime full of health and happiness! What a night to remember! Love you both!<a href="#">#desiandpeddy</a>&quot;</p></blockquote>

                    <?php echo blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery("DesireeWedding","Wedding",$folder_project_name)); ?>
                    
                </div>
                </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 ">
                    <div class="ibox float-e-margins" ">
                    <div class="ibox-content">

                        <div class="fb-video" data-href="https://www.facebook.com/albert.tabibian/videos/vb.1270734952/10206162000150236/?type=2&amp;theater" data-width="2000" data-show-text="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/albert.tabibian/videos/10206162000150236/"><a href="https://www.facebook.com/albert.tabibian/videos/10206162000150236/">Captured by Albert Tabibian</a><p></p>Posted by <a href="#" role="button">Albert Tabibian</a> on Tuesday, April 19, 2016</blockquote></div></div>

                    </div>
                </div>


            </div>
        </div>


                <div class="row">

                <div class="ibox-content">

                    <h2> Desiree and Peddy Video<span class="pull-left"> </span> </h2>
                    <p>
                        <strong>Watch Desiree and Peddy Videos</strong>
                    </p>
                    <div class="col-md-8 col-md-offset-2">
                    <div id="blueimp-video-carousel" class="blueimp-gallery blueimp-gallery-controls blueimp-gallery-carousel">
                        <div class="slides"></div>
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="play-pause"></a>
                    </div>

                </div>
                </div>
        </div>
                
                
                <div class="row">

                <div class="ibox-content">

                    <h2>Desiree and Peddy Engagement party gallery</h2>
                    <p>
                        <strong>Desiree and Peddy Engagement</strong> was held in Los Angeles on xx, 2015 at
                        <a target="_blank" href="#">xx</a>
                    </p>

                    <?php echo blueimp_lightBoxGallery( get_picture_folder_blueimp_gallery("DesireeEngagement","Engagement Party",$folder_project_name)); ?>


                </div>

            </div>
        </div>

    </div>
</div>

<?php include(FOOTER_PUBLIC) ;?>
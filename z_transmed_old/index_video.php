<?php require_once('../includes/initialize.php'); ?>

<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">


                <div class="ibox-content">

                    <h2>Desiree and Peddy Video<span class="pull-right"> <a href="index.php" class="btn btn-primary">back Home</a></span> </h2>
                    <p>
                        <strong>Watch Desiree and Peddy Videos</strong>
                    </p>

                    <div class="lightBoxGallery">

                        <?php
                        $img="DesireeVideo";
                        $dir=SITE_ROOT.DS."Inspinia/img/".$img;
                        if(is_dir($dir)) {
                            $dir_array = scandir($dir);
                            echo "<div class='row'>";
                            foreach($dir_array as $file) {
                                if(stripos($file, '.') > 0) {
                                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                                    $output=$ext;
                                    if($ext=='jpgxx' || $ext=='mp4' || $ext=='MOVXXX' || $ext=='PNGxx'){
//                                        echo "<a href='img/$img/{$file}' title=\"Wedding\" data-gallery=''><img src='img/$img/{$file}' style='width: 10em;height: 10em'></a>";
                                         echo " <div class='col-md-4'> <figure>
                            <iframe  id='VIDEO' width=\"320\" height=\"240\" src='img/$img/{$file}'  frameborder=\"0\" allowfullscreen ></iframe>
                        </figure></div>";

                                    }


                                }
                            }
                            echo "</div>";
                        }

                        unset($dir_array);
                        ?>

                        <a href="http://www.google.com?iframe=true&width=100%&height=100%" rel="prettyPhoto[iframes]" title="Google.com opened at 100%">Google.com</a>
                        <a href="http://www.apple.com?iframe=true&width=500&height=250" rel="prettyPhoto[iframes]">Apple.com</a>
                        <a href="http://www.twitter.com?iframe=true&width=400&height=200" rel="prettyPhoto[iframes]">Twitter.com</a>
                        I


                        <!-- Video -->
<!--                        <div id="blueimp-video-carousel" class="blueimp-gallery blueimp-gallery-controls blueimp-gallery-carousel">-->
<!--                            <div class="slides"></div>-->
<!--                            <h3 class="title"></h3>-->
<!--                            <a class="prev">‹</a>-->
<!--                            <a class="next">›</a>-->
<!--                            <a class="play-pause"></a>-->
<!--                        </div>-->

                    </div>

                </div>
                


            </div>
        </div>

    </div>
</div>

<?php include(FOOTER_PUBLIC) ;?>
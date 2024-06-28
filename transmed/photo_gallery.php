
<?php require_once ("admin/includes/init.php");?>
<?php
$page=!empty($_GET['page'])? (int)$_GET['page']:1;
$item_per_page=2;
$item_total_count=Photo::count_all();

$paginate=new Paginate($page,$item_per_page,$item_total_count);
$sql="SELECT * FROM photos LIMIT {$item_per_page} OFFSET {$paginate->offset()}";
$photos=Photo::find_by_query($sql);

?>
<?php //$photos=Photo::find_all(); ?>

<?php include("includes/header.php"); ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

  <p style="color: red;"><?php echo $session->message(); ?></p>

            </div>
        </div>

<!---->

            <!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->
<!--                 --><?php //include("includes/sidebar.php"); ?>
<!--        </div>-->

        <!-- /.row -->
            <div class="row">
              <div class="col-md-12">

                 <div class="thumbnail row">
                   <?php foreach ($photos as $photo): ?>
                     <div class="col-xs-6 col-md-3 ">

                   <a class="img-responsive home-page-photo" target="_blank" href="photo.php?id=<?php echo $photo->id; ?>">
                     <img src="<?php echo $photo->picture_public_path(); ?>" alt="<?php echo $photo->alternate_text;?>">


                         </a>

                 </div>
                   <?php endforeach; ?>

                 </div>


<div class="row">

    <div class="col-md-8 col-md-offset-3">
    <ul class="pager">

        <?php if($paginate->page_total()>1) {
                if($paginate->has_next()){
                echo    "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                }

            for($i=1;$i<=$paginate->page_total();$i++){
                if($i==$paginate->current_page){
                    echo "<li class='active'><a href='index.php?page={$i}'>$i</a></li>";
                } else {

                    echo "<li class=''><a href='index.php?page={$i}'>$i</a></li>";

                }

            }

            if($paginate->has_previous()){
                echo " <li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
            }
        }

        ?>

        
    </ul>

</div>
</div>


            </div>
                </div>

        <?php include("includes/footer.php"); ?>

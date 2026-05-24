<?php
require_once('../includes/initialize.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('index.php');
}

?>
<?php
$class_name = "Photo";
$page = !empty($_GET['page']) ? max(1, (int)$_GET["page"]) : 1;
$per_page = 20;
[$where, $params, $types] = $class_name::current_request_where_clause();
$total_count = $class_name::count_all_where($where, $params, $types);
$pagination = new Pagination($page, $per_page, $total_count);

//$page=!empty($_GET['page'])? (int)$_GET['page']:1;
//$item_per_page=2;
//$item_total_count=Photo::count_all();

//$paginate=new Paginate($page,$item_per_page,$item_total_count);
$sql = "SELECT * FROM photos LIMIT {$per_page} OFFSET {$pagination->offset()}";
//$photos=Photo::find_by_query($sql);
$photos = Photo::find_by_sql($sql);

?>
<?php //$photos=Photo::find_all(); ?>

<?php //include("includes/header.php"); ?>

<?php //var_dump($users) ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "public" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $fluid_view = false; ?>
<?php $javascript = "form_admin" ?>
<?php $sub_menu = false ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>
<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php if (isset($message)) {
    echo $message;
} ?>


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

                   <a class="img-responsive home-page-photo" target="_blank" rel="noopener noreferrer" href="photo.php?id=<?php echo u($photo->id); ?>">
                     <img src="<?php echo h($photo->picture_public_path()); ?>" alt="<?php echo h($photo->alternate_text);?>">


                         </a>

                 </div>
                   <?php endforeach; ?>

                 </div>


<div class="row">

    <div class="col-md-8 col-md-offset-3">
    <ul class="pager">

        <?php if($pagination->total_pages()>1) {
                if($pagination->has_next_page()){
                echo    "<li class='next'><a href='photo_gallery.php?page=" . u($pagination->next_page()) . "'>Next</a></li>";
                }

            for($i=1;$i<=$pagination->total_pages();$i++){
                if($i==$page){
                    echo "<li class='active'><a href='photo_gallery.php?page=" . u($i) . "'>" . h($i) . "</a></li>";
                } else {

                    echo "<li class=''><a href='photo_gallery.php?page=" . u($i) . "'>" . h($i) . "</a></li>";

                }

            }

            if($pagination->has_previous_page()){
                echo " <li class='previous'><a href='photo_gallery.php?page=" . u($pagination->previous_page()) . "'>Previous</a></li>";
            }
        }

        ?>

        
    </ul>

</div>
</div>


            </div>
                </div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


<!--        --><?php //include("includes/footer.php"); ?>

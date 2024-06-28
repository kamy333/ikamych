<?php include("admin/includes/header.php"); ?>

        <?php include("includes/header.php"); ?>

<?php if(isset($_SESSION["user_id"])) {$user=User::find_by_id($_SESSION['user_id']);} else {$user="";} ?>
   <?php



if(empty($_GET['id']) || !isset($_GET['id']) ){
    $session->message("The photo was not selected");
    redirect("index.php");
}

$photo=Photo::find_by_id($_GET['id']);

if (!$photo) {
    $session->message("This photo does not exists or have been removed");
    redirect("index.php");}

   if(isset($_POST['submit'])){

   $author=   trim($_POST['author']) ;
   $body=    trim($_POST['body'])  ;

$new_comment=Comment::create_comment($photo->id,$author,$body);
if($new_comment &&$new_comment->save()){
    redirect("photo.php?id=".urlencode($photo->id));
} else {
    $message="not able to save comment";
}

 } else {
       $message="";
       $body="";
       $author="";
   }


$comments=Comment::find_the_comment($photo->id);

   ?>



        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12 col-md-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead"><?php echo $photo->caption; ?>
                    by <a href="#"><?php echo $user->fullname(); ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>


                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo str_replace("../","",$photo->picture_path()) ;
                ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->description ?></p>


                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->

<div class="row">
    <div class="col-md-8">
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input class="form-control" type="text" name="author" id="author">
                        </div>


                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>




                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <?php foreach($comments as $comment) : ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
<!--                            <small>August 25, 2014 at 9:30 PM</small>-->
                            <small><?php echo strftime("%d %M %Y @ %Hh%M",strtotime($comment->input_date))   ;// ?></small>
                        </h4>
                     <?php echo $comment->body; ?>
                    </div>
                </div>

                <?php endforeach; ?>
</div>
</div>
            </div>

            <?php
            $show=false;
            if($show){
    ?>



            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

                <?php } ?>
        </div>
        <!-- /.row -->

        <hr>

        <?php include("includes/footer.php"); ?>
<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (!User::is_admin()) {
    redirect_to('/public/admin/index.php');
} ?>

<?php //include("includes/header.php"); ?>
<?php //if(!$session->is_signed_in()){redirect('login.php');} ?>
    <!-- Navigation -->
    <!--    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">-->
    <!---->
    <!---->
    <!--        --><?php //include("includes/top_nav.php")?>
    <!--        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->-->
    <!---->
    <!--        --><?php //include("includes/side_nav.php")?>
    <!---->
    <!---->
    <!--    </nav>-->

<?php //var_dump($users) ?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
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

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photos
                        <small></small>
                    </h1>


        <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Photo</th>
                <th>ID</th>
                <th>Filename</th>
                <th>Title</th>
                <th>Size</th>
                <th>Comments</th>
            </tr>
            </thead>
            <tbody>
       <?php
       $photos=Photo::find_all();
       $output="";
        $blank="&nbsp;&nbsp;&nbsp;";
       foreach ($photos as $photo) {
        $photo_id = (int)$photo->id;
        $picture_path = h($photo->picture_path());
        $output.="<tr>"   ;
           $output.="<td style='text-center'><img  class='admin-photo-thumbnail' src=\"{$picture_path}\" alt=''>";
           $output.="<div class='picture_link'>";
           $output.="<form method='post' action='delete_photo.php' style='display:inline'>" . csrf_token_tag() . "<input type='hidden' name='id' value='" . h($photo_id) . "'><button type='submit' class='btn btn-link btn-xs' onclick=\"return confirm('Delete this photo?');\">Delete</button></form>$blank";
           $output.="<a href='edit_photo.php?id=".u($photo_id)."'>Edit</a>$blank";
           $output.="<a href='../photo.php?id=".u($photo_id)."'>View</a>$blank";
           $output.="</div>";
$output.="</td>" ;
//        $output.="<td><img src=\"{$photo->picture_path()}\" width='80' height='60' alt=''></td>" ;
        $output.="<td>" . h($photo_id) . "</td>";
        $output.="<td>" . h($photo->filename) . "</td>";
        $output.="<td>" . h($photo->title) . "</td>";
        $output.="<td>" . h($photo->size) . "</td>";

        $comments=Comment::find_the_comment($photo_id);

        $output.="<td><a href='manage_comments_photo.php?id=" . u($photo_id) . "'> " . h(count($comments)) . " comments</a></td>";

        $output.="</tr>"   ;
       }
       echo $output;
       ?>


            </tbody>
        </table>

        </div>

&nbsp;&nbsp;&nbsp;

        </div>
        <!-- /.container-fluid -->



    </div>
    <!-- /#page-wrapper -->
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

<?php //include("includes/footer.php"); ?>

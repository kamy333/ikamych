<?php //include("includes/header.php"); ?>
<?php //if(!$session->is_signed_in()){redirect('login.php');} ?>
    <!--    <!-- Navigation -->-->
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


<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (!User::is_admin()) {
    redirect_to('/public/admin/index.php');
} ?>

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
                All Comments
                <small></small>
            </h1>
<!--            <a class="btn btn-primary" href="add_user.php">Add user</a>-->

            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
<!--                        <th>Photo</th>-->
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Date tine</th>
                        <th colspan="2" class="text-center">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $comments=Comment::find_all();
                    $output="";
                    $blank="&nbsp;&nbsp;&nbsp;";
                    foreach ($comments as $comment) {
                        $photo=Photo::find_by_id($comment->photo_id);

                        $output.="<tr>"   ;

                        $comment_id = (int)$comment->id;
                        $output.="<td>" . h($comment_id) . "</td>";
//                        $output.="<td style='text-center'><img  class='user-image' src=\"{$photo->picture_path()}\" alt=''></td>";
                        $output.="<td>" . h($comment->author) . "</td>";
                        $output.="<td>" . h($comment->body) . "</td>";
                        $output.="<td>" . h(date("d i Y @ H\\hi", strtotime($comment->input_date))) . "</td>";
                        $output.="<td class='text-center'><form method='post' action='delete_Comment.php' style='display:inline'>" . csrf_token_tag() . "<input type='hidden' name='id' value='" . h($comment_id) . "'><button type='submit' class='btn btn-danger btn-xs page-table-action' onclick=\"return confirm('Delete this comment?');\">Delete</button></form></td>$blank";
                        $output.="<td class='text-center'><a class='btn btn-primary btn-xs  btn-xs page-table-action' href='edit_comment.php?id=".u($comment_id)."'>Edit</a></td>$blank";
                        $output.="</tr>"   ;
                    }
                    unset($photo);
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

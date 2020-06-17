<!---->
<?php //include("includes/header.php"); ?>
<?php //if(!$session->is_signed_in()){redirect('login.php');} ?>
<!---->

<?php require_once('../../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>

<?php //var_dump($users) ?>

<?php

//$upload_errors = array(
//    // http://www.php.net/manual/en/features.file-upload.errors.php
//    UPLOAD_ERR_OK 				=> "No errors.",
//    UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
//    UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
//    UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
//    UPLOAD_ERR_NO_FILE 		=> "No file  uploaded.",
//    UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
//    UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
//    UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
//);

$the_message="";

if (isset($_POST['submit'])){
//    echo "<pre>";
//    print_r($_FILES["file_upload"]);
//    echo "</pre>";

    $photo= new Photo();
    $photo->title=$_POST['title'];
    $photo->set_files($_FILES['file_upload']) ;

    if($photo->save()){
        $the_message="File uploaded successfully";
    } else {

        $the_message=join("<br>",$photo->errors) ;
    }


//    $temp_name = $_FILES['file_upload']['tmp_name'];
//    $the_file = $_FILES['file_upload']['name'];
//    $directory="uploads";
//
//    if(move_uploaded_file($temp_name,PATH_UPLOAD.DS.$the_file)){
//    $the_message="File uploaded successfully";
//    } else {
//
//        $the_error = $_FILES['file_upload']['error'];
//        $the_message = $upload_errors[$the_error];
//    }


} else {
    //   $the_message="";
}


?>
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


<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $view_full_table == 1 ? $fluid_view = true : $fluid_view = false; ?>
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
                    Upload
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>


        </div><!-- Page Heading -->

        <div class="row">

            <div class="col-md-2 ">


                <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">


                    <h2><?php echo $the_message;?></h2>

                    <div class="form-group">
                        <label for="title"></label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="file_upload"></label>
                        <input type="file" id="file_upload" name="file_upload" " >

                    </div>


                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                    </div>

                    <!-- /.row -->
                </form>
</div>

            <!-- /.container-fluid -->

        </div>
</div>
</div>
<!-- /#page-wrapper -->
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

<?php //include("includes/footer.php"); ?>
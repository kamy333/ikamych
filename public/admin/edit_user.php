<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee() || User::is_visitor()){ redirect_to('index.php');}?>

<?php // var_dump($session) ?>

<?php
$class_name="UserUpdate";

if(isset($_GET['id'])){
    $post_link=$_SERVER["PHP_SELF"]."?id=".urldecode($_GET['id']);

}else{
    $post_link=$_SERVER["PHP_SELF"];
}

?>
<?php
//
//echo "<pre>";
//var_dump($_POST);
//var_dump($_FILES);
//if (empty($_FILES['user_image'])){
//    echo "empty file"."<br>";
//
//} else {
//    echo "xxxxxx empty file"."<br>";
//
//}

//echo "</pre>";

//echo "<pre>";
//print_r($_FILES["user_image"]);
//print_r($_POST);
//print_r($user);
//echo "</pre>";

if(request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {

        if (isset($_POST['submit'])) { // Form has been submitted.
//            $new_this_class = new $class_name();
            $new_this_class=$class_name::find_by_id($_POST['id']);

            $expected_fields=$new_this_class::get_table_field();
            foreach($expected_fields as $field){
                if(isset($_POST[$field])){
                echo    $new_this_class->$field=trim($_POST{$field}) ;
                }
            }


            if (!isset($_POST['password']) || empty($_POST['password'])) {

                $required_field=$class_name::$required_fields_no_password;
                $kamy= "not isset no password ";
            }else{
                $required_field=$class_name::$required_fields;
                $kamy= "isset password";
            }



            $valid= new formValidation();
            //    echo get_class_vars('User');

            $valid->validate_presences($required_field);
            $valid->validate_email('email' );


            if(empty($valid->errors)){




                    if (!empty($_FILES['user_image'])){
                    $new_this_class->set_files($_FILES['user_image']) ;
                    $new_this_class->upload_photo();
                                      }

                if(!isset($new_this_class->password) ){

                    if(!$new_this_class->update_no_password()){
                        $session->message("User: ".$new_this_class->username." "."has been updated for ID (".$new_this_class->id .") but not the password ");
                        $session->ok(true);
                        redirect_to($class_name::$page_manage);
//                        redirect_to("manage_user.php");

                    } else {
                        $session->message($class_name.$new_this_class->username." "."edit failed");
                    }
                } else {
                    if (!$user->save()){
                        $session->message($class_name.$new_this_class->username." "."has been updated for ID (".$new_this_class->id .")");
                        $session->ok(true);
                        redirect_to($class_name::$page_manage);
                    } else {
                        $session->message("User: ".$new_this_class->username." "."edit failed");

                    }

                }


            }



        }
    }
} elseif(isset($_GET['id'])) {
    $id=$_GET['id'];
    $get_item=  $class_name::find_by_id($id);
    //   $_GET['user_type_id']=$get_user->user_type_id;
//   var_dump($get_user);

}else{



}


if(isset($_GET['id'])){
    $post_link=$_SERVER["PHP_SELF"]."?id=".urldecode($_GET['id']);
}else{
    $post_link=$_SERVER["PHP_SELF"];
}
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="admin"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php  echo isset($valid)? $valid->form_warnings():"" ?>
<?php if (isset($message)) {echo $message;} ?>
<?php // echo output_message($message); ?>

<?php



?>

<?php
//echo "<pre>".
//    print_r($_POST);
//    print_r($_GET);
//echo "</pre>"

?>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">
    <a class="btn btn-warning " href="index.php">Index</a> &nbsp;
    <a class="btn btn-primary" href="<?php echo $class_name::$page_manage ?>" >Manage User</a>

    <div class ="background_light_blue">


        <form name="form_client"  autocomplete="off"   class="form-horizontal" method="post" action="<?php echo $post_link;?>" enctype="multipart/form-data">

            <fieldset id="login" title="User">
                <legend class="text-center" style="color: #0000ff">Update User</legend>



                <?php


                echo  $class_name::construct_form($get_item);

                echo Form::form_id();
                echo csrf_token_tag();

                ?>

            </fieldset>



            <div class="col-sm-offset-3 col-sm-7 col-xs-3">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>

            <div class="text-right " >
                <a href="<?php echo $class_name::$page_manage; ?>" class="btn btn-info " role="button">Cancel</a>
            </div>



        </form>
    </div>
</div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

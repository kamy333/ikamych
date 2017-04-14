<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(User::is_employee() || User::is_visitor()){ redirect_to('index.php');}?>

<?php // var_dump($session) ?>

<?php
$class_name="User";

?>
<?php

if(request_is_post() && request_is_same_domain()) {

if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
    $message = "Sorry, request was not valid.";
} else {

    if (isset($_POST['submit'])) { // Form has been submitted.


        //  echo "<pre>".print_r($_POST)."</pre>";

        $user = new User();

        $user->username = trim($_POST['username']);
        $user->password = trim($_POST['password']);
        $user->nom = trim($_POST['nom']);
        $user->email = trim($_POST['email']);
        $user->user_type_id = (int)trim($_POST['user_type_id']);


        if (isset($_POST['first_name'])) {
            $user->first_name = trim($_POST['first_name']);
        }
        if (isset($_POST['first_name'])) {
            $user->last_name = trim($_POST['last_name']);
        }
        if (isset($_POST['id'])){ $user->id= (int)$_POST['id'] ; }

        if (isset($_POST['id'])) {
            if (!isset($_POST['password']) || empty($_POST['password'])) {
                $user->password=null;

            } else {
                $user->password = trim($_POST['password']);

            }
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {

            $required_field=User::$required_fields_no_password;
            $kamy= "not isset no password ";
        }else{
            $required_field=User::$required_fields;
            $kamy= "isset password";
        }


        $valid = new formValidation();
        //    echo get_class_vars('User');

        $valid->validate_presences($required_field);
        $valid->validate_email('email');

        $user->set_files($_FILES['user_image']) ;
        $user->upload_photo();
        // to validation

        if(empty($valid->errors)){
            if(!isset($user->password) ){
                if(!$user->update_no_password()){
                    $session->message("User: ".$user->username." "."has been updated for ID (".$user->id .") but no password");
                    $session->ok(true);
                    redirect_to("manage_user.php");

                } else {
                    $session->message("User: ".$user->username." "."edit failed");
                }
            } else {
                if (!$user->save()){
                    $session->message("User: ".$user->username." "."has been updated for ID (".$user->id .")");
                    $session->ok(true);
                    redirect_to("manage_user.php");
                } else {
                    $session->message("User: ".$user->username." "."edit failed");

                }

            }

        }



    }
}
} elseif(isset($_GET['id'])) {
    $id=$_GET['id'];
    $get_item=  $class_name::find_by_id($id);
 //   $_GET['user_type_id']=$get_item->user_type_id;
//   var_dump($get_item);

}else{




if(isset($_GET['id'])){
 $post_link=$_SERVER["PHP_SELF"]."?id=".urldecode($_GET['id']);
}else{
 $post_link=$_SERVER["PHP_SELF"];
}

}


?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="adminNew"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php  echo isset($valid)? $valid->form_warnings():"" ?>

<?php //if (isset($message)) {
//    echo $message;
//} ?>

<?php if (!empty($message)) {
    echo output_message($message);
} ?>

<?php checking(false);?>


<?php



?>

<?php
//echo "<pre>".
//    print_r($_POST);
//    print_r($_GET);
//echo "</pre>"

?>


<h4 class="text-center"><mark><a href="<?php echo $post_link ?>">New User</a> </mark></h4>


<div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">
    <a class="btn btn-warning" href="index.php">Index</a><span>&nbsp;</span>
    <a class="btn btn-primary" href="<?php echo $class_name::$page_manage ?>" >Manage User</a><span>&nbsp;</span>

    <div class ="background_light_blue">


        <form name="form_user"  class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

            <fieldset id="login" title="User">
                <legend class="text-center" style="color: #0000ff">New User</legend>



                <?php

//            $get_form_element=array('user_image','username','password','nom','email','user_type_id','first_name','last_name');

//                foreach ($class_name::$get_form_element as $val) {
//                    isset($get_item)? $value=$get_item->$val :$value="";
//                    echo  $class_name::get_form($val,$value);
//
//                }

                echo  $class_name::construct_form($get_item);



                 echo Form::form_id();
                 echo csrf_token_tag();

                ?>



            </fieldset>





            <div class="col-sm-offset-3 col-sm-7 col-xs-3">
                <button type="submit" name="submit" id="submit_user" class="btn btn-primary">Ajouter</button>
            </div>

            <div class="text-right " >
                <a href="<?php echo $class_name::$page_manage; ?>" class="btn btn-info " role="button">Cancel</a>
            </div>



        </form>
    </div>
</div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

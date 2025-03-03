<?php

require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();
if(User::is_caroline_only()){
    if (isset($_GET['class_name'])) {
        $class_name = $_GET['class_name'];
        if ($class_name != "MyExpenseCaroline") {
            redirect_to('../../index.php');
        }
    }
} elseif (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('../../index.php');
}
//MyClasses::redirect_disable_class();


if(!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit; }

// $json1= output_message(call_user_func_array([$_POST['class_name'],'post_form'], ['ajax']));

//echo call_user_func_array([$_GET['class_name'],'post_form'], ['ajax']);

$class_name=$_POST['class_name'];
//$a=output_message("text outcome");
//$json=array("errors"=>$_POST['class_name']);

//
//$_POST['id']=1;
//
//if (isset($_POST['csrf_token'])){
//    $message = $_POST['csrf_token'];
//    $json = array("success" => $message);
//
//}else {
//    $message = "Sorry, request was not valid.";
//    $json=array("errors"=>$message);
//
//}
//
//echo json_encode($json);
//return;


if (request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
//        $message=$_POST['csrf_token'];
        $json=array("errors"=>$message);



    } else {
        $result_array=[];


        $new_item = new $class_name;
        $expected_fields = $class_name::get_table_field();
        foreach ($expected_fields as $field) {
            if (isset($_POST[$field])) {
                $new_item->$field = trim($_POST[$field]);
             array_push( $result_array, $field. ' = '. $new_item->$field."<br>") ;
            }

        }


        if (isset($new_item->id)) {
            $text_post = "Updated";
            $text_post1 = "update";
        } else {
            $text_post = "created";
            $text_post1 = "creation";

        }

        $valid = $new_item->form_validation();

        $result_join=  join(',',$result_array);


        if (empty($valid->errors)) {
            $message = '';

            if ($new_item->save()) {
                $message = $class_name  . " " . "has been $text_post with ID (" . $new_item->id . ")";
                $my_success="<span style='font-size: larger'>".$message."</strong></span>";
                $my_success.="<ul>";
                foreach ($result_array as $result){
                    $my_success.="<li>".$result."</li>" ;
                }
                $my_success.="</ul>";
                $json=array("success"=>$my_success);


            } else {

                $message = $class_name . " " . "$text_post1 failed or maybe nothing changed";
                $my_error="<span style='font-size: larger'>".$message."</strong></span>";
                $my_error.="<ul>";

                foreach ($result_array as $result){
                    $my_error.="<li>".$result."</li>" ;
                }
                $my_error.="</ul>";
                $json=array("errors"=>$my_error);


            }


        } else {
            $my_error="<span style='font-size: larger'><strong>&nbsp;&nbsp; Validation, please correct</strong></span>";
            $my_error.="<ul>";

//            $errors=join(',',$valid->errors);
            foreach ($valid->errors as $error){
              $my_error.="<li><strong>".$error."</strong></li>" ;
            }
            $my_error.="</ul>";
            $json=array("errors"=>$my_error);

        }




    }


} else {

    $json=array("errors"=>'Transaction failed ');

}

if (isset($json)) {
    echo json_encode($json);
} else {
   $json=array("errors"=>'json not be defined check code');
    echo json_encode($json);

}

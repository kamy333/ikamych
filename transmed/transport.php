<?php require_once('../includes/initialize_transmed.php');
    $session->confirmation_protected_page();
    if (User::is_employee() || User::is_visitor()) {redirect_to('index.php');
    } ?>


<?php

$class_name = MyClasses::redirect_disable_class();
//$class_name ="ViewTransportModelPivot";
call_user_func_array(array($class_name, 'change_to_unique_data'), ['transport']);


//$url = clean_query_string('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . "?" . "class_name=" . u($class_name) . "&id=" . u($_GET['id']) . "&test.sql=1");


if (isset($_GET['id'])&& isset($_GET['action'])&& $_GET['action']=="edit" &&  !isset($_GET['duplicate_record'])    ) {



    $post_link = $_SERVER["PHP_SELF"] . "?class_name=" . u($class_name) . "&id=" . urlencode($_GET['id']);
    $page = "Update";
    $page1 = "Update ";
    $text_post = "Updated";
    $text_post1 = "update";

} elseif (isset($_GET['action'])&& ( $_GET['action']=="new" ) || isset($_GET['duplicate_record'])) {
    $post_link = $_SERVER["PHP_SELF"] . "?class_name=" . u($class_name);
    $page = "New";
    $page1 = "Add New ";
    $text_post = "created";
    $text_post1 = "creation";

}


if (request_is_post() && request_is_same_domain()) {




    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {

        $new_item = new $class_name();
        $expected_fields = $class_name::get_table_field();
        foreach ($expected_fields as $field) {
            if (isset($_POST[$field])) {
                $new_item->$field = trim($_POST{$field});
            }

        }

        //todo complete valid like pseudo

        $valid = $new_item->form_validation();

        if (empty($valid->errors)) {
            if ($new_item->save()) {
                $session->message($class_name . $new_item->pseudo . " " . "has been $text_post with ID (" . $new_item->id . ")");
                $session->ok(true);
                unset($_POST);
                redirect_to($class_name::$page_manage);
//                echo " <script> location.replace(\"transport.php?class_name={$class_name}\"); </script>";

            } else {
                $session->message($class_name . $new_item->pseudo . " " . "$text_post1 failed or maybe nothing changed");
//                redirect_to($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
                unset($_POST);
                redirect_to($_SERVER['PHP_SELF'] . "?class_name={$class_name}");
//                echo '<script type="text/javascript">location.reload(true);</script>';
//                 echo '<script type="text/javascript">alert("hi");</script>';
//
//                $secondsWait = 1;
//                echo date('Y-m-d H:i:s');
//                echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';
//                echo " <script> location.replace(\"transport.php?class_name={$class_name}\"); </script>";


            }


        }



}
} else {
    if (request_is_get()) {
        if (isset($_GET['id']) && isset( $_GET['action']) && $_GET['action']=="edit") {
//            $id = $_GET['id'];
//            $get_item = $class_name::find_by_id($id);
        }


    }

}
?>








<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>





    <div class="wrapper wrapper-content">

        <div class="container-fluid">
            <?php
            $class_name = MyClasses::redirect_disable_class();

            call_user_func_array(array($class_name, 'change_to_unique_data'), ['transport']);

             echo isset($valid) ? $valid->form_errors() : "" ;
             echo isset($valid) ? $valid->form_warnings() : "";
             echo isset($message) ? $message : "";



            if(isset($_GET['action']) && ($_GET['action']=="new"  || ($_GET['action']=="edit" && $_GET['id'])
                    ) ){


                echo "<div class='col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2 white-bg'>";
                echo "<div class='col-md-3 col-md-offset-2'>";

                echo call_user_func_array(array($class_name, 'get_form_new_href'), array($class_name::$form_class_dependency));
                echo "</div>";
                $content= call_user_func_array([$class_name, "Create_form"], []);
                echo ibox( $content,12,'');

                echo "</div>";

            } elseif( isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=="reverse_visible" ){
                $id=(int)$_GET['id'];
                call_user_func_array([$class_name, "reverse_visible"], [$id]);
//                echo isset($valid) ? $valid->form_errors() : "" ;
//                echo isset($valid) ? $valid->form_warnings() : "";
//                echo isset($message) ? $message : "";
//
//                echo  call_user_func_array([$class_name, "main_display"], []);

                if($_SERVER['SERVER_NAME']=='localhost'){
                    echo " <script> location.replace(\"transport.php?class_name={$class_name}\"); </script>";
                }else{
                    redirect_to("transport.php?class_name={$class_name}");

                }


                unset($_GET);
                redirect_to('index.php');

            } elseif(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=="delete_record" ){
//               echo "xxxxx";
//               return;
                $id=(int)$_GET['id'];
                 call_user_func_array([$class_name, "delete_record"], [$id]);


                 if($_SERVER['SERVER_NAME']=='localhost'){
         echo " <script> location.replace(\"transport.php?class_name={$class_name}\"); </script>";
                }else{
         redirect_to("transport.php?class_name={$class_name}");
                }

            } else {
                echo  call_user_func_array([$class_name, "main_display"], []);
            } ?>
        </div>


    </div>

    <!--    </div>-->


<?php include(FOOTER_PUBLIC); ?>
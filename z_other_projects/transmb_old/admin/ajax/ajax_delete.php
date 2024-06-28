<?php

require_once('../../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_visitor()) {
    redirect_to('../index.php');
}
MyClasses::redirect_disable_class();


if (!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit;
}

// $json1= output_message(call_user_func_array([$_POST['class_name'],'post_form'], ['ajax']));

//echo call_user_func_array([$_GET['class_name'],'post_form'], ['ajax']);

$class_name = $_GET['class_name'];


if (!isset($_GET["id"])) {
    $id = "";
    $json = array("errors" => "id not set");
} else {

    $id = $_GET["id"];
    $class_found = $class_name::find_by_id($id);


    if ($class_found->delete()) {

        $json = array("success" => "id (" . $id . ") successfully deleted");

    } else {
        $json = array("errors" => "id (" . $id . ") DID NOT successfully deleted");

    }


}


if (isset($json)) {
    echo json_encode($json);
} else {
    $json = array("errors" => 'json not be defined check code');
    echo json_encode($json);

}

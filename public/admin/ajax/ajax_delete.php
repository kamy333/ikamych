<?php

require_once('../../../includes/initialize.php');
$session->confirmation_protected_page();

$class_name = MyClasses::allowed_class_from_request();
MyClasses::require_class_access($class_name);


if(!is_ajax_request()) {
    http_response_code(400);
    echo "Not Ajax request";

    exit; }

header('Content-Type: application/json; charset=UTF-8');

// $json1= output_message(call_user_func_array([$_POST['class_name'],'post_form'], ['ajax']));

//echo call_user_func_array([$_GET['class_name'],'post_form'], ['ajax']);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    http_response_code(400);
    $json=["errors"=>"Valid id is required."];
} else {

    $class_found=$class_name::find_by_id($id);

    if (!$class_found) {
        http_response_code(404);
        $json=["errors"=>"id (".h((string)$id).") was not found"];
    } elseif($class_found->delete()){

        $json=["success"=>"id (".$id.") successfully deleted"];

            } else {
        $json=["errors"=>"id (".$id.") DID NOT successfully deleted"];

    }




}



if (isset($json)) {
    echo json_encode($json);
} else {
   $json=["errors"=>'json not be defined check code'];
    echo json_encode($json);

}

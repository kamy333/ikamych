<?php


function allowed_get_params($allowed_params=[]) {
    $allowed_array = [];
    foreach($allowed_params as $param) {
        if(isset($_GET[$param])) {
            $allowed_array[$param] = $_GET[$param];
        } else {
            $allowed_array[$param] = NULL;
        }
    }
    return $allowed_array;
}

//$get_params = allowed_get_params(['username', 'password']);
//
//var_dump($get_params);


function checking($bol=false){

    $output = "";
    if($bol){
        if ($_GET) {
            $output .= "<pre>";
            $output .= 'Contents of the $_GET array: <br>';
            $output .= h(print_r($_GET, true));
            $output .= "</pre>";
        } elseif ($_POST) {
            $output .= "<pre>";
            $output .= 'Contents of the $_POST array: <br>';
            $output .= h(print_r($_POST, true));
            $output .= "</pre>";
        }
    }

    return $output;
}

?>

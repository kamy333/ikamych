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

    if($bol){
        if ($_GET) {
            echo "<pre>";
            echo 'Contents of the $_GET array: <br>';
            var_dump($_GET);
            echo "</pre>";
        } elseif ($_POST) {
            echo "<pre>";
            echo 'Contents of the $_POST array: <br>';
            var_dump($_POST);
            echo "</pre>";
        }
    }

}

?>

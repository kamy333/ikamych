
<?php
//
// Read the JSON file
//$json = file_get_contents('pizzas_app_1.json');

$k=$_GET["kamy"];
echo "";

$json = file_get_contents('pizzas3.json');
if (file_exists('pizzas3.json')){
    $json_data = json_decode($json,true);
//    var_dump($json_data);

// Display data
    echo $json;
}else {
    echo 'not exist<br>';
}

// Decode the JSON file


?>
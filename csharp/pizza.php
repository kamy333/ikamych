
<?php
//
// Read the JSON file
//$json = file_get_contents('pizzas_app_1.json');

$k=$_GET["kamy"];
echo "";

$json_filename="pizzas_app_1.json";

$json = file_get_contents($json_filename);
if (file_exists($json_filename)){
    $json_data = json_decode($json,true);
//    var_dump($json_data);

// Display data
    echo $json;
}else {
    echo 'not exist<br>';
}

// Decode the JSON file


?>
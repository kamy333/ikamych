<?php


require_once('../../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_visitor()) {
    redirect_to('../index.php');
}
//MyClasses::redirect_disable_class();

//
if (!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit;
}


// get the q parameter from URL
$q = trim(e($_REQUEST["q"]));


$hint = "";
$hint2 = "";

if(strlen(trim($q))<3){return;}


if (strlen(trim($q)) > 2 && $q !== "") {

    $sql = "SELECT pseudo FROM transport_clients WHERE pseudo LIKE '%$q%'";

    $clients = TransportClient::find_by_sql($sql);

    if ($clients) {
        foreach ($clients as $client) {
            $hint .= "<li class='hint-pseudo' style='list-style-type: none;background-color: #00a0df;color: white'>" . $client->pseudo . "</li>";
            $hint2 .= "<option value='" . $client->pseudo . "'></option>";



        }
    }
}


// lookup all hints from array if $q is different from ""
//if ($q !== "") {
//    $q = strtolower($q);
//    $len=strlen($q);
//    if(isset($names)){
//        foreach($names as $name) {
//            if (stristr($q, substr($name, 0, $len))) {
//                if ($hint === "") {
//                    $hint = "<li class='hint-pseudo' style='list-style-type: none;background-color: #00a0df;color: white'>$name</li>";
//                } else {
//                    $hint .= "<li class='hint-pseudo' style='list-style-type: none;background-color: #00a0df;color: white'>$name</li>";
//                }
//            }
//        }
//    }
//
//}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : "<ul>" . $hint . "</ul>";
echo $hint2 === "" ? "no suggestion" : "<datalist id='input-pseudo'>" . $hint2 . "</datalist>";
?>
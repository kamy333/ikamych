<?php


require_once('../../../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_visitor()) {
    redirect_to('../../index.php');
}
//MyClasses::redirect_disable_class();

//
if (!is_ajax_request()) {
    echo $_SERVER['HTTP_X_REQUESTED_WITH'];
    echo "<p>Not Ajax request</p>";

    exit;
}


// get the q parameter from URL
$q = rtrim(e($_REQUEST["q"]));

$hint = "";
$hint2="";

if(strlen(trim($q))<3){return;}


if (strlen(trim($q)) > 0 && $q !== "") {

    $sql = "SELECT  adresse FROM transport_view_adresse WHERE adresse LIKE '%$q%' GROUP BY adresse";

    $adresses = ViewTransportAdresse::find_by_sql($sql);


//    if ($adresses) {
//        foreach ($adresses as $adresse) {
//            $hint .= "<li class='hint-adresse' style='list-style-type: none;background-color: red;color: white'>" . $adresse->adresse . "</li>";
//        }
//    }

    if ($adresses) {
        foreach ($adresses as $adresse) {
            $hint2 .= "<option value='" . $adresse->adresse . "'></option>";
        }
    }



}


// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : "<ul>" . $hint . "</ul>";
echo $hint2 === "" ? "no suggestion" : "<datalist id='input-adresse'>" . $hint2 . "</datalist>";
?>
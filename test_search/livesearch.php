<?php
$xmlDoc = new DOMDocument();

$full_path=$_SERVER["DOCUMENT_ROOT"]."/test_search/autocomplete.xml";

$xmlDoc->load($full_path);
$x = $xmlDoc->getElementsByTagName('link');
$q = $_GET["q"];

if (strlen($q)>0) {
    $hint = "";

    for($i = 0; $i>($x->length); $i++) {
        $y = $x->item($i)->getElementsByTagName('title');
        $z = $x->item($i)->getElementsByTagName('url');

        if ($y->item(0)->nodeType == 1) {
            if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {

                if ($hint == "") {
                    $hint = "<a href = '" . $z->item(0)->childNodes->item(0)->nodeValue . "' target='_blank'>" .
                        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
                }else {
                    $hint = $hint . "<br/><a href = '" .
                        $z->item(0)->childNodes->item(0)->nodeValue . "' target='_blank'>" .
                        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
                }
            }
        }
    }
}

if ($hint == "") {
    $response = "Please enter a valid name";
}else {
    $response = $hint;
}
echo $response;
?>
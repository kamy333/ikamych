<?php
require_once('../includes/initialize.php');

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    if($id!="567MOP47898"){
        exit();
    }
}


$expense_person=new MyExpensePerson();
//$objects=$expense_person::find_all();
$sql="SELECT * FROM myexpense_person WHERE close_person=0";
$objects=$expense_person::find_by_sql($sql);

$rows=[];

foreach ($objects as $object) {

    foreach ($object as $k => $v) {
        if($k=="person_name"){
            $rows[] = $v;
        }

    }
}

print json_encode($rows);


?>
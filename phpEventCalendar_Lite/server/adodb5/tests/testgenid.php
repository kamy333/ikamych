<?php
/*
	V4.50 6 July 2004 
	
	Run multiple copies of this php script at the same time
	to test unique generation of id's in multiuser mode
*/
include_once('../adodb.inc.php');
$testaccess = true;
include_once('testdatabases.inc.php');

function testdb(&$db, $createtab = "CREATE TABLE ADOXYZ (id INT, firstname CHAR(24), lastname CHAR(24), created DATE)")
{
    $table = 'adodbseq';

    $db->Execute("drop table $table");
    //$db->debug=true;

    $ctr = 5000;
    $lastnum = 0;

    while (--$ctr >= 0) {
        $num = $db->GenID($table);
        if ($num === false) {
            print "GenID returned false";
            break;
        }
        if ($lastnum + 1 == $num) print " $num ";
        else {
            print " <font color=red>$num</font> ";
            flush();
        }
        $lastnum = $num;
    }
}

?>
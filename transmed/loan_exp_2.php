<?php require_once('../includes/initialize.php');
$session->confirmation_protected_page();

if (User::is_caroline()) {
} else {
    redirect_to('../index.php');
}

if(isset($_GET)){
    $report=$_GET['report'] ;
    $id=(int) $_GET['id'] ;
    $filename=ud8($_GET['filename']) ;

//    echo "id: $id  reportName: $report";
//    echo "<br>filename:$filename";

}

if(1==1){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename={$filename}.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
}



?>


    <?php

     if($report==="Report1" && $id===0){
         echo ReportFinance::Report1(true);
     }elseif($report==="Report" && $id >0){
         echo ReportFinance::Report($id,true);
     }elseif($report==="Report4" && $id ==0){
         echo ReportFinance::Report4(true);
     }elseif($report==="Report4a" && $id ==0){
         echo ReportFinance::Report4a(true);
     }



?>


<?php

require_once('../../includes/initialize_transmed.php');

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/4/2017
 * Time: 3:34 PM
 */
////echo 'llllllll';
//echo $_POST['submit'];
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//
//echo $_POST['week_day_rank_id'];

//echo $_POST['date1'];
if (isset($_POST['submit'])) {
//    echo $_POST['date1'];


}

//echo "<hr>";
//echo  $date = date_format_to_sql($_POST['date1'], "DD/MM/YYYY");
//echo $day_no = $_POST['week_day_rank_id'];
//echo $date ;
//echo $day_no;


if (isset($_POST['submit']) && $_POST['submit'] == "Ajouter") {


    $_POST['course_date'] = date_format_to_sql($_POST['date1'], "DD/MM/YYYY");
//    $_POST['course_date'] = date_format_to_sql($_POST['date1'], "YYYY-MM-DD");

    echo $date = $_POST['course_date'];
    echo "<br>";
//    echo "xxxxx";
//    echo "<hr>";
    echo $day_no = $_POST['week_day_rank_id'];

//    return;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        echo Model::export_to_course_all($day_no, $date, 1, $id);

    } else {
        echo Model::export_to_course_all($day_no, $date, 1, null);

    }



    unset($_POST);
}

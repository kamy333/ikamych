<?php
/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/4/2017
 * Time: 3:34 PM
 */

if (isset($_POST['submit'])) {

    $date = date_format_to_sql($_POST['date'], "MM-DD-YYY");
    $day_no = $_POST['week_day_rank_id'];

    Model::export_to_course($day_no, $date);

}
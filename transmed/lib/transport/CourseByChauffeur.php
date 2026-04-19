<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/15/2017
 * Time: 2:29 PM
 */

use Carbon\Carbon;

class CourseByChauffeur extends Course
{

    public static $page_manage = "calendar.php";
    public static $page_new = "new_calendar.php";
    public static $page_edit = "edit_calendar.php";
    public static $page_delete = "delete_calendar.php";


//    public static $date = '2017-06-04';

    public static function chauffeurDay()
    {

        $date = static::$date;
        $date_str = $date->toDateString();


        $courses = Course::find_by_sql("SELECT DISTINCT chauffeur_id from transport_programming WHERE course_date='{$date_str}'");
//    var_dump($courses);
        $chauffeur_ids = [];
        foreach ($courses as $course) {
            array_push($chauffeur_ids, $course->chauffeur_id);

        }

        return $chauffeur_ids;
    }

    public static function addCalendarRow(array $chauffeurs)
    {

        Carbon::setLocale('fr');

        $date = static::$date;
        $date_str = $date->toDateString();


        $courses = Course::find_by_sql("SELECT * from transport_programming WHERE course_date='$date_str' ORDER BY heure ASC");
        $dateNow = Carbon::now();


        $output = "";


        for ($i = 0; $i < 24; $i++) {
            $output .= "<tr>";
            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);


            if ($dateCalendar->hour == $dateNow->hour) {
                $output .= "<td class='text-center' style='height:40px;color: white;background-color: #d9d9d9;vertical-align: middle' >{$i}:00</td>";
            } else {
                $output .= "<td class='text-center'  style='vertical-align: middle'>{$i}:00</td>";
            }

            $output .= "<td >";
            $output .= "<ul>";
            foreach ($courses as $course) {
                static::info($course);
                $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";
                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));
                $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);


                if ($dateCalendar->hour == $dateCourse->hour) {

                    foreach ($chauffeurs as $id) {
                        $chauffeur = TransportChauffeur::find_by_id((int)$id);

                        if ($course->chauffeur_id == $chauffeur->id) {

                            $style = "background-color:$course->color2;color:$course->color";

//                        $output .= "<li style='list-style: none'>";
//                        $output .= "<span style='' class='badge'>$course->heure</span>";
//                        $output .= "<span  style='$style'>";
//                        $output .= "<small><a style='color: inherit' href='$href'>$course->pseudo </a> </small></span>";
//                        $output .= "<span class='badge'>$chauffeur->initial($chauffeur->id)</span>";
//                        $output .= "</li>";

                            $output .= "<li style='list-style: none'>";
                            $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button'  data-model-id='{$course->id}' class='btn btn-{$course->color2}'>" . "<span class='badge pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;<small>" . $course->pseudo . "</small>" . "</button></a>";
                            $output .= "</li>";


                        } else {

                        }


                    } //end for each


                } else {

                }

            }
            $output .= "</ul>";
            $output .= "</td>";
            $output .= "<td>";
            $output .= "</td>";

            $output .= "</tr>";
        }


        return $output;

    }


    public static function header_list_ul()
    {
        $output = "";

        $output .= parent::header_list_ul();


        return $output;

    }


    public static function list_ul($content = '')
    {
        Carbon::setLocale('fr');
        $date = static::$date;
        $date_str = $date->toDateString();

        $chauffeurs = static::chauffeurDay();

        $output = "";

        $output .= static::header_list_ul();

//        $output .= "<h1 class='text-center'>$date</h1>";
//
        $output .= "<div class='row'>";
        $output .= "<div class='text-center'>";
        $output .= static::infoDay($date_str, false, true);
        $output .= "</div>";


        $output .= "<div>";
        $output .= "<table class='table table-bordered table-striped'>";
        $output .= "<tr>";
        $output .= "<th class='text-center'>Heure</th>";

        foreach ($chauffeurs as $id) {
            $chauffeur = TransportChauffeur::find_by_id((int)$id);
            $output .= "<th class='text-center'>$chauffeur->chauffeur_name</th>";
        }

//    $output .= "<th>Djamila</th>";
        $output .= "</tr>";

//    for ($i = 0; $i < 25; $i++) {
//        $output .=    static::addRow($i,$chauffeurs);
//    }

        $output .= static::addCalendarRow($chauffeurs);

        $output .= "</table>";
        $output .= "</div>";

        return $output;

    }

    public static function main_display()
    {
//        return static::display_calendar();

        if (isset($_GET['course_date_french'])) {
            $_GET['course_date'] = date_format_to_sql(urldecode($_GET['course_date_french']), $format = 'DD/MM/YYYY');
//            static::$date = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);

        }

        if (isset($_GET['course_date'])) {
            if ($_GET['course_date'] == "tomorrow") {
                static::$date = Carbon::tomorrow();
//                static::set_date();
                return static::get_tomorrow();
            } elseif ($_GET['course_date'] == "yesterday") {
                static::$date = Carbon::yesterday();
//                static::set_date();
                return static::get_yesterday();
            } elseif ($_GET['course_date'] == "today") {
                static::$date = Carbon::today();
//                static::set_date();
                return static::get_today();
            } else {
                $date = $_GET['course_date'];


                static::$date = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);
//                static::set_date();
//                return static::get_date($date);
//                return static::view_by_Chauffeur();
                return static::view_by_ChauffeurDELETE();

            }

        } else {
            static::$date = Carbon::today();;
//            static::set_date();
//            return static::view_by_Chauffeur();
            return static::view_by_ChauffeurDELETE();

        }
    }

}

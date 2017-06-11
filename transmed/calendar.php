<?php require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();
if (User::is_employee() || User::is_visitor()) {
    redirect_to('index.php');
} ?>


<?php
use Carbon\Carbon;

class CourseCalendar extends CourseByChauffeur
{

    static $page_report = "calendar.php";

    public static function view_by_Chauffeur()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
        $output .= static::header_list_ul();


        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $output .= "<thead>";
        $output .= "<tr>";

        $a = 0;
        foreach (static::$db_field_table_display_chauffeur_header as $item) {
            if ($a <= 1) {
                $output .= "<th class='text-center'  style='width:0.2%;vertical-align: middle'>";

            } else {
                $output .= "<th class='text-center'  style='width:1%;vertical-align: middle'>";

            }

            $output .= $item;
            $output .= "</th>";
            $a++;
        }
        unset($a);

        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";

        $dateNow = Carbon::now();

        $output_1 = "";
        $ViewCalendarHour = true;
        $prevDateCalendarHour = "";
        $prevDateCourseHour = "";


        for ($i = 0; $i < 24; $i++) {
            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);

//            $output .= "<tr>";
            if ($ViewCalendarHour) {
                $textCalendarHour = $dateCalendar->hour . ":00A";
            } else {
                $textCalendarHour = "";

            }
            $output_1 .= "<td  class='text-center' style='vertical-align: middle;' >" . $textCalendarHour . "</td>";

            for ($j = 0; $j <= $addColumn; $j++) {
                $output_1 .= "<td></td>";
            }
//            $output .= "</tr>";


            foreach ($courses as $course) {

                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));


                static::create_properties($course);
                static::info($course);
                $course->set_up_display();

                $output .= "<tr>";

                if ($dateCalendar->hour == $dateCourse->hour) {


                    foreach (static::$db_field_table_display_chauffeur as $field) {
//                        $data_target = get_called_class() . "-modal-id-" . $course->id;


                        $output .= "<td class='text-center' style='vertical-align: middle;'>";


                        switch ($field) {

                            case "H":

                                if ($prevDateCourseHour !== $dateCourse->hour) {
                                    $output .= $dateCourse->hour . ":00B";
                                }

                                break;
                            case "heure":

//                                $output .= hr_mn_to_text($course->$field . ':');
                                break;

                            default:
                                if (isset($course->$field) && !empty($course->$field)) {
                                    $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";


                                    $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button'  class='btn btn-{$course->color2}'>" . "<span class='badge  pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;" . $course->pseudo . " " . "</button></a>";


                                }

                        }

                        $output .= "</td>";

                    }


                } else {

                    if ($prevDateCalendarHour !== $dateCalendar->hour && $prevDateCourseHour !== $dateCourse->hour) {

                        $output .= $output_1;

                    }


                } //
                $output_1 = "";
                $output .= "</tr>";
                $prevDateCalendarHour = $dateCalendar->hour;
                $prevDateCourseHour = $dateCourse->hour;


            } //end of course

        } // end of $i to 24


        $output .= "</tbody>";
        $output .= "</table>";
        $output .= "</div>";


        if (!$ibox) {
            $output .= "</div>";
            $output .= "</div>";
        }


        if (!$ibox) {
            return $output;
        } else {
            return ibox($output, 12, '');

        }

    }

    public static function view_by_details($sql)
    {
        $courses = static::find_by_sql($sql);

        $myCourses = [];

        foreach ($courses as $course) {

        }


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
                return static::view_by_Chauffeur();

            }

        } else {
            static::$date = Carbon::today();;
//            static::set_date();
//            return static::view_by_Chauffeur();
            return static::view_by_Chauffeur();

        }
    }

    public static function view_by_Chauffeur_v1_ok()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
        $output .= static::header_list_ul();


        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $output .= "<thead>";
        $output .= "<tr>";

        $a = 0;
        foreach (static::$db_field_table_display_chauffeur_header as $item) {
            if ($a <= 1) {
                $output .= "<th class='text-center'  style='width:0.2%;vertical-align: middle'>";

            } else {
                $output .= "<th class='text-center'  style='width:5%;vertical-align: middle'>";

            }

            $output .= $item;
            $output .= "</th>";
            $a++;
        }
        unset($a);

        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";

        $dateNow = Carbon::now();


        for ($i = 0; $i < 24; $i++) {
            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);
            $output .= "<tr>";
            $output .= "<td  class='text-center' style='vertical-align: middle;' >" . $dateCalendar->hour . ":00</td>";

            for ($j = 0; $j <= $addColumn; $j++) {
                $output .= "<td></td>";
            }
            $output .= "</tr>";


            foreach ($courses as $course) {

                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));


                static::create_properties($course);
                static::info($course);
                $course->set_up_display();

                if ($dateCalendar->hour !== $dateCourse->hour) {


                } else {

                    $output .= "<tr>";


                    foreach (static::$db_field_table_display_chauffeur as $field) {
                        $data_target = get_called_class() . "-modal-id-" . $course->id;
                        $output .= "<td class='text-center' style='vertical-align: middle;'>";


                        switch ($field) {

                            case "H":


//                                $output .= $dateCourse->hour . ":00";


                                break;
                            case "heure":

                                $output .= hr_mn_to_text($course->$field . 'h');
                                break;

                            default:
                                if (isset($course->$field) && !empty($course->$field)) {
                                    $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";

                                    $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button' data-toggle='modal' data-model-id='{$course->id}' data-target='#{$data_target}' class='btn btn-{$course->color2}'>" . "<span class='badge  pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;" . $course->pseudo . " " . "</button></a>";


                                }

                        }

                        $output .= "</td>";

                    }

                    $output .= "</tr>";
                } //

            } //end of course

        } // end of $i to 24

        $output .= "</tbody>";
        $output .= "</table>";
        $output .= "</div>";


        if (!$ibox) {
            $output .= "</div>";
            $output .= "</div>";
        }


        if (!$ibox) {
            return $output;
        } else {
            return ibox($output, 12, '');

        }

    }

    public static function view_by_Chauffeur_v2_ok()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
        $output .= static::header_list_ul();


        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $output .= "<thead>";
        $output .= "<tr>";

        $a = 0;
        foreach (static::$db_field_table_display_chauffeur_header as $item) {
            if ($a <= 1) {
                $output .= "<th class='text-center'  style='width:0.2%;vertical-align: middle'>";

            } else {
                $output .= "<th class='text-center'  style='width:1%;vertical-align: middle'>";

            }

            $output .= $item;
            $output .= "</th>";
            $a++;
        }
        unset($a);

        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";

        $dateNow = Carbon::now();

        $output_1 = "";
        $ViewCalendarHour = true;
        $prevDateCalendarHour = "";
        $prevDateCourseHour = "";

        for ($i = 0; $i < 24; $i++) {
            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);

//            $output .= "<tr>";
            if ($ViewCalendarHour) {
                $textCalendarHour = $dateCalendar->hour . ":00A";
            } else {
                $textCalendarHour = "";

            }
            $output_1 .= "<td  class='text-center' style='vertical-align: middle;' >" . $textCalendarHour . "</td>";

            for ($j = 0; $j <= $addColumn; $j++) {
                $output_1 .= "<td></td>";
            }
//            $output .= "</tr>";


            foreach ($courses as $course) {

                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));


                static::create_properties($course);
                static::info($course);
                $course->set_up_display();

                $output .= "<tr>";

                if ($dateCalendar->hour !== $dateCourse->hour) {

                    if ($prevDateCalendarHour !== $dateCalendar->hour && $prevDateCourseHour !== $dateCalendar->hour) {

                        $output .= $output_1;

                    }


                } else {


                    foreach (static::$db_field_table_display_chauffeur as $field) {
                        $data_target = get_called_class() . "-modal-id-" . $course->id;


                        $output .= "<td class='text-center' style='vertical-align: middle;'>";


                        switch ($field) {

                            case "H":

                                if ($prevDateCourseHour !== $dateCourse->hour) {
                                    $output .= $dateCourse->hour . ":00B";
                                }

                                break;
                            case "heure":

//                                $output .= hr_mn_to_text($course->$field . ':');
                                break;

                            default:
                                if (isset($course->$field) && !empty($course->$field)) {
                                    $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";


                                    $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button' data-toggle='modal' data-model-id='{$course->id}' data-target='#{$data_target}' class='btn btn-{$course->color2}'>" . "<span class='badge  pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;" . $course->pseudo . " " . "</button></a>";


                                }

                        }

                        $output .= "</td>";

                    }


                } //
                $output_1 = "";
                $output .= "</tr>";
                $prevDateCalendarHour = $dateCalendar->hour;
                $prevDateCourseHour = $dateCourse->hour;


            } //end of course

        } // end of $i to 24

        $output .= "</tbody>";
        $output .= "</table>";
        $output .= "</div>";


        if (!$ibox) {
            $output .= "</div>";
            $output .= "</div>";
        }


        if (!$ibox) {
            return $output;
        } else {
            return ibox($output, 12, '');

        }

    }

    public static function view_by_Chauffeur_v3_ok()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
        $output .= static::header_list_ul();


        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $output .= "<thead>";
        $output .= "<tr>";

        $a = 0;
        foreach (static::$db_field_table_display_chauffeur_header as $item) {
            if ($a <= 1) {
                $output .= "<th class='text-center'  style='width:0.2%;vertical-align: middle'>";

            } else {
                $output .= "<th class='text-center'  style='width:1%;vertical-align: middle'>";

            }

            $output .= $item;
            $output .= "</th>";
            $a++;
        }
        unset($a);

        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";

        $dateNow = Carbon::now();

        $output_1 = "";
        $ViewCalendarHour = true;
        $prevDateCalendarHour = "";
        $prevDateCourseHour = "";


        for ($i = 0; $i < 24; $i++) {
            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);

//            $output .= "<tr>";
            if ($ViewCalendarHour) {
                $textCalendarHour = $dateCalendar->hour . ":00A";
            } else {
                $textCalendarHour = "";

            }
            $output_1 .= "<td  class='text-center' style='vertical-align: middle;' >" . $textCalendarHour . "</td>";

            for ($j = 0; $j <= $addColumn; $j++) {
                $output_1 .= "<td></td>";
            }
//            $output .= "</tr>";


            foreach ($courses as $course) {

                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));


                static::create_properties($course);
                static::info($course);
                $course->set_up_display();

                $output .= "<tr>";

                if ($dateCalendar->hour == $dateCourse->hour) {


                    foreach (static::$db_field_table_display_chauffeur as $field) {
                        $data_target = get_called_class() . "-modal-id-" . $course->id;


                        $output .= "<td class='text-center' style='vertical-align: middle;'>";


                        switch ($field) {

                            case "H":

                                if ($prevDateCourseHour !== $dateCourse->hour) {
                                    $output .= $dateCourse->hour . ":00B";
                                }

                                break;
                            case "heure":

//                                $output .= hr_mn_to_text($course->$field . ':');
                                break;

                            default:
                                if (isset($course->$field) && !empty($course->$field)) {
                                    $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";


                                    $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button' data-toggle='modal' data-model-id='{$course->id}' data-target='#{$data_target}' class='btn btn-{$course->color2}'>" . "<span class='badge  pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;" . $course->pseudo . " " . "</button></a>";


                                }

                        }

                        $output .= "</td>";

                    }


                } else {

                    if ($prevDateCalendarHour !== $dateCalendar->hour && $prevDateCourseHour !== $dateCalendar->hour) {

                        $output .= $output_1;

                    }


                } //
                $output_1 = "";
                $output .= "</tr>";
                $prevDateCalendarHour = $dateCalendar->hour;
                $prevDateCourseHour = $dateCourse->hour;


            } //end of course

        } // end of $i to 24

        $output .= "</tbody>";
        $output .= "</table>";
        $output .= "</div>";


        if (!$ibox) {
            $output .= "</div>";
            $output .= "</div>";
        }


        if (!$ibox) {
            return $output;
        } else {
            return ibox($output, 12, '');

        }

    }


    public static function get_course()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
        $output .= static::header_list_ul();


        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $output .= "<thead>";
        $output .= "<tr>";

        $a = 0;
        foreach (static::$db_field_table_display_chauffeur_header as $item) {
            if ($a <= 1) {
                $output .= "<th class='text-center'  style='width:0.2%;vertical-align: middle'>";

            } else {
                $output .= "<th class='text-center'  style='width:1%;vertical-align: middle'>";

            }

            $output .= $item;
            $output .= "</th>";
            $a++;
        }
        unset($a);

        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";

        $dateNow = Carbon::now();

        $output_1 = "";
        $ViewCalendarHour = true;
        $prevDateCalendarHour = "";
        $prevDateCourseHour = "";

        return $courses;

        for ($i = 0; $i < 24; $i++) {
            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);

//            $output .= "<tr>";
            if ($ViewCalendarHour) {
                $textCalendarHour = $dateCalendar->hour . ":00A";
            } else {
                $textCalendarHour = "";

            }
            $output_1 .= "<td  class='text-center' style='vertical-align: middle;' >" . $textCalendarHour . "</td>";

            for ($j = 0; $j <= $addColumn; $j++) {
                $output_1 .= "<td></td>";
            }
//            $output .= "</tr>";


            foreach ($courses as $course) {

                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));


                static::create_properties($course);
                static::info($course);
                $course->set_up_display();

                $output .= "<tr>";

                if ($dateCalendar->hour !== $dateCourse->hour) {

                    if ($prevDateCalendarHour !== $dateCalendar->hour && $prevDateCourseHour !== $dateCalendar->hour) {

                        $output .= $output_1;

                    }


                } else {


                    foreach (static::$db_field_table_display_chauffeur as $field) {
                        $data_target = get_called_class() . "-modal-id-" . $course->id;


                        $output .= "<td class='text-center' style='vertical-align: middle;'>";


                        switch ($field) {

                            case "H":

                                if ($prevDateCourseHour !== $dateCourse->hour) {
                                    $output .= $dateCourse->hour . ":00B";
                                }

                                break;
                            case "heure":

//                                $output .= hr_mn_to_text($course->$field . ':');
                                break;

                            default:
                                if (isset($course->$field) && !empty($course->$field)) {
                                    $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";


                                    $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button' data-toggle='modal' data-model-id='{$course->id}' data-target='#{$data_target}' class='btn btn-{$course->color2}'>" . "<span class='badge  pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;" . $course->pseudo . " " . "</button></a>";


                                }

                        }

                        $output .= "</td>";

                    }


                } //
                $output_1 = "";
                $output .= "</tr>";
                $prevDateCalendarHour = $dateCalendar->hour;
                $prevDateCourseHour = $dateCourse->hour;


            } //end of course

        } // end of $i to 24

        $output .= "</tbody>";
        $output .= "</table>";
        $output .= "</div>";


        if (!$ibox) {
            $output .= "</div>";
            $output .= "</div>";
        }


        if (!$ibox) {
            return $output;
        } else {
            return ibox($output, 12, '');

        }

    }

    public static function get_head()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
//        $output .= static::header_list_ul();


        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $output .= "<thead>";
        $output .= "<tr>";

        $a = 0;
        foreach (static::$db_field_table_display_chauffeur_header as $item) {
            if ($a <= 1) {
                $output .= "<th class='text-center'  style='width:0.2%;vertical-align: middle'>";

            } else {
                $output .= "<th class='text-center'  style='width:1%;vertical-align: middle'>";

            }

            $output .= $item;
            $output .= "</th>";
            $a++;
        }
        unset($a);

        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";


        return $output;

        // end of $i to 24


    }

    public static function get_foot()
    {


        // end of $i to 24


        $output = "";

        $output .= "</tbody>";
        $output .= "</table>";
        $output .= "</div>";
        return $output;


    }

    public static function txt()
    {
        $courses = Course::find_all();

        $output = "";
        $output .= CourseCalendar::get_head();
//$courses=$return[1];

        $date_str = '2017-05-07';


        for ($i = 0; $i < 24; $i++) {
            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);


            $output .= "<tr>";
            $output .= "<td>";
            $output .= $i . ":00";
            $output .= "</td>";

//                $output="<td></td>";

            $output .= "<td>";

            foreach ($courses as $course) {
                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));
                if ($course->course_date !== $date_str) {
                    continue(1);
                }

                if ($dateCalendar->hour == $dateCourse->hour) {


                    $output .= "id " . $course->heure . " " . $course->id . "/" . $course->pseudo . $course->course_date . "<br>";

                }

                if ($course->id == 5) break;
            }
            $output .= "</td>";
            $output .= "</tr>";
        }


        $output .= CourseCalendar::get_foot();

        echo $output;

//echo current($courses[5])."<br>x";
    }

}


?>


<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC) ?>


<?php

//echo CourseCalendar::view_by_details($sql)
echo CourseCalendar::main_display();

//echo CourseCalendar::view_by_Chauffeur();
//echo CourseCalendar::get_chauffeur_column();
//echo CourseCalendar::this_class_table();


//echo "hello";
//$courses=CourseCalendar::get_course();

?>


<?php include(FOOTER_PUBLIC); ?>


<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/4/2017
 * Time: 1:03 AM
 */
class Course extends TransportProgramming
{

    public $color;
    public $color2;
//
    public static $date;
    public static $date_fmt;

    public static $date_next;
    public static $date_previous;

//    public $reporting_date_today;
//    public $reporting_date_tomorrow;
//
//    public $reporting_sql;

//    public $reporting_time;


    protected static function show(Course $course)
    {

        global $Nav;
        Carbon::setLocale('fr');

        $course_heure = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . $course->heure); // 1975-05-21 22:00:00

//             echo   $course_heure = Carbon::createFromFormat('Y-n-j G:i', $course->course_date . " " . $course->heure); // 1975-05-21 22:00:00


        $dif_min = Carbon::now()->diffInMinutes($course_heure, false);

        $when = $course_heure->diffForHumans(Carbon::now());

        $output = "";
        $client = TransportClient::find_by_id((int)$course->client_id);
        $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);

//          <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>

        if ($course->validated_chauffeur == 1) {
            $course->color = "list-group-item-warning";
            $course->color2 = "blue";

        } elseif ($dif_min <= -5) {
            $course->color = "list-group-item-danger";
            $course->color2 = "red";

        } elseif ($dif_min > -5 && $dif_min <= 30) {
            $course->color = "list-group-item-success";
            $course->color2 = "orange";

        } elseif ($dif_min > 30 && $dif_min < 60) {
            $course->color = "list-group-item-info";
            $course->color2 = "green";

        } else {
            $course->color = "list-group-item-warning";
            $course->color2 = "green";

        }


        $bg = "style='background-color: $course->color2;color:white'";

        $output .= "<li  class='list-group-item $course->color' $bg >";
        $output .= "<span>";
        $output .= "<strong>";
        $output .= $course->course_date . " " . hr_mn_to_text($course->heure, 'h') . " " . $client->web_view . " "
            . $chauffeur->chauffeur_name . " ($dif_min) " . $when . "-id(" . $course->id . ")";
        $output .= "</strong>";
        $output .= "</span>";

        $repeat = str_repeat('&nbsp;', 2);

        $output .= "<span class='pull-right text-center' style='text-decoration: none;background-color: white;margin-right: 5%;margin-left: 5%'>";
        $output .= $repeat . "<a href='{$Nav->path_admin}edit_ajax.php?class_name=Course&id={$course->id}'><span > <i class='fa fa-edit'></i></span></a>";
        $output .= $repeat . "<a onclick=\"return confirm('Delete Are you sure?')\" href='{$Nav->path_admin}delete_ajax.php?class_name=Course&id={$course->id}'><span><i class='fa fa-eraser' style='color:red'></i></span></a>";


        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-20'>-20mn</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-60'>-1h</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=0'>Now</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=1'>+1mn</a>";
        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=5'>+5mn</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=10'>+10mn</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=59'>+1h</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=70'>+70mn</a>";


        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-20'>-20mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-60'>-1h D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=1'>+1mn D</a>";
        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=5'>+5mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=10'>+10mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=59'>+1h D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=70'>+70mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateValidation'>Chauf</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&course_date=2017-05-09'>+1d</a>";


        $output .= "</span>";
        $output .= "</li>";


        return $output;

    }

    public static function updateValidation()
    {
        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] == get_called_class() && $_GET['action'] == "updateValidation") {
            $course = static::find_by_id((int)trim($_GET['id']));
//            $valid_int=(int)  $_GET['typeActionValidatedChauffeur'];

            if ($course->validated_chauffeur == 0) {
                $course->validated_chauffeur = 1;
            } else {
                $course->validated_chauffeur = 0;
            }

            $course->save();
        }

        $qry = remove_get(['action']);

//        redirect_to($_SERVER['PHP_SELF']."?class_name=".get_called_class());


        redirect_to($_SERVER['PHP_SELF'] . $qry);

    }


    public static function updateDefiningTiming()
    {
        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] == get_called_class() && $_GET['action'] == "updateDefiningTiming") {

            $course = static::find_by_id((int)trim($_GET['id']));


            if (isset($_GET['typeActionMinuteFromNow'])) {
                $add_minute = (int)$_GET['typeActionMinuteFromNow'];
                $dt = Carbon::now();
            } elseif ($_GET['typeActionMinuteFromDate']) {
                $add_minute = (int)$_GET['typeActionMinuteFromDate'];
                $dt = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . $course->heure); // 1975-05-21 22:00:00
            } else {
                $add_minute = 0;
                $dt = Carbon::now();

            }

            if ($add_minute < 0) {
                $dt->subMinutes(abs($add_minute));
            } else {
                $dt->addMinutes($add_minute);
            }

            $date_sql = $dt->toDateString();
            $time_now = $dt->toTimeString();

//            $time_now=now_time();

            $course->course_date = $date_sql;
            $course->heure = $time_now;
            $course->save();
            redirect_to($_SERVER['PHP_SELF'] . "?class_name=" . get_called_class());
        }

    }


    protected static function get_records(array $courses)
    {
        $output = "";
        foreach ($courses as $course) {

            $output .= static::show($course);
        }


//        var_dump($output);
//        return;

//        $output.=

        return static::list_ul($output);

    }

    public static function get_today()
    {
//        $today = e(now_sql());

        $dt = Carbon::now();
        $today = $dt->toDateString();
        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $today . "' ORDER BY heure ASC";

        $courses = static::find_by_sql($sql);

//        $output = "";

        return static::get_records($courses);

    }

    public static function get_tomorrow()
    {
//        $today = e(now_sql());

        $dt = Carbon::tomorrow();
        $tomorrow = $dt->toDateString();
        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $tomorrow . "' ORDER BY heure ASC";

        $courses = static::find_by_sql($sql);

//        $output = "";

        return static::get_records($courses);

    }

    public static function get_date($date)
    {
//        $today = e(now_sql());


        $dt = Carbon::createFromFormat('Y-m-d', $date); // 1975-05-21 22:00:00
        $new_date = $dt->toDateString();

//        echo $new_date;


        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $new_date . "' ORDER BY heure ASC";
//        echo $sql;
        $courses = static::find_by_sql($sql);
//        echo "<pre>";
//var_dump($courses);
//        echo "</pre>";

//        return;

//        $output = "";

        return static::get_records($courses);

    }

    public static function get_yesterday()
    {
//        $today = e(now_sql());

        $dt = Carbon::yesterday();
        $yesterday = $dt->toDateString();
        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $yesterday . "' ORDER BY heure ASC";

        $courses = static::find_by_sql($sql);

//        $output = "";

        return static::get_records($courses);

    }

    public static function list($content = '')
    {
        $output = "";

//     echo datetime_to_text(now_sql());
//      $unix_datetime = strtotime($datetime);
        $today = strftime("%A  %e %B, %Y ", time());

        $output .= "<div class='list-group'>";
        $output .= "<li href='#' class='list-group-item'>";
        $output .= "<a href='#'>Hier</a>";
        $output .= "Aujourd'hui le " . $today . " il est " . hr_mn_to_text(now_time(), 'h');
        $output .= "<a href='transport.php?class_name=" . get_called_class() . "&" . "'>demain</a>";
        $output .= "</li>";

        $output .= $content;

//      $output .= "</a>";
        $output .= "</div>";
//      $output .= "</div>";

        return $output;
    }

    public static function list_ul($content = '')
    {
        $output = "";

//     echo datetime_to_text(now_sql());
//      $unix_datetime = strtotime($datetime);
//        $today = strftime("%A  %e %B, %Y ", time());
        Carbon::setLocale('fr');
        $date = static::$date;
//        $date=Carbon::today();
//        $date=Carbon::create(2017,5,10,0,0,0);
//        $previousDate= $date->addDay();
//        $nextDate= $date->subDays(2);

        $previousDate = $date->copy()->subDay();
        $nextDate = $date->copy()->addDay();

//        echo "<hr>";
//        echo $date; echo "<hr>";
//        echo $previousDate; echo "<hr>";
//        echo $nextDate; echo "<hr>";
//return;


        $previousDate_fmt = $previousDate->formatLocalized('%A %d %B %Y');
        $date_fmt = $date->formatLocalized('%A %d %B %Y');
        $nextDate_fmt = $nextDate->formatLocalized('%A %d %B %Y');

        $previousDate_str = $previousDate->toDateString();
        $date_str = $date->toDateString();
        $nextDate_str = $nextDate->toDateString();

//        $dif_days_previous = Carbon::today()->diffInDays($date, false);
        $days_after = $date->diffForHumans(Carbon::today());

//
//        $dif_days_next = Carbon::now()->diffInDays($nextDate, false);
//        $when_next = $nextDate->diffForHumans(Carbon::today());

//        echo $dif_days_previous."<hr>";
//        echo $dif_days_next."<hr>";
//
//
//        echo $when_previous."<hr>";
//        echo $when_next."<hr>";


        if ($date == Carbon::today()) {
            $header = "<small>Aujourd'hui</small>";
        } elseif ($date == Carbon::yesterday()) {
            $header = "<small>Hier</small>";
        } elseif ($date == Carbon::tomorrow()) {
            $header = "<small>Demain</small>";
        } else {
            $header = "<small><i>($days_after)</i></small>";

        }

        $previous = "<i class=\"fa fa-caret-square-o-left\"></i>";
        $next = "<i class=\"fa fa-caret-square-o-right\"></i>";


        $timeNow = " il est " . hr_mn_to_text(now_time(), 'h');
//        $output .= "<h1 class='text-center'>Courses $today" . " il est " . hr_mn_to_text(now_time(), 'h') . "</h1>";
        $output .= "<h1 class='text-center'>";

//        $href = "transport.php?class_name=" . get_called_class() . "&course_date=yesterday";
//        echo $href;
        $href = "transport.php?class_name=" . get_called_class() . "&course_date=$previousDate_str";
        $output .= "<a href='$href'> $previous </a>";

        $href = "transport.php?class_name=" . get_called_class() . "&course_date=today";
        $link = "<a href='$href'>$date_fmt</a>";

        $output .= "Courses $header du " . $link;

//        $href = "transport.php?class_name=" . get_called_class() . "&course_date=tomorrow";
        $href = "transport.php?class_name=" . get_called_class() . "&course_date=$nextDate_str";

        $output .= "<a href='$href'> $next </a>";
        $output .= "</h1>";
//        $output .= "</li>";

        $output .= "<ul class='list-group'>";
        $output .= "<li href='#' class='list-group-item'>";
//var_dump($output);

        $output .= $content;
//        var_dump($content);

//      $output .= "</a>";
        $output .= "</ul>";
        $output .= "</div>";

        return $output;
    }

    public static function main_display()
    {


        if (isset($_GET['course_date'])) {
            if ($_GET['course_date'] == "tomorrow") {
                static::$date = Carbon::tomorrow();
                return static::get_tomorrow();
            } elseif ($_GET['course_date'] == "yesterday") {
                static::$date = Carbon::yesterday();
                return static::get_yesterday();
            } elseif ($_GET['course_date'] == "today") {
                static::$date = Carbon::today();
                return static::get_today();
            } else {
                $date = $_GET['course_date'];
//                return;

//                echo $date1 = Carbon::tomorrow();echo "<hr>";
//                echo $date2 = Carbon::yesterday();echo "<hr>";
//                echo $date3 = Carbon::today();echo "<hr>";
//                echo $date4 = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);echo "<hr>";


                static::$date = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);
//                return;
//                echo static::$date;

                return static::get_date($date);
            }

        } else {
            static::$date = Carbon::today();;
            return static::get_today();

        }
    }

}
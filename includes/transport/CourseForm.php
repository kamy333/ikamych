<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/19/2017
 * Time: 1:29 AM
 */
class CourseForm extends Course
{

    public static function list_ul($content = '')
    {
        $output = "";


        Carbon::setLocale('fr');
        $date = static::$date;


        $previousDate = $date->copy()->subDay();
        $nextDate = $date->copy()->addDay();


        $previousDate_fmt = $previousDate->formatLocalized('%A %d %B %Y');
        $date_fmt = $date->formatLocalized('%A %d %B %Y');
        $date_fmt2 = $date->formatLocalized('%a %d %b %y');
        $nextDate_fmt = $nextDate->formatLocalized('%A %d %B %Y');

        $previousDate_str = $previousDate->toDateString();
        $date_str = $date->toDateString();
        $nextDate_str = $nextDate->toDateString();

        $days_after = $date->diffForHumans(Carbon::today());


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

        $href = "transport.php?class_name=" . get_called_class() . "&course_date=$previousDate_str";
        $previous = "<a href='$href'> $previous </a>";

        $href = "transport.php?class_name=" . get_called_class() . "&course_date=$nextDate_str";
        $next = "<a href='$href'> $next </a>";


        $output .= "<h1 class='text-center'>";


        $href = "transport.php?class_name=" . get_called_class() . "&course_date=today";
        $link = "<a href='$href'>$date_fmt</a>";
        $link2 = "<a href='$href'>$date_fmt2</a>";


//        $output .=;
        $output .= "<span class='hidden-sm hidden-xs' style='color: inherit' >$previous Courses $header du </span>";
        $output .= "<span class='hidden-sm hidden-xs'>" . $link . $next . "</span>";
//        $output.=;

        $output .= "<span class='visible-sm visible-xs' style='font-size:smaller'>" . $previous . $link2 . $next . "</span>";


        $output .= "</h1>";

        $output .= "<ul class='list-group'>";
//        $output .= "<li href='#' class='list-group-item'>";
//var_dump($output);

        $output .= $content;
//        var_dump($content);

        $output .= "</ul>";
        $output .= "</div>";

        return $output;
    }


}
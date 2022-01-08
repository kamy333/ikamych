<?php
function redirect_to($location = NULL)
{
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}

function strip_zeros_from_date($marked_string = "")
{
    // first remove the marked zeros
    $no_zeros = str_replace('*0', '', $marked_string);
    // then remove any remaining marks
    $cleaned_string = str_replace('*', '', $no_zeros);
    return $cleaned_string;
}


function output_message($message = "", $type = "error")
{
    if ($type == "ok" || $type == "OK" || $type == "o" || $type == "O") {
        $alert = "success";
        $gliphicon = "ok";
        $txt = "Warning";

    } elseif ($type == "warning" || $type == "w" || $type == "W") {
        $alert = "warning";
        $gliphicon = "warning-sign";
        $txt = "Warning";

    } elseif ($type == "error" || $type == "e" || $type == "E") {
        $alert = "danger";
        $gliphicon = "exclamation-sign";
        $txt = "Error";

    } else {
        $alert = "danger";
        $gliphicon = "exclamation-sign";
        $txt = "Error";

    }

    if (!empty($message)) {
        $output = "<div class=\"alert alert-{$alert} fade in\"  role='alert' >";
        $output .= "<a href='#' class='close' data-dismiss='alert'>&times;</a>";
        $output .= "<span class=\"glyphicon glyphicon-{$gliphicon}\" aria-hidden='true'></span>";
        $output .= "<span class=\"sr-only\">{$txt}:</span>";

        $output .= " &nbsp;" . htmlentities($message, ENT_COMPAT, 'utf-8');
        $output .= "</div>";

        return $output;
    } else {
        return "";
    }
}

function has_presence($value)
{
    $trimmed_value = trim($value);
    return isset($trimmed_value) && $trimmed_value !== "";
}

function my_autoloader($class_name)
{
    $class_name = strtolower($class_name);
    $path = LIB_PATH . DS . "{$class_name}.php";
    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class_name}.php could not be found.");
    }
}

spl_autoload_register('my_autoloader');

function include_layout_template($template = "")
{
    include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . $template);
}

function log_action($action, $message = "")
{
    $logfile = SITE_ROOT . DS . 'logs' . DS . 'log.txt';
    $new = file_exists($logfile) ? false : true;
    if ($handle = fopen($logfile, 'a')) { // append
        $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
        $content = "{$timestamp} | {$action}: {$message}\n";
        fwrite($handle, $content);
        fclose($handle);
        if ($new) {
            chmod($logfile, 0755);
        }
    } else {
        echo "Could not open log file for writing.";
    }
}

function log_debug($action, $message = "")
{
    $logfile = SITE_ROOT . DS . 'logs' . DS . 'debug.txt';
    $new = file_exists($logfile) ? false : true;
    if ($handle = fopen($logfile, 'a')) { // append
        $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
        $content = "{$timestamp} | {$action}: {$message}\n";
        fwrite($handle, $content);
        fclose($handle);
        if ($new) {
            chmod($logfile, 0755);
        }
    } else {
        echo "Could not open log debug file for writing.";
    }
}


function log_queries($action, $message = "")
{

    $logfile = SITE_ROOT . DS . 'logs' . DS . 'queries.txt';
    $new = file_exists($logfile) ? false : true;
    if ($handle = fopen($logfile, 'a')) { // append
        $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
        $content = "{$timestamp} | {$action}: {$message}\n";
        fwrite($handle, $content);
        fclose($handle);
        if ($new) {
            chmod($logfile, 0755);
        }
    } else {
        echo "Could not open log queries file for writing.";
    }
}

function log_views($action, $message = "")
{


    $logfile = SITE_ROOT . DS . 'logs' . DS . 'views.txt';
    $new = file_exists($logfile) ? false : true;
    if ($handle = fopen($logfile, 'a')) { // append
        $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
        $content = "{$timestamp} | {$action}: {$message} \n";
        fwrite($handle, $content);
        fclose($handle);
        if ($new) {
            chmod($logfile, 0755);
        }
    } else {
        echo "Could not open log views file for writing.";
    }
}


function is_ajax_request()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}


function datetime_to_text($datetime = "")
{
    $unix_datetime = strtotime($datetime);
    return strftime("%B %d, %Y at %I:%M %p", $unix_datetime);
}


function date_format_to_sql($date, $format = 'YYYY-MM-DD')
{
    $year = "";
    $day = "";
    $month = "";
    // $field="Date" ;

    $mydate = trim($date);

//    return;
    if ($format == 'YYYY-MM-DD') list($year, $month, $day) = explode('-', $mydate);
    if ($format == 'YYYY/MM/DD') list($year, $month, $day) = explode('/', $mydate);
    if ($format == 'YYYY.MM.DD') list($year, $month, $day) = explode('.', $mydate);

    if ($format == 'DD-MM-YYYY') list($day, $month, $year) = explode('-', $mydate);
    if ($format == 'DD/MM/YYYY') list($day, $month, $year) = explode('/', $mydate);
    if ($format == 'DD.MM.YYYY') list($day, $month, $year) = explode('.', $mydate);

    if ($format == 'MM-DD-YYYY') list($month, $day, $year) = explode('-', $mydate);
    if ($format == 'MM/DD/YYYY') list($month, $day, $year) = explode('/', $mydate);
    if ($format == 'MM.DD.YYYY') list($month, $day, $year) = explode('.', $mydate);

//    echo $date;
//    echo $format;
//   echo $year;
//  echo  $month ;
//  echo  $day;
//    echo $year=(int)$year;
//    echo  $month=(int)$month ;
//    echo  $day=(int)$day;


//    return;
    if (is_numeric($year) && is_numeric($month) && is_numeric($day)) {
        if (!checkdate($month, $day, $year)) {
            exit("error date look format");

        } else {


            return $year . "-" . $month . "-" . $day;

//                   return true;
        }

    } else {
        exit("error date");
    }


}

function hr_mn_to_text($time_sql, $semicolon = ":")
{
//  $semicolon=="h"
//  $semicolon=="full"

//  $time_sql format is 03:00:00.00000


    if ($semicolon === 'full' || strlen($semicolon) > 1) {
        return substr($time_sql, 0, 8);
    }
    return str_replace(":", $semicolon, substr($time_sql, 0, 5));


}

function date_to_text($date = "")
{
    if (empty($date)) {
        $date = time();
    }
    $unix_datetime = strtotime($date);
    return strftime("%a %b %e, %Y ", $unix_datetime);

}

function datetime_to_text_day($datetime = "")
{
    $unix_datetime = strtotime($datetime);
    return strftime("%a %B %d, %Y at %I:%M %p", $unix_datetime);
}


function now()
{
    return strftime("%B %d, %Y at %I:%M %p", time());
}

function now_monthname()
{
    return strftime("%B", time());
}

function now_sql($date = false)
{
    if ($date == false) {
        $date = time();
    }
    return strftime("%Y-%m-%d", time());
}

function now_time($s = false)
{
    if ($s) {
        return date('H:i:s', time());

    } else {
        return date('H:i', time());

    }
}

function date_sql($date = false)
{
    if ($date == false) {
        $date = time();
    }
    return strftime("%Y-%m-%d", $date);
}

function unixToMySQL($timestamp)
{
    return date('Y-m-d H:i:s', $timestamp);
}

function dateDifference($date_1, $date_2, $differenceFormat = '%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);

}

function DateDifferenceFormat($date_1, $date_2)
{

    $day = (int)dateDifference($date_1, $date_2, "%a");
    $hour = (int)dateDifference($date_1, $date_2, "%h");
    $minute = (int)dateDifference($date_1, $date_2, "%i");
    $differenceFormat = "%a";
    $now = (boolean)false;

    if ($day < 1) {
        if ($hour == 0) {
            if ($minute < 2) {
                $minutes = "Minute";
                $now = true;
            } else {
                $minutes = "Minutes";
            }
            $differenceFormat = "%i $minutes ago";


        } else {
            if ($hour < 2) {
                $hours = "Hour";
            } else {
                $hours = "Hours";
            }
            $differenceFormat = "%h $hours ago";
        }

    } else {
        if ($day >= 1) {
            if ($day < 2) {
                $days = "Day";
            } else {
                $days = "Days";
            }
            $differenceFormat = "%a $days ago";
        }


    }

    if ($now) {
        return "&nbsp;Now";
    } else {
        return dateDifference($date_1, $date_2, $differenceFormat);

    }
}

function mth_fr_name($month_name)
{
    switch ($month_name) {
        case "January":
            return "janvier";
            break;
        case "February":
            return "février";
            break;
        case "March":
            return "mars";
            break;
        case "April":
            return "avril";
            break;
        case "May":
            return "mai";
            break;
        case "June":
            return "juin";
            break;
        case "July":
            return "juillet";
            break;
        case "August":
            return "aôut";
            break;
        case "September":
            return "septembre";
            break;
        case "October":
            return "octobre";
            break;
        case "November":
            return "novembre";
            break;
        case "December":
            return "décembre";
            break;

        default:
            return "ATTENTION ";
            break;
    }
}

function mth_fr_no($month_no)
{
    switch ($month_no) {
        case "01":
            return "janvier";
            break;
        case "02":
            return "février";
            break;
        case "03":
            return "mars";
            break;
        case "04":
            return "avril";
            break;
        case "05":
            return "mai";
            break;
        case "06":
            return "juin";
            break;
        case "07":
            return "juillet";
            break;
        case "08":
            return "août";
            break;
        case "09":
            return "septembre";
            break;
        case "10":
            return "octobre";
            break;
        case "11":
            return "novembre";
            break;
        case "12":
            return "décembre";
            break;

        default:
            return "ATTENTION ";
            break;
    }
}

function day_eng($numb = 0)
{

    switch ($numb) {
        case 1:
            return "Monday";
            break;
        case 2:
            return "Tuesday";
            break;
        case 3:
            return "Wednesday";
            break;
        case 4:
            return "Thursday";
            break;
        case 5:
            return "Friday";
            break;
        case 6:
            return "Saturday";
            break;
        case 0:
            return "Sunday";
            break;
        default:
            return "ATTENTION Day english name CHIFFRE DOIT ETRE ENTRE 0-6";
            break;


    }

}

function day_fr($numb = 0)
{

    switch ($numb) {
        case 1:
            return "Lundi";
            break;
        case 2:
            return "Mardi";
            break;
        case 3:
            return "Mercredi";
            break;
        case 4:
            return "Jeudi";
            break;
        case 5:
            return "Vendredi";
            break;
        case 6:
            return "Samedi";
            break;
        case 0:
            return "Dimanche";
            break;
        default:
            return "ATTENTION CHIFFRE DOIT ETRE ENTRE 0-6";
            break;


    }

}

function day_eng_no($jour)
{
    switch ($jour) {
        case "Monday":
            return 1;
            break;
        case "Tuesday":
            return 2;
            break;
        case "Wednesday":
            return 3;
            break;
        case "Thursday":
            return 4;
            break;
        case "Friday":
            return 5;
            break;
        case "Saturday":
            return 6;
            break;
        case "Sunday":
            return 0;
            break;
        default:
            return "ATTENTION day french CHIFFRE DOIT ETRE ENTRE 0-6";
            break;
    }


}

function day_no($jour)
{
    switch ($jour) {
        case "Lundi":
            return 1;
            break;
        case "Mardi":
            return 2;
            break;
        case "Mercredi":
            return 3;
            break;
        case "Jeudi":
            return 4;
            break;
        case "Vendredi":
            return 5;
            break;
        case "Samedi":
            return 6;
            break;
        case "Dimanche":
            return 0;
            break;
        default:
            return "ATTENTION CHIFFRE DOIT ETRE ENTRE 0-6";
            break;
    }


}

function date_fr($str_time = 'now')
{
    $unix_time = strtotime($str_time);
    $day_wk_no = day_eng_no(strftime("%A", $unix_time));
    $nom_jour = day_fr($day_wk_no);
    $nom_jour_short = substr($nom_jour, 0, 3);

    $jour_no = strftime("*%d", $unix_time);
    $jour_no = str_replace('*0', '', $jour_no);
    $jour_no = str_replace('*', '', $jour_no);

    $now_month = mth_fr_name(strftime("%B", $unix_time));
    $now_month_short = substr($now_month, 0, 4);
    $now_year = strftime("%Y", $unix_time);
    $now_year_short = substr($now_year, 2, 2);

    $hour_minute = strftime("*%H:%M", $unix_time);
    $hour_minute = str_replace('*0', '', $hour_minute);
    $hour_minute = str_replace('*', '', $hour_minute);

    $date_fr = h($jour_no . "." . $now_month . "." . $now_year);
    $date_fr_short = h($nom_jour_short . " " . $jour_no . " " . $now_month_short . " " . $now_year_short);
    $date_fr_long = h($nom_jour . " " . $jour_no . " " . $now_month . " " . $now_year);

    $date_fr_hr = h($jour_no . "." . $now_month . "." . $now_year . " - " . $hour_minute);
    $date_fr_short_hr = $nom_jour_short . " " . $jour_no . " " . $now_month_short . " " . $now_year_short . " - " . $hour_minute;
    $date_fr_long_hr = h($nom_jour . " " . $jour_no . " " . $now_month . " " . $now_year . " - " . $hour_minute);
    $date_fr_full_hr = h($nom_jour . " " . $jour_no . " " . $now_month . " " . $now_year . " " . $hour_minute);


    return array($date_fr, $date_fr_short, $date_fr_long, $date_fr_hr, $date_fr_short_hr, $date_fr_long_hr, $date_fr_full_hr);

//    list ($date_fr,$date_fr_short,$date_fr_long,$date_fr_hr,$date_fr_short_hr,$date_fr_long_hr,$date_fr_full_hr)= date_fr($date_sql);


}

function hs($string)
{
    return htmlspecialchars($string);
}

// Sanitize for JavaScript output
function j($string)
{
    return json_encode($string);
}

// Sanitize for use in a URL
function u($string)
{
    return urlencode($string);
}

function ud8($string)
{
    return utf8_decode($string);
}

function d($string)
{
    return urldecode($string);
}

function h($string)
{
//    htmlspecialchars($string)
    return htmlentities($string, ENT_COMPAT, "utf-8");
}

function e($string)
{
    global $database;

    return $database->escape_value($string);

}

function format_number($number)
{
    $output = "";
    if (is_numeric($number)) {
        if ($number < 0) {
            $output .= "<span style='color: red'>" . number_format($number, 2) . "</span>";
        } else {
            $output .= "<span>" . number_format($number, 2) . "</span>";

        }
    }

    return $output;
}


function clean_query_string2($text_qry_str)
{
    $new_str = str_replace("//", "/", $text_qry_str);

    $new_str = str_replace("htpps:/", "htpps://", $new_str);
    return $new_str;
}

function clean_query_string($text_qry_str)
{
    if (substr_count($text_qry_str, '?') > 1) {

        $occ = substr_count($text_qry_str, '?');
//        echo "\n"."Number time ? ".$occ."\n";
        $pos = (int)strpos($text_qry_str, '?');
//        echo"position ".$pos."\n";
        $qry_str_part1 = substr($text_qry_str, 0, $pos + 1);
//        echo "\n";
        $qry_str_part2 = substr($text_qry_str, $pos + 1);
//        echo "\n";
        $qry_str_part2 = str_replace("&?", "&", $qry_str_part2, $count);
        $qry_str_part2 = str_replace("&&", "&", $qry_str_part2, $count);
        $qry_str_part2 = str_replace("??", "&", $qry_str_part2, $count);
        $qry_str_part2 = str_replace("?&", "&", $qry_str_part2, $count);

//        echo $text_qry_str; echo "\n";
        $new_url = $qry_str_part1 . str_replace("?", "&", $qry_str_part2, $count) . "\n";

        return $new_url;
    } else {

        return $text_qry_str;
    }
}

function remove_get($remove = array())
{
//var_dump($remove);
//var_dump($_GET);

//var_dump($class_name_exist);

    $array = array();

    if (isset($_GET)) {
        foreach ($_GET as $key => $val) {
            if (!in_array($key, $remove)) {
                $url_decode = urldecode($val);
                $array[$key] = $url_decode;
            }
        }

//    var_dump($array);
//   var_dump($_GET);

        return "?" . http_build_query($array) . "&";

    } else {

        return "?";
    }

}

function get_where_string($class_name)
{
    //  global$class_name;


    $where = "";
    $where_query = null;
    if (isset($_GET)) {


        if (isset($_GET)) {

            if (!empty ($_GET['search_all'])) {
                $j = 0;

                foreach ($class_name::get_table_field() as $col) {
                    $j++;
                    $value = e(urldecode($_GET['search_all']));
                    $j == 1 ? $where = " WHERE " : $where = " OR ";
                    $where_query .= $where . $col . " like '%" . $value . "%'";

                }


            } else {
                $unique_get = array_unique($_GET);
                $i = 0;
                foreach ($unique_get as $key => $val) {
                    if (in_array($key, $class_name::get_table_field())) {
//                        echo "a $key -> $val <br>";

                        if (in_array($key, $class_name::$fields_numeric)) {
                            $_num_val = (int)$val;
//                            echo "b {$key} -> {$val} <br>";


                            if ((!empty($val)) || $_num_val == 0) {
//                            echo " {$key} -> {$val} <br>";

                                $i++;
//                                var_dump($where);
                                $i == 1 ? $where = " WHERE " : $where = " AND ";
                                $where_query .= $where . $key . "=" . e($_num_val) . " ";
                            }
                        } else {
                            if (!empty($val)) {
                                $i++;
                                $i == 1 ? $where = " WHERE " : $where = " AND ";
                                $where_query .= $where . $key . "='" . e($val) . "' ";
                            }

                        }

                    }
                }
            }


        }

        return $where_query;
    } else {
        return "";
    }


}

function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP | FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    } else {
        return true;
    }

}

// return first found
function forwarded_ip()
{
    $keys = array(
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'HTTP_CLIENT_IP',
        'HTTP_X_CLUSTER_CLIENT_IP'
    );
    foreach ($keys as $key) {
        if (isset($_SERVER[$key])) {
            $ip_array = explode(",", $_SERVER[$key]);
            foreach ($ip_array as $ip) {
                $ip = trim($ip);
                if (validate_ip($ip)) {
                    return $ip;
                }

            }

        }
    }
    return 'None';

}

function check_request()
{

//    echo $_POST['project_id'][0]."<br>";
//    echo $_POST['project_id'][1]."<br>";
//    echo array_count_values($_POST['project_id']);


    if (request_is_post() && $_POST) {
        echo "<p>POST Request Value</p>" . "<br>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }

    if (request_is_get() && $_GET) {
        echo "<p>GET Request Value</p>" . "<br>";
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
    }


}

function get_picture_folder_blueimp_gallery($img_folder = "", $title = "", $default_path = "public")
{
//    global $folder_project_name;
    global $Nav;
//    $dir=SITE_ROOT.DS.$default_path.DS."/img/".$img_folder;
    $dir = SITE_ROOT . DS . $Nav->top_folder . DS . "img/" . $img_folder;


    $output = "";
    if (is_dir($dir)) {
        $dir_array = scandir($dir);
        foreach ($dir_array as $file) {
            if (stripos($file, '.') > 0) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
//                    $output.= "<a href='img/$img_folder/{$file}' title=\"{$title}\" data-gallery=''><img src='img/$img_folder/{$file}' style='width: 10em;height: 10em' ></a>";
                    $output .= "<a href='/$default_path/img/$img_folder/{$file}' title=\"{$title}\" data-gallery=''><img src='/$default_path/img/$img_folder/{$file}' style='width: 10em;height: 10em' ></a>";


                }
            }
        }
    }
    return $output;
}


function get_picture_folder_bootstrap_gallery($img_folder = "", $alt = "image", $default_path = "public", $caption = true)
{
//    global $folder_project_name;
    $dir = SITE_ROOT . DS . $default_path . DS . "/img/" . $img_folder;

    $output = "";
    if (is_dir($dir)) {
        $dir_array = scandir($dir);
        foreach ($dir_array as $file) {
            if (stripos($file, '.') > 0) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $file_no_ext = str_replace("." . $ext, "", $file);;
                if ($caption) {
                    $out_caption = "<div class=\"carousel-caption\">{$file_no_ext}
                                </div>";
                } else {
                    $out_caption = "";
                }
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
                    $output .= "<div class=\"item\">
                                <img alt=\"{$alt}\" class=\"img - responsive thum\"                                                            src='img/$img_folder/{$file}'>
                                {$out_caption}
                                </div>";
                }
            }
        }
    }
    return $output;
}

function get_mp3($img_folder = "", $title = "", $default_path = "public")
{//    global $folder_project_name;
    $dir = SITE_ROOT . DS . $default_path . DS . "/img/" . $img_folder;


    $output = "<div>";
//    $output.= $title;
    if (is_dir($dir)) {
        $dir_array = scandir($dir);
        foreach ($dir_array as $file) {
            if (stripos($file, '.') > 0) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
//                $output .="<br>". $title." - img/$img_folder/ {$file}<br>";

                if ($ext == 'MP3' || $ext == 'mp3') {
//                    $output .= "<a href='img/$img_folder/{$file}' title=\"{$title}\" data-gallery=''><img src='img/$img_folder/{$file}' style='width: 10em;height: 10em' ></a>";

                    $output .= "<div class='col-md-5 col-offset-1'>";

                    $output .= "<h3>" . "img/$img_folder/{$file}</h3>";
                    $output .= "<audio controls >
                <source src='img/$img_folder/{$file}' type='audio/mpeg'>
                Your browser does not support the audio element.
            </audio>  ";
                    $output .= "</div>";


                }
            }
        }
    }

    $output .= "</div>";
    return $output;
}

function get_picture_array($img_folder = "")
{
    global $Nav;
    $default_path = $Nav->folder;
    $dir = SITE_ROOT . DS . $default_path . DS . "/img/" . $img_folder;

    $picture_array = array();
//    $output="";
    if (is_dir($dir)) {
        $dir_array = scandir($dir);
        foreach ($dir_array as $file) {
            if (stripos($file, '.') > 0) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $file_no_ext = str_replace("." . $ext, "", $file);


                $alt = trim(substr($file_no_ext, 3, 100));
                $alt = str_replace("_", " ", $alt);
                $alt = ucfirst($alt);


                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {

                    $img_html = "<img alt=\"{$file_no_ext}\" class=\"img-responsive\" src='img/$img_folder/{$file}' style='width: 30em;height: 20em' >";

                    $img_src = "<img src='img/$img_folder/{$file}' alt='{$alt}' class='img-responsive pull-left'> ";

                    $output = array(
                        "img_tag" => $img_html,
                        'img_file' => $file,
                        "img_name" => $file_no_ext,
                        "img_ext" => $ext,
                        "img_folder" => $Nav->folder,
                        "img_path" => $dir,
                        "img_src" => $img_src,
                        "img_alt" => $alt,
                    );


                    array_push($picture_array, $output);


                }
            }
        }
    }
    return $picture_array;


}

function blueimp_lightBoxGallery($content = "")
{
    $output = "";
    $output .= "<div class=\"lightBoxGallery\">";
    $output .= $content;
    $output .= " <div id=\"blueimp-gallery\" class=\"blueimp-gallery\">
                            <div class=\"slides\"></div>
                            <h3 class=\"title\"></h3>
                            <a class=\"prev\">‹</a>
                            <a class=\"next\">›</a>
                            <a class=\"close\">×</a>
                            <a class=\"play-pause\"></a>
                            <ol class=\"indicator\"></ol>
                        </div>";
    $output .= "</div>";

    return $output;

}

function blueimp_wrapper($h2 = "", $content)
{
    $output = "";
    $output .= "<div class=\"row\">
                <div class=\"ibox-content\">";
    if ($h2) {
        $output .= "<h2>{$h2}</h2>";
    }
    $output .= $content;
    $output .= "</div>";
//    $output.="";

    return $output;
}

function get_gallery_array($no = 1)
{
    $pages = array();
    if ($no === 1) {
        $pages = array(
            'index' => 'Home',
            'index_gallery6' => 'Bralia',
            'index_gallery' => 'Desiree Wedding',
            'index_gallery16' => 'Desire Baby Shower',
            'index_gallery10' => 'Samira Wedding',
            'index_gallery2' => 'Family',
            'index_gallery3' => 'Friends',
            'index_gallery4' => 'myPage',
            'index_gallery5' => 'Lycée Français de Jérusalem',
            'index_gallery7' => 'Maman Bozorgue',
            'index_gallery8' => 'Film',
            'index_gallery9' => 'Pablo Audio',
            'index_gallery12' => 'Djamila photo',
            'index_gallery14' => 'Djamila objectif',
            'index_gallery15' => 'Djamila helico',
        );
    } elseif ($no === 2) {
        $pages = array(
            'index' => 'Home',
        );

    }

    return $pages;

}

function gallery_menu_list($no = 1)
{
    global $active_menu_clean;
    global $session;
    global $path_public;

    $p = $active_menu_clean;


    $pages = get_gallery_array($no);

    $output = "";
    foreach ($pages as $page => $pa) {
        if ($page === $p) {
            $class = "active";
        } else {
            $class = "";
        }

        if ($page == 'index_gallery6' && (User::is_bralia())) {
            $output .= "<li class='$class'><a  href=\"$path_public $page.php\">$pa</a></li>";
        } elseif (($page == 'index_gallery12') && (User::is_djamila())) {
            $output .= "<li class='$class'><a  href=\"$path_public $page.php\">$pa</a></li>";
        } elseif (($page == 'index_gallery14') && (User::is_djamila())) {
            $output .= "<li class='$class'><a  href=\"$path_public $page.php\">$pa</a></li>";
        } elseif ($page == 'index_gallery9' && (User::is_admin())) {
            $output .= "<li class='$class'><a  href=\"$path_public $page.php\">$pa</a></li>";
        } elseif ($page == 'index_gallery6') {
            $output .= "";
        } elseif ($page == 'index_gallery9') {
            $output .= "";
        } elseif ($page == 'index_gallery12') {
            $output .= "";

        } else {
            $output .= "<li class='$class'><a  href=\"$path_public $page.php\">$pa</a></li>";
        }

    }


    return $output;


}

function gallery_button($no = 1)
{
    global $session;

    $output = "<div class=\"col-lg-2 col-md-2 col-md-offset-4\">
            <div class=\"text-center m-t-lg\">
        <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
<!--            <button type=\"button\" class=\"btn btn-default\">1</button>-->
<!--            <button type=\"button\" class=\"btn btn-default\">2</button>-->

            <div class=\"btn-group\" role=\"group\">
                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <b>Select Gallery</b>
                    <span class=\"caret\"></span>
                </button>
                <ul class=\"dropdown-menu\">";

    $output .= gallery_menu_list($no);

// if( $session->user_id===28 || User::is_kamy()) {$output.="<li><a href=\"index_gallery6.php\">Bralia</a></li>"; }

    $output .= " </ul>
            </div>
        </div>
            </div>
        </div>";

    return $output;


}

function admin_button()
{


    $output = "<div class=\"col-lg-2 col-md-2 col-md-offset-4\">
            <div class=\"text-center m-t-lg\">
        <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
<!--            <button type=\"button\" class=\"btn btn-default\">1</button>-->
<!--            <button type=\"button\" class=\"btn btn-default\">2</button>-->

            <div class=\"btn-group\" role=\"group\">
                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <b>Admin</b>
                    <span class=\"caret\"></span>
                </button>
                <ul class=\"dropdown-menu\">
                    <li><a href=\"index.php\"><b>Admin</b></a></li>";
    if (User::is_kamy()) {
        $output .= "<li><a href=\"expense_loan.php\">Loan and House</a></li>";
    }

    $output .= "                 <li><a href=\"minor.php\">Minor</a></li>
                    <li><a href=\"01_test.php\">test 01</a></li>

                </ul>
            </div>
        </div>
            </div>
        </div>";

    return $output;


}

function ibox($content = "Missing content", $col = 5, $h5 = "Header",
              array $options = ['tools' => true, 'collapse-link' => true, 'dropdown-toggle' => true, 'dropdown-menu' => false, 'close-link' => true, 'fullscreen-link' => true]
)
{

    if (!isset($options['tools'])) {
        $options['tools'] = true;
    }

    if (!isset($options['fullscreen-link'])) {
        $options['fullscreen-link'] = true;
    }

    if (!isset($options['collapse-link'])) {
        $options['collapse-link'] = true;
    }


//    if (!isset($options['dropdown-toggle'])) {
//        $options['dropdown-toggle'] = false;
//    }

    if (!isset($options['dropdown-menu'])) {
        $options['dropdown-menu'] = false;
    }


    if (!isset($options['close-link'])) {
        $options['close-link'] = true;
    }


    $tools = "";

    if (isset($options['tools']) && $options['tools'] == true) {

//    if ($options['collapse-link'] || $options['dropdown-toggle'] || $options['dropdown-menu'] || $options['close-link'] ){
        $tools = "<div class='ibox-tools'>";


        if ($options['collapse-link'] == true) {
            $tools .= "<a class='collapse-link'>
                         <i class='fa fa-chevron-up'></i>
                       </a>";
        }

        if ($options['fullscreen-link'] == true) {
            $tools .= "<a class='fullscreen-link'>
                          <i class='fa fa-expand'></i>
                       </a>";
        }


//        if ($options['dropdown-toggle']==true) {
//
//        }


        if ($options['dropdown-menu'] == true) {
            $tools .= "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                           <i class='fa fa-wrench'></i>
                       </a>";
            $tools .= "<ul class='dropdown-menu dropdown-user'>
                            <li><a href='#'>Config option 1</a></li>
                            <li><a href='#'>Config option 2</a></li>
                       </ul>";
        }


        if ($options['close-link'] == true) {
            $tools .= "<a class='close-link'>
                           <i class='fa fa-times'></i>
                       </a>";
        }

        $tools .= "                       </div>";
//    }
    }

    if ($col >= 12) {
        $class = "col-lg-12";
    } else {
        $class = "col-lg-{$col} col-lg-offset-2";
    }

    $output = "<div class='$class'>";

    $output .= "   <div class='ibox float-e-margins'>
                        <div class='ibox-title'>";
    if ($h5) {
        $output .= "  <h5>{$h5}</h5>";
    }
    $output .= $tools;
    $output .= "                    </div>
                        <div class='ibox-content'>
                            {$content}
                        </div>
                    </div>
                </div>
";

    return $output;
}

function button_color($color, $txt = "xxx", $href = false, $href_env = "", $others_a = "", $btn_length = "btn-lg",$href_brut=1)
{
    global $Nav;
    $bootstrap = ['primary', 'success', 'info', 'danger', 'warning'];

    if (in_array($color, $bootstrap)) {
        $class = "btn btn-{$color} {$btn_length} index-page";
        $style = "";
    } else {
        $class = "btn  {$btn_length}  index-page";
        $style = "background-color:{$color}; color:white;";
    }

    if ($href) {
        if ($href_env) {
            $new_href = $Nav->http . $Nav->folder . "/" . $href_env . "/" . $href;
        } else {
            $new_href = $Nav->http . $Nav->folder . "/" . $href;

        }
    } else {
        $new_href = "#";
    }

//    $others_a if wanting to attr in a like ''  onclick="return confirm('Delete Are you sure?')"

    if($href_brut==1){
//        $new_href=$new_href;

    }else {
//        keep $href argument no modification
        $new_href=$href;
    }

    return "<a {$others_a} href='{$new_href}'><button class='{$class}' style='{$style}' role='button' >{$txt}</button></a>";


}

function button_color_mobile($color, $txt = "xxx", $href = false, $href_env = "", $others_a = "", $btn_length = "btn-lg")
{
    global $Nav;
    $bootstrap = ['primary', 'success', 'info', 'danger', 'warning'];


    $class = "ui-btn ";
    $style = "background-color:{$color}; color:white;";


    if ($href) {
        if ($href_env) {
            $new_href = $Nav->http . $Nav->folder . "/" . $href_env . "/" . $href;
        } else {
            $new_href = $Nav->http . $Nav->folder . "/" . $href;

        }
    } else {
        $new_href = "#";
    }

//    $others_a if wanting to attr in a like ''  onclick="return confirm('Delete Are you sure?')"
    return "<a {$others_a} href='{$new_href}'><button class='{$class}' style='{$style}' role='button' >{$txt}</button></a>";


}

function yes_no($int, $lang = 'e')
{
    $integer = (int)$int;
    $output = "";

    if ($integer === 0 || $integer === 1) {
        if ($integer === 0 && $lang == 'e') {
            $output .= "No";
        } elseif ($integer === 0 && $lang == 'f') {
            $output .= "No";
        } elseif ($integer === 1 && $lang == 'e') {
            $output .= "Yes";
        } elseif ($integer === 1 && $lang == 'f') {
            $output .= "Oui";
        } else {
            die('Error function only accept 0 or 1 and e and f 2nd args');
        }

    }

    return $output;
}

function reverse_yes_no($int, $lang = 'e')
{
    $integer = (int)$int;

    $output = "";
    $var = yes_no($int, $lang);

    if ($var == "Yes") {
        $output = "No";
    } elseif ($var = "Oui") {
        $output = "Non";
    } elseif ($var = "No") {
        $output = "Yes";
    } elseif ($var = "Non") {
        $output = "Oui";
    }

    return $output;
}


# -*- coding: utf-8 -*-
// function remove_accents()

/**
 * Unaccent the input string string. An example string like `ÀØėÿᾜὨζὅБю`
 * will be translated to `AOeyIOzoBY`. More complete than :
 *   strtr( (string)$str,
 *          "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
 *          "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn" );
 *
 * @param $str input string
 * @param $utf8 if null, function will detect input string encoding
 * @return string input string without accent
 */
function remove_accents($str, $utf8 = true)
{
    $str = (string)$str;

//    echo $str;
//    return;

    if (is_null($utf8)) {
        if (!function_exists('mb_detect_encoding')) {
            $utf8 = (strtolower(mb_detect_encoding($str)) == 'utf-8');
        } else {
            $length = strlen($str);
            $utf8 = true;
            for ($i = 0; $i < $length; $i++) {
                $c = ord($str[$i]);
                if ($c < 0x80) $n = 0; # 0bbbbbbb
                elseif (($c & 0xE0) == 0xC0) $n = 1; # 110bbbbb
                elseif (($c & 0xF0) == 0xE0) $n = 2; # 1110bbbb
                elseif (($c & 0xF8) == 0xF0) $n = 3; # 11110bbb
                elseif (($c & 0xFC) == 0xF8) $n = 4; # 111110bb
                elseif (($c & 0xFE) == 0xFC) $n = 5; # 1111110b
                else return false; # Does not match any model
                for ($j = 0; $j < $n; $j++) { # n bytes matching 10bbbbbb follow ?
                    if ((++$i == $length)
                        || ((ord($str[$i]) & 0xC0) != 0x80)
                    ) {
                        $utf8 = false;
                        break;
                    }

                }
            }
        }

    }

    if (!$utf8)
        $str = utf8_encode($str);

    $transliteration = array(
        'Ĳ' => 'I', 'Ö' => 'O', 'Œ' => 'O', 'Ü' => 'U', 'ä' => 'a', 'æ' => 'a',
        'ĳ' => 'i', 'ö' => 'o', 'œ' => 'o', 'ü' => 'u', 'ß' => 's', 'ſ' => 's',
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
        'Æ' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Ç' => 'C', 'Ć' => 'C',
        'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D', 'È' => 'E',
        'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ę' => 'E', 'Ě' => 'E',
        'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G', 'Ġ' => 'G', 'Ģ' => 'G',
        'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I', 'İ' => 'I', 'Ĵ' => 'J',
        'Ķ' => 'K', 'Ľ' => 'K', 'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ł' => 'L',
        'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N', 'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O',
        'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O',
        'Ŏ' => 'O', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Ş' => 'S',
        'Ŝ' => 'S', 'Ș' => 'S', 'Š' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
        'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ū' => 'U', 'Ů' => 'U',
        'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U', 'Ŵ' => 'W', 'Ŷ' => 'Y',
        'Ÿ' => 'Y', 'Ý' => 'Y', 'Ź' => 'Z', 'Ż' => 'Z', 'Ž' => 'Z', 'à' => 'a',
        'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
        'å' => 'a', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
        'ď' => 'd', 'đ' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
        'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e', 'ƒ' => 'f',
        'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h', 'ħ' => 'h',
        'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i', 'ĩ' => 'i',
        'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĵ' => 'j', 'ķ' => 'k', 'ĸ' => 'k',
        'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l', 'ŀ' => 'l', 'ñ' => 'n',
        'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n', 'ŋ' => 'n', 'ò' => 'o',
        'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o',
        'ŏ' => 'o', 'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'ś' => 's', 'š' => 's',
        'ť' => 't', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ū' => 'u', 'ů' => 'u',
        'ű' => 'u', 'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ÿ' => 'y',
        'ý' => 'y', 'ŷ' => 'y', 'ż' => 'z', 'ź' => 'z', 'ž' => 'z', 'Α' => 'A',
        'Ά' => 'A', 'Ἀ' => 'A', 'Ἁ' => 'A', 'Ἂ' => 'A', 'Ἃ' => 'A', 'Ἄ' => 'A',
        'Ἅ' => 'A', 'Ἆ' => 'A', 'Ἇ' => 'A', 'ᾈ' => 'A', 'ᾉ' => 'A', 'ᾊ' => 'A',
        'ᾋ' => 'A', 'ᾌ' => 'A', 'ᾍ' => 'A', 'ᾎ' => 'A', 'ᾏ' => 'A', 'Ᾰ' => 'A',
        'Ᾱ' => 'A', 'Ὰ' => 'A', 'ᾼ' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D',
        'Ε' => 'E', 'Έ' => 'E', 'Ἐ' => 'E', 'Ἑ' => 'E', 'Ἒ' => 'E', 'Ἓ' => 'E',
        'Ἔ' => 'E', 'Ἕ' => 'E', 'Ὲ' => 'E', 'Ζ' => 'Z', 'Η' => 'I', 'Ή' => 'I',
        'Ἠ' => 'I', 'Ἡ' => 'I', 'Ἢ' => 'I', 'Ἣ' => 'I', 'Ἤ' => 'I', 'Ἥ' => 'I',
        'Ἦ' => 'I', 'Ἧ' => 'I', 'ᾘ' => 'I', 'ᾙ' => 'I', 'ᾚ' => 'I', 'ᾛ' => 'I',
        'ᾜ' => 'I', 'ᾝ' => 'I', 'ᾞ' => 'I', 'ᾟ' => 'I', 'Ὴ' => 'I', 'ῌ' => 'I',
        'Θ' => 'T', 'Ι' => 'I', 'Ί' => 'I', 'Ϊ' => 'I', 'Ἰ' => 'I', 'Ἱ' => 'I',
        'Ἲ' => 'I', 'Ἳ' => 'I', 'Ἴ' => 'I', 'Ἵ' => 'I', 'Ἶ' => 'I', 'Ἷ' => 'I',
        'Ῐ' => 'I', 'Ῑ' => 'I', 'Ὶ' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M',
        'Ν' => 'N', 'Ξ' => 'K', 'Ο' => 'O', 'Ό' => 'O', 'Ὀ' => 'O', 'Ὁ' => 'O',
        'Ὂ' => 'O', 'Ὃ' => 'O', 'Ὄ' => 'O', 'Ὅ' => 'O', 'Ὸ' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Ῥ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Ύ' => 'Y',
        'Ϋ' => 'Y', 'Ὑ' => 'Y', 'Ὓ' => 'Y', 'Ὕ' => 'Y', 'Ὗ' => 'Y', 'Ῠ' => 'Y',
        'Ῡ' => 'Y', 'Ὺ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'P', 'Ω' => 'O',
        'Ώ' => 'O', 'Ὠ' => 'O', 'Ὡ' => 'O', 'Ὢ' => 'O', 'Ὣ' => 'O', 'Ὤ' => 'O',
        'Ὥ' => 'O', 'Ὦ' => 'O', 'Ὧ' => 'O', 'ᾨ' => 'O', 'ᾩ' => 'O', 'ᾪ' => 'O',
        'ᾫ' => 'O', 'ᾬ' => 'O', 'ᾭ' => 'O', 'ᾮ' => 'O', 'ᾯ' => 'O', 'Ὼ' => 'O',
        'ῼ' => 'O', 'α' => 'a', 'ά' => 'a', 'ἀ' => 'a', 'ἁ' => 'a', 'ἂ' => 'a',
        'ἃ' => 'a', 'ἄ' => 'a', 'ἅ' => 'a', 'ἆ' => 'a', 'ἇ' => 'a', 'ᾀ' => 'a',
        'ᾁ' => 'a', 'ᾂ' => 'a', 'ᾃ' => 'a', 'ᾄ' => 'a', 'ᾅ' => 'a', 'ᾆ' => 'a',
        'ᾇ' => 'a', 'ὰ' => 'a', 'ᾰ' => 'a', 'ᾱ' => 'a', 'ᾲ' => 'a', 'ᾳ' => 'a',
        'ᾴ' => 'a', 'ᾶ' => 'a', 'ᾷ' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd',
        'ε' => 'e', 'έ' => 'e', 'ἐ' => 'e', 'ἑ' => 'e', 'ἒ' => 'e', 'ἓ' => 'e',
        'ἔ' => 'e', 'ἕ' => 'e', 'ὲ' => 'e', 'ζ' => 'z', 'η' => 'i', 'ή' => 'i',
        'ἠ' => 'i', 'ἡ' => 'i', 'ἢ' => 'i', 'ἣ' => 'i', 'ἤ' => 'i', 'ἥ' => 'i',
        'ἦ' => 'i', 'ἧ' => 'i', 'ᾐ' => 'i', 'ᾑ' => 'i', 'ᾒ' => 'i', 'ᾓ' => 'i',
        'ᾔ' => 'i', 'ᾕ' => 'i', 'ᾖ' => 'i', 'ᾗ' => 'i', 'ὴ' => 'i', 'ῂ' => 'i',
        'ῃ' => 'i', 'ῄ' => 'i', 'ῆ' => 'i', 'ῇ' => 'i', 'θ' => 't', 'ι' => 'i',
        'ί' => 'i', 'ϊ' => 'i', 'ΐ' => 'i', 'ἰ' => 'i', 'ἱ' => 'i', 'ἲ' => 'i',
        'ἳ' => 'i', 'ἴ' => 'i', 'ἵ' => 'i', 'ἶ' => 'i', 'ἷ' => 'i', 'ὶ' => 'i',
        'ῐ' => 'i', 'ῑ' => 'i', 'ῒ' => 'i', 'ῖ' => 'i', 'ῗ' => 'i', 'κ' => 'k',
        'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => 'k', 'ο' => 'o', 'ό' => 'o',
        'ὀ' => 'o', 'ὁ' => 'o', 'ὂ' => 'o', 'ὃ' => 'o', 'ὄ' => 'o', 'ὅ' => 'o',
        'ὸ' => 'o', 'π' => 'p', 'ρ' => 'r', 'ῤ' => 'r', 'ῥ' => 'r', 'σ' => 's',
        'ς' => 's', 'τ' => 't', 'υ' => 'y', 'ύ' => 'y', 'ϋ' => 'y', 'ΰ' => 'y',
        'ὐ' => 'y', 'ὑ' => 'y', 'ὒ' => 'y', 'ὓ' => 'y', 'ὔ' => 'y', 'ὕ' => 'y',
        'ὖ' => 'y', 'ὗ' => 'y', 'ὺ' => 'y', 'ῠ' => 'y', 'ῡ' => 'y', 'ῢ' => 'y',
        'ῦ' => 'y', 'ῧ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'p', 'ω' => 'o',
        'ώ' => 'o', 'ὠ' => 'o', 'ὡ' => 'o', 'ὢ' => 'o', 'ὣ' => 'o', 'ὤ' => 'o',
        'ὥ' => 'o', 'ὦ' => 'o', 'ὧ' => 'o', 'ᾠ' => 'o', 'ᾡ' => 'o', 'ᾢ' => 'o',
        'ᾣ' => 'o', 'ᾤ' => 'o', 'ᾥ' => 'o', 'ᾦ' => 'o', 'ᾧ' => 'o', 'ὼ' => 'o',
        'ῲ' => 'o', 'ῳ' => 'o', 'ῴ' => 'o', 'ῶ' => 'o', 'ῷ' => 'o', 'А' => 'A',
        'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E',
        'Ж' => 'Z', 'З' => 'Z', 'И' => 'I', 'Й' => 'I', 'К' => 'K', 'Л' => 'L',
        'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S',
        'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'K', 'Ц' => 'T', 'Ч' => 'C',
        'Ш' => 'S', 'Щ' => 'S', 'Ы' => 'Y', 'Э' => 'E', 'Ю' => 'Y', 'Я' => 'Y',
        'а' => 'A', 'б' => 'B', 'в' => 'V', 'г' => 'G', 'д' => 'D', 'е' => 'E',
        'ё' => 'E', 'ж' => 'Z', 'з' => 'Z', 'и' => 'I', 'й' => 'I', 'к' => 'K',
        'л' => 'L', 'м' => 'M', 'н' => 'N', 'о' => 'O', 'п' => 'P', 'р' => 'R',
        'с' => 'S', 'т' => 'T', 'у' => 'U', 'ф' => 'F', 'х' => 'K', 'ц' => 'T',
        'ч' => 'C', 'ш' => 'S', 'щ' => 'S', 'ы' => 'Y', 'э' => 'E', 'ю' => 'Y',
        'я' => 'Y', 'ð' => 'd', 'Ð' => 'D', 'þ' => 't', 'Þ' => 'T', 'ა' => 'a',
        'ბ' => 'b', 'გ' => 'g', 'დ' => 'd', 'ე' => 'e', 'ვ' => 'v', 'ზ' => 'z',
        'თ' => 't', 'ი' => 'i', 'კ' => 'k', 'ლ' => 'l', 'მ' => 'm', 'ნ' => 'n',
        'ო' => 'o', 'პ' => 'p', 'ჟ' => 'z', 'რ' => 'r', 'ს' => 's', 'ტ' => 't',
        'უ' => 'u', 'ფ' => 'p', 'ქ' => 'k', 'ღ' => 'g', 'ყ' => 'q', 'შ' => 's',
        'ჩ' => 'c', 'ც' => 't', 'ძ' => 'd', 'წ' => 't', 'ჭ' => 'c', 'ხ' => 'k',
        'ჯ' => 'j', 'ჰ' => 'h'
    );
    $str = str_replace(array_keys($transliteration),
        array_values($transliteration),
        $str);
    return $str;
}

//- remove_accents()

function ebook($link = "", $text = "", $id = 0, $source = "")
{
    $output = "";
    $output .= $link;
    $output .= "<a class='btn btn-default' role='button' data-toggle='collapse' href='#collapseExample" . $id . "' aria-expanded='false' aria-controls='collapseExample" . $id . "'>";
    $output .= " ?</a>";
    $output .= "<div class=\"collapse\" id=\"collapseExample" . $id . "\">
            <div class=\"well\">
             $source
             $text
            </div>

        </div>";

    return $output;
}

function get_ebooks($img_folder = "")
{

    global $Nav;
    $default_path = $Nav->folder;
//    $default_path = "";
    $dir = SITE_ROOT . DS . $default_path . DS . "/img/" . $img_folder;
    $picture_array = array();
//    $output="";
    if (is_dir($dir)) {
        $dir_array = scandir($dir);
        foreach ($dir_array as $file) {
            if (stripos($file, '.') > 0) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $file_no_ext = str_replace("." . $ext, "", $file);


                $alt = trim(substr($file_no_ext, 3, 100));
                $alt = str_replace("_", " ", $alt);
                $alt = ucfirst($alt);


                if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG' || 'pdf') {

                    $img_html = "<img alt=\"{$file_no_ext}\" class=\"img-responsive\" src='/public/img/$img_folder/{$file}' style='width: 30em;height: 20em' >";

                    $img_src = "<img src='/public/img/$img_folder/{$file}' alt='{$alt}' class='img-responsive pull-left'> ";
                    $full_path = "/public/img/$img_folder/{$file}";
                    $output = array(
                        "img_tag" => $img_html,
                        'img_file' => $file,
                        "img_name" => $file_no_ext,
                        "img_ext" => $ext,
                        "img_folder" => $Nav->folder,
                        "img_path" => $dir,
                        "img_src" => $img_src,
                        "img_alt" => $alt,
                        "full_path" => $full_path,
                        "href" => "<a target='_blank' href='$full_path'>$file_no_ext</a>"
                    );


                    array_push($picture_array, $output);


                }
            }
        }
    }
    return $picture_array;


}

include SITE_ROOT . DS . 'vendor/mistic100/randomcolor/src/RandomColor.php';

use \Colors\RandomColor;

function article_by_sql($article_where_subject = 1, $color_palette = 12, $is_row = true)
{


    $articles = Article::find_by_sql("SELECT * FROM article WHERE subject_id='{$article_where_subject}' order by id DESC");
    $output = "";
    $output .= "<div class='row'>";
    foreach ($articles as $article) {


        $i = $color_palette; // $my_num[0]; using by default 12 light color but could use 12 other optioms in shuffle

        switch ($i) {
            case 0:
                $my_color = RandomColor::many(36);
                break;
            case 1:
                $my_color = RandomColor::many(18, array('hue' => 'red'));
                break;
            case 2:
                $my_color = RandomColor::many(18, array('hue' => 'orange'));
                break;
            case 3:
                $my_color = RandomColor::many(18, array('hue' => 'yellow'));
                break;
            case 4:
                $my_color = RandomColor::many(18, array('hue' => 'green'));
                break;
            case 5:
                $my_color = RandomColor::many(18, array('hue' => 'blue'));
                break;
            case 6:
                $my_color = RandomColor::many(18, array('hue' => 'purple'));
                break;
            case 7:
                $my_color = RandomColor::many(18, array('hue' => 'pink'));
                break;
            case 8:
                $my_color = RandomColor::many(18, array('hue' => 'monochrome'));
                break;
            case 9:
                $my_color = RandomColor::many(27, array('hue' => array('blue', 'yellow')));
                break;
            case 10:
                $my_color = RandomColor::many(27, array('luminosity' => 'dark'));
                break;
            case 11:
                $my_color = RandomColor::many(36, array('luminosity' => 'random', 'hue' => 'random'));
                break;
            case 12:
                $my_color = RandomColor::many(27, array('luminosity' => 'light'));
                break;

            default:
                $my_color = RandomColor::many(27, array('luminosity' => 'light'));

        }
        $output .= "<article>";

        $output .= "<div class='col-lg-9 col-lg-offset-2' style='background-color:{$my_color[0]}  ;margin-top: 2em;padding: 2em ;' >";

//        $nexts = Article::find_by_sql("SELECT * FROM article WHERE id !={$article->id} AND subject_id='{$article_where_subject}' order by id DESC LIMIT 1 ");
//
//        foreach ($nexts as $next) { $output .= "check nextid = " . $next->id.". {$article->id} <br>"; }


        if (User::is_admin()) {
            $output .= "<div class='text-right'>";
            $output .= "<a  class='btn btn-default' href='/public/admin/crud/ajax/manage_ajax.php?class_name=Article'><i><span class='glyphicon glyphicon-th-large'></span></i></a>";
            $output .= "&nbsp;&nbsp;<a class='btn btn-info'  href='/public/admin/crud/ajax/new_ajax.php?class_name=Article'><i><span class='glyphicon glyphicon-plus'></span></i></a>";
            $output .= "&nbsp;&nbsp;<a class='btn btn-primary'  href='/public/admin/crud/ajax/edit_ajax.php?class_name=Article&id={$article->id}'><i><span class='glyphicon glyphicon-pencil'></span></i></a>";
            $output .= "&nbsp;&nbsp;<a class='btn btn-danger'  class='btn btn-danger' href='/public/admin/crud/ajax/delete_ajax.php?class_name=Article&id={$article->id}'  onclick=\"return confirm('Are you sure to delete?')\"><i><span class='glyphicon glyphicon-remove'></span></i></a>";
            $output .= "</div>";
        }
//        $output .= "</div>";

        $output .= "<div class='col-lg-9 col-lg-offset-2' style='background-color: {$my_color[0]};margin-top: 2em;padding: 2em'>";
        if (!empty($article->link)) {
            $output .= "<h4  style='background-color:white}'><a target='_blank'  href='{$article->link}'>{$article->link_txt}</a></h4>";
        }
        if (trim($article->article !== "a")) {
            $output .= $article->article;
            $output .= "</div>";
        }

        $output .= "</article>";

    }
    $output .= "</div>";

    return $output;
}


function article_subject()
{
    $output = "";
    $subjects = ArticleSubject::find_all();
    $path = $_SERVER['PHP_SELF'];


    $output .= "<div class='col-lg-3'>";

    $output .= "<form name='form_ArticleSubject' id='form_ArticleSubject' action='{$path}' class='form-inline' method='GET'>";

    $lnk = "<a href='/public/admin/crud/ajax/manage_ajax.php?class_name=Article' >Articles</a>";
    $output .= "<label for='ArticleSubjectLabel'>$lnk &nbsp;</label>";

    $output .= "<select name='ArticleSubject' id='ArticleSubjectLabel' >";

    foreach ($subjects as $subject) {
        ($_GET ["ArticleSubject"] == $subject->id) ? $selected = "selected" : $selected = "";
        $output .= " <option value='{$subject->id}' $selected >{$subject->subject}</option>";
    }

    $output .= "</select>
               <input name='submitArticleSubject' type='submit'>
               </form>";
    $output .= "</div>";


    return $output;

}


function book_category()
{
    $output = "";
    $category = BookCategory::find_all();
    $path = $_SERVER['PHP_SELF'];

    $output .= "<div class='col-lg-3  col-lg-offset-2'>";

    $output .= "<form name='form_BookCategory' id='form_BookCategory' action='{$path}' class='form-inline'  method='GET'>";

    $lnk = "<a href='/public/admin/crud/ajax/manage_ajax.php?class_name=Book' >Books</a>";

    $output .= "<label for='BookCategoryLabel'>$lnk &nbsp;</label>";

    $output .= "<select name='BookCategory' id='BookCategoryLabel' >";

    foreach ($category as $categ) {
        ($_GET ["ArticleSubject"] == $categ->id) ? $selected = "selected" : $selected = "";
        $output .= " <option value='{$categ->id}' $selected >{$categ->category}</option>";
    }

    $output .= "</select>
                <input name='submitBookCategory' type='submit'>
                </form>";
    $output .= "</div>";

    return $output;

}

function book_category2()
{
    $output = "";
    $category = BookCategory::find_all();

    $x = pathinfo($_SERVER["PHP_SELF"]);
    $path_base = $x['basename'];

    $output .= "<div class='col-lg-8  col-lg-offset-2 text-center'>";


    foreach ($category as $categ) {

        $path = "$path_base?BookCategory={$categ->id}&submitBookCategory=Submit";
        $output .= "<span ><a style='text-decoration:white' href='{$path}'>{$categ->category}</a></span>&nbsp;&nbsp;&nbsp;&nbsp;";

    }


    $output .= "</div>";

    return $output;

}


function book_by_sql($book_where_category = 1, $color_palette = 12, $is_row = true)
{
    $output = "";

    $books = Book::find_by_sql("SELECT * FROM book WHERE category_id='{$book_where_category}' order by id DESC");


//    $output .= "<h2 id='top'>Top of page!</h2>";
    $output .= "";


    $output .= "<br><h1 id='top' class='text-center'>" . "Books" . "</h1>";


    $output .= "<div class='row'>";

    $output .= book_category2();
    $output .= "</div>";


    $output .= "<div class='row'>";
    $output .= "<div class='col-lg-9 col-lg-offset-2' style='background-color:snow  ;margin-top: 2em;padding: 2em ;border-style: solid;' >";
    $output .= "<h2 class='text-center'>Menu</h2>";
    $output .= "<ul>";
    foreach ($books as $book) {
        $output .= "<li>";
        $output .= "<a href='#book{$book->id}'>$book->h2</a>";
        $output .= "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
    $output .= "</div>";


    $output .= "<div class='row'>";


//    $ids=[];
//    foreach ($books as $book) {
//        array_push($ids, $book->id);
//    }
//
//    $j=-1;
//    $count_ids=count($ids);


    foreach ($books as $book) {


        $output .= "";

        $i = $color_palette; // $my_num[0]; using by default 12 light color but could use 12 other optioms in shuffle
        $my_color = RandomColor::many(27, array('luminosity' => 'light'));
        switch ($i) {
            case 0:
                $my_color = RandomColor::many(36);
                break;
            case 1:
                $my_color = RandomColor::many(18, array('hue' => 'red'));
                break;
            case 2:
                $my_color = RandomColor::many(18, array('hue' => 'orange'));
                break;
            case 3:
                $my_color = RandomColor::many(18, array('hue' => 'yellow'));
                break;
            case 4:
                $my_color = RandomColor::many(18, array('hue' => 'green'));
                break;
            case 5:
                $my_color = RandomColor::many(18, array('hue' => 'blue'));
                break;
            case 6:
                $my_color = RandomColor::many(18, array('hue' => 'purple'));
                break;
            case 7:
                $my_color = RandomColor::many(18, array('hue' => 'pink'));
                break;
            case 8:
                $my_color = RandomColor::many(18, array('hue' => 'monochrome'));
                break;
            case 9:
                $my_color = RandomColor::many(27, array('hue' => array('blue', 'yellow')));
                break;
            case 10:
                $my_color = RandomColor::many(27, array('luminosity' => 'dark'));
                break;
            case 11:
                $my_color = RandomColor::many(36, array('luminosity' => 'random', 'hue' => 'random'));
                break;
            case 12:
                $my_color = RandomColor::many(27, array('luminosity' => 'light'));
                break;

            default:
                $my_color = RandomColor::many(27, array('luminosity' => 'light'));

        }

//        $output .= "<div class='col-lg-9 col-lg-offset-2' style='background-color: {$my_color[0]};margin-top: 2em;padding: 2em'>";
        $output .= "<span id='book{$book->id}'></span>";
        $output .= "<div class='col-lg-9 col-lg-offset-2' style='background-color:#D6EAF8  ;margin-top: 2em;padding: 2em ;border-style: solid;' >";


        if (User::is_admin()) {
            $output .= "<div class='text-right'>";
            $output .= "";
            $output .= "<a  class='btn btn-default'  href='/public/admin/crud/ajax/manage_ajax.php?class_name=Book'><i><span class='glyphicon glyphicon-th-large'></span></i></a>";
            $output .= "&nbsp;&nbsp;<a class='btn btn-info btn-sm'  href='/public/admin/crud/ajax/new_ajax.php?class_name=Book'><i><span class='glyphicon glyphicon-plus'></span></i></a>";
            $output .= "&nbsp;&nbsp;<a class='btn btn-primary'  href='/public/admin/crud/ajax/edit_ajax.php?class_name=Book&id={$book->id}'><i><span class='glyphicon glyphicon-pencil'></span></i></a>";
            $output .= "&nbsp;&nbsp;<a class='btn btn-danger'  class='btn btn-danger' href='/public/admin/crud/ajax/delete_ajax.php?class_name=Book&id={$book->id}'  onclick=\"return confirm('Are you sure to delete?')\"><i><span class='glyphicon glyphicon-remove'></span></i></a>";

            $output .= "";
            $output .= "</div>";

        }

        $output .= "<article>";

//        $j++;
//
//        $next=$ids[$j+1];
//        $prev=$ids[$j-1];


//        $output .="bookid:{$book->id} /" . "item: ".$j ." / arr: " .$ids[$j];


        if (!empty($book->h2)) {
            $output .= "<h2>$book->h2</h2>";
            $output .= "<a href='#top'>Go to top</a>&nbsp;&nbsp;";

//            if($j !== 0){$output.="<a href='#previous{$prev}'>previous</a>&nbsp;&nbsp;";}
//            if ($ids[$count_ids -1] == $j){$output.="<a href='#next{$next}'>next</a>";            }
//            $output .= "&nbsp;&nbsp;<span class='' id='previous{$book->id}'>previous{$book->id}</span>";
//            $output .= "&nbsp;&nbsp;<span class='' id='next{$book->id}'>next{$book->id}</span>";
//            $output .= "  countId: $count_ids idscount: ".$ids[$count_ids -1];


        }


        if (!empty($book->h3)) {
            $output .= "<h3>$book->h3</h3>";
        }

        if (!empty($book->author)) {
            $output .= "<p>$book->author</p>";
        }

        $output .= "<p>";

        if (!empty($book->pdf_name)) {
            $output .= "<a  class='btn btn-primary' target='_blank' href='/public/img/books/$book->pdf_name'>pdf</a>&nbsp;&nbsp;";
        }


        if (!empty($book->download_source_link)) {
            $output .= "<a class='btn btn-info' target='_blank' href='$book->download_source_link'>Source link</a>&nbsp;&nbsp;";
        }


        if (!empty($book->apress_link)) {
            $output .= "<a class='btn btn-default' href='$book->apress_link' >apress_link</a>";
        }

        $output .= "</p>";


//         if(!empty($book->about_book)){
//            $output .= "<p>$book->about_book</p>";}


        if (!empty($book->photo)) {
            $output .= "<p><img src='$book->about_author'>photo</i></p>";
        }

        $output .= "<div class='tabbable'> <!-- Only required for left/right tabs -->
        <ul class='nav nav-tabs'>
            <li class='active'><a href='#tab1' data-toggle='tab'>About Book</a></li>
            <li><a href='#tab2' data-toggle='tab'>About Author</a></li>
        </ul>
        <div class='tab-content'>
            <div class='tab-pane active' id='tab1'>
                <p>{$book->about_book}</p>
            </div>
            <div class='tab-pane' id='tab2'>
                 <p>{$book->about_author}</p>
            </div>
        </div>
    </div>";

        $output .= "</article>";

        $output .= "</div>";


    }

    $output .= "</div>";

    return $output;
}

    function NumberFormatColor($number=0){
    $output="";
    $style="";

     if( ((float) $number) < 0){$style="style='color:red'";} else {$style="";}

        return $style;
    }

function TD_NumberFormatColor($number=0,$strong=false){
    $output="";
    $style="";
    $sum = number_format($number, 2);

    if( ((float) $number) < 0){$style="style='color:red'";} else {$style="";}
    if($strong){
        $output = "<td class='text-right' $style ><strong>" . $sum . "</strong></td>";

    } else {
        $output = "<td class='text-right' $style >" . $sum . "</td>";

    }
    return $output;
}

?>



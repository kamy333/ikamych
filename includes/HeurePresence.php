<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 9/20/2015
 * Time: 11:16 PM
 */
class HeurePresence extends DatabaseObject
{


    public static $fields_numeric = array('id', 'user_id', 'person_id',);
    public static $get_form_element = array('id', 'person_id', 'date_presence', 'date_presence_fin', 'heure_debut', 'heure_fin', 'user_id', 'input_date', 'modification_time', "commentaire");
    public static $form_default_value = array(
        "user_id" => "2",
        "date_presence" => "now()",
        "date_presence_fin" => "now()",
        "person_id" => "6",
        "heure_debut" => "timeNoSecond()",
        "heure_fin" => "timeNoSecond()",
    );
    public static $db_field_search = array('search_all', 'id', 'person_id', 'date_presence', 'datetime_presence', 'datetime_presence_fin', 'heure_debut', 'heure_fin', 'user_id', 'username', 'input_date', 'modification_time', "commentaire", 'download_csv');
    public static $page_name = "Presence";
    public static $page_manage = "manage_heure_presence.php";

//    protected static $db_field_include_table_display_sort=array(
//        'link'=>'web_address','prog'=>'progress','todos'=>'todo','due_on'=>'due_date');
    public static $page_new = "new_heure_presence.php";
    public static $page_edit = "edit_heure_presence.php";
    public static $page_delete = "delete_heure_presence.php";
    public static $pagination_per_page = 100;
    public static $per_page;
    protected static $table_name = "heure_presence";
    protected static $db_fields = array('id', 'person_id',
        'date_presence', 'datetime_presence', 'heure_debut', 'datetime_presence_fin', 'date_presence_fin', 'heure_fin', 'nbre_horaire', 'hr', 'mn', 'user_id', 'username', "commentaire", 'input_date', 'modification_time');
    protected static $required_fields = array('person_id', 'date_presence', 'date_presence_fin', 'heure_debut', 'heure_fin',);
    protected static $db_fields_table_display_short = array('id', 'person_name', 'date_', 'heure_debut', 'heure_fin', 'nbre_horaire', 'hr', 'mn', "commentaire",);
    protected static $db_fields_table_display_full = array('id', 'person_id', 'date_', 'date_to', 'person_name', 'date_presence', 'date_presence_fin', 'datetime_presence', 'datetime_presence_fin', 'heure_debut', 'heure_fin', 'heure', 'hr', 'mn', 'nbre_horaire', 'user_id', 'username', "commentaire", 'input_date', 'modification_time',);
    protected static $db_field_exclude_table_display_sort = array('', '', '', '', '', '', '');
    protected static $db_field_include_table_display_sort = array(
        'person_name' => 'person_id', 'date_' => 'date_presence', 'date_to' => 'date_presence_fin', 'heure' => 'nbre_horaire');
    protected static $form_properties = array(
        "person_id" => array("type" => "selectchosen",
            "name" => 'person_id',
            "class" => "MyExpensePerson",
            "label_text" => "Person",
            "select_option_text" => 'Person',
            'field_option_0' => "id",
            'field_option_1' => "person_name",
            "required" => true,
        ),
        "date_presence" => array("type" => "date",
            "name" => 'date_presence',
            "label_text" => "Date Presence",
            "placeholder" => "Date Presence",
//            "script"=>"    <script>
//        $('#date_presence').datepicker({
//            todayBtn: \"linked\",
//            keyboardNavigation: false,
//            forceParse: false,
//            calendarWeeks: true,
//            autoclose: true,
//            format: \"yyyy-mm-dd\"
//        });
//    </script>
//                    ",

            "attr_class" => "form-control input-group date",
            "required" => true,
        ),
        "date_presence_fin" => array("type" => "date",
            "name" => 'date_presence_fin',
            "label_text" => "Date to",
            "placeholder" => "Date to",
//            "script"=>"    <script>
//        $('#date_presence').datepicker({
//            todayBtn: \"linked\",
//            keyboardNavigation: false,
//            forceParse: false,
//            calendarWeeks: true,
//            autoclose: true,
//            format: \"yyyy-mm-dd\"
//        });
//    </script>
//                    ",

            "attr_class" => "form-control input-group date",
            "required" => true,
        ),
        "heure_debut" => array("type" => "clockwise",
            "name" => 'heure_debut',
            "label_text" => "heure_debut",
            "placeholder" => "heure_debut",
            "script" => "
<script type=\"text/javascript\">
$('.clockpicker').clockpicker({    placement:'top',    align: 'bottom',    donetext: 'Done'});
</script>
",
            "required" => true,
        ),
        "heure_fin" => array("type" => "clockwise",
            "name" => 'heure_fin',
            "label_text" => "heure_fin",
            "placeholder" => "heure_fin",
            "required" => true,
        ),
        "user_id" => array("type" => "selectchosen",
            "name" => 'user_id',
            "class" => "User",
            "label_text" => "User",
            'field_option_0' => "id",
            'field_option_1' => "username",
            "required" => true,
        ),
        "commentaire" => array("type" => "textarea",
            "name" => 'commentaire',
            "label_text" => "Comment",
            "placeholder" => "input Comment",
            "required" => false,
        ),
    );
    protected static $form_properties_search = array(
        "search_all" => array("type" => "text",
            "name" => 'search_all',
            "label_text" => "",
            "placeholder" => "Search all",
            "required" => false,
        ),
        "download_csv" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "non",
                    "value" => "No",
                    "id" => "visible_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "oui",
                    "value" => "Yes",
                    "id" => "visible_yes",
                    "default" => true)),
        ),
        "id" => array("type" => "number",
            "name" => 'id',
            "id" => "search_id",
            "label_text" => "",
            'min' => 0,
            "placeholder" => "ID",
            "required" => false,
        ),
        "project_code" => array("type" => "select",
            "name" => 'project_code',
            "id" => "search_project_code",
            "class" => "InvoiceActual",
            "label_text" => "",
            "select_option_text" => 'Project Code',
            'field_option_0' => "project_code",
            'field_option_1' => "project_code",
            "required" => false,
        ),
        "date_presence" => array("type" => "select",
            "name" => 'date_presence',
            "id" => "search_date_presence",
            "class" => "HeurePresence",
            "label_text" => "",
            "select_option_text" => 'date_presence',
            'field_option_0' => "date_presence",
            'field_option_1' => "date_presence",
            "required" => false,
        ),
        "heure_debut" => array("type" => "clockwise",
            "name" => 'heure_debut',
            "id" => "search_heure_debut",
            "class" => "HeurePresence",
            "label_text" => "",
            "select_option_text" => 'heure_debut',
            'field_option_0' => "heure_debut",
            'field_option_1' => "heure_debut",
            "required" => false,
        ),

        "nbre_horaire" => array("type" => "select",
            "name" => 'nbre_horaire',
            "id" => "search_nbre_horaire",
            "class" => "HeurePresence",
            "label_text" => "",
            "select_option_text" => 'nbre_horaire',
            'field_option_0' => "nbre_horaire",
            'field_option_1' => "nbre_horaire",
            "required" => false,
        ),


    );
    public $id;
    public $person_id;
    public $date_presence;
    public $date_presence_fin;

    public $datetime_presence;
    public $datetime_presence_fin;

    public $heure_debut;
    public $heure_fin;
    public $nbre_horaire;
    public $user_id;
    public $username;
    public $commentaire;
    public $input_date;
    public $modification_time;

    public $person_name;
    public $date_;
    public $date_to;
    public $heure;

    public $Year;
    public $Month;
    public $MonthName;
    public $Week;
    public $totalHours;
    public $totalMin;
    public $totalMinHour;
    public $sumHours;
    public $reminder;

    public $Debut;
    public $Fin;
    public $Horaire;

    public $Date;


    public $hr;
    public $mn;


    public static function table_nav_additional()
    {
        global $Nav;
//        https://www.ikamy.ch/Inspinia/profile.php'
//        https://www.ikamy.ch/Inspinia/profile.php
        $output = "&nbsp;&nbsp;";
        $href = $Nav->http . "Inspinia/profile.php";
        $done_txt = "Inspinia Profile";
        $output .= "<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";

        $href = $Nav->http . "public/admin/profile.php";
        $done_txt = "Profile";
        $output .= "<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";

        $href = $Nav->http . "public/admin/manage_ajax.php?class_name=Note";
        $done_txt = "Note";
        $output .= "<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";

        $href = $Nav->http . "public/admin/manage_ajax.php?class_name=HeurePresence&action=quickaddhours";
        $done_txt = "Add quick";
        $output .= "<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";
        $href = $Nav->http . "public/admin/manage_ajax.php?class_name=HeurePresence&action=quickaddhours&add_minute=10";
        $done_txt = "10mn";
        $output .= "<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";

        return $output;
    }

    public static function quickaddhours()
    {
        $add_hour = 0;
        $add_minute = 0;

        $output = "";
        $me = new self();
        $min = "";
        $hour = "";


        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] === 'HeurePresence' && $_GET['action'] == 'quickaddhours') {


            if (isset($_GET['add_hour']) || isset($_GET['add_minute'])) {
                if (isset($_GET['add_hour'])) {
                    $add_hour = (int)$_GET['add_hour'];
                }
                if (isset($_GET['add_minute'])) {
                    $add_minute = (int)$_GET['add_minute'];
                }
                if (is_numeric($add_minute) && is_numeric($add_hour)) {

                    if ($add_hour > 0) {
                        $hour = $add_hour . " hours";
                    }
                    if ($add_minute > 0) {
                        $min = $add_minute . " minutes";
                    }


                    $date = date_create(now_sql() . " " . now_time());
                    $me->date_presence = now_sql();
                    $me->datetime_presence = $date;
                    $me->heure_debut = now_time();

                    date_add($date, date_interval_create_from_date_string($hour . " " . $min));
                    $me->datetime_presence_fin = date_format($date, "Y-m-d H:i:s");
//            echo "<br>". date_format($date,"Y-m-d H:i:s");

                    $me->heure_fin = date_format($date, "H:i:s");

                }
            }

            if ($add_hour > 0) {
                $hour = $add_hour . " hours";
            }

            if (isset($_GET['commentaire'])) {
                $me->commentaire = $_GET['commentaire'];
            } else {
                $me->commentaire = "Quick Add!";

            }
//            $me->date_presence_fin=$me->date_presence;
            $me->save();
            unset($_GET);
        }
        global $Nav;
//        redirect_to($Nav->http."public/admin/profile.php");
//        redirect_to($Nav->http."Inspinia/profile.php");
//        redirect_to($_SERVER['HTTP_REFERER']);
//        echo $_SERVER['HTTP_REFERER'];

//        if(isset($_GET['return_to'])){
//            redirect_to($Nav->http2.$_GET['return_to']);
//        }


    }

    public static function quicksubstracthours()
    {
        $add_hour = 0;
        $add_minute = 0;

        $output = "";
        $me = new self();
        $min = "";
        $hour = "";


        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] === 'HeurePresence' && $_GET['action'] == 'quicksubstracthours') {

            if (isset($_GET['add_hour']) || isset($_GET['add_minute'])) {
                if (isset($_GET['add_hour'])) {
                    $add_hour = (int)$_GET['add_hour'];
                }
                if (isset($_GET['add_minute'])) {
                    $add_minute = (int)$_GET['add_minute'];
                }
                if (is_numeric($add_minute) && is_numeric($add_hour)) {

                    if ($add_hour > 0) {
                        $hour = $add_hour . " hours";
                    }
                    if ($add_minute > 0) {
                        $min = $add_minute . " minutes";
                    }


                    $date = date_create(now_sql() . " " . now_time());
                    $me->datetime_presence_fin = $date;
                    $me->date_presence_fin = now_sql();
                    $me->heure_debut_fin = now_time();

//                    date_add($date,date_interval_create_from_date_string($hour." ".$min));
                    date_sub($date, date_interval_create_from_date_string($hour . " " . $min));

                    $me->datetime_presence = $date;
                    $me->date_presence = date_format($date, "Y-m-d");

//            echo "<br>". date_format($date,"Y-m-d H:i:s");

                    $me->heure_debut = date_format($date, "H:i:s");

                }
            }

            if ($add_hour > 0) {
                $hour = $add_hour . " hours";
            }

            if (isset($_GET['commentaire'])) {
                $me->commentaire = $_GET['commentaire'];
            } else {
                $me->commentaire = "Quick Add!";

            }
//            $me->date_presence_fin=$me->date_presence;
            $me->save();
            unset($_GET);
        }
        global $Nav;
//        redirect_to($Nav->http."public/admin/profile.php");
//        redirect_to($Nav->http."Inspinia/profile.php");
//        redirect_to($_SERVER['HTTP_REFERER']);
//        echo $_SERVER['HTTP_REFERER'];

//        if(isset($_GET['return_to'])){
//            redirect_to($Nav->http2.$_GET['return_to']);
//        }


    }

    public static function ByMonth()
    {
        $sql = "SELECT DISTINCT year(date_presence) AS Year ,month(date_presence) AS Month,
                monthname(date_presence) AS MonthName,
sum(hr)                                  AS totalHours,
sum(mn)                                  AS totalMin,
sum(mn)/60                               AS totalMinHour,
((sum(hr)+(sum(mn)/60)))                 AS sumHours,
((sum(hr)+(sum(mn)/60)))                                          AS reminder
                FROM  heure_presence GROUP BY Year,Month ORDER BY date_presence DESC";
        $fields = static::add_total_field(['Year', 'Month', 'MonthName']);

        return array($fields, static::find_by_sql($sql));
    }

    protected static function add_total_field(array $arrays = [])
    {
        static::add_db_field();
        array_push($arrays, 'totalHours', 'totalMin', 'totalMinHour', 'sumHours', 'reminder');
        return $arrays;
    }

    protected static function add_db_field()
    {
        array_push(static::$db_fields, 'Date', 'Year', 'Month', 'MonthName', 'Week', 'totalHours', 'totalMin', 'totalMinHour', 'sumHours', 'reminder');


    }

    public static function ByThisMonth()
    {
        $month = now_monthname();
        $sql = "SELECT DISTINCT year(date_presence) AS Year ,month(date_presence) AS Month,
                monthname(date_presence) AS MonthName,
sum(hr) AS totalHours,sum(mn) AS totalMin,sum(mn)/60 AS totalMinHour,(sum(hr)+(sum(mn)/60)) AS sumHours
                FROM  heure_presence WHERE monthname(date_presence)='{$month}' GROUP BY Year,Month ORDER BY date_presence DESC";
        $fields = static::add_total_field(['Year', 'Month', 'MonthName']);


        return array($fields, static::find_by_sql($sql));
    }

    public static function ByToday()
    {
        $today = now_sql();
        $sql = "
SELECT DISTINCT date_presence AS Date, year(date_presence) AS Year ,monthname(date_presence) AS MonthName,
sum(hr) AS totalHours,sum(mn) AS totalMin,sum(mn)/60 AS totalMinHour,sum(hr)+sum(mn)/60 AS sumHours
 FROM heure_presence WHERE date_presence='{$today}'  GROUP BY date_presence,Year,MonthName ORDER BY date_presence DESC
";
        $fields = static::add_total_field(['Year', 'Month', 'MonthName']);

        return array($fields, static::find_by_sql($sql));


    }

    public static function ByWeek()
    {
        $sql = "
SELECT DISTINCT year(date_presence) AS Year ,month(date_presence) AS Month,
  monthname(date_presence) AS MonthName,   week(date_presence) AS Week,
sum(hr) AS totalHours,sum(mn) AS totalMin,sum(mn)/60 AS totalMinHour,sum(hr)+sum(mn)/60 AS sumHours
  FROM  heure_presence GROUP BY Year,Month,Week ORDER BY date_presence DESC
";
        $fields = static::add_total_field(['Year', 'MonthName', 'Week']);

        return array($fields, static::find_by_sql($sql));
    }

    public static function ByDay()
    {
        $sql = "
SELECT DISTINCT date_presence AS Date, year(date_presence) AS Year ,monthname(date_presence) AS MonthName,
sum(hr) AS totalHours,sum(mn) AS totalMin,sum(mn)/60 AS totalMinHour,sum(hr)+sum(mn)/60 AS sumHours
 FROM heure_presence GROUP BY date_presence,Year,MonthName ORDER BY date_presence DESC
";
        $fields = static::add_total_field(['Date', 'Year', 'MonthName']);

        return array($fields, static::find_by_sql($sql));
    }

    public static function ByYear()
    {
        $sql = "SELECT DISTINCT  year(date_presence) AS Year ,
sum(hr) AS totalHours,sum(mn) AS totalMin,sum(mn)/60 AS totalMinHour,(sum(hr)+(sum(mn)/60)) AS sumHours
FROM  heure_presence GROUP BY Year ORDER BY date_presence DESC";

        $fields = static::add_total_field(['Year']);

        return array($fields, static::find_by_sql($sql));
    }

    public static function ByDate($date = null)
    {
        if (!$date) {
            $date = strtotime('yesterday');
        } else {
            $date = strtotime((string)$date);
        }

        $date = date_sql($date);
        $where = "WHERE date_presence='{$date}'";


        $sql = "
SELECT 
DISTINCT id,
datetime_presence AS Date,nbre_horaire AS Horaire,commentaire,
year(date_presence) AS Year ,
monthname(date_presence) AS MonthName,
sum(hr) AS totalHours,sum(mn) AS totalMin,
sum(mn)/60 AS totalMinHour,
sum(hr)+sum(mn)/60 AS sumHours
 FROM heure_presence {$where} 
 GROUP BY id,datetime_presence,Year,MonthName ,commentaire
 ORDER BY datetime_presence ASC
";
        $fields = static::add_total_field(['id', 'Date', 'Year', 'MonthName', 'commentaire']);

        return array($fields, static::find_by_sql($sql));
    }

    public static function ByDateSummary($date = null)
    {
        if (!$date) {
            $date = strtotime('yesterday');
        } else {
            $date = strtotime((string)$date);
        }

        $date = date_sql($date);
        $where = "WHERE date_presence='{$date}'";


        $sql = "
SELECT 
DISTINCT 
date_presence AS Date,
year(date_presence) AS Year ,
monthname(date_presence) AS MonthName,
sum(hr) AS totalHours,sum(mn) AS totalMin,
sum(mn)/60 AS totalMinHour,
sum(hr)+sum(mn)/60 AS sumHours
 FROM heure_presence {$where} 
 GROUP BY date_presence,Year,MonthName
 ORDER BY datetime_presence ASC
";
        $fields = static::add_total_field(['Date', 'Year', 'MonthName', 'commentaire']);

        return array($fields, static::find_by_sql($sql));
    }

    public static function report_period()
    {
        global $Nav;

        $post_link = $_SERVER["PHP_SELF"];
//        $post_link = clean_query_string($_SERVER["PHP_SELF"] . "?HeurePresenceWhen=" . urldecode($_GET['HeurePresenceWhen']));

        $output = "";

        $output .= "<div class='row'>";
        $output .= "<div class='col-md-5 col-md-offset-2'>";

        $href = $Nav->http . "public/admin/manage_ajax.php?class_name=HeurePresence";
        $done_txt = "HeurePresence";
        $output .= "&nbsp;<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";
//        $output .=  "</div>";

        $href = $Nav->http . "Inspinia/profile.php";
        $done_txt = "Profile";
        $output .= "&nbsp;<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";
//        $output .=  "</div>";

        $href = $Nav->http . "public/admin/new_ajax.php?class_name=HeurePresence";
        $done_txt = "Add Heure";
        $output .= "&nbsp;<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";

        $output .= "<a class='btn btn-primary' role='button' data-toggle='collapse' href='#FormHeurePresenceProfile' aria-expanded='false' aria-controls='collapseExample'>
    Open Form
</a>";
        $output .= "</div>";

        $output .= "<div class='col-md-5 '>";

        $output .= "<form role='form'  name='form_" . get_called_class() . "' id='form_" . get_called_class() . "'  class='form-inline' method='get' action='{$post_link}'> ";

//        $output .= "<div class='form-group'><label class='col-sm-2 control-label'>Inline checkboxes</label>
//    <div class='col-sm-10'><label class='checkbox-inline i-checks'> <input type='checkbox' value='option1'>a </label>
//        <label class='checkbox-inline i-checks'> <input type='checkbox' value='5'> b </label>
//        <label class='checkbox-inline i-checks'> <input type='checkbox' value='option3'> c </label></div>
//
//";
//
//        $output = "<label> <input type='radio' value='option1' name='a'> <i></i> Option one </label>
//<label> <input type='radio' checked='' value='option2' name='a'> <i></i> Option two checked </label>
//</div>";

//        $output .= "<div class='form-group'><label class='col-sm-2 control-label'>Select</label>
//
//    <div class='col-sm-10'><select class='form-control m-b' name='account'>
//            <option>option 1</option>
//            <option>option 2</option>
//            <option>option 3</option>
//            <option>option 4</option>
//        </select>
//
//        <div class='col-lg-4 m-l-n'><select class='form-control' multiple=''>
//                <option>option 1</option>
//                <option>option 2</option>
//                <option>option 3</option>
//                <option>option 4</option>
//            </select></div>
//    </div>
//</div>
//";
        $output .= "
    <div class='form-group'>
        <label for='heurePresenceDate' class='sr-only'>When...</label>
        <input type='search' name='HeurePresenceWhen' placeholder='Enter date' id='heurePresenceDate'
               class='form-control'>
    </div>
    
    <button class='btn btn-info' type='submit'>Go</button>
</form>";


        $output .= "</div>";
        $output .= "</div>";

        $output .= static::aside_right();

        $output .= "<div class='row'>";
//        $output .=  "<div class='col-md-10 col-md-offset-2'>";
        $output .= "<div class='col-md-12 '>";


        if (isset($_GET['HeurePresenceWhen'])) {
//            $When=$_GET['HeurePresenceWhen'];
            $arg = [$_GET['HeurePresenceWhen']];
            $date = strtotime($arg[0]);

            if ($date) {
                $output .= "<div class='text-center'  id='HeurePresenceToday'>";
                $output .= "<h4><b>Summary " . $arg[0] . "</b></h4>";
                $output .= HeurePresence::report("ByDateSummary", $arg);
                $output .= "</div>";
//            unset($arg);

//            $arg=['Yesterday'];
                $output .= "<div class='text-center'  id='HeurePresenceToday'>";
                $output .= "<h4><b>Details " . $arg[0] . "</b></h4>";
                $output .= HeurePresence::report("ByDate", $arg);
                $output .= "</div>";
                unset($arg);
            } else {
                $output .= "<br><p class='text-center' style='color: red;font-size: 2em'>
The Search date Inputed is not valid " . $arg[0] . " </p>";
            }


        }


//        $output .=  "<h1></h1>";

        $output .= "<div class='text-center'  id='HeurePresenceToday'>";
        $output .= "<h4><b>Summary Today</b></h4>";
        $output .= HeurePresence::report("ByToday");
        $output .= "</div>";

        $arg = ['today'];
        $output .= "<div class='text-center'  id='HeurePresenceToday'>";
        $output .= "<h4><b>Details " . $arg[0] . "</b></h4>";
        $output .= HeurePresence::report("ByDate", $arg);
        $output .= "</div>";
        unset($arg);

        $arg = ['Yesterday'];
        $output .= "<div class='text-center'  id='HeurePresenceToday'>";
        $output .= "<h4><b>Summary " . $arg[0] . "</b></h4>";
        $output .= HeurePresence::report("ByDateSummary", $arg);
        $output .= "</div>";
        unset($arg);

        $arg = ['Yesterday'];
        $output .= "<div class='text-center'  id='HeurePresenceToday'>";
        $output .= "<h4><b>Details " . $arg[0] . "</b></h4>";
        $output .= HeurePresence::report("ByDate", $arg);
        $output .= "</div>";
        unset($arg);

        $arg = ['2 days ago'];
        $output .= "<div class='text-center'  id='HeurePresenceToday'>";
        $output .= "<h4><b>Details " . $arg[0] . "</b></h4>";
        $output .= HeurePresence::report("ByDate", $arg);
        $output .= "</div>";
        unset($arg);

        $output .= "<div class='text-center'  id='HeurePresenceThisMonth'>";
        $output .= "<h4><b>Current Month</b></h4>";
        $output .= HeurePresence::report("ByThisMonth");
        $output .= "</div>";

        $output .= "<div class='text-center'  id='HeurePresenceYear'>";
        $output .= "<h4><b>Year</b></h4>";
        $output .= HeurePresence::report("ByYear");
        $output .= "</div>";

        $output .= "<div  class='text-center' id='HeurePresenceDay'>";
        $output .= "<h4><b>Day</b></h4>";
        $output .= HeurePresence::report("ByDay");
        $output .= "</div>";

        $output .= "<div class='text-center' id='HeurePresenceWeek'>";
        $output .= "<h4><b>Week</b></h4>";
        $output .= HeurePresence::report("ByWeek");
        $output .= "</div>";

        $output .= "<div class='text-center'  id='HeurePresenceMonth'>";
        $output .= "<h4><b>Month</b></h4>";
        $output .= HeurePresence::report("ByMonth");
        $output .= "</div>";

        $output .= "</div>";
        $output .= "</div>";

//        return  ibox($output,  12, 'Reporting Heure Presence',
//            ['tools' => true, 'collapse-link' => true, 'dropdown-toggle' => true, 'dropdown-menu' => true, 'close-link' => true]
//        );
        return $output;
    }

    public static function aside_right()
    {
        $output = "";
        $output .= "<div id='container-view' class=\"container-fluid\">";
        $output .= "<div class='row'>";
        $output .= "<div class='col-md-12'>";
        $add = "add";
        $output .= $add . " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";

        $commentaire = "Divers peut être boire - gratter -petite chose";
        $text = "5mn" . "Divers";
        $hour = 0;
        $minute = 5;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit besoin";
        $text = "10mn" . " " . $commentaire;
        $hour = 0;
        $minute = 10;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "coucher";
        $text = "10mn" . " " . $commentaire;
        $hour = 0;
        $minute = 10;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit-déjeuner";
        $text = "10mn" . " " . $commentaire;
        $hour = 0;
        $minute = 10;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit besoin";
        $text = "15mn" . " " . $commentaire;
        $hour = 0;
        $minute = 15;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "coucher";
        $text = "15mn" . " " . $commentaire;
        $hour = 0;
        $minute = 15;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit-déjeuner";
        $text = "15mn" . " " . $commentaire;
        $hour = 0;
        $minute = 15;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);


        $commentaire = "";
        $text = "1 hour";
        $hour = 1;
        $minute = 0;
        $output .= static::get_links($text, $hour, $minute, $commentaire);

        $commentaire = " Douche Déjeuner besoin";
        $text = "1H30" . " " . $commentaire;
        $hour = 1;
        $minute = 30;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);


        $commentaire = "";
        $text = "2H" . " " . $commentaire;
        $hour = 2;
        $minute = 0;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "Grand Besoin";
        $text = "2H" . " " . $commentaire;
        $hour = 2;
        $minute = 0;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $output .= "</div>";
        $output .= "</div>";
        $output .= "<div class='row'>";
        $output .= "<div class='col-md-12'>";
        $add = "substract";
        $output .= $add . " &nbsp; ";

        $commentaire = "Divers peut être boire - gratter -petite chose";
        $text = "5mn" . "Divers";
        $hour = 0;
        $minute = 5;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit besoin";
        $text = "10mn" . " " . $commentaire;
        $hour = 0;
        $minute = 10;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "coucher";
        $text = "10mn" . " " . $commentaire;
        $hour = 0;
        $minute = 10;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit-déjeuner";
        $text = "10mn" . " " . $commentaire;
        $hour = 0;
        $minute = 10;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit besoin";
        $text = "15mn" . " " . $commentaire;
        $hour = 0;
        $minute = 15;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "coucher";
        $text = "15mn" . " " . $commentaire;
        $hour = 0;
        $minute = 15;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "petit-déjeuner";
        $text = "15mn" . " " . $commentaire;
        $hour = 0;
        $minute = 15;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);


        $commentaire = "";
        $text = "1 hour";
        $hour = 1;
        $minute = 0;
        $output .= static::get_links($text, $hour, $minute, $commentaire);

        $commentaire = " Douche Déjeuner besoin";
        $text = "1H30" . " " . $commentaire;
        $hour = 1;
        $minute = 30;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);


        $commentaire = "";
        $text = "2H" . " " . $commentaire;
        $hour = 2;
        $minute = 0;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $commentaire = "Grand Besoin";
        $text = "2H" . " " . $commentaire;
        $hour = 2;
        $minute = 0;
        $output .= static::get_links($text, $hour, $minute, $commentaire, $add);

        $output .= "</div>";
        $output .= "</div>";
        $output .= "</div>";
        return $output;


    }

    public static function get_links($text = 'lnk', $hour = null, $minute = null, $commentaire = null, $add = "add")
    {
        global $Nav;
        $btn = "btn btn-info";
        $btn = "";

        $output = "";
        $href = $Nav->http . "public/admin/manage_ajax.php?class_name=HeurePresence";

        if ($add === "add") {
            $href .= "&action=quickaddhours";
        } elseif ($add === "substract") {
            $href .= "&action=quicksubstracthours";

        }


        $href .= "&return_to=" . $_SERVER['PHP_SELF'];
        if (isset($hour) && $hour > 0) {
            $href .= "&add_hour={$hour}";
        }
        if (isset($minute) && $minute > 0) {
            $href .= "&add_minute={$minute}";
        }
        if ($commentaire) {
            $href .= "&commentaire={$commentaire}";
        }

        $output .= "|&nbsp;&nbsp;<a  class='{$btn}
        '  href=\"" . $href . "\">{$text} " . " </a><span>&nbsp;</span>";

        return $output;

    }

    public static function report($type = "ByYear", array $arg = [])
    {

        global $Nav;

        $array = call_user_func_array([get_called_class(), $type], $arg);
        $headers = $array[0];
        $results = $array[1];

        $return_to = $_SERVER ['PHP_SELF'];

        $table_class = Table::full_table_class();
        $output = "";
        $output .= "<table class='$table_class '>";
        $output .= "<tr>";

        foreach ($headers as $header) {
            $output .= "<th class='text-center'>{$header}" . "</th>";
        }

        $output .= "</tr>";

        foreach ($results as $result) {
            $output .= "<tr>";
            foreach ($headers as $header) {
                if ($header == "reminder") {
                    $result->reminder = "hi";
                }
                if ($header == "id") {

                    $result->id = "<a class='btn btn-primary' href='{$Nav->http}/public/admin/edit_ajax.php?class_name=" . get_called_class() . "&id=" . $result->id
                        . "'>Edit</a> " .
                        "<a class='btn btn-danger' href='{$Nav->http}/public/admin/delete_ajax.php?class_name=" . get_called_class() . "&return_to={$return_to}&id=" . $result->id
                        . "'>Delete</a> ";
                }

                $output .= "<td class='text-center'>{$result->$header}" . "</td>";
            }
            $output .= "</tr>";
        }
        $output .= "</table>";
        return $output;


    }

    public static function short_form()
    {
        global $session;

        $date_presence = now_sql();
        $action = "add";
        $whenTime = "AM";
        $hour = 0;
        $minute = 0;
        $accumulated_commentaire = "";
        $commentaires = [];

        $form = new Form();
        $form->id = "heure_debut";
        $form->name = "heure_debut";
        $form->label_text = "Heure";
        $form->value = now_time();
        $form->script = "<script type=\"text/javascript\">
$('.clockpicker').clockpicker({    placement:'top',    align: 'bottom',    donetext: 'Done'});
</script>";

        $form->col_sm_label = "col-sm-3";
        $form->col_sm_input = "col-sm-3";

        if (isset($_GET['submit']) && $_GET['submit'] == "RecordForm" && isset($_GET['class_name']) && $_GET['class_name'] === get_called_class()) {

            if (isset($_GET['date_presence'])) {
                $date_presence = $_GET['date_presence'];
            }
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            if (isset($_GET['whenTime'])) {
                $whenTime = $_GET['whenTime'];
            }
            if (isset($_GET['hour'])) {
                $hour = (int)$_GET['hour'];
            } else {
            }
            if (isset($_GET['minute'])) {
                $minute = (int)$_GET['minute'];
            }
            if (isset($_GET['commentaire'])) {
                $commentaires = $_GET['commentaire'];
            }


//            if ($whenTime == "PM") {
//                $add_hour = $hour + 12;
//            } else {
//
//            }
            $add_hour = $hour;
            $add_minute = $minute;


            if ($add_hour > 0) {
                $hour_text = $add_hour . " hours";
            } else {
                $hour_text = "";
            }

            if ($add_minute > 0) {
                $minute_text = $add_minute . " minutes";
            } else {
                $minute_text = "";
            }

            $me = new self();

            if ($action == "add") {
                $me->date_presence = $date_presence;
                $me->heure_debut = now_time();
                $me->datetime_presence = $me->date_presence . " " . $me->heure_debut;

                $date = date_create($me->date_presence . " " . $me->heure_debut);
                date_add($date, date_interval_create_from_date_string($hour_text . " " . $minute_text));


                $me->date_presence_fin = date_format($date, "Y-m-d");
                $me->heure_fin = date_format($date, "H:i:s");
                $me->datetime_presence_fin = date_format($date, "Y-m-d H:i:s");


            } elseif ($action == "substract") {
                $me->date_presence_fin = $date_presence;
                $me->heure_fin = now_time();
                $me->datetime_presence_fin = $me->date_presence_fin . " " . $me->heure_fin;

                $date = date_create($me->date_presence_fin . " " . $me->heure_fin);
                date_sub($date, date_interval_create_from_date_string($hour_text . " " . $minute_text));

                $me->date_presence = date_format($date, "Y-m-d");
                $me->heure_debut = date_format($date, "H:i:s");
                $me->datetime_presence = date_format($date, "Y-m-d H:i:s");


            } else {
                echo "<p>Error short form</p>";
            }

//            $accumulated_commentaire=""
            $me->commentaire = "";
            foreach ($commentaires as $commentaire) {
                $accumulated_commentaire .= " - " . $commentaire;

            }
            $me->commentaire = $accumulated_commentaire;

            $me->set_up_display();
//            var_dump($me);
            $me->save();

            unset($_GET);

        }

//        checking(false);
        $output = "";
//        $output .= "<br><br><pre>";
//        print_r($_GET);
//        $output .= "</pre>";

        $output .= "<div class='collapse' id='FormHeurePresenceProfile'>";
        $output .= "    <div class='well'>";


        $output .= "<div class='row'>";
        $output .= "<div class='col-md-10 col-md-offset-2'>";


        $output .= "<form class='form-horizontal background_dark_blue' style='color: whitesmoke' method='get' action='profile.php'>";

        $output .= "<div class='form-group hidden'>
        <label for='class_name' class='col-sm-3 control-label'>Class Name</label>
        <div class='col-sm-3'>
            <input type='text' class='form-control' name='class_name' value='HeurePresence' id='class_name' placeholder=''>
        </div>
    </div>";

        $output .= "<div class='form-group'>";
        $output .= "
        <label for='class_name' class='col-sm-3 control-label'>Date</label>
        <div class='col-sm-3'>
            <input type='date' class='form-control' name='date_presence' data-date-format=\"DD MMMM YYYY\" value='{$date_presence}' id='date' placeholder=''>
        </div>";
        $output .= $form->clockwise();
        $output .= "</div>";


        $output .= "
<div class='text-center'>
    <div class='radio'>
<label class='radio-inline'>
    <input type='radio' name='action' id='addSubstract1' value='add' checked> ADD TIME
</label>
<label class='radio-inline'>
    <input type='radio' name='action' id='addSubstract2' value='substract'> SUBSTRACT TIME
</label>
    </div>
 </div>";

        $output .= "
<div class='text-center'>
    <div class='radio'>
<label class='radio-inline'>
    <input type='radio' name='whenTime' id='whenTime1' value='AM' checked>AM
</label>
<label class='radio-inline'>
    <input type='radio' name='whenTime' id='whenTime1' value='PM'>PM
</label>
    </div>
     </div>
    ";

        $output .= "<div class='text-center'>";
        $output .= "<div class='radio'>";
        for ($i = 0; $i < 7; $i++) {
            if ($i == 0) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $output .= "<label class='radio-inline'><input type='radio' name='hour' id='hour{$i}' value='{$i}' {$checked}>{$i}H</label>";
        }
        for ($i = 7; $i < 13; $i++) {
            if ($i == 0) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $output .= "<label class='radio-inline'><input type='radio' name='hour' id='hour{$i}' value='{$i}'>{$i}H</label>";
        }
        $output .= "</div>";
        $output .= "</div>";


        $output .= "<div class='text-center'>";
        $output .= "<div class='radio'>";
        for ($i = 0; $i < 60; $i += 5) {
            if ($i == 0) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $output .= "    
      <label class='radio-inline'><input type='radio' name='minute' id='minute{$i}' value='{$i}' {$checked}>{$i}M</label>";
        }
        $output .= "</div>";
        $output .= "</div>";


        $output .= "<div class='text-center'>";
        $output .= "<div class='form-group'>
        <div class=' col-sm-12'>
            <div class='checkbox'>";
        $i = 4;
        $items = ["Boire", "Diner", "Petit besoin", "Petit-déjeuner", "Reveil", "Coucher", "Reveil-douche petit dejeuner",];
        foreach ($items as $item) {
            $i++;
            $output .= "   <label><input name='commentaire[]' value='{$item}' type='checkbox'>{$item}</label>";

        }
        unset($items);
        $output .= "</div></div></div>";
        $output .= "</div>";


        $output .= "<div class='text-center'>";
        $output .= "<div class='form-group'>
        <div class='col-sm-12'>
            <div class='checkbox'>";
        $i = 4;
        $items = ["Massage", "Diner-Déjeuner", "Compresse", "Nettoyage intime", "Coucher", "Reveil-douche petit dejeuner",];
        foreach ($items as $item) {
            $i++;
            $output .= "   <label><input name='commentaire[]' value='{$item}' type='checkbox'>{$item}</label>";

        }
        unset($items);
        $output .= "</div></div></div>";
        $output .= "</div>";


        $output .= "<div class='form-group'>
        <label for='class_name' class='col-sm-3 control-label'>What</label>";
        $output .= "<div class='col-sm-4'>";
        $output .= "<select name='commentaire[]' class='form-control'>";

        $items = ["	Divers peut être boire - gratter -petite chose", "grand besoin", "Reveil", "lunch-dejeuner", "petit besoin", "Petit-déjeuner", "coucher",];
        $output .= "<option value='' selected >Select a task</option>";
        foreach ($items as $item) {
            $output .= "<option value='{$item}'>{$item}</option>";
        }
        unset($items);
        $output .= "</select>";
        $output .= "</div>";
        $output .= "</div>";

        $output .= "<div class='form-group'>
        <label for='commentaire' class='col-sm-3 control-label'>Comment</label>";
        $output .= "<div class='col-sm-9'>";
        $output .= "<textarea name='commentaire[]' class='form-control' rows='3''>{$accumulated_commentaire}</textarea>";
        $output .= "</div>";
        $output .= "</div>";


        $output .= "<div class='form-group'>";
        $output .= "<div class='col-sm-offset-5 col-sm-7'>
            <button type='submit' name='submit' value='RecordForm' class='btn btn-purple'>Record Form</button>
        </div>
    </div>
</form>";
        $output .= "</div>";
        $output .= "</div>";
        $output .= "</div></div>";// end of collapse

        return $output;

    }

    protected function set_up_display()
    {
        global $session;
//       $this->nbre_horaire= $this->heure_fin - $this->heure_fin;
        if (!isset($this->user_id)) {
            $this->user_id = $session->user_id;
        }

        if (!isset($this->person_id)) {
            $this->person_id = 6;
        }

        if (!isset($this->date_presence)) {
            $this->date_presence = now_sql();;
        }

        if (!isset($this->date_presence_fin)) {
            $this->date_presence_fin = now_sql();;
        }


        if (!isset($this->heure_debut)) {
            $this->heure_debut = now_time();;
        }


        if (!isset($this->heure_fin)) {
            $this->heure_fin = now_time();;
        }


        if (!isset($this->input_date)) {
            $this->input_date = now_sql();
        }


        $this->modification_time = now_sql() . " " . now_time();

        $person = MyExpensePerson::find_by_id((int)$this->person_id);
        $this->person_name = $person->person_name;

        $user = User::find_by_id((int)$this->user_id);
        $this->username = $user->username;


        $time_debut = strtotime($this->date_presence . "" . $this->heure_debut, time());
        $time_fin = strtotime($this->date_presence_fin . "" . $this->heure_fin, time());


        $datetime1 = new DateTime(date('Y-m-d H:i:s', $time_debut));
        $datetime2 = new DateTime(date('Y-m-d H:i:s', $time_fin));
        $oDiff = $datetime1->diff($datetime2);
//        echo $oDiff->y.' Years <br/>';
//        echo $oDiff->m.' Months <br/>';
//        echo $oDiff->d.' Days <br/>';
//        echo $oDiff->h.' Hours <br/>';
//        echo $oDiff->i.' Minutes <br/>';
//        echo $oDiff->s.' Seconds <br/>';

        $mn = (float)$oDiff->i;
        if ($mn < 10) {
            $mn = ('0' . $mn);
        }


        $this->nbre_horaire = (float)($oDiff->h . "." . $mn);
        $this->hr = (int)$oDiff->h;
        $this->mn = (int)$oDiff->i;
        $this->heure = number_format($this->nbre_horaire, 2);

        $this->date_ = strftime("%d-%m-%Y", strtotime($this->date_presence));
        $this->date_to = strftime("%d-%m-%Y", strtotime($this->date_presence_fin));

        $this->user_id = $session->user_id;
        $user = User::find_by_id((int)$this->user_id);
        $this->username = $user->username;

        $timestamp = strtotime($this->date_presence . "" . $this->heure_debut);
        $o = unixToMySQL($timestamp);
        $this->datetime_presence = $o;

        $this->datetime_presence_fin = $this->date_presence_fin . " " . $this->heure_fin;


    }

    public static function update_all()
    {
        $datas = static::find_all();

        foreach ($datas as $data) {
//            var_dump($data->id);
            $res = self::find_by_id((int)$data->id);
//            $res->date_presence_fin=$res->date_presence;
            $res->datetime_presence_fin = $res->date_presence_fin . " " . $res->heure_fin;
            $res->form_validation();
            $res->update();


        }


    }

    public function form_validation()
    {
        global $session;
        $this->user_id = $session->user_id;


        $user = User::find_by_id((int)$this->user_id);
        $this->username = $user->username;

        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);


        $valid->validate_Date('date_presence');

        $time_debut = strtotime($this->date_presence . "" . $this->heure_debut, time());
        $time_fin = strtotime($this->date_presence_fin . "" . $this->heure_fin, time());


        $datetime1 = new DateTime(date('Y-m-d H:i:s', $time_debut));
        $datetime2 = new DateTime(date('Y-m-d H:i:s', $time_fin));
        $oDiff = $datetime1->diff($datetime2);
//        echo $oDiff->y.' Years <br/>';
//        echo $oDiff->m.' Months <br/>';
//        echo $oDiff->d.' Days <br/>';
//        echo $oDiff->h.' Hours <br/>';
//        echo $oDiff->i.' Minutes <br/>';
//        echo $oDiff->s.' Seconds <br/>';

        $mn = (float)$oDiff->i;
        if ($mn < 10) {
            $mn = ('0' . $mn);
        }


        $this->nbre_horaire = (float)($oDiff->h . "." . $mn);

        $this->date_ = strftime("%d-%m-%Y", strtotime($this->date_presence));
        $this->user_id = $session->user_id;
        $user = User::find_by_id((int)$this->user_id);
        $this->username = $user->username;

        return $valid;

    }


}
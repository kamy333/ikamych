<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class Course extends DatabaseObject
{
    protected static $table_name = "course";
//    protected static $table_name2 = "myexpense_person";
//    protected static $table_name3 = "myexpense_type";

// 'currency_id','Account','debitor','creditor'


    protected static $db_fields = ['id', 'chauffeur', 'client', 'autres', 'date_course', 'time_course', 'datetime_course', 'depart', 'arrive', 'commentaire', 'document', 'input_date',];

    protected static $required_fields = ['chauffeur', 'client', 'autres', 'date_course', 'time_course', 'depart', 'arrive'];

    protected static $db_fields_table_display_short = ['id', 'chauffeur', 'client', 'autres', 'date_course', 'time_course', 'depart', 'arrive'];

    protected static $db_fields_table_display_full = ['id', 'chauffeur', 'client', 'autres', 'date_course', 'time_course', 'datetime_course', 'depart', 'arrive', 'commentaire', 'document',];

    protected static $db_field_exclude_table_display_sort = [];
    protected static $db_field_include_table_display_sort = [];

    public static $fields_numeric = ['id'];
    public static $fields_numeric_format = [];

    public static $get_form_element = ['chauffeur', 'client', 'autres', 'date_course', 'time_course', 'depart', 'arrive', 'commentaire', 'document',];

    public static $get_form_element_others = [];

    public static $form_default_value = [

        "date_course" => "now()",
        "time_course" => "time()",
        "input_date" => "nowtime()",
    ];


    protected static $form_properties = [

//        "chauffeur" => ["type" => "text",
//            "name" => 'chauffeur',
//            "label_text" => "Chauffeur",
//            "placeholder" => "Chauffeur",
//            "required" => true,
//        ],
        "chauffeur" => ["type" => "select",
            "name" => 'chauffeur',
            "class" => "Chauffeur",
            "label_text" => "Chauffeur",
            "select_option_text" => 'Chauffeur',
            'field_option_0' => "id",
            'field_option_1' => "chauffeur_name",
            "required" => true,
        ],

//        "client" => ["type" => "text",
//            "name" => 'client',
//            "label_text" => "Client",
//            //"placeholder" => "Start Date",
//            "placeholder"=>"Client",
//            "required" => true,
//        ],

        "client" => ["type" => "select",
            "name" => 'client',
            "class" => "Client",
            "label_text" => "Client",
            "select_option_text" => 'Client',
            'field_option_0' => "id",
            'field_option_1' => "web_view",
            "required" => true,
        ],
        "date_course" => ["type" => "date",
            "name" => 'date_course',
            "label_text" => "Date Course",
            //"placeholder" => "Start Date",
            "placeholder" => "Date Course",
            "required" => true,
        ],

        "time_course" => ["type" => "time",
            "name" => 'time_course',
            "label_text" => "Time Course",
            "placeholder" => "",
            "required" => true,
        ],

        "depart" => ["type" => "text",
            "name" => 'depart',
            "label_text" => "Depart",
            "placeholder" => "Depart",
            "required" => true,
        ],

        "arrive" => ["type" => "text",
            "name" => 'arrive',
            "label_text" => "Arrivee",
            "placeholder" => ("Arrivee"),
            "required" => true,
        ],

//        "start_datetime" => ["type" => "time",
//            "name" => 'start_datetime',
//            "label_text" => "Start DateTime",
//            "placeholder" => "Start DateTime",
//            "required" => false,
//        ],


        "commentaire" => ["type" => "textarea",
            "name" => 'commentaire',
            "label_text" => "Commentaire",
            "placeholder" => "input Commentaire",
            "required" => false,
        ],

        "document" => ["type" => "file",
            "name" => 'document',
            "label_text" => "Document",
            "placeholder" => "input Document",
            "required" => false,
        ],
//        "person" => ["type" => "radio",
//            [0,
//                [
//                    "label_all" => "Person",
//                    "name" => "person",
//                    "label_radio" => "Kamy",
//                    "value" => "0",
//                    "id" => "cash_no",
//                    "default" => true]],
//            [1,
//                [
//                    "label_all" => "Person",
//                    "name" => "person",
//                    "label_radio" => "Mum",
//                    "value" => "1",
//                    "id" => "cash_yes",
//                    "default" => false]],
//        ],
        "input_date" => ["type" => "datetime",
            "name" => 'input_date',
            "label_text" => "input date",
            "placeholder" => "input date",
            "required" => true,
        ],

        "modification_time" => ["type" => "datetime",
            "name" => 'modification_time',
            "label_text" => "modification_time",
            "placeholder" => "modification_time",
            "required" => true,
        ],
    ];

    protected static $form_properties_search = [
        "search_all" => ["type" => "text",
            "name" => 'search_all',
            "label_text" => "",
            "placeholder" => "Search all",
            "required" => false,
        ],


        "download_csv" => ["type" => "radio",
            [0,
                [
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "non",
                    "value" => "No",
                    "id" => "visible_no",
                    "default" => true]],
            [1,
                [
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "oui",
                    "value" => "Yes",
                    "id" => "visible_yes",
                    "default" => true]],
        ],

    ];


    public static $db_field_search = ['search_all', 'download_csv'];


    public static $page_name = "Course";

//    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense"; // "new_link.php";
    public static $page_manage = "/public/admin/crud/data/manage_data.php?class_name=Course"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Courser"; // "new_link.php";

//    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyExpense"; //  "edit_link.php";
    public static $page_edit = "/public/admin/crud/data/edit_data.php?class_name=Course"; //  "edit_link.php"

    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Course"; //  "delete_link.php";
    public static $position_table = "positionBoth"; // positionLeft // positionBoth  positionRight

    public static $form_class_dependency = [];

    public static $per_page;

    public $id;
    public $chauffeur;
    public $client;
    public $autres;
    public $date_course;
    public $time_course;
    public $datetime_course;
    public $depart;
    public $arrive;

    public $commentaire;
    public $document;
    public $input_date;


    public function delete()
    {
//        $this->send_email("deleted");
        return parent::delete(); // TODO: Change the autogenerated stub
    }

    public function tr($td1, $td2)
    {
        $output = "";
        $output .= "<tr>";
        $output .= "<td>$td1</td>";
        $output .= "<td>$td2</td>";
        $output .= "</tr>";

        return $output;

    }

    public static function basic_values()
    {

        $date = new DateTimeImmutable(datetime_sql());

        $dtTime = $date->format('Y-m-d H:i:s');
        $dt = $date->format('Y-m-d');
        $hr = $date->format('H:i:s');


        $datetomorrow = date_create($dt);
        date_add($datetomorrow, date_interval_create_from_date_string("1 day"));
        $tomorrow = date_format($datetomorrow, "Y-m-d");

        $hour_minus_1 = date('H:i:s', strtotime('-1 hour', strtotime($dtTime)));
        $hour_add_1 = date('H:i:s', strtotime('+1 hour', strtotime($dtTime)));

        $hour_minus_1_comp = date('Y-m-d H:i:s', strtotime('-1 hour', strtotime($dtTime)));
        $hour_add_1_comp = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($dtTime)));

        $my_basic_values = [];
        array_push($my_basic_values, $date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp);

//        $date1=date_create("2013-03-15");
//        $date2=date_create("2013-12-12");
//        $diff=date_diff($date1,$date2);
//        echo $diff->format("%R%a days");

        return $my_basic_values;
    }

    public static function sqlresult($courses, $title = "", $is_mail = false)
    {

        $msg = "";
        $mail = "";

        $counts_courses = count($courses);

        [$date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp] = static::basic_values();


        if (!$title) {
            $title = "Planning " . $date->format('l d.m.Y');
        }


        $msg .= "<h2 lang='fr' class='text-center'>" . $title . "</h2>";
        $mail .= "<h2 lang='fr' class='text-center'>" . $title . "</h2>";


        $x = 0;

        foreach ($courses as $course) {

            $date1 = date_create(date_sql());
            $date2 = date_create($course->start_date);
            $diff = date_diff($date1, $date2);
            $diff_name = $diff->format("%R%a days");

            if (User::is_admin()) {
                $edit = "<a href='/public/admin/crud/ajax/edit_ajax.php?class_name=Course&id=$course->id'>$course->client</a>";

            } else {
                $edit = "$course->client";
            }


            $x++;
            if ($course->start_date == $dt) {
                $myday = " Today ";
            } elseif ($course->date_course == $tomorrow) {
                $myday = " Tomorrow ";
            } else {
                $myday = "$diff_name";
            }

            $mydate = "$course->date_course $course->time_course";

            if ($mydate >= $hour_minus_1_comp && $mydate <= $hour_add_1_comp && $course->date_course == $dt) {
                if ($mydate < $dtTime) {
                    $coming_up = "<span style='font-size: 1em;color: darkgrey;'><b>In Past</b></span>";
                    $coming_up_mail = "<span style='font-size: 1em;color: darkgrey;'><b>In Past<br></b></span>";
                } else {
                    $coming_up = "<span style='font-size: 1em;color: white;'><b>Coming Up</b></span>";
                    $coming_up_mail = "<span style='font-size: 1em;color: teal;'><b>Coming Up<br></b></span>";
                }

            } else {

                $coming_up = "";
                $coming_up_mail = "";
            }


            $myday = "<span lang='fr' style='background-color: white;font-size: smaller;padding: 0.2em'>$myday</span>";
            $myday_mail = "<span lang='fr' style='font-size: smaller;padding: 0.2em'>$myday</span>";

            if (strtolower($course->person) == "kamy" || $course->person == "0") {
                $bcolor = "aqua";
                $color = "black";
                $person = "Kamy";

                $bcolor_mail = "blue";
                $color_mail = "black";

            } elseif (strtolower($course->person) == "mum" || $course->person == "1") {
                $bcolor = "hotpink";
                $color = "black";
                $bcolor_mail = "red";
                $color_mail = "black";
                $person = "Mum";
            }

            $msg .= "<div lang='fr' style='background-color: $bcolor;color:$color;margin: 1em;padding: 0.7em '>";
            $mail .= "<div lang='fr' style='color:$bcolor_mail '>";

            $msg .= "<h3 lang='fr'>$coming_up $edit   : <b>" . h($course->client) . "</b> $myday</h3>";
            $mail .= "<p  lang='fr'>$coming_up_mail $edit: <b>" . h($course->client) . "</b>";

            $date = new DateTimeImmutable($course->date_course);

            $mydate = "$course->start_date $course->time_course";
            $hourmin = date("H:i", strtotime($mydate));


            $msg .= "<b> " . $date->format('l d.m.Y') . " @ " . $hourmin . "</b>";
            $mail .= "<b> " . $date->format('l d.m.Y') . " @ " . $hourmin . "</b> $myday_mail ";

//            if ($course->end_time != '00:00:00') {
//                $mydate1 = "$course->start_date $course->end_time";
//                $hourmin1 = date("H:i", strtotime($mydate1));
//                $msg .= " To <b>" . $hourmin1 . "</b><br>";
//                $mail .= " To <b>" . $hourmin1 . "</b> ";
//            } else {
//                $msg .= "<br>";
//                $mail .= "<br>";
//            }


            if ($course->commentaire != "") {
                $msg .= "<span lang='fr'>comment: <b>" . h($course->commentaire) . "</b></span><br>";
                $mail .= "<span lang='fr'> <b>" . h($course->commentaire) . "</b></span><br>";
            }

            $msg .= "</div>";

            if ($x !== $counts_courses) {
                $mail .= "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
            }
            $mail .= "</p></div>";

        }

        return [$msg, $mail];

//        if ($is_mail) {
//            return $mail;
//        } else {
//            return $msg;
//        }


    }

    public static function get_message()
    {
        $msg = "";
        $mail = "";

        [$date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp] = static::basic_values();

        $subject = "Planning " . $date->format('l d.m.Y');

//        $msg.=$dt."<br>";
//        $msg.=$dtTime."<br>";
//        $msg.=$hour_minus_1."<br>";
//        $msg.=$hour_add_1."<br>";

        $courses = Course::find_by_sql("SELECT * FROM course WHERE datetime_course >= '$hour_minus_1_comp' AND datetime_course <'$hour_add_1_comp' ORDER BY datetime_course ");


        if ($courses) {
            $count = count($courses);
            $title = "Planning Coming up " . "($count)";
            [$msgo, $mailo] = static::sqlresult($courses, $title);
            $msg .= $msgo; //static::sqlresult($appointments, $title);
            $mail .= $mailo;
            $msg .= "<br><hr>";
        }

        $courses = Course::find_by_sql("SELECT * FROM course WHERE date_course ='$dt'  ORDER BY datetime_course ");

        if ($courses) {
            $count = count($courses);
            $title = "Planning Today " . $date->format('l d.m.Y') . " ($count)";
            [$msgo, $mailo] = static::sqlresult($courses, $title);
            $msg .= $msgo; //static::sqlresult($appointments, $title);
            $mail .= $mailo;
            $msg .= "<br><hr>";
        }

        $courses = Course::find_by_sql("SELECT * FROM course WHERE date_course = '$tomorrow' ORDER BY datetime_course   ");

        if ($courses) {
            $count = count($courses);
            $title = "Planning Tomorrow " . $datetomorrow->format('l d.m.Y') . " ($count)";
            [$msgo, $mailo] = static::sqlresult($courses, $title);
            $msg .= $msgo; //static::sqlresult($appointments, $title);
            $mail .= $mailo;
            $msg .= "<br><hr>";
        }

        $courses = Course::find_by_sql("SELECT * FROM course WHERE datetime_course >= '$dtTime' ORDER BY datetime_course   ");

        if ($courses) {
            $count = count($courses);
            $title = "Planning upcoming in future " . " ($count)";;
            [$msgo, $mailo] = static::sqlresult($courses, $title);
            $msg .= $msgo; //static::sqlresult($appointments, $title);
            $mail .= $mailo;
            $msg .= "<br><hr>";
        }


        static::send_email($mail, $subject);

        return $msg;
    }

    public static function send_email($msg, $subject = "")
    {


        global $logo;
        $mail = new MyPHPMailer();

        $kamy = User::find_by_username("kamy");

        $message = $logo . "<br><br>";

        $message .= "Geneva " . date("l d/m/Y") . " - " . date("H:i") . "<br><br>";

//        echo "$kamy->email, $kamy->nom";

        $mail->addAddress($kamy->email, $kamy->nom);
//        $mail->addBCC("kamy@ikamy.ch");
        $mail->Subject = $subject;

        $message .= $msg;

        //Send HTML or Plain Text email
        $mail->isHTML(true);
        $mail->Body = $message;
        //   $mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        return $message . "";

    }


    public function table_calendar()
    {
        global $logo;
        $message = "";


        $date = date_create($this->datetime_course);
        $mydate = date_format($date, "d-M-Y");

        $message .= "<hr>";
        $message .= "<table>";

        $message .= $this->tr("Chauffeur:", "{$this->id}");
        $message .= $this->tr("Chauffeur:", "{$this->chauffeur}");
        $message .= $this->tr("Client", "{$this->client}");
        $message .= $this->tr("Start Date", "{$this->autres}");
//            $message .= $this->tr("Date", "{$mydate}");
        $message .= $this->tr("Start time", "{$this->date_course}");
        $message .= $this->tr("Start time", "{$this->time_course}");
        $message .= $this->tr("End time", format_number($this->datetime_course));
        $message .= $this->tr("End time", format_number($this->depart));
        $message .= $this->tr("End time", format_number($this->arrive));
        $message .= $this->tr("Comment", "{$this->document}");
        $message .= $this->tr("Comment", "{$this->commentaire}");
//            $message .= $this->tr("Amount CHF", format_number($this->amountCHF));


        $message .= "</table>";
        $message .= "<hr>";

        $message .= "<br>Many thanks<br>";


        $message .= "{$logo}<br>";


        return $message;
    }


    public function form_validation()
    {
        $this->set_up_display();
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
//        $valid->validate_min_lengths(array('currency'=>3));
//        $valid->validate_max_lengths(array('currency'=>3));
        return $valid;


    }

    public static function table_nav_additional()
    {
        $output = "</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . "/public/calendar.php" . "\">Calendar.php " . " </a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpenseType::$page_new . "\">Add New Type " . " </a></a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpensePerson::$page_manage . "\">View Person " . " </a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpenseType::$page_manage . "\">View Type " . " </a>";

//        $output .= "<a  class=\"btn btn-info\"  href=\"" . "/Inspinia/loan_exp.php" . "\">Mum " . " </a>";

        return $output;
//        return "";


    }


    protected function set_up_display()
    {
//      $this->person="mum"  ;
//      $this->start_date="2023-05-02"  ;
//      $this->start_time="13:45:00";
//      $this->end_time="13:45:00";
//      $this->comment="dinguerie";

//        if ($this->person == "0" || $this->person == 0) {
//            $this->person = "Kamy";
//        } elseif ($this->person == "1" || $this->person == 1) {
//            $this->person = "Mum";
//        }

        $this->datetime_course = "$this->date_course $this->time_course";
        if (!$this->input_date) {
            $this->input_date = now_sql();
        }


    }


}



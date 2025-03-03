<?php


/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class Calendar extends DatabaseObject
{
    public static $fields_numeric = ['id'];


    public static $fields_numeric_format = [];
    public static $get_form_element = ['person', 'title', 'start_date', 'start_time', 'end_time', 'comment', 'input_date', 'is_birthday'];
    public static $get_form_element_others = [];
    public static $form_default_value = [
        "start_date" => "now()",
        "start_time" => "nowtime()",
        "end_time" => "nowtime()",
        "input_date" => "now()",
    ];
    public static $db_field_search = ['search_all', 'download_csv'];
    public static $page_name = "Calendar";
    public static $page_manage = "/public/admin/crud/data/manage_data.php?class_name=Calendar";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Calendar";
    public static $page_edit = "/public/admin/crud/data/edit_data.php?class_name=Calendar";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Calendar";
    public static $position_table = "positionBoth";
    public static $form_class_dependency = [];
    public static $per_page;
    protected static $table_name = "calendar";
    protected static $db_fields = ['id', 'person', 'is_birthday', 'title', 'start_date', 'start_time', 'start_datetime', 'end_time', 'comment', 'input_date',];

    protected static $required_fields = ['person', 'is_birthday', 'title', 'start_date', 'start_time']; // "new_link.php";
    protected static $db_fields_table_display_short = ['id', 'person', 'is_birthday', 'title', 'start_date', 'start_time', 'end_time', 'comment', 'input_date',]; // "new_link.php";
    protected static $db_fields_table_display_full = ['id', 'person', 'is_birthday', 'title', 'start_date', 'start_time', 'start_datetime', 'end_time', 'comment', 'input_date',]; //  "edit_link.php"
    protected static $db_field_exclude_table_display_sort = []; //  "delete_link.php";
    protected static $db_field_include_table_display_sort = []; // positionLeft // positionBoth  positionRight
    protected static $form_properties = [

        "title" => ["type" => "text",
            "name" => 'title',
            "label_text" => "title",
            "placeholder" => "Title",
            "required" => true,
        ],

        "start_date" => ["type" => "date",
            "name" => 'start_date',
            "label_text" => "Start Date",
            //"placeholder" => "Start Date",
            "placeholder" => "dd-mm-yyyy",
            "required" => true,
        ],

        "start_time" => ["type" => "time",
            "name" => 'start_time',
            "label_text" => "Start Time",
            "placeholder" => "Start Time",
            "required" => true,
        ],

//        "start_datetime" => ["type" => "time",
//            "name" => 'start_datetime',
//            "label_text" => "Start DateTime",
//            "placeholder" => "Start DateTime",
//            "required" => false,
//        ],

        "end_time" => ["type" => "time",
            "name" => 'end_time',
            "label_text" => "End Time",
            "placeholder" => "End Time",
            "required" => false,
        ],

        "comment" => ["type" => "textarea",
            "name" => 'comment',
            "label_text" => "Comment",
            "placeholder" => "input Comment",
            "required" => false,
        ],


        'is_birthday' => ["type" => "radio",
            [0,
                [
                    "label_all" => "Birthday",
                    "name" => "is_birthday",
                    "label_radio" => "No",
                    "value" => "0",
                    "id" => "birthday_no",
                    "default" => true]],
            [1,
                [
                    "label_all" => "Birthday",
                    "name" => "is_birthday",
                    "label_radio" => "Yes",
                    "value" => "1",
                    "id" => "birthday_yes",
                    "default" => false]],
        ],
        "person" => ["type" => "radio",
            [0,
                [
                    "label_all" => "Person",
                    "name" => "person",
                    "label_radio" => "Kamy",
                    "value" => "0",
                    "id" => "kamy",
                    "default" => false]],
            [1,
                [
                    "label_all" => "Person",
                    "name" => "person",
                    "label_radio" => "Mum",
                    "value" => "1",
                    "id" => "mum",
                    "default" => false]],
        ],

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
    public $id;
    public $title;
    public $start_date;
    public $start_time;
    public $start_datetime;
    public $end_time;
    public $comment;
    public $person;
    public $is_birthday;
    public $input_date;

    public static function collapse()
    {
        $output = "";


    }

    public static function get_message()
    {
        $msg = "";
        $mail = "";

        [$date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp, $date_after_tomorrow, $after_tomorrow] = static::basic_values();

        $subject = "Planning " . $date->format('l d.m.Y');

//        $msg.=$dt."<br>";
//        $msg.=$dtTime."<br>";
//        $msg.=$hour_minus_1."<br>";
//        $msg.=$hour_add_1."<br>";

        if (isCalendarPast()) {

            $subject = "ATTENTION: Past Planning " . $date->format('l .m.Y');

            $appointments = Calendar::find_by_sql("SELECT * FROM calendar WHERE start_date <'$dt'  ORDER BY start_datetime DESC ");

            if ($appointments) {
                $count = count($appointments);
                $title = "<p style='background-color: red;color:white;padding-top: 0.5em;padding-bottom: 0.5em'>ATTENTION: Planning Past before " . $date->format('l d.m.Y') . " ($count)</p>";
                [$msgo, $mailo] = static::sqlresult($appointments, $title);
//            $msg .= $msgo; //static::sqlresult($appointments, $title);
                $msg .= CollapseOne($title, $msgo, 2, 2);
                $mail .= $mailo;
                $msg .= "<br><hr>";
            }

        } else {


            $appointments = Calendar::find_by_sql("SELECT * FROM calendar WHERE start_datetime >= '$hour_minus_1_comp' AND start_datetime <'$hour_add_1_comp' ORDER BY start_datetime ");


            if ($appointments) {
                $count = count($appointments);
                $title = "Planning Coming up " . "($count)";
                [$msgo, $mailo] = static::sqlresult($appointments, "");
//            $msg .= $msgo; //static::sqlresult($appointments, $title);
                $msg .= CollapseOne($title, $msgo, 1, 2);
                $mail .= $mailo;
                $msg .= "<br><hr>";
            }

            $appointments = Calendar::find_by_sql("SELECT * FROM calendar WHERE start_date ='$dt'  ORDER BY start_datetime ");

            if ($appointments) {
                $count = count($appointments);
                $title = "Planning Today " . $date->format('l d.m.Y') . " ($count)";
                [$msgo, $mailo] = static::sqlresult($appointments, $title);
//            $msg .= $msgo; //static::sqlresult($appointments, $title);
                $msg .= CollapseOne($title, $msgo, 2, 2);
                $mail .= $mailo;
                $msg .= "<br><hr>";
            }

            $appointments = Calendar::find_by_sql("SELECT * FROM calendar WHERE start_date = '$tomorrow' ORDER BY start_datetime   ");

            if ($appointments) {
                $count = count($appointments);
                $title = "Planning Tomorrow " . $datetomorrow->format('l d.m.Y') . " ($count)";
                [$msgo, $mailo] = static::sqlresult($appointments, $title);
//            $msg .= $msgo; //static::sqlresult($appointments, $title);
                $msg .= CollapseOne($title, $msgo, 3, 2);
                $mail .= $mailo;
                $msg .= "<br><hr>";
            }

            $appointments = Calendar::find_by_sql("SELECT * FROM calendar WHERE start_datetime >= '$after_tomorrow' ORDER BY start_datetime   ");
//        $appointments = Calendar::find_by_sql("SELECT * FROM calendar WHERE start_datetime > '$tomorrow' ORDER BY start_datetime   ");


            if ($appointments) {
                $count = count($appointments);
                $title = "Planning upcoming in future " . " ($count)";
                [$msgo, $mailo] = static::sqlresult($appointments, $title);
//            $msg .= $msgo; //static::sqlresult($appointments, $title);
                $msg .= CollapseOne($title, $msgo, 4, 2);
                $mail .= $mailo;
                $msg .= "<br><hr>";
            }
        }

        static::send_email($mail, $subject);

        $msg = CollapseAll($msg, 2);;
        return $msg;
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

        $date_after_tomorrow = date_create($dt);
        date_add($date_after_tomorrow, date_interval_create_from_date_string("2 day"));
        $after_tomorrow = date_format($date_after_tomorrow, "Y-m-d");


        $hour_minus_1 = date('H:i:s', strtotime('-1 hour', strtotime($dtTime)));
        $hour_add_1 = date('H:i:s', strtotime('+1 hour', strtotime($dtTime)));

        $hour_minus_1_comp = date('Y-m-d H:i:s', strtotime('-1 hour', strtotime($dtTime)));
        $hour_add_1_comp = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($dtTime)));

        $my_basic_values = [];
        array_push($my_basic_values, $date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp, $date_after_tomorrow, $after_tomorrow);

//        $date1=date_create("2013-03-15");
//        $date2=date_create("2013-12-12");
//        $diff=date_diff($date1,$date2);
//        echo $diff->format("%R%a days");

        return $my_basic_values;
    }

    public static function sqlresult($appointments, $title = "", $is_mail = false)
    {

        $msg = "";
        $mail = "";

        $counts_appoitments = count($appointments);

        [$date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp, $date_after_tomorrow, $after_tomorrow] = static::basic_values();


        if (!$title) {
            $title = "Planning " . $date->format('l d.m.Y');

        }

//        $msg .= "<h2 lang='fr' class='text-center'>" . $title . "</h2>";

        $mail .= "<h2 lang='fr' class='text-center'>" . $title . "</h2>";

//        if (isCalendatPast()) {
//
////            $msg .= "<h2 lang='fr' class='text-center'>" . $title . "</h2>";
//            $mail .= "<h2 style='margin-top: 10em' lang='fr' class='text-center'>" . $title . "</h2>";
//        } else {
//            $mail .= "<h2 lang='fr' class='text-center'>" . $title . "</h2>";
//
//        }

        $x = 0;

        $date_changed = "";

        foreach ($appointments as $appointment) {

            $date1 = date_create(date_sql());
            $date2 = date_create($appointment->start_date);
            $diff = date_diff($date1, $date2);
            $diff_name = $diff->format("%R%a days");


            if ($date_changed !== $appointment->start_date) {

                $msg .= "<p>&nbsp;&nbsp;<b>" . $date2->format('l d.m.Y') . " " . $diff_name . "</b></p>";
                $mail .= "<p>&nbsp;&nbsp;<b>" . $date2->format('l d.m.Y') . " " . $diff_name . "</b></p>";
            }
            $date_changed = $appointment->start_date;


            $x++;
            if ($appointment->start_date == $dt) {
                $myday = " Today ";
            } elseif ($appointment->start_date == $tomorrow) {
                $myday = " Tomorrow ";
            } else {
                $myday = "$diff_name";
            }

            $mydate = "$appointment->start_date $appointment->start_time";

            if ($mydate >= $hour_minus_1_comp && $mydate <= $hour_add_1_comp && $appointment->start_date == $dt) {
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

            if (strtolower($appointment->person) == "kamy" || $appointment->person == "0") {
                $bcolor = "aqua";
                $color = "black";
                $person = "Kamy";

                $bcolor_mail = "blue";
                $color_mail = "black";

            } elseif (strtolower($appointment->person) == "mum" || $appointment->person == "1") {
                $bcolor = "hotpink";
                $color = "black";
                $bcolor_mail = "red";
                $color_mail = "black";
                $person = "Mum";
            }

            $msg .= "<div lang='fr' style='background-color: $bcolor;color:$color;margin: 1em;padding: 0.7em '>";
            $mail .= "<div lang='fr' style='color:$bcolor_mail '>";

            $edit = "<a href='https://www.ikamy.ch/public/admin/crud/ajax/edit_ajax.php?class_name=Calendar&id=$appointment->id'>$appointment->person</a>";
            $edit1 = "$appointment->person";

            $onclick = "onclick=\"return confirm('Are you sure you want to delete ID {$appointment->id}?');\"";

            $delete = "<a href='https://www.ikamy.ch/public/admin/crud/ajax/delete_ajax.php?class_name=Calendar&id=$appointment->id'>
            <span style='background-color: white;color: indianred;margin: 2em;padding: 0.7em; '><b>Delete ($appointment->id)</b></span></a>";
            $delete1 = "$appointment->person";

            $nbsp = str_repeat("&nbsp;", 20);

            $a1 = "<h3 lang='fr'>$coming_up $edit   : <b>" . h($appointment->title) . "</b> $myday</h3>";


            $a = "<div class='col-md-6'>$a1</div>";
            $b = "<div class='col-md-6 text-right'><span class='text-align-right' >  $delete</span></div>";

            $c = "<div class='row'>";
            $c .= $a;
            $c .= $b;
            $c .= "</div>";

            $a = "<div class='col-md-6'>$a1 $delete</div>";
            $b = "";

            $d = "<div class='row'>";
            $d .= $a;
            $d .= $b;
            $d .= "</div>";


            if (User::is_admin()) {
//                $msg .= "<h3 lang='fr'>$coming_up $edit   : <b>" . h($appointment->title) . "</b> $myday</h3>";
                $msg .= $c;
            } else {
                $msg .= "<h3 lang='fr'>$coming_up $edit1   : <b>" . h($appointment->title) . "</b> $myday</h3>";
            }

            if (1 == 2) {
                if (User::is_admin()) {
                    $msg .= "<span></span>lang='fr'>$coming_up $delete   : <b>" . h($appointment->title) . "</b> $myday</span>";
                } else {
                    $msg .= "<h3 lang='fr'>$coming_up $delete1   : <b>" . h($appointment->title) . "</b> $myday</h3>";
                }
            }


            $mail .= "<p  lang='fr'>$coming_up_mail $edit: <b>" . h($appointment->title) . "</b> ";

            $date = new DateTimeImmutable($appointment->start_date);

            $mydate = "$appointment->start_date $appointment->start_time";
            $hourmin = date("H:i", strtotime($mydate));


            $msg .= "<b> " . $date->format('l d.m.Y') . " @ " . $hourmin . "</b>";
            $mail .= "<b> " . $date->format('l d.m.Y') . " @ " . $hourmin . "</b> $myday_mail $nbsp $delete";

            if ($appointment->end_time != '00:00:00') {
                $mydate1 = "$appointment->start_date $appointment->end_time";
                $hourmin1 = date("H:i", strtotime($mydate1));
                $msg .= " To <b>" . $hourmin1 . "</b><br>";
                $mail .= " To <b>" . $hourmin1 . "</b> ";
            } else {
                $msg .= "<br>";
                $mail .= "<br>";
            }


            if ($appointment->comment != "") {
                $msg .= "<span lang='fr'>comment: <b>" . h($appointment->comment) . "</b></span><br>";
                $mail .= "<span lang='fr'> <b>" . h($appointment->comment) . "</b></span><br>";
            }

            $msg .= "</div>";

            if ($x !== $counts_appoitments) {
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

    public static function send_email($msg, $subject = "")
    {


        global $logo;
        $mail = new MyPHPMailer();

        $kamy = User::find_by_username("kamy");

        $message = $logo . "<br><br>";


        $btnRecurApp = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='https://www.ikamy.ch//public/_f/kamy/recurring_appointment.php'>Add Recuring Calendar</a>";

        $code = "65B0LXcRnSLqPLumdVjf"; //".u($code)."

        $btnCert = "<a  href='https://www.ikamy.ch//public/_f/kamy/recurring_appointment_email.php?code=65B0LXcRnSLqPLumdVjf' >Certificat Medical Email</a>";

        $btn = " <a href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=Calendar'><button class='btn-primary'>Add Date</button></a>";
        $view = " <a href='https://www.ikamy.ch/public/calendar.php'><button class='btn-primary'>View Web</button></a> $btnRecurApp ";

        $btnPast = "";

        if (isCalendarPast()) {
            $btnPast = " <a href='https://www.ikamy.ch/public/calendar.php?'><button class='btn-primary'>Future</button></a>";

        } else {
            $btnPast = " <a href='https://www.ikamy.ch/public/calendar.phptype=Past'><button class='btn-primary'>Past</button></a>";
        }

//        $btnNote = " <a class='btn btn-primary' href='https://www.ikamy.ch/public/admin/notes php'>Notes</a>";
//        $classeNewNote = "<span style='color:green;'><i class='fa fa-plus-square' style='font-size: 1.5em;'></i></span> Note";
//        $btnNoteAdd = " <a class='btn btn-primary' href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=Note'>$classeNewNote</a>";

        $btnNote = " <a style='padding: 0.1em' href='https://www.ikamy.ch/public/admin/notes.php'><button class='btn-warning'>Note</button></a>";
//        $classeNewNote = "<span ><i class='fa fa-plus-square' ></i></span> Note";
        $btnNoteAdd = " <a style='padding: 0.1em' href='https://www.ikamy.ch/public/admin/crud/ajax/new_ajax.php?class_name=Note''><button class='btn-warning'>Add Note</button></a>";

        $btnview = $btn . "&nbsp;&nbsp;&nbsp;  " . $view . "&nbsp;&nbsp;&nbsp;  " . $btnCert . "&nbsp;&nbsp;&nbsp;  " . $btnPast . "&nbsp;&nbsp;&nbsp;  " . $btnNote."&nbsp;&nbsp;&nbsp;  " . $btnNoteAdd;

        $message .= "Geneva " . date("l d/m/Y") . " - " . date("H:i") . "<br>$btnview<br>";

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

    public static function table_nav_additional()
    {
        $output = "</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . "/public/calendar.php" . "\">Calendar.php " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . "/public/_f/kamy/recurring_appointment.php" . "\">Recurring RDV " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-info\"  href=\"" . "/public/_f/kamy/recurring_appointment_email.php?code=65B0LXcRnSLqPLumdVjf" . "\">Recurring RDV email " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . "/public/admin/notes.php" . "\">Notes " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . "/public/admin/crud/ajax/new_ajax.php?class_name=Note" . "\">New Notes " . " </a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpenseType::$page_new . "\">Add New Type " . " </a></a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpensePerson::$page_manage . "\">View Person " . " </a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpenseType::$page_manage . "\">View Type " . " </a>";

//        $output .= "<a  class=\"btn btn-info\"  href=\"" . "/Inspinia/loan_exp.php" . "\">Mum " . " </a>";

        return $output;
//        return "";


    }

    public function delete()
    {
//        $this->send_email("deleted");
        return parent::delete(); // TODO: Change the autogenerated stub
    }

    public function table_calendar()
    {
        global $logo;
        $message = "";


        $date = date_create($this->start_date);
        $mydate = date_format($date, "d-M-Y");

        $message .= "<hr>";
        $message .= "<table>";

        $message .= $this->tr("Title:", "{$this->title}");
        $message .= $this->tr("Person", "{$this->person}");
        $message .= $this->tr("Start Date", "{$this->start_date}");
//            $message .= $this->tr("Date", "{$mydate}");
        $message .= $this->tr("Start time", "{$this->start_time}");
        $message .= $this->tr("End time", format_number($this->end_time));
        $message .= $this->tr("Comment", "{$this->comment}");
//            $message .= $this->tr("Amount CHF", format_number($this->amountCHF));


        $message .= "</table>";
        $message .= "<hr>";

        $message .= "<br>Many thanks<br>";


        $message .= "{$logo}<br>";


        return $message;
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

    public function form_validation()
    {
        $this->set_up_display();
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
//        $valid->validate_min_lengths(array('currency'=>3));
//        $valid->validate_max_lengths(array('currency'=>3));
        return $valid;


    }

    protected function set_up_display()
    {
//      $this->person="mum"  ;
//      $this->start_date="2023-05-02"  ;
//      $this->start_time="13:45:00";
//      $this->end_time="13:45:00";
//      $this->comment="dinguerie";

        if ($this->person == "0" || $this->person == 0) {
            $this->person = "Kamy";
        } elseif ($this->person == "1" || $this->person == 1) {
            $this->person = "Mum";
        }

        $this->start_datetime = "$this->start_date $this->start_time";
        $this->input_date = now_sql();

    }


}



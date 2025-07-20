<?php


/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class Note extends DatabaseObject
{

    public static $fields_numeric = ['id', 'rank', 'user_id', 'done', 'progress'];
    public static $get_form_element = ['note', 'user_id', 'web_address', 'done', 'due_date', 'rank', 'comment'];
    public static $get_form_element_others =  [];
    public static $form_default_value = [
        "rank" => "1",
        "user_id" => "2",
        "due_date" => "now()",
        "done" => "0",
        "progress" => "5"
    ];
    public static $db_field_search = ['search_all', 'note', 'done', 'due_date', 'rank', 'web_address', 'download_csv'];
    public static $page_name = "note";

//    public static $page_manage = "manage_note.php";
//    public static $page_new = "new_note.php";
//    public static $page_edit = "edit_note.php";
//    public static $page_delete = "delete_note.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Note"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Note"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Note"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Note"; //  "delete_link.php";
//    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyExpense"; //  "delete_link.php";
//    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=ToDoList"; //  "delete_link.php";

    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency =  [];
    public static $per_page;
    protected static $table_name = "note";
    protected static $db_fields = ['id', 'user_id', 'note', 'due_date', 'rank', 'web_address', 'comment', 'done', 'progress'];
    protected static $required_fields = ['user_id', 'note', 'done'];
    protected static $db_fields_table_display_short = ['id', 'user_id', 'notes', 'done', 'due_on', 'rank', 'comment'];
    protected static $db_fields_table_display_full = ['id', 'user_id', 'notes', 'done', 'progress', 'due_date', 'rank', 'web_address', 'comment', 'done'];
    protected static $db_field_exclude_table_display_sort = [];
    protected static $db_field_include_table_display_sort = ['link' => 'web_address', 'prog' => 'progress', 'notes' => 'note', 'due_on' => 'due_date'];

    protected static $form_properties = [

        "note" => ["type" => "text",
            "name" => 'note',
            "label_text" => "Note",
            "placeholder" => "Note",
            "required" => true,
        ],
        "user_id" => ["type" => "selectchosen",
            "name" => 'user_id',
            "class" => "User",
            "label_text" => "User",
            "select_option_text" => 'Username',
            'field_option_0' => "id",
            'field_option_1' => "username",
            "required" => true,
        ],
        "due_date" => ["type" => "date",
            "name" => 'due_date',
            "label_text" => "Due Date",
            "placeholder" => "Input Due Date",
            "required" => true,
        ],
        "done" => ["type" => "radio",
            [0,
                [
                    "label_all" => "Done/finished",
                    "name" => "done",
                    "label_radio" => "No",
                    "value" => "0",
                    "id" => "done_no",
                    "default" => true]],
            [1,
                [
                    "label_all" => "Done/finished",
                    "name" => "done",
                    "label_radio" => "Yes",
                    "value" => "1",
                    "id" => "done_yes",
                    "default" => false]],
        ],
        "progress" => ["type" => "number",
            "name" => 'progress',
            "label_text" => "Progress",
            'min' => 0,
            'max' => 100,
            'attr_class' => 'dial m-r',
            'datafgcolor' => "data-fgColor=\"#1AB394\"",
            'datawidth' => "data-width='85'",
            'dataheight' => "data-height='85'",
            "required" => true,
        ],
        "web_address" => ["type" => "url",
            "name" => 'web_address',
            "label_text" => "Website address",
            "placeholder" => "Website Address",
            "required" => false,
        ],
        "comment" => ["type" => "textarea",
            "name" => 'comment',
            "label_text" => "Comment",
            "placeholder" => "input Comment",
            "required" => false,
        ],
        "rank" => ["type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
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
        "note" => ["type" => "select",
            "name" => 'note',
            "id" => "search_note",
            "class" => "Note",
            "label_text" => "",
            "select_option_text" => 'Note',
            'field_option_0' => "note",
            'field_option_1' => "note",
            "required" => false,
        ],
        "done" => ["type" => "select",
            "name" => 'done',
            "id" => "search_done",
            "class" => "Note",
            "label_text" => "",
            "select_option_text" => 'Done',
            'field_option_0' => "done",
            'field_option_1' => "done",
            "required" => false,
        ],
        "rank" => ["type" => "select",
            "name" => 'rank',
            "id" => "search_rank",
            "class" => "MyExpenseType",
            "label_text" => "",
            "select_option_text" => 'rank',
            'field_option_0' => "rank",
            'field_option_1' => "rank",
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
    public $user_id;
    public $note;
    public $due_date;
    public $comment;
    public $rank;
    public $web_address;
    public $link;
    public $done;
    public $done_img;

    public $progress;
    public $prog;
    public $notes;
    public $due_on;

    public $link_edit;
    public $link_delete;
    public $link_all;


    public static function table_nav_additional()
    {
        $output = "</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-success\"  href=\"" . "/public/calendar.php" . "\">Calendar.php " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . "/public/_f/kamy/recurring_appointment.php" . "\">Recurring_appointment " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-info\"  href=\"" . "/public/_f/kamy/recurring_appointment_email.php?code=65B0LXcRnSLqPLumdVjf" . "\">Recurring_appointment_email " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-success\"  href=\"" . "/public/admin/notes.php" . "\">Notes.php " . " </a><span>&nbsp;</span>";//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpensePerson::$page_manage . "\">View Person " . " </a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpenseType::$page_manage . "\">View Type " . " </a>";

//        $output .= "<a  class=\"btn btn-info\"  href=\"" . "/Inspinia/loan_exp.php" . "\">Mum " . " </a>";

        return $output;
//        return "";


    }

    public static function table_nav_additional1()
    {

        $order_name = !empty($_GET["order_name"]) ? $_GET["order_name"] : 'id';
        $order_type = !empty($_GET["order_type"]) ? $_GET["order_type"] : 'ASC';
        $page = !empty($_GET['page']) ? (int)$_GET["page"] : 1;

        if (strtoupper($order_type) == 'ASC' && !empty($_GET["order_type"])) {
            $order_type = 'DESC';
        } else {
            $order_type = 'ASC';
        }

        $qstr = "?search_all=&done=0&submit=&page=" . $page . "&order_name=progress&order_type=" . $order_type;
//        $qstr="?search_all=&done=0&submit=&page=1&order_name=progress&order_type=DESC";

        if (isset($_GET['done']) && (int)$_GET['done'] == 0) {
            $done = 1;
            $done_txt = 'Show finished';
        } else {
            $done = 0;
            $done_txt = 'Show Open';
        }

        $output = "</a><span>&nbsp;</span>";


        $href = clean_query_string(static::$page_manage . "?search_all=&done={$done}&submit=");

        $output .= "<a  class=\"btn btn-info\"  href=\"" . $href . "\">{$done_txt} " . " </a><span>&nbsp;</span>";


        $output .= "<a  class=\"btn btn-info\"  href=\"" . clean_query_string(static::$page_manage . $qstr) . "\">progress" . " </a><span>&nbsp;</span>";


        return $output;
    }

    public static function quickupdate($ajax = false)
    {
        global $session;
        if (isset($_GET) && isset($_GET['id']) && $_GET['class_name'] === 'Note' && $_GET['action'] == 'quickupdate') {

            $id = $_GET['id'];
            $note = static::find_by_id($id);

            if ($note) {
                $note->done = !$note->done;
                $note->update();

                if ($ajax == true) {
                    return static::smallNotelist();
                } else {
                    redirect_to($_SERVER['PHP_SELF'] . "?viewAllNote=yes");
                }

            } else {
                $session->message("Note $id not found");
            }


        }
//       return 'hello';

    }

    public static function smallNotelist($ajax = false)
    {
        global $session;

//        $notes = static::find_all();
        $notes = static::find_by_sql("SELECT * FROM note  ORDER BY due_date ");


        $get = "?viewAllNote=yes" . "&class_name=" . get_called_class() . "&action=smallNoteList";
        $text = "Show All";

        $showall = false;
        isset($_GET['viewAllNote']) && $_GET['viewAllNote'] == 'yes' ? $showall = true : $showall = false;

        if ($showall) {
            $get = "?viewAllNote=no" . "&class_name=" . get_called_class() . "&action=smallNoteList";
            $text = "Show Open";
        }

        $link = $_SERVER['PHP_SELF'] . $get;
        $href = "<a id='h5href' href='" . $link . "' data-newhref='" . $get . "'>$text</a>";


        $output = "";

        $ibox = "";
        if ($Nav->current_page == 'profile') {
            $ibox = "<div class=\"ibox-tools\">
            <a class=\"collapse-link\">
                <i class=\"fa fa-chevron-up\"></i>
            </a>
            <a class=\"close-link\">
                <i class=\"fa fa-times\"></i>
            </a>
        </div>";
        }

        $classnew = "<span style='color:blue;'><i class='fa fa-plus' style='font-size: 1.5em;'></i></span>";
        $new = "<a  href='" . static::$page_new . "'>
            $classnew
            </a>";

        $output .= "

    <div class=\"ibox float-e-margins\">
    <div class=\"ibox-title\">
        <h5>Note list</h5> 
       <span><small>&nbsp;&nbsp;$href &nbsp;&nbsp; $new</small></span>
        $ibox
    </div>";


        $class1 = "fa fa-check-square";
        $class2 = "m-l-xs";


        $output .= "<div class=\"ibox-content\">";

        $output .= "<ul class=\"note-list m-t small-list\">";


        foreach ($notes as $note) {

            $myId = "<a href='https://www.ikamy.ch/public/admin/crud/ajax/edit_ajax.php?class_name=Note&id=" . u($note->id) . "'>" . $note->id . "</a>";

//            $done= !empty($note->done)  ?
//                "<span style='color:green;'><i  class='fa fa-check-square'></i></span>"  :
//                "<span style='color:red;'><i  class='fa fa-minus-circle'></i></span>" ;

            if ((int)$session->user_id !== (int)$note->user_id) {

            } else {


                $note->set_up_display();


//                $done = !empty($note->done) ?
//                    "<a href='{$_SERVER['PHP_SELF']}?id=" . u($note->id) . "&class_name=" . get_called_class() . "&action=quickupdate" . "' >
//                     <span style='color:green;'><i  class='fa fa-check-square'></i></span>
//                     </a>"
//                    :
//                    "<a href='{$_SERVER['PHP_SELF']}?id=" . u($note->id) . "&class_name=" . get_called_class() . "&action=quickupdate" . "' >
//                     <span style='color:plum;'><i  class='fa fa-square-o'></i></span></a>";

                if ((int)$note->done === 1) {
                    $class1 = "fa fa-check-square";
                    $class1_1 = "<span style='color:green;'><i  class='fa fa-check-square'></i></span>";
                    $class2 = "m-l-xs";
                    $showall == true ? $myshow = true : $myshow = false;
                    $data_done = "yes";
                } else {
                    $class1 = "fa fa-square-o";
                    $class1_1 = "<span ><i  class='fa fa-square-o'></i></span>";
                    $class2 = "m-l-xs note-completed";
                    $showall == true ? $myshow = true : $myshow = true;
                    $data_done = "no";

                }


                $done = !empty($note->done) ?
                    "<a href='{$_SERVER['PHP_SELF']}?id=" . u($note->id) . "&class_name=" . get_called_class() . "&action=quickupdate" . "' class='check-link smallNoteChecklink'>
                     <span style='color:green;'><i  class='fa fa-check-square'></i></span>
                     </a>"
                    :
                    "<a href='{$_SERVER['PHP_SELF']}?id=" . u($note->id) . "&class_name=" . get_called_class() . "&action=quickupdate" . "' class='check-link smallNoteChecklink'>
                     <span style='color:plum;'><i  class='fa fa-square-o'></i></span></a>";


                if ($myshow) {

                    $short_href = $_SERVER['PHP_SELF'] . "?id={$note->id}&viewAllNote=yes&class_name=Note&action=quickupdate";
//                    $short_href = $_SERVER['PHP_SELF'] . "?id={$note->id}&viewAllNote=yes&class_name=Note&action=quickupdate";


                    $new_href = "?id={$note->id}&viewAllNote=yes&class_name=Note&action=quickupdate";


                    if ($ajax) {
                        $output .= "<li style='list-style: none;font-size: smaller;margin-left: 0'  class='ul-list-SmallNote'  data-myid='{$note->id}' id='ul-list-SmallNote{$note->id}'>";
//                        $output .= "<a href='$short_href' class='check-link smallNoteChecklink' data-newhref='{$new_href}'  ><i class='{$class1}'></i> </a>";
                        $output .= "<a href='$short_href' class='check-link smallNoteChecklink' data-newhref='{$new_href}'  >$class1_1 </a>";
                        $output .= "<span class='{$class2}'>";
                        $output .= "&nbsp;&nbsp;" . $myId . " &nbsp;  " . $note->notes . "&nbsp;&nbsp;" . "  " . "<span style='font-size: xx-small;color: blueviolet'><b>" . $note->due_on . "</b></span>"; //."  ".$href
                        $output .= "</span>";
                        $output .= "</li>";
                    } else {
                        $output .= "<li style='list-style: none;font-size: smaller;margin-left: 0'  class='ul-list-SmallNote'  data-myid='{$note->id}' id='ul-list-SmallNote{$note->id}'>";
                        $output .= "<a href='$short_href' class='check-link smallNoteChecklink' data-newhref='{$new_href}'  >$class1_1 </a>";
                        $output .= "<span class='{$class2}'>";
                        $output .= "&nbsp;&nbsp;" . $myId . " &nbsp;  " . $note->notes . "&nbsp;&nbsp;" . "  " . "<span style='font-size: xx-small;color: blueviolet'><b>" . $note->due_on . "</b></span>"; //."  ".$href
                        $output .= "</span>";
                        $output .= "</li>";
                    }


//                    if (!empty($note->id)) {
//
//                        $output .= "<li style='list-style: none;font-size: smaller;margin-left: 0'  class='ul-list-SmallNote'  data-myid='{$note->id}' id='ul-list-SmallNote{$note->id}'>";
//                        if ($ajax) {
////                            $output .= "<a href='$short_href' class='check-link smallNoteChecklink' data-newhref='{$new_href}'  ><i class='{$class1}'></i> </a>";
//                            $output .= $done;
//                        } else {
//                            $output .= $done;
//                        }
////                        $output .= "<a href='$short_href' class='check-link smallNoteChecklink' data-newhref='{$new_href}'  ><i class='{$class1}'></i> </a>";
//                        $output .= "<span class='{$class2}'>";
//                        $output .= "&nbsp;&nbsp;" . $myId . " &nbsp;  " . $note->notes . "&nbsp;&nbsp;" . " $done " . "<span style='font-size: xx-small;color: blueviolet'><b>" . $note->due_on . "</b></span>"; //."  ".$href
//                        $output .= "</span>";
//                        $output .= "</li>";
//
//                    }


                }
            }

        }

        $output .= "</ul>";

        $output .= " 
                    </div>
                    </div>
                    ";
//        log_debug($output);

        return $output;


    }

    public static function SendsmallNotelist($ajax = false)
    {
        global $session;

        $notes = static::smallNotelist();

        global $logo;
        $mail = new MyPHPMailer();

        $kamy = User::find_by_username("kamy");

        $message = $logo . "<br><br>";

        $mail->addAddress($kamy->email, $kamy->nom);
//        $mail->addBCC("kamy@ikamy.ch");
        $mail->Subject = $subject;

        $message .= $notes;

        //Send HTML or Plain Text email
        $mail->isHTML(true);
        $mail->Body = $message;
        //   $mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        return $message . "";

    }

    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);

        if (isset($this->web_address) && !empty($this->web_address)) {
            $valid->validate_website('web_address');
        }
        isset($this->done) ? $valid->is_numeric(['done']) : "";
        isset($this->progress) ? $valid->is_numeric(['progress']) : "";

        return $valid;


    }

    protected function set_up_display()
    {
        global $session;
        global $Nav;
        $this->user_id = $session->user_id;

        if (!empty($this->web_address) && isset($this->id)) {
            $this->link = "<a href='{$this->web_address}'  target='_blank'><u>link</u></a>";
            $this->notes = "<a href='{$this->web_address}' target='_blank' style='text-decoration: none;'><u>" . $this->note . "</u></a>";


            $this->done_img = !empty($note->done) ?
                "<span style='color:green;'><i  class='fa fa-check-square'></i></span>" :
                "<span style='color:plum;'><i  class='fa fa-minus-circle'></i></span>";


            $class = get_called_class() . "-link-edit";
            $id = $class . $this->id;

            $nav_edit = $Nav->http . "/public/admin/ajax/ajax_edit.php?id=" . u($this->id) . "&class_name=" . u(get_called_class()) . "";
            $nav_delete = $Nav->http . "/public/admin/ajax/ajax_delete.php?id=" . u($this->id) . "&class_name=" . u(get_called_class()) . "";

            $nav_edit = "data-myHrefEdit" . get_called_class() . "='" . $nav_edit . "'";
            $nav_delete = "data-myHrefDelete" . get_called_class() . "='" . $nav_delete . "'";

            $this->link_edit = "<a href='" . static::$page_edit . "?id=" . u($this->id)
                . "&class_name=" . get_called_class() . "&action=edit" . "'  id='{$id}' $nav_edit class='$class' >"
                . "<i style='color:blue;'  class='fa fa-pencil'></i></a>";

            $class = get_called_class() . "-link-delete";
            $id = $class . $this->id;

            $this->link_delete = "<a href='" . static::$page_delete . "?id=" . u($this->id)
                . "&class_name=" . get_called_class() . "&action=delete" . "'  id='{$id}' $nav_delete class='$class' >"
                . "<i style='color:red;' class='fa fa-minus-circle'></i></a>";

            $class = get_called_class() . "-link-all";
            $id = $class . $this->id;

            $this->link_all = "<span style='display:none;' data-id='{$this->id}' id='{$id}' class=' pull-right $class'>" .
                $this->link_edit . "&nbsp;&nbsp;" . $this->link_delete
                . "</span>";

        } else {
            $this->notes = $this->note;
        }

        if (isset($this->done) && (int)$this->done === 1) {
            $this->progress = 100;
        }

        if (isset($this->due_date)) {
            $this->due_on = date_to_text($this->due_date);
        }

        if (isset($this->progress)) {
            $this->prog = "<input type='number' value='" . $this->progress . "' class='dial m-r disabled' data-fgColor='#1AB394' data-width='60' data-height='60'/>";
        }

    }

    public static function get_view_note($search)
    {

        $sql = static::find_by_sql("SELECT * FROM note  ORDER BY due_date ");
        if ($_GET['viewAllNote'] == 'yes') {
            $sql = static::find_by_sql("SELECT * FROM note  ORDER BY due_date ");
        } elseif ($_GET['viewAllNote'] == 'no') {
            $sql = static::find_by_sql("SELECT * FROM note where done=0  ORDER BY due_date ");
        } elseif ($_GET['viewAllNote'] == 'done') {
            $sql = static::find_by_sql("SELECT * FROM note where done=1   ORDER BY due_date ");
        } else {
            $sql = static::find_by_sql("SELECT * FROM note  ORDER BY due_date ");
        }
        return $sql;


    }

    public static function Notelist()
    {
        $output = "";

        $output .= "<style>
        .btn-inactif {
            background-color: #E8F1D4;
            color: grey;
        }
            .btn-actif {
            background-color: #FFFDD0;
            color: black;
            }"
            . "</style>";

        $text_header= "<b>Notes</b>";

        $color_btn_inactif = "inactif";
        $color_btn_actif = "actif";

        $btn_color_all = "btn-$color_btn_inactif btn-lg";
        $btn_color_open = "btn-$color_btn_inactif btn-lg";
        $btn_color_done = "btn-$color_btn_inactif btn-lg";

        $btn_text_a = "Show All";
        $btn_text_o = "Show Open";
        $btn_text_d = "Show Done";

        $btn_disabled_a = "";
        $btn_disabled_o = "";
        $btn_disabled_d = "";

        $btn_hidden_a = "";
        $btn_hidden_o = "";
        $btn_hidden_d = "";

        $notes = static::get_view_note('sql');
        if (isset($_GET['viewAllNote'])) {
            if ($_GET['viewAllNote'] == 'yes') {
                $btn_color_all = "btn-$color_btn_actif btn-lg";
                $btn_text_a = "<b>Showing All</b>";
                $btn_disabled_a = "disabled";
                $text_header = "<b>Notes</b><span style='font-size: smaller'> (All)</span>";
                $btn_hidden_a = "style='display: none;'";

            } elseif ($_GET['viewAllNote'] == 'no') {
                $btn_color_open = "btn-$color_btn_actif btn-lg";
                $btn_text_o = "<b>Showing Open</b>";
                $btn_disabled_o = "disabled";
                $text_header = "<b>Notes</b><span style='font-size: smaller'> (Open)</span>";
                $btn_hidden_o = "style='display: none;'";
            } elseif ($_GET['viewAllNote'] == 'done') {
                $btn_color_done = "btn-$color_btn_actif btn-lg";
                $btn_text_d = "<b>Showing Done</b>";
                $btn_disabled_d = "disabled";
                $text_header = "<b>Notes</b><span style='font-size: smaller'> (Done)</span>";
                $btn_hidden_d = "style='display: none;'";
            }
        }

        $output .= "<div style='font-size: larger;margin-bottom: 10px' class='row'>";
        $output .= "<h2 class='text-center' style='color: #483C32'>$text_header</h2>";
        $output .= "</div>";

        $output .= "<div style='font-size: larger' class='row'>";
        $output .= "<div class='col-md-1'>";
        $output .= "<a href='" . static::$page_new . "' class='btn btn-taupe btn-lg ' id='btnAddNote'>Add Note</a>";
        $output .= "</div>";


        $output .= "<div $btn_hidden_a class='col-md-1 col-md-offset-2'>";
        $output .= "<a href='" . $_SERVER['PHP_SELF'] . "?viewAllNote=yes' class='btn $btn_color_all ' $btn_disabled_a>$btn_text_a</a>";
        $output .= "</div>";

        $output .= "<div $btn_hidden_o class='col-md-1 col-md-offset-2'>";
        $output .= "<a href='" . $_SERVER['PHP_SELF'] . "?viewAllNote=no' class='btn {$btn_color_open }'  $btn_disabled_o >$btn_text_o</a>";
        $output .= "</div>";

        $output .= sprintf("<div %s class='col-md-1 col-md-offset-2'>", $btn_hidden_d);
        $output .= sprintf("<a href='%s?viewAllNote=done' class='btn {$btn_color_done}' {$btn_disabled_d} >{$btn_text_d}</a>", $_SERVER['PHP_SELF']);
        $output .= '</div>';

        $output .= '</div>';

        foreach ($notes as $note) {
            $note->set_up_display();

            $done = !empty($note->done) ?
                sprintf("<a href='{$_SERVER['PHP_SELF']}?id=%s&class_name=%s&action=quickupdate' >
                 <span style='color:green;'><i  class='fa fa-check-square'></i></span>
                </a>", u($note->id), get_called_class())
                :
                "<a href='{$_SERVER['PHP_SELF']}?id=" . u($note->id) . "&class_name=" . get_called_class() . "&action=quickupdate" . "' >
                <span ><i  class='fa fa-square-o'></i></span></a>";

            $classedit = "<span style='color:green;'><i class='fa fa-pencil' style='font-size: 1.5em;'></i></span>";
            $edit = "<a  href='" . static::$page_edit . "&id=" . u($note->id) . "'>
            $classedit
            </a>";

            $classnew = "<span style='color:blue;'><i class='fa fa-plus' style='font-size: 1.5em;'></i></span>";
            $new = "<a  href='" . static::$page_new . "&id=" . u($note->id) . "'>
            $classnew
            </a>";


            $classdelete = "<span style='color:red;'><i  class='fa fa-minus-circle' style='font-size: 1.5em;'></i></span>";
            $delete = "<a href='" . static::$page_delete . "&id=" . u($note->id) . "&action=delete' 
            onclick=
            'return confirm(\"Are you sure you want to delete this note {$note->id}?\");'>
            <span>$classdelete</span></a>";

            $id = "<a href='" . static::$page_edit . "&id=" . u($note->id) . "'><span style='font-size: smaller;color: lightgrey'>#{$note->id}</span></a>";
            $date = "<span style='font-size: smaller;color: grey'>{$note->due_on}</span>";


//            $color_note_bg="#EEEEEE";
//            $color_note_color="#2B3856";
//            $color_h4_color="#191970";


            $output .= "<div  class='row' style='margin-top: 10px;background-color: #F8F6F0;color: #2B3856'>";
            $output .= "<div class='col-md-9'>";

            $output .= !empty($note->note) ? "<h4>$id <span style='color: #191970'> " . $note->note . "</span>
              " . $done . "
            $date</h4>" : '';

//            $output .= !empty($note->due_date) ? "<p>" . $note->due_on . "</p>" : '';
            $output .= !empty($note->comment) ? "<p style='margin-left: 30px'><em>" . $note->comment . "</em></p>" : '';
            $output .= !empty($note->web_address) ? "<p>" . $note->web_address . "</p>" : '';
//            $output .= !empty($note->rank) ? "<p>Rank: " . $note->rank . "</p>" : '';


            $output .= "</div style='background-color: white;'>";
//            $output .= "<div class='pull-right' style='margin: 5px auto;' >";
            $output .= "<div class='pull-right' style='margin: 20px; display: flex; align-items: center;>";
            $output .= $edit . "&nbsp;&nbsp;&nbsp; " . $delete;
            $output .= "</div>";


            $output .= "</div>";
        }
        return $output;
    }


}
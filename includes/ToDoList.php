<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */
//protected static $db_fields = array('','','','','','','','','','');

class ToDoList extends DatabaseObject
{

    public static $fields_numeric = array('id', 'rank', 'user_id', 'done', 'progress');
    public static $get_form_element = array('todo', 'user_id', 'web_address', 'done', 'progress', 'due_date', 'rank', 'comment');
    public static $get_form_element_others = array();
    public static $form_default_value = array(
        "rank" => "1",
        "user_id" => "2",
        "due_date" => "now()",
        "done" => "0",
        "progress" => "5"
    );
    public static $db_field_search = array('search_all', 'todo', 'done', 'due_date', 'rank', 'web_address', 'download_csv');

    public static $page_name = "ToDo List";
//    public static $page_manage = "manage_ToDoList.php";
//    public static $page_new = "new_ToDoList.php";
//    public static $page_edit = "edit_ToDoList.php";
//    public static $page_delete = "delete_ToDoList.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=ToDoList"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=ToDoList"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=ToDoList"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=ToDoList"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = array();
    public static $per_page;
    protected static $table_name = "to_do_list";
    protected static $db_fields = array('id', 'user_id', 'todo', 'due_date', 'rank', 'web_address', 'comment', 'done', 'progress');
    public static $required_fields = array('user_id', 'todo', 'done');
    protected static $db_fields_table_display_short = array('id', 'user_id', 'todos', 'done', 'prog', 'due_on', 'rank', 'comment');
    protected static $db_fields_table_display_full = array('id', 'user_id', 'todos', 'done', 'prog', 'progress', 'due_date', 'rank', 'web_address', 'comment', 'done');
    protected static $db_field_exclude_table_display_sort = array();
    protected static $db_field_include_table_display_sort = array(
        'link' => 'web_address', 'prog' => 'progress', 'todos' => 'todo', 'due_on' => 'due_date');

    protected static $form_properties = array(

        "todo" => array("type" => "text",
            "name" => 'todo',
            "label_text" => "To Do",
            "placeholder" => "To Do item",
            "required" => true,
        ),
        "user_id" => array("type" => "selectchosen",
            "name" => 'user_id',
            "class" => "User",
            "label_text" => "User",
            "select_option_text" => 'Username',
            'field_option_0' => "id",
            'field_option_1' => "username",
            "required" => true,
        ),
        "due_date" => array("type" => "date",
            "name" => 'due_date',
            "label_text" => "Due Date",
            "placeholder" => "Input Due Date",
            "required" => true,
        ),
        "done" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Done/finished",
                    "name" => "done",
                    "label_radio" => "No",
                    "value" => "0",
                    "id" => "done_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Done/finished",
                    "name" => "done",
                    "label_radio" => "Yes",
                    "value" => "1",
                    "id" => "done_yes",
                    "default" => false)),
        ),
        "progress" => array("type" => "number",
            "name" => 'progress',
            "label_text" => "Progress",
            'min' => 0,
            'max' => 100,
            'attr_class' => 'dial m-r',
            'datafgcolor' => "data-fgColor=\"#1AB394\"",
            'datawidth' => "data-width='85'",
            'dataheight' => "data-height='85'",
            "required" => true,
        ),
        "web_address" => array("type" => "url",
            "name" => 'web_address',
            "label_text" => "Website address",
            "placeholder" => "Website Address",
            "required" => false,
        ),
        "comment" => array("type" => "textarea",
            "name" => 'comment',
            "label_text" => "Comment",
            "placeholder" => "input Comment",
            "required" => false,
        ),
        "rank" => array("type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
            "required" => true,
        ),
    );
    protected static $form_properties_search = array(
        "search_all" => array("type" => "text",
            "name" => 'search_all',
            "label_text" => "",
            "placeholder" => "Search all",
            "required" => false,
        ),
        "todo" => array("type" => "select",
            "name" => 'todo',
            "id" => "search_todo",
            "class" => "ToDoList",
            "label_text" => "",
            "select_option_text" => 'To Do',
            'field_option_0' => "todo",
            'field_option_1' => "todo",
            "required" => false,
        ),
        "done" => array("type" => "select",
            "name" => 'done',
            "id" => "search_done",
            "class" => "ToDoList",
            "label_text" => "",
            "select_option_text" => 'Done',
            'field_option_0' => "done",
            'field_option_1' => "done",
            "required" => false,
        ),
        "rank" => array("type" => "select",
            "name" => 'rank',
            "id" => "search_rank",
            "class" => "ToDoList",
            "label_text" => "",
            "select_option_text" => 'rank',
            'field_option_0' => "rank",
            'field_option_1' => "rank",
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

    );
    public $id;
    public $user_id;
    public $todo;
    public $due_date;
    public $comment;
    public $rank;
    public $web_address;
    public $link;
    public $done;

    public $progress;
    public $prog;
    public $todos;
    public $due_on;

    public $link_edit;
    public $link_delete;
    public $link_all;

    public static function table_nav_additional()
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

        if (isset($_GET) && isset($_GET['id']) && $_GET['class_name'] === 'ToDoList' && $_GET['action'] == 'quickupdate') {

            $id = $_GET['id'];
//      if(is_numeric
            $todo = static::find_by_id($id);


            if ($todo) {
                if ((int)$todo->done == 1) {
                    $todo->done = 0;
                } else {
                    $todo->done = 1;
                }

                $todo->update();

//  sleep(10);

                if ($ajax == true) {
                    return static::smallTodolist();
//    return "'yeahhh'";
                } else {
                    redirect_to($_SERVER['PHP_SELF']);

                }
//      redirect_to('profile.php');

            }


        }
//       return 'hello';

    }

    public static function smallTodolist($ajax = false, $ibox = true)
    {
        global $session;

        $todos = static::find_all();
        $get=  "?viewAllTodo=yes" ."&class_name=".get_called_class()."&action=smallTodoList";
        $text="Show All";

        $showall = false;
        isset($_GET['viewAllTodo']) && $_GET['viewAllTodo'] == 'yes' ? $showall = true : $showall = false;

        if($showall){
            $get=  "?viewAllTodo=no" ."&class_name=".get_called_class()."&action=smallTodoList";
            $text="Show Open";
        }

        $link=$_SERVER['PHP_SELF'] .$get;
        $href = "<a id='h5href' href='" .$link."' data-newhref='".$get."'>$text</a>";


        $output = "";

        $output .= "
    <div class=\"col-lg-4 col-lg-offset-1\"  style='margin-top: 2em'>
    <div class=\"ibox float-e-margins\">
    <div class=\"ibox-title\">
        <h5>todo list</h5>
       <span><small>&nbsp;&nbsp;$href</small></span>
        <div class=\"ibox-tools\">
            <a class=\"collapse-link\">
                <i class=\"fa fa-chevron-up\"></i>
            </a>
            <a class=\"close-link\">
                <i class=\"fa fa-times\"></i>
            </a>
        </div>
    </div>";

        $class1 = "fa fa-check-square";
        $class2 = "m-l-xs";


        $output .= "<div class=\"ibox-content\">";

        $output .= "<ul class=\"todo-list m-t small-list\">";


        foreach ($todos as $todo) {

            if ((int)$session->user_id !== (int)$todo->user_id) {

            } else {


                $todo->set_up_display();

                if ((int)$todo->done === 1) {
                    $class1 = "fa fa-square-o";
                    $class2 = "m-l-xs todo-completed";
                    $showall == true ? $myshow = true : $myshow = false;
                    $data_done="yes";
                } else {
                    $class1 = "fa fa-check-square";
                    $class2 = "m-l-xs";
                    $showall == true ? $myshow = true : $myshow = true;
                    $data_done="no";

                }

                if ($myshow ) {

                    $short_href=$_SERVER['PHP_SELF'] . "?id={$todo->id}&viewAllTodo=yes&class_name=ToDoList&action=quickupdate";
//                 $href = "<a href='" . $short_href . "'>update</a>";


                    $new_href= "?id={$todo->id}&viewAllTodo=yes&class_name=ToDoList&action=quickupdate";


                    if (!empty($todo->id)) {
                        $output .= "<li class='ul-list-SmallTodo'  data-myid='{$todo->id}' id='ul-list-SmallTodo{$todo->id
}'>";
                        $output .= "<a href=\"$short_href\" class=\"check-link smallToDoListChecklink\" data-newhref='{$new_href}'  ><i class=\"{$class1}\"></i> </a>";
                        $output .= "<span class='{$class2}'>";
                        $output .= $todo->todos . "&nbsp;&nbsp;" . $todo->link_all; //."  ".$href
                        $output .= "</span>";
                        $output .= "</li>";

                    }


                }
            }

        }

        $output .= "</ul>";

        $output .= " </div>
                    </div>
                    </div>
                    ";
//        log_debug($output);


        return $output;


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
            $this->todos = "<a href='{$this->web_address}' target='_blank' style='text-decoration: none;'><u>" . $this->todo . "</u></a>";


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
            $this->todos = $this->todo;
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





}
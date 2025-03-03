<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */
//protected static $db_fields = array('','','','','','','','','','');

class Chat extends DatabaseObject {

    public static $fields_numeric = array('id', 'user_id', 'to_user_id', 'readit',);
    public static $get_form_element = array('user_id', 'to_user_id', 'readit', 'message', 'input_date');
    public static $get_form_element_others = array();
    public static $form_default_value = array(
        "input_date" => 'nowtime()',
        "readit" => 0

    );
    public static $db_field_search = array('search_all', 'chat', 'download_csv');
    public static $form_user_id;
    public static $page_name = "Chat";

//    public static $page_manage = "manage_chat.php";
//    public static $page_new = "new_chat.php";
//    public static $page_edit = "edit_chat.php";
//    public static $page_delete = "delete_chat.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Chat"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Chat"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Chat"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Chat"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    protected static $table_name = "chat";
    protected static $db_fields = array('id', 'user_id', 'to_user_id', 'readit', 'message', 'input_date');
    protected static $required_fields = array('user_id', 'to_user_id', 'readit', 'message', 'input_date');
    protected static $db_fields_table_display_short = array('id', 'user_id', 'to_user_id', 'readit', 'message', 'input_date');
    protected static $db_fields_table_display_full = array('id', 'user_id', 'to_user_id', 'readit', 'message', 'input_date');
    protected static $db_field_exclude_table_display_sort = null;
    protected static $form_properties = array(
        "user_id" => array("type" => "selectchosen",
            "name" => 'user_id',
            "class"=>"User",
            "label_text"=>"User",
            "select_option_text"=>'Username',
            'field_option_0'=>"id",
            'field_option_1'=>"username",
            "required" =>true,
        ),
//        "user_id"=> array("type"=>"number",
//            "name"=>'user_id',
//            "label_text"=>"From",
//            "placeholder"=>"Message here",
//            "required" =>true,
////            "readonly"=>true,
//            "add_class"=>"hidden",
//
//        ),

        "to_user_id" => array("type" => "selectchosen",
            "name" => 'to_user_id[]',
            "class"=>"User",
            "label_text"=>"To",
            'field_option_0'=>"id",
            'field_option_1'=>"username",
            "required" =>true,
            "multiple" => true,

//            "size"=>"100",
        ),
        "message"=> array("type"=>"textarea",
            "name"=>'message',
            "label_text"=>"Message",
            "placeholder"=>"Message here",
            "required" =>true,
        ),
        "readit" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "read",
                    "name" => "readit",
                    "label_radio"=>"No",
                    "value"=>"0",
                    "id" => "readit_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Read",
                    "name" => "readit",
                    "label_radio"=>"Yes",
                    "value"=>"1",
                    "id" => "readit_yes",
                    "default"=>false)),
        ),
        "input_date"=> array("type"=>"datetime",
            "name"=>'input_date',
            "label_text"=>"DateTime",
            "placeholder"=>"current date",
            "required" =>true,
        ),

    );
    protected static $form_properties_search=array(
        "search_all"=> array("type"=>"text",
            "name"=>'search_all',
            "label_text"=>"",
            "placeholder"=>"Search all",
            "required" =>false,
        ),
        "download_csv" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Dnld csv",
                    "name"=>"download_csv",
                    "label_radio"=>"non",
                    "value"=>"No",
                    "id"=>"visible_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Dnld csv",
                    "name"=>"download_csv",
                    "label_radio"=>"oui",
                    "value"=>"Yes",
                    "id"=>"visible_yes",
                    "default"=>true)),
        ),
        "id"=> array("type"=>"number",
            "name"=>'id',
            "id"=>"search_id",
            "label_text"=>"",
            'min'=>0,
            "placeholder"=>"ID",
            "required" =>false,
        ),
        "user_id"=> array("type"=>"select",
            "name"=>'user_id',
            "id"=>"search_user_id",
            "class"=>"User",
            "label_text"=>"",
            "select_option_text"=>'Username',
            'field_option_0'=>"username",
            'field_option_1'=>"username",
            "required" =>false,
        ),
        "to_user_id"=> array("type"=>"select",
            "name"=>'to_user_id',
            "id"=>"search_to_user_id",
            "class"=>"User",
            "label_text"=>"",
            "select_option_text"=>'Username',
            'field_option_0'=>"username",
            'field_option_1'=>"username",
            "required" =>false,
        ),


    );
    public $id;
    public $user_id;
    public $to_user_id;
    public $message;
    public $input_date;
    public $readit;
    public $username;
    public $to;

    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". static::$page_new ."\">Add To Do ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpensePerson::$page_new ."\">Add New Person ". " </a></a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpense::$page_manage ."\">View Expense ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpensePerson::$page_manage ."\">View Person ". " </a>";
        return $output;
    }

//    public function set_up_display(){
//        global $session;
//        $this->user_id=$session->user_id;
//    }

    public static function  get_chat(){
        global $session;
        global $path_admin;

        $sql="SELECT * FROM ".static::$table_name.' WHERE to_user_id ='.$session->user_id." ORDER BY input_date DESC";
        $output="";
        if ($session->is_logged_in()) {
            $chats=static::find_by_sql($sql);
            $count_chat=static::count_all_where(' WHERE user_id ='.$session->user_id);

            $output.="                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle count-info\" data-toggle=\"dropdown\" href=\"#\">" ;
            $output.="        <i class=\"fa fa-envelope\"></i>  <span class=\"label label-warning\">" ;
            $output.=$count_chat ;
            $output.="</span>
                    </a>
                    <ul class=\"dropdown-menu dropdown-messages\">
                        <li>" ;
            $output.="" ;
            $output.="" ;

            foreach($chats as $chat){
                $output.= $chat->get_message_nav($chat);

            }
            $output.=" <li>";
            $output.="                 <div class=\"text-center link-block\">";
            $output.="                     <a href=\"". $path_admin."chat.php\">";
            $output.="                         <i class=\"fa fa-envelope\"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>" ;
            $output.="" ;
            $output.="" ;
            $output.="" ;
            $output.="" ;
            $output.="" ;

            return $output;

        }
        return $output;
    }

    public static function get_chat_body(){
        global $session;

        /** @noinspection SqlResolve */
        $sql="SELECT * FROM ".static::$table_name.' WHERE to_user_id ='.$session->user_id." ORDER BY input_date DESC";
        $output="";

        $form="<div class='form-chat'>
    <div class='input-group input-group-sm'><input type='text' class='form-control'> <span class='input-group-btn'> <button
                class='btn btn-primary' type='button'>Send
                </button> </span></div>
</div>";

        if ($session->is_logged_in()) {
            $chats=static::find_by_sql($sql);
            $count_chat=static::count_all_where(' WHERE user_id ='.$session->user_id);

            $output.= "
<div class='col-lg-4 col-lg-offset-1' style='margin-top: 2em'>
                                <div class='ibox float-e-margins'>";

            $output.= "          <div class='ibox-title'>
                                        <h5>Your Messages
                                        <span class='label label-warning-light pull-right'>$count_chat Messages</span>
                                        </h5>
                                      
                                           
                                                   <div class=\"ibox-tools\">
                                                    <a class=\"collapse-link\">
                                                    <i class=\"fa fa-chevron-up\"></i>
                                                        </a>
                                                        <a class=\"close-link\">
                                                            <i class=\"fa fa-times\"></i>
                                                        </a>
                                                    </div>
                                           
                                    </div>";


            $output.= "             <div class='ibox-content'>
$form
                                        <div>
                                            <div class='feed-activity-list'>";

            foreach($chats as $chat){
                $output.= $chat->get_message_body($chat);

            }


            $output.= "                                </div>

                                            <button class='btn btn-primary btn-block m-t'><i class='fa fa-arrow-down'></i> Show More</button>

                                        </div>

                                    </div>
                                </div>

                            </div>
    ";
        }
        return $output;


    }

    protected static function set_form_default_value()
    {
        global $session;
        static::$form_default_value["user_id"] = $session->user_id;

    }

    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
        return $valid;


    }

    public function get_message_nav($chat)
    {
        global $path_admin;
        $chat->set_up_display();
        $from_user = User::find_by_id($chat->user_id);

        $when = DateDifferenceFormat($chat->input_date, unixToMySQL(time()));


        $output = "";
        $output .= "<div class=\"dropdown-messages-box\">";
        $output .= "<a href=\" $path_admin profile.php\" class=\"pull-left\">";
        $output .= "   <img alt=\"image\" class=\"img-circle\" src=\"";
        $output .= $from_user->user_path_and_placeholder();
        $output .= "\" >";
        $output .= "</a>";
        $output .= "<div class=\"media-body\">";
        $output .= "             <small class=\"pull-right\">";
        $output .= $when;
        $output .= "</small><strong><span style=\"color: blue\">";
        $output .= $from_user->full_name();
        $output .= "</span></strong> wrote:<br> <strong>";
        $output .= $chat->message;
        $output .= "</strong>. <br>
                                    <small class=\"text-muted\">";
        $output .= datetime_to_text($chat->input_date);
        $output .= "</small>
                                </div>
                            </div>
                        </li>
                        <li class=\"divider\"></li>";

        $output .= "";
        $output .= "";
        $output .= "";
        $output .= "";

        return $output;
    }

    public function get_message_body(Chat $chat){
        $chat->set_up_display();
        $from_user=User::find_by_id($chat->user_id);

        $when=DateDifferenceFormat($chat->input_date , unixToMySQL(time()) );

        $user_link=$from_user->user_path_and_placeholder();
        $datetime= datetime_to_text($chat->input_date);
        $message=$chat->message;
        $fullname=$from_user->full_name();




        $output = "";

        $action= "                            <div class='actions'>
                                                            <a class='btn btn-xs btn-white'><i class='fa fa-thumbs-up'></i> Like </a>
                                                            <a class='btn btn-xs btn-white'><i class='fa fa-heart'></i> Love</a>
                                                        </div>";

        $output.= "                           <div class='feed-element'>
                                                    <a href='profile.php' class='pull-left'>
                                                        <img alt='image' class='img-circle' src='$user_link'>
                                                    </a>
                                                    <div class='media-body '>
                                                        <small class='pull-right'>$when</small>
                                                        <strong>$fullname</strong><strong></strong><br>
                                                        <small class='text-muted'>$datetime</small>
                                                        <div class='well'>$message</div>
                                                     </div>
                                                     $action
                                                </div>";


        return $output;

    }

    public function set_up_display()
    {
        $this->find_username();

    }

    protected function find_username()
    {
        $user = User::find_by_id($this->user_id);
        $this->username = $user->username;

        $user = User::find_by_id($this->to_user_id);
        $this->to = $user->username;
        unset($user);

    }

}
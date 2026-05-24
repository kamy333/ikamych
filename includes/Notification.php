<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 22-Apr-16
 * Time: 12:39 AM
 */
class Notification extends DatabaseObject
{

    public $id;
    public $user_id;
    public $link;
    public $message;
    public $date;
    public $read;

    public $username;
//    public $to;
    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Notification"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Notification"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Notification"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Notification"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    protected static $table_name = "notifications";
    protected static $db_fields = ['id', 'user_id', 'read', 'message', 'link', 'date'];

    public static $required_fields = ['id', 'user_id', 'read', 'message', 'link'];

    protected static $db_fields_table_display_short = ['id', 'user_id', 'read', 'username', 'link', 'message', 'date'];

    protected static $db_fields_table_display_full = ['id', 'user_id', 'read', 'username', 'message', 'link', 'date'];

    protected static $db_field_exclude_table_display_sort=['username'];


    public static $get_form_element=['user_id', 'read', 'message','link','date'];
    public static $get_form_element_others=[];


    public static $form_default_value=[
        "user_id"=>"2",

    ];

    protected static $form_properties= [


        "user_id"=> ["type"=>"select",
            "name"=>'user_id',
            "class"=>"User",
            "label_text"=>"User",
            'field_option_0'=>"id",
            'field_option_1'=>"username",
            "required" =>true,
        ],
        "read" =>["type"=>"radio",
            [0,
                [
                    "label_all"=>"Read",
                    "name"=>"read",
                    "label_radio"=>"No",
                    "value"=>"0",
                    "id"=>"read_no",
                    "default"=>true]],
            [1,
                [
                    "label_all"=>"Read",
                    "name"=>"read",
                    "label_radio"=>"Yes",
                    "value"=>"1",
                    "id"=>"read_yes",
                    "default"=>true]],
        ],
        "message"=> ["type"=>"text",
            "name"=>'message',
            "label_text"=>"Message",
            "placeholder"=>"Message here",
            "required" =>true,
        ],

        "date"=> ["type"=>"datetime",
            "name"=>'date',
            "label_text"=>"DateTime",
            "placeholder"=>"current",
            "required" =>true,
        ],
        
    ];

    protected static $form_properties_search=[
        "search_all"=> ["type"=>"text",
            "name"=>'search_all',
            "label_text"=>"",
            "placeholder"=>"Search all",
            "required" =>false,
        ],
        "download_csv" =>["type"=>"radio",
            [0,
                [
                    "label_all"=>"Dnld csv",
                    "name"=>"download_csv",
                    "label_radio"=>"non",
                    "value"=>"No",
                    "id"=>"visible_no",
                    "default"=>true]],
            [1,
                [
                    "label_all"=>"Dnld csv",
                    "name"=>"download_csv",
                    "label_radio"=>"oui",
                    "value"=>"Yes",
                    "id"=>"visible_yes",
                    "default"=>true]],
        ],
        "id"=> ["type"=>"number",
            "name"=>'id',
            "id"=>"search_id",
            "label_text"=>"",
            'min'=>0,
            "placeholder"=>"ID",
            "required" =>false,
        ],
        "user_id"=> ["type"=>"select",
            "name"=>'user_id',
            "id"=>"search_user_id",
            "class"=>"User",
            "label_text"=>"",
            "select_option_text"=>'Username',
            'field_option_0'=>"username",
            'field_option_1'=>"username",
            "required" =>false,
        ],
        "to_user_id"=> ["type"=>"select",
            "name"=>'to_user_id',
            "id"=>"search_to_user_id",
            "class"=>"User",
            "label_text"=>"",
            "select_option_text"=>'Username',
            'field_option_0'=>"username",
            'field_option_1'=>"username",
            "required" =>false,
        ],


    ];

    public function set_up_display(){
        $this->find_username();

    }

 

    protected function find_username() {
        $user=User::find_by_id($this->user_id);
        $this->username=$user->username;
        
        unset($user);

    }
    
    
    public static function get_notification(){

        global $session;
        global $path_admin;
        $output="";
        $notifications=static::find_all();
        $count_notification=static::count_all();

        $output.="<li class=\"dropdown\">
                    <a class=\"dropdown-toggle count-info\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-bell\"></i>  <span class=\"label label-primary\">{$count_notification}</span>
                    </a>
                    <ul class=\"dropdown-menu dropdown-alerts\">";
//         $output.="               <li>
//                            <a href=\"";
//        $output.=$path_admin."mailbox.php";
//        $output.="\">";

        foreach ($notifications as $notification) {
            $output.= $notification-> get_notification_nav($notification);
        }

//        $output.="                <li class=\"divider\"></li>";

        $output.="                <li>
                            <div class=\"text-center link-block\">
                                <a href=\"<?php echo $path_admin; ?>notifications.php\">
                                    <strong>See All Alerts</strong>
                                    <i class=\"fa fa-angle-right\"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>";



        return $output;
        
        
        

    }

    
    public function get_notification_nav($notification){
        global $path_admin;
        $output="";

        $when=DateDifferenceFormat($notification->date , unixToMySQL(time()) );


        if(isset($notification->links)){
            $link="href='{$path_admin}.{$notification->links}'";
        } else {
            $link="href='#'";
        }



     $output.="                        <li>";
     $output.="                       <a";
     $output.="    href=\"";

     $output.=$link;
     $output.="\">";
     $output.="                            <div>
                                    <i class=\"fa fa-envelope fa-fw\"></i>";
     $output.=$notification->message;
     $output.="                             <span class=\"pull-right text-muted small\">";
     $output.=$when;
     $output.="                         </span>
                                </div>
                            </a>
                        </li>
                        <li class=\"divider\"></li>";
     $output.="";
     $output.="";
     $output.="";
      return $output;


    }
    
}
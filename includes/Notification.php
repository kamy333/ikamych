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


    protected static $table_name="notifications";
    protected static $db_fields = array('id', 'user_id','read', 'message','link','date');

    public static $required_fields=array('id', 'user_id','read', 'message','link');

    protected static $db_fields_table_display_short=array('id', 'user_id','read','username','link', 'message','date');

    protected static $db_fields_table_display_full=array('id', 'user_id','read','username','message','link','date');

    protected static $db_field_exclude_table_display_sort=array('username');


    public static $get_form_element=array('user_id', 'read', 'message','link','date');
    public static $get_form_element_others=array();


    public static $form_default_value=array(
        "user_id"=>"2",

    );

    protected static $form_properties= array(


        "user_id"=> array("type"=>"select",
            "name"=>'user_id',
            "class"=>"User",
            "label_text"=>"User",
            'field_option_0'=>"id",
            'field_option_1'=>"username",
            "required" =>true,
        ),
        "read" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Read",
                    "name"=>"read",
                    "label_radio"=>"No",
                    "value"=>"0",
                    "id"=>"read_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Read",
                    "name"=>"read",
                    "label_radio"=>"Yes",
                    "value"=>"1",
                    "id"=>"read_yes",
                    "default"=>true)),
        ),
        "message"=> array("type"=>"text",
            "name"=>'message',
            "label_text"=>"Message",
            "placeholder"=>"Message here",
            "required" =>true,
        ),

        "date"=> array("type"=>"datetime",
            "name"=>'date',
            "label_text"=>"DateTime",
            "placeholder"=>"current",
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
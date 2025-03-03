<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 9/17/2015
 * Time: 10:00 PM
 */
class FailedLogin extends DatabaseObject
{
    public static $required_fields = array('username', 'login_attempt', 'last_time');
    public static $get_form_element = array('username', 'login_attempt', 'last_time', 'ip', 'host');
    public static $get_form_element_others = array();
    public static $db_field_search = array('search_all', 'id', 'username', 'login_attempt', 'last_time', 'ip', 'host', 'download_csv');
    public static $page_name = "FailedLogin";

//    public static $page_manage = "manage_failed_logins.php";
//    public static $page_new = "new_failed_logins.php";
//    public static $page_edit = "edit_failed_logins.php";
//    public static $page_delete = "delete_failed_logins.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=FailedLogin"; // "manage_links.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=FailedLogin"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=FailedLogin"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=FailedLogin"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    protected static $table_name = "failed_logins";
    protected static $db_field_exclude_table_display_sort = array('date');

    protected static $db_fields = array('id', 'username', 'login_attempt', 'last_time', 'ip', 'host', 'input_date');
    protected static $db_fields_table_display_short = array('id', 'username', 'login_attempt', 'last_time', 'date', 'ip', 'host', 'input_date');
    protected static $db_fields_table_display_full = array('id', 'username', 'login_attempt', 'last_time', 'date', 'ip', 'host', 'input_date');
    protected static $form_properties = array(
        "username" => array("type" => "text",
            "name" => 'username',
            "label_text"=>"Username",
            "placeholder"=>"username",
            "required" =>true,
        ),
        "login_attempt"=> array("type"=>"number",
            "name"=>'login_attempt',
            "id"=>"login_attempt",
            "label_text"=>"login_attempt",
            'min'=>0,
            "placeholder"=>"login_attempt",
            "required" =>false,
        ),
        "ip"=> array("type"=>"text",
            "name"=>'ip',
            "label_text"=>"ip",
            "placeholder"=>"ip",
            "required" =>true,
        ),

        "host"=> array("type"=>"text",
            "name"=>'host',
            "label_text"=>"host",
            "placeholder"=>"host",
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

        "login_attempt"=> array("type"=>"select",
            "name"=>'login_attempt',
            "id"=>"search_login_attempt",
            "class"=>"FailedLogin",
            "label_text"=>"",
            "select_option_text"=>'login_attempt',
            'field_option_0'=>"login_attempt",
            'field_option_1'=>"login_attempt",
            "required" =>false,
        ),

        "last_time"=> array("type"=>"select",
            "name"=>'last_time',
            "id"=>"search_last_time",
            "class"=>"FailedLogin",
            "label_text"=>"",
            "select_option_text"=>'last_time',
            'field_option_0'=>"last_time",
            'field_option_1'=>"last_time",
            "required" =>false,
        ),

        "ip"=> array("type"=>"select",
            "name"=>'ip',
            "id"=>"search_ip",
            "class"=>"FailedLogin",
            "label_text"=>"",
            "select_option_text"=>'ip',
            'field_option_0'=>"ip",
            'field_option_1'=>"ip",
            "required" =>false,
        ),
        "host"=> array("type"=>"select",
            "name"=>'host',
            "id"=>"search_host",
            "class"=>"FailedLogin",
            "label_text"=>"",
            "select_option_text"=>'host',
            'field_option_0'=>"host",
            'field_option_1'=>"host",
            "required" =>false,
        ),

    );
    public $id;
    public $username;
    public $login_attempt;
    public $last_time;
    public $date;
    public $ip;
    public $host;
    public $input_date;

   public function record_failed_login($username) {

       $failed_login=self::find_by_username($username);


        if(!isset($failed_login)|| (!$failed_login)) {


            $this->username=$username;
            $this->login_attempt=1;
            $this->last_time=time();
            $this->ip= $_SERVER['REMOTE_ADDR'];
            $this->host= $_SERVER['REMOTE_HOST'];


        } else {
            // existing failed_login record
            $this->id=$failed_login->id;
            $this->username=$failed_login->username;
            $this->login_attempt=$failed_login->login_attempt +1;
            $this->last_time=time();
            $this->ip= $_SERVER['REMOTE_ADDR'];
            $this->host= $_SERVER['REMOTE_HOST'];
          //  $this->save();

        }

       $this->save();
        return true;
    }

    public static function find_by_username($username = "")
    {
        global $database;
        $username = $database->escape_value($username);
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE username='{$username}' LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

   public function clear_failed_logins($username) {
      //  $failed_login = find_one_in_fake_db('failed_logins', 'username', sql_prep($username));
        $failed_login=self::find_by_username($username);

        if(isset($failed_login)) {
            $this->id=$failed_login->id;
            $this->username=$username;
            $this->login_attempt=0;
            $this->last_time=time();
            $this->ip= $_SERVER['REMOTE_ADDR'];
            $this->host= $_SERVER['REMOTE_HOST'];

            $this->save();

        }

        return true;
    }

// Returns the number of minutes to wait until logins
// are allowed again.
   public function throttle_failed_logins($username) {
        $throttle_at = 25;
        $delay_in_minutes = 10;
        $delay = 60 * $delay_in_minutes;

      //  $failed_login = find_one_in_fake_db('failed_logins', 'username', sql_prep($username));

        $failed_login=self::find_by_username($username);


        // Once failure count is over $throttle_at value,
        // user must wait for the $delay period to pass.
        if(isset($failed_login) && $failed_login->login_attempt >= $throttle_at) {
            $remaining_delay = ($failed_login->last_time + $delay) - time();
            $remaining_delay_in_minutes = ceil($remaining_delay / 60);
            return $remaining_delay_in_minutes;
        } else {
            return 0;
        }
    }

    protected function set_up_display()
    {
//        $this->last_time=datetime_to_text_day($this->last_time);

        $epoch = $this->last_time;
        $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
        $this->date = $dt->format('Y-m-d H:i:s'); // output = 2017-01-01 00:00:00



    }






}
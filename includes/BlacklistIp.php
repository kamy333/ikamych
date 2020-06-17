<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 9/17/2015
 * Time: 10:00 PM
 */
class BlacklistIp extends DatabaseObject {
public $id;
public $ip;
public $username;
public $login_failed;

//public $last_time;
//public $host;

    protected static $table_name="blacklist_ip";
    protected static $db_fields = array('id', 'ip', 'login_failed',);

    public static $required_fields=array('ip', 'login_failed',);

    protected static $db_fields_table_display_short=array('id', 'ip', 'login_failed',);

    protected static $db_fields_table_display_full=array('id', 'ip', 'login_failed',);
    protected static $db_field_exclude_table_display_sort=null;

    public static $get_form_element=array('ip','login_failed');
    public static $get_form_element_others=array();

    protected static $form_properties= array(
        "ip"=> array("type"=>"text",
            "name"=>'ip',
            "label_text"=>"ip",
            "placeholder"=>"ip",
            "required" =>true,
        ),
        "login_failed"=> array("type"=>"number",
            "name"=>'login_failed',
            "id"=>"login_failed",
            "label_text"=>"login_failed",
            'min'=>0,
            "placeholder"=>"login_failed",
            "required" =>false,
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
        "login_failed"=> array("type"=>"select",
            "name"=>'login_failed',
            "id"=>"search_login_failed",
            "class"=>"BlacklistIp",
            "label_text"=>"",
            "select_option_text"=>'login_failed',
            'field_option_0'=>"login_failed",
            'field_option_1' => "login_failed",
            "required" => false,
        ),
    );

    public static $db_field_search = array('search_all', 'id', 'ip', 'login_failed',);


    public static $page_name = "BlacklistIp";
//    public static $page_manage="manage_blacklist.php";
//    public static $page_new="new_blacklist.php";
//    public static $page_edit="edit_blacklist.php";
//    public static $page_delete="delete_blacklist.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=BlacklistIp"; // "manage_links.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=BlacklistIp"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=BlacklistIp"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=BlacklistIp"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static function find_by_ip($ip = "")
    {
        global $database;
        $ip = $database->escape_value($ip);
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE ip='{$ip}' LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

// Check if an IP has been blacklisted.
// Returns true or false.
   public function is_blacklisted_ip($ip) {

       $max_failure=1000;
       $found_ip=self::find_by_ip($ip);

       if(isset($found_ip) && $this->login_failed >=$max_failure ){
           $blacklisted_ip=$this->ip;
           return isset($blacklisted_ip);

       }

    }



   public function add_ip_to_blacklist() {

    //   if(!$username){$username=$_POST['username'];}

       $ip= $_SERVER['REMOTE_ADDR'];

       $found_ip=self::find_by_ip($ip);


        if(!isset($found_ip)|| (!$found_ip)) {

            $this->ip= $_SERVER['REMOTE_ADDR'];
            $this->login_failed=1;

        } else {
            // existing failed_login record
            $this->id=$found_ip->id;
            $this->ip=$found_ip->ip;
            $this->login_failed=$found_ip->login_failed +1;

        }

       $this->save();
        return true;
    }

   public function clear_blacklist_ip($ip) {

     //  $ip=$_SERVER['REMOTE_ADDR'];
       $found_ip=self::find_by_ip($ip);

        if(isset($found_ip)) {
            $this->id=$found_ip->id;
            $this->ip=$found_ip->ip;
            $this->login_failed=0;
            $this->save();

        }

        return true;
    }

// Returns the number of minutes to wait until logins
// are allowed again.
   public function block_blacklisted_ips() {

       $request_ip = $_SERVER['REMOTE_ADDR'];
       if(isset($request_ip) && $this->is_blacklisted_ip($request_ip)) {
           die("Request blocked. Please contact administrator for IP");
       }


    }







}
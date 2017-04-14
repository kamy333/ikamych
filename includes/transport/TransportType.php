<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12-May-16
 * Time: 11:08 PM
 */
class TransportType extends DatabaseObject
{

    public static $required_fields = array('type_transport');
    public static $get_form_element=array('type_transport','input_date','modification_time','username');
    public static $get_form_element_others=array();
    public static $form_default_value=array(
        "input_date"=>"now()",
        "modification_time"=>"nowtime()",

    );
    public static $db_field_search = array('search_all', 'id', 'username', 'login_attempt', 'last_time', 'ip', 'host', 'download_csv');
    public static $page_name = "Transport type";
    public static $page_manage = "manage_TransportType.php";
    public static $page_new = "new_TransportType.php";
    public static $page_edit = "edit_TransportType.php";
    public static $page_delete = "delete_TransportType.php";
    public static $per_page;
    protected static $table_name = "transport_type";
    protected static $db_fields = array('id', 'type_transport', 'remarque', 'input_date', 'modification_time', 'username');
    protected static $db_fields_table_display_short = array('id', 'type_transport', 'input_date', 'modification_time', 'username');
    protected static $db_fields_table_display_full = array('id', 'type_transport', 'input_date', 'modification_time', 'username');
    protected static $db_field_exclude_table_display_sort = null;
    protected static $form_properties= array(
        "type_transport"=> array("type"=>"text",
            "name"=>'type_transport',
            "label_text"=>"Type Transport",
            "placeholder"=>"Type Transport",
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

        "type_transport"=> array("type"=>"select",
            "name"=>'type_transport',
            "id"=>"search_type_transport",
            "class"=>"TransportType",
            "label_text"=>"",
            "select_option_text"=>'Type',
            'field_option_0'=>"type_transport",
            'field_option_1'=>"type_transport",
            "required" =>false,
        ),

    );
    public $id;
    public $type_transport;
    public $input_date;
    public $modification_time;
    public $username;

    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". static::$page_new ."\">Add Transport Type ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"".TransportProgramming::$page_new ."\">Add New Course ". " </a></a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". TransportProgramming::$page_manage ."\">View Course ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". TransportProgrammingModel::$page_manage ."\">View Model ". " </a>";
        return $output;
    }

    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
        return $valid;


    }

    protected function set_up_display()
    {
        global $session;

        if (!isset($this->input_date)) {
            $this->input_date = now_sql();
        }


        $this->modification_time = now_sql() . " " . now_time();

        $user = User::find_by_id((int)$session->user_id);
        $this->username = $user->username;


    }


}
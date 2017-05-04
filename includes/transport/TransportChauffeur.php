<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12-May-16
 * Time: 9:24 AM
 */
class TransportChauffeur extends DatabaseObject
{


    protected static $table_name="transport_chauffeurs";


    protected static $db_fields = array('id', 'chauffeur_name', 'initial', 'company', 'user_id', 'input_date', 'modification_time', 'username');

    protected static $required_fields = array('chauffeur_name', 'initial', 'company',);

    protected static $db_fields_table_display_short =  array('id','chauffeur_name','initial','company','user_id','username','modification_time');

    protected static $db_fields_table_display_full =  array('id','chauffeur_name','initial','company','user_id','username','modification_time');

    protected static $db_field_exclude_table_display_sort=array('username');

    public static $fields_numeric=array('id','user_id',);
    public static $fields_numeric_format=array();

    public static $get_form_element=array('chauffeur_name','initial','company','user_id',);

    public static $get_form_element_others=array();

    public static $form_default_value=array(
        "modification_time"=>"nowtime()",
        "company"=>"Transmed",

    );

//    public $id;
//    public $chauffeur_name;
//    public $initial;
//    public $company;
//    public $user_id;
//    public $modification_time;
//    public $username;

    protected static $form_properties= array(
        "chauffeur_name"=> array("type"=>"text",
            "name"=>'chauffeur_name',
            "label_text"=>"chauffeur_name",
            "placeholder"=>"chauffeur_name",
            "required" =>true,
        ),
        "initial"=> array("type"=>"text",
            "name"=>'initial',
            "label_text"=>"initial",
            "placeholder"=>"initial",
            "required" =>true,
        ),
        "user_id"=> array("type"=>"select",
            "name"=>'user_id',
            "class"=>"User",
            "label_text"=>"User",
            "select_option_text"=>'Username',
            'field_option_0'=>"id",
            'field_option_1'=>"username",
            "required" =>false,
        ),
        "company"=> array("type"=>"text",
            "name"=>'company',
            "label_text"=>"company",
            "placeholder"=>"company",
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
        "chauffeur_name"=> array("type"=>"select",
            "name"=>'search_chauffeur_name',
            "id"=>"search_chauffeur_name",
            "class"=>"TransportChauffeur",
            "label_text"=>"",
            "select_option_text"=>'chauffeur_name',
            'field_option_0'=>"chauffeur_name",
            'field_option_1'=>"chauffeur_name",
            "required" =>false,
        ),
        "initial"=> array("type"=>"select",
            "name"=>'search_initial',
            "id"=>"search_initial",
            "class"=>"TransportChauffeur",
            "label_text"=>"Initial",
            "select_option_text"=>'Currency',
            'field_option_0'=>"initial",
            'field_option_1'=>"initial",
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

    );




    public static $page_name="Chauffeur";
    public static $page_manage="manage_TransportChauffeur.php";
    public static $page_new="new_TransportChauffeur.php";
    public static $page_edit="edit_TransportChauffeur.php";
    public static $page_delete="delete_TransportChauffeur.php";

    public static $per_page;


public $id;
public $chauffeur_name;
public $initial;
public $company;
public $user_id;
public $input_date;
public $modification_time;
public $username;


    public function set_up_display()
    {
        global $session;
        if (!isset($this->initial)) {
            $this->initial = substr(md5(uniqid(mt_rand(), true)), 0, 3);
        }

        if (!isset($this->username)) {
            $this->username = $session->username;
        }

//    modification_time
        if (!isset($this->modification_time)) {
            $this->modification_time = now_sql() . ' ' . now_time();
        }

        if (!isset($this->input_date)) {
            $this->input_date = now_sql();
        }

    }


    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
        return $valid;



    }

    public static function  table_nav_additional(){
        global $Nav;
//        $path= $Nav->http.$Nav->folder."/";

        $output="</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . TransportType::$page_new . "\">Add New TransportType " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . TransportProgramming::$page_manage . "\">Course " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . TransportProgrammingModel::$page_manage . "\">Model " . " </a><span>&nbsp;</span>";

        return $output;
    }


}
<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 8/29/2015
 * Time: 1:13 AM
 */
class Project extends DatabaseObject {
    protected static $table_name="projects";
    protected static $db_fields = array('id', 'project_code','project_name', 'client_id','pseudo','start_date', 'end_date','closed','currency_iso','vat', 'comment');

   public static $required_fields=array('project_code','project_name', 'client_id','start_date','currency_iso');

    public static $db_fields_table_display_short=array('id', 'project_code','project_name',  'pseudo','start_date','currency_iso','vat');

    public static $db_fields_table_display_full=array( 'project_code','project_name', 'client_id','pseudo','start_date', 'end_date','currency_iso','vat');

    protected static $db_field_exclude_table_display_sort=null;

    public static $fields_numeric=array('id','client_id');

    public static $get_form_element=array('project_code','project_name','client_id','start_date','end_date','closed','currency_iso','vat','comment');

    public static $get_form_element_others=array();

//    public static $form_default_value;

    public static $form_default_value=array(
        "start_date"=>"now()",
        "end_date"=>"now()",
        "closed"=>"0",
        "vat"=>"No"
    );



    protected static $form_properties= array(
           "project_code"=> array("type"=>"text",
            "name"=>'project_code',
            "label_text"=>"Project code",
            "placeholder"=>"input Project code",
            "required" =>true,
        ),
        "project_name"=> array("type"=>"text",
            "name"=>'project_name',
            "label_text"=>"Project Name",
            "placeholder"=>"Input project name",
            "required" =>true,
        ),
        "client_id"=> array("type"=>"select",
            "name"=>'client_id',
            "class"=>"Client",
            "label_text"=>"Client",
            'field_option_0'=>"id",
            'field_option_1'=>"pseudo",
            "required" =>true,
        ),
        "start_date"=> array("type"=>"date",
            "name"=>'start_date',
            "label_text"=>"Start Date",
            "placeholder"=>"Input Start Date",
            "required" =>true,
        ),
        "end_date"=> array("type"=>"date",
            "name"=>'end_date',
            "label_text"=>"End Date",
            "placeholder"=>"Input End Date",
            "required" =>false,
        ),
        "closed" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Project closed",
                    "name"=>"closed",
                    "label_radio"=>"No",
                    "value"=>"0",
                    "id"=>"closed_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Project closed",
                    "name"=>"closed",
                    "label_radio"=>"Yes",
                    "value"=>"1",
                    "id"=>"closed_yes",
                    "default"=>false)),
        ),
        "currency_iso"=> array("type"=>"text",
            "name"=>'currency_iso',
            "label_text"=>"Currency",
            "placeholder"=>"Currency ISO",
            "required" =>false,
        ),
        "vat" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"VAT",
                    "name"=>"vat",
                    "label_radio"=>"No",
                    "value"=>"No",
                    "id"=>"vat_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"VAT",
                    "name"=>"vat",
                    "label_radio"=>"Yes",
                    "value"=>"Yes",
                    "id"=>"vat_yes",
                    "default"=>false)),
        ),
        "comment"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"comment",
            "placeholder"=>"comment",
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

        "project_code"=> array("type"=>"select",
            "name"=>'project_code',
            "id"=>"search_project_code",
            "class"=>"Project",
            "label_text"=>"",
            "select_option_text"=>'project_code',
            'field_option_0'=>"project_code",
            'field_option_1'=>"project_code",
            "required" =>false,
        ),

        "project_name"=> array("type"=>"select",
            "name"=>'projet_name',
            "id"=>"search_project_code",
            "class"=>"Project",
            "label_text"=>"",
            "select_option_text"=>'project_name',
            'field_option_0'=>"project_name",
            'field_option_1'=>"project_name",
            "required" =>false,
        ),
        "client_id"=> array("type"=>"number",
            "name"=>'client_id',
            "id"=>"search_client_id",
            "label_text"=>"",
            'min'=>0,
            "placeholder"=>"Client ID",
            "required" =>false,
        ),
        "pseudo"=> array("type"=>"select",
            "name"=>'pseudo',
            "id"=>"search_pseudo",
            "class"=>"Project",
            "label_text"=>"",
            "select_option_text"=>'Pseudo',
            'field_option_0'=>"pseudo",
            'field_option_1'=>"pseudo",
            "required" =>false,
        ),
        "start_date"=> array("type"=>"select",
            "name"=>'start_date',
            "id"=>"search_start_date",
            "class"=>"Project",
            "label_text"=>"",
            "select_option_text"=>'start_date',
            'field_option_0'=>"start_date",
            'field_option_1'=>"start_date",
            "required" =>false,
        ),
        "end_date"=> array("type"=>"select",
            "name"=>'end_date',
            "id"=>"search_end_date",
            "class"=>"Project",
            "label_text"=>"",
            "select_option_text"=>'end_date',
            'field_option_0'=>"end_date",
            'field_option_1' => "end_date",
            "required" => false,
        ),

    );

    public static $db_field_search = array('search_all', 'id', 'project_code', 'project_name', 'client_id', 'pseudo', 'start_date', 'end_date', 'currency_iso', 'download_csv');


    public static $page_name = "Project";
//    public static $page_manage="manage_projects.php";
//    public static $page_new="new_project.php";
//    public static $page_edit="edit_project.php";
//    public static $page_delete="delete_project.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Project"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Project"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Project"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Project"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = array('Client');


    public static $per_page;


    public $id;
    public $project_code;
public $project_name;
public $client_id;
public $pseudo;
public $start_date;
public $end_date;
public $closed;
public $currency_iso;
public $vat;
public $comment;
public $input_date;



    protected function set_up_display(){
        $this->set_pseudo();

    }

    public function save(){
        // if the id is set then we update and prevent to create another same user
        // if(isset($this->id)){$this->update();} else {$this->create();}
        return isset($this->id)? $this->update(): $this->create() ;

    }


    protected function set_pseudo(){
        if(isset($this->client_id)){
        $client=Client::find_by_id((int)$this->client_id);
         if($client)   {
         $this->pseudo=$client->pseudo;
         }
        }

    }

    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;

        isset ($this->email) ? $valid->validate_email('email') : "";

        if(isset($this->project_code)){
            $valid->validate_min_lengths(['project_code'=>4]);
            $valid->validate_max_lengths(['project_code'=>10]);
        }

     //   ($this->website) ? $valid->validate_website('website') : "";
        if(isset($this->currency_iso)){
            $valid->validate_min_lengths(['currency_iso'=>3]);
            $valid->validate_max_lengths(['currency_iso'=>3]);
        }

        $valid->validate_Date(array('start_date'));

        if(!empty($this->end_date) && isset($this->end_date)){
            $valid->validate_Date(['end_date']);

        }


        return $valid;

    }

}
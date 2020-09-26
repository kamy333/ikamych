<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */
//protected static $db_fields = array('','','','','','','','','','');

class MyExpensePerson extends DatabaseObject {
    protected static $table_name="myexpense_person";

    protected static $db_fields = array('id', 'person_name', 'close_person', 'authorized_user', 'language', 'rank', 'comment');

    protected static $required_fields =  array('person_name','rank');

    protected static $db_fields_table_display_short = array('id', 'person_name', 'close_person', 'authorized_user', 'rank', 'language', 'comment');

    protected static $db_fields_table_display_full = array('id', 'person_name', 'close_person', 'authorized_user', 'language', 'rank', 'comment');
    protected static $db_field_exclude_table_display_sort = null;

    public static $fields_numeric=array('id','rank');

    public static $get_form_element = array('person_name', 'close_person', 'authorized_user', 'language', 'close', 'rank', 'comment');
    public static $get_form_element_others = array();

    public static $form_default_value=array(
        "person_name"=>"Pablo"
    );

    protected static $form_properties= array(

        "person_name" => array("type" => "text",
            "name" => 'person_name',
            "label_text" => "person_name",
            "placeholder" => "person_name",
            "required" => true,
        ),


        "close_person" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "close_person",
                    "name" => "close_person",
                    "label_radio" => "No",
                    "value" => "0",
                    "id" => "close_person_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "close_person",
                    "name" => "close_person",
                    "label_radio" => "Yes",
                    "value" => "1",
                    "id" => "close_person_yes",
                    "default" => false)),
        ),

        "authorized_user" => array("type" => "text",
            "name" => 'authorized_user',
            "label_text" => "authorized_user",
            "placeholder" => "authorized user must be valid username and comma-separated if more than 1",
            "required" => false,
        ),

        "language" => array("type" => "text",
            "name" => 'language',
            "label_text" => "language",
            "placeholder" => "language comma-separated if more than 1 en,fr,ptg",
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
            "placeholder"=>"a number to sort",
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

        "person_name"=> array("type"=>"select",
            "name"=>'search_person_name',
            "id"=>"search_person_name",
            "class"=>"MyExpensePerson",
            "label_text"=>"",
            "select_option_text"=>'Person Name',
            'field_option_0'=>"person_name",
            'field_option_1'=>"person_name",
            "required" =>false,
        ),
        "rank"=> array("type"=>"select",
            "name"=>'rank',
            "id"=>"search_rank",
            "class"=>"MyExpensePerson",
            "label_text"=>"",
            "select_option_text"=>'rank',
            'field_option_0'=>"rank",
            'field_option_1'=>"rank",
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
                    "default" => true)),
        ),

    );


    public static $db_field_search = array('search_all', 'person_name', 'download_csv');


    public static $page_name = "Expense Person";

//    public static $page_manage="manage_MyExpensePerson.php";
//    public static $page_new="new_MyExpensePerson.php";
//    public static $page_edit="edit_MyExpensePerson.php";
//    public static $page_delete="delete_MyExpensePerson.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpensePerson"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=MyExpensePerson"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyExpensePerson"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyExpensePerson"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = array('MyExpense', 'MyExpenseType');


    public static $per_page;


    public $id;
    public $person_name;
    public $close_person;
    public $authorized_user;
    public $comment;
    public $rank;

    public $language;


    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
        return $valid;



    }

    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpense::$page_new ."\">Add New Expense ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpenseType::$page_new ."\">Add New Type ". " </a></a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpense::$page_manage ."\">View Expense ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpenseType::$page_manage ."\">View Type ". " </a>";
        return $output;
    }

}
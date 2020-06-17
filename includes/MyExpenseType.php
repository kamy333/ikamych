<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */
//protected static $db_fields = array('','','','','','','','','','');

class MyExpenseType extends DatabaseObject {
    protected static $table_name="myexpense_type";

    protected static $db_fields = array('id','expense_type','side','rank','comment');

    protected static $required_fields =  array('expense_type','side','rank');

    protected static $db_fields_table_display_short =  array('id','expense_type','side','rank','comment');

    protected static $db_fields_table_display_full =  array('id','expense_type','side','rank','comment');
    protected static $db_field_exclude_table_display_sort=null;

    public static $fields_numeric=array('id','rank','side');


    public static $get_form_element=array('expense_type','rank','side','comment');
    public static $get_form_element_others=array();

    public static $form_default_value=array(
        "rank"=>"1",
        "side"=>"0"
    );


    protected static $form_properties= array(

        "expense_type"=> array("type"=>"text",
            "name"=>'expense_type',
            "label_text"=>"expense_type",
            "placeholder"=>"expense_type",
            "required" =>true,
        ),
        "side" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Positif Negatif",
                    "name"=>"side",
                    "label_radio"=>"Positif ",
                    "value"=>"1",
                    "id"=>"side_positif",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Positif Negatif",
                    "name"=>"side",
                    "label_radio"=>"Negatif",
                    "value"=>"-1",
                    "id"=>"side_negative",
                    "default"=>true)),
        ),
        "comment"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"Comment",
            "placeholder"=>"input Comment",
            "required" =>false,
        ),
        "rank"=> array("type"=>"number",
            "name"=>'rank',
            "label_text"=>"Rank",
            'min'=>0,
            "placeholder"=>"a number to sort",
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

        "expense_type"=> array("type"=>"select",
            "name"=>'search_expense_type',
            "id"=>"search_expense_type",
            "class"=>"MyExpenseType",
            "label_text"=>"",
            "select_option_text"=>'Expense type',
            'field_option_0'=>"expense_type",
            'field_option_1'=>"expense_type",
            "required" =>false,
        ),
        "rank"=> array("type"=>"select",
            "name"=>'rank',
            "id"=>"search_rank",
            "class"=>"MyExpenseType",
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


    public static $db_field_search = array('search_all', 'expense_type', 'download_csv');


    public static $page_name = "Expense Type";
//    public static $page_manage="manage_MyExpenseType.php";
//    public static $page_new="new_MyExpenseType.php";
//    public static $page_edit="edit_MyExpenseType.php";
//    public static $page_delete="delete_MyExpenseType.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpenseType"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=MyExpenseType"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyExpenseType"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyExpenseType"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = array('MyExpense', 'MyExpensePerson');


    public static $per_page;


    public $id;
    public $expense_type;
    public $comment;
    public $rank;
    public $side;



    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
        return $valid;



    }

    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpense::$page_new ."\">Add New Expense ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpensePerson::$page_new ."\">Add New Person ". " </a></a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpense::$page_manage ."\">View Expense ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpensePerson::$page_manage ."\">View Person ". " </a>";
        return $output;
    }


}
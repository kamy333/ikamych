<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 10/11/2015
 * Time: 7:03 PM
 */
class Category1 extends DatabaseObject {

    protected static $table_name="category_1";
    protected static $db_fields =array('id','category_1','comment',);
    public static $required_fields =array('category_1');
    protected static $db_fields_table_display_short =array('id','category_1','comment',);
    protected static $db_fields_table_display_full =array('id','category_1','comment',);
    protected static $db_field_exclude_table_display_sort=null;
    public static $fields_numeric=array('id');
    public static $get_form_element=array('category_1','comment');
    public static $get_form_element_others=array();

    protected static $form_properties= array(
        "category_1"=> array("type"=>"text",
            "name"=>'category_1',
            "label_text"=>"category_1",
            "placeholder"=>"input category_1",
            "required" =>true,
        ),
        "comment"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"Comment",
            "placeholder"=>"input Comment",
            "required" =>false,
        ),
    );
    protected static $form_properties_search= array(
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

        "category_1"=> array("type"=>"select",
            "name"=>'category_1',
            "id"=>"search_category_1",
            "class"=>"Category1",
            "label_text"=>"",
            "select_option_text"=>'category_1',
            'field_option_0'=>"category_1",
            'field_option_1'=>"category_1",
            "required" =>false,
        ),
    );
    public static $db_field_search= array('search_all','id','category_1','download_csv');

    public static $page_name="Category 1";
    public static $page_manage="manage_category_1.php";
    public static $page_new="new_category_1.php";
    public static $page_edit="edit_category_1.php";
    public static $page_delete="delete_category_1.php";

    public static $form_class_dependency=array('InvoiceActual','Category','Category2') ;

    public static $per_page;


    public $id;
    public $category_1;
    public $comment;


    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;

            $valid->validate_min_lengths(['category_1'=>1]);
            $valid->validate_max_lengths(['category_1'=>20]);

        if(!isset($this->id)) {
            $valid->unique_name('category_1', get_class($this));
        }
        return $valid;

    }


    public static function  table_nav_additional(){
        $output="<span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". Category2::$page_new ."\">Add New ". Category2::$page_name." </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". Category::$page_new ."\">Add New ". Category::$page_name." </a>";
        return $output;
    }
}
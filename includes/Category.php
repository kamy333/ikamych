<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 10/11/2015
 * Time: 7:03 PM
 */
class Category extends DatabaseObject {

protected static $table_name="category";
protected static $db_fields =array('id','category','category_1_id','category_1','category_2_id','category_2','unit_price','company_unit_price','comment',);
public static $required_fields =array('category_1_id','category_2_id','unit_price','company_unit_price',);
protected static $db_fields_table_display_short =array('id','category','category_1','category_2','unit_price','company_unit_price','comment',);
protected static $db_fields_table_display_full =array('id','category','category_1_id','category_1','category_2_id','category_2','unit_price','company_unit_price','comment',);

    protected static $db_field_exclude_table_display_sort=null;
    public static $fields_numeric=array('id','category_1_id','category_2_id','unit_price','company_unit_price');

    public static $get_form_element=array('category_1_id','category_2_id','unit_price','company_unit_price','comment');
    public static $get_form_element_others=array();

    protected static $form_properties= array(
        "category_1_id"=> array("type"=>"select",
            "name"=>'category_1_id',
            "class"=>"Category1",
            "label_text"=>"Category 1",
            'field_option_0'=>"id",
            'field_option_1'=>"category_1",
            "required" =>true,
        ),
        "category_2_id"=> array("type"=>"select",
            "name"=>'category_2_id',
            "class"=>"Category2",
            "label_text"=>"Category 2",
            'field_option_0'=>"id",
            'field_option_1'=>"category_2",
            "required" =>true,
        ),
        "unit_price"=> array("type"=>"number",
            "name"=>'unit_price',
            "id"=>"unit_price",
            "label_text"=>"Unit Price",
            'min'=>0,
            "placeholder"=>"Price per Quantity",
            "required" =>true,
        ),
        "company_unit_price"=> array("type"=>"number",
            "name"=>'company_unit_price',
            "id"=>"company_unit_price",
            "label_text"=>"company unit price",
            'min'=>0,
            "placeholder"=>"Price per company Quantity",
            "required" =>true,
        ),
        "comment"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"Comment",
            "placeholder"=>"input Comment",
            "required" =>false,
        ),
    );

    protected static $form_properties_search = array(
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
            "class"=>"Category",
            "label_text"=>"",
            "select_option_text"=>'category_1',
            'field_option_0'=>"category_1",
            'field_option_1'=>"category_1",
            "required" =>false,
        ),
        "category_2"=> array("type"=>"select",
            "name"=>'category_2',
            "id"=>"search_category_2",
            "class"=>"Category",
            "label_text"=>"",
            "select_option_text"=>'category_2',
            'field_option_0'=>"category_2",
            'field_option_1'=>"category_2",
            "required" =>false,
        ),
        "unit_price"=> array("type"=>"select",
            "name"=>'unit_price',
            "id"=>"search_unit_price",
            "class"=>"Category",
            "label_text"=>"",
            "select_option_text"=>'Unit price',
            'field_option_0'=>"unit_price",
            'field_option_1'=>"unit_price",
            "required" =>false,
        ),
        "company_unit_price"=> array("type"=>"select",
            "name"=>'company_unit_price',
            "id"=>"search_company_unit_price",
            "class"=>"Category",
            "label_text"=>"",
            "select_option_text"=>'company_unit_price',
            'field_option_0'=>"company_unit_price",
            'field_option_1' => "company_unit_price",
            "required" => false,
        ),

    );

    public static $db_field_search = array('search_all', 'id', 'category', 'category_1', 'category_2', 'unit_price', 'company_unit_price', 'download_csv');


    public static $page_name = "Category";
//    public static $page_manage="manage_category.php";
//    public static $page_new="new_category.php";
//    public static $page_edit="edit_category.php";
//    public static $page_delete="delete_category.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Category"; // "manage_links.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Category"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Category"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Category"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = array('InvoiceActual', 'Category1', 'Category2');


    public static $per_page;


    public $id;
    public $category;
public $category_1_id;
public $category_1;
public $category_2_id;
public $category_2;
public $unit_price;
public $company_unit_price;
public $comment;


    protected function set_up_display()
    {

        $category1='';
        $category2='';


        if (isset($this->category_1_id)) {
            $category1 = Category1::find_by_id((int)$this->category_1_id);
            $this->category_1 = $category1->category_1;

        }
        if (isset($this->category_2_id)) {
            $category2 = Category2::find_by_id((int)$this->category_2_id);
            $this->category_2 = $category2->category_2;

        }

        if (isset($this->category_1_id)&&isset($this->category_1_id) ) {
           if($category1 && $category2){
           $this->category=$this->category_1."../.. ".$this->category_2;
           }

        }



    }

    public  function form_validation() {

        global $database;
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
        if(!isset($this->id)){$valid->unique_category();}

//        $sql="SELECT * FROM" . " ".self::$table_name."WHERE category ";
//        $find_unique=$this->find_by_sql();


        $valid->is_numeric('unit_price',['min'=>0]);

        return $valid;

    }


    public static function  table_nav_additional(){
        $output="<span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". Category1::$page_new ."\">Add New ". Category1::$page_name." </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". Category2::$page_new ."\">Add New ". Category2::$page_name." </a>";
        return $output;
    }

}
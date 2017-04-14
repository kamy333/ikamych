<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 8/28/2015
 * Time: 9:15 PM
 */
class UserType extends DatabaseObject {

    protected static $table_name="user_type";
    protected static $db_fields = array('id', 'user_type','comment');
    public static $required_fields=array('user_type');

    protected static $db_fields_table_display_short = array('id', 'user_type','comment');
    protected static $db_fields_table_display_full = array('id', 'user_type','comment');
    protected static $db_field_exclude_table_display_sort=null;


    public static $get_form_element=array('user_type','comment');
    public static $get_form_element_others=array();



    protected static $form_properties= array(
        "user_type"=> array("type"=>"text",
            "name"=>'user_type',
            "label_text"=>"User type eg employee",
            "placeholder"=>"input user type",
            "required" =>true,
        ),

        "comment"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"",
            "placeholder"=>"Comment",
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

        "user_type"=> array("type"=>"select",
            "name"=>'user_type',
            "id"=>"search_user_type",
            "class"=>"UserType",
            "label_text"=>"",
            "select_option_text"=>'user_type',
            'field_option_0'=>"user_type",
            'field_option_1'=>"user_type",
            "required" =>false,
        ),

    );

    public static $db_field_search= array('search_all','id', 'user_type','download_csv');

    public static $page_name="User Type";
    public static $page_manage="manage_user_type.php";
    public static $page_new="new_user:type.php";
    public static $page_edit="edit_user_type.php";
    public static $page_delete="delete_user_type.php";

    public static $form_class_dependency=array('User') ;


    public $id;
    public $user_type;
    public $comment;



    public function form_validation(){
        $valid= new FormValidation();
        $valid->validate_presences(static::$required_fields);

        return $valid;
    }


//    public function display_table($long_short=0,$edit=""){
//
//        $output="";
//        $output.= "<tr>";
//
//        if($long_short==1){
//            $table_field=static::$db_fields_table_display_full;
//
//        } else {
//            $table_field=static::$db_fields_table_display_short;
//
//        }
//
//
//        foreach($table_field as $fieldname){
//            if(property_exists($this,$fieldname)){
//                $output.= "<td class='text-center'>".$this->$fieldname."</td>";
//            }
//        }
//
//        //     $output.= "<td class='text-center'><a href='".static::$page_edit."?id=".urlencode($this->id)."'>Edit</a></td>" ;
//
//        $output.= "<td class='text-center'><a href='".static::$page_delete."?id=".urlencode($this->id)."'>Delete</a></td>" ;
//        $output.= "</tr>";
//        return $output;
//
//    }




}
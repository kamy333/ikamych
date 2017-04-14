<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 30-Dec-15
 * Time: 5:09 PM
 */
class Currency extends DatabaseObject
{

    protected static $table_name="currency";
    protected static $db_fields =array('id','currency','currency_country','rate','date','rank','comment',);
    public static $required_fields =array('currency','currency_country','rate','date','rank');
    protected static $db_fields_table_display_short =array('id','currency','currency_country','rate','date','rank','comment',);
    protected static $db_fields_table_display_full =array('id','currency','currency_country','rate','date','rank','comment',);
    protected static $db_field_exclude_table_display_sort=null;
    public static $fields_numeric=array('id','rate','rank');

    public static $get_form_element=array('currency','currency_country','rate','date','rank','comment');

    public static $get_form_element_others=array();

    public static $form_default_value=array(
        "currency_country"=>"CHF",
        "date"=>"now()",
    );
    protected static $form_properties= array(
        "currency"=> array("type"=>"text",
            "name"=>'currency',
            "id"=>"currency",
            "label_text"=>"Currency",
            "placeholder"=>"Currency ISO",
            "required" =>true,
        ),
        "currency_country"=> array("type"=>"text",
            "name"=>'currency_country',
            "id"=>"currency_country",
            "label_text"=>"Currency Country",
            "placeholder"=>"Currency Country Name",
            "required" =>false,
        ),
        "rate"=> array("type"=>"number",
            "name"=>'rate',
            "id"=>"rate",
            "label_text"=>"currency rate",
            'min'=>0,
            "step"=>'any',
            "placeholder"=>"Rate to CHF multiplier",
            "required" =>true,
        ),
        "date"=> array("type"=>"date",
            "name"=>'date',
            "id"=>"date",
            "label_text"=>"Date",
            "placeholder"=>"Input Date",
            "required" =>false,
        ),
        "rank"=> array("type"=>"number",
            "name"=>'rank',
            "label_text"=>"Rank",
            'min'=>0,
            "placeholder"=>"a number to sort",
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
        "currency"=> array("type"=>"select",
            "name"=>'currency',
            "id"=>"search_currency",
            "class"=>"Currency",
            "label_text"=>"",
            "select_option_text"=>'Currency',
            'field_option_0'=>"currency",
            'field_option_1'=>"currency",
            "required" =>false,
        ),
        "currency_country"=> array("type"=>"select",
            "name"=>'currency_country',
            "id"=>"search_currency_country",
            "class"=>"Currency",
            "label_text"=>"",
            "select_option_text"=>'Currency',
            'field_option_0'=>"currency_country",
            'field_option_1'=>"currency_country",
            "required" =>false,
        ),
        "date"=> array("type"=>"select",
            "name"=>'date',
            "id"=>"search_date",
            "class"=>"Currency",
            "label_text"=>"",
            "select_option_text"=>'date',
            'field_option_0'=>"date",
            'field_option_1'=>"date",
            "required" =>false,
        ),
        "rank"=> array("type"=>"select",
            "name"=>'rank',
            "id"=>"search_rank",
            "class"=>"Currency",
            "label_text"=>"",
            "select_option_text"=>'rank',
            'field_option_0'=>"rank",
            'field_option_1'=>"rank",
            "required" =>false,
        ),
    );



    public static $db_field_search =array('search_all','id','date','currency','currency_country','rate','download_csv');

    public static $page_name="Currency";
    public static $page_manage="manage_currency.php";
    public static $page_new="new_currency.php";
    public static $page_edit="edit_currency.php";
    public static $page_delete="delete_currency.php";

    public static $per_page;

public $id ;
public $currency ;
public $currency_country ;
public $rate ;
public $date ;
public $rank ;
public $comment ;
public $input_date ;

    public  function form_validation() {


        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
//        if(!isset($this->id)){$valid->unique_category();}

        $valid->is_numeric('rate',['min'=>0]);
        $valid->validate_min_lengths(array('currency'=>3));
        $valid->validate_max_lengths(array('currency'=>3));

        return $valid;

    }



}
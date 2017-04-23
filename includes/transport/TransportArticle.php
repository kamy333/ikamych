<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/22/2017
 * Time: 4:21 AM
 */
class TransportArticle extends DatabaseObject
{

    protected static $table_name = "transport_article";

    protected static $db_fields = array('id', 'zone_depart_id', 'zone_arrivee_id', 'zone_depart', 'zone_arrivee', 'currency_id', 'prix_course', 'input_date', 'modification_time', 'username');

    public static $required_fields = array('zone_depart_id', 'zone_arrivee_id', 'zone_depart', 'zone_arrivee', 'currency_id', 'prix_course');

    protected static $db_fields_table_display_short = array('zone_depart', 'zone_arrivee', 'currency_id', 'prix_course', 'username', 'modification_time');

    protected static $db_fields_table_display_full = array('zone_depart', 'zone_arrivee', 'currency_id', 'prix_course', 'username', 'modification_time');

    protected static $db_field_exclude_table_display_sort = array();


    public static $fields_numeric = array('id', 'zone_depart_id', 'zone_arrivee_id', 'currency_id');
    public static $fields_numeric_format = array('prix_course');


    public static $get_form_element = array('zone_depart_id', 'zone_arrivee_id', 'currency_id', 'prix_course');
    public static $get_form_element_others = array();
    public static $form_default_value = array(
//        "input_date"=>"now()",
//        "modification_time"=>"nowtime()",

    );

    public static $page_name = "Article";
    public static $page_manage = "manage_ajax.php?class_name=TransportArticle";
    public static $page_new = "new_ajax.php?class_name=TransportArticle";
    public static $page_edit = "edit_ajax.php?class_name=TransportArticle";
    public static $page_delete = "delete_ajax.php?class_name=TransportArticle";
    public static $per_page;

    public $id;
    public $zone_depart_id;
    public $zone_arrivee_id;
    public $zone_depart;
    public $zone_arrivee;
    public $currency_id;
    public $prix_course;
    public $rank;
    public $input_date;
    public $modification_time;
    public $username;

# "zone_depart_id","zone_arrivee_id","zone_depart","zone_arrivee","zone_nom","prix_course"

# $zone_depart_id;$zone_arrivee_id;$zone_depart;$zone_arrivee;$zone_nom;$prix_course;

    protected static $form_properties = array();

    protected static $form_properties_search = array();

    public static $db_field_search = array('search_all', 'download_csv');

    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
        return $valid;


    }


}
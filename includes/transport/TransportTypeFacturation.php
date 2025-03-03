<?php



/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/22/2017
 * Time: 5:22 AM
 */
class TransportTypeFacturation extends DatabaseObject
{

    protected static $table_name = "transport_type_facturation";

    protected static $db_fields = array('id', 'type_facturation', 'type_facture_nom', 'report_name_facturation', 'input_date', 'modification_time', 'username');

    public static $required_fields = array('type_facturation', 'type_facture_nom', 'report_name_facturation');

    protected static $db_fields_table_display_short = array('id', 'type_facturation', 'type_facture_nom', 'report_name_facturation', 'input_date', 'modification_time', 'username');


    protected static $db_fields_table_display_full = array('id', 'type_facturation', 'type_facture_nom', 'report_name_facturation', 'input_date', 'modification_time', 'username');


    protected static $db_field_exclude_table_display_sort = array('username');

    public static $fields_numeric = array('id',);
    public static $fields_numeric_format = array();

    public static $get_form_element = array('type_facturation', 'type_facture_nom', 'report_name_facturation');
    public static $get_form_element_others = array();
    public static $form_default_value = array(
//        "input_date"=>"now()",
//        "modification_time"=>"nowtime()",

    );

    public static $page_name = "Type Facturation";
    public static $page_manage = "manage_ajax.php?class_name=TransportFacturationType";
    public static $page_new = "new_ajax.php?class_name=TransportFacturationType";
    public static $page_edit = "edit_ajax.php?class_name=TransportFacturationType";
    public static $page_delete = "delete_ajax.php?class_name=TransportFacturationType";
    public static $per_page;

    public $id;
    public $type_facturation;
    public $type_facture_nom;
    public $report_name_facturation;

    public $rank;
    public $comment;
    public $input_date;
    public $modification_time;
    public $username;


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
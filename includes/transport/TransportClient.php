<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12-May-16
 * Time: 11:13 PM
 */
class TransportClient extends DatabaseObject
{

protected static $table_name="transport_clients";

    protected static $db_fields = array('id','pseudo','liste_restrictive','web_view','last_name','first_name','address','cp','city','country','default_price','default_depart','default_arrivee','liste_rank','remarque','input_date','modification_time','username');



    protected static $required_fields = array('id','pseudo','liste_restrictive','web_view','last_name','first_name','address','cp','city','country','default_price','default_depart','default_arrivee','liste_rank','remarque','input_date','modification_time','username');

    protected static $db_fields_table_display_short = array('id','pseudo','liste_restrictive','web_view','last_name','first_name','address','cp','city','country','default_price','default_depart','default_arrivee','liste_rank','remarque','input_date','modification_time','username');

    protected static $db_fields_table_display_full = array('id','pseudo','liste_restrictive','web_view','last_name','first_name','address','cp','city','country','default_price','default_depart','default_arrivee','liste_rank','remarque','input_date','modification_time','username');


    protected static $db_field_exclude_table_display_sort=array();

    public static $fields_numeric=array('id','user_id','default_price');
    public static $fields_numeric_format=array('prix_course');

    public static $get_form_element= array('pseudo','liste_restrictive','web_view','last_name','first_name','address','cp','city','country','default_price','default_depart','default_arrivee','liste_rank','remarque');


    public static $get_form_element_chauffeur=array('pseudo','liste_restrictive','web_view','last_name','first_name','address','cp','city','country','default_price','default_depart','default_arrivee','liste_rank','remarque');

    public static $get_form_element_others=array();

    public static $form_default_value=array(
        "modification_time"=>"nowtime()",
        "type_transport_id"=>"1",
        "chauffeur_id"=>"1",
        "aller_retour"=>"AllerSimple"

    );

    protected static $form_properties= array(
        "visible" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Visible",
                    "name"=>"visible",
                    "label_radio"=>"non",
                    "value"=>"No",
                    "id"=>"visible_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Validation chauffeur",
                    "name"=>"Visible",
                    "label_radio"=>"oui",
                    "value"=>"Yes",
                    "id"=>"visible_yes",
                    "default"=>false)),
        ),
        "week_day_rank_id" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Jour",
                    "name"=>"week_day_rank_id",
                    "label_radio"=>"Dim",
                    "value"=>"0",
                    "id"=>"week_day_id_dim",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Jour",
                    "name"=>"week_day_rank_id",
                    "label_radio"=>"Lun",
                    "value"=>"1",
                    "id"=>"week_day_id_lun",
                    "default"=>false)),
            array(2,
                array(
                    "label_all"=>"Jour",
                    "name"=>"week_day_rank_id",
                    "label_radio"=>"Mar",
                    "value"=>"2",
                    "id"=>"week_day_id_mar",
                    "default"=>false)),
            array(3,
                array(
                    "label_all"=>"Jour",
                    "name"=>"week_day_rank_id",
                    "label_radio"=>"Mer",
                    "value"=>"3",
                    "id"=>"week_day_id_mer",
                    "default"=>false)),
            array(4,
                array(
                    "label_all"=>"Jour",
                    "name"=>"week_day_rank_id",
                    "label_radio"=>"Jeu",
                    "value"=>"4",
                    "id"=>"week_day_id_jeu",
                    "default"=>false)),
            array(5,
                array(
                    "label_all"=>"Jour",
                    "name"=>"week_day_rank_id",
                    "label_radio"=>"Ven",
                    "value"=>"5",
                    "id"=>"week_day_id_ven",
                    "default"=>false)),
            array(6,
                array(
                    "label_all"=>"Jour",
                    "name"=>"week_day_rank_id",
                    "label_radio"=>"Sam",
                    "value"=>"6",
                    "id"=>"week_day_id_sam",
                    "default"=>false)),
        ),
        "client_habituel" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"client_habituel",
                    "name"=>"client_habituel",
                    "label_radio"=>"non",
                    "value"=>"0",
                    "id"=>"client_habituel_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Client habituel",
                    "name"=>"validated_chauffeur",
                    "label_radio"=>"oui",
                    "value"=>"1",
                    "id"=>"client_habituel_yes",
                    "default"=>false)),
        ),
        "client_id"=> array("type"=>"select",
            "name"=>'client_id',
            "class"=>"TransportClient",
            "label_text"=>"Client",
            "select_option_text"=>'Client',
            'field_option_0'=>"id",
            'field_option_1'=>"pseudo",
            "required" =>true,
        ),
        "heure"=> array("type"=>"time",
            "name"=>'heure',
            "label_text"=>"Heure départ",
            "placeholder"=>"Heure",
            "required" =>false,
        ),
        "inverse_address" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"inverse_address",
                    "name"=>"inverse_address",
                    "label_radio"=>"Non",
                    "value"=>"0",
                    "id"=>"inverse_address_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"inverse_address",
                    "name"=>"inverse_address",
                    "label_radio"=>"Oui",
                    "value"=>"1",
                    "id"=>"inverse_address_yes",
                    "default"=>false)),
        ),
        "chauffeur_id"=> array("type"=>"select",
            "name"=>'chauffeur_id',
            "class"=>"TransportChauffeur",
            "label_text"=>"Chauffeur",
            "select_option_text"=>'Chauffeur',
            'field_option_0'=>"id",
            'field_option_1'=>"chauffeur_name",
            "required" =>false,
        ),
        "type_transport_id"=> array("type"=>"select",
            "name"=>'type_transport_id',
            "class"=>"TransportType",
            "label_text"=>"Transport_type",
            "select_option_text"=>'Transport Type',
            'field_option_0'=>"id",
            'field_option_1'=>"type_transport",
            "required" =>false,
        ),
        "pseudo_autres"=> array("type"=>"text",
            "name"=>'pseudo_autres',
            "label_text"=>"pseudo_autres",
            "placeholder"=>"pseudo_autres",
            "required" =>false,
        ),
        "aller_retour" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Aller Retour",
                    "name"=>"aller_retour",
                    "label_radio"=>"non",
                    "value"=>"AllerSimple",
                    "id"=>"aller_retour_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Aller Retour",
                    "name"=>"aller_retour",
                    "label_radio"=>"oui",
                    "value"=>"AllerRetour",
                    "id"=>"aller_retour_yes",
                    "default"=>false)),
        ),
        "depart"=> array("type"=>"text",
            "name"=>'depart',
            "label_text"=>"Depart",
            "placeholder"=>"Depart",
            "required" =>false,
        ),
        "arrivee"=> array("type"=>"text",
            "name"=>'arrivee',
            "label_text"=>"Arrivee",
            "placeholder"=>"Arrivee",
            "required" =>false,
        ),
        "nom_patient"=> array("type"=>"text",
            "name"=>'nom_patient',
            "label_text"=>"Nom Patient",
            "placeholder"=>"Nom Patient",
            "required" =>false,
        ),
        "bon_no"=> array("type"=>"text",
            "name"=>'bon_no',
            "label_text"=>"Bon No",
            "placeholder"=>"Bon No",
            "required" =>false,
        ),
        "prix_course"=> array("type"=>"number",
            "name"=>'prix_course',
            "label_text"=>"Prix Course",
            'min'=>0,
            "placeholder"=>"Prix Course",
            "step"=>"0.01",
            "required" =>false,
        ),
        "remarque"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"Comment",
            "placeholder"=>"input Comment",
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
        "id"=> array("type"=>"number",
            "name"=>'id',
            "id"=>"search_id",
            "label_text"=>"",
            'min'=>0,
            "placeholder"=>"ID",
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

        "depart"=> array("type"=>"select",
            "name"=>'depart',
            "id"=>"search_depart",
            "class"=>"TransportProgramming",
            "label_text"=>"",
            "select_option_text"=>'Depart',
            'field_option_0'=>"depart",
            'field_option_1'=>"depart",
            "required" =>false,
        ),

        "arrivee"=> array("type"=>"select",
            "name"=>'arrivee',
            "id"=>"search_arrivee",
            "class"=>"TransportProgrammingModel",
            "label_text"=>"",
            "select_option_text"=>'Arrivee',
            'field_option_0'=>"arrivee",
            'field_option_1'=>"arrivee",
            "required" =>false,
        ),
        "aller_retour"=> array("type"=>"select",
            "name"=>'aller_retour',
            "id"=>"search_aller_retour",
            "class"=>"TransportProgrammingModel",
            "label_text"=>"",
            "select_option_text"=>'aller_retour',
            'field_option_0'=>"aller_retour",
            'field_option_1'=>"aller_retour",
            "required" =>false,
        ),

    );

    

public $id  ;
public $pseudo  ;
public $liste_restrictive;
public $web_view  ;
public $last_name  ;
public $first_name  ;
public $address  ;
public $cp  ;
public $city  ;
public $country  ;
public $default_price  ;
public $default_depart  ;
public $default_arrivee  ;
public $liste_rank  ;
public $remarque;
public $input_date;
public $modification_time;
public $username;



    public static $db_field_search =array('search_all','download_csv');


    public static $page_name="Client";
    public static $page_manage="manage_TransportClient.php";
    public static $page_new="new_TransportClient.php";
    public static $page_edit="edit_TransportClient.php";
    public static $page_delete="delete_TransportClient.php";

    public static $per_page;



    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
        return $valid;



    }

    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". static::$page_new ."\">Add To Do ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"".TransportChauffeur::$page_new ."\">Add New Person ". " </a></a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpense::$page_manage ."\">View Expense ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpensePerson::$page_manage ."\">View Person ". " </a>";
        return $output;
    }
    
    
    
}
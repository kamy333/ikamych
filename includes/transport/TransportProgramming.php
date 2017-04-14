<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12-May-16
 * Time: 9:24 AM
 */
class TransportProgramming extends DatabaseObject
{


    public static $fields_numeric=array('id','user_id','model_id','client_id','chauffeur_id','type_transport_id','prix_course');
    public static $fields_numeric_format=array('prix_course');
    public static $get_form_element=array('chauffeur_id','course_date','type_transport_id','client_id','pseudo_autres','heure','aller_retour','depart','arrivee','type_transport_id','nom_patient','bon_no','prix_course');
    public static $get_form_element_chauffeur=array('chauffeur_id','course_date','type_transport_id','client_id','pseudo_autres','heure','aller_retour','depart','arrivee','type_transport_id','nom_patient','bon_no','prix_course');
    public static $get_form_element_others=array();
    public static $form_default_value=array(
        "course_date"=>"now()",
        "modification_time"=>"nowtime()",
        "validated_chauffeur"=>"0",
        "validated_mgr"=>"0",
        "validated_final"=>"0",
        "type_transport_id"=>"1",
        "chauffeur_id"=>"1",
        "aller_retour"=>"AllerSimple"

    );
    public static $db_field_search = array('search_all', 'download_csv');
    public static $page_name = "Course";
    public static $page_manage = "manage_TransportProgramming.php";
    public static $page_new = "new_TransportProgramming.php";
    public static $page_edit = "edit_TransportProgramming.php";
    public static $page_delete = "delete_TransportProgramming.php";
    public static $per_page;
    protected static $table_name = "transport_programming";

    protected static $db_fields = array('id', 'validated_chauffeur', 'validated_mgr', 'validated_final', 'course_date', 'model_id', 'client_id', 'pseudo', 'pseudo_autres', 'heure', 'aller_retour', 'chauffeur_id', 'depart', 'arrivee', 'type_transport_id', 'nom_patient', 'bon_no', 'prix_course', 'remarque', 'input_date', 'modification_time');

    protected static $required_fields = array('validated_chauffeur', 'validated_mgr', 'validated_final', 'course_date', 'client_id', 'pseudo_autres', 'heure', 'aller_retour', 'chauffeur_id', 'depart', 'arrivee', 'type_transport_id', 'nom_patient', 'bon_no', 'prix_course');
    protected static $db_fields_table_display_short = array('id',
        'validated_chauffeur', 'validated_mgr', 'validated_final', 'course_date', 'model_id', 'client_id', 'pseudo', 'pseudo_autres', 'heure', 'aller_retour', 'chauffeur_id', 'depart', 'arrivee', 'type_transport_id', 'nom_patient', 'bon_no', 'prix_course', 'remarque', 'input_date', 'modification_time');


    protected static $db_fields_table_display_full = array('id', 'validated_chauffeur', 'validated_mgr', 'validated_final', 'course_date', 'model_id', 'client_id', 'pseudo', 'pseudo_autres', 'heure', 'aller_retour', 'chauffeur_id', 'depart', 'arrivee', 'type_transport_id', 'nom_patient', 'bon_no', 'prix_course', 'remarque', 'input_date', 'modification_time');
    protected static $db_field_exclude_table_display_sort = array();
    protected static $form_properties= array(
        "validated_chauffeur" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Validation chauffeur",
                    "name"=>"validated_chauffeur",
                    "label_radio"=>"Non",
                    "value"=>"0",
                    "id"=>"validated_chauffeur_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Validation chauffeur",
                    "name"=>"validated_chauffeur",
                    "label_radio"=>"Oui",
                    "value"=>"1",
                    "id"=>"validated_chauffeur_yes",
                    "default"=>false)),
        ),
        "validated_mgr" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Validation Manager",
                    "name"=>"validated_mgr",
                    "label_radio"=>"Non",
                    "value"=>"0",
                    "id"=>"validated_mgr_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Validation Manager",
                    "name"=>"validated_chauffeur",
                    "label_radio"=>"Oui",
                    "value"=>"1",
                    "id"=>"validated_mgr_yes",
                    "default"=>false)),
        ),
        "validated_final" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Validation Final",
                    "name"=>"validated_final",
                    "label_radio"=>"non",
                    "value"=>"0",
                    "id"=>"validated_final_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Validation Final",
                    "name"=>"validated_final",
                    "label_radio"=>"oui",
                    "value"=>"1",
                    "id"=>"validated_final_yes",
                    "default"=>false)),
        ),
        "course_date"=> array("type"=>"date",
            "name"=>'course_date',
            "label_text"=>"Course Date",
            "placeholder"=>"Course Date",
            "required" =>true,
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
        "heure"=> array("type"=>"time",
            "name"=>'heure',
            "label_text"=>"Heure départ",
            "placeholder"=>"Heure",
            "required" =>false,
        ),
        "aller_retour" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Aller Retour",
                    "name"=>"aller_retour",
                    "label_radio"=>"Non",
                    "value"=>"AllerSimple",
                    "id"=>"aller_retour_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Aller Retour",
                    "name"=>"aller_retour",
                    "label_radio"=>"Oui",
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
            "class"=>"TransportProgramming",
            "label_text"=>"",
            "select_option_text"=>'Arrivee',
            'field_option_0'=>"arrivee",
            'field_option_1'=>"arrivee",
            "required" =>false,
        ),
        "aller_retour"=> array("type"=>"select",
            "name"=>'aller_retour',
            "id"=>"search_aller_retour",
            "class"=>"TransportProgramming",
            "label_text"=>"",
            "select_option_text"=>'aller_retour',
            'field_option_0'=>"aller_retour",
            'field_option_1'=>"aller_retour",
            "required" =>false,
        ),

    );
   public $id;
   public $validated_chauffeur;
   public $validated_mgr;
   public $validated_final;
   public $course_date;
   public $model_id;
   public $client_id;
   public $pseudo;
   public $pseudo_autres;
   public $heure;
   public $aller_retour;
   public $chauffeur_id;
   public $depart;
   public $arrivee;
   public $type_transport_id;
   public $nom_patient;
   public $bon_no;
   public $prix_course;
   public $remarque;
   public $input_date;
   public $modification_time;
   public $username;


    public function form_validation()
    {
        $valid = new FormValidation();


        $valid->validate_presences(self::$required_fields);


    }


    protected function set_up_display()
    {

    }

}
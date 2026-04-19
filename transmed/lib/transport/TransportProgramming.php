<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12-May-16
 * Time: 9:24 AM
 */
class TransportProgramming extends DatabaseObject
{
    protected static $table_name = "transport_programming";

    protected static $db_fields = array('id', 'validated_chauffeur', 'validated_mgr', 'validated_final', 'course_date', 'model_id', 'client_id', 'pseudo', 'pseudo_autres', 'heure', 'drive_mode', 'start_drive', 'end_drive', 'aller_retour', 'aller_retour_origin_id', 'aller_appel', 'retour_appel', 'appel', 'chauffeur_id', 'depart', 'arrivee', 'type_transport_id', 'nom_patient', 'bon_no', 'prix_course', 'remarque', 'input_date', 'modification_time', 'username');


    public static $db_fields_not_set_post = ['aller_appel', 'retour_appel'];

    protected static $required_fields = array('course_date', 'client_id', 'heure', 'aller_retour', 'chauffeur_id', 'type_transport_id',);


    protected static $db_fields_table_display_short = array('id', 'aller_retour', 'appel', 'aller_appel', 'retour_appel',
        'validated_chauffeur', 'validated_mgr', 'validated_final', 'course_date', 'model_id', 'client_id', 'pseudo', 'heure', 'chauffeur_id', 'depart', 'arrivee', 'type_transport_id', 'prix_course',);


    protected static $db_fields_table_display_full = array('id', 'validated_chauffeur', 'validated_mgr', 'validated_final', 'course_date', 'model_id', 'client_id', 'pseudo', 'pseudo_autres', 'heure', 'aller_retour', 'appel', 'aller_appel', 'retour_appel', 'drive_mode', 'start_drive', 'end_drive', 'aller_retour_origin_id', 'chauffeur_id', 'depart', 'arrivee', 'type_transport_id', 'nom_patient', 'bon_no', 'prix_course', 'remarque', 'input_date', 'modification_time');


    public static $fields_numeric = array('id', 'user_id', 'model_id', 'client_id', 'chauffeur_id', 'type_transport_id', 'prix_course', 'aller_retour', 'aller_retour_origin_id', 'appel', 'aller_appel', 'retour_appel');

//    public static $fields_numeric_integer = array('id', 'user_id', 'model_id', 'client_id', 'chauffeur_id', 'type_transport_id');
//
//    public static $fields_numeric_float = array('prix_course');


    public static $fields_numeric_format = array('prix_course');

    public static $get_form_element = array('chauffeur_id', 'course_date', 'type_transport_id', 'client_id', 'pseudo_autres', 'heure', 'aller_retour', 'aller_appel', 'retour_appel', 'depart', 'arrivee', 'nom_patient', 'bon_no', 'prix_course');

    public static $get_form_element_chauffeur = array('chauffeur_id', 'course_date', 'type_transport_id', 'client_id', 'pseudo_autres', 'heure', 'aller_retour', 'appel', 'aller_appel', 'depart', 'arrivee', 'type_transport_id', 'nom_patient', 'bon_no', 'prix_course');


    public static $get_form_element_others = array();
    public static $form_default_value = array(
        "course_date" => "now()",
        "modification_time" => "nowtime()",
        "validated_chauffeur" => "0",
        "validated_mgr" => "0",
        "validated_final" => "0",
        "type_transport_id" => "1",
        "chauffeur_id" => "1",
        "aller_retour" => "0",
        "aller_appel" => "0",
        "retour_appel" => "0",
        "appel" => 0,

    );
    public static $db_field_search = array('search_all', 'download_csv');
    public static $page_name = "Course";


    public static $page_manage = "manage_TransportProgramming.php";
    public static $page_new = "new_TransportProgramming.php";
    public static $page_edit = "edit_TransportProgramming.php";
    public static $page_delete = "delete_TransportProgramming.php";

    public static $per_page = 20;


    protected static $db_field_exclude_table_display_sort = array();

    protected static $form_properties = array(
        "validated_chauffeur" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Validation chauffeur",
                    "name" => "validated_chauffeur",
                    "label_radio" => "Non",
                    "value" => "0",
                    "id" => "validated_chauffeur_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Validation chauffeur",
                    "name" => "validated_chauffeur",
                    "label_radio" => "Oui",
                    "value" => "1",
                    "id" => "validated_chauffeur_yes",
                    "default" => false)),
        ),
        "drive_mode" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Drive mode",
                    "name" => "drive_mode",
                    "label_radio" => "Non",
                    "value" => "0",
                    "id" => "drive_mode_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Validation chauffeur",
                    "name" => "drive_mode",
                    "label_radio" => "Oui",
                    "value" => "1",
                    "id" => "drive_mode_yes",
                    "default" => false)),
        ),
        "validated_mgr" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Validation Manager",
                    "name" => "validated_mgr",
                    "label_radio" => "Non",
                    "value" => "0",
                    "id" => "validated_mgr_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Validation Manager",
                    "name" => "validated_mgr",
                    "label_radio" => "Oui",
                    "value" => "1",
                    "id" => "validated_mgr_yes",
                    "default" => false)),
        ),
        "validated_final" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Validation Final",
                    "name" => "validated_final",
                    "label_radio" => "non",
                    "value" => "0",
                    "id" => "validated_final_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Validation Final",
                    "name" => "validated_final",
                    "label_radio" => "oui",
                    "value" => "1",
                    "id" => "validated_final_yes",
                    "default" => false)),
        ),
        "course_date" => array("type" => "date",
            "name" => 'course_date',
            "label_text" => "Course Date",
            "placeholder" => "Course Date",
            "required" => true,
        ),


        "client_id" => array("type" => "selectchosen",
            "name" => 'client_id',
            "class" => "TransportClient",
            "label_text" => "Client",
            "select_option_text" => 'Client',
            'field_option_0' => "id",
            'field_option_1' => "pseudo",
            "required" => true,
        ),
        "chauffeur_id" => array("type" => "selectchosen",
            "name" => 'chauffeur_id',
            "class" => "TransportChauffeur",
            "label_text" => "Chauffeur",
            "select_option_text" => 'Chauffeur',
            'field_option_0' => "id",
            'field_option_1' => "chauffeur_name",
            "required" => false,
        ),
        "type_transport_id" => array("type" => "selectchosen",
            "name" => 'type_transport_id',
            "class" => "TransportType",
            "label_text" => "Transport_type",
            "select_option_text" => 'Transport Type',
            'field_option_0' => "id",
            'field_option_1' => "type_transport",
            "required" => false,
        ),
        "pseudo_autres" => array("type" => "text",
            "name" => 'pseudo_autres',
            "label_text" => "pseudo_autres",
            "placeholder" => "pseudo_autres",
            "required" => false,
        ),
        "heure" => array("type" => "clockwise",
            "name" => 'heure',
            "label_text" => "Heure depart",
            "placeholder" => "Heure",
            "script" => "
<script type=\"text/javascript\">
$('.clockpicker').clockpicker({    placement:'top',    align: 'bottom',    donetext: 'Done'});
</script>
",
            "required" => false,
        ),
        "aller_retour" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Aller Retour",
                    "name" => "aller_retour",
                    "label_radio" => "Non",
                    "value" => "0",
                    "id" => "aller_retour_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Aller Retour",
                    "name" => "aller_retour",
                    "label_radio" => "Oui",
                    "value" => "1",
                    "id" => "aller_retour_yes",
                    "default" => false)),
        ),
        "aller_appel" => array("type" => "checkbox",
            "name" => 'aller_appel',
            "label_text" => "Aller appel",

        ),
        "retour_appel" => array("type" => "checkbox",
            "name" => 'retour_appel',
            "label_text" => "Retour appel",

        ),


        "appel" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Sur Appel",
                    "name" => "appel",
                    "label_radio" => "Aucun",
                    "value" => "0",
                    "id" => "appel_Aucun",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Sur Appel",
                    "name" => "appel",
                    "label_radio" => "Aller",
                    "value" => "1",
                    "id" => "appel_Aller",
                    "default" => false)),
            array(2,
                array(
                    "label_all" => "Sur Appel",
                    "name" => "appel",
                    "label_radio" => "Retour",
                    "value" => "2",
                    "id" => "appel_Retour",
                    "default" => true)),
            array(3,
                array(
                    "label_all" => "Sur Appel",
                    "name" => "appel",
                    "label_radio" => "Tous",
                    "value" => "3",
                    "id" => "appel_Tous",
                    "default" => true)),
        ),

//    il faudra avoir pour inline un nom différent
//        "appel" => array("type" => "checkboxinline",
//            array(0,
//                array(
//                    "label_all" => "Appel",
//                    "name" => "aller_appel",
//                    "label_checkbox" => "Aller Appel",
//                    "value" => "0",
//                    "checked"=>false,
//                    "id" => "aller_appel",
//                    "default" => false,
//                )),
//            array(1,
//                array(
//                    "label_all" => "Appel",
//                    "name" => "retour_appel",
//                    "label_checkbox" => "Retour appel",
//                    "value" => "0",
//                    "checked"=>false,
//                    "id" => "retour_appel",
//                    "default" => false,
//                )),
//
//        ),
        "depart" => array("type" => "text",
            "name" => 'depart',
            "label_text" => "Depart",
            "placeholder" => "Depart",
            "required" => false,
        ),
        "arrivee" => array("type" => "text",
            "name" => 'arrivee',
            "label_text" => "Arrivee",
            "placeholder" => "Arrivee",
            "required" => false,
        ),
        "nom_patient" => array("type" => "text",
            "name" => 'nom_patient',
            "label_text" => "Nom Patient",
            "placeholder" => "Nom Patient",
            "required" => false,
        ),
        "bon_no" => array("type" => "text",
            "name" => 'bon_no',
            "label_text" => "Bon No",
            "placeholder" => "Bon No",
            "required" => false,
        ),
        "prix_course" => array("type" => "number",
            "name" => 'prix_course',
            "label_text" => "Prix Course",
            'min' => 0,
            "placeholder" => "Prix Course",
            "step" => "0.01",
            "required" => false,
        ),
        "remarque" => array("type" => "textarea",
            "name" => 'comment',
            "label_text" => "Comment",
            "placeholder" => "input Comment",
            "required" => false,
        ),

    );

    protected static $form_properties_search = array(
        "search_all" => array("type" => "text",
            "name" => 'search_all',
            "label_text" => "",
            "placeholder" => "Search all",
            "required" => false,
        ),
        "id" => array("type" => "number",
            "name" => 'id',
            "id" => "search_id",
            "label_text" => "",
            'min' => 0,
            "placeholder" => "ID",
            "required" => false,
        ),


        "download_csv" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "non",
                    "value" => "No",
                    "id" => "visible_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "oui",
                    "value" => "Yes",
                    "id" => "visible_yes",
                    "default" => true)),
        ),

        "depart" => array("type" => "select",
            "name" => 'depart',
            "id" => "search_depart",
            "class" => "TransportProgramming",
            "label_text" => "",
            "select_option_text" => 'Depart',
            'field_option_0' => "depart",
            'field_option_1' => "depart",
            "required" => false,
        ),

        "arrivee" => array("type" => "select",
            "name" => 'arrivee',
            "id" => "search_arrivee",
            "class" => "TransportProgramming",
            "label_text" => "",
            "select_option_text" => 'Arrivee',
            'field_option_0' => "arrivee",
            'field_option_1' => "arrivee",
            "required" => false,
        ),
        "aller_retour" => array("type" => "select",
            "name" => 'aller_retour',
            "id" => "search_aller_retour",
            "class" => "TransportProgramming",
            "label_text" => "",
            "select_option_text" => 'aller_retour',
            'field_option_0' => "aller_retour",
            'field_option_1' => "aller_retour",
            "required" => false,
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

    public $drive_mode;
    public $start_drive;
    public $end_drive;
    public $aller_retour_origin_id;

    public $appel;
    public $retour_appel;
    public $aller_appel;


    public $errors;

    public function form_validation()
    {
        $valid = new FormValidation();
        $valid->validate_presences(static::$required_fields);

//        if(!isset($this->aller_appel)){
//            $this->aller_appel =0;
//        }
//
//        if(!isset($this->retour_appel)){
//            $this->retour_appel =0;
//        }

//        if(!isset($_POST['aller_appel'])){
//            $this->aller_appel =0;
//        }
//
//        if(!isset($_POST['retour_appel'])){
//            $this->retour_appel =0;
//        }

        return $valid;

    }


    protected function set_up_display()
    {
        if (!isset($this->validated_chauffeur)) {
            $this->validated_chauffeur = 0;
        }

        if (!isset($this->validated_mgr)) {
            $this->validated_mgr = 0;
        }

        if (!isset($this->validated_final)) {
            $this->validated_final = 0;
        }


//        $AR = T_Aller_Retour::find_by_id(1);
//        $aller_retour = $AR->Aller_Retour;
////
//        log_debug("aller_appel",$this->aller_appel);
//        log_debug("aller_retour_origin_id",$this->aller_retour_origin_id);

//        if(isset($_POST['retour_appel'])){
//            log_debug("isset retour_appel",$this->retour_appel);
//            return;
//        } else{
//            log_debug("NOT isset retour_appel",$this->retour_appel);
//
//        }
//
//        if(isset($_POST['retour_appel'])){
//            log_debug("isset retour_appel",$this->retour_appel);
//            return;
//        } else{
//            log_debug("NOT isset retour_appel",$this->retour_appel);
//
//        }


        if (!isset($this->aller_retour)) {
            $this->aller_retour = 0;
        }

        if (!isset($this->aller_appel)) {
            $this->aller_appel = 0;
        }

        if (!isset($this->retour_appel)) {
            $this->retour_appel = 0;
        }
//
//        if(isset($this->aller_appel) && $this->aller_appel=='on'){
//            $this->aller_appel=1;
//        } else{
//            $this->aller_appel=0;
//        }
//
//        if(isset($this->retour_appel) && $this->retour_appel=='on'){
//            $this->retour_appel=1;
//        } else {
//            $this->retour_appel=0;
//
//        }
////
//        if (!isset($this->aller_retour_origin_id)) {
//            if ($aller_retour == $AR->Aller_Retour) {
//                $this->aller_retour_origin_id = 0;
//            } else {
//                $this->aller_retour_origin_id = $this->id;
//
//            }
////        }


        if (!isset($this->type_transport_id)) {
            $this->type_transport_id = 1;
        }

        if (!isset($this->chauffeur_id)) {
            $this->chauffeur_id = 6; //autres
        }

        if (!isset($this->depart)) {
            $this->depart = ""; //autres
        }

        if (!isset($this->arrivee)) {
            $this->arrivee = ""; //autres
        }

        if (!isset($this->input_date)) {
            $this->input_date = now_sql(); //autres
        }

        if (!isset($this->heure)) {
            $this->heure = "00:00"; //autres
        } else {
            $this->heure = substr($this->heure, 0, 5);
        }


        if (isset($this->client_id)) {
            $this->client_id = (int)$this->client_id;
            $client = TransportClient::find_by_id($this->client_id);
            $this->pseudo = $client->pseudo;

        }


    }

}
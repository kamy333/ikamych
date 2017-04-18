<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12-May-16
 * Time: 11:10 PM
 */
class TransportProgrammingModel extends DatabaseObject
{

    public static $fields_numeric=array('id','user_id','week_day_rank_id','client_id','chauffeur_id','type_transport_id','prix_course');
    public static $fields_numeric_format=array('prix_course');
    public static $get_form_element = array('id', 'visible', 'week_day_rank_id', 'client_habituel', 'client_id', 'heure', 'inverse_address', 'depart', 'arrivee', 'prix_course', 'chauffeur_id', 'type_transport_id', 'remarque');
    public static $get_form_element_chauffeur = array('id', 'visible', 'week_day_rank_id', 'client_habituel', 'client_id', 'heure', 'inverse_address', 'depart', 'arrivee', 'prix_course', 'chauffeur_id', 'type_transport_id', 'remarque');
    public static $get_form_element_others=array();
    public static $form_default_value=array(
        "modification_time"=>"nowtime()",
        "type_transport_id"=>"1",
        "chauffeur_id"=>"1",
        "aller_retour" => "AllerSimple",
        "inverse_address" => "0",
        "visible" => "1",
        "week_day_rank_id" => "1",
        "client_habituel" => "1",
        "prix_course" => "0"

    );
    public static $db_field_search = array('search_all', 'download_csv');
    public static $page_name = "Model";
    public static $page_manage = "manage_TransportProgrammingModel.php";
    public static $page_new = "new_TransportProgrammingModel.php";
    public static $page_edit = "edit_TransportProgrammingModel.php";
    public static $page_delete = "delete_TransportProgrammingModel.php";
    public static $per_page;


    protected static $table_name = "transport_programming_model";

    protected static $db_fields = array('id', 'visible', 'week_day_rank_id', 'client_habituel', 'client_id', 'heure', 'inverse_address', 'depart', 'arrivee', 'prix_course', 'chauffeur_id', 'type_transport_id', 'remarque', 'input_date', 'modification_time', 'username');
    protected static $required_fields = array('visible', 'week_day_rank_id', 'client_habituel', 'client_id', 'heure', 'inverse_address', 'depart', 'arrivee', 'chauffeur_id', 'type_transport_id',);
    protected static $db_fields_table_display_short = array('id', 'visible', 'week_day_rank_id', 'client_habituel', 'client_id', 'heure', 'inverse_address', 'depart', 'arrivee', 'prix_course', 'chauffeur_id', 'type_transport_id', 'remarque');
    protected static $db_fields_table_display_full = array('id', 'visible', 'week_day_rank_id', 'client_habituel', 'client_id', 'heure', 'inverse_address', 'depart', 'arrivee', 'prix_course', 'chauffeur_id', 'type_transport_id', 'remarque', 'input_date', 'modification_time', 'username');
    protected static $db_field_exclude_table_display_sort = array();
    protected static $form_properties= array(
        "visible" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Visible",
                    "name"=>"visible",
                    "label_radio" => "Non",
                    "value" => "0",
                    "id"=>"visible_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Validation chauffeur",
                    "name" => "visible",
                    "label_radio" => "Oui",
                    "value" => "1",
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
                    "label_all" => "Client_habituel",
                    "name"=>"client_habituel",
                    "label_radio" => "Non",
                    "value"=>"0",
                    "id"=>"client_habituel_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Client habituel",
                    "name" => "client habituel",
                    "label_radio" => "Oui",
                    "value"=>"1",
                    "id"=>"client_habituel_yes",
                    "default"=>false)),
        ),
        "client_id" => array("type" => "selectchosen",
            "name"=>'client_id',
            "class"=>"TransportClient",
            "label_text"=>"Client",
            "select_option_text"=>'Client',
            'field_option_0'=>"id",
            'field_option_1'=>"pseudo",
            "required" =>true,
        ),
        "heure" => array("type" => "clockwise",
            "name"=>'heure',
            "label_text" => "Heure depart",
            "placeholder"=>"Heure",
            "script" => "
<script type=\"text/javascript\">
$('.clockpicker').clockpicker({    placement:'top',    align: 'bottom',    donetext: 'Done'});
</script>
",
            "required" => false,
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
        "chauffeur_id" => array("type" => "selectchosen",
            "name"=>'chauffeur_id',
            "class"=>"TransportChauffeur",
            "label_text"=>"Chauffeur",
            "select_option_text"=>'Chauffeur',
            'field_option_0'=>"id",
            'field_option_1'=>"chauffeur_name",
            "required" =>false,
        ),
        "type_transport_id" => array("type" => "selectchosen",
            "name"=>'type_transport_id',
            "class"=>"TransportType",
            "label_text" => "Transport type",
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
            "name" => 'remarque',
            "label_text" => "Commentaire",
            "placeholder" => "Votre Commentaire",
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
public $id ;
public $visible ;
public $week_day_rank_id ;
public $client_habituel;
public $client_id;
public $heure ;
public $inverse_address ;
public $depart ;
public $arrivee ;
public $prix_course ;
public $chauffeur_id ;
public $type_transport_id;
public $remarque  ;
public $input_date;
public $modification_time;
public $username;


public $color;

public $prev_date;
public $next_date;

public $prev_day;
public $next_day;




//public $chauffeur_name;
//public $type_transport;
//public $client_pseudo;


    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". static::$page_new ."\">Add Model ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"".TransportChauffeur::$page_new ."\">Add New Chauffeur ". " </a></a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". TransportProgramming::$page_manage ."\">View Course ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". TransportType::$page_manage ."\">View Type ". " </a>";
        return $output;
    }

    public static function nav_visible()
    {
        $title = "";

        $href_all = $_SERVER["PHP_SELF"] . "?cl=ViewPivot";
        $href_yes = $_SERVER["PHP_SELF"] . "?cl=ViewPivotYes";
        $href_no = $_SERVER["PHP_SELF"] . "?cl=ViewPivotNo";


        $title .= "&emsp;<span><a href='{$href_all}'><button style='width: 5em' class='btn btn-primary'>all</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_yes}'><button style='width: 5em' class='btn btn-info'>active</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_no}'><button style='width: 5em' class='btn btn-danger'>inactive</button></span></a></span>";
        $title .= "&emsp;<span><a><button style='width: 7em' id='show-dates' class='btn btn-warning '>Show Date</button></a></span>";
        $title .= "&emsp;<span><a   href='#'><button style='width: 7em' id='show-client-form' class='btn btn-danger '>Client</button></a></span>";

        return $title;
    }

    public static function main_display()
    {
//        return static::create_calendar_french();
        return call_user_func_array(["ViewTransportModelPivot","main_display"], []);

    }

    public static function create_calendar_french()
    {
        global $Nav;
        $ibox = true;
        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . self::$table_name . " ORDER BY heure ASC";
        $items = self::find_by_sql($sql);

        $href = $Nav->http . $Nav->folder . "/transport.php?class_name=" . get_called_class();

        $title = "<b>Table Name</b>&nbsp;&nbsp;  " . static::$table_name . "   <b>Page Name</b>&nbsp;&nbsp;  " . static::$page_name;

        $output = "$href";

        $output .= "<h1 class='text-center'>" . $title . "</h1>";

        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }

//        $output .= static::table_nav_additional();


        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $day_wk_fr = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
        $day_full_wk_fr = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

        $day_wk_en = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        $day_full_wk_en = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];


        $output .= "<thead>";
        $output .= "<tr>";
        $output .= "<th  class='text-center'>Heure</th>";

        foreach ($day_full_wk_fr as $day) {
            $output .= "<th  class='text-center'>$day</th>";
        }

        $output .= "<th class='text-center'>Action</th>";


        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";
        foreach ($items as $item) {
            $client = TransportClient::find_by_id((int)$item->client_id);
            $chauffeur = TransportChauffeur::find_by_id((int)$item->chauffeur_id);
            $transport_type = TransportType::find_by_id((int)$item->type_transport_id);

            $a = strtotime("next " . $day_full_wk_en[$item->week_day_rank_id]);
            $day_full_wk_en[$a];
            $date = strftime("%Y-%m-%d", $a);

            $a1 = strtotime($date . " " . $item->heure);
            $date = strftime("%H:%M", $a1);


            $output .= "<tr>";

//            $output.="<td>".$item->heure.$date."</td>";
            $output .= "<td>" . $date . "</td>";

            for ($x = 0; $x <= 6; $x++) {

                if ($x === (int)$item->week_day_rank_id) {
                    $output .= "<td>$client->pseudo $item->week_day_rank_id</td>";
                } else {
                    $output .= "<td></td>";
                }

            }
            $href_id_view = "href='" . $href . "&id=" . $item->id . "&action=view" . "'";
            $href_id_edit = "href='" . $href . "&id=" . $item->id . "&action=edit" . "'";
            $href_id_delete = "href='" . $href . "&id=" . $item->id . "&action=delete" . "'";


            $output .= "<td class='text-right'>
            
                                        <div class='btn-group'>
                                                                   
                   
                           
                    <a $href_id_view class='btn-white btn btn-xs'>View</a><span>&emsp;</span>
                    <a $href_id_edit class='btn-primary btn btn-xs'>Edit</a>&emsp;
                    <a $href_id_delete class='btn-danger btn btn-xs'>Delete</a>
                                        </div>
</td>";

            $output .= "</tr>";
        }
        $output .= "</tbody>";

        $output .= "</table>";
        $output .= "</div>";
        if (!$ibox) {
            $output .= "</div>";
            $output .= "</div>";
        }

        if (!$ibox) {
            return $output;
        } else {
            return ibox($output, 12, '');

        }

    }

    public function form_validation()
    {
        $valid = new FormValidation();


        $valid->validate_presences(self::$required_fields);
        $valid->validate_time(['heure']);

        $table = TransportChauffeur::get_table_name();
        $field = "id";
        $criteria = $_POST["chauffeur_id"];
        $valid->exist_in_table($table, $field, $criteria);

        $table = TransportClient::get_table_name();
        $field = "id";
        $criteria = $_POST["client_id"];
        $valid->exist_in_table($table, $field, $criteria);


        $table = TransportType::get_table_name();
        $field = "id";
        $criteria = $_POST["type_transport_id"];
        $valid->exist_in_table($table, $field, $criteria);

        $valid->is_numeric("prix_course");


//        validate heure
// validate client chauffeur
//


        return $valid;


    }

    protected function set_up_display()
    {
        global $session;

        if (!isset($this->input_date)) {
            $this->input_date = now_sql();
        }

        if (!isset($this->depart)) {
            $this->depart = "TBD";
        }

        if (!isset($this->arrivee)) {
            $this->arrivee = "TBD";
        }

        if (!isset($this->chauffeur_id)) {
            $this->chauffeur_id = 1;
        }

        if (!isset($this->type_transport_id)) {
            $this->type_transport_id = 1;
        }

        if (!isset($this->heure)) {
            $this->heure = now_time();
        }

        if (isset($this->heure)) {
            $this->heure = hr_mn_to_text($this->heure, 'full');
        }


        if($this->visible==1){
            $this->color="info";
        } else {
            $this->color="danger";

        }

        $this->modification_time = now_sql() . " " . now_time();

        $user = User::find_by_id((int)$session->user_id);
        $this->username = $user->username;


    }

    public static function reverse_visible($id=0)
    {
       global $session;

        $route=$_SERVER['PHP_SELF']."?class_name=".get_called_class();
        $model=static::find_by_id((int) $id);

        If($model->visible==0){
            $model->visible=1;
        }else {
            $model->visible=0;
        }

     if($model->save()) {
         $session->ok(true);
     $session->message("Successful statut visible updated ")    ;
     } else {
     $session->message("Caution failed updated ")    ;

     }
//     unset($_POST);
//        redirect_to("transport.php");
//        header("transport.php?class_name={$class_name}");
//        exit;
}

    public static function delete_record($id=0)
    {
        global $session;

        $route=$_SERVER['PHP_SELF']."?class_name=".get_called_class();
        $model=static::find_by_id((int) $id);



        ;
//        redirect_to("transport.php");   redirect does not work
        if($model->delete()) {
            $session->ok(true);
            $session->message("Successful deletion ")    ;
        } else {
            $session->message("Caution failed deletion ")    ;

        }

        unset($_POST);

    }


    public static function model_modal_element(TransportProgrammingModel $model, $item)
    {
//        $model = TransportProgrammingModel::find_by_id((int) $model_id);
        $output = "";

//        $data_target = get_called_class() . "-modal-id-" . $model->id;
        $data_target = "TransportProgrammingModel" . "-modal-id-" . $model->id;

        $data_target_new_form = $data_target . "-new_form_model";
        $data_target_edit_form = $data_target . "-edit_form_model";


        $title = $item->web_view . " Model ID (" . $model->id . ")";
        $title_new_form = "New Model";
        $title_edit_form = $item->web_view . " Model ID (" . $model->id . ")";


        $title_comment = " DE " . $model->depart . " A " . $model->arrivee . " <b>a</b> " . hr_mn_to_text($model->heure, 'h');
        $title_comment_new_form = null;
        $title_comment_edit_form = " DE " . $model->depart . " A " . $model->arrivee . " <b><u>a</u></b> " . hr_mn_to_text($model->heure, 'h');

//        call_user_func_array(array(get_called_class(), 'change_to_unique_data'), ['transport']);
        call_user_func_array(array("TransportProgrammingModel", 'change_to_unique_data'), ['transport']);


        $body = static::data_report_modal($model);

        $footer = "<div class=\"btn-group\">";


//                        copy_record
        $href_copy1 = "<a class='remove-href' href='transport.php?class_name=TransportProgrammingModel&action=new&duplicate_record=true&id={$model->id}'>";
        $href_copy2 = "</a>";
        $footer .= $href_copy1;
        $footer .= "<button  type='button' data-toggle='modal' data-model-id='{$model->id}' data-target='#{$data_target_new_form}' class='btn btn-primary btn-sm'>" . "Copy" . "</button>";
        $footer .= $href_copy2;


        $href_new1 = "<a class='remove-href' href='transport.php?class_name=TransportProgrammingModel&action=new'>";
        $href_new2 = "</a>";

        $footer .= $href_new1;
        $footer .= "<button  type='button' data-toggle='modal' data-model-id='{$model->id}' data-target='#{$data_target_new_form}' class='btn btn-success btn-sm'>" . "New" . "</button>";
        $footer .= $href_new2;


        $href_edit1 = "<a class='remove-href' href='transport.php?class_name=TransportProgrammingModel&action=edit&id={$model->id}'>";
        $href_edit2 = "</a>";

        $footer .= $href_edit1;
        $footer .= "<button  type='button' data-toggle='modal' data-model-id='{$model->id}'     data-target='#{$data_target_new_form}' class='btn btn-info  btn-sm'>" . "edit" . "</button>";
        $footer .= $href_edit2;

        $href_delete1 = "<a class='remove-href' onclick=\"return confirm('Are you sure?')\" data-has-confirm-button=''  href='transport.php?class_name=TransportProgrammingModel&action=delete_record&id={$model->id}'>";
        $href_delete2 = "</a>";

        $footer .= $href_delete1;
        $footer .= "<button   type='button' data-model-id='{$model->id}'  class='btn btn-danger  btn-sm'>" . "delete" . "</button>";
        $footer .= $href_delete2;


        $footer .= "</div>";

        $footer_new_form = '';
        $footer_edit_form = '';

//                        $body_new_form = call_user_func(array(get_called_class(), 'Create_form'));
        $body_new_form = call_user_func_array(array("TransportProgrammingModel", 'Create_form'), []);

//                        $_GET['id']=$model->id;
        $body_edit_form = call_user_func_array(array("TransportProgrammingModel", 'Create_form'), [$model->id]);
//                         unset($_GET['id'])   ;

//
//        $output .= static::model_modal($data_target, $title, $title_comment, $body, $footer);
//        $output .= static::model_modal($data_target_new_form, $title_new_form, $title_comment_new_form, $body_new_form, $footer_new_form);
//        $output .= static::model_modal($data_target_edit_form, $title_edit_form, $title_comment_edit_form, $body_edit_form, $footer_edit_form);

        $output .= TransportProgrammingModel::model_modal($data_target, $title, $title_comment, $body, $footer);
        $output .= TransportProgrammingModel::model_modal($data_target_new_form, $title_new_form, $title_comment_new_form, $body_new_form, $footer_new_form);
        $output .= TransportProgrammingModel::model_modal($data_target_edit_form, $title_edit_form, $title_comment_edit_form, $body_edit_form, $footer_edit_form);

        return $output;

    }

    public static function model_modal($data_target = null, $title = null, $title_comment = null, $body = null, $footer = null)
    {

        $output = "";

        if (is_null($data_target)) {
            $data_target = "mymodal";
        }

        $output .= Modal::new_modal_large($data_target, $title, $title_comment, $body, $footer);

        return $output;

    }


    public static function data_report_modal(TransportProgrammingModel $model)
    {

        $exclude = ['id', 'week_day_rank_id', 'client_habituel', 'client_id', 'inverse_address', 'chauffeur_id', 'type_transport_id', 'input_date', 'modification_time', 'username'];

        $output = "";
        $model->set_up_display();
        $model->heure = hr_mn_to_text($model->heure, 'h');
//        $model->input_date=strftime("%A %d %b %y",strtotime($model->input_date));
//        $model->modification_time=strftime("%A %d %b %y - %H:%M:",strtotime($model->modification_time));

        $chauffeur = TransportChauffeur::find_by_id($model->chauffeur_id);
        $transport_type = TransportType::find_by_id($model->type_transport_id);

//        $model->chauffeur_name = 2;
//        $model->type_transport = 5;

//        $output .= "<div class=\"ibox-content no-padding\">";

        $output .= "<a href='transport.php?class_name=TransportProgrammingModel&action=reverse_visible&id={$model->id}'>
<button style='width: 8em' type='button' data-model-id='{$model->id}'  class='btn btn-{$model->color}'>" . " VISIBLE " . "</button>
</a>";


        $day = strtotime("next " . day_eng($model->week_day_rank_id));
//        $day_full_wk_en[$a];
        $date = strftime("%d/%m/%Y", $day);


        $output .= "<div class='form-group model-pivot-date' id='data_{$model->id}'>
                                <div class='input-group date  model-pivot-date'>
                                    <span class='input-group-addon'><i class='fa fa-calendar'></i></span><input type='text' class='form-control' value='{$date}' >
                                </div>
                            </div>";

        $output .= "<ul class='list-group'>";
        $output .= "<li class='list-group-item'><b>Chauffeur:</b> " . $chauffeur->chauffeur_name . "</li>";
        $output .= "<li class='list-group-item'><b>type transport:</b> " . $transport_type->type_transport . "</li>";

        foreach (TransportProgrammingModel::$db_fields as $field) {
            if (!in_array($field, $exclude)) {
                $output .= "<li class='list-group-item'><b>$field:</b> " . $model->$field . "</li>";
            }
        }
        $output .= "</ul>";
//        $output .= "</div>";


        return $output;

    }

    public static function form_client()
    {

        /** @noinspection SqlResolve */
        $sql = "SELECT DISTINCT client_id FROM " . self::$table_name . " ORDER BY client_id";
        $clients = static::find_by_sql($sql);

        $output = "";
        $myClass = "ViewModelByChauffeur";
        if (isset($_GET["cl"])) {
            $myClass = MyClasses::find_short_class($_GET["cl"]);
        }
        if (isset($_GET["class_name"])) {
            $myClass = $_GET["class_name"];
        }
//
//        $page=$_SERVER['PHP_SELF']."?class_name=ViewTransportModelPivot";
        $output .= "<form class='form-inline'  method='get' action='transport.php'>
        <div class='form-group'>
        <input type='text' class='hidden' name='class_name' value='$myClass'>
        <select name='client_id'   class='form-control'>";

        foreach ($clients as $client) {
            $trp_clients = TransportClient::find_by_id((int)$client->client_id);
            $output .= "<option value='{$client->client_id}'>{$trp_clients->web_view}</option>";
        }

        $output .= "
        </select>
    </div>
    <button type='submit' class='btn btn-default'>Send</button>
</form>";


        return "<span class='hidden' id='form-find-by-client'>" . $output . "</span>";
    }
}
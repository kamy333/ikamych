<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/8/2017
 * Time: 7:40 PM
 */
class ViewTransportModelPivot extends TransportProgrammingModel
{

    protected static $table_name = "transport_model_pivot";


    protected static $db_fields = array(
        'heure', 'pseudo', 'web_view', 'client_id', 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi',);

    protected static $required_fields = [];
    public static $page_name = "Model";

    public $heure;
    public $pseudo;
    public $web_view;
    public $client_id;
    public $Lundi;
    public $Mardi;
    public $Mercredi;
    public $Jeudi;
    public $Vendredi;
    public $Samedi;
    public $Dimanche;

    public $color;

    public static function main_display()
    {
        return static::this_class_table();
    }




    public static function this_class_table()
    {
        $ibox = true;

        $sql = "SELECT * FROM " . static::$table_name;
        $items = self::find_by_sql($sql);

        $day_wk_fr = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
        $day_full_wk_fr = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

        $day_wk_en = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        $day_full_wk_en = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        $title = "";

        $href_all = $_SERVER["PHP_SELF"] . "?cl=ViewPivot";
        $href_yes = $_SERVER["PHP_SELF"] . "?cl=ViewPivotYes";
        $href_no = $_SERVER["PHP_SELF"] . "?cl=ViewPivotNo";

        $title .= "<b>Table Name</b>  " . static::$table_name . "   <b>Page Name</b>  " . static::$page_name;
        $title .= "&emsp;<span><a href='{$href_all}'><button style='width: 5em' class='btn btn-primary'>all</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_yes}'><button style='width: 5em' class='btn btn-info'>active</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_no}'><button style='width: 5em' class='btn btn-danger'>inactive</button></span></a></span>";
        $title .= "&emsp;<span><a><button style='width: 7em' id='show-dates' class='btn btn-warning '>Show Date</button></a></span>";

//        $title.="<br>";

        $modal = "";

        $output = "";

        $output .= static::model_modal();

        $output .= "<h5 class='text-center'>" . $title . "</h5>";

        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }

        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";


        $output .= "<thead>";
        $output .= "<tr>";

        $output .= "<th class='text-center' style='vertical-align: middle'>" . "Heure" . "</th>";

        $i=-1;
        $now_day_no=(int) strftime("%w",time());

        foreach (static::$db_fields as $field) {


            if (in_array($field, $day_full_wk_fr)) {
                $i++;
//                $now_day_no==$i ? $success="success" : $success="";
                $now_day_no==$i ? $style="background-color:black" : $style="";
                $now_day_no==$i ? $style2="color:white" : $style2="";

                $output .= "<th class='text-center' style='vertical-align: middle;{$style}'>" .
                "<a href='' style='{$style2}'>". $field ."</a>".
                    "</th>";

            }

        }
        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";

        $output .= "<tr class='tr-table-dates hidden'>";

        $output .= "<th class='text-center' style='vertical-align: middle'>" . "Date" . "</th>";

       $i=-1;

        foreach (static::$db_fields as $field) {



            if (in_array($field, $day_full_wk_fr)) {
                $i++;
                if ($i>$now_day_no){
                    $take="next"." " . day_eng($i);
                } elseif($i==$now_day_no) {
                    $take="today";

                } else {
                    $take="last"." " . day_eng($i);
                }

                $day = strtotime($take);


                $date = strftime("%d/%m/%Y", $day);


                $output .= "<th class='text-center' style='vertical-align: middle'>" .
                    " 
<div class='form-group'  id='data_1'>
<form method='post' class='formDate'  action='transport.php?class_name=TransportProgrammingModel'>

                  <div class='input-group date  model-pivot-date'>                                                              
                                         <span class='input-group-addon'><i class='fa fa-calendar'></i></span>               
                <input type='text' class='form-control' name='date' value='{$date}'>
                                                  

                  </div>
                  
                  <div class='row'>
  <div class='input-group-addon'><input type='submit' class='btn btn-default addDate-course' name='submit' value='Ajouter'></div>
                   </div>
                          
  </form>        </div>      
                
                            ";
                $output .= "</th>";


            }

        }
        $output .= "</tr>";


            foreach ($items as $item) {
            $output .= "<tr>";

            $output .= "<th class='text-center' style='vertical-align: middle'>" . hr_mn_to_text($item->heure, 'h') . "</th>";
            $i=-1;
            foreach (static::$db_fields as $field) {
                if (in_array($field, $day_full_wk_fr)) {
                    $i++;
                    $now_day_no==$i ? $style="background-color:white" : $style="";
                    if ($item->$field) {

                        $model = TransportProgrammingModel::find_by_id((int)$item->$field);



                        $data_target = get_called_class() . "-modal-id-" . $model->id;
                        $data_target_new_form = $data_target . "-new_form_model";
                        $data_target_edit_form = $data_target . "-edit_form_model";


                        $title = $item->web_view . " Model ID (" . $model->id . ")";
                        $title_new_form = "New Model";
                        $title_edit_form = $item->web_view . " Model ID (" . $model->id . ")";


                        $title_comment = " DE " . $model->depart . " A " . $model->arrivee . " <b>a</b> " . hr_mn_to_text($model->heure, 'h');
                        $title_comment_new_form = null;
                        $title_comment_edit_form = " DE " . $model->depart . " A " . $model->arrivee . " <b><u>a</u></b> " . hr_mn_to_text($model->heure, 'h');

                        call_user_func_array(array(get_called_class(), 'change_to_unique_data'), ['transport']);


                        $body = static::data_report_modal($model);

                        $footer = "<div class=\"btn-group\">";


//                        copy_record
                        $href_copy1="<a class='remove-href' href='transport.php?class_name=TransportProgrammingModel&action=new&duplicate_record=true&id={$model->id}'>";
                        $href_copy2="</a>";
                        $footer .=$href_copy1;
                        $footer .= "<button  type='button' data-toggle='modal' data-model-id='{$model->id}' data-target='#{$data_target_new_form}' class='btn btn-primary btn-sm'>" . "Copy" . "</button>";
                        $footer .=$href_copy2;


                        $href_new1="<a class='remove-href' href='transport.php?class_name=TransportProgrammingModel&action=new'>";
                        $href_new2="</a>";

                        $footer .=$href_new1;
                        $footer .= "<button  type='button' data-toggle='modal' data-model-id='{$model->id}' data-target='#{$data_target_new_form}' class='btn btn-success btn-sm'>" . "New" . "</button>";
                        $footer .=$href_new2;
//                        $footer .= "&emsp;";


                       $href_edit1="<a class='remove-href' href='transport.php?class_name=TransportProgrammingModel&action=edit&id={$model->id}'>";
                        $href_edit2="</a>";

                        $footer .=$href_edit1;
                        $footer .= "<button  type='button' data-toggle='modal' data-model-id='{$model->id}'     data-target='#{$data_target_new_form}' class='btn btn-info  btn-sm'>" . "edit" . "</button>";
                        $footer .=$href_edit2;

                        $href_delete1="<a class='remove-href' onclick=\"return confirm('Are you sure?')\"; data-has-confirm-button=''  href='transport.php?class_name=TransportProgrammingModel&action=delete_record&id={$model->id}'>";
                        $href_delete2="</a>";

                        $footer .=$href_delete1;
                        $footer .= "<button   type='button' data-model-id='{$model->id}'  class='btn btn-danger  btn-sm'>" . "delete" . "</button>";
                        $footer .=$href_delete2;



                        $footer .= "</div>";

                        $footer_new_form = '';
                        $footer_edit_form = '';

//                        $body_new_form = call_user_func(array(get_called_class(), 'Create_form'));
                        $body_new_form = call_user_func_array(array("TransportProgrammingModel", 'Create_form'),[]);

//                        $_GET['id']=$model->id;
                        $body_edit_form = call_user_func_array(array("TransportProgrammingModel", 'Create_form'),[$model->id]);
//                         unset($_GET['id'])   ;



             $output .= "<td class='text-center' style='vertical-align: middle;{$style}'>
<button style='width: 12em' type='button' data-toggle='modal' data-model-id='{$model->id}' data-target='#{$data_target}' class='btn btn-{$model->color}'>" . $item->web_view . " " . "</button></td>";


                        $output .= static::model_modal($data_target, $title, $title_comment, $body, $footer);
                        $output .= static::model_modal($data_target_new_form, $title_new_form, $title_comment_new_form, $body_new_form, $footer_new_form);
                        $output .= static::model_modal($data_target_edit_form, $title_edit_form, $title_comment_edit_form, $body_edit_form, $footer_edit_form);


                    } else {
                        $output .= "<td style='{$style}'>" . $item->$field . "</td>";

                    }
                }
            }


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

        $output.="<a href='transport.php?class_name=TransportProgrammingModel&action=reverse_visible&id={$model->id}'>
<button style='width: 8em' type='button' data-model-id='{$model->id}'  class='btn btn-{$model->color}'>" .  " VISIBLE " . "</button>
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





}
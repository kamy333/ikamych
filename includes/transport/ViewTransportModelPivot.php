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
//    protected static $table_name = "transport_programming_model";


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

    public static function nav_visible()
    {
        $title = "";

        $href_all = $_SERVER["PHP_SELF"] . "?cl=ViewPivot";
        $href_yes = $_SERVER["PHP_SELF"] . "?cl=ViewPivotYes";
        $href_no = $_SERVER["PHP_SELF"] . "?cl=ViewPivotNo";
        $href_chauf = $_SERVER["PHP_SELF"] . "?cl=ViewModelByChauffeur";
//        $href_client=$_SERVER["PHP_SELF"] . "?cl=ViewModelByClient";


//        $title .= "<b>Table Name</b>  " . static::$table_name . "   <b>Page Name</b>  " . static::$page_name;

        $title .= "&emsp;<span><a href='{$href_all}'><button style='width: 5em' class='btn btn-primary'>all</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_yes}'><button style='width: 5em' class='btn btn-info'>active</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_no}'><button style='width: 5em' class='btn btn-danger'>inactive</button></span></a></span>";
        $title .= "&emsp;<span><a><button style='width: 7em' id='show-dates' class='btn btn-warning '>Show Date</button></a></span>";
        $title .= "&emsp;<span><a   href='{$href_chauf}'><button style='width: 7em' class='btn btn-info '>Chauffeur</button></a></span>";
        $title .= "&emsp;<button style='width: 7em' id='show-client-form' class='btn btn-danger '>Client</button></span>";
        $title .= TransportProgrammingModel::form_client();

        return $title;
    }


    public static function this_class_table()
    {
        $ibox = true;

        if (isset($_GET['client_id'])) {
            $q = " WHERE client_id=" . $_GET['client_id'];
        } else {
            $q = "";
        }

        $sql = "SELECT * FROM " . static::$table_name . $q;
        $items = self::find_by_sql($sql);

        $day_wk_fr = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
        $day_full_wk_fr = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

        $day_wk_en = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        $day_full_wk_en = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];


        $title = static::nav_visible();

        $modal = "";

        $output = "";

//        $output .= static::model_modal();
        $output .= "<h1 class='text-center'>" . "Models" . "</h1>";
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
                $now_day_no == $i ? $style = "background-color:darkgray" : $style = "";
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

            $color_button = "default";


            if (in_array($field, $day_full_wk_fr)) {
                $i++;
                if ($i>$now_day_no){
                    $take="next"." " . day_eng($i);
                } elseif($i==$now_day_no) {
                    $take="today";
                    $color_button = "info";

                } else {
                    $take="last"." " . day_eng($i);
                }

                $day = strtotime($take);


                $date = strftime("%d/%m/%Y", $day);

                $output .= "<th class='text-center' style='vertical-align: middle'>" .
                    " 
<div class='form-group'  id='data_$i'>
  <form method='post' class='formDate form-inline'  action='transport.php?class_name=TransportProgrammingModel'>

        <div class='input-group date  model-pivot-date'>                                                              
                <span class='input-group-addon'><i class='fa fa-calendar'></i></span>               
                    <input type='text' class='form-control theDate-$i' name='date' value='{$date}'>                    <input type='text' class='hidden' name='week_day_rank_id' value='$i' >
        
        </div>
                  
         
             <div class='input-group-addon'>
                 <input type='submit' class='btn btn-{$color_button} addDate-course' data-dateformid='$i' name='submit' value='Ajouter'>
             </div>
         
                          
  </form> 
</div>      
                
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
                        $model->set_up_display();

                        $data_target = "TransportProgrammingModel" . "-modal-id-" . $model->id;

                        $output .= static::model_modal_element($model, $item);



             $output .= "<td class='text-center' style='vertical-align: middle;{$style}'>
<button style='width: 12em' type='button' data-toggle='modal' data-model-id='{$model->id}' data-target='#{$data_target}' class='btn btn-{$model->color}'>" . $item->web_view . " " . "</button></td>";




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











}
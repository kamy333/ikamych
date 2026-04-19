<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/15/2017
 * Time: 2:29 PM
 */
class ViewTransportModelByChauffeur extends ViewTransportModel
{

    public static function main_display()
    {

//        return static::create_properties();
        return static::this_class_table();
    }


    public static function get_chauffeur_column()
    {

//        $chauffeurs=TransportChauffeur::find_all();


        $query_string = static::query_string();

        /** @noinspection SqlResolve */
        $sql = "SELECT DISTINCT chauffeur_id FROM " . static::$table_name . " {$query_string}  ORDER BY chauffeur_id ASC";
//        $sql="SELECT DISTINCT chauffeur_id FROM transport_programming_model"." {$jour} {$visible} ORDER BY chauffeur_id ASC";

//        echo "$query_string"."<br>";
//        echo "$sql"."<br>";

        $chauffeurs = static::find_by_sql($sql);

        $col_sql = "";
        foreach ($chauffeurs as $ch1) {
            $ch = TransportChauffeur::find_by_id((int)$ch1->chauffeur_id);
            array_push(static::$db_fields, $ch->initial);
            array_push(static::$db_fields_table_display_short, $ch->chauffeur_name);
            array_push(static::$db_fields_table_display_full, $ch->chauffeur_name);
            array_push(static::$db_field_table_display_chauffeur_header, $ch->chauffeur_name);
            array_push(static::$db_field_table_display_chauffeur, $ch->initial);

            $col_sql .= "(CASE WHEN (chauffeur_id = {$ch->id})   THEN modele_id END) AS '$ch->initial',";
        }

        return rtrim($col_sql, ",");

    }


    public static function create_properties($model = null)
    {
//        $sql="SELECT * FROM transport_chauffeurs";
//        $chauffeurs=TransportChauffeur::find_by_sql($sql);

        $chauffeurs = TransportChauffeur::find_all();


        if (is_null($model)) {
            $model = new static();
        }

        $i = 0;
        $col_sql = "";
        foreach ($chauffeurs as $ch) {
//            array_push(static::$db_fields, $ch->initial);
//            var_dump($ch->initial);

            $new_chauff = TransportChauffeur::find_by_id((int)$model->chauffeur_id);
            $name = $ch->initial;
            if ($ch->initial == $new_chauff->initial) {

                $model->$name = $model->modele_id . "-" . $model->pseudo;
            } else {
                $model->$name = "";
            }


        }

        return $model;

    }

    public static function nav_visible()
    {
        $output = "";
        $output .= "<div class='btn-group'>";


        for ($i = 0; $i < 7; $i++) {
            if (!isset($_GET['jour'])) {

                $color = "primary";
            } else {
                $color = "primary";
                if ((int)$_GET['jour'] == $i) {
                    $color = "info";
                }

            }

            $jour = "";
            if (isset($_GET['jour'])) {
                $jour1 = (int)$_GET['jour'];
                $jour = "&jour=" . $jour1;
            } else {
                $jour = "";
            }

            $output .= "<a href='?class_name=ViewTransportModelByChauffeur&jour={$i}'
                     class='btn btn-{$color} '  >";
            $output .= day_fr($i);
            $output .= "</a>&nbsp;&nbsp;";
        }

        $title = "";

        $href_all = $_SERVER["PHP_SELF"] . "?cl=ViewModelByChauffeur";
        $href_yes = $_SERVER["PHP_SELF"] . "?cl=ViewModelByChauffeur&visible=1" . $jour;
        $href_no = $_SERVER["PHP_SELF"] . "?cl=ViewModelByChauffeur&visible=0" . $jour;
        $href_all2 = $_SERVER["PHP_SELF"] . "?cl=ViewPivot";


        $title .= "&emsp;<span><a href='{$href_all}'><button style='width: 5em' class='btn btn-primary'>all</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_yes}'><button style='width: 5em' class='btn btn-info'>active</button></a></span>";
        $title .= "&emsp;<span><a  href='{$href_no}'><button style='width: 5em' class='btn btn-danger'>inactive</button></span></a></span>";
        $title .= "&emsp;<span><a   href='{$href_all2}'><button style='width: 7em' class='btn btn-info '>Week</button></a></span>";

        $title .= "&emsp;<button style='width: 7em' id='show-client-form' class='btn btn-danger '>Client</button></span>";
        $title .= TransportProgrammingModel::form_client();
//    $title .= "&emsp;<span><a><button style='width: 7em' id='show-dates' class='btn btn-warning '>Show Date</button></a></span>";
        $output .= $title;
        $output .= "</div>";
        return $output;
    }

    public static function query_string()
    {
        $output = "";
        $output .= "";
        $whereand = "";

        if (isset($_GET['jour'])) {
            $jour1 = (int)$_GET["jour"];
            $whereand = " WHERE ";
            $jour = " {$whereand} jour=" . $jour1;
        } else {
            $whereand = "";
            $jour = "";
        }

        if (isset($_GET['visible'])) {
            if (isset($_GET['jour'])) {
                $whereand = " AND ";
            } else {
                $whereand = " WHERE ";

            }
            $visible1 = (int)$_GET["visible"];
            $visible = " {$whereand} visible=" . $visible1;
        } else {
            $visible = "";
        }


        if (isset($_GET['client_id'])) {
            if ($whereand == " WHERE " || $whereand == " AND ") {
                $whereand = " AND";
            } elseif ($whereand == "") {
                $whereand = " WHERE ";
            } else {
                $whereand = " WHERE ";
            }
            $client = " $whereand client_id=" . $_GET['client_id'];
        } else {
            $client = "";
        }

        return " " . $jour . " " . $visible . " " . $client;
    }

    public static function this_class_table()
    {
        $ibox = true;
        $output = "";
        $col_sql = static::get_chauffeur_column();


        $query_string = static::query_string();

        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string}
         ORDER BY jour ASC, heure ASC";

        $models = self::find_by_sql($sql);
//        echo "<br>".$sql;

        $output .= "<h2 class='text-center'>Model By Chauffeur</h2>";

        $output .= static::nav_visible();

        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";

        $output .= "<thead>";
        $output .= "<tr>";
        foreach (static::$db_field_table_display_chauffeur_header as $item) {
            $output .= "<th class='text-center'  style='width:5%;vertical-align: middle'>";

            $output .= $item;


            $output .= "</th>";
        }

        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";

        foreach ($models as $model) {

            $now = "";

            self::create_properties($model);
            $model->set_up_display();


            $output .= "<tr>";


            foreach (static::$db_field_table_display_chauffeur as $field) {
                $data_target = get_called_class() . "-modal-id-" . $model->id;
                $output .= "<td class='text-center' style='vertical-align: middle;'>";

                switch ($field) {
                    case "jour":
//                        if(!isset($prev)){$prev=0;}
//                        $prev="x";
//                        if(($prev==(int)$model->$field)){
                        $output .= day_fr((int)$model->$field);
//                        } else{
//                            $output .="";
//                        }
                        $prev = (int)$model->jour;
                        break;
                    case "heure":

                        $output .= hr_mn_to_text($model->$field . 'h');
                        break;

                    default:
                        if (isset($model->$field) && !empty($model->$field)) {
//                            $output .="<button class='btn btn-{$model->color}'>". $model->$field."</button>";


                            $tr_model = TransportProgrammingModel::find_by_id((int)$model->modele_id);
                            $tr_model->set_up_display();

                            $data_target = "TransportProgrammingModel" . "-modal-id-" . $tr_model->id;

                            $output .= static::model_modal_element($tr_model, $model);


                            $output .= "<button style='width: 12em' type='button' data-toggle='modal' data-model-id='{$model->id}' data-target='#{$data_target}' class='btn btn-{$model->color}'>" . $model->web_view . " " . "</button>";


                        }

                }

                $output .= "</td>";

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
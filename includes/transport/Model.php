<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/4/2017
 * Time: 1:03 AM
 */
class Model extends TransportProgrammingModel
{

    public static $table_equivalence = [
        "Model/Course" => [
            "id/model_id", "client_id/client_id", "heure/heure", "depart/depart", "arrivee/arrivee",
            "prix_course/prix_course", "chauffeur_id/chauffeur_id",
            "type_transport_id/type_transport_id", "remarque/remarque"
        ]
    ];


    public static function export_to_course_all($week_day_rank, $date_sql, $visible = 1)
    {

        global $session;

        $day_no = (int)e(trim($week_day_rank));
        $visible = (int)e(trim($visible));;
        $date = e($date_sql);

        $AR = T_Aller_Retour::find_by_id(1);
        $aller_retour = $AR->Aller_Retour;

        $validation_failed = false;
        $array_model_failed = [];
        $array_model_failed_id = [];


        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE week_day_rank_id= " . $day_no . " AND visible=" . $visible;

        $models = static::find_by_sql($sql);
        $equivalences = static::$table_equivalence["Model/Course"];

        foreach ($models as $model) {
            $course = new Course();


            foreach ($equivalences as $equivalence) {

                $equiv = explode("/", $equivalence);
                $equiv1 = $equiv[0];
                $equiv2 = $equiv[1];
                $course->$equiv1 = $model->$equiv2;
//                add date indenpendantly since not included in model
                $course->course_date = $date;
                $course->aller_retour = $aller_retour;
            }

            $valid = $course->form_validation();

            if (!empty($valid->errors)) {
                $session->message("Error cannot add to course " . $model->id
                    . $model->client_id . $model->heure);
                $validation_failed = true;
                array_push($array_model_failed, $valid->errors);
                array_push($array_model_failed_id, $model->id);

            }

        }


        if (!$validation_failed) {
            foreach ($models as $model) {
                $course = new Course();
                foreach ($equivalences as $equivalence) {
                    $equiv = explode("/", $equivalence);
                    $equiv1 = $equiv[0];
                    $equiv2 = $equiv[1];
                    $course->$equiv1 = $model->$equiv2;
                    $course->course_date = $date;
                    $course->aller_retour = $aller_retour;

                }
                $course->save();
            }
        }


        $output = "";
        $output .= "";

        if (!$validation_failed) {
            $i = 0;
            foreach ($array_model_failed_id as $failed_id) {
                $output .= "<div>";
                $model = static::find_by_id($failed_id);
                foreach (static::$db_fields_table_display_short as $field) {
                    $output .= $model->$field . " - ";
                    $output .= $array_model_failed_id[$i];
                }
                $i++;
                $output .= "</div>";

            }

            echo $output;

        }


    }

}
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
            "id/model_id", "client_id/client_id", "heure/heure", "depart/depart", "arrivee/arrivee", "prix_course/prix_course", "chauffeur_id/chauffeur_id",
            "type_transport_id/type_transport_id", "remarque/remarque"
        ]
    ];

//    public static $fields_numeric_integer = array('id', 'user_id', 'model_id', 'client_id', 'chauffeur_id', 'type_transport_id');
//
//    public static $fields_numeric_float = array('prix_course');


    public static function export_to_course_all($week_day_rank, $date_sql, $visible = 1, $id = null)
    {

        global $session;
        $username = User::find_by_id($session->user_id)->username;



        $day_no = (int)e(trim($week_day_rank));
        $visible = (int)e(trim($visible));;
        $date = e($date_sql);

//        $AR = T_Aller_Retour::find_by_id(1);
//        $aller_retour = $AR->Aller_Retour;
        $aller_retour = 0;
        $countCourse = Course::count_all_where("WHERE course_date='" . $date . "'");

        if (is_null($id)) {
            /** @noinspection SqlResolve */
            $sql = "SELECT * FROM " . static::$table_name . " WHERE week_day_rank_id= " . $day_no . " AND visible=" . $visible;

        } else {
            /** @noinspection SqlResolve */
            $sql = "SELECT * FROM " . static::$table_name . " WHERE week_day_rank_id= " . $day_no . " AND id=" . e($id);
        }

//        echo $sql;

        $models = static::find_by_sql($sql);
        $equivalences = static::$table_equivalence["Model/Course"];
        $i = 0;
        foreach ($models as $model) {
            $course = new Course();
            $i++;

            foreach ($equivalences as $equivalence) {

                $equiv = explode("/", $equivalence);
                $equiv1 = $equiv[0];
                $equiv2 = $equiv[1];

                $course->$equiv2 = $model->$equiv1;
//                add date indenpendantly since not included in model
                $course->course_date = $date;
                $course->aller_retour = $aller_retour;
                $course->drive_mode = 0;
                $course->aller_retour = 0;
                $course->appel = 0;
                $course->aller_retour_origin_id = 0;
                $course->retour_appel = 0;
                $course->input_date = now_sql();
                $course->username = $username;
            }
//            echo '<pre>';
//            var_dump($model);
//            echo '</pre>';
//            echo '<pre>';
//            var_dump($course);
//            echo '</pre>';
            $course->save();

        }
        $newDate = strftime("%a %e %B %Y", strtotime($date));  // 02 mars 2015

//        $countCourse=Course::count_all_where("WHERE course_date='" .$date."'");


        $output = "";
        $output .= "$i courses insérés depuis Model en date du $newDate";
        $output .= " sur un total déjà existant de $countCourse courses";

        $session->message($output);
        $session->ok(true);
        redirect_to('../transport.php?class_name=Course');


    }

}
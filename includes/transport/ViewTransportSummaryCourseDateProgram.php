<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/8/2017
 * Time: 6:58 PM
 */
class ViewTransportSummaryCourseDateProgram extends DatabaseObject
{

    protected static $table_name = "transport_summary_by_course_date_program";

    protected static $db_fields = array(
        'course_date', 'day_before', 'day_after', 'date_unix', 'today', 'diff', 'str_time', 'str_time_fr', 'date_format', 'now_round_time', 'now_time_transmed', 'monthname', 'year', 'week', 'total_course', 'valid_chauf_0', 'valid_chauf_1', 'valid_chauf_2', 'valid_mgr_0', 'valid_mgr_1', 'valid_fina1_0', 'valid_fina1_1', 'prix_course_0', 'erreur_chauffeur', 'erreur_address', 'erreur_autres', 'erreur_patients', 'erreur_sang',
        'erreur_general',);


    public $course_date;
    public $day_before;
    public $day_after;
    public $date_unix;
    public $today;
    public $diff;
    public $str_time;
    public $str_time_fr;
    public $date_format;
    public $now_round_time;
    public $now_time_transmed;
    public $monthname;
    public $year;
    public $week;
    public $total_course;
    public $valid_chauf_0;
    public $valid_chauf_1;
    public $valid_chauf_2;
    public $valid_mgr_0;
    public $valid_mgr_1;
    public $valid_fina1_0;
    public $valid_fina1_1;
    public $prix_course_0;
    public $erreur_chauffeur;
    public $erreur_address;
    public $erreur_autres;
    public $erreur_patients;
    public $erreur_sang;
    public $erreur_general;

    public static function main_display()
    {
        return parent:: main_display();
    }




}
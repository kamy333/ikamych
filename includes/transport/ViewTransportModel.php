<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/8/2017
 * Time: 4:28 PM
 */
class ViewTransportModel extends TransportProgrammingModel
{

    protected static $table_name = "transport_model";


    protected static $db_fields = array(
        'PrimaryKey', 'heure', 'jour', 'client_id', 'visible', 'pseudo', 'client_sort', 'web_view', 'modele_id',
        'inverse_address', 'depart', 'arrivee', 'liste_restrictive', 'prix_course',
        'default_depart', 'default_arrivee', 'default_price', 'remarque', 'chauffeur_id', 'client_habituel', 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi',);


    protected static $db_fields_table_display_short = array(
        'PrimaryKey', 'heure', 'jour', 'client_id', 'pseudo', 'client_sort', 'web_view', 'modele_id',
        'inverse_address', 'depart', 'arrivee', 'liste_restrictive', 'prix_course',
        'default_depart', 'default_arrivee', 'default_price', 'remarque', 'chauffeur_id', 'client_habituel', 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi',);

    protected static $db_field_table_display_chauffeur_header = ['jour', 'heure',];
    protected static $db_field_table_display_chauffeur = ['jour', 'heure',];

    protected static $required_fields = [];


    public $PrimaryKey;
    public $heure;
    public $jour;
    public $client_id;
    public $pseudo;
    public $liste_restrictive;
    public $client_sort;
    public $visible;
    public $web_view;
    public $modele_id;
    public $inverse_address;
    public $depart;
    public $arrivee;
    public $prix_course;
    public $default_depart;
    public $default_arrivee;
    public $default_price;
    public $remarque;
    public $chauffeur_id;
    public $client_habituel;

    public $Dimanche;
    public $Lundi;
    public $Mardi;
    public $Mercredi;
    public $Jeudi;
    public $Vendredi;
    public $Samedi;

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

        $title = "<b>Table Name</b>  " . static::$table_name . "   <b>Page Name</b>  " . static::$page_name;
        $output = "";

        $output .= "<h1 class='text-center'>" . $title . "</h1>";

        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";


        $output .= "<thead>";
        $output .= "<tr>";
        foreach (static::$db_fields as $field) {
            $output .= "<th>" . $field . "</th>";
        }
        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";


        foreach ($items as $item) {
            $output .= "<tr>";
            foreach (static::$db_fields as $field) {
                $output .= "<td>" . $item->$field . "</td>";
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
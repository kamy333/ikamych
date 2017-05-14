<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/12/2017
 * Time: 1:30 PM
 */
class ViewTransportAdresse extends DatabaseObject
{

    protected static $table_name = "transport_view_adresse";

    protected static $db_fields = array('pseudo', 'adresse');

    public static function find_by_pseudo($pseudo)
    {
        $table = static::$table_name;
        $clean_pseudo = e($pseudo);
        return static::find_by_sql("SELECT * FROM {$table} WHERE pseudo='" . $clean_pseudo . "'");

    }

//
    public static function find_all_addresses()
    {
        $table = static::$table_name;
//        $clean_pseudo=e($pseudo);
        /** @noinspection SqlResolve */
        return static::find_by_sql("SELECT DISTINCT adresse FROM {$table} ORDER BY adresse ASC");
    }

    public static function select($pseudo)
    {
        $adresses = static::find_by_pseudo($pseudo);

        $output = "";

        foreach ($adresses as $adress) {
            $output .= "<option value='{$adress->adresse}'>{$adress->adresse}</option>";
        }

        return $output;

    }

    public static function list_ul($pseudo)
    {
        $adresses = static::find_by_pseudo($pseudo);

        $output = "";
        $output .= "<ul class='list-group'>";
        foreach ($adresses as $adress) {
            $output .= "<li class='list-group-item'>{$adress->adresse}</li>";
        }
        $output .= "<ul>";
        return $output;
    }

    public static function data_source($pseudo)
    {
        $adresses = static::find_by_pseudo($pseudo);

        $output = "";
        $output .= "data-source='";
        foreach ($adresses as $adress) {
//            $output .= "\[\"{$adress->adresse}\"\],";
            $output .= "[ \"{$adress->adresse}\" ],";


        }

        $output = rtrim($output, ",");
        $output .= "'";
        $output .= "<hr>";
        return $output;
    }

    public static function jason($pseudo)
    {
        $adresses = static::find_by_pseudo($pseudo);

        $array1 = [];
        $array2 = [];
//        todo tocontinue json
        $output = "";
        foreach ($adresses as $adress) {
            array_push($array1, ["name" => $adress->adresse]);
        }

        return json_encode($array1);
    }


    public $pseudo;
    public $adresse;


}
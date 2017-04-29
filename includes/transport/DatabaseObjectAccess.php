<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/25/2017
 * Time: 8:49 PM
 */
class DatabaseObjectAccess extends DatabaseObject
{


    public static $class_access = [
        'DataBaseClient', 'DatabaseCourse', 'DatabaseCourse_Programe',
        'DataBaseFacturation', 'DatabasePaiement',
        'T_Adresse', 'T_Aller_Retour', 'T_Chauffeur',
        'T_Frequence_Facturation', 'T_Genre', 'T_Heure', 'T_Pays', 'T_Prix_Course', 'T_Type_Transport', 'T_Ville', 'T_Type_Facturation'
    ];


    public static $class_transmed = ['TransportChauffeur', 'TransportClient', 'TransportType', 'TransportProgramming', 'TransportProgrammingModel', 'ViewTransportModel', 'ViewTransportModel', 'ViewTransportModelVisibleNo', 'ViewTransportModelVisibleYes', 'ViewTransportModelPivot', 'ViewTransportModelPivotNo', 'ViewTransportModelPivotYes', 'ViewTransportSummaryCourseDateProgram', 'ViewTransportModelByChauffeur'
    ];


    public static function require_file()
    {

        foreach (self::$class_access as $file) {
            require_once(LIB_PATH . DS . 'transport' . DS . "$file.php");
        }

        foreach (self::$class_transmed as $file) {
            require_once(LIB_PATH . DS . 'transport' . DS . "$file.php");
        }


    }


    public static function links()
    {
        global $Nav;
        $output = "";
        $output .= "<ul class='list-group'>";
        foreach (self::$class_access as $file) {
            $href = $Nav->current_page_php . "?class_name=" . $file;
            $href2 = $href . "&action=view_xml_file";
            $href3 = $href . "&action=add_db_records_tables";
            $href4 = $href . "&action=truncate_db_tables";


            $output .= "<li  class='list-group-item text-left'>";
            $output .= "<span class='text-left' style='margin: 10%' ><a href='$href2'>View records xml " . $file . "</a></span>";
            $output .= "<span class='text-left' style='margin: 10%;color: green'><a href='$href3'>Add records " . $file . "</a></span>";
            $output .= "<span class='text-left' style='margin: 10%;color: red'><a href='$href4'>Delete records " . $file . "</a></span>";

            $output .= "</li>";
        }

        $output .= "</ul>";
        return ibox($output, 12);
    }


    protected static function get_url_request_class()
    {
        if (isset($_GET['class_name'])) {
            $name = $_GET['class_name'];
        } else {
            $name = get_called_class();
        }

        return $name;
    }


    protected static function get_xml_file($name)
    {
        global $Nav;
        if ($Nav->server_name === "localhost") {
            $file = $Nav->http . $Nav->folder . "/xml/transmed/" . $name . ".xml";

        } else {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/transmed/xml/transmed/' . $name . ".xml";

        }


        if (file_exists($file)) {
            $xmls = simplexml_load_file($file);
        } else {
            if ($Nav->server_name === "localhost") {
                $xmls = simplexml_load_file($file);
            } else {
                echo "File does NOT exists<hr> ";
                return "";
            }


        }
        return $xmls;
    }

    public static function view_xml_file()
    {

//        global $Nav;

        $name = static::get_url_request_class();

        $xmls = static::get_xml_file($name);
        $output = "";
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";


        $output .= "<thead>";
        $output .= "<tr>";

        foreach (static::$db_fields as $field) {
            if ($field !== "id") {
                $output .= "<th>" . $field . "</th>";
            }

        }
        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";


        foreach ($xmls as $xml) {
            $output .= "<tr>";
            foreach (static::$db_fields as $db_field) {
                if ($db_field !== "id") {
                    $output .= "<td>" . $xml->$db_field . "</td>";
//                    echo  $db_field." - ". $xml->$db_field."</td>>";

                }

            }
            $output .= "</tr>";
        }
        $output .= "</tbody>";

        $output .= "</table>";
        $output .= "</div>";

        return $output;
    }


    public static function truncate_db_tables()
    {
        global $database;
        $sql = "TRUNCATE TABLE " . static::$table_name;
        $result = $database->query($sql);
        if ($result) {
            $output = "OK truncate " . static::$table_name;
        } else {
            $output = "ERROR truncate " . static::$table_name;

        }
        return $output;
    }


    public static function add_db_records_tables()
    {

        static::truncate_db_tables();

        $name = static::get_url_request_class();
        $xmls = static::get_xml_file($name);

        $result = [];

        $i = 0;

        foreach ($xmls as $xml) {
            $me = new static();
            foreach (static::$db_fields as $db_field) {

                if ($db_field !== "id") {
                    $me->$db_field = $xml->$db_field;
                }

            }
            if ($me->save()) {
//            array_push($result, $i++ .' OK '.get_called_class())    ;
            } else {
//            array_push($result, $i++ .'NOPE '.get_called_class())    ;

            }

        }
        array_push($result, $i++ . ' OK ' . get_called_class());

        return $result;

    }






}
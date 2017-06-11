<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/25/2017
 * Time: 8:49 PM
 */
class DatabaseObjectAccess extends DatabaseObject
{

    public static $table_equivalence = [
        'DataBaseClient/TransportClient' =>
            ['Pseudo/pseudo', 'Nom/last_name', 'Prenom/first_name', 'Adresse/address', 'CCP/cp', 'Ville/city', 'Pays/country', 'Habituel_PrixCourse/default_price', 'ParcoursDe/default_depart', 'Habituel_TypeTransport/default_transport_type', 'ParcoursA/default_arrivee', 'Commentaires/remarque',],

        'T_Chauffeur/TransportChauffeur' => ['Chauffeur/chauffeur_name', 'Company/company',],
        'T_Type_Transport/TransportType' => ['Type_Transport/type_transport',],
    ];

//    public static $class_access = [
//        'DataBaseClient', 'T_Chauffeur', 'T_Type_Transport', 'DatabaseCourse', 'DatabaseCourse_Programe',
//        'DataBaseFacturation', 'DatabasePaiement',
//        'T_Adresse', 'T_Aller_Retour',
//        'T_Frequence_Facturation', 'T_Genre', 'T_Heure', 'T_Pays', 'T_Prix_Course', 'T_Ville', 'T_Type_Facturation'
//    ];

//    public static $class_transmed = [
//        'TransportChauffeur', 'TransportClient', 'TransportType', 'TransportProgramming', 'TransportProgrammingModel', 'ViewTransportModel', 'ViewTransportModel', 'ViewTransportModelVisibleNo', 'ViewTransportModelVisibleYes', 'ViewTransportModelPivot', 'ViewTransportModelPivotNo', 'ViewTransportModelPivotYes', 'ViewTransportSummaryCourseDateProgram', 'ViewTransportModelByChauffeur', "Course",
//        "Model", "ViewTransportAdresse", "CourseByChauffeur",
//
//        "CourseForm",
//        "CourseMobile",
//        "CourseListePatient",
//        "CourseSang",
//        "CourseStandard",
//    ];



    public static function links()
    {
        global $Nav;
        $output = "";

        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-hover table-condensed '>";

        $output .= "<tr>";
        $output .= "<td class='text-center'>View xml</td>";
        $output .= "<td class='text-center'>Add</td>";
        $output .= "<td class='text-center'>Delete</td>";
        $output .= "</tr>";

        foreach (static::$class_access as $file) {
            $href = $Nav->current_page_php . "?class_name=" . $file;
            $href2 = $href . "&action=view_xml_file";
            $href3 = $href . "&action=add_db_records_tables";
            $href4 = $href . "&action=truncate_db_tables";

            $output .= "<tr>";
            $output .= "<td class='text-left'><a href='$href2'>View records xml " . $file . "</a></td>";
            $output .= "<td class='text-left'><a href='$href3'>Add records " . $file . "</a></td>";
            $output .= "<td class='text-left'><a href='$href4'>Delete records " . $file . "</a></td>";
            $output .= "</tr>";

        }


        $output .= "</table>";
        $output .= "</div>";


        return $output;
//        return ibox($output, 12);
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

    public static function update_db_records_tables()
    {
        //to be used to update
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

        static::update_db_records_tables();

        return $result;

    }

    public static function check_xml_to_table($table = "DataBaseClient/TransportClient")
    {

        global $Nav;
//        $var = "DataBaseClient/TransportClient";
        $classes = explode("/", $table);
        $arr_equivalence = static::$table_equivalence[$table];
        $primary_keys = explode("/", $arr_equivalence[0]);

        $primary_key1 = $primary_keys[0];
        $primary_key2 = $primary_keys[1];

        $class1 = $classes[0];
        $class2 = $classes[1];

        $count1 = (int)$class1::count_all();
        $count2 = (int)$class2::count_all();
        $dif_count = $count1 - $count2;


// echo $r1=  $class2::count_all_where(" WHERE pseudo = 'AMEZ_DROZ_Algar'");


// echo $r2=  $class2::count_all_where(" WHERE pseudo = 'NAFISSPOUR'");


        $delete_class2 = false;
        $delete_class1 = false;

        $add_class2 = false;
        $add_class1 = false;

        $redirect = false;

        if (isset($_GET) && isset($_GET["action"]) && isset($_GET["class_name"])) {

            $redirect = true;

            if ($_GET["action"] == "delete_record") {
                if ($_GET["class_name"] == $class2) {
                    $delete_class2 = true;

                } elseif ($_GET["class_name"] == $class1) {
                    $delete_class1 = true;
                } else {

                }
            }

            if ($_GET["action"] == "add_record") {
                if ($_GET["class_name"] == $class2) {
                    $add_class2 = true;

                } elseif ($_GET["class_name"] == $class1) {
                    $add_class1 = true;
                } else {

                }
            }


        }


        $db_search1 = $class1::find_all();

        $i = 0;
        $j = 0;

        foreach ($db_search1 as $search) {
            $qry = trim($search->$primary_key1);
            $found = (int)$class2::count_all_where(" WHERE $primary_key2 = '$qry'");
            ($found == 0) ? $i++ : $j++;
            if ($found == 0 && $delete_class1) {
                $search->delete();
            }

            if ($found == 0 && $add_class2) {


                $newClass2 = new $class2;
                foreach ($arr_equivalence as $equivalence) {
                    $equiv = explode("/", $equivalence);
                    $equiv1 = $equiv[0];
                    $equiv2 = $equiv[1];

                    $newClass2->$equiv2 = $search->$equiv1;
                }
                $newClass2->save();

            }

        }

        $db_search2 = $class2::find_all();

        $k = 0;
        $l = 0;

        $array_miss = [];
        foreach ($db_search2 as $search) {
            $qry = trim($search->$primary_key2);
            $found = (int)$class1::count_all_where(" WHERE $primary_key1 = '$qry'");

            ($found == 0) ? array_push($array_miss, $search->$primary_key2 . "/$search->id") : null;
            ($found == 0) ? $k++ : $l++;

            if ($found == 0 && $delete_class2) {
                $search->delete();
            }

            if ($found == 0 && $add_class1) {


                $newClass1 = new $class1;
                foreach ($arr_equivalence as $equivalence) {
                    $equiv = explode("/", $equivalence);
                    $equiv1 = $equiv[1];
                    $equiv2 = $equiv[0];

                    $newClass1->$equiv2 = $search->$equiv1;
                }
                $newClass1->save();

            }


        }

//        echo $class1."<br>";
//        print_r($array_miss);
//        echo "<hr>";


        if ($redirect) {
            echo "<script>window.location='" . $_SERVER['PHP_SELF'] . "'</script>";

            return '';
        }


        $dif1 = $count1 - $i;
        $dif2 = $count2 - $j;


        $output = "";

        $list = "";
//        $list.="<div style='background-color: lavenderblush'>";
//        $list.="<div class='col-md-5'";
        $list .= "<p style='background-color:lemonchiffon'>$class2 <b>$dif2</b> données à effacer car inexistant dans $class1 Access</p>";
        $list .= "<ul class='list-group'>";
        foreach ($array_miss as $miss) {
            $result = explode("/", $miss) [1];
            $href = $Nav->path_admin . "manage_ajax.php?class_name={$class2}&id={$result}";
            $list .= "<li  class='list-group-item' style='background-color: lemonchiffon;'><a href='{$href}'>$miss</a></li>";

        }
        $list .= "</ul>";
//        $list.="</div>";
//        $list.="</div>";


        $output .= "<h2  style='font-size: 1em;background-color: white'>$class1 with $count1 records - $class2 with $count2 records - Difference Of $dif_count</h2>";


        if (!$dif_count == 0) {

            $output .= "<p><span style='margin-right: 3em' >Table $class1 $count1  $i  $dif1</span>"
                . "<span>Table $class2 Total records $count2  of which $j found in $class1 with a dif of $dif2 which need to be removed</span></p>";

            $href = $_SERVER['PHP_SELF'] . "?class_name={$class2}&action=delete_record";
            $output .= "<p>Voulez-vous effacer les <b>$dif2</b> données du web $class2 non existant dans access $class1? &nbsp;" . "<a href='$href'>Delete $class2</a></p>";

            $href = $_SERVER['PHP_SELF'] . "?class_name={$class1}&action=delete_record";
            $output .= "<p>Voulez-vous effacer les <b>$dif_count</b> données de Access $class1 non existant dans access $class2? &nbsp;" . "<a href='$href'>Delete $class1</a></p>";

            $output .= "<hr>";
            $href = $_SERVER['PHP_SELF'] . "?class_name={$class2}&action=add_record";
            $output .= "<p>Voulez-vous ajouter les <b>$dif_count</b> données sur web $class2 existant dans access $class1? &nbsp;" . "<a href='$href'>Ajouter $class2</a></p>";

            $href = $_SERVER['PHP_SELF'] . "?class_name={$class1}&action=add_record";
            $output .= "<p>Voulez-vous ajouter les <b>$k</b> données sur Access $class1 existant dans access $class2? &nbsp;" . "<a href='$href'>Ajouter $class1</a></p>";

            $output .= $list;

            $output .= "<p style='font-size: 1em;background-color: white'>
            <span style='background-color: red;color: white;margin-right: 3em'>$class1 $i données manquante dans $class2</span><span style='background-color: green;color: white'>$class1 $j données trouvés dans $class2</span></p>";


            $output .= "<p style='font-size: 1em;background-color: white'>";
            $output .= "";

        }


        $output .= "<hr>";
        log_debug('log', strip_tags($output));
//        log_action('function check_xml_to_table ',$table);


        return $output;

    }

    public static function find_difference_xml_web_tables()
    {

        $output = "";
        $output_1 = "";

//        $output .= "<div class='white-bg'>";

//        $output .="<h4>Comparatif entre la base Access et site web</h4>";

        $table = "DataBaseClient/TransportClient";
//        $output .= static::check_xml_to_table($table);
        $output_1 .= static::accordion_body($table, static::check_xml_to_table($table), true);

        $table = "T_Chauffeur/TransportChauffeur";
//        $output .= static::check_xml_to_table($table);
        $output_1 .= static::accordion_body($table, static::check_xml_to_table($table));

        $table = "T_Type_Transport/TransportType";
        $output_1 .= static::accordion_body($table, static::check_xml_to_table($table));

        $output = static::accordion_head($output_1);

//        $output.= "</div>";

        return $output;

    }

    public static function accordion_head($body = 'body')
    {
        $output = "";
        $output .= "<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>";
        $output .= $body;
        $output .= "</div>";

        return $output;
    }

    public static function accordion_body($header = 'Collapsible Group Item #1', $body = 'body', $in = false)
    {
        $output = "";

        $id = substr(md5(uniqid(mt_rand(), true)), 0, 6);
//    {$id}

        if ($in) {
            $in = "in";
        } else {
            $in = "";
        }

        $output .= "<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>";

        $output .= " <div class='panel panel-info'>
        <div class='panel-heading' role='tab' id='heading{$id}'>
            <h4 class='panel-title'>
                <a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse{$id}' aria-expanded='true' aria-controls='collapseOne'>
                    {$header}
                </a>
            </h4>
        </div>
        <div id='collapse{$id}' class='panel-collapse collapse {$in}' role='tabpanel' aria-labelledby='heading{$id}'>
            <div class='panel-body'>
               {$body}
            </div>
        </div>
    </div>";

        $output .= "</div>";

        return $output;
    }


}
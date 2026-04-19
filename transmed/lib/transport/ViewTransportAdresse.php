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

    public static function list_ul($pseudo, Course $course = null)
    {

        global $Nav;
        $adresses = static::find_by_pseudo($pseudo);

        $output = "";

        $output .= "<div class='row  border-bottom white-bg dashboard-header'>";
        $output .= "<div class='col-sm-7'>";
        $output .= "<h2>Adresse</h2>";
//        $output .= "<small>You have 42 messages and 6 notifications.</small>";
        $output .= "<ul class='list-group clear-list m-t'>";


        foreach ($adresses as $adress) {
            if (!is_null($course)) {

                $href_depart = "{$Nav->path_public}transport.php?class_name=Course" . "&id={$course->id}&action=updateCourse&collapse=no&typeActionDepart=" . u($adress->adresse);

                $href_arrivee = "{$Nav->path_public}transport.php?class_name=Course" . "&id={$course->id}&action=updateCourse&collapse=no&typeActionArrivee=" . u($adress->adresse);

//                $depart = button_color('#333300', "<i class='fa fa-arrows-h'>&nbsp;Depart</i> " , $href_depart, '','','btn-xs');
//
//                $arrivee = button_color('#333300', "<i class='fa fa-arrows-h'>&nbsp;Arrivee</i> " , $href_arrivee, '','','btn-xs');
//
                $output .= "<li class='list-group-item text-center' >";
                $output .= "<span class='pull-right'><a href='$href_arrivee'><button class='btn btn-info btn-xs'>A</button></a></span>";

                $output .= "<span class='pull-left'><a href='$href_depart'><button class='btn btn-info btn-xs'>D</button></a></span>";

                $output .= $adress->adresse;
                $output .= "</li>";
            }






        }
        $output .= "</ul>";
        $output .= "</div>";
        $output .= "</div>";
        return $output;
    }

    public static function list_ul_mobile($pseudo, Course $course = null)
    {

        global $Nav;
        $adresses = static::find_by_pseudo($pseudo);

        $output = "";

        $output .= "<div>";
        $output .= "<h2>Adresse</h2>";

        $output .= "          <nav data-role='navbar'>
            <ul>
                <li><button class='ui-btn ui-btn-b'  disabled='disabled' >Depart</button></li>
                <li><button class='ui-btn'  disabled='disabled' >Adresse</button></li>
                <li><button class='ui-btn ui-btn-b '  disabled='disabled' >Arrivée</button></li>
            </ul>
          </nav>";

        foreach ($adresses as $adress) {
            if (!is_null($course)) {

                $href_depart = "{$Nav->path_public}transport.php?class_name=Course" . "&id={$course->id}&action=updateCourse&collapse=no&typeActionDepart=" . u($adress->adresse);

                $href_arrivee = "{$Nav->path_public}transport.php?class_name=Course" . "&id={$course->id}&action=updateCourse&collapse=no&typeActionArrivee=" . u($adress->adresse);

//                $output .= " <div data-role='controlgroup' data-type='horizontal'>
//                <a href='$href_depart' class='ui-btn'>D</a>
//                <button class='ui-btn'  disabled='disabled' >{$adress->adresse} </button>
//                <a href='$href_arrivee' class='ui-btn'>A</a>
//            </div>";

                $output .= "          <nav data-role='navbar'>
            <ul>
                <li><a href='$href_depart' class='ui-btn ui-icon-plus ui-btn-icon-top '></a></li>
                <li><button class='ui-btn' data-theme='b'  disabled='disabled' >{$adress->adresse} </button></li>
                <li><a href='$href_arrivee' class='ui-btn ui-icon-plus ui-btn-icon-top'></a></li>
            </ul>
          </nav>";


            }
        }

        $output .= "</div>";
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

    public static function json($pseudo)
    {
        $adresses = static::find_by_pseudo($pseudo);

        $array1 = [];

//        todo tocontinue json
        $output = "";
        foreach ($adresses as $adress) {
            array_push($array1, ["name" => $adress->adresse]);
        }


        $header = "$('.typeahead-address').typeahead({
    source:";

        $footer = "});";

        return "<script>" . $header . json_encode($array1) . $footer . "</script>";

//        return json_encode($array1);

    }


    public static function json_external($pseudo)
    {
        $array1 = [];
        $adresses = static::find_by_pseudo($pseudo);
        foreach ($adresses as $adress) {
            array_push($array1, $adress->adresse);
        }
        $array2 = ["Adresses" => $array1];
        return json_encode($array2);

    }


    public $pseudo;
    public $adresse;

//    public $adr;


}
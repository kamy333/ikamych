<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/4/2017
 * Time: 1:03 AM
 */
class Course extends TransportProgramming
{

    public $color;
    public $color2;

    public $colorinfo;
    public $colorinfo2;

    public $colorinfotxt;

    public $style_background;
//
    public static $date;
    public static $date_fmt;

    public static $previous_date_data;
    public static $next_date_data;

    public static $date_next;
    public static $date_previous;

//    public $hour;

//    public $reporting_date_today;
//    public $reporting_date_tomorrow;
//
//    public $reporting_sql;

//    public $reporting_time;

    public $toDayDateTimeString;
    public $course_date_when;

    protected static $db_field_table_display_chauffeur_header = ['H', 'Heure',];
    protected static $db_field_table_display_chauffeur = ['H', 'heure',];


    public static $page_report = "transport.php";

//    public static $page_manage = "transport.php";
//    public static $page_new = "new_transport.php";
//    public static $page_edit = "edit_transport.php";
//    public static $page_delete = "delete_transport.php";


    protected static function infoDayColorArray($date = null)
    {

        $dt = Carbon::createFromFormat('Y-m-d', $date); // 1975-05-21 22:00:00
        $new_date = $dt->toDateString();

        $colors = [
            'red' => ['count' => 0, 'ids' => [], 'text' => 'Retard', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Retard'],

            'lightred' => ['count' => 0, 'ids' => [], 'text' => 'Appel', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Appel en Retard'],

            'violet' => ['count' => 0, 'ids' => [], 'text' => 'Drive', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Drive'],

            'orange' => ['count' => 0, 'ids' => [], 'text' => 'A faire', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'A faire'],

            'lightorange' => ['count' => 0, 'ids' => [], 'text' => 'Appel', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Appel A faire'],

            'green' => ['count' => 0, 'ids' => [], 'text' => 'Plus tard', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Plus tard'],

            'lightgreen' => ['count' => 0, 'ids' => [], 'text' => 'Appel', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Appel plus tard'],

            'blue' => ['count' => 0, 'ids' => [], 'text' => 'Valid', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Valid Chauffeur'],

            'gray' => ['count' => 0, 'ids' => [], 'text' => 'Valid', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Valid Mgr'],

            'black' => ['count' => 0, 'ids' => [], 'text' => 'Valid', 'stylebg' => "", 'stylecolor' => "", 'text1' => 'Valid Final'],

        ];


        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $new_date . "' ORDER BY heure ASC";

        $courses = static::find_by_sql($sql);


        $output = "";
        $output2 = "";

        foreach ($courses as $course) {
            static::info($course);
            $colors[$course->colorinfo]['count'] = (int)$colors[$course->colorinfo]['count'] + 1;
            $colors[$course->colorinfo]['stylebg'] = $course->color2;
            $colors[$course->colorinfo]['stylecolor'] = $course->color;


            array_push($colors[$course->colorinfo]['ids'], $course->id);

        }


        return $colors;

    }

    public static function infoDay($date, $with_text = true, $with_validation = false)
    {
        $colors = static::infoDayColorArray($date);

        $output = "";

        if ($with_validation) {
            $validation_array = [];
        } else {
            $validation_array = ['blue', 'gray', 'black'];

        }


        foreach ($colors as $color => $c) {

            $couleur = $color;
            $count = $c['count'];
            $txt = $c['text'];
            $txt1 = $c['text1'];
            $bg = $c['stylebg'];
            $font_color = $c['stylecolor'];

//            $style_font_color="white";
//            $color=="yellow"? $font_color="black" :$font_color="white";

            if ($count > 0 && !in_array($color, $validation_array)) {

                if ($with_text) {
                    $output .= "<button style='background-color:{$bg};color:$font_color;width: 12em'  class='btn ' type='button'>$txt <span  class='badge'> $count </span>
                        </button>&nbsp;&nbsp;";

//                    $output .= "<button style='background-color:{$couleur};color:$font_color;width: 12em'  class='btn ' type='button'>$txt <span  class='badge'> $count </span>
//                        </button>&nbsp;&nbsp;";

                } else {
                    $output .= "<button style='background-color:{$bg};color:$font_color;width: 5em'  class='btn ' type='button'><span class='badge'> $count </span>
                        </button>&nbsp;&nbsp;";
                }


            }


        }
        return $output;


    }

    protected static function info(Course $course)
    {

//        global $Nav;
        Carbon::setLocale('fr');

//        setlocale(LC_TIME, 'French');

        $course->heure = substr($course->heure, 0, 5);

        $course_heure = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5)); // 1975-05-21 22:00:00

//        $course->hour=$course_heure->hour;
//        echo $dt->
        $course->toDayDateTimeString = $course_heure->formatLocalized('%A %d %B %Y %H:%M');


        $dif_min = Carbon::now()->diffInMinutes($course_heure, false);

        $course->course_date_when = $course_heure->diffForHumans(Carbon::now());

        $output = "";
        $client = TransportClient::find_by_id((int)$course->client_id);
        $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);


        if ((int)$course->validated_final == 1) {
            $course->color = "white";
            $course->color2 = "black";

            $course->colorinfo = "black";
            $course->colorinfo2 = "blue";

            $course->colorinfotxt = "Validation Final";


        } elseif ((int)$course->validated_mgr == 1) {
            $course->color = "white";
            $course->color2 = "gray";

            $course->colorinfo = "gray";
            $course->colorinfo2 = "blue";

            $course->colorinfotxt = "Validation Mgr";


        } elseif ((int)$course->validated_chauffeur == 1) {
            $course->color = "white";
            $course->color2 = "blue";

            $course->colorinfo = "blue";
            $course->colorinfo2 = "blue";

            $course->colorinfotxt = "Validation Chauffeur";


        } elseif ((int)$course->drive_mode == 0 && $course->end_drive != "0000-00-00 00:00:00") {
            $course->color = "white";
            $course->color2 = "blue";

            $course->colorinfo = "blue";
            $course->colorinfo2 = "blue";

            $course->colorinfotxt = "Course finie";


        } elseif ((int)$course->drive_mode == 1) {
            $course->color = "white";
            $course->color2 = "violet";

            $course->colorinfo = "violet";
            $course->colorinfo2 = "violet";

            $course->colorinfotxt = "Course en cours";


        } elseif ((int)$course->aller_appel == 1 || (int)$course->retour_appel == 1) {

            if ($dif_min <= -5) {
                $course->color = "white";
                $course->color2 = "#ff4d4d";//lightred

                $course->colorinfo = "lightred";
                $course->colorinfo2 = "red";

                $course->colorinfotxt = "Course en retard (Appel)";


            } elseif ($dif_min > -5 && $dif_min <= 30) {
                $course->color = "black";
                $course->color2 = "#ffdb99";

                $course->colorinfo = "lightorange";
                $course->colorinfo2 = "orange";

                $course->colorinfotxt = "Course proche (Appel)";


            } else {
                $course->color = "white";
                $course->color2 = "#00cc66";//lightgreen

                $course->colorinfo = "lightgreen";
                $course->colorinfo2 = "green";

                $course->colorinfotxt = "Course plus tard (Appel)";


            }


        } elseif ($dif_min <= -5) {
            $course->color = "white";
            $course->color2 = "red";

            $course->colorinfo = "red";
            $course->colorinfo2 = "red";
            $course->colorinfotxt = "Course en retard";


        } elseif ($dif_min > -5 && $dif_min <= 30) {
            $course->color = "black";
            $course->color2 = "orange";

            $course->colorinfo = "orange";
            $course->colorinfo2 = "orange";
            $course->colorinfotxt = "Course proche";


        } elseif ($dif_min > 30 && $dif_min < 60) {
            $course->color = "white";
            $course->color2 = "#00b300";

            $course->colorinfo = "green";
            $course->colorinfo2 = "green";
            $course->colorinfotxt = "Course plus tard";


        } else {
            $course->color = "white";
            $course->color2 = "#00b300";

            $course->colorinfo = "green";
            $course->colorinfo2 = "green";
            $course->colorinfotxt = "Course plus tard";


        }

        $course->style_background = "style='background-color: $course->color2;color:$course->color'";

        return $course;


    }

    protected static function show(Course $course, $view_link = false)
    {

        global $Nav;
        Carbon::setLocale('fr');

        $course = static::info($course);

        $course_heure = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5)); // 1975-05-21 22:00:00


        $dif_min = Carbon::now()->diffInMinutes($course_heure, false);

        $when = $course_heure->diffForHumans(Carbon::now());

        $output = "";
        $client = TransportClient::find_by_id((int)$course->client_id);
        $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);

        $repeat = str_repeat('&nbsp;', 2);


        $output .= "<li  class='list-group-item $course->color' $course->style_background  >";
        $output .= "<span>";
        $output .= "<strong>";
        $output .= "<a  style='color: inherit;' href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class()
            . "&id={$course->id}&action=links_for_id''>";
        $output .=
//            "<span  class='hidden-sm hidden-xs'>".$course->course_date . "</span >".
            "<span class='badge'>" . hr_mn_to_text($course->heure, 'h') . "</span>"
            . " "
            . $client->web_view . " "
            . "<span class='badge'>" . $chauffeur->chauffeur_name . "</span>"
//                . "<span  class='hidden-sm hidden-xs'> ($dif_min)</span> "
            . "<span class='badge'>" . $when . "</span>"
            . "<span  class='hidden-sm hidden-xs'>- id(" . $course->id . ")</span>";
        $output .= "</a>";
        $output .= "</strong>";
        $output .= "</span>";


        $output .= "<span class='hidden-sm hidden-xs'>";


        $output .= "<span class='pull-right text-center' style='text-decoration: none;background-color: white;margin-right: 5%;margin-left: 5%'>";
        $output .= $repeat . "<a href='{$Nav->path_admin}edit_ajax.php?class_name=Course&id={$course->id}'><span > <i class='fa fa-edit'></i></span></a>";
        $output .= $repeat . "<a onclick=\"return confirm('Delete Are you sure?')\" href='{$Nav->path_admin}delete_ajax.php?class_name=Course&id={$course->id}'><span><i class='fa fa-eraser' style='color:red'></i></span></a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}"
            . static::$page_report . "?class_name=" . get_called_class()
            . "&id={$course->id}&action=links_for_id'>links</a>";

//        $repeat .= "<span class='label label-info' >";
        $repeat .= "<span class='badge' >";
        $repeat2 = "</span>";
        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-20'>-20mn</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-60'>-1h</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=0'>Now</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=1'>+1mn</a>" . $repeat2;
        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=5'>+5mn</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=10'>+10mn</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=59'>+1h</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=70'>+70mn</a>" . $repeat2;


        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-20'>-20mn D</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-60'>-1h D</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=1'>+1mn D</a>" . $repeat2;
        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=5'>+5mn D</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=10'>+10mn D</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=59'>+1h D</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=70'>+70mn D</a>" . $repeat2;

        $output .= $repeat . "<a  href='{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateValidation'>Chauf</a>";
        $output .= "</span>";

        $output .= "</span>";
        $output .= "</li>";


        return $output;

    }

    public static function links_for_id()
    {
        $output = "";
        $repeat = ""; // str_repeat('&nbsp;', 2);
        global $Nav;
        Carbon::setLocale('fr');


        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] == get_called_class() && $_GET['action'] == "links_for_id") {
            $course = static::find_by_id((int)trim($_GET['id']));
            $course = static::info($course);

//            $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);

            $client = TransportClient::find_by_id((int)$course->client_id);
            $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);

            $href = "" . static::$page_report . "?class_name=Course&course_date=" . u($course->course_date);
            $course_date_when = "<a class='hidden-xs hidden-xm' href='$href' style='color: $course->color'>($course->course_date_when)</a>";

            $dt_today = Carbon::today()->toDateString();

            $href = "" . static::$page_report . "?class_name=Course&course_date=" . u($course->course_date);

            if ($dt_today == $course->course_date) {

                $head_link = "&nbsp;&nbsp;<a href='$href'><button class='btn btn-primary btn-sm'>Courses</button></a>";

            } else {
                $head_link = "&nbsp;&nbsp;<a href='$href'><button class='btn btn-info btn-sm'>Courses</button></a>";
                $href1 = "" . static::$page_report . "?class_name=Course&course_date=" . u($dt_today);
                $head_link .= "&nbsp;&nbsp;<a href='$href1'><button class='btn btn-info btn-sm'>today</button></a>";


            }


            $output .= "creation course au dela d'aujourd'hui chauffeur autre
            chauffeur peut creer ou s'attribuer une course à lui à autres mais plus changer attribuer un autre";

            $output .= "après 12h Drive mode 0 et fermer la date envoyer email   ";

            $output .= "<h1 class='text-center' $course->style_background >$course->toDayDateTimeString  <small>$course_date_when $course->colorinfotxt</small></h1>";
            $output .= "<h2 class='text-center' $course->style_background >"
                . "<span  class='hidden-xs hidden-xm'>{$course->heure} id({$course->id})</span> {$course->pseudo} {$chauffeur->chauffeur_name}</h2>";

            /** @noinspection HtmlUnknownAnchorTarget */
            $output .= "<a class='btn ' $course->style_background role='button' data-toggle='collapse' href='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>
 Course <span  class='hidden-xs hidden-xm'>details  id({$course->id}) {$course->pseudo}</span> 
</a>";

            $output .= "&nbsp;&nbsp;";

            /** @noinspection HtmlUnknownAnchorTarget */
            $output .= "<a class='btn ' $course->style_background role='button' data-toggle='collapse' href='#collapseExample1' aria-expanded='false' aria-controls='collapseExample1'>
Client  <span  class='hidden-xs hidden-xm'> details  id( {$course->client_id}) {$course->pseudo}</span> 
</a>";
            $output .= "&nbsp;&nbsp;";

            $countAdresse = ViewTransportAdresse::count_all_where("WHERE pseudo='$client->pseudo'");

            /** @noinspection HtmlUnknownAnchorTarget */
            $output .= "<a class='btn ' $course->style_background role='button' data-toggle='collapse' href='#collapseExample2' aria-expanded='false' aria-controls='collapseExample2'>
     Adresses <span class='badge'>{$countAdresse}</span> 
</a>";

            $output .= "&nbsp;&nbsp;";
            $output .= $head_link;
            $output .= "<hr>";

//

            $listCourse = "<div>";
            $listCourse .= "<ul class='list-group'>";
            foreach (static::$db_fields as $field) {
                $listCourse .= "<li class='list-group-item' >$field &nbsp;&nbsp;&nbsp;<span class='text-danger' style='color:$course->color2'>" . $course->$field . "</span> </li>";
            }
            $listCourse .= "<ul>";
            $listCourse .= "</div>";


            $listClient = "<div>";
            $listClient .= "<ul class='list-group'>";
            foreach (TransportClient::get_table_field() as $field) {
                $listClient .= "<li class='list-group-item' >$field &nbsp;&nbsp;&nbsp;<span class='text-danger' style='color:$course->color2'>" . $client->$field . "</span> </li>";
            }
            $listClient .= "<ul>";
            $listClient .= "</div>";

            $output .= "<div class='collapse' id='collapseExample'>
    <div class='well' >
        {$listCourse}
    </div>
</div>";

            $output .= "<div class='collapse' id='collapseExample1'>
    <div class='well' >
        {$listClient}
    </div>
</div>";

            $listAdresse = static::create_form_everywhere($course->id) . ViewTransportAdresse::list_ul($client->pseudo, $course);

            if (isset($_GET['collapse']) && isset($_GET['collapse']) == "no") {
                $in = "in";
            } else {
                $in = "";
            };

            $output .= "<div class='collapse $in' id='collapseExample2'>
    <div class='well' >
        {$listAdresse}
    </div>
</div>";
            unset($_GET['collapse']);

            //            $listAdresse = ViewTransportAdresse::data_source($client->pseudo);
//
//
//            $form_class_name=get_called_class();
//            $form_post_page="transport_post.php";
//            $form_page="".static::$page_report."";
//            $form_environment='public';
//            $form_submit_value="FormsCourseLinksForId";
//            $form_action="links_for_id";


//            $output .= static::create_form_everywhere($course->id);

//
//            $output .= "<p>Complete link_for_id  form   method update_everywhere and transport post</p>";
//            $output .= "<p>View by Chauffeur</p>";
//            $output .= "<p>Adresse used by Client </p>";
//            $output .= "<p>Validation</p>";
//            $output .= "<p>Refresh Ajax</p>";
//            $output .= "<p>Authorization</p>";
//            $output .= "<p>incomplet</p>";

            $href = "{$Nav->path_admin}edit_ajax.php?class_name=Course&id={$course->id}";
//            $output .= $repeat . "<a href='{$href}'><span > <i class='fa fa-edit'></i></span></a>";
            $output .= button_color('success', "<i class='fa fa-edit'> Edit</i>", $href, '');


            if (User::is_allow_access()) {
                $href = "{$Nav->path_admin}delete_ajax.php?class_name=Course&id={$course->id}";
                $others_a = "onclick=\"return confirm('Delete Are you sure?')\"";
                $output .= button_color('danger', "<i class='fa fa-trash'> Delete</i>", $href, '', $others_a);
            }


//            $toDayDateTimeString
            $output .= "<hr>";
            $output .= "<h4 class='hidden-sm hidden-xs'>Mode Oui Non  {$course->toDayDateTimeString}</h4>";


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionAllerRetour=flip";
            $output .= button_color('#333300', "<i class='fa fa-arrows-h'>&nbsp;Aller Retour</i> " . yes_no($course->aller_retour), $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionAllerAppel=flip";

            $output .= button_color('#66ffff', "<i class='fa fa-phone'>&nbsp;Aller sur Appel</i> " . yes_no($course->aller_appel), $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionRetourAppel=flip";
            $output .= button_color('warning', "<i class='fa fa-phone'>&nbsp;Retour Appel</i> " . yes_no($course->retour_appel), $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionDriveMode=flip";
            $output .= button_color('violet', "<i class='fa fa fa-automobile'>&nbsp;Drive Mode</i> " . yes_no($course->drive_mode), $href, '');

            $output .= "<hr>";

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateValidation";
            $output .= button_color('blue', "<i class='fa fa-user-md'>&nbsp;Chauffeur</i> " . yes_no($course->validated_chauffeur), $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionValidatedMgr=flip";
            $output .= button_color('gray', "<i class='fa fa-user'>&nbsp;Valid Mgr </i> " . yes_no($course->validated_mgr), $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionValidatedFinal=flip";
            $output .= button_color('black', "<i class='fa fa-user-md'>&nbsp;Valid Final</i> " . yes_no($course->validated_final), $href, '');


            $output .= "<hr>";


//            $output .= "<div>";
//
//            $output .= "<form method='get' >";
//            $output .= "<input class='hidden'  type='text' value='updateDefiningTiming' name='action'>";
//            $output .= "<input class='touchspin2'  type='text' value='' name='typeActionMinuteFromNow'>";
//            $output .= "</form>";
//
//            $output .= "</div>";

            $output .= " <div class='ibox-content'>";

//            $blank=$repeat
            $repeat = str_repeat('&nbsp;', 14);

            $output .= " <form role='form' class='form-inline' method='get' action='" . static::$page_report . "''>";
            $output .= "<span>+/- maintenant $repeat</span>";
            $output .= "<input class='hidden'  type='text' value='updateDefiningTiming' name='action'>";
            $output .= "<input class='hidden'  type='text' value='{$course->id}' name='id'>";
            $output .= "<input class='hidden'  type='text' value='Course' name='class_name'>";
            $output .= " <div class='form-group'>";
            $output .= "<label for='typeActionMinuteFromNowadd' class='sr-only'>addtiming</label>";
            $output .= "<input class='touchspinAddDeduct'  type='text' value='' id='typeActionMinuteFromNow' name='typeActionMinuteFromNow'>";
            $output .= "<button type='submit' name='submit' value='' class='btn btn-default'>Action</button>";

            $output .= "</div>";
            $output .= "</form>";

            $output .= " <form role='form' id='' class='form-inline' method='post' action='" . static::$page_report . "'>";
            $output .= "<span>+/- de $course->course_date $course->heure</span>";
            $output .= "<input class='hidden'  type='text' value='updateDefiningTiming' name='action'>";
            $output .= "<input class='hidden'  type='text' value='{$course->id}' name='id'>";
            $output .= "<input class='hidden'  type='text' value='Course' name='class_name'>";
            $output .= "<div class='form-group'>";
            $output .= "<label for='typeActionMinuteFromNowless' class='sr-only'>Password</label>";
            $output .= "<input class='touchspinAddDeduct'  type='text' value='' id='typeActionMinuteFromDate' name='typeActionMinuteFromDate'>";
            $output .= "<button type='submit' name='submit' value='' class='btn btn-default'>Action</button>";
            $output .= "</div>";
            $output .= "</form>";

            $output .= " </div>";

            $output .= "<hr>";

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-20";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;20mn</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-60";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;1h</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-0";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;Now</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=1";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1mn</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=5";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;5mn</i>", $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=10";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;10mn</i>", $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=59";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1h</i>", $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=70";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1h10mn(70mn)</i>", $href, '');

            $output .= "<hr>";
            $output .= "<h4>From course {$course->course_date}</h4>";

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-20";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;20mn</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-60";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;1h</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-4mn";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;4mn</i>", $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=1";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1mn</i>", $href, '');


            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=5";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;5mn</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=29";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;29mn</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=40";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;40mn</i>", $href, '');

            $href = "{$Nav->path_public}" . static::$page_report . "?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=59";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1h</i>", $href, '');

            $output .= "<hr>";
            $output .= "<div class='hidden-sm hidden-xs'>";

            $output .= "Autres information";

//            $output.="<form method='post' action='".static::$page_report."?id={$course->id}&class_name=Course'>";
//
//            $output .= "<label>Depart</label>";
//            $output .= "<input type='text' name='depart' value='{$course->depart}'>";
//
//            $output .= "<label>Arrivée</label>";
//            $output .= "<input type='text' name='arrivee' value='{$course->arrivee}'>";


//            $output .= "</form>";


            $output .= "Date de saisie:" . $course->input_date;
            $output .= "Date de modif:" . $course->modification_time;
            $output .= "username:" . $course->username;

            $output .= "</div>";


        }

        //            return ibox($output, 12, "COURSES ");
        return "<div class='white-bg'>" . $output . "</div>";

    }

    public static function updateValidation()
    {
        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] == get_called_class() && $_GET['action'] == "updateValidation") {
            $course = static::find_by_id((int)trim($_GET['id']));
//            $valid_int=(int)  $_GET['typeActionValidatedChauffeur'];

            if ($course->validated_chauffeur == 0) {
                $course->validated_chauffeur = 1;
            } else {
                $course->validated_chauffeur = 0;
            }

            $course->save();
        }

        $qry = remove_get(['action']);

//        redirect_to($_SERVER['PHP_SELF']."?class_name=".get_called_class());


        redirect_to($_SERVER['PHP_SELF'] . $qry);

    }

    public static function updateAppel()
    {

        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] == get_called_class() && $_GET['action'] == "updateAppel") {
            $course = static::find_by_id((int)trim($_GET['id']));
//            echo "<script>alert($course->aller_retour $course->pseudo )</script>";
//            return;
            if (isset($_GET['typeActionAllerAppel'])) {

                if ((int)$course->aller_appel === 0) {
                    $course->aller_appel = 1;
                } else {
                    $course->aller_appel = 0;
                }
//                $course->save();

            } elseif (isset($_GET['typeActionRetourAppel'])) {
                if ((int)$course->retour_appel === 0) {
                    $course->retour_appel = 1;
                } else {
                    $course->retour_appel = 0;
                }

            } elseif (isset($_GET['typeActionAllerRetour'])) {
                if ((int)$course->aller_retour === 0) {

                    $course->aller_retour = 1;
                } else {
                    $course->aller_retour = 0;
                }


            } elseif (isset($_GET['typeActionDriveMode'])) {
                if ((int)$course->drive_mode === 0) {

                    $course->drive_mode = 1;
                    $course->start_drive = Carbon::now();
                } else {
                    $course->drive_mode = 0;
                    $course->end_drive = Carbon::now();
                }

            } elseif (isset($_GET['typeActionValidatedMgr'])) {
                if ((int)$course->validated_mgr === 0) {

                    $course->validated_mgr = 1;

                } else {
                    $course->validated_mgr = 0;

                }


            } elseif (isset($_GET['typeActionValidatedFinal'])) {
                if ((int)$course->validated_final === 0) {

                    $course->validated_final = 1;

                } else {
                    $course->validated_final = 0;

                }


            } else {

            }
//                    echo "<script>alert($course->aller_retour $course->id )</script>";
//            return;
            $course->save();
//            return;
            redirect_to($_SERVER['PHP_SELF'] . "?class_name=" . get_called_class());


        }


    }

    public static function updateCourse()
    {

        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] == get_called_class() && $_GET['action'] == "updateCourse") {
            $course = static::find_by_id((int)trim($_GET['id']));

            if (isset($_GET['typeActionDepart'])) {

                $depart = urldecode($_GET['typeActionDepart']);
                $course->depart = $depart;

            } elseif (isset($_GET['typeActionArrivee'])) {
                $arrivee = urldecode($_GET['typeActionArrivee']);
                $course->arrivee = $arrivee;
            } else {

            }

            $course->save();

            $qry = remove_get(['typeActionDepart', 'typeActionArrivee', 'action']);
            redirect_to($_SERVER['PHP_SELF'] . $qry . "&action=links_for_id");


//            redirect_to("".static::$page_report."?class_name=".get_called_class()."&id={$course}&Action=links_for_id");
//  http://localhost/ikamych/transmed/".static::$page_report."?class_name=Course&id=58&action=links_for_id
//            redirect_to("".static::$page_report."?class_name=Course&id={$course}&action=links_for_id");

        }


    }

    public static function updateDefiningTiming()
    {
        global $Nav;

        if (isset($_GET) && isset($_GET['class_name']) && isset($_GET['action']) && $_GET['class_name'] == get_called_class() && $_GET['action'] == "updateDefiningTiming") {

            $course = static::find_by_id((int)trim($_GET['id']));


            if (isset($_GET['typeActionMinuteFromNow'])) {
                $add_minute = (int)$_GET['typeActionMinuteFromNow'];
                $dt = Carbon::now();
            } elseif ($_GET['typeActionMinuteFromDate']) {
                $add_minute = (int)$_GET['typeActionMinuteFromDate'];
                $dt = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . $course->heure); // 1975-05-21 22:00:00
            } else {
                $add_minute = 0;
                $dt = Carbon::now();

            }

            if ($add_minute < 0) {
                $dt->subMinutes(abs($add_minute));
            } else {
                $dt->addMinutes($add_minute);
            }

            $date_sql = $dt->toDateString();
            $time_now = $dt->toTimeString();

//            $time_now=now_time();

            $course->course_date = $date_sql;
            $course->heure = $time_now;
            $course->save();

            $qry = remove_get(['typeActionMinuteFromNow', 'typeActionMinuteFromDate', 'action']);
            $href = clean_query_string("tcourse.php" . $qry . "&action=links_for_id");

//
            if (get_called_class() == "Course") {
                redirect_to($_SERVER['PHP_SELF'] . "?class_name=" . get_called_class());
            } else {
                redirect_to($href);


            }
        }

    }

    protected static function get_records(array $courses)
    {
        $output = "";
        foreach ($courses as $course) {

            $output .= static::show($course);

        }


//        var_dump($output);
//        return;

//        $output.=

        return static::list_ul($output);

    }

    public static function get_today()
    {
//        $today = e(now_sql());

        $dt = Carbon::now();
        $today = $dt->toDateString();
        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $today . "' ORDER BY heure ASC";

        $courses = static::find_by_sql($sql);

//        $output = "";

        return static::get_records($courses);

    }

    public static function get_tomorrow()
    {
//        $today = e(now_sql());

        $dt = Carbon::tomorrow();
        $tomorrow = $dt->toDateString();
        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $tomorrow . "' ORDER BY heure ASC";

        $courses = static::find_by_sql($sql);

//        $output = "";

        return static::get_records($courses);

    }

    public static function get_date($date)
    {


        $dt = Carbon::createFromFormat('Y-m-d', $date); // 1975-05-21 22:00:00
        $new_date = $dt->toDateString();


        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $new_date . "' ORDER BY heure ASC";
        $courses = static::find_by_sql($sql);

        return static::get_records($courses);

    }

    public static function get_yesterday()
    {
//        $today = e(now_sql());

        $dt = Carbon::yesterday();
        $yesterday = $dt->toDateString();
        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $yesterday . "' ORDER BY heure ASC";

        $courses = static::find_by_sql($sql);


        return static::get_records($courses);

    }

    public static function view_nav()
    {
        $date = static::$date;
        $date_str = $date->toDateString();

        $output = "";


//        $output .= "<a href='$href'>Course</a>";

        $output .= "<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'>
    <i class='fa fa-search'></i>
</button>";

        $output .= "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>Navigation</h4>
            </div>
            <div class='modal-body'>";
        $output .= "<form  class='form-inline' method='get'  action='" . $_SERVER['PHP_SELF'] . "'> ";


        $output .= "<div class='form-group model-pivot-date' id='data_xxxxxx'>
                                <div class='input-group date  model-pivot-date'>
                                    <span class='input-group-addon'><i class='fa fa-calendar'></i></span><input type='text' name='course_date_french' class='form-control'  >
                                </div>
                            </div>";
        $output .= "<input class='hidden' name='class_name' value='" . $_GET['class_name'] . "'>";
        $output .= "  <button class='btn btn-info' type='submit'>Go</button>                           
                            </form>";


        $output .= "<form  class='form-inline' method='get'  action='" . $_SERVER['PHP_SELF'] . "'> ";

        $output .= "<select>
<option value='0'>Naf</option>
</select>";
        $output .= "<input class='hidden' name='class_name' value='" . $_GET['class_name'] . "'>";
        $output .= "  <button class='btn btn-info' type='submit'>Go</button>                           
                            </form>";


        $output .= "  <ul class=\"list-inline\">";
        if ($_GET['class_name'] !== "Course") {
            $href = clean_query_string("" . static::$page_report . "?" . "?class_name=Course&course_date={$date_str}");
            $output .= "<li ><a href=\"$href\"><span>Course</span></a></li>";
        }

        if ($_GET['class_name'] !== "CourseByChauffeur") {
            $href = clean_query_string("" . static::$page_report . "?" . "?class_name=CourseByChauffeur&course_date={$date_str}");
            $output .= "<li><a href=\"$href\"><span>Course By Chauffeur</span></a></li>";
        }
        $output .= "</ul>";


        $output .= "</div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>";


        return $output;

    }

    public static function set_date()
    {
        $date = static::$date;
        $date_str = $date->toDateString();

//        public static $previous_date_data;
//        public static $next_date_data;

        global $database;


        $table = static::$table_name;
        /** @noinspection PhpUnusedLocalVariableInspection */
        /** @noinspection SqlResolve */
        $sql = "SELECT max(course_date)  FROM `{$table}` WHERE `course_date` < '{$date_str}' ORDER BY `course_date`";
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);


        if ($row) {
            static::$previous_date_data = array_shift($row);
        } else {
            static::$previous_date_data = false;

        }


//        /** @noinspection PhpUnusedLocalVariableInspection */
        /** @noinspection SqlResolve */
        $sql = "SELECT min(course_date)  FROM `{$table}` WHERE `course_date` > '{$date_str}' ORDER BY `course_date`";

        $result_set = $database->query($sql);

        $row = $database->fetch_array($result_set);

        if ($row) {
            static::$next_date_data = array_shift($row);
        } else {
            static::$next_date_data = false;

        }


    }

    public static function header_list_ul()
    {
        $output = "";


        Carbon::setLocale('fr');
        $date = static::$date;
        $previousDate = $date->copy()->subDay();
        $nextDate = $date->copy()->addDay();
        $date_fmt = $date->formatLocalized('%A %d %B %Y');
        $date_fmt2 = $date->formatLocalized('%a %d %b %y');

        $previousDate_str = $previousDate->toDateString();
        $date_str = $date->toDateString();
        $nextDate_str = $nextDate->toDateString();

        $days_after = $date->diffForHumans(Carbon::today());


        if ($date == Carbon::today()) {
            $header = "<small>Aujourd'hui</small>";
        } elseif ($date == Carbon::yesterday()) {
            $header = "<small>Hier</small>";
        } elseif ($date == Carbon::tomorrow()) {
            $header = "<small>Demain</small>";
        } else {
            $header = "<small><i>($days_after)</i></small>";

        }
        static::set_date();
        $previousDateData_str = static::$previous_date_data;
        $nextDateData_str = static::$next_date_data;

        $previous = "<i class=\"fa fa-backward\"></i>";
        $next = "<i class=\"fa fa-forward\"></i>";

        $previousData = "<i class=\"fa fa-fast-backward\"></i>";
        $nextData = "<i class=\"fa fa-fast-forward\"></i>";

        if ($previousDateData_str) {
            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$previousDate_str";
            $previous = "<a href='$href'> $previous </a>";

            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$previousDateData_str";
            $previous_with_data = "<a href='$href'> $previousData </a>";

        } else {
            $previous = "";
            $previous_with_data = "";

        }

        if ($nextDateData_str) {

            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$nextDate_str";
            $next = "<a href='$href'> $next </a>";

            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$nextDateData_str";
            $next_with_data = "<a href='$href'> $nextData </a>";
        } else {
            $next = "";
            $next_with_data = "";

        }
        $output .= "<h1 class='text-center'>";


        $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=today";
        $link = "<a href='$href'>$date_fmt</a>";
        $link2 = "<a href='$href'>$date_fmt2</a>";


        $output .= static::view_nav();
        $output .= "<span class='hidden-sm hidden-xs' style='color: inherit' >$previous_with_data $previous Courses $header du </span>";


        $output .= "<span class='hidden-sm hidden-xs'>" . $link . $next . $next_with_data . "</span>";
//        $output.=;

        $output .= "<span class='visible-sm visible-xs' style='font-size:smaller'>" . $previous_with_data . $previous . $link2 . $next . $next_with_data . "</span>";

        $output .= static::infoDay($date_str, false, true);

        $output .= "</h1>";

//        $output .= "<div class='row'>";
//        $output .= "<div class='col-md-offset-3'>";

//        $output .= "</div>";
//        $output .= "</div>";
        $output .= "<hr>";

        return $output;
    }

    public static function list_ul($content = '')
    {
        $output = "";


        Carbon::setLocale('fr');
        $date = static::$date;
//        static::set_date();

        $previousDate = $date->copy()->subDay();
        $nextDate = $date->copy()->addDay();


        $previousDate_fmt = $previousDate->formatLocalized('%A %d %B %Y');
        $date_fmt = $date->formatLocalized('%A %d %B %Y');
        $date_fmt2 = $date->formatLocalized('%a %d %b %y');
        $nextDate_fmt = $nextDate->formatLocalized('%A %d %B %Y');

        $previousDate_str = $previousDate->toDateString();
        $date_str = $date->toDateString();
        $nextDate_str = $nextDate->toDateString();

//        $dif_days_previous = Carbon::today()->diffInDays($date, false);
        $days_after = $date->diffForHumans(Carbon::today());

//
//        $dif_days_next = Carbon::now()->diffInDays($nextDate, false);
//        $when_next = $nextDate->diffForHumans(Carbon::today());

//        echo $dif_days_previous."<hr>";
//        echo $dif_days_next."<hr>";
//
//
//        echo $when_previous."<hr>";
//        echo $when_next."<hr>";


        if ($date == Carbon::today()) {
            $header = "<small>Aujourd'hui</small>";
        } elseif ($date == Carbon::yesterday()) {
            $header = "<small>Hier</small>";
        } elseif ($date == Carbon::tomorrow()) {
            $header = "<small>Demain</small>";
        } else {
            $header = "<small><i>($days_after)</i></small>";

        }

        static::set_date();
        $previousDateData_str = static::$previous_date_data;
        $nextDateData_str = static::$next_date_data;


//        $previous = "<i class=\"fa fa-caret-square-o-left\"></i>";
//        $next = "<i class=\"fa fa-caret-square-o-right\"></i>";
//        $previousData = "<i class=\"fa fa-caret-square-o-left\"></i>";
//        $nextData = "<i class=\"fa fa-caret-square-o-right\"></i>";
//
//        $previous = "<i class=\"fa fa-step-backward\"></i>";
//        $next = "<i class=\"fa fa-step-forward\"></i>";

        $previous = "<i class=\"fa fa-backward\"></i>";
        $next = "<i class=\"fa fa-forward\"></i>";

        $previousData = "<i class=\"fa fa-fast-backward\"></i>";
        $nextData = "<i class=\"fa fa-fast-forward\"></i>";


        if ($previousDateData_str) {
            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$previousDate_str";
            $previous = "<a href='$href'> $previous </a>";

            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$previousDateData_str";
            $previous_with_data = "<a href='$href'> $previousData </a>";

        } else {
            $previous = "";
            $previous_with_data = "";

        }

        if ($nextDateData_str) {

            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$nextDate_str";
            $next = "<a href='$href'> $next </a>";

            $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=$nextDateData_str";
            $next_with_data = "<a href='$href'> $nextData </a>";
        } else {
            $next = "";
            $next_with_data = "";

        }


//        $output .= "<hr>";

        $output .= "<h1 class='text-center'>";


        $href = "" . static::$page_report . "?class_name=" . get_called_class() . "&course_date=today";
        $link = "<a href='$href'>$date_fmt</a>";
        $link2 = "<a href='$href'>$date_fmt2</a>";


        $output .= static::view_nav();


//        $output .=;
        $output .= "<span class='hidden-sm hidden-xs' style='color: inherit' >$previous_with_data $previous Courses $header du </span>";


        $output .= "<span class='hidden-sm hidden-xs'>" . $link . $next . $next_with_data . "</span>";
//        $output.=;

        $output .= "<span class='visible-sm visible-xs' style='font-size:smaller'>" . $previous_with_data . $previous . $link2 . $next . $next_with_data . "</span>";


        $output .= "</h1>";

        $output .= static::infoDay($date_str, true, true);
        $output .= "<hr>";

        $output .= "<ul class='list-group'>";
//        $output .= "<li href='#' class='list-group-item'>";
//var_dump($output);

        $output .= $content;
//        var_dump($content);

        $output .= "</ul>";
        $output .= "</div>"; //todo check the begining div if exists

        return $output;
    }

    public static function main_display()
    {

        if (isset($_GET['course_date_french'])) {
            $_GET['course_date'] = date_format_to_sql(urldecode($_GET['course_date_french']), $format = 'DD/MM/YYYY');
//            static::$date = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);

        }


        if (isset($_GET['course_date'])) {
            if ($_GET['course_date'] == "tomorrow") {
                static::$date = Carbon::tomorrow();
//                static::set_date();
                return static::get_tomorrow();
            } elseif ($_GET['course_date'] == "yesterday") {
                static::$date = Carbon::yesterday();
//                static::set_date();
                return static::get_yesterday();
            } elseif ($_GET['course_date'] == "today") {
                static::$date = Carbon::today();
//                static::set_date();
                return static::get_today();
            } else {
                $date = $_GET['course_date'];


                static::$date = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);
//                static::set_date();
                return static::get_date($date);
            }

        } else {
            static::$date = Carbon::today();;
//            static::set_date();
            return static::get_today();

        }
    }

//    copy from ViewTransportModelByChauffeur
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

//                $model->$name = $model->modele_id . "-" . $model->pseudo;
                $model->$name = $model->id . "-" . $model->pseudo;


            } else {
                $model->$name = "";
            }


        }

        return $model;

    }

    public static function get_chauffeur_column()
    {

//        $chauffeurs=TransportChauffeur::find_all();
        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }
        $date_str = $date->toDateString();

        $query_string = static::query_string();

        /** @noinspection SqlResolve */
        $sql = "SELECT DISTINCT chauffeur_id FROM " . static::$table_name . " {$query_string}  WHERE course_date='{$date_str}'  ORDER BY chauffeur_id ASC";
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

            $col_sql .= "(CASE WHEN (chauffeur_id = {$ch->id})   THEN id END) AS '$ch->initial',";
        }

        return rtrim($col_sql, ",");

    }

    public static function query_string()
    {
        $output = "";
        $output .= "";
        $whereand = "";


        if (isset(static::$date)) {
            $date = static::$date;

        } else {
            $date = Carbon::today();
            static::$date = $date;
        }
        $date_str = $date->toDateString();
        $whereand = " WHERE ";
        $course_date = " {$whereand} course_date=" . $date_str;


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
        return "";
//        to work on this for query string
        return " " . $course_date . " " . " " . $client;

    }

    public static function view_by_Chauffeur()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
//        echo "<br>".$sql;
        $output .= static::header_list_ul();
//        $output .= "<h2 class='text-center'>Course By Chauffeur</h2>";

//        $output .= static::nav_visible();

//        $collectData=["course_heure",];

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

        $dateNow = Carbon::now();
//        $i = 0;
//        $dateCourse=
        $FullHour = '';
        $CalHour = '';
        $countHead = -1;


        for ($i = 0; $i < 24; $i++) {

            $dateCalendar = Carbon::createFromFormat('Y-m-d', $date_str)->setTime($i, 0, 0);
//            echo $i;


            foreach ($courses as $course) {

                $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));
                if ($dateCalendar->hour !== $dateCourse->hour) {
//                                    echo $dateCalendar->hour ;
                    if ($CalHour !== $i && $countHead === 0) {

                        $output .= "<tr>";
                        $output .= "<td class='text-center' style='vertical-align: middle;'>";
                        $output .= $dateCalendar->hour . ":00 A";
                        $output .= "<td>";
                        for ($j = 0; $j < $addColumn; $j++) {
                            $output .= "<td></td>";
                        }


                        $output .= "</tr>";
                        $CalHour = $i;

                    } else {
                        $CalHour = "";
                        $output .= "";
                        $countHead++;
                    }


                } else {

//                }

                    $now = "";

                    static::create_properties($course);
                    static::info($course);
                    $course->set_up_display();


                    $output .= "<tr>";


                    foreach (static::$db_field_table_display_chauffeur as $field) {
                        $data_target = get_called_class() . "-modal-id-" . $course->id;
                        $output .= "<td class='text-center' style='vertical-align: middle;'>";


                        switch ($field) {

                            case "H":
                                if ($FullHour !== $dateCourse->hour) {
                                    $output .= $dateCourse->hour . ":00 B";
                                    $FullHour = $dateCourse->hour;
                                } else {
                                    $output .= $dateCalendar->hour . ":00 c";

                                    $FullHour = "";
                                }

                                break;
                            case "heure":

                                $output .= hr_mn_to_text($course->$field . 'h');
                                break;

                            default:
                                if (isset($course->$field) && !empty($course->$field)) {
                                    $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";

                                    $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button' data-toggle='modal' data-model-id='{$course->id}' data-target='#{$data_target}' class='btn btn-{$course->color2}'>" . "<span class='badge  pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;" . $course->pseudo . " " . "</button></a>";


                                }

                        }

                        $output .= "</td>";

                    }

                    $output .= "</tr>";


                } //end of course
            } // $dateCalendar->hour !== $dateCourse->hour
        } // end of $i 0-24 iteration

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

    public static function view_by_ChauffeurOK()
    {
        $ibox = false;

        Carbon::setLocale('fr');

        if (isset(static::$date)) {
            $date = static::$date;
        } else {
            $date = Carbon::today();
            static::$date = $date;
        }


        $date_str = $date->toDateString();

        $output = "";

        $countBefore = count(static::$db_field_table_display_chauffeur_header);
        $col_sql = static::get_chauffeur_column();
        $countAfter = count(static::$db_field_table_display_chauffeur_header);

        $addColumn = $countAfter - $countBefore;

        $query_string = static::query_string();


        if ($col_sql) {
            $col_sql = "," . $col_sql;
        }

        $sql = "SELECT * {$col_sql} FROM " . static::$table_name . " {$query_string} WHERE course_date='{$date_str}'  ORDER BY heure ASC, chauffeur_id ASC";

        $courses = static::find_by_sql($sql);
//        echo "<br>".$sql;
        $output .= static::header_list_ul();
//        $output .= "<h2 class='text-center'>Course By Chauffeur</h2>";

//        $output .= static::nav_visible();

//        $collectData=["course_heure",];

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

        $dateNow = Carbon::now();


        foreach ($courses as $course) {

            $dateCourse = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . substr($course->heure, 0, 5));


//                }


            static::create_properties($course);
            static::info($course);
            $course->set_up_display();


            $output .= "<tr>";


            foreach (static::$db_field_table_display_chauffeur as $field) {
                $data_target = get_called_class() . "-modal-id-" . $course->id;
                $output .= "<td class='text-center' style='vertical-align: middle;'>";


                switch ($field) {

                    case "H":


                        break;
                    case "heure":

                        $output .= hr_mn_to_text($course->$field . 'h');
                        break;

                    default:
                        if (isset($course->$field) && !empty($course->$field)) {
                            $href = "" . static::$page_report . "?class_name=Course&action=links_for_id&id=$course->id";

                            $output .= "<a href='$href'><button style='width: 12em;background-color:$course->color2;color:$course->color' type='button' data-toggle='modal' data-model-id='{$course->id}' data-target='#{$data_target}' class='btn btn-{$course->color2}'>" . "<span class='badge  pull-left'>" . $course->heure . "</span>&nbsp;&nbsp;" . $course->pseudo . " " . "</button></a>";


                        }

                }

                $output .= "</td>";

            }

            $output .= "</tr>";


        } //end of course


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

//-----------------------------------------------------------------------

    public static function save_everywhere($submit_value = "FormsCourseLinksForId", $data = null)
    {

        global $session;

        if (is_null($submit_value)) {
            die('ouchhhhhhhhhhhhh submit value is missing!');
        };

        if (request_is_post() && request_is_same_domain()) {
            if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
                $message = "Sorry, request was not valid.";
            } else {
                if (isset($_POST['submit']) && $_POST['submit'] == $submit_value) {

                    if (is_null($data)) {
                        $data = "ajaxXXX";
                    }


                    if (isset($_POST['class_name'])) {

                        $class_name = trim($_POST['class_name']);


                        if (isset($_POST['action'])) {
                            $action = trim($_POST['action']);
                            $action_url = "?action=" . u($action);
                        } else {
                            $action = "";
                            $action_url = "";
                        }

                        if (isset($_POST['page'])) {
                            $page = trim($_POST['page']);
                        } else {
                            $page = static::$page_report;
                        }

                        if (isset($_POST['environment'])) {
                            $env = trim($_POST['environment']);
                        } else {
                            $env = "admin";
                        }
                        ($env == 'public') ? $path = MY_URL_PUBLIC : $path = MY_URL_ADMIN;


                        if (isset($_POST['id'])) {
                            $id = trim($_POST['id']);
                            $new_item = $class_name::find_by_id((int)$id);
                            $url = clean_query_string($path . $page . "?class_name=" . u($class_name) . "?id=" . u($id) . $action_url);
                        } else {
                            $new_item = new $class_name();
                            $url = clean_query_string($path . $page . "?class_name=" . u($class_name) . $action_url);
                        }


                        $expected_fields = static::get_table_field();
                        foreach ($expected_fields as $field) {
                            if (isset($_POST[$field])) {
                                $new_item->$field = trim($_POST{$field});
                            } else {
                                $_POST[$field] = $new_item->$field;
                            }

                        }

                        if (isset($new_item->id)) {
                            $text_post = "Updated";
                            $text_post1 = "update";
                        } else {
                            $text_post = "created";
                            $text_post1 = "creation";

                        }

                        $valid = $new_item->form_validation();
//                      $valid->errors=[];

                        if (empty($valid->errors)) {
                            $message = '';

                            if ($new_item->save()) {
                                $message = get_called_class() . " " . $new_item->pseudo . " " . "has been $text_post with ID (" . $new_item->id . ")";
                                if ($data == "ajax") {
//                          return output_message($message,'o');
                                    unset($_POST);
                                    return "$message";
                                } else {
                                    $session->message($message);
                                    $session->ok(true);
                                    unset($_POST);

//                                    redirect_to(static::$page_report);
                                    redirect_to($url);
                                }


                            } else {
                                $message = get_called_class() . " " . $new_item->pseudo . " " . "$text_post failed or maybe nothing changed";
                                if ($data == "ajax") {
                                    unset($_POST);
                                    return $message;


                                } else {
//                                        $url = clean_query_string('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . "?" . "class_name=" . u(get_called_class()) . "action=" . u($action) . "&id=" . u($_GET['id']));
////

                                    $session->message($message);
                                    unset($_POST);
                                    redirect_to($url);
                                }


                            }


                        }


                    }


                }

            }
        }


    }

    public static function create_form_everywhere($id)
    {

        global $session;


        $course = static::find_by_id((int)$id);
        $client = TransportClient::find_by_id($course->client_id);
//        $listAdresse = ViewTransportAdresse::data_source($client->pseudo);

        echo $listAdresse = ViewTransportAdresse::json($client->pseudo);


//        $form_class_name=get_called_class();
        $form_class_name = get_called_class();
        $form_post_page = "transport_post.php";
        $form_page = "" . static::$page_report . "";
        $form_environment = 'public';
        $form_submit_value = "FormsCourseLinksForId";
        $form_action = "links_for_id";


        $output = "";


        $output .= "<div class='white-bg'>
    <form role='form' class='form-inline' 
     method='post' action='$form_post_page?class_name=$form_class_name'
    >
        <div class='form-group'>
            <label for='departCourseId{$course->id}' class='sr-only'>Départ</label>
            <input type='text' placeholder='Départ' name='depart' id='departCourseId{$course->id}' value='{$course->depart}'
                   class='form-control typeahead-address' '>
        </div>
        <div class='form-group'>
            <label for='arriveeCourseId{$course->id}' class='sr-only'>Arrivée</label>
            <input type='text' placeholder='Arrivée' name='arrivee'  id='arriveCourseId{$course->id}'  value='{$course->arrivee}'
                   class='form-control typeahead-address'  >
        </div>
          <div class='form-group hidden'>
            <label for='idCourseId{$course->id}' class='sr-only'>id</label>
            <input type='text' placeholder='' name='id'  id='idCourseId{$course->id}'  value='{$course->id}'
                   class='form-control'  ' >
        </div>
            <div class='form-group hidden'>
            <label for='class_nameCourseId{$course->id}' class='sr-only'>class_name</label>
            <input type='text' placeholder='' name='class_name'  id='class_nameCourseId{$course->id}'  value='$form_class_name'
                   class='form-control'  ' >
        </div>
        <div class='form-group hidden'>
            <label for='actionCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' placeholder='' name='action'  id='actionCourseId{$course->id}'  value='$form_action'
                   class='form-control'  ' >
        </div>
        <div class='form-group hidden'>
            <label for='pageforCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' placeholder='' name='page'  id='pageforCourseId{$course->id}'  value='$form_page'
                   class='form-control'  ' >
        </div>
           <div class='form-group hidden'>
            <label for='environmentforCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' placeholder='' name='environment'  id='environmentforCourseId{$course->id}'  value='$form_environment'
                   class='form-control'  ' >
        </div>";
        $output .= csrf_token_tag();
        $output .= "<button class='btn btn-primary' name='submit' value='$form_submit_value' type='submit'>Go</button>
    </form>
</div>";

        return $output;

    }

    public static function create_form_everywhere_copy($id = null)
    {

        global $session;


        $course = static::find_by_id((int)$id);
        $client = TransportClient::find_by_id($course->client_id);
        $listAdresse = ViewTransportAdresse::data_source($client->pseudo);

//        $form_class_name=get_called_class();
        $form_class_name = get_called_class();
        $form_post_page = "transport_post.php";
        $form_page = "" . static::$page_report . "";
        $form_environment = 'public';
        $form_submit_value = "FormsCourseLinksForId";
        $form_action = "links_for_id";


        $output = "";


        $output .= "<div class='ibox-content'>
    <form role='form' class='form-inline' 
     method='post' action='$form_post_page?class_name=$form_class_name'>
     
     
     
        <div class='form-group'>
            <label for='departCourseId{$course->id}' class='sr-only'>Départ</label>
            <input type='text' placeholder='Départ' name='depart' id='departCourseId{$course->id}' value='{$course->depart}'
                   class='form-control typehead-address' data-provide='typeahead' data-source='{$listAdresse}'>
        </div>
        
        
        
        <div class='form-group'>
            <label for='arriveeCourseId{$course->id}' class='sr-only'>Arrivée</label>
            <input type='text' placeholder='Arrivée' name='arrivee'  id='arriveCourseId{$course->id}'  value='{$course->arrivee}'
                   class='form-control'  data-provide='typeahead' data-source='{$listAdresse}' >
        </div>
        
        
        
          <div class='form-group hidden'>
            <label for='idCourseId{$course->id}' class='sr-only'>id</label>
            <input type='text' placeholder='' name='id'  id='idCourseId{$course->id}'  value='{$course->id}'
                   class='form-control'  ' >
        </div>
        
        
        
            <div class='form-group hidden'>
            <label for='class_nameCourseId{$course->id}' class='sr-only'>class_name</label>
            <input type='text' placeholder='' name='class_name'  id='class_nameCourseId{$course->id}'  value='$form_class_name'
                   class='form-control'  ' >
        </div>
        <div class='form-group hidden'>
            <label for='actionCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' placeholder='' name='action'  id='actionCourseId{$course->id}'  value='$form_action'
                   class='form-control'  ' >
        </div>
        <div class='form-group hidden'>
            <label for='pageforCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' placeholder='' name='page'  id='pageforCourseId{$course->id}'  value='$form_page'
                   class='form-control'  ' >
        </div>
           <div class='form-group hidden'>
            <label for='environmentforCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' placeholder='' name='environment'  id='environmentforCourseId{$course->id}'  value='$form_environment'
                   class='form-control'  ' >
        </div>";
        $output .= csrf_token_tag();
        $output .= "<button class='btn btn-primary' name='submit' value='$form_submit_value' type='submit'>Go</button>
    </form>
</div>";

        return $output;

    }

    public static function create_form_rapid()
    {

        $output = "";


    }







}
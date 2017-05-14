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
    public $style_background;
//
    public static $date;
    public static $date_fmt;

    public static $date_next;
    public static $date_previous;

//    public $reporting_date_today;
//    public $reporting_date_tomorrow;
//
//    public $reporting_sql;

//    public $reporting_time;

    public $toDayDateTimeString;
    public $course_date_when;


    protected static function info(Course $course)
    {

//        global $Nav;
        Carbon::setLocale('fr');

//        setlocale(LC_TIME, 'French');


        $course_heure = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . $course->heure); // 1975-05-21 22:00:00

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

        } elseif ((int)$course->validated_mgr == 1) {
            $course->color = "white";
            $course->color2 = "gray";


        } elseif ((int)$course->validated_chauffeur == 1) {
            $course->color = "white";
            $course->color2 = "blue";

        } elseif ((int)$course->drive_mode == 1) {
            $course->color = "white";
            $course->color2 = "violet";
        } elseif ((int)$course->aller_appel == 1 || (int)$course->retour_appel == 1) {

            if ($dif_min <= -5) {
                $course->color = "black";
                $course->color2 = " #ffd6cc";//lightred

            } elseif ($dif_min > -5 && $dif_min <= 30) {
                $course->color = "black";
                $course->color2 = "yellow";
            } else {
                $course->color = "black";
                $course->color2 = " #80ffaa";//lightgreen

            }


        } elseif ($dif_min <= -5) {
            $course->color = "white";
            $course->color2 = "red";

        } elseif ($dif_min > -5 && $dif_min <= 30) {
            $course->color = "white";
            $course->color2 = "orange";

        } elseif ($dif_min > 30 && $dif_min < 60) {
            $course->color = "white";
            $course->color2 = "green";

        } else {
            $course->color = "white";
            $course->color2 = "green";

        }

        $course->style_background = "style='background-color: $course->color2;color:$course->color'";

        return $course;


    }


    protected static function show(Course $course, $view_link = false)
    {

        global $Nav;
        Carbon::setLocale('fr');

        $course = static::info($course);

        $course_heure = Carbon::createFromFormat('Y-m-d H:i', $course->course_date . " " . $course->heure); // 1975-05-21 22:00:00


        $dif_min = Carbon::now()->diffInMinutes($course_heure, false);

        $when = $course_heure->diffForHumans(Carbon::now());

        $output = "";
        $client = TransportClient::find_by_id((int)$course->client_id);
        $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);
        $repeat = str_repeat('&nbsp;', 2);


        $output .= "<li  class='list-group-item $course->color' $course->style_background  >";
        $output .= "<span>";
        $output .= "<strong>";
        $output .= $course->course_date . " " . hr_mn_to_text($course->heure, 'h') . " " . $client->web_view . " "
            . $chauffeur->chauffeur_name . " ($dif_min) " . $when . "-id(" . $course->id . ")";
        $output .= "</strong>";
        $output .= "</span>";


        $output .= "<span class='pull-right text-center' style='text-decoration: none;background-color: white;margin-right: 5%;margin-left: 5%'>";
        $output .= $repeat . "<a href='{$Nav->path_admin}edit_ajax.php?class_name=Course&id={$course->id}'><span > <i class='fa fa-edit'></i></span></a>";
        $output .= $repeat . "<a onclick=\"return confirm('Delete Are you sure?')\" href='{$Nav->path_admin}delete_ajax.php?class_name=Course&id={$course->id}'><span><i class='fa fa-eraser' style='color:red'></i></span></a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=links_for_id'>links</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-20'>-20mn</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-60'>-1h</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=0'>Now</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=1'>+1mn</a>";
        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=5'>+5mn</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=10'>+10mn</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=59'>+1h</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=70'>+70mn</a>";


        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-20'>-20mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-60'>-1h D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=1'>+1mn D</a>";
        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=5'>+5mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=10'>+10mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=59'>+1h D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=70'>+70mn D</a>";

        $output .= $repeat . "<a  href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateValidation'>Chauf</a>";


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


            $output .= "<h1 class='text-center' $course->style_background >$course->toDayDateTimeString  <small>($course->course_date_when}</small></h1>";
            $output .= "<h2 class='text-center' $course->style_background >{$course->heure} id({$course->id}) {$course->pseudo} {$chauffeur->chauffeur_name}</h2>";

            /** @noinspection HtmlUnknownAnchorTarget */
            $output .= "<a class='btn ' $course->style_background role='button' data-toggle='collapse' href='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>
  details Course id({$course->id}) {$course->pseudo}
</a>";

            $output .= "&nbsp;&nbsp;";

            /** @noinspection HtmlUnknownAnchorTarget */
            $output .= "<a class='btn ' $course->style_background role='button' data-toggle='collapse' href='#collapseExample1' aria-expanded='false' aria-controls='collapseExample1'>
  details Client id( {$course->client_id}) {$course->pseudo}
</a>";
            $output .= "&nbsp;&nbsp;";

            $countAdresse = ViewTransportAdresse::count_all_where("WHERE pseudo='$client->pseudo'");

            /** @noinspection HtmlUnknownAnchorTarget */
            $output .= "<a class='btn ' $course->style_background role='button' data-toggle='collapse' href='#collapseExample2' aria-expanded='false' aria-controls='collapseExample2'>
     Adresses <span class='badge'>{$countAdresse}</span>{$course->pseudo}
</a>";

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

            $listAdresse = static::create_form_everywhere($course->id) . ViewTransportAdresse::list_ul($client->pseudo);

            $output .= "<div class='collapse' id='collapseExample2'>
    <div class='well' >
        {$listAdresse}
    </div>
</div>";

            //            $listAdresse = ViewTransportAdresse::data_source($client->pseudo);
//
//
//            $form_class_name=get_called_class();
//            $form_post_page="transport_post.php";
//            $form_page="transport.php";
//            $form_environment='public';
//            $form_submit_value="FormsCourseLinksForId";
//            $form_action="links_for_id";


//            $output .= static::create_form_everywhere($course->id);


            $output .= "<p>Complete link_for_id  form   method update_everywhere and transport post</p>";
            $output .= "<p>View by Chauffeur</p>";
            $output .= "<p>Adresse used by Client </p>";
            $output .= "<p>Validation</p>";
            $output .= "<p>Refresh Ajax</p>";
            $output .= "<p>Authorization</p>";
            $output .= "<p>incomplet</p>";

            $href = "{$Nav->path_admin}edit_ajax.php?class_name=Course&id={$course->id}";
//            $output .= $repeat . "<a href='{$href}'><span > <i class='fa fa-edit'></i></span></a>";
            $output .= button_color('success', "<i class='fa fa-edit'> Edit</i>", $href, '');

            $href = "{$Nav->path_admin}delete_ajax.php?class_name=Course&id={$course->id}";
            $others_a = "onclick=\"return confirm('Delete Are you sure?')\"";
            $output .= button_color('danger', "<i class='fa fa-trash'> Delete</i>", $href, '', $others_a);

//            $toDayDateTimeString
            $output .= "<hr>";
            $output .= "<h4>Mode Oui Non  {$course->toDayDateTimeString}</h4>";


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionAllerRetour=flip";
            $output .= button_color('#333300', "<i class='fa fa-arrows-h'>&nbsp;Aller Retour</i> " . yes_no($course->aller_retour), $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionAllerAppel=flip";
            $output .= button_color('#66ffff', "<i class='fa fa-phone'>&nbsp;Aller sur Appel</i> " . yes_no($course->aller_appel), $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionRetourAppel=flip";
            $output .= button_color('warning', "<i class='fa fa-phone'>&nbsp;Retour Appel</i> " . yes_no($course->retour_appel), $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionDriveMode=flip";
            $output .= button_color('violet', "<i class='fa fa fa-automobile'>&nbsp;Drive Mode</i> " . yes_no($course->drive_mode), $href, '');

            $output .= "<hr>";

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateValidation";
            $output .= button_color('blue', "<i class='fa fa-user-md'>&nbsp;Chauffeur</i> " . yes_no($course->validated_chauffeur), $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionValidatedMgr=flip";
            $output .= button_color('gray', "<i class='fa fa-user'>&nbsp;Valid Mgr </i> " . yes_no($course->validated_mgr), $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionValidatedFinal=flip";
            $output .= button_color('black', "<i class='fa fa-user-md'>&nbsp;Valid Final</i> " . yes_no($course->validated_final), $href, '');


            $output .= "<hr>";
            $output .= "<h4>From Now </h4>";


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-20";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;20mn</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-60";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;1h</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=-0";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;Now</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=1";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1mn</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=5";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;5mn</i>", $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=10";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;10mn</i>", $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=59";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1h</i>", $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromNow=70";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1h10mn(70mn)</i>", $href, '');

            $output .= "<hr>";
            $output .= "<h4>From course {$course->course_date}</h4>";

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-20";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;20mn</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-60";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;1h</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=-4mn";
            $output .= button_color('primary', "<i class='fa fa-minus-circle'>&nbsp;4mn</i>", $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=1";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1mn</i>", $href, '');


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=5";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;5mn</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=29";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;29mn</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=40";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;40mn</i>", $href, '');

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateDefiningTiming&typeActionMinuteFromDate=59";
            $output .= button_color('info', "<i class='fa fa-plus-circle'>&nbsp;1h</i>", $href, '');

            $output .= "<hr>";
            $output .= "Autres information";

//            $output.="<form method='post' action='transport.php?id={$course->id}&class_name=Course'>";
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


            return ibox($output, 12, 'Courses');


        }
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
//            redirect_to($_SERVER['PHP_SELF'] . "?class_name=" . get_called_class());


        }


    }


    public static function updateDefiningTiming()
    {
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
            redirect_to($_SERVER['PHP_SELF'] . "?class_name=" . get_called_class());
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
//        $today = e(now_sql());


        $dt = Carbon::createFromFormat('Y-m-d', $date); // 1975-05-21 22:00:00
        $new_date = $dt->toDateString();

//        echo $new_date;


        /** @noinspection SqlResolve */
        $sql = "SELECT * FROM " . static::$table_name . " WHERE course_date='" . $new_date . "' ORDER BY heure ASC";
//        echo $sql;
        $courses = static::find_by_sql($sql);
//        echo "<pre>";
//var_dump($courses);
//        echo "</pre>";

//        return;

//        $output = "";

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

//        $output = "";

        return static::get_records($courses);

    }

    public static function list($content = '')
    {
        $output = "";

//     echo datetime_to_text(now_sql());
//      $unix_datetime = strtotime($datetime);
        $today = strftime("%A  %e %B, %Y ", time());

        $output .= "<div class='list-group'>";
        $output .= "<li href='#' class='list-group-item'>";
        $output .= "<a href='#'>Hier</a>";
        $output .= "Aujourd'hui le " . $today . " il est " . hr_mn_to_text(now_time(), 'h');
        $output .= "<a href='transport.php?class_name=" . get_called_class() . "&" . "'>demain</a>";
        $output .= "</li>";

        $output .= $content;

//      $output .= "</a>";
        $output .= "</div>";
//      $output .= "</div>";

        return $output;
    }

    public static function list_ul($content = '')
    {
        $output = "";


        Carbon::setLocale('fr');
        $date = static::$date;


        $previousDate = $date->copy()->subDay();
        $nextDate = $date->copy()->addDay();


        $previousDate_fmt = $previousDate->formatLocalized('%A %d %B %Y');
        $date_fmt = $date->formatLocalized('%A %d %B %Y');
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

        $previous = "<i class=\"fa fa-caret-square-o-left\"></i>";
        $next = "<i class=\"fa fa-caret-square-o-right\"></i>";


        $output .= "<h1 class='text-center'>";


        $href = "transport.php?class_name=" . get_called_class() . "&course_date=$previousDate_str";
        $output .= "<a href='$href'> $previous </a>";

        $href = "transport.php?class_name=" . get_called_class() . "&course_date=today";
        $link = "<a href='$href'>$date_fmt</a>";

        $output .= "Courses $header du " . $link;

        $href = "transport.php?class_name=" . get_called_class() . "&course_date=$nextDate_str";
        $output .= "<a href='$href'> $next </a>";
        $output .= "</h1>";

        $output .= "<ul class='list-group'>";
        $output .= "<li href='#' class='list-group-item'>";
//var_dump($output);

        $output .= $content;
//        var_dump($content);

        $output .= "</ul>";
        $output .= "</div>";

        return $output;
    }

    public static function main_display()
    {


        if (isset($_GET['course_date'])) {
            if ($_GET['course_date'] == "tomorrow") {
                static::$date = Carbon::tomorrow();
                return static::get_tomorrow();
            } elseif ($_GET['course_date'] == "yesterday") {
                static::$date = Carbon::yesterday();
                return static::get_yesterday();
            } elseif ($_GET['course_date'] == "today") {
                static::$date = Carbon::today();
                return static::get_today();
            } else {
                $date = $_GET['course_date'];


                static::$date = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);

                return static::get_date($date);
            }

        } else {
            static::$date = Carbon::today();;
            return static::get_today();

        }
    }


    public static function view_by_Chauffeur()
    {
//        $date=static::$date;
//        $dt = Carbon::createFromFormat('Y-m-d', $date); // 1975-05-21 22:00:00
//        $new_date = $dt->toDateString();

        $date = Carbon::today();
        $new_date = $date->toDateString();

        array_push(static::$db_fields, 'chauffeur_name');

        /** @noinspection SqlResolve */
        $sql = "SELECT DISTINCT chauffeur_id FROM " . static::$table_name . " WHERE course_date='" . $new_date . "' ORDER BY chauffeur_id ASC";

        $array_chauffeur_sql = [];
//        $a
        $coursechauffeurs = static::find_by_sql($sql);

        foreach ($coursechauffeurs as $coursechauffeur) {
            $chauffeur = TransportChauffeur::find_by_id($coursechauffeur->chauffeur_id);

            $name = str_replace(" ", "_", $chauffeur->chauffeur_name);

//            echo "jjjjjjjj<hr>";
//            echo remove_accents($chauffeur->chauffeur_name);
//            return;
//            echo "<hr>";
//       echo     $name=str_replace(" ", "_", remove_accents($chauffeur->chauffeur_name));
            array_push(static::$db_fields, $name);
//            (CASE WHEN (T2.chauffeur_name = 'PABLO ARZA') THEN T1.id END) AS "André Viera"
//echo $x="(CASE WHEN (T2.chauffeur_name ='{$chauffeur->name}') THEN T1.id END) AS '{$name}'";
//            echo "<hr>";

//            return;
            array_push($array_chauffeur_sql, "(CASE WHEN (T2.chauffeur_name ='{$chauffeur->chauffeur_name}') THEN T1.id END) AS '{$name}'");
        }

        echo "<pre>";
//    print_r($array_chauffeur_sql);
        if (empty($array_chauffeur_sql)) {
            $extension_sql = "";
        } else {
            echo $extension_sql = "," . join(",", $array_chauffeur_sql);

        }


        echo "<hr>";
//        return;
        $sql = "SELECT  T1.* , T2.chauffeur_name  {$extension_sql}
FROM
  transport_programming T1
  INNER JOIN transport_chauffeurs T2 ON T1.chauffeur_id = T2.id";

        $courses = static::find_by_sql($sql);

        echo ($sql) . "<hr>";

//        var_dump($courses);

//        return;
        foreach ($courses as $course) {
            foreach (static::$db_fields as $field) {
                echo " $field - " . $course->$field . "<br>";
//                var_dump($course);
            }
//            echo " $f <br>";
        }

        echo "</pre>";


    }


    public static function update_everywhere($submit_value = "FormsCourseLinksForId", $data = null)
    {

        global $session;

        if (is_null($submit_value)) {
            die('ouchhhhhhhhhhhhh!');
        };

        if (request_is_post() && request_is_same_domain()) {
            if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
                $message = "Sorry, request was not valid.";
            } else {
                if (isset($_POST['submit']) && $_POST['submit'] == $submit_value) {

                    if (is_null($data)) {
                        $data = "ajaxXXX";
                    }


                    if (isset($_POST['id']) && isset($_POST['class_name'])) {
                        $class_name = trim($_POST['class_name']);
                        $id = trim($_POST['id']);
                        $action = trim($_POST['action']);
                        $page = trim($_POST['page']);
                        $env = trim($_POST['environment']);

                        ($env == 'public') ? $path = MY_URL_PUBLIC : $path = MY_URL_ADMIN;

                        $url = clean_query_string($path . $page . "?class_name=" . u($class_name) . "?id=" . u($id) . "?action=" . u($action));

//                        echo $url;
//                        return;
                        $new_item = $class_name::find_by_id((int)$id);
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

//                                    redirect_to(static::$page_manage);
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
        $listAdresse = ViewTransportAdresse::data_source($client->pseudo);

//        $form_class_name=get_called_class();
        $form_class_name = get_called_class();
        $form_post_page = "transport_post.php";
        $form_page = "transport.php";
        $form_environment = 'public';
        $form_submit_value = "FormsCourseLinksForId";
        $form_action = "links_for_id";


        $output = "";


        $output .= "<div class='ibox-content'>
    <form role='form' class='form-inline' 
     method='post' action='$form_post_page?class_name=$form_class_name'
    >
        <div class='form-group'>
            <label for='departCourseId{$course->id}' class='sr-only'>Départ</label>
            <input type='text' placeholder='Départ' name='depart' id='departCourseId{$course->id}' value='{$course->depart}'
                   class='form-control' data-provide='typeahead' data-source='{$listAdresse}'>
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

}
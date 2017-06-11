<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 5/20/2017
 * Time: 7:52 PM
 */
class CourseMobile extends Course
{

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


//        $output .= "<li  class='list-group-item $course->color' $course->style_background  >";
//        $output .= "<span>";
//        $output .= "<strong>";
//        $output .= "<a  style='color: inherit;' href='{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=links_for_id''>";
//        $output .= "<span  class='hidden-sm hidden-xs'>".$course->course_date . "</span>"
//            . hr_mn_to_text($course->heure, 'h')
//            . " "
//            . $client->web_view . " "
//            . $chauffeur->chauffeur_name
//            . "<span  class='hidden-sm hidden-xs'> ($dif_min)</span> "
//            . $when
//            . "<span  class='hidden-sm hidden-xs'>- id(" . $course->id . ")</span>"
//        ;
//        $output .= "</a>";
//        $output .= "</strong>";
//        $output .= "</span>";
//
//
//        $output .= "</li>";

        $href = "tcourse.php?class_name=" . get_called_class() . "&id={$course->id}&action=links_for_id ";

        $output .= "<li><a href='$href'  $course->style_background  rel='external'>
                            <h2>{$course->pseudo}</h2>
                            <p><strong>{$chauffeur->chauffeur_name}</strong></p>
                            <p>DE:{$course->depart} A:{$course->arrivee}&nbsp;&nbsp; $when</p>
                                <p class='ui-li-aside'><strong>{$course->heure}</strong></p>
                            </a></li>";

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

            if (!$course) {
                redirect_to('index.php');
            }
            $course = static::info($course);


            $client = TransportClient::find_by_id((int)$course->client_id);
            $chauffeur = TransportChauffeur::find_by_id((int)$course->chauffeur_id);

            $href = "index.php?class_name=Course&course_date=" . u($course->course_date) . "#pageListCourse";
            $course_date_when = "<a href='$href' rel='external' style='color: $course->color'>{$course->course_date_when}</a>";

            $dt_today = Carbon::today()->toDateString();

            $href = "index.php?class_name=Course&course_date=" . u($course->course_date) . "#pageListCourse";

            if ($dt_today == $course->course_date) {

                $head_link = "&nbsp;&nbsp;<a href='$href'><button class='ui-btn'>Courses</button></a>";

            } else {
                $head_link = "&nbsp;&nbsp;<a href='$href'><button class='ui-btn'>Courses</button></a>";
                $href1 = "transport.php?class_name=Course&course_date=" . u($dt_today);
                $head_link .= "&nbsp;&nbsp;<a href='$href1'><button class='ui-btn'>today</button></a>";


            }


            $output .= "creation course au dela d'aujourd'hui chauffeur autre
            chauffeur peut creer ou s'attribuer une course à lui à autres mais plus changer attribuer un autre";

            $output .= "<div style='text-align: center'>";
            $output .= "<h1 $course->style_background >$course->toDayDateTimeString  <small>$course_date_when  $course->colorinfotxt</small></h1>";

            $output .= "<h2  $course->style_background >"
                . "<span>{$course->heure} id({$course->id})</span> {$course->pseudo} {$chauffeur->chauffeur_name}</h2>";

            $output .= "</div>";
            $countAdresse = ViewTransportAdresse::count_all_where("WHERE pseudo='$client->pseudo'");


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


            $listAdresse = static::create_form_everywhere($course->id) . ViewTransportAdresse::list_ul_mobile($client->pseudo, $course);


            $output .= " <div data-role='collapsible'>";
            $output .= "<h3>Action Course</h3>";

            $output .= "<h4 >Mode Oui Non  {$course->toDayDateTimeString}</h4>";

            $output .= "<nav data-role='navbar'><ul>";

            $href = "{$Nav->path_public}post_course.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionAllerRetour=flip";
            $style = "background-color:#333300; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-plus ui-btn-icon-top'>Aller Retour " . yes_no($course->aller_retour) . "</a></li>";

            $href = "{$Nav->path_public}post_course.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionAllerAppel=flip";
            $style = "background-color:#66ffff; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-plus ui-btn-icon-top'>Aller sur Appel " . yes_no($course->aller_appel) . "</a></li>";


            $href = "{$Nav->path_public}post_course.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionRetourAppel=flip";
            $style = "background-color:orange; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-plus ui-btn-icon-top'>Retour appel  " . yes_no($course->retour_appel) . "</a></li>";


            $href = "{$Nav->path_public}post_course.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionDriveMode=flip";
            $style = "background-color:violet; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-plus ui-btn-icon-top'>Drive Mode  " . yes_no($course->drive_mode) . "</a></li>";

            $output .= "</ul></nav>";
            $output .= "</div>"; // end of Action


            $output .= "<div data-role='collapsibleset' data-theme='a' data-content-theme='a'>";

            $output .= " <div data-role='collapsible'>";
            $output .= "<h3>Details Course</h3>";
            $output .= "<p><span>details  id({$course->id}) {$course->pseudo}</span></p>";
            $output .= "<div>{$listCourse}</div>";
            $output .= "</div>";

            $output .= " <div data-role='collapsible'>";
            $output .= "<h3>Details Client</h3>";
            $output .= "<p><span> details  id( {$course->client_id}) {$course->pseudo}</span> </p>";
            $output .= "<div>{$listClient}</div>";
            $output .= "</div>";

            $output .= " <div data-role='collapsible'>";
            $output .= "<h3>Adresses<span class='ui-li-count' $course->style_background >{$countAdresse}</span></h3>";
            if (isset($_GET['collapse']) && isset($_GET['collapse']) == "no") {
                $in = "in";
            } else {
                $in = "";
            };

            $output .= "<div>{$listAdresse}</div>";
            unset($_GET['collapse']);

            $output .= "</div>";


            $output .= " <div data-role='collapsible'>";
            $output .= "<h3>Edition</h3>";

            $output .= "<nav data-role='navbar'>
                        <ul>";

            $href = "{$Nav->path_admin}edit_ajax.php?class_name=CourseMobile&id={$course->id}";
            $style = "background-color:blue; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-edit ui-btn-icon-top'>Edit</a></li>";

            if (User::is_allow_access()) {
                $href = "{$Nav->path_admin}delete_ajax.php?class_name=CourseMobile&id={$course->id}?course_date={$course->course_date}";
                $others_a = "onclick=\"return confirm('Delete Are you sure?')\"";
                $style = "background-color:red; color:white;";
                $output .= "<li><a href='$href' style='$style'  $others_a class='ui-btn ui-icon-delete ui-btn-icon-top button-delete-form'>Delete</a></li>";

            }

            $output .= "</ul>
                        </nav>";

            $output .= "</div>";


            $output .= "</div>";


//            $output .= "<hr>";

            $output .= " <div data-role='collapsible'>";
            $output .= "<h3>Validation</h3>";


            $output .= "<nav data-role='navbar'><ul>";

            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateValidation&redirectpage=tcourse";
            $style = "background-color:blue; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-plus ui-btn-icon-top'>Chauffeur  " . yes_no($course->validated_chauffeur) . "</a></li>";


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionValidatedMgr=flip";
            $style = "background-color:gray; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-plus ui-btn-icon-top'>Valid Mgr " . yes_no($course->validated_mgr) . "</a></li>";


            $href = "{$Nav->path_public}transport.php?class_name=" . get_called_class() . "&id={$course->id}&action=updateAppel&typeActionValidatedFinal=flip";
            $style = "background-color:black; color:white;";
            $output .= "<li><a href='$href' style='$style'  class='ui-btn ui-icon-plus ui-btn-icon-top'>Valid Final " . yes_no($course->validated_final) . "</a></li>";

            $output .= "</ul></nav>";

            $output .= "</div>";

            $output .= " <div data-role='collapsible'>";
            $output .= "<h3>Ajouter temps</h3>";

            $output .= static::create_form_change_time($course);
            $output .= "</div>";
        }

        return "<div>" . $output . "</div>";

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


        $previous = " class='ui-btn ui-icon-arrow-l ui-btn-icon-notext'";
        $next = " class='ui-btn ui-icon-arrow-r ui-btn-icon-right ui-btn-icon-notext'";

        $previousData = " class='ui-btn ui-icon-carat-l ui-btn-icon-notext'";
        $nextData = " class='ui-btn ui-icon-carat-r ui-btn-icon-notext'";


        if ($previousDateData_str) {
            $href = "index.php?class_name=" . get_called_class() . "&course_date=$previousDate_str#pageListCourse";
            $previous = "<a href='$href' $previous rel='external' >previous</a>";

            $href = "index.php?class_name=" . get_called_class() . "&course_date=$previousDateData_str#pageListCourse";
            $previousData = "<a href='$href' $previousData rel='external' >previousData</a>";

        } else {

            $previous = "<a  class='ui-btn ' href='#'></a>";
            $previousData = "<a class='' href='#'></a>";


        }

        if ($nextDateData_str) {

            $href = "index.php?class_name=" . get_called_class() . "&course_date=$nextDate_str#pageListCourse";
            $next = "<a href='$href'  rel='external' $next >next</a>";

            $href = "index.php?class_name=" . get_called_class() . "&course_date=$nextDateData_str#pageListCourse";
            $nextData = "<a href='$href' $nextData rel='external' >nextData</a>";
        } else {
            $next = "<a  class='ui-hidden-accessible' href='#'>next</a>";
            $nextData = "<a class='ui-hidden-accessible' href='#'>nextData</a>";

        }


        $href = "index.php?class_name=" . get_called_class() . "&course_date=today#pageListCourse";

        $link2 = "<a href='$href'   rel='external' >$date_fmt2</a>";


        $output .= "<header data-role='header'>";
        $output .= "<a href='index.php' data-icon='arrow-l' data-iconpos='notext' data-direction='reverse' data-rel='back' data-theme='b' >Back</a>";
        $output .= "<h1>Course</h1>";

        $output .= "<a href=\"index.php\" data-icon=\"home\" data-iconpos=\"notext\" data-direction=\"reverse\" rel=\"external\" class=\"ui-btn-right\" data-theme=\"b\">Home</a>";


        $output .= "<nav data-role='navbar'>";
        $output .= " <ul>";
        $output .= $previousData;
        $output .= $previous;
        $output .= $link2;
        $output .= $next;
        $output .= $nextData;

        $output .= " </ul>
            </nav>
            </header>";
        $output .= "";


//        $output .=;
//        $output .= "<span class='hidden-sm hidden-xs' style='color: inherit' >$previous Courses $header du </span>";
//        $output .= "<span class='hidden-sm hidden-xs'>". $link.$next."</span>";
//        $output.=;

//        $output .= "<span class='visible-sm visible-xs' style='font-size:smaller'>". $previous. $link2.$next."</span>";


//        $output .= "</h1>";

        $output .= "<ul data-role='listview' data-inset='true' data-filter=\"true\">";
//        $output .= "<li href='#' class='list-group-item'>";
//var_dump($output);


        $output .= $content;
//        var_dump($content);

        $output .= "</ul>";
//        $output .= "</div>"; //todo check the begining div if exists

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
                            $page = static::$page_manage;
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
//        $listAdresse = ViewTransportAdresse::data_source($client->pseudo);

        echo $listAdresse = ViewTransportAdresse::json($client->pseudo);


//        $form_class_name=get_called_class();
        $form_class_name = get_called_class();
        $form_post_page = "transport_post.php";
        $form_page = "transport.php";
        $form_environment = 'public';
        $form_submit_value = "FormsCourseLinksForId";
        $form_action = "links_for_id";


        $output = "";


        $output .= "<div class='white-bg'>
    <form role='form' method='post' action='$form_post_page?class_name=$form_class_name'>
    
                 <div data-role='fieldcontain'>
                    <label for='departCourseId{$course->id}' >Départ</label>
                    <input type='text' name='depart' id='departCourseId{$course->id}'   value='{$course->depart}' />
                </div>
                
                 <div data-role='fieldcontain'>
                    <label for='arriveeCourseId{$course->id}'  >Arrivée</label>
                    <input type='text' name='arrivee' id='arriveeCourseId{$course->id}'    value='{$course->arrivee}'/>
                </div>


          <div  class='ui-hidden-accessible'>
            <label for='idCourseId{$course->id}' class='sr-only'>id</label>
            <input type='text'  name='id'  id='idCourseId{$course->id}'  value='{$course->id}'  >
        </div>
            <div  class='ui-hidden-accessible'>
            <label for='class_nameCourseId{$course->id}' class='sr-only'>class_name</label>
            <input type='text'  name='class_name'  id='class_nameCourseId{$course->id}'  value='$form_class_name'   >
        </div>
        <div  class='ui-hidden-accessible' >
            <label for='actionCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text'  name='action'  id='actionCourseId{$course->id}'  value='$form_action' >
        </div>
        <div  class='ui-hidden-accessible'>
            <label for='pageforCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' name='page'  id='pageforCourseId{$course->id}'  value='$form_page' >
        </div>
           <div  class='ui-hidden-accessible'>
            <label for='environmentforCourseId{$course->id}' class='sr-only'>action</label>
            <input type='text' placeholder='' name='environment'  id='environmentforCourseId{$course->id}'  value='$form_environment' >
        </div>";
        $output .= csrf_token_tag();

        $output .= "
    <fieldset class='ui-grid-a'>
                    <div class='ui-block-a'>
                        <button type='reset'>Cancel</button>
                    </div>
                    <div class='ui-block-b'>
                        <button type='submit' name='submit' id='sbm' value='$form_submit_value'>Submit</button>
                    </div>
    </fieldset>
    </form>
</div>";

        return $output;

    }

    public static function create_form_change_time(Course $course)
    {
        $output = "<hr>";

        $output .= "<form method='get' action='post_course.php'>
                      <fieldset class='ui-field-contain'>
                        <label for='typeActionMinuteFromNowadd'   class='ui-hidden-accessible'>Enter a Number</label>
                        <input  data-theme='b' type='range' name='typeActionMinuteFromNow' id='typeActionMinuteFromNowadd' value='30' min='-100' max='100' />
                       </fieldset>
                    ";

        $output .= "<div  class='ui-hidden-accessible'>
            <label for='typeActionMinuteFromNowId{$course->id}' class='sr-only'>id</label>
            <input type='text'  name='id'  id='typeActionMinuteFromNowId{$course->id}'  value='{$course->id}'>
                   
            <label for='typeActionMinuteFromNowaction{$course->id}' >id</label>
            <input type='text'  name='action'  id='typeActionMinuteFromNowaction{$course->id}'  value='updateDefiningTiming'>
            
            <label for='idCourseId{$course->id}'>id</label>
            <input type='text'  name='id'  id='typeActionMinuteFromNowId{$course->id}'  value='{$course->id}'>
       
            <label for='typeActionMinuteFromNowclass_name{$course->id}'>id</label>
            <input type='text'  name='class_name'  id='typeActionMinuteFromNowclass_name{$course->id}'  
            value='" . get_called_class() . "'>
                </div>
                  
             <button type='submit' name='submit' id='typeActionMinuteFromNowsubmit{$course->id}' class='ui-btn ui-btn-b ui-mini updateDefiningTiming' value='submit'>Ajouter + maintenant " . now_time() . "  </button>

                 
                       ";

        $output .= "</form>";


        $output .= "<form method='get' action=''>
                      <fieldset class='ui-field-contain'>
                        <label for='typeActionMinuteFromDate'   class='ui-hidden-accessible'>Enter a Number</label>
                        <input type='range' name='typeActionMinuteFromDate' id='typeActionMinuteFromDate' value='30' min='-100' max='1000' />
                      
                      </fieldset>
                    ";

        $output .= "<div  class='ui-hidden-accessible'>
            <label for='typeActionMinuteFromDateId{$course->id}' class='sr-only'>id</label>
            <input type='text'  name='id'  id='typeActionMinuteFromDateId{$course->id}'  value='{$course->id}'>
                       
            <label for='typeActionMinuteFromDateaction{$course->id}' >id</label>
            <input type='text'  name='action'  id='typeActionMinuteFromDateaction{$course->id}'  value='updateDefiningTiming'>
            
            <label for='idCourseId{$course->id}'>id</label>
            <input type='text'  name='id'  id='typeActionMinuteFromNowId{$course->id}'  value='{$course->id}'>
       
            <label for='typeActionMinuteFromDateclass_name{$course->id}'>id</label>
            <input type='text'  name='class_name'  id='typeActionMinuteFromDateclass_name{$course->id}'  
            value='" . get_called_class() . "'>
                </div>
                  
             <button type='submit' name='submit' id='typeActionMinuteFromDatesubmit{$course->id}' class='ui-btn ui-mini' value='submit'>+ de course prévue à {$course->toDayDateTimeString}</button>

                 
                       ";

        $output .= "</form>";

        return $output;

    }


}
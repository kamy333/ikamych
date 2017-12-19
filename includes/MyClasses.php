<?php
/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12/9/2016
 * Time: 3:02 PM
 */
//todo complete
class MyClasses
{

    public static $all_class = array(
        'HeurePresence', 'Note', 'ToDoList', 'Message', 'Chat', 'ChatFriend', 'Notification',
        'User', 'UserType', 'Article',
        'Links', 'LinksCategory', 'Category1', 'Category2',
        'Project', 'Client', 'InvoiceActual', 'Category', 'InvoiceEstimate', 'Currency',
        'MyCigarette',
        'MyExpense', 'MyExpensePerson', 'MyExpenseType', 'MyHouseExpense',
        'MyHouseExpenseType',
        'FailedLogin', 'BlacklistIp',
        'TransportChauffeur',
        'TransportClient',
        'TransportProgramming',
        'TransportProgrammingModel',
        'TransportType',
        'ViewTransportModel',
        "ViewTransportModelVisibleNo",
        "ViewTransportModelVisibleYes",
        'ViewTransportModelPivot', //parent
        "ViewTransportModelPivotNo",
        "ViewTransportModelPivotYes",
        "ViewTransportSummaryCourseDateProgram",
        "ViewTransportModelByChauffeur",
        "ViewTransportAdresse",

        'DataBaseClient', 'DatabaseCourse', 'DatabaseCourse_Programe',
        'DataBaseFacturation', 'DatabasePaiement',
        'T_Adresse', 'T_Aller_Retour', 'T_Chauffeur',
        'T_Frequence_Facturation', 'T_Genre', 'T_Heure', 'T_Pays', 'T_Prix_Course', 'T_Type_Transport', 'T_Ville', 'T_Type_Facturation',


        "Model",
        "Course",
        "CourseByChauffeur",
        "CourseForm",
        "CourseMobile",
        "CourseListePatient",
        "CourseSang",
        "CourseStandard",


        'Comment', 'Photos');


    public static $short_class = [
//        'HeurePresence'=>"'HeurePresence'",
        "ToDo" => "ToDoList", "Message" => "Chat", "Chat" => "ChatFriend",
//        "User"=>"User","UserType"=>"UserType",
//        ""=>"",""=>"",""=>"",""=>"",""=>"",""=>"",
        "Course" => "TransportProgramming",
        "Model" => "TransportProgrammingModel",
        "Chauffeur" => "TransportChauffeur",
        "TransportType" => "TransportType",
        "tClient" => "TransportClient",
        "ViewModel" => "ViewTransportModel",
        "ViewVisibleNo" => "ViewTransportModelVisibleNo",
        "ViewVisibleYes" => "ViewTransportModelVisibleYes",
        "ViewPivot" => "ViewTransportModelPivot",
        "ViewPivotNo" => "ViewTransportModelPivotNo",
        "ViewPivotYes" => "ViewTransportModelPivotYes",
        "ViewSummary" => "ViewTransportSummaryCourseDateProgram",
        "ViewModelByChauffeur" => "ViewTransportModelByChauffeur",


//        "Note"=>"Note",


    ];

    public static function find_short_class($short_cl)
    {

        if (array_key_exists($short_cl, static::$short_class)) {
            return static::$short_class[$short_cl];
        } else {
            return "";
        }

    }

    public static $disable_db_classes = array(
//        'User',
        'Comment', 'InvoiceEstimate', 'Photos',
//        'FailedLogin','BlacklistIp',
//        'TransportChauffeur',
//        'TransportClient',
//        'TransportProgramming',
//        'TransportProgrammingModel',
//        'TransportType',
        '');


    public static $helpers_class = array('DatabaseObject', 'Database', 'SmartNav', 'Pagination', 'Session', 'Table', 'Form', 'FormValidation', 'Modal', 'MyPHPMailer');

    public static $menu_data_manage = [];


    public static function redirect_disable_class()
    {
        global $session;

        static::short_class_check();
        if (!isset($_GET['class_name'])) {
            $session->message('Sorry that was an invalid request');
            redirect_to('index.php');

        }

        if (isset($_GET['class_name']) && !in_array($_GET['class_name'], static::$all_class)) {
            $session->message('Sorry that was an invalid request ' . $_GET['class_name']);
            redirect_to('index.php');

        }

        if (isset($_GET['class_name']) && in_array($_GET['class_name'], static::$disable_db_classes)) {
            $session->message('Sorry request for ' . $_GET['class_name'] . ' not accessible from here');
            redirect_to('index.php');

        }

        if (class_exists($_GET['class_name'])) {
            return $_GET['class_name'];
        } else {
            $session->message('Sorry request for ' . $_GET['class_name'] . ' not a class . Review code');
            redirect_to('index.php');
        }


    }


    public static function short_class_check()
    {
        if (isset($_GET["cl"])) {
            $class = $_GET["cl"];
            if (array_key_exists($_GET["cl"], static::$short_class)) {
                $_GET['class_name'] = static::$short_class[$_GET["cl"]];
//                echo "The class Name " .$_GET['class_name'];
//             if( class_exists ( $_GET['class_name'] )) {
//                 echo "class exist ".$_GET['class_name'];
//             } else {
//                 echo "class NOT exist ".$_GET['class_name'];
//             }

            }

        }


    }


    public static function find_get_class_name()
    {
        if (isset($_GET["cl"])) {
            if (array_key_exists($_GET["cl"], static::$short_class)) {
                $class_name = static::$short_class[$_GET["cl"]];
                return $class_name;
            }

        }

        if (isset($_GET["class_name"])) {
            $class_name = $_GET["class_name"];
            return $class_name;


        }


        return false;

    }


    public static function require_file()
    {

        foreach (self::$class_access as $file) {
            require_once(LIB_PATH . DS . 'transport' . DS . "$file.php");
        }

        foreach (self::$class_transmed as $file) {
            require_once(LIB_PATH . DS . 'transport' . DS . "$file.php");
        }


    }

    public static $transmed_class = [
        'TransportChauffeur',
        'TransportClient',
        'TransportProgramming',
        'TransportProgrammingModel',
        'TransportType',
        "Course",
        "Model",
        "ViewTransportAdresse",
        "CourseByChauffeur",
        "CourseForm",
        "CourseMobile",
        "CourseListePatient",
        "CourseSang",
        "CourseStandard",
        "Chat", "ChatFriend", "Currency", "Message", "Note", "Notification", "ToDoList"
    ];

    public static $class_access = [
        'DataBaseClient', 'DatabaseCourse', 'DatabaseCourse_Programe',
        'DataBaseFacturation', 'DatabasePaiement',
        'T_Adresse', 'T_Aller_Retour', 'T_Chauffeur',
        'T_Frequence_Facturation', 'T_Genre', 'T_Heure', 'T_Pays', 'T_Prix_Course', 'T_Type_Facturation', 'T_Type_Transport', 'T_Ville'
    ];

    public static $class_transmed = [
        'TransportChauffeur', 'TransportClient', 'TransportType', 'TransportProgramming', 'TransportProgrammingModel', 'ViewTransportModel', 'ViewTransportModel', 'ViewTransportModelVisibleNo', 'ViewTransportModelVisibleYes', 'ViewTransportModelPivot', 'ViewTransportModelPivotNo', 'ViewTransportModelPivotYes', 'ViewTransportSummaryCourseDateProgram', 'ViewTransportModelByChauffeur',
        "Course",
        "Model",
        "ViewTransportAdresse",
        "CourseByChauffeur",
        "CourseForm",
        "CourseMobile",
        "CourseListePatient",
        "CourseSang",
        "CourseStandard",
    ];


}
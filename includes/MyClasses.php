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
        'SetUp','HeurePresence', 'Note', 'ToDoList', 'Message', 'Chat', 'ChatFriend', 'Notification',
        'User', 'UserType', 'Article', 'ArticleSubject', 'Book', 'BookCategory',
        'Links', 'LinksCategory', 'Category1', 'Category2',
        'Project', 'InvoiceActual', 'InvoiceSend', 'Category', 'InvoiceEstimate', 'Currency',
        'MyCigarette',
        'Calendar',
        'Client',
        'MyExpense', 'MyExpenseMum', 'MyExpenseMumPost','MyExpenseCaroline','MyLoan', 'MyExpensePerson', 'MyExpenseType', 'MyHouseExpense',
        'MyHouseExpenseType',
        'FailedLogin', 'BlacklistIp',


        'Comment', 'Photos');


    public static $short_class = [
//        'HeurePresence'=>"'HeurePresence'",
        "ToDo" => "ToDoList", "Message" => "Chat", "Chat" => "ChatFriend",
//        "User"=>"User","UserType"=>"UserType",
//        ""=>"",""=>"",""=>"",""=>"",""=>"",""=>"",
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
        '');


    public static $helpers_class = array('DatabaseObject', 'Database', 'SmartNav', 'Pagination', 'Session', 'Table', 'Form', 'FormValidation', 'Modal', 'MyPHPMailer');

    public static $menu_data_manage = [];


    public static function redirect_disable_class()
    {
        return static::allowed_class_from_request();
    }

    public static function allowed_class_from_request($default_class = null)
    {
        static::short_class_check();
        $class_name = $_GET['class_name'] ?? $default_class;

        return static::allowed_class($class_name);
    }

    public static function allowed_class_from_post($key = 'class_name')
    {
        $class_name = $_POST[$key] ?? null;

        return static::allowed_class($class_name);
    }

    public static function allowed_class($class_name)
    {
        $class_name = is_string($class_name) ? trim(urldecode($class_name)) : '';

        if ($class_name === '') {
            static::reject_class_request('Sorry that was an invalid request.');
        }

        if (!in_array($class_name, static::$all_class, true)) {
            static::reject_class_request('Sorry, "' . $class_name . '" is not an allowed admin class.');
        }

        if (in_array($class_name, static::$disable_db_classes, true)) {
            static::reject_class_request('Sorry, "' . $class_name . '" is not accessible from here.');
        }

        if (class_exists($class_name)) {
            return $class_name;
        }

        static::reject_class_request('Sorry, "' . $class_name . '" is not available. Please check the link and try again.');
    }

    private static function reject_class_request($message)
    {
        global $session;

        $session->message($message);

        if (function_exists('is_ajax_request') && is_ajax_request()) {
            http_response_code(400);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array('errors' => $message));
            exit;
        }

        redirect_to('/public/admin/index.php');
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

    }

    public static $class_access = [];

}

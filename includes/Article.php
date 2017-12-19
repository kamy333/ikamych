<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class Article extends DatabaseObject
{

    public static $fields_numeric = array('id', 'likes',);
    public static $get_form_element = array('subject', 'link', 'photo', 'article', 'likes', 'comment', 'input_date');
    public static $get_form_element_others = array();
    public static $form_default_value = array(
        "input_date" => 'nowtime()',

    );
    public static $db_field_search = array('search_all', 'chat', 'download_csv');
    public static $form_user_id;
    public static $page_name = "Article";
    public static $page_manage = "manage_article.php";
    public static $page_new = "new_article.php";
    public static $page_edit = "edit_article.php";
    public static $page_delete = "delete_article.php";
    protected static $table_name = "article";
    protected static $db_fields = array('id', 'subject', 'link', 'photo', 'article', 'likes', 'comment', 'input_date');
    protected static $required_fields = array('subject', 'link', 'photo', 'article', 'likes', 'comment', 'input_date');
    protected static $db_fields_table_display_short = array('id', 'subject', 'link', 'photo', 'article', 'likes', 'comment', 'input_date');
    protected static $db_fields_table_display_full = array('id', 'subject', 'link', 'photo', 'article', 'likes', 'comment', 'input_date');
    protected static $form_properties = array(
        "subject" => array("type" => "text",
            "name" => 'subject',
            "label_text" => "Subject",
            "placeholder" => "Subject",
            "required" => true,
        ),
        "photo" => array("type" => "file",
            "name" => 'photo',
            "label_text" => "photo",
            "required" => false,
            "autocomplete" => "off",

        ),
        "link" => array("type" => "url",
            "name" => 'web_address',
            "label_text" => "Link",
            "placeholder" => "Website Address",
            "required" => true,
        ),
        "likes" => array("type" => "number",
            "name" => 'likes',
            "label_text" => "Likes",
            'min' => 0,
            "placeholder" => "Likes",
            "required" => true,
        ),
        "article" => array("type" => "textarea",
            "name" => 'message',
            "label_text" => "Article",
            "placeholder" => "Article here",
            "required" => true,
        ),

        "input_date" => array("type" => "datetime",
            "name" => 'input_date',
            "label_text" => "DateTime",
            "placeholder" => "current date",
            "required" => true,
        ),

    );
    protected static $form_properties_search = array(
        "search_all" => array("type" => "text",
            "name" => 'search_all',
            "label_text" => "",
            "placeholder" => "Search all",
            "required" => false,
        ),
        "download_csv" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "non",
                    "value" => "No",
                    "id" => "visible_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "oui",
                    "value" => "Yes",
                    "id" => "visible_yes",
                    "default" => true)),
        ),
        "id" => array("type" => "number",
            "name" => 'id',
            "id" => "search_id",
            "label_text" => "",
            'min' => 0,
            "placeholder" => "ID",
            "required" => false,
        ),
        "subject" => array("type" => "select",
            "name" => 'subject',
            "id" => "search_subject",
            "class" => "Article",
            "label_text" => "",
            "select_option_text" => 'Subject',
            'field_option_0' => "subject",
            'field_option_1' => "subject",
            "required" => false,
        ),
        "to_user_id" => array("type" => "select",
            "name" => 'to_user_id',
            "id" => "search_to_user_id",
            "class" => "User",
            "label_text" => "",
            "select_option_text" => 'Username',
            'field_option_0' => "username",
            'field_option_1' => "username",
            "required" => false,
        ),


    );
    public $id;
    public $subject;
    public $link;
    public $photo;
    public $article;
    public $likes;
    public $comment;


    public static function table_nav_additional()
    {
        $output = "</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . static::$page_new . "\">Add Article Ajax" . " </a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . "new_ajax.php?class_name=Article" . "\">New Article Ajax " . " </a></a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . LinksCategory::$page_manage . "\">View Category " . " </a><span>&nbsp;</span>";
//        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpensePerson::$page_manage . "\">View Person " . " </a>";
        return $output;
    }

//    public function set_up_display(){
//        global $session;
//        $this->user_id=$session->user_id;
//    }


    protected static function set_form_default_value()
    {
        global $session;
//        static::$form_default_value["user_id"] = $session->user_id;

    }

    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
        return $valid;


    }


    public function set_up_display()
    {


    }


}
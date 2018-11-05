<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 10/6/2015
 * Time: 1:20 AM
 */
class ArticleSubject extends DatabaseObject
{

    protected static $table_name = "article_subject";

    protected static $db_fields = array('id', 'subject', 'rank');

    public static $required_fields = array('subject',);

    protected static $db_fields_table_display_short = array('id', 'subject', 'rank');

    protected static $db_fields_table_display_full = array('id', 'subject', 'rank');

    protected static $db_field_exclude_table_display_sort = null;

    public static $fields_numeric = array('id', 'rank');

    public static $get_form_element = array('subject', 'rank');
    public static $get_form_element_others = array();

    public static $form_default_value = array(
        "input_date" => 'nowtime()',
        "subject" => "joke",
        "rank" => 1,


    );

    protected static $form_properties = array(
        "subject" => array("type" => "text",
            "name" => 'subject',
            "label_text" => "subject",
            "placeholder" => "input a link subject",
            "required" => true,
        ),
        "rank" => array("type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
            "required" => false,
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
            "class" => "ArticleSubject",
            "label_text" => "",
            "select_option_text" => 'sub_subject',
            'field_option_0' => "subject",
            'field_option_1' => "subject",
            "required" => false,
        ),
        "rank" => array("type" => "select",
            "name" => 'rank',
            "id" => "search_rank",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'rank',
            'field_option_0' => "rank",
            'field_option_1' => "rank",
            "required" => false,
        ),
    );


    public static $db_field_search = array('search_all', 'subject', 'download_csv');


    public static $page_name = "article subject";
    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=ArticleSubject";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=ArticleSubject";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=ArticleSubject";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=ArticleSubject";


//    public static $form_class_dependency=array('') ;


    public static $per_page;

    public $id;
    public $subject;
    public $rank;

    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);


        if (!isset($this->id)) {

            $valid->validate_min_lengths(['subject' => 1]);
            $valid->validate_max_lengths(['subject' => 20]);
        }

        if (isset($this->id)) {
            $valid->unique_name('subject', get_class($this), true);

        } else {
            $valid->unique_name('subject', get_class($this));

        }

        return $valid;

    }

    public static function table_nav_additional()
    {
        $output = "";
        $output .= "<span>&nbsp;</span><a  class=\"btn btn-primary\"  href=\"" . Article::$page_new . "?class_name=Article\">Add New " . Article::$page_name . " </a><span>&nbsp;</span>";

        return $output;
    }
}
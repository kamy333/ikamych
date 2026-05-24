<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 10/6/2015
 * Time: 1:20 AM
 */
class BookCategory extends DatabaseObject
{

    protected static $table_name = "book_category";

    protected static $db_fields = ['id', 'category', 'rank'];

    public static $required_fields = ['category',];

    protected static $db_fields_table_display_short = ['id', 'category', 'rank'];

    protected static $db_fields_table_display_full = ['id', 'category', 'rank'];

    protected static $db_field_exclude_table_display_sort = null;

    public static $fields_numeric = ['id', 'rank'];

    public static $get_form_element = ['category', 'rank'];
    public static $get_form_element_others = [];

    public static $form_default_value = [
        "input_date" => 'nowtime()',
        "category" => "PHP",
        "rank" => 1,


    ];

    protected static $form_properties = [
        "category" => ["type" => "text",
            "name" => 'category',
            "label_text" => "category",
            "placeholder" => "input a link category",
            "required" => true,
        ],
        "rank" => ["type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
            "required" => false,
        ],

    ];

    protected static $form_properties_search = [
        "search_all" => ["type" => "text",
            "name" => 'search_all',
            "label_text" => "",
            "placeholder" => "Search all",
            "required" => false,
        ],
        "download_csv" => ["type" => "radio",
            [0,
                [
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "non",
                    "value" => "No",
                    "id" => "visible_no",
                    "default" => true]],
            [1,
                [
                    "label_all" => "Dnld csv",
                    "name" => "download_csv",
                    "label_radio" => "oui",
                    "value" => "Yes",
                    "id" => "visible_yes",
                    "default" => true]],
        ],
        "id" => ["type" => "number",
            "name" => 'id',
            "id" => "search_id",
            "label_text" => "",
            'min' => 0,
            "placeholder" => "ID",
            "required" => false,
        ],
        "category" => ["type" => "select",
            "name" => 'subject',
            "id" => "search_subject",
            "class" => "BookCategory",
            "label_text" => "",
            "select_option_text" => 'category',
            'field_option_0' => "category",
            'field_option_1' => "category",
            "required" => false,
        ],
        "rank" => ["type" => "select",
            "name" => 'rank',
            "id" => "search_rank",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'rank',
            'field_option_0' => "rank",
            'field_option_1' => "rank",
            "required" => false,
        ],
    ];


    public static $db_field_search = ['search_all', 'subject', 'download_csv'];


    public static $page_name = "Book Category";
    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=BookCategory";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=BookCategory";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=BookCategory";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=BookCategory";


//    public static $form_class_dependency=array('') ;


    public static $per_page;

    public $id;
    public $category;
    public $rank;

    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);


        if (!isset($this->id)) {

            $valid->validate_min_lengths(['category' => 1]);
            $valid->validate_max_lengths(['category' => 20]);
        }

        if (isset($this->id)) {
            $valid->unique_name('category', get_class($this), true);

        } else {
            $valid->unique_name('category', get_class($this));

        }

        return $valid;

    }

    public static function table_nav_additional()
    {
        $output = "";
        $output .= "<span>&nbsp;</span><a  class=\"btn btn-primary\"  href=\"" . Book::$page_new . "?class_name=Book\">Add New " . Book::$page_name . " </a><span>&nbsp;</span>";

        return $output;
    }
}
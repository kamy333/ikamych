<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 9/6/2015
 * Time: 12:22 PM
 */
class Client extends DatabaseObject
{

    public static $required_fields = array('pseudo', 'restricted_list', 'liste_rank', 'company_name');
    public static $fields_numeric = array('id', 'restricted_list', 'liste_rank');
    public static $get_form_element = array('pseudo', 'restricted_list', 'company_name', 'web_view', 'last_name', 'first_name', 'email', 'website', 'address', 'cp', 'city', 'country', 'phone', 'mobile', 'liste_rank', 'comment');
    public static $get_form_element_others = array();
    public static $form_default_value = array(
        "restricted_list" => "0",
    );
    public static $db_field_search = array('search_all', 'pseudo', 'restricted_list', 'company_name', 'web_view', 'last_name', 'first_name', 'email', 'website', 'address', 'cp', 'city', 'country', 'phone', 'mobile', 'download_csv');
    public static $page_name = "Client";
    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Client";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Client";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Client";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Client";
    public static $position_table = "positionRight";
    public static $form_class_dependency = array('Project', 'Currency');
    public static $per_page;
//    public static $page_manage="manage_clients.php";
//    public static $page_new="new_client.php";
//    public static $page_edit="edit_client.php";
//    public static $page_delete="delete_client.php";
    protected static $table_name = "clients"; // "new_link.php";
    protected static $db_fields = array('id', 'pseudo', 'restricted_list', 'company_name', 'web_view', 'last_name', 'first_name', 'email', 'website', 'address', 'cp', 'city', 'country', 'phone', 'mobile', 'comment', 'liste_rank'); // "new_link.php";
    protected static $db_fields_table_display_short = array('id', 'pseudo', 'restricted_list', 'company_name', 'web_view', 'last_name', 'first_name', 'email', 'website', 'liste_rank'); //  "edit_link.php";
    protected static $db_fields_table_display_full = array('id', 'pseudo', 'restricted_list', 'company_name', 'web_view', 'last_name', 'first_name', 'email', 'website', 'address', 'cp', 'city', 'country', 'phone', 'mobile', 'comment'); //  "delete_link.php";
    protected static $db_field_exclude_table_display_sort = null; // positionLeft // positionBoth  positionRight
    protected static $form_properties = array(
        "pseudo" => array("type" => "text",
            "name" => 'pseudo',
            "label_text" => "Pseudo",
            "placeholder" => "input Pseudo",
            "required" => true,
        ),
        "restricted_list" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Restricted List",
                    "name" => "restricted_list",
                    "label_radio" => "non",
                    "value" => "0",
                    "id" => "visible_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Restricted List",
                    "name" => "restricted_list",
                    "label_radio" => "oui",
                    "value" => "1",
                    "id" => "visible_yes",
                    "default" => true)),
        ),
        "company_name" => array("type" => "text",
            "name" => 'company_name',
            "label_text" => "Company name",
            "placeholder" => "Company name",
            "required" => false,
        ),

        "web_view" => array("type" => "text",
            "name" => 'web_view',
            "label_text" => "Web view",
            "placeholder" => "How like name to display",
            "required" => false,
        ),

        "first_name" => array("type" => "text",
            "name" => 'first_name',
            "label_text" => "First name",
            "placeholder" => "First name",
            "required" => false,
        ),

        "last_name" => array("type" => "text",
            "name" => 'last_name',
            "label_text" => "Last Name",
            "placeholder" => "Last Name",
            "required" => false,
        ),

        "email" => array("type" => "email",
            "name" => 'email',
            "label_text" => "Email",
            "placeholder" => "eg yourname@example.com",
            "required" => false,
        ),

        "website" => array("type" => "url",
            "name" => 'website',
            "label_text" => "Website",
            "placeholder" => "Client website",
            "required" => false,
        ),
        "address" => array("type" => "text",
            "name" => 'address',
            "label_text" => "Address",
            "placeholder" => "Address",
            "required" => false,
        ),

        "cp" => array("type" => "text",
            "name" => 'cp',
            "label_text" => "Postal Code",
            "placeholder" => "Postal Code",
            "required" => false,
        ),

        "city" => array("type" => "text",
            "name" => 'city',
            "label_text" => "City",
            "placeholder" => "City",
            "required" => false,
        ),


        "country" => array("type" => "text",
            "name" => 'country',
            "label_text" => "Country",
            "placeholder" => "Country",
            "required" => false,
        ),

        "phone" => array("type" => "tel",
            "name" => 'phone',
            "label_text" => "Phone no",
            "placeholder" => "Phone no",
            "required" => false,
        ),

        "mobile" => array("type" => "tel",
            "name" => 'mobile',
            "label_text" => "Mobile no",
            "placeholder" => "Mobile no",
            "required" => false,
        ),
        "liste_rank" => array("type" => "number",
            "name" => 'liste_rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
            "required" => true,
        ),
        "comment" => array("type" => "textarea",
            "name" => 'comment',
            "label_text" => "comment",
            "placeholder" => "comment",
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
                    "default" => false)),
        ),
        "id" => array("type" => "number",
            "name" => 'id',
            "id" => "search_id",
            "label_text" => "",
            'min' => 0,
            "placeholder" => "ID",
            "required" => false,
        ),

        "pseudo" => array("type" => "select",
            "name" => 'pseudo',
            "id" => "search_pseudo",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'Pseudo',
            'field_option_0' => "pseudo",
            'field_option_1' => "pseudo",
            "required" => false,
        ),
        "restricted_list" => array("type" => "select",
            "name" => 'restricted_list',
            "id" => "search_restricted_list",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'restricted list',
            'field_option_0' => "restricted_list",
            'field_option_1' => "restricted_list",
            "required" => false,
        ),
        "company_name" => array("type" => "select",
            "name" => 'company_name',
            "id" => "search_company_name",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'Company name',
            'field_option_0' => "company_name",
            'field_option_1' => "company_name",
            "required" => false,
        ),
        "web_view" => array("type" => "select",
            "name" => 'web_view',
            "id" => "search_web_view",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'web view',
            'field_option_0' => "web_view",
            'field_option_1' => "web_view",
            "required" => false,
        ),
        "last_name" => array("type" => "select",
            "name" => 'last_name',
            "id" => "search_last_name",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'last_name',
            'field_option_0' => "last_name",
            'field_option_1' => "last_name",
            "required" => false,
        ),
        "first_name" => array("type" => "select",
            "name" => 'first_name',
            "id" => "search_first_name",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'first_name',
            'field_option_0' => "first_name",
            'field_option_1' => "first_name",
            "required" => false,
        ),
        "email" => array("type" => "select",
            "name" => 'email',
            "id" => "search_email",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'email',
            'field_option_0' => "email",
            'field_option_1' => "email",
            "required" => false,
        ),

        "address" => array("type" => "select",
            "name" => 'address',
            "id" => "search_address",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'Address',
            'field_option_0' => "address",
            'field_option_1' => "address",
            "required" => false,
        ),
        "cp" => array("type" => "select",
            "name" => 'cp',
            "id" => "search_cp",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'cp',
            'field_option_0' => "cp",
            'field_option_1' => "cp",
            "required" => false,
        ),
        "city" => array("type" => "select",
            "name" => 'city',
            "id" => "search_city",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'city',
            'field_option_0' => "city",
            'field_option_1' => "city",
            "required" => false,
        ),
        "country" => array("type" => "select",
            "name" => 'country',
            "id" => "search_country",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'country',
            'field_option_0' => "country",
            'field_option_1' => "country",
            "required" => false,
        ),
        "phone" => array("type" => "select",
            "name" => 'phone',
            "id" => "search_phone",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'Phone',
            'field_option_0' => "phone",
            'field_option_1' => "phone",
            "required" => false,
        ),
        "mobile" => array("type" => "select",
            "name" => '',
            "id" => "search_mobile",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'Mobile',
            'field_option_0' => "mobile",
            'field_option_1' => "mobile",
            "required" => false,
        ),
        "liste_rank" => array("type" => "select",
            "name" => 'liste_rank',
            "id" => "search_liste_rank",
            "class" => "Client",
            "label_text" => "",
            "select_option_text" => 'liste_rank',
            'field_option_0' => "liste_rank",
            'field_option_1' => "liste_rank",
            "required" => false,
        ),


    );
    public $id;
    public $pseudo;
    public $restricted_list;
    public $company_name;
    public $web_view;
    public $last_name;
    public $first_name;
    public $email;
    public $website;
    public $address;
    public $cp;
    public $city;
    public $country;
    public $phone;
    public $mobile;
    public $comment;
    public $liste_rank;


    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);

        isset ($this->email) ? $valid->validate_email('email') : "";

        if (isset($this->pseudo)) {
            $valid->validate_min_lengths(['pseudo' => 1]);
            $valid->validate_max_lengths(['pseudo' => 10]);
        }

        ($this->website) ? $valid->validate_website('website') : "";

        $valid->is_numeric('liste_rank', ['min' => 0]);

        if (!isset($this->id)) {
            $valid->unique_name('pseudo', get_class($this));

        }


        return $valid;

    }


}
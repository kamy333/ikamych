<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 10/6/2015
 * Time: 1:17 AM
 */
class Links extends DatabaseObject
{

    protected static $table_name = "links";
    protected static $db_fields = array('id', 'name', 'web_address', 'description', 'category_id', 'category', 'sub_category_1', 'sub_category_2', 'privacy', 'rank', 'username');

    public static $required_fields = array('name', 'web_address', 'category_id', 'privacy', 'rank',);

    protected static $db_fields_table_display_short = array('id', 'name', 'link', 'category');

    protected static $db_fields_table_display_full = array('id', 'name', 'link', 'description', 'category_id', 'category', 'sub_category_1', 'sub_category_2', 'privacy', 'rank');

    protected static $db_field_exclude_table_display_sort = array('link');

    public static $fields_numeric = array('id', 'privacy', 'rank', 'category_id');

    public static $get_form_element = array('name', 'web_address', 'description', 'category_id', 'sub_category_1', 'sub_category_2', 'privacy', 'rank');

    public static $get_form_element_others = array();

    public static $form_default_value = array(
        "category_id" => "1",
        "privacy" => "0",
        "rank" => "1",);

    protected static $form_properties = array(
        "name" => array("type" => "text",
            "name" => 'name',
            "label_text" => "Name",
            "placeholder" => "input a name",
            "required" => true,
        ),
        "web_address" => array("type" => "url",
            "name" => 'web_address',
            "label_text" => "Website",
            "placeholder" => "Website Address",
            "required" => true,
        ),
        "description" => array("type" => "textarea",
            "name" => 'description',
            "label_text" => "description",
            "placeholder" => "input description",
            "required" => false,
        ),
        "category_id" => array("type" => "select",
            "name" => 'category_id',
            "class" => "LinksCategory",
            "label_text" => "Category",
            'field_option_0' => "id",
            'field_option_1' => "category",
            "required" => true,
        ),
        "sub_category_1" => array("type" => "text",
            "name" => 'sub_category_1',
            "label_text" => "Category 1",
            "placeholder" => "Category 1",
            "required" => false,
        ),
        "sub_category_2" => array("type" => "text",
            "name" => 'sub_category_2',
            "label_text" => "Category 2",
            "placeholder" => "Category 2",
            "required" => false,
        ),
        "privacy" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "Privacy",
                    "name" => "privacy",
                    "label_radio" => "No",
                    "value" => "0",
                    "id" => "privacy_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Privacy",
                    "name" => "privacy",
                    "label_radio" => "Yes",
                    "value" => "1",
                    "id" => "privacy_yes",
                    "default" => true)),
        ),
        "rank" => array("type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
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

        "name" => array("type" => "select",
            "name" => 'name',
            "id" => "search_name",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'name',
            'field_option_0' => "name",
            'field_option_1' => "name",
            "required" => false,
        ),

        "category" => array("type" => "select",
            "name" => 'category',
            "id" => "search_category",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'Category',
            'field_option_0' => "category",
            'field_option_1' => "category",
            "required" => false,
        ),

        "sub_category_1" => array("type" => "select",
            "name" => 'sub_category_1',
            "id" => "search_sub_category_1",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'sub_category_1',
            'field_option_0' => "sub_category_1",
            'field_option_1' => "sub_category_1",
            "required" => false,
        ),
        "sub_category_2" => array("type" => "select",
            "name" => 'sub_category_2',
            "id" => "search_sub_category_2",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'sub_category_2',
            'field_option_0' => "sub_category_2",
            'field_option_1' => "sub_category_2",
            "required" => false,
        ),
        "privacy" => array("type" => "select",
            "name" => 'privacy',
            "id" => "search_privacy",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'privacy',
            'field_option_0' => "privacy",
            'field_option_1' => "privacy",
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

    public static $db_field_search = array('search_all', 'name', 'web_address', 'description', 'category', 'sub_category_1', 'sub_category_2', 'privacy', 'rank', 'username', 'download_csv');


    public static $page_name = "Links";


    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Links"; // "manage_links.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Links"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Links"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Links"; //  "delete_link.php";
    public static $position_table = "positionleft"; // positionLeft // positionBoth  positionRight

    public static $form_class_dependency = array('LinksCategory', 'MyExpenseType');


    public static $per_page;


    public $id;
    public $name;
    public $web_address;
    public $description;
    public $category_id;
    public $category;
    public $sub_category_1;
    public $sub_category_2;
    public $privacy;
    public $rank;
    public $username;

    public $ref_name;
    public $link;



    public function form_validation()
    {
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);

        if (isset($this->name)) {
            $valid->validate_min_lengths(['name' => 1]);
            $valid->validate_max_lengths(['name' => 80]);
        }

        if (!isset($this->category) && isset($this->category_id)) {
            $category = LinksCategory::find_by_id($this->category_id);
            $this->category = $category->category;
        }

        ($this->web_address) ? $valid->validate_website('web_address') : "";

        $valid->is_numeric('rank', ['min' => 0]);

        !isset($this->privacy) ? $this->privacy = 0 : $this->privacy;

        return $valid;

    }

    protected function set_up_display()
    {

        if (isset($this->web_address) && isset($this->name)) {
            $this->link = "<a target='_blank' href='{$this->web_address}'>lnk</a>";

        }

        if (!isset($this->category)) {
            $category = LinksCategory::find_by_id($this->category_id);
            $this->category = $category->category;

        }
    }


    public static function find_all_get($category_1 = false, $category_2 = false)
    {

        $table = self::$table_name;

        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        } else {
            $category = '';

        }

        $sql = "SELECT * FROM {$table} ";

        if ($category_1) {
            $sql .= "WHERE  sub_category_1 = '{$category}' ORDER BY rank";
        } elseif ($category_2) {
            $sql .= "WHERE  sub_category_2 = '{$category}' ORDER BY rank";
        } else {
            if (!empty($category)) {
                $sql .= "WHERE category = '{$category}' ORDER BY rank";
            }
        }


        return static::find_by_sql($sql);

    }


    public static function find_all_category_from_links()
    {
        // global $database;
        $sql = "SELECT DISTINCT t1.category FROM links AS t1 INNER JOIN links_category AS t2 on t2.id = t1.category_id
                ORDER BY t2.rank ASC, t1.id ASC ";
        return self::find_by_sql($sql);
    }

    public static function find_all_category_1_from_links()
    {
        // global $database;
        $sql = "SELECT DISTINCT sub_category_1 FROM links WHERE sub_category_1 IS NOT NULL ";

        return self::find_by_sql($sql);
    }


    public static function find_all_category_2_from_links()
    {
        // global $database;
        $sql = "SELECT DISTINCT sub_category_2 FROM links WHERE sub_category_2 IS NOT NULL ";

        return self::find_by_sql($sql);
    }

    public static function get_search_category($category_1 = false, $category_2 = false)
    {

        global $Nav;

        if ($category_1) {
            $category_set = self::find_all_category_1_from_links();

        } elseif ($category_2) {
            $category_set = self::find_all_category_2_from_links();

        } else {
            $category_set = self::find_all_category_from_links();

        }


        $output = "";
        $output .= "<ul class='nav nav-tabs '>";

        if (!isset($_GET['category'])) {
            $active1 = "active";
        } else {
            $active1 = "";
        }


        $output .= "<li role='presentation' class=''><a href=";
        $output .= static::$page_new; //"admin/new_link.php";
        $output .= ">New</a></li>";

        if (User::is_admin()) {
            $output .= $Nav->menu_item('Article', 'New Article', 'new_data.php', 'admin/crud/data');
        }


        $output .= "<li role='presentation' class='{$active1}'><a href=";
        $output .= $_SERVER['PHP_SELF'];
        $output .= ">All</a></li>";

        if ($category_1) {
            $output .= "<li role='presentation' class=''><a href=";
            $output .= 'myLinks.php?category=Others';
            $output .= ">All Category</a></li>";
            $output .= "<li role='presentation' class=''><a href=";
            $output .= 'myLinks2.php';
            $output .= ">Sub Category 2</a></li>";
        } elseif ($category_2) {
            $output .= "<li role='presentation' class=''><a href=";
            $output .= 'myLinks.php?category=Others';
            $output .= ">All Category</a></li>";
            $output .= "<li role='presentation' class=''><a href=";
            $output .= 'myLinks1.php?category=Udemy';
            $output .= ">Sub Category 1</a></li>";
        } else {
            $output .= "<li role='presentation' class=''><a href=";
            $output .= 'myLinks1.php?category=Udemy';
            $output .= ">Sub Category 1</a></li>";
            $output .= "<li role='presentation' class=''><a href=";
            $output .= 'myLinks2.php';
            $output .= ">Sub Category 2</a></li>";
        }

        $output .= "</ul>";

        $output .= "<ul class='nav nav-pills '>";


        foreach ($category_set as $category) {


            if ($category_1) {
                $categ = $category->sub_category_1;
            } elseif ($category_2) {
                $categ = $category->sub_category_2;
            } else {
                $categ = $category->category;
            }


            if (isset($_GET['category']) && $_GET['category'] == $categ) {
                $active = "active";
            } else {
                $active = "";
            }

            $output .= "<li role='presentation' class='{$active}'><a href=";
            $output .= $_SERVER['PHP_SELF'];
            $output .= "?category=";
            $output .= urlencode($categ);
            $output .= ">{$categ}</a></li>";


        }

        $output .= "</ul>";

        return $output;


    }

    public static function find_name_category_links($name_category = "")
    {
        global $database;
        $name_category = $database->escape_value($name_category);
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE category='{$name_category}' ORDER BY Rank ");
        return !empty($result_array) ? $result_array : false;
    }

    public static function find_name_category_1_links($name_category = "")
    {
        global $database;
        $name_category = $database->escape_value($name_category);
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE sub_category_1='{$name_category}'");
        return !empty($result_array) ? $result_array : false;
    }

    public static function find_name_category_2_links($name_category = "")
    {
        global $database;
        $name_category = $database->escape_value($name_category);
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE sub_category_2='{$name_category}'");
        return !empty($result_array) ? $result_array : false;
    }

//    public static function find_name_category_3_links($name_category = "")
//    {
//        global $database;
//        $name_category = $database->escape_value($name_category);
//        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE sub_category_2='{$name_category}' ORDER BY Rank");
//        return !empty($result_array) ? $result_array : false;
//    }

    public static function output_links($name_category = null, $category_1 = false, $category_2 = false)
    {

        ////global $database;


        If (!$name_category or empty($name_category)) {
            //  $link_set=find_all_links();

            if ($category_1) {
                $link_set = self::find_all_get(true);
            } elseif ($category_2) {
                $link_set = self::find_all_get(false, true);
            } else {
                $link_set = self::find_all_get();
            }


            if (isset($_GET['category'])) {
                $category = $_GET['category'];
            } else {
                $category = "All";

            }
        } else {

            if ($category_1) {
                $link_set = self::find_name_category_1_links($name_category);

            } elseif ($category_2) {
                $link_set = self::find_name_category_2_links($name_category);

            } else {
                $link_set = self::find_name_category_links($name_category);
            }

            $category = $name_category;
        }

        $output = "";

        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed'>";


        $output .= "<tr>";
        $output .= "<th class='text-center' style='vertical-align:middle;'>{$category}</th>";


        $output .= "</tr>";


        foreach ($link_set as $link) {
            //   while($link = mysqli_fetch_assoc($link_set)) {

            $link_id = $link->id;
            $web = $link->web_address;
            $name = htmlentities($link->name, ENT_COMPAT, 'utf-8');
            $href = "<a target='_blank' href='{$web}'>{$name}</a>";

            if (User::is_kamy()) {
                $modal = "<small>" . self::get_modal_link($link_id) . "</small>";
            } else {
                $modal = "";
            }

            $output .= "<tr>";

            //todo chk $moodal
//            $modal="";

            If (!$name_category) {
                $output .= "<td class='text-center'>" . $href . "&nbsp;&nbsp; " . $modal . "</td>";

            } else {
                $output .= "<td class='text-center'>" . $href . "&nbsp;&nbsp; " . "</td>";

            }



            $output .= "</tr>";
        }


        $output .= "</table>";
        $output .= "</div>";

        return $output;

    }


    protected static function get_modal_body_links($link_id)
    {
        $link = self::find_by_id($link_id);

        $grid = "<div class='row'>";
        $grid1 = "<div class='col-md-12  col-lg-12'>";

        $grid_2_DIV = "</div></div>";

        $grid = "";
        $grid1 = "";
        $grid2 = "";
        $grid_2_DIV = "";

        $grid_head = $grid . $grid1;

        $modal_body = "<dl class='dl-horizontal dd-color-blue'>";


        foreach ($link as $key => $val) {
            $key_clean = ucfirst(str_replace("_", "  ", $key));
            if ($key == "name") {
                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>Nom:" . "</strong></dt>";
                $modal_body .= "";
                $modal_body .= "<dd>" . htmlentities($val, ENT_COMPAT, 'utf-8') . "</dd>";
                $modal_body .= "{$grid_2_DIV}";
            } elseif ($key == "privacy") {
                if ($val == 0) {
                    $val_yes_no = "Non";
                } else {
                    $val_yes_no = "Oui";
                }
                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . htmlentities($key_clean, ENT_COMPAT, 'utf-8') . ":</strong></dt>";
                $modal_body .= "<dd> " . htmlentities($val_yes_no, ENT_COMPAT, 'utf-8') . "</dd>";
                $modal_body .= "{$grid_2_DIV}";

            } elseif ($key == "rank") {

                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . htmlentities($key_clean, ENT_COMPAT, 'utf-8') . ":</strong></dt>";
                $modal_body .= "<dd> " . htmlentities($val, ENT_COMPAT, 'utf-8') . "</dd>";
                $modal_body .= "{$grid_2_DIV}";


            } elseif ($key == "description") {
                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . htmlentities($key_clean, ENT_COMPAT, 'utf-8') . ":</strong></dt>";
                $modal_body .= "<dd> " . htmlentities($val, ENT_COMPAT, 'utf-8') . "</dd>";
                $modal_body .= "{$grid_2_DIV}";


            } elseif ($key == "web_address") {
            } elseif ($key == "username") {


            } else {

                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . htmlentities($key_clean, ENT_COMPAT, 'utf-8') . ":</strong></dt>";
                $modal_body .= "<dd>" . htmlentities($val, ENT_COMPAT, 'utf-8') . "</dd>";
                $modal_body .= "{$grid_2_DIV}";

            }


        }

        $modal_body .= "</dl>";

        return $modal_body;


    }

    protected static function get_modal_link($link_id)
    {

        // modal

        $link = self::find_by_id($link_id);

        $div_id = "myLinkprogram{$link_id}";

        $output = "";

        $output = "";


        $output .= "<a class='' style='width:1em;' href='#' data-toggle='modal' data-target='#{$div_id}'>";
        $output .= "<span class=\"glyphicon glyphicon-info-sign\" style='color: #0000ff;' aria-hidden='true'>";
        $output .= "</span>";
        $output .= "</a>";


// below is modal mode not shown (hidden)
        $output .= "<div class='modal fade' id='{$div_id}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
        $output .= "    <div class='modal-dialog'>";
        $output .= "        <div class='modal-content'>";
        $output .= "            <div class='modal-header'>";
        $output .= "                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $output .= "                <h5 class='modal-title' id='myModalLabel'>link" . htmlentities($link->name, ENT_COMPAT, 'utf-8') . "</strong> Categ :" . htmlentities($link->category, ENT_COMPAT, 'utf-8') . "</strong></h5>";
        $output .= "            </div>";
        $output .= "            <div class='modal-body'>";


//        $class="?class_name=".get_called_class()."&id=";
        $class = "&id=";

        $p_edit = static::$page_edit . $class;
        $p_del = static::$page_delete . $class;
        $p_new = static::$page_new . $class;


        $output .= "<div class='container-fluid text-left'> ";

        $output .= self::get_modal_body_links($link_id);;


        $output .= "</div>";


        $output .= "            </div>";

        $style_width_button = "style='width: 6em;'";


        $output .= "            <div class='modal-footer'>";
        $output .= "                <div class='btn-group btn-group-justified' role='group' aria-label='...'>";
        $output .= "                <p class='btn'><a class='btn btn-primary btn-xm'{$style_width_button} href='{$p_edit}" . urlencode($link_id) . "'>Edit</a></p>";
        $output .= "                <p class='btn'><a class='btn btn-danger btn-xm' {$style_width_button} href='{$p_del}" . urlencode($link_id) . "'>Delete</a></p>";
        $output .= "                <p class='btn' ><a class='btn btn-success btn-xm' {$style_width_button} href='{$p_new}" . urlencode($link_id) . "'>add</a></p>";

        $output .= "                <p class='btn' data-dismiss='modal'><a class=' btn btn-info btn-xm' {$style_width_button}>close</a> </p>";

        $output .= "                </div>";


        $output .= "            </div>";
        $output .= "        </div>";
        $output .= "    </div>";
        $output .= "</div>";


        return $output;
    }




    public static function table_nav_additional()
    {
        $output = "";
        $output .= "<span>&nbsp;</span><a  class=\"btn btn-primary\"  href=\"" . LinksCategory::$page_new . "\">Add New " . LinksCategory::$page_name . " </a><span>&nbsp;</span>";

        return $output;
    }


}
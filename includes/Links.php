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
    protected static $db_fields = ['id', 'name', 'web_address', 'description', 'category_id', 'category', 'sub_category_1', 'sub_category_2', 'privacy', 'rank', 'username'];

    public static $required_fields = ['name', 'web_address', 'category_id', 'privacy', 'rank',];

    protected static $db_fields_table_display_short = ['id', 'name', 'link', 'category'];

    protected static $db_fields_table_display_full = ['id', 'name', 'link', 'description', 'category_id', 'category', 'sub_category_1', 'sub_category_2', 'privacy', 'rank'];

    protected static $db_field_exclude_table_display_sort = ['link'];

    public static $fields_numeric = ['id', 'privacy', 'rank', 'category_id'];

    public static $get_form_element = ['name', 'web_address', 'description', 'category_id', 'sub_category_1', 'sub_category_2', 'privacy', 'rank'];

    public static $get_form_element_others = [];

    public static $form_default_value = [
        "category_id" => "1",
        "privacy" => "0",
        "rank" => "1",];

    protected static $form_properties = [
        "name" => ["type" => "text",
            "name" => 'name',
            "label_text" => "Name",
            "placeholder" => "input a name",
            "required" => true,
        ],
        "web_address" => ["type" => "url",
            "name" => 'web_address',
            "label_text" => "Website",
            "placeholder" => "Website Address",
            "required" => true,
        ],
        "description" => ["type" => "textarea",
            "name" => 'description',
            "label_text" => "description",
            "placeholder" => "input description",
            "required" => false,
        ],
        "category_id" => ["type" => "select",
            "name" => 'category_id',
            "class" => "LinksCategory",
            "label_text" => "Category",
            'field_option_0' => "id",
            'field_option_1' => "category",
            "required" => true,
        ],
        "sub_category_1" => ["type" => "text",
            "name" => 'sub_category_1',
            "label_text" => "Category 1",
            "placeholder" => "Category 1",
            "required" => false,
        ],
        "sub_category_2" => ["type" => "text",
            "name" => 'sub_category_2',
            "label_text" => "Category 2",
            "placeholder" => "Category 2",
            "required" => false,
        ],
        "privacy" => ["type" => "radio",
            [0,
                [
                    "label_all" => "Privacy",
                    "name" => "privacy",
                    "label_radio" => "No",
                    "value" => "0",
                    "id" => "privacy_no",
                    "default" => true]],
            [1,
                [
                    "label_all" => "Privacy",
                    "name" => "privacy",
                    "label_radio" => "Yes",
                    "value" => "1",
                    "id" => "privacy_yes",
                    "default" => true]],
        ],
        "rank" => ["type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
            "required" => true,
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

        "name" => ["type" => "select",
            "name" => 'name',
            "id" => "search_name",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'name',
            'field_option_0' => "name",
            'field_option_1' => "name",
            "required" => false,
        ],

        "category" => ["type" => "select",
            "name" => 'category',
            "id" => "search_category",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'Category',
            'field_option_0' => "category",
            'field_option_1' => "category",
            "required" => false,
        ],

        "sub_category_1" => ["type" => "select",
            "name" => 'sub_category_1',
            "id" => "search_sub_category_1",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'sub_category_1',
            'field_option_0' => "sub_category_1",
            'field_option_1' => "sub_category_1",
            "required" => false,
        ],
        "sub_category_2" => ["type" => "select",
            "name" => 'sub_category_2',
            "id" => "search_sub_category_2",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'sub_category_2',
            'field_option_0' => "sub_category_2",
            'field_option_1' => "sub_category_2",
            "required" => false,
        ],
        "privacy" => ["type" => "select",
            "name" => 'privacy',
            "id" => "search_privacy",
            "class" => "Links",
            "label_text" => "",
            "select_option_text" => 'privacy',
            'field_option_0' => "privacy",
            'field_option_1' => "privacy",
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

    public static $db_field_search = ['search_all', 'name', 'web_address', 'description', 'category', 'sub_category_1', 'sub_category_2', 'privacy', 'rank', 'username', 'download_csv'];


    public static $page_name = "Links";


    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=Links"; // "manage_links.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=Links"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=Links"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=Links"; //  "delete_link.php";
    public static $position_table = "positionleft"; // positionLeft // positionBoth  positionRight

    public static $form_class_dependency = ['LinksCategory', 'MyExpenseType'];


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
            $web_address = self::html($this->web_address);
            $this->link = "<a target='_blank' rel='noopener noreferrer' href='{$web_address}'>lnk</a>";

        }

        if (!isset($this->category)) {
            $category = LinksCategory::find_by_id($this->category_id);
            $this->category = $category->category;

        }
    }


    public static function find_all_get($category_1 = false, $category_2 = false)
    {
        $table = self::$table_name;
        $params = [];

        if (isset($_GET['category'])) {
            $category = trim((string)$_GET['category']);
        } else {
            $category = '';

        }

        $sql = "SELECT * FROM {$table} ";

        if ($category_1) {
            $sql .= "WHERE sub_category_1 = ? ";
            $params[] = $category;
        } elseif ($category_2) {
            $sql .= "WHERE sub_category_2 = ? ";
            $params[] = $category;
        } else {
            if (!empty($category)) {
                $sql .= "WHERE category = ? ";
                $params[] = $category;
            }
        }

        $sql .= "ORDER BY `rank` ASC, id ASC";

        return static::find_by_sql_prepared($sql, $params);

    }


    public static function find_all_category_from_links()
    {
        // global $database;
        $sql = "SELECT t1.category FROM links AS t1 INNER JOIN links_category AS t2 on t2.id = t1.category_id
                GROUP BY t1.category
                ORDER BY MIN(t2.rank) ASC, MIN(t1.id) ASC ";
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


        $output .= "<li role='presentation' class=''><a href=\"";
        $output .= self::html(static::$page_new); //"admin/new_link.php";
        $output .= "\">New</a></li>";

        if (User::is_admin()) {
            $output .= $Nav->menu_item('Article', 'New Article', 'new_data.php', 'admin/crud/data');
        }


        $current_page = self::html($_SERVER['PHP_SELF'] ?? '');

        $output .= "<li role='presentation' class='{$active1}'><a href=\"";
        $output .= $current_page;
        $output .= "\">All</a></li>";

        if ($category_1) {
            $output .= "<li role='presentation' class=''><a href=\"";
            $output .= 'myLinks.php?category=Others';
            $output .= "\">All Category</a></li>";
            $output .= "<li role='presentation' class=''><a href=\"";
            $output .= 'myLinks2.php';
            $output .= "\">Sub Category 2</a></li>";
        } elseif ($category_2) {
            $output .= "<li role='presentation' class=''><a href=\"";
            $output .= 'myLinks.php?category=Others';
            $output .= "\">All Category</a></li>";
            $output .= "<li role='presentation' class=''><a href=\"";
            $output .= 'myLinks1.php?category=Udemy';
            $output .= "\">Sub Category 1</a></li>";
        } else {
            $output .= "<li role='presentation' class=''><a href=\"";
            $output .= 'myLinks1.php?category=Udemy';
            $output .= "\">Sub Category 1</a></li>";
            $output .= "<li role='presentation' class=''><a href=\"";
            $output .= 'myLinks2.php';
            $output .= "\">Sub Category 2</a></li>";
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

            if (self::is_retired_link_category($categ)) {
                continue;
            }

            $source_field = 'category';
            if ($category_1) {
                $source_field = 'sub_category_1';
            } elseif ($category_2) {
                $source_field = 'sub_category_2';
            }

            if (class_exists('LinksCategoryVisibility') && LinksCategoryVisibility::is_hidden($source_field, $categ)) {
                continue;
            }

            if (isset($_GET['category']) && $_GET['category'] == $categ) {
                $active = "active";
            } else {
                $active = "";
            }

            $output .= "<li role='presentation' class='{$active}'><a href=\"";
            $output .= $current_page;
            $output .= "?category=";
            $output .= rawurlencode((string)$categ);
            $output .= "\">" . self::html($categ) . "</a></li>";


        }

        $output .= "</ul>";

        return $output;


    }

    private static function is_retired_link_category($category)
    {
        return strcasecmp((string)$category, 'SuperLearning') === 0;
    }

    private static function is_retired_public_asset($web_address)
    {
        $web_address = (string)$web_address;
        return stripos($web_address, '/public/SuperLearning/') !== false
            || stripos($web_address, '/public/superlearning/') !== false
            || stripos($web_address, 'SuperLearning/') === 0
            || stripos($web_address, 'superlearning/') === 0;
    }

    public static function find_name_category_links($name_category = "")
    {
        return self::find_by_category_column('category', $name_category);
    }

    public static function find_name_category_1_links($name_category = "")
    {
        return self::find_by_category_column('sub_category_1', $name_category);
    }

    public static function find_name_category_2_links($name_category = "")
    {
        return self::find_by_category_column('sub_category_2', $name_category);
    }

    private static function find_by_category_column($column, $name_category)
    {
        $allowed_columns = ['category', 'sub_category_1', 'sub_category_2'];

        if (!in_array($column, $allowed_columns, true)) {
            return [];
        }

        return self::find_by_sql_prepared(
            "SELECT * FROM " . self::$table_name . " WHERE {$column} = ? ORDER BY `rank` ASC, id ASC",
            [(string)$name_category]
        );
    }

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
        $output .= "<th class='text-center' style='vertical-align:middle;'>" . self::html($category) . "</th>";


        $output .= "</tr>";


        foreach ($link_set as $link) {
            //   while($link = mysqli_fetch_assoc($link_set)) {

            $link_id = $link->id;
            $web = $link->web_address;

            if (self::is_retired_public_asset($web)) {
                continue;
            }

            $name = self::html($link->name);
            $web_address = self::html($web);
            $href = "<a target='_blank' rel='noopener noreferrer' href='{$web_address}'>{$name}</a>";

            if (User::is_kamy()) {
                $modal = "<small>" . self::get_modal_link($link_id) . "</small>";
            } else {
                $modal = "";
            }

            $output .= "<tr>";

            //todo chk $moodal
//            $modal="";

            $output .= "<td class='text-center'>" . $href . "&nbsp;&nbsp; " . $modal . "</td>";



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
                $modal_body .= "<dd>" . self::html($val) . "</dd>";
                $modal_body .= "{$grid_2_DIV}";
            } elseif ($key == "privacy") {
                if ($val == 0) {
                    $val_yes_no = "Non";
                } else {
                    $val_yes_no = "Oui";
                }
                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . self::html($key_clean) . ":</strong></dt>";
                $modal_body .= "<dd> " . self::html($val_yes_no) . "</dd>";
                $modal_body .= "{$grid_2_DIV}";

            } elseif ($key == "rank") {

                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . self::html($key_clean) . ":</strong></dt>";
                $modal_body .= "<dd> " . self::html($val) . "</dd>";
                $modal_body .= "{$grid_2_DIV}";


            } elseif ($key == "description") {
                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . self::html($key_clean) . ":</strong></dt>";
                $modal_body .= "<dd> " . self::html($val) . "</dd>";
                $modal_body .= "{$grid_2_DIV}";


            } elseif ($key == "web_address") {
            } elseif ($key == "username") {


            } else {

                $modal_body .= "{$grid_head}";
                $modal_body .= "<dt><strong>" . self::html($key_clean) . ":</strong></dt>";
                $modal_body .= "<dd>" . self::html($val) . "</dd>";
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


        $output .= "<a class='links-info-trigger' href='#' data-target='#{$div_id}' onclick=\"return window.linksOpenDetailModal ? window.linksOpenDetailModal('{$div_id}') : true;\" aria-label='View details for " . self::html($link->name) . "' title='View details'>";
        $output .= "<span class='sr-only'>View details</span>";
        $output .= "<span class=\"glyphicon glyphicon-info-sign\" aria-hidden='true'>";
        $output .= "</span>";
        $output .= "</a>";


// below is modal mode not shown (hidden)
        $output .= "<div class='modal fade' id='{$div_id}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
        $output .= "    <div class='modal-dialog'>";
        $output .= "        <div class='modal-content'>";
        $output .= "            <div class='modal-header'>";
        $output .= "                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $output .= "                <h5 class='modal-title' id='myModalLabel'>" . self::html($link->name) . " <span>Categ: " . self::html($link->category) . "</span></h5>";
        $output .= "            </div>";
        $output .= "            <div class='modal-body'>";


//        $class="?class_name=".get_called_class()."&id=";
        $class = "&id=";

        $p_edit = static::$page_edit . $class;
        $p_del = static::$page_delete . $class;
        $p_copy = static::$page_new . $class;
        $p_new = static::$page_new;


        $output .= "<div class='container-fluid text-left'> ";

        $output .= self::get_modal_body_links($link_id);;


        $output .= "</div>";


        $output .= "            </div>";

        $output .= "            <div class='modal-footer'>";
        $output .= "                <div class='links-modal-actions' role='group' aria-label='Link actions'>";
        $link_data = " data-link-id=\"" . self::html($link->id) . "\"";
        $link_data .= " data-link-name=\"" . self::html($link->name) . "\"";
        $link_data .= " data-link-web-address=\"" . self::html($link->web_address) . "\"";
        $link_data .= " data-link-description=\"" . self::html($link->description) . "\"";
        $link_data .= " data-link-category-id=\"" . self::html($link->category_id) . "\"";
        $link_data .= " data-link-sub-category-1=\"" . self::html($link->sub_category_1) . "\"";
        $link_data .= " data-link-sub-category-2=\"" . self::html($link->sub_category_2) . "\"";
        $link_data .= " data-link-privacy=\"" . self::html($link->privacy) . "\"";
        $link_data .= " data-link-rank=\"" . self::html($link->rank) . "\"";

        $output .= "                    <a class='links-modal-btn links-modal-btn--edit btn btn-primary' href='{$p_edit}" . urlencode($link_id) . "' data-link-action='edit' data-link-action-title='Edit link' data-link-submit-url='{$p_edit}" . urlencode($link_id) . "'{$link_data} onclick='return window.linksOpenActionModal ? window.linksOpenActionModal(this) : true;'><i class='fa fa-pencil' aria-hidden='true'></i> Edit</a>";
        $output .= "                    <a class='links-modal-btn links-modal-btn--copy btn btn-success' href='{$p_copy}" . urlencode($link_id) . "&duplicate_record=1' data-link-action='copy' data-link-action-title='Copy link' data-link-submit-url='{$p_new}'{$link_data} onclick='return window.linksOpenActionModal ? window.linksOpenActionModal(this) : true;'><i class='fa fa-clone' aria-hidden='true'></i> Copy</a>";
        $output .= "                    <a class='links-modal-btn links-modal-btn--add btn btn-info' href='{$p_new}' data-link-action='new' data-link-action-title='New link' data-link-submit-url='{$p_new}' onclick='return window.linksOpenActionModal ? window.linksOpenActionModal(this) : true;'><i class='fa fa-plus' aria-hidden='true'></i> New</a>";
        $delete_url = append_query_param($p_del . urlencode($link_id), 'return_to', current_request_uri());
        $delete_confirm = "return confirm(" . j("Are you sure you want to delete " . $link->name . "?") . ");";
        $output .= "                    <a class='links-modal-btn links-modal-btn--delete btn btn-danger' href='" . h($delete_url) . "' onclick='" . h($delete_confirm) . "'><i class='fa fa-trash' aria-hidden='true'></i> Delete</a>";
        $output .= "                    <button type='button' class='links-modal-btn links-modal-btn--close btn btn-info' data-dismiss='modal' onclick='return window.linksCloseModalButton ? window.linksCloseModalButton(this) : true;'><i class='fa fa-times' aria-hidden='true'></i> Close</button>";
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

    protected static function html($value)
    {
        return htmlentities((string)($value ?? ''), ENT_COMPAT, 'utf-8');
    }


}

<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class Book extends DatabaseObject
{

    public static $fields_numeric = array('id', 'category_id', 'rank', 'likes', 'is_row', 'num_column', 'num_offset');
    public static $get_form_element = ['category_id', 'rank', 'h2', 'h3', 'about_book', 'about_author', 'pdf_name', 'download_source_link', 'apress_link', 'summary', 'author', 'photo', 'likes', 'is_row', 'num_column', 'num_offset', 'comment', 'input_date'];
    public static $get_form_element_others = array();
    public static $form_default_value = array(
        "input_date" => 'nowtime()',
        "likes" => 0,
        "category_id" => 1,
        "rank" => 1000,
        "is_row" => 0,
        "num_column" => 9,
        "num_offset" => 0,
//        "h2" => "h2",
//        "h3" => "h3",
//        "download_source_link" => "https://www.google.com/finance",
//        "apress_link" => "https://www.google.com/finance",
//        "pdf_name" => "Beginning+SQL+Queries.pdf",
//        "about_author" => "about_author",
//        "about_book" => "about_book",


    );
    public static $db_field_search = array('search_all', 'book', 'download_csv');
    public static $form_user_id;

    public static $page_name = "Book";

//    public static $page_manage = "manage_Book.php";
//    public static $page_new = "new_Book.php";
//    public static $page_edit = "edit_Book.php";
//    public static $page_delete = "delete_Book.php";


//    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=" .__CLASS__;
//    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=" .__CLASS__;
//    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=" .__CLASS__;
//    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=" .__CLASS__;

    public static $position_table = "positionBoth"; // positionLeft // positionBoth  positionRight


    protected static $table_name = "book";
    protected static $db_fields = ['id', 'category_id', 'rank', 'download_source_link', 'h2', 'h3', 'summary', 'pdf_name', 'author', 'about_book', 'about_author', 'photo', 'apress_link', 'likes', 'is_row', 'num_column', 'num_offset', 'comment', 'input_date'];

    protected static $required_fields = array('category_id', 'pdf_name');
    protected static $db_field_exclude_table_display_sort = array('about', 'category', 'download_source', 'apress', 'pdf');

    protected static $db_fields_table_display_short = array('id', 'rank', 'category', 'about', 'pdf_name', 'download_source', 'h2', 'h3');

    protected static $db_fields_table_display_full = ['id', 'category', 'download_source', 'h2', 'h3', 'summary', 'rank', 'pdf_name', 'author', 'about', 'photo', 'apress_link', 'likes', 'is_row', 'num_column', 'num_offset', 'comment', 'input_date'];

    protected static $form_properties = array(
        "rank" => array("type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
            "required" => true,
        ),

        "category_id" => array("type" => "select",
            "name" => 'category_id',
            "class" => "BookCategory",
            "label_text" => "Category",
            'field_option_0' => "id",
            'field_option_1' => "category",
            "required" => true,
        ),

        "h2" => array("type" => "text",
            "name" => 'h2',
            "label_text" => "h2",
            "placeholder" => "Header 2",
            "required" => false,
        ),
        "h3" => array("type" => "text",
            "name" => 'h3',
            "label_text" => "h3",
            "placeholder" => "Header 3",
            "required" => false,
        ),

        "download_source_link" => array("type" => "url",
            "name" => 'download_source_link',
            "label_text" => "download source link eg Git",
            "placeholder" => "download_source_link",
            "required" => false,
        ),
        "pdf_name" => array("type" => "text",
            "name" => 'pdf_name',
            "label_text" => "pdf_name",
            "placeholder" => "pdf name of file",
            "required" => false,
        ),

        "apress_link" => array("type" => "url",
            "name" => 'apress_link',
            "label_text" => "apress_link",
            "placeholder" => "Apress Website Address of book",
            "required" => false,
        ),
        "author" => array("type" => "text",
            "name" => 'author',
            "label_text" => "Author",
            "placeholder" => "author",
            "required" => false,
        ),
        "about_book" => array("type" => "textarea",
            "name" => 'about_book',
            "label_text" => "about_book",
            "placeholder" => "about_book here",
            "required" => false,
        ),
        "about_author" => array("type" => "textarea",
            "name" => 'about_author',
            "label_text" => "about_author",
            "placeholder" => "about_author here",
            "required" => false,
        ),

        "likes" => array("type" => "number",
            "name" => 'likes',
            "label_text" => "Likes",
            'min' => 0,
            "placeholder" => "Likes",
            "required" => false,
        ),


        "photo" => array("type" => "file",
            "name" => 'photo',
            "label_text" => "photo",
            "required" => false,
            "autocomplete" => "off",

        ),
        "summary" => array("type" => "textarea",
            "name" => 'summary',
            "label_text" => "summary",
            "placeholder" => "summary",
            "required" => false,
        ),

        "comment" => array("type" => "textarea",
            "name" => 'comment',
            "label_text" => "comment",
            "placeholder" => "comment",
            "required" => false,
        ),

        "is_row" => array("type" => "number",
            "name" => 'is_row',
            "label_text" => "is_row",
            'min' => 0,
            'max' => 1,
            "placeholder" => "is row",
            "required" => false,
        ),
        "num_column" => array("type" => "number",
            "name" => 'num_column',
            "label_text" => "num_column",
            'min' => 0,
            'max' => 12,
            "placeholder" => "No of column",
            "required" => false,
        ),
        "num_offset" => array("type" => "number",
            "name" => 'num_offset',
            "label_text" => "num_offset",
            'min' => 0,
            'max' => 12,
            "placeholder" => "No of offset",
            "required" => false,
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
        "category_id" => array("type" => "select",
            "name" => 'subject_id',
            "id" => "search_subject",
            "class" => "Book",
            "label_text" => "",
            "select_option_text" => 'category',
            'field_option_0' => "category",
            'field_option_1' => "category",
            "required" => false,
        ),


    );


    public $id;
    public $category_id;
    public $category;
    public $rank;

    public $download_source_link;

    public $h2;
    public $h3;


    public $pdf_name;
    public $author;
    public $about_book;
    public $about_author;
    public $photo;
    public $apress_link;
    public $summary;
    public $likes;
    public $comment;
    public $input_date;
    public $is_row;
    public $num_column;
    public $num_offset;

    public $download_source;
    public $apress;
    public $pdf;

    public $about;


    public static function table_nav_additional()
    {
        $output = "</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . static::$page_new . "\">Add Book Ajax" . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . BookCategory::$page_manage . "\">Book Category " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-beige\"  href='/public/_f/article/articles.php?BookCategory=1&submitBookCategory=Submit'>Books " . " </a><span>&nbsp;</span>";
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


    function get_modal()
    {

        // modal

//        $article = self::find_by_id($this->id);

//        $div_id = "mybook{$this->id}";
        $div_id = get_class($this) . "{$this->id}";


        $output = "";

        //   $output .= "";


        $output = "";


        $output .= "<a class='' style='width:1em;' href='#' data-toggle='modal' data-target='#{$div_id}'>";
        $output .= "<span class=\"glyphicon glyphicon-info-sign\" style='color: #0000ff;' aria-hidden='true'>";
        // $output.= "".htmlentities($link['id'],ENT_COMPAT, 'utf-8');
        $output .= "</span>";
        $output .= "</a>";


// below is modal mode not shown (hidden)
        $output .= "<div class='modal fade' id='{$div_id}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
        $output .= "    <div class='modal-dialog'>";
        $output .= "        <div class='modal-content'>";
        $output .= "            <div class='modal-header'>";
        $output .= "                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $output .= "                <h5 class='modal-title' id='myModalLabel'>book" . htmlentities($this->h2, ENT_COMPAT, 'utf-8') .
            "</strong> Categ :" . htmlentities($this->h3, ENT_COMPAT, 'utf-8') . "</strong></h5>";
        $output .= "            </div>";
        $output .= "            <div class='modal-body'>";


        $output .= "<div class='tabbable'> <!-- Only required for left/right tabs -->
        <ul class='nav nav-tabs'>
            <li class='active'><a href='#tab1' data-toggle='tab'>About Book</a></li>
            <li><a href='#tab2' data-toggle='tab'>About Author</a></li>
        </ul>
        <div class='tab-content'>
            <div class='tab-pane active' id='tab1'>
                <p>{$this->about_book}</p>
            </div>
            <div class='tab-pane' id='tab2'>
                 <p>{$this->about_author}</p>
            </div>
        </div>
    </div>";


//        $output .= "<h3>About Book</h3>";
//        $output .= $this->about_book;

//        $output .= "<h3>About Author</h3>";

//        $output .= $this->about_author;


        $class = "&id=";
        $relative = "/public/admin/crud/ajax/";
        $p_edit = self::$page_edit . $class; //  $relative ."edit_ajax.php".$class;
        $p_del = self::$page_delete . $class; //  $relative . "delete_ajax.php".$class;
        $p_new = self::$page_new . $class; //  $relative . "new_ajax.php".$class ;

        $output .= "<div class='container-fluid text-left'> ";


        $output .= "</div>";


        $output .= "            </div>";

        $style_width_button = "style='width: 6em;'";


        $output .= "            <div class='modal-footer'>";
        $output .= "                <div class='btn-group btn-group-justified' role='group' aria-label='...'>";
        $output .= "                <p class='btn'  ><a class='btn btn-primary btn-xm' {$style_width_button} href='{$p_edit}" . urlencode($this->id) . "'>Edit</a></p>";
        $output .= "                <p class='btn'><a class='btn btn-danger btn-xm' {$style_width_button} href='{$p_del}" . urlencode($this->id) . "'>Delete</a></p>";
        $output .= "                <p class='btn' ><a class='btn btn-success btn-xm' {$style_width_button} href='{$p_new}" . urlencode($this->id) . "'>add</a></p>";

        $output .= "                <p class='btn' data-dismiss='modal'><a class=' btn btn-info btn-xm' {$style_width_button}>close</a> </p>";

        $output .= "                </div>";


        $output .= "            </div>";
        $output .= "        </div>";
        $output .= "    </div>";
        $output .= "</div>";


        return $output;
    }


    public function set_up_display()
    {
        $BookCategory = BookCategory::find_by_id($this->category_id);
        $this->category = $BookCategory->category;

//        $str_tags= strip_tags($this->article) ;
//        $arr=str_word_count($str_tags,10);
//        $this->article_short= implode(" ",$arr);

//        $this->article_short = implode(' ', array_slice(explode(' ', strip_tags($this->article)), 0, 5));;

//        $this->article_short=self::get_modal_article();
        $this->about_book = trim($this->about_book);
        $this->about_author = trim($this->about_author);

        $this->about = $this->get_modal();

        if (!empty($this->apress_link)) {
            $this->apress = "<a target='_blank' href='{$this->apress_link}'>lnk</a>";
        }

        if (!empty($this->download_source_link)) {
            $this->download_source = "<a class='btn btn-primary' target='_blank' href='{$this->download_source_link}'>lnk</a>";
        }


//        $this->link_short = implode(' ', array_slice(explode(' ', $this->link), 0, 5));

    }


}
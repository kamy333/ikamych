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

    public static $fields_numeric = array('id', 'likes', 'is_row', 'num_column', 'num_offset');
    public static $get_form_element = array('subject_id', 'rank', 'link_txt', 'link', 'photo', 'h3', 'article', 'is_row', 'num_column', 'num_offset', 'likes', 'comment', 'input_date');
    public static $get_form_element_others = array();
    public static $form_default_value = array(
        "input_date" => 'nowtime()',
        "likes" => 0,
        "subject_id" => 1,
        "rank" => 1000,
        "is_row" => 0,
        "num_column" => 9,
        "num_offset" => 0

    );
    public static $db_field_search = array('search_all', 'chat', 'download_csv');
    public static $form_user_id;

    public static $page_name = "Article";

//    public static $page_manage = "manage_article.php";
//    public static $page_new = "new_article.php";
//    public static $page_edit = "edit_article.php";
//    public static $page_delete = "delete_article.php";


//    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=" .__CLASS__;
//    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=" .__CLASS__;
//    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=" .__CLASS__;
//    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=" .__CLASS__;

    public static $position_table = "positionBoth"; // positionLeft // positionBoth  positionRight


    protected static $table_name = "article";
    protected static $db_fields = array('id', 'rank', 'subject_id', 'link_txt', 'link', 'photo', 'h3', 'article', 'likes', 'is_row', 'num_column', 'num_offset', 'comment', 'input_date');
    protected static $required_fields = array('article',);
    protected static $db_field_exclude_table_display_sort = array('subject', 'article_short', 'link_short');

    protected static $db_fields_table_display_short = array('id', 'rank', 'subject', 'link_txt', 'link_short', 'photo', 'h3', 'article_short');
    protected static $db_fields_table_display_full = array('id', 'rank', 'subject_id', 'subject', 'link_txt', 'link', 'photo', 'h3', 'article', 'likes', 'is_row', 'num_column', 'num_offset', 'comment', 'input_date');
    protected static $form_properties = array(
        "rank" => array("type" => "number",
            "name" => 'rank',
            "label_text" => "Rank",
            'min' => 0,
            "placeholder" => "a number to sort",
            "required" => true,
        ),


        "subject_id" => array("type" => "select",
            "name" => 'subject_id',
            "class" => "ArticleSubject",
            "label_text" => "Subject",
            'field_option_0' => "id",
            'field_option_1' => "subject",
            "required" => true,
        ),


        "photo" => array("type" => "file",
            "name" => 'photo',
            "label_text" => "photo",
            "required" => false,
            "autocomplete" => "off",

        ),
        "link_txt" => array("type" => "text",
            "name" => 'link_txt',
            "label_text" => "Link text",
            "placeholder" => "Link text",
            "required" => false,
        ),
        "h3" => array("type" => "text",
            "name" => 'h3',
            "label_text" => "h3",
            "placeholder" => "Header",
            "required" => false,
        ),


        "link" => array("type" => "url",
            "name" => 'link',
            "label_text" => "Link",
            "placeholder" => "Website Address",
            "required" => false,
        ),
        "likes" => array("type" => "number",
            "name" => 'likes',
            "label_text" => "Likes",
            'min' => 0,
            "placeholder" => "Likes",
            "required" => false,
        ),
        "article" => array("type" => "textarea",
            "name" => 'article',
            "label_text" => "Article",
            "placeholder" => "Article here",
            "rows" => 5,
            "cols" => 5,
            "required" => true,
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
        "subject_id" => array("type" => "select",
            "name" => 'subject_id',
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
    public $subject_id;
    public $subject;
    public $link_txt;
    public $link;
    public $link_short;

    public $photo;
    public $article;
    public $article_short;
    public $likes;
    public $comment;
    public $input_date;
    public $rank;
    public $is_row;
    public $num_column;
    public $num_offset;
    public $h3;



    public static function table_nav_additional()
    {
        $output = "</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . static::$page_new . "\">Add Article Ajax" . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . ArticleSubject::$page_manage . "\"> Subject " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-beige\"  href='/public/_f/article/articles.php?ArticleSubject=1&submitArticleSubject=Submit'>Articles " . " </a><span>&nbsp;</span>";
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


    function get_modal_article()
    {

        // modal

//        $article = self::find_by_id($this->id);


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
        $output .= "                <h5 class='modal-title' id='myModalLabel'>article" . htmlentities($this->h3, ENT_COMPAT, 'utf-8') .
            "</strong> Categ :" . htmlentities($this->h3, ENT_COMPAT, 'utf-8') . "</strong></h5>";
        $output .= "            </div>";
        $output .= "            <div class='modal-body'>";


        $output .= $this->article;


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
        $output .= "                <p class='btn'  ><a class='btn btn-primary btn-xm'{$style_width_button } href='{$p_edit}" . urlencode($this->id) . "'>Edit</a></p>";
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
        $ArticleSubject = ArticleSubject::find_by_id($this->subject_id);
        $this->subject = $ArticleSubject->subject;

//        $str_tags= strip_tags($this->article) ;
//        $arr=str_word_count($str_tags,10);
//        $this->article_short= implode(" ",$arr);

//        $this->article_short = implode(' ', array_slice(explode(' ', strip_tags($this->article)), 0, 5));;

        $this->article_short = self::get_modal_article();

        if (!empty($this->link)) {
            $this->link_short = "<a target='_blank' href='{$this->link}'>lnk</a>";

        }


//        $this->link_short = implode(' ', array_slice(explode(' ', $this->link), 0, 5));

    }


}
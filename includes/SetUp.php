<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */
//protected static $db_fields = array('','','','','','','','','','');

class SetUp extends DatabaseObject {
    protected static $table_name="setup";
    protected static $db_fields = array('id', 'send_email_loan', 'comment');
    protected static $required_fields =  array('send_email_loan');

    protected static $db_fields_table_display_short = array('id','send_email_loan',  'comment');

    protected static $db_fields_table_display_full = array('id','send_email_loan',  'comment');

    protected static $db_field_exclude_table_display_sort = null;

    public static $fields_numeric=array('id',);

    public static $get_form_element = array('send_email_loan', 'comment');
    public static $get_form_element_others = array();

    public static $form_default_value=array(
        "rank"=>"1",
        "side"=>"0"
    );


    protected static $form_properties= array(

        "send_email_loan" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Positif Negatif",
                    "name"=>"side",
                    "label_radio"=>"Positif ",
                    "value"=>"1",
                    "id"=>"side_positif",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "Positif Negatif",
                    "name" => "side",
                    "label_radio" => "Negatif",
                    "value" => "-1",
                    "id" => "side_negative",
                    "default" => true)),
        ),
    );

    protected static $form_properties_search=array(
        "search_all"=> array("type"=>"text",
            "name"=>'search_all',
            "label_text"=>"",
            "placeholder"=>"Search all",
            "required" =>false,
        ),

        "send_email_loan"=> array("type"=>"select",
            "name"=>'search_expense_type',
            "id"=>"search_expense_type",
            "class"=>"SetUp",
            "label_text"=>"",
            "select_option_text"=>'SetUp',
            'field_option_0'=>"SetUp",
            'field_option_1'=>"SetUp",
            "required" =>false,
        ),
        "rank"=> array("type"=>"select",
            "name"=>'rank',
            "id"=>"search_rank",
            "class"=>"MyExpenseType",
            "label_text"=>"",
            "select_option_text"=>'rank',
            'field_option_0'=>"rank",
            'field_option_1'=>"rank",
            "required" =>false,
        ),
        "download_csv" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Dnld csv",
                    "name"=>"download_csv",
                    "label_radio"=>"non",
                    "value"=>"No",
                    "id"=>"visible_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Dnld csv",
                    "name"=>"download_csv",
                    "label_radio"=>"oui",
                    "value"=>"Yes",
                    "id"=>"visible_yes",
                    "default" => true)),
        ),

    );


    public static $db_field_search = array('search_all', 'send_email_loan', 'download_csv');


    public static $page_name = "SetUp";
//    public static $page_manage="manage_MyExpenseType.php";
//    public static $page_new="new_MyExpenseType.php";
//    public static $page_edit="edit_MyExpenseType.php";
//    public static $page_delete="delete_MyExpenseType.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=SetUp"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=SetUp"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=SetUp"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=SetUp"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = array();


    public static $per_page;


    public $id;
    public $send_email_loan;

    public static function Get_full_path(){
       return $_SERVER["DOCUMENT_ROOT"]."/SetUp/test.xml";
    }


    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
        return $valid;



    }

    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". SetUp::$page_new ."\">Add New SetUp ". " </a><span>&nbsp;</span>";

        return $output;
    }


    public function create_xml(){

        $full_path=static::Get_full_path();
        $xml = new DOMDocument();
        $xml_album = $xml->createElement("Album");
        $xml_track = $xml->createElement("Track");
        $xml_album->appendChild( $xml_track );
        $xml->appendChild( $xml_album );

        $xml->save($full_path);
    }


    public function append_xml(){

        $full_path=static::Get_full_path();

        $xml = new DOMDocument();
        $xml->load($full_path);
        $nodes = $xml->getElementsByTagName('Album') ;
        if ($nodes->length > 0) {
            //insert some stuff using appendChild()
        }

//re-save
        $xml->save($full_path);
    }

public function create_xml2(){

    $full_path=static::Get_full_path();

//    $dom = new MyDOMDocument();
//    $implementation = new DOMImplementation();
//    $dom->appendChild($implementation->createDocumentType('example'));
//    $dom->appendChild($dom->createElement('foo'));

//    echo $dom->saveXml();
    $path =$_SERVER["DOCUMENT_ROOT"]. '/SetUp/library.dtd';

    $dom = new DOMDocument('1.0', 'utf-8');
    $implementation = new DOMImplementation();
//    $dom->appendChild($implementation->createDocumentType('SetUps',null,'library.dtd'));
    $dom->appendChild($implementation->createDocumentType('SetUps'));


// convert file contents into a filename

// ...

// Creates a DOMDocumentType instance





    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;

//create the main tags, without values
    $books = $dom->createElement('SetUps');
    $book_1 = $dom->createElement('SetUp');

// create some tags with values
    $name_1 = $dom->createElement('send_email_loan', 'Yes');

//create the second tag book with different namespace
//    $namespace = 'www.example.com/libraryns/1.0';

//include the namespace prefix in the books tag
//    $books->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:ns', $namespace);


//create the XML structure
    $books->appendChild($book_1);
    $book_1->appendChild($name_1);

    $dom->appendChild($books);

//saveXML() method returns the XML in a String

    $dom->save($full_path);
    print_r ($dom->saveXML());
}


public function read_xml(){

    $full_path=static::Get_full_path();

    $xmlDoc = new DOMDocument();
    $xmlDoc->load($full_path);

    $x = $xmlDoc->documentElement;
    foreach ($x->childNodes AS $item) {
        print $item->nodeName . " = " . $item->nodeValue . "<br>";
    }

    $tns = 'send_email_loan';

    foreach ($xmlDoc->getElementsByTagNameNS($tns, "send_email_loan") as $node) {
        var_dump($node->textContent);
    }

}


}
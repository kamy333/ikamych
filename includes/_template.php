<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 9/20/2015
 * Time: 11:16 PM
 */
class MyClass extends DatabaseObject{

    protected static $table_name="";

    protected static $db_fields = array('','', '','','', '','','','', '','','','','');

    protected static $required_fields = array('','', '','','', '','','','', '','','','','');

    protected static $db_fields_table_display_short = array('','', '','','', '','','','', '','','','','');

    protected static $db_fields_table_display_full = array('','', '','','', '','','','', '','','','','');

    protected static $db_field_exclude_table_display_sort=array('','', '','','','','');

    protected static $db_field_include_table_display_sort=array(
        'link'=>'web_address','prog'=>'progress','todos'=>'todo','due_on'=>'due_date');

    public static $fields_numeric=array('','', '','','', '','','','', '','','','','');

    protected static $form_properties= array(
        "project_id"=> array("type"=>"select",
            "name"=>'project_id',
            "class"=>"Project",
            "label_text"=>"Project",
            "select_option_text"=>'Project Code',
            'field_option_0'=>"id",
            'field_option_1'=>"project_code",
            "required" =>true,
        ),
        "start_date"=> array("type"=>"date",
            "name"=>'start_date',
            "label_text"=>"Start Date",
            "placeholder"=>"Input Start Date",
            "required" =>true,
        ),
        "quantity"=> array("type"=>"number",
            "name"=>'quantity',
            "label_text"=>"Quantity",
            'min'=>1,
            "placeholder"=>"Quantity",
            "required" =>true,
        ),
        "company_unit_price"=> array("type"=>"number",
            "name"=>'company_unit_price',
            "id"=>"company_unit_price",
            "label_text"=>"company unit price",
            'min'=>0,
            "placeholder"=>"Price per company Quantity",
            "required" =>true,
        ),
        "category_id"=> array("type"=>"select",
            "name"=>'category_id',
            "id"=>"category_id",
            "class"=>"Category",
            "label_text"=>"Category",
            'field_option_0'=>"id",
            'field_option_1'=>"category",
            "required" =>true,
            "onchange"=>"myfunction(this)"
        ),

        "ref_upload"=> array("type"=>"img",
            "name"=>'ref_upload',
            "label_text"=>"upload",
            "placeholder"=>"input category_1",
            "required" =>true,
        ),
        "comment"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"Comment",
            "placeholder"=>"input Comment",
            "required" =>false,
        ),
    );

    protected static $form_properties_search= array(
        "search_all"=> array("type"=>"text",
            "name"=>'search_all',
            "label_text"=>"",
            "placeholder"=>"Search all",
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
                    "default"=>true)),
        ),
        "id"=> array("type"=>"number",
            "name"=>'id',
            "id"=>"search_id",
            "label_text"=>"",
            'min'=>0,
            "placeholder"=>"ID",
            "required" =>false,
        ),
        "project_code"=> array("type"=>"select",
            "name"=>'project_code',
            "id"=>"search_project_code",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'Project Code',
            'field_option_0'=>"project_code",
            'field_option_1'=>"project_code",
            "required" =>false,
        ),
        "start_date"=> array("type"=>"select",
            "name"=>'start_date',
            "id"=>"search_start_date",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'start_date',
            'field_option_0'=>"start_date",
            'field_option_1'=>"start_date",
            "required" =>false,
        ),
        "end_date"=> array("type"=>"select",
            "name"=>'end_date',
            "id"=>"search_end_date",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'end_date',
            'field_option_0'=>"end_date",
            'field_option_1'=>"end_date",
            "required" =>false,
        ),

        "category"=> array("type"=>"select",
            "name"=>'category',
            "id"=>"search_category",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'Category',
            'field_option_0'=>"category",
            'field_option_1'=>"category",
            "required" =>false,
        ),
        "unit_price"=> array("type"=>"select",
            "name"=>'unit_price',
            "id"=>"search_unit_price",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'Unit price',
            'field_option_0'=>"unit_price",
            'field_option_1'=>"unit_price",
            "required" =>false,
        ),
        "company_unit_price"=> array("type"=>"select",
            "name"=>'company_unit_price',
            "id"=>"search_company_unit_price",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'Company unit price',
            'field_option_0'=>"company_unit_price",
            'field_option_1'=>"company_unit_price",
            "required" =>false,
        ),
        "invoice_id"=> array("type"=>"select",
            "name"=>'invoice_id',
            "id"=>"search_invoice_id",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'Invoice ID',
            'field_option_0'=>"invoice_id",
            'field_option_1'=>"invoice_id",
            "required" =>false,
        ),
        "invoiced"=> array("type"=>"select",
            "name"=>'invoiced',
            "id"=>"search_invoiced",
            "class"=>"InvoiceActual",
            "label_text"=>"",
            "select_option_text"=>'Invoiced?',
            'field_option_0'=>"invoiced",
            'field_option_1'=>"invoiced",
            "required" =>false,
        ),


    );

    public static $db_field_search =array('search_all','project_id', 'project_code','start_date','end_date', 'quantity', 'category','ref_upload','invoice_id','invoiced','unit_price','company_unit_price','download_csv');


    public static $page_name="Invoice Actual";
    public static $page_manage="manage_invoice_actual.php";
    public static $page_new="new_invoice_actual.php";
    public static $page_edit="edit_invoice_actual.php";
    public static $page_delete="delete_invoice_actual.php";

    public static $per_page;



    public $id;
    public $project_id;
    public $project_code;
    public $start_date;
    public $end_date;
    public $quantity;

    public $category_id;
    public $category;
    public $ref_upload;
    public $comment;
    public $invoice_id;
    public $invoiced;


    public $category_1_id;
    public $category_2_id;
    public $category_1;
    public $category_2;

    public $unit_price;
    public $company_unit_price;
    public $price;
    public $price_company;

    public $vat;
    public $price_estimate;


    protected function set_up_display(){


        if (isset($this->category_id)) {
            $category = Category::find_by_id((int)$this->category_id);
            $this->category = $category->category;
            //    $this->unit_price = $category->unit_price;
            $this->price=$this->unit_price * $this->quantity;
            $this->price_company=$this->company_unit_price * $this->quantity;

            if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {

                $formatter = new NumberFormatter('en_CH', NumberFormatter::CURRENCY);
                $this->price=$formatter->formatCurrency($this->price, 'CHF');
                $this->price_company=$formatter->formatCurrency($this->price_company, 'CHF');
//    $this->unit_price=$formatter->formatCurrency($this->unit_price, 'CHF');
//    $this->company_unit_price=$formatter->formatCurrency($this->company_unit_price, 'CHF');

            }

        }

        if (isset($this->project_id)) {
            $project = Project::find_by_id((int)$this->project_id);
            $this->project_code = $project->project_code;
        }


    }

    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;

        $valid->is_numeric('quantity',array('min'=>1));

        $valid->validate_Date('start_date');

        if(!empty($this->end_date) ||!$this->end_date){
            $valid->validate_Date('end_date');

            if($this->end_date<$this->start_date){
                $valid->errors['date Dif'] = " End Date cannot be before Start Date";
            }
        }


        return $valid;

    }



}
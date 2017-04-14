<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 11/14/2015
 * Time: 4:20 AM
 */


class InvoiceSend extends DatabaseObject
{

    protected static $table_name="invoice_send";

    protected static $db_fields = array('id','project_id','project_code','invoice_date','gross_amount','amount','vat','canceled','status','payment_date');

    protected static $required_fields = array('project_id','invoice_date','gross_amount','vat','amount');


    protected static $db_fields_table_display_short = array('id','project_id','project_code','invoice_date','gross_amount','vat','amount','canceled','status','payment_date');

    protected static $db_fields_table_display_full = array('id','project_id','project_code','invoice_date','gross_amount','vat','amount','canceled','status','payment_date');

    protected static $db_field_exclude_table_display_sort=array();

    public static $fields_numeric=array('id','project_id','gross_amount','vat','amount','company_unit_price','category_id');

    public static $get_form_element=array('project_code','invoice_date','payment_date','gross_amount','vat','amount','canceled','status');

   public static $get_form_element_others=array();

    public static $form_default_value=array(
        "invoice_date"=>"now()",
        "canceled"=>"No",
        "vat"=>8.5,
        "status"=>"prepared"
    );
    
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
        "invoice_date"=> array("type"=>"date",
            "name"=>'invoice_date',
            "label_text"=>"Invoice Date",
            "placeholder"=>"Input Invoice Date",
            "required" =>true,
        ),
        "gross_amount"=> array("type"=>"number",
            "name"=>'gross_amount',
            "id"=>"gross_amount",
            "label_text"=>"Gross Amount",
            'min'=>0,
            "placeholder"=>"Amount No Vat",
            "required" =>true,
        ),
        "vat"=> array("type"=>"number",
            "name"=>'vat',
            "id"=>"vat",
            "label_text"=>"Vat",
            'min'=>0,
            "placeholder"=>"Vat",
            "required" =>true,
        ),
        "amount"=> array("type"=>"number",
            "name"=>'amount',
            "id"=>"amount",
            "label_text"=>"Amount",
            'min'=>0,
            "placeholder"=>"Amount",
            "required" =>false,
        ),

        "canceled" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"canceled",
                    "name"=>"canceled",
                    "label_radio"=>"non",
                    "value"=>"No",
                    "id"=>"visible_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"canceled",
                    "name"=>"canceled",
                    "label_radio"=>"oui",
                    "value"=>"Yes",
                    "id"=>"visible_yes",
                    "default"=>false)),
        ),

        "status" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"status",
                    "name"=>"status",
                    "label_radio"=>"Prepared",
                    "value"=>"prepared",
                    "id"=>"status_prepared",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"status",
                    "name"=>"status",
                    "label_radio"=>"Send",
                    "value"=>"send",
                    "id"=>"status_send",
                    "default"=>false)),
            array(2,
                array(
                    "label_all"=>"status",
                    "name"=>"status",
                    "label_radio"=>"Paid",
                    "value"=>"paid",
                    "id"=>"status_paid",
                    "default"=>false)),
            array(3,
                array(
                    "label_all"=>"status",
                    "name"=>"status",
                    "label_radio"=>"Partially Paid",
                    "value"=>"partially_paid",
                    "id"=>"status_partially_paid",
                    "default"=>false)),

        ),
        "payment_date"=> array("type"=>"date",
            "name"=>'payment_date',
            "label_text"=>"Payment Date",
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
                    "label_radio"=>"No",
                    "value"=>"No",
                    "id"=>"visible_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Dnld csv",
                    "name"=>"download_csv",
                    "label_radio"=>"Yes",
                    "value"=>"Yes",
                    "id"=>"visible_yes",
                    "default"=>true)),
        ),

        "project_code"=> array("type"=>"select",
            "name"=>'project_code',
            "id"=>"search_project_code",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'Project Code',
            'field_option_0'=>"project_code",
            'field_option_1'=>"project_code",
            "required" =>false,
        ),
        "invoice_date"=> array("type"=>"select",
            "name"=>'invoice_date',
            "id"=>"search_invoice_date",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'Invoice Date',
            'field_option_0'=>"invoice_date",
            'field_option_1'=>"invoice_date",
            "required" =>false,
        ),
        "gross_amount"=> array("type"=>"select",
            "name"=>'igross_amount',
            "id"=>"search_gross_amount",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'gross_amount',
            'field_option_0'=>"gross_amount",
            'field_option_1'=>"gross_amount",
            "required" =>false,
        ),
        "vat"=> array("type"=>"select",
            "name"=>'vat',
            "id"=>"search_vat",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'VAT',
            'field_option_0'=>"vat",
            'field_option_1'=>"vat",
            "required" =>false,
        ),
        "amount"=> array("type"=>"select",
            "name"=>'amount',
            "id"=>"search_amount",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'gross_amount',
            'field_option_0'=>"amount",
            'field_option_1'=>"amount",
            "required" =>false,
        ),
        "canceled"=> array("type"=>"select",
            "name"=>'canceled',
            "id"=>"search_canceled",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'canceled',
            'field_option_0'=>"canceled",
            'field_option_1'=>"canceled",
            "required" =>false,
        ),
        "status"=> array("type"=>"select",
            "name"=>'status',
            "id"=>"search_status",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'status',
            'field_option_0'=>"status",
            'field_option_1'=>"status",
            "required" =>false,
        ),
        "payment_date"=> array("type"=>"select",
            "name"=>'payment_date',
            "id"=>"search_payment_date",
            "class"=>"InvoiceSend",
            "label_text"=>"",
            "select_option_text"=>'payment_date',
            'field_option_0'=>"payment_date",
            'field_option_1'=>"payment_date",
            "required" =>false,
        ),
    );

    public static $db_field_search =array('search_all','project_id', 'project_code','invoice_date', 'gross_amount', 'vat','amount','canceled','status','payment_date','download_csv');


    public static $page_name="Invoice send";
    public static $page_manage="manage_invoice_send.php";
    public static $page_new="new_invoice_send.php";
    public static $page_edit="edit_invoice_send.php";
    public static $page_delete="delete_invoice_send.php";

    public static $per_page;

public $id  ;
public $project_id  ;
public $project_code  ;
public $invoice_date  ;
public $gross_amount  ;
public $vat  ;
public $amount  ;
public $canceled  ;
public $status  ;
public $payment_date  ;


    protected function set_up_display(){




        if (isset($this->project_id)) {
            $project = Project::find_by_id((int)$this->project_id);
            $this->project_code = $project->project_code;
        }


    }

    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;

        $valid->is_numeric('gross_amount',array());
        $valid->is_numeric('vat',array());
        $valid->is_numeric('amount',array());


        $valid->validate_Date('invoice_date');

        $valid->validate_Date('payment_date');


        if(!empty($this->payment_date) ||!$this->payment_date){
            $valid->validate_Date('payment_date');

            if($this->payment_date<$this->invoice_date){
                $valid->errors['date Dif'] = " payment_date cannot be before invoice_date";
            }
        }


        return $valid;

    }









}
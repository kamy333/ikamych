<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 9/20/2015
 * Time: 11:14 PM
 */
class InvoiceEstimate extends DatabaseObject {
//todo

    protected static $table_name="invoice_estimate";
    protected static $db_fields = array('id', 'estimate_no', 'project_id', 'project_code','start_date','end_date','quantity','category_id', 'category','category_1_id','category_1','category_2_id','category_2','ref_upload','comment');

    public $id;
    public $estimate_no;
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
    public $price;
    public $vat;
    public $price_estimate;


}
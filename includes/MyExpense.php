<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */
//protected static $db_fields = array('','','','','','','','','','');

class MyExpense extends DatabaseObject {
    protected static $table_name="myexpense";

// 'currency_id','Account','debitor','creditor'

    protected static $db_fields = array('id','amount','ccy_id','rate','person_id','expense_type_id','expense_date','comment','modification_time');

    protected static $required_fields = array('amount','ccy_id','person_id','expense_type_id','expense_date');

    protected static $db_fields_table_display_short = array('id','amount','amountCHF','ccy_id','currency','rate','person_id','person_name','expense_type_id','expense_type','expense_date');

    protected static $db_fields_table_display_full = array('id','amount','amountCHF','currency','rate','person_id','person_name','expense_type_id','expense_type','expense_date','comment','modification_time');

    protected static $db_field_exclude_table_display_sort=array('amountCHF');

    protected static $db_field_include_table_display_sort=array(
        'person_name'=>'person_id','expense_type'=>'expense_type_id','currency'=>'ccy_id');

    public static $fields_numeric=array('id','amount','amountCHF','person_id','expense_type_id','ccy_id','rate');
    public static $fields_numeric_format=array('amount','amountCHF');

    public static $get_form_element=array('amount','ccy_id','rate','expense_date','person_id','expense_type_id','comment','modification_time');

    public static $get_form_element_others=array();

    public static $form_default_value=array(
        "expense_date"=>"now()",
        "modification_time"=>"nowtime()",
        "amount"=>"0",
        "ccy_id"=>"1",
//        "currency"=>"CHF",
        "rate"=>"1"
        
    );



    protected static $form_properties= array(

        "amount"=> array("type"=>"number",
            "name"=>'amount',
            "label_text"=>"Amount",
            'min'=>0,
            "placeholder"=>"Amount",
            "step"=>"0.01",
            "required" =>true,
        ),
        "ccy_id"=> array("type"=>"select",
            "name"=>'ccy_id',
            "class"=>"Currency",
            "label_text"=>"Currency",
            "select_option_text"=>'Currency',
            'field_option_0'=>"id",
            'field_option_1'=>"currency",
            "required" =>true,
        ),
        "rate"=> array("type"=>"number",
            "name"=>'rate',
            "id"=>"rate",
            "label_text"=>"Rate",
            'min'=>0,
            "placeholder"=>"Rate to CHF",
            "required" =>false,
            "step"=>"0.00001"
        ),
        "person_id"=> array("type"=>"select",
            "name"=>'person_id',
            "class"=>"MyExpensePerson",
            "label_text"=>"Person Name ID",
            "select_option_text"=>'Person Name',
            'field_option_0'=>"id",
            'field_option_1'=>"person_name",
            "required" =>true,
        ),
//        "person_name"=> array("type"=>"select",
//            "name"=>'person_name',
//            "class"=>"MyExpensePerson",
//            "label_text"=>"Person Name",
//            "select_option_text"=>'Person Name',
//            'field_option_0'=>"person_name",
//            'field_option_1'=>"person_name",
//            "required" =>true,
//        ),
        "expense_type_id"=> array("type"=>"select",
            "name"=>'expense_type_id',
            "class"=>"MyExpenseType",
            "label_text"=>"Expense Type",
            "select_option_text"=>'Expense Type',
            'field_option_0'=>"id",
            'field_option_1'=>"expense_type",
            "required" =>true,
        ),
//        "expense_type"=> array("type"=>"select",
//            "name"=>'expense_type',
//            "class"=>"MyExpenseType",
//            "label_text"=>"Expense Type",
//            "select_option_text"=>'Expense Type',
//            'field_option_0'=>"expense_type",
//            'field_option_1'=>"expense_type",
//            "required" =>true,
//        ),
        "expense_date"=> array("type"=>"date",
            "name"=>'expense_date',
            "label_text"=>"Expense Date",
            "placeholder"=>"Input Date",
            "required" =>true,
        ),
        "comment"=> array("type"=>"textarea",
            "name"=>'comment',
            "label_text"=>"Comment",
            "placeholder"=>"input Comment",
            "required" =>false,
        ),
        "modification_time"=> array("type"=>"datetime",
            "name"=>'modification_time',
            "label_text"=>"modification_time",
            "placeholder"=>"modification_time",
            "required" =>true,
        ),
    );

    protected static $form_properties_search=array(
        "search_all"=> array("type"=>"text",
            "name"=>'search_all',
            "label_text"=>"",
            "placeholder"=>"Search all",
            "required" =>false,
        ),
        "person_id"=> array("type"=>"select",
            "name"=>'person_id',
            "id"=>"search_person_id",
            "class"=>"MyExpensePerson",
            "label_text"=>"",
            "select_option_text"=>'Person Name',
            'field_option_0'=>"id",
            'field_option_1'=>"person_name",
            "required" =>false,
        ),
        "amount"=> array("type"=>"select",
            "name"=>'amount',
            "id"=>"search_amount",
            "class"=>"MyExpense",
            "label_text"=>"",
            "select_option_text"=>'Amount',
            'field_option_0'=>"amount",
            'field_option_1'=>"amount",
            "required" =>false,
        ),

        "ccy_id"=> array("type"=>"select",
            "name"=>'ccy_id',
            "id"=>"search_ccy_id",
            "class"=>"Currency",
            "label_text"=>"Currency",
            "select_option_text"=>'Currency',
            'field_option_0'=>"id",
            'field_option_1'=>"currency",
            "required" =>false,
        ),

        "rate"=> array("type"=>"number",
            "name"=>'rate',
            "id"=>"rate",
            "label_text"=>"Rate",
            'min'=>0,
            "placeholder"=>"Rate to CHF",
            "required" =>false,
        ),

        "expense_type_id"=> array("type"=>"select",
            "name"=>'expense_type_id',
            "id"=>"search_expense_type",
            "class"=>"MyExpenseType",
            "label_text"=>"",
            "select_option_text"=>'Expense type',
            'field_option_0'=>"id",
            'field_option_1'=>"expense_type",
            "required" =>false,
        ),
        "expense_date"=> array("type"=>"select",
            "name"=>'expense_date',
            "id"=>"search_expense_date",
            "class"=>"MyExpense",
            "label_text"=>"",
            "select_option_text"=>'Expense type',
            'field_option_0'=>"expense_date",
            'field_option_1'=>"expense_date",
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


    public static $db_field_search = array('search_all', 'amount', 'ccy_id', 'person_id', 'expense_type_id', 'expense_date', 'comment', 'download_csv');


    public static $page_name = "Expense Loan";
//    public static $page_manage="manage_MyExpense.php";
//    public static $page_new="new_MyExpense.php";
//    public static $page_edit="edit_MyExpense.php";
//    public static $page_delete="delete_MyExpense.php";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyExpense"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyExpense"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = array('MyExpensePerson', 'MyExpenseType');


    public static $per_page;


    public $id;
    public $amount;
    public $amountCHF;
    public $person_id;
    public $person_name;
    public $expense_type;
    public $expense_type_id;
    public $expense_date;
    public $comment;
    public $modification_time;
    public $currency;
    public $ccy_id;
    public $rate;


    public $itemsCount;
    public $total;
    public $side;

    public static function by_person()
    {
        $output = "";
        array_push(static::$db_fields, 'total', 'itemsCount', 'amountCHF');
        $table = static::$table_name;
        $sql = "SELECT 
    person_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF 
    
FROM
    $table
    
     
GROUP BY person_id;";


        $table_class = Table::full_table_class();

        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>Name" . "</th>
                          <th class='text-center'>No Items" . "</th>
                          <th class='text-center'>Total CHF" . "</th>
                          </tr>";

        $results = static::find_by_sql($sql);
        if ($results) {

            foreach ($results as $result) {

                $myperson = MyExpensePerson::find_by_id($result->person_id);
                $person = $myperson->person_name;

                $output .= "<tr>";
                $output .= "<td class='text-center'>{$person}</td>";
                $output .= "<td class='text-center'>{$result->itemsCount}</td>";
                $output .= "<td class='text-right'>" . number_format($result->amountCHF, 2) . "</td>";
                $output .= "</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $sum = number_format(static::sum_field_where($field = "amount * rate"), 2);

        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 1);
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "</tr>";

        $output .= "</table>";
        return $output;
    }

    public static function by_person_pret_Rbt()
    {
        $output = "";
        array_push(static::$db_fields, 'total', 'itemsCount', 'amountCHF');
        $table = static::$table_name;
        $sql = "SELECT 
    person_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF 
    
FROM
    $table
    
 WHERE  (expense_type_id=1 or expense_type_id=3) and person_id !=6   
GROUP BY person_id;";


        $table_class = Table::full_table_class();

        $output.="<table class='$table_class '>";
        $output.="<tr>
                          <th class='text-center'>Name"."</th>
                          <th class='text-center'>No Items"."</th>
                          <th class='text-center'>Total CHF"."</th>
                          </tr>";

        $results= static::find_by_sql($sql);
        if($results){

            foreach($results as $result){

                $myperson=MyExpensePerson::find_by_id($result->person_id);
                $person=$myperson->person_name;

                $output.="<tr>";
                $output.="<td class='text-center'>{$person}</td>";
                $output.="<td class='text-center'>{$result->itemsCount}</td>";
                $output.="<td class='text-right'>".number_format($result->amountCHF,2)."</td>";
                $output.="</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $sum=number_format(static ::sum_field_where($field="amount * rate"),2);

        $output.="<tr>";
        $output.="<td class='text-center'><strong>Total</strong></td>";
        $output.=str_repeat("<td></td>", 1);
        $output.="<td class='text-right'><strong>".$sum."</strong></td>";
        $output.="</tr>";

        $output.="</table>";
        return $output;
    }


    public static function by_person_receivable()
    {
        $output="";
        array_push(static::$db_fields,'total','itemsCount','amountCHF');
        $table=static::$table_name;
        $sql="SELECT 
    person_id,
    COUNT($table.id) AS itemsCount,
    SUM($table.amount) AS amount,
    SUM($table.amount * $table.rate) AS amountCHF
FROM
    $table
    LEFT JOIN myexpense_type
ON $table.expense_type_id = myexpense_type.id 
 WHERE   myexpense_type.expense_type=\"Pret\" or myexpense_type.expense_type=\"Rbt\" 
GROUP BY $table.person_id;";



        $table_class=Table::full_table_class();

        $output.="<table class='$table_class '>";
        $output.="<tr>
                          <th class='text-center'>Name"."</th>
                          <th class='text-center'>No Items"."</th>
                          <th class='text-center'>Total CHF"."</th>
                          </tr>";

        $results= static::find_by_sql($sql);
        if($results){

            foreach($results as $result){

                $myperson=MyExpensePerson::find_by_id($result->person_id);
                $person=$myperson->person_name;

                $output.="<tr>";
                $output.="<td class='text-center'>{$person}</td>";
                $output.="<td class='text-center'>{$result->itemsCount}</td>";
                $output.="<td class='text-right'>".number_format($result->amountCHF,2)."</td>";
                $output.="</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $where=" WHERE expense_type_id=1 OR expense_type_id=3 ";
        $sum=number_format(static ::sum_field_where($field="amount * rate",$where),2);

        $output.="<tr>";
        $output.="<td class='text-center'><strong>Total</strong></td>";
        $output.=str_repeat("<td></td>", 1);
        $output.="<td class='text-right'><strong>".$sum."</strong></td>";
        $output.="</tr>";

        $output.="</table>";
        return $output;
    }

    public static function by_person_don()
    {
        $output="";
        array_push(static::$db_fields,'total','itemsCount','amountCHF');
        $table=static::$table_name;
        $sql="SELECT 
    person_id,
    COUNT($table.id) AS itemsCount,
    SUM($table.amount) AS amount,
    SUM($table.amount * $table.rate) AS amountCHF
FROM
    $table
    LEFT JOIN myexpense_type
ON $table.expense_type_id = myexpense_type.id 
 WHERE   myexpense_type.expense_type=\"Give\" or myexpense_type.expense_type=\"Received\" 
GROUP BY $table.person_id;";



        $table_class=Table::full_table_class();

        $output.="<table class='$table_class '>";
        $output.="<tr>
                          <th class='text-center'>Name"."</th>
                          <th class='text-center'>No Items"."</th>
                          <th class='text-center'>Total CHF"."</th>
                          </tr>";

        $results= static::find_by_sql($sql);
        if($results){

            foreach($results as $result){

                $myperson=MyExpensePerson::find_by_id($result->person_id);
                $person=$myperson->person_name;

                $output.="<tr>";
                $output.="<td class='text-center'>{$person}</td>";
                $output.="<td class='text-center'>{$result->itemsCount}</td>";
                $output.="<td class='text-right'>".number_format($result->amountCHF,2)."</td>";
                $output.="</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $where=" WHERE expense_type_id=4 OR expense_type_id=5 ";
        $sum=number_format(static ::sum_field_where($field="amount * rate",$where),2);

        $output.="<tr>";
        $output.="<td class='text-center'><strong>Total</strong></td>";
        $output.=str_repeat("<td></td>", 1);
        $output.="<td class='text-right'><strong>".$sum."</strong></td>";
        $output.="</tr>";

        $output.="</table>";
        return $output;
    }


    public static function by_person_ccy()
    {
        $output="";
        array_push(static::$db_fields,'total','itemsCount','amountCHF');
        $table=static::$table_name;
        $sql="SELECT 
    person_id, ccy_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF
FROM
    $table
GROUP BY person_id,ccy_id;";


        $table_class=Table::full_table_class();

        $output.="<table class='$table_class '>";
        $output.="<tr>
                          <th class='text-center'>Name"."</th>
                          <th class='text-center'>CCY"."</th>     
                          <th class='text-center'>Items"."</th>
                          <th class='text-center'>Total CCY"."</th>
                          <th class='text-center'>Total CHF"."</th>
                          </tr>";

        $results= static::find_by_sql($sql);
        if($results){

            foreach($results as $result){

                $myCurrency=Currency::find_by_id($result->ccy_id);
                $ccy=$myCurrency->currency;

                $myperson=MyExpensePerson::find_by_id($result->person_id);
                $person=$myperson->person_name;

                $output.="<tr>";
                $output.="<td class='text-center'>{$person}</td>";
//                $output.="<td class='text-center'>{$result->person_name}</td>";
//                $output.="<td class='text-center'>{$result->person_id}</td>";
                $output.="<td class='text-center'>{$ccy}</td>";
                $output.="<td class='text-center'>{$result->itemsCount}</td>";
                $output.="<td class='text-right'>".number_format($result->amount,2)."</td>";
                $output .= "<td class='text-right'>" . $result->expense_type_id . "</td>";

                $output.="</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $sum=number_format(static ::sum_field_where($field="amount * rate"),2);

        $output.="<tr>";
        $output.="<td class='text-center'><strong>Total</strong></td>";
        $output.=str_repeat("<td></td>", 3);
        $output.="<td class='text-right'><strong>".$sum."</strong></td>";
        $output.="</tr>";

        $output.="</table>";
        return $output;
    }


    public static function by_ccy()
    {
        $output="";
        array_push(static::$db_fields,'total','itemsCount','amountCHF');
        $table=static::$table_name;
        $sql="SELECT 
    ccy_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF
FROM
    $table
GROUP BY ccy_id;";


        $table_class=Table::full_table_class();

        $output.="<table class='$table_class '>";
        $output.="<tr>
                           <th class='text-center'>CCY"."</th>     
                          <th class='text-center'>Items"."</th>
                          <th class='text-center'>Total CCY"."</th>
                          <th class='text-center'>Total CHF"."</th>
                          </tr>";

        $results= static::find_by_sql($sql);
        if($results){

            foreach($results as $result){

                $myCurrency=Currency::find_by_id($result->ccy_id);
                $ccy=$myCurrency->currency;

//                $myperson=MyExpensePerson::find_by_id($result->person_id);
//                $person=$myperson->person_name;

                $output.="<tr>";
//                $output.="<td class='text-center'>{$person}</td>";
//                $output.="<td class='text-center'>{$result->person_name}</td>";
//                $output.="<td class='text-center'>{$result->person_id}</td>";
                $output.="<td class='text-center'>{$ccy}</td>";
                $output.="<td class='text-center'>{$result->itemsCount}</td>";
                $output.="<td class='text-right'>".number_format($result->amount,2)."</td>";
                $output.="<td class='text-right'>".number_format($result->amountCHF,2)."</td>";
                $output .= "<td class='text-right'>" . $result->expense_type_id . "</td>";

                $output.="</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $sum=number_format(static ::sum_field_where($field="amount * rate"),2);

        $output.="<tr>";
        $output.="<td class='text-center'><strong>Total</strong></td>";
        $output.=str_repeat("<td></td>", 2);
        $output.="<td class='text-right'><strong>".$sum."</strong></td>";
        $output.="</tr>";

        $output.="</table>";
        return $output;
    }


    public static function by_type()
    {
        $output="";
        array_push(static::$db_fields,'total','itemsCount','amountCHF');
        $table=static::$table_name;
        $sql="SELECT 
    expense_type_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF
FROM
    $table
GROUP BY expense_type_id;";

        $table_class=Table::full_table_class();
//        str_repeat("&nbsp;", 4)
        $output.="<table class='$table_class '>";
        $output.="<tr>
                          <th class='text-center'>Expense Type"."</th>     
                          <th class='text-center'>Items"."</th>
                          <th class='text-center'>Total Type"."</th>
                          <th class='text-center'>Total CHF"."</th>
                          </tr>";

        $results= static::find_by_sql($sql);
        if($results){

            foreach($results as $result){


                $myType=MyExpenseType::find_by_id($result->expense_type_id);
                $type=$myType->expense_type;

//                $myperson=MyExpensePerson::find_by_id($result->person_id);
//                $person=$myperson->person_name;

                $output.="<tr>";
//                $output.="<td class='text-center'>{$person}</td>";
//                $output.="<td class='text-center'>{$result->person_name}</td>";
//                $output.="<td class='text-center'>{$result->person_id}</td>";
                $output.="<td class='text-center'>{$type}</td>";
                $output.="<td class='text-center'>{$result->itemsCount}</td>";
                $output.="<td class='text-right'>".number_format($result->amount,2)."</td>";
                $output.="<td class='text-right'>".number_format($result->amountCHF,2)."</td>";
                $output.="</tr>";

                unset($type);
                unset($myType);
            }
        }

        unset($results);

        $sum=number_format(static ::sum_field_where($field="amount * rate"),2);

        $output.="<tr>";
        $output.="<td class='text-center'><strong>Total</strong></td>";
        $output.=str_repeat("<td></td>", 2);
        $output.="<td class='text-right'><strong>".$sum."</strong></td>";
        $output.="</tr>";

        $output.="</table>";
        return $output;
    }


    public  function form_validation() {
        $this->set_up_display();
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
//        $valid->validate_min_lengths(array('currency'=>3));
//        $valid->validate_max_lengths(array('currency'=>3));
        return $valid;



    }
    public static function  table_nav_additional(){
        $output="</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpensePerson::$page_new ."\">Add New Person ". " </a><span>&nbsp;</span>";
            $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpenseType::$page_new ."\">Add New Type ". " </a></a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpensePerson::$page_manage ."\">View Person ". " </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyExpenseType::$page_manage ."\">View Type ". " </a>";

        return $output;
    }


    protected function set_up_display(){

        $result=Currency::find_by_id($this->ccy_id);
        $this->currency=$result->currency;

        $result=MyExpensePerson::find_by_id($this->person_id);
        $this->person_name=$result->person_name;

        $result=MyExpenseType::find_by_id($this->expense_type_id);
        $this->expense_type=$result->expense_type;
        $this->side=$result->side;


        if($this->side <0  && $this->amount>0){
            $this->amount=-$this->amount;
        }
        if($this->side >0  && $this->amount <0){
            $this->amount=-$this->amount;
        }

        if(isset($this->amount ) && isset($this->rate)){
            $this->amountCHF=$this->amount * $this->rate;
        }


    }


    public static function aPerson(int $personId, $NOT = true, $exclude = "34,32,39,24,26")
    {
        $output = "";

        if ($NOT) {
            $newNot = "NOT";
        } else {
            $newNot = "";
        }


        $sql = "SELECT t1.id ,t1.person_id,t1.ccy_id,t2.person_name,t1.comment,t1.expense_date,t1.amount,t1.rate,t1.expense_type_id,t1.amount * t1.rate AS amountCHF
FROM myexpense AS t1
  INNER JOIN myexpense_person AS t2
    ON t1.person_id = t2.id
WHERE t1.person_id=$personId
AND t1.id $newNot IN ($exclude)";


        $table_class = Table::full_table_class();

        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>id" . "</th>
                          <th class='text-center'>Name" . "</th>
                          <th class='text-center'>Comment" . "</th>
                          <th class='text-center'>Date" . "</th>
                          <th class='text-center'>Amount" . "</th>
                          <th class='text-center'>Fx" . "</th>
                          <th class='text-center'>Amt CHF" . "</th>
                          <th class='text-center'>Type" . "</th>
                          </tr>";

        $results = static::find_by_sql($sql);
        if ($results) {

            foreach ($results as $result) {

                $myperson = MyExpensePerson::find_by_id($result->person_id);
                $person = $myperson->person_name;

                $mytype = MyExpenseType::find_by_id($result->expense_type_id);
                $type = $mytype->expense_type;

                $output .= "<tr>";
                $output .= "<td class='text-center'>{$result->id}</td>";
                $output .= "<td class='text-center'>{$person}</td>";
                $output .= "<td class='text-center'>{$result->comment}</td>";;
                $output .= "<td class='text-center'>{$result->expense_date}</td>";
                $output .= "<td class='text-right'>" . number_format($result->amount, 2) . "</td>";
                $output .= "<td class='text-center'>{$result->rate}</td>";

                $output .= "<td class='text-right'>" . number_format($result->amountCHF, 2) . "</td>";
//                $output.="<td class='text-center'>{$result->expense_type_id}</td>";
                $output .= "<td class='text-center'>{$type}</td>";

                $href = clean_query_string("class_edit.php?class_name=" . get_called_class() . "&id=" . urlencode($result->id));

//            $output .= "<td class='text-center'><a class='btn btn-primary table-btn' style='width: 5em' href='" . "class_edit?class_name=" . get_called_class() . "&id=" . urlencode($this->id) . "'>Edit</a></td>";

                $output .= "<td class='text-center'><a class='btn btn-primary table-btn' style='width: 5em' href='" . $href . "'>Edit</a></td>";

                $href = clean_query_string("class_delete.php?class_name=" . get_called_class() . "&id=" . urlencode($result->id));

                $output .= "<td class='text-center'><a class='btn btn-danger table-btn' href='class_delete?class_name=" . get_called_class() . "&id=" . urlencode($result->id) . "'>Delete</a></td>";


                $output .= "</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);
//      $ql=  "SELECT sum({$field}) FROM {$table} {$where} "
        $sum = number_format(static::sum_field_where($field = "amount * rate", "WHERE person_id=$personId
AND id $newNot IN ($exclude)"), 2);

        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 5);
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "</tr>";

        $output .= "</table>";
        return $output;


    }



}
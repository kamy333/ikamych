<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class MyExpense extends DatabaseObject
{
    protected static $table_name = "myexpense";
    protected static $table_name2 = "myexpense_person";
    protected static $table_name3 = "myexpense_type";

// 'currency_id','Account','debitor','creditor'

    protected static $db_fields = array('id', 'amount', 'cash', 'ccy_id', 'rate', 'person_id', 'expense_type_id', 'expense_date', 'comment', 'document', 'modification_time');

    protected static $required_fields = array('amount', 'cash', 'ccy_id', 'person_id', 'expense_type_id', 'expense_date');

    protected static $db_fields_table_display_short = array('id', 'amount', 'cash', 'is_cash', 'amountCHF', 'ccy_id', 'currency', 'rate', 'person_id', 'person_name', 'expense_type_id', 'expense_type', 'expense_date', 'category', 'document_lnk');

    protected static $db_fields_table_display_full = array('id', 'amount', 'cash', 'is_cash', 'amountCHF', 'currency', 'rate', 'person_id', 'person_name', 'expense_type_id', 'expense_type', 'expense_date', 'category', 'document', 'document_lnk', 'comment', 'modification_time');

    protected static $db_field_exclude_table_display_sort = array('amountCHF', 'document_lnk');

    protected static $db_field_include_table_display_sort = array(
        'person_name' => 'person_id', 'expense_type' => 'expense_type_id', 'currency' => 'ccy_id', 'is_cash' => 'cash');

    public static $fields_numeric = array('id', 'amount', 'amountCHF', 'person_id', 'expense_type_id', 'ccy_id', 'rate', 'cash');
    public static $fields_numeric_format = array('amount', 'amountCHF');

    public static $get_form_element = array('amount', 'cash', 'ccy_id', 'rate', 'expense_date', 'person_id', 'expense_type_id', 'comment', 'document', 'modification_time');

    public static $get_form_element_others = array();

    public static $form_default_value = array(
        "expense_date" => "now()",
        "modification_time" => "nowtime()",
        "amount" => "0",
        "ccy_id" => "1",
//        "currency"=>"CHF",
        "rate" => "1"

    );


    protected static $form_properties = array(

        "amount" => array("type" => "number",
            "name" => 'amount',
            "label_text" => "Amount",
//            'min' => 0,
            "placeholder" => "Amount",
            "step" => "0.01",
            "required" => true,
        ),
        "cash" => array("type" => "radio",
            array(0,
                array(
                    "label_all" => "is Cash",
                    "name" => "cash",
                    "label_radio" => "No",
                    "value" => "0",
                    "id" => "cash_no",
                    "default" => true)),
            array(1,
                array(
                    "label_all" => "is Cash",
                    "name" => "cash",
                    "label_radio" => "Yes",
                    "value" => "1",
                    "id" => "cash_yes",
                    "default" => false)),
        ),
        "ccy_id" => array("type" => "select",
            "name" => 'ccy_id',
            "class" => "Currency",
            "label_text" => "Currency",
            "select_option_text" => 'Currency',
            'field_option_0' => "id",
            'field_option_1' => "currency",
            "required" => true,
        ),
        "rate" => array("type" => "number",
            "name" => 'rate',
            "id" => "rate",
            "label_text" => "Rate",
            'min' => 0,
            "placeholder" => "Rate to CHF",
            "required" => false,
            "step" => "0.00001"
        ),
        "person_id" => array("type" => "select",
            "name" => 'person_id',
            "class" => "MyExpensePerson",
            "label_text" => "Person Name ID",
            "select_option_text" => 'Person Name',
            'field_option_0' => "id",
            'field_option_1' => "person_name",
            "required" => true,
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
        "expense_type_id" => array("type" => "select",
            "name" => 'expense_type_id',
            "class" => "MyExpenseType",
            "label_text" => "Expense Type",
            "select_option_text" => 'Expense Type',
            'field_option_0' => "id",
            'field_option_1' => "expense_type",
            "required" => true,
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
        "expense_date" => array("type" => "date",
            "name" => 'expense_date',
            "label_text" => "Expense Date",
            "placeholder" => "Input Date",
            "required" => true,
        ),
        "comment" => array("type" => "textarea",
            "name" => 'comment',
            "label_text" => "Comment",
            "placeholder" => "input Comment",
            "required" => false,
        ),
        "document" => array("type" => "text",
            "name" => 'document',
            "label_text" => "document",
            "placeholder" => "documents comma-separated if more than 1",
            "required" => false,
        ),
        "modification_time" => array("type" => "datetime",
            "name" => 'modification_time',
            "label_text" => "modification_time",
            "placeholder" => "modification_time",
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
        "person_id" => array("type" => "select",
            "name" => 'person_id',
            "id" => "search_person_id",
            "class" => "MyExpensePerson",
            "label_text" => "",
            "select_option_text" => 'Person Name',
            'field_option_0' => "id",
            'field_option_1' => "person_name",
            "required" => false,
        ),
        "amount" => array("type" => "select",
            "name" => 'amount',
            "id" => "search_amount",
            "class" => "MyExpense",
            "label_text" => "",
            "select_option_text" => 'Amount',
            'field_option_0' => "amount",
            'field_option_1' => "amount",
            "required" => false,
        ),
        "cash" => array("type" => "select",
            "name" => 'cash',
            "id" => "search_cash",
            "class" => "MyExpense",
            "label_text" => "",
            "select_option_text" => 'Cash',
            'field_option_0' => "cash",
            'field_option_1' => "cash",
            "required" => false,
        ),
        "ccy_id" => array("type" => "select",
            "name" => 'ccy_id',
            "id" => "search_ccy_id",
            "class" => "Currency",
            "label_text" => "Currency",
            "select_option_text" => 'Currency',
            'field_option_0' => "id",
            'field_option_1' => "currency",
            "required" => false,
        ),

        "rate" => array("type" => "number",
            "name" => 'rate',
            "id" => "rate",
            "label_text" => "Rate",
            'min' => 0,
            "placeholder" => "Rate to CHF",
            "required" => false,
        ),

        "expense_type_id" => array("type" => "select",
            "name" => 'expense_type_id',
            "id" => "search_expense_type",
            "class" => "MyExpenseType",
            "label_text" => "",
            "select_option_text" => 'Expense type',
            'field_option_0' => "id",
            'field_option_1' => "expense_type",
            "required" => false,
        ),
        "expense_date" => array("type" => "select",
            "name" => 'expense_date',
            "id" => "search_expense_date",
            "class" => "MyExpense",
            "label_text" => "",
            "select_option_text" => 'Expense type',
            'field_option_0' => "expense_date",
            'field_option_1' => "expense_date",
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

    );


    public static $db_field_search = array('search_all', 'amount', 'ccy_id', 'person_id', 'expense_type_id', 'expense_date', 'comment', 'download_csv');


    public static $page_name = "Expense Loan";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyExpense"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyExpense"; //  "delete_link.php";
    public static $position_table = "positionBoth"; // positionLeft // positionBoth  positionRight

    public static $form_class_dependency = array('MyExpensePerson', 'MyExpenseType');

    public static $per_page;

    public $id;
    public $amount;
    public $cash;
    public $is_cash;
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
    public $document;
    public $document_lnk;

    public $category;

    public $itemsCount;
    public $total;
    public $side;
    public $rate_side;
    public $Yr;
    public $Mth;
    public $MthName;
    public $Amt_Pret;
    public $Amt_PretCHF;
    public $Amt_Rbt;
    public $Amt_RbtCHF;


//    public function save()
//    {
//        isset($this->id) ? $this->send_email("updated") : $this->send_email("added/created");
//        return parent::save(); // TODO: Change the autogenerated stub
//    }

    public function delete()
    {
//        $this->send_email("deleted");
        return parent::delete(); // TODO: Change the autogenerated stub
    }

    public function tr($td1, $td2)
    {
        $output = "";
        $output .= "<tr>";
        $output .= "<td>$td1</td>";
        $output .= "<td>$td2</td>";
        $output .= "</tr>";

        return $output;

    }

    public function table_in_language($language)
    {
        global $logo;
        $message = "";

        if ($language == "english" || $language == "en") {
            $date = date_create($this->expense_date);
            $mydate = date_format($date, "d-M-Y");

            $message .= "<hr>";
            $message .= "<table>";

            $message .= $this->tr("Name", "{$this->person_name}");
            $message .= $this->tr("Type", "{$this->expense_type}");
            $message .= $this->tr("Date", "{$mydate}");
            $message .= $this->tr("Currency", "{$this->currency}");
            $message .= $this->tr("Amount CCY", format_number($this->amount));
            $message .= $this->tr("Rate CCY", "{$this->rate}");
            $message .= $this->tr("Amount CHF", format_number($this->amountCHF));
            $message .= $this->tr("Comment:", "{$this->comment}");

            $message .= "</table>";
            $message .= "<hr>";

            $message .= "<br>Many thanks<br>";

        } elseif ($language == "french" || $language == "fr") {
            $date = date_create($this->expense_date);
            $mydate = date_format($date, "d-M-Y");

            $message .= "<hr>";
            $message .= "<table>";

            $message .= $this->tr("Nom", "{$this->person_name}");
            $message .= $this->tr("Type", "{$this->expense_type}");
            $message .= $this->tr("Date", "{$mydate}");
            $message .= $this->tr("Ccy", "{$this->currency}");
            $message .= $this->tr("Montant", format_number($this->amount));
            $message .= $this->tr("taux fx", "{$this->rate}");
            $message .= $this->tr("Montant CHF", format_number($this->amountCHF));
            $message .= $this->tr("commentaire:", ud8("{$this->comment}"));

            $message .= "</table>";
            $message .= "<hr>";

            $message .= "<br>Meilleures salutations<br>";

        } elseif ($language == "portuguese" || $language == "ptg") {
            $date = date_create($this->expense_date);
            $mydate = date_format($date, "d-M-Y");

            $message .= "<hr>";
            $message .= "<table>";

            $message .= $this->tr("Nome", "{$this->person_name}");
            $message .= $this->tr("Tipo", "{$this->expense_type}");
            $message .= $this->tr("Encontro", "{$mydate}");
            $message .= $this->tr("Moeda", "{$this->currency}");
            $message .= $this->tr("Montante em moeda", format_number($this->amount));
            $message .= $this->tr(ud8("taxa de câmbio"), "{$this->rate}");
            $message .= $this->tr(ud8("Montante em Franco suíço"), format_number($this->amountCHF));
            $message .= $this->tr(ud8("comentário:"), ud8("{$this->comment}"));

            $message .= "</table>";
            $message .= "<hr>";

            $message .= "<br>Cumprimentos<br>";
        }

        $message .= "{$logo}<br>";


        return $message;
    }

    public function send_email($type)
    {
        global $logo;
        $mail = new MyPHPMailer();

        $kamy = User::find_by_username("kamy");

        $message = $logo . "<br><br>";

        $myperson = MyExpensePerson::find_by_id($this->person_id);

        if (!$myperson->authorized_user) {
            return "";
        } else {
            return "";
        }

        $auth_users = explode(",", $myperson->authorized_user);
        $msg_user = "";

        foreach ($auth_users as $auth_user) {
            $user = User::find_by_username($auth_user);
            if (1 == 2) {
                if ($user) {
                    $mail->addAddress($user->email, $user->nom);
                    $msg_user .= $user->first_name . ",";
                }
            }
        }

        $mail->addAddress($kamy->email, $kamy->nom);
//        $mail->addBCC("kamy@ikamy.ch");
        $mail->Subject = "ikamy.ch ";

        if ($type == "updated") {
            $type_en = "updated";
            $type_fr = utf8_decode("Actualisation");
            $type_ptg = utf8_decode("atualizada");

        } elseif ($type == "added/created") {
            $type_en = "added/created";
            $type_fr = utf8_decode("Ajout / creation");
            $type_ptg = utf8_decode("adicionado / criado");
        } elseif ($type == "deleted") {
            $type_en = "deleted";
            $type_fr = utf8_decode("Suppressipn");
            $type_ptg = utf8_decode("apagada");
        }

        $languages = explode(",", $myperson->language);

        foreach ($languages as $language) {
            if ($language == "english" || $language == "en") {
                $type = $type_en;
                $notice = utf8_decode("Notice");
                $message .= "<b>Dear  {$msg_user} {$kamy->first_name},</b><br><br>";
                $lnk = "<a href= '" . SITE_URL . "/Inspinia/loan_exp.php'>Click here to access loan page</a>";
                $message .= "<p>We have {$type} the loan expense for {$this->person_name}<br><br>";
                $message .= " {$lnk}";
                $message .= "&nbsp;&nbsp;&nbsp;<span style='font-size: smaller'><i>You may need to login with your credential before</i></span> <br></p>";

            } elseif ($language == "french" || $language == "fr") {
                $type = utf8_decode($type_fr);
                $notice = utf8_decode("Notification");
                $message .= "<b>Cher(e)  {$msg_user} {$kamy->first_name},</b><br><br>";
                $lnk = "<a href= '" . SITE_URL . "/Inspinia/loan_exp.php'>" .
                    utf8_decode("Cliquer ici pour accèder page emprunt")
                    . "</a>";

                $message .= "<p>" .
                    utf8_decode(" {$type} de la table d'emprunt pour {$this->person_name}")
                    . "<br><br>";
                $message .= " {$lnk}";
                $message .= "&nbsp;&nbsp;&nbsp;<span style='font-size: smaller'><i>" .
                    utf8_decode("Il se peut que vous devez logger sur le site avant d'accèder à la page")
                    . "</i></span> <br></p>";

            } elseif ($language == "portuguese" || $language == "ptg") {
                $type = $type_ptg;
                $notice = utf8_decode("Notificação");
                $message .= "<b>" .
                    utf8_decode("Querida, Querido  {$msg_user} {$kamy->first_name},")
                    . "</b><br><br>";
                $lnk = "<a href= '" . SITE_URL . "/Inspinia/loan_exp.php?person_id=$this->person_id'>" .
                    utf8_decode("Clique aqui empréstimo para revisar")
                    . "</a>";

                $message .= "<p>" .
                    utf8_decode("Nós temos {$type} a despesa de empréstimo para {$this->person_name}")
                    . "<br><br>";
                $message .= " {$lnk}";
                $message .= "&nbsp;&nbsp;&nbsp;<span style='font-size: smaller'><i>" .
                    utf8_decode("Você pode precisar fazer o login com sua credencial antes")
                    . "</i></span> <br></p>";
            }

            $message .= $this->table_in_language($language);

            $message .= "<br><br><hr>";

            $mail->Subject .= "- {$notice}: {$this->person_name} - {$type}";

        }


        //Send HTML or Plain Text email
        $mail->isHTML(true);
        $mail->Body = $message;
        //   $mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        return "";

    }

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

    public static function by_person_receivable()
    {
        $output = "";
        array_push(static::$db_fields, 'total', 'itemsCount', 'amountCHF');
        $table = static::$table_name;
        $sql = "SELECT 
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

        $where = " WHERE expense_type_id=1 OR expense_type_id=3 ";
        $sum = number_format(static::sum_field_where($field = "amount * rate", $where), 2);

        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 1);
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "</tr>";

        $output .= "</table>";
        return $output;
    }

    public static function by_person_don()
    {
        $output = "";
        array_push(static::$db_fields, 'total', 'itemsCount', 'amountCHF');
        $table = static::$table_name;
        $sql = "SELECT 
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

        $where = " WHERE expense_type_id=4 OR expense_type_id=5 ";
        $sum = number_format(static::sum_field_where($field = "amount * rate", $where), 2);

        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 1);
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "</tr>";

        $output .= "</table>";
        return $output;
    }

    public static function by_person_ccy()
    {
        $output = "";
        array_push(static::$db_fields, 'total', 'itemsCount', 'amountCHF');
        $table = static::$table_name;
        $sql = "SELECT 
    person_id, ccy_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF
FROM
    $table
GROUP BY person_id,ccy_id;";


        $table_class = Table::full_table_class();

        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>Name" . "</th>
                          <th class='text-center'>CCY" . "</th>     
                          <th class='text-center'>Items" . "</th>
                          <th class='text-center'>Total CCY" . "</th>
                          <th class='text-center'>Total CHF" . "</th>
                          </tr>";

        $results = static::find_by_sql($sql);
        if ($results) {

            foreach ($results as $result) {

                $myCurrency = Currency::find_by_id($result->ccy_id);
                $ccy = $myCurrency->currency;

                $myperson = MyExpensePerson::find_by_id($result->person_id);
                $person = $myperson->person_name;

                $output .= "<tr>";
                $output .= "<td class='text-center'>{$person}</td>";
//                $output.="<td class='text-center'>{$result->person_name}</td>";
//                $output.="<td class='text-center'>{$result->person_id}</td>";
                $output .= "<td class='text-center'>{$ccy}</td>";
                $output .= "<td class='text-center'>{$result->itemsCount}</td>";
                $output .= "<td class='text-right'>" . number_format($result->amount, 2) . "</td>";
                $output .= "<td class='text-right'>" . $result->expense_type_id . "</td>";

                $output .= "</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $sum = number_format(static::sum_field_where($field = "amount * rate"), 2);

        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 3);
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "</tr>";

        $output .= "</table>";
        return $output;
    }

    public static function by_ccy()
    {
        $output = "";
        array_push(static::$db_fields, 'total', 'itemsCount', 'amountCHF');
        $table = static::$table_name;
        $sql = "SELECT 
    ccy_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF
FROM
    $table
GROUP BY ccy_id;";


        $table_class = Table::full_table_class();

        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                           <th class='text-center'>CCY" . "</th>     
                          <th class='text-center'>Items" . "</th>
                          <th class='text-center'>Total CCY" . "</th>
                          <th class='text-center'>Total CHF" . "</th>
                          </tr>";

        $results = static::find_by_sql($sql);
        if ($results) {

            foreach ($results as $result) {

                $myCurrency = Currency::find_by_id($result->ccy_id);
                $ccy = $myCurrency->currency;

//                $myperson=MyExpensePerson::find_by_id($result->person_id);
//                $person=$myperson->person_name;

                $output .= "<tr>";
//                $output.="<td class='text-center'>{$person}</td>";
//                $output.="<td class='text-center'>{$result->person_name}</td>";
//                $output.="<td class='text-center'>{$result->person_id}</td>";
                $output .= "<td class='text-center'>{$ccy}</td>";
                $output .= "<td class='text-center'>{$result->itemsCount}</td>";
                $output .= "<td class='text-right'>" . number_format($result->amount, 2) . "</td>";
                $output .= "<td class='text-right'>" . number_format($result->amountCHF, 2) . "</td>";
                $output .= "<td class='text-right'>" . $result->expense_type_id . "</td>";

                $output .= "</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);

        $sum = number_format(static::sum_field_where($field = "amount * rate"), 2);

        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 2);
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "</tr>";

        $output .= "</table>";
        return $output;
    }

    public static function by_type()
    {
        $output = "";
        array_push(static::$db_fields, 'total', 'itemsCount', 'amountCHF');
        $table = static::$table_name;
        $sql = "SELECT 
    expense_type_id,
    COUNT(id) AS itemsCount,
    SUM(amount) AS amount,
    SUM(amount * rate) AS amountCHF
FROM
    $table
GROUP BY expense_type_id;";

        $table_class = Table::full_table_class();
//        str_repeat("&nbsp;", 4)
        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>Expense Type" . "</th>     
                          <th class='text-center'>Items" . "</th>
                          <th class='text-center'>Total Type" . "</th>
                          <th class='text-center'>Total CHF" . "</th>
                          </tr>";

        $results = static::find_by_sql($sql);
        if ($results) {

            foreach ($results as $result) {


                $myType = MyExpenseType::find_by_id($result->expense_type_id);
                $type = $myType->expense_type;

//                $myperson=MyExpensePerson::find_by_id($result->person_id);
//                $person=$myperson->person_name;

                $output .= "<tr>";
//                $output.="<td class='text-center'>{$person}</td>";
//                $output.="<td class='text-center'>{$result->person_name}</td>";
//                $output.="<td class='text-center'>{$result->person_id}</td>";
                $output .= "<td class='text-center'>{$type}</td>";
                $output .= "<td class='text-center'>{$result->itemsCount}</td>";
                $output .= "<td class='text-right'>" . number_format($result->amount, 2) . "</td>";
                $output .= "<td class='text-right'>" . number_format($result->amountCHF, 2) . "</td>";
                $output .= "</tr>";

                unset($type);
                unset($myType);
            }
        }

        unset($results);

        $sum = number_format(static::sum_field_where($field = "amount * rate"), 2);

        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 2);
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "</tr>";

        $output .= "</table>";
        return $output;
    }

    public function form_validation()
    {
        $this->set_up_display();
        $valid = new FormValidation();

        $valid->validate_presences(self::$required_fields);
//        $valid->validate_min_lengths(array('currency'=>3));
//        $valid->validate_max_lengths(array('currency'=>3));
        return $valid;


    }

    public static function table_nav_additional()
    {
        $output = "</a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpensePerson::$page_new . "\">Add New Person " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpenseType::$page_new . "\">Add New Type " . " </a></a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpensePerson::$page_manage . "\">View Person " . " </a><span>&nbsp;</span>";
        $output .= "<a  class=\"btn btn-primary\"  href=\"" . MyExpenseType::$page_manage . "\">View Type " . " </a>";

        $output .= "<a  class=\"btn btn-info\"  href=\"" . "/Inspinia/loan_exp.php" . "\">Mum " . " </a>";

        return $output;
    }

    protected function set_up_display()
    {

        $result = Currency::find_by_id($this->ccy_id);
        $this->currency = $result->currency;
        $this->rate_side = $result->rate_side;

        $result = MyExpensePerson::find_by_id($this->person_id);
        $this->person_name = $result->person_name;

        $result = MyExpenseType::find_by_id($this->expense_type_id);
        $this->expense_type = $result->expense_type;
        $this->side = $result->side;
        $this->category = $result->category;


        if ($this->side < 0 && $this->amount > 0) {
            $this->amount = -$this->amount;
        }
        if ($this->side > 0 && $this->amount < 0) {
            $this->amount = -$this->amount;
        }

        if ($this->cash < 1) {
            $this->is_cash = "No";
        } else {
            $this->is_cash = "Yes";
        }

        if (isset($this->amount) && isset($this->rate)) {

            if ($this->rate_side == "Multiply") {
                $this->amountCHF = $this->amount / $this->rate;

            } else {
                $this->amountCHF = $this->amount / $this->rate;
            }
        }


        $folder = "/public/img/maman_document/";
        $href_img = "/Inspinia/loan_exp_viewer.php";
        $lnk = "";

        if ($this->document) {
            $file = trim($this->document);
//            $full_path = $folder . $file;
//            $full_path2 =$_SERVER["DOCUMENT_ROOT"]. $folder . $file;
            $documents = explode(",", $this->document);

            $nbsp = str_repeat("&nbsp;", 1);

            foreach ($documents as $document) {
                $pi = pathinfo($document);
                $txt = $pi['filename'];
                $ext = $pi['extension'];
                $file = $document;
                $full_path = $folder . $file;
                $full_path2 = $_SERVER["DOCUMENT_ROOT"] . $folder . $file;

                if (file_exists($full_path2)) {
                    if (strtolower($ext) == "pdf") {

                        $lnk .= "<a href='{$full_path}'><button type='button' class='btn btn-danger' data-toggle='tooltip' data-placement='left' title='{$document}'><i class='fa fa-file-pdf-o'></i></button></a>";


                    } elseif (strtolower($ext) == "jpg" || strtolower($ext) == "jpeg" || strtolower($ext) == "png") {
                        $href = $href_img . "?url=" . u($folder . $document);

                        $lnk .= "<a href='{$href}'><button type='button' class='btn btn-info' data-toggle='tooltip' data-placement='left' title='{$document}'><i class='fa fa-file-photo-o'></i></button></a>";

                    }

                }

            }

        } else {
            $lnk .= "";
        }


        $this->document_lnk = trim($lnk);

    }


    public static function get_category_name($exp_type_ids)
    {
        if ($exp_type_ids == "1,3") {
            $cat = "Loan";
        } elseif ($exp_type_ids == "4,5") {
            $cat = "Gift";
        } elseif ($exp_type_ids == "6,7") {
            $cat = "Exclude";
        } else {
            $cat = "All";
        }

        return $cat;


    }

    public static function form_select_person()
    {

        global $Nav;

        $output = "";
        $desc = "DESC";


        $sql = "SELECT t1.person_id,t2.person_name
        FROM " . static::$table_name . " AS t1
          INNER JOIN myexpense_person AS t2
            ON t1.person_id = t2.id 
            WHERE t2.close_person=0 
            GROUP BY t1.person_id,t2.person_name 
        ORDER BY t2.rank ASC";


        $output .= " <div class='col-sm-5 form-inline'>";
        $output .= "<form name='xxx' method='get' action='" . h($_SERVER['PHP_SELF']) . "'>";

        if (User::is_admin()) {


            $output .= "<select class='form - control m - b' name='person_id'>";
            $results = static::find_by_sql($sql);
            if ($results) {
                if (isset($_GET["person_id"])) {
                    $p_id = $_GET["person_id"];
                    $myperson1 = MyExpensePerson::find_by_id($p_id);
                    $person1 = $myperson1->person_name;
                    $output .= "<option selected value='{$p_id}'>{$person1}</option>";
                }

                foreach ($results as $result) {
                    $myperson = MyExpensePerson::find_by_id($result->person_id);
                    $person = $myperson->person_name;

                    $output .= "<option value='{$result->person_id}'>{$person}</option>";
                }

            }

            $output .= "</select>";

        }
        $output .= "<select class='form - control m - b' name='type_category'>";

        if (isset($_GET["type_category"])) {

            $exp_type_ids = d($_GET["type_category"]);
            $cat = static::get_category_name($exp_type_ids);

            $output .= "<option selected value='{$exp_type_ids}'>{$cat}</option>";
        }

        $output .= "<option value='" . u("All") . "'>All</option>";
        $output .= "<option value='" . u("1,3") . "'>Loan</option>";
        $output .= "<option value='" . u("4,5") . "'>Gift</option>";
        $output .= "<option value='" . u("6,7") . "'>Exclude</option>";

        $output .= "</select>";

        $output .= "<select class='form - control m - b' name='sort'>";
        if (isset($_GET["sort"])) {
            $sort = $_GET["sort"];

            if ($sort == "ASC") {
                $output .= "<option selected value='" . u("ASC") . "'>ASC</option>";
                $output .= "<option  value='" . u("DESC") . "'>DESC</option>";

            } else {
                $output .= "<option selected value='" . u("DESC") . "'>DESC</option>";
                $output .= "<option  value='" . u("ASC") . "'>ASC</option>";

            }

        } else {
            $output .= "<option selected value='" . u("DESC") . "'>DESC</option>";
            $output .= "<option  value='" . u("ASC") . "'>ASC</option>";

        }

        $output .= "</select>";


//        if(User::is_kamy()){
        $output .= "<select class='form - control m - b' name='show_hide_doc'>";
        $output .= "<option selected value='" . u("hide_doc") . "'>Hide</option>";
        $output .= "<option  value='" . u("show_doc") . "'>Show</option>";

        $output .= "</select>";

        if ($Nav->folder == "Inspinia") {
            $output .= "&nbsp;&nbsp;<a href='/public/loan_expense.php'>Loan</a>&nbsp;&nbsp;";
        } else {
            $output .= "&nbsp;&nbsp;<a href='/Inspinia/loan_exp.php'>Loan</a>&nbsp;&nbsp;";

        }


//        }


        $output .= "<button class='btn btn-primary' type='submit'>Get Person</button>";
        $output .= "</form>";
        $output .= "</div>";

        return $output;
    }


    public static function aPerson(int $personId, $NOT = true, $exclude = "", $desc = "DESC", $show_doc = false, $is_button = false)
    {

        $output = "";

        if ($NOT) {
            $newNot = "NOT";
        } else {
            $newNot = "";
        }

        if ($is_button) {
            $addCol = "<th class='text-center'></th>";
            $addCol .= "<th class='text-center'></th>";

        } else {
            $addCol = "";
        }

        if (isset($_GET["type_category"])) {
            $cat = d($_GET["type_category"]);
            $cat_name = static::get_category_name($cat);

            if ($cat == "All") {
                $and_type = "";
                $and_type1 = "";
            } else {
                $and_type = "";
                $and_type = " AND t1.expense_type_id IN ($cat) ";
                $and_type1 = " AND expense_type_id IN ($cat) ";
            }


        } else {

            $cat = "1,3";
            $cat_name = MyExpense::get_category_name($cat);
            $and_type = " AND t1.expense_type_id IN ($cat) ";
            $and_type1 = " AND expense_type_id IN ($cat) ";

        }


        if ($exclude == "") {
            $and_exclude = "";
        } else {

            $and_exclude = " AND t1.id $newNot IN ($exclude) ";
            $and_exclude1 = " AND id $newNot IN ($exclude) ";
        }


        $sql = "SELECT t1.id ,t1.person_id,t1.ccy_id,t2.person_name,t1.document,t1.comment,t1.expense_date,t1.amount,t1.cash,t1.rate,t1.expense_type_id,t1.amount * t1.rate AS amountCHF,t3.category
        FROM " . static::$table_name . " AS t1
          INNER JOIN myexpense_person AS t2
            ON t1.person_id = t2.id
           INNER JOIN myexpense_type AS t3  
            ON t1.expense_type_id=t3.id
        WHERE t1.person_id=$personId
        $and_type
        $and_exclude ORDER BY t1.id {$desc}";


        $table_class = Table::full_table_class();

//        $doc_view=$show_doc;

        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>id" . "</th>
                          <th class='text-center'>Name" . "</th>
                          <th class='text-center'>Comment" . "</th>
                          <th class='text-center'>Date" . "</th>
                          <th class='text-center'>Ccy" . "</th>
                          <th class='text-center'>Amount CCY" . "</th>
                          <th class='text-center'>Fx" . "</th>
                          <th class='text-center'>Amt CHF" . "</th>
                          <th class='text-center'>Cash" . "</th>
                          <th class='text-center'>Type" . "</th>
                          <th class='text-center'>Category" . "</th>";


        if ($show_doc) {
//            if (User::is_kamy()) {
            $output .= "<th class='text-center'>Doc</th>";
//                        $output .=       "<th class='text-center'>Doc1</th>";
//            }
        }

        $output .= "{$addCol}";
        $output .= "</tr>";


        $results = static::find_by_sql($sql);
        if ($results) {

            foreach ($results as $result) {

                $result->set_up_display();

                $myperson = MyExpensePerson::find_by_id($result->person_id);
                $person = $myperson->person_name;

                $mytype = MyExpenseType::find_by_id($result->expense_type_id);
                $type = $mytype->expense_type;
                $categ = $mytype->category;


                $myCurrency = Currency::find_by_id($result->ccy_id);
                $ccy = $myCurrency->currency;


                $date = date_create($result->expense_date);
                $mydate = date_format($date, "d-M-Y");


                $output .= "<tr>";
                if (User::is_admin()) {
                    $lnk = "/public/admin/crud/data/edit_data.php?class_name=" . get_called_class() . "&id={$result->id}";
                    $output .= "<td class='text-center'><a href='{$lnk}'>{$result->id}</a></td>";
                } else {
                    $output .= "<td class='text-center'>{$result->id}</td>";

                }
                $output .= "<td class='text-center'>{$person}</td>";
                $output .= "<td class='text-left'>{$result->comment}</td>";;
                $output .= "<td class='text-center' STYLE='white-space:nowrap;'>{$mydate}</td>";
                $output .= "<td class='text-center'>{$ccy}</td>";

                $output .= "<td class='text-right'>" . format_number($result->amount) . "</td>";
                $output .= "<td class='text-right'>{$result->rate}</td>";
                $output .= "<td class='text-right'>" . format_number($result->amountCHF) . "</td>";

                if ($result->cash == 1) {
                    $style = "style='color:blue'";
                } else {
                    $style = "style='color:gray'";
                }
                $output .= "<td class='text-right' {$style}><strong>" . $result->is_cash . "</strong></td>";

                $output .= "<td class='text-center'>{$type}</td>";
                $output .= "<td class='text-center'>{$categ}</td>";

                if ($show_doc) {
//                    if (User::is_kamy()) {
                    $output .= "<td class='text-left'  STYLE='white-space:nowrap;'>{$result->document_lnk}</td>";
//                    $output .= "<td class='text-center'>{$result->document}</td>";
//                    }
                }
                if ($is_button) {
                    $href = clean_query_string("class_edit.php?class_name=" . get_called_class() . "&id=" . urlencode($result->id));
                    $output .= "<td class='text-center'><a class='btn btn-primary table-btn' style='width: 5em' href='" . $href . "'>Edit</a></td>";
                    $href = clean_query_string("class_delete.php?class_name=" . get_called_class() . "&id=" . urlencode($result->id));
                    $output .= "<td class='text-center'><a class='btn btn-danger table-btn' href='class_delete?class_name=" . get_called_class() . "&id=" . urlencode($result->id) . "'>Delete</a></td>";

                }

                $output .= "</tr>";

                unset($ccy);
                unset($person);
            }
        }

        unset($results);


        $sql = "SELECT 
       SUM(CASE
        WHEN t2.rate_side = 'Multiply' THEN t1.amount * t1.rate
        ELSE t1.amount / t1.rate
    END) AS 'AmountCHF'
        FROM " . static::$table_name . " AS t1
          INNER JOIN currency AS t2
            ON t1.ccy_id = t2.id 
        WHERE t1.person_id=$personId
        $and_type
        $and_exclude";

        $sum = number_format(static::sum_field_where_by_sql($sql), 2);


        $output .= "<tr>";
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= str_repeat("<td></td>", 4);
        $output .= "<td class='text-center'><strong>Total</strong></td>";
        $output .= "<td class='text-right'><strong>" . "CHF" . "</strong></td>";
        $output .= "<td class='text-right'><strong>" . $sum . "</strong></td>";
        $output .= "<td class='text-right'><strong>" . $cat_name . "</strong></td>";
        $output .= str_repeat("<td></td>", 1);
        $output .= "</tr>";
        $output .= "</table>";
        return $output;


    }


    public function send_email_testing($type = "updated")
    {
        global $logo;
        $mail = new MyPHPMailer();

        $kamy = User::find_by_username("kamy");

        $message = $logo . "<br><br>";

        $message .= "Geneva " . date("l d/m/Y") . " - " . date("H:i") . "<br><br>";


        $myperson = MyExpensePerson::find_by_id($this->person_id);

        if (!$myperson->authorized_user) {
//            return "";
        }

        $auth_users = explode(",", $myperson->authorized_user);
        $msg_user = "";

        foreach ($auth_users as $auth_user) {
            $user = User::find_by_username($auth_user);
            if (1 == 2) {
                if ($user) {
                    $mail->addAddress($user->email, $user->nom);
                    $msg_user .= $user->first_name . ",";
                }
            }
        }

        $mail->addAddress($kamy->email, $kamy->nom);
//        $mail->addBCC("kamy@ikamy.ch");
        $mail->Subject = "ikamy.ch ";

        if ($type == "updated") {
            $type_en = "updated";
            $type_fr = utf8_decode("Actualisation");
            $type_ptg = utf8_decode("atualizada");

        } elseif ($type == "added/created") {
            $type_en = "added/created";
            $type_fr = utf8_decode("Ajout / creation");
            $type_ptg = utf8_decode("adicionado / criado");
        } elseif ($type == "deleted") {
            $type_en = "deleted";
            $type_fr = utf8_decode("Suppressipn");
            $type_ptg = utf8_decode("apagada");
        }

        $languages = explode(",", $myperson->language);

        foreach ($languages as $language) {
            if ($language == "english" || $language == "en") {
                $type = $type_en;
                $notice = utf8_decode("Notice");
                $message .= "<b>Dear  {$msg_user} {$kamy->first_name},</b><br><br>";
                $lnk = "<a href= '" . SITE_URL . "/Inspinia/loan_exp.php'>Click here to access loan page</a>";
                $message .= "<p>We have {$type} the loan expense for {$this->person_name}<br><br>";
                $message .= " {$lnk}";
                $message .= "&nbsp;&nbsp;&nbsp;<span style='font-size: smaller'><i>You may need to login with your credential before</i></span> <br></p>";

            } elseif ($language == "french" || $language == "fr") {
                $type = utf8_decode($type_fr);
                $notice = utf8_decode("Notification");
                $message .= "<b>Cher(e)  {$msg_user} {$kamy->first_name},</b><br><br>";
                $lnk = "<a href= '" . SITE_URL . "/Inspinia/loan_exp.php'>" .
                    utf8_decode("Cliquer ici pour accèder page emprunt")
                    . "</a>";

                $message .= "<p>" .
                    utf8_decode(" {$type} de la table d'emprunt pour {$this->person_name}")
                    . "<br><br>";
                $message .= " {$lnk}";
                $message .= "&nbsp;&nbsp;&nbsp;<span style='font-size: smaller'><i>" .
                    utf8_decode("Il se peut que vous devez logger sur le site avant d'accèder à la page")
                    . "</i></span> <br></p>";

            } elseif ($language == "portuguese" || $language == "ptg") {
                $type = $type_ptg;
                $notice = utf8_decode("Notificação");
                $message .= "<b>" .
                    utf8_decode("Querida, Querido  {$msg_user} {$kamy->first_name},")
                    . "</b><br><br>";
                $lnk = "<a href= '" . SITE_URL . "/Inspinia/loan_exp.php?person_id=$this->person_id'>" .
                    utf8_decode("Clique aqui empréstimo para revisar")
                    . "</a>";

                $message .= "<p>" .
                    utf8_decode("Nós temos {$type} a despesa de empréstimo para {$this->person_name}")
                    . "<br><br>";
                $message .= " {$lnk}";
                $message .= "&nbsp;&nbsp;&nbsp;<span style='font-size: smaller'><i>" .
                    utf8_decode("Você pode precisar fazer o login com sua credencial antes")
                    . "</i></span> <br></p>";
            }

            $message .= $this->table_in_language($language);

            $message .= "<br><br><hr>";

            $mail->Subject .= "- {$notice}: {$this->person_name} - {$type}";

        }


        //Send HTML or Plain Text email
        $mail->isHTML(true);
        $mail->Body = $message;
        //   $mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        return $message . "";

    }


}


class ReportFinance extends MyExpense
{
//    public $category;

    protected static $db_fields = array('id', 'amount', 'cash', 'ccy_id', 'rate', 'person_id', 'expense_type_id', 'expense_type', 'expense_date', 'comment', 'document', 'modification_time', 'currency', 'person_name', 'Yr', 'Mth', 'total', 'itemsCount', 'amountCHF', 'Amt_Pret', 'Amt_PretCHF', 'MthName');

    public static function Report1($XLS = false)
    {
        $output = "";
        $style = "";

        if (!$XLS) {
            $filename = u("Pret-Rbt Mum Year Month");
//            $a = "<a href='/Inspinia/loan_exp_2.php?report=Report1&id=0'>Export Xl</a>";
            $a = "<button style='background-color: #00A300;'>
                <a href='/Inspinia/loan_exp_2.php?report=Report1&id=0&filename=$filename'><span style='color: white'>Export XlS</span></a>
                </button>";
        }

//        $array_header = ["Year", "Month Name", "Mth", "No Item", "Amount CHF"];
        $output .= $a;

        $sql = "SELECT year(e.expense_date) as Yr, monthname (e.expense_date) as MthName,
       month(e.expense_date) as Mth,COUNT(e.id) AS itemsCount,SUM(ROUND(e.amount * e.rate,2)) AS amountCHF,
       SUM(e.amount)  as amount
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date),month(e.expense_date)
ORDER BY year(e.expense_date) DESC,month(e.expense_date) DESC";


        $table_class = Table::full_table_class();

        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>Year" . "</th>
                          <th class='text-center'>Mth Name" . "</th>
                          <th class='text-center'>Mth No" . "</th>
                          <th class='text-center'>No Items" . "</th>
                          <th class='text-center'>Amount CHF" . "</th>
                          </tr>";

        $results = static::find_by_sql($sql);

        if ($results) {

            foreach ($results as $result) {
                $output .= "<tr>";
                $output .= "<td class='text-center'>{$result->Yr}</td>";
                $output .= "<td class='text-center'>{$result->MthName}</td>";
                $output .= "<td class='text-center'>{$result->Mth}</td>";
                $output .= "<td class='text-center'>{$result->itemsCount}</td>";
//                 if( ((float) $result->amountCHF) < 0){$style="style='color:red'";} else {$style="";}
                $style = NumberFormatColor($result->amountCHF);
                $amount_format = number_format($result->amountCHF, 2);
                if ($XLS) {
                    $output .= "<td class='text-right' >" . $result->amountCHF . "</td>";
                } else {
                    $output .= "<td class='text-right' $style >" . number_format($result->amountCHF, 2) . "</td>";
                }

                $output .= "</tr>";
            }
        }

        unset($results);

        if (!$XLS) {
            $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2");
            $style = NumberFormatColor($sum);
            $sum = number_format($sum, 2);

            $output .= "<tr>";
            $output .= "<td class='text-center'><strong>Total</strong></td>";
            $output .= str_repeat("<td></td>", 3);

            $output .= "<td class='text-right' $style><strong>" . $sum . "</strong></td>";
            $output .= "</tr>";
        }

        $output .= "</table>";
        return $output;
    }


    public static function SQL1()
    {
        $sql = "SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount, SUM(e.amount) as amount,SUM(ROUND(e.amount * e.rate,2)) AS amountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC";

        return $sql;
    }

    public static function SQL2()
    {
        $sql = "SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount,
       SUM(ROUND(e.amount * e.rate,2)) AS amountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2 and e.amount >=0   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC";

        return $sql;
    }

    public static function SQL3()
    {
        $sql = "SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount,
       SUM(ROUND(e.amount * e.rate,2)) AS amountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2 and e.amount < 0   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC";

        return $sql;
    }


    public static function SQL4()
    {
        $sql = "SELECT year(e.expense_date) AS Yr, month (e.expense_date) AS Mth,monthname (e.expense_date) as MthName,
       e.expense_date, e.id,e.amount,c.currency,ROUND(e.amount * e.rate,2) AS amountCHF,e.ccy_id,c.rate,e.expense_type_id,t.expense_type,e.comment,p.person_name,e.person_id ,e.cash 
 FROM myexpense as e
 INNER JOIN  myexpense_person as p ON e.person_id = p.id
 INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
 INNER JOIN  currency as c ON e.ccy_id = c.id
  WHERE person_id=2  and(e.expense_type_id in (1,3))
  ORDER BY e.id DESC;";

        return $sql;
    }

    public static function SQL4a()
    {
        $sql = "SELECT year(e.expense_date) AS Yr, month (e.expense_date) AS Mth,monthname (e.expense_date) as MthName,
       e.expense_date, e.id,e.amount,c.currency,ROUND(e.amount * e.rate,2) AS amountCHF,e.ccy_id,c.rate,e.expense_type_id,t.expense_type,e.comment,p.person_name,e.person_id,e.cash 
 FROM myexpense as e
 INNER JOIN  myexpense_person as p ON e.person_id = p.id
 INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
 INNER JOIN  currency as c ON e.ccy_id = c.id
  WHERE person_id=2  and(e.expense_type_id in (1,3)) and e.cash=1  
  ORDER BY e.id DESC;";

        return $sql;
    }


    public static function SQL5()
    {
        $sql = "SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount,
       SUM(ROUND(e.amount * e.rate,2)) AS amountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2 and e.amount < 0   and(e.expense_type_id in (1,3)) and e.cash=1 
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC";

        return $sql;
    }

    public static function SQL6()
    {
        $sql = "SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount,
       SUM(ROUND(e.amount * e.rate,2)) AS amountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2 and e.amount > 0   and(e.expense_type_id in (1,3)) and e.cash=1 
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC";

        return $sql;
    }

    public static function Report($No = 0, $XLS = false)
    {
        $output = "";
        $style = "";

//        $array_header = ["Year", "Month Name", "Mth", "No Item", "Amount CHF"];

        if ($No === 1) {
            $sql = static::SQL1();
            $filename = u("Pret-Rbt Mum Year");

        } elseif ($No === 2) {
            $sql = static::SQL2();
            $filename = u("Pret Mum Year");
        } elseif ($No === 3) {
            $sql = static::SQL3();
            $filename = u("Rbt Mum Year");
        } elseif ($No === 4) {
            $sql = static::SQL5();
            $filename = u("Mum Year Cash Rbt");
        } elseif ($No === 5) {
            $sql = static::SQL6();
            $filename = u("Mum Year Cash Rbt");
        }

        if (!$XLS) {
//            $txt = "Prêt-Rbt Mum Year Month";
            $a = "<button style='background-color: #00A300;'><a href='/Inspinia/loan_exp_2.php?report=Report&id=$No&filename=$filename'><span style='color: white'>Export XlS</span></a></button>";
        }


        $table_class = Table::full_table_class();
        $output .= $a;
        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>Year" . "</th>
                          <th class='text-center'>No Items" . "</th>
                          <th class='text-center'>Amount CHF" . "</th>
                          </tr>";

        $results = static::find_by_sql($sql);

        if ($results) {

            foreach ($results as $result) {
                $output .= "<tr>";
                $output .= "<td class='text-center'>{$result->Yr}</td>";
                $output .= "<td class='text-center'>{$result->itemsCount}</td>";

                if (!$XLS) {
                    $output .= TD_NumberFormatColor($result->amountCHF, false);;
                } else {
                    $output .= (float)$result->amountCHF;;
                }


                $output .= "</tr>";
            }
        }

        unset($results);
        if (!$XLS) {

            if ($No === 1) {
                $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2 ");
            } elseif ($No === 2) {
                $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2 and amount >= 0 ");
            } elseif ($No === 3) {
                $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2 and amount <0 ");
            } elseif ($No === 4) {
                $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2 and amount <0 and cash=1 ");
            } elseif ($No === 5) {
                $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2 and amount >0 and cash=1 ");
            }


            $output .= "<tr>";
            $output .= "<td class='text-center'><strong>Total</strong></td>";
            $output .= str_repeat("<td></td>", 1);
            $output .= TD_NumberFormatColor($sum, true);
            $output .= "</tr>";
        }


        $output .= "</table>";
        return $output;
    }


    public static function Report4($XLS = false)
    {
        $output = "";
        $style = "";


        $sql = static::SQL4();
        $filename = u("Pret-Rbt Mum All");

        if (!$XLS) {
//            $txt = "Prêt-Rbt Mum Year Month";
            $a = "<button style='background-color: #00A300;'><a href='/Inspinia/loan_exp_2.php?report=Report4&id=0&filename=$filename'><span style='color: white'>Export XlS</span></a></button>";
        }


        $table_class = Table::full_table_class();
        $output .= $a;
        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>ID" . "</th>
                          <th class='text-center'>Year" . "</th>
                          <th class='text-center'>Mth" . "</th>
                          <th class='text-center'>MthName" . "</th>
                          <th class='text-center'>Exp Date" . "</th>                          
                          <th class='text-center'>Amount" . "</th>
                          <th class='text-center'>CCY" . "</th>                      
                          <th class='text-center'>Amount CHF" . "</th>
                          <th class='text-center'>Cash" . "</th>
                          <th class='text-center'>CCY ID" . "</th>
                          <th class='text-center'>RATE" . "</th>
                          <th class='text-center'>Exp type ID" . "</th>
                          <th class='text-center'>Exp type" . "</th>
                          <th class='text-center'>Comment" . "</th>
                          <th class='text-center'>Person Name" . "</th>
                          <th class='text-center'>Person Name ID" . "</th>
                          
                          
                          </tr>";

        $results = static::find_by_sql($sql);

        if ($results) {

            foreach ($results as $result) {
                $output .= "<tr>";
                if (User::is_admin()) {
                    $lnk = "/public/admin/crud/data/edit_data.php?class_name=" . get_parent_class() . "&id={$result->id}";
                    $output .= "<td class='text-center'><a href='{$lnk}'>{$result->id}</a></td>";
                } else {
                    $output .= "<td class='text-center'>{$result->id}</td>";

                }


                $output .= "<td class='text-center'>{$result->Yr}</td>";
                $output .= "<td class='text-center'>{$result->Mth}</td>";
                $output .= "<td class='text-center'>{$result->MthName}</td>";
                $output .= "<td class='text-center'>{$result->expense_date}</td>";


                if (!$XLS) {
                    $output .= TD_NumberFormatColor($result->amount, false);;
                } else {
                    $output .= "<td class='text-center'>" . (float)$result->amount . "</td>";;
                }
                $output .= "<td class='text-center'>{$result->currency}</td>";
                if (!$XLS) {
                    $output .= TD_NumberFormatColor($result->amountCHF, false);;
                } else {
                    $output .= "<td class='text-center'>" . (float)$result->amountCHF . "</td>";;
                }

                if ($result->cash == 1) {
                    $output .= "<td class='text-center' style='color:blue'><strong>Yes</strong></td>";
                } else {
                    $output .= "<td class='text-center'>No</td>";
                }

                $output .= "<td class='text-center'>{$result->ccy_id}</td>";


                $output .= "<td class='text-center'>{$result->rate}</td>";
                $output .= "<td class='text-center'>{$result->expense_type_id}</td>";
                $output .= "<td class='text-center'>{$result->expense_type}</td>";
                $output .= "<td class='text-center'>{$result->comment}</td>";
                $output .= "<td class='text-center'>{$result->person_name}</td>";
                $output .= "<td class='text-center'>{$result->person_id}</td>";

                $output .= "</tr>";
            }
        }

        unset($results);
        if (!$XLS) {

            $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2 ");

            $output .= "<tr>";
            $output .= "<td class='text-center'><strong>Total</strong></td>";
            $output .= str_repeat("<td></td>", 5);
            $output .= TD_NumberFormatColor($sum, true);
            $output .= "</tr>";
        }
        $output .= "</table>";
        return $output;
    }

    public static function Report4a($XLS = false)
    {
        $output = "";
        $style = "";


        $sql = static::SQL4a();
        $filename = u("Pret-Rbt MumCash");

        if (!$XLS) {
//            $txt = "Prêt-Rbt Mum Year Month";
            $a = "<button style='background-color: #00A300;'><a href='/Inspinia/loan_exp_2.php?report=Report4&id=0&filename=$filename'><span style='color: white'>Export XlS</span></a></button>";
        }


        $table_class = Table::full_table_class();
        $output .= $a;
        $output .= "<table class='$table_class '>";
        $output .= "<tr>
                          <th class='text-center'>ID" . "</th>
                          <th class='text-center'>Year" . "</th>
                          <th class='text-center'>Mth" . "</th>
                          <th class='text-center'>MthName" . "</th>
                          <th class='text-center'>Exp Date" . "</th>                          
                          <th class='text-center'>Amount" . "</th>
                          <th class='text-center'>CCY" . "</th>                      
                          <th class='text-center'>Amount CHF" . "</th>
                          <th class='text-center'>Cash" . "</th>
                          <th class='text-center'>CCY ID" . "</th>
                          <th class='text-center'>RATE" . "</th>
                          <th class='text-center'>Exp type ID" . "</th>
                          <th class='text-center'>Exp type" . "</th>
                          <th class='text-center'>Comment" . "</th>
                          <th class='text-center'>Person Name" . "</th>
                          <th class='text-center'>Person Name ID" . "</th>
                          
                          
                          </tr>";

        $results = static::find_by_sql($sql);

        if ($results) {

            foreach ($results as $result) {
                $output .= "<tr>";
                if (User::is_admin()) {
                    $lnk = "/public/admin/crud/data/edit_data.php?class_name=" . get_parent_class() . "&id={$result->id}";
                    $output .= "<td class='text-center'><a href='{$lnk}'>{$result->id}</a></td>";
                } else {
                    $output .= "<td class='text-center'>{$result->id}</td>";

                }


                $output .= "<td class='text-center'>{$result->Yr}</td>";
                $output .= "<td class='text-center'>{$result->Mth}</td>";
                $output .= "<td class='text-center'>{$result->MthName}</td>";
                $output .= "<td class='text-center'>{$result->expense_date}</td>";


                if (!$XLS) {
                    $output .= TD_NumberFormatColor($result->amount, false);;
                } else {
                    $output .= "<td class='text-center'>" . (float)$result->amount . "</td>";;
                }
                $output .= "<td class='text-center'>{$result->currency}</td>";
                if (!$XLS) {
                    $output .= TD_NumberFormatColor($result->amountCHF, false);;
                } else {
                    $output .= "<td class='text-center'>" . (float)$result->amountCHF . "</td>";;
                }

                if ($result->cash == 1) {
                    $output .= "<td class='text-center' style='color:blue'><strong>Yes</strong></td>";
                } else {
                    $output .= "<td class='text-center'>No</td>";
                }

                $output .= "<td class='text-center'>{$result->ccy_id}</td>";


                $output .= "<td class='text-center'>{$result->rate}</td>";
                $output .= "<td class='text-center'>{$result->expense_type_id}</td>";
                $output .= "<td class='text-center'>{$result->expense_type}</td>";
                $output .= "<td class='text-center'>{$result->comment}</td>";
                $output .= "<td class='text-center'>{$result->person_name}</td>";
                $output .= "<td class='text-center'>{$result->person_id}</td>";

                $output .= "</tr>";
            }
        }

        unset($results);
        if (!$XLS) {

            $sum = static::sum_field_where($field = "amount * rate", " WHERE person_id = 2 and cash=1 ");

            $output .= "<tr>";
            $output .= "<td class='text-center'><strong>Total</strong></td>";
            $output .= str_repeat("<td></td>", 5);
            $output .= TD_NumberFormatColor($sum, true);
            $output .= "</tr>";
        }
        $output .= "</table>";
        return $output;
    }

}


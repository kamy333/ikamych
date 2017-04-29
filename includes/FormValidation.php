<?php
// presence
//string lengh
//type
// inclusion in set
//unique
//format
/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 8/29/2015
 * Time: 12:54 PM
 */
class FormValidation {

public $errors = array();
public $warnings=array();


  static  function get_warning_error_div($msg_arg,$warning_me=false)
    {
        // formats text in alert view
        $msg = "";

        if ($warning_me) {
            $alert = "warning";
            $gliphicon = "warning-sign";
            $txt = "Warning";
        } else {
            $alert = "danger";
            $gliphicon = "exclamation-sign";
            $txt = "Error";
        }

        //   {$alert} {$gliphicon} {$txt}
        if ($msg_arg) {
            $msg .= "<div class=\"alert alert-{$alert}\" role='alert'>";
            $msg .= "<a href='#' class='close' data-dismiss='alert'>&times;</a>";
            $msg .= "<span class=\"glyphicon glyphicon-{$gliphicon}\" aria-hidden='true'></span>";
            $msg .= "<span class=\"sr-only\"><strong>{$txt}:</strong></span>";
            $msg .= " " . $msg_arg;
            $msg .= "</div>";
        } else {
            $msg = "";
        }

        return $msg;
    }



  static  function get_warning_error_p($msg_arg,$warning_me=false)    {
        // formats text in alert view

        //   <p class="help-block col-sm-offset-3" style="font-size:0.9em;color:#ff0000" id="errorMessagePseudo"></p>

        $msg="";

        if($warning_me)
        {$alert="warning"; $gliphicon="warning-sign";$txt="Warning";
        }else {
         $alert="danger"; $gliphicon="exclamation-sign";$txt="Error";  }

        //   {$alert} {$gliphicon} {$txt}
        if($msg_arg){
            $msg.= "<p class=\"alert alert-{$alert} help-block col-sm-offset-3\" role='alert'>";
            $msg.="<a href='#' class='close' data-dismiss='alert'>&times;</a>";
            $msg.="<span class=\"glyphicon glyphicon-{$gliphicon}\" aria-hidden='true'></span>";
            $msg.="<span class=\"sr-only\"><strong>{$txt}:</strong></span>";
            $msg.=" ". $msg_arg;
            $msg .= "</p>";
        } else {
            $msg="";
        }

        return $msg;


    }

    public function validate_presences($required_fields, $warning_me=false) {
        // second arg to get as warning
//        $this->errors;
//        $this->warnings;

        $msg_presence=array();

        if (is_array($required_fields)) {
            foreach ($required_fields as $field) {
                $value = trim($_POST[$field]);
                if (!$this->has_presence($value)) {
                    if ($warning_me) {
                        $this->warnings[$field] = $this->fieldname_as_text($field) . " can't be blank";
                        //  $msg_presence[$field]=get_warning_error($warnings[$field],$warning_me);
                        $msg_presence[$field] = $this->warnings[$field];

                    } else {
                        $this->errors[$field] = $this->fieldname_as_text($field) . " can't be blank";
                        //   $msg_presence[$field]=get_warning_error($errors[$field],$warning_me);;
                        $msg_presence[$field] = $this->errors[$field];


                    }

                }
            }
        }

        return $msg_presence;

    }

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty

    private function has_presence($value)
    {
        return isset($value) && $value !== "";
    }

    private function fieldname_as_text($fieldname)
    {
        $fieldname = str_replace("_", " ", $fieldname);
        $fieldname = ucfirst($fieldname);
        return $fieldname;
    }

   public function validate_presences_non_post($required_fields, $record,$warning_me=false) {
// not coming from post but by query db returning record set eg program 1 record as arrey
        $this->errors;
        $this->warnings;

        $msg_presence=array();
        foreach($required_fields as $field) {
            $value = trim($record[$field]);
            if (!$this->has_presence($value)) {

                if ($warning_me) {
                    $this->warnings[$field] = $this->fieldname_as_text($field) . " n'est pas rempli";

                    $msg_presence[$field]=$this->warnings[$field];
                    //    $msg_presence[$field]=get_warning_error($warnings[$field],$warning_me);

                    //  var_dump($warnings[$field]);
                }else{
                    $this->errors[$field] = $this->fieldname_as_text($field) . " n'est pas rempli ";
                    $msg_presence[$field]=$this->errors[$field];
                    //   $msg_presence[$field]=get_warning_error($errors[$field],$warning_me);;


                }
                //   var_dump(debug_backtrace());

            }
        }

        return $msg_presence;
    }

// taken from W3C used in email

    function validate_email($fields_with_email,$warning_me=false){
     //   global $errors;
     //   global $warnings;
// post [name] as argument
        $msg_email="";

        if (is_array($fields_with_email)){
            foreach($fields_with_email as $field) {
                $email = $this->test_input($_POST[$field]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // $emailErr = "Invalid email format";
                    if ($warning_me) {
                        $this->warnings[$field] = $this->fieldname_as_text($field) . " Invalid email format";
                        $msg_email=$this->warnings[$field];
                    }else{
                        $this->errors[$field] = $this->fieldname_as_text($field) . " Invalid email format";
                        $msg_email=$this->errors[$field];
                    }

                }
            }
        } else {
            $email = $this->test_input($_POST[$fields_with_email]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // $emailErr = "Invalid email format";
                if ($warning_me) {
                    $this->warnings['email'] = $this->fieldname_as_text($fields_with_email) . " Invalid email format";
                    $msg_email=$this->warnings[$fields_with_email];
                }else{
                    $this->errors['email'] = $this->fieldname_as_text($fields_with_email) . " Invalid email format";
                    $msg_email=$this->errors[$fields_with_email];
                }

            }
        }



    }

    protected function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

// * string length
// max length

    function validate_max_lengths($fields_with_max_lengths,$warning_me=false) {

        // Expects an assoc. array
        foreach($fields_with_max_lengths as $field => $max) {
            $value = trim($_POST[$field]);
            if (!$this->has_max_length($value, $max)) {

                if($warning_me){
                    $this->warnings[$field] = $this->fieldname_as_text($field)  ." need a maximun of $max characters";
                }else {
                    $this->errors[$field] = $this->fieldname_as_text($field)  ." need a maximum of $max characters";
                }
            }
        }
    }

    protected function has_max_length($value, $max)
    {
        return strlen($value) <= $max;
    }

    function validate_min_lengths($fields_with_min_lengths,$warning_me=false) {

        // Expects an assoc. array
        foreach($fields_with_min_lengths as $field => $min) {
            $value = trim($_POST[$field]);
            if (!$this->has_min_length($value, $min)) {

                if($warning_me){
                    $this->warnings[$field] = $this->fieldname_as_text($field) . " need a minimun of $min characters";

                }else {
                    $this->errors[$field] = $this->fieldname_as_text($field) . " need a minimun of $min characters";
                }
            }
        }
    }

    protected function has_min_length($value, $min)
    {
        return strlen($value) >= $min;
    }
// * validate value is inclused in a set

  public  function has_inclusion_in($value, $set=[]) {
        return in_array($value, $set);
    }

// * validate value is excluded from a set
   public function has_exclusion_from($value, $set=[]) {
        return !in_array($value, $set);
    }



// * validate value has a format matching a regular expression
// Be sure to use anchor expressions to match start and end of string.
// (Use \A and \Z, not ^ and $ which allow line returns.)
//
// Example:
// has_format_matching('1234', '/\d{4}/') is true
// has_format_matching('12345', '/\d{4}/') is also true
// has_format_matching('12345', '/\A\d{4}\Z/') is false
    function has_format_matching($value, $regex='//') {
        return preg_match($regex, $value);
    }

// * validate value is a number
// submitted values are strings, so use is_numeric instead of is_int
// options: max, min
// has_number($items_to_order, ['min' => 1, 'max' => 5])

    public function is_numeric($fields_numeric, $options=[],$warning_me=false)
    {


        if(is_array($fields_numeric)){


//    echo "zut";
//    echo $fields_numeric;
            foreach ($fields_numeric as $field) {

                //  print_r($fields_numeric);


                $value = trim($_POST[$field]);
                if (!is_numeric($value)) {

                    if($warning_me){
                        $this->warnings[$field] = $this->fieldname_as_text($field) . " is not a number";

                    }else {
                        $this->errors[$field] = $this->fieldname_as_text($field) . " is not a number";
                    }

                }

                if(isset($options['max']) && ($value > (int)$options['max'])) {
                    if($warning_me){
                        $this->warnings[$field." max"] = $this->fieldname_as_text($field) . " cannot be more than " .$options['max'];

                    }else {
                        $this->errors[$field." max"] = $this->fieldname_as_text($field) . " cannot be more than " .$options['max'];
                    }

                }
                if(isset($options['min']) && ($value < (int)$options['min'])) {
                    if($warning_me){
                        $this->warnings[$field." min"] = $this->fieldname_as_text($field) . " cannot be less than " .$options['min'];

                    }else {
                        $this->errors[$field." min"] = $this->fieldname_as_text($field) .  " cannot be less than " .$options['min'];
                    }


                }
                return true;

            } // end of each

        } else {
            $value = trim($_POST[$fields_numeric]);
            if (!is_numeric($value)) {

                if($warning_me){
                    $this->warnings[$fields_numeric] = $this->fieldname_as_text($fields_numeric) . " is not a number";

                }else {
                    $this->errors[$fields_numeric] = $this->fieldname_as_text($fields_numeric) . " is not a number";
                }

            }

            if(isset($options['max']) && ($value > (int)$options['max'])) {
                if($warning_me){
                    $this->warnings[$fields_numeric." max"] = $this->fieldname_as_text($fields_numeric) . " cannot be more than " .$options['max'];

                }else {
                    $this->errors[$fields_numeric." max"] = $this->fieldname_as_text($fields_numeric) . " cannot be more than " .$options['max'];
                }

            }
            if(isset($options['min']) && ($value < (int)$options['min'])) {
                if($warning_me){
                    $this->warnings[$fields_numeric." min"] = $this->fieldname_as_text($fields_numeric) . " cannot be less than " .$options['min'];

                }else {
                    $this->errors[$fields_numeric." min"] = $this->fieldname_as_text($fields_numeric) .  " cannot be less than " .$options['min'];
                }


            }
            return true;

        }


    }


    public function is_equal($value1,$value2){
        if(isset($_POST[$value1]) &&isset($_POST[$value2]) ){
            $v1=trim($_POST[$value1]);
            $v2=trim($_POST[$value2]);
            if($v1!==$v2){
                $this->errors["equality"]=$this->fieldname_as_text($value1). " and ". $this->fieldname_as_text($value2)." have different values";
            }

        } else {
            $this->errors["equality"]=$this->fieldname_as_text($value1). " and ". $this->fieldname_as_text($value2)." missing value(s) to compare";


        }





    }


    public function validate_Date($fields_with_dates, $format = 'YYYY-MM-DD', $return_value = false)
    {
    $year=""; $day=""; $month="";
   // $field="Date" ;


       foreach($fields_with_dates as $field) {
           $mydate = trim($_POST[$field]);
           if ($format == 'YYYY-MM-DD') list($year, $month, $day) = explode('-', $mydate);
           if ($format == 'YYYY/MM/DD') list($year, $month, $day) = explode('/', $mydate);
           if ($format == 'YYYY.MM.DD') list($year, $month, $day) = explode('.', $mydate);

           if ($format == 'DD-MM-YYYY') list($day, $month, $year) = explode('-', $mydate);
           if ($format == 'DD/MM/YYYY') list($day, $month, $year) = explode('/', $mydate);
           if ($format == 'DD.MM.YYYY') list($day, $month, $year) = explode('.', $mydate);

           if ($format == 'MM-DD-YYYY') list($month, $day, $year) = explode('-', $mydate);
           if ($format == 'MM/DD/YYYY') list($month, $day, $year) = explode('/', $mydate);
           if ($format == 'MM.DD.YYYY') list($month, $day, $year) = explode('.', $mydate);

           if (is_numeric($year) && is_numeric($month) && is_numeric($day)){
               if( !checkdate($month,$day,$year)){
                   $this->errors[$field] = $this->fieldname_as_text($field) . " is not valid date";


               } else {

                   if ($return_value) {
                       $_POST[$field] = $year . "-" . $month . "-" . $day;
                   }
//                   return true;
               }

           } else{
               $this->errors[$field] = $this->fieldname_as_text($field) . " is not valid date";

           }

               }



    }


    public function validate_time($fields_with_times = [], $warning_me = false)
    {
        if (!is_array($fields_with_times)) {
            $field_time = $fields_with_times;
            $myTime = trim($_POST[$field_time]);
            $this->validate_time_individual($myTime, $field_time, $warning_me);


        } else {
            foreach ($fields_with_times as $fields_time) {
                $myTime = trim($_POST[$fields_time]);
                $this->validate_time_individual($myTime, $fields_time, $warning_me);


            }
        }

    }

    protected function validate_time_individual($myTime, $field, $warning_me = false)
    {

        $myTime=substr($myTime, 0,8);

        $time = preg_match('#^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$#', $myTime);
        if ($time == 1) {


            return true;
        } else {

            if ($warning_me) {
                $this->warnings[$field] = $this->fieldname_as_text($field) . "$myTime is not valid time";

            } else {
                $this->errors[$field] = $this->fieldname_as_text($field) . "$myTime is not valid time";
            }
            return false;

            // make a error!
        }
    }

  public  function validate_website ($field="",$warning_me=false){

      //  $field=" URL";
        $website = $this->test_input($_POST[$field]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
           // $websiteErr = "Invalid URL";
            if($warning_me){
                $this->warnings[$field] = $this->fieldname_as_text($field) . " is invalid use eg https:";

            }else {

                $this->errors[$field] = $this->fieldname_as_text($field) . "is invalid use eg https:";
            }

        }


    }





    public function unique_name($name,$class_name,$warning_me=false){
        global $database;


        $safe_name=$database->escape_value(trim($_POST[$name]));


        $table=   $class_name::get_table_name();
        $field = $name;
        $txt=" already exists. Choose a new one";


        $sql="SELECT * FROM"." ".$table." WHERE {$name}=";
        if(is_numeric($name)){
            $sql.="{$safe_name}";
        } else {
            $sql.="'{$safe_name}'";

        }

        $result=$class_name::find_by_sql($sql);

        if($result){

            if($warning_me){
                $this->warnings[$field] = $this->fieldname_as_text($field) . $txt;
                $msg= $this->warnings[$field];
            }else{
                $this->errors[$field] = $this->fieldname_as_text($field) . $txt;
                $msg= $this->errors[$field];
            }
        }

    }


    public function unique_category($warning_me=false){
        global $database;

     $category1=(int)$_POST['category_1_id'] ;
     $category2=(int)$_POST['category_2_id'] ;
     $safe_category1=$database->escape_value($category1);
     $safe_category2=$database->escape_value($category2);


     $table=   Category::get_table_name();
     $field = "category_1/category_2";
     $txt=" combination already exists. Choose a new one";


        $sql="SELECT * FROM"." ".$table." WHERE category_1_id={$safe_category1} AND category_2_id={$safe_category2}";

        $result=Category::find_by_sql($sql);

        if($result){

            if($warning_me){
                $this->warnings[$field] = $this->fieldname_as_text($field) . $txt;
                $msg= $this->warnings[$field];
            }else{
                $this->errors[$field] = $this->fieldname_as_text($field) . $txt;
                $msg= $this->errors[$field];
            }
        }

    }




  public  function validation_pseudo_clients($pseudo,$warning_me=false){

        $this->errors;
        $this->warnings;

        global $database;


        $safe_pseudo= $database->escape_value($pseudo);
        $field = $safe_pseudo;


        $query  = "SELECT * ";
        $query .= "FROM clients ";
        $query .= "WHERE pseudo = '{$safe_pseudo}' ";
        $query .= "LIMIT 1";
        $client_set = $database->query( $query);
      //  confirm_query($client_set);

        $msg="";
        $txt=" n'est pas inclus dans la liste des clients. Si c'est un nouveau client veuillez le rajouter dans la table client  ou sinon utilisez AUTRES puis rajouter le nom dans le champs nom";

        $txt=" is not included in client database. Please add if necessary as new client";

        $pseudo_count = $database->num_rows($client_set);
        if($pseudo_count == 0) {

            if($warning_me){
                $this->warnings[$field] = $this->fieldname_as_text($field) . $txt;
                $msg= $this->warnings[$field];
            }else{
                $this->errors[$field] = $this->fieldname_as_text($field) . $txt;
                $msg= $this->errors[$field];
            }


        }
        $database->free_result($client_set);

        return $msg;
    }




    function check_date_vs_now($str_time,$warning_me=false)
    {

        // attention contrairement aux autres validation $warning_me part defaut true
        // pour error  rajouter false en appellant la fonction apres la date

        $this->errors;
        $this->warnings;

        $unix_time_date = strtotime($str_time);
        $unix_time_now = strtotime('now');

        $date_input = strftime("%Y-%m-%d", $unix_time_date);
        $date_now = strftime("%Y-%m-%d", $unix_time_now);

        list ($date_fr, $date_fr_short, $date_fr_long, $date_fr_hr, $date_fr_short_hr, $date_fr_long_hr, $date_fr_full_hr) = date_fr($date_input);

        $date_input_fr = $date_fr_short;

        list ($date_fr, $date_fr_short, $date_fr_long, $date_fr_hr, $date_fr_short_hr, $date_fr_long_hr, $date_fr_full_hr) = date_fr($date_now);

        $date_now_fr = $date_fr_short;

        $field = "Attention date";

        $msg = "";
        $text_array = "";
        $text_return = "Attention la date est au <strong>{$date_input_fr}</strong> aujourd'hui est <strong>{$date_now_fr}</strong>. Assurez-vous si necessaire de rentrer la bonne date ";

        if ($date_input === $date_now) {
            return null;
        } else {

            if ($warning_me) {
                $this->warnings[$field] = $this->fieldname_as_text($field) . " car elle n'est pas aujourd'hui. Assurez-vous de changer la date si necessaire ";

                return $text_return;

            } else {

                $this->errors[$field] = $this->fieldname_as_text($field) . " car elle n'est pas aujourd'hui. Assurez-vous de changer la date si necessaire ";

                return $text_return;

            }

        }
    }



    public function form_errors() {
        $output = "";
        if (!empty($this->errors)) {
            $output .= "<div class=\"alert alert-danger\" role='alert'>";
            $output.="<a href='#' class='close' data-dismiss='alert'>&times;</a>";
            $output.="<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden='true'></span>";
            $output.="<span class=\"sr-only\"><strong>Error:</strong></span>";
            $output .= " <strong>Please fix the following errors:</strong>";
            $output .= "<ul>";
            foreach ($this->errors as $key => $error) {
                $output .= "<li>";
                $output .= htmlentities($error, ENT_COMPAT, 'utf-8');
                $output .= "</li>";
            }
            $output .= "</ul>";
            $output .= "</div>";
        }
        return $output;
    }


   public  function form_warnings()
   {
       $output = "";
       if (!empty($this->warnings)) {
           $output .= "<div class=\"alert alert-warning\" role='alert'>";
           $output .= "<a href='#' class='close' data-dismiss='alert'>&times;</a>";
           $output .= "<span class=\"glyphicon glyphicon-warning-sign\" aria-hidden='true'></span>";
           $output .= "<span class=\"sr-only\"><strong>Notice:</strong></span>";
           $output .= "<strong>Please be aware of the following warnings:</strong>";
           $output .= "<ul>";
           foreach ($this->warnings as $key => $warning) {
               $output .= "<li>";
               $output .= htmlentities($warning, ENT_COMPAT, 'utf-8');
               $output .= "</li>";
           }
           $output .= "</ul>";
           $output .= "</div>";
       }
       return $output;
   }


    public function exist_in_table($table, $field, $criteria, $warning_me = false)
    {
        global $database;

        $safe_field = $database->escape_value($field);
        $safe_criteria = $database->escape_value($criteria);

//    $field = $safe_pseudo;


        $query = "SELECT * ";
        $query .= "FROM {$table} ";
        $query .= "WHERE {$safe_field} = '{$safe_criteria}' ";
        $query .= "LIMIT 1";

        $client_set = $database->query($query);

        $txt = " is not included in {$table} table database. Please add if necessary as new {$table}";

        $pseudo_count = $database->num_rows($client_set);
        if ($pseudo_count == 0) {

            if ($warning_me) {
                $this->warnings[$field] = $this->fieldname_as_text($field) . $txt;
                $msg = $this->warnings[$field];
            } else {
                $this->errors[$field] = $this->fieldname_as_text($field) . $txt;
                $msg = $this->errors[$field];
            }


        }
        $database->free_result($client_set);

        return $txt;
    }


}
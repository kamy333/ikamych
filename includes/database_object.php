<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
class DatabaseObject
{

    // I'm waiting for Late Static Bindings in PHP 5.3
    // http://www.php.net/lsb

    // the below can be in his own class with php.5.3 move to DatabaseObject and change self to static or get_called_class() to get which object is calling aloo add the
    // protected static $table_name

    public static $page_name;


//    public static $page_manage;
//    public static $page_new;
//    public static $page_edit;
//    public static $page_delete;


//    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=" . __CLASS__;
    public static $page_manage = "/public/admin/crud/data/manage_data.php?class_name=" . __CLASS__;

    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=" . __CLASS__;
//    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=" . __CLASS__;

    public static $page_edit = "/public/admin/crud/data/edit_data.php?class_name=" . __CLASS__; //  "edit_link.php"

    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=" . __CLASS__;


//    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php";
//    public static $page_new = "/public/admin/crud/ajax/new_ajax.php";
//    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php";
//    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php";

//    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php";
//    public static $page_new = "/public/admin/crud/ajax/new_ajax.php";
//    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php";
//    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php";

    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $form_class_dependency = [];
    public static $pagination_per_page = 20;
    public static $fields_numeric; // array assoc key->format feed see todo

    // todo not use but too attempt to have sort reference on table head an db field
    public static $fields_numeric_format = [];
    public static $db_field_search;
    public static $get_form_element;
    public static $get_form_element_all;
    public static $form_default_value;
    public static $fields_image; // todo  so image exist and are uploaded

    protected static $table_name; // used for form new the related links put class dependency in array
    protected static $existing_password;

//this is for 1 page
    protected static $db_fields;
    protected static $db_fields_update;
    protected static $db_fields_table_display_short;
    protected static $db_fields_table_display_full;
    protected static $db_field_exclude_table_display_sort = null;
    protected static $db_field_include_table_display_sort = null;
    protected static $field_replace_display = null;
    protected static $form_properties;
    protected static $form_properties_search;
    public static $db_fields_not_set_post = [];

    public static function post_form_class()
    {
//    this used for special fprm delegated to child class


    }

    public static function post_form($data = "data")
    {
        global $session;

        if ($data == "data" || $data == 'ajax' || $data == 'transport') {

            static::change_to_unique_data($data);


        }

        if (request_is_post() && request_is_same_domain()) {

            if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
                $message = "Sorry, request was not valid.";
            } else {

                $new_item = new static;
                $expected_fields = static::get_table_field();
                $new_item->assign_posted_fields($_POST, $expected_fields);

                //todo complete valid like pseudo

                if (isset($new_item->id)) {
                    $text_post = "Updated";
                    $text_post1 = "update";
                } else {
                    $text_post = "created";
                    $text_post1 = "creation";

                }

                $valid = $new_item->form_validation();

                if (empty($valid->errors)) {
                    $message = '';

                    if ($new_item->save()) {
                        $message = get_called_class() . $new_item->pseudo . " " . "has been $text_post with ID (" . $new_item->id . ")";
                        if ($data == "ajax") {
//                          return output_message($message,'o');
                            unset($_POST);
                            return "$message";
                        } else {
                            $session->message($message);
                            $session->ok(true);
                            unset($_POST);

                            redirect_to(static::$page_manage);
                        }
//                        $session->message(get_called_class().$new_item->pseudo." "."has been $text_post with ID (".$new_item->id .")");

                    } else {
                        $message = get_called_class() . $new_item->pseudo . " " . "$text_post1 failed or maybe nothing changed";
                        if ($data == "ajax") {
//                            return output_message($message,'e');
                            unset($_POST);
                            return $message;


                        } else {
                            $id = isset($new_item->id) ? filter_var($new_item->id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) : null;
                            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . "?" . "class_name=" . u(get_called_class());
                            if ($id !== false && $id !== null) {
                                $url .= "&id=" . u($id);
                            }
                            $url = clean_query_string($url);
//                            $session->message(get_called_class().$new_item->pseudo." "."$text_post1 failed or maybe nothing changed");
                            $session->message($message);
//                redirect_to($_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
                            unset($_POST);
                            redirect_to($url);
                        }


                    }


                }


            }
        } else {
//            if(request_is_get()){
//                if(isset($_GET['id'])){
//                    $id=$_GET['id'];
//                    $get_item=  static::find_by_id($id);
//                }
//
//
//
//            }

        }
        $message = " oppsssssss should be a post request";
        if ($data == "ajax") {

            return " $message";
        } else {

            return output_message($message, 'e');

        }
    }

    public static function change_to_unique_data($data = 'data', $pages = ['manage', 'new', 'edit', 'delete'])
    {

        $data = trim($data);
        if ($data === "transport") {
            static::$page_manage = "{$data}.php?class_name=" . get_called_class();
            static::$page_new = "{$data}.php?class_name=" . get_called_class();
            static::$page_edit = "{$data}.php?class_name=" . get_called_class();
            static::$page_delete = "{$data}.php?class_name=" . get_called_class();
            return;
        }


        if (is_array($pages)) {
            static::$page_manage = $pages[0] . "_{$data}.php?class_name=" . get_called_class();
            static::$page_new = $pages[1] . "_{$data}.php?class_name=" . get_called_class();
            static::$page_edit = $pages[2] . "_{$data}.php?class_name=" . get_called_class();
            static::$page_delete = $pages[3] . "_{$data}.php?class_name=" . get_called_class();


        }

//
//        static::$page_manage = "manage_{$data}.php?class_name=" . get_called_class();
//        static::$page_new = "new_{$data}.php?class_name=" . get_called_class();
//        static::$page_edit = "edit_{$data}.php?class_name=" . get_called_class();
//        static::$page_delete = "delete_{$data}.php?class_name=" . get_called_class();
    }

    public static function get_table_field()
    {
        $table = static::$db_fields;
        return $table;
    }

    public function save()
    {
        // if the id is set then we update and prevent to create another same user
        // if(isset($this->id)){$this->update();} else {$this->create();}
        return isset($this->id) ? $this->update() : $this->create();

    }

    public function assign_posted_fields(array $post, array $expected_fields)
    {
        $assigned_fields = [];
        foreach ($expected_fields as $field) {
            if (isset($post[$field])) {
                $value = trim($post[$field]);
                if ($field === 'id' && $value === '') {
                    continue;
                }
                $this->$field = $value;
                $assigned_fields[$field] = $value;
            }
        }
        return $assigned_fields;
    }

    public function update()
    {

        $this->set_up_display();
        global $database;
        // Don't forget your SQL syntax and good habits:
        // - UPDATE table SET key='value', key='value' WHERE condition
        // - single-quotes around all values
        // - escape all values to prevent SQL injection
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "`{$key}`='{$value}'";
        }
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE id=" . $database->escape_value($this->id);
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }

    protected function sanitized_attributes()
    {
        global $database;
        $clean_attributes = [];
        // sanitize the values before submitting
        // Note: does not alter the actual value of each attribute
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }

    protected function sanitized_attributes_for_create()
    {
        $attributes = $this->sanitized_attributes();
        if (array_key_exists('id', $attributes) && $attributes['id'] === '') {
            unset($attributes['id']);
        }
        return $attributes;
    }

    private function attributes()
    {
        // return an array of attribute names and their values
        $attributes = [];
        foreach (static::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }


    protected function set_up_display()
    {


    }


    public function create()
    {
        $this->set_up_display();

        global $database;
        // Don't forget your SQL syntax and good habits:
        // - INSERT INTO table (key, key) VALUES ('value', 'value')
        // - single-quotes around all values
        // - escape all values to prevent SQL injection
        $attributes = $this->sanitized_attributes_for_create();
        $field_names = [];
        foreach (array_keys($attributes) as $key) {
            $field_names[] = "`{$key}`";
        }
        $sql = "INSERT INTO" . " " . static::$table_name . " (";
        $sql .= join(", ", $field_names);
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public static function get_form_new_href($array_classes = [])
    {
//used to add related links on new and page get from this and other classes

        $output = "";
        $is_crud_modal = !empty($_GET['crud_modal']) || !empty($_POST['crud_modal']);
        if ($is_crud_modal) {
            return "";
        }

//       $array_classes=['MyExpensePerson', 'MyHouseExpense'];

        $is_new_page = isset($_SERVER['PHP_SELF']) && basename($_SERVER['PHP_SELF']) === 'new_ajax.php';
        $link_class = " class='admin-crud-form-nav__link'";
        $output .= "<nav class='admin-crud-form-nav' aria-label='Form navigation'>";
//      $output .= get_called_class().BR;

        $output .= "<a{$link_class} href=\"" . h(SITE_URL . "/public/admin/index.php") . "\"><i class='fa fa-th-large' aria-hidden='true'></i><span>Index</span></a>";

        $href = clean_query_string(static::$page_manage);
        $output .= "<a{$link_class} href=\"" . h($href) . "\"><i class='fa fa-list' aria-hidden='true'></i><span>Manage " . h(static::$page_name) . "</span></a>";

        if (!$is_new_page) {
            $href = clean_query_string(static::$page_new);
            $output .= "<a{$link_class} href=\"" . h($href) . "\"><i class='fa fa-plus' aria-hidden='true'></i><span>Add " . h(static::$page_name) . "</span></a>";
        }

        foreach ($array_classes as $class) {
            call_user_func_array([$class, 'change_to_unique_data'], ['data']);

            $href = clean_query_string($class::$page_manage);
            $output .= "<a{$link_class} href=\"" . h($href) . "\"><i class='fa fa-list' aria-hidden='true'></i><span>Manage " . h($class::$page_name) . "</span></a>";
////           var_dump($class);
//           $output1 .= $class::$page_manage.BR;
        }
        unset($class);

        foreach ($array_classes as $class) {
            $href = clean_query_string($class::$page_new);
            $output .= "<a{$link_class} href=\"" . h($href) . "\"><i class='fa fa-plus' aria-hidden='true'></i><span>Add " . h($class::$page_name) . "</span></a>";
        }
        $output .= "</nav>";
//       $output = "";
//       $arr = array(1, 2, 3, 4);
//       foreach ($arr as $value) {
//           $output.= $value ;
//       }
        return $output;
    }

    public static function Create_form($copy = true)
    {
        global $Nav;
//        if($Nav->)
//        echo $_SERVER['PHP_SELF'];


        $requested_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $has_id = isset($_GET['id']);

        if ($has_id && ($requested_id === false || $requested_id === null)) {
            return output_message('Sorry, a valid record ID is required.', 'e');
        }

        if ($has_id && !isset($_GET['duplicate_record'])) {
            $post_link = clean_query_string(static::$page_edit . "?id=" . u($requested_id));
            $page = "Update";
            $page1 = "Update ID (" . h((string)$requested_id) . ")";
            $text_post = "Updated";
            $text_post1 = "update";
            $jquery = "update-form-button";
        } else {

            $post_link = clean_query_string(static::$page_new);
            $page = "New";
            $page1 = "Add New ";
            $text_post = "created";
            $text_post1 = "creation";
            $jquery = "add-form-button";
        }

        $is_crud_modal = !empty($_GET['crud_modal']) || !empty($_POST['crud_modal']);
        $return_to = $_GET['return_to'] ?? ($_POST['return_to'] ?? '');
        $safe_return_to = is_safe_local_redirect($return_to) ? $return_to : current_request_uri();

        $output = "";
        $title_text = trim($page1 . " " . static::$page_name);
        $link = $is_crud_modal
            ? "<span>" . h($title_text) . "</span>"
            : "<a  href='" . h($post_link) . " '>" . h($title_text) . "</a>";
        $h4 = "<h4 class='text-center'>{$link} </h4>";
        $output .= "<div class ='form-header-dark-blue admin-crud-form__header'  >";
        $output .= "<p>$link</p>";
        $output .= "</div>";
        $output .= "<div class =\"form-light-blue admin-crud-form__shell\">";
        $output .= "<form name='form_" . get_called_class() . "' id='form_" . get_called_class() . "'  class='form-horizontal admin-crud-form' method='post' action='{$post_link}'> ";
        if ($has_id) {
            $get_item = static::find_by_id($requested_id);
            if (!$get_item) {
                return output_message('Sorry, the requested record was not found.', 'e');
            }
            $output .= static::construct_form($get_item, request_is_get() ? $_GET : false);
        } else {
            $output .= static::construct_form(false, request_is_get() ? $_GET : false);
        }

//        if there is $_GET['id'] it will put id but not $_GET['copy_record']
        $output .= Form::form_id();

        $output .= csrf_token_tag();
        $output .= form::class_name(get_called_class());
        if ($is_crud_modal) {
            $output .= "<input type='hidden' name='crud_modal' value='1'>";
            $output .= "<input type='hidden' name='ikamy_modal' value='crud'>";
            $output .= "<input type='hidden' name='return_to' value='" . h($safe_return_to) . "'>";
        }
//        $output .= "</fieldset>";
        $actions_class = $is_crud_modal ? "admin-crud-form__actions" : "admin-crud-form__actions col-sm-offset-3 col-sm-7 col-xs-3";
        $output .= " <div class='{$actions_class}'>
                   <button  type='submit' name='submit' id='{$jquery}' class='btn btn-primary' >"
            . $page . ' ' . static::$page_name . "</button></div>";
        $cancel_attrs = $is_crud_modal ? " data-dismiss='modal' onclick='if (window.parent && window.parent !== window) { window.parent.postMessage({type: \"ikamyCrudModalCancel\"}, window.location.origin); return false; }'" : "";
        $output .= "<div class='text-right admin-crud-form__cancel' ><a href='"
            . clean_query_string(static::$page_manage) . "'" . " id='cancel-update-new' class='btn btn-info' role='button'{$cancel_attrs} >Cancel</a></div>";
        $output .= "";
        $output .= "</form>";
        $output .= "</div>";
        return $output;
    }


    public static function find_by_id($id = 0)
    {
        $result_array = static::find_by_sql_prepared("SELECT * FROM " . static::$table_name . " WHERE id=? LIMIT 1", [(int) $id], "i");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql = "")
    {
        global $database;
        $result_set = $database->query($sql);
        $object_array = [];
        while ($row = $database->fetch_array($result_set)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }

    public static function find_by_sql_prepared($sql = "", array $params = [], $types = "")
    {
        global $database;
        $result_set = $database->query_prepared($sql, $params, $types);
        $object_array = [];
        while ($row = $database->fetch_array($result_set)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }

    private static function instantiate($record)
    {
        // Could check that $record exists and is an array
        if (isset($record["hashed_password"])) {
            static::$existing_password = $record["hashed_password"];
        }
        // if move to DatabaseObject class self change by
        // $object = new $class_name;
        // $class_name=get_called_class();
        $object = new static;
        // Simple, long-form approach:
        // $object->id 				= $record['id'];
        // $object->username 	= $record['username'];
        // $object->password 	= $record['password'];
        // $object->first_name = $record['first_name'];
        // $object->last_name 	= $record['last_name'];

        // More dynamic, short-form approach:
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute)
    {
        // We don't care about the value, we just want to know if the key exists
        // Will return true or false
        return array_key_exists($attribute, $this->attributes());
    }

    public static function construct_form($get_item = false, $GET = false)
    {
        static::set_form_default_value();
        $output = "";
        $myvalue = "";


        foreach (static::$get_form_element as $val) {


            if (isset($GET[$val])) {
                $myvalue = $_GET[$val];
            } elseif (isset(static::$form_default_value)) {
                $date = date_create(datetime_sql());
                if (array_key_exists($val, static::$form_default_value)) {
                    if (static::$form_default_value[$val] === "now()") {
                        $myvalue = date_format($date, 'Y-m-d');
//                        $myvalue = strftime("%Y-%m-%d", time());
                    } elseif (static::$form_default_value[$val] === "nowtime()") {
                        $myvalue = date_format($date, 'Y-m-d H:i:s');
//                        $myvalue = strftime("%Y-%m-%d %H:%M:%S", time());
                    } elseif (static::$form_default_value[$val] === "time()") {
                        $myvalue = date_format($date, 'H:i:s');
//                        $myvalue = strftime("%H:%M:%S", time());
                    } elseif (static::$form_default_value[$val] === "timeNoSecond()") {
                        $myvalue = date_format($date, 'H:M');
//                        $myvalue = strftime("%H:%M", time());
                    } else {
                        $myvalue = static::$form_default_value[$val];
                    }

                }
            }

            $get_item ? $value = $get_item->$val : $value = $myvalue;
            $output .= static::get_form($val, $value);

//            echo $get_item->aller_appel;
//            if($get_item->id==1){
////                var_dump(static::get_form($val, $value));
//
//            }

            $myvalue = "";

        }

        return $output;
    }

    protected static function set_form_default_value()
    {
//        static::$form_default_value["user_id"]="5";
    }

    static function get_form($name, $value = '', $type_form = '')
    {
        //to move to Database Object

//        if($name=="chauffeur_id"){
//            echo "found  ".$name."   ".$value."<br>";}
//        if($name=="client_id"){
//            echo "found  ".$name."   ".$value."<br>";}
//

//        echo gettype($name) ."<br>";
//
//        echo "<pre>";
//        print_r(static::get_form_properties("chauffeur_id")) ;
//       echo "</pre>";

        if (isset(static::$form_properties)) {


            $form = new Form();
            //   static:: get_form_properties();
            //    var_dump(static::$form_properties);

            //  $vars=static::$form_properties[$name];
//            $vars=[];

            if ($type_form) {
                $vars = static::get_form_properties_search($name);
                $form->form_format_type = $form::FORM_HORIZONTAL;
            } else {
                $vars = static::get_form_properties($name);
                $form->form_format_type = $form::FORM_HORIZONTAL;

            }

// clockwise special hour format
            $type_exception = ['radio', 'checkbox', 'checkboxinline', 'textarea'];

//must be one of the following input to use ->text() todo checkbox
            $type_no_exception = ["text", 'password', 'email', 'select', 'search', 'date', 'datetime', 'datetime-local', 'color', 'button', 'file', 'hidden', 'image', 'month', 'number', 'range', 'reset', 'search', 'submit', 'tel', 'file', 'url', 'selectchosen', 'time', 'datetime-local', 'clockwise'];

            $type_text = ["text", 'password', 'email', 'search', 'date', 'datetime', 'datetime-local', 'time', 'color', 'button', 'file', 'hidden', 'image', 'month', 'number', 'range', 'reset', 'search', 'submit', 'tel', 'url'];

            if (is_array($vars)) {
                $type = $vars['type'];
            } else {
                $type = "";
//                echo "ERROR ".__LINE__.__CLASS__ ;

            }


//                var_dump($vars);
            if (in_array($type, $type_no_exception)) {
                foreach ($vars as $attr => $val) {

                    $form->$attr = $val;
                }
            } elseif ($type == "radio") {
                foreach ($vars as $attr => $val) {
                    if (is_array($val)) {
                        foreach ($val as $attr2 => $val2) {
                            $form->radio[(int)$attr] = $val;
//                        $form->radio[$attr] = $val;
                        }
                    } else {
                        $form->$attr = $val;
                    }

                }
            } elseif ($type == "textarea") {
                foreach ($vars as $attr => $val) {

                    $form->$attr = $val;
                }

            } elseif ($type == "combox") {
                //todo need to add forms

            } elseif ($type == "checkbox") {
                foreach ($vars as $attr => $val) {

                    $form->$attr = $val;
                }


            } elseif ($type == "checkboxinline") {
                foreach ($vars as $attr => $val) {
                    if (is_array($val)) {
                        foreach ($val as $attr2 => $val2) {
                            $form->checkboxinline[(int)$attr] = $val;
//                        $form->radio[$attr] = $val;
                        }
                    } else {
                        $form->$attr = $val;
                    }

                }

            } else {
            }


//to do
            if ($value !== '' && $value !== null) {
//                echo "<script>alert('DDD $name ----$value')</script>";

                $form->value = $value;
            } else {
                if ($type == "number") {
                    $form->value = 0;
                }
            }


            $output = "";
//var_dump($form);
//var_dump($type);
//var_dump($value) ;

            if (in_array($type, $type_text)) {
                $output = $form->text();
            } elseif ($type == "radio") {
                $output = $form->radio();
            } elseif ($type == "select") {
                $output = $form->select();
            } elseif ($type == "selectchosen") {
                $output = $form->selectchosen();
            } elseif ($type == "textarea") {
                $output = $form->textarea();
            } elseif ($type == "clockwise") {
                $output = $form->clockwise();
            } elseif ($type == "checkbox") {
                $output = $form->checkbox();
            } elseif ($type == "checkboxinline") {
                $output = $form->checkboxinline();
            } else {

            }

        } else {
            $output = "no form properties set";
        }

        // unset($form);

        return $output;
    }

    public static function get_form_properties_search($name)
    {
        if (isset(static::$form_properties_search[$name])) {
            return static::$form_properties_search[$name];
        }
        return false;
    }

    public static function get_form_properties($name)
    {
        return isset (static::$form_properties[$name]) ? static::$form_properties[$name] : "";


        //   return $form_prop;
    }

    public static function table_nav($page_link_view, $page_link_text, $offset)
    {
        $href = clean_query_string($page_link_view);
        $new_href = static::crud_form_link(clean_query_string(static::$page_new));

        $output = "<div class=\"row admin-crud-toolbar-row\" >";
        $output .= "<div class=\"col-md-12 {$offset}\" > ";
        $output .= "<div class=\"admin-crud-toolbar\">";
        $output .= "<div class=\"admin-crud-toolbar__title\">";
        $output .= "<span class=\"admin-crud-toolbar__eyebrow\">Management</span>";
        $output .= "<h1>" . h(static::$page_name) . "</h1>";
        $output .= "</div>";
        $output .= "<div class=\"admin-crud-toolbar__actions\">";
        $output .= "<a class=\"btn btn-default admin-crud-btn\" href=\"" . h(SITE_URL . "/public/admin/index.php") . "\"><i class=\"fa fa-th-large\" aria-hidden=\"true\"></i><span>Index</span></a>";
        $output .= "<a class=\"btn btn-info admin-crud-btn ajax-pagination\" href=\"" . h($href) . "\"><i class=\"fa fa-table\" aria-hidden=\"true\"></i><span>" . h($page_link_text) . "</span></a>";
        $output .= "<a class=\"btn btn-primary admin-crud-btn button-add-form\" href=\"" . h($new_href) . "\"" . static::crud_modal_attributes("Add " . static::$page_name) . "><i class=\"fa fa-plus\" aria-hidden=\"true\"></i><span>Add " . h(static::$page_name) . "</span></a>";
        $output .= static::table_nav_additional();
        $output .= "</div>";
        $output .= "</div>";
        $output .= "</div>";
        $output .= "</div>";
//     $output.="";
        return $output;

    }

    protected static function crud_modal_url($url)
    {
        $url = clean_query_string($url);
        $url = append_query_param($url, 'crud_modal', '1');
        $url = append_query_param($url, 'return_to', current_request_uri());

        return clean_query_string($url);
    }

    protected static function crud_modal_enabled()
    {
        return isset($_SERVER['PHP_SELF']) && basename($_SERVER['PHP_SELF']) === 'manage_ajax.php';
    }

    protected static function crud_form_link($url)
    {
        return static::crud_modal_enabled() ? static::crud_modal_url($url) : clean_query_string($url);
    }

    protected static function crud_modal_attributes($title)
    {
        return static::crud_modal_enabled() ? " data-admin-crud-modal=\"1\" data-admin-crud-title=\"" . h($title) . "\"" : "";
    }

    public static function table_nav_additional()
    {
        $output = "";
        return $output;
    }

    public static function sum_field_where($field = "", $where = "")
    {
        global $database;
        $table = static::$table_name;
        $result_set = $database->query("SELECT sum({$field}) FROM {$table} {$where} ");
        $row = $database->fetch_array($result_set);
        return $row ? array_shift($row) : false;

    }

    public static function sum_field_where_by_sql($sql)
    {
        global $database;
//        $table = static::$table_name;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return $row ? array_shift($row) : false;

    }

    public static function sum_field_where_by_sql_prepared($sql, array $params = [], $types = "")
    {
        global $database;
//        $table = static::$table_name;
        $result_set = $database->query_prepared($sql, $params, $types);
        $row = $database->fetch_array($result_set);
        return $row ? array_shift($row) : false;

    }


    public static function find_max_id()
    {
        global $database;
        $table = static::$table_name;
        $result_set = $database->query("SELECT MAX(id) FROM {$table} ");
        $row = $database->fetch_array($result_set);
        return $row ? array_shift($row) : false;

    }

    public static function form_text($name, $type = "text", $value = "")
    {

//        $name="";
//        $type="text";
//        $value="";


        $output = "";
        $output .= "";
        $output .= "<input type='{$type}' class='form-control {$name}' name='{$name}[]' value='{$value}' placeholder=''  >";


        return $output;

    }

    public static function form_select_option($input_name, $field_1, $field_2)
    {
//
//        $input_name='project_id';
////        $class_name="Project";
//        $field_1='id';
//        $field_2='project_code';


        $objects = static::find_all();


        $output = "";

        $output .= "<select class='form-control {$input_name}' name='{$input_name}[]' id=''>";
        $output .= "<option value='' selected></option>";

        foreach ($objects as $object) {

            foreach ($object as $k => $v) {
                if ($k === $field_1 || $k === $field_2) {

                    if ($k === $field_1) {
                        $output .= " <option value='{$v}'>";
                    }

                    if ($k === $field_2) {
                        $output .= "{$v}</option>";
                    }

                }
            }
        }
        $output .= "</select>";
        return $output;
    }


    public static function find_column_name()
    {

        global $database;
        $table = static::$table_name;
        $output = "";
        $sql = "SHOW COLUMNS FROM $table ";
        $result = $database->query($sql);
        while ($record = $database->fetch_array($result)) {
            $fields[] = $record['Field'];
        }
        $class_name = get_called_class();
        $count = count($fields);
//        $countrecords = static::count_all();
//        $output.= "Number of records in db:<b>$countrecords</b> ";
        $output .= "<div class='col-md-3'>";
        $output .= "<ul class='list-group'>";
        $output .= "<li class='list-group-item'>count db <span class='badge''>$count</span></li>";
        $output .= "<li class='list-group-item'>" . "<b>Database schema:<span class='color:red'> {$class_name}</span></b>" . "</li>";
        foreach ($fields as $f) {
            $output .=
                "<li class='list-group-item'>" . $f . "</li>";
        }

        $output .= "</ul>";

        $output .= $comma_separated = " \$db_fields = ['" . implode("','", $fields) . "']<br><hr>";

        $output .= "<div class='text-left'>";

        foreach ($fields as $field) {
            $output .= "public \${$field};<br>";

        }
        $output .= "</div>";


        return $output;
    }

    public static function find_all()
    {
        $table = static::$table_name;
        return static::find_by_sql("SELECT * FROM {$table} ");
    }

    public static function option_distinct($field0, $field1)
    {
        //   global $database;
        $sql = "";

        if (empty($field0) || empty($field1)) {
            echo "Error:no defined fields, need at least 2";

        } else {
            $table = static::$table_name;
            $field0_sql = static::quote_identifier($field0);
            $field1_sql = static::quote_identifier($field1);
            $table_sql = static::quote_identifier($table);
            $sql = "SELECT DISTINCT {$field0_sql} , {$field1_sql} FROM {$table_sql}";
            return static::find_by_sql($sql);
        }

    }

    protected static function quote_identifier($identifier)
    {
        $parts = explode('.', $identifier);
        foreach ($parts as $part) {
            if (!preg_match('/^[A-Za-z0-9_]+$/', $part)) {
                return $identifier;
            }
        }

        return '`' . implode('`.`', $parts) . '`';
    }

    public static function get_distinct($name)
    {
        $option = "";
        if (empty($name) || empty($field1)) {
            echo "Error:no defined fields, need at field";

        } else {
            $table = static::$table_name;
            $sql = "SELECT DISTINCT {$name} FROM {$table}";
            $results = static::find_by_sql($sql);
            if ($results) {

                foreach ($results as $result) {
                    $safe_result = h($result);
                    $option .= "<option value='{$safe_result}'>{$safe_result}</option>";
                }
            }


        }

    }


    static public function display_paginator($pagination = "", $page = "")
    {

        $pages = static::NewPaginator();
        $output = "";
        $output = "<div class='admin-crud-pagination'>";
        $output .= " <nav class='admin-crud-pagination__nav' aria-label='" . h(static::$page_name) . " pages'>";
        $output .= " <ul class='pagination admin-crud-pagination__list'>";

        $output .= $pages->display_pages();
        $output .= "<span class=\"\">" . $pages->display_jump_menu() . $pages->display_items_per_page() . "</span>";
        $output .= "       </ul>";
        $output .= "    </nav>";
        $output .= "</div>";

        return $output;
    }


    static public function display_pagination($pagination = "", $page = "")
    {
        [$where, $params, $types] = static::where_clause_from_request();
        $total_count = static::count_all_where($where, $params, $types);

        if ($total_count > 1000) {
            return self::display_paginator();
        }


        $pagination = static::NewPagination();
        $page = static::getPagePagination();

        $query_string = remove_get(['page', 'class_name']);

        $total_pages = $pagination->total_pages();

        if ($total_pages <= 1) {
            return "";
        }

        $output = "<div class='admin-crud-pagination'>";
        $output .= "<div class='admin-crud-pagination__meta'><span>Page " . h($page) . " of " . h($total_pages) . "</span></div>";
        $output .= " <nav class='admin-crud-pagination__nav' aria-label='" . h(static::$page_name) . " pages'>";
        $output .= " <ul class='pagination admin-crud-pagination__list'>";


            //     <li><a href="#">Previous</a></li>
            if ($pagination->has_previous_page()) {
                $href = clean_query_string(static::$page_manage . $query_string . "page=1");
                $output .= "<li><a class='ajax-pagination first' href=\"" . h($href) . "\">&laquo; First</a></li> ";

                $href = clean_query_string(static::$page_manage . $query_string . "page=" . urlencode($pagination->previous_page()));

                $output .= "<li><a  class='ajax-pagination previous' href=\"";
                $output .= h($href);
                $output .= "\">&laquo; Previous</a></li> ";
            }

            for ($i = 1; $i <= $total_pages; $i++) {

                if ($i == $page) {
                    $output .= " <li class=\"active\"><a class='ajax-pagination' href='#' aria-current='page'>{$i}</a></li> ";

                } else {
                    $href = clean_query_string(static::$page_manage . $query_string . "page=" . $i);

                    $output .= "<li class=\"\"><a class='ajax-pagination' href=\"" . h($href) . "\">" . $i . "</a></li> ";

                }
            }

            if ($pagination->has_next_page()) {
                $href = clean_query_string(static::$page_manage . $query_string . "page=" . urlencode($pagination->next_page()));

                $output .= "<li> <a  class='ajax-pagination next' href=\"";
                $output .= h($href);

                $output .= "\">Next &raquo;</a></li> ";

                $href = clean_query_string(static::$page_manage . $query_string . "page=" . urlencode($total_pages));
                $output .= "<li><a class='ajax-pagination last' href=\"" . h($href) . "\">Last &raquo;</a></li> ";
            }

        $output .= "       </ul>";
        $output .= "    </nav>";
        $output .= "</div>";

        return $output;

    }

    public static function NewPagination()
    {

        [$where, $params, $types] = static::where_clause_from_request();
        $per_page = static::$pagination_per_page;
        $total_count = static::count_all_where($where, $params, $types);
        $page = static::getPagePagination();

        return new Pagination($page, $per_page, $total_count);
    }

    public static function NewPaginator()
    {

        [$where, $params, $types] = static::where_clause_from_request();
        $total_count = static::count_all_where($where, $params, $types);
        return new Paginator($total_count, 5, [20, 15, 3, 6, 9, 12, 25, 50, 100, 250, 'All']);
    }


    public static function getPagePagination()
    {
        return !empty($_GET['page']) ? max(1, (int)$_GET["page"]) : 1;

    }

    public static function count_all_where($where = '', array $params = [], $types = '')
    {
        global $database;
        $table = static::$table_name;
        $sql = "SELECT count(*) FROM {$table} {$where} ";
        $result_set = empty($params) ? $database->query($sql) : $database->query_prepared($sql, $params, $types);
        $row = $database->fetch_array($result_set);
        return $row ? array_shift($row) : false;
//        return $where;

    }

    public static function current_request_where_clause()
    {
        return static::where_clause_from_request();
    }

    protected static function where_clause_from_request()
    {
        $params = [];
        $types = '';
        $conditions = [];
        $table_fields = static::get_table_field();
        $numeric_fields = is_array(static::$fields_numeric ?? null) ? static::$fields_numeric : [];

        $search_all = isset($_GET['search_all']) ? trim((string)urldecode($_GET['search_all'])) : '';
        if ($search_all !== '') {
            foreach ($table_fields as $field) {
                $conditions[] = "`{$field}` LIKE ?";
                $params[] = '%' . $search_all . '%';
                $types .= 's';
            }

            return [empty($conditions) ? '' : ' WHERE ' . implode(' OR ', $conditions), $params, $types];
        }

        foreach ($_GET as $key => $val) {
            if (!in_array($key, $table_fields, true)) {
                continue;
            }

            if (is_array($val)) {
                continue;
            }

            $value = trim((string)urldecode((string)$val));
            if ($value === '') {
                continue;
            }

            if (in_array($key, $numeric_fields, true)) {
                $conditions[] = "`{$key}` = ?";
                $params[] = (int)$value;
                $types .= 'i';
            } else {
                $conditions[] = "`{$key}` = ?";
                $params[] = $value;
                $types .= 's';
            }
        }

        return [empty($conditions) ? '' : ' WHERE ' . implode(' AND ', $conditions), $params, $types];
    }


    public static function display_all($object_all = "", $long_short = 0, $edit = true)
    {
//        ,$is_data=false
//        if($is_data){
//            static::change_to_unique_data();
//        }

        $object_all = static::manage_page_query();

        $output = "";
        $output .= static::display_table_head($long_short, $edit);

        foreach ($object_all as $object) {
            $output .= $object->display_table($long_short, $edit);
        }

        $output .= static::display_table_footer($edit);
        return $output;

    }

    public static function manage_page_query()
    {
        $table_name = static::get_table_name();
        $allowed_order_fields = static::get_table_field();
        $order_name = !empty($_GET["order_name"]) && in_array($_GET["order_name"], $allowed_order_fields, true) ? $_GET["order_name"] : 'id';
        $order_type = !empty($_GET["order_type"]) && strtoupper($_GET["order_type"]) === 'ASC' ? 'ASC' : 'DESC';


//        $page= !empty($_GET['page'])? (int) $_GET["page"]:1;
        $per_page = 20;
        [$where, $params, $types] = static::where_clause_from_request();


//        $total_count=static::count_all_where($where);
        $pagination = static::NewPagination();


        $sql = "SELECT * FROM {$table_name} ";

//    $sql.= " ".get_where_string($class_name);
        $sql .= " " . $where;


        if (isset($order_name)) {
            $sql .= " ORDER BY {$order_name} {$order_type} ";
        }


        $sql .= "LIMIT {$per_page} ";
        $sql .= "OFFSET {$pagination->offset()}";

//echo "<p>$sql</p>";
//unset($_GET);

        $result_class = empty($params) ? static::find_by_sql($sql) : static::find_by_sql_prepared($sql, $params, $types);

//        $query_string=remove_get(array('view','page',get_called_class()));

        return $result_class;

    }

    public static function get_table_name()
    {
        $table = static::$table_name;
        return $table;
    }

    public static function display_table_head($long_short = 0, $edit = true)
    {
//        ,$is_data=false

        // $query_string= urldecode($_SERVER['QUERY_STRING']);

//        if($is_data){
//
//        } else {
//            $query_string= remove_get(array('order_name','order_type','page'));
//
//        }

        $query_string = remove_get(['order_name', 'order_type', 'page', 'class_name']);


        if ($long_short == 1) {
            $table_field = static::$db_fields_table_display_full;

        } else {
            $table_field = static::$db_fields_table_display_short;

        }

        $output = "";

        $output .= "<div class='panel panel-info text-center admin-crud-panel'>";
        // <!-- Default panel contents -->

        $output .= "<div class='panel-heading admin-crud-panel__heading'>"
            . "<div class='row'>"
            . "<div id='panel-heading-search' class='col-md-12 admin-crud-panel__titlebar'>"
            . "<a class='admin-crud-panel__title ajax-pagination' href='" . clean_query_string(static::$page_manage) . "'><span>Manage</span> " . h(static::$page_name) . "</a> ";

        $output .= static::get_modal_search();
        if (static::search_filters_are_active()) {
            $output .= "<a class='btn btn-default admin-crud-icon-btn admin-crud-filter-clear' href='" . h(clean_query_string(static::$page_manage)) . "' title='Clear filters' aria-label='Clear filters'>";
            $output .= "<i class='fa fa-filter' aria-hidden='true'></i><i class='fa fa-times admin-crud-filter-clear__mark' aria-hidden='true'></i>";
            $output .= "<span class='sr-only'>Clear filters</span></a>";
        }
        $output .= "</div>";


        $output .= "<div class='pull-right'>";
        $output .= "<form id='form-table-search-new' class='form-inline' style='display: none'>
    <div class='form-group'>
        <label class='sr-only' for='search'>type search</label>
        <div class='input-group'>
            <input type='search' class='form-control' id='input-search' placeholder='Search...'>
        </div>
    </div>
    <button id='button-search' type='submit' class='btn btn-primary'";
        $output .= " data-href='" . h($_SERVER['QUERY_STRING'] ?? '') . "'";
        $output .= ">
    <span class='glyphicon glyphicon-search' style='color: whitesmoke' aria-hidden='true' ";
        $output .= "  >
        </button>
        </form>";

        $output .= "</div>"; // end of pull-right
        $output .= "</div>";
        $output .= "</div>";


        $output .= " <div class='panel-body admin-crud-panel__summary'>";
        [$where, $params, $types] = static::where_clause_from_request();
        $found_count = static::count_all_where($where, $params, $types);
        $total_count = static::count_all();

        if ($found_count !== $total_count) {
            $output .= "<span class='admin-crud-chip'><b>Found</b> " . h($found_count) . " of " . h($total_count) . "</span>";
        } else {
            $output .= "<span class='admin-crud-chip'><b>Total</b> " . h($total_count) . "</span>";
        }


        foreach ($_GET as $key => $val) {
            if (is_array($val)) {
                continue;
            }

            $key_clean = str_replace("_", " ", $key);
            $key_clean = ucfirst($key_clean);


            if (!empty($val) && !in_array($key, ['page', 'view', 'class_name'])) {
                $output .= "<span class='admin-crud-chip'><b>" . h($key_clean) . "</b> " . h(urldecode((string)$val)) . "</span>";
            }
        }
        $output .= "</div>";


        $output .= "<div class='table-responsive admin-crud-table-wrap'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed admin-crud-table'>";
        $output .= "<thead><tr>";

        if (strtolower(static::$position_table) == "positionleft" ||
            strtolower(static::$position_table) == "positionboth") {

            if ($edit) {
                $output .= "<th width='5%' colspan=\"2\" class=\"text-center admin-crud-table__actions-head\" style='vertical-align:middle;'>Actions</th>";
            }
        }

        $allowed_order_fields = static::get_table_field();
        $current_order_name = !empty($_GET['order_name']) && in_array($_GET['order_name'], $allowed_order_fields, true) ? $_GET['order_name'] : '';
        $requested_order_type = !empty($_GET['order_type']) ? strtoupper((string)$_GET['order_type']) : '';
        $current_order_type = in_array($requested_order_type, ['ASC', 'DESC'], true) ? $requested_order_type : '';

        foreach ($table_field as $fieldname) {
            $alt_fieldname = $fieldname;
            if (property_exists(new static, $fieldname)) {
                if (isset(static::$db_field_exclude_table_display_sort) && in_array($fieldname, static::$db_field_exclude_table_display_sort)) {
                    $fieldname = str_replace("_", " ", $fieldname);
                    $fieldname = ucfirst($fieldname);
                    $fieldname = h($fieldname);
//                    $text_th='';


                    $output .= "<th class='text-center' style='vertical-align:middle;white-space:nowrap;'>" . $fieldname . "</th>";

                } else {

                    if (isset(static::$db_field_include_table_display_sort) &&
                        array_key_exists($fieldname, static::$db_field_include_table_display_sort)
                    ) {

                        $fieldname = static::$db_field_include_table_display_sort[$fieldname];
//                        var_dump($fieldname);
//                        var_dump(array_keys(static::$db_field_include_table_display_sort,$fieldname));
                        $text_th = array_keys(static::$db_field_include_table_display_sort, $fieldname);
                        $text_th = $text_th[0];
//                        var_dump($text_th);

                    }

                    $href = clean_query_string($_SERVER["PHP_SELF"] . "" . $query_string . "page=" . u(1) . "&order_name=" . u($fieldname) . "&order_type=" . u('ASC') . "&class_name=" . get_called_class());

                    $new_query_ASC = "<a class='ajax-pagination' href='" . $href . "'>";

                    $href = clean_query_string($_SERVER["PHP_SELF"] . "" . $query_string . "page=" . u(1) . "&order_name=" . u($fieldname) . "&order_type=" . u('DESC') . "&class_name=" . get_called_class());

                    $new_query_ASC .= "<span class='glyphicon glyphicon-triangle-bottom' aria-hidden='true'></span></a>";


                    $new_query_DESC = "<a class='ajax-pagination' href='" . $href . "'>";
                    $new_query_DESC .= "<span class='glyphicon glyphicon-triangle-top' aria-hidden='true'></span></a>";

                    $fieldname = str_replace("_", " ", $fieldname);
                    $fieldname = ucfirst($fieldname);
                    $fieldname = h($fieldname);

                    if (isset($text_th)) {
//                        echo $text_th;
                        $fieldname = $text_th;
                        $fieldname = str_replace("_", " ", $fieldname);
                        $fieldname = ucfirst($fieldname);
                        $fieldname = h($fieldname);
                        unset($text_th);
                    }


                    if ($current_order_name === $alt_fieldname && $current_order_type !== '') {

                        if ($current_order_type === "ASC") {
                            $new_query_ASC = "";
                            $output .= "<th class='text-center admin-crud-table__sorted' style='vertical-align:middle;white-space:nowrap;'>" . $new_query_ASC . "&nbsp;" . $fieldname . $new_query_DESC . "&nbsp;" . "</th>";

                        } elseif ($current_order_type === "DESC") {
                            $new_query_DESC = "";
                            $output .= "<th class='text-center admin-crud-table__sorted' style='vertical-align:middle;white-space:nowrap;'>" . $new_query_ASC . "&nbsp;<strong>" . $fieldname . $new_query_DESC . "&nbsp;</strong>" . "</th>";

                        } else {

                        }
                    } else {
                        $output .= "<th class='text-center' style='vertical-align:middle;white-space:nowrap;'>" . $new_query_ASC . "&nbsp;" . $fieldname . $new_query_DESC . "&nbsp;" . "</th>";

                    }


                }


            }
        }

        if (strtolower(static::$position_table) == "positionright" ||
            strtolower(static::$position_table) == "positionboth") {

            if ($edit) {
                $output .= "<th colspan=\"2\" class=\"text-center admin-crud-table__actions-head\" style='vertical-align:middle;'>Actions</th>";
            }
        }

        $output .= "</tr></thead><tbody>";
        return $output;
    }

    protected static function search_filters_are_active()
    {
        $ignored_keys = ['page', 'view', 'class_name', 'order_name', 'order_type', 'ipp', 'submit'];

        foreach ($_GET as $key => $val) {
            if (in_array($key, $ignored_keys, true) || is_array($val)) {
                continue;
            }

            $value = trim((string)urldecode((string)$val));

            if ($value === '') {
                continue;
            }

            if ($key === 'download_csv' && strtolower($value) !== 'yes') {
                continue;
            }

            return true;
        }

        return false;
    }

    public static function get_modal_search()
    {
        $output = "";
        $search_field_count = is_array(static::$db_field_search) ? count(static::$db_field_search) : 0;
        $search_size_class = "admin-crud-search-modal--spacious";
        if ($search_field_count <= 2) {
            $search_size_class = "admin-crud-search-modal--compact";
        } elseif ($search_field_count <= 6) {
            $search_size_class = "admin-crud-search-modal--medium";
        }

        $output .= "      <button id='form-table-search-origin' style='display: inline' type='button' class='btn btn-default admin-crud-icon-btn' data-toggle='modal' data-target='.bs-example-modal-lg' data-admin-crud-search-modal='.admin-crud-search-modal' title='Search " . h(static::$page_name) . "'>";
        $output .= "           <span class='glyphicon glyphicon-search' aria-hidden='true'></span>";
        $output .= "        </button>";


        $output .= "       <div class='modal fade bs-example-modal-lg admin-crud-search-modal " . h($search_size_class) . "' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>";
        $output .= "          <div class='modal-dialog admin-crud-search-modal__dialog'>";
        $output .= "             <div class='modal-content'>";
        $output .= "                  <div class='modal-header'>";
        $output .= "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $output .= "                      <h4 class='modal-title' id='myModalLabel'>";
        $output .= static::$page_name;
        $output .= "                    </h4>";
        $output .= "                 </div>";
        $output .= "                 <div class='modal-body'>";


        $output .= static::get_form_search();
//        $output.= $this->get_form_search();

        $output .= "                      </div>";
        $output .= "                <div class='modal-footer'>";
        $output .= "                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
        $output .= "                   <button type='submit' form='form_client_search' class='btn btn-primary'><i class='fa fa-search' aria-hidden='true'></i> Search</button>";
        $output .= "              </div>";
        $output .= "           </div>";
        $output .= "        </div>";
        $output .= "   </div>";
        $output .= <<<HTML
<script>
(function() {
    if (window.ikamyCrudSearchModalReady) {
        return;
    }

    window.ikamyCrudSearchModalReady = true;

    var hasBootstrapModal = function() {
        return !!(window.jQuery && window.jQuery.fn && window.jQuery.fn.modal);
    };

    var showSearchModal = function(modal) {
        if (hasBootstrapModal()) {
            window.jQuery(modal).modal('show');
            return;
        }

        modal.style.display = 'block';
        modal.removeAttribute('aria-hidden');
        modal.setAttribute('aria-modal', 'true');
        modal.classList.add('in');
        document.body.classList.add('modal-open');

        if (!document.querySelector('.modal-backdrop[data-admin-crud-search-backdrop="1"]')) {
            var backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade in';
            backdrop.setAttribute('data-admin-crud-search-backdrop', '1');
            document.body.appendChild(backdrop);
        }
    };

    var hideSearchModal = function(modal) {
        if (hasBootstrapModal()) {
            window.jQuery(modal).modal('hide');
            return;
        }

        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
        modal.removeAttribute('aria-modal');
        modal.classList.remove('in');
        document.body.classList.remove('modal-open');
        document.querySelectorAll('.modal-backdrop[data-admin-crud-search-backdrop="1"]').forEach(function(backdrop) {
            if (backdrop.parentNode) {
                backdrop.parentNode.removeChild(backdrop);
            }
        });
    };

    document.addEventListener('click', function(event) {
        var trigger = event.target.closest('[data-admin-crud-search-modal]');

        if (trigger && !hasBootstrapModal()) {
            var target = trigger.getAttribute('data-admin-crud-search-modal');
            var modal = target ? document.querySelector(target) : null;

            if (modal) {
                event.preventDefault();
                showSearchModal(modal);
                return;
            }
        }

        var dismiss = event.target.closest('[data-dismiss="modal"]');
        var searchModal = dismiss ? dismiss.closest('.admin-crud-search-modal') : null;

        if (searchModal && !hasBootstrapModal()) {
            event.preventDefault();
            hideSearchModal(searchModal);
        }
    });
})();
</script>
HTML;

        return $output;

    }

    public static function get_form_search()
    {

        $output = "";
        $div_class = "<div class='admin-crud-search__field'>";
        $value = null;

        $output .= "<div class ='background_light_pink admin-crud-search'>";
        $output .= "<form id='form_client_search' name='form_client_search'  class='form-horizontal admin-crud-search__form' method='get' action='" . h($_SERVER["PHP_SELF"]) . "'>";
        $output .= "<input type='hidden' name='page' value='1'>";
        $output .= "<input type='hidden' name='class_name' value='" . h(get_called_class()) . "'>";

        $output .= " <fieldset id='' title=''>";
        $output .= " <legend class='text-center admin-crud-search__legend'>Search " . h(static::$page_name) . "</legend>";


        $output .= "<div class='admin-crud-search__grid'>";
        if (static::$db_field_search) {
            foreach (static::$db_field_search as $name_search) {
                $output .= $div_class;
                $output .= static::get_form($name_search, $value, 'search');
                $output .= "</div>";


            }
        }

        $output .= "</div>";

        $output .= " <div class='admin-crud-search__submit'>";

        $output .= "<button type='submit' name='submit' class='btn btn-info btn-block btn-group-lg'><i class='fa fa-search' aria-hidden='true'></i> Search</button>";

        $output .= "</div>";


        $output .= "<div class='text-right admin-crud-search__reset' >";

        $output .= " <a class='btn btn-default' href='" . h(clean_query_string(static::$page_manage)) . "'>Reset</a>";


        $output .= " </div>";


        $output .= "</fieldset>";
        $output .= "</form>";
        $output .= "</div>";

        return $output;
    }

    public static function count_all()
    {
        global $database;
        $table = static::$table_name;
        $result_set = $database->query("SELECT count(*) FROM {$table} ");
        $row = $database->fetch_array($result_set);
        return $row ? array_shift($row) : false;

    }

    public static function display_table_footer($edit = true)
    {

//        ,$is_data=false
//        if($is_data){
//            static::change_to_unique_data();
//        }

        $output = "</tbody></table>";
        $output .= "</div>";
        $output .= "</div>";
        if ($edit) {

            $output .= "<div class='admin-crud-table-footer'><a class='btn btn-primary admin-crud-btn button-add-form' href='" . h(static::crud_form_link(clean_query_string(static::$page_new))) . "'" . static::crud_modal_attributes("Add " . static::$page_name) . "><i class='fa fa-plus' aria-hidden='true'></i><span>Add new " . h(static::$page_name) . "</span></a></div>";
        }

        return $output;

    }

    public static function display_all_new($long_short = 0, $edit = true)
    {


//        $object_all = static::find_all();

        $object_all = static::manage_page_query();

        $output = "";
//        $output.=static::display_table_head($long_short,$edit);

        foreach ($object_all as $object) {
            $output .= $object->display_table_new($long_short, $edit);
        }

//        $output.=static::display_table_footer($edit);
        return $output;

    }

    public static function display_table_head_new($long_short = 0, $edit = true)
    {


        // $query_string= urldecode($_SERVER['QUERY_STRING']);

        $query_string = remove_get(['order_name', 'order_type', 'page']);

        if ($long_short == 1) {
            $table_field = static::$db_fields_table_display_full;

        } else {
            $table_field = static::$db_fields_table_display_short;

        }

        $output = "";


        [$where, $params, $types] = static::where_clause_from_request();
        $found_count = static::count_all_where($where, $params, $types);
        $total_count = static::count_all();

        if ($found_count !== $total_count) {
//            $output.="<b>Found records: <span style='color:blue;'> ".h($found_count)." of ".h($total_count)."</span></b> | ";
        }


        foreach ($_GET as $key => $val) {
            if (is_array($val)) {
                continue;
            }

            $key_clean = str_replace("_", " ", $key);
            $key_clean = ucfirst($key_clean);


            if (!empty($val) && !in_array($key, ['page', 'view'])) {
//                $output.="<b>".h($key_clean)." <span style='color:blue;'> ".h(urldecode($_GET[$key]))."</span></b> | ";
            }
        }

//        $output.= "<tr>";


        foreach ($table_field as $fieldname) {
            if (property_exists(new static, $fieldname)) {
                $fieldname = str_replace("_", " ", $fieldname);
                $fieldname = ucfirst($fieldname);

                $output .= "<th class='text-center'>" . $fieldname . "</th>";
            }
        }

        if ($edit) {
//            $output.= "<th colspan=\"1\" class=\"text-center\" style='vertical-align:middle;'>Actions</th>";

            $output .= "<th>Actions</th>";
            $output .= "<th></th>";
        }

//        $output.= "</tr>";
        return $output;
    }

    public static function form_structure()
    {
//        $classes = static::$all_class;
        $classes = MyClasses::$all_class;
        $output = "";
        $output .= "<form  class='form-inline' name='" . get_called_class() . "' method='get' action=''>";
        $output .= "<select  class='form-control' name='" . "class_name" . "' >";

        foreach ($classes as $class) {
            $output .= "<option value='$class'>$class</option>";
        }

        $output .= "</select>";
        $output .= "<input class=\"btn btn-primary\" type='submit' name='submit' value='Search'>";
        $output .= "</form>";
        return $output;
    }

    public static function class_structure()
    {
        $db_fields = static::$db_fields;
        $class = get_called_class();
        $count = count($db_fields);
        $output = "";
        $output .= "<div class='col-md-3'>";
        $output .= "<ul class=\"list-group\">";
        $output .= "<li  class=\"list-group-item\">";
        $output .= "<span class=\"badge\">$count</span>";
        $output .= "Count in $class </li>";
        $output .= "<li  class=\"list-group-item\">";
        $output .= "mySQL <b>" . static::$table_name . "</b> ";
        $output .= "</li>";
        foreach ($db_fields as $f) {
            $output .= "<li  class=\"list-group-item\">";
            $output .= $f;
            $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";

        return $output;


    }

    protected static function table_sort_asc($fieldname)
    {

    }

    public function message_form($msg = 'done')
    {
        return " " . $this->id . " with ID" . $this->id . $msg;
    }

    public function unset_table_fields($fields = "")
    {
        if (is_array($fields)) {
            foreach ($fields as $field) {
                if (in_array($field, static::$db_fields)) {
                    $i = array_search($field, static::$db_fields);
                    unset(static::$db_fields[$i]);
                } else {
                    echo "<br>$field does not exists<br>";
                }
            }
        } else {

            if (in_array($fields, static::$db_fields)) {
                $i = array_search($fields, static::$db_fields);
                unset(static::$db_fields[$i]);
            } else {
                echo "<br>$fields does not exists<br>";
            }

        }

        static::$db_fields = array_values(static::$db_fields);


    }

    public function unset_required_fields($fields = "")
    {
        if (is_array($fields)) {
            foreach ($fields as $field) {
                if (in_array($field, static::$required_fields)) {
                    $i = array_search($field, static::$required_fields);
                    unset(static::$required_fields[$i]);
                } else {
                    echo "<br>$field does not exists";
                }
            }
        } else {

            if (in_array($fields, static::$required_fields)) {
                $i = array_search($fields, static::$required_fields);
                unset(static::$required_fields[$i]);
            } else {
                echo "<br>$fields does not exists";
            }

        }

        static::$required_fields = array_values(static::$required_fields);


    }

    // list class case-sensitive

    public function delete()
    {
        global $database;
        // Don't forget your SQL syntax and good habits:
        // - DELETE FROM table WHERE condition LIMIT 1
        // - escape all values to prevent SQL injection
        // - use LIMIT 1
        $sql = "DELETE FROM" . " " . static::$table_name;
        $sql .= " WHERE `id`=" . $database->escape_value($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;

        // NB: After deleting, the instance of User still
        // exists, even though the database entry does not.
        // This can be useful, as in:
        //   echo $user->first_name . " was deleted";
        // but, for example, we can't call $user->update()
        // after calling $user->delete().d
    }

    public function display_table_new($long_short = 0, $edit = false)
    {


        return static::display_table($long_short, $edit);

        $this->set_up_display();

        $output = "";
        $output .= "<tr class=\"gradeX\">";

        if ($long_short == 1) {
            $table_field = static::$db_fields_table_display_full;

        } else {
            $table_field = static::$db_fields_table_display_short;

        }


        foreach ($table_field as $fieldname) {
            if (property_exists($this, $fieldname)) {

                if (in_array($fieldname, static::$fields_numeric_format)) {
                    if ((float)$this->$fieldname < 0) {
                        $style = "color:red;";
                    } else {
                        $style = "";
                    }
//                    $output.= "<td $style class='text-right'>".number_format ( $this->$fieldname,2)."</td>";
                    $output .= "<td><span style='{$style}' class='text-right'>" . number_format($this->$fieldname, 2) . "</span></td>";
                } else {
                    $output .= "<td  class='text-center text-capitalize'>" . $this->$fieldname . "</td>";
                }


            }
        }

        if ($edit) {
            $href = clean_query_string("class_edit.php?class_name=" . get_called_class() . "&id=" . urlencode($this->id));


//            $output .= "<td class='text-center'><a class='btn btn-primary table-btn' style='width: 5em' href='" . "class_edit?class_name=" . get_called_class() . "&id=" . urlencode($this->id) . "'>Edit</a></td>";

            $output .= "<td class='text-center'><a class='btn btn-primary table-btn' style='width: 5em' href='" . $href . "'>Edit</a></td>";

            $href = clean_query_string("class_delete.php?class_name=" . get_called_class() . "&id=" . urlencode($this->id));

            if (get_called_class() == "User") {
                $onclick = "onclick=\"return confirm('Are you sure you want to delete ID {$this->id}?');\"";
            } else {
//                $onclick = "";
                $onclick = "onclick=\"return confirm('Are you sure you want to delete ID {$this->id}?');\"";
            }

            $output .= "<td class='text-center'><a {$onclick} class='btn btn-danger table-btn' href='class_delete?class_name=" . get_called_class() . "&id=" . urlencode($this->id) . "'   >Delete</a></td>";
        }

        $output .= "</tr>";
        return $output;

    }

    public function display_table($long_short = 0, $edit = false)
    {

//        ,$is_data=false
        $this->set_up_display();

        $output = "";
        $output .= "<tr>";


        if (strtolower(static::$position_table) == "positionleft" ||
            strtolower(static::$position_table) == "positionboth") {
            if ($edit) {
                $href = static::crud_form_link(static::$page_edit . "?id=" . urlencode($this->id));

                $output .= "<td class='text-center admin-crud-table__action-cell'><a class='btn btn-primary table-btn button-edit-form admin-crud-table__action' href='" . h($href) . "'" . static::crud_modal_attributes("Edit " . static::$page_name . " #" . $this->id) . " title='Edit ID " . h($this->id) . "' aria-label='Edit ID " . h($this->id) . "'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";

                if (get_called_class() == "User") {
                    $onclick = "onclick=\"return confirm('Are you sure you want to delete ID {$this->id}?');\"";
                } else {
//                    $onclick = "";
                    $onclick = "onclick=\"return confirm('Are you sure you want to delete ID {$this->id}?');\"";

                }

                $href = append_query_param(clean_query_string(static::$page_delete . "?id=" . urlencode($this->id)), 'return_to', current_request_uri());
                $output .= "<td class='text-center admin-crud-table__action-cell'><a {$onclick} class='btn btn-danger table-btn button-delete-form admin-crud-table__action'  href='" . h(clean_query_string($href)) . "' title='Delete ID " . h($this->id) . "' aria-label='Delete ID " . h($this->id) . "'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
            }
        }


        if ($long_short == 1) {
            $table_field = static::$db_fields_table_display_full;

        } else {
            $table_field = static::$db_fields_table_display_short;

        }


        foreach ($table_field as $fieldname) {
            if (property_exists($this, $fieldname)) {
                if (in_array($fieldname, static::$fields_numeric_format)) {
                    if ((float)$this->$fieldname < 0) {
                        $style = "style='color:red;";
                    } else {
                        $style = "";
                    }


//                    $output.= "<td $style class='text-right'>".number_format ( $this->$fieldname,2)."</td>";
                    $output .= "<td><span $style class='text-right'>" . number_format($this->$fieldname, 2) . "</span></td>";
                } else {
                    if ($fieldname == "id") {
                        $id_href = static::crud_form_link(static::$page_edit . "?id=" . urlencode($this->$fieldname));
                        $a = "<a class='admin-crud-id-link button-edit-form'" . static::crud_modal_attributes("Edit " . static::$page_name . " #" . $this->$fieldname) . " href='" . h($id_href) . "'>" . h($this->$fieldname) . "</a>";
                        $output .= "<td  class='text-center'>" . $a . "</td>";

                    } else {
                        $output .= "<td  class='text-center'>" . $this->$fieldname . "</td>";

                    }
                }
            }
        }


        if (strtolower(static::$position_table) == "positionright" ||
            strtolower(static::$position_table) == "positionboth") {
            if ($edit) {
                $href = static::crud_form_link(static::$page_edit . "?id=" . urlencode($this->id));
                $output .= "<td class='text-center admin-crud-table__action-cell'><a class='btn btn-primary table-btn button-edit-form admin-crud-table__action' href='" . h($href) . "'" . static::crud_modal_attributes("Edit " . static::$page_name . " #" . $this->id) . " title='Edit ID " . h($this->id) . "'><i class='fa fa-pencil' aria-hidden='true'></i><span>Edit</span></a></td>";

                if (get_called_class() == "User") {
                    $onclick = "onclick=\"return confirm('Are you sure you want to delete ID {$this->id}?');\"";
                } else {
                    $onclick = "";
                }


                $href = append_query_param(clean_query_string(static::$page_delete . "?id=" . urlencode($this->id)), 'return_to', current_request_uri());
                $output .= "<td class='text-center admin-crud-table__action-cell'><a {$onclick} class='btn btn-danger table-btn button-delete-form admin-crud-table__action' href='" . h(clean_query_string($href)) . "' title='Delete ID " . h($this->id) . "'><i class='fa fa-trash' aria-hidden='true'></i><span>Delete</span></a></td>";
            }
        }


        $output .= "</tr>";
        return $output;

    }


    public static function main_display()
    {
        return static::this_class_table();
    }


    public static function this_class_table()
    {
        $ibox = true;

        $sql = "SELECT * FROM " . static::$table_name;
        $items = self::find_by_sql($sql);

        $title = "<b>Table Name</b>  " . static::$table_name . "   <b>Page Name</b>  " . static::$page_name;
        $output = "";

        $output .= "<h1 class='text-center'>" . $title . "</h1>";

        if (!$ibox) {
            $output .= "<div class='col-lg-12  white-bg'>";
            $output .= "<div class='text-center m-t-lg'>";
        }

        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";


        $output .= "<thead>";
        $output .= "<tr>";
        foreach (static::$db_fields as $field) {
            $output .= "<th>" . $field . "</th>";
        }
        $output .= "</tr>";
        $output .= "</thead>";

        $output .= "<tbody>";


        foreach ($items as $item) {
            $output .= "<tr>";
            foreach (static::$db_fields as $field) {
                $output .= "<td>" . $item->$field . "</td>";
            }
            $output .= "</tr>";
        }

        $output .= "</tbody>";

        $output .= "</table>";
        $output .= "</div>";

        if (!$ibox) {
            $output .= "</div>";
            $output .= "</div>";
        }

        if (!$ibox) {
            return $output;
        } else {
            return ibox($output, 12, '');

        }


    }


}

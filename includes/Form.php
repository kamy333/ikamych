<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 8/21/2015
 * Time: 12:47 AM
 */
class Form extends DatabaseObject{

    const FORM_HORIZONTAL=0;
    const FORM_INLINE=1;
    const FORM_NONE=2;

   public $type_class_form=array('horizontal','inline','none');
   public $form_format_type= self::FORM_INLINE;


    public $name;
    public $label_text;
    public $type="text";
    public $placeholder;

    public $id;
    public $required =false;
    public $selected =false;
    public $class ;
    public $add_class;
    public $attr_class; // use for a new css class
    public $value;

    public $default;

    public $size;


    public $datafgcolor;
    public $datawidth;
    public $dataheight;

    public $max;
    public $min;
    public $step;
    public $onclick;
    public $alt;
    public $source;
    public $autocomplete;

    public $select_option_text;
    public $field_option_0;
    public $field_option_1;

    public $disabled=false;
    public $readonly=false;


    public $onchange;

    public $multiple;

    public $script;


//    formatting
    public $col_sm_label = "col-sm-3";
    public $col_sm_input = "col-sm-9";

//selected option 2 fields normal array which are the fields in the query eg 0 for value,1 for view
    public $select_option_field=array();

//$radio=array(0,array("label_text"=>"Visible","name"=>"visible","label"=>"oui","value"="0","for"=>"visible_no","default"=>true))
//todo
    public $radio=array();
    public $checkboxinline = array();

    public function __construct(){
        //  settype($this->required,"bool");

    }

    static public function form_id()
    {

        if (isset($_GET['id']) && !isset($_GET['duplicate_record'])) {
            $value = (int)$_GET['id'];
            return "<input type='hidden' name='id' value='{$value}'>";
        } else {
            return "";
        }

    }

    static public function class_name($class_name)
    {
        return "<input type='hidden' name='class_name' value='{$class_name}'>";

    }

    public function radio(){
        $output="";
        if (isset($this->radio)){
            $output.="<div ";
            $output.="class='form-group ";

            if (isset($this->add_class)){
                $output.=$this->add_class;
            }
            $output.="'";
            $output.=">";


            $output.="<label ";
            if($this->form_format_type==self::FORM_HORIZONTAL){
                $output .= " class='{$this->col_sm_label} control-label' ";
            } else {
                $output.="class='sr-only'";
            }
                $output.=">{$this->radio[0][1]['label_all']}</label>";



            for($i=0; $i < count($this->radio); $i++){
                $output .= " <div class='radio radio-primary radio-inline'>";
                $output.="    <input type='radio' name='{$this->radio[$i][1]['name']}' value='{$this->radio[$i][1]['value']}'";




                if(isset($_POST[$this->radio[$i][1]['name']]) ){
                    if ($_POST[$this->radio[$i][1]['name']] == $this->radio[$i][1]['value']) {
                        $output .= " checked ";
                    }
                } else {
                    if (isset($this->value)) {
                        if ($this->value == $this->radio[$i][1]['value']) {
                            $output.= " checked"; }

                    }
                }



                $output.="   id='{$this->radio[$i][1]['id']}'  />";
                $output .= "   <label for='{$this->radio[$i][1]['id']}'>";
                $output.=$this->radio[$i][1]["label_radio"];
                $output.=" </label>";

                $output .= "</div>";
            }




            $output.="</div>";

            return $output;
        } else {
            $output="error";
            return $output;
        }
    }

    public function text()    {
        $output="";
        // $this->value="";
        if(isset($_POST[$this->name])){
            $this->value=$_POST[$this->name];
        }

        if (isset($this->name) && isset($this->label_text)){
//            $output.="<div class='form-group'>";

            $output.="<div ";
            $output.="class='form-group ";

            if (isset($this->add_class)){
                $output.=$this->add_class;
            }
            $output.="'";
            $output.=">";

            $output.="<label  ";

            if($this->form_format_type==self::FORM_HORIZONTAL){
                $output .= "< class='{$this->col_sm_label} control-label' ";
            } else {
                $output.="class='sr-only'";
            }


            if(isset($this->id)){
                $output.="for='{$this->id}' ";
            }else{
                $output.="for='{$this->name}' ";

            }

            $output.=">{$this->label_text}</label>";

            if($this->form_format_type==self::FORM_HORIZONTAL) {
                $output .= "<div class='{$this->col_sm_input}'>";
            }

//            $output.="<input  class='form-control'  type='{$this->type}' name='{$this->name}' ";

            $output.="<input  type='{$this->type}' name='{$this->name}' ";

            if(isset($this->attr_class)){
                $output.=" class='".$this->attr_class."' ";
            } else {
                $output.=" class='form-control' ";

            }


            if(isset($this->datafgcolor)){
                $output.=" ".$this->datafgcolor." ";
            }

            if(isset($this->datawidth)){
                $output.=" ".$this->datawidth." ";

            }

            if(isset($this->dataheight)){
               $output.=" ".$this->dataheight." ";

            }

            if(isset($this->id)){
                $output.="id='{$this->id}' ";
            }else{
                $output.="id='{$this->name}' ";

            }


            if (isset($this->value)){
                $output.=" value='".h($this->value)."' ";
            }

            if (isset($this->max)){
                $output.=" max='{$this->max}' ";
            }

            if (isset($this->autocomplete)){
                $output.=" autocomplete='{$this->autocomplete}' ";
            }

            if (isset($this->onchange)){
                $output.=" onchange='{$this->onchange}'";
            }

            if (isset($this->min)){
                $output.=" min='{$this->min}' ";
            }

            if (isset($this->step)){
                $output.=" step='{$this->step}' ";
            }

            if (isset($this->onclick)){
                $output.=" onclick='{$this->onclick}' ";
            }

            if(isset($this->placeholder)){
                $output.="placeholder='{$this->placeholder}' ";
            }

            if(isset($this->size)){
                $output.="size='{$this->size}' ";
            }

            if($this->disabled){
                $output.="disabled ";
            }

            if($this->readonly){
                $output.="readonly ";
            }

//            echo "required";
//            var_dump($this->required);

            if($this->required){
                $output.=" required";
            }
            $output.=">"; //close input
            $output.=" </div>";

            if($this->form_format_type==self::FORM_HORIZONTAL) {
                $output .= "</div>";
            }


        } else {
            $output="Missing properties label text name;";
        }

        if (isset($this->script)) {
            $output .= $this->script;
        }

        return $output;
    }


    public function clockwise()
    {
        $output = "";
        $output .= " <div class='form-group'>";

        $output .= "<label class='{$this->col_sm_label} control-label' for='{$this->id}'>{$this->label_text}</label>";
        $output .= "<div class='input-group clockpicker {$this->col_sm_input}'>";
        $output .= "<input type='text' name='{$this->name}' id='{$this->id}' class='form-control'";

        if (isset($this->value)) {
            $output .= " value='" . h($this->value) . "' ";
        }

        $output .= "'>";
        $output .= "</div>";
        $output .= "</div>";

        if (isset($this->script)) {
            $output .= $this->script;
        }


        return $output;

    }


    public function select()    {
        $output="";



        if (isset($this->name) && isset($this->label_text)){
            $output.="<div class='form-group'>";
//            $output.="<label class='{$this->col_sm_label} control-label' for='{$this->name}' >{$this->label_text}</label>";

            $output.="<label ";
            if($this->form_format_type==self::FORM_HORIZONTAL){
                $output .= " class='{$this->col_sm_label} control-label' ";
            } else {
                $output.="class='sr-only'";
            }

            if(isset($this->id)){
                $output.="for='{$this->id}'";
            } else {
                $output.="for='{$this->name}'";

            }

            $output.=">";

            $output.="{$this->label_text}</label>";

            if($this->form_format_type==self::FORM_HORIZONTAL) {
                $output .= "<div class='{$this->col_sm_input}'>";
            }

            $output.="<select  class='form-control'  name='{$this->name}' ";

            if(isset($this->id)){
             $output.="id='{$this->id}'";
             } else {
                $output.="id='{$this->name}'";

            }

            if (isset($this->multiple)) {
                $output .= " multiple ";
            }

            if (isset($this->onchange)){
                $output.=" onchange='{$this->onchange}'";
            }

            if($this->selected){
                $output.=" selected";
            }

            $output.=">";
            $output.=$this->select_option();
            $output.="</select>";

            $output.=" </div>";

         if($this->form_format_type==self::FORM_HORIZONTAL) {
                $output .= "</div>";
            }



        } else {
            $output="Missing properties label text name;";
        }

        return $output;


    }



// need to declare $class and select_option_field[0] and select_option_field[1]

    //todo complete

    private function select_option(){
        if(isset($this->class))  {
         $output="";
         $class_name=$this->class;
         $post=null;
//         $field0=$this->select_option_field[0];
//         $field1=$this->select_option_field[1];

            $field0=$this->field_option_0;
            $field1=$this->field_option_1;


         //   var_dump($this);


            if(isset($_POST) && isset($_POST[$this->name])){
                $this->value = (int)$_POST[$this->name];
            }

            if (isset($this->value)) {
                $post= $class_name::find_by_id((int) $this->value);
            } else {

             $post=null;

            }



         //  var_dump($post);
         //   var_dump($this);

                if($this->field_option_0 && $this->field_option_1){
                    $results=$class_name::option_distinct($field0,$field1);
                } else {
                    $results=null;
                    echo "field_option_0 and field_option_0 not defined";
                }

         //   $text_selected="Select ". $class_name::$page_name;
            $text_selected= $this->select_option_text;



            if($post) {
                $output.="<option value="."'" . htmlentities($post->$field0,ENT_COMPAT,'utf-8') . "'";
                $output.= " selected>";
                $output.= htmlentities($post->$field1,ENT_COMPAT,'utf-8');
                $output.="</option>";
            } else {
                $output.="<option value='' selected>{$text_selected}</option>";

            }

         if($results)   {
             foreach ($results as $result) {
                 $output .= "<option value='{$result->$field0}'";
                 $output .= ">{$result->$field1}";
                 $output .= "</option>";
             }
         }


            return $output;


        }else {
            $output="error";
            return $output;
        }

    }

    public function selectchosen()
    {
        $output = "";


        if (isset($this->name) && isset($this->label_text)) {
            $output .= "<div class='form-group'>";
//            $output.="<label class='{$this->col_sm_label} control-label' for='{$this->name}' >{$this->label_text}</label>";

            $output .= "<label ";
            if ($this->form_format_type == self::FORM_HORIZONTAL) {
                $output .= " class='{$this->col_sm_label} control-label' ";
            } else {
                $output .= "class='sr-only'";
            }

            if (isset($this->id)) {
                $output .= "for='{$this->id}'";
            } else {
                $output .= "for='{$this->name}'";

            }

            $output .= ">";

            $output .= "{$this->label_text}</label>";

            if ($this->form_format_type == self::FORM_HORIZONTAL) {
                $output .= "<div class='{$this->col_sm_input}'>";
            }

            $output .= "<select  class='chosen-select form-control'  name='{$this->name}' style='height:60px;'  tabindex='2' ";

            if (isset($this->multiple)) {
                $output .= " multiple ";
            }


            if (isset($this->id)) {
                $output .= "id='{$this->id}'";
            } else {
                $output .= "id='{$this->name}'";

            }

            if (isset($this->onchange)) {
                $output .= " onchange='{$this->onchange}'";
            }

            if ($this->selected) {
                $output .= " selected";
            }


            $output .= ">";
            $output .= $this->select_option();
            $output .= "</select>";

            $output .= " </div>";

            if ($this->form_format_type == self::FORM_HORIZONTAL) {
                $output .= "</div>";
            }


        } else {
            $output = "Missing properties label text name;";
        }

        return $output;


    }


    public function checkbox()
    {
        $output = "";

        if (isset($this->name) && isset($this->label_text)) {

            $output .= "
  <div class='form-group'>
    <div class='col-sm-offset-3 col-sm-9'>
<div class='switch'>
                                <div class='checkbox  checkbox-primary'>
                                    <input type='checkbox' name='{$this->name}' checked class='onoffswitch-checkbox' id='{$this->name}'>
                                    <label class='onoffswitch-label' for='{$this->name}'>
                                   
                                  {$this->label_text}</label>
                                </div>
                            </div>
                            
                             </div>
    </div>";
        }
        return $output;
    }


    public function checkboxinline()
    {
        $output = "";
        if (isset($this->checkboxinline)) {
            $output .= "<div ";
            $output .= "class='form-group ";

            if (isset($this->add_class)) {
                $output .= $this->add_class;
            }
            $output .= "'";
            $output .= ">";


            $output .= "<label ";
            if ($this->form_format_type == self::FORM_HORIZONTAL) {
                $output .= " class='{$this->col_sm_label} control-label' ";
            } else {
                $output .= "class='sr-only'";
            }
            $output .= ">{$this->checkboxinline[0][1]['label_all']}</label>";

//            $output.="<div class='checkbox checkbox-inline'>
//                                            <input type='checkbox' id='inlineCheckbox1' value='option1'>
//                                            <label for='inlineCheckbox1'> Inline One </label>
//                                        </div>
//                                        <div class='checkbox checkbox-success checkbox-inline'>
//                                            <input type='checkbox' id='inlineCheckbox2' value='option1' checked=''>
//                                            <label for='inlineCheckbox2'> Inline Two </label>
//                                        </div>
//                                        <div class='checkbox checkbox-inline'>
//                                            <input type='checkbox' id='inlineCheckbox3' value='option1'>
//                                            <label for='inlineCheckbox3'> Inline Three </label>
//                                        </div>";

            for ($i = 0; $i < count($this->checkboxinline); $i++) {
                $output .= "<div class='checkbox checkbox-primary checkbox-inline'>";
                $output .= "    <input type='checkbox' name='{$this->checkboxinline[$i][1]['name']}' value='{$this->checkboxinline[$i][1]['value']}'";


                if (isset($_POST[$this->checkboxinline[$i][1]['name']])) {
                    if ($_POST[$this->checkboxinline[$i][1]['name']] == $this->checkboxinline[$i][1]['value']) {
                        $output .= " checked ";
                    }
                } else {
                    if (isset($this->value)) {
                        if ($this->value == $this->checkboxinline[$i][1]['value']) {
                            $output .= " checked ";
                        }

                    }
                }


                $output .= "   id='{$this->checkboxinline[$i][1]['id']}'  />";
                $output .= "   <label  for='{$this->checkboxinline[$i][1]['id']}'>";
                $output .= $this->checkboxinline[$i][1]["label_checkbox"];
                $output .= " </label>";
                $output .= "</div>";
            }


            $output .= "</div>";

            return $output;
        } else {
            $output = "error";
            return $output;
        }
    }


    public function textarea()
    {
$output="";

$output.="<div class='form-group'>";

$output.="<label ";
    if($this->form_format_type==self::FORM_HORIZONTAL){
        $output .= "<label class='{$this->col_sm_label} control-label' ";
    } else {
        $output.="class='sr-only'";
    }

    if(isset($this->id)){
        $output.="for='{$this->id}' ";
    }else{
        $output.="for='{$this->name}' ";

    }
$output.=" >$this->label_text</label>";


    if($this->form_format_type==self::FORM_HORIZONTAL) {
        $output .= "<div class='{$this->col_sm_input}'>";
    }
$output.="<textarea name='$this->name'  class='form-control'";

    if(isset($this->id)){
        $output.="id='{$this->id}' ";
    }else{
        $output.="  id='$this->name'>" ;

    }
    if(isset($_POST) && isset($_POST[$this->name])){
    $output.=h(trim($_POST[$this->value])) ;
    } else{
        if(isset($this->value)){
    $output.=h(trim($this->value)) ;
        }
    }
    $output.="</textarea>";
    $output.=" </div>";

    if($this->form_format_type==self::FORM_HORIZONTAL) {
        $output .= "</div>";
    }
    return $output;
}




}
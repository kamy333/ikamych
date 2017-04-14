<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 8/21/2015
 * Time: 12:47 AM
 */
class FormFormat extends DatabaseObject{

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
    public $value;

    public $default;


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

    public $onchange;

//selected option 2 fields normal array which are the fields in the query eg 0 for value,1 for view
    public $select_option_field=array();

//$radio=array(0,array("label_text"=>"Visible","name"=>"visible","label"=>"oui","value"="0","for"=>"visible_no","default"=>true))
//todo
    public $radio=array();

    public function __construct(){
        //  settype($this->required,"bool");

    }




    public function radio(){
        $output="";
        if (isset($this->radio)){
            $output.="<div class='form-group'>";


                $output.="<label ";
            if($this->form_format_type==self::FORM_HORIZONTAL){
                $output.="< class='col-sm-3 control-label' ";
            } else {
                $output.="class='sr-only'";
            }
                $output.=">{$this->radio[0][1]['label_all']}</label>";



            for($i=0; $i < count($this->radio); $i++){
                $output.="   <label class='radio-inline' for='{$this->radio[$i][1]['id']}'>";
                $output.="    <input type='radio' name='{$this->radio[$i][1]['name']}' value='{$this->radio[$i][1]['value']}'";




                if(isset($_POST[$this->radio[$i][1]['name']]) ){
                    if ($_POST[$this->radio[$i][1]['name']] == $this->radio[$i][1]['value']) {
                        $output.= " checked"; }
                } else {
                    if (isset($this->value)) {
                        if ($this->value == $this->radio[$i][1]['value']) {
                            $output.= " checked"; }

                    }
                }



                $output.="   id='{$this->radio[$i][1]['id']}'  />";
                $output.=$this->radio[$i][1]["label_radio"];
                $output.=" </label>";
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
            $output.="<div class='form-group'>";
            $output.="<label  ";

            if($this->form_format_type==self::FORM_HORIZONTAL){
                $output.="< class='col-sm-3 control-label' ";
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
                $output .= "<div class='col-sm-9'>";
            }
            $output.="<input  class='form-control'  type='{$this->type}' name='{$this->name}' ";

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

//            echo "required";
//            var_dump($this->required);

            if($this->required){
                $output.=" required";
            }
            $output.=">";
            $output.=" </div>";

            if($this->form_format_type==self::FORM_HORIZONTAL) {
                $output .= "</div>";
            }


        } else {
            $output="Missing properties label text name;";
        }



        return $output;
    }



    public function select()    {
        $output="";



        if (isset($this->name) && isset($this->label_text)){
            $output.="<div class='form-group'>";
//            $output.="<label class='col-sm-3 control-label' for='{$this->name}' >{$this->label_text}</label>";

            $output.="<label ";
            if($this->form_format_type==self::FORM_HORIZONTAL){
                $output.=" class='col-sm-3 control-label' ";
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
                $output .= "<div class='col-sm-9'>";
            }

            $output.="<select  class='form-control'  name='{$this->name}' ";

            if(isset($this->id)){
             $output.="id='{$this->id}'";
             } else {
                $output.="id='{$this->name}'";

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



// need to declare $class and select_option_field[0] and select_option_field[1]

    //todo complete
public function textarea(){
$output="";

$output.="<div class='form-group'>";

$output.="<label ";
    if($this->form_format_type==self::FORM_HORIZONTAL){
        $output.="<label class='col-sm-3 control-label' ";
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
        $output .= "<div class='col-sm-9'>";
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


    static public function form_id(){

        if(isset($_GET['id'])){
            $value= (int) $_GET['id'];
            return "<input type='hidden' name='id' value='{$value}'>";
        } else {
            return "";
        }

    }

}
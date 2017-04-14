<?php


///*
///**
// * Created by PhpStorm.
// * User: Kamran
// * Date: 07-Jul-16
// * Time: 7:13 PM
// */
class Modal
{

   public $modal_id;
   public $text_button="Edit";

   public $modal_body;

   public $modal_title_h4;
   public $modal_title_small_text;
   public $modal_footer;



    public function modal_html(){


        $output = "";
        $output .= "<div class='text-center'>
    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='"
            .$this->modal_id
            .">"
            .$this->text_button
            ."</button></div>";
        return $output;
    }

 public   function modal_large(){

        $output = "";
        $output .= "
    <div class='modal inmodal fade' id='myModal5' tabindex='-1' role='dialog'  aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";

     if (isset($this->modal_title)){
         $output .="<h4 class='modal-title'>"
         .$this->modal_title_
         ." </h4>";

         if (isset($this->modal_title_body)) {
             $output .= "<small class='font-bold'>"
                 .$this->modal_title_small_text
                 ."</small>";
         }
     }


       $output .="     </div>
            <div class='modal-body'>"

              .  $this->modal_body

             . "</div>";


         $output .= "  <div class='modal-footer'>
         $output .=        <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button>";
         if (isset($this->modal_title_body)) {
             $output .= "      <button type='button' class='btn btn-primary'>Save changes</button>";
         }
         $output .= "   </div>";



       $output .="</div>
            </div>
      </div>
    ";
       return $output;

    }


    public static function new_modal_large(
        $data_target = null, $title = null, $title_comment = null, $body = null, $footer = null)
    {

        if (is_null($data_target)) {
            $data_target = "myModal";
        }

        if (is_null($title)) {
            $title = "<h4 class='modal-title'>Modal title</h4>";
        } else {
            $title = "<h4 class='modal-title'>$title</h4>";
        }

        if (is_null($title)) {
            $title_comment = "<small class='font-bold'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>";
        }

        if (is_null($body)) {
            $body = "<p><strong>Lorem Ipsum is simply dummy</strong> text.</p>

                                            <div class='form-group'><label>Sample Input</label> <input type='email' placeholder='Enter your email' class='form-control'></div>";
        }

        if (is_null($footer)) {
            $footer = " <button type='button' class='btn btn-primary'>Save changes</button>";
        }

        $output = "";


        $output = "
<div class='modal inmodal' id='{$data_target}' tabindex='-1' role='dialog' aria-hidden='true'>
                                <div class='modal-dialog'>
                                <div class='modal-content animated bounceInRight'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                                            
                                            {$title}
                                            {$title_comment}
                                        </div>
                                        <div class='modal-body'>
                                        
                                        {$body}
                                            
                                        </div>
                                        <div class='modal-footer'>
                                        
                                            <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button>
                                        {$footer}   
                                        </div>
                                    </div>
                                </div>
                            </div>";


        return $output .= "";


    }







}
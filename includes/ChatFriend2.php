<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 22-Apr-16
 * Time: 12:39 AM
 */
class ChatFriend2 extends DatabaseObject
{


    public static $chat_header="Chat Bralia Kamy";

    protected static $table_name="chat_friend";

    protected static $db_fields = array('id', 'user_id','username', 'message','date','read1','img');

    public static $required_fields=array('user_id' ,'message','date');

    protected static $db_fields_table_display_short=array('id', 'user_id','username', 'message','date','read1','img');

    protected static $db_fields_table_display_full=array('id', 'user_id','username', 'message','date','read1','img');

    protected static $db_field_exclude_table_display_sort=array();


    public static $get_form_element=array( 'user_id','username', 'message','date','read1','date','img');
    public static $get_form_element_others=array();

    public static $form_default_value=array(
        "date"=>"nowtime()",
        "read1"=>"0"
    );


    protected static function set_form_default_value(){
        global $session;
        static::$form_default_value["user_id"]=$session->user_id;
    }

    protected static $form_properties= array(

        "user_id"=> array("type"=>"text",
            "name"=>'user_id',
            "label_text"=>"From",
            "placeholder"=>"Message here",
            "required" =>true,
            "readonly"=>true,
            "add_class"=>"hidden",

        ),
        "username"=> array("type"=>"text",
            "name"=>'username',
            "label_text"=>"From",
            "placeholder"=>"Message here",
            "required" =>true,
            "readonly"=>true,
            "add_class"=>"hidden",

        ),

        "message"=> array("type"=>"textarea",
            "name"=>'message',
            "label_text"=>"Message",
            "placeholder"=>"Message here",
            "required" =>true,

        ),
        "read1" =>array("type"=>"radio",
            array(0,
                array(
                    "label_all"=>"Read",
                    "name"=>"read1",
                    "label_radio"=>"No",
                    "value"=>"0",
                    "id"=>"read_no",
                    "default"=>true)),
            array(1,
                array(
                    "label_all"=>"Read",
                    "name"=>"read1",
                    "label_radio"=>"Yes",
                    "value"=>"1",
                    "id"=>"read_yes",
                    "default"=>true)),
        ),
        "date"=> array("type"=>"datetime",
            "name"=>'date',
            "label_text"=>"DateTime",
            "placeholder"=>"current",
            "required" =>true,
            "add_class"=>"hidden",
        ),
        "img"=> array("type"=>"file",
            "name"=>'img',
        ),

    );

    protected static $form_properties_search=array(
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
        "user_id"=> array("type"=>"select",
            "name"=>'user_id',
            "id"=>"search_user_id",
            "class"=>"User",
            "label_text"=>"",
            "select_option_text"=>'Username',
            'field_option_0' => "username",
            'field_option_1' => "username",
            "required" => false,
        ),


    );


    public static $page_name = "Chat Friend2";

//    public static $page_manage="manage_ChatFriend.php";
//    public static $page_new="new_ChatFriend.php";
//    public static $page_edit="edit_ChatFriend.php";
//    public static $page_delete="delete_ChatFriend.php";


    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=ChatFriend"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=ChatFriend"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=ChatFriend"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=ChatFriend"; //  "delete_link.php";
    public static $position_table = "positionRight"; // positionLeft // positionBoth  positionRight


    public static $page_public = "chat2.php";

    public static $per_page;


    public $id;
    public $user_id;
    public $message;
    public $date;
    public $read1;
    public $img;

    public $username;


    public $upload_directory="uploads";
    public $full_path_directory=PATH_UPLOAD;
    public $image_placeholder="";
//        "https://www.mountaineers.org/images/placeholder-images/placeholder-400-x-400/image_preview";


    public $tmp_path;
    public $type;
    public $size;
    public $errors=array();
    public $upload_errors_array=array(
        // http://www.php.net/manual/en/features.file-upload.errors.php
        UPLOAD_ERR_OK 			=> "No errors.",
        UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
        UPLOAD_ERR_NO_FILE 		=> "No file  uploaded.",
        UPLOAD_ERR_NO_TMP_DIR   => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE   => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
    );

    public function chat_path_and_placeholder(){
        $dir=   "../../". $this->upload_directory.DS.$this->img;
//     $dir=   $this->full_path_directory.DS.$this->user_image;

        return empty($this->img)?$this->image_placeholder :$dir;


    }

    public function set_files($files){
        if(empty($files) || !$files || !is_array($files)){
//            $this->no_picture=true;
            $this->errors="There was no file uploaded";
            return false;

        } elseif ($files['error'] !=0){
            $this->errors[]=$this->upload_errors_array[$files['error']];
            return false;
        }else{
            $this->img=basename($files['name']);
            $this->tmp_path=$files['tmp_name'];
            $this->type=$files['type'];
            $this->size=$files['size'];
            return true;
        }
    }

    public function upload_photo() {

        if(!empty($this->errors)){
            return false;
        }

        if(empty($this->img)|| empty($this->tmp_path)){
            $this->errors[] ="the file was not available";
            return false;
        }

        $target_path=$this->full_path_directory.DS.$this->img;
//     var_dump($target_path) ;

        if (file_exists($target_path)) {
            $this->errors[] ="the file {$this->img} already exists";
            return false;
        }

        if(move_uploaded_file($this->tmp_path,$target_path)){

            unset($this->tmp_path)  ;
            return true;

        } else {
            $this->errors[] ="the folder probably does not have permission ";
            return false;
        }


    }




    public function set_up_display(){
        $this->find_username();

    }

    public static function get_chat(){
        $sql="SELECT * FROM ".self::$table_name." ORDER BY id DESC";
        return static::find_by_sql($sql);

    }




    protected function find_username() {
        $user=User::find_by_id($this->user_id);
        $this->username=$user->username;

        unset($user);

    }

    public  function form_validation() {
        $valid=new FormValidation();

        $valid->validate_presences(self::$required_fields) ;
        $this->message=trim($this->message);


        return $valid;

    }


    public static function chat_users_wrappers(){
    $output="";
    $output.="<div class='col-md-3'>";
    $output.="<div class='chat-users'>";

    $output.="<div class='users-list'>";


    $users=User::find_all();

    foreach ( $users as $user) {
        if ($user->username == 'Captainbraliaji'||$user->username == 'kamy'||$user->username == 'admin'){
            $output.=static::chat_users($user);

        }
    }



    $output.="</div>";
    $output.="</div>";
    $output.="</div>";


    return $output;
}


    public static function chat_users($user){




     $online=" <span class='pull-right label label-primary'>Online</span>";
     $output="";


     $output.="<div class='chat-user'>";
     $output.=$online;
     $output.="<img class='chat-avatar' src='";
//     $output.="img/a4.jpg'";
     $output.=$user->user_path_and_placeholder();

     $output.="' alt='' >";
     $output.="";
     $output.=" <div class='chat-user-name'>";
     $output.="<a href='#'>";
//     $output.="Karl Jordan";
     $output.=$user->full_name();
     $output.="</a>";
     $output.="";

     $output.="</div>";
     $output.="</div>";

     return $output;

 }



    public static function chat_message_wrapper(){
     $output="";
     $output.="<div class='col-md-9 '>";
     $output.="<div class='chat-discussion'>";

     $output .= "<div id='chat'>";

    // here is ajax content get_all_chat_message
     $output.="</div>";

     $output.="</div>";
     $output.="</div>";
     return $output;

 }





    public static function get_all_chat_message(){
        $output="";

        $chats=static::get_chat();

        foreach ($chats as $chat) {

            $output.=static::chat_message($chat);
        }

        
        return $output;

    }

    public static function chat_message($chat,$direction="left"){


    global $session;
    $chat->set_up_display();
    $from_user=User::find_by_id($chat->user_id);
    $when=DateDifferenceFormat($chat->date , unixToMySQL(time()) );

        if($from_user->username=="kamy"){$direction="right";}else{$direction="left";}


    $output="";

    $output.=" <div class='chat-message $direction'>";
    $output.="<img class='message-avatar' ";
    $output.="src='";

    $output.=$from_user->user_path_and_placeholder();
//    $output.="img/a4.jpg";

    $output.="' alt='' >";

    $output.="<div class='message '>";
    $output.="<a class='message-author' href='#'>";
    $output.=$from_user->full_name();
    $output.="</a>";

    if($session->user_id===$chat->user_id){
        $output.="<span class='message-edit'> ";
        $output.="<a title='Edit message'  href='".static::$page_public."?id={$chat->id}'>";

        $output.=" <i class=\"fa fa-edit\"></i>";
        $output.="</a>";
        $output.="</span>";

        $output.="<span class='message-delete'> ";
        $output.="<a class='' title='Delete message' href='".static::$page_public."?delid={$chat->id}' onclick=\"return confirm('Are you sure you want to delete your message?');\" >";
        $output.="<i class=\"fa fa-minus-square \" style='color: red'></i>";
        $output.="</a>";
        $output.="</span>";
    }


    $output.="<span class='message-date'> ";

    $output.=$when;

    $output.="</span>";

    $output.="<span class='message-content'>";

    $output.=$chat->message;

     if(!empty($chat->img)){
         $output .= "<br>";
         $output .= "<a href='".static::$page_public."?chat_id=".u($chat->id)."'>";
         $output.="<img class='hover_img' style='width:50px; height:50px' ";
         $output.="src='";

         $output.=$chat->chat_path_and_placeholder();

         $output.="' alt='' >";
         $output .= "</a>";
     }

    $output.="</span>";



    $output.="</div>";
    $output.=" </div>";



    return $output;


}




    public static function chat_title(){

        $sql="SELECT MAX(id) as id FROM ".static::$table_name;
        $max=static::find_max_id();
        if($max){
            $chat=static::find_by_id($max);
            $header="Last message: ";
//            $when=DateDifferenceFormat($chat->date , unixToMySQL(time()) )." / ".datetime_to_text_day($chat->date);
            $when=datetime_to_text_day($chat->date);
        } else {
            $header="";
            $when="There is no messages";
        }



        $output="";
        $output.="<div class='ibox-title'>";
        $output.="<small class='pull-right text-muted'>$header";
        $output.=$when;
        $output.="</small>";

        $output.=static::$chat_header;
        $output.="</div>";

        $output.="";
        $output.="";

        return $output;

    }

    public static function chat_input_form($id=null){

        if($id){
            $chat=static::find_by_id($id);
            $message=$chat->message;
            $image="";
            if(!empty($chat->img)){

                $image.="<img class='hover_img' style='width:50px; height:50px' ";
                $image.="src='";

                $image.=$chat->chat_path_and_placeholder();

                $image.="' alt='' >";
            }

            $header_form="<h4>Edit your message here</h4>";
            $submit_value="Update it";
            $submit_name="submit_edit";
            $get="?id=".urlencode($id);
            $form_id=Form::form_id();
        } else {
            $message="";
            $image="";
            $header_form="";
            $submit_value="Send it";
            $submit_name="submit_new";
            $get="";
            $form_id="";

        }


        $output="";
        $output.="<div class='row'>";
        $output.= "<div class='col-lg-9'>";
        $output.=$header_form;
        $output .= "<div class='chat-message-form'>";
        $output .= "<form action='".static::$page_public;
        $output .= $get;
        $output .= "' method='post' enctype='multipart/form-data'>";
        $output .= "<div class='form-group'>";
        $output .= " <textarea class='form-control message-input' name='message'  placeholder='Enter message text'>";
        $output .= $message;


        $output .= "</textarea>";




        $output .= "<span class='pull-right' style='margin-right: 50%'>";


        $output .= "<input type='file' name='chat_image' id='chat_image'  class='form-control' >";
        $output .= "</span>";
        $output .= "<span > ";
        $output .= "<input class='btn btn-primary' type='submit' name='";
        $output .= $submit_name;
        $output .= "' value='";
        $output .= $submit_value;
        $output .= "'>";
        $output .= " </span>";




        if($id) {

            $output .= "<span > ";
            $output .= "<a class='btn btn-info' href='";
            $output .= static::$page_public;
            $output .= "' >";
            $output .= "Cancel";
            $output .= "</a>";
            $output .= " </span>";

            $output .= "<span class='pull-right'>";
            $output.=$image;
            $output.="</span>";
        }

        $output .= $form_id;
        $output .= csrf_token_tag();
        $output .= "</div>";
        $output .= "</form>";
        $output .= "</div>";
        $output .= "</div>";
        $output .= "</div>";

        return $output;



    }

    public static function img_script(){
        $output = "";
        $output .= "<script>";

        $output .= " $(\".hover_img\").mouseover(function() {
            $(this).css(\"width\",\"50em\");
            $(this).css(\"height\",\"50em\");

        }).mouseout(function() {
            $(this).css(\"width\",\"3em\");
            $(this).css(\"height\",\"3em\");
        });";
        $output .= "</script>";
        return $output;
    }


    public static function img_viewer(){
        $output = "";
        if(isset($_GET['chat_id'])){
            $chat=static::find_by_id($_GET['chat_id']);
            if($chat){
                $output .= "<div class='row'>";
                $output .= "<div class='col-lg-8 col-md-offset-2' >";
                $output .= "<a href='".static::$page_public."'>Back to chat</a>";
                $output .= "<a href='".static::$page_public."'>";
                $output.="<img class=\"img-responsive\" alt=\"Responsive image\" style='width:100%; height:100%' ";
                $output.="src='";

                $output.=$chat->chat_path_and_placeholder();

                $output.="' alt='' >";
                $output .= "</a>";
                $output .= "</div>";
                $output .= "</div>";
            }
            
        }
        $output .= "";

        return $output;


}





}
<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 20-Jan-16
 * Time: 9:33 PM
 */
class Photo extends DatabaseObject
{

    protected static $table_name = "photos";
//    protected static $db_table="photos";
    protected static $db_table_fields=array('id','title','caption','alternate_text','description','filename','type','size','creation_date','modified_date')  ;
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $caption;
    public $alternate_text;

    public $creation_date; //complete
    public $modified_date; //complete

    public $tmp_path;
    public $upload_directory="uploads";
    public $full_path_directory=PATH_UPLOAD;
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

    public static function display_sidebar_data($photo_id)
    {
        $photo = Photo::find_by_id($photo_id);
        $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}'></a> ";
        $output .= "<p>{$photo->filename}</p>";
        $output .= "<p>{$photo->type}</p>";
        $output .= "<p>{$photo->size}</p>";
        return $output;

    }

    public function set_files($files){
        $ext = strtolower(pathinfo(basename($files['name']), PATHINFO_EXTENSION));
        $ext_accept = ['jpg', 'png'];

//        if(!in_array($ext, $ext_accept)){
//            log_action('Registration unsuccessfull ', " upload extension violation ".$ext);
//            $this->errors[]=$this->upload_errors_array['these files not accepted'];
//            return false;
//
//
//        }

        if(empty($files) || !$files || !is_array($files)){
            $this->errors="There was no file uploaded";
            return false;

        } elseif ($files['error'] !=0){
            $this->errors[]=$this->upload_errors_array[$files['error']];
            return false;
        } elseif ($ext == 'php' || $ext == 'js' || $ext == 'pdf') {
            log_action('Registration unsuccessful ', " upload extension violation " . $ext);
            $this->errors[] = $this->upload_errors_array['these files not accepted'];
            return false;

        } elseif (!in_array($ext, $ext_accept)) {
            log_action('Registration unsuccessful ', " upload extension violation array " . $ext);
            $this->errors[] = $this->upload_errors_array['these files not accepted'];
            return false;


        }else{
            $this->filename=basename($files['name']);
            $this->tmp_path=$files['tmp_name'];
            $this->type=$files['type'];
            $this->size=$files['size'];
            return true;
        }
    }

    public function picture_path(){

        return "../". $this->upload_directory.DS.$this->filename;
    }

    public function picture_public_path(){

        return  $this->upload_directory.DS.$this->filename;
    }

    public function save() {
        if( isset($this->id)) {
            $this->before_update();
            $this->update();
        } else {
            if(!empty($this->errors))
                return false;
        }

        if(empty($this->filename)|| empty($this->tmp_path)){
            $this->errors[] ="the file was not available";
            return false;
        }

        $target_path=$this->full_path_directory.DS.$this->filename;
//     var_dump($target_path) ;

        if (file_exists($target_path)) {
            $this->errors[] ="the file {$this->filename} already exists";
            return false;
        }

        if(move_uploaded_file($this->tmp_path,$target_path)){
            $this->before_create();
            if($this->create()){
                unset($this->tmp_path)  ;
                return true;
            }
        } else {
            $this->errors[] ="the folder probably does not have permission ";
            return false;
        }


    }

    public function before_update()
    {
//        $this->modified_date=strftime("%Y-%m-%d %H:%M:%S",time());
    }

    public function before_create()
    {
//        $this->creation_date=strftime("%Y-%m-%d %H:%M:%S",time());

    }

    public function delete_picture(){
        if($this->delete()){
            $target_path=$this->full_path_directory.DS.$this->filename;
            if(file_exists($target_path)){
                return unlink($target_path) ? true :false;
            }
        } else {
            return false;
        }

    }


}



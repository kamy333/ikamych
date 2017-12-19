<?php
/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 11/23/2017
 * Time: 2:25 AM
 */

class Upload
{

    public $id;
    public $class;

    public $upload_directory = "uploads";
    public $full_path_directory = PATH_UPLOAD;
    public $image_placeholder = "https://www.mountaineers.org/images/placeholder-images/placeholder-400-x-400/image_preview";
    public $tmp_path;
    public $errors = array();
    public $upload_errors_array = array(
        // http://www.php.net/manual/en/features.file-upload.errors.php
        UPLOAD_ERR_OK => "No errors.",
        UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL => "Partial upload.",
        UPLOAD_ERR_NO_FILE => "No file  uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
    );


    public function ajax_save_user_image($user_image, $user_id)
    {
        global $database;

        $this->user_image = $user_image;
        $this->id = $user_id;


//     $this->save();

        $sql = "UPDATE " . self::$table_name . " SET user_image = '{$this->user_image}'";
        $sql .= " WHERE id={$this->id}";
        $update_image = $database->query($sql);

        echo $this->user_path_and_placeholder();

    }

    public function user_path_and_placeholder()
    {
        global $Nav;
//        $dir=   "../../". $this->upload_directory.DS.$this->user_image;
//     $dir=   $this->full_path_directory.DS.$this->user_image;
        $dir = $Nav->http . "/" . $this->upload_directory . "/" . $this->user_image;
        return empty($this->user_image) ? $this->image_placeholder : $dir;


    }

    public function set_files($files)
    {
        $ext = strtolower(pathinfo(basename($files['name']), PATHINFO_EXTENSION));
        $ext_accept = ['jpg', 'png'];

//        if(!in_array($ext, $ext_accept)){
//            log_action('Registration unsuccessfull ', " upload extension violation ".$ext);
//            $this->errors[]=$this->upload_errors_array['these files not accepted'];
//            return false;
//
//
//        }

        if (empty($files) || !$files || !is_array($files)) {
//            $this->no_picture=true;

            $this->errors = "There was no file uploaded";
            return false;

        } elseif ($files['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$files['error']];
            return false;
        } elseif ($ext == 'php' || $ext == 'js' || $ext == 'html' || $ext == 'phtml') {
            log_action('Registration unsuccessfull ', " upload extension violation " . $ext);
            $this->errors[] = $this->upload_errors_array['these files not accepted'];
            return false;

        } elseif (!in_array($ext, $ext_accept)) {
            log_action('Registration unsuccessfull ', " upload extension violation array " . $ext);
            $this->errors[] = $this->upload_errors_array['these files not accepted'];
            return false;


        } else {
            $this->user_image = basename($files['name']);
            $this->tmp_path = $files['tmp_name'];
            $this->type = $files['type'];
            $this->size = $files['size'];
            return true;
        }
    }

    public function upload_photo()
    {

        if (!empty($this->errors)) {

            return false;
        }

        if (empty($this->user_image) || empty($this->tmp_path)) {
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = $this->full_path_directory . DS . $this->user_image;
//     var_dump($target_path) ;

        if (file_exists($target_path)) {
            $this->errors[] = "the file {$this->user_image} already exists";
            return false;
        }

        if (move_uploaded_file($this->tmp_path, $target_path)) {

            unset($this->tmp_path);
            return true;

        } else {
            $this->errors[] = "the folder probably does not have permission ";
            return false;
        }


    }

    protected function set_img()
    {
        if (isset($this->username)) {
            if (file_exists("../img/{$this->username}.JPG")) {
                $this->photo = "<a href='photo.php?username=" . urlencode($this->username) . "'> <span><img class='img-thumbnail img-responsive img-circle'  src='../img/{$this->username}.JPG' alt='{$this->username}'style='width:2em;height:2em;'</span></a>";
            }
        }

    }
}
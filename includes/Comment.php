<?php



/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 16-Jan-16
 * Time: 10:00 PM
 */
class Comment extends DatabaseObject
{
    protected static $table_name = "comments";

//    protected static $db_table="comments";
    protected static $db_table_fields=array('photo_id','author','body','input_date','modified_date')  ;
    public $id;
    public $photo_id;
    public $author;
    public $body;
    public $input_date;
    public $modified_date;


    public static function create_comment($photo_id,$author="Kamy",$body=""){
        if(!empty($photo_id)&&!empty($author)&&!empty($body)){
            $comment=new self();
            $comment->photo_id =(int) $photo_id;
            $comment->author=$author;
            $comment->body=$body;
            $comment->input_date=strftime("%Y-%m-%d  %H:%M:%S",time());

            return $comment;

        } else {
            return false;
        }

    }

    public static function find_the_comment($photo_id){
        global $database;

        $sql="SELECT * FROM ".self::$db_table;
        $sql.=" WHERE photo_id =".$database->escape_string($photo_id) ;
        $sql.=" ORDER BY photo_id ASC";

        return  self::find_by_sql($sql);
    }




}

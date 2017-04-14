<?php
/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 12/7/2016
 * Time: 8:30 PM
 */

//echo $text="& ? & g l? p o?"."\n";;


//echo substr_count($text, '?')."\n"; // 2

//echo strpos($text,'?')."\n";

 $text='http://localhost/rajah_production/public/admin/edit_data.php?class_name=LinksCategory?id=1';

 $text="http://localhost/rajah_production/public/admin/delete_data.php?class_name=Links?id=4";

 $text="http://localhost/rajah_production/public/admin/manage_data.php?class_name=Links?&page=8";

 $text="http://localhost/rajah_production/public/admin/manage_data.php?class_name=Links?class_name=Links&page=1&view=1";

 $text_qry_str="/rajah_production/public/admin/edit_data.php?id=4";
 $text="http://localhost/rajah_production/public/admin/edit_data.php?id=4";

function clean_query_string($text_qry_str){
    if ( substr_count($text_qry_str, '?')>1){

        $occ=substr_count($text_qry_str, '?');
//        echo "\n"."Number time ? ".$occ."\n";
         $pos=(int) strpos($text_qry_str,'?');
//        echo"position ".$pos."\n";
       $qry_str_part1=substr($text_qry_str,0, $pos+1);
//        echo "\n";
       $qry_str_part2=substr($text_qry_str, $pos+1);
//        echo "\n";
        $qry_str_part2=str_replace("&?", "&", $qry_str_part2,$count);
        $qry_str_part2=str_replace("&&", "&", $qry_str_part2,$count);
        $qry_str_part2=str_replace("??", "&", $qry_str_part2,$count);
        $qry_str_part2=str_replace("?&", "&", $qry_str_part2,$count);

        echo $text_qry_str; echo "\n";
        $new_url= $qry_str_part1. str_replace("?", "&", $qry_str_part2,$count)."\n";

        return $new_url;
    }   else {

        return $text_qry_str;
    }
}


echo clean_query_string($text);
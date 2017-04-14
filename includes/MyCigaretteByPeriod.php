<?php
class MyCigaretteDay extends MyCigarette{
    protected static $table_name="mycigarette_view_by_day";

    protected static $db_fields = array('year','month','date','total');

    protected static $db_fields_table_display_short = array('year','month','date','total');

    protected static $db_fields_table_display_full =  array('year','month','date','total');


public $date;
public $month;
public $year;
public $total;


    public static $page_name="Cigarette by Day";
    public static $page_manage="manage_MyCigaretteDay_view.php";

    public static  function   table_nav($page_link_view,$page_link_text,$offset){
        $output="<div class=\"row\" >";
        $output.="<div class=\"col-md-10 {$offset}\" > ";
        $output.="<a  class=\"btn btn-warning\"  href=\"index.php\">Index</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\" $page_link_view\"> $page_link_text</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigarette::$page_new ."\">Add New ". MyCigarette::$page_name." </a>";
        $output.=static::table_nav_additional();
        $output.="</div>";
        $output.="</div>";
//     $output.="";
        return $output;

    }

    public static function  table_nav_additional(){
        $output="<span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigaretteMonth::$page_manage ."\">" ."By Month </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigaretteYear::$page_manage ."\">"."By Year </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". static::$page_add_cig ."\">Add 1 Cig". " </a><span>&nbsp;</span>";

        return $output;
    }

}


class MyCigaretteMonth extends MyCigarette{
    protected static $table_name="mycigarette_view_by_month";

    protected static $db_fields = array('year','month','total','monthno');

    protected static $db_fields_table_display_short = array('year','month','total');

    protected static $db_fields_table_display_full =  array('year','month','total');


public $year;
    public $month;
    public $total;


    public static $page_name="Cigarette by Month";
    public static $page_manage="manage_MyCigaretteMonth_view.php";

    public static  function   table_nav($page_link_view,$page_link_text,$offset){
        $output="<div class=\"row\" >";
        $output.="<div class=\"col-md-10 {$offset}\" > ";
        $output.="<a  class=\"btn btn-warning\"  href=\"index.php\">Index</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\" $page_link_view\"> $page_link_text</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigarette::$page_new ."\">Add New ". MyCigarette::$page_name." </a>";
        $output.=static::table_nav_additional();
        $output.="</div>";
        $output.="</div>";
//     $output.="";
        return $output;

    }

    public static function  table_nav_additional(){
        $output="<span>&nbsp;</span>";
                $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigaretteDay::$page_manage ."\">" ."By Day </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigaretteYear::$page_manage ."\">"."By Year </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". static::$page_add_cig ."\">Add 1 Cig". " </a><span>&nbsp;</span>";

        return $output;
    }


}

class MyCigaretteYear extends MyCigarette{
    protected static $table_name="mycigarette_view_by_year";

    protected static $db_fields = array('year','total');

    protected static $db_fields_table_display_short = array('year','month','date','total');

    protected static $db_fields_table_display_full =  array('year','month','date','total');



    public $year;
    public $total;


    public static $page_name="Cigarette by Year";
    public static $page_manage="manage_MyCigaretteYear_view.php";

    public static  function   table_nav($page_link_view,$page_link_text,$offset){
        $output="<div class=\"row\" >";
        $output.="<div class=\"col-md-10 {$offset}\" > ";
        $output.="<a  class=\"btn btn-warning\"  href=\"index.php\">Index</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\" $page_link_view\"> $page_link_text</a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigarette::$page_new ."\">Add New ". MyCigarette::$page_name." </a>";
        $output.=static::table_nav_additional();
        $output.="</div>";
        $output.="</div>";
//     $output.="";
        return $output;

    }
    public static function  table_nav_additional(){
        $output="<span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigaretteDay::$page_manage ."\">". "By Day </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". MyCigaretteMonth::$page_manage ."\">" ."By Month </a><span>&nbsp;</span>";
        $output.="<a  class=\"btn btn-primary\"  href=\"". static::$page_add_cig ."\">Add 1 Cig". " </a><span>&nbsp;</span>";

        return $output;
    }

}

?>
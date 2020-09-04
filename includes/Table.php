
<?php

class Table  {

public static $table="table";
public static $table_bordered="table-bordered";
public static $table_responsive="table-responsive";
public static $table_hover="table-hover";
public static $table_condensed="table-condensed";
public static $table_striped="table-striped";


 public static function  full_table_class()  {
     $output="";
     $output.=self::$table." ";
     $output .= self::$table_bordered . " ";
     $output.=self::$table_responsive." ";
     $output.=self::$table_hover." ";
     $output.=self::$table_condensed." ";
     $output.=self::$table_striped;
return $output;
}

public function view($array_header=array()){
 $output="";

$output.="<table ";
$output.="class=' ";
$output.=self::full_table_class();
$output.="'>";

    $output.="<tr>";
    foreach ( $array_header as $header) {
        $output.="<th>";
        $output.=$header;
        $output.="</th>";
         }
    $output.="</tr>";

    $output.="<tr>";
    foreach ( $array_header as $header) {
        $output.="<td>";
        $output.=$header;
        $output.="</td>";
    }
    $output.="</tr>";

$output.="</table>";


return $output;

}


public static function ibox_table($content="",$title="",$col=4, $col_offset=0){

    $class_col="col-lg-$col ";

    if($col_offset==0){
        $class_col_offset="";
    } else {
        $class_col_offset="col-md-offset-$col_offset";
    }



    $output="";
    $output.="<div class=\"$class_col $class_col_offset \">";
    $output.="<div class=\"ibox float-e-margins\" >";

    if($title){
        $output.="<div class=\"ibox-title\">";
        $output.="<h5 class='text-center'>$title</h5>";
        $output.="<div class=\"ibox-tools\">
                                    <a class=\"collapse-link\">
                                        <i class=\"fa fa-chevron-up\"></i>
                                    </a>
                                    <a class=\"close-link\">
                                        <i class=\"fa fa-times\"></i>
                                    </a>
                                </div>";

        $output.="</div>";
    }




    $output.="<div class=\"ibox-content\">";

    $output.=$content;

    $output.="</div>";
    $output.="</div>";
    $output.="</div>";

    $output.="";

return $output;
}


    public static function div_table() {
    


}


public static function modal($content,$l){
    $output = "";
    

    
}

    public $fieldname;
    public $href_asc;
    public $href_desc;


    public function head()
    {
        $output = "";
        $output .= "<div class='table-responsive'>";
        $output .= "<table class='table table-striped table-bordered table-hover table-condensed '>";
        $output .= "<tr>";
        $output .= "<th class='text-center' style='vertical-align:middle;white-space:nowrap;'>" . $this->fieldname . "</th>";


        $output .= "</table>";

        return $output;

    }

}

?>

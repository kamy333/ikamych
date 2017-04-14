<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 05-Jun-16
 * Time: 1:44 AM
 */
class SmartNav
{

    public static $menus=
     array(
         "public_gallery"=>array(
         'name'=>"gallery",
         'folder'=>'Inspinia',
         'environment'=>'public',
         'order'=>1,
         'menu'=>'Galleries',
         'protection'=>array(
         'index_gallery6',
             ),
         'link'=>array(
             'index'=>'Home',
             'index_gallery6'=>'Bralia',
             'index_gallery'=>'Desiree Wedding',
             'index_gallery2'=>'Family',
             'index_gallery3'=>'Friends',
             'index_gallery4'=>'My Page',
             'index_gallery5'=>'Lycée Français de Jérusalem',
             'index_gallery7'=>'Maman Bozorgue',
             'index_gallery8'=>'Film',

         )
 ),
         "admin_public_menu"=>array(
             'name'=>"gallery",
             'folder'=>'Inspinia',
             'environment'=>'admin',
             'order'=>1,
             'menu'=>'Galleries',
             'protection'=>array(
                 'index_gallery6',
             ),
             'link'=>array(
                 'index'=>'Home',
                 'index_gallery6'=>'Bralia',
                 'index_gallery'=>'Desiree Wedding',
                 'index_gallery2'=>'Family',
                 'index_gallery3'=>'Friends',
                 'index_gallery4'=>'My Page',
                 'index_gallery5'=>'Lycée Français de Jérusalem',
                 'index_gallery7'=>'Maman Bozorgue',
                 'index_gallery8'=>'Film',
             )
         ),
             "Admin_class"=>array(
                 'name'=>"admin",
                 'folder'=>'Inspinia',
                 'environment'=>'admin',
                 'order'=>1,
                 'menu'=>'Admin',
                 'query_string'=>'class_name',
                 'link'=>array(
                     'class_manage?class_name=User'=>'Users',
                     'class_manage?class_name=Client'=>'Clients',
                     'class_manage?class_name=Project'=>'Project',
                     'class_manage?class_name=InvoiceActual'=>'Invoice Actual',
                     'class_manage?class_name=InvoiceSend'=>'Invoice Send',
                     'class_manage?class_name=Chat'=>'Chat',
             ),
     ),
         "Admin_transport"=>array(
             'name'=>"admin",
             'folder'=>'Inspinia',
             'environment'=>'admin',
             'order'=>1,
             'menu'=>'Admin',
             'query_string'=>'class_name',
             'link'=>array(
                 'class_manage?class_name=TransportProgramming'=>'Course',
                 'class_manage?class_name=TransportProgrammingModel'=>'Course Model',
                 'class_manage?class_name=TransportClient'=>'Clients',
                 'class_manage?class_name=TransportChauffeur'=>'Chauffeur',
                 'class_manage?class_name=TransportType'=>'Course type',
                 'class_manage?class_name=Chat'=>'Chat',
             ),
         ),

     );
    public $http = "http://www.ikamy.ch/";
    public $path;
    public $path_admin;
    public $path_public;
    public $layout_context;
    public $active_admin;
    public $active_public = "";
    public $current_page;
    public $current_page_php;
    public $folder;

    function __construct()
    {
        $this->get_path();
    }

    public function get_path()
    {

        global $server_local;
        global $server_phpstorm;
        $this->current_page_php = basename($_SERVER["PHP_SELF"]);
        $this->current_page = str_replace(".php", "", $this->current_page_php);
        $pos1 = strpos($_SERVER["PHP_SELF"], "/");
        $pos2 = strpos($_SERVER["PHP_SELF"], "/", 1);
        $pos_Dif = $pos2 - $pos1;

        $pos3 = strpos($_SERVER["PHP_SELF"], "/", $pos1 + 1);
        $pos4 = strpos($_SERVER["PHP_SELF"], "/", $pos3 + 1);

//     echo "  \$pos1 $pos1"."<br>";
//     echo "  \$pos2 $pos2"."<br>";
//     echo "  \$pos3 $pos3"."<br>";
//     echo "  \$pos4 $pos4"."<br>";
        $pos_Dif2 = $pos4 - $pos3;


        if ($_SERVER['SERVER_NAME'] == $server_local) {
            $this->folder = substr($_SERVER["PHP_SELF"], $pos3 + 1, $pos_Dif2 - 1);
        } elseif ($_SERVER['SERVER_NAME'] == $server_phpstorm) {
            echo "verify_link class SmartNav";
        } else {
            $this->folder = substr($_SERVER["PHP_SELF"], $pos1 + 1, $pos_Dif - 1);

        }


        $this->path_relative();
        if ($_SERVER['SERVER_NAME'] == $server_local) {
            $this->http = "http://" . $_SERVER['SERVER_NAME'] . "/" . LOCALHOST_FOLDER . "/";
        } elseif ($_SERVER['SERVER_NAME'] == $server_phpstorm) {
            echo "verify_link class SmartNav";
        } else {
            $this->http = "http://" . $_SERVER['SERVER_NAME'] . "/";

        }
        http://localhost/Inspinia/index.php
    }

    public function path_relative()
    {

        if (basename(dirname($_SERVER['SCRIPT_FILENAME'])) == "admin") {
            $this->path_admin = "";
            $this->path_public = "../";
            $this->path = "../";
            $this->layout_context = "admin";
            $this->active_admin = "active";
            $this->active_public = "";

        } else {
            $this->path_admin = "admin/";
            $this->path_public = "";
            $this->path = "";
            $this->layout_context = "public";
            $this->active_admin = "";
            $this->active_public = "active";
        }


    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        $output = "";
        $output .= "\$Path: " . $this->path . "<br>\n";
        $output .= "\$Path admin: " . $this->path_admin . "<br>\n";
        $output .= "\$Path public: " . $this->path_public . "<br>\n";
        $output .= "\$folder: " . $this->folder . "<br>\n";
        $output .= "\$current_page: = " . $this->current_page . "<br>\n";
        $output .= "\$current_page_php: = " . $this->current_page_php . "<br>\n";
        $output .= "\$http =: " . $this->http . "<br>\n";


        $output .= "\$layout_context: =  " . $this->layout_context . "<br>\n";
        $output .= "\$active_admin:  =  " . $this->active_admin . "<br>\n";
        $output .= "\$active_public: =  " . $this->active_public . "<br>\n";

        $output .= $this->http . $this->folder;
        return $output;

    }

public  function  public_menu($name="public_gallery",$env='public'){
    global $session;

//    $p=$active_menu_clean;

$array_class=array();
    foreach (static::$menus[$name]['link']  as $page=>$page_title) {
//    echo $page.'<br>';
     $len_query_str=strlen(static::$menus[$name]['query_string']);
     $len_page=strlen($page)  ;
        if($len_query_str>0){
        $pos= strpos($page , $query_str=static::$menus[$name]['query_string']."=");
            array_push($array_class,substr($page,$pos+$len_query_str+1,$len_page-$pos));
        }

    }



    $class="";

      $query_string=static::$menus[$name]['query_string'];
//    echo $query_string;

    if(in_array($this->current_page,array_keys(static::$menus[$name]['link'])) )
    {
        $class="active";
    } else {
        $class="";
    }

    if(isset($_GET[$query_string])){
        $qu_string= $_GET[$query_string];
        if(in_array($qu_string,$array_class)){
            $class="active";
        }
    } elseif (in_array($this->current_page,array_keys(static::$menus[$name]['link'])) )
    {
        $class="active";
    }


    $output="";

    if($env=="public"){
        $output.=$this->format_menu_public(static::$menus[$name]['menu'],$class);

    } else {
        $output.=$this->format_menu_admin(static::$menus[$name]['menu'],$class);

    }




    foreach (static::$menus[$name]['link']  as $page=>$page_title){

        if(static::$menus[$name]['environment']=="admin")
        {$path=$this->path_admin;
        } else {
            $path=$this->path_public;}

        $pos=strpos($page,"?");
        $len=strlen($page)-1;

        if($pos){
            $query_string= substr($page,$pos,$len);
            $the_page=substr($page,0,$pos).'.php'.$query_string;

        }else {
            $the_page=$page;}

        if ($page===$this->current_page) { $class="active";} else { $class="";}



        if ($page=='index_gallery6' && (User::is_bralia())){
            $output.="<li class='$class'><a  href=\"{$path}{$the_page}\">$page_title</a></li>";
        } elseif($page=='index_gallery8' &&$session->is_logged_in()){
            $output.="<li class='$class'><a  href=\"{$path}{$the_page}\">$page_title</a></li>";

        } elseif($page=='index_gallery6'|| $page=='index_gallery8' ){
            $output.="";

        } else {
            $output.="<li class='$class'><a  href=\"{$path}{$the_page}\">$page_title</a></li>";}

    }

    $output.="</ul>";
    $output.="</li>";

    return $output;

}

public function format_menu_public($menu_name="Unknown",$class="")  {
 $output="";

    $output.="<li class=\"dropdown {$class} \">";
    $output.="<a aria-expanded=\"false\" role=\"button\" href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
    $output.=$menu_name;
    $output.="<span class=\"caret\"></span>";
    $output.="</a>";
    $output.="<ul role=\"menu\" class=\"dropdown-menu\">";

    return $output;



}

    public function format_menu_admin($menu_name="Unknown",$class="")
    {
        $collapse="";
        $output = "<li class=''>";
        $output.="<a href=''>";
        $output.="<i class=\"fa fa-th-large\"></i> ";
        $output.="<span class=\"nav-label\">";
        $output.=$menu_name;
        $output.="</span>";
        $output.="<span";
        $output.="class=\"fa arrow\"></span></a>";
        $output.="<ul class=\"nav nav-second-level $collapse; ?>\">
";
        $output.="";
        $output.="";
        $output.="";
        $output.="";
        $output.="";

        return $output;
    }

    public function find_top_active($name = "public_gallery")
    {


    }

    public function path_script()
    {
        $output = "";
        $output .= "<script>";
        if (basename(dirname($_SERVER['SCRIPT_FILENAME'])) == "admin") {
            $output .= "var \$layout_context='admin';";
            $output .= "var \$path_admin='';";
            $output .= "var  \$path_public='../';";
            $output .= "var \$path='../';";
        } else {

            $output .= "var \$layout_context='public';";
            $output .= "var \$path_admin='admin/';";
            $output .= "var \$path_public=''  ;";
            $output .= "var \$path='';";
        }
        $output .= "</script>>";

        return $output;

    }





    public  function menu_item($class='',$text="Missing text",$page="class_manage.php",$area='admin',$target=false){
//        the item is for the admin sidebar context but var context can point to public

        $active="";


        if($class){
//            if(isset($_GET['class_name']) || isset($_GET['cl'])  ){

            if (isset($_GET['class_name'])) {

//                if(isset($_GET['cl'])) {
//                    if (MyClasses::find_short_class($_GET['cl'])) {
//                        $_GET['class_name'] = MyClasses::find_short_class($_GET['cl']);
//                    } else {
//                        $_GET['class_name'] = $_GET['cl'];
//                    }
//                }

                $class_name=$_GET['class_name'];
                if($class_name==$class && $page==$this->current_page_php ){$active= 'active';}


            } else {
                $class_name="";
                if($class_name==$class && $page==$this->current_page_php ){$active= 'active';}

            }

        }else {
            $class_name="";
            if($class_name==$class && $page==$this->current_page_php ){$active= 'active';}

        }


        if($area==='admin'){
            $path=$this->path_admin;
        }elseif($area==='public'){
            $path=$this->path_public;}
        else{$path="";}
        

        $output = "";
        $output .= "<li class='{$active}'>";



        $output .= "<a href='";
        $output .= $path.$page;
        if($class){
        $output .= "?class_name=".$class;
        }
        $output .= "'";

        if($target){
            $output.=" target=\"_blank\" ";
        }

        $output .= ">";
        $output .= $text;
        $output .= "</a>";


        $output .= "</li>";

        //The below is not working
//        if($class){
//            $output.="<span class='label label-default pull-right'>";
//            $output.="<a  href='{$this->path_admin}class_edit.php?class_name=$class'>N</a></span>";
//        }


        return $output;

        
    }

}
$Nav=new SmartNav;
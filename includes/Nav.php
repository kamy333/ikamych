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
             'index' => 'Home',
             'index_gallery6' => 'Bralia',
             'index_gallery' => 'Desiree Wedding',
             'index_gallery16' => 'Desiree Baby Shower',
             'index_gallery10' => 'Samira Wedding',
             'index_gallery2' => 'Family',
             'index_gallery3' => 'Friends',
             'index_gallery4' => 'My Page',
             'index_gallery5' => 'Lycée Français de Jérusalem',
             'index_gallery7' => 'Maman Bozorgue',
             'index_gallery8' => 'Film',
             'index_gallery11' => 'Film Classic',
             'index_gallery13' => 'Marco',
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
             'link'=> array(
                 'index' => 'Home',
                 'index_gallery6' => 'Bralia',
                 'index_gallery' => 'Desiree Wedding',
                 'index_gallery16' => 'Desiree Baby Shower',
                 'index_gallery10' => 'Samira Wedding',
                 'index_gallery2' => 'Family',
                 'index_gallery3' => 'Friends',
                 'index_gallery4' => 'My Page',
                 'index_gallery5' => 'Lycée Français de Jérusalem',
                 'index_gallery7' => 'Maman Bozorgue',
                 'index_gallery8' => 'Film',
                 'index_gallery9' => 'Pablo Enregistrement',
                 'index_gallery12' => 'Djam photo',
                 'index_gallery14' => 'Djam objectif',
                 'index_gallery15' => 'Djam helico',
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
    public $server_name;
    public $full_url;
    public $url;
    public $array_full_url;
    public $array_url;
    public $top_folder;
    public $path_folders;
    public $folder_immediate = "";
    public $folder_prev = "";


    function __construct()
    {
        $this->get_path();
    }

    public function get_path()
    {

        global $server_local;
        global $server_phpstorm;

//        $this->find_top_folder();
        $this->full_url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : $_SERVER['REQUEST_URI'];
        $this->url = str_replace(SITE_URL, "", $this->full_url);
        $this->array_full_url = explode('/', $this->full_url);
        $this->array_url = explode('/', $this->url);
        $this->top_folder = $this->array_url[1];
        $first_dir = SITE_URL . DS . $this->array_url[1] . DS;
        $admin_dir = $first_dir . DS . 'admin' . DS;
        $this->path_public = $first_dir;
        $this->path_admin = $admin_dir;
        $count_full = count($this->array_full_url);
        $count = count($this->array_url);


        $this->folder_immediate = $this->array_full_url[$count_full];
        $this->folder_prev = $this->array_full_url[$count - 1];

//        echo "<script>alert($count )</script>";
//        echo "<script>alert($this->folder_immediate )</script>";
//        echo "<script>alert($this->folder_prev )</script>";

        for ($x = 1; $x < $count - 1; $x++) {
            $this->path_folders .= "/" . $this->array_url[$x];
        }
        $this->path_folders .= "/";

        $this->current_page_php = basename($_SERVER["PHP_SELF"]);
        $this->current_page = str_replace(".php", "", $this->current_page_php);
        $pos1 = strpos($_SERVER["PHP_SELF"], "/");
        $pos2 = strpos($_SERVER["PHP_SELF"], "/", 1);
        $pos_Dif = $pos2 - $pos1;

        $pos3 = strpos($_SERVER["PHP_SELF"], "/", $pos1 + 1);
        $pos4 = strpos($_SERVER["PHP_SELF"], "/", $pos3 + 1);

        $pos_Dif2 = $pos4 - $pos3;
        $this->server_name = $_SERVER['SERVER_NAME'];

        if ($_SERVER['SERVER_NAME'] == $server_local) {
            $this->folder = substr($_SERVER["PHP_SELF"], $pos3 + 1, $pos_Dif2 - 1);
        } elseif ($_SERVER['SERVER_NAME'] == $server_phpstorm) {
            echo "verify_link class SmartNav";
        } else {
            $this->folder = substr($_SERVER["PHP_SELF"], $pos1 + 1, $pos_Dif - 1);

        }


        $this->path_relative();
        if ($_SERVER['SERVER_NAME'] == $server_local) {
            $this->http = "http://" . $_SERVER['SERVER_NAME'] . DS . LOCALHOST_FOLDER . DS;
            $this->http = $this->array_full_url[0] . '//' . $_SERVER['SERVER_NAME'] . DS . LOCALHOST_FOLDER . DS;
        } elseif ($_SERVER['SERVER_NAME'] == $server_phpstorm) {
            echo "verify_link class SmartNav";
        } else {
            $this->http = "http://" . $_SERVER['SERVER_NAME'] . "/";
            $this->http = $this->array_full_url[0] . '//' . $_SERVER['SERVER_NAME'] . "/";


        }
//        http://localhost/Inspinia/index.php
    }


    public function path_relative()
    {


        if (basename(dirname($_SERVER['SCRIPT_FILENAME'])) == "admin") {
//            $this->path_admin = "";
//            $this->path_public = "../";
            $this->path = "../";
            $this->layout_context = "admin";
            $this->active_admin = "active";
            $this->active_public = "";

        } else {
//            $this->path_admin = "admin/";
//            $this->path_public = "";
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
        $output .= "\$full_url: =  " . $this->full_url . "<br>\n";
        $output .= "\$url: =  " . $this->url . "<br>\n";
        $output .= "\$top_folder: =  " . $this->top_folder . "<br>\n";
        $output .= "\$path_folders: =  " . $this->path_folders . "<br>\n";
        $output .= "\$folder_immediate: =  " . $this->folder_immediate . "<br>\n";
        $output .= "\$folder_prev: =  " . $this->folder_prev . "<br>\n";

        $output .= "\$http \$folder: =  " . $this->http . $this->folder;

        echo "\$array_full_url";
        echo '<pre>';
        print_r($this->array_full_url);
        echo '</pre>';
        echo "\$array_url";
        echo '<pre>';
        print_r($this->array_url);
        echo '</pre>';



        return $output;

    }

public  function  public_menu($name="public_gallery",$env='public'){
    global $session;

//    $p=$active_menu_clean;

$array_class=array();
    foreach (static::$menus[$name]['link']  as $page=>$page_title) {
//    echo $page.'<br>';
        if (isset(static::$menus[$name]['query_string'])) {
            $len_query_str = strlen(static::$menus[$name]['query_string']);
            $len_page = strlen($page);
            if ($len_query_str > 0) {
                $pos = strpos($page, $query_str = static::$menus[$name]['query_string'] . "=");
                array_push($array_class, substr($page, $pos + $len_query_str + 1, $len_page - $pos));
            }

        }

    }



    $class="";
    if (isset(static::$menus[$name]['query_string'])) {
        $query_string = static::$menus[$name]['query_string'];
    } else {
        $query_string = "";
    }


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
            $the_page = $page . ".php";
        }

        if ($page===$this->current_page) { $class="active";} else { $class="";}


        if ($page == 'index_gallery6' && (User::is_bralia())) {
            $output .= "<li class='$class'><a  href=\"{$path}{$the_page}\">$page_title</a></li>";

        } elseif (($page == 'index_gallery12' || $page == 'index_gallery14') && (User::is_djamila())) {
            $output .= "<li class='$class'><a  href=\"{$path}{$the_page}\">$page_title</a></li>";


        } elseif ($page == 'index_gallery8' && $session->is_logged_in()) {
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


        $active = "";


        if ($class) {

            if (isset($_GET['class_name'])) {


                $class_name = $_GET['class_name'];
                if ($class_name == $class && $page == $this->current_page_php) {
                    $active = 'active';
                }


            } else {
                $class_name = "";
                if ($class_name == $class && $page == $this->current_page_php) {
                    $active = 'active';
                }

            }

        } else {
            $class_name = "";
            if ($class_name == $class && $page == $this->current_page_php) {
                $active = 'active';
            }

        }

        if ($area == 'admin') {
            $path = $this->path_admin;

        } elseif ($area == 'public') {
            $path = $this->path_public;
        } else {


            $findme = '/';
            $pos = strpos($area, $findme);
// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
            $path = "";
            if ($pos === false) {
                $path = $area;

            } else {
                $array = explode($findme, $area);
                $count = count($array);
                $path = "/" . $this->top_folder;
                for ($x = 0; $x < $count; $x++) {
                    $path .= "/" . $array[$x];
                }
                $path .= "/";

            };
        }


        $output = "";
        $output .= "<li class='{$active}'>";

//        $path=$this->path_public;

        $output .= "<a href='";
        $output .= $path;
        $output .= $page;
        if ($class) {
            $output .= "?class_name=" . $class;
        }
        $output .= "'";

        if ($target) {
            $output .= " target=\"_blank\" ";
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


        $output = str_replace("///", "/", $output);

        return $output;


    }

    public function menu_item_simple($text = "Missing text", $page = "/public/admin/manager_user.php", $target = false)
    {
//        the item is for the admin sidebar context but var context can point to public


        $output = "";
        $output .= "<li >";

//        $path=$this->path_public;

        $output .= "<a href='";
        $output .= $page;
        $output .= "'";
        if ($target) {
            $output .= " target=\"_blank\" ";
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


        $output = str_replace("///", "/", $output);

        return $output;


    }


}
$Nav=new SmartNav;

<?php



require_once LIB_PATH.DS.'src'.DS.'Foundationphp'.DS.'Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', LIB_PATH.DS.'src'.DS.'Foundationphp');

use Foundationphp\Exporter\Csv;

if (isset($_GET['download_csv']) && $_GET['download_csv']=="Yes") {
    if(isset($table_name) && isset($table_name)){
        $sql = "SELECT * FROM {$table_name} ";
        $sql.= " ".get_where_string($class_name);

        $result = $database->query($sql);

$time=strftime("%Y-%m-%d",time());


        try {
        $options['suppress'] = 'hashed_password';
//        $options['delimiter'] = "\t";
         //   $options="";
            new Csv($result, $time."_".$table_name.'.csv', $options);
            $message('Download OK',"ok");
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

    }



}

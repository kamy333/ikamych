<?php



require_once LIB_PATH.DS.'src'.DS.'Foundationphp'.DS.'Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', LIB_PATH.DS.'src'.DS.'Foundationphp');

use Foundationphp\Exporter\Csv;

if (isset($_GET['download_csv']) && $_GET['download_csv']=="Yes") {
    if (isset($table_name, $class_name) && is_subclass_of($class_name, 'DatabaseObject')) {
        $sql = "SELECT * FROM {$table_name} ";
        [$where, $params, $types] = $class_name::current_request_where_clause();
        $sql .= " " . $where;

        $result = empty($params) ? $database->query($sql) : $database->query_prepared($sql, $params, $types);

$time = date("Y-m-d");


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

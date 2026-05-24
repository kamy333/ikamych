<?php
if (!defined('DB_SERVER')) {
    require_once(__DIR__ . DIRECTORY_SEPARATOR . 'config_loader.php');
}



class MySQLDatabaseMYSQLI
{


    private $connection;
//    private $mysqli;
    public $last_query;

    function __construct()
    {
        $this->open_connection();
    }

    public function open_connection()
    {
        $this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//        if (mysqli_connect_errno()) {
//            die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
//             }
        $this->connection->set_charset('utf-8');

        if ($this->connection->connect_errno) {
            die('Database connection failed: ' . $this->connection->connect_error. " (" . $this->connection->connect_errno . ")");
        }
        

    }

    public function close_connection()
    {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
//            $this->connection->closefff();
        }

    }

    public function query($sql)
    {
        $this->last_query = $sql;
//        $result = mysqli_query($this->connection, $sql);
        $result=$this->connection->query($sql);
        // todo
        $this->confirm_query($result);
        return $result;
    }

    public function query_prepared($sql, array $params = [], $types = "")
    {
        $this->last_query = $sql;
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            $this->confirm_query(false);
        }

        if (!empty($params)) {
            if ($types === "") {
                $types = $this->parameter_types($params);
            }

            $bind_params = [$types];
            foreach ($params as $key => $value) {
                $bind_params[] = &$params[$key];
            }

            if (!call_user_func_array([$stmt, 'bind_param'], $bind_params)) {
                $this->confirm_query(false);
            }
        }

        if (!$stmt->execute()) {
            $this->confirm_query(false);
        }

        $result = $stmt->get_result();
        $this->confirm_query($result);
        return $result;
    }

    private function parameter_types(array $params)
    {
        $types = "";
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= "i";
            } elseif (is_float($param)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }
        return $types;
    }

    public function escape_value($string)
    {
//        $this->connection;

//        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        $escaped_string = $this->connection->real_escape_string((string) $string);
       
        return $escaped_string;
    }

    public function fetch_array($result_set)
    {
//        return mysqli_fetch_assoc($result_set);
        return $result_set->fetch_assoc();

    }

    public function num_rows($result_set)
    {
//        return mysqli_num_rows($result_set);
        return $result_set->num_rows;

    }

    public function insert_id()
    {
      //  return mysqli_insert_id($this->connection);
        return $this->connection->insert_id;

    }

    public function affected_rows()
    {
   //     return mysqli_affected_rows($this->connection);
        return $this->connection->affected_rows;
    }

    private function confirm_query($result = null)
    {
        if ($this->connection->error) {
            $output = "<br><b><span style='color: deepskyblue'> query failed.</span></b><br>" .             $this->connection->error;

            $output .= "<br><b><span style='color: deepskyblue'>last query executed sql:</span></b> <br>" . $this->last_query;
            die($output);
        }
    }

    public function free_result($result){
       // mysqli_free_result($result);
        $result->free_result();
    }
}
$database1= new MySQLDatabaseMYSQLI();




?>

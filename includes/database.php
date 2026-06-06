<?php

//require_once("config.php");



class MySQLDatabase
{


    private $connection;
    private $last_affected_rows = null;
    public $last_query;

    function __construct()
    {
        $this->open_connection();
    }

    public function open_connection()
    {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
        }
    }

    public function close_connection()
    {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
        }

    }

    public function query($sql)
    {
        $this->last_query = $sql;
        $this->last_affected_rows = null;
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }

    public function query_prepared($sql, array $params = [], $types = "")
    {
        $this->last_query = $sql;
        $this->last_affected_rows = null;
        $stmt = mysqli_prepare($this->connection, $sql);
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

        if (!mysqli_stmt_execute($stmt)) {
            $this->confirm_query(false);
        }

        $result = mysqli_stmt_get_result($stmt);
        $this->confirm_query($result);
        return $result;
    }

    public function execute_prepared($sql, array $params = [], $types = "")
    {
        $this->last_query = $sql;
        $stmt = mysqli_prepare($this->connection, $sql);
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

        $result = mysqli_stmt_execute($stmt);
        $this->confirm_query($result);
        $this->last_affected_rows = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);

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
        $escaped_string = mysqli_real_escape_string($this->connection, (string) $string);
        return $escaped_string;
    }

    public function fetch_array($result_set)
    {
        return mysqli_fetch_assoc($result_set);
    }

    public function num_rows($result_set)
    {
        return mysqli_num_rows($result_set);
    }

    public function insert_id()
    {
        return mysqli_insert_id($this->connection);

    }

    public function affected_rows()
    {
        if ($this->last_affected_rows !== null) {
            return $this->last_affected_rows;
        }

        return mysqli_affected_rows($this->connection);
    }

    private function confirm_query($result)
    {
        if (!$result) {
            global $Nav;
            if (isset($Nav) && $Nav->server_name == "localhost") {
                $output = "<br><b><span style='color: deepskyblue'> query failed.</span></b><br>" . mysqli_error($this->connection);
                $output .= "<br><b><span style='color: deepskyblue'>last query executed sql:</span></b> <br>" . $this->last_query;
            } else {
                $output = "<br><b><span style='color: deepskyblue'> query failed contact system Admin see watch debug.</span></b><br>"; //. $this->last_query;
            }
            die($output);
        }

    }

    public function free_result($result){
        mysqli_free_result($result);

    }
}
$database= new MySQLDatabase();




?>

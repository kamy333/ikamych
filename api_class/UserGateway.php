<?php

class UserGateway
{

    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function authenticate($username = "", $password = "")
    {
        $record_user = $this->getByUsername($username);
        if ($record_user === false) {
            return false;
        }

        if (password_verify($password, $record_user["password_hash"])) {
            return $record_user;
        } else {
            return false;
        }
    }


    public function getByAPIKey(string $key)
    {
        $sql = "SELECT * FROM user WHERE api_key = :api_key";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":api_key", $key, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function getByUsername(string $username)
    {
        $sql = "SELECT * FROM user WHERE username= :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM user ORDER BY id";
        $stmt = $this->conn->query($sql);
//        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $row['is_completed']=(bool) $row['is_completed'];
            $data[] = $row;
        }
        return $data;
    }


    public function getAllObject(): array
    {
        $sql = "SELECT * FROM user ORDER BY id";
        $stmt = $this->conn->query($sql);
//        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $row['is_completed']=(bool) $row['is_completed'];

            $data[] = $row;
        }
        return $data;
    }


    private static function instantiate($record)
    {
        // Could check that $record exists and is an array
//        if (isset($record["hashed_password"])) {
//            static::$existing_password = $record["hashed_password"];
//        }
        // if move to DatabaseObject class self change by
        // $object = new $class_name;
        // $class_name=get_called_class();
        $object = new static;
        // Simple, long-form approach:
        // $object->id 				= $record['id'];
        // $object->username 	= $record['username'];
        // $object->password 	= $record['password'];
        // $object->first_name = $record['first_name'];
        // $object->last_name 	= $record['last_name'];

        // More dynamic, short-form approach:
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute)
    {
        // We don't care about the value, we just want to know if the key exists
        // Will return true or false
        return array_key_exists($attribute, $this->attributes());
    }

    protected function sanitized_attributes()
    {
        global $database;
        $clean_attributes = array();
        // sanitize the values before submitting
        // Note: does not alter the actual value of each attribute
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }

    private function attributes()
    {
        // return an array of attribute names and their values
        $attributes = array();
        foreach (static::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }


}

class Z extends DatabaseObjectApi
{
}
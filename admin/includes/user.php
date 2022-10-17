<?php

class User 
{

    private static $db_table = "users"; 
    private static $db_table_fields = ['username', 'password', 'first_name', 'last_name']; 
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users()
    {
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id)
    {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id=$user_id LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function find_this_query($base)
    {
        global $database;

        $result_set = $database->query($base);

        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantation($row);
        }

        return $the_object_array;
    }

    public static function verify_user($username, $password)
    {
        global $database;
        
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $base = "SELECT * FROM users WHERE ";
        $base .= "username = '{$username}' ";
        $base .= "AND password = '{$password}' ";
        $base .= "LIMIT 1";

        $the_result_array = self::find_this_query($base);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function instantation($the_record)
    {
        $the_object = new self;

        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;

    }

    private function has_the_attribute($key)
    {
        $object_properties = get_object_vars($this);

        return array_key_exists($key,$object_properties);
    }

    protected function properties()
    {
        $properties = array();

        foreach (self::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create()
    {
        global $database;
        $properties = $this->properties();

        $base = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $base .= "VALUES ('". implode("','", array_values($properties)) ."')";

        if ($database->query($base)) {
            $this->id = $database->insert_id();

            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        global $database;

        $base = "UPDATE " . self::$db_table . " SET ";
        $base .= "username= '" . $database->escape_string($this->username) . "', "; 
        $base .= "password= '" . $database->escape_string($this->password) . "', "; 
        $base .= "first_name= '" . $database->escape_string($this->first_name) . "', "; 
        $base .= "last_name= '" . $database->escape_string($this->last_name) . "' ";
        $base .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($base);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function delete()
    {
        global $database;

        $base = "DELETE FROM  " . self::$db_table . " ";
        $base .= "WHERE id= " . $database->escape_string($this->id);
        $base .= " LIMIT 1";

        $database->query($base);
    }
}

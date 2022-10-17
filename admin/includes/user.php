<?php

class User extends Db_object
{

    protected static $db_table = "users"; 
    private static $db_table_fields = ['username', 'password', 'first_name', 'last_name']; 
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function verify_user($username, $password)
    {
        global $database;
        
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $base = "SELECT * FROM " . self::$db_table . " WHERE ";
        $base .= "username = '{$username}' ";
        $base .= "AND password = '{$password}' ";
        $base .= "LIMIT 1";

        $the_result_array = self::find_this_query($base);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
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

    protected function clean_properties()
    {
        global $database;

        $clean_properties = [];

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create()
    {
        global $database;
        $properties = $this->clean_properties();

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

        $properties = $this->clean_properties();

        $properties_pairs = [];

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $base = "UPDATE " . self::$db_table . " SET ";
        $base .= implode(",", $properties_pairs);
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

<?php

class User extends Db_object
{

    protected static $db_table = "users"; 
    protected static $db_table_fields = ['username', 'password', 'first_name', 'last_name', 'user_image']; 
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "image";
    public $image_placeholder = "https://place-hold.it/100x100&text=image";

    public function img_path_and_placehold()
    {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;;
    }

    public static function verify_user($username, $password)
    {
        global $database;
        
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $base = "SELECT * FROM " . self::$db_table . " WHERE ";
        $base .= "username = '{$username}' ";
        $base .= "AND password = '{$password}' ";
        $base .= "LIMIT 1";

        $the_result_array = self::find_by_query($base);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

}

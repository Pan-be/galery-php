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

    public function upload_photo()
    {
     
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->user_image) || empty($this->tmp_path)) {
                $this->errors[] = 'The file was not available';
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->user_image} already exist.";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
               
                    unset($this->tmp_path);
                    return true;
            
            } else {
                $this->errors[] = "The file directory probably does not have permission.";
                return false;
            }

            $this->create();
        }
    

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

    public function ajax_save_user_image($user_image, $user_id)
    {
        global $database;

        $user_image = $database->escape_string($user_image);
        $user_id = $database->escape_string($user_id);

        $this->user_image = $user_image;
        $this->id = $user_id;

        $base = "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}' ";
        $base .= " WHERE id = {$this->id} ";
        $update_image = $database->query($base);

        echo $this->img_path_and_placehold();
    }

}

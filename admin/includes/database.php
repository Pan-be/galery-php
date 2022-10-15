<?php

require_once('new_config.php');

class Database
{
    public $connection;

    function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection()
    {
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection faild" . $this->connection->connect_error);
        }
    }

    public function query($base)
    {
        $result = mysqli_query($this->connection, $base);
        $this->confirm_query($result);
        
        return $result;
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die('Query failed.' . $this->connection->error);
        }
    }

    public function escape_string($string)
    {
        $escaped_string = mysqli_real_escape_string($this->connection,$string);

        return $escaped_string;
    }

    public function insert_id()
    {
            return mysqli_insert_id($this->connection);
        }
}

$database = new Database();



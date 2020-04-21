<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS', '');
define('DB','btc3205');

class DBConnector{
    public $connection;
    
    function __constructor(){
        $connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
          mysqli_select_db($this->connection,DB) ;
    }
    public function closeDatabase(){
        mysqli_close($this->connection);
    }
}
 

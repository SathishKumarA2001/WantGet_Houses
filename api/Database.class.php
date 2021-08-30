<?php

class Database {

    public function __construct(){
        $servername = 'localhost';
        $username = 'che';
        $password = 'che';
        $db_name = 'wantget_houses';
        // Create connection
        $conn = new mysqli($servername, $username, $password,$db_name);
        $this->conn = $conn;
        // Check connection
        if ($this->conn->connect_error) {
            http_response_code(500);
            die("Connection failed: " . $this->conn->connect_error);
        }else{
            //print("connection success");
            return $this->conn;
        }
    }

    public function query($query){
        return $this->conn->query($query);
    }

    public function conn_error(){
        return $this->conn->error;
    }
    
    public function fetch_all($result){ 
        $result = $this->mysqli_all($result);
        return $result;
    }
    
}
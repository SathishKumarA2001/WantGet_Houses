<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');
// seperate Rent House Database
// separate Sell House Database

// Get all houses data's 
class GetHouse {
    public function __construct(){
        $conn = new Database();
        $this->conn = $conn;
    }

    public function get_Houses(){
        $query = "select * from house_architecture";
        $result = $this->conn->query($query);
        if($result){
            $result = $result->fetch_all();
            return $result;
        }else{
            return "Error".$this->conn->conn_error();
        }
    }
}
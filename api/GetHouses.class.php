<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

// Get all houses data's 
class GetHouse {
    public function __construct(){
        $conn = new Database();
        $this->conn = $conn;
    }

    public function get_Houses(){
        //Query - This query select's all rows in both tables.
        $query = "select * from rent_houses union select * FROM sell_houses;";
        $result = $this->conn->query($query);
        if($result){
            $result = $result->fetch_all();
            return $result;
        }else{
            return "Error".$this->conn->conn_error();
        }
    }

    public function get_one_house($RentorSell,$house_id){
        //Query- This query's select's the particular rows in both tables using house_id,Rentorsell.
        if($RentorSell == "Rent"){
            $query = "select * from rent_houses where house_id=$house_id";
            $result = $this->conn->query($query);
            if($result){
                $result = $result->fetch_all();
                return $result;
            }else{
                return "Error".$this->conn->conn_error();
            }
        }else{
            $query = "select * from sell_houses where house_id=$house_id";
            $result = $this->conn->query($query);
            if($result){
                $result = $result->fetch_all();
                return $result;
            }else{
                return "Error".$this->conn->conn_error();
            }
        }
    }
}
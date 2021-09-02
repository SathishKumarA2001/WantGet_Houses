<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

// Get all houses data's 
class AlterHouse {
    public function __construct(){
        $conn = new Database();
        $this->conn = $conn;
    }

    public function delete_house($RentorSell,$house_id){
        $result = 1;
        if($RentorSell == 'Rent'){
            $query = "DELETE rent_houses, images FROM rent_houses  
            INNER JOIN images ON rent_houses.image_id=images.image_id   
            WHERE rent_houses.House_id = '$house_id';";
            $result = $this->conn->query($query);
        }else if($RentorSell == 'Sell'){
            $query = "DELETE sell_houses, images FROM sell_houses  
            INNER JOIN images ON sell_houses.image_id=images.image_id   
            WHERE sell_houses.House_id = '$house_id';";
            $result = $this->conn->query($query);
        }
        if($result){
            return $result;
        }else{
            return "Error :".$this->conn->conn_error();
        }
    }
}
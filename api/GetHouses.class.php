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
        //Query - This query select's all rows in both tables using full joins.
        $query = "SELECT * FROM rent_houses UNION SELECT * FROM sell_houses ;";
        $result = $this->conn->query($query);
        if($result){
            $result = $result->fetch_all();
            return $result;
        }else{
            return "Error".$this->conn->conn_error();
        }
    }

    public function get_rent_houses(){
        //Query - This query select's all rows in both tables using full joins.
        $query = "SELECT * FROM rent_houses LEFT JOIN images
        ON rent_houses.image_id = images.image_id;";
        $result = $this->conn->query($query);
        if($result){
            $result = $result->fetch_all();
            $result = [
                "House_id" => $result[0][0],
                "image_id" => $result[0][1],
                "Facilities" => $result[0][2],
                "Area" => $result[0][3],
                "Price" => $result[0][4],
                "BuildedMaterial" => $result[0][5],
                "CeilingMaterial" => $result[0][6],
                "WaterFacility" => $result[0][7],
                "HouseAddress" => $result[0][8],
                "RentorSell" => $result[0][9],
                "contact" => $result[0][10],
                "pic1" => $result[0][14],
                "pic2" => $result[0][15],
            ];
            return $result;
        }else{
            return "Error".$this->conn->conn_error();
        }
    }

    public function get_sell_houses(){
        //Query - This query select's all rows in both tables using full joins.
        $query = "SELECT * FROM sell_houses LEFT JOIN images 
        ON sell_houses.image_id = images.image_id;";
        $result = $this->conn->query($query);
        if($result){
            $result = $result->fetch_all();
            $result = [
                "House_id" => $result[0][0],
                "image_id" => $result[0][1],
                "Facilities" => $result[0][2],
                "Area" => $result[0][3],
                "Price" => $result[0][4],
                "BuildedMaterial" => $result[0][5],
                "CeilingMaterial" => $result[0][6],
                "WaterFacility" => $result[0][7],
                "HouseAddress" => $result[0][8],
                "RentorSell" => $result[0][9],
                "contact" => $result[0][10],
                "pic1" => $result[0][14],
                "pic2" => $result[0][15],
            ];
            return $result;
        }else{
            return "Error".$this->conn->conn_error();
        }
    }

    public function get_one_house($RentorSell,$house_id){
        //Query- This query's select's particular rows in one table and using Left join it get take one row in another table.
        if($RentorSell == "Rent"){
            $query = "SELECT * FROM rent_houses LEFT JOIN images 
                    ON rent_houses.image_id = images.image_id where rent_houses.house_id=$house_id;";
            $result = $this->conn->query($query);
            if($result){
                $result = $result->fetch_all();
                return $result;
            }else{
                return "Error".$this->conn->conn_error();
            }
        }else{
            $query = "SELECT * FROM sell_houses LEFT JOIN images 
            ON sell_houses.image_id = images.image_id where sell_houses.house_id=$house_id;";
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
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/SetHouse.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

// Get all houses data's 
class AlterHouse extends House{
    public function __construct($Facilities,$Area,$Price,$BuildedMaterial,$CeilingMaterial,$WaterFacility,$HouseAddress,$RentorSell,$Contact,$House_id,$image_id){
        parent::__construct($Facilities,$Area,$Price,$BuildedMaterial,$CeilingMaterial,$WaterFacility,$HouseAddress,$RentorSell,$Contact,$image_id);
        $conn = new Database();
        $this->conn = $conn;
        $this->house_id = $House_id;
        $this->image_id = $image_id;
    }

    public function delete_house(){
        $result = 1;
        if($this->RentorSell == 'Rent'){
            $query = "DELETE rent_houses, images FROM rent_houses  
            INNER JOIN images ON rent_houses.image_id=images.image_id   
            WHERE rent_houses.House_id = '$this->house_id';";
            $result = $this->conn->query($query);
        }else if($this->RentorSell == 'Sell'){
            $query = "DELETE sell_houses, images FROM sell_houses  
            INNER JOIN images ON sell_houses.image_id=images.image_id   
            WHERE sell_houses.House_id = '$this->house_id';";
            $result = $this->conn->query($query);
        }
        if($result){
            return $result;
        }else{
            return "Error :".$this->conn->conn_error();
        }
    }

    public function update_house(){
        $result = 0;
        if($this->image_id == 0){ //If image input is empty it gets the old one from database;
            $query = "SELECT image_id from rent_houses where House_id = '$this->house_id';";
            $result = $this->conn->query($query);
            $row = mysqli_fetch_assoc($result);
            $this->image_id = $row["image_id"];
        }
        if($this->RentorSell == 'Rent'){
            $query = "UPDATE rent_houses SET image_id='$this->image_id',Facilities='$this->Facilities',Area='$this->Area',Price='$this->Price',
            BuildedMaterial='$this->BuildedMaterial',CeilingMaterial='$this->CeilingMaterial',WaterFacility='$this->WaterFacility',
            HouseAddress='$this->HouseAddress',Contact='$this->Contact'
            WHERE House_id = '$this->house_id';";
            $result = $this->conn->query($query);
        }else if($this->RentorSell == 'Sell'){
            $query = "UPDATE sell_houses SET image_id='$this->image_id',Facilities='$this->Facilities',Area='$this->Area',Price='$this->Price',
            BuildedMaterial='$this->BuildedMaterial',CeilingMaterial='$this->CeilingMaterial',WaterFacility='$this->WaterFacility',
            HouseAddress='$this->HouseAddress',Contact='$this->Contact'
            WHERE House_id = '$this->house_id';";
            $result = $this->conn->query($query);
        }
        if($result){
            return $result;
        }else{
            return "Error :".$this->conn->conn_error();
        }
    }
}
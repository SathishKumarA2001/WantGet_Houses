<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

class House {
    public function __construct($Facilities,$Area,$Price,$BuildedMaterial,$CeilingMaterial,$WaterFacility,$HouseAddress,$RentorSell,$Contact,$image_id){
        $this->Facilities = $Facilities;
        $this->Area = $Area;
        $this->Price = $Price;
        $this->BuildedMaterial = $BuildedMaterial;
        $this->CeilingMaterial = $CeilingMaterial;
        $this->WaterFacility = $WaterFacility;
        $this->HouseAddress = $HouseAddress;
        $this->RentorSell = $RentorSell;
        $this->Contact = $Contact;
        $this->image_id = $image_id;
        $conn = new Database();
        $this->conn = $conn;
    }

    // Register the House data in DB
    public function register_DB(){
        // If House is Sell it will save in sell_houses database
        if($this->RentorSell == "Sell"){
            $House_id = uniqid();
            $query = "Insert into sell_houses(House_id,Facilities,Area,Price,BuildedMaterial,CeilingMaterial,WaterFacility,HouseAddress,RentorSell,Contact,image_id)
                 values('$House_id','$this->Facilities','$this->Area','$this->Price','$this->BuildedMaterial','$this->CeilingMaterial','$this->WaterFacility',
                 '$this->HouseAddress','$this->RentorSell','$this->Contact','$this->image_id');";
        $result = $this->conn->query($query);
        if($result){
            $query = "SELECT House_id,RentorSell FROM sell_houses where House_id='$House_id';";
            $House_id = $this->conn->query($query);
            $row = mysqli_fetch_assoc($House_id);
            return $row;
        }else{
            return "Error".$this->conn->conn_error();
        }
        }
        //If House is Rent it will save in rent_houses database
        else if($this->RentorSell == "Rent"){
            $House_id = uniqid();
            $query = "Insert into rent_houses(House_id,Facilities,Area,Price,BuildedMaterial,CeilingMaterial,WaterFacility,HouseAddress,RentorSell,Contact,image_id)
                      values('$House_id','$this->Facilities','$this->Area','$this->Price','$this->BuildedMaterial','$this->CeilingMaterial','$this->WaterFacility',
                     '$this->HouseAddress','$this->RentorSell','$this->Contact','$this->image_id');";
            $result = $this->conn->query($query);
            if($result){
                $query = "SELECT House_id,RentorSell FROM rent_houses where House_id='$House_id';";
                $House_id = $this->conn->query($query);
                $row = mysqli_fetch_assoc($House_id);
                return $row;
            }else{
                return "Error".$this->conn->conn_error();
            }
        } 
        else{
            return "Wrong Input";
        }
    }

}
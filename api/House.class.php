<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

class House {
    public function __construct($Facilities,$Area,$Price,$BuildedMaterial,$CeilingMaterial,$WaterFacility,$HouseAddress,$RentorSell,$Contact){
        $this->Facilities = $Facilities;
        $this->Area = $Area;
        $this->Price = $Price;
        $this->BuildedMaterial = $BuildedMaterial;
        $this->CeilingMaterial = $CeilingMaterial;
        $this->WaterFacility = $WaterFacility;
        $this->HouseAddress = $HouseAddress;
        $this->RentorSell = $RentorSell;
        $this->Contact = $Contact;
        $conn = new Database();
        $this->conn = $conn;
    }

    // Register the House data in DB
    public function register_DB(){
        $query = "Insert into house_architecture(Facilities,Area,Price,BuildedMaterial,CeilingMaterial,WaterFacility,HouseAddress,RentorSell,Contact)
                 values('$this->Facilities','$this->Area','$this->Price','$this->BuildedMaterial','$this->CeilingMaterial','$this->WaterFacility',
                 '$this->HouseAddress','$this->RentorSell','$this->Contact')";
        $result = $this->conn->query($query);
        if($result){
            return "Registered Successfully";
        }else{
            return "Error".$this->conn->conn_error();
        }
    }

}
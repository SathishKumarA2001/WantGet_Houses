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
        $query1 = "SELECT * FROM rent_houses LEFT JOIN images
        ON rent_houses.image_id = images.image_id;";
        $query2 = "SELECT * FROM sell_houses LEFT JOIN images 
        ON sell_houses.image_id = images.image_id;";
        $result = array();
        $result1 = $this->conn->query($query1);
        $result2 = $this->conn->query($query2);
        if($result1 and $result2){
            $result1 = $result1->fetch_all();
            $result2 = $result2->fetch_all();
            array_push($result,$result1);
            array_push($result,$result2);
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
            return $result;
        }else{
            return "Error".$this->conn->conn_error();
        }
    }

    public function get_one_house($house_id,$RentorSell){
        //Query- This query's select's particular rows in one table and using Left join it get take one row in another table.
        if($RentorSell == "Rent"){
            $query = "SELECT * FROM rent_houses LEFT JOIN images 
                    ON rent_houses.image_id = images.image_id where rent_houses.House_id='$house_id';";
            $result = $this->conn->query($query);
            if($result){
                return $result;
            }else{
                return "Error".$this->conn->conn_error();
            }
        }else{
            $query = "SELECT * FROM sell_houses LEFT JOIN images 
            ON sell_houses.image_id = images.image_id where sell_houses.House_id='$house_id';";
            $result = $this->conn->query($query);
            if($result){
                return $result;
            }else{
                return "Error".$this->conn->conn_error();
            }
        }
    }

    public function get_rent_Filter($RentorSell,$Filter,$Area_min,$Area_max,$Price_min,$Price_max,$Water_min,$Water_max){
        $result = 0;
        if($RentorSell == 'Rent'){
            $RentorSell = 'rent_houses';
        }else{
            $RentorSell = 'sell_houses';
        }
        if(isset($Filter['Facilities']) and isset($Filter['District']) and isset($Filter['City']) and isset($Filter['HouseAddress'])){                
        $FacilityFilter = $Filter['Facilities'];
        $DistrictFilter = $Filter['District'];
        $CityFilter = $Filter['City'];
        $HouseFilter = $Filter['HouseAddress'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images
            ON $RentorSell.image_id = images.image_id where $RentorSell.Facilities like '$FacilityFilter%'
            and $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
            and $RentorSell.District = '$DistrictFilter' and $RentorSell.City = '$CityFilter'and $RentorSell.HouseAddress = '$HouseFilter'
            and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['Facilities']) and isset($Filter['District']) and isset($Filter['City'])){
            $FacilityFilter = $Filter['Facilities'];
            $DistrictFilter = $Filter['District'];
            $CityFilter = $Filter['City'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images
            ON $RentorSell.image_id = images.image_id where $RentorSell.Facilities like '$FacilityFilter%'
            and $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
            and $RentorSell.District = '$DistrictFilter' and $RentorSell.City = '$CityFilter'and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['Facilities']) and isset($Filter['District'])){
            $FacilityFilter = $Filter['Facilities'];
            $DistrictFilter = $Filter['District'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images
            ON $RentorSell.image_id = images.image_id where $RentorSell.Facilities like '$FacilityFilter%'
            and $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
            and $RentorSell.District = '$DistrictFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['Facilities']) and isset($Filter['City'])){
            $FacilityFilter = $Filter['Facilities'];
            $CityFilter = $Filter['City'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images
            ON $RentorSell.image_id = images.image_id where $RentorSell.Facilities like '$FacilityFilter%'
            and $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
            and $RentorSell.City = '$CityFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['Facilities']) and isset($Filter['HouseAddress'])){
            $FacilityFilter = $Filter['Facilities'];
            $HouseFilter = $Filter['HouseAddress'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images
            ON $RentorSell.image_id = images.image_id where $RentorSell.Facilities like '$FacilityFilter%'
            and $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
            and $RentorSell.HouseAddress = '$HouseFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['Facilities'])){
            $FacilityFilter = $Filter['Facilities'];
            $query = "SELECT * FROM $RentorSell LEFT JOIN images
            ON $RentorSell.image_id = images.image_id where $RentorSell.Facilities like '$FacilityFilter%'
            and $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
            and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['District']) and isset($Filter['City'])){
            $DistrictFilter = $Filter['District'];
            $CityFilter = $Filter['City'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images ON $RentorSell.image_id = images.image_id 
                where $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
                and $RentorSell.District = '$DistrictFilter' and $RentorSell.City = '$CityFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['District']) and isset($Filter['HouseAddress'])){
            $DistrictFilter = $Filter['District'];
            $HouseFilter = $Filter['HouseAddress'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images ON $RentorSell.image_id = images.image_id 
                where $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
                and $RentorSell.District = '$DistrictFilter' and $RentorSell.HouseAddress = '$HouseFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['District'])){
            $DistrictFilter = $Filter['District'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images ON $RentorSell.image_id = images.image_id 
                where $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
                and $RentorSell.District = '$DistrictFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['City']) and isset($Filter['HouseAddress'])){
            $HouseFilter = $Filter['HouseAddress'];
            $CityFilter = $Filter['City'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images ON $RentorSell.image_id = images.image_id 
                where $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
                and $RentorSell.City = '$CityFilter' and $RentorSell.HouseAddress = '$HouseFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['City'])){
            $CityFilter = $Filter['City'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images ON $RentorSell.image_id = images.image_id 
                where $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
                and $RentorSell.City = '$CityFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else if (isset($Filter['HouseAddress'])){
            $HouseFilter = $Filter['HouseAddress'];
        $query = "SELECT * FROM $RentorSell LEFT JOIN images ON $RentorSell.image_id = images.image_id 
                where $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
                and $RentorSell.HouseAddress = '$HouseFilter' and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }else{
        $query = "SELECT * FROM $RentorSell LEFT JOIN images ON $RentorSell.image_id = images.image_id 
                where $RentorSell.Area BETWEEN $Area_min AND $Area_max and $RentorSell.Price BETWEEN $Price_min AND $Price_max
                and $RentorSell.WaterFacility BETWEEN $Water_min AND $Water_max;";
            $result = $this->conn->query($query);
        }
        if($result){
            $array = array();
            while($row = mysqli_fetch_assoc($result)){
                $array[] = $row;
            }
            return $array;
        }else{
            return "Error".$this->conn->conn_error();
        }
    }
}
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

function get_one_house($House_id,$RentorSell){
    if($House_id != NULL && $RentorSell != NULL){
        $data = array($House_id,$RentorSell);
        $value = array();
        foreach($data as $data){
            $data = filter_var($data, FILTER_SANITIZE_STRING); //Sanitize and Filtering data
            array_push($value,$data);
        }
        $house = new GetHouse();
        $result = $house->get_one_house($value[0],$value[1]);
        $result = [
            "House_id" => array_column($result, '0'),
            "image_id" => array_column($result, '1'),
            "Facilities" => array_column($result, '2'),
            "Area" => array_column($result, '3'),
            "Price" => array_column($result, '4'),
            "BuildedMaterial" => array_column($result, '5'),
            "CeilingMaterial" => array_column($result, '6'),
            "WaterFacility" => array_column($result, '7'),
            "HouseAddress" => array_column($result, '8'),
            "RentorSell" => array_column($result, '9'),
            "Contact" => array_column($result, '10'),
            "Pic1" => array_column($result, '14'),
            "Pic2" => array_column($result, '15'), 
        ]; 
        if($result == 0){
            return 0;
        }else{
            return $result;
        }
        $data = [
            "result" => $result,
        ];
        $data = json($data);
        //response($data,200);
    }
}

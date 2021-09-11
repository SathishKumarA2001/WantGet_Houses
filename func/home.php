<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

function get_houses($method,$post) {
    //If POST is empty it gets all tables 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
        $house = new GetHouse();
        $result = $house->get_Houses();
        $data = [
            "result" => $result,
        ];
        $data = json($data);
        //response($data,200);
        return $result;
    }

    //If POST is not empty it will select One of the table based on the Input
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
        $house = new GetHouse();
        if($_POST['RentorSell'] == 'Rent'){ //Select Rent Houses
            $result = $house->get_rent_Houses();
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
                "contact" => array_column($result, '10'),
                "pic1" => array_column($result, '14'),
                "pic2" => array_column($result, '15'), 
            ]; 
            $data = [
                "result" => $result,
            ];
        }else if($_POST['RentorSell'] == 'Sell'){ //Select Sell Houses
            $result = $house->get_sell_Houses();
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
                "contact" => array_column($result, '10'),
                "pic1" => array_column($result, '14'),
                "pic2" => array_column($result, '15'), 
            ]; 
            $data = [
                "result" => $result,
            ];
        }else{
            $data = [
                "result" => "Wrong Input"
            ];
        }
        $data = json($data);
        //response($data,200);
        return $result;
    }
}

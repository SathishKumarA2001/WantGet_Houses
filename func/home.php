<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

//If POST is empty it gets all tables 
if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
    $house = new GetHouse();
    $result = $house->get_Houses();
    $data = [
        "result" => $result,
    ];
    $data = json($data);
    response($data,200);
}
//If POST is not empty it will select One of the table based on the Input
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
    $house = new GetHouse();
    if($_POST['RentorSell'] == 'Rent'){ //Select Rent Houses
        $result = $house->get_rent_Houses();
        $data = [
            "result" => $result,
        ];
    }else if($_POST['RentorSell'] == 'Sell'){ //Select Sell Houses
        $result = $house->get_sell_Houses();
        $data = [
            "result" => $result,
        ];
    }else{
        $data = [
            "result" => "Wrong Input"
        ];
    }
    $data = json($data);
    response($data,200);
}
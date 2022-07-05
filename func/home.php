<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

function get_houses($post) {
    //If POST is empty it gets all tables 
    //if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
    if(!empty($post) and empty($post)){
        $house = new GetHouse();
        $result = get_houses();
    }
    //If POST is not empty it will select One of the table based on the Input
    if(!empty($post)){
        $house = new GetHouse();
        if($post == 'Rent'){ //Select Rent Houses
            $result = $house->get_rent_Houses();
            while($row = mysqli_fetch_assoc($result)){
                $array[] = $row;
            }
        }else if($post == 'Sell'){ //Select Sell Houses
            $result = $house->get_sell_Houses();
            while($row = mysqli_fetch_assoc($result)){
                $array[] = $row;
            }
        }
        return $array;
    }
}
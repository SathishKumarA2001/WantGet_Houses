<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Filter = array();
    $RentorSell = NULL;
    if(isset($_POST['RentorSell'])){
      $RentorSell = $_POST['RentorSell'];
    }
    if(isset($_REQUEST['Facilities']) and $_REQUEST['Facilities'] != NULL){
    $Filter['Facilities'] = $_REQUEST['Facilities'];
    }
    if(isset($_REQUEST['District']) and $_REQUEST['District'] != NULL){
    $Filter['District'] = $_REQUEST['District'];
    }
    if(isset($_REQUEST['City']) and $_REQUEST['City'] != NULL){
    $Filter['City'] = $_REQUEST['City'];
    }
    if(isset($_REQUEST['HouseAddress']) and $_REQUEST['HouseAddress'] != NULL){
    $Filter['HouseAddress'] = $_REQUEST['HouseAddress'];
    }
    if(isset($_REQUEST['Price_min']) and $_REQUEST['Price_min'] != NULL){
      $Price_min = $_REQUEST['Price_min'];
    }else{
      $Price_min = 500;
    }
    if(isset($_REQUEST['Price_max']) and $_REQUEST['Price_max'] != NULL){
      $Price_max = $_REQUEST['Price_max'];
    }else{
      $Price_max = 8000000;
    }
    
    if(isset($_REQUEST['Area_min']) and $_REQUEST['Area_min'] != NULL){
      $Area_min = $_REQUEST['Area_min'];
    }else{
      $Area_min = 10;
    }
    if(isset($_REQUEST['Area_max']) and $_REQUEST['Area_max'] != NULL){
      $Area_max = $_REQUEST['Area_max'];
    }else{
      $Area_max = 8000000;
    }

    if(isset($_REQUEST['Water_min']) and $_REQUEST['Water_min'] != NULL){
      $Water_min = $_REQUEST['Water_min'];
    }else{
      $Water_min = 1;
    }
    if(isset($_REQUEST['Water_max']) and $_REQUEST['Water_max'] != NULL){
      $Water_max = $_REQUEST['Water_max'];
    }else{
      $Water_max = 25;
    }
    $GLOBALS['filter'] = 1;
    $get_houses = filter($RentorSell,$Filter,$Area_min,$Area_max,$Price_min,$Price_max,$Water_min,$Water_max);
    $_SESSION['get_houses'] = $get_houses;
    header("Location:../FrontEnd/House.php?type=$RentorSell&filter");
}

function filter($RentorSell,$Filter,$Area_min,$Area_max,$Price_min,$Price_max,$Water_min,$Water_max){   
    $house = new GetHouse();
    $result = $house->get_rent_Filter($RentorSell,$Filter,$Area_min,$Area_max,$Price_min,$Price_max,$Water_min,$Water_max);
    return $result;
}

/*
$Filter = array();
$Area_min = 10;
$Area_max = 100000;
$Price_min = 500;
$Price_max = 800000;
$Water_min = 1;
$Water_max = 25;
$RentorSell = 'Rent';

filter($RentorSell,$Filter,$Area_min,$Area_max,$Price_min,$Price_max,$Water_min,$Water_max);
*/
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/AlterHouse.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/image.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['House_id'] && $_POST['submit']){
    $data = array('Facilities','Area','Price','District','City','WaterFacility',
    'HouseAddress','RentorSell','Contact','House_id');
    foreach($data as $data){
        $_POST[$data] = filter_var($_POST[$data], FILTER_SANITIZE_STRING); //Sanitize and Filtering data
    }
    $image_id = upload();
    $house = new AlterHouse($_POST['Facilities'],$_POST['Area'],
    $_POST['Price'],$_POST['District'],$_POST['City'],
    $_POST['WaterFacility'],$_POST['HouseAddress'],$_POST['RentorSell'],$_POST['Contact'],$_POST['House_id'],$image_id);
    $result = $house->update_house();
    header("Location:./../FrontEnd/Dashboard.php?msg=$result");
}
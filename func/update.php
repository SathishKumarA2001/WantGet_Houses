<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/AlterHouse.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/image.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['House_id'] && $_POST['submit']){
    $data = array('Facilities','Area','Price','BuildedMaterial','CeilingMaterial','WaterFacility',
    'HouseAddress','RentorSell','Contact','House_id');
    foreach($data as $data){
        $_POST[$data] = filter_var($_POST[$data], FILTER_SANITIZE_STRING); //Sanitize and Filtering data
    }
    $image_id = upload();
    $house = new AlterHouse($_POST['Facilities'],$_POST['Area'],
    $_POST['Price'],$_POST['BuildedMaterial'],$_POST['CeilingMaterial'],
    $_POST['WaterFacility'],$_POST['HouseAddress'],$_POST['RentorSell'],$_POST['Contact'],$_POST['House_id'],$image_id);
    $result = $house->update_house();
    $data = [
        "result" => $result,
    ];
    //$data = json($data);
    //response($data,200);
    header("Location:./../FrontEnd/Dashboard.php?msg=$result");
}
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['House_id'] != NULL && $_POST['RentorSell'] != NULL){
    $data = array('House_id','RentorSell');
    foreach($data as $data){
        $_POST[$data] = filter_var($_POST[$data], FILTER_SANITIZE_STRING); //Sanitize and Filtering data
    }
    $house = new GetHouse();
    $result = $house->get_one_house($_POST['RentorSell'],$_POST['House_id']);
    $data = [
        "result" => $result,
    ];
    $data = json($data);
    response($data,200);
}
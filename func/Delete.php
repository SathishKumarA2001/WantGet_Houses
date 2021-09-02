<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/AlterHouse.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['House_id'] && $_POST['RentorSell']){
    $data = array('House_id','RentorSell');
    foreach($data as $data){
        $_POST[$data] = filter_var($_POST[$data], FILTER_SANITIZE_STRING); //Sanitize and Filtering data
    }
    $house = new AlterHouse();
    $result = $house->delete_house($_POST['RentorSell'],$_POST['House_id']);
    $data = [
        "result" => $result,
    ];
    $data = json($data);
    response($data,200);
}
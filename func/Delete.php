<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/AlterHouse.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['House_id'] && $_POST['RentorSell']){
    $data = array($_POST['RentorSell'],$_POST['House_id']);
    $value = array();
    foreach($data as $data){
        $data = filter_var($data, FILTER_SANITIZE_STRING); //Sanitize and Filtering data
        array_push($value,$data);
    }
    $result = AlterHouse::delete_house($value[0],$value[1]);
    if($result){
        header("Location: ./../FrontEnd/Dashboard.php?delmsg=success");
    }else{
        header("Location: ./../FrontEnd/Dashboard.php?delmsg=failure");
    }
}
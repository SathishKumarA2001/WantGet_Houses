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
        $result = mysqli_fetch_assoc($result);
        if($result){
            return $result;
        }
    }
}

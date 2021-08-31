<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/House.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = array('Facilities','Area','Price','BuildedMaterial','CeilingMaterial','WaterFacility','HouseAddress','RentorSell','Contact');
    $error = false;
    // Check data is empty or not
    foreach($data as $data){
            $_POST[$data] = filter_var($_POST[$data], FILTER_SANITIZE_STRING); //Sanitize and Filtering data
        if(empty($_POST[$data])){
            $error = true;
            if($error == true){
                $data = [
                    "error" => "fill all rows"
                ];
                $data = json($data);
                response($data,403);
                die("die");
            }
        }
    }
    if($error == false){
        $house = new House($_POST['Facilities'],$_POST['Area'],$_POST['Price'],$_POST['BuildedMaterial'],$_POST['CeilingMaterial'],$_POST['WaterFacility'],$_POST['HouseAddress'],$_POST['RentorSell'],$_POST['Contact']);
        $result = $house->register_db(); //Register the data of house after filtering by passing register_db() function in house class
        $data = [
            "result" => "$result",
        ];
        $data = json($data);
        response($data,200);
    }
}else{
    $data = [
        "error" => "POST"
    ];
    $data = json($data);
    response($data,403);
}
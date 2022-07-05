<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/SetHouse.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/Signin/auth.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/image.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' /*and $_POST['submit']*/){
    $data = array('Facilities','Area','Price','District','City','WaterFacility',
                    'HouseAddress','RentorSell','Contact');
    $value= array(); 
    $error = false;
    // Check data is empty or not
    foreach($data as $data){
        $_POST[$data] = filter_var($_POST[$data], FILTER_SANITIZE_STRING); //Sanitize and Filtering data
        array_push($value,$_POST[$data]);
        if(empty($_POST[$data])){
            $error = true;
            if($error == true){
                $data = [
                    "error" => "fill all rows"
                ];
                $data = json($data);
                //response($data,403);
                $data = 2;
                header("Location: ./../FrontEnd/Register.php?error=$data");
            }
        }
    }

    if($error == false){
        $image_id = upload(); // Upload the Pictures in Storage and get the path
        $house = new House($value[0],$value[1],$value[2],$value[3],$value[4],
                            $value[5],$value[6],$value[7],$value[8],$image_id);
        $result = $house->register_DB(); //Register the data of house after filtering by passing register_db() function in house class
        if($result){
            $result = update_House_id_Signup($result['House_id'],$result['RentorSell']);
            if($result){
                header("Location: ./../FrontEnd/Register.php?msg=".urlencode(1));
            }
        }
    }
}else{
    $data = [
        "error" => "POST"
    ];
    $data = json($data);
    //response($data,403);
    //$data=-1;
    //header("Location: ./../Register.php?error=$data");
}

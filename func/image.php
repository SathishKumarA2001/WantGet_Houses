<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');

function upload(){
    $file_dir = "../Images/";
    $pic = array(); 

    for($x=0;$x<2;$x++){
        $_FILES["House_pic"] = $_FILES["pic"];
        $file = $file_dir.basename($_FILES["House_pic"]["name"][$x]);

        //$file2 = $file_dir.basename($_FILES["pic2"]["name"]);
        $uploadOK = 1;
        $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        $conn = new Database();  //Database Connection

        if(!isset($_POST["submit"])){
            $check = getimagesize($_FILES["House_pic"]["tmp_name"]);
            if($check !== false){
                //echo "file is an image ".$check["mime"]." ";
            }else{
                //echo "file is not an image ";
            }
        }
        if(move_uploaded_file($_FILES["House_pic"]["tmp_name"][$x], $file)) {
            //echo "The file ". htmlspecialchars(basename( $_FILES["House_pic"]["name"])). " uploaded.";
            array_push($pic,$file);
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $image_id = rand(1111,9999);
        $query = "insert into images(image_id,pic1,pic2) values('$image_id','$pic[0]','$pic[1]');";
        $result = $conn->query($query);
        if($result){
            return $image_id;
        }else{
            return "Error in uploading Pictures : ".$conn->conn_error();
        }
}

/*
function delete_empired_images(){
    $conn = new Database();
    //This query selects image_id doesn't exist in both tables by checking both tables 
    $query = "SELECT images.image_id
    FROM images 
    INNER JOIN rent_houses
    ON images.image_id != rent_houses.image_id
    INNER JOIN sell_houses
    ON images.image_id != sell_houses.image_id;";

    $result = $conn->query($query);
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    for($i=0;$i<3;$i++){
        print_r($row[$i]);
    }
    die();
}

delete_empired_images();

*/



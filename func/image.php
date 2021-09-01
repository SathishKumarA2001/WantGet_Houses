<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');

function upload(){
    $file_dir = "../Images/";
    $file = $file_dir.basename($_FILES["House_pic"]["name"]);
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

    if(move_uploaded_file($_FILES["House_pic"]["tmp_name"], $file)) {
        echo "The file ". htmlspecialchars(basename( $_FILES["House_pic"]["name"])). " uploaded.";
        $image_id = rand(1111,9999);
        $query = "insert into images(image_id,pic1) values('$image_id','$file');";
        $result = $conn->query($query);
        if($result){
            return $image_id;
        }else{
            return $conn->conn_error();
        }
    }else{
        echo "Sorry, there was an error uploading your file.";
    }
}

/*
$query = "SELECT images.pic1
        FROM articles
        RIGHT JOIN images
        ON rent_houses.image_id = images.image_id
        ORDER BY rent_houses.image_id;";
*/
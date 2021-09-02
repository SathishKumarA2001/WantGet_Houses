<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');

function upload(){
    $file_dir = "../Images/";
    $pic = array();    
    for($x=1;$x<3;$x++){
        $_FILES["House_pic"] = $_FILES["pic".$x];
        
        $file = $file_dir.basename($_FILES["House_pic"]["name"]);
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
        if(move_uploaded_file($_FILES["House_pic"]["tmp_name"], $file)) {
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
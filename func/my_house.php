<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');

    function user_house_id($username,$password){
        $conn = new Database(); //Database Connection
        $query = "SELECT House_id,RentorSell from house_id where username='$username' and password='$password'";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
?>
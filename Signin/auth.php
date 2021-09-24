<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/Database.class.php');

    if(!empty($_POST["email"]) and !empty($_POST["password"])){
        if($_POST["submit"]){
            $conn = new Database(); //Database Connection
            $username = $_POST["email"];
            $password = $_POST["password"];
            $username = filter_var($password, FILTER_SANITIZE_STRING); //sanitize
            $password = filter_var($password, FILTER_SANITIZE_STRING); //sanitize

            if($_POST["type"] == 'signup'){
                $query = "INSERT INTO signup(username,password) values('$username','$password');";
                $result = $conn->query($query);
                if($result){
                    header("Location: ./Signin.php?msg=success");
                }else{
                    header("Location: ./Signin.php?msg=err");
                }
            }elseif($_POST["type"] == 'signin') {
                $query = "SELECT * from signup where username='$username' and password='$password';";
                $result = $conn->query($query);
                $result = $result->fetch_all();
                if($result){
                    // Set cookie and add seesion
                    $token = md5(time());
                    $query = "INSERT into session(username,password,token) values('$username','$password','$token');";
                    $result = $conn->query($query);
                    if($result){
                        setcookie('username',$username,time()+(7*24*60*60),"/");
                        setcookie('token',$token,time()+(7*24*60*60),"/");
                        header("Location: ../FrontEnd/Dashboard.php?msg=success");
                    }else{
                        return $result;
                    }
                } else {
                    header("Location: ./Signin.php?msg=err");
                }    
        }else{
            return 0;
        }
    }
}

function verify_session($username, $token){
    $conn = new Database(); //Database Connection
    $query = "SELECT * from session where username = '$username' and token = '$token';";
    $result = $conn->query($query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $time = strtotime($row['created']);
        if (time() <= $time+(7*24*60*60)) {
            return true;
        } else{
            return false;
        }
    }else{
        return $conn->conn_error();
    }
}

function update_House_id_Signup($House_id,$RentorSell){
    if(isset($_COOKIE['username']) and isset($_COOKIE['token'])){
        $token = $_COOKIE['token'];
        $conn = new Database(); //Database Connection
        $query = "SELECT * from session where token='$token';";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $password = $row['password'];
        //Insert House_id in signup query
        if($result){
            $query = "INSERT INTO house_id (House_id,RentorSell,username,password)
            VALUES ('$House_id','$RentorSell','$username','$password');";
            $result = $conn->query($query);
            return $result;
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}
?>
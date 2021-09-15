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
                    $query = "INSERT into session(username,token) values('$username','$token');";
                    $result = $conn->query($query);
                    if($result){
                        setcookie('username',$username,time()+(7*24*60*60));
                        setcookie('token',$token,time()+(7*24*60*60));
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
        return false;
    }
}


?>
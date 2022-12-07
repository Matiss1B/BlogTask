<?php
include "../../api/db.php";
session_start();
$sql = "SELECT * FROM users";
$test = null;
$id = "";
$pass = $_POST['pass'];
$username = $_POST['username'];
if(!empty($pass) && !empty($username)){
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $verify = $row['password'];
            if($username == $row['username'] && password_verify($pass, $verify)){
                $test = true;
                break;
            }else{
                $test = false;
            }   
        }
    }
    if($test == true){
        $sqlT = "SELECT * FROM users WHERE username='$username'";
        $resultT = $con->query($sqlT);
        if ($resultT->num_rows > 0) {
            while($rowT = $resultT->fetch_assoc()) {
                $id = $rowT['id'];
            }
        }else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        $_SESSION['id'] = $id;
        echo true;
    }else if ($test == false){
        echo "Pass or username is invalid";
    }
}else{
    echo "Please enter username and password";
}


?>
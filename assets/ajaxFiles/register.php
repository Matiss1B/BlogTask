<?php
include "../../api/db.php";
$username = $_POST['username'];
$password = $_POST['pass'];
$hashed = password_hash($password, PASSWORD_DEFAULT);
$confirm = $_POST['confirm'];
$test = null;
if(!empty($password) && !empty($username) && !empty($confirm)){
    if($password == $confirm){
        $sql = "SELECT * FROM users";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($username == $row['username']){
                    $test = false;
                }else{
                    $test = true;
                }   
            }
        }
        if($test == true ){
            $sql = "INSERT INTO users (username, password ) VALUES ( '$username', '$hashed')";
            if ($con->query($sql) === TRUE) {
                echo "User registered";
            } else {
                echo $con->error;
            }
        }else{
            echo "User already exist";
        }
    }else{
        echo"Passwords doesnt match";
    }
}else{
    echo "Please enter password and username";
}
<?php
$username = 'root';
$password = 'root';
$dbname = 'Blog';
$server = 'localhost';

$con = mysqli_connect($server, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
?>
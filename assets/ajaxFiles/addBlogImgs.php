<?php
session_start();
if(empty($_SESSION['id'])){
  $exsist = "false";
}else{
  $exsist = "true";
}
if($exsist == "true"){
  include "../../api/db.php";
  $mainImg = $_POST['main'];
  $imgs = $_POST['array'];
  $lenght = count($imgs);
  $userId = $_SESSION['id'];
  $blog_id = "";
  $sql = " SELECT * FROM blog ORDER BY id DESC LIMIT 1";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $blog_id = $row['id'];
    }
  }
  //echo $blog_id;
  $sql = $sql = "INSERT INTO img (img, is_main, blog_id)
  VALUES ('$mainImg', '1', '$blog_id')";
  if ($con->query($sql) === TRUE) {
    echo "Imgs added";
  } else {
    echo "Something went wrong!";
  }
  for($i=0;$i<$lenght;$i++){
    $sql = $sql = "INSERT INTO img (img, is_main, blog_id)
    VALUES ('$imgs[$i]', '0', '$blog_id')";
    if ($con->query($sql) === TRUE) {
    //echo $img{}
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }
}else{
  echo "Need to login";
}
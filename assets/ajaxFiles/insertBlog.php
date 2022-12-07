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
  $blog_id = "";
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $userId = $_SESSION['id'];
  if(!empty($mainImg) && !empty($imgs[0] && !empty($desc))){
    $sql = "INSERT INTO blog (title, description, user_id, likes)
    VALUES ('$title', '$desc', '$userId','0')";
    if ($con->query($sql) === TRUE) {
      echo "Blog and ";
    } else {
      echo "Something went wrong!";
    }
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
      echo "Imgs are added";
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
    echo "Please enter blog info and 1 img";
  }

}else{
  echo "Need to login";
}


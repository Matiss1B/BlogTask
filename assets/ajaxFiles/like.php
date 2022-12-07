<?php
include "../../api/db.php";
$user_id = $_POST['user_id'];
$blog_id = $_POST['blog_id'];
$likes = '';
$sqlL = "SELECT * FROM likes WHERE user_id = '$user_id'";
$resultL = $con->query($sqlL);
if ($resultL->num_rows > 0) {
  while($rowL = $resultL->fetch_assoc()) {
    $blog = $rowL['blog_id'];
  }
  if($blog == $blog_id){
    $test = "true";
    echo $test;
  }else{
    $sql = "INSERT INTO likes (user_id, blog_id)
    VALUES ('$user_id', '$blog_id')";
  
    if ($con->query($sql) === TRUE) {
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "SELECT likes FROM blog WHERE id='$blog_id' ";
    $result = $con->query($sql);
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $likes = $row['likes'];
      }
    } else {
      //echo "0 results";
    }
    $like = $likes+1;
    $sql = "UPDATE blog SET likes='$like' WHERE id='$blog_id'";
  
    if ($con->query($sql) === TRUE) {
      //echo "Record updated successfully";
    } else {
      //echo "Error updating record: " . $con->error;
    }
    echo $like;
  }
}else{
  $sql = "INSERT INTO likes (user_id, blog_id)
  VALUES ('$user_id', '$blog_id')";

  if ($con->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $sql = "SELECT likes FROM blog WHERE id='$blog_id' ";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $likes = $row['likes'];
    }
  } else {
    //echo "0 results";
  }
  $like = $likes+1;
  $sql = "UPDATE blog SET likes='$like' WHERE id='$blog_id'";

  if ($con->query($sql) === TRUE) {
    //echo "Record updated successfully";
  } else {
    //echo "Error updating record: " . $con->error;
  }
  echo $like;
}
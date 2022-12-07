<?php
include "../../api/db.php";
$blog_id = $_POST['blog_id'];
$user_id = $_POST['user_id'];
$comment = $_POST['comment'];
if(!empty($comment)){
  $sql  = "INSERT comments (comment, user_id, blog_id)
  VALUES ('$comment', '$user_id', '$blog_id')";

  if ($con->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $sql = " SELECT * FROM comments WHERE comment = '$comment' AND user_id = '$user_id'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $sqlCUser = "SELECT * FROM users WHERE id=".$user_id;
      $resultCUser = $con->query($sqlCUser);
  ?>
  <div class="singleComment flexColumn">
      <div class = "commentsUser">
          <img src="assets/img/iconUser.png" alt="nav" style="height:20px; width:20px;">
          <a><?php if ($resultCUser->num_rows > 0) {
                      while($rowC = $resultCUser->fetch_assoc()) {
                          echo $rowC['username'];
                      }
                  }   
              ?>
          </a>
          <a><?php echo date('M j Y g:i A', strtotime($row['timestamp']));?></a>
      </div>
      <?php echo $row['comment'];?>
  </div>
  <?php
    }
  }
}?>
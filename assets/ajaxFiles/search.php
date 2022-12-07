<?php
session_start();
include "../../api/db.php";
$session = $_SESSION['id'];
$blog_id = "";
$search = $_POST['search'];
$sql = "SELECT blog_id FROM likes WHERE user_id = '$session'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $blog_id = $row['blog_id'];
      if(empty($search)){
        $sqlBlog = "SELECT * FROM blog WHERE id = '$blog_id'";
        $test = "";
      }else{
        $sqlBlog = "SELECT * FROM blog WHERE id = '$blog_id' AND title LIKE '%$search%'";

      }
      $resultBlog = $con->query($sqlBlog);
      if ($resultBlog->num_rows > 0) {
        while($rowBlog = $resultBlog->fetch_assoc()) {
            $sqlImg = "SELECT * FROM img WHERE blog_id = '$blog_id' AND is_main = 1";
            $resultImg = $con->query($sqlImg);
            ?><div class="mini-blog-single-item alignCenter flexColumn gap1" onclick = "select(<?php echo $blog_id?>)">
                <h1><?php echo $rowBlog['title'];?></h1>
                <?php if ($resultImg->num_rows > 0) {
                    while($rowImg = $resultImg->fetch_assoc()) {
                        ?><img src="<?php echo $rowImg['img']?>"><?php
                    }
                }?>
            </div><?php
        }  
    }else{
        $test = "false";
    }
  }
}
echo $test;
?>
<?php
session_start();
include "../../api/db.php";
if(empty($_SESSION['id'])){
    $exsist = "false";
}else{
    $exsist = "true";
}
$i=0;
$a=1;
$b = 0;
$user = 0;
$sql = "SELECT img.img,img.idI, img.is_main, img.blog_id, blog.id, blog.likes,blog.timestamp, blog.title, blog.description, blog.user_id
FROM img
INNER JOIN blog ON img.blog_id = blog.id AND img.is_main = 1 ORDER BY blog.likes DESC LIMIT 20";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $BID = $row['id'];
        $sqlImg = "SELECT * FROM img WHERE blog_id=".$row['id'];
        $resultImg = $con->query($sqlImg);
        $sqlMain = "SELECT * FROM img WHERE blog_id=".$row['id']." AND is_main = 0";
        $resultMain = $con->query($sqlMain);
        $sqlUser = "SELECT * FROM users WHERE id=".$row['user_id'];
        $resultUser = $con->query($sqlUser);
        $sqlCom = "SELECT * FROM comments WHERE blog_id= '$BID'";
        $resultCom = $con->query($sqlCom);
        $sqlLike = "SELECT * FROM likes WHERE blog_id=".$row['id'];
        $resultLike = $con->query($sqlLike);
        $likes = mysqli_num_rows ($resultLike);
        if ($resultUser->num_rows > 0) {
            while($rowUser = $resultUser->fetch_assoc()) {
            $user = $rowUser['username'];
            }
        }
    $i++;
        ?><div class="blog flexColumn">
                    <div class="blogUser flex">
                        <img src="assets/img/iconUser.png" alt="nav" style="height:45px; width:45px;">
                        <p><?php echo $user;?></p>
                    </div>
                    <h2><?php echo $row['title'];?></h2>
                    <div class = "imgs flexColumn alignCenter">
                        <div class="mainPic-<?php echo $row['id']?> mainPic">
                        <img src="<?php echo $row['img'];?>" alt="" id = "img-<?php echo $row['idI'] ?>" class = "display">
                        <?php
                        if ($resultMain->num_rows > 0) {
                            while($rowMain = $resultMain->fetch_assoc()) {
                                $a++;
                                ?>
                                <img src="<?php echo $rowMain['img'];?>" alt="" id = "img-<?php echo $rowMain['idI'] ?>" class = "display none">
                            <?php }?>
                        <?php }?>
                        </div>
                        <div class="gallery scrollbox-x flex">
                            <?php if ($resultImg->num_rows > 0) {
                                while($rowImg = $resultImg->fetch_assoc()) {
                                    $b++;
                                    ?>
                                    <img src="<?php echo $rowImg['img'];?>" onclick = "img(<?php echo $rowImg['idI'];?>, <?php echo $row['id'];?>)">
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>
                    <div class="description">
                    <?php echo $row['description'];?>
                    </div>
                    <div class="comment flex wrap">
                        <div class = "comment-content flexColumn">
                            <h2>Comment</h2>
                            <div class = "flex gap1 wrap">
                                <input type="text" id = "comment-<?php echo $row['id'];?>">
                                <button class = "submit-comment" <?php if($exsist == "true"){?>onclick = "comment(<?php echo $row['id'] ?>,<?php echo $_SESSION['id']?>)"<?php }else{ ?>onclick= "loginMessage()"<?php }?>>Comment</buttom>
                                
                                
                                </div>
                        </div>
                        <div class = "flexColumn">
                            <i class="fa fa-heart-o" aria-hidden="true" <?php if($exsist == "true"){?>onclick = "like(<?php echo $row['id'] ?>,<?php echo $_SESSION['id']?>, <?php echo $likes ?>)"<?php }else{ ?>onclick= "loginMessage()"<?php }?>></i>
                            <div class="comentMes"></div>
                            <p class="likeNmb-<?php echo $row['id'];?>"> <?php echo $likes ?></p>
                        </div>
                    </div>
                    <p onclick = "comments(<?php echo $i;?>)" class = "more-comments-btn" id = "showComs">All comments</p>
                    <div class=" add-comment-<?php echo $row['id'];?> all-comments scrollbox-y" id ="comments-<?php echo $i;?>">
                    <?php  
                    if ($resultCom->num_rows > 0) {
                        while($rowCom = $resultCom->fetch_assoc()) {
                            $sqlCUser = "SELECT * FROM users WHERE id=".$rowCom['user_id'];
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
                                    <a><?php echo date('M j Y g:i A', strtotime($rowCom['timestamp']));?></a>
                                </div>
                                
                                <?php echo $rowCom['comment'];?>
                            </div>
                        <?php
                        }
                    } ?>
                    </div>
                    <p class = "hideBtn none" onclick = "commentsHide(<?php echo $i;?>)" id = "commentsHide-<?php echo $i;?>">Hide</p>
                </div><?php

         }
     }
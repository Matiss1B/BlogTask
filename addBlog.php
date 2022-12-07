<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBlog.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/test.css">
</head>
<body>
<div class="message" id = "addBlogM"></div>
<div class="message" id = "addImgM"></div>
    <header class = "header flex">  
        <img src="assets/img/Mlogo.png" alt="kkkkk" id = "home">
        <div class="content flex">
            <a class = "header-content" id="addBlog">+Blog</a>
            <a  class = "header-content"id = "liked">Liked</a>
            <a class = "header-content" id="mostPopularPage">Popular</a>
            <a class = "header-content" id="24hPage">24h</a>
            <a  class = "header-content"id = "signIn">Logout/Login</u></a>
        </div>
    </header>
</body>
<div class="main-div flexColumn alignCenter justifyCenter gap2 ">
    <h1>Add Blog</h1>
    <div class = "main-input-box flexColumn gap1">
        <div class="gap1 flex wrap">
            <input type="text" placeholder = "Title" id = "title" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')">
            <textarea type="text" placeholder = "Description" id = "desc"></textarea>
        </div>
        <div class = "inputImg flexColumn gap1">
            <div class="flex gap1">
                <input type="text" placeholder = "Main IMG" id = "mainImg">
                <div class="extraImg flexColumn">
                    <a id = "add">Add +</a>
                    <input type="text" placeholder = "Img" id = "img">
                </div>
            </div>
            <button class ="submit-comment" onclick = "insert()">Submit</button>
        </div>
    </div>
    
</div>
</div>
<script src = "assets/script.js"></script>
</html>
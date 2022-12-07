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
        <div class="message" id ="searchM"></div>
        <div class="search flex space-evenly wrap">
            <h1 class = "likedTitle">Liked blogs</h1>
            <div class = "flex alignCenter gap1">
                <input type="text" placeholder = "Search" id="blogSearch">
                <i class="fa fa-search" id ="serach" aria-hidden="true" onclick= "search()"></i>
            </div>
        </div>
        <div class = "mini-blog flex gap1 wrap">
        </div>
        <div class=" blog1 flexColumn alignCenter justifyCenter"></div>
</body>
<script src = "assets/script.js"></script>
</html>
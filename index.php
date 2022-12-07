<!DOCTYPE html>
<?php session_start(); ?>
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
            <a  class = "header-content"id = "signIn">Login</u></a>
            <a class = "header-content" href = "assets/ajaxFiles/logout.php">Logout</a>

        </div>
        <div class="needLogin" id = "needLogin"></div>
    </header>
    <section class="section1">
        <div class="section1-content flex">
            <h1>Mblog</h1>
        </div>
    </section>
    <section class="section2">
            <div class="section2-content flexColumn" id = "blogData">
                <h1>Blogs</h1>
            </div>
    </section>
</body>
<script src = "assets/script.js"></script>
</html>
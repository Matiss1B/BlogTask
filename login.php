<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBlog.com</title>
    <link rel="stylesheet" href="assets/test.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="message" id = "loginM"></div>
<div class="registerM" id = "registerM"></div>
    <div class="background">
                <div class="main-box flex">
                    <div class="second-box flexColumn"><a class = "blogTitle">Mblog</a><img src="assets/img/Mlogo.png" class = "k" alt="kkkkk"></div>
                    <div class="login-box flexColumn" id = "login">
                        <h1 class = "titleFont">Login</h1>
                        <div class="input-form flexColumn">
                            <div class = "input-container">
                                <i class="fa fa-user" id = "login-icon" aria-hidden="true"></i>
                                <input id = "username" type="text" placeholder = "Username" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')">
                            </div>
                            <div class = "input-container">
                            <i class="fa fa-lock" id = "login-icon" aria-hidden="true"></i>
                                <input id = "password" type="password" placeholder = "Password" required="required">
                            </div>
                            <button onclick = "login()" type = "submit" class = "login-btn">Login <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                            <a class = "login-switch" id = "registerBtn">Register</a>
                        </div>
                    </div>
                    <div class="login-box none gap2 flexColumn" id = "register">
                        <h1 class = "titleFont">Register</h1>
                        <div class="input-form flexColumn">
                            <div class = "input-container">
                                <i class="fa fa-user" id = "login-icon" aria-hidden="true"></i>
                                <input type="text" id = "registerUsername" placeholder = "Username" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')">
                            </div>
                            <div class = "input-container">
                            <i class="fa fa-lock" id = "login-icon" aria-hidden="true"></i>
                                <input type="password" id = "registerPassword" placeholder = "Password">
                            </div>
                            <div class = "input-container">
                            <i class="fa fa-check" id = "login-icon" aria-hidden="true"></i>
                                <input type="password" id = "registerConfirm" placeholder = "Confirm password">
                            </div>
                            <button onclick="register()" class = "login-btn">Register <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                            <a class = "login-switch" id = "loginBtn">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay hidden"></div>
    </div>
</body>
<script src = "assets/script.js"></script>
</html>
$(document).ready(function () {
  $("#registerBtn").click(function () {
    $("#login").addClass("none");
    $("#register").removeClass("none");
  });
  $("#loginBtn").click(function () {
    $("#register").addClass("none");
    $("#login").removeClass("none");
  });
  $("#liked").click(function () {
    window.location.href = "http://localhost:8888/blog/liked.php";
  });
  $("#signIn").click(function () {
    window.location.href = "http://localhost:8888/blog/login.php";
  });
  $("#addBlog").click(function () {
    window.location.href = "http://localhost:8888/blog/addBlog.php";
  });
  $("#24hPage").click(function () {
    window.location.href = "http://localhost:8888/blog/popular.php";
  });
  $("#mostPopularPage").click(function () {
    window.location.href = "http://localhost:8888/blog/mostPopular.php";
  });
  $("#home").click(function () {
    window.location.href = "http://localhost:8888/blog";
  });
  $("#logIn").click(function () {
    window.location.href = "http://localhost:8888/blog";
  });
  $(window).scroll(function () {
    $(".section1").css("opacity", 1 - $(window).scrollTop() / 600);
  });
});
function img(i, blog_id) {
  $(".mainPic-" + blog_id)
    .children()
    .css("display", "none");
  $("#img-" + i).css("display", "flex");
  $("#img-" + i).removeClass("none");
}

function comments(i) {
  $("#comments-" + i).slideDown("slow");
  $("#comments-" + i).css("display", "flex");
  $("#commentsHide-" + i).removeClass("none");
}
function commentsHide(i) {
  $("#comments-" + i).slideUp("slow");
  $("#commentsHide-" + i).addClass("none");
}
$("#showComs").click(function () {
  $("#showComs").addClass("none");
  $("#hideComs").removeClass("none");
});
$("#hideComs").click(function () {
  $("#hideComs").addClass("none");
  $("#showComs").removeClass("none");
});
var i = 2;
$("#add").click(function () {
  var field =
    '<input type="text" name = "imgs[]" placeholder = "Img" id = "img">';
  $(".extraImg").append(field);
  i++;
});
function loginMessage() {
  $("#needLogin").html("");
  $("#needLogin").append("Need to login");
  $("#needLogin").slideDown(500).fadeIn("slow").delay(1000).slideUp(500);
}
//Ajax
function register() {
  var pass = $("#registerPassword").val();
  var username = $("#registerUsername").val();
  var confirm = $("#registerConfirm").val();
  $.ajax({
    type: "POST",
    data: { pass: pass, username: username, confirm: confirm },
    url: "assets/ajaxFiles/register.php",
    success: function (data) {
      $("#registerM").html("");
      $("#registerM").append(data);
      $("#registerM").slideDown(500).fadeIn("slow").delay(1000).slideUp(500);
    },
  });
}
function login() {
  var pass = $("#password").val();
  var username = $("#username").val();
  $.ajax({
    type: "POST",
    data: { pass: pass, username: username },
    url: "assets/ajaxFiles/session.php",
    success: function (data) {
      $("#loginM").html("");
      $("#loginM").append(data);
      $("#loginM").slideDown(500).fadeIn("slow").delay(1000).slideUp(500);
      if (data == true) {
        window.location.href = "http://localhost:8888/blog";
      }
    },
  });
}
function insert() {
  var mainImg = $("#mainImg").val();
  var array = [];
  $(".extraImg")
    .children("#img")
    .each(function () {
      array.push($(this).val());
    });
  var title = $("#title").val();
  var desc = $("#desc").val();
  $.ajax({
    type: "POST",
    data: { title: title, desc: desc, main: mainImg, array: array },
    url: "assets/ajaxFiles/insertBlog.php",
    success: function (data) {
      $("#addBlogM").html("");
      $("#addBlogM").append(data);
      $("#addBlogM").slideDown(500).fadeIn("slow").delay(1000).slideUp(500);
      $("#title").val("");
      $("#desc").val("");
      $("#mainImg").val("");
      $(".extraImg")
        .children("#img")
        .each(function () {
          $(this).val("");
        });
    },
  });
}

c;
var l;
function like(blog_id, user_id, likes) {
  console.log("blog" + blog_id + " user" + user_id);
  var l = $(".likeNmb-" + blog_id).val();
  var sum = likes + 1;
  $.ajax({
    type: "POST",
    data: { blog_id: blog_id, user_id: user_id },
    url: "assets/ajaxFiles/like.php",
    success: function (data) {
      //alert(sum);
      if (data !== "true") {
        $(".likeNmb-" + blog_id).html("");
        $(".likeNmb-" + blog_id).append(data);
      }
    },
  });
}
function comment(blog_id, user_id) {
  var comment = $("#comment-" + blog_id).val();
  $.ajax({
    type: "POST",
    data: { blog_id: blog_id, user_id: user_id, comment: comment },
    url: "assets/ajaxFiles/comment.php",
    success: function (data) {
      $(".add-comment-" + blog_id).append(data);
    },
  });
}
$.ajax({
  type: "POST",
  url: "assets/ajaxFiles/likedPosts.php",
  success: function (data) {
    $("#popular24h").append(data);
  },
});
$.ajax({
  type: "POST",
  url: "assets/ajaxFiles/mostPopular.php",
  success: function (data) {
    $("#mostPopular").append(data);
  },
});
$.ajax({
  type: "POST",
  url: "assets/ajaxFiles/userLiked.php",
  success: function (data) {
    $(".mini-blog").append(data);
  },
});
function select(blog_id) {
  $.ajax({
    type: "POST",
    data: { blog_id: blog_id },
    url: "assets/ajaxFiles/selectedBlog.php",
    success: function (data) {
      $(".blog1").html("");
      $(".blog1").append(data);
    },
  });
}
function search() {
  var search = $("#blogSearch").val();
  $.ajax({
    type: "POST",
    data: { search: search },
    url: "assets/ajaxFiles/search.php",
    success: function (data) {
      if (data == "false") {
        $("#searchM").html("");
        $("#searchM").append("Cant find any blog");
        $("#searchM").slideDown(500).fadeIn("slow").delay(1000).slideUp(500);
      } else {
        $(".mini-blog").html("");
        $(".mini-blog").append(data);
      }
    },
  });
}

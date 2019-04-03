<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>PHP_Project</title>
    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./style/read_book.css">
    <link rel="stylesheet" href="./style/make_book.css">
    <?php require_once('./script/script.js'); ?>
  </head>
  <body>
    <header>
      <?php
        if(!isset($_SESSION['user_id'])){
          ?>
          <form action="./php/login.php" method="post">
            <input name="id" placeholder="id" required>
            <input type="password" name="pass" placeholder="password" reuqired>
            <button>로그인</button>
          </form>
          <?php
        }else{
          ?>
          <div><?=$_SESSION['user_id']?> 님 <a href="./php/logout.php">로그아웃</a></div>
          <?php
        }
      ?>
      <p><a href="./html/signup.html">회원가입</a></p>
    </header>
    <article>
      <?php require_once('./module/read_book.php'); ?>
      <?php require_once('./module/make_book.php'); ?>
    </article>
  </body>
</html>

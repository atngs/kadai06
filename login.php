<?php
session_start();
$default = $_SESSION['user_id'];
 ?>
 <?php
 setcookie('default_id',$default,time()+60*5);
  ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ログイン</title>
  </head>
  <body>
    <div class="">
      <form action="login_check.php" method="post">
        ログインID：<!--IDはクッキーで自動表示　cookie name cook_id-->
        <input type="text" name="input_id" value="<?php
         if (isset($_COOKIE['default_id'])) {
          echo $_COOKIE['default_id'];
        }?>">
        <br>
        パスワード：
        <input type="password" name="input_pass" value="">
        <br>
        <input type="submit" name="" value="ログイン">
      </form>
      <a href="./index.html">メニュー</a>
    </div>
  </body>
</html>

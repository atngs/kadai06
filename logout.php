<?php
//confirm_idを保存したuser_idセッションを削除
session_start();
unset($_SESSION['user_id']);

//default_idのクッキーを削除
setcookie('default_id','',time() - 1000);

//トップにリダイレクト
header("Location:index.html",true,301);
 ?>

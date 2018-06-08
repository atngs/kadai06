<?php
session_start();
$id = $_SESSION['user_id'];
?>
<!--ログインせずに直リンクした場合-->
<?php
if (empty($id)):
  echo <<< notlogin
  <!DOCTYPE html>
  <html lang="ja">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <h1>ログインしてください</h1>
      <ul>
        <li><a href="./login.php">ログイン</a></li>
        <li><a href="./index.html">メニュー</a></li>
      </ul>
    </body>
  </html>
notlogin;
else:
 ?>


<?php
// DB接続
function db(){
  // MySQLに必要なデ−タ
  $dsn = 'mysql:dbname=ph22_kadai06_ih12a335_25;host=localhost;charset=utf8;';
  $user = 'root';
  $password = '11922960';

  global $pdo;
  $pdo = new PDO($dsn,$user,$password);
}
db();
 ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ようこそ</title>
  </head>
  <body>
    <h1>ようこそ<?php if (isset($id)) {
      try {
        //sql実行
        $stmt = $pdo->query("SELECT name FROM accounts WHERE login_id = '{$id}'");
        foreach ($stmt as $value) {
          //idに一致する名前を出力
          echo $value['name'];
        }
      } catch (\Exception $e) {

      }

    }//sessionに保存したIDからDB検索をして名前を取得 ?>さん</h1>
    <ul>
      <li><a href="#">ユーザ情報変更</a></li>
      <li><a href="./logout.php">ログアウト</a></li>
      <li><a href="./index.html">メニュー</a></li>
    </ul>
  </body>
</html>
<?php endif;  ?>

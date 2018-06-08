<?php
session_start();
//require_once "./"; DB関数分離時の読み込み
//ユーザ入力を取得
$confirm_id = $_POST['input_id'];
$confirm_pass = $_POST['input_pass'];

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


try {
      // SQL実行
      $stmt = $pdo->query("SELECT * FROM accounts");
    ?>
          <!-- 全件表示ここから-->
          <h2>一覧</h2>
         <table>
            <tr><!-- 列-->
              <th>id</th>
              <th>login_id</th>
              <th>password</th>
              <th>name</th>
            </tr>
      <?php foreach ($stmt as $row): ?>
      <?php
        $id = $row['id'];
        $login_id = $row['login_id'];
        $password = $row['password'];
        $name = $row['name'];
      ?>
      <!-- デ−タの個数だけ生成-->
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $login_id ?></td>
              <td><?php echo $password ?></td>
              <td><?php echo $name ?></td>
            </tr>
            <!--<br>-->
        <?php endforeach; ?>
        </table>
          <!-- 全件表示ここまで-->
    <?php
      // エラー処理
      }catch(PDOException $e){
        echo "デ−タベースに接続できませんでした";
      }


 ?>







 <?php
$stmt = $pdo->query("SELECT login_id,password FROM accounts WHERE login_id = '{$confirm_id}' AND password = '{$confirm_pass}'");
foreach ($stmt as $serch_values) {
  if (($serch_values['login_id'] == $confirm_id) && ($serch_values['password'] == $confirm_pass) ):
  //confirm_idとconfirm_passがDBにあった場合 ./welcome.phpにリダイレクト
  echo "okoko";//デバック
  //入力されたidをセッションに保存
  $_SESSION['user_id'] = $confirm_id;
  header("Location:welcome.php",true,301);
  else:
  //なかった場合 ./login_error.htmlにリダイレクト
  echo "ngngn";//デバッグ
  header("Location:login_error.html",true,301);
  break;
  endif;
}

  ?>

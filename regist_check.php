<?php
//新規登録post受け取り
$regist_id = $_POST['new_id'];
$regist_pass = $_POST['new_pass'];
$regist_name = $_POST['new_name'];

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

//ユーザの入力が新規登録する条件を満たしていたらtrue

$same_id_flag = 0;//初期値0 同じidを入力してしまった場合1にする
$stmt = $pdo->query("SELECT login_id FROM accounts");
foreach ($stmt as $value) {
  if ($regist_id == $value['login_id']) {
    $same_id_flag = 1;
  }
}

if ($same_id_flag == 0){
//登録ok

//新規登録SQL
$stmt = $pdo->query("INSERT INTO accounts(login_id,password,name) VALUES('{$regist_id}','{$regist_pass}','{$regist_name}')");

header("Location:regist_success.html",true,301);
}else{
//登録ng

header("Location:regist_error.html",true,301);

}
 ?>

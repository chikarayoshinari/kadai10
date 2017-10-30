<?php
session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();
//1.POSTでParamを取得

$id = $_POST["id"];
$name = $_POST["name"];
$year = $_POST["year"];

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

$naiyou = $_POST["naiyou"];






//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

$pw = password_hash (  $lpw , PASSWORD_DEFAULT);

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。

$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name,year=:year,lid=:lid,lpw=:lpw, naiyou=:naiyou WHERE id=:id");

$stmt->bindValue(':name', $name);
$stmt->bindValue(':year', $year);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $pw);
$stmt->bindValue(':id', $id);
$stmt->bindValue(':naiyou', $naiyou);

$status = $stmt->execute();

if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: user_select_00.php");
  exit;
}

?>

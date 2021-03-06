<?php

session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();

$id = $_GET["id"];



//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id', $id);

$status = $stmt->execute();



if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: select_01.php");
  exit;
}


?>
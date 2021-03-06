<?php

session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();


//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .= '<p>';
      $view .= '<a href="detail_00.php?id='.$result["id"].'">';
      $view .= $result["name"]."[".$result["indate"]."]";
      $view .= '</a>　';
      $view .= '<a href="delete_00.php?id='.$result["id"].'">';
      $view .= '[削除]';
      $view .= '</a>';
      $view .= '</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク表示</title>
<!--<link rel="stylesheet" href="css/range.css">-->
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
<!--    <div class="container-fluid">-->
      <div class="navbar-header">
      <a class="navbar-brand" href="logout.php" style="margin-right:30px">ログアウト</a>
      <a class="navbar-brand" href="user_select_00.php">ユーザ一覧</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<div>ようこそ<?= $_SESSION["name"] ?>様</div>
<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>
<!--</div>-->
<!-- Main[End] -->

</body>
</html>

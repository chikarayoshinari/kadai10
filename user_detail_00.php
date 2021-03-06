<?php

session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();
//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch(); //$row["name"]
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ編集</title>
<!--  <link href="css/bootstrap.min.css" rel="stylesheet">-->
  <style>div{padding: 10px;font-size:16px;}</style>
<!--  <script src="js/jquery-2.1.3.min.js"></script>-->

</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
<!--    <div class="container-fluid">-->
    <div class="navbar-header"><a class="navbar-brand" href="user_select_00.php">ユーザ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->
<div>ようこそ<?= $_SESSION["name"] ?>様</div>
<!-- Main[Start] -->
<form method="post" action="user_update_00.php">
  <div>
   <fieldset>
    <legend>＜ユーザー編集＞</legend><br>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>年齢：<input type="text" name="year" value="<?=$row["year"]?>"></label><br>
     
     
     
     
     <label>ＩＤ：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     
     <label>ＰＷ：<input type="text" name="lpw" value=""></label><br><br>
     
     <label><textArea name="naiyou" rows="4" cols="30"><?=$row["naiyou"]?></textArea></label><br>
     

    
    
    
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->



</body>
</html>







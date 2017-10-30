<?php

session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();


//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
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
  <link rel="stylesheet" href="css/reset.css" >
  <title>データ詳細</title>
<!--  <link href="css/bootstrap.min.css" rel="stylesheet">-->
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<div style="max-width:800px;margin:0 auto">
<!-- Head[Start] -->
<!--<header>-->
<!--  <nav class="navbar navbar-default">-->
<!--    <div class="container-fluid">-->
<!--      <div class="navbar-header">-->
<div style="text-align: right">

<a class="navbar-brand" href="select_02.php" style="margin-right:30px">New art</a>
<a class="navbar-brand" href="select_01.php" style="margin-right:30px">My art</a>
<a class="navbar-brand" href="user_select_02.php" style="margin-right:30px">All user</a>
<a class="navbar-brand" href="logout.php" style="margin-right:30px">Logout</a>
</div>

<!--    </div>-->
<!--  </nav>-->
<!--</header>-->
<!-- Head[End] -->

<div style="text-align: right; margin-right:30px">ようこそ<?= $_SESSION["name"] ?>様</div>




<!-- Main[Start] -->
<form method="post" action="update_01.php" enctype="multipart/form-data">
 
 
  <div>
   <fieldset>
    <legend>＜データ詳細＞</legend><br>
    
     <label>作品名：<?=$row["name"]?></label><br>
     <label>作者名：<?=$row["url"]?></label><br><br>
     
     <div style="background-color:#9ba
 ; width:400px">
     <img width="100%" style="display:block"  src="upload/<?=$row["image"]?>">
     </div><br>
     
     <label><?=$row["naiyou"]?></label><br><br>
     
     <label>評価額：<?=$row["price"]?></label><br><br>
     
     
     <input type="hidden" name="id" value="<?=$id?>">

    </fieldset>
  </div>
</form>


<!-- Main[End] -->

</div>

</body>
</html>







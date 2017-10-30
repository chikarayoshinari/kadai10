<?php

session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();



?>

















<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  	<link rel="stylesheet" href="css/reset.css" >
  <title>データ登録</title>

  
  
  
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<!--<header>-->
<!--  <nav class="navbar navbar-default">-->
<!--    <div class="container-fluid">-->
<!--      <div class="navbar-header">-->
<div style="text-align: right">
<a class="navbar-brand" href="select_01.php" style="margin-right:30px">MY</a>
<a class="navbar-brand" href="logout.php" style="margin-right:30px">ログアウト</a>
</div>

<!--    </div>-->
<!--  </nav>-->
<!--</header>-->
<!-- Head[End] -->

<div style="text-align: right; margin-right:30px">ようこそ<?= $_SESSION["name"] ?>様</div>

<!-- Main[Start] -->
<form method="post" action="insert.php"
 enctype="multipart/form-data">
 
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク</legend>
     <label>書籍名：<input type="text" name="name"></label><br>
     <label>書籍ＵＲＬ：<input type="text" name="url"></label><br>
     <label>画像：<input type="file" name="upfile"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
          <label>金額：<input type="text" name="price"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

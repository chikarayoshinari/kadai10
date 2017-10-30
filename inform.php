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
<form method="post" action="insert.php"
 enctype="multipart/form-data">
 
  <div>
   <fieldset>
    <legend>＜新しい登録＞</legend><br>
     <label>作品名：<input type="text" name="name" ></label><br>
     <label>作者名：<input type="text" name="url"></label><br><br>
     <label>画像：　<input type="file" name="upfile"></label><br><br>
     <label><textArea name="naiyou" rows="4" cols="33"></textArea></label><br>
          <label>評価額：<input type="text" name="price"></label><br>
    <label>公開<input type="radio" name="kanri_flg" value="1">非公開<input type="radio" name="kanri_flg" value="0" checked></label><br><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</div>

</body>
</html>

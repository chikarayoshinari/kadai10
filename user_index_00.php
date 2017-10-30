<?php


//session_start();


//0.外部ファイル読み込み
//include("functions.php");

//ssidChk();


?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  
    	<link rel="stylesheet" href="css/reset.css" >
    	
  <title>ユーザー登録</title>
<!--  <link href="css/bootstrap.min.css" rel="stylesheet">-->
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->

<div style="max-width:800px;margin:0 auto">
<!-- Head[Start] -->
<!--<header>-->
<!--  <nav class="navbar navbar-default">-->
<!--    <div class="container-fluid">-->
<!--      <div class="navbar-header">-->
<div style="text-align: right">


<a class="navbar-brand" href="user_select_00.php" style="margin-right:30px">ユーザー一覧</a>
</div>



<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert_00.php">
  <div>
   <fieldset>
    <legend>＜新しいユーザー＞</legend><br>
     <label>名前：<input type="text" name="name"></label><br>
     <label>年齢：<input type="text" name="year"></label><br>
     <label>ＩＤ：<input type="text" name="lid"></label><br>
     <label>ＰＷ：<input type="text" name="lpw"></label><br><br>
     <label><textArea name="naiyou" rows="4" cols="30"></textArea></label><br><br>

     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</div>
</body>
</html>

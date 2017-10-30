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
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE kanri_flg=0");
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
      $view .= '名前：';
      $view .= $result["name"];
      $view .= '</p>';
      $view .= '<p>';
      $view .= '年齢：';
      $view .= $result["year"].'歳';
      $view .= '</p>';
      $view .= '<p>';
      $view .= '内容：';
      $view .= $result["naiyou"];
      $view .= '</p><br>';

  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/reset.css" >
<title>ユーザー一覧</title>
<!--<link rel="stylesheet" href="css/range.css">-->
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
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







<!-- Head[End] -->
<div style="text-align: right; margin-right:30px">ようこそ<?= $_SESSION["name"] ?>様</div>
<!-- Main[Start] -->
    <div style="border-bottom: medium solid #777; border-top: medium solid #777; display:flex">
   <legend style="font-size:16pt">All user　</legend>

       </div>
       
    <div style="max-width:400px;margin:0 auto" ><?=$view?></div>
<!--</div>-->
<!-- Main[End] -->
</div>
</body>
</html>

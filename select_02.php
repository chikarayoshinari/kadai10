<?php

session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();

$jibun=$_SESSION["id"];

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE kanri_flg=1 ");
$status = $stmt->execute();

//３．データ表示
$view="";
//$like="";

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .= '<div style="background-color:#9ba ; width:400px">';
      $view .= '<img width="100%" style="display:block"  src="upload/'.$result["image"].'">';
      $view .= '</div>';
      $view .= '<div style="background-color:#494 ; width:400px;height:30px ; font-size:10pt ;display:flex ;justify-content: space-between;align-items: center;margin-bottom:10px " >';
      
      $view .=  '<div style="font-size:10pt">';
      $view .= '<a href="detail_02.php?id='.$result["id"].'">';
      $view .= $result["name"];
      $view .= '</a>　';
      
      $view .= '</div>';
      $view .=  '<div style="font-size:20pt">';
      $view .= '¥'.$result["price"];
      $view .= '</div>';
//      $view .= '<button class="letsVote" id="like_btn_'.$result["id"].'" >';
//      $view .='欲しい!　';
//      $view .= '</button>';
      $view .= '</div>';


  }
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/reset.css" >
<!--	<link rel="stylesheet" href="css/minar.css">-->
<title>New art</title>
<!--<link rel="stylesheet" href="css/range.css">-->
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<style>div{padding: 10px;font-size:16px;}</style>

</head>

<body id="main">
<div style="max-width:800px;margin:0 auto">


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
    <div style="border-bottom: medium solid #777; border-top: medium solid #777; display:flex">
   <legend style="font-size:16pt">New art　</legend>
       </div>

    <div style="max-width:400px;margin:0 auto" ><?=$view?></div>

<!--</div>-->
<!-- Main[End] -->


</div>


</body>
</html>

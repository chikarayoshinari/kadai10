<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
$lid = $_POST["lid"];
//$lpw = $_POST["lpw"];
//$kanri_flg = $_POST["kanri_flg"];



//1.  DB接続します
$pdo = db_con();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid");
$stmt->bindValue(':lid', $lid);
//$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
queryError($stmt);
}


//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//var_dump($val['lpw']);
//exit();

//5. 該当レコードがあればSESSIONに値を代入
if(  password_verify($_POST["lpw"],$val["lpw"]) && $val['kanri_flg']==0) {
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["id"]      = $val['id'];
  header("Location: select_01.php");

}

else if (password_verify($_POST["lpw"],$val["lpw"]) && $val['kanri_flg']==1) {
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["id"]      = $val['id'];
  header("Location: select_00.php");

}

else{
  //logout処理を経由して前画面へ
  header("Location: logout.php");

}

exit();
?>


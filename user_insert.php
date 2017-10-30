<?php




//0.外部ファイル読み込み
include("functions.php");


//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]=="" ||
  !isset($_POST["year"]) || $_POST["year"]=="" ||
  !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name   = $_POST["name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];
$year = $_POST["year"];
$naiyou = $_POST["naiyou"];


// 送信する画像の中身と拡張子を取得
//$image = file_get_contents(upfile);
//$extension = pathinfo($upfile, PATHINFO_EXTENSION);

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

$pw = password_hash (  $lpw , PASSWORD_DEFAULT);

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw,year,naiyou)VALUES(NULL, :a1, :a2, :a3,:a4,:a5)");
$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $lid);
$stmt->bindValue(':a3', $pw);
$stmt->bindValue(':a4', $year);
$stmt->bindValue(':a5', $naiyou);

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: login.php");
  exit;
}
?>

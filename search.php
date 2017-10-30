<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

ssidChk();

$jibun=$_SESSION["id"];

//POST
if(!isset($_POST["search"]) && $_POST["search"]==""){
    $s = "";
}else{
    $s = $_POST["search"];
}

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
if($s!=""){
//    $stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE name LIKE :s");
//    $stmt->bindValue(":s", "%".$s."%", PDO::PARAM_STR);
    
$stmt = $pdo->prepare("INSERT INTO gs_like_table(id, bm_id, user_id,
indate )VALUES(NULL, :a1, :a2, sysdate())");
$stmt->bindValue(':a1', $s);
$stmt->bindValue(':a2', $jibun);
    
$status = $stmt->execute();
    
    $stmt = $pdo->prepare("SELECT
  bm_id,
  COUNT(*)
FROM
  gs_like_table
GROUP BY
  bm_id habing bm_id=:s");
    $stmt->bindValue(":s", $s, PDO::PARAM_STR);

$status = $stmt->execute();


    
}else{
//    $stmt = $pdo->prepare("SELECT * FROM gs_bm_table"); 
}
$status = $stmt->execute();

//３．データ表示
$like="";
if($status==false){
    echo "false";
}else{
    //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>';
        $view .= '<a href="detail.php?id='.$result["id"].'">';
        $view .= h($result["name"])."[".h($result["indate"])."]";
        $view .= '</a>　';
        $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
    echo $view;
}
?>

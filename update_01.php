<?php

session_start();


//0.外部ファイル読み込み
include("functions.php");

ssidChk();


//1.POSTでParamを取得

$id = $_POST["id"];
$name = $_POST["name"];
$url = $_POST["url"];
$naiyou = $_POST["naiyou"];
$user_id = $_POST["user_id"];
$kanri_flg = $_POST["kanri_flg"];
$price = $_POST["price"];



//Fileアップロードチェック
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    //情報取得
    $file_name = $_FILES["upfile"]["name"];         //"1.jpg"ファイル名取得
    $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
    $file_dir_path = "upload/";  //画像ファイル保管先

    
    //***File名の変更***
    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
    $file_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
//    $file_name = $uniq_name; //ユニークファイル名とパス
   

    $img="";  //画像表示orError文字を保持する変数
    // FileUpload [--Start--]
    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_dir_path . $file_name ) ) {
            chmod( $file_dir_path . $file_name, 0644 );
            //echo $file_name . "をアップロードしました。";
//            $img = '<img src="'. $file_dir_path . $file_name . '" >'; //画像表示用HTML
        } else {
//            $img = "Error:アップロードできませんでした。"; //Error文字
        }
    }
    // FileUpload [--End--]
}else{
//    $img = "画像が送信されていません"; //Error文字
}































//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。

$stmt = $pdo->prepare("UPDATE gs_bm_table SET name=:name,url=:url,naiyou=:naiyou ,image=:image , user_id=:user_id ,kanri_flg=:kanri_flg ,price=:price WHERE id=:id");
$stmt->bindValue(':name', $name);
$stmt->bindValue(':url', $url);
$stmt->bindValue(':naiyou', $naiyou);
$stmt->bindValue(':image', $file_name);
$stmt->bindValue(':user_id', $_SESSION["id"]);
$stmt->bindValue(':kanri_flg', $kanri_flg);
$stmt->bindValue(':id', $id);
$stmt->bindValue(':price', $price);


$status = $stmt->execute();




if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: select_01.php");
  exit;
}

?>

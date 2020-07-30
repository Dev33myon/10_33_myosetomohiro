<?php
session_start();
include("functions.php");
check_session_id();

if (
  !isset($_POST['lat']) || $_POST['lat'] == '' ||
  !isset($_POST['lng']) || $_POST['lng'] == ''
) {
  // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

// 受け取ったデータを変数に入れる
$lat = $_POST['lat'];
$lng = $_POST['lng'];
// var_dump($_FILES);
// exit();

// ここからファイルアップロード&DB登録の処理を追加しよう！！！


if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  $uploadedFileName = $_FILES['upfile']['name'];
  $tempPathName = $_FILES['upfile']['tmp_name'];
  $fileDirectoryPath = 'upload/';
 
  $extension = pathinfo($uploadedFileName,PATHINFO_EXTENSION);
  $uniqueName = date('YmdHis').md5(session_id()).".".$extension;
  $fileNameToSave = $fileDirectoryPath.$uniqueName;

  // var_dump($fileNameToSave);
  // exit();
 
 if(is_uploaded_file($tempPathName)){
   if(move_uploaded_file($tempPathName,$fileNameToSave)){
     chmod($fileNameToSave, 0644);
     $img = '<img src="'. $fileNameToSave . '" >';
 
   }else{
     exit('Error:保存できませんでした');
   }
 }else{
   exit('Error:ファイルがありません');
 }
 }else{
   exit('アップロード失敗');
 }

// DB接続
$pdo = connect_to_db();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO myon_table(id, posttime, lat, lng, image, created_at, updated_at) VALUES(NULL,sysdate() , :lat, :lng, :image, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
$stmt->bindValue(':lng', $lng, PDO::PARAM_STR);
$stmt->bindValue(':image', $fileNameToSave, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header("Location:todo_input.php");
  exit();
}


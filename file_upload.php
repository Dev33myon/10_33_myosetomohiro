<?php
// var dump($_FILES)

if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
 $uploadedfileName = $FILES['upfile']['name'];
 $tempPathName = $_FILES['upfile']['tmp_name'];
 $fileDirectoryPath = 'upload/';

 $extension = pathinfo($uploadedFileName,PATHINFO_EXTENSION);
 $uniqueName = date('YmdHis').md5(session_id()).".".$extension;
 $fileNameToSave = $fileDirectoryPath.$uniqueName;

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


?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>file_upload</title>
</head>

<body>
  <?= $img ?>
</body>

</html>
<?php
//session_start();
require_once('model.php');
//require_once('loginModel.php');
$action =$_REQUEST['act'];
switch ($action) {
case 'update':
    
    if ( $_FILES["upfile"]["size"] > 0 ) {
         //開啟圖片檔
         $file = fopen($_FILES["upfile"]["tmp_name"], "rb");
         // 讀入圖片檔資料
         $fileContents = fread($file, filesize($_FILES["upfile"]["tmp_name"])); 
         //關閉圖片檔
         fclose($file);
         // 圖片檔案資料編碼
         $fileContents = base64_encode($fileContents);
         update($fileContents);
         
    }else {
      echo "圖片上傳失敗";
        }
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
</body>
</html>
<?php
session_start();
require_once('model.php');
require_once('loginModel.php');
$action =$_REQUEST['act'];
switch ($action) {
case 'insert':
    $src=$_REQUEST['src'];
    $b_name=$_REQUEST['name'];
    $b_stage=$_REQUEST['stage'];
    $date=$_REQUEST['date'];
    $author=$_REQUEST['author'];
    
    insert_img ($src, $b_name, $b_stage, $date, $author);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<a href='user_upload_n.php'>執行完成，回留言板</a>
</body>
</html>
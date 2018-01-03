<?php
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
case 'search':
    $name=$_REQUEST['name'];
    $season=$_REQUEST['season'];
    $stage=$_REQUEST['stage'];
    
    $results = search($name, $season, $stage);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<?php
//echo "<a href='result.php?id=",$results,"'>查看查詢結果</a>";
?>
<a href='user_upload.php'>執行完成，回留言板</a>
</body>
</html>
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
    break;
	
case 'update':
    $id = (int) $_REQUEST['id'];
    $b_name=$_REQUEST['b_name'];
    $b_stage=$_REQUEST['b_stage'];
    $date=$_REQUEST['date'];
    $author=$_REQUEST['author'];
	updatedata($id,$b_name,$b_stage,$date,$author);
    break;
    
case 'delete':
    $id = (int) $_REQUEST['id'];
    if ($id > 0 and isAdmin($_SESSION['uid'])) {
		deleteimg($id);
	}
    break;
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
if($action =='update'){
    header('Location: user_edit.php');	
}
if($action =='insert'){
    header('Location: user_upload.php');	
}
if($action =='delete'){
    header('Location: user_edit.php');	
}	
?>
</body>
</html>
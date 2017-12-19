<?php
session_start();
require_once('model.php');
require_once('loginModel.php');
$action =$_REQUEST['act'];
switch ($action) {
//good
//刪除
case 'delete':
$id = (int) $_REQUEST['id'];
    if ($id > 0) {
        deleteBook($id);
    }
    break;

//新增    
case 'insert':
    $title=$_REQUEST['title'];
    $author=$_REQUEST['author'];
    $lang=$_REQUEST['lang'];
    insertBook($title, $author, $lang, $_SESSION['uID']);
    break;
    
//更新
case 'update':
    $id = (int) $_REQUEST['id'];
    $title=$_REQUEST['title'];
    $author=$_REQUEST['author'];
    $lang=$_REQUEST['lang'];
    updateBook($id, $title, $author, $lang);
    break;
    
//按讚
case 'likebook':
    $id = (int) $_REQUEST['id'];
    if ($id > 0) {
        likeBook($id);
        repeat($_SESSION['uID'], $id);
    }
    break;
/*
case 'likebook':
    $id = (int) $_REQUEST['id'];
    $results=check($id);
    while ($rs=mysqli_fetch_array($results)) {
        if ($rs[$_SESSION['uID']]=='1')
            echo "你已經按過讚了<br />";
        else {
            if ($id > 0) {
                likeBook($id);
                repeat($id, $_SESSION['uID']);
            }
        }
    }
    break;
*/

    
//按噓
case 'likecancel':
    $id = (int) $_REQUEST['id'];
    if ($id > 0) {
        likeCancel($_SESSION['uID'], $id);
    }
    break;
    
//新增留言
case 'insertComment':
    $bkID=(int)$_REQUEST['bkID'];
    $msg=$_REQUEST['msg'];
    insertComment($bkID, $msg, $_SESSION['uID']);
    break;

//刪除留言
case 'deleteComment':
    $id = (int) $_REQUEST['id'];
    if ($id > 0 and isAdmin ($_SESSION['uID'])) {
        deleteComment($id);
    }
    break;
}
//try
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<a href='view.php'>執行完成，回留言板</a>
</body>
</html>
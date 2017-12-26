<?php
session_start(); //啟用session 變數功能
require_once('loginmodel.php');
$action =$_REQUEST['act'];
print_r($_REQUEST);

switch ($action) {
case 'login':
	$userName = $_POST['id']; //取得從HTML表單傳來之POST參數
	$passWord = $_POST['pwd'];
	
	if ($id=checkUP($userName,$passWord)) { //比對密碼
			$_SESSION['uID'] = $id; //若正確－－＞將userID存在session變數中，作為登入成功之記號
			header('Location: user_edit.php');
	} else {
		//print error message
		echo "Invalid Username or Password - Please try again <br />";
		echo '<a href="login.php">Login again</a> ';
	}
	break;

}
?>
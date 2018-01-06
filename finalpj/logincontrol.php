<?php
session_start(); //啟用session 變數功能
require("dbconnect.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="login.css">
</head>
<body>
<div id="content"></div>
<div class="box" id="box1"></div>
<div class="box" id="box2"></div>
<div id="login">
<?php
require_once('loginmodel.php');
$action =$_REQUEST['act'];
switch ($action) {
case 'login':
	$userName = $_POST['id']; //取得從HTML表單傳來之POST參數
	$passWord = $_POST['pwd'];
	
	if ($id=checkUP($userName,$passWord)) { //比對密碼
			$_SESSION['uid'] = $id; //若正確－－＞將userID存在session變數中，作為登入成功之記號
			header('Location: user_edit.php');
	} else {
		//print error message
		echo "<div id='tryagain'>Invalid Username or Password.<br />Please try again. <br />";
		echo '<button class="button" onclick="location.href=\'login.php\'">Login</button></div>';
	}
	break;

case 'sign':
    $uid = $_POST['nid']; //取得從HTML表單傳來之POST參數
    $pwd = $_POST['npwd'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    
    if ($uid!='' && $pwd!='' && $mail!='' && $name!='') {
        global $conn;
            //基本安全處理
            $uid=mysqli_real_escape_string($conn,$uid);
            $pwd=mysqli_real_escape_string($conn,$pwd);
            $name=mysqli_real_escape_string($conn,$name);
            $mail=mysqli_real_escape_string($conn,$mail);

            $sql = "INSERT INTO `user` (`uid`, `pwd`,`name`, `email`) VALUES ('$uid', '$pwd', '$name', '$mail');";
            mysqli_query($conn, $sql); //執行SQL
            echo "Sucessed!!! <br />Now you can login...<br /><br />";
            echo '<button class="button" onclick="location.href=\'login.php\'">login</button>';
            //mysql_close($sql); 
    }else {
        echo "Please try again!<br />";
        echo '<button class="button" onclick="location.href=\'sign_up.php\'">Back</button>';
    }
    
    break;
}
?>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>

</body>
</html>
<?php
session_start();
//require("dbconnect.php");
//set the login mark to empty
$_SESSION['uid'] = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="login.css">
</head>
<body>
<div id="login">
<h1>Login</h1>
<img src="image/img_avatar2.png" alt="Avatar" class="avatar">
<form method="post" action="logincontrol.php">
<input type="hidden" name="act" value="login">
<div id="user">
Username<input type="text" name="id" placeholder="Enter Username" ><br />
Password<input type="password" name="pwd" placeholder="Enter Password" ><br />
</div>
<input type="submit" class="button" value="login">
</form>
</div>
</body>
</html>
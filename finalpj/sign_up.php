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
<title>sign up</title>
<link type="text/css" rel="stylesheet" href="login.css">
</head>
<body>
<div id="content"></div>
<div class="box" id="box1"></div>
<div class="box" id="box2"></div>
<div id="login">
<img src="image/title.png" id="title"/>
<form method="post" action="loginControl.php">
<input type="hidden" name="act" value="sign">
Username<input type="text" name="nid" placeholder="Enter User ID" ><br />
Password<input type="password" name="npwd" placeholder="Enter Password" ><br />
Name<input type="text" name="name" placeholder="Enter your name" ><br />
E-mail<input type="text" name="mail" placeholder="Enter your e-mail" ><br />
<input type="submit" class="button" value="sign">
</form>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>
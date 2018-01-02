<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<img src="image/title.png" id="title"/>
<img src="image/圖片5.png" class="user">
<form method="post" action="loginControl.php">
<input type="hidden" name="act" value="login">
<div id="user">
Username<input type="text" name="id" placeholder="Enter Username" ><br />
Password<input type="password" name="pwd" placeholder="Enter Password" ><br />
</div>
<input type="submit" class="button" value="login">
</form>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>
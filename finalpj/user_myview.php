<?php
 session_start();
 //require("dbconnect.php");
 require('loginmodel.php');
 //set the login mark to empty
 print_r($_SESSION);
 if ( ! isset($_SESSION['uid']) or $_SESSION['uid'] <= 0) {
 	header("Location: login.php");
 	exit(0);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="user_edit.css">
</head>
<body>
<div class="box" id="box1"></div>
<div class="box" id="box2"></div>
<div id="t">
<div id="menu">
<img src="image/title.png" id="title"/>
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button><br />
<button class="tool" onclick="location.href='user_myview.php'">Myview</button>
</div>
<a href='homepage.php' title ='登出'><img src="image/logout.png" id="logout"/></a>
</div>
<div id="content">

<div id="show">
<?php
require("model.php");
$uid = $_SESSION['uid'];
$results=showMyButterfly($uid);
while ($rs=mysqli_fetch_array($results)) {
    echo "<div class='k'><div style=\"background-image:url('upload/", $rs['src'], "')\" class='img'></div>";
    echo "<div class='mid'><a href='user_edit_img.php?id=",$rs['id'] ,"' title='修改圖片'><img src='image/edit_img.png' class='edit' id='edit_img'/></a>";
    echo "<a href='user_edit_info.php?id=",$rs['id'] ,"'title='修改資料'><img src='image/edit_info.png' class='edit' id='edit_img'/></a></div></div>";
}
?>
</div>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>


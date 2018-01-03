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
</div>
<div id="content">
<div id="search">
<form method='post' action='control.php'>
<td><label>Name<select name='name' value='name'>
<?php
require("model.php");
$results=getButterflyList();
global $i;
$i=1;
while ($rs=mysqli_fetch_array($results)) {
    if ( ($i%3) == 1) {
        echo "<option>", $rs['name'], "</option>";
    }
    $i++;
}
?>
</select></label></td>
<td><label>Season<select name="season">
        <option>春</option>
        <option>夏</option>
        <option>秋</option>
        <option>冬</option>
</select></label></td>
<td><label>Stage<select name="stage">
        <option>幼蟲期</option>
        <option>變態期</option>
        <option>成蟲期</option>
</select></label></td>
<input type="submit" class="button" value="Submit" />
</form>
</div>
<div id="show">
<?php
$uid = $_SESSION['uid'];
$results=showMyButterfly($uid);
$i=1;
echo "<table class='pic'>";
while ($rs=mysqli_fetch_array($results)) {
    if ($i%3==1) 
        echo "<tr>";
    echo "<td class='k'><div style=\"background-image:url('upload/", $rs['src'], "')\" class='img'></div>";
    echo "<div class='mid'><a href='user_edit_id.php?id=",$rs['id'] ,"'><img src='image/pencil.png' class='edit'/></a></div></td>";
    if ($i%3==0)
        echo "</tr>";
    $i++;
}
echo "</table>";
?>
</div>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>


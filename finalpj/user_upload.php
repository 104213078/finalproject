<?php
 session_start();
 //require("dbconnect.php");
 require('loginmodel.php');
 //set the login mark to empty
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
<link type="text/css" rel="stylesheet" href="user_upload.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
window.onload=function(){
	
$(function (){
    $('.upload_input').hide();
    function preview(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.upload_icon').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("body").on("change", ".upload_input", function (){
        preview(this);
    })
    
})
}
</script>

</head>
<body>
<div id="title">
<img src="image/圖片7.png" alt="Avatar" class="avatar" id="u">
<div id="menu">
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button>
<a href='homepage.php'>logout</a>
</div>
</div>
<div id="content">
<table id="t">
<tr><td rowspan="7" id="up_p"><label class="upload_cover">
    <form method="post" action="user_upload_control.php" enctype="multipart/form-data">
    <input type="hidden" name="act" value="update">
    <input class="upload_input" type="file" name="upfile" />
    <input name="act" type="hidden" value='insert' />
    <img src="image/p.png" class="upload_icon"/>
    <input type="submit" value="預覽" />
    </form></label></td>
<form method="post" action="control.php" enctype="multipart/form-data">
    <th>名稱</th><td><input type="text"/></td></tr>
<tr><th>階段</th><td><label><select name="season">
        <option>幼蟲期</option>
        <option>變態期</option>
        <option>成蟲期</option>
</select></label></td></tr>
<tr><th>日期</th><td><label>
        <input type="text" name="date" />
</label></td></tr>
<tr><th>作者</th><td><label>
        <input name="author" type="text" />
</label></td></tr>
</table>
<input type="submit" class="button" value="Submit" />
</form>

</div>
</body>
</html>

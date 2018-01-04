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
<div class="box" id="box1"></div>
<div class="box" id="box2"></div>
<div id="t">
<div id="menu">
<img src="image/title.png" id="title"/>
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button><br />
</div>
<a href='homepage.php'><img src="image/logout.png" id="logout"/></a>
</div>
<div id="content">
<table id="f">
<tr><td rowspan="4" class="up_p" ><label class="upload_cover">
    <form method="post" action="user_upload_control.php" enctype="multipart/form-data">
    <input type="hidden" name="act" value="update" />
    <input class="upload_input" type="file" name="upfile" />
    <input name="act" type="hidden" value='insert' />
    <img src="image/p.png" class="upload_icon"/>
    <input type="submit" value="預覽" />
    </form></label></td>
<form method="post" action="control.php" enctype="multipart/form-data">
    <th>名稱</th><td class="up_d"><select name='b_name'>
<?php
require('model.php');
$results=getButterflyList();
global $i;
$i=1;
while ($rs=mysqli_fetch_array($results)) {
    if ( ($i%3) == 1) {
        echo "<option>", $rs['name'], "</option>";
    }
    $i++;
}
echo "</td></tr>";
?>
<tr><th>階段</th><td class="up_d"><label><select name="b_stage">
        <option >幼蟲期</option>
        <option >變態期</option>
        <option >成蟲期</option>
</select></label></td></tr>
<tr><th>日期</th><td class="up_d"><label>
        <input type="text" name="date" />
</label></td></tr>
<tr><th>作者</th><td class="up_d"><label>
        <input type="text" name="author" />
</label></td></tr>
</table>
<div id="bu">
<input type="submit" class="button" value="Submit" />
</div>
</form>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</div>
</body>
</html>

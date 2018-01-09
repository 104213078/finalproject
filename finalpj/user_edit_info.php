<?php
session_start();
require("dbconnect.php");
require('loginmodel.php');
require('model.php');
//SELECT * FROM `img`, `butterfly` WHERE `img`.`b_name`=`butterfly`.`name` AND `img`.`b_stage`=`butterfly`.`stage`
$id = (int)$_REQUEST['id'];
$results=getitButterflyList($id);
if ($rs=mysqli_fetch_assoc($results)) {
	$name=$rs['name'];
    $nickname=$rs['nickname'];
    $field=$rs['field'];
    $gender=$rs['gender'];
    $stage=$rs['stage'];
    $season=$rs['season'];
    $description=$rs['description'];
	$src=$rs['src'];
} else {
	echo "Your id is wrong!!";
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="user_upload.css">
<style>
input, select, textarea {width: 75%;}
</style>
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

<?php
$user=checkUser($_SESSION['uid']);
$u=mysqli_fetch_array($user);
echo "<img src='image/圖片5.png' id='user_name' title='",$u['name'],"'/>";
?>

<div id="menu">
<img src="image/title.png" id="title"/>
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button><br />
<button class="tool" onclick="location.href='user_myview.php'">Myview</button>
</div>
<a href='user_edit.php'><img src="image/logout.png" id="logout"/></a>
</div>
<div id="content">
<form method="post" action="control.php" enctype="multipart/form-data">
<table id="f">
    <input type="hidden" name="act" value="edit" />
    <input class="upload_input" type="file" name="upfile" />
	<input type="hidden" name='id' value="<?php echo $id;?>">
<tr><th>名稱</th><td class="up_d"><select name='name'>
<?php
$sql = "select DISTINCT name from butterfly;";
$results=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
while ($rs=mysqli_fetch_array($results)) {
    echo "<option "; 
    if ($name==$rs['name']) 
        echo "selected"; 
    echo ">", $rs['name'], "</option>";
}
echo "</select></td></tr>";
?>
<tr><th>暱稱</th><td class="up_d"><select name='nickname'>
<?php
$sql = "select DISTINCT nickname from butterfly;";
$results=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
while ($rs=mysqli_fetch_array($results)) {
    echo "<option "; 
    if ($nickname==$rs['nickname']) 
        echo "selected"; 
    echo ">", $rs['nickname'], "</option>";
}
echo "</select></td></tr>";
?>
<tr><th>科別</th><td class="up_d"><select name='field'>
<?php
$sql = "select DISTINCT field from butterfly;";
$results=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
while ($rs=mysqli_fetch_array($results)) {
    echo "<option "; 
    if ($field==$rs['field']) 
        echo "selected"; 
    echo ">", $rs['field'], "</option>";
}
echo "</select></td></tr>";
?>
<tr><th>性別</th><td class="up_d"><select name='gender'>
        <option <?php if($gender =="雄") echo "selected"?>>雄</option>
        <option <?php if($gender =="/") echo "selected"?>>/</option>
        <option <?php if($gender =="雌") echo "selected"?>>雌</option>
</select></td></tr>
<tr><th>狀態</th><td class="up_d"><select name='stage'>
        <option <?php if($stage =="幼蟲期") echo "selected"?>>幼蟲期</option>
        <option <?php if($stage =="變態期") echo "selected"?>>變態期</option>
        <option <?php if($stage =="成熟期") echo "selected"?>>成熟期</option>
</select></td></tr>
<tr><th>季節</th><td class="up_d"><select name='season'>
        <option <?php if($season =="春") echo "selected"?>>春</option>
        <option <?php if($season =="夏") echo "selected"?>>夏</option>
        <option <?php if($season =="秋") echo "selected"?>>秋</option>
        <option <?php if($season =="冬") echo "selected"?>>冬</option>
</select></td></tr>
<tr><th>詳細</th><td class="up_d">
        <textarea name="description" rows="3" cols="40"><?php echo $description;?></textarea>
</select></td></tr>
</table>
<div id="bu">
<?php
if ((isAdmin($_SESSION['uid'])==1)||($u['name']==$rs['author'])) {
        echo "<button class=\"button\"><a href=\"control.php?act=delete&id=",$id,"\">Delete</a></button>";
    }
?>
<button type="submit" class="button" value="Submit">Submit</button>
</div>
</form>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>

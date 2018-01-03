<?php
session_start();
require("dbconnect.php");
require('loginmodel.php');
require('model.php');
//取得目標內容
$id = (int)$_REQUEST['id'];
//SELECT * FROM `img`, `butterfly` WHERE `img`.`b_name`=`butterfly`.`name` AND `img`.`b_stage`=`butterfly`.`stage`
$sql = "select * from img where id=$id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
if ($rs=mysqli_fetch_assoc($result)) {
	$src=$rs['src'];
    $b_name=$rs['b_name'];
    $b_stage=$rs['b_stage'];
    $date=$rs['date'];
    $author=$rs['author'];
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
<button class="tool" onclick="location.href='user_upload.php'">Upload</button>
</div>
<a href='homepage.php'><img src="image/logout.png" id="logout"/></a>
</div>
<div id="content">
<form method="post" action="control.php" enctype="multipart/form-data">
<table id="f">
<tr><td rowspan="4" class="up_p"><label class="upload_cover">
    <input type="hidden" name="act" value="update" />
    <input class="upload_input" type="file" name="upfile" />
	<input type="hidden" name='id' value="<?php echo $id;?>">
    <?php echo "<img src='upload/", $src, "' class='img'/></label></td>"; ?>
    <th>名稱</th><td class="up_d"><select name='b_name'>
<?php
$results=getButterflyList();
global $i;
$i=1;
while ($rs=mysqli_fetch_array($results)) {
    if ( ($i%3) == 1) {
        echo "<option "; 
         if ($b_name==$rs['name']) 
             echo "selected"; 
         echo ">", $rs['name'], "</option>";
    }
    $i++;
}
echo "</td></tr>";
?>
<tr><th>階段</th><td class="up_d"><label><select name="b_stage">
        <option <?php if ($b_stage == "幼蟲期") echo "selected"; ?> >幼蟲期</option>
        <option <?php if ($b_stage == "變態期") echo "selected"; ?> >變態期</option>
        <option <?php if ($b_stage == "成蟲期") echo "selected"; ?> >成蟲期</option>
</select></label></td></tr>
<tr><th>日期</th><td class="up_d"><label>
        <input type="text" name="date" value="<?php echo $date;?>"/>
</label></td></tr>
<tr><th>作者</th><td class="up_d"><label>
        <input name="author" type="text" value="<?php echo $author;?>" />
</label></td></tr>
</table>
<div id="bu">
<button class="button"><a href="control.php?act=delete&id=<?php echo $id; ?>">Delete</a></button>
<button type="submit" class="button" value="Submit">Submit</button>
</div>
</form>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>

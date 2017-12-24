<?php
session_start();
require("dbconnect.php");
//取得目標內容
$id = (int)$_REQUEST['id'];
$sql = "select * from butterfly where id=$id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
if ($rs=mysqli_fetch_assoc($result)) {
	$name = $rs['name'];
    $nickname=$rs['nickname'];
	$field=$rs['field'];
    $gender = $rs['gender'];
    $stage=$rs['stage'];
	$season=$rs['season'];
    $description=$rs['description'];
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
<div id="title">
<img src="image/圖片7.png" alt="Avatar" class="avatar" id="u">
<div id="menu">
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button>
</div>
</div>
<div id="content">
<form method="post" action="control.php" enctype="multipart/form-data">
<table id="t">
<tr><td rowspan="7" id="up_p"><label class="upload_cover">
    <input type="hidden" name="act" value="update">
    <input class="upload_input" type="file" name="upfile" />
    <?php echo "<img src='image/", $name, "-", $stage, ".jpg' class='img'/></label></td>"; ?>
    <th>名稱</th><td><select name='name'>
<?php
require("model.php");
$results=getButterflyList();
global $i;
$i=1;
while ($rs=mysqli_fetch_array($results)) {
    if ( ($i%3) == 1) {
        echo "<option "; 
         if ($name==$rs['name']) 
             echo "selected"; 
         echo ">", $rs['name'], "</option>";
    }
    $i++;
}
echo "</td></tr>";
?>
<tr><th>別名</th><td><input type="text" value="<?php echo $nickname;?>" /></td></tr>
<tr><th>科目</th><td><input type="text" value="<?php echo $field;?>" /></td></tr>
<tr><th>性別</th><td><label><select name="gender">
        <option <?php if ($gender=='公') echo "selected";?> >雌</option>
        <option <?php if ($gender=='母') echo "selected";?> >雄</option>
</select></label></td>
<tr><th>階段</th><td><label><select name="stage">
        <option <?php if ($stage=='幼蟲期') echo "selected";?> >幼蟲期</option>
        <option <?php if ($stage=='變態期') echo "selected";?> >變態期</option>
        <option <?php if ($stage=='成蟲期') echo "selected";?> >成蟲期</option>
</select></label></td></tr>
<tr><th>季節</th><td><label><select name="season">
        <option <?php if ($gender=='春') echo "selected";?> >春</option>
        <option <?php if ($gender=='夏') echo "selected";?> >夏</option>
        <option <?php if ($gender=='秋') echo "selected";?> >秋</option>
        <option <?php if ($gender=='冬') echo "selected";?> >冬</option>
</select></label></td></tr>
<tr><th>描述</th><td><textarea name="description" cols="40" rows="5" ><?php echo $description;?></textarea></td></tr>
</table>
<input type="submit" class="button" value="Submit" />
</form>

</div>
</body>
</html>

<?php
session_start();
require("dbconnect.php");
require('loginmodel.php');
require('model.php');
//取得目標內容
//SELECT * FROM `img`, `butterfly` WHERE `img`.`b_name`=`butterfly`.`name` AND `img`.`b_stage`=`butterfly`.`stage`
//$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
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
</div>
<a href='homepage.php'><img src="image/logout.png" id="logout"/></a>
</div>
<div id="content">
<table id="f">
<tr><th>名稱</th><td class="up_d"><?php echo $name;?></td></tr>
<tr><th>暱稱</th><td class="up_d"><?php echo $nickname;?></td></tr>
<tr><th>科別</th><td class="up_d"><?php echo $field;?></td></tr>
<tr><th>性別</th><td class="up_d"><?php echo $gender;?></td></tr>
<tr><th>狀態</th><td class="up_d"><?php echo $stage;?></td></tr>
<tr><th>季節</th><td class="up_d"><?php echo $season;?></td></tr>
<tr><th>詳細</th><td class="up_d"><?php echo $description;?></td></tr>
</table>
<div id="bu">
<button class="button"><a href="view.php">back</a></button>
</div>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>

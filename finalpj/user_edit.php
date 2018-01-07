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
<link type="text/css" rel="stylesheet" href="user_edit.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $("#name").change(function(event){
         event.preventDefault();       
        $.ajax({
            url:"control.php",
            type:"POST",
            data:{"act":"search", name : $('#name').val(), season : $('#season').val(), stage : $('#stage').val()},
            success:function(r){
                var result = JSON.parse(r);
                console.log(result);
                $("#show").empty();
                for(var i=0; i<result.length; i=i+2){
                    console.log(i);
                    var row= "<div class='k'><div style=\"background-image:url('"+result[i]+ "')\" class='img'></div>";
                    row+= "<div class='mid'><a href='user_edit_img.php?id="+result[i+1]+"' title='修改圖片'><img src='image/edit_img.png' class='edit' id='edit_img'/></a>";
                    row+= "<a href='user_edit_info.php?id="+result[i+1]+"'title='修改資料'><img src='image/edit_info.png' class='edit' id='edit_img'/></a></div></div>";
                    $("#show").append(row);
                }
            }
        })
    })
    $("#season").change(function(event){
         event.preventDefault();       
        $.ajax({
            url:"control.php",
            type:"POST",
            data:{"act":"search", name : $('#name').val(), season : $('#season').val(), stage : $('#stage').val()},
            success:function(r){
                var result = JSON.parse(r);
                console.log(result);
                $("#show").empty();
                for(var i=0; i<result.length; i=i+2){
                    console.log(i);
                    var row= "<div class='k'><div style=\"background-image:url('"+result[i]+ "')\" class='img'></div>";
                    row+= "<div class='mid'><a href='user_edit_img.php?id="+result[i+1]+"' title='修改圖片'><img src='image/edit_img.png' class='edit' id='edit_img'/></a>";
                    row+= "<a href='user_edit_info.php?id="+result[i+1]+"'title='修改資料'><img src='image/edit_info.png' class='edit' id='edit_img'/></a></div></div>";
                    $("#show").append(row);
                }
            }
        })
    })
    $("#stage").change(function(event){
        event.preventDefault();       
        $.ajax({
            url:"control.php",
            type:"POST",
            data:{"act":"search", name : $('#name').val(), season : $('#season').val(), stage : $('#stage').val()},
            success:function(r){
                var result = JSON.parse(r);
                console.log(result);
                $("#show").empty();
                for(var i=0; i<result.length; i=i+2){
                    console.log(i);
                    var row= "<div class='k'><div style=\"background-image:url('"+result[i]+ "')\" class='img'></div>";
                    row+= "<div class='mid'><a href='user_edit_img.php?id="+result[i+1]+"' title='修改圖片'><img src='image/edit_img.png' class='edit' id='edit_img'/></a>";
                    row+= "<a href='user_edit_info.php?id="+result[i+1]+"'title='修改資料'><img src='image/edit_info.png' class='edit' id='edit_img'/></a></div></div>";
                    $("#show").append(row);
                }
            }
        })
    })
  
})
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
<button class="tool" onclick="location.href='user_myview.php'">Myview</button>
</div>
<a href='homepage.php' title ='登出'><img src="image/logout.png" id="logout"/></a>
</div>
<div id="content">
<div id="search">
<form method='post' action='control.php'>
<td><label>Name<select id='name' value='name'>
<?php
require("model.php");
$results=getButterflyList();
global $i;
$i=1;
echo "<option>--</option>";
while ($rs=mysqli_fetch_array($results)) {
    if ( ($i%3) == 1) {
        echo "<option>", $rs['name'], "</option>";
    }
    $i++;
}
?>
</select></label></td>
<td><label>Season<select id="season">
        <option>--</option>
        <option>春</option>
        <option>夏</option>
        <option>秋</option>
        <option>冬</option>
</select></label></td>
<td><label>Stage<select id="stage">
        <option>--</option>
        <option>幼蟲期</option>
        <option>變態期</option>
        <option>成蟲期</option>
</select></label></td>
<input type="hidden" name="act" value="search" />
<!--<input type="submit" class="button" value="Submit" />-->
</form>
</div>
<div id="show">
<?php
$results=showButterfly();
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


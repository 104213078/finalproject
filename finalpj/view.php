<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Picture</title>
<link type="text/css" rel="stylesheet" href="view.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    // $("#select").submit(function(event){
         // event.preventDefault();
        // var t = {
                // "act":"search",
                // name : $('#name').val(),
                // season : $('#season').val(),
                // stage : $('#stage').val()
            // };
            // console.log(t);
        // $.ajax({
            // url:"control.php",
            // type:"POST",
            // data:{
                // "act":"search",
                // name : $('#name').val(),
                // season : $('#season').val(),
                // stage : $('#stage').val()
            // },
            // success:function(r){
                // var result = JSON.parse(r);
                // console.log(result);
                // $("#show").empty();
                // for(var i=0; i<result.length; i++){
                    // console.log(i);
                    // var row = '<div style="background-image:url('+result[i]+')" class="img"><a href="user_intro.php?id='+i+'"></a></div>';
                    // $("#show").append(row);
                // }
            // }
        // })
    // })
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
                    var row = '<div style="background-image:url('+result[i]+')" class="img"><a href="user_intro.php?id='+result[i+1]+'"></a></div>';
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
                    var row = '<div style="background-image:url('+result[i]+')" class="img"><a href="user_intro.php?id='+result[i+1]+'"></a></div>';
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
                    var row = '<div style="background-image:url('+result[i]+')" class="img"><a href="user_intro.php?id='+result[i+1]+'"></a></div>';
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
<div><a href='homepage.php' title ='登出'><img src="image/logout.png"  id="logout"/></a></div>
<img src="image/title.png" id="title"/>
</div>
<div id="content">
<div id="search">
<form method='post' action='control.php' id="select">
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
    echo "<div style=\"background-image:url('upload/", $rs['src'], "')\" class='img'>";
	echo "<a href='user_intro.php?id=",$rs['id'] ,"'></a></div>";
}
?>
</div>
</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</body>
</html>

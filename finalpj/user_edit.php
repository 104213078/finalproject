<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="user_edit.css">
</head>
<script type="text/javascript">
window.onload=function() {
    picture();
};
function picture() {
    var p="<table class='pic'>";
    for (var i=0; i<4; i++) {
        p+="<tr>";
        for (var j=i*3+1; j<=(i+1)*3; j++){
            p+="<td class='k'><img src='test/"+j+".jpg' class='img'/>";
            p+="<div class='mid'><img src='image/pencil.png' class='edit'/></div></td>";
        }
        p+="</tr>";
    }
    p+="</table>";
    document.getElementById("show").innerHTML=p;
}
</script>
<body>
<div id="title">
<img src="image/圖片7.png" alt="Avatar" class="avatar" id="u">
<div id="menu">
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button>
</div>
</div>
<div id="content">
<div id="search">
<form method="post" action="control.php">
<td><label>Name<select name="name" value="name">
        <option>青蛙</option>
        <option>蝴蝶</option>
        <option>蜻蜓</option>
        <option>其他</option>
</select></label></td>
<td><label>Season<select name="season">
        <option>春</option>
        <option>夏</option>
        <option>秋</option>
        <option>冬</option>
</select></label></td>
<td><label>Age<select name="age">
        <option>幼年</option>
        <option>成年</option>
        <option>老年</option>
</select></label></td>
<input type="submit" class="button" value="Submit" />
</form>
</div>
<div id="show"></div>
</div>
</body>
</html>

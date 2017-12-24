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
    <img src="p.png" class="upload_icon"/>
    </label></td>
    <th>名稱</th><td><input type="text"/></td></tr>
<tr><th>別名</th><td><input type="text"/></td></tr>
<tr><th>科目</th><td><input type="text"/></td></tr>
<tr><th>性別</th><td><label><select name="season">
        <option>公</option>
        <option>母</option>
</select></label></td>
<tr><th>階段</th><td><label><select name="season">
        <option>幼蟲期</option>
        <option>變態期</option>
        <option>成蟲期</option>
</select></label></td></tr>
<tr><th>季節</th><td><label><select name="season">
        <option>春</option>
        <option>夏</option>
        <option>秋</option>
        <option>冬</option>
</select></label></td></tr>
<tr><th>描述</th><td><textarea  id="cmts" name="cmts" cols="40" rows="5"></textarea></td></tr>
</table>
<input type="submit" class="button" value="Submit" />
</form>

</div>
</body>
</html>

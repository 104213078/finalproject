<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="user_upload.css">
</head>
<body>
<div id="user">
<img src="img_avatar2.png" alt="Avatar" id="u">
</div>
<div id="menu">
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button>
</div>
<div id="content">
<div id="upload">
<form method="post" action="control.php">
<label class="upload_cover">
<input id="upload_input" type="file">
<img src="p.png" class="upload_icon"/>
</label>
<input type="submit" class="button" value="Submit" />
</form>
</div>
</div>
</body>
</html>

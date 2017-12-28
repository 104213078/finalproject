<?php
session_start();
require('model.php');
require_once('loginModel.php');
$action =$_REQUEST['act'];
switch ($action) {
case 'insert':
    if ($_FILES['upfile']['error'] === UPLOAD_ERR_OK){
        //echo '檔案名稱: ' . $_FILES['upfile']['name'] . '<br/>';
        //echo '檔案類型: ' . $_FILES['upfile']['type'] . '<br/>';
        //echo '檔案大小: ' . ($_FILES['upfile']['size'] / 1024) . ' KB<br/>';
        //echo '暫存名稱: ' . $_FILES['upfile']['tmp_name'] . '<br/>';
  
    # 檢查檔案是否已經存在
        if (file_exists('upload/' . $_FILES['upfile']['name'])){
            //echo '檔案已存在。<br/>';
        } else {
            $file = $_FILES['upfile']['tmp_name'];
            $dest = 'upload/' . $_FILES['upfile']['name'];

            # 將檔案移至指定位置
            move_uploaded_file($file, $dest);
        }
    } else {
        //echo '錯誤代碼：' . $_FILES['upfile']['error'] . '<br/>';
    }
    
    $a= $_FILES["upfile"]["name"];;
    //echo $a;
    $b="upload/".$a;
    //echo $b;
    $exif = exif_read_data($b, 0, true);
    //echo "<pre>", print_r($exif), "</pre>";
    //echo ($exif['FILE']['FileName']), "<br />";
    //echo ($exif['IFD0']['Artist']), "<br />";
    //echo ($exif['EXIF']['DateTimeOriginal']), "<br />";
    
    $name=$exif['IFD0']['ImageDescription'];
    $src=$exif['FILE']['FileName'];
    $date=$exif['EXIF']['DateTimeOriginal'];
    $author=$exif['IFD0']['Artist'];
    
    //insert_img ($src, $date, $author);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="user_upload.css">
</head>
<body>
<div id="title">
<img src="image/圖片7.png" alt="Avatar" class="avatar" id="u">
<div id="menu">
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button>
<a href='homepage.php'>logout</a>
</div>
</div>
<div id="content">
<form method="post" action="control.php" enctype="multipart/form-data">
<input name="act" type="hidden" value='insert' />
<table id="t">
<tr><td rowspan="7" id="up_p"><label class="upload_cover">
    <input type="hidden" name="src" value="<?php echo $src;?>">
    <?php echo "<img src='upload/", $src, "' class='img'/></label></td>"; ?>
    <th>名稱</th><td><select name='name'>
<?php
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
<tr><th>階段</th><td><label><select name="stage">
        <option >幼蟲期</option>
        <option >變態期</option>
        <option >成蟲期</option>
</select></label></td></tr>
<tr><th>日期</th><td><label>
        <input type="text" name="date" value="<?php echo $date;?>"/>
</label></td></tr>
<tr><th>作者</th><td><label>
        <input name="author" type="text" value="<?php echo $author;?>" />
</label></td></tr>
</table>
<input type="submit" class="button" value="Submit" />
</form>
</div>
</body>
</html>

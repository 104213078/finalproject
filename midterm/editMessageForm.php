<?php
session_start();
require("dbconnect.php");
//$id = (int)$_POST['id'];
//$id = (int)$_GET['id'];
//取得目標書單內容
$id = (int)$_REQUEST['id'];
$sql = "select * from book where id=$id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
if ($rs=mysqli_fetch_assoc($result)) {
	$title = $rs['title'];
    $author=$rs['author'];
	$lang=$rs['lang'];
} else {
	echo "Your id is wrong!!";
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>更改書單</title>
</head>
<body>
<h1>edit Book : #<?php echo $id;?></h1>
<form method="post" action="control.php?act=update">
<input type="hidden" name='id' value="<?php echo $id;?>">
    Book Title: <input name="title" type="text" id="title" value="<?php echo $title;?>" /> <br>
    Book Author: <input name="author" type="text" id="author" value="<?php echo $author;?>" /> <br>
    Language: <select name="lang">
            <option <?php if ($lang=='中') echo "selected";?> >中</option>
            <option <?php if ($lang=='英') echo "selected";?> >英</option>
            <option <?php if ($lang=='日') echo "selected";?> >日</option>
            <option <?php if ($lang=='其他') echo "selected";?> >其他</option>
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>

<?php
session_start();
//require("dbconnect.php");
//set the login mark to empty
if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
	header("Location: loginForm.php");
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>書單內容</title>
</head>

<body>

<p>Book Detail !! [<a href='loginForm.php'>logout </a>][<a href='view.php'>主頁 </a>]</p>
<hr />
<table border="1">
  <tr>
    <th>id</th>
    <th>title</th>
    <th>author</th>
    <th>language</th>
    <th>like</th>
    <th>recommend by</th>
    <th>tool</th>
  </tr>
<?php
require("model.php");
//確認是否為管理員
require_once('loginModel.php');
$bkID=(int)$_REQUEST['id'];
$results = getBookDetail($bkID);
views($bkID);
//非管理員
if(!isAdmin($_SESSION['uID'])){
    while ($rs=mysqli_fetch_array($results)) {
        echo"<tr><td>" , $rs['id'] ,
            "</td><td>", $rs['title'],
            "</td><td>", $rs['author'],
            "</td><td>", $rs['lang'],
            "</td><td>", $rs['likebook'], 
            "</td><td>", "<a href='myview.php?id=",$rs['uID'] ,"'>",$rs['name'],"</a></td><td>";
        //如果資料輸入者跟登入者相同，就保有更改跟刪除權限
        if($_SESSION['uID']==$rs['uID']){
            echo"<a href='control.php?act=delete&id=",$rs['id'] ,"'>砍</a> | ",
                "<a href='editMessageForm.php?id=",$rs['id'] ,"'>改</a> | ";
        }
            echo"<a href='control.php?act=likebook&id=",$rs['id'] ,"'>Like</a> | ",
                "<a href='control.php?act=dislikebook&id=",$rs['id'] ,"'>Dislike</a> | ",
                "<a href='viewDetail.php?id=",$rs['id'] ,"'>View Detail</a> | ", "</td></tr></table>";
    }
}
//管理者
else {
    while ($rs=mysqli_fetch_array($results)) {
        echo"<tr><td>" , $rs['id'] ,
            "</td><td>", $rs['title'],
            "</td><td>", $rs['author'],
            "</td><td>", $rs['lang'],
            "</td><td>", $rs['likebook'], 
            "</td><td>", "<a href='myview.php?id=",$rs['uID'] ,"'>",$rs['name'],"</a></td><td>";
            echo"<a href='control.php?act=delete&id=",$rs['id'] ,"'>砍</a> | ",
                "<a href='editMessageForm.php?id=",$rs['id'] ,"'>改</a> | ",
                "<a href='control.php?act=likebook&id=",$rs['id'] ,"'>Like</a> | ",
                "<a href='control.php?act=dislikebook&id=",$rs['id'] ,"'>Dislike</a> | ",
                "<a href='viewDetail.php?id=",$rs['id'] ,"'>View Detail</a> | ","</td></tr></table>";
    }
}
?>
<hr />

<?php
//該書單留言列表
$results=getComment($bkID);
echo "<table border='1'><tr>",
     "<th>id</th>",
     "<th>massager</th>",
     "<th width='200'>detail</th>";
//非管理員
if (!isAdmin($_SESSION['uID'])) {
    echo "</tr>";
    while (	$rs=mysqli_fetch_array($results)) {
        echo "<tr><td>", $rs['id'], "</td>",
            "<td>", $rs['userName'], "</td>",
            "<td>", $rs['msg'], "</td></tr>";
    }
    echo "</table>";
}
//管理員
else {
    echo "<th>刪除</th></tr>";
    while ($rs=mysqli_fetch_array($results)) {
        echo "<tr><td>", $rs['id'], "</td>",
            "<td>", $rs['userName'], "</td>",
            "<td>", $rs['msg'], "</td>",
            "<td><a href ='control.php?act=deleteComment&id=",$rs['id'],"'>deltet</a></td></tr>";
    }
    echo "</table>";
}
?>
<br />
    <form method="post" action="control.php">
    <label>
      <input type="submit" name="Submit" value="新增留言" />
        <input name="bkID" type="hidden" value='<?php echo  $bkID;?>' />
        <input name="act" type="hidden" value='insertComment' />
    </label>
    <label>
        <input name="msg" type="text" id="msg" />
        </label>
	</form>

<?php
$bkID=(int)$_REQUEST['id'];
$sql = "SELECT views FROM book WHERE id=$bkID"; //產生SQL指令
if ($result = mysqli_query($conn,$sql)) { //執行SQL查詢
	if ($row=mysqli_fetch_assoc($result)) {
		echo "瀏覽次數：",$row['views'];
		}
}
?>
</body>
</html>
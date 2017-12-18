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
<title>My Recommend Book</title>
</head>

<body>

<p>My Recommend Book !! [<a href='view.php'>主頁 </a>]</p>
<hr />
<table border="1">
  <tr>
    <th>id</th>
    <th>title</th>
    <th>author</th>
    <th>language</th>
    <th>like</th>
    <th  colspan="4">tool</th>
    </tr>
<?php
require("model.php");
$uID=(int)$_REQUEST['id'];
$results=getMyBookList($uID);
while ($rs=mysqli_fetch_array($results)) {
        echo"<tr><td>" , $rs['id'] ,
            "</td><td>", $rs['title'],
            "</td><td>", $rs['author'],
            "</td><td>", $rs['lang'],
            "</td><td>", $rs['likebook']; 
        //如果資料輸入者跟登入者相同，就保有更改跟刪除權限
        if(($_SESSION['uID']==$rs['uID'])||($_SESSION['uID']==1)){
            echo"</td><td>", "<a href='control.php?act=delete&id=",$rs['id'] ,"'>砍</a>",
                "</td><td>", "<a href='editMessageForm.php?id=",$rs['id'] ,"'>改</a>";
        }
        echo"<td><a href='viewDetail.php?id=",$rs['id'] ,"'>View Detail</a></td>";
        //檢查是否按過讚
        $results_ck=check($_SESSION['uID'],$rs['id']);
        $rs_ck=mysqli_fetch_array($results_ck);
        if($rs_ck==NULL)
            echo "</td><td>", "<a href='control.php?act=likebook&id=",$rs['id'] ,"'>Like</a></td></tr>";
        else 
            echo "</td><td>", "<a href='control.php?act=likecancel&id=",$rs['id'] ,"'>Cancel</a></td></tr>";
}
?>
  <tr><form method="post" action="control.php">
    <td><label>
      <input type="submit" name="Submit" value="新增書單" />
      <input name="act" type="hidden" value='insert' /> <!--隱藏執行方式-->
    </label></td>
    <td><label>
      <input name="title" type="text" id="title" />
    </label></td>
    <td><label>
      <input name="author" type="text" id="author" />
    </label></td>
    <td><label><select name="lang">
            <option>中</option>
            <option selected>英</option>
            <option>日</option>
            <option>其他</option>
    </select></label></td>
	</form>
  </tr>
</table>
</body>
</html>

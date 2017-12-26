<?php
require("dbconnect.php");

function update($fileContents) {
	global $conn;
	$dbnum=mysql_connect("127.0.0.1","root","www2017");
	mysql_select_db("test1");
	$SQLSTR="Insert into image(filename,filesize,filetype,filepic) values('"
                  . $_FILES["upfile"]["name"] . "',"
                  . $_FILES["upfile"]["size"] . ",'"
                  . $_FILES["upfile"]["type"] . "','"
                  . $fileContents . "')";
         //將圖片檔案資料寫入資料庫
         if(!mysql_query($SQLSTR)==0)
           {
            echo "您所上傳的檔案已儲存進入資料庫<br/><a href='user_upload.php'>回到上傳區</a>";
           }
         else
           {
            echo "您所上傳的檔案無法儲存進入資料庫";
           } 
}

function getButterflyList() {
    global $conn;
	$sql = "SELECT * FROM `butterfly`";
	return mysqli_query($conn, $sql);
}
function insertdata($name='',$nickname='', $field='',$gender='',$stage='',$season='',$description=''){
	global $conn;
	if ($name > ' ') {
		//基本安全處理
		$name=mysqli_real_escape_string($conn, $name);
		$nickname=mysqli_real_escape_string($conn, $nickname);
		$field=mysqli_real_escape_string($conn, $field);
		$gender=mysqli_real_escape_string($conn, $gender);
		$stage=mysqli_real_escape_string($conn, $stage);
		$season=mysqli_real_escape_string($conn, $season);
		$description=mysqli_real_escape_string($conn, $description);	
		$sql = "insert into butterfly(name, nickname,field,gender,stage,season,description) values ('$name','$nickname','$field', '$gender','$stage','$season','$description')";
		return mysqli_query($conn, $sql); //執行SQL
	} else return false;
}
 ?>
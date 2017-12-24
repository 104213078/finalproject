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


?>
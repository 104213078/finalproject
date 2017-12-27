<?php
session_start();
require("dbconnect.php"); //匯入連結資料庫之共用程式碼

function checkUP($userName,$passWord) {
	global $conn;
	$userName = mysqli_real_escape_string($conn,$userName); //將特殊SQL字元編碼，以免被SQL Injection
	$sql = "SELECT pwd, id FROM user WHERE uid='$userName'"; //產生SQL指令
	if ($result = mysqli_query($conn,$sql)) { //執行SQL查詢
		if ($row=mysqli_fetch_assoc($result)) { //取得第一筆資料
			if ($row['pwd'] == $passWord) { //比對密碼
				//keep the user ID in session as a mark of login
				return $row['id'];
			} else {
				//print error message
				return 0;
			}
		} else {
				return 0;
		}
	} else{
		return 0;
	}
}

function isAdmin($uID){
	global $conn;
	$uid=(int)$uID;
	$sql = "SELECT level FROM user WHERE id=$uID"; //產生SQL指令
	if ($result = mysqli_query($conn,$sql)) { //執行SQL查詢
		if ($row=mysqli_fetch_assoc($result)) {
			if ($row['level'] == 1) 
				return true;
		}
	}
	return false;
}

?>

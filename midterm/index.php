<?php
session_start(); //啟用session 變數功能
require("dbconnect.php"); //匯入連結資料庫之共用程式碼
if (! isset($_SESSION["uID"])) //檢查紀錄login成功所用的session變數是否已被定義
	$_SESSION["uID"] = 0; //若沒有->定義此變數，並設初值為0 (未登入)
	header("Location: view.php");
if ($_SESSION["uID"] <= 0) { //如果未登入, 輸出請登入之訊息
	//header("Location: login.php");
	echo "Please Login. <hr /><a href='loginForm.php'>Login</a>";
	exit(0);//結束程式
}
?>
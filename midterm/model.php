<?php
require("dbconnect.php");

//列出所有書單
function getBookList() {
	global $conn;
	//$sql = "SELECT book.*, user.name FROM book, user WHERE book.uID=user.id";
	$sql = "SELECT book.*, user.name FROM book, user WHERE book.uID=user.id ORDER BY book.likebook DESC"; //DESC, ASC
    return mysqli_query($conn, $sql);
}

//列出個人書單
function getMyBookList($id) {
	global $conn;
    $id=(int)$id;
	$sql = "SELECT * FROM `book` WHERE book.`uID`=$id";
	return mysqli_query($conn, $sql);
}

//刪除書單
function deleteBook($id) {
	global $conn;
	//對$id 做基本檢誤
	$id = (int) $id;
	
	//產生SQL
	$sql = "delete from book where id=$id;";
	return mysqli_query($conn, $sql); //執行SQL
}

//新增書單
function insertBook($title='', $author='', $lang='', $uID) {
	global $conn;
	if ($title > ' ') {
		//基本安全處理
		$title=mysqli_real_escape_string($conn, $title);
		$author=mysqli_real_escape_string($conn, $author);
        $lang=mysqli_real_escape_string($conn, $lang);
		$uID=(int)$uID;
		
		//Generate SQL
		$sql = "insert into book (title, author, lang, uID) values ('$title','$author', '$lang', $uID);";
		return mysqli_query($conn, $sql); //執行SQL
	} else return false;
}

//列出書單內容
function getBookDetail($id) {
	global $conn;
	if($id >0 ) {
		$sql = "select book.*, user.name from book, user where book.uID=user.id and book.id=$id;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message."); //執行SQL查詢
	} else {
		$result = false;
	}
	return $result;
}

//更新書單
function updateBook($id, $title, $author, $lang) {
	global $conn;
	$title=mysqli_real_escape_string($conn,$title);
	$author=mysqli_real_escape_string($conn,$author);
	$lang=mysqli_real_escape_string($conn,$lang);
	$id = (int)$id;
	if ($title and $id) { //if title is not empty
		$sql = "update book set title='$title', author='$author', lang='$lang' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

//按讚
function likeBook($id) {
	global $conn;
	//對$id 做基本檢誤
	$id = (int) $id;
    
	//產生SQL
	$sql = "update book set likebook = likebook +1 where id=$id;";
	return mysqli_query($conn, $sql); //執行SQL
}

//按噓
function likeCancel($uID, $bkID) {
	global $conn;
	//對$id 做基本檢誤
	$uID = (int) $uID;
    $bkID = (int) $bkID;
	
	//產生SQL
	$sql = "delete from `likebk` where uID=$uID and bkID=$bkID;";
	return mysqli_query($conn, $sql); //執行SQL
}

//新增留言
function insertComment($bkID, $msg, $uID) {
	global $conn;
	if ($msg > ' ') {
		//基本安全處理
		$bkID=(int) $bkID;
		$msg=mysqli_real_escape_string($conn, $msg);
		$uID=(int)$uID;
		
		//Generate SQL
		$sql = "insert into comment (bkID, msg, uID) values ($bkID, '$msg', $uID);";
		return mysqli_query($conn, $sql); //執行SQL
	} else return false;
}

//列出留言
function getComment($bkID) {
	global $conn;
	//$sql = "select * from guestbook;";
	$sql = "select comment.*, user.name as userName from comment, user where comment.uID=user.id and comment.bkID=$bkID";
	return mysqli_query($conn, $sql);
}

//刪除留言
function deleteComment($id) {
	global $conn;
	//對$id 做基本檢誤
	$id = (int) $id;
	
	//產生SQL
	$sql = "delete from comment where id=$id;";
	return mysqli_query($conn, $sql); //執行SQL
}

function check ($uID, $bkID) {
    global $conn;
    //對$id 做基本檢誤
	$uID = (int) $uID;
    $bkID = (int) $bkID;
    
    //產生SQL
	$sql = "SELECT * FROM `likebk` WHERE likebk.uID=$uID and likebk.bkID=$bkID";
    return mysqli_query($conn, $sql);
}
/*
function check ($id) {
    global $conn;
    //對$id 做基本檢誤
	$id = (int) $id;
    
    //產生SQL
	$sql = "SELECT * FROM `book` WHERE book.id=$id";
    return mysqli_query($conn, $sql);
}
*/

function repeat ($uID, $bkID) {
    global $conn;
	//對$id 做基本檢誤
	$uID = (int) $uID;
	$bkID = (int) $bkID;
    
	//產生SQL
	$sql = "INSERT INTO `likebk` (`uID`, `bkID`) VALUES ($uID, $bkID);";
	return mysqli_query($conn, $sql);
}
/*
function repeat ($uID, $bid) {
    global $conn;
	//對$id 做基本檢誤
	$id = (int) $id;
	
	//產生SQL
	$sql = "update book set `$user` = `$user` +1 where id=$id;";
	return mysqli_query($conn, $sql);
}
*/

function views ($bkID) {
    global $conn;
	//對$id 做基本檢誤
	$bkID = (int) $bkID;
	
	//產生SQL
	$sql = "update book set views = views +1 where id=$bkID;";
	return mysqli_query($conn, $sql);
}
?>
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
function insert_img ($src='', $b_name='', $b_stage='', $date='', $author='') {
    global $conn;
	if ($src > ' ') {
		//基本安全處理
        $src=mysqli_real_escape_string($conn,$src);
        $b_name=mysqli_real_escape_string($conn,$b_name);
        $b_stage=mysqli_real_escape_string($conn,$b_stage);
        $date=mysqli_real_escape_string($conn,$date);
        $author=mysqli_real_escape_string($conn,$author);
        //$uID=(int)$uID;
		
        //Generate SQL
        $sql = "insert into img (src, b_name, b_stage, date, author) values ('$src', '$b_name', '$b_stage', '$date', '$author');";
        return mysqli_query($conn, $sql); //執行SQL
	} else return false;
}

function getButterflyList() {
    global $conn;
	$sql = "SELECT * FROM `butterfly`";
	return mysqli_query($conn, $sql);
}
function deleteimg($id){
    global $conn;
    $id = (int) $id;
    $sql = "delete from img where id=$id;";
    return mysqli_query($conn, $sql);
}
function showButterfly() {
    global $conn;
	$sql = "SELECT * FROM `img`";
	return mysqli_query($conn, $sql);
}
function updatedata($id,$b_name,$b_stage,$date,$author){
	global $conn;
	$b_name=mysqli_real_escape_string($conn,$b_name);
	$b_stage=mysqli_real_escape_string($conn,$b_stage);
	$date=mysqli_real_escape_string($conn,$date);
	$author=mysqli_real_escape_string($conn,$author);
	$id = (int)$id;
	if ($b_name and $id) { //if title is not empty
		$sql = "update img set b_name='$b_name',b_stage='$b_stage' ,date='$date',author='$author' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}
function search($name, $season, $stage) {
    global $conn;
	if($name == '--') {
		if($season == '--') {
			if($stage == '--') {
				$sql = "SELECT * FROM `butterfly` , `img` name = b_name AND stage = b_stage";
			} else {
				$sql = "SELECT * FROM `butterfly`, `img` WHERE stage LIKE $stage AND name = b_name AND stage = b_stage";
			}
		} else {
			if($stage == '--') {
				$sql = "SELECT * FROM `butterfly`, `img` WHERE season LIKE $season AND name = b_name AND stage = b_stage";
			}
			else {
				$sql = "SELECT * FROM `butterfly`, `img`WHERE season LIKE $season AND stage LIKE $stage AND name = b_name AND stage = b_stage";
			}
		}
	}else {
		if($season == '--') {
			if($stage == '--') {
				$sql = "SELECT * FROM `butterfly`, `img`WHERE name LIKE $name AND name = b_name AND stage = b_stage";
			} else {
				$sql = "SELECT * FROM `butterfly`, `img`WHERE name LIKE $name AND stage LIKE $stage AND name = b_name AND stage = b_stage";
			}
		} else {
			if($stage = '--') {
				$sql = "SELECT * FROM `butterfly`,`img` WHERE season LIKE $season AND name LIKE $name AND name = b_name AND stage = b_stage";
			} else {
				$sql = "SELECT * FROM `butterfly`, `img` WHERE season LIKE $season AND name LIKE $name AND stage LIKE $stage AND name = b_name AND stage = b_stage";
			}
		}
	}
	return mysqli_query($conn, $sql);
}
function showMyButterfly($uid){
	global $conn;
	$sql = "SELECT `img`.src,`img`.id FROM `img`, `user` WHERE img.author=user.name and user.id=$uid ";
	return mysqli_query($conn, $sql);
}
?>
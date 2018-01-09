<?php
session_start();
require_once('model.php');
require_once('loginModel.php');
$action =$_REQUEST['act'];
switch ($action) {
case 'insert':
    $src=$_REQUEST['src'];
    $b_name=$_REQUEST['b_name'];
    $b_stage=$_REQUEST['b_stage'];
    $date=$_REQUEST['date'];
    $author=$_REQUEST['author'];
    
    insert_img ($src, $b_name, $b_stage, $date, $author);
    break;
	
case 'update':
    $id = (int) $_REQUEST['id'];
    $b_name=$_REQUEST['b_name'];
    $b_stage=$_REQUEST['b_stage'];
    $date=$_REQUEST['date'];
    $author=$_REQUEST['author'];
	updatedata($id,$b_name,$b_stage,$date,$author);
    break;
    
case 'delete':
    $id = (int) $_REQUEST['id'];
    if ($id > 0 and isAdmin($_SESSION['uid'])) {
		deleteimg($id);
	}
    break;

case 'search':
    $name=$_REQUEST['name'];
    $season=$_REQUEST['season'];
    $stage=$_REQUEST['stage'];
    echo show_results($name, $season, $stage);
	break;

case 'edit':
    $id = (int) $_REQUEST['id'];
    $name=$_REQUEST['name'];
    $nickname=$_REQUEST['nickname'];
    $field=$_REQUEST['field'];
    $gender=$_REQUEST['gender'];
    $stage=$_REQUEST['stage'];
    $season=$_REQUEST['season'];
    $description=$_REQUEST['description'];
	editdata($id,$name,$nickname,$field,$gender,$stage,$season,$description);
    break;
}
?>
<?php
if($action =='update'){
    header('Location: user_edit.php');	
}
if($action =='insert'){
    header('Location: user_upload.php');	
}
if($action =='delete'){
    header('Location: user_edit.php');	
}
if($action =='edit'){
    header('Location: user_edit.php');	
}	
?>
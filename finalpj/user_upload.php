<?php
 session_start();
 //require("dbconnect.php");
 require('loginmodel.php');
 require('model.php');
 //set the login mark to empty
 if ( ! isset($_SESSION['uid']) or $_SESSION['uid'] <= 0) {
 	header("Location: login.php");
 	exit(0);
 }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
<link type="text/css" rel="stylesheet" href="user_upload.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function (e) {
    $(function() {
    $("#file").change(function(e) {
        e.preventDefault();
        $("#info").empty(); // To remove the previous error info
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
            //$('#upload_icon').attr('src','noimage.png');
            $("#info").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_info'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        }
        else
        {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            
            var data;
            data = new FormData();
            data.append('file', $( '#file' )[0].files[0] );
            
            $.ajax({
            url: "user_upload_control.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#info").empty();
                $("#info").html(data);
            }
            
        })
        }

        });
    });
    function imageIsLoaded(e) {
        $("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#upload_icon').attr('src', e.target.result);
        //$('#upload_icon').attr('width', '250px');
        //$('#upload_icon').attr('height', '40%');
    };
});
</script>
</head>
<body>
<div class="box" id="box1"></div>
<div class="box" id="box2"></div>
<div id="t">
<?php
$user=checkUser($_SESSION['uid']);
$u=mysqli_fetch_array($user);
echo "<div id='user_show'><img src='image/圖片5.png' id='user_name' title='",$u['name'],"'/>","</div>";
?>
<div id="menu">
<img src="image/title.png" id="title"/>
<button class="tool" onclick="location.href='user_edit.php'">Edit</button><br />
<button class="tool" onclick="location.href='user_upload.php'">Upload</button><br />
<button class="tool" onclick="location.href='user_myview.php'">Myview</button>
</div>
<a href='homepage.php'><img src="image/logout.png" id="logout"/></a>
</div>
<div id="content">

<table id="f_p">
<td class="up_p" ><label id="upload_cover">
<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<div id="image_preview"><img id="upload_icon" src="image/p.png" /></div>
<input type="file" name="file" id="file" class="upload_input" />
</form></label></td></table>
<form method="post" action="control.php" enctype="multipart/form-data">
<input name='act' type='hidden' value='insert' />
<div id="info">

<table id="f">
    <tr><th>名稱</th><td class="up_d"><div class='h'><label><select name='b_name'>
<?php
$results=getButterflyList();
$n='';
echo "<option>--</option>";
while ($rs=mysqli_fetch_array($results)) {
    if ($rs['name']!=$n) {
        echo "<option>", $rs['name'], "</option>";
        $n=$rs['name'];
    }
}
echo "</label></div></td></tr>";
?>
<tr><th>階段</th><td class="up_d"><div class='h'><label><select name="b_stage">
        <option >幼蟲期</option>
        <option >變態期</option>
        <option >成蟲期</option>
</select></label></div></td></tr>
<tr><th>日期</th><td class="up_d"><div class='h'><label>
        <input type="text" name="date" />
</label></div></td></tr>
<tr><th>作者</th><td class="up_d"><div class='h'><label>
        <input type="text" name="author" />
</label></div></td></tr>
</table>
</div>
<div id="bu">
<input type="submit" class="button" value="Submit" />
</div></form>

</div>
<script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="bg.js"></script>
</div>
</body>
</html>

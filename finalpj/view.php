<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Picture</title>
<link type="text/css" rel="stylesheet" href="view.css">
</head>
<body>
<h1>Picture Ablum</h1>
<div id="content">
<div id="search">
<form method='post' action='control.php'>
<td><label>Name<select name='name' value='name'>
<?php
require("model.php");
$results=getButterflyList();
global $i;
$i=1;
while ($rs=mysqli_fetch_array($results)) {
    if ( ($i%3) == 1) {
        echo "<option>", $rs['name'], "</option>";
    }
    $i++;
}
?>
</select></label></td>
<td><label>Season<select name="season">
        <option>春</option>
        <option>夏</option>
        <option>秋</option>
        <option>冬</option>
</select></label></td>
<td><label>Stage<select name="stage">
        <option>幼蟲期</option>
        <option>變態期</option>
        <option>成蟲期</option>
</select></label></td>
<input type="submit" class="button" value="Submit" />
<a href='login.php'>login</a>
</form>
</div>
<div id="show">
<?php
$results=getButterflyList();
$i=1;
echo "<table class='pic' >";
while ($rs=mysqli_fetch_array($results)) {
    if ($i%4==1) 
        echo "<tr>";
    echo "<td background='image/", $rs['name'], "-", $rs['stage'], ".jpg' class='img'></td>";
    if ($i%4==0)
        echo "</tr>";
    $i++;
}
echo "</table>";
?>
</div>
</div>
</body>
</html>

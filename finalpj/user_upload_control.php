<?php
header('Content-Type: text/html; charset=utf8');

$a= $_FILES["file"]["name"];;
$b="upload/".$a;
$exif = exif_read_data($b, 0, true);
//echo "<pre>", print_r($exif), "</pre>";

    $str = ($exif['IFD0']['ImageDescription']);
    $str_sec = explode("-",$str);
    $b_name=$str_sec[0];
    $b_stage=$str_sec[1];
    $src=$exif['FILE']['FileName'];
    $date=$exif['EXIF']['DateTimeOriginal'];
    $author=$exif['IFD0']['Artist'];

echo "<input type='hidden' name='src' value=",$src," />";

echo "<table id='f'>";
echo "<tr><th>名稱</th><td class='up_d'><select name='b_name'>";

require('model.php');
$results=getButterflyList();
$n='';
//echo "<option>--</option>";
while ($rs=mysqli_fetch_array($results)) {
    if ($rs['name']!=$n) {
        echo "<option ";
        if ($rs['name']==$b_name)
            echo "selected";
        echo ">", $rs['name'],"</option>";
        $n=$rs['name'];
    }
}
echo "</select></label></td></tr>";
echo "<tr><th>階段</th><td class='up_d'><label><select name='b_stage'>";
    echo "<option ";  if ($b_stage=='幼蟲期') echo 'selected'; echo ">幼蟲期</option>";
    echo "<option ";  if ($b_stage=='變態期') echo 'selected'; echo ">變態期</option>";
    echo "<option ";  if ($b_stage=='成蟲期') echo 'selected'; echo ">成蟲期</option>";
echo "</select></label></td></tr>";
echo "<tr><th>日期</th><td class='up_d'><label>",
        "<input type='text' name='date' value="; echo $exif['EXIF']['DateTimeOriginal'];
echo " /></label></td></tr>";
echo "<tr><th>作者</th><td class='up_d'><label>",
        "<input type='text' name='author' value="; echo $exif['IFD0']['Artist'];
echo " /></label></td></tr>";
echo "</table>";
//echo "</div><div id='bu'><input type='submit' class='button' value='Submit' /></div></form>";

?>
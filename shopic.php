<?php

$id=$_REQUEST['id'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("auto");
$res=mysql_query("select image from data2 where d_email='$id'") or die(mysql_error());
$row=mysql_fetch_array($res) or die(mysql_error());
header("Content-Type: image/jpeg");
echo $row['image'];
mysql_close($con);
?>
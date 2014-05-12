<?php
if(isset($_GET['q']))
{
	
	$email=$_GET['q'];
	#echo $email;
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("auto");
	$res=mysql_query("select * from user where email='$email'") or die(mysql_error());
	$row=mysql_fetch_array($res);
	#echo $row['email'];
	$num=mysql_num_rows($res);
	#echo $num;
	if($num)
	{
		echo "<!DOCTYPE html><html><body><h3 style='color:RED;'>Not Available!!</h3></body></html>";
	}
	else
	{
		echo "<!DOCTYPE html><html><body><h3 style='color:GREEN;'>Available!!</h3></body></html>";
	}
}
?>
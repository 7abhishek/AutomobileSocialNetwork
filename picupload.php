<?php
session_start();
$id=$_SESSION['id'];

if(isset($_FILES["pic"]["name"])&&($_FILES["pic"]["name"]!=""))
{
	
	
	$pic=uniqid().$_FILES["pic"]["name"];
	$file=$_FILES["pic"]["tmp_name"];
	$path1="d:/xampp/htdocs/final/upload/".$pic;
	
	move_uploaded_file($_FILES["pic"]["tmp_name"],$path1);
	$path2="http://localhost/final/upload/".$pic;
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("auto");
	$res=mysql_query(" insert into profilepic(email,path) values('$id','$path2') ") or die(mysql_error());
	
	$res2=mysql_query("select path from profilepic where email='$id' order by p_id desc") or die(mysql_error());
	$row=mysql_fetch_array($res2);
	
	echo "<!DOCTYPE html><html><body><img src='".$row['path']."'></body></html>";
	mysql_close($con);

}
else
{
	
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("auto");
	$res2=mysql_query("select path from profilepic where email='$id' order by p_id desc") or die(mysql_error());
	if(!mysql_num_rows($res2))
	{
	echo "<!DOCTYPE html><html><body><h3>Choose a profile picture</h3></body></html>";	
	}
	$row=mysql_fetch_array($res2);
	#echo $row['path'];
	
	
	echo "<!DOCTYPE html><html><body><img src='".$row['path']."'></body></html>";
	mysql_close($con);
}

?>	
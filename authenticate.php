<?php
session_start(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$email=$_REQUEST['mail'];
$pass=$_REQUEST['pass'];

$pss=md5($pass);
$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto") or die(mysql_error());
$res=mysql_query("select * from login_table where email='$email' and password='$pss'") or die(mysql_error());
$ress=mysql_query("select name from user where email='$email'") or die(mysql_error());
$roww=mysql_fetch_array($ress);


if(mysql_num_rows($res))
{
	echo mysql_num_rows($res);
	echo $pss;
	echo "hello";
	if(isset($_REQUEST['distributor']))
	{
		$dis=mysql_query("select name from distributor where email='$email'") or die(mysql_error());
		if(mysql_num_rows($dis))
		{
			
			$_SESSION['dis']=$_REQUEST['mail'];
			$_SESSION['dname']=$roww['name'];
			$name=$_SESSION['dname'];
			$name=str_replace("'","",$name);
			$sesid=$_SESSION['dis'];
			mysql_query("update onlinestatus set status='online' where email='$sesid' ");
			header("Location:http://localhost/final/distributor.php?dname=$name");	
			
		}
		else
		{
			header("Location:http://localhost/final/welcome.php?error=error");
		}
	}
	if(!(isset($_REQUEST['distributor'])))
	{
		$dis=mysql_query("select name from distributor where email='$email'") or die(mysql_error());
		if(mysql_num_rows($dis))
		{
			header("Location:http://localhost/final/welcome.php?error=error");
		}
		else
		{
			;
		$_SESSION['id']=$_REQUEST['mail'];
		$_SESSION['name']=$roww['name'];
		$name=$_SESSION['name'];
		$name=str_replace("'","",$name);
		$sesid=$_SESSION['id'];
	
		header("Location:http://localhost/final/firstpage.php?name=$name");
		mysql_query("update onlinestatus set status='online' where email='$sesid' ");
		}
	}
	
}
else
{
	
	echo mysql_num_rows($res)."<br>";
	
	echo md5("hello");
    header("Location:http://localhost/final/welcome.php?error=error");
}
?>
<body>
</body>
</html>
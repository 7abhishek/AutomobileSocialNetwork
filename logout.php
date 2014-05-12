<?php
session_start();
$sesid=$_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("auto");
	mysql_query("update onlinestatus set status='offline' where email='$sesid' ");
	mysql_close($con);
	session_destroy();
	session_destroy();
	session_unset();
	header("Location:http://localhost/final/welcome.php");

?>
</body>
</html>
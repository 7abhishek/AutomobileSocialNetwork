<?php
session_start();
$sesid=$_SESSION['id'];
$name=$_SESSION['name'];
$mail=$_REQUEST['email_id'];
$con=mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("auto");
$res=mysql_query("update friends set request='accepted' where u_email='$mail' and f_email='$sesid' ");
echo " <button disabled='disabled' class='btn btn-primary'> Friends</button>";
mysql_close($con);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
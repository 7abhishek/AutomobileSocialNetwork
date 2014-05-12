<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
// REPLACE "distributor@gmail.co" with the session email id...


$mysql=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto",$mysql)or die(mysql_error());
$row=mysql_query("select email,rqst,message from response,request where d_email='distributor@gmail.co' and response.rid=request.rid") or die(mysql_error());
echo "<table border='3' bordercolor='#CCFFFF' bgcolor='#CCCCFF'><tr><td><b>REQUESTED USER</td><td><b>REQUEST</td><td><b>RESPONSE</td></tr>";
while($res=mysql_fetch_array($row))
{
	echo "<tr><td>".$res['email']."</td><td>".$res['rqst']."</td><td>".$res['message']."</td></tr>";
}
echo "</table>";
?>
</body>
</html>
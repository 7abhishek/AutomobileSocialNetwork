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
$row=mysql_query("select email,rqst,rid from request where not exists (select * from response where d_email='distributor@gmail.co' and request.rid=response.rid)")or die(mysql_error());
echo "<table border='3'><tr><td><h4>E-Mail ID</td></h4><td><h4>REQUEST</td></h4></tr>";
while($res=mysql_fetch_array($row))
{
	echo "<form action='distributor.php' method='post'>";
	echo "<tr><td>".$res['email']."</td><td>".$res['rqst']."<br>";
	echo "<input type='hidden' value='".$res['rid']."' name='rid'>";
	echo "<input type='text' name='response_msg' placeholder='enter text to respond..'><input type='submit' value='RESPOND'></form></td></tr>";
}
echo "</table>";	
?>
</body>
</html>
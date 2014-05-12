<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location:http://localhost/final/welcome.php");
}
$sesid=$_SESSION['id'];
$sname=$_SESSION['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    
    <title> SAVE FUEL ♥ </title>
  <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxSPW5CJgpdgO_s4yyMovOaVh_KvvhSfpvagV18eOyDWu7VytS6Bi1CWxw"
      type="text/javascript">
      </script>
      <script src="jquery-1.9.1.js"></script>
      <script>
	  $(document).ready(function(e) {
        
    
	  $("#latform").submit();
	  });
	  </script>
</head>
<body>
<?php

function getlet($address)
{
 $prepAddr = str_replace(' ','+',$address);
 $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
 $output= json_decode($geocode);
 $lat = $output->results[0]->geometry->location->lat;
 $long = $output->results[0]->geometry->location->lng;
 $latlong['lat']=$lat;
 $latlong['long']=$long;
 return $latlong;
}

$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto");
$res=mysql_query(" (select f_email as email from friends where u_email='$sesid' and request='accepted') union (select u_email as email  from friends where f_email='$sesid' and request='accepted')") or die(mysql_error());

$num=mysql_num_rows($res);

echo"<form action='carpool.php' method='get' id='latform'>";
echo "<input type='text' name='num' value=".$num."><br>";
$i=1;
while($row=mysql_fetch_array($res))
{
	echo $row['email']."<br>";
	$mail=$row['email'];
	$ad=mysql_query("select email,name,address from user where email='$mail' ") or die(mysql_error());
	$roo=mysql_fetch_array($ad);
	$latlong=getlet($roo['address']);
	
	echo "<input type='text' value=".$mail." name='email'".$i.">";
	echo"<input type='text' value=".$latlong['lat']." name='lat'".$i."><input type='text' value=".$latlong['long']." name='long'".$i."><br>";
	$i++;	
}
echo "</form>";
?>
</body>
</html>

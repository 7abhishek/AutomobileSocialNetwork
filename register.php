<html>
<head>
<script src="jquery-1.9.1.js">
</script>
<script>
$(document).ready(function(){
	$("#loading").show(4000);
	$("#loading").css("display","none");
		    
});
</script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<style>
#loading
{
	
}
</style>
</head>
<body><div id="loading" class="span1" ><img src='loading1.gif'></div>
<?php
$name=$_POST['name'];
$email=$_POST['email'];
$pass=md5($_POST['pass']);
$gender=$_POST['gender'];
$vname=$_POST['vname'];
$age=$_POST['age'];
$vtype=$_POST['vtype'];
$vcap=$_POST['vcap'];
$addr=$_POST['addr'];
if(isset($_POST['distri'])&&$_POST['distri']=="set")
{
echo "dfjksd";
}

$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto");

$rep=mysql_query("select * from user where email='$email'");
if(mysql_num_rows($rep))
{
	die("<h3 style='color:WHITE;'>USER ALREADY EXISTS!!</h3>");
}


$vn=mysql_query("select vno from vehicles where type='$vtype' and capacity='$vcap'") or die(mysql_error());
$vno=mysql_fetch_array($vn) or die(mysql_error());
echo $vno['vno'];
$vnum=$vno['vno'];

$res=mysql_query("insert into user values ('$email','$name','$age','$gender','$vnum','$vname','$addr')") or die(mysql_error());
if(isset($_POST['distri'])&&($_POST['distri']=="set")&&isset($_POST['specs']))
{
	$spec=$_POST['specs'];
	$dd=mysql_query("insert into distributor values('$name','$email','$spec') ") or die(mysql_error());
echo "distributor added";
}

$res1=mysql_query("insert into login_table values ('$email','$pass')") or die(mysql_error());

$res2=mysql_query("insert into onlinestatus values ('$email','offline')") or die(mysql_error());
mysql_close($con);
echo "</body></html>";
?>
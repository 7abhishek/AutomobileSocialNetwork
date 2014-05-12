<?php
session_start();
$sesid=$_SESSION['id'];
$sesname=$_SESSION['name'];
?>
<html>
<?php
if(isset($_GET['p'])&&isset($_GET['q']))
{
$text="<b style='color:BLUE;'>".$sesname."</b>: ".$_GET['q'];
$frn=$_GET['p'];
echo "<body >";

$mysql=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto",$mysql)or die(mysql_error());
$frr=mysql_query("select email from user where name='$frn'") or die(mysql_error());
$frnn=mysql_fetch_array($frr);
$frrn=$frnn['email'];
if($frn!='SELECT A FRIEND')
{
	$mysql=mysql_query("(select chatfile from friends where u_email='$sesid' and f_email='$frrn') union (select chatfile from friends where u_email='$frrn' and f_email='$sesid')")or die(mysql_error());
	$row=mysql_fetch_array($mysql);
	$fname=$row['chatfile'];
	if($fname==NULL)
	{
	$file=$frn.$sesname;
	$fname=$frn.$sesname.".txt";
	$mysql=mysql_query("update friends set chatfile='$fname' where (u_email='$sesid' and f_email='$frrn') or (u_email='$frrn' and f_email='$sesid') ") or die(mysql_error());
	}
		


$File = $fname; 
$Handle = fopen($File, 'a+')or die('chat file not created: '.$fname);
fwrite($Handle, $text);
fwrite($Handle, "<br>");
$content=file_get_contents($File);
print $content;
fclose($Handle); 
}


else
	{
		echo "select a friend to chat..!!";
	}
}
else if(isset($_GET['p']))
{
	$frn=$_GET['p'];
	echo "<body >";
	$mysql=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto",$mysql)or die(mysql_error());
	$frr=mysql_query("select email from user where name='$frn'") or die(mysql_error());
	$frnn=mysql_fetch_array($frr);
	$frrn=$frnn['email'];
	if($frn!='SELECT A FRIEND')
	{
		$mysql=mysql_query("(select chatfile from friends where u_email='$sesid' and 	f_email='$frrn') union (select chatfile from friends where u_email='$frrn' and f_email='$sesid')")or die(mysql_error());
		$row=mysql_fetch_array($mysql);
		$fname=$row['chatfile'];
		if($fname==NULL)
		{
			$file=$frn.$sesname;
			$fname=$frn.$sesname.".txt";
				$mysql=mysql_query("update friends set chatfile='$fname' where (u_email='$sesid' and f_email='$frrn') or (u_email='$frrn' and f_email='$sesid') ") or die(mysql_error());
		}
		


		$File = $fname; 
		$content=file_get_contents($File);
		print $content;
		 
	}

}
?>
</body>
</html>
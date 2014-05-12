<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jquery-1.9.1.js">
</script>
<script>
function loadXML()
{
	var str="hi";
	
	var frn="hi";
	frn=document.getElementById("frn1").value;
	
	str=document.getElementById("textarea1").value;
	alert(str);
	if (str=="")
	{
		return;
	}
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	
	}
	else
  	{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function()
  	{
	  if(xmlhttp.readyState==4 && xmlhttp.status==200)
	  document.getElementById("msg").innerHTML=xmlhttp.responseText;
	  document.getElementById("textarea1").value="";
  	}
    xmlhttp.open("GET","chatfiles/kumarkashif.php?q="+str+"&p="+frn,true);
	xmlhttp.send();
}

</script>

<style>
.box
{
	height:600px;
	width:600px;
	border-image-width:auto;
	border-color:#000;
}
.messages
{
	height:75%;
	width:100%;
	background-color:#9FF;
	border-color:#000;
	border:solid;
}
.textarea
{
	height:25%;
	width:100%;
	background-color:#CCC;
	border-color:#000;
	border:solid;
}
</style>
</head>

<body>
<?php
$mysql=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("demo",$mysql)or die(mysql_error());

//after creating sessions replace "kashif" with user's name..

$row=mysql_query("select friend,user from friends where user='kashif' or friend='kashif'")or die(mysql_error());
echo "<select name='friend' size='1' id='frn1'";
echo "<option>SELECT A FRIEND<selected>";
echo "<option>SELECT A FRIEND<selected>";
while($data=mysql_fetch_array($row))
{
	if($data['friend']!='kashif')
	echo "<option>".$data['friend'];
	if($data['user']!='kashif')
	echo "<option>".$data['user'];
}
echo "</select>";

/*if($_POST['friend']!='SELECT A FRIEND')
{
	$frnd=$_POST['friend'];
	$mysql=mysql_query("select chatfile from friends where (friend='kashif' or user='kashif')and(user='$frnd' or friend='$frnd') ");
	$row=mysql_fetch_array($mysql);
	$fname=$row['chatfile'];
	if($fname==NULL)
	{
	$file=$_POST['friend']."kashif";
	$fname="chatfiles/".$_POST['friend']."kashif".".txt";
	}
	echo $fname;
	$file=fopen($fname,"a")or die('chat file not created: '.$fname);
*/
	echo "<div class='box'><div class='messages' id='msg'>
fgm
</div>
<div class='textarea'><textarea  cols='25' rows='5' id='textarea1' placeholder='write here to chat...' required='required' name='meassage' >
</textarea> </br><button type='submit' value='done' onclick='loadXML()'>DONE</button>
 </div>
</div>
";
/*}
else
	{
		echo "select a friend to chat..!!";
	}*/
?>
</body>
</html>
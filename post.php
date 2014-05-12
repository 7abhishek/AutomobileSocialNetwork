<?php
session_start();
$sesid=$_SESSION['id'];
$sesname=$_SESSION['name'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto");
$prof=mysql_query("select path,p_id from profilepic where email='$sesid' order by p_id desc") or die(mysql_error());
$pic=mysql_fetch_array($prof);
$profpic=$pic['path'];
mysql_close($con);
?>
<html>
<head>
<link rel="stylesheet" href="video-js/video-js.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />

<script src="video-js/video.js"> </script>
<script>
    _V_.options.flash.swf = "video-js.swf";
	 </script>
<script src="jquery.form.js">
</script>
<script>
function show(code)
{
	alert("this is "+code);
}
function del(did)
{
	
}
</script>
<style>
#posts
{
font-size:20px;
background-color:#FFFFFF;
border:solid 1px #dedede;
height:40%;
word-wrap:break-word;

}
#tex,#imgs 
{
margin-left:2%;
margin-top:2%;	
}

#iposts 
{
	
	background-color:#FFFFFF;
	border:solid 1px #dedede;
	padding:10px;
	alignment-adjust:middle;
	
}
#iposts img
{
	width:20%;
	height:auto;
}
#vposts
{
	background-color:#FFFFFF;
	border:solid 2px #dedede;
	padding:10px;
	alignment-adjust:middle;

}
#pic
{
	float:left;
	border:2px WHITE solid;
	padding:2px;
	width:7%;
	height:5%;
	
}
#name
{
	color:WHITE;
	font-weight:bold;
}
</style>
</head>
<body>
<?php
# post text posts
if(isset($_GET['q'])&& isset($_REQUEST['tdelcode']))
{
	$tdelc=$_REQUEST['tdelcode'];
	$text=$_GET["q"];
	$timestamp=time();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("auto");
	$res=mysql_query("insert into data (did,delcode,d_email,pdata,type) values ('$timestamp', '$tdelc','$sesid','$text','text')") or die(mysql_error());
	$resu=mysql_query("select delcode,pdata,type,did from data where d_email='$sesid' order by did desc") or die(mysql_error());
	$i=0;
	
	while($row=mysql_fetch_array($resu))
	{
	$i++;
		if($row['type']=="text")
		{
			echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='posts'><h2 id='tex'>"; #display text posts
			echo $row['pdata'];
			echo "</h2></div>";
			#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>"; 
			print "<br>";  
		}
		if($row['type']=="image")
		{
		echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='iposts'>";
		echo "<img src='".$row['pdata']."'>"; #display image posts
		echo "</div>";
		#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>"; 
		print "<br>";
		}
		if($row['type']=="video")
		{
			echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='vposts'>";
			echo "<video height='20%' width='50%' controls='controls'> <source src='".$row['pdata']."' type='video/mp4'></video>";
			echo "</div>";
			#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>"; 
			print "<br>";
		}
	}
	mysql_close($con);
}

#post image posts 
else if (isset($_FILES['uimage']['name']) && isset($_REQUEST['imdcode']))
{
	$idelc=$_REQUEST['imdcode'];
	echo $idelc;
	$pic=explode('.',$_FILES['uimage']['name']);
	$upic=uniqid().'.'.$pic[1];
	$type="image";
	$con=mysql_connect("localhost","root","");
	mysql_select_db("auto");
	#echo "hello darling".$upic;
	$timestamp1=time();
	$file=$_FILES['uimage']['tmp_name'];
	$path="d:/xampp/htdocs/final/upload2/".$upic; #don forget to change path during project export!!
	
	$path1="http://localhost/final/upload2/".$upic;
	move_uploaded_file($file,$path);
	$res=mysql_query("insert into data (did,delcode,d_email,pdata,type) values ('$timestamp1','$idelc','$sesid','$path1','image')") or die(mysql_error());
	$resu=mysql_query("select did,delcode,pdata,type from data where d_email='$sesid' order by did desc") or die(mysql_error());
	$i=0;

	while($row=mysql_fetch_array($resu))
	{
	$i++;
		if($row['type']=="text")
		{
			echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='posts'><h2 id='tex'>"; #display text posts
			echo $row['pdata'];
			echo "</h2></div>"; 
			#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>"; 
			print "<br>";  
		}
		if($row['type']=="image")
		{
		echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='iposts'>";
		echo "<img src='".$row['pdata']."'>"; #display image posts
		echo "</div>";
		#echo "<a href='https://www.google.com'>hello google</a>";
		#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>";          #store did in invisible text box , which is retrived in 															                                     firstpage.php
		print "<br>";
		}
		if($row['type']=="video")
		{
			echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div>div id='vposts'>";
			echo "<video height='20%' width='50%' controls='controls'> <source src='".$row['pdata']."' type='video/mp4'></video>";
			echo "</div>";
			#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>"; 
	      	print "<br>";
		}
	}
	mysql_close($con);
	
}
#post video posts

else if(isset($_FILES['uvideo']['name']))
{
$delc=$_REQUEST['vidcode'];	
echo $delc;
$file=$_FILES['uvideo']['tmp_name'];
$exten= explode(".",$_FILES['uvideo']['name']);
echo $exten[1];
$vid=uniqid().time().".".$exten[1]; # or use uniqid().time() for more uniqueness!!
#echo $file;
#echo $vid;	  

$path="d:/xampp/htdocs/final/upload3/".$vid;
$path1="http://localhost/final/upload3/".$vid;

$con=mysql_connect("localhost","root","");
mysql_select_db("auto");
$timestamp2=time();
$res=mysql_query("insert into data (did,delcode,d_email,pdata,type) values ('$timestamp2','$delc','$sesid','$path1','video')") or die(mysql_error());
move_uploaded_file($file,$path) or die(mysql_error());
echo $_FILES['uvideo']['size'];
$resu=mysql_query("select did,delcode,pdata,type from data where d_email='$sesid' order by did desc") or die(mysql_error());
while($row=mysql_fetch_array($resu))
	{
	
		if($row['type']=="text")
		{
			echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='posts'><h2 id='tex'>"; #display text posts
			echo $row['pdata'];
			echo "</h2></div>";
			#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;' onclick='show('".$row['delcode']."')'>"; 
			print "<br>";  
		}
		if($row['type']=="image")
		{
		echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='iposts'>";
		echo "<img src='".$row['pdata']."'>"; #display image posts
		echo "</div>";
		#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>"; 
		print "<br>";
		}
		if($row['type']=="video")
		{
			echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='vposts'>";
			echo "<video height='20%' width='50%' controls='controls'><source src='".$row['pdata']."' type='video/mp4'> </video>";
			echo "</div>";
			#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>"; 
			print "<br>";
		}
		
	}



mysql_close($con);


}
else
{
$con=mysql_connect("localhost","root","");
mysql_select_db("auto");
$resu=mysql_query("select did,delcode,pdata,type from data where d_email='$sesid' order by did desc") or die(mysql_error());
$i=0;
while($row=mysql_fetch_array($resu))
{
	$dd=$resu['did'];
$i++;
	if($row['type']=="text")
	{
		echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='posts'><h2 id='tex'> "; #display text posts
		echo $row['pdata'];
		echo "</h2>";
		print "<button type='button' id='$dd' class='btn btn-danger btn-mini' onclick='return del(this.id)'>delete</button></div>";
		#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;' onclick='return show(".$row['delcode'].")' >";
	
		
	}
	if($row['type']=="image")
	{
		echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='iposts'>";
		echo "<img src='".$row['pdata']."'>"; #display image posts
		echo "</div>";
		#echo "<input type='button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>";
		print "<button type='button' id='$dd' class='btn btn-danger btn-mini'>delete</button></div>";
		print "<br>";
	}
	if($row['type']=="video")
		{
			echo "<div id='pic'><img src='$profpic'></div><div id='name'>".$sesname."</div><div id='vposts'>";
			echo "<video height='20%' width='50%' controls='controls' > <source src='".$row['pdata']."' type='video/mp4'></video>";
			echo "</div>";
			#echo "<input type= 'button' value='".$row['did']."' class='".$row['delcode']."' style='display:inline;'>";
			print "<br>";
		}
}

mysql_close($con);
}
?>
</body>
</html>
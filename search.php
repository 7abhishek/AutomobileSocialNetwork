<?php
session_start();
if(!(isset($_SESSION['id'])))
{
	header("Location:http://localhost/final/welcome.php");
}

$sesid=$_SESSION['id'];
$name=$_SESSION['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jquery-1.9.1.js">
</script>
<script type="text/javascript">
$(document).ready(function(e) {
	$.ajax({
   			type: "POST",
		    url: "picupload.php",
			success:function(data){
			$("#pic").html(data);
				 }});
    
	

});
</script>

<script type="text/javascript">

function send(idd)
{
	alert("yupiie");
	var divid= document.getElementById(idd).className;
	alert(divid);
       $(document).ready(function(e) {
            
        
		$.ajax({
			type: "GET",
		   url: "sendrequest.php?email_id="+idd,
		   success:function(data){
			$("."+divid).html(data);
				}
		});
    });
	alert("over");
}


</script>
</head>
<style>
#title
{
	height: 2%;
	
}
#pic
{
	height: 8%;
	width: 6%;
	border: solid 1px #FFFBF0;
	padding: 10px;
}
#pfpics
{
	border: solid 1px #FFFBF0;
	padding: 10px;
}
#lgtbtn
{
	float:right;
	top:0px;
	position:relative;
}

	
</style>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<body>
<div class="form-actions">
<form id="title" class="">
<div id="pic" class="span5">
</div>

<div id="searchi" class="form-search span5">
&nbsp;
&nbsp;<br>
Search <input type="text" id="serchbox" name="searchn" required="required"/>
<button type="submit" formaction="search.php" class="btn btn-success" ><i class="icon-search"></i></button>
</div>
</form>
<form method="post" action="#">
<ul class="nav nav-pills">
<li id="Home" ><a href="http://localhost/final/firstpage.php?name=<?php echo $name;?>">
Home</a></li>
<li id="Friends"><a href="http://localhost/final/friends.php">Friends</a></li>
<li id="Gallery"><a href="http://localhost/final/gallery.php">Gallery</a></li>
<li id="carpool"><a href="http://localhost/final/carpool.php">Carpool</a></li>
<li id="freq" class="frequests"><a href ="http://localhost/final/friendrequest.php" class="freqs"><p id="fpil">Friend Requests</p></a></li>
</ul> 
</form>



<form action="http://localhost/final/logout.php" method="post">
<div id="lgtbtn" class="span3">
<button type="submit"  class="btn btn-danger"><i class="icon icon-remove-circle"></i>Logout</button>
</div>
</form>


</div>
<?php
$id=$_REQUEST['searchn'];

$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto") or die(mysql_error());
$res=mysql_query(" select name,email from user where name LIKE '%$id%' and email<>'$sesid' ") or die(mysql_error());
while($row=mysql_fetch_array($res))
{
	$email=$row['email'];
	$dis=mysql_query("select email from distributor where email='$email'") or die(mysql_error());
	if(mysql_num_rows($dis))
	{
		continue;
		
	}
	if($row['email']=='$sesid')
	{
		#$row=mysql_fetch_array($res);
		continue;
	}
	
	$umail=$row['email'];
	
	$uname=$row['name'];
	
	$acc=mysql_query("(select * from friends where u_email='$sesid' and f_email='$umail') union( select * from friends where u_email='$umail' and f_email='$sesid') ") or die(mysql_error());
	if(mysql_num_rows($acc))
	{
		$ee=mysql_fetch_array($acc);
		$stat=$ee['request'];
		if($stat=="accepted")
		{
			$stat="Friends";
		}
		$femail=$ee['f_email'];
		if($stat=="sent" and $femail=='$sesid')
		{
			$stat= "request has been sent to you";
		}
		else
	
		$stat="request ".$stat;
		
		
		$ress=mysql_query("select path from profilepic where email='".$row['email']."' order by p_id desc") or die(mysql_error());
	$roo=mysql_fetch_array($ress) or die(mysql_error());
	echo "<div ><form class='form-actions'><div class='span4'><img id='pfpics' src='".$roo['path']."' height='28%' width='28%' ></div> <div class='span4'><a href='#'>".$row['name']."</a></div><div class='".$uname."' id='".$umail."' title='".$uname."' >";
	echo "<input id='sendreq' type='button' class='btn btn-primary' disabled='disabled' value='".$stat."' title=".$umail.">&nbsp;";
	if($stat=="request has been sent to you")
	{
	  echo "<a href='http://localhost/final/friendrequest.php'><span class='label label-info'>Proceed to accept</span></a></div></form></div>";
	}
	else
	{
		echo "</div></form></div>";
	}
	
	}
	else
	{
	$ress=mysql_query("select path from profilepic where email='".$row['email']."' order by p_id desc") or die(mysql_error());
	$roo=mysql_fetch_array($ress) or die(mysql_error());
	echo "<div ><form class='form-actions'><div class='span4'><img id='pfpics' src='".$roo['path']."' height='28%' width='28%' ></div> <div class='span4'><a href='#'>".$row['name']."</a></div><div class='".$uname."' id='".$umail."' title='".$uname."' >";
	echo "<input id='sendreq' type='button' value='send request' class='btn btn-primary' onclick='send(this.title)' title=".$umail."></div></form></div>";
	}
}
mysql_close($con);
?>
</body>
</html>
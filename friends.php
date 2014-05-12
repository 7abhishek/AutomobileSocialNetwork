<?php
session_start();
$sesid=$_SESSION['id'];
$sesname=$_SESSION['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="bootstrap.css" rel="stylesheet" />
<script type="application/javascript" src="jquery-1.9.1.js">
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

<style>
#pic
{
	height: 28%;
	width: 36%;
	border: solid 1px #FFFBF0;
	padding: 10px;
}
#pfpic
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
#pfpics
{
	border: solid 1px #FFFBF0;
	padding: 10px;
}
#info
{
	width:10%;
	height:10%;
}
#friends
{
	overflow-x:hidden;
}
	
</style>
</head>

<body>
<div class="form-actions">

<form id="title" action="#">
<div class="p1 span3">

<div id="pic" class="">
</div>

</div>

<div id="searchi" class="form-search span6">
&nbsp;
&nbsp;<br>
Search <input type="text" id="serchbox" name="searchn" required="required"/>
<button type="submit" formaction="search.php" class="btn btn-success" ><i class="icon-search"></i>Search</button>
</form>


<form>
<br><br><br>
<ul class="nav nav-pills">
<li id="Home" ><a href="http://localhost/final/firstpage.php?name=<?php echo $sesname;?> ">
Home</a></li>
<li id="Friends"><a href="http://localhost/final/friends.php">Friends</a></li>
<li id="Gallery"><a href="http://localhost/final/gallery.php">Gallery</a></li>
<li id="carpool"><a href="http://localhost/final/carpool.php">Carpool</a></li>
<li id="friendrequests"><a href ="http://localhost/final/friendrequest.php">Friend Requests</a></li></ul> 
</div>
</form>
<form action="logout.php" method="post" class="form-inline">
<div id="lgtbtn" class="span2">
<button type="submit"  class="btn-danger">Logout</button>
</div>
</form>

</div>
<div id="friends">
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("auto");
	$res=mysql_query("select f_email from friends where u_email='$sesid' and request='accepted' ") or die("no friends");
	
	echo $sesname."Friends <br>";

while($row=mysql_fetch_array($res))
{
	$fmail=$row['f_email'];
	$ress=mysql_query("select path from profilepic where email='".$fmail."' order by p_id desc") or die(mysql_error());
	$roo=mysql_fetch_array($ress) or die(mysql_error());
	$resi=mysql_query("select name from user where email='$fmail' ");
	$rose=mysql_fetch_array($resi);
	echo "<div class='span4' id='info'><form class='form-actions' ><div class='span4'><img id='pfpics' src='".$roo['path']."' height='28%' width='28%' ></div> <div class='span4'><a href='#' style='color:RED;font-weight:BOLD;'>".$rose['name']."</a></div>";
	$resi=mysql_query("select name from user where email='$fmail' ");
	$rose=mysql_fetch_array($ress);
	$fname=$rose['name'];
 	
	$path="http://localhost/final/firstpage.php?name=".$fname;
 echo "<a href='".$path."'>".$fmail."</a></form></div>";

}

$res=mysql_query("select u_email from friends where f_email='$sesid' and request='accepted' ");
while($row=mysql_fetch_array($res))
{
	$fmail=$row['u_email'];
	$ress=mysql_query("select path from profilepic where email='".$fmail."' order by p_id desc") or die(mysql_error());
	$roo=mysql_fetch_array($ress) or die(mysql_error());
	$resi=mysql_query("select name from user where email='$fmail' ");
	$rose=mysql_fetch_array($resi);
	echo "<div class='span4' id='info'><form class='form-actions' ><div class='span4'><img id='pfpics' src='".$roo['path']."' height='28%' width='28%' ></div> <div class='span4'><a href='#' style='color:RED;font-weight:BOLD;'>".$rose['name']."</a></div>";
	$fname=$rose['name'];

	$path="http://localhost/final/firstpage.php?name=".$fname;
 echo "<a href='".$path."'>".$fmail."</a></form></div>";
}

	
?>
</div>
</body>
</html>
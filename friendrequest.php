<?php
session_start();

$sesid=$_SESSION['id'];
$name=$_SESSION['name'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />

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



</script>
<script>

function accepts(mail)
{
	var divid=document.getElementById(mail).className;
	alert(divid);
	$(document).ready(function(e) {
            
        
		$.ajax({
			type: "GET",
		   	url: "accept.php?email_id="+mail,
		    success:function(data){
			$("."+divid).html(data);
				}
		});
    });
alert("yea..");

}
</script>
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
#pfpic
{
	border: solid 1px #FFFBF0;
	padding: 10px;
}
#fpic
{
	height: 5%;
	width: 6%;
	border: solid 1px #FFFBF0;
	padding: 10px;
}
#lgtbtn
{
	
	top:0px;
	position:relative;
	float:right;
}
#searchi
{
	
}

	
</style>
</head>
<body>
<div class="form-actions">
<form id="title" class="">

<div id="pic" class="span4">
</div>

<div id="searchi" class="form-search span6">
&nbsp;
&nbsp;<br>
Search <input type="text" id="serchbox" name="searchn" required="required"/>
<button type="submit" formaction="search.php" class="btn btn-success" ><i class="icon-search"></i></button>



<br><br><br>

<ul class="nav nav-pills">
<li id="Home" ><a href="http://localhost/final/firstpage.php?name=<?php echo $name;?> ">
Home</a></li>
<li id="Friends"><a href="http://localhost/final/friends.php">Friends</a></li>
<li id="Gallery"><a href="http://localhost/final/gallery.php">Gallery</a></li>
<li id="carpool"><a href="http://localhost/final/carpool.php">Carpool</a></li>
</ul>
</div>
</form>
<form  action="http://localhost/final/logout.php" method="post">
<div id="lgtbtn" class="span2">
<button type="submit"  class="btn btn-danger" formaction="logout.php"><i class="icon icon-remove-circle"></i>Logout</button>

</div>
</form>
</div>


<?php
mysql_select_db("auto");
$res=mysql_query("select u_email,f_email,request from friends where f_email='$sesid' and request='sent'") or die(mysql_error());
if(!(mysql_num_rows($res)))
{
	echo "<h1> NO FRIEND REQUESTS AT THIS MOMENT</h2>";
	
}
else
{
	while($row=mysql_fetch_array($res))
	{
		 $mail=$row['u_email'];
			$ress=mysql_query("select p_id, path from profilepic where email='$mail' order by p_id desc ") or die(mysql_error());
	$roo=mysql_fetch_array($ress);
	$dd=mysql_query("select name from user where email='$mail'") or die(mysql_error());
	$d=mysql_fetch_array($dd);
	$fname=$d['name'];
	$picpath=$roo['path'];
	echo"<form class='form-actions'>
	
	<div id='fpic' class='span4'>
	<img src='".$picpath."'>";
	echo"</div>
	
	<div class='span4'><br><br><br>
	<div id ='".$mail."' class='".$fname."' >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type='buttton' value='accept' class='btn btn-primary' title=".$mail." onclick='accepts(this.title)'> 
	</div>
	</div>
	
	</form>"; 
	}
}
?>

</body>
</html>
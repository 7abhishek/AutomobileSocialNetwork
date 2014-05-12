<?php
session_start();
if(!isset($_SESSION['dis']))
{
	header("Location:http://localhost/final/welcome.php");
}

$sesid=$_SESSION['dis'];
$sesname=$_SESSION['dname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function showRSS(str)
{
	if (str.length==0)
  { 
  document.getElementById("rssOutput").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getrss.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function loadXMLDocRes()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("mydiv1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","response.php",true);
xmlhttp.send();
}
</script>

<script>
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","request.php",true);
xmlhttp.send();
}
</script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>DISTRIBUTOR</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="welcome.php">Homepage</a></li>
			<li><a href="#" onclick="loadXMLDoc()">Requests</a></li>
			<li><a href="#" onclick="loadXMLDocRes()">Responses</a></li>
			<li><a href="#">About</a></li>
			<li><a href="http://localhost/final/dlogout.php">logout</a></li>
		</ul>
	</div>
</div>
<div id="logo">
	<h1>Distributor's delight</h1>
</div>
<!-- end header -->
<hr />
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"><a href="#">Requests made by users</a></h1>
			<p class="meta">&nbsp;</p>
			<div class="entry" id="myDiv">
			 	</div>
			
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar one -->
	<div id="sidebar1" class="sidebar">
		<ul>
			<li id="recent-posts">
				<h2>Responses Made</h2>
				<ul>
					<li id="mydiv1">
					</li>
					
				</ul>
			</li>
		</ul>
	</div>
	<!-- end sidebar one -->
	<!-- start sidebar two -->
	<div id="sidebar2" class="sidebar">
		<ul>
			<li>
				<h2>Categories</h2>
				<ul>
                <form>
<select onchange="showRSS(this.value)">
<option value="">Select the type of news:</option>
<option value="recent">Recent Car Reviews</option>
<option value="india">Indian Automobile News</option>
</select>
</form>
				<li id="rssOutput">
                </li>
					
				</ul>
			</li>
			<li>
				
	</div>
	<!-- end sidebar two -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<hr />
<!-- start footer -->
<div id="footer">
	<p>&copy;2013 All Rights Reserved.</p>
</div>
<!-- end footer -->
<div align=center></div></body>
</html>

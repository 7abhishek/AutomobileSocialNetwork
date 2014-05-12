<?php
session_start();
$sesid=$_SESSION['id'];
$name=$_SESSION['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>

#profilepics
{
	height:30%;
	
	
}
</style>
	<title><?php echo $name ?>Gallery</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="aax, WOW Slider, Online Image Slideshow, Image Slideshow For Joomla" />
	<meta name="description" content="aax created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
    <script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<script src="jquery-1.9.1.js"></script>
<script>
$.ajax({
         		type: "POST",
		         url: "picupload.php",
				 success:function(data){
				 $("#pfpic").html(data);
				 }
        	}); 
			
			
			
</script>
<script>
function enlarge(click_id)
{
		alert("helloe");
}
</script>
<style>
#pfpic
{
	height: 10%;
	width: 20%;
	border: solid 1px #FFFBF0;
	padding: 10px;

}
#lgtbtn
{
	float:right;
}
img
{
	cursor:pointer;
}
</style>
</head>
<body style="background-color:#d7d7d7">
<div class="row-fluid">
<form id="picture"  class="form-actions" enctype="multipart/form-data" action="picupload.php" method="post" >


<div id="p1" class="span4">

<div class="profpic" id="pfpic">
</div>
<?php echo " <a href='#'>".$_SESSION['id']."</a>"; ?>
</div>

<div id="searchi" class="form-search span5">
&nbsp;
&nbsp;<br>
Search <input type="text" id="serchbox" name="searchn" required="required"/>
<button type="submit" formaction="search.php" class="btn btn-success" ><i class="icon-search"></i></button>
</form>

<br><br><br><br>
<form method="post" action="#">
<ul class="nav nav-pills">
<li id="Home" ><a href="http://localhost/final/firstpage.php?name='<?php echo $name;?>' ">
Home</a></li>
<li id="Friends"><a href="#">Friends</a></li>
<li id="Gallery"><a href="http://localhost/final/gallery.php">Gallery</a></li>
<li id="carpool"><a href="http://localhost/final/carpool.php">Carpool</a></li>
</ul> 
</form>



<form action="logout.php" method="post">
<div id="lgtbtn" class="span3">
<button type="submit"  class="btn-danger">Logout</button>
</div>
</form>
</div>


<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto") or die(mysql_error());
$res=mysql_query("select path from profilepic where email='$sesid'") or die(mysql_error());

echo "<h3> PROFILE PICTURES </h3>";
echo "<div id='profilepics'>";
echo "<div id='wowslider-container1'>";
echo '<div class="ws_images"><ul>';
$i=0;
while($row=mysql_fetch_array($res))
{
	echo '<li>';
	echo '<img src="'.$row['path'].'" alt="" title="" id="wows1_'.$i.'" onclick=" enlarge(this.id) "/></li>';
	$i=$i+1;
}
echo '</ul></div>';
#echo '<div class="ws_bullet"><div>';

#echo '<div class="ws_shadow"></div>
echo '<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>';	
	
echo '</div></div>';
	
	
	
?>	<!-- End WOWSlider.com BODY section -->
</body>
</html>
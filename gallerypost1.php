<?php
session_start();
$sesid=$_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>WOWSlider generated by WOWSlider.com</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="WOW Slider, Online Image Slideshow, Image Slideshow For Joomla" />
	<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
</head>
<body style="background-color:#d7d7d7">
	<!-- Start WOWSlider.com BODY section -->
    <?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto") or die(mysql_error());
$res=mysql_query("select pdata,type from data where d_email='$sesid' and type='image' ") or die(mysql_error());
echo	'<div id="wowslider-container1">
	<div class="ws_images"><ul>';
	$i=0;
while($row=mysql_fetch_array($res))	
{
echo '<li><img src="'.$row['pdata'].'" alt="C" title="C" id="wows1_'.$i.'"/></li>';
$i=$i+1;
}
echo '</ul></div>
<div class="ws_thumbs">
</div>
<div class="ws_shadow"></div>
</div>
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>';
?>

</body>
</html>
<?php
session_start();
$sesid=$_SESSION['id'];
$sesname=$_SESSION['name'];
$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto");

function getlet($address)
{
 $prepAddr = str_replace(' ','+',$address);
 $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
 $output= json_decode($geocode);
 $lat = $output->results[0]->geometry->location->lat;
 $long = $output->results[0]->geometry->location->lng;
 $latlong['lat']=$lat;
 $latlong['long']=$long;
 return $latlong;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    
    <title> SAVE FUEL ♥ </title>
    
	
    <script src="bootstrap/js/bootstrap.js">
	</script>
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
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
	<script type="text/javascript">
	
	function initialize() {
		//alert("initialize  called");
		
		var dist;
		var lat,long;
		var slat,slong,email;
		var LocationA,markerA;
		var string="";
		slat=document.getElementById("slat").value;
		slong=document.getElementById("slong").value;
		var locationSELF=new google.maps.LatLng(slat,slong);
		var num=document.getElementById("num").value;
		//alert(slat+" "+slong);
		var mapProp = {
  center:locationSELF,
  zoom:13,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  //alert("reached 0.5");
  
  var map=new google.maps.Map(document.getElementById("map_canvas")
  ,mapProp);
         

		
    //       alert("reachd 1");		
			window.onload = loadScript;
			google.maps.event.addDomListener(window, 'load');
			marker=new google.maps.Marker({
				  position:locationSELF,
				  animation: google.maps.Animation.DROP
				  
  					});
					marker.setMap(map);
					var infowindow = new google.maps.InfoWindow({
						  content:"<h4><b>You!!</h4>"
  							});
					infowindow.open(map,marker);

		
		for(var i=1;i<=num;i++)
		{
			var marker;
			
		
			email=document.getElementById("email"+i).value;
			lat=document.getElementById("lat"+i).value;
			long=document.getElementById("long"+i).value;
			slat=document.getElementById("slat").value;
			slong=document.getElementById("slong").value;
			dist=distance(slat,slong,lat,long,"K");
		//	alert("distance from "+email+" is "+dist);
			if(dist<=3)
			{
				string=string+"<br>"+email+" is only "+dist+" kms from you ";
				document.getElementById("information").innerHTML=string;
				 LocationA=new google.maps.LatLng(lat,long);
				 marker=new google.maps.Marker({
				  position:LocationA,
				  icon:"ink.png",
				  animation: google.maps.Animation.BOUNCE
				  
  					});
					marker.setMap(map);
					var infowindow = new google.maps.InfoWindow({
						  content:"<h4><b>"+email+"</h4>"
  							});
					infowindow.open(map,marker);

         
           	   window.onload = loadScript;
google.maps.event.addDomListener(window, 'load');

			}
		}
		markerA=new google.maps.Marker({
				  position:LocationSELF,
				  animation: google.maps.Animation.DROP
				  
  					});
					markerA.setMap(map);
  
		
	}
	
   function distance(lat1, lon1, lat2, lon2, unit) {
    var radlat1 = Math.PI * lat1/180
    var radlat2 = Math.PI * lat2/180
    var radlon1 = Math.PI * lon1/180
    var radlon2 = Math.PI * lon2/180
    var theta = lon1-lon2
    var radtheta = Math.PI * theta/180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);

    dist = Math.acos(dist)
    dist = dist * 180/Math.PI
    dist = dist * 60 * 1.1515
    if (unit=="K") { dist = dist * 1.609344 }
    if (unit=="N") { dist = dist * 0.8684 }
   // alert ("distance="+dist);
	return dist;
}


function loadScript()
{
var script = document.createElement("script");
script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&callback=initialize"; document.body.appendChild(script);

			
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
#map_canvas
{
	border:solid 3px BLACK;
}
</style>
</head>
  

  <body onLoad="initialize()">
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
Search <input type="text" id="serchbox" name="searchn" required/>
<button type="submit" formaction="search.php" class="btn btn-success" ><i class="icon-search"></i></button>
</form>
<br><br><br><br>
<form method="post" action="#">
<ul class="nav nav-pills">
<li id="Home" ><a href="http://localhost/final/firstpage.php?name=<?php echo $sesname;?> ">
Home</a></li>
<li id="Friends"><a href="http://localhost/final/friends.php">Friends</a></li>
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
<div id="map_canvas" class="span6" style="height:400px;">
</div>
<div id="information" class="span6">

</div>
<?php
$ree=mysql_query("select address from user where email='$sesid'") or die(mysql_error());
$dd=mysql_fetch_array($ree);
$slatlong=getlet($dd['address']);
$res=mysql_query(" (select f_email as email from friends where u_email='$sesid' and request='accepted') union (select u_email as email  from friends where f_email='$sesid' and request='accepted')") or die(mysql_error());

$num=mysql_num_rows($res);
$slat=$slatlong['lat'];
$slong=$slatlong['long'];
echo "<div id='data' style='display:none;'>";
echo "<input type='text' id='num' value=".$num."><br>";
echo "<input type='text' id='slat' value=".$slat."><br>";
echo "<input type='text' id='slong' value=".$slong."><br>";
$i=1;
while($row=mysql_fetch_array($res))
{
	echo $row['email']."<br>";
	$mail=$row['email'];
	$ad=mysql_query("select email,name,address from user where email='$mail' ") or die(mysql_error());
	$roo=mysql_fetch_array($ad);
	$latlong=getlet($roo['address']);
	
	echo "<input type='text' value=".$mail." id='email".$i."'>";
	echo"<input type='text' value=".$latlong['lat']." id='lat".$i."'><input type='text' value=".$latlong['long']." id='long".$i."'><br>";
	$i++;	
}
echo "</div>";
?>
    
       

    

 </body>
</html>

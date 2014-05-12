<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location:http://localhost/final/welcome.php");
}
if(!isset($_GET['name']))
{
	header("Location:http://localhost/final/welcome.php");
	
}
$sesid=$_SESSION['id'];
$sname=$_SESSION['name'];

$con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("auto");
$res=mysql_query("select name from user where email='$sesid'") or die(mysql_error());
$row=mysql_fetch_array($res);
$name=str_replace("'","",$_GET['name']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="video-js/video-js.css" />
</head>
<script src="video-js/video.js"> </script>
<script type="text/javascript" src="jquery-1.9.1.js"></script>

<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-filestyle-0.1.0.min.js"> </script>

<script>

function loadc()
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
		alert("hello");
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
$(document).ready(function() {

		$.ajax({
   			type: "POST",
		    url: "picupload.php",
			success:function(data){
			$("#pfpic").html(data);
				 }});
	
   	 $("#tex").click(function(e) {
        $("#te").addClass("active");
		$("#vid").attr('class','na');
		$("#img").attr('class','na');
		$("#uimages").css("display","none");
		$("#uvideos").css("display","none");
		$(".posttxt").fadeIn("slow");
	});
	$("#image").click(function(e) {
        $("#img").addClass("active");
		$("#te").attr('class','na');
		$("#vid").attr('class','na');
		$(".posttxt").css("display","none");
		$("#uvideos").css("display","none");
		$("#uimages").slideDown("slow");
    
	});
 $("#video").click(function(e) {
        $("#vid").addClass("active");
		$("#te").attr('class','na');
		$("#img").attr('class','na');
		$("#uimages").css("display","none");
		$(".posttxt").css("display","none");
		$("#uvideos").slideDown("slow");
	 });
 
 	
	/*$("#pupload").change(function(e) {
		var file=this.files[0];
		alert("hello"+file);
        $("#upbtn").click(function(e) {
            var name=file.name;
			var size=file.size;
			var path=$("#pupload").val();
			alert("name:"+name+" size:"+size+" type:"+file.type);
			alert($("#pupload").val());
			if(file.type != 'image/png' && file.type != 'image/jpg' && !file.type != 'image/gif' && file.type != 'image/jpeg' ) 
			{
                alert("File doesnt match png, jpg or gif");
				
			}
		   $("#pictu").ajaxForm(function(){
			   alert("submit ok");
		   });
		});


    });*/
		
        	$.ajax({
         		type: "POST",
		         url: "picupload.php",
				 success:function(data){
				 $("#pfpic").html(data);
				 }
        	});   //for prev prof pic to load... 
    			
			/*	$.ajax({
         		type: "POST",
		         url: "getrss.php",
				 success:function(data){
				 $(".adminp").html(data);
				 }
        	});*/	
		/*$("#picture").ajaxForm({
            
			
			 beforeSend: function() {
				 alert("started");
				 },
				 
				success: function(response) {
			
			$("#pfpic").html(response);
			$("#picture").resetForm();
			alert("finish");
			}
        });*/
		$("#upbtn").click(function() {
		            
		 			$("#pfpic").html('<img src="blue_loading.gif" >');
		 			$("#picture").ajaxForm({
							target: '#pfpic'
					}).submit();
					$("#picture").resetForm(); //upload a new profile pic...
	});
	
	$("#upicup").click(function(e) {	
			
			
			$("#uimageform").ajaxForm({  /*  assign timestamp as class label for text box in                                                     ajax response  and retrive the value of                                                         text( did ) box using 				                                                           find(timestamp)*/
			target: '#poss',
			success: function(data){
				var code=document.getElementById("imdelcode").value;
				alert("code from ajx response"+code);
				
			          }
			}).submit();
			
                
            
		
	});
		
	$("#vidup").click(function(e) {
		alert("yeah");
		$("#uvideoform").ajaxForm({
			target: '#poss',
			success: function(data){
				var code=document.getElementById("videlcode").value;
				alert("code from ajx response"+code);
			var hello=$(data).filter("."+code).attr("value"); 
			 alert(hello);
			 }
			}).submit();
		

		
    });
	$("#pict").filestyle({
		buttonText: "Choose file",  		 //icon style for upload button
		textField : false,
		icon : true
		});
	 
	 $("#uimag").filestyle({
		buttonText: "Choose file",
		textField : false,
		icon : true
		});
		
	 $("#uvid").filestyle({
		buttonText: "Choose file",
		textField : false,
		icon : true
		});
	
	
	
});
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#postxt").scrollable();
	$(".adminp").scrollable();
});
function loadXML()   //traditional ajax
{
	var str="hi";
	str=document.getElementById("postxt").value;
	str2=document.getElementById("tdcode").value;
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
	{  document.getElementById("poss").innerHTML=xmlhttp.responseText;
	   document.getElementById("postxt").value="";}
	  
  	}
    xmlhttp.open("GET","post.php?q="+str+"&tdelcode="+str2,true);
	xmlhttp.send();
}

function loadp()											//traditional ajax
{
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
	  document.getElementById("poss").innerHTML=xmlhttp.responseText;
	  
  	}
    xmlhttp.open("GET","post.php",true);
	xmlhttp.send();

}
</script>
<script type="text/javascript" src="jquery.form.js"></script>

<script type="text/javascript">
function vsetvalue(ids)
{
	alert(ids);
		 
	alert(new Date().getTime());
	$("#"+ids).val(new Date().getTime());
}

function shows()
{
	
	alert('worked');
}
	
$(document).ready(function(e) {
    $("#frequests").css("background-color","RED");
	alert("sdd");
});
	
</script>
<?php
$re=mysql_query("select * from friends where f_email='$sesid' and request='sent'") or die(mysql_error());
if(mysql_num_rows($re))
{
	echo mysql_num_rows($re);
	echo '<script>';
	echo' $(document).ready(function(e){
		$("#friendrequests").css("color","RED");
		alert('.$re.');
		});';
		
	echo '</script>';
}
?>

<style>

#imagess
{

}
.adminp
{
	background-color:#EEE;
	width:30%;
	height:780px;
	float:left;
	overflow-x:hidden;
}

.choice
{
	background-color:#333;
	width:100%;
	height:50px;
	float:left;
	visibility:visible;
}

#pfpic
{
	height: 10%;
	width: 20%;
	border: solid 1px #FFFBF0;
	padding: 10px;

}
.nimage
{
	z-index:-2;
	color:#555;
	font-size:24px;
	text-align:center;
	
}
.userp
{
	background-color:#555;
	width:40%;
	height:780px;
	float:left;
	overflow-x:hidden;
	
}
#lgtbtn
{
	float:right;
	top:0px;
	position:relative;
}
.somethng
{
	background-color:#CCF;
	height:780px;
	width:30%;
	top:0px;
	float:left;
	position:relative;
			
}
#uimages
{
	display:none;
	background-color:#BBBBBB;
}
#uvideos
{
	display:none;
	background-color:#BBBBBB;
}
#searchi
{
	
}
.friendtrue
{
	background-color:#AA0000;
}
#chat
{
	height:50%;
}
#msg
{
	height:40%;
	width:50%;
	background-color:WHITE;
}
	
</style>

<body onload="loadp()">


<div class="row-fluid">
<form id="picture"  class="form-actions" enctype="multipart/form-data" action="picupload.php" method="post" >


<div id="p1" class="span4">
<div class="profpic" id="pfpic">
</div>
<?php echo " <a href='#'>".$_SESSION['name']."</a>"; ?>
<div><input type="file" name="pic" id="pict" title="upload profile pic"/></div>
<input type="button" value="upload" id="upbtn" class="btn btn-mini"/>
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
<li id="Home" ><a href="http://localhost/final/firstpage.php?name=<?php echo $name;?>">
Home</a></li>
<li id="Friends"><a href="http://localhost/final/friends.php">Friends</a></li>
<li id="Gallery"><a href="http://localhost/final/gallery.php">Gallery</a></li>
<li id="carpool"><a href="http://localhost/final/latlong.php">Carpool</a></li>
<li id="frequests" class="friendrequests"><a href ="http://localhost/final/friendrequest.php">Friend Requests</a></li>
</ul> 
</form>



<form action="logout.php" method="post">
<div id="lgtbtn" class="span3">
<button type="submit"  class="btn-danger">Logout</button>
</div>
</form>

</div>


<div id="texts" >
 
<div class="adminp" style="overflow-x:hidden;">

<div class="choice"  style="">
<form>
<select onchange="showRSS(this.value)">
<option value="">Select the type of news:</option>
<option value="recent">Recent Car Reviews</option>
<option value="india">Indian Automobile News</option>
</select>
</form>
</div>

<div id="rssOutput" style="overflow-x:hidden;" class="span12">
hello
</div>

</div>

<div class="userp" style="overflow-x:hidden;">

<div class="utabs">
<ul class="nav nav-tabs">

<li class="active" id="te" ><a href="#" id="tex"> Text </a></li>
<li class="na" id="img" > <a href="#" id="image"> Image </a></li>
<li class="na" id="vid" ><a href="#" id="video"> Video </a></li>
</ul>
</div>

<div id="uimages" class="row-fluid">
<form id="uimageform" action="post.php" method="post" enctype="multipart/form-data">
<div><input type="file" id="uimag" name="uimage"/></div>

<button type="button" class="btn btn-small" id="upicup" onclick="vsetvalue('imdelcode')"><i class="icon-camera" ></i> SharePhoto</button>
<input type="text" id="imdelcode" value="" name="imdcode" />
</form>
</div>

<div class="posttxt">
<textarea  cols="25" rows="5" id="postxt" placeholder="write here to post..." required="required" >
</textarea><br >
<button type="submit" value="Post" class="btn btn-inverse" onclick="loadXML();vsetvalue('tdcode')" id="txtpost"><i class="icon-comment icon-white"></i> Post</button>
<input type="text" name="tdelcode" id="tdcode" value=""/>
</div>

<div id="uvideos" class="row-fluid">
<form id="uvideoform" action="post.php" method="post" enctype="multipart/form-data">
<div><input type="file" accept="video/x-mpeg2" value="upload video" id="uvid" name="uvideo" />
</div>
<button type="button" id="vidup" class="btn btn-small" onclick="vsetvalue('videlcode')" ><i class="icon-facetime-video"></i> Share Video</button>

<input type="text" id="videlcode" value="" name="vidcode" />
</form>
</div>

<div id="poss">
Posts here...
</div>

</div>

<div class="somethng" style="overflow:auto;">
<div id="chat">
<b> CHAT </b><br>
<?php

$mysql=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("demo",$mysql)or die(mysql_error());

//after creating sessions replace "kashif" with user's name..

$row=mysql_query("select friend,user from friends where user='kashif' or friend='kashif'")or die(mysql_error());
$roe=mysql_query("select name from user,onlinestatus where status='online' and onlinestatus.email=user.email") or die(mysql_error());

echo "<select name='friend' size='1' id='frn1' class=''>";
echo "<option>SELECT A FRIEND<selected>";
while($data=mysql_fetch_array($row))
{
	if($data['friend']!='kashif')
	echo "<option>".$data['friend'];
	if($data['user']!='kashif')
	echo "<option>".$data['user'];
}
echo "</select>";

echo "<div class='messages' class='form-actions' id='msg'>
</div>
<div class='textarea'><textarea  cols='25' rows='5' id='textarea1' placeholder='write here to chat...' required='required' name='meassage' >
</textarea> </br><button type='submit' value='done' onclick=' loadc()'>DONE</button>
 </div>
";
?>
</div>
<div id="distributor">
distributor

</div>
</div>

</div>
<div id="imagess">
</div> 

</body>
</html>

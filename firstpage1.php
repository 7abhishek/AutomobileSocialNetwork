<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("Location:http://localhost/final/welcome.php");
}
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
				$("."+code,data).appendTo("#poss");
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
    $("postxt").scrollable();
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
<script type="text/javascript" src="file:///C|/Users/Abhi/AppData/Local/Temp/Rar$DIa0.298/jquery.form.js"></script>

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
	
</script>
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
	
</style>

<body onload="loadp()">



<form id="picture"  class="form-actions" enctype="multipart/form-data" action="picupload.php" method="post" >
<div class="row-fluid">

<div id="p1" class="span4">
<div class="profpic" id="pfpic">
</div>
<?php echo " <a href='#'>".$_SESSION['id']."</a>"; ?>
<div><input type="file" name="pic" id="pict" title="upload profile pic"/></div>
<input type="button" value="upload" id="upbtn" class="btn btn-mini"/>
</div>

<div id="searchi" class="form-search span5">
&nbsp;
&nbsp;<br>
Search <input type="text" id="serchbox" name="searchn" required="required"/>
<button type="submit" formaction="search.php" class="btn btn-success" ><i class="icon-search"></i></button>
</div>
</form>
<form action="logout.php" method="post">
<div id="lgtbtn" class="span3">
<button type="submit"  class="btn-danger">Logout</button>
</div>
</form>

</div>


<div id="texts" >
 
<div class="adminp" style="overflow:auto;">

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
something
</div>

</div>
<div id="imagess">
</div> 
</body>
</html>

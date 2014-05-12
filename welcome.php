<?php
session_start();
if(isset($_SESSION['id'])&&isset($_SESSION['name']))
{
	$name=$_SESSION['name'];
	header("Location:http://localhost/final/firstpage.php?name=$name");
}
if(isset($_SESSION['dis'])&&isset($_SESSION['dname']))
{
	$name=$_SESSION['dname'];
	header("Location:http://localhost/final/distributor.php?dname=$name");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jquery-1.9.1.js">
</script>
<script>

function play()
{
	var audio=document.getElementById("startup");
	audio.currentTime=0;
	audio.play();
	while(audio.currentTime<1.8)
	{
		
	}
	audio.pause();
	
	return  true;
	
}
</script>
<script>
	$(document).ready(function(){
		var g=0;
		$(".btn").click(function(){
			$("img#cars").fadeToggle("slow");
		});
		$("#lgbtn").click(function(){
			$("#loging").slideToggle("slow","swing");
		});
	
		$("#regbtn").click(function(e) {
        	$("#regis").fadeToggle("slow");
    	});
		$("#regibtn").click(function(e) {
			var names=document.getElementById("uname").value;
			var email=document.getElementById("email").value;
			var pass=document.getElementById("pass").value;
			var age=document.getElementById("age").value;
			var gender=document.getElementById("gender").value;
			var vname=document.getElementById("vname").value;
			var vtype=document.getElementById("vtype").value;
			var vcap=document.getElementById("vcap").value;
			var addr=document.getElementById("addr").value;
			var dis=document.getElementById("distris").value;
			var specs=document.getElementById("specific").value;
			//alert(specs);
			if(!names||!email||!pass||!age||!gender||!vname||!vtype||!vcap||!addr)
				{
					return ;
				}
				
			$.post("register.php",
					{name:names,email:email,pass:pass,age:age,gender:gender,vname:vname,vtype:			                      vtype,vcap:vcap,addr:addr,distri:dis,specs:specs},
					 function(result){
					 $("#regload").html(result);}
			      );
            	alert(names+email+pass+gender+age+vno+addr+dis+specs);       
					
		 });
		
		 $("#email").keypress(function(e) {
			 	$("#avail").html("<img style='height:9%;' src='loading1.gif'>");
            	var email=document.getElementById("email").value;
				$.get("checkavail.php?q="+email,function(data){
				document.getElementById("avail").innerHTML=data;
			});
	
        });
		$("#email").blur(function(e) {
            $("#avail").html("<img style='height:9%;' src='loading1.gif'>");
            	var email=document.getElementById("email").value;
				$.get("checkavail.php?q="+email,function(data){
				document.getElementById("avail").innerHTML=data;
			});
        });
		$("#novehicle").click(function(e) {
			if(g==0)
			{
            $("#vname").val("NULL");
			$("#vcap").val("NULL");
			$("#vtype").val("NULL");
			g=1;
			}
			else
			{
			 $("#vname").val("");
			$("#vcap").val("");
			$("#vtype").val("");
			g=0;
			}
			
		});
		$("#loginbttn").click(function(e) {
            var mail=document.getElementById("mailid").value;
			var pass=document.getElementById("passwd").value;
	        });
	});
	
	
	
		
</script>
<script>

function toggle()
{
	$(document).ready(function(e) {
        $("#vname").val("NULL");
		$("#vtype").val("NULL");
		$("#vcap").val("NULL");
		
    });
}
function toggles()
{
	$(document).ready(function(e) {
        $("#specs").slideToggle("slow");
		$("#distris").val("set");
    });
}
</script>
<style>

html,body
{
    width: 100%;
    height: 100%;
    margin: 0px;
    padding: 0px;
    overflow-x: hidden; 
}
body
{
background-size:contain;
}
#avail img
{
	width:10%;
	height:9%;
}
</style>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

<body  style="background-image:url(car.jpg);background-image:no-repeat;">
<form class="form-actions">
<div class="row-fluid">
<div class="span4">
<img src="rpmlogo.jpg" width="110px" height="50px">
</div>

<div class="span4">
<input type="button" id="regbtn" class="btn btn-primary" value="Register">
</div>

<div class="span4">
<input type="button" id="lgbtn" value="login" class="btn btn-primary" >
</div>

</div>
</form>

<div class="row-fluid">

<div id="smthng" class="span4" style="">

</div>

<div id="regis" style="display:none;" class="span4">

<table>
<tr><td><input type="checkbox" onclick="toggles()" ></td><td><span class="label label-important">Distributor</span></td></td><td style="display:none;"><input type="text" name="distri" id="distris" /></td></tr>
<tr><td>NAME</td> <td><input type="text" name="uname" id="uname" required="required" /></td></tr>

<tr><td>Email</td> <td><input type="email" name="email" id="email" onchange="check()" required="required"/></td><td id="avail"></td></tr>

<tr><td>Password</td> <td><input type="password" name="pass" id="pass" required="required"/></td></tr>

<tr><td>age </td><td><input type="text" name="age" id="age"  required="required"/></td></tr>

<tr><td>Gender </td><td><select name="gender" id="gender">
<option>Male</option>
<option>Female</option>
</select></td></tr>
<tr style="display:none;" id="specs"><td>Distributor spec</td><td><input type="text" id="specific" name="spec" value=""/></td></tr>
<tr><td>Vehicle name</td> <td><input type="text" name="vname" id="vname" required="required"/></td><td><input type="checkbox" id="novehicle" class="btn checkbox" value="no vehicle" onclick="toggle()">no vehicle</input></td></tr>

<tr><td>Vehicle <span style="color:#EEEEEE;">type</span></td><td><select name="vtype" id="vtype" />
<option>NULL</option>
<option>TWO WHEELER</option>
<option>THREE WHEELER</option>
<option>FOUR WHEELER</option>
<option>SIX WHEELER</option></select>
</td></tr>

<tr><td style="color:#EEEEEE;"><b>Vehicle capacity</b></td> <td><input type="text" name="vcap" id="vcap" /></td></tr>

<tr><td><b style="color:WHITE;">Address</b></td><td><input type="text" name="addr" id="addr" required="required"/></td></tr>

<tr><td><input type="button" value="Register"  class="btn" id="regibtn"  onclick="play()"/></td><td id="regload"></td></tr> 
 </table>
</div>

<div id="loging" class="span4" style="display:none; float:right;">
<form action="authenticate.php" method="post" class="">
<table>
<tr><td>USER E-MAIL</td> <td><input type="text" id="mailid" name="mail" required="required"></td></tr>
<tr><td>PASSWORD</td> <td><input type="password" id="passwd" name="pass" required="required"></td><td><input type="checkbox" name="distributor"/>&nbsp;<span class="label label-warning">Distributor</span></td> </tr>

<tr><td><input type="submit" class="btn btn-navbar" id="loginbttn"></td></tr>
<tr><td id="loginfo"></td></tr>
</table>
</form>
</div>
<?php
if(isset($_REQUEST['error']))
{
	
	$err=$_REQUEST['error'];
	echo "<h5 style='color:RED'>No such user Present</h5>";
}
?>


</div>
<audio id="startup" controls="controls" style="display:none;">
<source src="start.mp3" />
</audio>
</body>
</html>
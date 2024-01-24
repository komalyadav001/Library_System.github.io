<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Message</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

<style type="text/css">
head,body{
	width:100%;
	height:100%;
	margin:0px;
	padding:0px;
	overflow-x:hidden;
}
.left_box{
	height:700px;
	width:40%;
	float:left;
	background-image:url("https://www.techgrapple.com/wp-content/uploads/2016/08/3d-wechat-theme.jpg");
	background-size:100%;
margin-top:-20px;}

.left_box2{
	height:650px;
	width:300px;
	float:left;
background-image:url("https://i.pinimg.com/originals/8b/58/5f/8b585fb4a5c9fedbb899cfb0cf0331a7.jpg");
	border-radius:20px;
	margin-top:20px;
margin-left:50px;
margin-right:-30px;
background-size:100%;

}
.left_box input{
	height:50px;
	width:150px;
	background-color:#d7f7e2;
	border-radius:10px;
	color:#2c0552;
margin:10px;
padding:10px;
}
.right_box
{
	height:700px;
	width:60%;
	float:left;
	
	background-image:url("https://www.techgrapple.com/wp-content/uploads/2016/08/3d-wechat-theme.jpg");
	background-size:100%;
margin-top:-20px;

}
.right_box2
{
	height:650px;
	width:700px;
	float:left;
margin-left:-100px;
margin-top:20px;
padding:10px;
background-image:url("https://i.pinimg.com/originals/8b/58/5f/8b585fb4a5c9fedbb899cfb0cf0331a7.jpg");
	border-radius:20px;
color:white;
background-size:100%;
}
.list{
	background-image:url("https://i1.wp.com/www.technonutty.com/wp-content/uploads/2014/10/whatsapp-images.jpg");
	background-size:100%;
	border-radius:20px;
	height:500px;
	width:300px;
	float:right;
	color:#730a42;
	padding:19px;
	overflow-y:scroll;
	overflow-x:hidden;
	font-size:25px;
	font-weight:200;
}
tr:hover{
	background-color:#1e3f54;
	cursor:pointer;
	color:white;
}
.form-control{
	height:47px;
	width:78%;
}
.msg{
height:450px;
background-color: #85FFBD;
background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
overflow-y:scroll;
}
.btn-info{
	background-color:#02c5b6;
}
.chat{
	display:flex;
	flex-flow:row wrap;
}
.user .chatbox{
	height:50px;
	width:500px;
	padding:13px 10px;
	background-color:#821b69;
	color:white;
	border-radius:10px;
	
}
.admin .chatbox{
	height:50px;
	width:500px;
	padding:13px 10px;
	margin-left:100px;
	background-color:#423471;
	color:white;
	border-radius:10px;
	order:-1;
}

</style>
<body style="width:100%;height:595px;">
<?php
     $sql1=mysqli_query($db,"SELECT student.pic,message.username FROM student INNER JOIN message ON student.username=message.username group by username ORDER BY message.status;");

?>
<!---left box-->
<div class="left_box">
  <div class="left_box2">
    <div style="color:#fff">
	<form method="post" enctype="multipart/form-data">
	<input type="text" name="username" id="uname">
	<button  type="submit" name="submit" class="btn btn-default">SHOW</button>
	</form>
	</div>
       <div class="list">
	   <?php
	        echo "<table id='table' class='table'>";
			while($res1=mysqli_fetch_assoc($sql1)){
			echo "<tr>";
			echo "<td width=65>";
			echo "<img class='img-circle profile_img' height=60 width=60
			src='images/".$res1['pic']."'>";
			echo "</td>";
			echo "<td style='padding-top:30px';>";
			echo $res1['username'];
			echo "</td>";
			echo "</tr>";
			}
			echo "</table>";
	   
	   ?>
	   
	   </div>
  </div>
</div>
<!-----right box-->
<div class="right_box">
<div class="right_box2">
<br>
<?php
/*-----if submit pressed----*/
     if(isset($_POST['submit'])){
		 $res=mysqli_query($db,"SELECT * from message where username='$_POST[username]';");
		 mysqli_query($db,"UPDATE message SET status='yes' where sender='student' and username='$_POST[username]';");
		if($_POST['username']!='') {$_SESSION['username']=$_POST['username'];}
		?>
		<div style="height:70px;width:100%;text-align:center;color:white;">
		<h3 style="margin-top:-5px; padding-top:10px;"><?php echo $_SESSION['username']?>
		
		</h3>
		</div>
		<div class="msg">
<?php
     while($row=mysqli_fetch_assoc($res))
	 {
	    if($row['sender']=='student'){
?>
<!----student--->
<br>
<div class="chat user">
<div style="float:left; padding-top:5px;">
&nbsp 
<img style="height:40px; width:40px; border-radius:50%;" src="images/p.jpg">
&nbsp
</div>
<div style="float:left;" class="chatbox">
<?php
      echo $row['message'];
?>
</div>
</div>

<?php
		}
          else{
			  
?>
<!---admin------->
<br>
<div class="chat admin">
<div style="float:left; padding-top:5px;">
&nbsp 
<?php
echo "<img class='img-circle profile_img' height=40px; width=40px;  src='images/".$_SESSION['pic']."'>";

?>
&nbsp
</div>
<div style="float:left;" class="chatbox">
<?php
      echo $row['message'];
?>
</div>
</div>
<?php
		  }
		}
		
?>
</div>
<br>
		<div style="height:100px;padding-top:10px;">
<form action="" method="post"><input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float:left">&nbsp &nbsp
<button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send"></span>&nbsp Send</button>
</form></div>
	
		
		
		<?php
	 }
/*-----if submit not pressed----*/
else{
	if($_SESSION['username']==''){
		?><img style="height:70%; width:90%;padding:30px;		margin:90px 0px 0px 0px;"src="images/w.gif" alt="animated">
	<?php
	}
	else{
		if(isset($_POST['submit1'])){
			  mysqli_query($db,"INSERT into `library`.`message` VALUES ('','$_SESSION[username]','$_POST[message]','no','admin');");
			$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]';");
		}
		else{
			$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]';");
		}
		?>
		<div style="height:70px;width:100%;text-align:center;color:white;">
		<h3 style="margin-top:-5px; padding-top:10px;"><?php echo $_SESSION['username']?>
		
		</h3>
		</div>
				<div class="msg">
<?php
     while($row=mysqli_fetch_assoc($res))
	 {
	    if($row['sender']=='student'){
?>
<!----student--->
<br>
<div class="chat user">
<div style="float:left; padding-top:5px;">
&nbsp 
<img style="height:40px; width:40px; border-radius:50%;" src="images/p.jpg">
					  &nbsp
</div>
<div style="float:left;" class="chatbox">
<?php
      echo $row['message'];
?>
</div>
</div>

<?php
		}
          else{
			  
?>
<!---admin------->
<br>
<div class="chat admin">
<div style="float:left; padding-top:5px;">
&nbsp 
<?php
echo "<img class='img-circle profile_img' height=40px; width=40px;  src='images/".$_SESSION['pic']."'>";

?>
&nbsp
</div>
<div style="float:left;" class="chatbox">
<?php
      echo $row['message'];
?>
</div>
</div>
<?php
		  }
		}
		
?>
</div>
<br>
<div style="height:100px;padding-top:10px;">
<form action="" method="post"><input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float:left">&nbsp
<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span>&nbsp Send</button>
</form></div>
		<?php
	}
}
?>
</div>
</div>
<script>
var table=document.getElementById('table'),eIndex;
for(var i=0;i<table.rows.length; i++){
	table.rows[i].onclick=function(){
		rIndex=this.rowIndex;
		document.getElementById("uname").value=this.cells[1].innerHTML;
}}

</script>
</body>
</html>




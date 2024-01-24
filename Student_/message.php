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
<style type="text/css">
body{
background-image:url("https://i.pinimg.com/originals/7f/16/fd/7f16fd9daa615efa8610b71e749b8295.jpg");
background-size:100%;
}
.wrapper{
	height:600px;
	width:500px;
	background-color:#f1cc7b08;
	opacity:.9;
	color:white;
	margin:-20px auto;
padding:10px;}

.form-control{
	height:47px;
	width:76%;
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
	width:400px;
	padding:13px 10px;
	background-color:#821b69;
	color:white;
	border-radius:10px;
	order:-1;
}
.admin .chatbox{
	height:50px;
	width:400px;
	padding:13px 10px;
	background-color:#423471;
	color:white;
	border-radius:10px;
	
}
.vamp {
 
  
  color: white;
  text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);

}
</style>
<body>
<?php
  if(isset($_POST['submit']))
  {
     mysqli_query($db,"INSERT into `library`.`message` VALUES ('','$_SESSION[login_user]','$_POST[message]','no','student');");
	  
	  $res=mysqli_query($db,"SELECT * from `message` where username='$_SESSION[login_user]';");
  }
  else
  {
	  $res=mysqli_query($db,"SELECT * from `message` where username='$_SESSION[login_user]';");
  }
  mysqli_query($db,"UPDATE message set status='yes' where sender='admin' and username='$_SESSION[login_user]';" );
?>
<br><br>
<div class="wrapper">
<div style="height:70px; width:100%;
 background-color: #08AEEA;
background-image: linear-gradient(0deg, #08AEEA 0%, #2AF598 100%);

 text-align:center; color:white;">
<h3 class="vamp"style="margin-top:-5px; padding-top:10px; text-align:center; font-size:30px;">Admin</h3></div>
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
          else{
			  
?>
<!---admin------->
<br>
<div class="chat admin">
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
		}
		
?>
</div>

<div style="height:100px;padding-top:10px;">
<form action="" method="post"><input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float:left">&nbsp
<button class="btn btn-info btn-lg vamp" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span>&nbsp Send</button>
</form></div>
</div>

</body></html>

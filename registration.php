<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

  <style type="text/css">
    section
    {
      margin-top: -20px;
	  height:916px;
	  width:100%;
	  background-image:url("images/8k.jpg");
	  background-repeat:no-repeat;
	  background-size:100%;
    }
	.box{
		height: 300px;
	width: 350px;
	background-color: black;
	margin: 50px auto;
	opacity: .8;
	color: white;
	padding: 10px;
	padding-top: 70px;
	border-radius:50px;
	}
	label{
		font-weight:700;
		font-size:24px;
	}
	
  </style>   
</head>
<body>

<section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="box">
<form  name="signup" action="" method="post">
        <b><p style="padding-left:30px;font-size:24px;font-weight:700;">Sign Up as:</p></b><br>
		<input style="margin-left:50px; width:18px;" type="radio" name="user" id="admin" value="admin"  checked="">
		<label for="admin">Admin</label>
		<input style="margin-left:50px; width:18px;"  type="radio" name="user" id="student" value="student" checked="">
		<label for="student">Student</label>
		 
		<br><br>
		&nbsp &nbsp 
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		<button class="btn btn-default" type="submit" name="submit1" style="color:black; align:center;  font-weight:700;width:70px;height:30px;">OK</button>
		
		
		</form></div>
		<?php
		if(isset($_POST['submit1'])){
			if($_POST['user']=='admin'){
				 ?>
          <script type="text/javascript">
            window.location="Admin_/registration.php"
          </script>
        <?php
			}
		else{
			 ?>
          <script type="text/javascript">
            window.location="Student_/registration.php"
          </script>
        <?php
		}}?>
  </section>

</body>
</html>
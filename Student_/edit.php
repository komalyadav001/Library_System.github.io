<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
	head,body{
	width:100%;
	height:100%;
	margin:0px;
	padding:0px;
	overflow-x:hidden;
}

	body{
		background-image:
			url("https://wallpaperaccess.com/full/2878927.jpg");
			background-repeat:no-repeat;
			background-size:100%;
			
		
	}
	center h4{
		text-align:left;
	}
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
			
    width: 300px;
    height: 700px;
    padding:57px 168px 26px 25px;
    border-radius: 40px;
    background: linear-gradient(#A8EDEA, #FED6E3);
    box-shadow: 13px 13px 20px #cbced1, -13px 13px 20px #ffffff;



		}
		label
		{
			color: black;
		}
		.glowing-text {
  font-size: 50px;
  color: #fff;
  text-align: center;
  -webkit-animation: glowing-text 1s ease-in-out infinite alternate;
  -moz-animation: glowing-text 1s ease-in-out infinite alternate;
  animation: glowing-text 1s ease-in-out infinite alternate;
}
@-webkit-keyframes glowing-text {
  0% {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #2e00e6, 0 0 40px #6300e6, 0 0 50px #c300e6, 0 0 60px #e200e6, 0 0 70px #e600ca;
}
  
  100% {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
}


	</style>
</head>
<body >

	<h2 style="text-align: enter;color: white;
  text-shadow: 43px 7px 42px #ff9800, 0 0 25px #e3e217, 0 0 5px #0cf149;"
>Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM student WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['first'];
			$last=$row['last'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$contact=$row['contact'];
		}

	?>

	<div class="profile_info " style="text-align: center; ">
		
		<h4 class="glowing-text"><?php echo $_SESSION['login_user']; ?></h4>
		
	</div><br>
	<center>
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<input class="form-control" type="file" name="file">

		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">

		<label><h4><b>Username</b></h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

		<label><h4><b>Contact No</b></h4></label>
		<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
	
</div>
</center>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE student SET pic='$pic', first='$first', last='$last', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
	<?php  

		include "footer.php";
	?>
</body>
</html>


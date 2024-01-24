<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
	body{
		
		background-color:black;
		
	}
	.container{
		
		background-image: url("https://www.businessload.com/wp-content/uploads/2017/09/Featured-Image.jpg" );
		background-size:100%;
		background-repeat:no repeat;
		padding:0px;
		
		
	
	}
	.table{
		background-color: #00000069;
		font-size:23px;
	}
	
.glow {
  font-size: 25px;
  color: #fff;
  text-align:center;
  
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 10px #fff, 0 0 20px #ff4da6, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6;
  }

 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: purple;
			font-weight:24px;
			
 		}
		.table-bordered{
			border: 4px solid #ddd;
    width: 929px;
    margin: 20px;
    text-align: center;
		}
		
		
	
 	</style>
 </head>
 <body  >
 	<div class="container" >
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[login_user]' ;");
 			?>
 			<h2 class="glow"style="text-align: center; "><b>My Profile</b></h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
 				</div>";
 			?>
 			<div class="glow" style="text-align: center; font-size:26px; color:white;"> <b> 
	 			<h2>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h2></b>
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table 'style='border: 4px solid #ddd;
    width: 929px;
	margin-left:200px;
    color: #05f6f4fc;
    text-align: center'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['first'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['last'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['contact'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
	<?php  

		include "footer.php";
	?>
 </body>
 </html>
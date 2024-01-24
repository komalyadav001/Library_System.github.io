<?php
  include "connection.php";
  include "navbar.php";
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
    	body
    	{
    		background-image: url("https://i1.wp.com/www.appzi.com/wp-content/uploads/2020/07/form-feedback-1200.jpg?fit=1200%2C799&ssl=1");
    		background-repeat: no-repeat;
			background-size:100%;
    	}
    	.wrapper
    	{
    		padding: 10px;
    		margin: -20px auto;
    		width:900px;
    		height: 600px;
    		background-color: #0e0e0e75;
    		opacity: .8;
    		color: white;
    	}
    	.form-control
    	{
    		height: 70px;
    		width: 60%;
    	}
    	.scroll
    	{
    		width: 100%;
    		height: 300px;
    		overflow: auto;
    	}

    </style>
</head>
<body>

	<div class="wrapper">
		<h2 style="color:#08fc70;"><b>If you have any suggesions or questions please comment below.</b></h2>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Write something..."><br>	
			<input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">		
		</form>
	
<br><br>
	<div class="scroll">
		
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('', '$_SESSION[login_user]', '$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{

						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
				}

			}

			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
		?>
	</div>
	</div>
	
</body>
</html>

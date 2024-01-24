<?php
include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>
	Approve Request
	</title>

	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-image:url("https://i2.wp.com/www.123freevectors.com/wp-content/original/118132-abstract-purple-blurred-lights-background-image.jpg");
  background-size:100%;
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
table{
	background-color:#00000099;
}
.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#dce77599;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#dca1e594;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #1c0420;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
  background-color:#40c0ee;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
.rainbow {
   background: linear-gradient(to right, #f32170,
                    #ff6b08, #cf23cf, #eedd44);
            -webkit-text-fill-color: transparent;
            -webkit-background-clip: text;
   
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
</head>
<body>

<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))
                	
                { 
                    echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                   	?>
<h3 class="glowing-text"><?php
                    echo $_SESSION['login_user']; 
                }
                ?>
          </h3>  
            </div>
<br><br>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;color:white;" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

	<!--__________________________search bar________________________-->
<div class="container">
<h2 class="rainbow "style="float:left; "><strong>Search one username at a time to approve the request</strong></h2>
	<div style="float:right;"class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Student username.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
<br><br><br><br><br>
	<h2 class="vamp">New Requests</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,email,contact FROM `admin` where username like '%$_POST[search]%' and status=''");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No new request found with that username. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #e663cb;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Contact";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				$_SESSION['test_name']=$row['username'];
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		?>
		<form method="post">
		<button type="submit"name="submit1" style="color:red; font-weight:700; font-size:18px;" class="btn btn-default">
		<span  style="color:red; " class="glyphicon glyphicon-remove-sign"></span>&nbsp Remove</button>
		<button type="submit"name="submit2" style="color:green; font-weight:700; font-size:18px;" class="btn btn-default"><span style="color:green;"  class="glyphicon glyphicon-ok-sign"></span>&nbsp Approve</button>
		</form>
		<?php
		
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT first,last,username,email,contact FROM `admin` where status='';");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #510842; color:white;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Contact";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}
if(isset($_POST['submit1'])){
	mysqli_query($db,"DELETE  from admin where username='$_SESSION[test_name]' and status='';");
		unset($_SESSION['test_name']);
}
		if(isset($_POST['submit2'])){mysqli_query($db,"UPDATE admin set status='yes' where username='$_SESSION[test_name]';");
		unset($_SESSION['test_name']);
		}
	?>
</div>
</body>
</html>
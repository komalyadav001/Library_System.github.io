<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  background-image: url("https://images2.alphacoders.com/261/26102.jpg");
  transition: background-color .5s;
  
}
.table{   
 background-color: rgb(255 255 255 / 15%);}
 .table-bordered {
    border: 2px solid #ddd;
    color: #c9bbc3;
	text-align: center;
}
.table hover{
	color:red;
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
.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #601b0678;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color:#eaceee;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
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

	</style>

</head>
<body>
<?php
$b=mysqli_query($db,"SELECT * FROM `books` order by bcount desc limit 0,3;");

?>
<div style="width:100%; height:50px; margin-top:-20px;">
<div style="width:10%; height:50px; background-color:#F44336; padding:10px; float:left;">
<h3 style="color:white; margin-top:0px;">Trending:</h3>
</div>
<div style="width:90%; height:50px; background-color:#ffcccc;padding:10px; float:left;">
<table>
<?php
while($b2=mysqli_fetch_assoc($b)){
	echo "<tr style='color:black;width:400px;margin-top:0px;float:left;'>";
				echo "<td>"; echo "[".$b2['bid']."] &nbsp&nbsp"; echo "</td>";
				echo "<td>"; echo $b2['name']; echo "</td>";
					echo "</tr>";
}
?>
</table>

</div>
</div>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

           	?>
<h3 class="glowing-text"><?php
                    echo $_SESSION['login_user']; 
                }
                ?>
          </h3> 
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776; open</span>


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
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<label style="color:yellow; font-size:21px;"for="department">Choose a Department:	</label>
			<select name="department">
			<optgroup label="Educational">
			<option>ECE</option>
			<option>EEE</option>
			<option>CSE</option>
			</optgroup>
			<optgroup label="Entertainment">
			<option>ACTION</option>
			<option>COMEDY</option>
			<option>HORROR</option>
			</optgroup>
			</select>
		
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<!--___________________request book__________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div>


	<h2 style="color:#79c949;font-weight:230;" ><b>List Of Books</b></h2>
	<?php

		if(isset($_POST['submit']))
		{
			/*echo $_POST['department'];*/
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' and department='$_POST[department]'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #231311; text-align: center;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #231311;text-align: center;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				$sql1=mysqli_query($db,"SELECT * FROM `books` WHERE bid='$_POST[bid]';");
				$row1=mysqli_fetch_assoc($sql1);
				$count1=mysqli_num_rows($sql1);
				
				/*means book id is on books table*/
				if($count1!=0){
				mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else{	?>
				<script type="text/javascript">
						alert("The boook is not available in library.");
					</script>
					<?php
			}
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>
</div>

</body>
</html>
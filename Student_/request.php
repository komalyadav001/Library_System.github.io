<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-image:url("https://i.pinimg.com/736x/c4/0d/cb/c40dcb4b50b3c33df0969c10444b996e.jpg");
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
.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#386562b3;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #eedddd;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: yellow;
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
th,td,input{
	width:100px;
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
  
  <span style="font-size:30px; color:yellow;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div class="container">


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
	<br><br>
	
	<?php
	if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='' ;");

			if(mysqli_num_rows($q)==0)
			{
				echo "<h1 style='color:#89f1d1;text-align:center; padding-top:100px; fonr-size:23px;'><b>There's no pending request</b></h1>";
			}
			else
			{
				?>
				<form method="post">
				
				<?php
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Select";  echo "</th>";
				echo "<th>"; echo "Book-ID";  echo "</th>";
				echo "<th>"; echo "Approve Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
			?>
			</form>
			<td><input type="checkbox" name="check[]" value="<?php echo $row['bid']?>"></td>			<?php
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		?>
		<p align="center"><button type="submit" name="delete" class="btn btn-success" onclick="location.reload()">Delete</button></p>
		
			<?php
			
			}
			
		}
		else
		{
			echo "</br></br></br>"; 
			echo "<h2 style='color:red; fonr-size:23px;'><b>";
			echo " Please login first to see the request information.";
			echo "</b></h2>";
		}
		?>
	</div>
</div>
<?php
if(isset($_POST['delete'])){
	if(isset($_POST['check'])){
		foreach($_POST['check'] as $delete_id){
		
			mysqli_query($db,"DELETE from issue_book WHERE bid='$delete_id' and username='$_SESSION[login_user]' ORDER BY bid ASC LIMIT 1;");
	}
}}
?>
</body>
</html>
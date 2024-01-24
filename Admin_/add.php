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
  background-color: #024629;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-image:url("https://www.teahub.io/photos/full/16-168437_wallpaper-books-library-shelves-lighting-library-background-wallpaper.jpg");
  background-size:100%;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #22222296;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #92edaf;
  display: block;
  transition: 0.3s;
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
.sidenav a:hover {
  color: white;
  background-color:#1d0202f5;
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

.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color:#271d1d87;
  color: white;
  height: 40px;
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

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                   
                   	?>
<h3 class="glowing-text"><?php
                    echo $_SESSION['login_user']; 
                }
                ?>
          </h3>  
            </div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
  
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;color:white;" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 class="vamp"style="font-family: Lucida Console; text-align: center;"><b>Add New Books</b></h2>
    
    <form class="book" action="" method="post">
        
        <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
        <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
        <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
        <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
        <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO library.books VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]' ,'0';");
        ?>
          <script type="text/javascript">
            alert("Book Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#024629";
}
</script>

</body>

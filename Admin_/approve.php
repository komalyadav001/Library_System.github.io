<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

		.srch
		{
			padding-left: 850px;

		}
		.form-control
		{
			width: 300px;
			height: 45px;
			background-color: black;
			color: white;
		}
		
		body {
			background-image: url("https://img5.goodfon.com/wallpaper/nbig/c/35/books-glasses-table-library.jpg");
			background-repeat: no-repeat;
  	font-family: "Lato", sans-serif;
  	transition: background-color .5s;
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
  background-color: #efcece82;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color:  #080212;
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
  color: #880e4f;
  background-color:#947276;
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
.container
{
	height: 600px;
	background-color:#1a060600;
	opacity: .8;
	color: white;
}
.Approve
{
  margin-left: 420px;
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
  <div class="container">
    <br><h2 class="vamp" style="text-align: center; ">Approve Request</h2><br><br>
    
    <form class="Approve" action="" method="post">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>

        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>

        <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
		
		<input type="text" name="tm" class="form-control" placeholder="Return Date      Apr 18,2022 15:00:00" required="">
		<br>
        <button class="btn btn-default" type="submit" name="submit">Approve</button>
    </form>
  
  </div>
</div>

<?php
  if(isset($_POST['submit']))
  {
	mysqli_query($db,"INSERT into timer VALUES('$_SESSION[name]','$_SESSION[bid]','$_POST[tm]');"); 
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");
mysqli_query($db,"UPDATE books SET bcount = bcount+1 where bid='$_SESSION[bid]';");
    $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid];");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }
?>
</body>
</html>
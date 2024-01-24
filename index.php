<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
head,body{
	width:100%;
	height:100%;
	margin:0px;
	padding:0px;
	overflow-x:hidden;
}
	nav
	{
		float: right;
		word-spacing: 30px;
		padding: 20px;
	}
	nav li 
	{
		display: inline-block;
		line-height: 80px;
	}
</style>
</head>


<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<img src="images/13.jpg">
		
			<marquee width="100%" style="color:aqua;" >  
 ONLINE LIBRARY MANAGEMENT SYSTEM
</marquee>  
		</div>

		<?php
		if(isset($_SESSION['login_user']))
		{
			?>
				<nav>
					<ul class="center">
						<li style="color:white;"class="outer button" ><button><a href="index.php">HOME</a><button><span></span><span></span></li>
						<li  ><a href="books.php"><span style="width:10% height:20%;">BOOKS</span></a></li>
						<li ><a href="logout.php">LOGOUT</a></li>
						<li ><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
						<nav>
							<ul>
								<li ><a href="index.php">HOME</a></li>
								<li ><a href="books.php">BOOKS</a></li>
								<li ><a href="login.php">LOGIN</a></li>
								<li ><a href="registration.php">SIGN-UP</a></li>
								<li ><a href="feedback.php">FEEDBACK</a></li>
							</ul>
						</nav>
		<?php
		}
			
		?>

			
		</header>
		<section>
		<div class="sec_img">
		<!--
            <div class="w3-content w3-section" style="width: 100%; height: 550px;">
    	<img class="mySlides w3-animate-left" src="images/b.jpg" style="width: 100%">
    	<img class="mySlides w3-animate-left"" src="images/c.jpeg" style="width: 100%">
    	<img class="mySlides w3-animate-fading"" src="images/d.jpg" style="width: 100%">
    	<img class="mySlides w3-animate-fading" " src="images/e.jpg" style="width: 100%">
    </div>

    <script type="text/javascript">
    	var a=0;
    	carousel();

    	function carousel()
    	{
    		var i;
    		var x= document.getElementsByClassName("mySlides");


    		for(i=0;i<x.length;i++)
    		{
    			x[i].style.display="none";

    		}

    		a++;
    		if(a > x.length) {a = 1}
    		    x[a-1].style.display = "block";
    		    setTimeout(carousel, 2000);  

    	}
		</script>-->
			<br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 style=" text-align: center; font-size: 35px;">Welcome to library</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 15:00 </h1><br>
			</div>
		</div>
		</section>
		

	</div>
	<?php  

		include "footer.php";
	?>
</body>
</html>
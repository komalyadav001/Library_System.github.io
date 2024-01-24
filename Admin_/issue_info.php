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
			padding-left: 850px;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
		}
		
		body {
			background-image: url("images/BG.jpg");
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
   background: linear-gradient(to bottom right, rgb(0 0 0 / 0%) 0%, #e2f4db 100%);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color:  #f5f5f5;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color:#8a6d3b ;
   background-color:#dff0d8;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
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
	background-color: black;
	opacity: .8;
	color: white;
}
.scroll
{
  width: 100%;
  height: 500px;
  overflow: auto;
}
th,td
{
  width: 10%;
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
  
  <span style="font-size:30px;cursor:pointer;color:yellow;" onclick="openNav()">&#9776; open</span>


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
  <form style="padding-top:20px;" method="post">
  <button class="btn btn-default" style="float:left;" name="submit_m" type="submit">Send Email</button></form>
    <h3 style="text-align: center;">Information of Borrowed Books</h3><br>
    <?php
    $c=0;

      if(isset($_SESSION['login_user']))
      {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='Yes' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($db,$sql);
        
        
        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
        $d=date("Y-m-d");
        if($d > $row['return'])
        {
          $c=$c+1;
          $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

          mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]' and approve='Yes' limit $c;");
          
          echo $d."</br>";
        }

        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";
		if(isset($_POST['submit_m'])){
			$t=mysqli_query($db,"SELECT * FROM `issue_book` WHERE approve='yes';");
			$date1=date_create(date("Y-m-d"));
			 while($row=mysqli_fetch_assoc($t)){
				 $date2=date_create($row['return']);
				 $diff=date_diff($date1,$date2);
				 $day=$diff->format("%a");
				 if($day==2){
					 $name_m=$row['username'];
					 $bid_m=$row['bid'];
					 $sql_m=mysqli_query($db,"SELECT * FROM  `student` WHERE username='$row[username]';");
					 $to=mysqli_fetch_assoc($sql_m);
					$subject= "Regarding book return date";
					$msg="Hello!
					This is sent to notify that you need to return the book(ID: ".$bid_m.") in two days.";
					$from="From: online.library356@gmail.com";
					if(mail($to['email'],$subject,$msg,$from)){
						?>
						<script type="text/javascript">
						alert("Mail sent successfully.")
						</script>
						<?php
						
					}
					else{
						?>
						<script type="text/javascript">
						alert("Mail not sent .")
						</script>
						<?php
					}
				 }
			 }
			 
		}
       
      }
      else
      {
        ?>
          <h3 style="text-align: center; ">Login to see information of Borrowed Books</h3>
        <?php
      }
    ?>
  </div>
</div>
</body>
</html>
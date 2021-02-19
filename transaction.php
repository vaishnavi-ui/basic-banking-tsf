<?php
function OpenCon(){
	$dbhost = "localhost";
	$dbuser = "id16198354_root1";
	$dbpass = "RckrlE2ML-|Kuf=L";
	$db = "id16198354_123";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
	return $conn;
}
function CloseCon($conn)
{
				$conn -> close();
}

$conn = OpenCon();
if($conn === false)
{
		die("ERROR: Could not connect. " . $conn->connect_error);
}
$sql1 = "SELECT * FROM transactions ORDER BY DateTime DESC";
$result1 = $conn->query($sql1);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>View Users Page</title>
		<style>
    html,body
    {
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
    }
		.nav-div{
		width:100%;
		height:110px;
		background-color:#583d72;
    color: white;
		}
		ul{
			list-style-type: none;
			margin: 0;
			padding: 0;
			top: 0;
			width: 100%;
		}
		.li-nav{
			display: inline;
			float:right;
			padding:40px;
			padding-left: 80px;
			padding-right: 30px;
			font-size: 25px;
		}
		.a-nav{
			text-decoration: none;
			color: #ffee93;
			font-family: 'Comfortaa', cursive;
		}
		.a-nav:hover{
			color: #ffb4b4;
		}
		.btn {
		  border: 2px solid black;
		  background-color: white;
		  color: black;
		  padding: 14px 28px;
		  font-size: 22px;
			font-family: 'Lora', serif;
		  cursor: pointer;
			margin-top: 50px;
			margin-left: 650px;
			margin-bottom: 30px;
		}
		.h1-users{
			font-size: 240%;
      padding:15px;
      text-align: center;
      color: #350b40;
      font-family: 'Lora', serif;
		}
     th{
		 	background-color: #583d72;
			color: white;
			font-size: 120%;
			font-family: 'Lora', serif;
		 }
		 td{
		 	font-weight: lighter;
			color: #393e46;
			font-family: 'Lora', serif;
		 }
     .footer-div{
      width:100%;
      height:110px;
      background-color:#583d72;
      color: white;
      padding-top: 30px;
      text-align: center;
     }
     .a-footer{
       color: white;
     }
		</style>
    <!-- adding logo to the website-->
    <link rel="shortcut icon" type="image/x-icon" href="tsp-logo.png" />
		<!-- google fonts link for including different fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Lora&family=Sacramento&display=swap" rel="stylesheet">
    <!-- font awesome link to add different icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- table css-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>
		<!-- contains the brand name and header with options-->
    <div class="nav-div">
      <ul>
        <li class="li-nav"><a href="users.php" class="a-nav"><strong>View Users <i class="fas fa-user"></i></strong></a></li>
          <li class="li-nav"><a href="index.html" class="a-nav"><strong>Home <i class="fas fa-home"></i></strong></a></li>
          <li style="float:left;font-family: 'Comfortaa',cursive;font-weight:bold" class="li-nav"> Sparks Bank Transfer <i class="far fa-credit-card"></i></li>
      </ul>
    </div>
		<!-- printing the table of users and their balances-->
		<div class="users-div">
      <h1 class="h1-users">Transaction History</h1>
			<table class="w3-table-all w3-hoverable">
				<tr>
					<th>Sender</th>
					<th>Receiver</th>
					<th>Credits</th>
					<th>Date and Time</th>
				</tr>
				<?php while($row1=$result1->fetch_assoc())
				{?>
				<tr>
					<td><?php echo $row1['Sender'];?></td>
					<td><?php echo $row1['Receiver'];?></td>
					<td><?php echo $row1['Credits'];?></td>
					<td><?php echo $row1['DateTime'];?></td>
				</tr>
				<?php
          } ?>
			</table>
      <br><br><br>
		</div>
    <!-- footer div-->
    <div class="footer-div">
      <a href="https://www.instagram.com/" target="_blank" class="a-footer"><i class="fab fa-instagram fa-2x"></i></a>
      <a href="https://www.linkedin.com/" target="_blank" class="a-footer"><i class="fab fa-linkedin fa-2x"></i></a>
      <a href="https://www.facebook.com/" target="_blank" class="a-footer"><i class="fab fa-facebook-square fa-2x"></i></a>
      <a href="https://www.twitter.com/" target="_blank" class="a-footer"><i class="fab fa-twitter-square fa-2x"></i></a><br>
      <p style="text-align:center;color:white;font-family: 'Comfortaa', cursive;font-weight:bold;">Copyright Vaishnavi Rathod @ 2021</p>
    </div>
	</body>
</html>

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
$sql1 = "SELECT * FROM users";
$result1 = $conn->query($sql1);
$sql2 = "SELECT * FROM users";
$result2 = $conn->query($sql2);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Transfer Credits Page</title>
    <style>
		html,body
    {
    margin: 0px;
    padding: 0px;
    overflow-x: hidden;
    }
		* {box-sizing: border-box}
    .h1-users{
      font-size: 240%;
      padding:15px;
      text-align: center;
      color: #350b40;
      font-family: 'Lora', serif;
    }
		.transfer-form{
			border: 1px solid lightgrey;
			width:40%;
			height: 50%;
			margin-left: 450px;
			text-align: center;
			background-color: #f4eeff;
		}
		hr {
    clear: both;
    visibility: hidden;
		}
		label{
			font-family: 'Lora', serif;
			color: #350b40;
			font-size: 150%;
			font-weight: bold;
      padding:20px;
			padding-top: 50px;
		}
		input{
			width: 40%;
			font-size: 120%;
		}
		select{
			width: 40%;
			font-size: 120%;
		}
		.submit{
			border: 2px solid black;
		  background-color: white;
		  color: black;
		  padding: 14px 28px;
		  font-size: 18px;
			font-family: 'Lora', serif;
		  cursor: pointer;
			margin-top: 50px;
			width: 80%;
			margin-bottom: 30px;
		}
		.warning {
		  border-color: #583d72;
		  color: #583d72;
		}

		.warning:hover {
		  background: #583d72;
		  color: white;
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
	.footer-div{
	 width:100%;
	 height:160px;
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
  </head>
  <body>
		<!-- contains the brand name and header with options-->
    <div class="nav-div">
      <ul>
        <li class="li-nav"><a href="transaction.php" class="a-nav"><strong>Transfer History <i class="fas fa-history"></i></strong></a></li>
          <li class="li-nav"><a href="index.html" class="a-nav"><strong>Home <i class="fas fa-home"></i></strong></a></li>
          <li style="float:left;font-family: 'Comfortaa',cursive;font-weight:bold" class="li-nav"> Sparks Bank Transfer <i class="far fa-credit-card"></i></li>
      </ul>
    </div>
    <h1 class="h1-users">Transfer Credits <i class="fas fa-exchange-alt"></i></h1>
    <form class="transfer-form" action="transfering.php" method="post"> <br>
      <label>Select Sender  </label>
      <select name="sender" id="sender">
        <?php while($row1=$result1->fetch_assoc())
         { ?>
        <option><?php echo $row1['Name'];?></option>
      <?php } ?>
		</select> <br> <br>
      <label>Select Receiver</label>
			<select name="receiver" id="receiver">
      <?php while($row2=$result2->fetch_assoc())
       { ?>
      <option><?php echo $row2['Name'];?></option>
    <?php } ?>
	</select> <br> <br>
    <label>Enter Credits </label>
    <input type="number" name="credit" min="0" id="credit"> <br>
      <input type="submit" value="Submit" class="submit warning"> <br>
    </form>
		<br><hr>
		<!-- footer div-->
		<div class="footer-div"> <br><br>
      <a href="https://www.instagram.com/" target="_blank" class="a-footer"><i class="fab fa-instagram fa-2x"></i></a>
      <a href="https://www.linkedin.com/" target="_blank" class="a-footer"><i class="fab fa-linkedin fa-2x"></i></a>
      <a href="https://www.facebook.com/" target="_blank" class="a-footer"><i class="fab fa-facebook-square fa-2x"></i></a>
      <a href="https://www.twitter.com/" target="_blank" class="a-footer"><i class="fab fa-twitter-square fa-2x"></i></a><br>
      <p style="text-align:center;color:white;font-family: 'Comfortaa', cursive;font-weight:bold;">Copyright Vaishnavi Rathod @ 2021</p>
    </div>
  </body>
</html>

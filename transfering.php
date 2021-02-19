<?php
$sender= $_POST['sender'];
$receiver= $_POST['receiver'];
$amt= $_POST['credit'];
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
$sql1="SELECT balance from users where name='$sender'";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
if($sender==$receiver){
	$msg="The Sender and Receiver can't be the same";
}
else{
	if($row1['balance']<$amt){
	  $msg="Not enough balance available to transfer credits.";
	}
	else{
	  $sql2 = "UPDATE users set balance=balance-'$amt' where name='$sender'";
	  $result2 = $conn->query($sql2);
	  //$row1=$result1->fetch_assoc();

	  $sql3 = "UPDATE users set balance=balance+'$amt' where name='$receiver'";
	  $result3 = $conn->query($sql3);

	  $sql4="INSERT INTO transactions (sender,receiver,credits,datetime) values('$sender','$receiver','$amt',now())";
	  $result4=$conn->query($sql4);

	  $msg="Successful Transfer of credits!";
	}
}

$conn->close();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Transaction</title>
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
     .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: 'Comfortaa', cursive;
      color: #4d375d;
    }
    .footer-div{
     width:100%;
     height:150px;
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
      </div> <br><br>
      <div class="card">
        <img src="money.jpg" alt="Money" style="width:100%">
        <h1><?php echo $msg;?></h1>
      </div> <br>
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

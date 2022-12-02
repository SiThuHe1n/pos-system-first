<?php 
include 'connect.php';
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	session_start();
	if(isset($_SESSION["Login_Session"]))
	{
		
			header("location: Order.php");
		
	}
	else{
			if (isset($_POST['btnlogin']))
				{
					$Email=$_POST['Email'];
					$Password=$_POST['Password'];
					$login="SELECT * FROM Customer WHERE C_Email='$Email' AND C_Password='$Password' ";
					$result=mysqli_query($Connect,$login);
					$row = mysqli_fetch_array($result);
					if($row>0)
					{
					
						$_SESSION["Login_Session"]="Customer";
						$_SESSION["userEmail"]=$row['C_Email'];
						$_SESSION["UserID"]=$row['CustomerID'];
						$_SESSION["UserName"]=$row['C_Name'];
				
				
						header("location: Order.php");
			



					

				
				

			        }
			        else
			        {
			        	echo "<script>alert('Email or Password is incorrect!');</script>";
			        }
				}
	}
	







 ?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> OrderList</title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css' integrity='sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css'/>
</head>
<body>
 <h1 align="center">Thein Than Soe </h1>

	
<br><br><br>
 <div class="container">

  <div class="row justify-content-md-center">

    <div class="col-md-5 shadow p-3 mb-5 bg-body rounded">
<form action="Login.php" method="POST">


     <div class="mb-3">
  <label for="name" class="form-label">Email </label>
  <input type="text" class="form-control" name="Email" placeholder="Username" required>
</div>

  <div class="mb-3">
  <label for="phone" class="form-label">Password </label>
  <input type="Password" class="form-control" name="Password" placeholder=" Password" required>
</div>

<div class="mb-3">

<button class="btn btn-info form-control" name="btnlogin">Login</button>
 
</div>
<div class="mb-3">

 <a  class="btn btn-info form-control" href="Register.php">Register</a>
 
</div>



</form>



    </div>
  
  </div>
 
</div>
<div class="container">

</div>


</body>
</html>
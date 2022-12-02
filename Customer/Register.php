<?php 
include 'connect.php';
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['submit']))
{

$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];


  $query="INSERT INTO Customer (C_Name,C_Address,C_Email,C_Phone,C_Password) VALUES ('$name','$address','$email','$phone','$password')";
  $result=mysqli_query($Connect,$query);
  if($result)
  {
echo "<script>alert('succ');</script>";
  }
  else
  {
    echo "<script>alert('fail');</script>";
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
 <h1 align="center">Register Account</h1>
 <div class="container">

  <div class="row justify-content-md-center">

    <div class="col-md-5">
<form action="Register.php" method="POST">
	


     <div class="mb-3">
  <label for="name" class="form-label">Name </label>
  <input type="text" class="form-control" name="name" placeholder="Your Name" required>
</div>

  <div class="mb-3">
  <label for="phone" class="form-label">Phone </label>
  <input type="text" class="form-control" name="phone" placeholder="Your Phone" required>
</div>

  <div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
</div>

 
  <div class="mb-3">
  <label for="password" class="form-label">Password </label>
  <input type="password" class="form-control" name="password" placeholder="Password" required>
</div>




<div class="mb-3">

  <label for="address" class="form-label">Address</label>
  <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
</div>

<div class="mb-3">

<button class="btn btn-info form-control" name="submit">Register</button>
  
</div>

<div class="mb-3">

 <a  class="btn btn-info form-control" href="Login.php">Login</a>
 
</div>

</form>



    </div>
  
  </div>
 
</div>
<div class="container">

</div>


</body>
</html>
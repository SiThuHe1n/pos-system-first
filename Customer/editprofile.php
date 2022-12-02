<?php 


	include('connect.php');

			 			


 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
			$userName=$_POST['userName'];
			$userEmail=$_POST['userEmail'];
			$userPhone=$_POST['userPhone'];
		
			$address=$_POST['userAddress'];
			$UserID	=$_POST['UserID'];

			$update="UPDATE Customer SET  C_Name='$userName' ,C_Email='$userEmail' ,C_Phone='$userPhone' ,C_Address='$address' WHERE CustomerID='$UserID' ";
			$result=mysqli_query($Connect,$update);
			if ($result) {
				echo "<script>alert('Completed');</script>";
				echo'c';
			}
			else{
				echo "<script>alert('error  ');</script>";
					echo'f';
			}
		



 ?>
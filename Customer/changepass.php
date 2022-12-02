<?php 


	include('connect.php');
	session_start();
			 			

			$Newpass=$_POST['Newpass'];
	
			$UserID	=$_POST['userID'];

			$update="UPDATE Customer SET  C_Password='$Newpass'  WHERE CustomerID='$UserID' ";
			$result=mysqli_query($Connect,$update);
			if ($result) {
				echo "<script>alert('Completed');</script>";
			}
			else{
				echo "<script>alert('error  ');</script>";
			}
		



 ?>
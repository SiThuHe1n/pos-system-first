<?php 
session_start();
//if(!isset($_SESSION['Login_Session']))
{
//header("Location: ../Login.php");
}
//if($_SESSION['userRoleID']==4)
{


include 'connect.php';

$id=$_POST['id'];
$value2=$_POST['data1'];
$value3=$_POST['data2'];
$value4=$_POST['data3'];
$value5=$_POST['data4'];




$update="UPDATE Supplier SET Sup_Name='$value2',Sup_Phone='$value3',Sup_Email='$value4',Sup_Address='$value5' WHERE SupplierID='$id'";

$result=mysqli_query($Connect,$update);







}
//else 
{
   // header("Location: Logout.php");
}






 ?>
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



$update="UPDATE ProductDetail SET ProductID='$value2',MeasurementTypeNo='$value3' WHERE PD_ID='$id'";

$result=mysqli_query($Connect,$update);







}
//else 
{
   // header("Location: Logout.php");
}






 ?>
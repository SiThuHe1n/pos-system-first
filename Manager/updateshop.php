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




$update="UPDATE Shop SET ShopName='$value2',Shop_Location='$value3',Shop_Phone='$value4',Shop_Address='$value5' WHERE Shop_ID='$id'";

$result=mysqli_query($Connect,$update);







}
//else 
{
   // header("Location: Logout.php");
}






 ?>
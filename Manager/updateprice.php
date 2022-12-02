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


$update="UPDATE Price SET PD_ID='$value2',PriceTypeNo='$value3',Price='$value4',Note='$value5' WHERE PriceID='$id'";

$result=mysqli_query($Connect,$update);







}
//else 
{
   // header("Location: Logout.php");
}






 ?>
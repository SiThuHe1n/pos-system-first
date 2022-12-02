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




$update="UPDATE PriceType SET PriceType='$value2' WHERE PriceTypeNo='$id'";

$result=mysqli_query($Connect,$update);







}
//else 
{
   // header("Location: Logout.php");
}






 ?>
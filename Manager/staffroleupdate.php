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
$value1=$_POST['rolename'];
$value2=$_POST['roledes'];


$update="UPDATE StaffRole SET StaffType='$value1',Description='$value2' WHERE StaffRoleNo='$id'";

$result=mysqli_query($Connect,$update);




}
//else 
{
   // header("Location: Logout.php");
}








 ?>
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
$value6=$_POST['data5'];
$value7=$_POST['data6'];
$value8=$_POST['data7'];
$value9=$_POST['data8'];



$update="UPDATE Staff SET StaffName='$value2',StaffRoleNo='$value3',StaffPhone='$value4',StaffEmail='$value5',StaffAddress='$value6',S_Username='$value7',S_Password='$value8',Gender='$value9' WHERE StaffID='$id'";

$result=mysqli_query($Connect,$update);







}
//else 
{
   // header("Location: Logout.php");
}






 ?>
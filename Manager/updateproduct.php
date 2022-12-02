<?php 	



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';
  date_default_timezone_set("Asia/Yangon");

 if(isset( $_FILES["file"] ) && !empty( $_FILES["file"]["name"] ))
 {
 $targetfolder1 = "../upload/";

 $targetfolder = $targetfolder1 ."upload_".rand(1,100000)."_".basename( $_FILES['file']['name']) ;


$file_type=$_FILES['file']['type'];

if ( $file_type=="image/png" || $file_type=="image/jpeg" || $file_type=="image/jpg" || (!empty($_FILES["uploaded_file"]["type"]))) {
    
 

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {



 }

 else {
 echo "<script>alert('Problem uploading file');</script>";


 }


}

else {
       echo "<script>alert('You may only upload PDFs, JPEGs or PNG or JPG files.');</script>";


}
 }
 else
 {
    $targetfolder="";
 }


if(isset($_POST['uname']) && isset($_POST['utype']) && isset($_POST['udescription']) )
{
	$productid=$_POST['uproductid'];
  $data1=$_POST['uname'];

  $data2=$_POST['utype'];
  $data3=$_POST['udescription'];


if($targetfolder=="")
{
	$query="UPDATE Product SET ProductName='$data1', ProductTypeNo='$data2', ProductDescription='$data3'  WHERE ProductID='$productid'";
}
  else
  {
  		$query="UPDATE Product SET ProductName='$data1', ProductTypeNo='$data2' , ProductDescription='$data3', Productimg='$targetfolder' WHERE ProductID='$productid'";
  }
  $result=mysqli_query($Connect,$query);
  if($result)
  {
echo "<script>alert('succ'); window.location.href = 'product.php';</script>";

  }
  else
  {
    echo "<script>alert('fail');</script>";
  }

}






 ?>
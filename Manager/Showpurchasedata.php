<?php 
session_start();
//if(!isset($_SESSION['Login_Session']))
{
//header("Location: ../Login.php");
}
//if($_SESSION['userRoleID']==4)
{

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';


$query="SELECT * FROM ProductPurchase ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
$supid=$arr1['SupplierID'];
$staffid=$arr1['StaffID'];
$shopid=$arr1['Shop_ID'];

                             $dat3="SELECT * FROM Supplier WHERE SupplierID='$supid' ";
                        $res3=mysqli_query($Connect,$dat3);
                          if (mysqli_num_rows($res3) > 0) {
                            $arr3 = mysqli_fetch_array($res3);
                            $SupName=$arr3['Sup_Name'];

                          }
                                   $dat3="SELECT * FROM Staff WHERE StaffID='$staffid' ";
                        $res3=mysqli_query($Connect,$dat3);
                          if (mysqli_num_rows($res3) > 0) {
                            $arr3 = mysqli_fetch_array($res3);
                            $StaffName=$arr3['StaffName'];

                          }
                          else
                          {
                          	 $StaffName="";
                          }

         $dat3="SELECT * FROM Shop WHERE Shop_ID='$shopid' ";
                        $res3=mysqli_query($Connect,$dat3);
                          if (mysqli_num_rows($res3) > 0) {
                            $arr3 = mysqli_fetch_array($res3);
                            $ShopName=$arr3['ShopName'];

                          }



echo '   <tr>
                      <th scope="row">'.$number.'</th>
               	       <td>'.$SupName.'</td>
               	       <td>'.$StaffName.'</td>
               	       <td>'.$arr1['Date'].'</td>   
                       <td>'.$arr1['TotalPrice'].'</td>
                       <td>'.$ShopName.'</td>
                      <td><a href="purchasedetail.php?ppid='.$arr1['PP_ID'].'" class="btn btn-primary">View</a></td>
                  
           
                    

            
                      <td>
                  		

                
                      </td>
                    </tr>
                ';
  }


}
}


 ?>
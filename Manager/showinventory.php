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


$query="SELECT * FROM Inventory ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
$pdid=$arr1['PD_ID'];
    $id3=$arr1['Shop_ID'];
 $pd="SELECT * FROM ProductDetail WHERE PD_ID='$pdid'";
                        $rpd=mysqli_query($Connect,$pd);
                          if (mysqli_num_rows($rpd) > 0) {
                           
                       while($arr11 = mysqli_fetch_array($rpd)){
                   $id1=$arr11['ProductID'];
                              $id2=$arr11['MeasurementTypeNo'];

                             $dat1="SELECT * FROM Product WHERE ProductID='$id1' ";
                        $res1=mysqli_query($Connect,$dat1);
                          if (mysqli_num_rows($res1) > 0) {
                            $arr2 = mysqli_fetch_array($res1);

                            $product=$arr2['ProductName'];
                          }

                           $dat2="SELECT * FROM Measurement WHERE MeasurementTypeNo='$id2' ";
                        $res2=mysqli_query($Connect,$dat2);
                          if (mysqli_num_rows($res2) > 0) {
                            $arr3 = mysqli_fetch_array($res2);
                            $measurement=$arr3['MeasurementType'];

                          }
                        }
                      }
                             $dat3="SELECT * FROM Shop WHERE Shop_ID='$id3' ";
                        $res3=mysqli_query($Connect,$dat3);
                          if (mysqli_num_rows($res3) > 0) {
                            $arr3 = mysqli_fetch_array($res3);
                            $shopname=$arr3['ShopName'];

                          }


echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.'Product :' .$product.' Type :'.$measurement.'</td>
                          <td>'.$arr1['Qty'].'</td>
                      <td>'.$shopname.'</td>
                
                  
           
                    

            
                      <td>
                  
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['InventoryID'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }


}
}


 ?>
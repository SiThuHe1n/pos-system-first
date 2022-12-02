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
$data=$_POST['id'];
$data2=$_POST['id1'];

     $qu="SELECT * FROM Price WHERE PriceID='$data'";
               $qs=mysqli_query($Connect,$qu);
                          if (mysqli_num_rows($qs) > 0) {
                           
                       while($ar1 = mysqli_fetch_array($qs)){
                        $prc=$ar1['Price'];
                        $prid=$ar1['PD_ID'];

 $pd="SELECT * FROM ProductDetail WHERE PD_ID='$prid'";
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
                            $pimg=$arr2['Productimg'];
                          }
                          else
                          {
                             $product="No data";
                            $pimg="";
                          }

                           $dat2="SELECT * FROM Measurement WHERE MeasurementTypeNo='$id2' ";
                        $res2=mysqli_query($Connect,$dat2);
                          if (mysqli_num_rows($res2) > 0) {
                            $arr3 = mysqli_fetch_array($res2);
                            $measurement=$arr3['MeasurementType'];

                          }
                          else
                          {
                             $measurement="No data";
                          }
                        }
                      }

                      $se="SELECT * FROM Inventory WHERE PD_ID='$prid' AND Shop_ID='$data2'";
                         $res3=mysqli_query($Connect,$se);
                          if (mysqli_num_rows($res3) > 0) {
                            $arr4 = mysqli_fetch_array($res3);
                            $quantity=$arr4['Qty'];
                          }
                          else
                          {
                               $quantity=0;
                          }
                    }
                  }
                  else
                  {
                  $product="No data";
                            $pimg="nodata.jpg";
                          $measurement="No data";
                            $quantity=0;
                            $prc=0;
                  }
                      


echo '  
 <div class="mb-3"> <img src="'.$pimg.'" width="150px" height="150px">
  <p> Product Name : </p> 
  <input type="text" id="pdid" class="form-control" value="'.$prid.'" readonly hidden>
    <input type="text" id="name" class="form-control" value="'.$product.'" readonly hidden>
  <input type="text" id="pddata" class="form-control" value=" Product : '.$product.' Type :'.$measurement.'" readonly >
</div>




  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Product Price:</label>
  <input type="number" id="price" value="'.$prc.'" class="form-control"  placeholder=" Product Price" readonly>
</div>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Product Qty</label>
  <input type="number" id="qty" class="form-control"  min="0" max="'.$quantity.'" placeholder=" Quantity">
    <input type="number" id="maxnum" class="form-control" value="'.$quantity.'" placeholder=" Quantity" hidden>
</div>



                ';
  

}


 ?>
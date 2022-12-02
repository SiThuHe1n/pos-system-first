<?php 
include 'connect.php';
$ptype=$_POST['id'];
if($ptype=="ALL")
{
  
       
              $qu="SELECT * FROM Price";
               $qs=mysqli_query($Connect,$qu);
                          if (mysqli_num_rows($qs) > 0) {
                           
                       while($ar1 = mysqli_fetch_array($qs)){
                        $prc=$ar1['Price'];
                        $prid=$ar1['PD_ID'];
             $qrole="SELECT * FROM ProductDetail where PD_ID='$prid'";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                           
                       while($arr1 = mysqli_fetch_array($roless)){
                              $id1=$arr1['ProductID'];
                              $id2=$arr1['MeasurementTypeNo'];
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
                        echo "<option value='".$ar1['PriceID']."'>".' Product :'.$product.' Type :'.$measurement."</option>
              ";
                       }
                     }
                   }
                 }

          

}
else
{

   $qu="SELECT * FROM Price Where PriceTypeNo='$ptype'";
               $qs=mysqli_query($Connect,$qu);
                          if (mysqli_num_rows($qs) > 0) {
                           
                       while($ar1 = mysqli_fetch_array($qs)){
                        $prc=$ar1['Price'];
                        $prid=$ar1['PD_ID'];
             $qrole="SELECT * FROM ProductDetail where PD_ID='$prid'";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                           
                       while($arr1 = mysqli_fetch_array($roless)){
                              $id1=$arr1['ProductID'];
                              $id2=$arr1['MeasurementTypeNo'];
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
                        echo "<option value='".$ar1['PriceID']."'>".' Product :'.$product.' Type :'.$measurement."</option>
              ";
                       }
                     }
                   }
                 }
                

}


 ?>


        


 


<?php 


session_start();
  include 'connect.php';
  if(isset($_SESSION["Login_Session"]) && $_SESSION["Login_Session"]=="Customer")
  {
    
    $userID=$_SESSION["UserID"];
    
  }
  else{
      header("location: Logout.php");
      
  }
  





 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> OrderList</title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css' integrity='sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css'/>
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Thein Than Soe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  " aria-current="page" href="Order.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Orderlist.php">Your Order List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="Account.php">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="Logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>

    </tr>
  </thead>
  <tbody>
      
               <?php 
               $soid=$_GET['soid'];
$query="SELECT * FROM SaleOrderDetail WHERE SO_ID='$soid' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;



$priceid=$arr1['PriceID'];

$pricequery="SELECT * FROM Price WHERE PriceID='$priceid' ";
    $pres=mysqli_query($Connect,$pricequery);
                          if (mysqli_num_rows($pres) > 0) {
                            $arrpr = mysqli_fetch_array($pres);
                            $pdid=$arrpr['PD_ID'];
                            $price=$arrpr['Price'];
                          }
$payment="SELECT * FROM Payment WHERE SO_ID='$soid' ";
    $paymentres=mysqli_query($Connect,$payment);
                          if (mysqli_num_rows($paymentres) > 0) {
                            $arrpayment = mysqli_fetch_array($paymentres);
                            $paymenttype=$arrpayment['P_Type'];
                     
                          }
                          else
                          {
                            $paymenttype='nodata';
                          }


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





echo '   <tr>
                      <th scope="row">'.$number.'</th>
           
                       <td>'.'Product :' .$product.' Type :'.$measurement.'</td>
                
                     <td>'.$price.'</td>  
                       <td>'.$arr1['Qty'].'</td> 
                      
           
                
                  
           
                    

            
                      <td>
                      

                
                      </td>
                    </tr>
                ';
  }


} ?>
  </tbody>
</table>
</div>


</body>
</html>
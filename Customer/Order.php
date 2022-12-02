<?php include 'connect.php';

 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	if(isset($_SESSION["Login_Session"]) && $_SESSION["Login_Session"]=="Customer")
	{
		  date_default_timezone_set("Asia/Yangon");
  $date=date("Y-m-d H:i:s");
		$userID=$_SESSION["UserID"];


			
		
  if(isset($_POST['numdata']) && $_POST['numdata']>0 )
  {
  	$numdata=$_POST['numdata'];
  	$shop=$_POST['inputshop'];
  	$totalprice=$_POST['inputtotalprice'];
  
  	$status="OnlineOrder";
  	$note="Name :".$_SESSION['UserName']."  Phone :".$_POST['inputphone']."  Address :".$_POST['inputaddress'];


 $pd="SELECT * FROM SaleOrder order by SO_ID desc limit 1 ";
                        $rpd=mysqli_query($Connect,$pd);
                          if (mysqli_num_rows($rpd) > 0) {
                          	$arrid = mysqli_fetch_array($rpd);
                          	$auid=$arrid['SO_ID']+1;

                          }
                          else
                          {
                          		$auid=1;
                          }








  $query="INSERT INTO SaleOrder (SO_ID,CustomerID,OrderDate,OrderStatus,TotalPrice,Note,Shop_ID,StaffID) VALUES 
  ('$auid','$userID','$date','$status','$totalprice','$note','$shop',0)";
  $result=mysqli_query($Connect,$query);
  if($result)
  {



 $paytype='CashOnDelivery';
      $query11="INSERT INTO Payment (P_Type,P_Date,SO_ID,CustomerID) VALUES 
  ('$paytype','$date','$auid',$userID)";
  $result11=mysqli_query($Connect,$query11);
  if($result11)
  {
  }
  else
  {

  }





$pd="SELECT * FROM SaleOrderDetail order by SOD_ID desc limit 1 ";
                        $rpd=mysqli_query($Connect,$pd);
                          if (mysqli_num_rows($rpd) > 0) {
                          	$arrid = mysqli_fetch_array($rpd);
                          	$auid1=$arrid['SOD_ID']+1;

                          }
                          else
                          {
                          		$auid1=1;
                          }
                         for ($i=1;$i<=$numdata;$i++)
                         {
                         	   $pid=$_POST['inputproduct'.$i];
                         	   $pqty=$_POST['inputqty'.$i];
                         	$pd="SELECT * FROM Inventory Where PD_ID='$pid' AND Shop_ID='$shop' ";
                        $rpd=mysqli_query($Connect,$pd);
                          if (mysqli_num_rows($rpd) > 0) {
                          	$arrid = mysqli_fetch_array($rpd);
                          	$invID=$arrid['InventoryID'];

                          }
                          else
                          {


							}

                          
                            $query="INSERT INTO Inventoryout (SOD_ID,InventoryID,Qty,Date) VALUES ('$auid1','$invID','$pqty','$date')";
								  $result=mysqli_query($Connect,$query);
								  if($result)
								  {
									 
								  }
								  else
								  {
								    echo "<script>alert('fail');</script>";
								  }

								   $query="UPDATE Inventory SET Qty=Qty-'$pqty' Where InventoryID='$invID' ";
								  $result=mysqli_query($Connect,$query);
								  if($result)
								  {
									 
								  }
								  else
								  {
								    echo "<script>alert('fail');</script>";
								  }

                        
                    
                       $priceid=$_POST['inputpriceid'.$i];
                          $pprice=$_POST['inputprice'.$i];
                     
                         
  $query="INSERT INTO SaleOrderDetail (SOD_ID,SO_ID,PriceID,Qty) VALUES ('$auid1','$auid','$priceid','$pqty')";
  $result=mysqli_query($Connect,$query);
  if($result)
  {
  	$auid1++;

  }
  else
  {
    echo "<script>alert('fail');</script>";
  }
   }


echo "<script>alert('succ');</script>";
  }
  else
  {
    echo "<script>alert('fail');</script>";
  }

  }

	}
	else

	{
	        header("location: Logout.php");
	}
	








 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Order </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
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
          <a class="nav-link active " aria-current="page" href="Order.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Orderlist.php">Your Order List</a>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
	<div class="row">

      <div class="col-md-7">
      	<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Shop </label>
  <select class="form-control" name="shop" id="shop"> 
	     <?php $qrole="SELECT * FROM Shop";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr1 = mysqli_fetch_array($roless)){
                        echo "<option value='".$arr1['Shop_ID']."'>".$arr1['ShopName']."</option>
              ";
                       }
                     }

                  ?>

	</select>

</div>
    	<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Category </label>
  <select class="form-control" id="category"> 
  	<option value="ALL"> ALL</option>
	     <?php $qrole="SELECT * FROM ProductType";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr1 = mysqli_fetch_array($roless)){
                        echo "<option value='".$arr1['ProductTypeNo']."'>".$arr1['ProductType']."</option>
              ";
                       }
                     }

                  ?>

	</select>

</div>

	<div class="row" id="itemdiv">
  


    	</div>
	
	    <script type="text/javascript">
	    	
    var id2=$('#shop').val();
   var id3=$('#category').val();
  

		  $.ajax({

            
                 type: "POST",
                url: "itemdiv.php",
                data: {
                     
                          id1:id2,
                          id2:id3
                 
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#itemdiv').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });



	    </script>
	   <script type="text/javascript">

	   	$(document).ready(function () {
var shopid=$('#shop').val();
 $('#inputshop').val(shopid);
$('#shop').on('change', function() {
 const id1=$(this).find(":selected").val();
   const id2=$('#category').val();
 $('#inputshop').val(id1);

		  $.ajax({

            
                 type: "POST",
                url: "itemdiv.php",
                data: {
                     
                          id1:id1,
                          id2:id2
                 
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#itemdiv').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
});

$('#category').on('change', function() {
 const id2=$(this).find(":selected").val();
   const id1=$('#shop').val();
  

		  $.ajax({

            
                 type: "POST",
                url: "itemdiv.php",
                data: {
                     
                          id1:id1,
                          id2:id2
                 
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#itemdiv').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
});

	


		});

	    </script>

    </div>

  <div class="col-md-5">
    	<h4> Order Item</h4>

<form action="Order.php" method="POST"> 
    <input type="text" id="inputshop" class="form-control" name="inputshop"  readonly >
  <input type="text" id="numdata" class="form-control" name="numdata"  readonly >
      <label for="inputsupplier" class="form-label">TotalPrice</label>
  <input type="text" id="inputtotalprice" class="form-control" name="inputtotalprice" readonly >
  <?php 

$qrole="SELECT * FROM Customer WHERE CustomerID='$userID'";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr1 = mysqli_fetch_array($roless)){
               
                 




   ?>

     <label for="inputsupplier"  class="form-label">Phone</label>
  <input type="text" id="inputphone" value="<?php echo $arr1['C_Phone']; ?>" class="form-control" name="inputphone"  >
       <label for="inputsupplier" class="form-label">Address</label>
  <textarea type="text" id="inputaddress"  class="form-control" name="inputaddress" ><?php echo $arr1['C_Address']; ?></textarea>
<?php }} ?>
    	<table class="table  table-hover" >
    		  <thead>
<tr>
    <th>No</th>
<th scope="col">Product</th>

<th scope="col">Price</th>
<th scope="col" >ProductQty</th>


<th scope="col">Action</th>

</tr>
  </thead>
<tbody id="tbody">
  
  </tbody>

</table>
    	<script>
var rowIdx = 0;
var valu=0;
var totalprice=0;
$(document).ready(function() {



$("#tbody").on("click", ".remove", function () {
      valu--;

  // Getting all the rows next to the 
  // row containing the clicked button
  var child = $(this).closest("tr").nextAll();

  // Iterating across all the rows 
  // obtained to change the index
  child.each(function () {
        
      // Getting <tr> id.
      var id = $(this).attr("id");

      // Getting the <p> inside the .row-index class.
      var idx = $(this).children(".row-index").children("p");
       
                  var dat1 = $(this).children(".data1").children(".dat");
                   var dat2 = $(this).children(".data2").children(".dat");
                    var dat3 = $(this).children(".data3").children(".dat");
                     var dat4 = $(this).children(".data4").children(".dat");
                      var dat5 = $(this).children(".data5").children(".dat");
      // Gets the row number from <tr> id.
      var dig = parseInt(id.substring(1));
    

      // Modifying row index.
      idx.html(` ${dig-1}`);
      dat1.attr("name",`inputproduct${dig-1}`);
 
      dat3.attr("name",`inputprice${dig-1}`);
      dat4.attr("name",`inputqty${dig-1}`);




      // Modifying row id.
      $(this).attr("id", `R${dig - 1}`);
  });

  // Removing the current row.
  $(this).closest("tr").remove();

  // Decreasing the total number of rows by 1.
  rowIdx--;
    $("#numdata").val(rowIdx);

    	var tot1=0;
          for(let i=1;i<=rowIdx;i++)
          {
         
          	 tot1+=parseFloat($("input[name=inputprice"+i+"]").val())*parseFloat($("input[name=inputqty"+i+"]").val());
         
          }
           	 totalprice=tot1;
                 $("#inputtotalprice").val(totalprice);
                   if(rowIdx<=0)
   {
   $("#shop").attr("disabled", false);
   }
   else if(rowIdx>0)
   {
   $("#shop").attr("disabled", true);
   }
 
});


});
</script>
<button class="btn btn-info " id='Order'> Order Item </button>

</form>

    </div>







</div></div>

<script type="text/javascript">
	$(document).ready(function() {



});
</script>

</body>
</html>
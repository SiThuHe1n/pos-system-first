<?php
include 'connect.php';

  date_default_timezone_set("Asia/Yangon");
  $date=date("Y-m-d H:i:s");

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  session_start();
  if(isset($_SESSION["Login_Session"]) && $_SESSION["Login_Session"]=="StaffLogin")
    {
        
          $staff=$_SESSION["UserID"];
        
    }
    else

    {
            header("location: Logout.php");
    }
    
  if(isset($_POST['numdata']) && $_POST['numdata']>0 )
  {
  	$numdata=$_POST['numdata'];
  	$shop=$_POST['inputshop'];
  	$totalprice=$_POST['inputtotalprice'];
  	$supplier=$_POST['inputsupplier'];


 $pd="SELECT * FROM ProductPurchase order by PP_ID desc limit 1 ";
                        $rpd=mysqli_query($Connect,$pd);
                          if (mysqli_num_rows($rpd) > 0) {
                          	$arrid = mysqli_fetch_array($rpd);
                          	$auid=$arrid['PP_ID']+1;

                          }
                          else
                          {
                          		$auid=1;
                          }








  $query="INSERT INTO ProductPurchase (PP_ID,SupplierID,StaffID,Date,TotalPrice,Shop_ID) VALUES 
  ('$auid','$supplier','$staff','$date','$totalprice','$shop')";
  $result=mysqli_query($Connect,$query);
  if($result)
  {

$pd="SELECT * FROM ProductPurchaseDetail order by PPD_ID desc limit 1 ";
                        $rpd=mysqli_query($Connect,$pd);
                          if (mysqli_num_rows($rpd) > 0) {
                          	$arrid = mysqli_fetch_array($rpd);
                          	$auid1=$arrid['PPD_ID']+1;

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


								  $query="INSERT INTO Inventory (PD_ID,Qty,Shop_ID) VALUES ('$pid',0,'$shop')";
								  $result=mysqli_query($Connect,$query);
								  if($result)
								  {
									   	$pd="SELECT * FROM Inventory Where PD_ID='$pid' AND Shop_ID='$shop' ";
				                        $rpd=mysqli_query($Connect,$pd);
				                          if (mysqli_num_rows($rpd) > 0) {
				                          	$arrid = mysqli_fetch_array($rpd);
				                          	$invID=$arrid['InventoryID'];
								  }
								  else
								  {
								    echo "<script>alert('fail');</script>";
								  }
								}
							}

                          
                            $query="INSERT INTO Inventoryin (PPD_ID,InventoryID,Qty,Date) VALUES ('$auid1','$invID','$pqty','$date')";
								  $result=mysqli_query($Connect,$query);
								  if($result)
								  {
									 
								  }
								  else
								  {
								    echo "<script>alert('fail');</script>";
								  }

								   $query="UPDATE Inventory SET Qty=Qty+'$pqty' Where InventoryID='$invID' ";
								  $result=mysqli_query($Connect,$query);
								  if($result)
								  {
									 
								  }
								  else
								  {
								    echo "<script>alert('fail');</script>";
								  }

                        
                    
                        
                       
                          $pprice=$_POST['inputprice'.$i];
                     
                          $note=$_POST['inputnote'.$i];
  $query="INSERT INTO ProductPurchaseDetail (PPD_ID,PP_ID,PD_ID,PurchasePrice,PurchaseQty,Note) VALUES ('$auid1','$auid','$pid','$pprice','$pqty','$note')";
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

  ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	   <style>
        .dat {
    border: 0;
}
    </style>
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
          <a class="nav-link " aria-current="page" href="sale.php">Sale</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="purchase.php">Purchase</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Logout.php">Logout</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
	<div class="row">
    <div class="col-md-4">
    	

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Product </label>
  <select class="form-control" id="product"> 
            <?php $qrole="SELECT * FROM ProductDetail";
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
                        echo "<option value='".$arr1['PD_ID']."'>".' Product :'.$product.' Type :'.$measurement."</option>
              ";
                       }
                     }

                  ?>


	</select>

</div>

<div class="mb-3" id="productdata">


</div>
	
	<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Product Price:</label>
  <input type="number" id="price" class="form-control"  placeholder=" Product Price">
</div>
<script type="text/javascript">
	$(document).ready(function () {
		var id1=$("#product").val();
		  $.ajax({

            
                 type: "POST",
                url: "showpd.php",
                data: {
                          id:id1
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#productdata').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });

$('#product').on('change', function() {
 var id=$(this).find(":selected").val();
    $.ajax({

            
                 type: "POST",
                url: "showpd.php",
                data: {
                          id:id
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#productdata').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
});


});




</script>

	<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Product Qty</label>
  <input type="number" id="qty" class="form-control"  placeholder=" Quantity">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Note </label>
  <textarea class="form-control" id="note" rows="3"></textarea>
</div>


<button name="additem" id="clickadd" class="btn btn-primary">AddItem</button>
<div id="adding"></div>

<br>	



    </div>
    <div class="col-md-8" >
    	<h2> Purchase Data</h2>
    	<form action="purchase.php" method="POST">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Shop </label>
  <select class="form-control" name="inputshop"> 
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
  <label for="exampleFormControlTextarea1" class="form-label">Supplier </label>
  <select class="form-control" name="inputsupplier"> 
	     <?php $qrole="SELECT * FROM Supplier";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr1 = mysqli_fetch_array($roless)){
                        echo "<option value='".$arr1['SupplierID']."'>".$arr1['Sup_Name']."</option>
              ";
                       }
                     }

                  ?>

	</select>

</div>

  <input type="text" id="numdata" class="form-control" name="numdata" value='0' readonly >
      <label for="inputsupplier" class="form-label">TotalPrice</label>
  <input type="text" id="inputtotalprice" class="form-control" name="inputtotalprice" readonly >

    	<table class="table  table-hover" >
    		  <thead>
<tr>
    <th>No</th>
<th scope="col">Product</th>
<th scope="col">ProductName</th>
<th scope="col">Price</th>
<th scope="col" >ProductQty</th>
<th  scope="col">Note</th>

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



$("#clickadd").click(function() {

if(!$('#price').val())
{
alert('Enter Price');
}
else if(!$('#qty').val())
{
alert('Enter Qty');
}
else 
{
        var product= $('#product').val();
        var pddata=$('#pddata').val();
        var name= $('#name').val();
        var price= $('#price').val();
        var qty= $('#qty').val();
        var note= $('#note').val();
        var shop= $('#shop').val();
        var supplier=$('#supplier').val();
    

       valu++;
       
          $('#tbody').append(`<tr id="R${++rowIdx}">
          <td class="row-index text-center">
                <p> ${rowIdx}</p></td>
        
            <td class="data1">
<input type="text" name="inputproduct${rowIdx}"  class="form-control  dat"  value="${product}" hidden >

        ${pddata}
            </td>
            <td class="data2">
            <input type="text" name="inputname${rowIdx}"  class="form-control dat" value="${name}" hidden>
        
     ${name}
            </td>
            <td class="data3">
            <input type="text" name="inputprice${rowIdx}" class="form-control dat"  value="${price}" hidden>
    ${price}
            </td>
                <td class="data4">
                <input type="text" name="inputqty${rowIdx}"  class="form-control dat"  value="${qty}" hidden>
   ${qty}
            </td>
                <td class="data5">
                <input type="text" name="inputnote${rowIdx}"  class="form-control dat"  value="${note}" hidden>
${note}
            </td>
            
            <td class="text-center">
            <button class="btn btn-danger remove" 
                type="button">Remove</button>
            </td>

           </tr>`);
           	var tot=0;
          for(let i=1;i<=rowIdx;i++)
          {
         
          	 tot+=parseFloat($("input[name=inputprice"+i+"]").val())*parseFloat($("input[name=inputqty"+i+"]").val());
         
          }
           	 totalprice=tot;
                 $('#inputtotalprice').val(totalprice);
            $('#numdata').val(rowIdx);
 
 }    
});


$('#tbody').on('click', '.remove', function () {
      valu--;

  // Getting all the rows next to the 
  // row containing the clicked button
  var child = $(this).closest('tr').nextAll();

  // Iterating across all the rows 
  // obtained to change the index
  child.each(function () {
        
      // Getting <tr> id.
      var id = $(this).attr('id');

      // Getting the <p> inside the .row-index class.
      var idx = $(this).children('.row-index').children('p');
       
                  var dat1 = $(this).children('.data1').children('.dat');
                   var dat2 = $(this).children('.data2').children('.dat');
                    var dat3 = $(this).children('.data3').children('.dat');
                     var dat4 = $(this).children('.data4').children('.dat');
                      var dat5 = $(this).children('.data5').children('.dat');
      // Gets the row number from <tr> id.
      var dig = parseInt(id.substring(1));
    

      // Modifying row index.
      idx.html(` ${dig-1}`);
      dat1.attr('name',`inputproduct${dig-1}`);
      dat2.attr('name',`inputname${dig-1}`);
      dat3.attr('name',`inputprice${dig-1}`);
      dat4.attr('name',`inputqty${dig-1}`);
      dat5.attr('name',`inputnote${dig-1}`);



      // Modifying row id.
      $(this).attr('id', `R${dig - 1}`);
  });

  // Removing the current row.
  $(this).closest('tr').remove();

  // Decreasing the total number of rows by 1.
  rowIdx--;
    $('#numdata').val(rowIdx);

    	var tot1=0;
          for(let i=1;i<=rowIdx;i++)
          {
         
          	 tot1+=parseFloat($("input[name=inputprice"+i+"]").val())*parseFloat($("input[name=inputqty"+i+"]").val());
         
          }
           	 totalprice=tot1;
                 $('#inputtotalprice').val(totalprice);
});

});
</script>






<button name="purchase" id="" class="btn btn-primary">Purchase</button>
</form>
    </div>

  </div>




</div>
</body>
</html>
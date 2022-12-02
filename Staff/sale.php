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
  
    $status=$_POST['saletype'];
    if(isset($_POST['inputcname']) && isset($_POST['inputcphone']) &&  isset($_POST['inputcaddress'])  )
{
      $note="Name :".$_POST['inputcname']."  Phone :".$_POST['inputcphone']."  Address :".$_POST['inputcaddress'];
}
else
{
  $note="";
}



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
  ('$auid',0,'$date','$status','$totalprice','$note','$shop','$staff')";
  $result=mysqli_query($Connect,$query);
  if($result)
  { 
    $paytype=$_POST['paymenttype'];
      $query11="INSERT INTO Payment (P_Type,P_Date,SO_ID,CustomerID) VALUES 
  ('$paytype','$date','$auid',0)";
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
                             $pid=$_POST['inputpdid'.$i];
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

                        
                    
                       $priceid=$_POST['inputproduct'.$i];
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
          <a class="nav-link active" aria-current="page" href="sale.php">Sale</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="purchase.php">Purchase</a>
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
    	

<div class="mb-3" id="pricediv">
  <label for="exampleFormControlTextarea1" class="form-label">Product </label>
  <select class="form-control" id="product"> 
            <?php
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

                  ?>


	</select>



</div>
<div class="mb-3">
     <label for="exampleFormControlInput1" class="form-label">Filter Price:</label>
   <select id="filterprice" class="form-control" >
    <option value="ALL">ALL</option>
     <?php  
       $qrole="SELECT * FROM PriceType";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr1 = mysqli_fetch_array($roless)){
                        echo "<option value='".$arr1['PriceTypeNo']."'>".$arr1['PriceType']."</option>
              ";
                       }
                     }
      ?>
   </select>

</div>
<div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Price No(optional):</label>
  <input type="number" id="priceno" value="" class="form-control"  placeholder="  Price No" >
  <button id="priceclick" class="btn btn-primary"> Click </button>
</div>
<div class="" id="productdata">


</div>
<div id="changescript"></div>
<script type="text/javascript">
	$(document).ready(function () {
     var pricetype=$('#filterprice').val();

$('#filterprice').change( function() {

     const id=$(this).find(":selected").val();
       $.ajax({

            
                 type: "POST",
                url: "pricediv.php",
                data: {
                          id:id
                          
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#product').html(res);

  const i1=$("#product").val();
    const i2=$('#inputshop').val();
   

      $.ajax({

            
                 type: "POST",
                url: "showpr.php",
                data: {
                          id:i1,
                          id1:i2
                     
                       
                      

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
    


         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
    

  
});

		var id1=$("#product").val();
    var id2=$('#inputshop').val();
   

		  $.ajax({

            
                 type: "POST",
                url: "showpr.php",
                data: {
                          id:id1,
                          id1:id2
                     
                       
                      

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

$('#product').change( function() {
 var id=$(this).find(":selected").val();
   var id3=$('#inputshop').val();
    $.ajax({

            
                 type: "POST",
                url: "showpr.php",
                data: {
                          id:id,
                          id1:id3
                     
                       
                      

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

$('#saletype').on('change', function() {
 const type=$(this).find(":selected").val();

    $.ajax({

            
                 type: "POST",
                url: "orderdiv.php",
                data: {
                          type:type
                     
                     
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#orderdiv').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
});



$( "#priceclick" ).click(function() {
const pnum=$('#priceno').val();
if(pnum<=0 || pnum=="")
{
  alert('enter price no');
}
else
{
  const id3=$('#inputshop').val();

   $.ajax({

            
                 type: "POST",
                url: "showpr.php",
                data: {
                          id:pnum,
                          id1:id3
                     
                       
                      

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
}
});



});




</script>





<button name="additem" id="clickadd" class="btn btn-primary">AddItem</button>
<div id="adding"></div>

<br>	



    </div>
    <div class="col-md-8" >
    	<h2> Sale Data</h2>
    	<form action="sale.php" method="POST">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Shop </label>
  <select class="form-control" name="inputshop" id="inputshop"> 
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
  <label for="exampleFormControlTextarea1" class="form-label"> Sale Type </label>
  <select class="form-control" name="saletype" id="saletype"> 
       <option value="sale">Sale</option>
    <option value="orderatshop">Order</option>
 
             

  </select>

</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label"> Payment Type </label>
  <select class="form-control" name="paymenttype" id="paymenttype"> 
       <option value="Cash">Cash</option>
    <option value="Card">Card</option>
 
             

  </select>

</div>
<div class="mb-3" id="orderdiv">

</div>


  <input type="text" id="numdata" class="form-control" name="numdata" value='0' readonly hidden>
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
else if(!$('#qty').val()  )
{
alert('Enter Qty');
}
else if($('#qty').val()<=0 ||  parseInt($("#qty").val())>parseInt($("#maxnum").val()) )
{
  alert('Out of Stock / Maximum Qty is '+$('#maxnum').val());
}
else 
{

        var product= $('#product').val();
             var pdid= $('#pdid').val();
        var pddata=$('#pddata').val();
        var name= $('#name').val();
        var price= $('#price').val();
        var qty= $('#qty').val();
      
        var shop= $('#shop').val();
        var supplier=$('#supplier').val();
    

       valu++;
       
          $('#tbody').append(`<tr id="R${++rowIdx}">
          <td class="row-index text-center">
                <p> ${rowIdx}</p></td>
        
            <td class="data1">
<input type="text" name="inputproduct${rowIdx}"  class="form-control  dat"  value="${product}" hidden >
<input type="text" name="inputpdid${rowIdx}"  class="form-control  dat"  value="${pdid}" hidden >


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

              if(rowIdx<=0)
   {
   $('#inputshop').attr('readonly', false);
   }
   else if(rowIdx>0)
   {
   $('#inputshop').attr('readonly', true);
   }
 
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
               if(rowIdx<=0)
   {
   $('#inputshop').attr('readonly', false);
   }
   else if(rowIdx>0)
   {
   $('#inputshop').attr('readonly', true);
   }
});

});
</script>






<button name="purchase" class="btn btn-primary" id="">Purchase</button>
</form>
    </div>

  </div>




</div>
</body>
</html>
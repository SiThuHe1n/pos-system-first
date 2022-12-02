<?php 
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';

$data2=$_POST['id1'];
$data3=$_POST['id2'];
 


     $qu="SELECT * FROM Price WHERE PriceTypeNo=2";
               $qs=mysqli_query($Connect,$qu);
                          if (mysqli_num_rows($qs) > 0) {
                           
                       while($ar1 = mysqli_fetch_array($qs)){
                       	 	$ap="";
                        $prc=$ar1['Price'];
                        $prid=$ar1['PD_ID'];
                        $priceid=$ar1['PriceID'];

 $pd="SELECT * FROM ProductDetail WHERE PD_ID='$prid'";
                        $rpd=mysqli_query($Connect,$pd);
                          if (mysqli_num_rows($rpd) > 0) {
                           
                       while($arr11 = mysqli_fetch_array($rpd)){
                   $id1=$arr11['ProductID'];
                              $id2=$arr11['MeasurementTypeNo'];
                              if($data3=="ALL")
                              {
                           $dat1="SELECT * FROM Product WHERE ProductID='$id1' ";
                              }
                              else
                              {
                        $dat1="SELECT * FROM Product WHERE ProductID='$id1' AND ProductTypeNo='$data3' ";
                              }
         
                        $res1=mysqli_query($Connect,$dat1);
                          if (mysqli_num_rows($res1) > 0) {
                            $arr2 = mysqli_fetch_array($res1);

                            $product=$arr2['ProductName'];
                            $pimg=$arr2['Productimg'];
                          }
                          else
                          {
                          	$ap="none";
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

if($ap=="none")
{

}
else
{



echo '


  <div class="col-md-5 p-3 cont" align="center">

  <div class="mb-2 ">
			   <img src="'.$pimg.'" width="150px" height="150px">
			     <input type="text"  class="form-control" id="priceid'.$priceid.'" value="'.$priceid.'" readonly>
			</div>

    		  <div class="mb-2 row">
			    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
			    <div class="col-sm-7 mx-auto 	">
			      <input type="text" readonly class="form-control" id="name'.$priceid.'" value="'.$product.'">
			       <input type="text" readonly class="form-control" id="product'.$priceid.'" value="'.$prid.'" hidden>
			     
			    </div>
			  </div>

			   <div class="mb-2 row">
			    <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
			    <div class="col-sm-7 mx-auto 	">
			      <input type="text" readonly class="form-control" id="type'.$priceid.'" value="'.$measurement.'">
			    </div>
			  </div>


			   <div class="mb-2 row">
			    <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
			    <div class="col-sm-7 mx-auto 	">
			      <input type="text" readonly class="form-control" id="price'.$priceid.'" value="'.$prc.'">
			    </div>
			  </div>

			  <div class="mb-2 row">
			    <label for="staticEmail" class="col-sm-2 col-form-label">Qty</label>
			    <div class="col-md-7 mx-auto 	 ">
			      <input type="text"  class="form-control" id="qty'.$priceid.'" value="">

			       <input type="text"  class="form-control" id="maxnum'.$priceid.'" value="'.$quantity.'" readonly hidden>
			    </div>
			
			  
			
			  </div>
				 <div class="mb-2 row">
				    <button class="btn btn-info additem" id="'.$priceid.'"> ADD </button>
				</div>
    </div>
   



    ';

}



                    }
                    echo ' <script type="text/javascript">

	   	$(document).ready(function () {

		

$(".additem").click(function() {
const id=this.id;
if(!$("#price"+id).val())
{
alert("Enter Price");
}
else if(!$("#qty"+id).val())
{
alert("Enter Qty");
}
else if($("#qty"+id).val()<=0 || parseInt($("#qty"+id).val())>parseInt($("#maxnum"+id).val()) )
{
  alert("Out of Stock / Maximum Qty is "+$("#maxnum"+id).val());
}
else 
{
        var product= $("#product"+id).val();
        var pddata="Name = "+$("#name"+id).val()+" Type = "+$("#type"+id).val();
        var price= $("#price"+id).val();
        var qty= $("#qty"+id).val();
     var priceid= $("#priceid"+id).val();
        var shop= $("#shop").val();
     
    
priceid
       valu++;
       
          $("#tbody").append(`<tr id="R${++rowIdx}">
          <td class="row-index text-center">
                <p> ${rowIdx}</p></td>
        
            <td class="data1">
<input type="text" name="inputproduct${rowIdx}"  class="form-control  dat"  value="${product}" hidden >
<input type="text" name="inputpriceid${rowIdx}"  class="form-control  dat"  value="${priceid}" hidden  >
        ${pddata}
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
                 $("#inputtotalprice").val(totalprice);
            $("#numdata").val(rowIdx);
             if(rowIdx<=0)
   {
   $("#shop").attr("disabled", false);
   }
   else if(rowIdx>0)
   {
   $("#shop").attr("disabled", true);
   }
 
 
 }    
});



});


	

	    </script>';
                  }
                  else
                  {
                  $product="No data";
                            $pimg="nodata.png";
                          $measurement="No data";
                            $quantity=0;
                            $prc=0;




                  }
                      

  






 ?>
<?php 


session_start();
//if(!isset($_SESSION['Login_Session']))
{
//header("Location: ../Login.php");
}
//if($_SESSION['userRoleID']==4)
{

  if(isset($_SESSION["Login_Session"]) && $_SESSION["Login_Session"]=="Manager")
    {
        $userID=$_SESSION["UserID"];
            
        
    }
    else

    {
            header("location: Logout.php");
    }

include 'connect.php';
  date_default_timezone_set("Asia/Yangon");
if(isset($_POST['cdata']) &&  isset($_POST['cshop']) )
{

  $data1=$_POST['cdata'];
  $data2=0;
  $data3=$_POST['cshop'];



  $query="INSERT INTO Inventory (PD_ID,Qty,Shop_ID) VALUES ('$data1','$data2','$data3')";
  $result=mysqli_query($Connect,$query);
  if($result)
  {
echo "<script>alert('succ');</script>";
  }
  else
  {
    echo "<script>alert('fail');</script>";
  }

}




}
//else 
{
 //   header("Location: Logout.php");
}




 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manger Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light light-bg fixed-top">
      <div class="container-fluid">
        <!-- offcanvas button-->
        <button
          class="navbar-toggler me-2"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample"
          aria-controls="offcanvasExample"
        >
          <i class="fa-solid fa-align-left"></i>
        </button>
        <a class="navbar-brand fw-bold text-uppercase me-auto" href="#"
          >Thein Than Soe</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
            <div class="input-group my-3 my-lg-0">
              
            </div>
      
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-circle"></i> Manager
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdown"
              >
               
                <li>
                  <a class="dropdown-item" href="Logout.php">Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- offcanvas sidebar-->

    <div
      class="offcanvas offcanvas-start sidebar-nav light-bg"
      tabindex="-1"
      id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-light">
          <ul class="navbar-nav">
            <li><div class="text-muted fw-bold small p-3">MAIN</div></li>
            
            <li>
              <a href="staffrole.php" class="nav-link px-3">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                StaffRole
              </a>
            </li>
            <li>
              <a href="staff.php" class="nav-link px-3">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                 Staff
              </a>
            </li>

            <li>
              <a href="supplier.php" class="nav-link px-3 ">
                <span class="me-2">
                <i class="fas fa-database"></i>
                </span>
                Supplier
              </a>
            </li>
                 <li>
              <a href="measurement.php" class="nav-link px-3 ">
                <span class="me-2">
     <i class="fas fa-database"></i>
                </span>
                Measurement
              </a>
            </li>
             <li>
              <a href="producttype.php" class="nav-link px-3 ">
                <span class="me-2">
                 <i class="fas fa-database"></i>
                </span>
                ProductType
              </a>
            </li>
               <li>
              <a href="product.php" class="nav-link px-3 ">
                <span class="me-2">
       <i class="fas fa-database"></i>
                </span>
                Product
              </a>
            </li>
               <li>
              <a href="productdetail.php" class="nav-link px-3 ">
                <span class="me-2">
            <i class="fas fa-database"></i>
                </span>
                ProductDetail
              </a>
            </li>
               <li>
              <a href="shop.php" class="nav-link px-3 ">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                Shop
              </a>
            </li>
               <li>
              <a href="pricetype.php" class="nav-link px-3 ">
                <span class="me-2">
            <i class="fas fa-database"></i>
                </span>
                PriceType
              </a>
            </li>
               <li>
              <a href="price.php" class="nav-link px-3 ">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                Price
              </a>
            </li>
               <li>
              <a href="inventory.php" class="nav-link px-3 ">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                Inventory
              </a>
            </li>
                  <li>
              <a href="Purchasedata.php" class="nav-link px-3 text-primary ">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                Purchase
              </a>
            </li>
                  <li>
              <a href="Saledata.php" class="nav-link px-3 ">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                Sale
              </a>
            </li>
                  <li>
              <a href="orderdata.php" class="nav-link px-3 ">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                Order
              </a>
            </li>
                  <li>
              <a href="orderonlinedata.php" class="nav-link px-3 ">
                <span class="me-2">
               <i class="fas fa-database"></i>
                </span>
                Order(Online)
              </a>
            </li>
     

          
          </ul>
        </nav>
      </div>
    </div>
    <!--Main Section-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col mx-3">
            <div class="row mb-2 pb-3">
              <div class="col-xs-8">
                <h2 class="h3 page-header">Purchase Detail </h2>
              </div>
            </div>
            <hr class="dropdown-divider" />
            <div class="card rounded-0 mt-3">
              <div class="card-header p-2 mb-3">
                <h5 class="card-title font-weight-bold">All Purchase Data </h5>
              </div>
              <div class="card-body">
             
                  <div class="form-group row mx-auto">
              

                
                      
               
            
                    
              
                  </div>
             

                <table
                  class="table table-responsive table-striped data-table table-hover text-center"
                >
                  <thead class="">
                    <tr>
                       <th> No</th>
                       <th>Purchase ID  </th>
                       <th>Product Data  </th>
                       <th>Price  </th>
                       <th>Qty  </th>
                       <th>Note  </th>
                   


                    
                    </tr>
                  </thead>
                  <tbody id="tbo">
                 
               <?php 
               $ppid=$_GET['ppid'];
$query="SELECT * FROM ProductPurchaseDetail WHERE PP_ID='$ppid' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
$pdid=$arr1['PD_ID'];
$supid=$arr1['SupplierID'];
$staffid=$arr1['StaffID'];
$shopid=$arr1['Shop_ID'];
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
                       <td>'.$arr1['PP_ID'].'</td>
                       <td>'.'Product :' .$product.' Type :'.$measurement.'</td>
            
                       <td>'.$arr1['PurchasePrice'].'</td>   
                       <td>'.$arr1['PurchaseQty'].'</td>
                     <td>'.$arr1['Note'].'</td>
                
                  
           
                    

            
                      <td>
                      

                
                      </td>
                    </tr>
                ';
  }


} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Create user Modal -->
  
    <!-- Reset Password Modal -->
       <?php 
          $use="SELECT * FROM Inventory ";
          $resuse= mysqli_query($Connect, $use);
          if (mysqli_num_rows($resuse) > 0) {
          while($arr1 = mysqli_fetch_array($resuse)){

                     ?>

   
    <!-- Edit User Modal -->

    <!-- DELETE CONFRIM MODAL -->
    
<script type="text/javascript">
  


  $(document).ready(function(){
  Show();
 
  

})


</script>
    <?php 
}
}
     ?>
 <script type="text/javascript">
      
$(document).ready(function(){
   $("#btnsort").click(function() {
              
                Show(); 

             
        });
    $("#btnsearch").click(function() {
              
             Show();
             
        });
  Show();
 
})


   </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  
  </body>
</html>

<?php 

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
              <a href="Purchasedata.php" class="nav-link px-3 text-primary">
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
                <h2 class="h3 page-header">Purchase Data </h2>
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
       
                       <th>Supplier Name  </th>
                       <th>Staff Name  </th>
                       <th>Date  </th>
                       <th>Total Price  </th>
                       <th>Shop Name  </th>


                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody id="tbo">
                 
               
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
    

   
    <!-- Edit User Modal -->

    <!-- DELETE CONFRIM MODAL -->
    
<script type="text/javascript">
  


  $(document).ready(function(){
  Show();
 
  

})


</script>
    <?php 

     ?>
 <script type="text/javascript">
        function Show()
        {
        
    var sort=$("#sort").val();
     var search=$('#search').val();  
            $.ajax({

            
                 type: "POST",
                url: "Showpurchasedata.php",
                data: {
                          sort:sort,
                          search:search
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#tbo').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
         
          }
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

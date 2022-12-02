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
if(isset($_POST['cdata']) &&  isset($_POST['ctype']) && isset($_POST['cprice']) && isset($_POST['cnote'])  )
{

  $data1=$_POST['cdata'];
  $data2=$_POST['ctype'];
  $data3=$_POST['cprice'];
  $data4=$_POST['cnote'];


  $query="INSERT INTO Price (PD_ID,PriceTypeNo,Price,Note) VALUES ('$data1','$data2','$data3','$data4')";
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
              <a href="price.php" class="nav-link px-3 text-primary">
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
              <a href="Purchasedata.php" class="nav-link px-3 ">
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
                <h2 class="h3 page-header">Price </h2>
              </div>
            </div>
            <hr class="dropdown-divider" />
            <div class="card rounded-0 mt-3">
              <div class="card-header p-2 mb-3">
                <h5 class="card-title font-weight-bold">All Price </h5>
              </div>
              <div class="card-body">
             
                  <div class="form-group row mx-auto">
              

                
                      
               
            
                    
                    <div class="col-md-3 mt-2">
                      <button
                        type="button"
                        class="btn mt-3 btn-sm blue-bg text-white rounded-0"
                        data-bs-toggle="modal"
                        data-bs-target="#createUserModal"
                      >
                        + Add New Data
                      </button>
                    </div>
                  </div>
             

                <table
                  class="table table-responsive table-striped data-table table-hover text-center"
                >
                  <thead class="">
                    <tr>
                      <th> No</th>
                      <th>Product Data </th>
                       <th>Price Type </th>
                        <th>Price  </th>
                         <th>Note  </th>
                  
             
                  
                 
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
    <div
      class="modal fade"
      id="createUserModal"
      tabindex="-1"
      aria-labelledby="createUserModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header py-0 border-0">
            <h3
              class="modal-title mt-4 mx-auto font-weight-bold"
              id="createUserModalLabel"
            >
              <span style="font-size: 35px">C</span>reate
              <span style="font-size: 35px">P</span>rice
            </h3>
          </div>

          <div class="modal-body">
            <form  method="POST" action="price.php">
              <div class="form-group mb-3">
                <label for="username">Product Data:</label>
               <select        id="cdata"
                  type="text"
                  name="cdata"
                  class="form-control"
                  required>
                  
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
                      <div class="form-group mb-3">
                <label for="username">Price Type:</label>

                <select        id="ctype"
                  type="text"
                  name="ctype"
                  class="form-control"
                  required>
                  
              <?php $qrole="SELECT * FROM PriceType";
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
         
                 <div class="form-group mb-3">
                <label for="username">Price :</label>
                <input
                id="cprice"
                  type="number"
                  name="cprice"
                  class="form-control"
                  required
                />
              </div>
                 <div class="form-group mb-3">
                <label for="username">Note :</label>
                <textarea id="cnote"
                  type="text"
                  name="cnote"
                  class="form-control"
                  required>
                  


                </textarea>
            
              </div>
         
         
         
            
              
              <div style="overflow: auto" class="m-3">
                <button
                  type="button"
                  class="btn grey-bg"
                  style="float: left"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Close
                </button>
                <button
                  type="submit"
                  class="btn btn-primary"
                  style="float: right"
                >
                  Create
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Reset Password Modal -->
       <?php 
          $use="SELECT * FROM Price ";
          $resuse= mysqli_query($Connect, $use);
          if (mysqli_num_rows($resuse) > 0) {
          while($arr1 = mysqli_fetch_array($resuse)){

                     ?>

   
    <!-- Edit User Modal -->

    <div
      class="modal fade"
      id="editUserModal<?php echo $arr1['PriceID']; ?>"
      tabindex="-1"
      aria-labelledby="editUserModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header py-0 border-0">
            <h3
              class="modal-title mt-4 mx-auto font-weight-bold border-bottom border-secondary"
              id="editUserModalLabel"
            >
              Edit Information
            </h3>
          </div>

          <div class="modal-body">
      
              <div class="form-group mb-3">
                <label class="control-label">Product Data:</label>
                <select class="form-control" name="updata"    id="updata<?php echo $arr1['PriceID']; ?>" required>
                          <?php $qrole="SELECT * FROM ProductDetail";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr2 = mysqli_fetch_array($roless)){


                            $id1=$arr2['ProductID'];
                              $id2=$arr2['MeasurementTypeNo'];
                             $dat1="SELECT * FROM Product WHERE ProductID='$id1' ";
                        $res1=mysqli_query($Connect,$dat1);
                          if (mysqli_num_rows($res1) > 0) {
                            $aaa1 = mysqli_fetch_array($res1);

                            $product=$aaa1['ProductName'];
                          }

                           $dat2="SELECT * FROM Measurement WHERE MeasurementTypeNo='$id2' ";
                        $res2=mysqli_query($Connect,$dat2);
                          if (mysqli_num_rows($res2) > 0) {
                            $aaa2 = mysqli_fetch_array($res2);
                            $measurement=$aaa2['MeasurementType'];

                          }


                        if($arr1['PD_ID']==$arr2['PD_ID'])
                        {
                                  echo "<option value='".$arr1['PD_ID']."' Selected>".' Product :'.$product.' Type :'.$measurement."</option>
              ";
                        }
                        else
                        {
                               echo "<option value='".$arr1['PD_ID']."'>".' Product :'.$product.' Type :'.$measurement."</option>
              ";    }
                   
                       }
                     }

                  ?>
                  
                </select>
              </div>

               <div class="form-group mb-3">
                <label class="control-label">PriceType:</label>
                <select class="form-control" name="utype"    id="utype<?php echo $arr1['PriceID']; ?>" required>
                          <?php $qrole="SELECT * FROM PriceType";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr2 = mysqli_fetch_array($roless)){


                            

                        if($arr1['PD_ID']==$arr2['PD_ID'])
                        {
                             echo "<option value='".$arr2['PriceTypeNo']."' selected>".$arr2['PriceType']."</option>
              ";  }
                        else
                        {
                           echo "<option value='".$arr2['PriceTypeNo']."' >".$arr2['PriceType']."</option>
              "; }
                   
                       }
                     }

                  ?>
                  
                </select>
              </div>


                
                <div class="form-group mb-3">
                <label class="control-label">Price:</label>
                <input   class="form-control pl-2 rounded-0"
                  type="number"
                  name="uprice"
                  value="<?php echo $arr1['Price']; ?>"
                     id="uprice<?php echo $arr1['PriceID']; ?>">
            
              </div>


  <div class="form-group mb-3">
                <label class="control-label">Note:</label>
                <textarea   class="form-control pl-2 rounded-0"
                  type="text"
                  name="unote"
                  value=""
                     id="unote<?php echo $arr1['PriceID']; ?>"><?php echo $arr1['Note']; ?></textarea>
            
              </div>


               
              <div class="mt-4 text-center">
                <button
                  type="button"
                  class="btn btn-primary btn btn-sm rounded-0 mr-3 px-4"
                  data-bs-dismiss="modal"
                >
                  Back
                </button>
                <button type="submit"    id="Update<?php echo $arr1['PriceID']; ?>" class="btn btn-dark btn btn-sm rounded-0"  data-bs-dismiss="modal">
                  Update Data
                </button>
              </div>
         
          </div>
        </div>
      </div>
    </div>
    <!-- DELETE CONFRIM MODAL -->
    <div
      class="modal fade"
      id="deleteConfirmModal<?php echo $arr1['PriceID']; ?>"
      tabindex="-1"
      aria-labelledby="deleteConfirmModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-body">
            <br />
            <h4 class="text-center border-bottom border-dark pb-2">
              Delete data
            </h4>
            <p class="text-center mb-3 border-bottom border-dark py-4">
              Are you sure you want to delete this data?
              <span class="text-danger"
                >You cannot get this data  back once you have
                deleted.</span
              >
            </p>
            <div class="mx-auto text-center">
              <button
                type="button"
                class="btn btn-secondary mr-2"
                data-bs-dismiss="modal"
              >
                Cancel
              </button>
              <button class="btn btn-danger"  id="Delete<?php echo $arr1['PriceID']; ?>" data-bs-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  


  $(document).ready(function(){
  Show();
  $("#Delete<?php echo $arr1['PriceID']; ?>").click(function() {
                var id=<?php echo $arr1['PriceID']; ?>;
               

            $.ajax({
                type: "POST",
                url: "deleteprice.php",
                data: {
                        
                        id:id
                        
                },
                cache: false,
                success: function(data) {
                   Show();
                
                
        
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             
        });
  $("#Update<?php echo $arr1['PriceID']; ?>").click(function() {
                var id=<?php echo $arr1['PriceID']; ?>;
                var data1=$('#updata<?php echo $arr1['PriceID']; ?>').val();
                var data2=$('#utype<?php echo $arr1['PriceID']; ?>').val();
                var data3=$('#uprice<?php echo $arr1['PriceID']; ?>').val();
                var data4=$('#unote<?php echo $arr1['PriceID']; ?>').val();
           
              

                
               

            $.ajax({
                type: "POST",
                url: "updateprice.php",
                data: {
                        
                        id:id,
                        data1:data1,
                        data2:data2,
                        data3:data3,
                        data4:data4


                        
                },
                cache: false,
                success: function(data) {
                   Show();
                   
                
        
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             
        });

})


</script>
    <?php 
}
}
     ?>
 <script type="text/javascript">
        function Show()
        {
        
    var sort=$("#sort").val();
     var search=$('#search').val();  
            $.ajax({

            
                 type: "POST",
                url: "showprice.php",
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

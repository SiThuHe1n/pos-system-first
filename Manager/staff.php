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
if(isset($_POST['cname']) && isset($_POST['crole']) && isset($_POST['cphone']) && isset($_POST['cemail']) && isset($_POST['caddress']) && isset($_POST['cusername']) && isset($_POST['cpassword']) && isset($_POST['cgender'])  )
{

  $data1=$_POST['cname'];
  $data2=$_POST['crole'];
  $data3=$_POST['cphone'];
  $data4=$_POST['cemail'];
  $data5=$_POST['caddress'];
  $data6=$_POST['cusername'];
    $data7=$_POST['cpassword'];
      $data8=$_POST['cgender'];

  $query="INSERT INTO Staff (StaffName,StaffRoleNo,StaffPhone,StaffEmail,StaffAddress,S_Username,S_Password,Gender) VALUES ('$data1','$data2','$data3','$data4','$data5','$data6','$data7','$data8')";
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
    <title>Admin Dashboard</title>
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
              <a href="staff.php" class="nav-link px-3 text-primary">
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
                <h2 class="h3 page-header">Staff Management</h2>
              </div>
            </div>
            <hr class="dropdown-divider" />
            <div class="card rounded-0 mt-3">
              <div class="card-header p-2 mb-3">
                <h5 class="card-title font-weight-bold">All Staff Accounts</h5>
              </div>
              <div class="card-body">
             
                  <div class="form-group row mx-auto">
               
                    <div class="col-md-3 mb-3">
                 
                        
                    
                      <div class="form-inline">
                        <label for="userFilter">Sort Staff by :</label>
                        <div class="input-group w-75 mt-2">
                          <select name="sort"
                          id="sort"
                            class="form-control rounded-0 form-control-sm"
                          >
                               <option value="Default" selected>Default</option>
                            <option value="Name">Name</option>
                            <option value="Desc">Last Added</option>
                        
                            <option value="Asc">Earliest Added</option>
             
                          </select>
                          <div class="input-group-append">
                            <button
                              class="btn btn-sm btn-outline-dark rounded-0 px-1"
                              id="btnsort"
                              
                            >
                              Apply
                            </button>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                 

                
                      
               
                    <div class="col-md-3 mt-4">
                      <div class="input-group">
                        <input
                          type="text"
                          name="search"
                          id="search"
                          class="form-control form-control-sm rounded-0"
                          placeholder="Search For Users"
                          aria-label="Recipient's username"
                          aria-describedby="basic-addon2"
                        />
                        <div class="input-group-append">
                          <button
                          id="btnsearch";
                            class="btn btn-outline-success rounded-0 btn-sm"
                          >
                            <i class="fa-solid fa-magnifying-glass"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3 mt-2">
                      <button
                        type="button"
                        class="btn mt-3 btn-sm blue-bg text-white rounded-0"
                        data-bs-toggle="modal"
                        data-bs-target="#createUserModal"
                      >
                        + Add New Staff
                      </button>
                    </div>
                  </div>
             

                <table
                  class="table table-responsive table-striped data-table table-hover text-center"
                >
                  <thead class="">
                    <tr>
                      <th>Staff ID</th>
                      <th>Staff Name</th>
                      <th>Staff Type </th>
                      <th>Staff Phone.</th>
                      <th>Staff Email.</th>
                      <th>Staff Address</th>
                 
                      <th>S_Username</th>
                      <th>S_Password</th>
                           <th>Staff Gender</th>
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
              <span style="font-size: 35px">S</span>aff
            </h3>
          </div>

          <div class="modal-body">
            <form  method="POST" action="staff.php">
              <div class="form-group mb-3">
                <label for="username">Staff's Name:</label>
                <input
                id="cname"
                  type="text"
                  name="cname"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group mb-3">
                <label for="role">Staff's Type</label>
                <select class="form-control" name="crole" id="crole" required>
                  <?php $qrole="SELECT * FROM StaffRole";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr1 = mysqli_fetch_array($roless)){
                        echo "<option value='".$arr1['StaffRoleNo']."'>".$arr1['StaffType']."</option>
              ";
                       }
                     }

                  ?>
                  
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="email">Staff's Phone:</label>
                <input
                id="cphone"
                  type="phone"
                  name="cphone"
                  class="form-control"
                  required
                />
              </div>
                <div class="form-group mb-3">
                <label for="email">Staff's Email:</label>
                <input
                id="cemail"
                  type="email"
                  name="cemail"
                  class="form-control"
                  required
                />
              </div>
                <div class="form-group mb-3">
                <label for="email">Staff's Address:</label>
                <input
                id="caddress"
                  type="text"
                  name="caddress"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group mb-3">
                <label for="password">User's username:</label>
                <input
                id="cusername"
                  type="text"
                  name="cusername"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group mb-3">
                <label for="password">User's password:</label>
                <input
                id="cpassword"
                  type="text"
                  name="cpassword"
                  class="form-control"
                  required
                />
              </div>


          
              <div class="form-group mb-3">
                <label for="gender">User's Gender</label>
                <select class="form-control" name="cgender" id="cgender" required>
                  <option>Male</option>
                  <option>Female</option>
                </select>
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
          $use="SELECT * FROM Staff ";
          $resuse= mysqli_query($Connect, $use);
          if (mysqli_num_rows($resuse) > 0) {
          while($arr1 = mysqli_fetch_array($resuse)){

                     ?>

    <div
      class="modal fade"
      id="resetPasswordModal<?php echo $arr1['StaffID']; ?>"
      tabindex="-1"
      aria-labelledby="resetPasswordModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header py-0 border-0">
            <h3
              class="modal-title mt-4 mx-auto font-weight-bold border-bottom border-dark"
              id="resetPasswordModalLabel"
            >
              Are you sure you want to Reset password?
            </h3>
          </div>
          <div class="modal-body">
            <div class="mt-4 text-center">
              <p class="text-center mb-3 py-4">
                <span class="text-danger"
                  >This user's password will be changed to default password
                  after this.</span
                >
              </p>
              <button
                type="button"
                id="resetpass<?php echo $arr1['StaffID']; ?>"
                class="btn blue-bg text-white"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                Done
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit User Modal -->

    <div
      class="modal fade"
      id="editUserModal<?php echo $arr1['StaffID']; ?>"
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
              Edit Profile Information
            </h3>
          </div>

          <div class="modal-body">
      
              <div class="form-group mb-3">
                <label class="control-label">Name:</label>
                <input
                  class="form-control pl-2 rounded-0"
                  type="text"
                  name="fullname"
                  value="<?php echo $arr1['StaffName']; ?>"
                  id="uname<?php echo $arr1['StaffID']; ?>"
                />
              </div>

                 <div class="form-group mb-3">
                <label for="role">Type</label>
                <select class="form-control" name="urole"    id="urole<?php echo $arr1['StaffID']; ?>" required>
                          <?php $qrole="SELECT * FROM StaffRole";
                        $roless=mysqli_query($Connect,$qrole);
                          if (mysqli_num_rows($roless) > 0) {
                       while($arr2 = mysqli_fetch_array($roless)){
                        if($arr1['StaffRoleNo']==$arr2['StaffRoleNo'])
                        {
                               echo "<option value='".$arr2['StaffRoleNo']."' selected>".$arr2['StaffType']."</option>
              ";
                        }
                        else
                        {
                               echo "<option value='".$arr2['StaffRoleNo']."'>".$arr2['StaffType']."</option>
              ";
                        }
                   
                       }
                     }

                  ?>
                  
                </select>
              </div>
                <div class="form-group mb-3">
                <label class="control-label">Phone:</label>
                <input
                  class="form-control pl-2 rounded-0"
                  type="phone"
                  name="uphone"
                  value="<?php echo $arr1['StaffPhone']; ?>"
                     id="uphone<?php echo $arr1['StaffID']; ?>"
                />
              </div>

              <div class="form-group mb-3">
                <label class="control-label">Email:</label>
                <input
                  class="form-control pl-2 rounded-0"
                  type="email"
                  name="uemail"
                  value="<?php echo $arr1['StaffEmail']; ?>"
                     id="uemail<?php echo $arr1['StaffID']; ?>"
                />
              </div>

              <div class="form-group mb-3">
                <label class="control-label">Address:</label>
                <input
             
                  class="form-control pl-2 rounded-0"
                  type="text"
                  name="uaddress"
                     id="uaddress<?php echo $arr1['StaffID']; ?>"
                  value="<?php echo $arr1['StaffAddress']; ?>"
                />
              </div>
                  <div class="form-group mb-3">
                <label class="control-label">Username:</label>
                <input
             
                  class="form-control pl-2 rounded-0"
                  type="text"
                  name="uusername"
                     id="uusername<?php echo $arr1['StaffID']; ?>"
                  value="<?php echo $arr1['S_Username']; ?>"
                />
              </div>

    <div class="form-group mb-3">
                <label class="control-label">Password:</label>
                <input
             
                  class="form-control pl-2 rounded-0"
                  type="text"
                  name="upassword"
                     id="upassword<?php echo $arr1['StaffID']; ?>"
                  value="<?php echo $arr1['S_Password']; ?>"
                />
              </div>


              <div class="form-group mb-3">
                <label for="gender">User's Gender</label>
                <select class="form-control" name="ugender"    id="ugender<?php echo $arr1['StaffID']; ?>" required>
          
                         <?php
                        if($arr1['userGender']=="Male")
                        {
                               echo "       <option value='Male' selected>Male</option> ";
                        }
                          else
                     {
                       echo "      <option value='Male' >Male</option>";
                     }
                     
                   
                        if($arr1['userGender']!="Female")
                        {
                              echo "      <option value='Female' >Female</option> ";
                     
                     }
                          else
                        {
                               echo "      <option value='Female' selected>Female</option> ";
                        }
                   

                  ?>
                </select>
              </div>
          
               
              <div class="mt-4 text-center">
                <button
                  type="button"
                  class="btn btn-primary btn btn-sm rounded-0 mr-3 px-4"
                  data-bs-dismiss="modal"
                >
                  Back
                </button>
                <button type="submit"    id="Update<?php echo $arr1['StaffID']; ?>" class="btn btn-dark btn btn-sm rounded-0"  data-bs-dismiss="modal">
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
      id="deleteConfirmModal<?php echo $arr1['StaffID']; ?>"
      tabindex="-1"
      aria-labelledby="deleteConfirmModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-body">
            <br />
            <h4 class="text-center border-bottom border-dark pb-2">
              Delete Staff
            </h4>
            <p class="text-center mb-3 border-bottom border-dark py-4">
              Are you sure you want to delete this Staff?
              <span class="text-danger"
                >You cannot get this Staff account back once you have
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
              <button class="btn btn-danger"  id="Delete<?php echo $arr1['StaffID']; ?>" data-bs-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  


  $(document).ready(function(){
  Show();
  $("#Delete<?php echo $arr1['StaffID']; ?>").click(function() {
                var id=<?php echo $arr1['StaffID']; ?>;
               

            $.ajax({
                type: "POST",
                url: "staffdelete.php",
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
  $("#Update<?php echo $arr1['StaffID']; ?>").click(function() {
                var id=<?php echo $arr1['StaffID']; ?>;
                var data1=$('#uname<?php echo $arr1['StaffID']; ?>').val();
                var data2=$('#urole<?php echo $arr1['StaffID']; ?>').val();
                var data3=$('#uphone<?php echo $arr1['StaffID']; ?>').val();
                var data4=$('#uemail<?php echo $arr1['StaffID']; ?>').val();
                var data5=$('#uaddress<?php echo $arr1['StaffID']; ?>').val();
                var data6=$('#uusername<?php echo $arr1['StaffID']; ?>').val();
                var data7=$('#upassword<?php echo $arr1['StaffID']; ?>').val();
                var data8=$('#ugender<?php echo $arr1['StaffID']; ?>').val();
              

                
               

            $.ajax({
                type: "POST",
                url: "staffupdate.php",
                data: {
                        
                        id:id,
                        data1:data1,
                        data2:data2,
                        data3:data3,
                        data4:data4,
                        data5:data5,
                        data6:data6,
                        data7:data7,
                        data8:data8
                       


                        
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
$("#resetpass<?php echo $arr1['StaffID']; ?>").click(function() {
                var id=<?php echo $arr1['StaffID']; ?>;
               

            $.ajax({
                type: "POST",
                url: "resetpass.php",
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
                url: "staffshow.php",
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

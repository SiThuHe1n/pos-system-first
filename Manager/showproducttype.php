<?php 
session_start();
//if(!isset($_SESSION['Login_Session']))
{
//header("Location: ../Login.php");
}
//if($_SESSION['userRoleID']==4)
{

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';


$Sort=$_POST['sort'];
$Search=$_POST['search'];

if($Sort=="Default" || $Search!="")
{
$query="SELECT * FROM ProductType WHERE ProductType LIKE '%%%$Search%%%' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
 



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Name" || $Search!="")
{
  
$query="SELECT * FROM ProductType   WHERE ProductType LIKE '%%%$Search%%%' order by ProductType  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Asc" || $Search!="")
{
  
$query="SELECT * FROM ProductType   WHERE ProductType LIKE '%%%$Search%%%' order by ProductTypeNo ASC   ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;
  




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Desc" || $Search!="")
{
  
$query="SELECT * FROM ProductType   WHERE ProductType LIKE '%%%$Search%%%' ORDER BY ProductTypeNo DESC  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Default" || $Search=="")
{
  $number=0;
$query="SELECT * FROM ProductType ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;






echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Name" || $Search=="")
{
  $number=0;
$query="SELECT * FROM ProductType ORDER BY ProductType ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Asc" || $Search=="")
{
  $number=0;
$query="SELECT * FROM ProductType ORDER BY ProductTypeNo ASC ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Desc" || $Search=="")
{
  $number=0;
$query="SELECT * FROM ProductType ORDER BY ProductTypeNo DESC";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['StaffRoleNo'];

$number++;
    $query2="SELECT * FROM StaffRole WHERE StaffRoleNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);





echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductTypeNo'].'"
                        >
                          Delete
                        </button>
                    
                
                      </td>
                    </tr>
                ';
  }
}
}









}
//else 
{
  //  header("Location: Logout.php");
}






 ?>
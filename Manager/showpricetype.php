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
$query="SELECT * FROM PriceType WHERE PriceType LIKE '%%%$Search%%%' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
 



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
  
$query="SELECT * FROM PriceType   WHERE PriceType LIKE '%%%$Search%%%' order by PriceType  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
  
$query="SELECT * FROM PriceType   WHERE PriceType LIKE '%%%$Search%%%' order by PriceTypeNo ASC   ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;
  





echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
  
$query="SELECT * FROM PriceType   WHERE PriceType LIKE '%%%$Search%%%' ORDER BY PriceTypeNo DESC  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
$query="SELECT * FROM PriceType ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;






echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
$query="SELECT * FROM PriceType ORDER BY PriceType ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
$query="SELECT * FROM PriceType ORDER BY PriceTypeNo ASC ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
$query="SELECT * FROM PriceType ORDER BY PriceTypeNo DESC";
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
                      <td>'.$arr1['PriceType'].'</td>
           
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PriceTypeNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PriceTypeNo'].'"
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
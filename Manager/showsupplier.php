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
$query="SELECT * FROM Supplier WHERE Sup_Name LIKE '%%%$Search%%%' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
 



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
  
$query="SELECT * FROM Supplier   WHERE Sup_Name LIKE '%%%$Search%%%' order by Sup_Name  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
  
$query="SELECT * FROM Supplier   WHERE Sup_Name LIKE '%%%$Search%%%' order by SupplierID ASC   ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;
  



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
  
$query="SELECT * FROM Supplier   WHERE Sup_Name LIKE '%%%$Search%%%' ORDER BY SupplierID DESC  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
$query="SELECT * FROM Supplier ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;




echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
$query="SELECT * FROM Supplier ORDER BY Sup_Name ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
$query="SELECT * FROM Supplier ORDER BY SupplierID ASC ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
$query="SELECT * FROM Supplier ORDER BY SupplierID DESC";
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
                      <td>'.$arr1['Sup_Name'].'</td>
           
                      <td>'.$arr1['Sup_Phone'].'</td>
                      <td>'.$arr1['Sup_Email'].'</td>
                      <td>'.$arr1['Sup_Address'].'</td>
                    

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['SupplierID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['SupplierID'].'"
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
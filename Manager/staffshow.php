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
$query="SELECT * FROM Staff WHERE StaffName LIKE '%%%$Search%%%' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['StaffRoleNo'];

$number++;
    $query2="SELECT * FROM StaffRole WHERE StaffRoleNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Name" || $Search!="")
{
  
$query="SELECT * FROM Staff   WHERE StaffName LIKE '%%%$Search%%%' order by StaffName  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['StaffRoleNo'];

$number++;
    $query2="SELECT * FROM StaffRole WHERE StaffRoleNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Asc" || $Search!="")
{
  
$query="SELECT * FROM Staff   WHERE StaffName LIKE '%%%$Search%%%' order by StaffID ASC   ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['StaffRoleNo'];

$number++;
    $query2="SELECT * FROM StaffRole WHERE StaffRoleNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Desc" || $Search!="")
{
  
$query="SELECT * FROM Staff   WHERE StaffName LIKE '%%%$Search%%%' ORDER BY StaffID DESC  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['StaffRoleNo'];

$number++;
    $query2="SELECT * FROM StaffRole WHERE StaffRoleNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
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
$query="SELECT * FROM Staff ";
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
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
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
$query="SELECT * FROM Staff ORDER BY StaffName ";
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
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
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
$query="SELECT * FROM Staff ORDER BY StaffID ASC ";
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
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
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
$query="SELECT * FROM Staff ORDER BY StaffID DESC";
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
                      <td>'.$arr1['StaffName'].'</td>
                      <td>'.$arr2['StaffType'].'</td>
                      <td>'.$arr1['StaffPhone'].'</td>
                      <td>'.$arr1['StaffEmail'].'</td>
                      <td>'.$arr1['StaffAddress'].'</td>
                      <td>'.$arr1['S_Username'].'</td>
                        <td>'.$arr1['S_Password'].'</td>
                          <td>'.$arr1['Gender'].'</td>

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['StaffID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['StaffID'].'"
                        >
                          Reset Acc
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
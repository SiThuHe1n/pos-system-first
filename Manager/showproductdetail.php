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



$query="SELECT * FROM ProductDetail";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
$urid=$arr1['ProductID'];
$urid2=$arr1['MeasurementTypeNo'];
    $query2="SELECT * FROM Product WHERE ProductID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);
    $query3="SELECT * FROM Measurement WHERE MeasurementTypeNo='$urid2' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr2['ProductName'].'</td>
                      <td>'.$arr3['MeasurementType'].'</td>
           
            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['PD_ID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['PD_ID'].'"
                        >
                          Delete
                        </button>
                     
                      </td>
                    </tr>
                ';
  
}
}





}
//else 
{
  //  header("Location: Logout.php");
}






 ?>
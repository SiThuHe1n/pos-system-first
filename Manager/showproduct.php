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
$query="SELECT * FROM Product WHERE ProductName LIKE '%%%$Search%%%' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
$urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimg'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
  
$query="SELECT * FROM Product   WHERE ProductName LIKE '%%%$Search%%%' order by ProductName  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
 $urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimage'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
  
$query="SELECT * FROM Product   WHERE ProductName LIKE '%%%$Search%%%' order by ProductID ASC   ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
  $urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimage'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
  
$query="SELECT * FROM Product   WHERE ProductName LIKE '%%%$Search%%%' ORDER BY ProductID DESC  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;
   $urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimage'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
$query="SELECT * FROM Product ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
   $urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimage'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
$query="SELECT * FROM Product ORDER BY ProductName ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){

$number++;
   $urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimage'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
$query="SELECT * FROM Product ORDER BY ProductID ASC ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
  $urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimage'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
$query="SELECT * FROM Product ORDER BY ProductID DESC";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){


$number++;
    $urid=$arr1['ProductTypeNo'];
    $query2="SELECT * FROM ProductType WHERE ProductTypeNo='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);



echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['ProductName'].'</td>
                      <td>'.$arr2['ProductType'].'</td>
                      <td>'.$arr1['ProductDescription'].'</td>
                      <td>         <img src="'.$arr1['Productimage'].'" width="200px" height="200px"></td>
                 

            
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['ProductID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['ProductID'].'"
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
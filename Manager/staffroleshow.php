   <?php 
   session_start();
//if(!isset($_SESSION['Login_Session']))
{
//header("Location: ../Login.php");
}
//if($_SESSION['userRoleID']==4)
{
$roleno=0;

   include 'connect.php';
          $role="SELECT * FROM StaffRole ";
          $resurole= mysqli_query($Connect, $role);
          if (mysqli_num_rows($resurole) > 0) {
          while($arr1 = mysqli_fetch_array($resurole)){
            $roleno++;

                   echo'
                    <tr>
                     
                      <td>'.$roleno.'</td>
                      <td>'.$arr1['StaffType'].'</td>
                  
                      <td>'.$arr1['Description'].'</td>
                  
                    
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editModal'.$arr1['StaffRoleNo'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['StaffRoleNo'].'"
                        >
                          Delete
                        </button>
                      
                      </td>
                    </tr>
                     ';




             }}


}
//else 
{
 //   header("Location: Logout.php");
}

 ?>
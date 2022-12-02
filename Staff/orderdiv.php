<?php 

$type=$_POST['type'];

if($type=="sale")
{

}
else if ($type=="orderatshop")
{
echo '

   <label for="" class="form-label"> Customer Name</label>
  <input type="text" id="inputcname" class="form-control" name="inputcname" required  >
     <label for="" class="form-label"> Customer Phone</label>
  <input type="text" id="inputcphone" class="form-control" name="inputcphone" required >
     <label for="" class="form-label"> Customer Address</label>
  <textarea type="text" id="inputcaddress" class="form-control" name="inputcaddress" required ></textarea>





';
}




 ?>
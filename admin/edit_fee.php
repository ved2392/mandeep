<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<?php
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$feeid = $_REQUEST['id'];
$getfee ="SELECT * FROM `student_fee` WHERE id = $feeid";
$getquery = mysqli_query($conn, $getfee);
while($getrow = mysqli_fetch_assoc($getquery)){
$stud_id = $getrow['student_id'];	
$stud_name = $getrow['student_name'];	
$stud_totalfee = $getrow['total_fee'];	
$stud_paid = $getrow['paid'];		
$stud_pending = $getrow['pending'];	
}

if(isset($_POST['update'])){
$student_id =$_POST['student_id'];	
$totalfee =$_POST['totalfee'];	
$paid_fee =$_POST['paid_fee'];	
$pending_fee =$_POST['pending_fee'];

$get_name = "SELECT * FROM `user_table` WHERE id = '$student_id'"; 
$getquery = mysqli_query($conn, $get_name);
while($getrow = mysqli_fetch_assoc($getquery)){
$student_name = $getrow['name'];	
}

echo $addfee = "INSERT INTO `student_fee`(`id`, `student_id`, `student_name`, `total_fee`, `paid`, `pending`) VALUES (' ','$student_id','$student_name','$totalfee','$paid_fee','$pending_fee')";
$addfeequery = mysqli_query($conn, $addfee);
if($addfeequery){
	$success = "Fess Added Successfully";
	header('location: student_fee.php');
}
else
{
$error = "Fess Added Successfully";	
}	
}

?>
<div class="main-admin">

<div class="col-xs-12 col-sm-3 no_space">
<?php include "admin_sidebar.php" ;?>
</div>
<div class="col-xs-12 col-sm-9">
<div class="main">
<div class="register-from fees">
<h2>Edit Student Fees</h2>
 <div class="success"><?php echo $success; ?></div>
  <div class="error"><?php echo $error; ?></div>
<form action ="" method ="post">
     <div class="col-xs-12 col-sm-12">
       <div class="form-group">
	   <label for="email">Student Id</label>
      <select class="form-control" name="student_id">
	  <option value="">--Select Student Id--</option>
	  <?php 
	  echo $studentsql = "SELECT * FROM `user_table` WHERE role = 'student'";
	  $studentquery = mysqli_query($conn, $studentsql);
	  while($studentrow = mysqli_fetch_assoc($studentquery)){
	?>
	<option <?php  if($studentrow['id'] == $stud_id) { echo "selected" ;}?> value="<?php echo $studentrow['id']; ?>"><?php echo $studentrow['id']; ?></option>
    <?php	
	  }
	  ?>
	  </select>
       </div>
     </div>
	 <div class="col-xs-12 col-sm-12">
  <div class="form-group">
  <label >Total Fees</label>
      <input type="text" class="form-control" id="totalfee" placeholder="Total Fees" value ="<?php echo $stud_totalfee; ?>" name="totalfee" required>
  </div>
  </div>
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
   <label >Fees Paid</label>
      <input type="text" class="form-control" id="paid_fee" placeholder="Paid Fees" value ="<?php echo $stud_paid; ?>" name="paid_fee" required>
  </div>
  </div>
   <div class="col-xs-12 col-sm-12">
  <div class="form-group">
   <label >Pending Fees</label>
      <input type="text" class="form-control" id="pending_fee" placeholder="Pending Fees" name="pending_fee" value = "<?php echo $stud_pending; ?>" required>
  </div>
  </div>
	 <div class="col-xs-12 col-sm-12">
       <div class="form-group">
       <button type="submit" class="button" name="update"> Update</button>
       </div>
     </div>
	  </form>
 </div>
	  <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

</div>
</div>
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<?php
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

if(isset($_POST['add_fees'])){
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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Fees</h4>
      </div>
      <div class="modal-body">
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
	<option value="<?php echo $studentrow['id']; ?>"><?php echo $studentrow['id']; ?></option>
    <?php	
	  }
	  ?>
	  </select>
       </div>
     </div>
	 <div class="col-xs-12 col-sm-12">
  <div class="form-group">
  <label >Total Fees</label>
      <input type="text" class="form-control" id="totalfee" placeholder="Total Fees" name="totalfee" required>
  </div>
  </div>
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
   <label >Fees Paid</label>
      <input type="text" class="form-control" id="paid_fee" placeholder="Paid Fees" name="paid_fee" required>
  </div>
  </div>
   <div class="col-xs-12 col-sm-12">
  <div class="form-group">
   <label >Pending Fees</label>
      <input type="text" class="form-control" id="pending_fee" placeholder="Pending Fees" name="pending_fee" required>
  </div>
  </div>
	 <div class="col-xs-12 col-sm-12">
       <div class="form-group">
       <button type="submit" class="button" name="add_fees"> Submit</button>
       </div>
     </div>
	  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div class="main">
<h2>Manage Users</h2>
 <div class="success"><?php echo $success; ?></div>
  <div class="error"><?php echo $error; ?></div>
<div class="button" data-toggle="modal" data-target="#myModal">Add New</div>
<table id="myTable" class="table table-striped table-bordered table-hover datatable dataTable" style="font-size:14px;text-align:center">  
        <thead>  
          <tr>  
            <th>S No.</th>  
            <th>Student Id</th>  
            <th>Student Name</th>  
            <th>Total Fees</th>
            <th>Fees Paid</th>			
            <th>Fees Pending</th>			
            <th>Delete</th>			
            <th>Edit</th>			
          </tr>  
        </thead>
		  <tbody> 
<?php 
$getfee = "SELECT * FROM student_fee";
$feequery = mysqli_query($conn, $getfee);
$result = mysqli_num_rows($feequery);
if($result>0){
$sno = 1;
while($row = mysqli_fetch_assoc($feequery)){
$id = $row['id'];
$student_id = $row['student_id'];
$student_name = $row['student_name'];
$total_fee = $row['total_fee'];
$paid = $row['paid'];
$pending = $row['pending'];
?>
<tr>  
            <td><?php echo $sno ; ?></td>  
            <td><?php echo $student_id ; ?></td>  
            <td><?php echo $student_name ; ?></td>  
            <td><?php echo $total_fee ; ?></td>  
            <td><?php echo $paid ; ?></td>  
            <td><?php echo $pending ; ?></td>   
            <td><a class="delete" href="delete_fee.php?id=<?php echo $id; ?>"><img src="img/delete.png" style="width:15px"></a></td>  
            <td><a class="edit" href="edit_fee.php?id=<?php echo $id; ?>"><img src="img/edit.png" style="width:15px"></a>
			
			
			</td>  
          </tr> 

<?php
$sno++;
}
}
else{
echo "<h1>No Record Found</h1>";	
}
?>		 
        </tbody>  
      </table>  
	  <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<script>

</div>
</div>
</div>
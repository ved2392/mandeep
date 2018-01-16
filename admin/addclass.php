<?php 
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

if(isset($_POST['add'])){
$classname = $_POST['classname'];	
$start_time = $_POST['start_time'];	
$end_time = $_POST['end_time'];	
$day = $_POST['day'];	
$subject = $_POST['subject'];
$teacher = $_POST['teacher'];
$student = $_POST['studentname'];

$addsql = "INSERT INTO `class_table`(`id`, `class_name`, `start_time`, `end_time`, `day`, `subject_id`, `teacher`, `student`) VALUES (' ','$classname','$start_time','$end_time','$day','$subject','$teacher','$student')";

$addquery = mysqli_query($conn, $addsql);
if($addquery){
	$success = "Class added suyccessfully";
}
else{
	$error = "Error while adding class";
}	
}
?>
<div class="main-admin">

<div class="col-xs-12 col-sm-3 no_space">
<?php include "admin_sidebar.php" ;?>
</div>
<div class="col-xs-12 col-sm-9">
<div class="main">
<div class="register-from class">

  <h2>Add Classes</h2>
  <div class="success"><?php echo $success; ?></div>
  <div class="error"><?php echo $error; ?></div>
  <form action="" method="post">
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
  <label for="Register_as">Claass Name</label>
       <input type="text" class="form-control" id="name" placeholder="Class Name" name="classname" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
   <label for="Register_as">Start Time</label>
      <select class="form-control" id="start_time" name="start_time" required>
	  <?php for($i =1;$i<=12;$i++)
	  { ?>
 <option><?php echo $i; ?>:00 am</option> 
	  <?php }  
	  for($i =1;$i<=12;$i++){
		?>
		<option><?php echo $i; ?>:00 pm</option> 
      <?php		
	  } 
	  ?>
  </select>
  </div>
  </div>
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
   <label for="Register_as">End Time</label>
      <select class="form-control" id="end_time" name="end_time" required>
	  <?php for($i =1;$i<=12;$i++)
	  { ?>
 <option><?php echo $i; ?>:00 am</option> 
	  <?php }  
	  for($i =1;$i<=12;$i++){
		?>
		<option><?php echo $i; ?>:00 pm</option> 
      <?php		
	  } 
	  ?>
  </select>
  </div>
  </div>



<div class="col-xs-12 col-sm-6">
  <div class="form-group">
      <label for="Register_as">Day</label>
	<select class="form-control"  name="day" required>
	  <option value="Monday">Monday</option>
	  <option value="Tuesday">Tuesday</option>
	  <option value="Wednesday">Wednesday</option>
	  <option value="Thursday">Thursday</option>
	  <option value="Friday">Friday</option>
	  <option value="Saturday">Saturday</option>
	</select>
  </div>
</div>

<div class="col-xs-12 col-sm-6">
  <div class="form-group">
      <label for="Register_as">Subject</label>
	<select class="form-control"  name="subject" required>
	<option value="">--Select Subject--</option>
<?php 
$getsub = "SELECT * FROM subject_table order by id desc";
$getquery = mysqli_query($conn, $getsub);
while($getrow = mysqli_fetch_assoc($getquery)){
	?>
	<option value="<?php echo $getrow['id']; ?>"><?php echo $getrow['name']; ?></option>
	<?php
}

?>
	</select>
  </div>
</div>

<div class="col-xs-12 col-sm-6">
  <div class="form-group">
      <label>Select Teacher</label>
<select class="form-control"  name="teacher" required>
	<option value="">--Select Teacher--</option>
	   <?php 
	   $getstudent ="SELECT * FROM user_table  WHERE role='teacher'";
	   $studquery  =mysqli_query($conn, $getstudent);
	   while($studrow = mysqli_fetch_assoc($studquery)){
		?>
		<option value="<?php echo $studrow['id']; ?>"><?php echo $studrow['name']; ?></option>
        <?php 		 
	   }
	   ?>
	  
	</select>
  </div>
</div>

<div class="col-xs-12 col-sm-6">
     <div class="form-group">
	  <label>Select Student</label>
	 <select class="form-control"  name="studentname" required>
	 <option value="">--Select Student--</option>
	   <?php 
	   $getstudent ="SELECT * FROM user_table  WHERE role='student'";
	   $studquery  =mysqli_query($conn, $getstudent);
	   while($studrow = mysqli_fetch_assoc($studquery)){
		?>
		<option value="<?php echo $studrow['id']; ?>"><?php echo $studrow['name']; ?></option>
        <?php 		 
	   }
	   ?>
	  
	</select>
      </div>
     </div>

<div class="col-xs-12 col-sm-12">
  <div class="form-group">
<button type="submit" name = "add" class="button" >Add Class</button>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>


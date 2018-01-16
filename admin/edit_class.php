<?php 
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$class_id = $_REQUEST['id'];
$editsql = "SELECT * FROM class_table WHERE id='$class_id'";
$editquery = mysqli_query($conn, $editsql);
while($editrow = mysqli_fetch_assoc($editquery)){
	$clasid = $editrow['id'];
	$clasname = $editrow['class_name'];
	$class_start_time = $editrow['start_time'];
	$class_end_time = $editrow['end_time'];
	$class_day = $editrow['day'];
	$class_subject_id = $editrow['subject_id'];
	$class_teacher = $editrow['teacher'];
	$class_student = $editrow['student'];
}

if(isset($_POST['update'])){
$classname = $_POST['classname'];	
$start_time = $_POST['start_time'];	
$end_time = $_POST['end_time'];	
$day = $_POST['day'];	
$subject = $_POST['subject'];
$teacher = $_POST['teacher'];
$student = $_POST['studentname'];

$updatesql = "UPDATE `class_table` SET `id`='$clasid',`class_name`='$classname',`start_time`='$start_time',`end_time`='$end_time',`day`='$day',`subject_id`='$subject',`teacher`='$teacher',`student`='$student' WHERE id='$clasid'";

$updatequery = mysqli_query($conn, $updatesql);
if($updatequery){
	$success = "Class Updated suyccessfully";
}
else{
	$error = "Error while Updating class";
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
       <input type="text" class="form-control" id="name" placeholder="Class Name" value ="<?php echo $clasname; ?> "name="classname" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
   <label for="Register_as">Start Time</label>
      <select class="form-control" id="start_time" name="start_time" required>
	  <?php for($i =1;$i<=12;$i++)
	  { ?>
 <option <?php  if($class_start_time = $i.":00 am") { echo "selected" ; }?> ><?php echo $i;?>:00 am</option> 
	  <?php }  
	  for($i =1;$i<=12;$i++){
		?>
		<option  <?php  if($class_start_time = $i.":00 pm") { echo "selected" ; }?>><?php echo $i; ?>:00 pm</option> 
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
 <option  <?php if($class_end_time = $i.":00 am") { echo "selected" ; }?>><?php echo $i; ?>:00 am</option> 
	  <?php }  
	  for($i =1;$i<=12;$i++){
		?>
		<option <?php if($class_end_time = $i.":00 pm") { echo "selected" ; }?>><?php echo $i; ?>:00 pm</option> 
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
	  <option <?php if($class_day == "Monday"){ echo "selected" ; } ?> value="Monday">Monday</option>
	  <option <?php if($class_day == "Tuesday"){ echo "selected" ; } ?> value="Tuesday">Tuesday</option>
	  <option  <?php if($class_day == "Wednesday"){ echo "selected" ; } ?> value="Wednesday">Wednesday</option>
	  <option  <?php if($class_day == "Thursday"){ echo "selected" ; } ?> value="Thursday">Thursday</option>
	  <option <?php if($class_day == "Friday"){ echo "selected" ; } ?> value="Friday">Friday</option>
	  <option <?php if($class_day == "Saturday"){ echo "selected" ; } ?> value="Saturday">Saturday</option>
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
	<option <?php  if($getrow['id'] == $class_subject_id){ echo "selected" ;} ?> value="<?php echo $getrow['id']; ?>"><?php echo $getrow['name']; ?></option>
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
	   while($techrow = mysqli_fetch_assoc($studquery)){
		?>
		<option <?php  if($techrow['id'] == $class_teacher){ echo "selected" ;} ?> value="<?php echo $techrow['id']; ?>"><?php echo $techrow['name']; ?></option>
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
		<option <?php  if($studrow['id'] == $class_student){ echo "selected" ;} ?> value="<?php echo $studrow['id']; ?>"><?php echo $studrow['name']; ?></option>
        <?php 		 
	   }
	   ?>
	  
	</select>
      </div>
     </div>

<div class="col-xs-12 col-sm-12">
  <div class="form-group">
<button type="submit" name = "update" class="button update" >Update Class</button>
 </form>
</div>
</div>
</div>
</div>
</div>
</div>


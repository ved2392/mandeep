<?php 
include "dash_head.php" ;
include "../connect/connection.php" ;
$user_id = $_REQUEST['id'];
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

/*Get User Information*/
$chksql = "select * from user_table where id = '$user_id'";
$chkquery = mysqli_query($conn, $chksql);
$result = mysqli_num_rows($chkquery);
while($user_detail = mysqli_fetch_assoc($chkquery)){
   $id = $user_detail['id'];
   $user_name = $user_detail['name'];
   $user_email = $user_detail['email'];
   $user_password = $user_detail['password'];
   $user_dob = $user_detail['dob'];
   $user_gender = $user_detail['gender'];
   $user_number = $user_detail['contact_number'];
   $user_school = $user_detail['school'];
   $user_class_year = $user_detail['class_year'];
   $user_class_name = $user_detail['class_name'];
   $user_role = $user_detail['role'];
}

if(isset($_POST['update'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$number = $_POST['number'];
$school = $_POST['school'];
$class_year = $_POST['class_year'];
$class_name = $_POST['class_name'];
$role = $_POST['role'];

$sql = "UPDATE `user_table` SET `id`='$id',`name`='$name',`email`='$email',`password`='$password',`dob`='$dob',`gender`='$gender',`contact_number`='$number',`school`='$school',`class_year`='$class_year',`class_name`='$class_name',`role`='$role' WHERE id='$user_id'";
$query = mysqli_query($conn, $sql);
if($query){
	$message = "Information successfully updated";
	header('location: manage_user.php');
}
else{
$message = "Error while information updating";	
}
}




?>
<div class="main-admin">

<div class="col-xs-12 col-sm-3 no_space">
<?php include "admin_sidebar.php" ;?>
</div>
<div class="col-xs-12 col-sm-9">
<div class="main">
  <h2>Online Learning Portal</h2>
  <div class="mess"><?php echo $message; ?></div>
  <form action="" method="post">
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
       <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $user_name; ?>" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $user_email; ?>" name="email" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="password" class="form-control" id="password" placeholder="Password" value="<?php echo $user_password; ?>" name="password" required>
  </div>
  </div>
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="password" class="form-control" id="re_password" placeholder="Renter password" name="password" value="<?php echo $user_password; ?>" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="date" class="form-control" id="date" value="<?php echo $user_dob; ?>" placeholder="DD/MM/YY" name="dob" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
 <div class="form-group">
  <select class="form-control" id="gender" name="gender" required>
    <option value="">Gender</option>
    <option value="male" <?php if($user_gender =="male"){ echo "selected" ; }?> >Male</option>
    <option value="female" <?php if($user_gender =="female"){ echo "selected" ; }?>>Female</option>
    <option value="other" <?php if($user_gender =="other"){ echo "selected" ; }?>>Other</option>
  </select>
</div>
 </div>
 
 <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="tel"  class="form-control" id="number" placeholder="Contact Number" value="<?php echo $user_number; ?>" name="number" required> 
  </div>
 </div> 
  
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="text" class="form-control" id="school" value="<?php echo $user_school; ?>"  placeholder="School" name="school" required>
  </div>
 </div>   
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
      <input type="text" class="form-control" id="classyear" placeholder="Class Year"  value="<?php echo $user_class_year; ?>"  name="class_year" required>
  </div>
 </div> 
 
 <div class="col-xs-12 col-sm-6">
  <div class="form-group">
      <input type="text" class="form-control" id="classname" placeholder="Class Name" value="<?php echo $user_class_name; ?>" name="class_name" required>
  </div>
 </div> 

<div class="col-xs-6 col-sm-2">
  <div class="form-group">
      <label for="Register_as">Register As</label>
  </div>
</div>

<div class="col-xs-6 col-sm-4">
  <div class="form-group">
   <label class="radio-inline"><input type="radio" value="teacher" name="role" <?php if($user_role ="teacher"){ echo "checked"; } ?>>Teacher</label>
    <label class="radio-inline"><input type="radio" value="student" name="role" <?php if($user_role ="student"){ echo "checked"; } ?>>Student</label>
    <label class="radio-inline"><input type="radio"value="parent"  name="role" <?php if($user_role ="parent"){ echo "checked"; } ?>>Parent</label>
  </div>
</div> 
<div class="col-xs-12 col-sm-12">
  <div class="form-group">
<button type="submit" name = "update" class="btn btn-default" >Update</button>
 </form>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("re_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<script>
$(document).ready(function(){
 $("input[type='radio']").click(function(){  	
	var role  = $(this).val();
	if(role == 'teacher'){
		$('#classname').removeAttr('required');
		$('#school').attr('required','required');
		('#classyear').attr('required','required');
	}
	else if(role == 'parent'){
		$('#school').removeAttr('required');
		$('#classname').removeAttr('required');
		$('#classyear').removeAttr('required');
	}
	else if(role == 'student'){
		$('#classname').attr('required','required');
		$('#school').attr('required','required');
		('#classyear').attr('required','required');
	}
});
});
</script>

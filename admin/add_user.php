<?php 
include "dash_head.php" ;
include "../connect/connection.php" ;
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
if(isset($_POST['register'])){
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
$date = date("d/m/Y");
date_default_timezone_set("Asia/Kolkata");
$time = date("h:i:sa");

/*Check if user not already registered*/

$chksql = "select * from user_table where email = '$email'";
$chkquery = mysqli_query($conn, $chksql);
$result = mysqli_num_rows($chkquery);
if($result >0){
$message = "User already Registered with this email";	
}
else{
$sql = "INSERT INTO `user_table`(`id`, `name`,`email`, `password`, `dob`, `gender`, `contact_number`, `school`, `class_year`, `class_name`, `role`, `date`, `time`) VALUES (' ','$name','$email','$password','$dob','$gender','$number','$school','$class_year','$class_name','$role','$date','$time')";
$query = mysqli_query($conn, $sql);
if($query){
	$message = "successfully Registerd";
}
else{
	$message = "Error While Registration";
}
}
}




?>
<div class="main-admin">

<div class="col-xs-12 col-sm-3 no_space">
<?php include "admin_sidebar.php" ;?>
</div>
<div class="col-xs-12 col-sm-9">
<div class="main">
<div class="register-from">

  <h2>Online Learning Portal</h2>
  <div class="mess"><?php echo $message; ?></div>
  <form action="" method="post">
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
       <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
  </div>
  </div>
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="password" class="form-control" id="re_password" placeholder="Renter password" name="password" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
     <input type="date" class="form-control" id="date" placeholder="DD/MM/YY" name="dob" required>
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-6">
 <div class="form-group">
  <select class="form-control" id="gender" name="gender" required>
    <option value="" selected>Gender</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
  </select>
</div>
 </div>
 
 <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="tel"  class="form-control" id="number" placeholder="Contact Number" name="number" required> 
  </div>
 </div> 
  
  <div class="col-xs-12 col-sm-12">
  <div class="form-group">
      <input type="text" class="form-control" id="school" placeholder="School" name="school" required>
  </div>
 </div>  
  
  <div class="col-xs-12 col-sm-6">
  <div class="form-group">
      <input type="text" class="form-control" id="classyear" placeholder="Class Year" name="class_year" required>
  </div>
 </div> 
 
 <div class="col-xs-12 col-sm-6">
  <div class="form-group">
      <input type="text" class="form-control" id="classname" placeholder="Class Name" name="class_name" required>
  </div>
 </div> 

<div class="col-xs-6 col-sm-2">
  <div class="form-group">
      <label for="Register_as">Register As</label>
  </div>
</div>

<div class="col-xs-6 col-sm-5">
  <div class="form-group">
   <label class="radio-inline"><input type="radio" value="teacher" name="role">Teacher</label>
    <label class="radio-inline"><input type="radio" value="student" name="role">Student</label>
    <label class="radio-inline"><input type="radio"value="parent"  name="role">Parent</label>
  </div>
</div> 
<div class="col-xs-12 col-sm-12">
  <div class="form-group">
<button type="submit" name = "register" class="button" >Register</button>
 </form>
</div>
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
